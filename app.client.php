<?php
session_start();
require_once("_config/dbconnect.php");
require_once "_config/dbconnect.trait.php";

require_once("includes/constant.inc.php");
require_once("classes/customer.class.php");
require_once("classes/utility.class.php");
require_once "classes/wishList.class.php";

$customer		= new Customer();
$WishList       = new WishList();
$utility		= new Utility();
######################################################################################################################
$typeM		= $utility->returnGetVar('typeM','');
//user id
$cusId		= $utility->returnSess('userid', 0);
$cusDtl		= $customer->getCustomerData($cusId);
if($cusId == 0){
    header("Location: index.php");
}
// print_r($cusDtl[0][0]);exit;
if($cusDtl[0][0] == 2){
    header("Location: dashboard.php");
}

$wishes = $WishList->countWishlistByUser($cusId);
// $domainDtls	= $domain->ShowUserDomainData($cusDtl[0][2]);

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
    <link href="css/app.client.css" rel='stylesheet' type='text/css' />
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
                                                        <h3> 13 </h3>
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
                                                    <h3> $18538 </h3>
                                                    <p> Balance </p>
                                                </div>
                                                <div class="dboard-icn_font">
                                                    <i class="fa-solid fa-sack-dollar" aria-hidden="true"></i>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-sm-6">
                                            <div class="dboard-cd-box mt-md-0">
                                                <div class="inner">
                                                    <h3> 64 </h3>
                                                    <p> My Reward </p>
                                                </div>
                                                <div class="dboard-icn_font">
                                                    <i class="fa-solid fa-medal" aria-hidden="true"></i>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-sm-6">
                                            <a href="my-orders.php">
                                                <div class="dboard-cd-box mt-md-0">
                                                    <div class="inner">
                                                        <h3> 73 </h3>
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
                                    <div class=" col-lg-6 ">
                                        <div class=" table-responsive py-3 p-0">
                                            <h4>Guest Posting Details</h4>
                                            <a href="blogs-list.php">
                                                <div class="card table-responsive p-2"
                                                    style="border-left: 2px solid #FDA33B;">
                                                    <table class="table  table-hover">
                                                        <thead class="table-light">
                                                            <tr>
                                                                <th scope="col">#</th>
                                                                <th scope="col">First</th>
                                                                <th scope="col">Last</th>
                                                                <th scope="col">Handle</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <th scope="row">1</th>
                                                                <td>Mark</td>
                                                                <td>Otto</td>
                                                                <td>@mdo</td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">2</th>
                                                                <td>Jacob</td>
                                                                <td>Thornton</td>
                                                                <td>@fat</td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">3</th>
                                                                <td>Larry</td>
                                                                <td>the Bird</td>
                                                                <td>@twitter</td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">4</th>
                                                                <td>Larry</td>
                                                                <td>the Bird</td>
                                                                <td>@twitter</td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">5</th>
                                                                <td>Larry</td>
                                                                <td>the Bird</td>
                                                                <td>@twitter</td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">6</th>
                                                                <td>jarrt</td>
                                                                <td>the Bird</td>
                                                                <td>@twitter</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </a>
                                        </div>

                                    </div>
                                    <div class=" col-lg-6">
                                        <a href="notifications.php">
                                            <div class="pt-3 pb-0 p-0">
                                                <h4 style=" color: black;     ">Recent Notification</h4>
                                                <div class="alert alert-warning alert-dismissible fade show"
                                                    role="alert">
                                                    <strong>Holy guacamole!</strong> You should check in on some of
                                                    those
                                                    fields below.
                                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                        aria-label="Close"></button>
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