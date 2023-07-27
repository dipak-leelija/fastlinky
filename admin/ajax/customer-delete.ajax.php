<?php 
session_start();
require_once dirname(dirname(__DIR__))."/includes/constant.inc.php";
include_once ADM_DIR.'/checkSession.php';

require_once ROOT_DIR."/_config/dbconnect.php"; 
require_once ROOT_DIR."/includes/user.inc.php";
require_once ROOT_DIR."/classes/date.class.php"; 
require_once ROOT_DIR."/classes/error.class.php";
require_once ROOT_DIR."/classes/customer.class.php"; 
require_once ROOT_DIR."/classes/utility.class.php";
require_once ROOT_DIR."/classes/utilityMesg.class.php"; 


/* INSTANTIATING CLASSES */
$dateUtil      	= new DateUtil();
$error 			= new MyError();
$customer		= new Customer();
// $order			= new Order();
$utility		= new Utility();

$uMesg 			= new MesgUtility();

/////////////////////////////////////////////////////////////////////////////////////////////////

//declare variables
$typeM		= $utility->returnGetVar('typeM','');
// $cus_id		= $utility->returnGetVar('cus_id','');


if (isset($_POST['action'])) {
    if ($_POST['action'] == 'deleteUser') {
        
        $deleted = $customer->deleteCustomer($_POST['userId'], '../../images/user/');
        echo $deleted;
        // echo 'here';
    }
}

?>