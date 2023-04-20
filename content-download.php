<?php
session_start();
require_once __DIR__ . "/includes/constant.inc.php";
require_once ROOT_DIR . "/_config/dbconnect.php";

require_once ROOT_DIR . "/classes/content-order.class.php";
require_once ROOT_DIR . "/classes/utility.class.php";

/* INSTANTIATING CLASSES */
$ContentOrder   = new ContentOrder();
$Utility		= new Utility();
######################################################################################################################




if(isset($_GET['data'])){
    echo $orderId			  		= urldecode(base64_decode($_GET['data']));
    $Utility->downloadFile($orderId, 'order_id', 'path', '', 'order_contents');

}else {
    header("Location: guest-post-article-submit.php");
    exit;
}

?>