<?php
session_start();
require_once dirname(__DIR__) .  "/includes/constant.inc.php";
require_once ROOT_DIR . "/includes/paypal.inc.php";
require_once ROOT_DIR . "/includes/order-constant.inc.php";
require_once ROOT_DIR . "/_config/dbconnect.php";

require_once ROOT_DIR . "/classes/customer.class.php";
require_once ROOT_DIR . "/classes/content-order.class.php";
require_once ROOT_DIR . "/classes/location.class.php";
require_once ROOT_DIR . "/classes/date.class.php";
require_once ROOT_DIR . "/classes/utility.class.php";


include "../Crypto.php";

$ContentOrder     = new ContentOrder();
$Customer         = new Customer();
$Location         = new Location();
$DateUtil         = new DateUtil();
$Utility		  = new Utility();

######################################################################################################################
$typeM		= $Utility->returnGetVar('typeM','');
//user id
$cusId		= $Utility->returnSess('userid', 0);
$cusDtl		= $Customer->getCustomerData($cusId);

require_once ROOT_DIR."/includes/check-customer-login.inc.php";

######################################################################################################################

$orderId = base64_decode($_GET['order']);

$showOrder  = $ContentOrder->clientOrderById($orderId);
$orderPrice         = $showOrder['order_price'];
$clientOrderedSite  = $showOrder['clientOrderedSite'];
$orderDate          = $showOrder['added_on'];


$ordTxn     = $ContentOrder->showTrxnByOrderId($orderId);
$paymentStatus      = $ordTxn['transection_mode'];
// print_r($paymentStatus);


if ($paymentStatus != PAYLATER) {
    echo "This is Not a Paylater Order!";
}

$ordTxn = $ContentOrder->showTransectionByOrder($orderId);
$buyer = $Customer->getCustomerData($showOrder['clientUserId']);

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

    <!-- <link rel="stylesheet" href="../css/payment-paylater-paynow.css"> -->

    <link href="<?= URL ?>/plugins/bootstrap-5.2.0/css/bootstrap.css" rel="stylesheet">
    <?php require_once ROOT_DIR.'/plugins/font-awesome/fontawesome.php'?>

    <!-- custom css  -->
    <link rel="stylesheet" href="<?= URL; ?>/css/payment-summary-style.css">

</head>

<body>
    <section class="paylater-main-section">
        <!-- logo codes -->
        <div class="logos-section">
            <div class="text-center">
                <img src="<?php echo LOGO_WITH_PATH; ?>" alt="<?php echo COMPANY_FULL_NAME; ?>" class="main_logo">
            </div>
        </div>
        <!-- cards for customers details -->
        <div class="second-main-div-for-details">
            <div class="row">
                <div class="col-md-6 ">
                    <div class="customer-details-section">
                        <div class="card customer-d-card">
                            <h5>Customer Details</h5>

                            <p class="mb-0" id="customer-name"> <span class="title-span">NAME: </span>
                                <?php echo $buyer[0][5].' '.$buyer[0][6];?>
                            </p>
                            <p class="mb-0"><span class="title-span">ADDRESS: </span>

                                <?php

                                if($buyer[0][30] != null){
                                    $country = $Location->getCountyById($buyer[0][30]);
                                    $countryName = $country['name'];
                                }

                                $addressArr = array(
                                                    'address1' => $buyer[0][24],
                                                    'address2' => $buyer[0][25],
                                                    'address3' => $buyer[0][26],
                                                    'city' => $buyer[0][27],
                                                    'state' => $buyer[0][28],
                                                    'country' => $countryName,
                                                    'zipcode' => $cusDtl[0][29]            
                                                    );
                                $Location->printAddress($addressArr);
                                ?>
                            </p>


                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="Client-details-section">
                        <div class="card customer-d-card">
                            <h5>Bill Details</h5>
                            <p class="mb-0"><span class="title-span">ORDER ID:</span> <?php echo '#'.$orderId; ?></p>
                            <p class="mb-0"><span class="title-span">ORDER DATE:</span>
                                <?php echo $DateUtil->dateText($orderDate); ?></p>
                        </div>
                    </div>
                </div>
            </div>

            <form method="post" id="orderForm">

                <div class=" display-table text-center">
                    <table class="table detailing-table">
                        <thead class="table-secondary">
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
                                <td><?php echo $clientOrderedSite; ?></td>
                                <td><?php echo $orderPrice; ?></td>
                                <td><?php echo $orderPrice; ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- invoice table -->
                <div class="mt-5">
                    <div class="row" style="display: flex; justify-content: end;">
                        <div class="col-md-5  ">
                            <table class="table table-responsive">
                                <thead class="table-secondary">
                                    <tr>
                                        <th class="text-center" scope="col">Invoice Summary</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="row">
                                                <div class="col-6">Total</div>
                                                <div class="col-6 text-end fw-semibold">
                                                    <?= CURRENCY; ?> <span id="amount"><?= $orderPrice;?></span>
                                                </div>
                                            </div>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="row">
                                                <div class="col-12 text-end" id="payBtn">
                                                    <div id="paypal-payment-button">
                                                    </div>
                                                </div>
                                                <div class="col-12 text-center" id="payBtn">
                                                    <a href="#" onclick="history.back()">Cancel</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>

    <form action="paylater-pay-success.php" method="post" id="send-data" class="d-none">
        <input type="text" name="data" id="form-inp">
        <input type="text" name="orderId" value="<?php echo $orderId; ?>">
    </form>


    <script
        src="https://www.paypal.com/sdk/js?client-id=<?= PAYPAL_CLIENT_ID ?>&disable-funding=credit,card&currency=USD">
    </script>
    <script>
    let formInp = document.getElementById('form-inp');
    let form = document.getElementById('send-data');


    paypal.Buttons({
        style: {
            height: 45,
            layout: 'vertical',
            color: 'gold',
            shape: 'pill',
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
    <script src="../plugins/bootstrap-5.2.0/js/bootstrap.js"></script>
</body>

</html>