<?php 
session_start();
require_once dirname(dirname(__DIR__))."/includes/constant.inc.php";
include_once ADM_DIR.'checkSession.php';
require_once ROOT_DIR."/_config/dbconnect.php";

require_once ROOT_DIR."/classes/utility.class.php";
require_once ROOT_DIR."/classes/adminLogin.class.php";

/* INSTANTIATING CLASSES */
$adminLogin 	  = new adminLogin();
$utility		    = new Utility();

########################################################################################################

  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if (isset($_POST['action'])) {
      if ($_POST['action'] == 'deleteContact') {
        
        $contactId = $_POST["contactId"];
        $delCon = $utility->deleteRecord($contactId, 'id', 'contact');
        echo $delCon;
      }
    } 
  }
?> 