<?php
require_once  dirname(__DIR__)."/includes/constant.inc.php";
session_start();

require_once ROOT_DIR . "/_config/dbconnect.php";
require_once ROOT_DIR . "/classes/feedback.class.php";
require_once ROOT_DIR . "/classes/customer.class.php";
require_once ROOT_DIR . "/classes/utility.class.php";


$Feedback       = new Feedback();
$customer		= new Customer();
$Utility		= new Utility();

$cusId		= $Utility->returnSess('userid', 0);


if(isset($_SESSION[USR_SESS])){
    if($cusId != 0){
        $cusDtl			= $customer->getCustomerData($cusId);


        if (isset($_POST['star'])) {
    
            $star           = $_POST['star'];
            $feedbackMsg    = $_POST['message'];
            
            if ($_POST['name'] == null || $_POST['name'] == '') {
                $name =  $cusDtl[0][5].' '.$cusDtl[0][5];
            }else {
                $name = $_POST['name'];
            }
            
            if ( $cusDtl[0][3] == null || $cusDtl[0][3] =='') {
                $email  =  $cusDtl[0][3];
            }else {
                $email  = $_POST['email'];
            }
            
            $added = $Feedback->addFeedback($cusId, $name, $email, $star, $feedbackMsg);
            if ($added == 1) {
                echo 'updated';
            }
        }
    }
}



?>