<?php
session_start();
require_once "includes/constant.inc.php";

require_once ROOT_DIR."/_config/dbconnect.php";
require_once ROOT_DIR."/_config/dbconnect.trait.php";

require_once ROOT_DIR."/classes/customer.class.php";
require_once ROOT_DIR."/classes/content-order.class.php";
require_once ROOT_DIR."/classes/gp-order.class.php";
require_once ROOT_DIR."/classes/orderStatus.class.php";
require_once ROOT_DIR."/classes/utility.class.php";
require_once ROOT_DIR."/classes/wishList.class.php";

$customer		= new Customer();
$ContentOrder   = new ContentOrder();
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
$packageOrdersIds   = $PackageOrder->countPackOrderByUser($cusId)


?>
<!DOCTYPE HTML>
<html lang="zxx">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User Dashboard - <?php echo COMPANY_S; ?></title>

    <!-- Bootstrap Core CSS -->
    <link href="plugins/bootstrap-5.2.0/css/bootstrap.css" rel='stylesheet' type='text/css' />
    <link href="plugins/fontawesome-6.1.1/css/all.css" rel='stylesheet' type='text/css' />

    <!-- Custom CSS -->
    <link href="css/style.css" rel='stylesheet' type='text/css' />
    <link href="css/leelija.css" rel="stylesheet" type='text/css'>
    <link href="css/dashboard.css" rel='stylesheet' type='text/css' />
    <link href="css/pricing-mainpage.css" rel='stylesheet' type='text/css' />
    <link rel="shortcut icon" href="images/logo/favicon.png" type="image/png" />
    <link rel="apple-touch-icon" href="images/logo/favicon.png" />
</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">
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
                            <div class="client_profile_dashboard_left">
                                <?php include("dashboard-inc.php");?>
                                <hr class="myhrline">
                            </div>
                        </div>
                        <div class="col-md-9 mt-0 ps-md-0 display-table-cell v-align ">
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
                                            <div class="dboard-cd-box mt-md-0">
                                                <div class="inner">
                                                    <h3> $00.00</h3>
                                                    <p> Balance </p>
                                                </div>
                                                <div class="dboard-icn_font">
                                                    <i class="fa-solid fa-sack-dollar" aria-hidden="true"></i>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-sm-6">
                                            <a href="my-orders.php">
                                                <div class="dboard-cd-box mt-md-0">
                                                    <div class="inner">
                                                        <h3><?php echo $packageOrdersIds + count($myOrders); ?> </h3>
                                                        <p> My Orders</p>
                                                    </div>
                                                    <div class="dboard-icn_font">
                                                        <i class="fa-solid fa-cart-shopping" aria-hidden="true"></i>
                                                    </div>

                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-lg-3 col-sm-6">
                                            <a href="edit-profile.php">
                                                <div class="dboard-cd-box mt-md-0 ">
                                                    <div class="inner">
                                                        <h3> 13 </h3>
                                                        <!-- <small>dipakmajumdar.leelija@gmail.com</small> -->
                                                        <!-- <p>7699753019</p> -->
                                                        <p>Setting</p>
                                                    </div>
                                                    <div class="dboard-icn_font" aria-hidden="true">
                                                        <i class="fa-solid fa-gears"></i>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>

                                </header>
                                <div class="row">
                                    <div class=" col-lg-6 ">
                                        <div class=" table-responsive py-3 p-0">
                                            <h4>Guest Posting Details</h4>
                                            <a href="blogs-list.php">
                                                <div class="card table-responsive p-2"
                                                    style="border-left: 2px solid #FDA33B;">
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
                                                             if (count($myOrders) > 0 ) {
                                                                $showItems = 1;
                                                                foreach ($myOrders as $order) {
                                                                    $status = $OrderStatus->singleOrderStatus($order['clientOrderStatus']);
                                                                    echo '<tr>
                                                                        <td>#'.$order["order_id"].'</td>
                                                                        <td>'.$order['clientOrderedSite'].'</td>
                                                                        <td> <span class="badge text-bg-primary">'.$status[0]["orders_status_name"].'<span></td>
                                                                    </tr>';
                                                                    if ($showItems++ > 8) {
                                                                        break;
                                                                    }
                                                                }
                                                            }
                                                            ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </a>
                                        </div>

                                    </div>
                                    <div class=" col-lg-6">
                                        <a href="notifications.php">
                                            <div class="pt-3 pb-0 p-0">
                                                <h4 class="text-dark">Recent Notification</h4>
                                                <div class="alert alert-warning alert-dismissible fade show"
                                                    role="alert">
                                                    <strong> No Notifications</strong>
                                                    <!-- <strong>Holy guacamole!</strong> You should check in on some of
                                                    those
                                                    fields below. -->
                                                </div>
                                            </div>
                                        </a>
                                        <div class="col-lg-12 ">
                                            <a href="customer-packages.php">
                                                <div class="card package-details-pricing-crd">
                                                    <h4> package Details </h4>
                                                    <img src="./images/package-pricingcard.png" class="w-100 pkg-img1"
                                                        alt="">
                                                    <img src="./images/package-pricingcard2.png" class="w-100 pkg-img2"
                                                        alt="">
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>


                                <div class="user-dashboard">
                                    <!-- Dashboard Body Start-->
                                    <div class="bfrom">
                                        <!--start from div-->

                                    </div>
                                </div><!-- Dashboard Body end //-->
                            </div>
                        </div>
                        <!--Row end-->
                    </div>

                </div>
                <!-- //end display table-->

            </div>
        </div>
        <!-- js-->
        <script src="plugins/jquery-3.6.0.min.js"></script>
        <script src="plugins/bootstrap-5.2.0/js/bootstrap.bundle.js"></script>
        <!-- Switch Customer Type -->
        <script src="js/customerSwitchMode.js"></script>
</body>

</html>