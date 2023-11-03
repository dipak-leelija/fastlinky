<?php 
session_start();
$page = 'dashboard';
require_once "../includes/constant.inc.php";
include_once('checkSession.php');
require_once ROOT_DIR . "/_config/dbconnect.php";

require_once ROOT_DIR . "/classes/adminLogin.class.php"; 
require_once ROOT_DIR . "/classes/date.class.php"; 
 
require_once("../classes/error.class.php"); 
require_once("../classes/customer.class.php"); 
// require_once("../classes/category.class.php");
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
// $cat			= new Cat();
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

$userData =  $adminLogin->getUserDetail($_SESSION[ADM_SESS]);


?>

<!DOCTYPE html>
<html lang="en">

<head>

    <?php require_once ADM_DIR . "/incs/admin-common-headers.php" ?>

    <title><?php echo COMPANY_S.' Administrative Dashboard'; ?></title>
    <link rel="stylesheet" href="<?php echo ADM_URL ?>css/admin-style.css" />

</head>

<body>
    <div class="container-scroller">
        <?php require_once ADM_DIR."/components/_navbar.php"; ?>
        <div class="container-fluid page-body-wrapper">
            <?php require_once ADM_DIR."/components/_settings-panel.php"; ?>
            <?php require_once ADM_DIR."/components/_sidebar.php"; ?>
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row">
                        <div class="col-lg-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <!-- -------------------------------------------------------------------------------------- -->

                                        <section class="admin-dashboard">
                                            <div class="container my-container-styles">
                                                <div class="row">

                                                    <!-- Orders Management card -->
                                                    <div class="col-sm-6 col-md-4 col-lg-4">
                                                        <div class="card maincard">
                                                            <div class="imgBx">
                                                                <img src="../images/icons/order-m.png" width="80px"
                                                                    height="70px">
                                                            </div>
                                                            <div class="contentBx">
                                                                <h2>Orders Management</h2>
                                                                <div class="dashboard-list">
                                                                    <ul>
                                                                        <li><a href="orders.php">Orders Management</a>
                                                                        </li>
                                                                        <li><a href="package-order.php">Package
                                                                                Orders</a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- Orders Management card End -->

                                                    <!-- Customer Management card -->
                                                    <div class="col-sm-6 col-md-4 col-lg-4">
                                                        <div class="card maincard">
                                                            <div class="imgBx">
                                                                <img src="../images/icons/users.png" width="80px"
                                                                    height="70px">
                                                            </div>
                                                            <div class="contentBx">
                                                                <h2>Customer Management</h2>
                                                                <div class="dashboard-list">
                                                                    <ul>
                                                                        <li><a href="customer.php">Customers</a></li>
                                                                        <li><a href="contact.php">Contact Details</a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- Customer Management card End -->

                                                    <!-- Blogs Management card -->
                                                    <div class="col-sm-6 col-md-4 col-lg-4">
                                                        <div class="card maincard">
                                                            <div class="imgBx">
                                                                <img src="../images/icons/users.png" width="80px"
                                                                    height="70px">
                                                            </div>
                                                            <div class="contentBx">
                                                                <h2>Blogs Management</h2>
                                                                <div class="dashboard-list">
                                                                    <ul>
                                                                        <li><a href="blog-niche.php">Niches</a></li>
                                                                        <li><a href="blog-master.php">Blogs</a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- Blogs Management card End -->

                                                    <!-- Blogs Management card -->
                                                    <div class="col-sm-6 col-md-4 col-lg-4">
                                                        <div class="card maincard">
                                                            <div class="imgBx">
                                                                <img src="../images/icons/users.png" width="80px"
                                                                    height="70px">
                                                            </div>
                                                            <div class="contentBx">
                                                                <h2>Package Management</h2>
                                                                <div class="dashboard-list">
                                                                    <ul>
                                                                        <li><a href="packages.php">Packages</a></li>
                                                                        <li><a href="#">Services</a></li>
                                                                        <li><a href="#">Services Featured</a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- Blogs Management card End -->

                                                    <!-- Content Management card -->
                                                    <div class="col-sm-6 col-md-4 col-lg-4">
                                                        <div class="card maincard">
                                                            <div class="imgBx">
                                                                <img src="../images/icons/content-m.png" width="80px"
                                                                    height="70px">
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
                                                                <img src="../images/icons/product-m.png" width="80px"
                                                                    height="70px">
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
                                                                <img src="../images/icons/marketing-tools.png"
                                                                    width="80px" height="70px">
                                                            </div>
                                                            <div class="contentBx">
                                                                <h2>Marketing Tools</h2>
                                                                <div class="dashboard-list">
                                                                    <ul>
                                                                        <li><a href="mails-customer.php">Customer
                                                                                Mails</a></li>
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
                                                                <img src="../images/icons/section-edit.png" width="80px"
                                                                    height="70px">
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
                                                                <img src="../images/icons/setting-tool.png" width="80px"
                                                                    height="70px">
                                                            </div>
                                                            <div class="contentBx">
                                                                <h2>Setup Tools</h2>
                                                                <div class="dashboard-list">
                                                                    <ul>
                                                                        <li><a href="admin_user.php">Admin User</a></li>
                                                                        <li><a href="database.php">Database Backup</a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>

                                    <!-- ---------------------------------------------------------------------------------------- -->

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- content-wrapper ends -->
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="<?= ADM_URL ?>vendors/js/vendor.bundle.base.js"></script>
    <script src="<?= URL ?>/plugins/jquery-3.6.0.min.js"></script>
    <script src="<?= ADM_URL ?>js/off-canvas.js"></script>
    <script src="<?= ADM_URL ?>js/hoverable-collapse.js"></script>
    <script src="<?= ADM_URL ?>js/template.js"></script>
    <script src="<?= ADM_URL ?>js/settings.js"></script>
    <script src="<?= ADM_URL ?>js/todolist.js"></script>
    <script src="<?= URL ?>/plugins/data-table/simple-datatables.js"></script>
    <script src="<?= URL ?>/plugins/tinymce/tinymce.js"></script>
    <script src="<?= URL ?>/plugins/main.js"></script>
</body>

</html>