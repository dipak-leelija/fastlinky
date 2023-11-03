<?php
session_start();
require_once  dirname(__DIR__)."/includes/constant.inc.php";
include_once ADM_DIR.'/checkSession.php';
require_once ROOT_DIR."/_config/dbconnect.php";
require_once ROOT_DIR."/classes/encrypt.inc.php";

require_once ROOT_DIR."/classes/adminLogin.class.php"; 
require_once ROOT_DIR."/classes/utility.class.php";

/* INSTANTIATING CLASSES */
$adminLogin 	= new adminLogin();
$utility		= new Utility();

/////////////////////////////////////////////////////////////////////////////////////////////////

//declare variables
$typeM		    = $utility->returnGetVar('typeM','');
//admin detail

if(isset($_GET['user'])){
	$userName = url_dec($_GET['user']);	
}


if(isset($_POST['btnEditPass'])){

	$password 	= $_POST['txtPass'];
	$cnfPass  	= $_POST['txtCnfPass'];
	
	//defining error variables
	$action		= 'edit_pass';
	$url		= $_SERVER['PHP_SELF'];
	$id			= $userName;
	$id_var		= 'id';
	$anchor		= 'editPass';
	$typeM		= 'ERROR';
	
	
	if(strlen($password) < 6){
		echo "<script>alert('Password minimum 6 chars');</script>";
	}elseif($password != $cnfPass ){
		echo "<script>alert('Password Not Matched');</script>";
	}else{
		//change the password
		$update = $adminLogin->changePassword($userName, $password);
	
            echo "<script>alert('Change User Password');</script>";
	}
  
}

$userDetail 		=  $adminLogin->getUserDetail($userName);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Change Password of <?= $userDetail[0]." ".$userDetail[1]; ?></title>
    <?php require_once ADM_DIR . "/incs/admin-common-headers.php" ?>
    
    <!-- plugins:css -->
    <link rel="stylesheet" href="<?= ADM_URL ?>vendors/ti-icons/css/themify-icons.css" />
</head>

<body>
    <div class="container-scroller">
        <?php require_once "components/_navbar.php"; ?>
        <div class="container-fluid page-body-wrapper">
            <?php require_once "components/_settings-panel.php"; ?>
            <?php require_once "components/_sidebar.php"; ?>
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="ml-3 mb-3">
                        <h2>Change User Password</h2>
                    </div>
                    <div class="row">

                        <form method="POST" action="<?php echo $_SERVER['PHP_SELF']."?id=".$userName.""?>"
                            class="row ml-3 m-3 bg-white text-dark rounded needs-validation" enctype="multipart/form-data" novalidate>

                            <div class="col-12 m-3">
                                <label for="inputAddress" class="form-label">User Name</label>
                                <input type="text" name="niche_name" class="form-control w-75" id="inputAddress"
                                    value="<?=$userName?>" readonly>
                            </div>

                            <div class="col-12 m-3">
                                <label for="inputAddress2" class="form-label">Full Name</label>
                                <input type="text" name="txtFName" class="form-control w-75"
                                    value="<?php echo $userDetail[0]." ".$userDetail[1]; ?>" readonly>
                            </div>
                            <div class="col-12 m-3">
                                <label for="inputAddress2" class="form-label">Password (minimum 6 chars)</label>
                                <input type="Password" name="txtPass" class="form-control w-75" minlength="6" required>
                            </div>
 
                            <div class="col-12 m-3">
                                <label for="inputAddress2" class="form-label">Confirm Password</label>
                                <input type="Password" name="txtCnfPass" class="form-control w-75" minlength="6" required>
                            </div>

                            <div class="col-12 m-3">
                                <input name="btnEditPass" type="submit" class="btn btn-primary" value="EDIT" />
                                <input type="button"onclick="history.back()" class="btn btn-primary"
                                    value="cancel" />

                            </div>
                        </form>
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
    <script src="<?= ADM_URL ?>js/off-canvas.js"></script>
    <script src="<?= ADM_URL ?>js/hoverable-collapse.js"></script>
    <script src="<?= ADM_URL ?>js/template.js"></script>
    <script src="<?= ADM_URL ?>js/settings.js"></script>
    <script src="<?= ADM_URL ?>js/todolist.js"></script>
    <script src="<?= URL ?>/plugins/data-table/simple-datatables.js"></script>
    <script src="<?= URL ?>/plugins/tinymce/tinymce.js"></script>
    <script src="<?= URL ?>/plugins/main.js"></script>
    <script>
    (function() {
        'use strict'
        var forms = document.querySelectorAll('.needs-validation')
        Array.prototype.slice.call(forms)
            .forEach(function(form) {
                form.addEventListener('btnEditPass', function(event) {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
            })
    })()
    </script>
</body>

</html>