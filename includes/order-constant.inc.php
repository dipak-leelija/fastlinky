<?php
require_once "constant.inc.php";
require_once ROOT_DIR . "/_config/dbconnect.php";
require_once ROOT_DIR . "/classes/orderStatus.class.php";

$OrderStatus    = new OrderStatus();

$allStatus = $OrderStatus->allStatus();

foreach ($allStatus as $value) {
    
    $statusname =  $value['orders_status_name'];

    if ($statusname == 'Failed') {
        define('FAILED',                    $statusname );
        define('FAILEDCODE',                $value['orders_status_id']);
    }

    if ($statusname == 'Delivered') {
        define('DELIVERED',                 $statusname);
        define('DELIVEREDCODE',             $value['orders_status_id']);
    }

    if ($statusname == 'Pending') {
        define('PENDING',                   $statusname);
        define('PENDINGCODE',               $value['orders_status_id']);
    }

    if ($statusname == 'Processing') {
        define('PROCESSING',                $statusname);
        define('PROCESSINGCODE',            $value['orders_status_id']);
    }

    if ($statusname == 'Ordered') {
        define('ORDERED',                   $statusname);
        define('ORDEREDCODE',               $value['orders_status_id']);

    }

    if ($statusname == 'Completed') {
        define('COMPLETED',                 $statusname);
        define('COMPLETEDCODE',             $value['orders_status_id']);
    }

    if ($statusname == 'Hold') {
        define('HOLD',                      $statusname);
        define('HOLDCODE',                  $value['orders_status_id']);
    }

    if ($statusname == 'Incomplete') {
        define('INCOMPLETE',               $statusname);
        define('INCOMPLETECODE',           $value['orders_status_id']);
    }

    if ($statusname == 'Rejected') {
        define('REJECTED',                  $statusname);
        define('REJECTEDCODE',              $value['orders_status_id']);
    }

}

define("CONTENTPRICE",                      15);

?>