<?php
session_start();
//include_once('checkSession.php');
// require_once("_config/connect.php");
// require_once("_config/db_connect.php");
require_once("_config/dbconnect.php");
require_once "_config/dbconnect.trait.php";

require_once("includes/constant.inc.php");
// require_once("classes/date.class.php");
// require_once("classes/error.class.php");
// require_once("classes/search.class.php");
require_once("classes/customer.class.php");
// require_once("classes/login.class.php");
// require_once("classes/blog_mst.class.php");

//require_once("../classes/front_photo.class.php");
require_once("classes/blog_mst.class.php");
require_once "classes/wishList.class.php";
require_once("classes/utility.class.php");
// require_once("classes/utilityMesg.class.php");
// require_once("classes/utilityImage.class.php");
// require_once("classes/utilityNum.class.php");

/* INSTANTIATING CLASSES */
// $dateUtil      	= new DateUtil();
// $error 			= new Error();
// $search_obj		= new Search();
$customer		= new Customer();
// $logIn			= new Login();
// $blogMst		= new BlogMst();

//$ff				= new FrontPhoto();
$blogMst		= new BlogMst();
$WishList		= new WishList();
$utility		= new Utility();
// $uMesg 			= new MesgUtility();
// $uImg 			= new ImageUtility();
// $uNum 			= new NumUtility();
######################################################################################################################
$typeM		= $utility->returnGetVar('typeM','');
//user id
$cusId		= $utility->returnSess('userid', 0);
$cusDtl		= $customer->getCustomerData($cusId);


?>

<?php

	$blog_id 	= $_GET["BlogId"]; //get the Blog id to add
	
	// $deleted = $blogMst->delBlogFavList($cusId, $blog_id);

	// echo $cusId.'-'.$blog_id;
	$removeWish = $WishList->removeWish($cusId, $blog_id);
	// removeWish($user,$blog)
	
	if ($removeWish == true) {
		echo "removed";	
	}else {
		echo "failed";	
	}
	
              
?>