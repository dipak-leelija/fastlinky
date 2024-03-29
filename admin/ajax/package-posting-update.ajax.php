<?php
session_start();
require_once dirname(dirname(__DIR__))."/includes/constant.inc.php";
require_once ROOT_DIR."/includes/content.inc.php";
require_once ROOT_DIR."/includes/order-constant.inc.php";
require_once ROOT_DIR."/classes/encrypt.inc.php";
include_once ADM_DIR . 'checkSession.php';

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
$returnUrl  = $utility->goToPreviousSessionPage();
$added_by  = $_SESSION[ADM_SESS];

// print_r($_REQUEST);

if(isset($_POST['publishOrder']) && isset($_POST['forPost']) && isset($_POST['url'])){

    $orderId    =   $_POST['publishOrder'];
    $forPost    =   $_POST['forPost'];
    $url        =   $_POST['url'];
    $statusId   =   5; // 5 is the code of completed status
    if ($orderId == '') {
        echo 'Order ID Not Found';
    }elseif ($forPost == '') {
        echo 'Respective Post Number Not Found';
    }elseif ($url == '') {
        echo 'Url Not Found.';
    }else {
        $updated = $PackageOrder->addPackPubLinks($orderId, $forPost, $url, $added_by);
        if ($updated == 1) {
            $msg = $utility->ordinal($forPost).' '.ORD_SUC;
            $added = $PackageOrder->addPackOrderDtls($orderId, $statusId, $msg, $added_by, COMPANY_S);
            if ($added  == 1) {
                echo 'updated!';
            }
        }
    }

}

if (isset($_POST['liveURL']) && isset($_POST['orderId']) && isset($_POST['urlId'])) {
    
    echo $urlId   = $_POST['urlId'];
    $orderId = $_POST['orderId'];
    $liveURL = $_POST['liveURL'];

    echo $statusId = COMPLETEDCODE;

    $msg      = LVURL_UPDT;

    $updated = $PackageOrder->updateLiveURLS($urlId, $orderId, $liveURL, $statusId, $added_by);

    if ($updated == true || $updated == 1 ) {
        $added = $PackageOrder->addPackOrderDtls($orderId, $statusId, $msg, $added_by, COMPANY_S);
        if ($added  == 1) {
            echo 'updated!';
        }
    }
}
?>