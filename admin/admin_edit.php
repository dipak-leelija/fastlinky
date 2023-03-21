<?php 
require_once("../includes/constant.inc.php");
session_start();
include_once('checkSession.php');
require_once("../_config/dbconnect.php");

require_once("../classes/adminLogin.class.php"); 
require_once("../classes/utility.class.php");
require_once("../classes/utilityImage.class.php");

/* INSTANTIATING CLASSES */
$adminLogin 	= new adminLogin();
$utility		= new Utility();
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
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Skydash Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="vendors/feather/feather.css">
    <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
    <!-- <link rel="stylesheet" href="vendors/mdi/css/materialdesignicons.min.css"> -->
    <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="../plugins/data-table/style.css">

    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.2.1/css/all.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.2.1/css/sharp-solid.css">

    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
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
            <!-- background-color: #cddbff; -->
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="ml-3 mb-3">
                        <h2>EDIT USER</h2>
                    </div>
                    <div class="row">

                        <form method="POST" action="<?php echo $_SERVER['PHP_SELF']."?id=".$_GET['id'].""?>"
                            class="row ml-3 m-3 bg-white text-dark rounded" enctype="multipart/form-data">

                            <div class="col-12 m-3">
                                <label for="inputAddress" class="form-label">User Name</label>
                                <input type="text" name="niche_name" class="form-control w-75" id="inputAddress"
                                    value="<?php echo $_GET['id']; ?>" readonly>
                            </div>
                            <div class="col-12 m-3">
                                <label for="inputAddress2" class="form-label">Image</label>
                                <?php 
                            if(($userDetail[5] != '') && ( file_exists("../images/admin/user/".$userDetail[5])) )
                            {
                            echo $utility->imageDisplay2('../images/admin/user/', 
                            $userDetail[5], 75, 75, 0, 'greyBorder', $userDetail[0]);
                            }
                            ?>
                            </div>

                            <div class="col-12 m-3">
                                <label for="inputAddress2" class="form-label">First Name</label>
                                <input type="text" name="txtFName" class="form-control w-75"
                                    value="<?php echo $userDetail[0]; ?>">
                            </div>
                            <div class="col-12 m-3">
                                <label for="inputAddress2" class="form-label">Surname</label>
                                <input type="text" name="txtSurname" class="form-control w-75"
                                    value="<?php echo $userDetail[1]; ?>">
                            </div>

                            <div class="col-12 m-3">
                                <label for="inputAddress2" class="form-label">Address</label>
                                <input type="text" name="txtAddress" class="form-control w-75"
                                    value="<?php echo $userDetail[2]; ?>">
                            </div>
                            <div class="col-12 m-3">
                                <label for="inputAddress2" class="form-label">Email</label>
                                <input type="text" name="txtEmail" class="form-control w-75"
                                    value="<?php echo $userDetail[4]; ?>">
                            </div>

                            <div class="col-12 m-3">
                                <label for="inputAddress2" class="form-label">Image</label>
                                <input type="file" name="fileImg" class="form-control w-75">
                                <?php 
                                if( ($userDetail[5] != '' ) && (file_exists("../images/admin/user/".$userDetail[5])) )
                                {
                                echo "<input name=\"delImg\" type=\"checkbox\" value=\"1\"> 
                                <span class='blackLarge'>Delete this image</span>"; 
                                }
                                ?>
                            </div>

                            <div class="col-12 m-3">
                                <input name="btnEditUser" type="submit" class="btn btn-primary" value="EDIT" />
                                <input type="button" onclick="location.href='admin_user.php';" class="btn btn-primary"
                                    value="cancel" />

                            </div>
                        </form>
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