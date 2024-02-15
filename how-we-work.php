<?php
session_start();
require_once __DIR__ . "/includes/constant.inc.php";
include_once ROOT_DIR . "/includes/contact-us-email.inc.php";
include_once ROOT_DIR . "/includes/user.inc.php";
require_once ROOT_DIR . "/_config/dbconnect.php";

require_once ROOT_DIR . "/classes/customer.class.php";
require_once ROOT_DIR . "/classes/contact.class.php";
require_once ROOT_DIR . "/classes/error.class.php";
require_once ROOT_DIR . "/classes/emails.class.php";
require_once ROOT_DIR . "/classes/date.class.php";
require_once ROOT_DIR . "/classes/utility.class.php";

/* INSTANTIATING CLASSES */
$customer		= new Customer();
$Contact        = new Contact();
$MyError 		= new MyError();
$emailObj		= new Emails();
$DateUtil      	= new DateUtil();
$utility		= new Utility();
######################################################################################################################
$typeM		= $utility->returnGetVar('typeM','');
//user id
$cusId		= $utility->returnSess('userid', 0);



?>
<!DOCTYPE HTML>
<html lang="en">
<head>
    <?php require_once ROOT_DIR."/components/fastlinky-head.php" ?>

    <title>How we Work - <?= COMPANY_S; ?></title>
    <meta name="description" content="" />
    <meta name="keywords" content="" />

    <!-- Plugins Files -->
    <link href="<?= URL ?>/plugins/bootstrap-5.2.0/css/bootstrap.css" rel="stylesheet" />
    <?php require_once ROOT_DIR.'/plugins/font-awesome/fontawesome.php'?>

    <!-- Custom CSS -->
    <link href="<?= URL ?>/css/contact-us.css" rel='stylesheet' type='text/css' />
    <link href="<?= URL ?>/css/style.css" rel='stylesheet' type='text/css' />
    <link href="<?= URL ?>/css/form.css" rel='stylesheet' type='text/css' />
    <link href="<?= URL ?>/css/custom.css" rel='stylesheet' type='text/css' />
</head>
<body>
    <div id="home">
        <!-- header -->
        <?php require_once "components/navbar.php"; ?>
        <!-- //header -->
        <section class="contact-us-section mb-5">

        </section>
        <!-- Footer -->
        <?php require_once "components/footer.php"; ?>
        <!-- /Footer -->
    </div>

    <script src="<?= URL ?>/plugins/jquery-3.6.0.min.js"></script>
    <script src="<?= URL ?>/plugins/bootstrap-5.2.0/js/bootstrap.js"></script>
    <script src="<?= URL ?>/plugins/bootstrap-5.2.0/js/bootstrap.bundle.min.js"></script>
</body>

</html>