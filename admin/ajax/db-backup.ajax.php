<?php
require_once dirname(dirname(__DIR__))."/includes/constant.inc.php";
require_once ROOT_DIR."/_config/dbconnect.php";
require_once ROOT_DIR."/classes/backup.class.php";
$Backup = new Backup();

print_r($_POST);

if (isset($_POST['backup-name'])){
    
    $fileNname = $_POST['backup-name'];
    //Call the core function
    $backedup = $Backup->backup_tables('*', $fileNname);
    echo $backedup;
    if ($backedup) {
        header("Location: ../database.php");
        exit;
    }
}



?>