<?php 
session_start();
require_once dirname(__DIR__)."/includes/constant.inc.php";
$page = "adminAdminEdit";
include_once ADM_DIR.'/checkSession.php';
require_once ROOT_DIR."/_config/dbconnect.php";

require_once ROOT_DIR."/classes/adminLogin.class.php"; 
require_once ROOT_DIR."/classes/utility.class.php";
require_once ROOT_DIR."/classes/date.class.php";
require_once ROOT_DIR."/classes/utilityImage.class.php";

/* INSTANTIATING CLASSES */
$adminLogin 	= new adminLogin();
$utility		= new Utility();
$DateUtil       = new DateUtil();
$uImg 			= new ImageUtility();

/////////////////////////////////////////////////////////////////////////////////////////////////

//declare variables
$typeM		    = $utility->returnGetVar('typeM','');
//admin detail
$userData 		=  $adminLogin->getUserDetail($_SESSION[ADM_SESS]);
if(isset($_POST['btnEditUser']))
{
    $id      = $_GET['id'];
	$fname   = $_POST['txtFName'];
	$lname   = $_POST['txtSurname'];
	$address = $_POST['txtAddress'];
	$email   = $_POST['txtEmail'];
	
		//update information
		$adminLogin->updateAdmin($id, $fname, $lname, $address, $email);
		
		//update admin image field		
		if(isset($_POST['delImg']) && ($_POST['delImg'] == 1))
		{
			$utility->deleteFile($id, 'username' ,'../images/admin/user/', 'image', 'admin_users');
		}
		
		//uploading images
		if($_FILES['fileImg']['name'] != '')
		{
			//delete the image before uploading
			$utility->deleteFile($id, 'username' ,'../images/admin/user/', 'image', 'admin_users');
			
			//rename the file
			$newName = $utility->getNewName4($_FILES['fileImg'], '',$id);
			
			//upload and crop the file
			$uImg->imgCropResize($_FILES['fileImg'], '', $newName, 
								 '../images/admin/user/', 140, 140, 
						         $id,'image', 'username', 'admin_users');
		}
		
		//forward
		// $uMesg->showSuccessT('success', $id, 'id', $_SERVER['PHP_SELF'], SUADM002, 'SUCCESS');
	
}
$userDetail = $adminLogin->getUserDetail($_GET['id']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once ADM_DIR . "/incs/admin-common-headers.php" ?>
    <title><?php echo $userDetail[0] .' '.$userDetail[1] .' Profile Edit - '. COMPANY_S ?></title>
</head>

<body>
    <div class="container-scroller">
        <?php require_once "partials/_navbar.php"; ?>

        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <?php require_once "partials/_settings-panel.php"; ?>

            <!-- partial -->
            <?php require_once "partials/_sidebar.php"; ?>
            <!-- partial/ -->

            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">

                    <div class="">

                        <div class="card flex-row py-4 px-3">

                            <div class="col-3 border-right border-primary d-flex justify-content-center">
                                <?php 
                                    if(($userDetail[5] != '') && ( file_exists("../images/admin/user/".$userDetail[5])) ){
                                        $profileImgPath = "../images/admin/user/".$userDetail[5];
                                    }
                                    ?>
                                <div class="card w-75">
                                    <img src="<?= $profileImgPath?>" class="rounded" alt="">
                                </div>
                            </div>
                            <div class="col-9 col-9 d-flex align-items-center justify-content-center">
                                <div class="row">
                                    <div class="col-6">
                                        <h3><?= $userDetail[0]; ?> <?= $userDetail[1]; ?>
                                            <span><small><?php //$userDetail[3]; ?></small></span>
                                        </h3>
                                        <h5><i class="fa-regular fa-user"></i> <?= $userDetail[10]; ?></h5>
                                        <h5><i class="fa-regular fa-envelope"></i> <?= $userDetail[4]; ?></h5>
                                        <h5>Join Date: <?= $DateUtil->dateTimeText($userDetail[8]); ?></h5>
                                    </div>
                                    <div class="col-6">
                                        
                                        <p><i class="fa-solid fa-location-dot"></i> <?= $userDetail[2]; ?></p>
                                        <p class="mb-0">Last Logged In: <?= $DateUtil->dateTimeText($userDetail[6]); ?></p>
                                        <p class="mb-0">Modified On: <?= $DateUtil->dateTimeText($userDetail[9]); ?></p>
                                        <p class="mb-0">Total Loggedin : <?= $userDetail[7]; ?><small>Times</small></p>

                                    </div>
                                    <div class="col-12 text-center mt-4">
                                        <button class="btn btn-sm btn-secondary" onclick="history.back()">Back</button>
                                        <button class="btn btn-sm btn-warning" type="button">
                                            <a href="<?= ADM_URL.'/profile-edit.php'; ?>" class="text-decoration-none text-dark">Edit Ptofile</a>
                                        </button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- content-wrapper ends -->
                <!-- partial:../../partials/_footer.html -->
                <footer class="footer">
                    <div class="d-sm-flex justify-content-center justify-content-sm-between">
                        <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2021.
                            Premium <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap admin
                                template</a> from BootstrapDash. All rights reserved.</span>
                        <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made
                            with <i class="ti-heart text-danger ml-1"></i></span>
                    </div>
                </footer>
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
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