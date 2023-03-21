<?php
require_once("includes/constant.inc.php");
session_start();
//include_once('checkSession.php');
require_once("_config/dbconnect.php");

require_once("classes/customer.class.php");

require_once("classes/blog_mst.class.php");
require_once "classes/wishList.class.php";
require_once("classes/utility.class.php");

/* INSTANTIATING CLASSES */
$customer		= new Customer();
$blogMst		= new BlogMst();
$WishList		= new WishList();
$utility		= new Utility();
######################################################################################################################
$typeM		= $utility->returnGetVar('typeM','');
//user id
$cusId		= $utility->returnSess('userid', 0);
$cusDtl		= $customer->getCustomerData($cusId);


?>

<?php

	$blog_id 	= $_GET["BlogId"]; //get the Blog id to add
	

	// echo $cusId.'-'.$blog_id;
	$removeWish = $WishList->removeWish($cusId, $blog_id);
	// removeWish($user,$blog)
	
	if ($removeWish == true) {
		echo "removed";	
	}else {
		echo "failed";	
	}
	
              
?>