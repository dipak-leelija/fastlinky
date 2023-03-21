<?php
require_once("includes/constant.inc.php");
session_start();
require_once("_config/dbconnect.php");

require_once("classes/customer.class.php");
require_once("classes/blog_mst.class.php");

require_once("classes/utility.class.php");
require_once "classes/wishList.class.php";
/* INSTANTIATING CLASSES */
// $dateUtil      	= new DateUtil();
// $error 			= new Error();
// $search_obj		= new Search();
$customer		= new Customer();
$utility		= new Utility();
$BlogMst		= new BlogMst();
$WishList		= new WishList();

######################################################################################################################

$typeM		= $utility->returnGetVar('typeM','');
//user id
$cusId		= $utility->returnSess('userid', 0);
$cusDtl		= $customer->getCustomerData($cusId);


?>

<?php

	$blogId 	= $_GET["BlogId"]; //get the Blog id to add
	


		$exists = $WishList->checkWish($cusId, $blogId);
		if ($exists == false) {
			
			// Add Blog on wishlist
			$wishListed = $WishList->newWish($cusId,$blogId);
			if ($wishListed == true) {
				echo "success";
			}else {
				echo "failed";
			}
			
		}else {
			echo "exists";
		}
	
	
              
?>