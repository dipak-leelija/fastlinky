<?php 
require_once "_config/dbconnect.php";
require_once "_config/dbconnect.trait.php";

require_once "includes/constant.inc.php";
require_once "classes/date.class.php";
require_once "classes/error.class.php";
require_once "classes/search.class.php";
require_once "classes/customer.class.php";
require_once "classes/login.class.php";
require_once "classes/services.class.php";
require_once "classes/blog_mst.class.php";
require_once "classes/utility.class.php";
require_once "classes/utilityMesg.class.php";
require_once "classes/utilityImage.class.php";
require_once "classes/utilityNum.class.php";
require_once "classes/gp-order.class.php";
require_once "classes/countries.class.php";

$gp				= new Gporder();
$country		= new Countries();
 

if(isset($_GET['name']) && isset($_GET['email']) && isset($_GET['addrs']) && isset($_GET['zipCo']) && isset($_GET['cntry']) && isset($_GET['notes']) && isset($_GET['niche']) && isset($_GET['paymentType']) ){


    $name         = $_GET['name'];
    $email        = $_GET['email'];
    $addrs        = $_GET['addrs'];
    $zipCo        = $_GET['zipCo'];
    $cntry        = $_GET['cntry'];
    $notes        = $_GET['notes'];
    $niche        = $_GET['niche'];
    $package_id   = $_GET['package_id'];
    $customerId   = $_GET['customerId'];
    $paymentType  = $_GET['paymentType'];
    $paypal_ordKey="";
    $cc_ordered_key="";
    $status = "pending";

    $insertPackData = $gp->insertPackageOrder($package_id,$niche,$customerId,$name,$email,$addrs,$zipCo,$cntry,$notes,$paymentType, $paypal_ordKey,$cc_ordered_key,$status);
    
    if($insertPackData){
        session_start();
        $_SESSION['gporder-id'] = $insertPackData;
        echo 'START'.$_SESSION['gporder-id'].'END';

        // setcookie('gporder-id', $insertPackData, time() + (86400 * 30), "/"); // 86400 = 1 day

        echo "success";
    }

    else{
        echo "failed";
    }
}



?>