<?php
require_once "includes/constant.inc.php";
   
   session_start();
   require_once "_config/dbconnect.php"; 
   $userId = $_SESSION['userid'];
   
    

    if (isset($_GET['seller'])) {
   
        $sql = "UPDATE `customer` SET `customer_type`='2' WHERE customer_id = '$userId'";
        //execute query
        $query	= mysqli_query($conn, $sql);
        if(var_dump($query) == true){
            echo true;
        }
    }


    if (isset($_GET['client'])) {
   
        $sql = "UPDATE `customer` SET `customer_type`='1' WHERE customer_id = '$userId'";
        //execute query
        $query	= mysqli_query($conn, $sql);
        if(var_dump($query) == true){
            echo true;
        }
    }


?>