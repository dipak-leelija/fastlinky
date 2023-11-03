<?php 
session_start();
require_once dirname(__DIR__)."/includes/constant.inc.php";
$page = "adminAdminEdit";
include_once ADM_DIR.'/checkSession.php';
require_once ROOT_DIR."/_config/dbconnect.php";
require_once ROOT_DIR."/classes/encrypt.inc.php";

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

if (isset($_GET['user'])) {
    $userName   = $_GET['user'];
}else {
    $userName   = url_enc($_SESSION[ADM_SESS]);
}
//admin detail
$userData 		=  $adminLogin->getUserDetail(url_dec($userName));

if(isset($_POST['btnEditUser'])){

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
$userDetail = $adminLogin->getUserDetail(url_dec($userName));
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once ADM_DIR . "/incs/admin-common-headers.php" ?>
    <title><?php echo $userDetail[0] .' '.$userDetail[1] .' Profile Edit - '. COMPANY_S ?></title>
</head>

<body>
    <div class="container-scroller">
        <?php require_once "components/_navbar.php"; ?>

        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <?php require_once "components/_settings-panel.php"; ?>

            <!-- partial -->
            <?php require_once "components/_sidebar.php"; ?>
            <!-- partial/ -->

            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">

                    <div class="">

                        <div class="card flex-row py-4 px-3">

                            <div class="col-3 border-right border-primary d-flex justify-content-center">
                                <?php 
                                    if(($userDetail[5] != '') && ( file_exists("../images/admin/user/".$userDetail[5])) ){
                                        $profileImgPath = URL."/images/admin/user/".$userDetail[5];
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
                                            <a href="<?= ADM_URL.'profile-edit.php?user='.$userName; ?>" class="text-decoration-none text-dark">Edit Ptofile</a>
                                        </button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- content-wrapper ends -->
                <!-- partial footer -->
                <?php require_once ADM_DIR . 'components/_footer.php'; ?>
                <!-- partial footer end-->
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