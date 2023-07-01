<?php
session_start();
require_once dirname(__DIR__) . "/includes/constant.inc.php";
require_once ROOT_DIR . "/classes/encrypt.inc.php";
require_once ROOT_DIR . "/_config/dbconnect.php";

require_once ROOT_DIR . "/classes/customer.class.php";
require_once ROOT_DIR . "/classes/content-order.class.php";
require_once ROOT_DIR . "/classes/utility.class.php";
require_once ROOT_DIR . "/classes/utilityMesg.class.php";



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




if(isset($_POST["updateBeforeProcess"])){
    
    $orderId                = $_POST['order-id'];
    $contentId              = $_POST['content-id'];

    $clientContentTitle     = $_POST['clientContentTitle'];

    $clientAnchorText       = $_POST['clientAnchorText'];
    $clientTargetUrl        = $_POST['clientTargetUrl'];

    $refAnc1                = $_POST['reference-anchor1'];
    $refUrl1                = $_POST['reference-url1'];
    $refAnc2                = $_POST['reference-anchor2'];
    $refUrl2                = $_POST['reference-url2'];


    $clientRequirement  = $_POST['clientRequirement'];

    $titleUpdate = $ContentOrder->titleUpdate($orderId, $clientContentTitle);
    $LinksUpdate = $ContentOrder->updateHyperLinks($contentId, $clientAnchorText, $clientTargetUrl, $refAnc1, $refUrl1, $refAnc2, $refUrl2);
    $reqUpdate   = $ContentOrder->orderSingleDataUpdate($orderId, 'clientRequirement', $clientRequirement, $updatedBy);

    $checkArray = [$titleUpdate, $LinksUpdate, $reqUpdate];
    
    if (!in_array(false, $checkArray) || !in_array(0, $checkArray)){
        echo 'updated';
    }

}




if(isset($_POST["ordId"])){

    $orderStatus    = 5; // Completed 

    $completed = $ContentOrder->ClientOrderOrderUpdate($_POST["ordId"], $orderStatus, '', '');
    if ($completed) {
        $updated = $ContentOrder->addOrderUpdate($_POST["ordId"], 'Completed', '', $cusId);
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
        $updated = $ContentOrder->addOrderUpdate($orderId, 'Changes Updated', '', $cusId);
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
    $completed  = $ContentOrder->ClientOrderOrderUpdate($orderId, $orderStatus, 'changesReq', $showOrder['changesReq']+1 );
    if ($completed) {
        $updated = $ContentOrder->addOrderUpdate($orderId, 'Requested for changes', $changesOf, $cusId);
        var_dump($updated);
        if ($updated) {
            $uMesg->showSuccessT('success', 0, '', $returnPage, "Requested for changes", 'SUCCESS');
        }
    }
}


?>