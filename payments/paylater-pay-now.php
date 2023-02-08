<?php 
session_start();
require_once "../_config/dbconnect.php";
require_once "../_config/dbconnect.trait.php";

require_once "../includes/constant.inc.php";
require_once "../includes/paypal.inc.php";

require_once "../classes/customer.class.php";
require_once "../classes/content-order.class.php";
require_once "../classes/countries.class.php";
require_once "../classes/date.class.php";
require_once "../classes/utility.class.php";


include "../Crypto.php";

$ContentOrder     = new ContentOrder();
$Customer         = new Customer();
$Countries        = new Countries();
$DateUtil         = new DateUtil();
$Utility		  = new Utility();

######################################################################################################################
$typeM		= $Utility->returnGetVar('typeM','');
//user id
$cusId		= $Utility->returnSess('userid', 0);
$cusDtl		= $Customer->getCustomerData($cusId);

if($cusId == 0){
	header("Location: index.php");
}

if($cusDtl[0] == 1){ 
	header("Location: dashboard.php");
}
######################################################################################################################

$orderId = base64_decode($_GET['order']);

// echo $clientName               = $_SESSION['name'];
// exit;

$showOrder  = $ContentOrder->clientOrderById($orderId);
$orderPrice         = $showOrder[0]['clientOrderPrice'];
$paymentStatus      = $showOrder[0]['paymentStatus'];
$clientOrderedSite  = $showOrder[0]['clientOrderedSite'];
$orderDate          = $showOrder[0]['added_on'];


if ($paymentStatus != "Pay Later") {
    echo "This is Not a Paylater Order!";
}

$ordTxn = $ContentOrder->showTransectionByOrder($orderId);
$buyer = $Customer->getCustomerData($showOrder[0]['clientUserId']);

$_SESSION['payment-process'] = true;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PayLater Payment Summary | <?php echo COMPANY_S; ?></title>
    <link rel="shortcut icon" href="<?php echo FAVCON_PATH?>" type="image/png" />
    <link rel="apple-touch-icon" href="<?php echo FAVCON_PATH?>" />

    <link rel="stylesheet" href="../plugins/bootstrap-5.2.0/css/bootstrap.css">
    <link rel="stylesheet" href="../css/fontawesome-all.min.css">

</head>

<body>

    <section class="container mt-5" style="display: none;" id="waiting-box">
        <p class="text-center text-warning py-5 mb-0">
            <img src="../images/icons/loading.gif" alt="">
            Don't Click anywhere or go back, redirecting you to the payment page...
        </p>
    </section>

    <section class="container d-flex align-items-center flex-column mt-5" id="payment-box">
        <div class="border p-4 mt-2 w-50 bg-light shadow rounded">
            <div class="row justify-content-center">
                <div class="col-12 py-3 d-flex justify-content-center">
                    <img src="../images/logo/logo.png" alt="">
                </div>

                <div class="col-6">
                    <h5 class="fw-bold">Customer Details:</h5>
                    <div class="ps-2">
                        <p class="mb-0" id="customer-name"><?php echo $buyer[0][5].' '.$buyer[0][6];?></p>
                        <p class="mb-0">
                            <?php
                                if($buyer[0][24] != null){
                                        echo $buyer[0][24];
                                    }
                                    
                            ?>
                        </p>
                        <p class="mb-0">
                            <?php
                                if($buyer[0][25] != null){
                                        echo $buyer[0][25].', ';
                                    }

                                if ($buyer[0][26] != null) {
                                        echo $buyer[0][26];
                                    }
                                    
                            ?>
                        </p>
                        <p class="mb-0">
                            <?php
                                if($buyer[0][27] != null){
                                        echo $buyer[0][27];
                                    }
                            ?>
                        </p>
                        <p class="mb-0">
                            <?php
                                if($buyer[0][28] != null){
                                        echo $buyer[0][28].', ';
                                    }
                                if($buyer[0][29] != null){
                                    echo $buyer[0][29];
                                }
                            ?>
                        </p>
                        <p class="mb-0">
                            <?php
                                if($buyer[0][30] != null){
                                    $country = $Countries->showCountry($buyer[0][30]);
                                        echo $country[0];
                                    }
                            ?>
                        </p>
                    </div>
                </div>

                <div class="col-6 d-flex flex-column justify-content-center">
                    <p class="mb-0"><span class="fw-semibold">ORDER ID:</span> <?php echo '#'.$orderId; ?></p>
                    <p class="mb-0"><span class="fw-semibold">ORDER DATE:</span>
                        <?php echo $DateUtil->dateText($orderDate); ?></p>
                </div>

                <hr style="width: 95%;" class="mt-3">

                <div class="col-11">
                    <table class="table table-sm table-bordered align-middle text-center">
                        <thead>
                            <tr>
                                <th scope="col">Order Id</th>
                                <th scope="col">Site Name</th>
                                <th scope="col">Amount $</th>
                                <th scope="col">Payable $</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row"><?php echo '#'.$orderId; ?></th>
                                <td><?php echo $clientOrderedSite; ?></td>
                                <td><?php echo $orderPrice; ?></td>
                                <td><?php echo $orderPrice; ?></td>
                            </tr>
                            <tr>
                                <th colspan="3" scope="row">Total</th>
                                <td><b><?php echo $orderPrice; ?></b></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <input type="hidden" id="amount" value="<?php echo $orderPrice;?>">

                <div class="col-11">
                    <div class="d-flex justify-content-end mt-2" id="payBtn">
                        <div id="paypal-payment-button">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <form action="paylater-pay-success.php" method="post" id="send-data" class="d-none">
        <input type="text" name="data" id="form-inp">
        <!-- <input type="text" name="blogId" id="blogId" value="<?php echo $blogId; ?>"> -->
        <input type="text" name="orderId" value="<?php echo $orderId; ?>">
    </form>


    <script
        src="https://www.paypal.com/sdk/js?client-id=Ad-k2bukRixHHQ6YLq08lkeobaQU8EJtuiiW6vuuthWJIOdqEpUlpz73mKZBxU_pvTPy9q086XgtFw2d&disable-funding=credit,card&currency=USD">
    </script>
    <script>
    let amount = document.getElementById("amount").value;
    let customerName = document.getElementById("customer-name").innerText;
    let waitingBox = document.getElementById("waiting-box");
    let paymentBox = document.getElementById("payment-box");

    let formInp = document.getElementById('form-inp');
    let form = document.getElementById('send-data');


    paypal.Buttons({
        style: {
            layout: 'vertical',
            color: 'gold',
            shape: 'rect',
            label: 'paypal'
        },
        createOrder: function(data, actions) {
            // This function sets up the details of the transaction, including the amount and line item details.
            return actions.order.create({
                purchase_units: [{
                    amount: {
                        value: amount
                    }
                }]
            });
        },
        onApprove: function(data, actions) {
            // This function captures the funds from the transaction.
            return actions.order.capture().then(function(details) {
                // This function shows a transaction success message to your buyer.

                document.getElementById('payBtn').innerHTML = `<div class="bg-secondary border border-info rounded text-center"><p class="fw-bold py-2 mb-0"><span><img src="../images/icons/loading-2.gif" alt="loading"></span> Please Wait..</p></div>`;
                waitingBox.style.display = "block";
                paymentBox.style.display = "none !import";
                formInp.value = JSON.stringify(details);
                form.submit();

            });
        },
        onCancel: function(data) {

            console.log(data);
            sessionStorage.setItem('orderStatus', 'Cancled');
            if (sessionStorage.getItem('orderStatus') == 'Cancled') {
                alert('cancled');
            }
        },
        onError: function(err) {
            alert(`Error: ${err}`);
        }
    }).render('#paypal-payment-button');
    </script>
    <script src="../plugins/bootstrap-5.2.0/js/bootstrap.js"></script>
</body>

</html>