<?php
require_once "../../includes/constant.inc.php";
require_once "../../_config/dbconnect.php";
require_once "../../classes/backup.class.php";
$Backup = new Backup();

if (isset($_POST['backup-name'])){
    
    $fileNname = $_POST['backup-name'];
    //Call the core function
    $backedup = $Backup->backup_tables('*', $fileNname);
    if ($backedup) {
        header("Location: ../database.php");
        exit;
    }
}



?>