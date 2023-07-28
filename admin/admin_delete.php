<?php
session_start();
require_once dirname(__DIR__)."/includes/constant.inc.php";

include_once ADM_DIR.'/checkSession.php';
require_once ROOT_DIR."/_config/dbconnect.php";
require_once ROOT_DIR."/classes/encrypt.inc.php";

require_once ROOT_DIR."/classes/utility.class.php";
require_once ROOT_DIR."/classes/adminLogin.class.php";

/* INSTANTIATING CLASSES */
$adminLogin 	= new adminLogin();
$utility		= new Utility();

########################################################################################################

  if($_SERVER['REQUEST_METHOD'] == 'GET'){
    $id = url_dec($_GET["user"]);

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