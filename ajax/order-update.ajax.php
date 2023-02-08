<?php
session_start();
//var_dump($_SESSION);
//include_once('checkSession.php');
require_once "../_config/dbconnect.php";
require_once "../_config/dbconnect.trait.php";

require_once "../classes/encrypt.inc.php";

require_once "../classes/customer.class.php";
require_once "../classes/content-order.class.php";
require_once "../classes/utility.class.php";
require_once "../classes/utilityMesg.class.php";



/* INSTANTIATING CLASSES */

$customer		= new Customer();
$ContentOrder   = new ContentOrder();
$utility        = new Utility;
$uMesg          = new MesgUtility();
######################################################################################################################
$typeM		= $utility->returnGetVar('typeM','');
//user id
$cusId		= $utility->returnSess('userid', 0);
$cusDtl		= $customer->getCustomerData($cusId);

// print_r($cusDtl);exit;

if($cusId == 0){
	header("Location: index.php");
}

// if($cusDtl[0][0] == 2){
// 	header("Location: dashboard.php");
// }


if(isset($_POST["ordId"])){

    // echo 'Hi';
    $orderStatus    = 5; // Completed 

    $completed = $ContentOrder->ClientOrderOrderUpdate($_POST["ordId"], $orderStatus, '', '');
    if ($completed) {
        $updated = $ContentOrder->addOrderUpdate($_POST["ordId"], 'Completed', '', $cusDtl[0][0]);
        if ($updated) {
         echo 'finished';   
        }
    }
}


if(isset($_POST["changesOrder"])){

    $orderId = $_POST["changesOrder"];
    
    $showOrder  = $ContentOrder->clientOrderById($orderId);
    $orderStatus    = $showOrder[0]['clientOrderStatus']; // status as it is 
    $noOfChanges = $showOrder[0]['changesReq']-1;
    if ($noOfChanges == 0) {
        $orderStatus = 3; // processing
    }
    $completed  = $ContentOrder->ClientOrderOrderUpdate($orderId, $orderStatus, 'changesReq', $showOrder[0]['changesReq']-1 );
    if ($completed) {
        $updated = $ContentOrder->addOrderUpdate($orderId, 'Changes Updated', '', $cusDtl[0][0]);
        if ($updated) {
         echo 'updated';   
        }
    }
}


if(isset($_POST["changes-request"])){

    $orderId = $_POST["order-id"];
    $changesOf = $_POST["changes-req"];
    $returnPage = $_POST["return-page"];

    $orderStatus    = 6; // Hold 

    $showOrder  = $ContentOrder->clientOrderById($orderId);
    $completed  = $ContentOrder->ClientOrderOrderUpdate($orderId, $orderStatus, 'changesReq', $showOrder[0]['changesReq']+1 );
    if ($completed) {
        $updated = $ContentOrder->addOrderUpdate($orderId, 'Requested for changes', $changesOf, $cusDtl[0][0]);
        if ($updated) {
            $uMesg->showSuccessT('success', 0, '', $returnPage, "Requested for changes", 'SUCCESS');
        }
    }
}


?>