<?php
session_start();
require_once dirname(__DIR__) ."/includes/constant.inc.php";
require_once ROOT_DIR."/includes/user.inc.php";
require_once ROOT_DIR."/_config/dbconnect.php";


require_once ROOT_DIR.'/classes/customer.class.php';

$Customer		= new Customer();



if (isset($_POST['currentPassword']) && isset($_POST['newPassword']) && isset($_POST['confirmPassword'])) {
    // print_r($_SESSION);
    $userId = $_SESSION['userid'];

    if ($_POST['currentPassword'] != null) {
        $currentPassword = $_POST['currentPassword'];
    }
    
    if ($_POST['newPassword'] != null) {
        $newPassword = $_POST['newPassword'];
    }
    
    if ($_POST['confirmPassword'] != null) {
        $confirmPassword = $_POST['confirmPassword'];
    }

    if ($newPassword == $confirmPassword) {
        echo $update = $Customer->changeUserPassword($userId, $currentPassword, $newPassword);    
    }else{
        echo 'New Password and Confirn Password Should be Same!';
    }
}

?>