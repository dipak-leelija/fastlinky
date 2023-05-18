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
require_once ROOT_DIR."/classes/utility.class.php";
require_once ROOT_DIR."/classes/utilityMesg.class.php";



/* INSTANTIATING CLASSES */

$customer		= new Customer();
$PackageOrder   = new PackageOrder();
$utility        = new Utility;
$uMesg          = new MesgUtility();
######################################################################################################################
$typeM		= $utility->returnGetVar('typeM','');
//user id
$returnUrl  = $utility->goToPreviousSessionPage();


$updatedBy  = $_SESSION[ADM_SESS];


if (isset($_POST['acceptOrder'])) {
    $orderId    = $_POST['acceptOrder'];
    $statusId   = PROCESSINGCODE;

    $updated = $PackageOrder->updatePackOrdersStatus($orderId, $statusId, $updatedBy);
    var_dump($updated);
    if ($updated == 1) {
        $added = $PackageOrder->addPackOrderDtls($orderId, $statusId, ORD_ACPT, $updatedBy, COMPANY_S);
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
    $statusId   = 10; // 10 is the code of rejected
    $updatedBy  = $_SESSION[ADM_SESS];
    $issue      = $_POST['issueMsg'];
    $postNo     = $utility->ordinal($_POST['postNo']);
    $errMsg     = ERR_LINK." of {$postNo} post";

    $updated = $PackageOrder->raisePackOrderLinksIssue($linkId, $statusId, $issue, $updatedBy);

    if ($updated == 1) {
        $existingStatus = $PackageOrder->getOrderStatus($orderId);
        $added = $PackageOrder->addPackOrderDtls($orderId, $existingStatus, $errMsg, $updatedBy, COMPANY_S);
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



// if(isset($_POST['ancortext']) && isset($_POST['url'])){
//     $orderId    =   $_POST['order-id'];
//     $forPost    =   $_POST['for-post'];

//     if (count($_POST['ancortext']) == count($_POST['url'])) {
        
//         $deleted = $PackageOrder->deletePackOrdLinks($orderId, $forPost);
//         if ($deleted) {
//             for ($i=0; $i < count($_POST['url']); $i++) { 
//                 for ($j=0; $j < count($_POST['ancortext']); $j++) { 
//                     if ($i === $j) {
//                         // echo "{$i}=>{$j}";
//                         if ($_POST['ancortext'][$i] != null && $_POST['url'][$i] != null) {
//                             echo $_POST['ancortext'][$i], $_POST['url'][$i];
//                             $added = $PackageOrder->addPackOrderLinks( $orderId, $forPost, $_POST['ancortext'][$i], $_POST['url'][$i], $_SESSION[ADM_SESS]);

//                         }
//                     }
//                 }
//             }
//             if ($added) {
//                 header('Location: '.$returnUrl);
//                 exit;
//             }else {
//                 echo 'Redirection Error!';
//             }
//         }

//     }

// }


?>