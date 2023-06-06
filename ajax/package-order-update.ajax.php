<?php
session_start();
require_once dirname(__DIR__)."/includes/constant.inc.php";
require_once ROOT_DIR."/includes/order-constant.inc.php";
require_once ROOT_DIR."/includes/content.inc.php";
require_once ROOT_DIR."/classes/encrypt.inc.php";

require_once ROOT_DIR."/_config/dbconnect.php";

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
$cusId		= $utility->returnSess('userid', 0);
$cusDtl		= $customer->getCustomerData($cusId);
$returnUrl  = $utility->goToPreviousSessionPage();
require_once ROOT_DIR.'/includes/check-customer-login.inc.php';

// print_r($_REQUEST);

if(isset($_POST['ancortext']) && isset($_POST['url'])){
    $orderId    =   $_POST['order-id'];
    $forPost    =   $_POST['for-post'];


    $statusId = $PackageOrder->getOrderStatus($orderId);
    $forStr   = $utility->ordinal($forPost);


    if (count($_POST['ancortext']) == count($_POST['url'])) {
        
        $deleted = $PackageOrder->deletePackOrdLinks($orderId, $forPost);
        if ($deleted) {
            for ($i=0; $i < count($_POST['url']); $i++) { 
                for ($j=0; $j < count($_POST['ancortext']); $j++) { 
                    if ($i === $j) {
                        // echo "{$i}=>{$j}";
                        if ($_POST['ancortext'][$i] != null && $_POST['url'][$i] != null) {
                            $added[] = $PackageOrder->addPackOrderLinks($orderId, $forPost, $_POST['ancortext'][$i], $_POST['url'][$i], $cusDtl[0][2]);

                        }
                    }
                }
            }
            $falseExist =  in_array(false, $added, true);

            if (!$falseExist) {
                $added = $PackageOrder->addPackOrderDtls($orderId, $statusId, "Link Provided for {$forStr} Post", $cusDtl[0][2], $cusDtl[0][2]);
                if ($added) {
                    header('Location: '.$returnUrl);
                    exit;
                }
            }else {
                echo 'Redirection Error!';
            }
        }

    }

}


if (isset($_POST['action'])) {
    if ($_POST['action'] == 'LiveURLIssue') {
        $linkId     = $_POST['linkId'];
        $orderId    = $_POST['orderId'];
        $issue      = $_POST['issueMsg'];
        
        $statusId   = REJECTEDCODE; // 10 is the code of rejected
        $updatedBy  = $cusDtl[0][2];
        $errMsg     = ERR_LINK;
        
        $updated = $PackageOrder->raiseIssue($linkId, $orderId, $issue, $statusId, $updatedBy);
        if ($updated == 1) {
            $existingStatus = $PackageOrder->getOrderStatus($orderId);
            $added = $PackageOrder->addPackOrderDtls($orderId, $existingStatus, $errMsg, $updatedBy, $updatedBy);
            if ($added == 1) {
                echo 'updated!';
            }
        }
    }
}


?>