<?php
session_start();

require_once dirname(__DIR__)."/includes/constant.inc.php";
require_once ROOT_DIR."/_config/dbconnect.php";

require_once ROOT_DIR."/classes/customer.class.php";
require_once ROOT_DIR."/classes/gp-package.class.php";
require_once ROOT_DIR."/classes/gp-order.class.php";
require_once ROOT_DIR."/classes/date.class.php";
require_once ROOT_DIR."/classes/location.class.php";
require_once ROOT_DIR."/classes/utility.class.php";
require_once ROOT_DIR."/classes/date.class.php";


/* INSTANTIATING CLASSES */
$DateUtil       = new DateUtil();

$GPPackage      = new GuestPostpackage();
$PackageOrder   = new PackageOrder();
$customer		= new Customer();
$Location       = new Location();
$utility		= new Utility();
$DateUtil       = new DateUtil();

############################################################################################
$typeM		= $utility->returnGetVar('typeM','');
//user id
$cusId		= $utility->returnSess('userid', 0);
$cusDtl		= $customer->getCustomerData($cusId);


if (!isset($_SESSION['updatedOrders'])) {
    header("Location:" .URL."/customer-packages.php");
    exit;
}

$orderIds = $_SESSION['updatedOrders'];

$sess_arr = array('orderIds', 'goTo', 'updatedOrders');
$utility->delSessArr($sess_arr);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Success - Order Received | <?php echo COMPANY_S; ?></title>
    <link rel="shortcut icon" href="<?php echo FAVCON_PATH?>" type="image/png" />
    <link rel="apple-touch-icon" href="<?php echo FAVCON_PATH?>" />

    <!-- plugins  files -->
    <link href="<?= URL ?>/plugins/bootstrap-5.2.0/css/bootstrap.css" rel="stylesheet">
    <?php require_once ROOT_DIR.'/plugins/font-awesome/fontawesome.php'?>

    <!-- Custom css  -->
    <link rel="stylesheet" href="<?php echo URL; ?>/css/style.css">
    <link rel="stylesheet" href="<?php echo URL; ?>/css/payment-status.css">
</head>

<body>

    <!-- Start  Header -->
    <?php require_once ROOT_DIR."/partials/navbar.php"; ?>
    <!-- End  Header -->

    <!-- Start  container -->
    <div id="container" class="mt-5">

        <div class="row flex-column  align-items-center">

            <!--======= column 1 =======-->
            <div class="col-11 col-md-10">
                <div class="mt-4 p-5 bg-lighter-blue rounded">
                    <h2 class="text-primary">Thanking you for your order.</h2>
                    <p><i class="fas fa-check-circle fs-5 text-primary"></i> We have received your order. You will
                        receive email shortly in your account.</p>

                    <div class="d-flex justify-content-center">
                        <div class="col-12 col-sm-9 col-md-8 col-lg-7 py-4">

                            <?php
                            foreach ($orderIds as $eachOrderId) {
                                $eachOrder = $PackageOrder->gpOrderById($eachOrderId);
                                if ($eachOrder['transection_id'] != '') {
                                    $paymentRow = 'Transection ID';
                                    $paymentvalue = $eachOrder['transection_id'];
                                }else {
                                    $paymentRow = 'Payment';
                                    $paymentvalue = $eachOrder['payment_type'];
                                }
                                ?>
                            <table class="table table-bordered table-light table-striped">
                                <tbody>
                                    <tr>
                                        <th scope="row">Order ID</th>
                                        <td>#<?= $eachOrder['order_id']?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row"><?= $paymentRow?></th>
                                        <td><?= $paymentvalue?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Email</th>
                                        <td><?= $eachOrder['email']?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Date</th>
                                        <td><?= $DateUtil->fullDateTimeText($eachOrder['date'])?></td>
                                    </tr>
                                </tbody>
                            </table>
                            <?php }?>

                        </div>
                    </div>


                    <p><i class="fas fa-exclamation-circle fs-5 text-warning"></i> If you find any difficulty, drop an
                        email to <?= SITE_EMAIL ?></p>
                </div>
            </div>

            <!--======= column 2 =======-->

            <div class="col-11 col-md-10 mb-3 mb-md-5 p-4 text-center">
                <p>Your order status will updated to you, Now you can go back.</p>
                <div class="mt-3">
                    <a class="btn btn-primary" href="<?= URL; ?>/app.client.php">My Account</a>
                    <a class="btn btn-primary" href="<?= URL; ?>/my-orders.php">My Orders</a>
                </div>
            </div>
        </div>
    </div>
    <div class="mainWrapBottom"></div>
    <!-- End  MainWrap -->

    <!-- Start Foter -->
    <?php require_once ROOT_DIR."/partials/footer.php"; ?>
    <!-- End Foter -->
</body>

</html>