<?php 
session_start();
include_once('checkSession.php');
require_once("../_config/dbconnect.php");
require_once("../_config/dbconnect.trait.php");
require_once("../classes/utility.class.php");
require_once("../classes/adminLogin.class.php");
require_once("../classes/faqs.class.php");

/* INSTANTIATING CLASSES */
$faqs		    = new faqs();
$adminLogin 	= new adminLogin();
$utility		= new Utility();

########################################################################################################

  if($_SERVER['REQUEST_METHOD'] == 'GET'){
    $id = $_GET["id"];
    //delete from region
    $delReg = $faqs->deletefaq($id);
    
  }
  if($delReg){
    echo "<script>alert('Faqs has been deleted!');
    document.location = 'faqs.php'</script>";
  } else{
    echo "<script>alert('Faqs deletaion failed!');
    document.location = 'faqs.php'<script>";
  }

?> 