<?php

if($cusId == 0){
    header("Location: index.php");
}

if($cusDtl[0][0] == 2){
    header("Location: dashboard.php");
}


?>