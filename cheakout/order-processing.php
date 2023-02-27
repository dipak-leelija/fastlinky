<?php
session_start();

require_once dirname(__DIR__)."/includes/constant.inc.php";
require_once ROOT_DIR."/_config/dbconnect.php";
require_once ROOT_DIR."/_config/dbconnect.trait.php";

require_once ROOT_DIR."/classes/customer.class.php";
require_once ROOT_DIR."/classes/gp-package.class.php";
require_once ROOT_DIR."/classes/gp-order.class.php";
require_once ROOT_DIR."/classes/date.class.php";
require_once ROOT_DIR."/classes/location.class.php";
require_once ROOT_DIR."/classes/countries.class.php";
require_once ROOT_DIR."/classes/utility.class.php";


/* INSTANTIATING CLASSES */
$DateUtil       = new DateUtil();

$customer		= new Customer();
$GPPackage      = new GuestPostpackage();
$PackageOrder   = new PackageOrder();
$Location       = new Location();
$Countries      = new Countries();
$utility		= new Utility();


if (isset($_POST['paylaterForm'])) {
    if (isset($_SESSION['package'])) {
            unset($_SESSION['package']);
        if (isset($_SESSION['orderIds'])) {
            foreach ($_SESSION['orderIds'] as $eachOrderId) {
                    $updated[] = $PackageOrder->updatePayment($eachOrderId, '', 'PayLater', 2, 4);
            }

            $falseExist =  in_array(false, $updated, true);
            if (!$falseExist) {
                unset($_SESSION['orderIds']);
                header('Location: ./package-order-successfull.php');
                exit;
            }else {
                echo 'SomeThing is Wrong';
            }
        }else {
            echo 'SomeThing is Wrong';
        }
    }else {
        echo 'SomeThing is Wrong';
    }
}


?>