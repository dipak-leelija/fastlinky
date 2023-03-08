<?php

if($cusId == 0){
    // redirect to login page if not loggedin 
    header("Location: ".URL."/login.php");
}elseif($cusDtl[0][0] == 1){
    // redirect to dashboard if loggedin user is set as seller 
    header("Location: ".URL."/app.client.php");
}

?>