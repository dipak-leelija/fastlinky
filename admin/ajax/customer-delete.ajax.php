<?php 

session_start();
include_once('checkSession.php');

require_once "../../_config/dbconnect.php"; 
require_once "../../_config/dbconnect.trait.php"; 

require_once("../../includes/constant.inc.php");
require_once("../../includes/user.inc.php");

require_once("../../classes/date.class.php"); 
require_once("../../classes/error.class.php");
require_once("../../classes/customer.class.php"); 
// require_once("../classes/order.class.php"); 

require_once("../../classes/utility.class.php");
require_once("../../classes/utilityMesg.class.php"); 


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