<?php

if (isset($_GET['delete'])) {

    $file = $_GET['delete'];
    $dir  = '../../database-backup/';

    $fileLink = $dir.$file;
    
    // Use unlink() function to delete a file
    if (!unlink($fileLink)) {
        echo ("$file cannot be deleted due to an error");
    }
    else {
        // echo ("$file has been deleted");
        header("Location: ../database.php");
        exit;
    }
}
 
?>