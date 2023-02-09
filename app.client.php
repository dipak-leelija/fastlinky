<?php
session_start();
require_once "_config/dbconnect.php";
require_once "_config/dbconnect.trait.php";

require_once "includes/constant.inc.php";

require_once "classes/customer.class.php";
require_once "classes/utility.class.php";
require_once "classes/wishList.class.php";

$customer		= new Customer();
$WishList       = new WishList();
$utility		= new Utility();
######################################################################################################################
$typeM		= $utility->returnGetVar('typeM','');
//user id
$cusId		= $utility->returnSess('userid', 0);
$cusDtl		= $customer->getCustomerData($cusId);

// redirect to dashboard if the user is not a seller 
require_once 'includes/check-customer.php';


$wishes = $WishList->countWishlistByUser($cusId);

?>
<!DOCTYPE HTML>
<html lang="zxx">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User Dashboard | <?php echo COMPANY_S; ?></title>
    <link rel="shortcut icon" href="images/logo/favicon.png" type="image/png"/>
    <link rel="apple-touch-icon" href="images/logo/favicon.png" />
   
    <link href="plugins/bootstrap-5.2.0/css/bootstrap.css" rel='stylesheet' type='text/css' />
	<link href="plugins/fontawesome-6.1.1/css/all.css" rel='stylesheet' type='text/css' />

    <!-- Custom CSS -->
    <link href="css/style.css" rel='stylesheet' type='text/css' />
    <link href="css/dashboard.css" rel='stylesheet' type='text/css' />
    <link href="css/leelija.css" rel="stylesheet">

</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">
    <div id="home">

        <!-- header -->
        <?php require_once "partials/navbar.php"; ?>
        <!-- //header -->
        
        <!-- banner -->
        <div class="edit_profile"  style="overflow: hidden;">
            <div class="container-fluid1">
                <div class=" display-table">
                    <div class="row ">
                        <!--Row start-->
                        <div class="col-md-3 col-sm-12 hidden-xs display-table-cell v-align" id="navigation">

                            <div class="client_profile_dashboard_left">
                                <?php include("dashboard-inc.php");?>
                                <hr>
                            </div>

                        </div>
                        <div class="col-md-9 mt-4 pl-0 display-table-cell v-align client_profile_dashboard_right">
                            <div class="container pl-0">
                                <header>
                                    <div class="add_project_section text-right">
                                        <div class=" display-table">
                                            <!-- start display-->
                                            <div class="grid_1">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="dbox">
                                                            <ul class="list1">
                                                                <li class="list1_right">
                                                                    <a href="wishlist.php">
                                                                        <p>Wishlist</p><span
                                                                            class="d-block text-center"><?php echo $wishes; ?></span>
                                                                    </a>
                                                                </li>
                                                                <div class="clearfix"> </div>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="dbox">
                                                            <ul class="list1">
                                                                <li class="list1_right">
                                                                    <p>Balance</p> <span
                                                                        class="d-block text-center text-white">$</span>
                                                                </li>
                                                                <div class="clearfix"> </div>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="dbox">
                                                            <ul class="list1">
                                                                <li class="list1_right">
                                                                    <p>My Reward</p><span
                                                                        class="d-block text-center text-white">0</span>
                                                                </li>
                                                                <div class="clearfix"> </div>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                   
                                                </div>
                                            </div>
                                        </div><!-- end display //-->

                                    </div>
                                </header>

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