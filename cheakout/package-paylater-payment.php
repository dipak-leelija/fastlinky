<?php
session_start();
require_once dirname(__DIR__) .  "/includes/constant.inc.php";
require_once ROOT_DIR . "/includes/paypal.inc.php";

require_once ROOT_DIR ."/_config/dbconnect.php";

require_once ROOT_DIR . "/classes/customer.class.php";
// require_once ROOT_DIR . "/classes/content-order.class.php";
require_once ROOT_DIR . "/classes/gp-order.class.php";
require_once ROOT_DIR . "/classes/gp-package.class.php";
require_once ROOT_DIR . "/classes/location.class.php";
require_once ROOT_DIR . "/classes/date.class.php";
require_once ROOT_DIR . "/classes/utility.class.php";


include "../Crypto.php";

$Customer         = new Customer();
// $ContentOrder     = new ContentOrder();
$PackageOrder     = new PackageOrder();
$GPPackage        = new GuestPostpackage();
$Location         = new Location();
$DateUtil         = new DateUtil();
$Utility		  = new Utility();

######################################################################################################################
$typeM		    = $Utility->returnGetVar('typeM','');
//user id
$cusId		    = $Utility->returnSess('userid', 0);
$cusDtl		    = $Customer->getCustomerData($cusId);
$currentPage    = $Utility->setCurrentPageSession();

require_once ROOT_DIR."/includes/check-customer-login.inc.php";

######################################################################################################################

$orderId = base64_decode($_GET['order']);

// echo $clientName               = $_SESSION['name'];
// exit;

$showOrder  = $PackageOrder->gpOrderById($orderId);
// print_r($showOrder);exit;
$orderPrice         = $showOrder['price'];
$packageId          = $showOrder['package_id'];
$orderDate          = $showOrder['date'];
$paymentStatus      = $showOrder['payment_type'];

$packageFullName = $GPPackage->packageFullName($packageId);

if ($paymentStatus != "PayLater") {
    echo "This is a Paylater Payment page!";
}

// $ordTxn = $ContentOrder->showTransectionByOrder($orderId);
$buyer = $Customer->getCustomerData($showOrder['customer_id']);
// print_r($buyer);exit;
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

    <link rel="stylesheet" href="<?= URL ?>/plugins/bootstrap-5.2.0/css/bootstrap.css" />
    <link rel="stylesheet" href="<?= URL ?>/css/fontawesome-all.min.css" />
    <link rel="stylesheet" href="<?= URL ?>/css/payment-paylater-paynow.css" />
</head>

<body>

    <section class="container mt-5" style="display: none;" id="waiting-box">
        <p class="text-center text-warning py-5 mb-0">
            <img src="../images/icons/loading.gif" alt="">
            Don't Click anywhere or go back, redirecting you to the payment page...
        </p>
    </section>

    <section class="paylater-paynow-section " id="payment-box">
        <div class="border p-2 p-sm-4 mt-2  bg-light shadow rounded">
            <div class="row m-0 w-100 justify-content-center">
                <div class="col-12 py-3 d-flex justify-content-center mb-4">
                    <img src="../images/logo/logo.png" class="page-logo" alt="">
                </div>
                <!-- <div class="row justify-content-between"> -->
                    <div class="col-sm-6">
                        <h5 class="">Customer Details:</h5>
                        <div class="">
                            <p class="mb-0" id="customer-name"> <span class="title-span">NAME: </span> <?php echo $buyer[0][5].' '.$buyer[0][6];?></p>
                            <p class="mb-0"><span class="title-span">ADDRESS: </span>
                                <?php
                                if($buyer[0][24] != null){
                                        echo $buyer[0][24];
                                    }
                                    
                            ?>
                            </p>
                            <p class="mb-0">  <?php
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
                                        echo $Location->getCityName($buyer[0][27]);
                                    }
                            ?>
                            </p>
                            <p class="mb-0">
                                <?php
                                if($buyer[0][28] != null){
                                    echo $Location->getStateName($buyer[0][28]).', ';
                                    }
                                if($buyer[0][29] != null){
                                    echo $buyer[0][29];
                                }
                            ?>
                            </p>
                            <p class="mb-0">
                                <?php
                                if($buyer[0][30] != null){
                                    $country = $Location->getCountyById($buyer[0][30]);
                                        echo $country['name'];
                                    }
                            ?>
                            </p>
                        </div>
                    </div>

                    <div class="col-sm-6 text-sm-end mt-sm-0 mt-3 ">
                        <h5 class="">Order Details:</h5>
                        <p class="mb-0"><span class="title-span">ORDER ID:</span> <?php echo '#'.$orderId; ?></p>
                        <p class="mb-0"><span class="title-span">ORDER DATE:</span>
                            <?php echo $DateUtil->dateText($orderDate); ?></p>
                    </div>
                <!-- </div> -->
                <hr style="width: 95%;" class="mt-3 mt-md-5">

                <div class="col-12 table-responsive mt-3 mt-md-5">
                    <table class="table table-sm  table-bordered align-middle text-center ">
                        <thead>
                            <tr>
                                <th scope="col">Order Id</th>
                                <th scope="col">Site Name</th>
                                <th scope="col">Amount <?= CURRENCY ?></th>
                                <th scope="col">Payable <?= CURRENCY ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row"><?php echo '#'.$orderId; ?></th>
                                <td><?php echo $packageFullName; ?></td>
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

                <div class="col-12">
                    <div class="d-flex justify-content-center justify-content-md-end mt-2" id="payBtn">
                        <div id="paypal-payment-button">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <form action="package-paylater-payment-success.php" method="post" id="send-data" class="d-none">
        <input type="text" name="data" id="form-inp">
        <input type="text" name="orderId" value="<?php echo $orderId; ?>">
    </form>


    <script
        src="https://www.paypal.com/sdk/js?client-id=<?= PAYPAL_CLIENT_ID ?>&disable-funding=credit,card&currency=USD">
    </script>
    <script>
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
                        value: <?= $orderPrice ?>
                    }
                }]
            });
        },
        onApprove: function(data, actions) {
            // This function captures the funds from the transaction.
            return actions.order.capture().then(function(details) {
                // This function shows a transaction success message to your buyer.

                document.getElementById('payBtn').innerHTML =
                    `<div class="bg-secondary border border-info rounded text-center"><p class="fw-bold py-2 mb-0"><span><img src="../images/icons/loading-2.gif" alt="loading"></span> Please Wait..</p></div>`;
                waitingBox.style.display = "block";
                paymentBox.style.display = "none !import";
                formInp.value = JSON.stringify(details);
                form.submit();

            });
        },
        onCancel: function(data) {

            // console.log(data);
            // sessionStorage.setItem('orderStatus', 'Cancled');
            // if (sessionStorage.getItem('orderStatus') == 'Cancled') {
            alert('cancled');
            // }
        },
        onError: function(err) {
            alert(`Error: ${err}`);
        }
    }).render('#paypal-payment-button');
    </script>
    <script src="<?= URL ?>/plugins/bootstrap-5.2.0/js/bootstrap.js"></script>
</body>

</html>