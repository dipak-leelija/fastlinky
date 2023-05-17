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
        header("Location: ".URL."/app.client.php");
        exit;
    }elseif($cusDtl[0][0] == 2){
        // redirect to dashboard if loggedin user is set as seller 
        header("Location: ".URL."/dashboard.php");
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
                $return_url 	= "blogDetailsShare.php?id=".$_SESSION['orderNowId'];
            }else{
                $return_url 	= "dashboard.php"; 
            }
        }
        $logIn->validate($login, $password, 'email', 'password', 'customer', $return_url);
    }
}

?>
<!DOCTYPE HTML>
<html lang="zxx">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login with <?php echo COMPANY_S; ?></title>
    <link rel="shortcut icon" href="<?php echo FAVCON_PATH?>" type="image/png" />
    <link rel="apple-touch-icon" href="<?php echo FAVCON_PATH?>" />

    <meta name="description" content="">
    <meta name="keywords" content="" />

    <!-- Plugins Files -->
    <link href="<?= URL ?>/plugins/bootstrap-5.2.0/css/bootstrap.css" rel="stylesheet">
    <?php require_once ROOT_DIR.'/plugins/font-awesome/fontawesome.php'?>

    <link rel="stylesheet" href="css/login.css">
    <link href="css/style.css" rel='stylesheet' type='text/css' />
    <link href="css/form.css" rel='stylesheet' type='text/css' />
</head>

<body id="page-top" class="pt-0" data-spy="scroll" data-target=".navbar-fixed-top">
    <div id="home">
        <!-- header -->
        <?php require_once "partials/navbar.php"; ?>
        <!-- //header -->
        <section class="login-mainsectn">
            <div id="main-wrapper" class="container">
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
                                                <h3 class="h4 font-weight-bold text-theme">Login</h3>
                                            </div>
                                            <h6 class="h5 mb-0">Welcome back!</h6>
                                            <p class="text-muted mt-2 mb-2">Enter your email address and password to
                                                access
                                                admin panel.</p>

                                            <form role="form" class="form-horizontal-login needs-validation"
                                                action="<?php echo $_SERVER['PHP_SELF'] ?>" name="formContactform"
                                                method="POST" enctype="multipart/form-data" autocomplete="off"
                                                novalidate>
                                                <div class="form-group">
                                                    <label>Email address</label>
                                                    <input type="email" placeholder="example@gmail.com" id="txtUser"
                                                        name="txtUser" class="form-control" required>
                                                    <div class="invalid-feedback">
                                                        Please enter your email address!
                                                    </div>
                                                </div>

                                                <div class="form-group ">
                                                    <label>Password</label>
                                                    <input type="password" placeholder="Valid Password" minlength="6"
                                                        id="txtPass" name="txtPass" class="form-control" required>
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
                                                        href="register.php" class="text-primary ml-1">register</a></p>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- js-->
    <script src="plugins/bootstrap-5.2.0/js/bootstrap.js"></script>

    <!-- ==== js for smooth scrollbar ==== -->
    <!-- <script src="plugins/smooth-scrollbar.js"></script>
    <script>
    var Scrollbar = window.Scrollbar;
    Scrollbar.init(document.querySelector('body'));
    </script> -->
    <!-- ==== js for smooth scrollbar End ==== -->
    <!-- //Bootstrap Core JavaScript -->


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