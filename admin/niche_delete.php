<?php 
session_start();
include_once('checkSession.php');
require_once("../_config/dbconnect.php");
require_once("../_config/dbconnect.trait.php");
require_once("../classes/utility.class.php");
require_once("../classes/adminLogin.class.php");
require_once("../classes/blog_mst.class.php");

/* INSTANTIATING CLASSES */
$blogs		    = new BlogMst();
$adminLogin 	= new adminLogin();
$utility		= new Utility();

########################################################################################################

  if($_SERVER['REQUEST_METHOD'] == 'GET'){
    $id = $_GET["id"];
    //delete from region
    $delReg = $blogs->deleteniche($id);
    
  }
  if($delReg){
    echo "<script>alert('Niche has been deleted!');
    document.location = 'blog-niche.php'</script>";
  } else{
    echo "<script>alert('Niche deletaion failed!');
    document.location = 'blog-niche.php'<script>";
  }
?> 