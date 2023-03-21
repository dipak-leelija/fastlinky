<?php 
require_once("../includes/constant.inc.php");
session_start();
include_once('checkSession.php');
require_once("../_config/dbconnect.php");

require_once("../classes/utility.class.php");
require_once("../classes/adminLogin.class.php");
require_once("../classes/blog_mst.class.php");

/* INSTANTIATING CLASSES */
$blogMst		= new BlogMst();
$adminLogin 	= new adminLogin();
$utility		= new Utility();

########################################################################################################
//declare variables
$typeM		= $utility->returnGetVar('typeM','');
$cus_id		= $utility->returnGetVar('cus_id','');

    $blog_id		        = $_POST['id'];
	$approved		= $_POST['approved'];
    $updated_by     =   $_SESSION[ADM_SESS];
	$addfaq         = $blogMst->updateStatus($blog_id, $approved, $updated_by);
?>