<?php 
require_once "../includes/constant.inc.php";
session_start();
include_once('checkSession.php');
require_once "../_config/dbconnect.php";

require_once("../classes/adminLogin.class.php"); 
require_once("../classes/date.class.php"); 
 
require_once("../classes/error.class.php"); 
require_once("../classes/customer.class.php"); 
require_once("../classes/countries.class.php");
require_once("../classes/category.class.php");
require_once("../classes/search.class.php");
require_once("../classes/pagination.class.php");
include_once('../classes/hits.class.php');
include_once('../classes/static.class.php');

require_once("../classes/utility.class.php"); 
require_once("../classes/utilityMesg.class.php"); 
require_once("../classes/utilityImage.class.php");
require_once("../classes/utilityNum.class.php");


/* INSTANTIATING CLASSES */
$adminLogin 	= new adminLogin();
$dateUtil      	= new DateUtil();
$error 			= new Error();
$country		= new Countries();
$cat			= new Cat();
$search_obj		= new Search();
$page			= new Pagination();
$hits			= new Hits();
$customer		= new Customer();
$static			= new StaticContent();


$utility		= new Utility();
$uMesg 			= new MesgUtility();
$uImg 			= new ImageUtility();
$uNum 			= new NumUtility();

#########################################################################################################################

$thisMonth		=  (int)date("m");
$thisYear		=  (int)date("Y");

if($thisMonth == 1){

	$month2		= 12;
	$year2		= $thisYear - 1;

}else{

	$month2		= $thisMonth - 1;
	$year2		= $thisYear;
}


if($month2 == 1){

	$month3		= 12;
	$year3		= $year2 - 1;

}else{

	$month3		= $month2 - 1;
	$year3		= $year2;
}


if($month3 == 1){

	$month4		= 12;
	$year4		= $year3 - 1;

}else{

	$month4		= $month3 - 1;
	$year4		= $year3;
}

$hits1			= $hits->getHitsByMonthYear($thisMonth, $thisYear);
$hits2			= $hits->getHitsByMonthYear($month2, $year2);
$hits3			= $hits->getHitsByMonthYear($month3, $year3);
$hits4			= $hits->getHitsByMonthYear($month4, $year4);

$user1			= $customer->getCustomerByMonthYear($thisMonth, $thisYear);
$user2			= $customer->getCustomerByMonthYear($month2, $year2);
$user3			= $customer->getCustomerByMonthYear($month3, $year3);
$user4			= $customer->getCustomerByMonthYear($month4, $year4);

$months = array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');


//admin detail
$userData =  $adminLogin->getUserDetail($_SESSION[ADM_SESS]);


?>


<!doctype html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.104.2">
    <title><?php echo COMPANY_S.' Administrative Dashboard'; ?></title>
    <link rel="shortcut icon" href="<?php echo FAVCON_PATH; ?>" type="image/png">

    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.2.1/css/all.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.2.1/css/sharp-solid.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../plugins/bootstrap-5.2.0/css/bootstrap.css">
    <link rel="stylesheet" href="css/admin-style.css">
    <link rel="stylesheet" href="css/vertical-layout-light/style.css">



    <!-- Custom styles for this template -->
    <link href="sticky-footer-navbar.css" rel="stylesheet">
</head>

<body class="d-flex flex-column h-100">

    <header>
        <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                <a class="navbar-brand brand-logo mr-5" href="index.html"><img
                        src="<?php echo URL;?>/images/logo/logo.png" class="mr-2" alt="logo" /></a>
                <a class="navbar-brand brand-logo-mini" href="index.html"><img
                        src="<?php echo URL;?>/images/logo/logo.png" alt="logo" /></a>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">

                <ul class="navbar-nav mr-lg-2">
                    <li class="nav-item nav-search d-none d-lg-block">
                        <div class="input-group">
                            <input type="text" class="form-control border-bottom" id="navbar-search-input"
                                placeholder="Search now" aria-label="search" aria-describedby="search">
                            <div class="input-group-prepend hover-cursor" id="navbar-search-icon">
                                <span class="input-group-text" id="search">
                                    <!-- <i class="icon-search"></i> -->
                                    <i class="fa-regular fa-magnifying-glass"></i>
                                </span>
                            </div>
                        </div>
                    </li>
                </ul>
                <ul class="navbar-nav navbar-nav-right">
                    <li class="nav-item nav-profile dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
                            <img src="<?php if($userData[5] != null) echo ADMIN_IMG_PATH.$userData[5];
                              else echo FAVCON_PATH;?>" alt="profile" />
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown"
                            aria-labelledby="profileDropdown">
                            <a class="dropdown-item" href="profile-edit.php">
                                <i class="ti-settings text-primary"></i>
                                Settings
                            </a>
                            <a class="dropdown-item" href="partials/logout.php">
                                <i class="ti-power-off text-primary"></i>
                                Logout
                            </a>
                        </div>
                    </li>
                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                    data-toggle="offcanvas">
                    <span class="icon-menu"></span>
                </button>
            </div>
        </nav>
    </header>

    <!-- Begin page content -->

    <main class="flex-shrink-0" style="margin-top: 5rem;">
        <section class="admin-dashboard">
            <h1>Welcome to Fast Linky Admin Dashboard</h1>
            <div class="container my-container-styles">
                <div class="row">

                    <!-- Orders Management card -->
                    <div class="col-sm-6 col-md-4 col-lg-4">
                        <div class="card maincard">
                            <div class="imgBx">
                                <img src="../images/icons/order-m.png" width="80px" height="70px">
                            </div>
                            <div class="contentBx">
                                <h2>Orders Management</h2>
                                <div class="dashboard-list">
                                    <ul>
                                        <li><a href="orders.php">Orders Management</a></li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Orders Management card End -->

                    <!-- Orders Management card -->
                    <div class="col-sm-6 col-md-4 col-lg-4">
                        <div class="card maincard">
                            <div class="imgBx">
                                <img src="../images/icons/users.png" width="80px" height="70px">
                            </div>
                            <div class="contentBx">
                                <h2>Customer Management</h2>
                                <div class="dashboard-list">
                                    <ul>
                                        <li><a href="customer.php">Customers</a></li>
                                        <li><a href="contact.php">Contact Details</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Orders Management card End -->

                    <!-- Content Management card -->
                    <div class="col-sm-6 col-md-4 col-lg-4">
                        <div class="card maincard">
                            <div class="imgBx">
                                <img src="../images/icons/content-m.png" width="80px" height="70px">
                            </div>
                            <div class="contentBx">
                                <h2>Content Management</h2>
                                <div class="dashboard-list">
                                    <ul>
                                        <li><a href="#">Web Categories</a></li>
                                        <li><a href="#">Web Pages</a></li>
                                        <li><a href="#">eBox-136 Newsletters</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Content Management Card End -->

                    <!-- Products Management Card -->
                    <div class="col-sm-6 col-md-4 col-lg-4">
                        <div class="card maincard">
                            <div class="imgBx">
                                <img src="../images/icons/product-m.png" width="80px" height="70px">
                            </div>
                            <div class="contentBx">
                                <h2>Products Management</h2>
                                <div class="dashboard-list">
                                    <ul>
                                        <li><a href="#">Products Categories</a></li>
                                        <li><a href="#">Products Management</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- card2-->
                    <div class="col-sm-6 col-md-4 col-lg-4">
                        <div class="card maincard">
                            <div class="imgBx">
                                <img src="../images/icons/marketing-tools.png" width="80px" height="70px">
                            </div>
                            <div class="contentBx">
                                <h2>Marketing Tools</h2>
                                <div class="dashboard-list">
                                    <ul>
                                        <li><a href="mails-customer.php">Customer Mails</a></li>
                                        <li><a href="#">Group Mail</a></li>
                                        <li><a href="#">Mail History</a></li>


                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- </div>
                <div class="row"> -->
                    <!-- card4 -->
                    <div class="col-sm-6 col-md-4 col-lg-4">
                        <div class="card maincard">
                            <div class="imgBx">
                                <img src="../images/icons/section-edit.png" width="80px" height="70px">
                            </div>
                            <div class="contentBx">
                                <h2>Section Edits</h2>
                                <div class="dashboard-list">
                                    <ul>
                                        <li><a href="faqs.php">Faqs</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- card1 -->
                    <div class="col-sm-6 col-md-4 col-lg-4">
                        <div class="card maincard">
                            <div class="imgBx">
                                <img src="../images/icons/setting-tool.png" width="80px" height="70px">
                            </div>
                            <div class="contentBx">
                                <h2>Setup Tools</h2>
                                <div class="dashboard-list">
                                    <ul>
                                        <li><a href="admin_user.php">Admin User</a></li>
                                        <li><a href="database.php">Database Backup</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


    </main>

    <footer class="footer mt-auto py-3">
        <div class="container">
            <div class="text-center">
                Copyright &copy; <?php echo START_YEAR." - ".END_YEAR; ?>
                <a class="text-decoration-none" href="../"
                    title="<?php echo COMPANY_FULL_NAME; ?>"><?php echo COMPANY_FULL_NAME; ?></a> All Rights Reserved.
            </div>
        </div>
    </footer>
    <script src="../plugins/bootstrap-5.2.0/js/bootstrap.bundle.js"></script>
    <script src="vendors/js/vendor.bundle.base.js"></script>
    <script src="../plugins/jquery-3.6.0.min.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="js/off-canvas.js"></script>
    <script src="js/hoverable-collapse.js"></script>
    <script src="js/template.js"></script>
    <script src="js/settings.js"></script>
    <script src="js/todolist.js"></script>

    <!-- <script src="plugins/bootstrap-5.2.0/js/bootstrap.js"></script> -->
    <script src="../plugins/data-table/simple-datatables.js"></script>
    <script src="../plugins/tinymce/tinymce.js"></script>
    <script src="../plugins/main.js"></script>

</body>

</html>