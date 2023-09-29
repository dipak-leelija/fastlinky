<?php
session_start();
require_once dirname(dirname(__DIR__))."/includes/constant.inc.php";
require_once ROOT_DIR."/includes/order-constant.inc.php";
require_once ROOT_DIR."/includes/content.inc.php";

include_once ADM_DIR."/checkSession.php";

require_once ROOT_DIR."/_config/dbconnect.php";

// =============== Email Files Start ===============
require_once ROOT_DIR."/classes/class.phpmailer.php";
require_once ROOT_DIR."/includes/email.inc.php";
require_once ROOT_DIR."/mail-sending/order-placed-template.php";
// ================ Email Files End ================

require_once ROOT_DIR."/classes/content-order.class.php";
require_once ROOT_DIR."/classes/customer.class.php";
require_once ROOT_DIR."/classes/utilityMesg.class.php";
require_once ROOT_DIR."/classes/notification.class.php";

$ContentOrder   = new ContentOrder();
$uMesg 			= new MesgUtility();
$Notifications  = new Notifications();
$Customer       = new Customer();

$updatedBy = 0;
$reference_link =   URL.'/guest-post-article-submit.php?order=';


if (isset($_GET['order-id']) && isset($_GET['customer-id']) ) {
    $orderId    = $_GET['order-id'];
    $customerId = $_GET['customer-id'];
    $reference_link .=  base64_encode(urlencode($orderId));
    
    $accepted = $ContentOrder->ClientOrderOrderUpdate($orderId, PROCESSINGCODE, '', '');
    if ($accepted) {
        $updated = $ContentOrder->addOrderUpdate($orderId, ORD_ACPT, '', 0);
        $Notifications->addNotification(ORD_UPDATE, ORD_ACPT, ORD_ACPT_M, $reference_link, $customerId);
        if ($updated) {
            $user = $Customer->getCustomerData($customerId);
            $toMail  	= $user[0][3];
            $toName   	= $user[0][5];
            $domain     = $ContentOrder->getOrderBlog($orderId);
            require_once ROOT_DIR."/mail-sending/order-accept-mail.php";
            // $uMesg->showSuccessT('success', 0, '', ADM_URL.'order-details.php?ord_id='.$orderId, ORD_ACPT, 'SUCCESS');
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
    $deliveredLink      = $_POST['deliver-link'];
    $customerId         = $_POST['customer-id'];
    $orderId            = $_POST['order-id'];
    $reference_link    .= base64_encode(urlencode($orderId));
    
    $deliveredLink  = rawurlencode($deliveredLink);

    $delivered = $ContentOrder->ClientOrderOrderUpdate($orderId, DELIVEREDCODE, 'deliveredLink', $deliveredLink);
    $Notifications->addNotification(ORD_UPDATE, ORD_DEL, ORD_DLVRD_M, $reference_link, $customerId);

    if ($delivered) {
        $updated = $ContentOrder->addOrderUpdate($orderId, ORD_DEL, '', 0);
        if ($updated) {
            $uMesg->showSuccessT('success', 0, '', $_POST['return-page'], "Order Delivered", 'SUCCESS');
        }

    }
}




if(isset($_POST["ordId"])){
    $orderId         = $_POST["ordId"];
    $customerId      = $_POST["customerId"];
    $reference_link .= base64_encode(urlencode($orderId));

    $completed = $ContentOrder->ClientOrderOrderUpdate($orderId, COMPLETEDCODE, '', '');
    if ($completed) {
        $updated = $ContentOrder->addOrderUpdate($orderId, ORD_COMP, '', $updatedBy);
        $Notifications->addNotification(ORD_UPDATE, ORD_COMP, ORD_CMPLT_M, $reference_link, $customerId);
        if ($updated) {
         echo 'finished';   
        }
    }
}





if(isset($_POST["changes-request"])){

    $orderId         = $_POST["order-id"];
    $customerId      = $_POST["customer-id"];
    $changesOf       = $_POST["changes-req"];
    $returnPage      = $_POST["return-page"];
    $reference_link .= base64_encode(urlencode($orderId));
    

    $showOrder  = $ContentOrder->clientOrderById($orderId);
    $completed  = $ContentOrder->ClientOrderOrderUpdate($orderId, HOLDCODE, 'changesReq', $showOrder['changesReq']+1 );
    if ($completed) {
        $updated = $ContentOrder->addOrderUpdate($orderId, ORD_CNG_REQ, $changesOf, $updatedBy);
        $Notifications->addNotification(ORD_UPDATE, ORD_CNG_REQ, ORD_CNG_REQ_M, $reference_link, $customerId);

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