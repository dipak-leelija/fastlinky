<?php
session_start();
require_once dirname(dirname(__DIR__))."/includes/constant.inc.php";
require_once ROOT_DIR."/_config/dbconnect.php";

require_once ROOT_DIR."/includes/content.inc.php";
require_once ROOT_DIR."/includes/order-constant.inc.php";
require_once ADM_DIR . 'checkSession.php';


require_once ROOT_DIR."/classes/encrypt.inc.php";
require_once ROOT_DIR."/classes/customer.class.php";
require_once ROOT_DIR."/classes/gp-order.class.php";
require_once ROOT_DIR."/classes/notification.class.php";
require_once ROOT_DIR."/classes/utility.class.php";
require_once ROOT_DIR."/classes/utilityMesg.class.php";



/* INSTANTIATING CLASSES */

$customer		= new Customer();
$PackageOrder   = new PackageOrder();
$Notifications  = new Notifications();
$utility        = new Utility;
$uMesg          = new MesgUtility();
######################################################################################################################
$typeM		= $utility->returnGetVar('typeM','');
//user id
$returnUrl  = $utility->goToPreviousSessionPage();


$updatedBy  = $_SESSION[ADM_SESS];

// print_r($_REQUEST);

if (isset($_POST['acceptOrder'])) {
    $orderId    = $_POST['acceptOrder'];
    $statusId   = PROCESSINGCODE;

    $updated = $PackageOrder->updatePackOrdersStatus($orderId, $statusId, $updatedBy);
    if ($updated == 1) {
        $added = $PackageOrder->addPackOrderDtls($orderId, $statusId, ORD_ACPT, $updatedBy, COMPANY_S);
        $Notifications->addNotification(ORD_UPDATE, ORD_ACPT, ORD_ACPT_M, $reference_link, $customerId);
        if ($added == 1) {
            echo 'updated!';
        }
    }
}



if (isset($_POST['changesOrder'])) {
    $orderId    = $_POST['changesOrder'];
    $statusId   = 10; // 10 is the code of rejected
    $resecjMsg  = $_POST['rejectDsc'];

    $updated = $PackageOrder->updatePackOrdersStatus($orderId, $statusId, $updatedBy);
    if ($updated == 1) {
        $added = $PackageOrder->addPackOrderDtls($orderId, $statusId, $resecjMsg, $updatedBy, COMPANY_S);
        if ($added == 1) {
            echo 'updated!';
        }
    }
}


if (isset($_POST['issueOrder'])) {
    $linkId     = $_POST['issueOrder'];
    $orderId    = $_POST['orderId'];
    $statusId   = REJECTEDCODE; // 10 is the code of rejected
    $updatedBy  = $_SESSION[ADM_SESS];
    $issue      = $_POST['issueMsg'];
    $postNo     = $utility->ordinal($_POST['postNo']);
    $errMsg     = ERR_LINK." of {$postNo} post";

    $updated = $PackageOrder->raisePackOrderLinksIssue($linkId, $statusId, $issue, $updatedBy);

    if ($updated == 1) {
        $existingStatus = $PackageOrder->getOrderStatus($orderId);
        $added = $PackageOrder->addPackOrderDtls($orderId, $existingStatus, $errMsg, $updatedBy, COMPANY_S);
        $added = $PackageOrder->addPackOrderDtls($orderId, $statusId, $resecjMsg, $updatedBy, COMPANY_S);
        // $Notifications->addNotification(ORD_UPDATE, ORD_ACPT, $resecjMsg, $reference_link, $customerId);

        if ($added == 1) {
            echo 'updated!';
        }
    }
}


if (isset($_POST['deliveredOrder'])) {
    $orderId    = $_POST['deliveredOrder'];
    $statusId   = DELIVEREDCODE;

    $updated = $PackageOrder->updatePackOrdersStatus($orderId, $statusId, $updatedBy);
    if ($updated == 1) {
        $added = $PackageOrder->addPackOrderDtls($orderId, $statusId, ORD_DEL, $updatedBy, COMPANY_S);
        if ($added == 1) {
            echo 'delivered!';
        }
    }
}


if (isset($_POST['finishOrder'])) {
    $orderId    = $_POST['finishOrder'];
    $statusId   = COMPLETEDCODE;

    $updated = $PackageOrder->updatePackOrdersStatus($orderId, $statusId, $updatedBy);
    if ($updated == 1) {
        $added = $PackageOrder->addPackOrderDtls($orderId, $statusId, ORD_COMP, $updatedBy, COMPANY_S);
        if ($added == 1) {
            echo 'finished!';
        }
    }
}


?>