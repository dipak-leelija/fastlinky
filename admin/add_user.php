<?php
session_start();
$page = "adminAddUser";
require_once("../includes/constant.inc.php");
include_once('checkSession.php');
require_once("../_config/dbconnect.php");

require_once("../classes/adminLogin.class.php"); 
require_once("../classes/utility.class.php");
require_once("../classes/utilityImage.class.php");
require_once("../classes/faqs.class.php");

/* INSTANTIATING CLASSES */
$adminLogin 	= new adminLogin();
$utility		= new Utility();
$uImg 			= new ImageUtility();
$faqs		    = new faqs();

/////////////////////////////////////////////////////////////////////////////////////////////////

//declare variables
$typeM		= $utility->returnGetVar('typeM','');
//admin detail
$userData 		=  $adminLogin->getUserDetail($_SESSION[ADM_SESS]);
//parent ids
$pIds	= $utility->getAllId('categories_id', 'static_categories');



if(isset($_POST['btnCreateUser']))
{
	//post vars
	$txtUser 	= $_POST['txtUser'];
	$password 	= $_POST['txtPass'];
	$cnfPass  	= $_POST['txtCnfPass'];
	$txtFName	= $_POST['txtFName'];
	$txtSurname	= $_POST['txtSurname'];
	$txtAddress	= $_POST['txtAddress'];
	$txtEmail  	= $_POST['txtEmail'];
	//$selUType  	= $_POST['selUType'];
	$usertype   = "0";

	

	//registering the post session variables
	$sess_arr	= array('txtUser','txtFName','txtSurname','txtAddress','txtEmail');
	$utility->addPostSessArr($sess_arr);
	
	//defining error variables
	$action		= 'add_user';
	$url		= $_SERVER['PHP_SELF'];
	$id			= 0;
	$id_var		= '';
	$anchor		= 'addUser';
	$typeM		= 'ERROR';
	
	
	//check for errors
	// $duplicate = $error->duplicateUser($txtUser, 'username', 'admin_users'); 
	// $email_id  = $error->invalidEmail($txtEmail);
	
	
	// if((eregi(" ",$txtUser)) || ($txtUser == '') || (strlen($txtUser) < 2))
	// {
	// 	$error->showErrorTA($action, $id, $id_var, $url, ERADM002, $typeM, $anchor);
	// }
	// elseif($txtFName == '' )
	// {
	// 	$error->showErrorTA($action, $id, $id_var, $url, ERU108, $typeM, $anchor);
	// }
	// elseif($txtAddress == '' )
	// {
	// 	$error->showErrorTA($action, $id, $id_var, $url, ERREG004, $typeM, $anchor);
	// }
	// elseif(strlen($password) < 6)
	// {
	// 	$error->showErrorTA($action, $id, $id_var, $url, ERU117, $typeM, $anchor);
	// }
	// elseif($password != $cnfPass )
	// {
	// 	$error->showErrorTA($action, $id, $id_var, $url, ERU107, $typeM, $anchor);
	// }
	// elseif(ereg("^ER",$duplicate))
	// {
	// 	$error->showErrorTA($action, $id, $id_var, $url, ERU102, $typeM, $anchor);
	// }
	// elseif(ereg("^ER",$email_id))
	// {
	// 	$error->showErrorTA($action, $id, $id_var, $url, ER002, $typeM, $anchor);
	// }
	// else
	// {
		//create admin user
		$adminLogin->createUser($txtUser, $password, $txtFName, $txtSurname, $txtAddress, $usertype, $txtEmail);
		 

		
		//uploading images
		if($_FILES['fileImg']['name'] != '')
		{
			//rename the file
			$newName = $utility->getNewName4($_FILES['fileImg'], '',$txtUser);
			
			//upload and crop the file
			$uImg->imgCropResize($_FILES['fileImg'], '',  $newName, 
								 '../images/admin/user/', 140, 140,  
						         $txtUser,  'image', 'username',  'admin_users');
		}


	
		//delete the session
		$utility->delSessArr($sess_arr);
		
		//forward
		// $uMesg->showSuccessT('success', 0, '', $_SERVER['PHP_SELF'], SUADM001, 'SUCCESS');
	// }
	
}//admin add
else if(isset($_POST['btnCancel']))
{
	header("Location: admin_user.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once ADM_DIR . "/incs/admin-common-headers.php" ?>

    <title>Add New user</title>

    <!-- plugins:css -->
    <!-- <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css"> -->
    <!-- <link rel="stylesheet" href="vendors/mdi/css/materialdesignicons.min.css"> -->

    <link rel="stylesheet" href="<?= URL ?>/plugins/data-table/style.css">

</head>

<body>
    <div class="container-scroller">
        <?php require_once "components/_navbar.php"; ?>

        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <?php require_once "components/_settings-panel.php"; ?>


            <!-- partial -->
            <?php require_once "components/_sidebar.php"; ?>
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row">
                        <div class="ml-3 mb-3">
                            <h2>Add New Admin</h2>
                        </div>
                        <?php 
                    //CREATING NEW USER FORM
                    if( (isset($_GET['action'])) && ($_GET['action'] == 'add_user') )
                    {
            
                    ?>
                        <form action="<?php echo $_SERVER['PHP_SELF']."?action=add_user"?>" method="post"
                            class="row needs-validation ml-3 mr-3 bg-white text-dark rounded" enctype="multipart/form-data" novalidate>

                            <div class="col-12 m-3">
                                <label for="inputAddress" class="form-label">User Name</label>
                                <input type="text" name="txtUser" class="form-control w-75" id="inputAddress" placeholder="" required>
                            </div>
                            <div class="col-12 m-3">
                                <label for="inputAddress2" class="form-label">Password</label>
                                <label>(minimum 6 chars)</label>
                                <input type="password" name="txtPass" class="form-control w-75 h-75" id="inputAddress2" placeholder="Password" minlength="6" required>
                            </div>

                            <div class="col-12 m-3">
                                <label for="inputAddress2" class="form-label">Confirm Password</label>
                                <input type="password" name="txtCnfPass" class="form-control w-75" id="inputAddress2"
                                    placeholder="Confirm Password" minlength="6" required>
                            </div>
                            
                            <div class="col-12 m-3">
                                <label for="inputAddress2" class="form-label">First Name</label>
                                <input type="text" name="txtFName" class="form-control w-75" id="inputAddress2"
                                    placeholder="First Name" required>
                            </div>
                            
                            <div class="col-12 m-3">
                                <label for="inputAddress2" class="form-label">Surname</label>
                                <input type="text" name="txtSurname" class="form-control w-75" id="inputAddress2"
                                    placeholder="Surname" required>
                            </div>

                            <div class="col-12 m-3">
                                <label for="inputAddress2" class="form-label">Address</label>
                                <input type="text" name="txtAddress" class="form-control w-75" id="inputAddress2"
                                    placeholder="Address" required>
                            </div>


                            <div class="col-12 m-3">
                                <label for="inputAddress2" class="form-label">Email</label>
                                <input type="text" name="txtEmail" class="form-control w-75" id="inputAddress2"
                                    placeholder="Email" required>
                            </div>

                            <div class="col-12 m-3">
                                <label for="inputAddress2" class="form-label">Image</label>
                                <input type="file" name="fileImg" class="form-control w-75" id="inputAddress2"
                                    placeholder="Image" accept="image/*">
                            </div>


                            <div class="col-12 m-3">
                                <button name="btnCreateUser" type="submit" class="btn btn-primary">Add</button>
                                <input name="btnCancel" type="submit" class="btn btn-primary" onclick="location.href='admin_user.php';" value="cancel" />

                            </div>
                        </form>
                        <?php 
                    }//eof
                    ?>
                    </div>
                </div>
                <!-- content-wrapper ends -->
                <?php require_once ADM_DIR . 'components/_footer.php'; ?>
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="<?= ADM_URL ?>vendors/js/vendor.bundle.base.js"></script>
    <script src="<?= URL ?>/plugins/jquery-3.6.0.min.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="<?= ADM_URL ?>js/off-canvas.js"></script>
    <script src="<?= ADM_URL ?>js/hoverable-collapse.js"></script>
    <script src="<?= ADM_URL ?>js/template.js"></script>
    <script src="<?= ADM_URL ?>js/settings.js"></script>
    <script src="<?= ADM_URL ?>js/todolist.js"></script>

    <!-- <script src="plugins/bootstrap-5.2.0/js/bootstrap.js"></script> -->
    <script src="<?= URL ?>/plugins/data-table/simple-datatables.js"></script>
    <script src="<?= URL ?>/plugins/tinymce/tinymce.js"></script>
    <script src="<?= URL ?>/plugins/main.js"></script>
    <script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
        Array.prototype.slice.call(forms)
            .forEach(function(form) {
                form.addEventListener('btnCreateUser', function(event) {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
            })
    })()
    </script>

    <!-- endinject -->
    <!-- Custom js for this page-->
    <!-- End custom js for this page-->
</body>

</html>