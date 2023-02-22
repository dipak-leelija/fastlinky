<?php 
session_start();
include_once('checkSession.php');
require_once "../../includes/constant.inc.php";

require_once ROOT_DIR."/_config/dbconnect.php";
require_once ROOT_DIR."/_config/dbconnect.trait.php";

require_once ROOT_DIR."/includes/user.inc.php";
require_once ROOT_DIR.'/classes/encrypt.inc.php';

require_once ROOT_DIR."/classes/gp-package.class.php";
require_once ROOT_DIR."/classes/date.class.php"; 
require_once ROOT_DIR."/classes/utility.class.php";


/* INSTANTIATING CLASSES */
$GPPackage      = new GuestPostpackage();
$dateUtil      	= new DateUtil();
$utility		= new Utility();


###############################################################################################

if (isset($_POST['action'])) {
    if ($_POST['action'] == 'delete') {
        $deleted = $GPPackage->delPackCat($_POST['deleteId']);
        if ($deleted) { 
            echo  'deleted';
        }else {
            echo 'failed'; 
        }
    }
}

?>
