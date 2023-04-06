<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // The request is using the POST method
    if (isset($_POST['packageid'])) {
        if (isset($_SESSION[PACK_ORD])) {
            unset($_SESSION[PACK_ORD]);
            unset($_SESSION['orderIds']);

            $_SESSION[PACK_ORD] = array($_POST['packageid']);
            if (isset($_SESSION[PACK_ORD])) {
                header('Location: '.URL.'/packages-summary');
                exit;
            }
        }else {
            $_SESSION[PACK_ORD] = array($_POST['packageid']);
            if (isset($_SESSION[PACK_ORD])) {
                header('Location: '.URL.'/packages-summary');
                exit;
            }
        }
    }
}

?>