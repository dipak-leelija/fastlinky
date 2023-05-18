<?php 
require_once("../includes/constant.inc.php");
session_start();
$page = "adminOrder";
include_once('checkSession.php');

require_once ROOT_DIR . "/_config/dbconnect.php";

require_once ROOT_DIR . "/classes/adminLogin.class.php"; 
require_once ROOT_DIR . "/classes/date.class.php"; 
require_once ROOT_DIR . "/classes/error.class.php"; 
require_once ROOT_DIR . "/classes/customer.class.php";
require_once ROOT_DIR . "/classes/content-order.class.php";
require_once ROOT_DIR . "/classes/search.class.php";
require_once ROOT_DIR . "/classes/orderStatus.class.php";

require_once ROOT_DIR . "/classes/utility.class.php"; 
require_once ROOT_DIR . "/classes/utilityMesg.class.php"; 
require_once ROOT_DIR . "/classes/utilityImage.class.php";
require_once ROOT_DIR . "/classes/utilityNum.class.php";


/* INSTANTIATING CLASSES */
$adminLogin 	= new adminLogin();
$dateUtil      	= new DateUtil();
$error 			= new Error();
$Customer		    = new Customer();
$ContentOrder	= new ContentOrder();
// $product		= new Product();
$search_obj		= new Search();
$OrderStatus    = new OrderStatus();

$utility		= new Utility();
$uMesg 			= new MesgUtility();
$uImg 			= new ImageUtility();
$uNum 			= new NumUtility();

######################################################################################################################

//declare vars
$typeM			= $utility->returnGetVar('typeM','');
$keyword		= $utility->returnGetVar('keyword','');
$type			= $utility->returnGetVar('type','');
$mode			= $utility->returnGetVar('mode','');
$noOfOrd		= array();

if((isset($_GET['btnSearch'])) &&($_GET['btnSearch'] == 'search')){
	$link    = "&btnSearch=search&keyword=".$_GET['keyword']."&mode=&type=".$_GET['type'];
	$noOfOrd = $search_obj->searchOrder($mode, $keyword, $type);
}else{
	if(isset($_GET['user_id']) && isset($_GET['status'])){
		$user_id	= $_GET['user_id'];
		//echo $user_id ; exit;
		$status		= $_GET['status'];
	}else{
		$user_id	= 'all';
		$status		= 'all';
	}

  // echo $user_id.'----'.$status;exit;
	$allOrders	= $ContentOrder->showAllOrderdContents($user_id, $status);
//   print_r($allOrders);
//   exit;
	
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <?php require_once ADM_DIR . "/incs/admin-common-headers.php" ?>

    <title>All Orders | <?php echo COMPANY_FULL_NAME; ?></title>

    <!-- plugins:css -->
    <link rel="stylesheet" href="<?php echo URL; ?>/plugins/data-table/style.css">
    <link rel="stylesheet" href="<?php echo URL; ?>/css/order-list.css">
    <link rel="stylesheet" href="<?php echo URL; ?>/css/order-table.css">

</head>

<body>
    <div class="container-scroller">
        <?php require_once ADM_DIR."/partials/_navbar.php"; ?>

        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <?php require_once ADM_DIR."/partials/_settings-panel.php"; ?>


            <!-- partial -->
            <?php require_once ADM_DIR."/partials/_sidebar.php"; ?>
            <!-- partial:../../ -->

            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row">

                        <div class="col-lg-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Guest Post Orders</h4>
                                    <div class="table-responsive">
                                        <table id="dtBasicExample" class="table table-striped datatable"
                                            cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>
                                                        Order Id
                                                    </th>
                                                    <th>
                                                        Customer name
                                                    </th>
                                                    <th>
                                                        Ordered Site
                                                    </th>
                                                    <th>
                                                        Amount
                                                    </th>
                                                    <th>
                                                        Payment
                                                    </th>
                                                    <th>
                                                        Status
                                                    </th>
                                                    <th>
                                                        Date
                                                    </th>
                                                    <th>
                                                        Action
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php

                                                $itemAmount     = 00;
                                                $paid_amount    = 00;

                                                foreach ($allOrders as $order) {

                                                    $orderId        = $order['order_id'];
                                                    $ordStatusCode  = $order['order_status'];
                                                    $addedOn        = $order['added_on'];
                                                    $clientUserId   = $order['clientUserId'];
                                                    
                                                    $customer       = $Customer->getCustomerData($clientUserId);
                                                    $customerName   = $customer[0][5].' '.$customer[0][6];
                                                    
                                                    
                                                    $ordTxn         = $ContentOrder->showTrxnByOrderId($orderId);
                                                    if ($ordTxn != false) {
                                                        $itemAmount     = $ordTxn['item_amount'];
                                                        $paid_amount    = $ordTxn['paid_amount'];
                                                    }
                                                    
                                                    $ordStatusName = $OrderStatus->getOrdStatName($ordStatusCode);
                                                    $orderDate     = $dateUtil->dateTimeNumber($addedOn);

                                                ?>

                                                    <tr>
                                                        <td>
                                                            <?= '#'.$orderId; ?>
                                                        </td>
                                                        <td>
                                                            <?= $customerName; ?>
                                                        </td>
                                                        <td>
                                                            <!-- <div class="progress">
                                                                <div class="progress-bar bg-success" role="progressbar"
                                                                    style="width: 25%" aria-valuenow="25" aria-valuemin="0"
                                                                    aria-valuemax="100"></div>
                                                            </div> -->
                                                            <?php echo $order['clientOrderedSite']; ?>
                                                        </td>
                                                        <td>
                                                            <?= CURRENCY.$itemAmount; ?>
                                                        </td>
                                                        <td>
                                                            <?=  CURRENCY.$paid_amount; ?>
                                                        </td>
                                                        <td>
                                                            <label class="badge <?php echo $ordStatusName;?>">
                                                                <?php echo $ordStatusName;?>
                                                            </label>
                                                        </td>
                                                        <td>
                                                            <?php echo $orderDate; ?>
                                                        </td>
                                                        <td>
                                                            <a class="text-decoration-none mx-1"
                                                                href="order-details.php?ord_id=<?php echo $order['order_id']; ?>">
                                                                <i class="fa-regular fa-eye"></i>
                                                            </a>
                                                            <a href="" class="text-decoration-none mx-1">
                                                                <i class="fa-regular fa-pen-to-square mx-1"></i>
                                                            </a>
                                                            <a href="" class="text-decoration-none mx-1">
                                                                <i
                                                                    class="fa-regular fa-trash-can-xmark text-danger mx-1"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                <?php
                                              }
                                              ?>
                                            </tbody>
                                        </table>
                                    </div>
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
    <script src="<?php echo ADM_URL?>vendors/js/vendor.bundle.base.js"></script>
    <script src="<?php echo URL; ?>/plugins/jquery-3.6.0.min.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="<?php echo ADM_URL?>js/off-canvas.js"></script>
    <script src="<?php echo ADM_URL?>js/hoverable-collapse.js"></script>
    <script src="<?php echo ADM_URL?>js/template.js"></script>
    <script src="<?php echo ADM_URL?>js/settings.js"></script>
    <script src="<?php echo ADM_URL?>js/todolist.js"></script>

    <!-- <script src="plugins/bootstrap-5.2.0/js/bootstrap.js"></script> -->
    <script src="<?php echo URL; ?>/plugins/data-table/simple-datatables.js"></script>
    <script src="<?php echo URL; ?>/plugins/tinymce/tinymce.js"></script>
    <script src="<?php echo URL; ?>/plugins/main.js"></script>
</body>

</html>