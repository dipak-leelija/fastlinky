<?php
session_start();
require_once "../../includes/constant.inc.php";
require_once "../../includes/order-constant.inc.php";
include_once('checkSession.php');


require_once "../../_config/dbconnect.php";

require_once "../../classes/utilityMesg.class.php";
require_once "../../classes/content-order.class.php";

$ContentOrder   = new ContentOrder();
$uMesg 			= new MesgUtility();
$updatedBy = 0;


if (isset($_GET['accept-order'])) {

    $accepted = $ContentOrder->ClientOrderOrderUpdate($_GET['accept-order'], PROCESSINGCODE, '', '');
    if ($accepted) {
        $updated = $ContentOrder->addOrderUpdate($_GET['accept-order'], 'Accepted', '', 0);
        if ($updated) {
            $uMesg->showSuccessT('success', 0, '', '../order-details.php?ord_id='.$_GET['accept-order'], "Order Accepted", 'SUCCESS');
        }
    }
}



if (isset($_POST['add-content'])) {
    $updated = $ContentOrder->orderSingleDataUpdate($_POST['order-id'], 'clientContent', $_POST['content'], $updatedBy);
    if ($updated) {
        header('Location: '.$_POST['return-page']);
        exit;
    }
}

// if (isset($_POST['contentUpload'])) {
    // print_r($_FILES);
    // echo 'Hi';
    // $updated = $ContentOrder->orderSingleDataUpdate($_POST['order-id'], 'clientContent', $_POST['content'], $updatedBy);
    // if ($updated) {
    //     header('Location: '.$_POST['return-page']);
    //     exit;
    // }
// }


if (isset($_GET['cancel-order'])) {
    
    $orderStatus    = REJECTEDCODE; 

    $cancelled = $ContentOrder->ClientOrderOrderUpdate($_GET['cancel-order'], $orderStatus, '', '');
    if ($cancelled) {
        $updated = $ContentOrder->addOrderUpdate($_GET['cancel-order'], 'Rejected', '', 0);
        if ($updated) {
            $uMesg->showSuccessT('success', 0, '', '../orders.php', "Order Rejected", 'SUCCESS');
        }
    }
}



if (isset($_POST['reject-order'])) {

    $reason        = $_POST['cancellation-reason'];

    $rejected = $ContentOrder->ClientOrderOrderUpdate($_POST['order-id'], REJECTEDCODE, '', '');
    if ($rejected) {

        $updated = $ContentOrder->addOrderUpdate($_POST['order-id'], 'Rejected', $reason, 0);
        if ($updated) {
            $uMesg->showSuccessT('success', 0, '', $_POST['return-page'], "Order Rejected", 'SUCCESS');
        }
    }
}




if (isset($_POST['deliver-order'])) {
    $deliveredLink  = $_POST['deliver-link'];
    
    $deliveredLink  = rawurlencode($deliveredLink);

    $delivered = $ContentOrder->ClientOrderOrderUpdate($_POST['order-id'], DELIVEREDCODE, 'deliveredLink', $deliveredLink);
    if ($delivered) {
        $updated = $ContentOrder->addOrderUpdate($_POST['order-id'], 'Delivered', '', 0);
        if ($updated) {
            $uMesg->showSuccessT('success', 0, '', $_POST['return-page'], "Order Delivered", 'SUCCESS');
        }

    }
}




if(isset($_POST["ordId"])){

    // echo 'Hi';
    $orderStatus    = 5; // Completed 

    $completed = $ContentOrder->ClientOrderOrderUpdate($_POST["ordId"], $orderStatus, '', '');
    if ($completed) {
        $updated = $ContentOrder->addOrderUpdate($_POST["ordId"], 'Completed', '', $updatedBy);
        if ($updated) {
         echo 'finished';   
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
        $updated = $ContentOrder->addOrderUpdate($orderId, 'Requested for changes', $changesOf, $updatedBy);
        if ($updated) {
            $uMesg->showSuccessT('success', 0, '', $returnPage, "Requested", 'SUCCESS');
        }
    }
}




if(isset($_POST["changesOrder"])){

    $orderId = $_POST["changesOrder"];
    
    $showOrder      = $ContentOrder->clientOrderById($orderId);
    $orderStatus    = $showOrder['order_status']; // status as it is 
    $noOfChanges    = $showOrder['changesReq']-1;
    if ($noOfChanges == 0) {
        $orderStatus = 3; // processing
    }
    $completed  = $ContentOrder->ClientOrderOrderUpdate($orderId, $orderStatus, 'changesReq', $noOfChanges);
    if ($completed) {
        $updated = $ContentOrder->addOrderUpdate($orderId, 'Changes Updated', '', $updatedBy);
        if ($updated) {
         echo 'updated';   
        }
    }
}




?>