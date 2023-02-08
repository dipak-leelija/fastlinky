<?php
require_once("_config/dbconnect.php");
require_once("_config/dbconnect.trait.php");
require_once("classes/utility.class.php");
require_once("classes/adminLogin.class.php");
require_once("classes/subscriber.class.php");

/* INSTANTIATING CLASSES */
$email		    = new EmailSubscriber();
$adminLogin 	= new adminLogin();
$utility		= new Utility();

########################################################################################################
//declare variables
$typeM		= $utility->returnGetVar('typeM','');
$cus_id		= $utility->returnGetVar('cus_id','');

$emails      = $_POST["emaildata"];
                      
$result     = $email->addEmail($emails);  

if($result){
    $subscriber =  "subscriber";
      echo $subscriber;
    } else{
      $subscriber = "already subscriber";
      echo $subscriber;
    }
 
?>