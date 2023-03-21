<?php
require_once "../../includes/constant.inc.php";
session_start();

require_once "../../_config/dbconnect.php";

require_once "../../classes/date.class.php"; 
require_once "../../classes/utility.class.php"; 
require_once "../../classes/blog_mst.class.php";


/* INSTANTIATING CLASSES */
$dateUtil      	= new DateUtil();
$utility		= new Utility();
$blogMst		= new BlogMst();


if (isset($_POST['delBlogId'])) {   
    
    $deleted	   = $blogMst->delBlogDtls($_POST['delBlogId']);
    if($deleted){
        echo 'true';
    }else{
        echo 'false';    }
}
	
?>
