<?php
session_start();
require_once dirname(__DIR__)."/includes/constant.inc.php";

require_once ROOT_DIR."/_config/dbconnect.php";

require_once ROOT_DIR."/includes/order-constant.inc.php";
require_once ROOT_DIR."/includes/content.inc.php";
require_once ROOT_DIR."/includes/paypal.inc.php";
require_once ROOT_DIR."/includes/user.inc.php";


require_once ROOT_DIR."/classes/customer.class.php";
require_once ROOT_DIR."/classes/gp-package.class.php";
require_once ROOT_DIR."/classes/gp-order.class.php";
require_once ROOT_DIR."/classes/date.class.php";
require_once ROOT_DIR."/classes/location.class.php";
require_once ROOT_DIR."/classes/utility.class.php";


/* INSTANTIATING CLASSES */
$DateUtil       = new DateUtil();

$GPPackage      = new GuestPostpackage();
$PackageOrder   = new PackageOrder();
$customer		= new Customer();
$Location       = new Location();
$utility		= new Utility();

############################################################################################
$typeM		= $utility->returnGetVar('typeM','');
//user id
$cusId		= $utility->returnSess('userid', 0);
$cusDtl		= $customer->getCustomerData($cusId);

require_once ROOT_DIR."/includes/check-customer-login.inc.php";

if (!isset($_SESSION[PACK_ORD])) {
    header('Location: ../customer-packages.php' );
    exit;   
}

if (isset($_POST['firstname']) && isset($_POST['lastName']) && isset($_POST['mob-no']) && isset($_POST['city']) && isset($_POST['pin-code']) && isset($_POST['state']) && isset($_POST['country'])) {
    
    $fname      = $_POST['firstname'];
    $lname      = $_POST['lastName'];
    $city       = $_POST['city'];
    $state      = $_POST['state'];
    $mobile     = $_POST['mob-no'];
    $pincode    = $_POST['pin-code'];
    $country    = $_POST['country'];
   
    $response = $customer->updateAddrDuringPackOrd($cusId, $fname, $lname, $city, $pincode, $state, $country, $mobile);

    if (preg_match("/ERU300/i", $response)) {
        header('Location: ../packages-summary.php?msg='.ERU300);
        exit;
    }
    if (preg_match("/ERU007/i", $response)) {
        header('Location: ../packages-summary.php?msg='.ERU007);
        exit;
    }
    if ($response == 'SUU010') {

        $customerName       = $fname.' '.$lname;
        $customerEmail      = $cusDtl[0][3];
        $customerMobile     = $mobile;
        $customerCity       = $Location->getCityDataById($city)['name'];
        $customerCountry    = $Location->getCountyById($country)['name'];

    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Package Order Summary - <?php echo COMPANY_S; ?></title>
    <link rel="shortcut icon" href="<?php echo FAVCON_PATH?>" type="image/png" />
    <link rel="apple-touch-icon" href="<?php echo FAVCON_PATH?>" />

    <!-- plugins  files -->
    <link href="<?= URL ?>/plugins/bootstrap-5.2.0/css/bootstrap.css" rel="stylesheet" />
    <?php require_once ROOT_DIR.'/plugins/font-awesome/fontawesome.php'?>

    <!-- custom css  -->
    <link rel="stylesheet" href="<?= URL; ?>/css/payment-summary-style.css" />
</head>

<body>
    <section class="paylater-main-section">
        <!-- logo codes -->
        <div class="logos-section">
            <div class="text-center">
                <img src="<?php echo LOGO_WITH_PATH; ?>" alt="<?= COMPANY_FULL_NAME; ?>" class="main_logo">
            </div>
        </div>
        <!-- cards for customers details -->
        <div class="row my-3 my-md-4">
            <div class="col">
                <div class="jumbotron">
                    <div class="row">
                        <div class="col-sm d-flex">
                            <div class="card card-body flex-fill  customer-d-card">
                                <div>
                                    <h5>Customer Details</h5>
                                    <p><label><?php echo $customerName; ?></label></p>
                                    <p><label><?php echo $customerEmail; ?></label></p>
                                    <p><label><?php echo $customerMobile; ?></label></p>
                                    <p><label><?php echo $customerCity; ?></label></p>
                                    <p><label><?php echo $customerCountry; ?></label></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm d-flex">
                            <div class="card card-body flex-fill customer-d-card">
                                <h5>Bill Details</h5>
                                <p><label>Invoice Date : <?php echo $DateUtil->todayDate("/"); ?> </label>
                                </p>
                                <p><label>Due Date : <?php echo $DateUtil->todayDate("/"); ?><label></p>
                                <p><label>Payment Mode : Paypal<label></p>
                                <p><label>Total Package: <?php echo count($_SESSION['package']); ?></label>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <form action="" method="post" id="summary-form">
            <div class=" display-table text-center ">
                <!-- <div class="features_grids table-responsive"> -->
                <table class="table detailing-table table-responsive">
                    <thead class="table-secondary">
                        <tr>
                            <th scope="col">Item</th>
                            <th scope="col">QTY</th>
                            <th scope="col">Rate</th>
                            <th scope="col">Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $totalCost = 00.00;

                            foreach ($_SESSION['package'] as $index => $packId) {
                            
                                $pack           = $GPPackage->packDetailsById($packId);
                                $packCat        = $GPPackage->packCatById($pack['category_id']);
                                $packFullName   = $packCat['category_name'].' '.$pack['package_name'];
                            
                                $totalCost      += $pack['price'];

                                
                                $orderIds[] = $PackageOrder->addPackageOrder($packId, '', $cusId, $customerName, $customerEmail, $pack['price'], 00, 00, '', '', PENDINGCODE, INCOMPLETECODE);
                            ?>
                        <tr>
                            <td class="text-start fw-semibold"><?php echo $packFullName; ?> </td>
                            <td><?php echo 1; ?></td>
                            <td><?php echo CURRENCY.$pack['price']; ?></td>
                            <td> <?php echo CURRENCY; ?><span id="amount"><?php echo $pack['price']; ?></span>
                            </td>
                        </tr>
                        <?php
                            }
                            $_SESSION['orderIds']    =    $orderIds;
                            ?>
                    </tbody>
                </table>
                <!-- </div> -->
            </div>

            <!-- invoice table -->
            <div class="second-table-fr-total">
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
                                                <?php echo CURRENCY.$totalCost;?></div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="row mt-2">
                                            <div class="col-12 text-end" id="payBtn">
                                                <div id="paypal-payment-button">
                                                </div>
                                            </div>
                                            <div class="col-12 text-end">
                                                <button type="button"
                                                    class="btn rounded-pill w-100 fw-bolder pay_button payLaterBtn"
                                                    onclick="paylaterProcess()">
                                                    <span class="paylater_logo">
                                                        <img src="<?= URL ?>/images/payments/pay-later.png">
                                                    </span>
                                                    <span> PayLater</span>
                                                </button>
                                                <input type="hidden" name="paylaterForm" value="paylaterForm">
                                            </div>
                                            <div class="col-12 text-center">
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
        <form action="order-processing.php" method="post" id="payment-process-form" name="payment-process-form">
            <input type="hidden" id="pppamn" name="pppamn" value="">
            <input type="hidden" id="paymentdata" name="paymentdata" value="">
        </form>
    </section>

    <script
        src="https://www.paypal.com/sdk/js?client-id=<?= PAYPAL_CLIENT_ID ?>&disable-funding=credit,card,paylater&currency=USD">
    </script>
    <script>
    let getAmount = document.getElementById("pppamn");
    let paymentdata = document.getElementById('paymentdata');
    let form = document.getElementById('payment-process-form');



    paypal.Buttons({
        style: {
            height: 45,
            layout: 'vertical',
            color: 'blue',
            shape: 'pill',
            label: 'paypal'
        },
        createOrder: function(data, actions) {
            // This function sets up the details of the transaction, including the amount and line item details.
            return actions.order.create({
                purchase_units: [{
                    amount: {
                        value: <?= $totalCost?>
                    }
                }]
            });
        },
        onApprove: function(data, actions) {
            // This function captures the funds from the transaction.
            return actions.order.capture().then(function(details) {
                // This function shows a transaction success message to your buyer.
                // alert('Done');
                document.getElementById('payBtn').innerHTML =
                    `<div class="bg-secondary border border-info rounded text-center"><p class="fw-bold py-2 mb-0"><span><img src="../images/icons/loading-2.gif" alt="loading"></span> Please Wait..</p></div>`;
                getAmount.value = <?= $totalCost?>;
                paymentdata.value = JSON.stringify(details);
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

    // paypal end and paylater start 
    const paylaterProcess = ()=>{
        let summaryForm = document.getElementById('summary-form');
        summaryForm.action = 'order-processing.php';
        summaryForm.submit();
    }
    </script>


    <script src="<?= URL ?>/plugins/bootstrap-5.2.0/js/bootstrap.js"></script>
</body>

</html>