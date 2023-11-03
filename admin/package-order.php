<?php 

require_once("../includes/constant.inc.php");
session_start();
$page = "adminPackageOrder";
include_once('checkSession.php');

require_once ROOT_DIR . "/_config/dbconnect.php";

require_once ROOT_DIR . "/classes/gp-order.class.php"; 
require_once ROOT_DIR . "/classes/error.class.php"; 
require_once ROOT_DIR . "/classes/customer.class.php";
require_once ROOT_DIR . "/classes/content-order.class.php";
require_once ROOT_DIR . "/classes/search.class.php";
require_once ROOT_DIR . "/classes/orderStatus.class.php";

require_once ROOT_DIR . "/classes/date.class.php";
require_once ROOT_DIR . "/classes/utility.class.php"; 
require_once ROOT_DIR . "/classes/utilityMesg.class.php"; 
require_once ROOT_DIR . "/classes/utilityImage.class.php";
require_once ROOT_DIR . "/classes/utilityNum.class.php";


/* INSTANTIATING CLASSES */
// $adminLogin 	= new adminLogin();
$error 			= new Error();
$client		    = new Customer();
$PackageOrder	= new PackageOrder();
// $product		= new Product();
$search_obj		= new Search();
$OrderStatus    = new OrderStatus();

$DateUtil      	= new DateUtil();
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
	$allOrders	= $PackageOrder->getAllOrderDetails();
//   print_r($allOrders);
  // exit;
	
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    
    <?php require_once ADM_DIR . "/incs/admin-common-headers.php" ?>

    <title>All Orders | <?php echo COMPANY_FULL_NAME; ?></title>

    <!-- plugins:css -->
    <link rel="stylesheet" href="<?= URL ?>/plugins/data-table/style.css" />
    <link rel="stylesheet" href="<?= URL ?>/css/order-list.css" />
    <link rel="stylesheet" href="<?= URL ?>/css/order-table.css" />
    
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
                                              foreach ($allOrders as $order) {
                                              ?>

                                                <tr>
                                                    <td>
                                                        <?php echo '#'.$order['order_id']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $order['name']; ?>
                                                    </td>
                                                    <td>
                                                        <!-- <div class="progress">
                                                            <div class="progress-bar bg-success" role="progressbar"
                                                                style="width: 25%" aria-valuenow="25" aria-valuemin="0"
                                                                aria-valuemax="100"></div>
                                                        </div> -->
                                                        <?php echo $order['package_id']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $order['price']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $order['paid_amount']; ?>
                                                    </td>
                                                    <td>
                                                        <?php $ordStatus = $OrderStatus->getOrdStatName($order['order_status']); ?>
                                                        <label class="badge <?php echo $ordStatus;?>">
                                                            <?php echo $ordStatus;?>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <?php echo $DateUtil->dateTimeNumber($order['date']); ?>
                                                    </td>
                                                    <td>
                                                        <a class="text-decoration-none mx-1"
                                                            href="package-order-details.php?ord_id=<?php echo $order['order_id']; ?>">
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