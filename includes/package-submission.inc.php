<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // The request is using the POST method
    if (isset($_POST['packageid'])) {
        if (isset($_SESSION['package'])) {
            unset($_SESSION['package']);
            unset($_SESSION['orderIds']);

            $_SESSION['package'] = array($_POST['packageid']);
            if (isset($_SESSION['package'])) {
                header('Location: '.URL.'/packages-summary.php');
                exit;
            }
        }else {
            $_SESSION['package'] = array($_POST['packageid']);
            if (isset($_SESSION['package'])) {
                header('Location: '.URL.'/packages-summary.php');
                exit;
            }
        }
    }
}

?>