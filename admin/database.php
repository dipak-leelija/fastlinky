<?php 
require_once("../includes/constant.inc.php");
session_start();
include_once('checkSession.php');

require_once "../_config/dbconnect.php";

require_once("../classes/adminLogin.class.php"); 
require_once("../classes/date.class.php"); 
 
require_once("../classes/error.class.php"); 
require_once("../classes/customer.class.php");

require_once("../classes/content-order.class.php");
require_once("../classes/search.class.php");
require_once("../classes/orderStatus.class.php");

require_once("../classes/utility.class.php"); 
require_once("../classes/utilityMesg.class.php"); 
require_once("../classes/utilityImage.class.php");
require_once("../classes/utilityNum.class.php");


/* INSTANTIATING CLASSES */
$adminLogin 	= new adminLogin();
$dateUtil      	= new DateUtil();
$error 			= new Error();
$client		    = new Customer();
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
  // print_r($allOrders);
  // exit;
	
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?php echo COMPANY_FULL_NAME; ?></title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="../plugins/data-table/style.css">
    <link rel="stylesheet" href="../css/order-list.css">
    <link rel="stylesheet" href="../css/order-table.css">

    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.2.1/css/all.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.2.1/css/sharp-solid.css">


    <!-- inject:css -->
    <link rel="stylesheet" href="css/vertical-layout-light/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="images/favicon.png" />
</head>

<body>
    <div class="container-scroller">
        <?php require_once "partials/_navbar.php"; ?>

        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <?php require_once "partials/_settings-panel.php"; ?>


            <!-- partial -->
            <?php require_once "partials/_sidebar.php"; ?>
            <!-- partial:../../ -->

            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row">

                        <div class="col-lg-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <h4 class="card-title">Guest Post Orders</h4>
                                        <button data-toggle="modal" data-target="#exampleModal"
                                            class="btn btn-primary">Create Backup</button>
                                    </div>
                                    <div class="table-responsive">
                                        <table id="dtBasicExample" class="table table-striped datatable"
                                            cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>
                                                        SL. No
                                                    </th>
                                                    <th>
                                                        Backup name
                                                    </th>
                                                    <th>
                                                        Action
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php

                                                $log_directory = '../database-backup';
                                                $sl = 1;
                                                foreach(glob($log_directory.'/*.*') as $file) {
                                                    $file = substr($file, 19);
                                              ?>

                                                <tr>
                                                    <td>
                                                        <?php echo $sl++; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $file; ?>
                                                    </td>
                                                    <td>
                                                        <a href="ajax/db-download.php?name=<?php echo $file; ?>"
                                                            class="text-decoration-none mx-1">
                                                            <i class="fa-regular fa-file-arrow-down"></i>
                                                        </a>

                                                        <a href="ajax/db-delete.php?delete=<?php echo $file; ?>"
                                                            class="text-decoration-none mx-1">
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
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Backup Name</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body pt-3">
                    <form action="ajax/db-backup.ajax.php" method="post" class="text-center">
                        <input type="text" class="form-control" name="backup-name" id="" aria-describedby="Backup Name">
                        <button type="submit" class="btn btn-sm btn-primary mt-3">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- plugins:js -->
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


    <!-- endinject -->
    <!-- Custom js for this page-->
    <!-- End custom js for this page-->
</body>

</html>