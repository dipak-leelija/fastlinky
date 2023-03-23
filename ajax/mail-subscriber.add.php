<?php
require_once dirname(__DIR__) . "/includes/constant.inc.php";
session_start();
include_once ROOT_DIR . '/includes/email.inc.php';

require_once ROOT_DIR . "/_config/dbconnect.php";
require_once ROOT_DIR . "/classes/customer.class.php";
require_once ROOT_DIR . "/classes/utility.class.php";
require_once ROOT_DIR . "/classes/subscriber.class.php";

/* INSTANTIATING CLASSES */
$Customer		    = new Customer();
$EmailSubscriber		    = new EmailSubscriber();
$utility		            = new Utility();

########################################################################################################
//declare variables
$typeM		= $utility->returnGetVar('typeM','');
$cus_id		= $utility->returnGetVar('cus_id','');

if (isset($_POST['mail'])) {

  $email = $_POST['mail'];

  $result     = $EmailSubscriber->addSubscriber($email);  
  print_r($result);
}
 
?>