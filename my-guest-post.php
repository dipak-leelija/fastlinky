<?php
require_once "includes/constant.inc.php";
session_start();

require_once ROOT_DIR."/_config/dbconnect.php";

require_once ROOT_DIR."/classes/encrypt.inc.php";
require_once ROOT_DIR."/classes/date.class.php";
require_once ROOT_DIR."/classes/error.class.php";
require_once ROOT_DIR."/classes/search.class.php";
require_once ROOT_DIR."/classes/customer.class.php";
require_once ROOT_DIR."/classes/login.class.php";
require_once ROOT_DIR."/classes/domain.class.php";

require_once ROOT_DIR."/classes/blog_mst.class.php";
require_once ROOT_DIR."/classes/utility.class.php";
require_once ROOT_DIR."/classes/gp-order.class.php";

require_once ROOT_DIR."/classes/content-order.class.php";
require_once ROOT_DIR."/classes/orderStatus.class.php";


/* INSTANTIATING CLASSES */
$dateUtil      	= new DateUtil();
$error 			= new Error();
$search_obj		= new Search();
$customer		= new Customer();
$logIn			= new Login();
$Domain			= new Domain();

//$ff				= new FrontPhoto();
$blogMst		= new BlogMst();
$ContentOrder   = new ContentOrder();
$OrderStatus    = new OrderStatus();

$utility		= new Utility();
######################################################################################################################
$typeM		= $utility->returnGetVar('typeM','');
//user id
$cusId		= $utility->returnSess('userid', 0);
$cusDtl		= $customer->getCustomerData($cusId);

// print_r($cusDtl);exit;

require_once ROOT_DIR."/includes/check-seller-login.inc.php";


?>
<!DOCTYPE HTML>
<html lang="zxx">

<head>
    <meta name="robots" content="noindex,nofollow">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>All Orders | <?php echo COMPANY_S; ?></title>
    <link rel="shortcut icon" href="<?php echo FAVCON_PATH?>" type="image/png" />
    <link rel="apple-touch-icon" href="<?php echo FAVCON_PATH?>" />

    <!-- Plugins Files -->
    <link href="<?= URL ?>/plugins/bootstrap-5.2.0/css/bootstrap.css" rel="stylesheet" />
    <?php require_once ROOT_DIR.'/plugins/font-awesome/fontawesome.php'?>

    <!-- Custom CSS -->
    <link href="<?= URL ?>/css/order-table.css" rel="stylesheet" />
    <link href="<?= URL ?>/css/style.css" rel='stylesheet' type='text/css' />
    <link href="<?= URL ?>/css/order-list.css" rel='stylesheet' type='text/css' />
    <link href="<?= URL ?>/css/my-orders.css" rel='stylesheet' type='text/css' />
    <link href="<?= URL ?>/css/dashboard.css" rel='stylesheet' type='text/css' />
    <link href="<?= URL ?>/plugins/data-table/style.css" rel="stylesheet" />

    <style>
    @media (min-width:768px) {
        .table-responsive {
            overflow-x: auto !important;
            -webkit-overflow-scrolling: touch !important;
        }
    }
    </style>
</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">
    <div id="home">
        <!-- header -->
        <?php require_once 'components/navbar.php'; ?>
        <!-- //header -->
        <div class="edit_profile">
            <div class="container-fluid">
                <div class=" display-table">
                    <div class="row ">
                        <!--Row start-->
                        <div class="col-md-3 hidden-xs display-table-cell v-align" id="navigation">
                            <div class="client_profile_dashboard_left">
                                <?php include("dashboard-inc.php");?>
                                <hr class="myhrline">
                            </div>
                        </div>
                        <div class="col-md-9 ps-md-0 display-table-cell v-align ">
                            <!-- MY GUEST POST ORDER section starts -->
                            <div class="lists_of_blogs  montserrat-font ">
                                <!-- <div class=""> -->
                                <div class=" display-table">
                                    <div class="row ">
                                        <div class="features your_blog_lists" id="features">
                                            <!--Features Content start-->
                                            <div class="wrap">
                                                <!--Wrap start-->
                                                <h2
                                                    class="title color-blue font-weight-bold text-center text-uppercase pt-4 pb-0">
                                                    MY GUEST POST ORDER</h2>
                                                <?php
                                                    $activeOrder    = $ContentOrder->activeOrders();
                                                    // print_r($activeOrder);
                                                    if (count($activeOrder) > 0) {
                                                    ?>
                                                <div class="features_grids table-responsive">
                                                    <table
                                                        class="table table-striped table-hover  my-guestposttable datatable">
                                                        <thead style="color: white; background: #212529;">
                                                            <tr>
                                                                <th style="width: fit-content;">Sl. No.</th>
                                                                <th style="width: fit-content;">Order Id</th>
                                                                <th style="width: fit-content;">Domian</th>
                                                                <th style="width: fit-content;">Status</th>
                                                                <th style="width: fit-content;">Order Date</th>
                                                                <th style="width: fit-content;">Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                                $sl = 1;
                                                                foreach ($activeOrder as $order) {
                                                                    $domains = $blogMst->ShowUserBlogData($cusDtl[0][2]);
                                                                    // print_r($domains[0]['domain']);
                                                                    foreach ($domains as $domain) {
                                                                        // echo $order['clientOrderStatus'];
                                                                        $status = $OrderStatus->singleOrderStatus($order['clientOrderStatus']); 
                                                                        if ($order['clientOrderedSite'] == $domain['domain']) {
                                                                ?>
                                                            <tr>
                                                                <td><?php echo $sl++; ?></td>
                                                                <td style="width:100px;font-weight:500;">
                                                                    <?php echo '#'.$order['order_id'];?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $order['clientOrderedSite'];?>
                                                                </td>
                                                                <td
                                                                    class="<?php echo $status[0]['orders_status_name']; ?>">
                                                                    <?php echo $status[0]['orders_status_name']; ?>
                                                                </td>
                                                                <td class="text-center">
                                                                    <?php echo $dateUtil->dateTimeNum($order['added_on'], '.');?>
                                                                </td>
                                                                <td>
                                                                    <a href="order-view-update.php?id=<?php echo base64_encode($order['order_id']);?>"
                                                                        title="Edit"><i
                                                                            class="fa-solid fa-pen-to-square"></i>
                                                                        <i class=" ps-3 fa-solid fa-trash"
                                                                            style="color: #ff0000a1;"></i></a>
                                                                </td>
                                                            </tr>
                                                            <?php
                                                                        }
                                                                    }
                                                                }
                                                            ?>

                                                        </tbody>
                                                    </table>
                                                </div>
                                                <?php
                                                 }else {
                                                    ?>
                                                <div class="card activeOrderDetails">
                                                    <p class="text-center text-info fw-bolder">No Orders</p>
                                                </div>
                                                <?php
                                                    } 
                                                ?>
                                                <!--end features grid and responsive table-->
                                            </div>
                                            <!--Wrap End-->
                                        </div>
                                    </div>
                                    <!--Row end-->
                                </div>
                                <!-- </div> -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- //end display table-->
            </div>
        </div>
        <script src="<?= URL ?>/plugins/jquery-3.6.0.min.js"></script>
        <script src="<?= URL ?>/js/customerSwitchMode.js"></script>
        <script src="<?= URL ?>/plugins/bootstrap-5.2.0/js/bootstrap.js"></script>
        <script src="<?= URL ?>/plugins/data-table/simple-datatables.js"></script>
        <script src="<?= URL ?>/plugins/tinymce/tinymce.js"></script>
        <script src="<?= URL ?>/plugins/main.js"></script>
</body>

</html>