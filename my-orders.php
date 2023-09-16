<?php
require_once "includes/constant.inc.php";
session_start();

require_once ROOT_DIR."/_config/dbconnect.php";

require_once ROOT_DIR."/classes/encrypt.inc.php";

require_once ROOT_DIR."/classes/customer.class.php";
require_once ROOT_DIR."/classes/content-order.class.php";
require_once ROOT_DIR."/classes/gp-order.class.php";
require_once ROOT_DIR."/classes/gp-package.class.php";
require_once ROOT_DIR."/classes/orderStatus.class.php";
require_once ROOT_DIR."/classes/date.class.php";
require_once ROOT_DIR."/classes/utility.class.php";

/* INSTANTIATING CLASSES */
$customer		= new Customer();
$ContentOrder   = new ContentOrder();
$PackageOrder   = new PackageOrder();
$GPPackage      = new GuestPostpackage();
$OrderStatus    = new OrderStatus();
$DateUtil       = new DateUtil();
$utility		= new Utility();
######################################################################################################################
$typeM		= $utility->returnGetVar('typeM','');
//user id
$cusId		= $utility->returnSess('userid', 0);
$cusDtl		= $customer->getCustomerData($cusId);

require_once ROOT_DIR.'/includes/check-customer-login.inc.php';

$myOrders       = $ContentOrder->clientOrders($cusId);
$packOrders     = $PackageOrder->getPackOrderDetails($cusId, 5);

// print_r($_SESSION);exit;

?>
<!DOCTYPE HTML>
<html lang="en">

<head>
    <meta name="robots" content="noindex,nofollow">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My Orders | <?php echo COMPANY_S; ?></title>
    <link rel="shortcut icon" href="<?php echo FAVCON_PATH?>" type="image/png" />
    <link rel="apple-touch-icon" href="<?php echo FAVCON_PATH?>" />

    <!-- Plugins Files -->
    <link href="<?= URL ?>/plugins/bootstrap-5.2.0/css/bootstrap.css" rel="stylesheet">
    <?php require_once ROOT_DIR.'/plugins/font-awesome/fontawesome.php'?>

    <link href="<?php echo URL;?>/css/style.css" rel='stylesheet' type='text/css' />
    <link href="<?php echo URL;?>/css/dashboard.css" rel='stylesheet' type='text/css' />
    <link href="<?php echo URL;?>/css/my-orders.css" rel='stylesheet' type='text/css' />
    <link href="<?php echo URL;?>/css/order-list.css" rel='stylesheet' type='text/css' />


    <!--//webfonts-->
    <link href="//fonts.googleapis.com/css?family=Montserrat:400,500,600,700,900" rel="stylesheet">
</head>

<body>
    <div id="home">
        <!-- header -->
        <?php  require_once ROOT_DIR."/partials/navbar.php" ?>
        <!-- //header -->

        <!-- banner -->
        <div class="edit_profile">
            <div class="container-fluid">
                <div class=" display-table">
                    <div class="row ">
                        <div class="col-md-3 col-sm-12 hidden-xs display-table-cell v-align" id="navigation">

                            <!--*****************TOOGLE OFFCANVAS FOR SIDEBAR ONLY IN MOBILE TAB ******************* -->
                            <div class="extra-added-butn-for-mob-tab ">
                                <button class="sidebar-icon-btn " type="button" data-bs-toggle="offcanvas"
                                    data-bs-target="#staticBackdrop" aria-controls="staticBackdrop">
                                    <i class="fa-solid fa-angles-right"></i>
                                </button>
                                <div class="offcanvas offcanvas-start " data-bs-scroll="true" data-bs-backdrop="static"
                                    tabindex="-1" id="staticBackdrop" aria-labelledby="staticBackdropLabel">
                                    <div class="offcanvas-header">
                                        <h5 class="offcanvas-title" id="staticBackdropLabel"></h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="offcanvas-body">
                                        <?php include("dashboard-inc.php");?>
                                        <hr class="myhrline">
                                    </div>
                                </div>
                            </div>

                            <div class="client_profile_dashboard_left">
                                <?php include("dashboard-inc.php");?>
                                <hr class="myhrline">
                            </div>
                            <!--***********TOOGLE OFFCANVAS FOR SIDEBAR ONLY IN MOBILE TAB ******************* -->
                        </div>
                        <div class="col-md-9  ps-md-0 display-table-cell v-align extra-mrgin-top-for-mtab ">

                            <!-- row -->
                            <div class="row m-0 w-100 mt-lg-0 mt-4">

                                <!-- Guest Post Orders  Section-->
                                <div class="col-12 shadow_md rounded p-3">
                                    <div class=" mb-3">
                                        <h4 class="">Package Order:</h4>
                                    </div>

                                    <!-- =========================================================================== -->
                                    <table id="examplew" class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>Order ID</th>
                                                <th>Package</th>
                                                <th>Niche</th>
                                                <th>Status</th>
                                                <th>Payment</th>
                                                <th>Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php
                                        $sl = 1;
                                        if (count($packOrders) > 0 ) {
                                            $showItems = 0;
                                            foreach ($packOrders as $eachPackOrder) {

                                                $packOrdId  = $eachPackOrder['order_id'];
                                                $ordNiche   = $eachPackOrder['niche'];
                                                $packOrdStatus = $eachPackOrder['order_status'];
                                                $packPayType = $eachPackOrder['payment_type'];
                                                $packOrdDate = $DateUtil->timeZoneConvert($eachPackOrder['date']);

                                                $ordPack    = $GPPackage->packDetailsById($eachPackOrder['package_id']);
                                                $packCat    = $GPPackage->packCatById($ordPack['category_id']);

                                                $statusName     = $OrderStatus->getOrdStatName($packOrdStatus);

                                                $packageName = $packCat['category_name'].' '.$ordPack['package_name'];
                                        ?>

                                            <tr class="cursor_pointer"
                                                onclick="goTo('package-order-history.php?order=<?= base64_encode(urlencode($packOrdId));?>')">
                                                <td>#<?= $packOrdId ;?></td>
                                                <td><?= $packageName; ?></td>
                                                <td><?= $ordNiche; ?></td>
                                                <td><span class="badge <?= $statusName;?>"><?= $statusName;?></span>
                                                </td>
                                                <td><?= $packPayType;?></td>
                                                <td><?= $DateUtil->printDate2($packOrdDate);?></td>
                                            </tr>
                                            <?php
                                                $showItems++;
                                                if ($showItems == 5) {
                                                    break;
                                                }
                                            }
                                         }else{
                                            echo 'no orders yet';
                                         } ?>

                                        </tbody>
                                    </table>

                                    <!-- =========================================================================== -->


                                    <div class="see_all">
                                        <a href="package-order-list.php">See All</a>
                                    </div>
                                </div>
                                <!-- Package Orders Section End-->


                                <!-- Guest Post Orders  Section-->
                                <div class="col-12 shadow_md rounded p-3 mt-5">

                                    <h4 class="">Guest Post Order:</h4>
                                    <table id="examplew" class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>Order ID</th>
                                                <th>Domain</th>
                                                <th>Status</th>
                                                <th>Payment</th>
                                                <th>Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php
                                        $sl = 1;
                                        if (count($myOrders) > 0 ) {
                                            $showItems = 0;
                                            foreach ($myOrders as $order) {
                                                $gpOrderId = $order['order_id'];
                                                $payMode = $ContentOrder->showTrxnByOrderId($order['order_id']);
                                                if ($payMode != null) {
                                                    $transectionMode = $payMode['transection_mode'];
                                                }else {
                                                    $transectionMode = '';
                                                }
                                                $statusName = $OrderStatus->getOrdStatName($order['order_status']);
                                        ?>
                                            <tr class="cursor_pointer"
                                                onclick="goTo('guest-post-article-submit.php?order=<?= base64_encode(urlencode($gpOrderId)) ?>')">
                                                <td>#<?= $gpOrderId;?></td>
                                                <td><?= $order['clientOrderedSite']; ?></td>
                                                <td><span class="badge <?= $statusName;?>"><?= $statusName;?></span>
                                                </td>
                                                <td><?= $transectionMode;?></td>
                                                <td>
                                                    <?php
                                                    $gpOrddate = $DateUtil->timeZoneConvert($order['added_on']);
                                                    echo $DateUtil->printDate2($gpOrddate);
                                                    ?>
                                                </td>
                                            </tr>
                                            <?php
                                                $showItems++;
                                                if ($showItems == 5) {
                                                    break;
                                                }
                                            }
                                             }else {
                                                echo 'no orders yet.';
                                              }
                                            ?>
                                        </tbody>
                                    </table>

                                    <div class="see_all">
                                        <a href="guest-post-order-list.php">See All</a>
                                    </div>


                                </div>
                                <!-- Guest Post Orders  Section End-->


                            </div>
                            <!-- row -->

                            </section>
                            <!-- Right area section start -->

                        </div>
                    </div>
                    <!-- //end display table-->
                </div>
            </div>
            <script src="<?php echo URL;?>/plugins/bootstrap-5.2.0/js/bootstrap.js" type="text/javascript"></script>
            <script src="<?php echo URL;?>/plugins/sweetalert/sweetalert2.all.min.js" type="text/javascript"></script>
            <script src="<?php echo URL;?>/plugins/data-table/simple-datatables.js"></script>
            <script src="<?php echo URL;?>/plugins/tinymce/tinymce.js"></script>
            <script src="<?php echo URL;?>/plugins/main.js"></script>
            <script src="<?php echo URL;?>/plugins/jquery-3.6.0.min.js"></script>

            <!-- //fixed-scroll-nav-js -->
            <script src="<?php echo URL;?>/js/customerSwitchMode.js"></script>
            <script src="<?php echo URL;?>/js/script.js"></script>

</body>

</html>