<?php 
session_start();
include_once('checkSession.php');
require_once("../_config/dbconnect.php");
require_once("../_config/dbconnect.trait.php");
require_once("../classes/utility.class.php");
require_once("../classes/adminLogin.class.php");

/* INSTANTIATING CLASSES */
$adminLogin 	= new adminLogin();
$utility		= new Utility();

########################################################################################################

  if($_SERVER['REQUEST_METHOD'] == 'GET'){
    $id = $_GET["id"];
    //delete from region

    $delReg = $adminLogin->deleteUser($id, 'username', 'admin_users');
    
  }
  if($delReg == true){
    echo "<script>alert('User deletaion failed!');
    document.location = 'admin_user.php'</script>";
  }
   else{
    echo "<script>alert('User has been deleted!');
    document.location = 'admin_user.php'</script>";
  }
?> 