<?php
session_start();
require_once("includes/constant.inc.php");

require_once("_config/dbconnect.php");

require_once("classes/search.class.php");
require_once("classes/customer.class.php");

require_once("classes/blog_mst.class.php");
require_once("classes/utility.class.php");


/* INSTANTIATING CLASSES */
// $dateUtil      	= new DateUtil();
$search_obj		= new Search();
$customer		= new Customer();

$blogMst		= new BlogMst();
$utility		= new Utility();
######################################################################################################################
$typeM		= $utility->returnGetVar('typeM','');
//user id
$cusId		= $utility->returnSess('userid', 0);
$cusDtl		= $customer->getCustomerData($cusId);

if($cusId == 0){
    header("Location: index.php");
}

if($cusDtl[0][0] == 0){
	header("Location: index.php");
}

if($cusDtl[0][0] == 3){ 
	header("Location: app.client.php");
}


?>
<!DOCTYPE HTML>
<html lang="zxx">

<head>
    <title>Seller Dashboard :: <?php echo COMPANY_S; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <meta name="robots" content="noindex,nofollow">

    <!-- Plugins Files -->
    <link href="<?= URL ?>/plugins/bootstrap-5.2.0/css/bootstrap.css" rel="stylesheet" />
    <?php require_once ROOT_DIR.'/plugins/font-awesome/fontawesome.php'?>

    <!-- Custom CSS -->
    <link href="<?= URL ?>/css/style.css" rel='stylesheet' type='text/css' />
    <link href="<?= URL ?>/css/form.css" rel='stylesheet' type='text/css' />
    <link href="<?= URL ?>/css/dashboard.css" rel='stylesheet' type='text/css' />
    <link href="<?= URL ?>/css/notification-client.css" rel='stylesheet' type='text/css' />

    <style>
    .toast:not(.show) {
        display: inherit !important;
    }

    .toast {
        --bs-toast-padding-x: 0.75rem;
        --bs-toast-padding-y: 0.5rem;
        --bs-toast-spacing: 1.5rem;
        --bs-toast-max-width: 350px;
        --bs-toast-box-shadow: none !important;
        width: 100% !important;
        --bs-toast-border-color: none;
    }
    </style>
</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">
    <div id="home">
        <!-- header -->
        <?php require_once 'components/navbar.php'; ?>
        <!-- //header -->
        <div class="edit_profile" style="overflow: hidden;">
            <div class="container-fluid1">
                <div class=" display-table">
                    <div class="row ">
                        <!--Row start-->
                        <div class="col-md-3 hidden-xs display-table-cell v-align" id="navigation">
                            <div class="client_profile_dashboard_left">
                                <?php include("dashboard-inc.php");?>
                            </div>
                        </div>
                        <div class="col-md-9  display-table-cell v-align client_profile_dashboard_right">
                            <div class="toast">
                                <h2 class="notice-title">Notifications <i class="fa-solid fa-bell fa-shake"></i></h2>
                                <!-- notification-1 -->
                                <div class="notification-main-division my-2 item_order_bx coloring-cd">
                                    <div class="row">
                                        <div
                                            class="col-xl-1 ps-xl-1 col-lg-2 col-md-2 col-sm-2 col-3 m-auto image-column-div">
                                            <div>
                                                <img src="images/emps/rozy-begum.jpg"
                                                    class="notify-person-img rounded me-2" alt="...">
                                            </div>
                                        </div>
                                        <div class="col-xl-10 col-lg-8 col-md-8 col-sm-8 col-9 info-column-div">
                                            <div class="notification-para">
                                                <p class="notify-body">
                                                    <strong class="person-name">Rozy hayat</strong> created a new
                                                    website.
                                                </p>
                                                <p class="notify-body">Lorem ipsum dolor sit,Lorem ipsum, dolor sit amet
                                                    consectetur adipisicing elit.</p>
                                                <p class="notify-body"> <small class="notify-time">11 mins ago</small>
                                                </p>
                                            </div>

                                        </div>
                                        <div
                                            class="col-xl-1 col-lg-2 col-md-2 col-sm-2 d-sm-inline-block    justify-content-end d-none m-auto">
                                            <div style=" text-align: end;">
                                                <img src="images/portfolio/2.jpg" class="notify-post-img rounded me-2"
                                                    alt="...">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- notification-1 end-->
                                <!-- notification-2 -->
                                <div class="notification-main-division my-2 item_order_bx coloring-cd">
                                    <div class="row">
                                        <div
                                            class="col-xl-1 ps-xl-1 col-lg-2 col-md-2 col-sm-2 col-3 m-auto image-column-div">
                                            <div>
                                                <img src="images/portfolio/author.jpeg"
                                                    class="notify-person-img rounded me-2" alt="...">
                                            </div>
                                        </div>
                                        <div class="col-xl-10 col-lg-8 col-md-8 col-sm-8 col-9 info-column-div">
                                            <div class="notification-para">
                                                <p class="notify-body">
                                                    <strong class="person-name">Hande Ircel</strong> created a new
                                                    website.
                                                </p>
                                                <p class="notify-body">Lorem ipsum dolor sit,Lorem ipsum, dolor sit amet
                                                    consectetur adipisicing elit.</p>
                                                <p class="notify-body"> <small class="notify-time">11 mins ago</small>
                                                </p>
                                            </div>

                                        </div>
                                        <div
                                            class="col-xl-1 col-lg-2 col-md-2 col-sm-2 d-sm-inline-block    justify-content-end d-none m-auto">
                                            <div style=" text-align: end;">
                                                <img src="images/portfolio/1.jpg" class="notify-post-img rounded me-2"
                                                    alt="...">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- notification-2 end-->
                                <!-- notification-3 -->
                                <div class="notification-main-division my-2 item_order_bx coloring-cd">
                                    <div class="row">
                                        <div
                                            class="col-xl-1 ps-xl-1 col-lg-2 col-md-2 col-sm-2 col-3 m-auto image-column-div">
                                            <div>
                                                <img src="images/portfolio/2.jpg" class="notify-person-img rounded me-2"
                                                    alt="...">
                                            </div>
                                        </div>
                                        <div class="col-xl-10 col-lg-8 col-md-8 col-sm-8 col-9 info-column-div">
                                            <div class="notification-para">
                                                <p class="notify-body">
                                                    <strong class="person-name">Rahul </strong> created a new
                                                    website.
                                                </p>
                                                <p class="notify-body">Lorem ipsum dolor sit,Lorem ipsum, dolor sit amet
                                                    consectetur adipisicing elit.</p>
                                                <p class="notify-body"> <small class="notify-time">11 mins ago</small>
                                                </p>
                                            </div>

                                        </div>
                                        <div
                                            class="col-xl-1 col-lg-2 col-md-2 col-sm-2 d-sm-inline-block    justify-content-end d-none m-auto">
                                            <div style=" text-align: end;">
                                                <img src="images/emps/rozy-begum.jpg"
                                                    class="notify-post-img rounded me-2" alt="...">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- notification-3 end -->
                                <!-- notification-4 -->
                                <div class="notification-main-division my-2 item_order_bx coloring-cd">
                                    <div class="row">
                                        <div
                                            class="col-xl-1 ps-xl-1 col-lg-2 col-md-2 col-sm-2 col-3 m-auto image-column-div">
                                            <div>
                                                <img src="images/portfolio/1.jpg" class="notify-person-img rounded me-2"
                                                    alt="...">
                                            </div>
                                        </div>
                                        <div class="col-xl-10 col-lg-8 col-md-8 col-sm-8 col-9 info-column-div">
                                            <div class="notification-para">
                                                <p class="notify-body">
                                                    <strong class="person-name">Krusal</strong> created a new
                                                    website.
                                                </p>
                                                <p class="notify-body">Lorem ipsum dolor sit,Lorem ipsum, dolor sit amet
                                                    consectetur adipisicing elit.</p>
                                                <p class="notify-body"> <small class="notify-time">11 mins ago</small>
                                                </p>
                                            </div>

                                        </div>
                                        <div
                                            class="col-xl-1 col-lg-2 col-md-2 col-sm-2 d-sm-inline-block    justify-content-end d-none m-auto">
                                            <div style=" text-align: end;">
                                                <img src="images/portfolio/author.jpeg"
                                                    class="notify-post-img rounded me-2" alt="...">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- notification-4 end -->
                                <!-- notification-5 -->
                                <div class="notification-main-division my-2 item_order_bx coloring-cd">
                                    <div class="row">
                                        <div
                                            class="col-xl-1 ps-xl-1 col-lg-2 col-md-2 col-sm-2 col-3 m-auto image-column-div">
                                            <div>
                                                <img src="images/emps/rozy-begum.jpg"
                                                    class="notify-person-img rounded me-2" alt="...">
                                            </div>
                                        </div>
                                        <div class="col-xl-10 col-lg-8 col-md-8 col-sm-8 col-9 info-column-div">
                                            <div class="notification-para">
                                                <p class="notify-body">
                                                    <strong class="person-name">Rozy hayat</strong> created a new
                                                    website.
                                                </p>
                                                <p class="notify-body">Lorem ipsum dolor sit,Lorem ipsum, dolor sit amet
                                                    consectetur adipisicing elit.</p>
                                                <p class="notify-body"> <small class="notify-time">11 mins ago</small>
                                                </p>
                                            </div>

                                        </div>
                                        <div
                                            class="col-xl-1 col-lg-2 col-md-2 col-sm-2 d-sm-inline-block    justify-content-end d-none m-auto">
                                            <div style=" text-align: end;">
                                                <img src="images/portfolio/2.jpg" class="notify-post-img rounded me-2"
                                                    alt="...">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- notification-5 end-->
                                <!-- notification-6 -->
                                <div class="notification-main-division my-2 item_order_bx coloring-cd">
                                    <div class="row">
                                        <div
                                            class="col-xl-1 ps-xl-1 col-lg-2 col-md-2 col-sm-2 col-3 m-auto image-column-div">
                                            <div>
                                                <img src="images/portfolio/author.jpeg"
                                                    class="notify-person-img rounded me-2" alt="...">
                                            </div>
                                        </div>
                                        <div class="col-xl-10 col-lg-8 col-md-8 col-sm-8 col-9 info-column-div">
                                            <div class="notification-para">
                                                <p class="notify-body">
                                                    <strong class="person-name">Hande Ircel</strong> created a new
                                                    website.
                                                </p>
                                                <p class="notify-body">Lorem ipsum dolor sit,Lorem ipsum, dolor sit amet
                                                    consectetur adipisicing elit.</p>
                                                <p class="notify-body"> <small class="notify-time">11 mins ago</small>
                                                </p>
                                            </div>

                                        </div>
                                        <div
                                            class="col-xl-1 col-lg-2 col-md-2 col-sm-2 d-sm-inline-block    justify-content-end d-none m-auto">
                                            <div style=" text-align: end;">
                                                <img src="images/portfolio/1.jpg" class="notify-post-img rounded me-2"
                                                    alt="...">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- notification-6 end-->
                                <!-- notification-7 -->
                                <div class="notification-main-division my-2 item_order_bx coloring-cd">
                                    <div class="row">
                                        <div
                                            class="col-xl-1 ps-xl-1 col-lg-2 col-md-2 col-sm-2 col-3 m-auto image-column-div">
                                            <div>
                                                <img src="images/portfolio/2.jpg" class="notify-person-img rounded me-2"
                                                    alt="...">
                                            </div>
                                        </div>
                                        <div class="col-xl-10 col-lg-8 col-md-8 col-sm-8 col-9 info-column-div">
                                            <div class="notification-para">
                                                <p class="notify-body">
                                                    <strong class="person-name">Rahul </strong> created a new
                                                    website.
                                                </p>
                                                <p class="notify-body">Lorem ipsum dolor sit,Lorem ipsum, dolor sit amet
                                                    consectetur adipisicing elit.</p>
                                                <p class="notify-body"> <small class="notify-time">11 mins ago</small>
                                                </p>
                                            </div>

                                        </div>
                                        <div
                                            class="col-xl-1 col-lg-2 col-md-2 col-sm-2 d-sm-inline-block    justify-content-end d-none m-auto">
                                            <div style=" text-align: end;">
                                                <img src="images/emps/rozy-begum.jpg"
                                                    class="notify-post-img rounded me-2" alt="...">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- notification-7 end -->
                                <!-- notification-8 -->
                                <div class="notification-main-division my-2 item_order_bx coloring-cd">
                                    <div class="row">
                                        <div
                                            class="col-xl-1 ps-xl-1 col-lg-2 col-md-2 col-sm-2 col-3 m-auto image-column-div">
                                            <div>
                                                <img src="images/portfolio/1.jpg" class="notify-person-img rounded me-2"
                                                    alt="...">
                                            </div>
                                        </div>
                                        <div class="col-xl-10 col-lg-8 col-md-8 col-sm-8 col-9 info-column-div">
                                            <div class="notification-para">
                                                <p class="notify-body">
                                                    <strong class="person-name">Krusal</strong> created a new
                                                    website.
                                                </p>
                                                <p class="notify-body">Lorem ipsum dolor sit,Lorem ipsum, dolor sit amet
                                                    consectetur adipisicing elit.</p>
                                                <p class="notify-body"> <small class="notify-time">11 mins ago</small>
                                                </p>
                                            </div>

                                        </div>
                                        <div
                                            class="col-xl-1 col-lg-2 col-md-2 col-sm-2 d-sm-inline-block    justify-content-end d-none m-auto">
                                            <div style=" text-align: end;">
                                                <img src="images/portfolio/author.jpeg"
                                                    class="notify-post-img rounded me-2" alt="...">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- notification-8 end -->
                                <!-- notification-9 -->
                                <div class="notification-main-division my-2 item_order_bx coloring-cd">
                                    <div class="row">
                                        <div
                                            class="col-xl-1 ps-xl-1 col-lg-2 col-md-2 col-sm-2 col-3 m-auto image-column-div">
                                            <div>
                                                <img src="images/emps/rozy-begum.jpg"
                                                    class="notify-person-img rounded me-2" alt="...">
                                            </div>
                                        </div>
                                        <div class="col-xl-10 col-lg-8 col-md-8 col-sm-8 col-9 info-column-div">
                                            <div class="notification-para">
                                                <p class="notify-body">
                                                    <strong class="person-name">Rozy hayat</strong> created a new
                                                    website.
                                                </p>
                                                <p class="notify-body">Lorem ipsum dolor sit,Lorem ipsum, dolor sit amet
                                                    consectetur adipisicing elit.</p>
                                                <p class="notify-body"> <small class="notify-time">11 mins ago</small>
                                                </p>
                                            </div>

                                        </div>
                                        <div
                                            class="col-xl-1 col-lg-2 col-md-2 col-sm-2 d-sm-inline-block    justify-content-end d-none m-auto">
                                            <div style=" text-align: end;">
                                                <img src="images/portfolio/2.jpg" class="notify-post-img rounded me-2"
                                                    alt="...">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- notification-9 end-->
                                <!-- notification-10 -->
                                <div class="notification-main-division my-2 item_order_bx coloring-cd">
                                    <div class="row">
                                        <div
                                            class="col-xl-1 ps-xl-1 col-lg-2 col-md-2 col-sm-2 col-3 m-auto image-column-div">
                                            <div>
                                                <img src="images/portfolio/author.jpeg"
                                                    class="notify-person-img rounded me-2" alt="...">
                                            </div>
                                        </div>
                                        <div class="col-xl-10 col-lg-8 col-md-8 col-sm-8 col-9 info-column-div">
                                            <div class="notification-para">
                                                <p class="notify-body">
                                                    <strong class="person-name">Hande Ircel</strong> created a new
                                                    website.
                                                </p>
                                                <p class="notify-body">Lorem ipsum dolor sit,Lorem ipsum, dolor sit amet
                                                    consectetur adipisicing elit.</p>
                                                <p class="notify-body"> <small class="notify-time">11 mins ago</small>
                                                </p>
                                            </div>

                                        </div>
                                        <div
                                            class="col-xl-1 col-lg-2 col-md-2 col-sm-2 d-sm-inline-block    justify-content-end d-none m-auto">
                                            <div style=" text-align: end;">
                                                <img src="images/portfolio/1.jpg" class="notify-post-img rounded me-2"
                                                    alt="...">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- notification-10 end-->
                                <!-- notification-11 -->
                                <div class="notification-main-division my-2 item_order_bx coloring-cd">
                                    <div class="row">
                                        <div
                                            class="col-xl-1 ps-xl-1 col-lg-2 col-md-2 col-sm-2 col-3 m-auto image-column-div">
                                            <div>
                                                <img src="images/portfolio/2.jpg" class="notify-person-img rounded me-2"
                                                    alt="...">
                                            </div>
                                        </div>
                                        <div class="col-xl-10 col-lg-8 col-md-8 col-sm-8 col-9 info-column-div">
                                            <div class="notification-para">
                                                <p class="notify-body">
                                                    <strong class="person-name">Rahul </strong> created a new
                                                    website.
                                                </p>
                                                <p class="notify-body">Lorem ipsum dolor sit,Lorem ipsum, dolor sit amet
                                                    consectetur adipisicing elit.</p>
                                                <p class="notify-body"> <small class="notify-time">11 mins ago</small>
                                                </p>
                                            </div>

                                        </div>
                                        <div
                                            class="col-xl-1 col-lg-2 col-md-2 col-sm-2 d-sm-inline-block    justify-content-end d-none m-auto">
                                            <div style=" text-align: end;">
                                                <img src="images/emps/rozy-begum.jpg"
                                                    class="notify-post-img rounded me-2" alt="...">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- notification-11 end -->
                                <!-- notification-12 -->
                                <div class="notification-main-division my-2 item_order_bx coloring-cd">
                                    <div class="row">
                                        <div
                                            class="col-xl-1 ps-xl-1 col-lg-2 col-md-2 col-sm-2 col-3 m-auto image-column-div">
                                            <div>
                                                <img src="images/portfolio/1.jpg" class="notify-person-img rounded me-2"
                                                    alt="...">
                                            </div>
                                        </div>
                                        <div class="col-xl-10 col-lg-8 col-md-8 col-sm-8 col-9 info-column-div">
                                            <div class="notification-para">
                                                <p class="notify-body">
                                                    <strong class="person-name">Krusal</strong> created a new
                                                    website.
                                                </p>
                                                <p class="notify-body">Lorem ipsum dolor sit,Lorem ipsum, dolor sit amet
                                                    consectetur adipisicing elit.</p>
                                                <p class="notify-body"> <small class="notify-time">11 mins ago</small>
                                                </p>
                                            </div>

                                        </div>
                                        <div
                                            class="col-xl-1 col-lg-2 col-md-2 col-sm-2 d-sm-inline-block    justify-content-end d-none m-auto">
                                            <div style=" text-align: end;">
                                                <img src="images/portfolio/author.jpeg"
                                                    class="notify-post-img rounded me-2" alt="...">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- notification-12 end -->
                                <!-- notification-13 -->
                                <div class="notification-main-division my-2 item_order_bx coloring-cd">
                                    <div class="row">
                                        <div
                                            class="col-xl-1 ps-xl-1 col-lg-2 col-md-2 col-sm-2 col-3 m-auto image-column-div">
                                            <div>
                                                <img src="images/emps/rozy-begum.jpg"
                                                    class="notify-person-img rounded me-2" alt="...">
                                            </div>
                                        </div>
                                        <div class="col-xl-10 col-lg-8 col-md-8 col-sm-8 col-9 info-column-div">
                                            <div class="notification-para">
                                                <p class="notify-body">
                                                    <strong class="person-name">Rozy hayat</strong> created a new
                                                    website.
                                                </p>
                                                <p class="notify-body">Lorem ipsum dolor sit,Lorem ipsum, dolor sit amet
                                                    consectetur adipisicing elit.</p>
                                                <p class="notify-body"> <small class="notify-time">11 mins ago</small>
                                                </p>
                                            </div>

                                        </div>
                                        <div
                                            class="col-xl-1 col-lg-2 col-md-2 col-sm-2 d-sm-inline-block    justify-content-end d-none m-auto">
                                            <div style=" text-align: end;">
                                                <img src="images/portfolio/2.jpg" class="notify-post-img rounded me-2"
                                                    alt="...">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- notification-13 end-->
                                <!-- notification-14 -->
                                <div class="notification-main-division my-2 item_order_bx coloring-cd">
                                    <div class="row">
                                        <div
                                            class="col-xl-1 ps-xl-1 col-lg-2 col-md-2 col-sm-2 col-3 m-auto image-column-div">
                                            <div>
                                                <img src="images/portfolio/author.jpeg"
                                                    class="notify-person-img rounded me-2" alt="...">
                                            </div>
                                        </div>
                                        <div class="col-xl-10 col-lg-8 col-md-8 col-sm-8 col-9 info-column-div">
                                            <div class="notification-para">
                                                <p class="notify-body">
                                                    <strong class="person-name">Hande Ircel</strong> created a new
                                                    website.
                                                </p>
                                                <p class="notify-body">Lorem ipsum dolor sit,Lorem ipsum, dolor sit amet
                                                    consectetur adipisicing elit.</p>
                                                <p class="notify-body"> <small class="notify-time">11 mins ago</small>
                                                </p>
                                            </div>

                                        </div>
                                        <div
                                            class="col-xl-1 col-lg-2 col-md-2 col-sm-2 d-sm-inline-block    justify-content-end d-none m-auto">
                                            <div style=" text-align: end;">
                                                <img src="images/portfolio/1.jpg" class="notify-post-img rounded me-2"
                                                    alt="...">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- notification-14 end-->
                                <!-- notification-15 -->
                                <div class="notification-main-division my-2 item_order_bx coloring-cd">
                                    <div class="row">
                                        <div
                                            class="col-xl-1 ps-xl-1 col-lg-2 col-md-2 col-sm-2 col-3 m-auto image-column-div">
                                            <div>
                                                <img src="images/portfolio/2.jpg" class="notify-person-img rounded me-2"
                                                    alt="...">
                                            </div>
                                        </div>
                                        <div class="col-xl-10 col-lg-8 col-md-8 col-sm-8 col-9 info-column-div">
                                            <div class="notification-para">
                                                <p class="notify-body">
                                                    <strong class="person-name">Rahul </strong> created a new
                                                    website.
                                                </p>
                                                <p class="notify-body">Lorem ipsum dolor sit,Lorem ipsum, dolor sit amet
                                                    consectetur adipisicing elit.</p>
                                                <p class="notify-body"> <small class="notify-time">11 mins ago</small>
                                                </p>
                                            </div>

                                        </div>
                                        <div
                                            class="col-xl-1 col-lg-2 col-md-2 col-sm-2 d-sm-inline-block    justify-content-end d-none m-auto">
                                            <div style=" text-align: end;">
                                                <img src="images/emps/rozy-begum.jpg"
                                                    class="notify-post-img rounded me-2" alt="...">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- notification-15 end -->
                                <!-- notification-16 -->
                                <div class="notification-main-division my-2 item_order_bx coloring-cd">
                                    <div class="row">
                                        <div
                                            class="col-xl-1 ps-xl-1 col-lg-2 col-md-2 col-sm-2 col-3 m-auto image-column-div">
                                            <div>
                                                <img src="images/portfolio/1.jpg" class="notify-person-img rounded me-2"
                                                    alt="...">
                                            </div>
                                        </div>
                                        <div class="col-xl-10 col-lg-8 col-md-8 col-sm-8 col-9 info-column-div">
                                            <div class="notification-para">
                                                <p class="notify-body">
                                                    <strong class="person-name">Krusal</strong> created a new
                                                    website.
                                                </p>
                                                <p class="notify-body">Lorem ipsum dolor sit,Lorem ipsum, dolor sit amet
                                                    consectetur adipisicing elit.</p>
                                                <p class="notify-body"> <small class="notify-time">11 mins ago</small>
                                                </p>
                                            </div>

                                        </div>
                                        <div
                                            class="col-xl-1 col-lg-2 col-md-2 col-sm-2 d-sm-inline-block    justify-content-end d-none m-auto">
                                            <div style=" text-align: end;">
                                                <img src="images/portfolio/author.jpeg"
                                                    class="notify-post-img rounded me-2" alt="...">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- notification-16 end -->
                            </div>
                        </div>
                        <!--Row end-->
                    </div>

                    <!-- Modal -->
                    <div id="add_project" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header login-header">
                                    <button type="button" class="close" data-dismiss="modal">×</button>
                                    <h4 class="modal-title">Add Project</h4>
                                </div>
                                <div class="modal-body">
                                    <input type="text" placeholder="Project Title" name="name">
                                    <input type="text" placeholder="Post of Post" name="mail">
                                    <input type="text" placeholder="Author" name="passsword">
                                    <textarea placeholder="Desicrption"></textarea>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="cancel" data-dismiss="modal">Close</button>
                                    <button type="button" class="add-project" data-dismiss="modal">Save</button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- //end display table-->
            </div>
        </div>
        <!-- js-->
        <script src="<?= URL ?>/plugins/jquery-3.6.0.min.js"></script>
        <script src="<?= URL ?>/js/ajax.js"></script>
        <script src="<?= URL ?>/js/customerSwitchMode.js"></script>
        <!-- js-->
        <script>
        /* jQuery Pagination */
        (function($) {

            var paginate = {
                startPos: function(pageNumber, perPage) {
                    return pageNumber * perPage;
                },

                getPage: function(items, startPos, perPage) {
                    var page = [];
                    items = items.slice(startPos, items.length);
                    for (var i = 0; i < perPage; i++) {
                        page.push(items[i]);
                    }
                    return page;
                },

                totalPages: function(items, perPage) {
                    return Math.ceil(items.length / perPage);
                },

                createBtns: function(totalPages, currentPage) {
                    var pagination = $('<div class="pagination" />');
                    pagination.append('<span class="pagination-button">&laquo;</span>');
                    for (var i = 1; i <= totalPages; i++) {
                        if (totalPages > 5 && currentPage !== i) {
                            if (currentPage === 1 || currentPage === 2) {
                                if (i > 5) continue;
                            } else if (currentPage === totalPages || currentPage === totalPages - 1) {
                                if (i < totalPages - 4) continue;
                            } else {
                                if (i < currentPage - 2 || i > currentPage + 2) {
                                    continue;
                                }
                            }
                        }
                        var pageBtn = $('<span class="pagination-button page-num" />');
                        if (i == currentPage) {
                            pageBtn.addClass('active');
                        }
                        pageBtn.text(i);
                        pagination.append(pageBtn);
                    }
                    pagination.append($('<span class="pagination-button">&raquo;</span>'));
                    return pagination;
                },

                createPage: function(items, currentPage, perPage) {
                    $('.pagination').remove();
                    var container = items.parent(),
                        items = items.detach().toArray(),
                        startPos = this.startPos(currentPage - 1, perPage),
                        page = this.getPage(items, startPos, perPage);
                    $.each(page, function() {
                        if (this.window === undefined) {
                            container.append($(this));
                        }
                    });
                    var totalPages = this.totalPages(items, perPage),
                        pageButtons = this.createBtns(totalPages, currentPage);

                    container.after(pageButtons);
                }
            };
            $.fn.paginate = function(perPage) {
                var items = $(this);

                if (isNaN(perPage) || perPage === undefined) {
                    perPage = 5;
                }

                if (items.length <= perPage) {
                    return true;
                }
                if (items.length !== items.parent()[0].children.length) {
                    items.wrapAll('<div class="pagination-items" />');
                }

                paginate.createPage(items, 1, perPage);
                $(document).on('click', '.pagination-button', function(e) {
                    var currentPage = parseInt($('.pagination-button.active').text(), 10),
                        newPage = currentPage,
                        totalPages = paginate.totalPages(items, perPage),
                        target = $(e.target);
                    newPage = parseInt(target.text(), 10);
                    var i = currentPage;
                    i <= totalPages;
                    i++;
                    if (target.text() == '»') newPage = i++;
                    i--;
                    if (target.text() == '«') newPage = --i;
                    if (newPage > 0 && newPage <= totalPages) {
                        paginate.createPage(items, newPage, perPage);
                    }
                });
            };

        })(jQuery);

        $('.item_order_bx').paginate(7);
        </script>
        <script src="<?= URL ?>/js/pageplugs/toPageTop.js"></script>
        <script src="<?= URL ?>/js/SmoothScroll.min.js"></script>
        <script src="<?= URL ?>/js/bootstrap.js"></script>

</body>

</html>