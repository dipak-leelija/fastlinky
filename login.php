<?php
require_once("includes/constant.inc.php");
session_start();
require_once("_config/dbconnect.php");
require_once("classes/date.class.php");
require_once("classes/error.class.php");
require_once("classes/search.class.php");
require_once("classes/customer.class.php");
require_once("classes/login.class.php");
//require_once("../classes/front_photo.class.php");
require_once("classes/blog_mst.class.php");
require_once("classes/utility.class.php");
require_once("classes/utilityMesg.class.php");
require_once("classes/utilityImage.class.php");
require_once("classes/utilityNum.class.php");

/* INSTANTIATING CLASSES */
$dateUtil      	= new DateUtil();
$error 			= new Error();
$search_obj		= new Search();
$customer		= new Customer();
$logIn			= new Login();

//$ff				= new FrontPhoto();
$blogMst		= new BlogMst();
$utility		= new Utility();
$uMesg 			= new MesgUtility();
$uImg 			= new ImageUtility();
$uNum 			= new NumUtility();
######################################################################################################################
$typeM			= $utility->returnGetVar('typeM','');
//user id
$cusId			= $utility->returnSess('userid', 0);
$cusDtl		    = $customer->getCustomerData($cusId);
$return_url		= $utility->goToPreviousSessionPage();

if($cusDtl != NULL){

    if($cusDtl[0][0] == 1){
        // redirect to dashboard if loggedin user is set as seller 
        header("Location: ".URL."/app.client");
        exit;
    }elseif($cusDtl[0][0] == 2){
        // redirect to dashboard if loggedin user is set as seller 
        header("Location: ".URL."/dashboard");
        exit;
    }
}

$invUser    = '';
$errorMsg   = '';
if(isset($_GET['action'])){
    $invUser 	= base64_decode(urldecode($_GET['action']));
    if ($invUser == 'invalid') {
        $invUser = 'alert alert-warning show';
        $errorMsg   = 'invalid email.';
    }
    if ($invUser == 'invalidPassword') {
        $invUser = 'alert alert-warning show';
        $errorMsg   = 'invalid password.';
    }
}

if(isset($_POST['btnLogin'])){
    $login 			= $_POST['txtUser'];
    $password 		= $_POST['txtPass'];

    if(($login == '') || ($password == '')){

        header("Location: ".$_SERVER['PHP_SELF']."?msg=invalid username or password");
	
    }else{
        if($return_url == ''){
            if(isset($_SESSION['orderNow'])){
                $return_url 	= "blogDetailsShare?id=".$_SESSION['orderNowId'];
            }else{
                $return_url 	= "dashboard"; 
            }
        }
        $logIn->validate($login, $password, 'email', 'password', 'customer', $return_url);
    }
}

?>
<!DOCTYPE HTML>
<html lang="zxx">

<head>
    <?php require_once ROOT_DIR."/components/fastlinky-head.php" ?>

    <title>Login with <?php echo COMPANY_S; ?></title>
    <meta name="description" content="" />
    <meta name="keywords" content="" />

    <!-- Plugins Files -->
    <link href="<?= URL ?>/plugins/bootstrap-5.2.0/css/bootstrap.css" rel="stylesheet" />
    <?php require_once ROOT_DIR.'/plugins/font-awesome/fontawesome.php'?>

    <link href="<?= URL ?>/css/login.css" rel="stylesheet" type='text/css' />
    <link href="<?= URL ?>/css/style.css" rel='stylesheet' type='text/css' />
    <link href="<?= URL ?>/css/form.css" rel='stylesheet' type='text/css' />
    <style>
    body {
        padding-top: 4.9rem !important;
    }
    </style>
</head>

<body id="page-top" class="" data-spy="scroll" data-target=".navbar-fixed-top">
    <!-- header -->
    <?php require_once "components/navbar.php"; ?>
    <!-- //header -->
    <div class=" d-flex align-items-center justify-content-center" style="height:100vh;">
        <div id="main-wrapper" class="container ">
            <div class="row justify-content-center">
                <div class="col-xl-10">
                    <div class="card border-0" style="box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;">
                        <div class="card-body p-0">
                            <div class="row no-gutters">
                                <div class="col-lg-6 d-none d-lg-inline-block m-auto text-center">
                                    <div class="account-block rounded-right">
                                        <img src="./images/login.webp" width="400px" height="400px">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="login-div-below-card">
                                        <div>
                                            <div class="alert-dismissible fade <?php echo $invUser;?>" role="alert">
                                                <strong>Sorry!</strong> <?php echo $errorMsg; ?>
                                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                    aria-label="Close"></button>
                                            </div>
                                        </div>
                                        <div class="mb-2">
                                            <h1 class="h4 font-weight-bold text-theme">Login</h1>
                                        </div>
                                        <h2 class="h5 mb-4">Welcome back!</h2>

                                        <form role="form" class="form-horizontal-login needs-validation"
                                            action="<?= $_SERVER['PHP_SELF'] ?>" name="formContactform" method="POST"
                                            enctype="multipart/form-data" autocomplete="off" novalidate>
                                            <div class="form-group">
                                                <label for="txtUser" class="form-label mb-0">Email address</label>
                                                <input type="email" placeholder="example@gmail.com" id="txtUser"
                                                    name="txtUser" class="form-control" required>
                                                <div class="invalid-feedback">
                                                    Please enter your email address!
                                                </div>
                                            </div>

                                            <div class="form-group ">
                                                <label for="txtPass" class="form-label mb-0">Password</label>
                                                <input type="password" placeholder="********" minlength="6" id="txtPass"
                                                    name="txtPass" class="form-control" required>
                                                <div class="invalid-feedback">
                                                    Please enter your Password!
                                                </div>
                                            </div>
                                            <div class="col-sm-12 mb-2 submit-divclass  text-center">
                                                <a href="/"><button class="my-buttons-hover bn21" type="submit"
                                                        name="btnLogin">Login</button></a>
                                            </div>
                                            <div>
                                                <a href="#l" class="forgot-link text-right text-primary">Forgot
                                                    password?</a>
                                            </div>
                                            <p class="text-muted float-right mt-2 mb-0">Don't have an account? <a
                                                    href="register" class="text-primary ml-1">register</a></p>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- js-->
    <script src="<?= URL ?>/plugins/bootstrap-5.2.0/js/bootstrap.js"></script>
    <script>
    (function() {
        'use strict'
        var forms = document.querySelectorAll('.needs-validation')
        Array.prototype.slice.call(forms)
            .forEach(function(form) {
                form.addEventListener('submit', function(event) {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
            })
    })()
    </script>
</body>

</html>