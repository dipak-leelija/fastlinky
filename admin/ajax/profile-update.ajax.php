<?php
require_once "../../includes/constant.inc.php";
session_start();
include_once "checkSession.php";
define('SUADM002', ' Administrative user information has been updated');
require_once "../../_config/dbconnect.php";

require_once "../../classes/adminLogin.class.php"; 
require_once "../../classes/utility.class.php";
require_once "../../classes/utilityImage.class.php";
require_once "../../classes/utilityMesg.class.php";

/* INSTANTIATING CLASSES */
$adminLogin 	= new adminLogin();
$utility		= new Utility();
$uImg 			= new ImageUtility();
$uMesg 			= new MesgUtility();



$username   = $_SESSION[ADM_SESS];


if(isset($_POST['updateAdminimage'])){
    $username   = $_SESSION[ADM_SESS];
	
		//uploading images
		if($_FILES['profile-image']['name'] != ''){

			//delete the image before uploading
			$utility->deleteFile($username, 'username' ,'../../images/admin/user/', 'image', 'admin_users');
			
			//rename the file
			$newName = $utility->getNewName4($_FILES['profile-image'], '',$username);
			
			//upload and crop the file
			$updated = $uImg->imgCropResize($_FILES['profile-image'], '', $newName, '../../images/admin/user/', 140, 140, $username,'image', 'username', 'admin_users');

			if ($updated) {
				$uMesg->showSuccessT('success', $username, 'username', '../profile-edit.php', SUADM002, 'SUCCESS');
			}else {
				$uMesg->showSuccessT('failed', $username, 'username', '../profile-edit.php', 'failed to update', 'FAILED');
			}
		}else {
			$uMesg->showSuccessT('error', $username, 'username', '../profile-edit.php', 'image not avilable', 'ERRROR');
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