<?php 
session_start();
include_once('checkSession.php');
require_once("../_config/dbconnect.php");
require_once("../_config/dbconnect.trait.php");
require_once("../classes/utility.class.php");
require_once("../classes/adminLogin.class.php");

/* INSTANTIATING CLASSES */
$adminLogin 	  = new adminLogin();
$utility		  = new Utility();

########################################################################################################

  if($_SERVER['REQUEST_METHOD'] == 'GET'){
    $id = $_GET["id"];
    //delete from region
    $delCon = $utility->deleteRecord($id, 'id', 'contact');
    
  }
  if($delCon){
    echo "<script>alert('contact has been deleted!');
    document.location = 'contact.php'</script>";
  } else{
    echo "<script>alert('contact deletaion failed!');
    document.location = 'contact.php'<script>";
  }
?> 