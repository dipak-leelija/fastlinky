<?php
session_start();
require_once "includes/constant.inc.php";
require_once "includes/order-constant.inc.php";

require_once ROOT_DIR."/_config/dbconnect.php";

require_once ROOT_DIR."/classes/customer.class.php";
require_once ROOT_DIR."/classes/content-order.class.php";
require_once ROOT_DIR."/classes/gp-package.class.php";
require_once ROOT_DIR."/classes/gp-order.class.php";
require_once ROOT_DIR."/classes/orderStatus.class.php";
require_once ROOT_DIR."/classes/utility.class.php";
require_once ROOT_DIR."/classes/wishList.class.php";

$customer		= new Customer();
$ContentOrder   = new ContentOrder();
$GPPackage      = new GuestPostpackage();
$PackageOrder   = new PackageOrder();
$OrderStatus    = new OrderStatus();
$WishList       = new WishList();
$utility		= new Utility();
######################################################################################################################
$typeM		= $utility->returnGetVar('typeM','');
//user id
$cusId		= $utility->returnSess('userid', 0);
$cusDtl		= $customer->getCustomerData($cusId);
$wishes     = $WishList->countWishlistByUser($cusId);

require_once ROOT_DIR."/includes/check-customer-login.inc.php";

$wishes             = $WishList->countWishlistByUser($cusId);
$myOrders           = $ContentOrder->clientOrders($cusId);
$pendingContOrd     = $ContentOrder->pendingContentOrders($cusId, PENDING, PENDINGCODE);
$openContOrdCount       = $ContentOrder->openContentOrders($cusId, PENDINGCODE, REJECTEDCODE, COMPLETEDCODE, 'COUNT');

$packageOrderCount   = $PackageOrder->countPackOrderByUser($cusId);
$packOrdDtls         = $PackageOrder->getPackOrderDetails($cusId);
$pendingPackOrd      = $PackageOrder->pendingGPOrders($cusId, PENDING, PENDINGCODE);
$openGPOrdCount         = $PackageOrder->openGPOrders($cusId, PENDINGCODE, REJECTEDCODE, COMPLETEDCODE, 'COUNT');

$totalOpenOrders    = $openGPOrdCount[0]+$openContOrdCount[0];
$totalPendingOrders = count($pendingPackOrd) + count($pendingContOrd);

?>
<!DOCTYPE HTML>
<html lang="zxx">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="<?php echo FAVCON_PATH?>" type="image/png" />
    <link rel="apple-touch-icon" href="<?php echo FAVCON_PATH?>" />
    <title>Dashboard - <?php echo COMPANY_S; ?></title>

    <!-- plugins  files -->
    <!-- <link href="<?= URL ?>/plugins/bootstrap-5.2.0/css/bootstrap.css" rel="stylesheet"> -->
    <?php require_once ROOT_DIR.'/plugins/bootstrap-5.2.0/bootstrap-css-inc.php'?>
    <?php require_once ROOT_DIR.'/plugins/font-awesome/fontawesome.php'?>


    <!-- Custom CSS -->
    <link href="<?php echo URL;?>/css/style.css" rel='stylesheet' type='text/css' />
    <link href="<?php echo URL;?>/css/dashboard.css" rel='stylesheet' type='text/css' />
    <link href="<?php echo URL;?>/css/pricing-mainpage.css" rel='stylesheet' type='text/css' />
    <link href="<?php echo URL;?>/css/order-list.css" rel='stylesheet' type='text/css' />


</head>

<body>
    <div id="home">
        <!-- header -->

        <?php 
            require_once "partials/navbar.php";
            // include('header-user-profile.php') ?>
        <!-- //header -->
        <!-- banner -->
        <div class="edit_profile" style="overflow: hidden;">
            <div class="container-fluid">
                <div class=" display-table">
                    <div class="row ">
                        <!--Row start-->
                        <div class="col-md-3 col-sm-12 hidden-xs display-table-cell v-align" id="navigation">

                            <!--*****************TOOGLE OFFCANVAS FOR SIDEBAR ONLY IN MOBILE TAB ******************* -->
                            <div class="extra-added-butn-for-mob-tab ">
                                <button class="sidebar-icon-btn " type="button" data-bs-toggle="offcanvas"
                                    data-bs-target="#staticBackdrop" aria-controls="staticBackdrop">
                                    <i class="fa-solid fa-angles-right"></i>
                                </button>
                                <div class="offcanvas offcanvas-start " data-bs-scroll="true"
                                    data-bs-backdrop="static" tabindex="-1" id="staticBackdrop"
                                    aria-labelledby="staticBackdropLabel">
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
                        <div class="col-md-9  ps-md-0 display-table-cell v-align extra-mrgin-top-for-mtab">
                            <div class=" p-0">
                                <header>
                                    <!-- dasboard top cards -->
                                    <div class="row">
                                        <div class="col-lg-3 col-sm-6">
                                            <a href="wishlist.php">
                                                <div class="dboard-cd-box mt-md-0 ">
                                                    <div class="inner">
                                                        <h3><?php echo $wishes; ?></h3>
                                                        <p> Wishlist</p>
                                                    </div>
                                                    <div class="dboard-icn_font">
                                                        <i class="fa-solid fa-heart-circle-plus" aria-hidden="true"></i>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>

                                        <div class="col-lg-3 col-sm-6">
                                            <a href="my-orders.php">
                                                <div class="dboard-cd-box mt-md-0 ">
                                                    <div class="inner">
                                                        <h3><?= $totalOpenOrders; ?>
                                                        </h3>
                                                        <p>Open Orders</p>
                                                    </div>
                                                    <div class="dboard-icn_font" aria-hidden="true">
                                                        <i class="fa-solid fa-spinner"></i>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>

                                        <div class="col-lg-3 col-sm-6">
                                            <a href="my-orders.php">
                                                <div class="dboard-cd-box mt-md-0 ">
                                                    <div class="inner">
                                                        <h3>
                                                            <?= $totalPendingOrders; ?>
                                                        </h3>
                                                        <p>Pending Orders</p>
                                                    </div>
                                                    <div class="dboard-icn_font" aria-hidden="true">
                                                        <i class="fa-solid fa-hourglass-half"></i>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>

                                        <div class="col-lg-3 col-sm-6">
                                            <a href="my-orders.php">
                                                <div class="dboard-cd-box mt-md-0">
                                                    <div class="inner">
                                                        <h3><?= $packageOrderCount + count($myOrders); ?> </h3>
                                                        <p> My Orders</p>
                                                    </div>
                                                    <div class="dboard-icn_font">
                                                        <i class="fa-solid fa-cart-shopping" aria-hidden="true"></i>
                                                    </div>

                                                </div>
                                            </a>
                                        </div>

                                    </div>

                                </header>
                                <div class="row">

                                    <!-- start col  -->
                                    <div class=" col-lg-6 ">

                                        <!-- Start Guest Post Order View Section -->
                                        <div class=" table-responsive py-3 p-1">
                                            <?php if (count($myOrders) > 0 ) { ?>

                                            <div class="card table-responsive db_shadow border-0 p-2">
                                                <h4>Recent Guest Posts</h4>
                                                <table class="table  table-hover">
                                                    <thead class="table-light">
                                                        <tr>
                                                            <th scope="col">Order Id</th>
                                                            <th scope="col">Domain/Service</th>
                                                            <th scope="col">Status</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                                $showItems = 1;
                                                                foreach ($myOrders as $order) {
                                                                    $status = $OrderStatus->singleOrderStatus($order['order_status']);
                                                                    echo '
                                                                    
                                                                    <tr>
                                                                        <td><a href="guest-post-article-submit.php?order='.base64_encode(urlencode($order["order_id"])).'">#'.$order["order_id"].'</a></td>
                                                                        <td><a href="guest-post-article-submit.php?order='.base64_encode(urlencode($order["order_id"])).'">'.$order['clientOrderedSite'].'</a></td>
                                                                        <td><a href="guest-post-article-submit.php?order='.base64_encode(urlencode($order["order_id"])).'"> <span class="badge text-bg-primary '.$status[0]["orders_status_name"].'">'.$status[0]["orders_status_name"].'<span></a></td>
                                                                    </tr>
                                                                    ';
                                                                    if ($showItems++ == 8) {
                                                                        break;
                                                                    }
                                                                }
                                                            ?>
                                                    </tbody>
                                                </table>
                                            </div>

                                            <?php } else { ?>
                                            <div class="card table-responsive db_shadow border-1 border-danger p-2">
                                                <p
                                                    class="text-center text-danger d-flex flex-column align-items-center p-5">
                                                    <i class="fa-light fa-box-open fs-1"></i>
                                                    <span class="mt-n1 fs-6">No Recent Guest Post Order</span>
                                                    <a href="./blogs-list" class="badge text-bg-primary mt-2 w-25">Order
                                                        Now</a>
                                                </p>
                                            </div>
                                            <?php } ?>
                                        </div>
                                        <!-- eof Guest Post Order View Section -->


                                        <!-- Start Package Order View Section -->
                                        <div class=" table-responsive py-3 p-1">
                                            <?php if ($packageOrderCount > 0 ) { ?>

                                            <div class="card table-responsive db_shadow border-0 p-2">
                                                <h4 class="border-bottom border-2">Recent Guest Posts</h4>
                                                <table class="table  table-hover">
                                                    <thead class="table-light">
                                                        <tr>
                                                            <th scope="col">Order Id</th>
                                                            <th scope="col">Package/Service</th>
                                                            <th scope="col">Status</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                                $showItems = 1;
                                                                foreach ($packOrdDtls as $eachPack) {
                                                                    // print_r($eachPack);
                                                                    $thePack    = $GPPackage->packDetailsById($eachPack['package_id']);
                                                                    
                                                                    $packageCat = $GPPackage->packCatById($thePack['category_id']);
                                                                    $ordPackName = $packageCat['category_name'].' '.$thePack['package_name'];

                                                                    $status = $OrderStatus->singleOrderStatus($eachPack['order_status']);
                                                                    echo '
                                                                    
                                                                    <tr onclick="goTo(\'package-order-history.php?order='.base64_encode(urlencode($eachPack["order_id"])).'\')" class="cursor_pointer">
                                                                        <td>#'.$eachPack["order_id"].'</a></td>
                                                                        <td>'.$ordPackName.'</td>
                                                                        <td><span class="badge text-bg-primary '.$status[0]["orders_status_name"].'">'.$status[0]["orders_status_name"].'<span></td>
                                                                    </tr>
                                                                    ';
                                                                    if ($showItems++ == 8) {
                                                                        break;
                                                                    }
                                                                }
                                                            ?>
                                                    </tbody>
                                                </table>
                                            </div>

                                            <?php } else { ?>
                                            <div class="card db_shadow border-1 border-danger p-2">
                                                <p
                                                    class="text-center text-danger d-flex flex-column align-items-center p-5">
                                                    <i class="fa-light fa-clipboard fs-1"></i>
                                                    <span class="mt-n1 fs-6">No Recent Package Order</span>
                                                    <a href="./blogs-list" class="badge text-bg-primary mt-2 w-25">
                                                        Order Now
                                                    </a>
                                                </p>
                                            </div>
                                            <?php } ?>
                                        </div>
                                        <!-- eof Package Order View Section -->
                                    </div>
                                    <!-- end col  -->

                                    <div class=" col-lg-6">
                                        <a href="notifications.php">
                                            <div class="pt-3 pb-0 p-0">
                                                <h4 class="text-dark">Recent Notification</h4>
                                                <div class="alert alert-warning db_shadow" role="alert">
                                                    <strong> No Notifications</strong>
                                                </div>
                                            </div>
                                        </a>
                                        <div class="col-lg-12 mt-5">
                                            <a href="./exclusive-guest-post.php">
                                                <div class="card package-details-pricing-crd db_shadow pb-5">
                                                    <h4> Exclusive Blogs </h4>
                                                    <div class="m-auto p-5 bg-light text-primary rounded">
                                                        <h1>Coming Soon..</h1>
                                                        <p class="text-primary">Some Exclusive Guest Posting Sites are
                                                            cooming soon!</p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Row end-->
                    </div>
                </div>
                <!-- //end display table-->

            </div>
        </div>
        <!-- js-->
        <script src="<?php echo URL;?>/plugins/jquery-3.6.0.min.js"></script>
        <script src="<?php echo URL;?>/plugins/bootstrap-5.2.0/js/bootstrap.bundle.js"></script>

        <!-- Switch Customer Type -->
        <script src="<?php echo URL;?>/js/customerSwitchMode.js"></script>

        <!-- Custom Javascript  -->
        <script src="<?php echo URL;?>/js/script.js"></script>
</body>

</html>