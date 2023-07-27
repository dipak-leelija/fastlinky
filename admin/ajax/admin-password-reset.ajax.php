<?php
session_start();

require_once dirname(dirname(__DIR__)) . "/includes/constant.inc.php";
require_once ADM_DIR . "checkSession.php";
require_once ROOT_DIR . "/includes/user.inc.php";
require_once ROOT_DIR . "/_config/dbconnect.php";

require_once ROOT_DIR . "/classes/adminLogin.class.php"; 
require_once ROOT_DIR . "/classes/utility.class.php";
require_once ROOT_DIR . "/classes/utilityImage.class.php";
require_once ROOT_DIR . "/classes/utilityMesg.class.php";

/* INSTANTIATING CLASSES */
$adminLogin 	= new adminLogin();
$utility		= new Utility();
$uImg 			= new ImageUtility();
$uMesg 			= new MesgUtility();



$username   = $_SESSION[ADM_SESS];

if(isset($_POST['current-password']) && isset($_POST['new-password']) && isset($_POST['confirm-password'])){
    
    $currentPassword    = $_POST['current-password'];
    $newPassword        = $_POST['new-password'];
    $confirmPassword    = $_POST['confirm-password'];

    $isUpdated = $adminLogin->resetAdminPassword($username, $currentPassword, $newPassword, $confirmPassword);
    if ($isUpdated == 1) {
        header('Location: ../profile-edit.php?action='.SUADM004);
        exit;
    }else {
        header('Location: ../profile-edit.php?action='.$isUpdated);
        exit;
    }
	
}



if(isset($_POST['updateAdminDetails'])){
	$fname      = $_POST['fname'];
	$lname      = $_POST['lname'];
	$address    = $_POST['city'];
	$email      = $_POST['mail-id'];
	
	// 	//update information
		$updated = $adminLogin->updateAdmin($username, $fname, $lname, $address, $email);
        if ($updated) {
            echo "Updated";
        }
		
	// 	//update admin image field		
	// 	if(isset($_POST['delImg']) && ($_POST['delImg'] == 1))
	// 	{
	// 		$utility->deleteFile($id, 'username' ,'../images/admin/user/', 'image', 'admin_users');
	// 	}
		
	// 	//uploading images
	// 	if($_FILES['fileImg']['name'] != '')
	// 	{
	// 		//delete the image before uploading
	// 		$utility->deleteFile($id, 'username' ,'../images/admin/user/', 'image', 'admin_users');
			
	// 		//rename the file
	// 		$newName = $utility->getNewName4($_FILES['fileImg'], '',$id);
			
	// 		//upload and crop the file
	// 		$uImg->imgCropResize($_FILES['fileImg'], '', $newName, 
	// 							 '../images/admin/user/', 140, 140, 
	// 					         $id,'image', 'username', 'admin_users');
	// 	}
		
		//forward
		// $uMesg->showSuccessT('success', $id, 'id', $_SERVER['PHP_SELF'], SUADM002, 'SUCCESS');
	
}
?>