<?php

if($cusId == 0){
    // redirect to login page if not loggedin 
    header("Location: ".URL."/login");
}elseif($cusDtl[0][0] == 2){
    // redirect to dashboard if loggedin user is set as seller 
    header("Location: ".URL."/dashboard");
}

?>