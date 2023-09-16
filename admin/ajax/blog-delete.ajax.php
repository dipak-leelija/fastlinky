<?php
session_start();
require_once dirname(dirname(__DIR__))."/includes/constant.inc.php";

require_once ADM_DIR."/_config/dbconnect.php";

require_once ADM_DIR."/classes/date.class.php"; 
require_once ADM_DIR."/classes/utility.class.php"; 
require_once ADM_DIR."/classes/blog_mst.class.php";


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
