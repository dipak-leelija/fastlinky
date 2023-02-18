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
    <title>User Dashboard | Dashboard :: <?php echo COMPANY_S; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <script>
    addEventListener("load", function() {
        setTimeout(hideURLbar, 0);
    }, false);

    function hideURLbar() {
        window.scrollTo(0, 1);
    }
    </script>

    <!-- Bootstrap Core CSS -->
    <!-- <link href="css/bootstrap.css" rel='stylesheet' type='text/css' /> -->
	<link href="plugins/bootstrap-5.2.0/css/bootstrap.css" rel='stylesheet' type='text/css' />
	<link href="plugins/fontawesome-6.1.1/css/all.css" rel='stylesheet' type='text/css' />

    <!-- Custom CSS -->
    <link href="css/style.css" rel='stylesheet' type='text/css' />
    <link rel="stylesheet" href="css/leelija.css">

    <!-- <link href="css/about.css" rel='stylesheet' type='text/css' /> -->
    <!-- <link href="css/form.css" rel='stylesheet' type='text/css' /> -->
    <link href="css/dashboard.css" rel='stylesheet' type='text/css' />

    <link rel="shortcut icon" href="images/logo/favicon.png" type="image/png"/>
    <link rel="apple-touch-icon" href="images/logo/favicon.png" />
   
    <!--webfonts-->
    <link href="//fonts.googleapis.com/css?family=Ubuntu:300,300i,400,400i,500,500i,700,700i" rel="stylesheet">
    <!--//webfonts-->
    <link href="//fonts.googleapis.com/css?family=Montserrat:400,500,600,700,900" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Nunito+Sans:400,700,900" rel="stylesheet">
</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">
    <div id="home">
        <!-- header -->
        
        <?php 
            require_once "partials/navbar.php";
            // include('header-user-profile.php') ?>
        <!-- //header -->
        <!-- banner -->
        <div class="edit_profile"  style="overflow: hidden;">
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
                        <div class="col-md-9 mt-4 ps-md-0 display-table-cell v-align ">
                            <div class="container p-0">
                                <!--<button type="button" class="slide-toggle">Slide Toggle</button> -->
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