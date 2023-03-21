<?php 
require_once("../includes/constant.inc.php");
session_start(); 
require_once "../_config/dbconnect.php";

include_once('../classes/encrypt.inc.php'); 
include_once('../classes/adminLogin.class.php'); 
require_once("../classes/utility.class.php");
require_once("../classes/utilityMesg.class.php"); 

//instantiating classes 
$adminLogin 	= new adminLogin();

$utility		= new Utility(); 
$uMesg 			= new MesgUtility();

########################################################################################################################

//declare vars
$typeM		= $utility->returnGetVar('typeM','');

if(isset($_POST['btnLogin'])){

	$login = $_POST['txtLogin']; 
	$password = $_POST['txtPass'];
	// echo $password;exit;
	
    if(($login == '') || ($password == '')){
		header("Location: ".$_SERVER['PHP_SELF']."?msg=invalid username or password");
	}else{
		$adminLogin->validate($login, $password, 'username', 'password', 'admin_users');
	}
}
?>

<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Administrator Control Panel -  CRM</title>
<link rel="stylesheet" type="text/css" href="../style/admin/admin-index.css">
<link rel="stylesheet" type="text/css" href="../style/admin/common.css">
<link rel="icon" href="../images/logo/favicon.png" type="image/png">

</head>

<body>
	
    <!-- Header -->
    <div id="header">
        <img src="../images/logo/logo.png"  alt="<?php echo LOGO_ALT; ?>" id="logo" />
    </div>
    <!-- eof Header -->
    
    <!-- Login -->
	<div id="adminPanelLogin">
    	
        
        
    	<div id="loginBox">
        	<h2>Admin Control Panel</h2>
            <div class="mesg"><?php $uMesg->dispMessage($typeM, URL.'/images/icons/', 'blackLarge');?></div>
            
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="frmLogin">
            	
                <input name="txtLogin" type="text" class="login" required />
                <div class="cl"></div>
                
                <input name="txtPass" type="password" class="security-key" required />
                <div class="cl"></div>
                
                <input name="btnLogin" id="btnLogin" type="submit" class="loginButton" value="Secure Login" />
            </form>
            
            
                <p align="center">
                Copyright &copy; <?php echo START_YEAR." - ".END_YEAR; ?>, 
                <a href="../" title="<?php echo COMPANY_S; ?>"><?php echo URL; ?></a>.
				All Rights Reserved.
                </p>
        </div>
    </div>
	<!-- eof Login -->

    <script src="../plugins/jquery-3.6.0.min.js"></script>
    <script>
        const fadeInfoBlock = () =>{
            $('.erBlock').fadeOut();
        }
    </script>
</body>
</html>
