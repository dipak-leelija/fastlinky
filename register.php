<?php
session_start();
require_once "includes/constant.inc.php";
require_once "includes/registration.inc.php";

require_once("_config/dbconnect.php");

require_once "classes/date.class.php";
require_once "classes/error.class.php";
require_once "classes/search.class.php";
require_once "classes/customer.class.php";

require_once "classes/blog_mst.class.php";
require_once "classes/utility.class.php";
require_once "classes/utilityMesg.class.php";
require_once "classes/utilityImage.class.php";
require_once("classes/utilityNum.class.php");

require_once("includes/registration.inc.php");


/* INSTANTIATING CLASSES */
$dateUtil      	= new DateUtil();
$myError 		= new MyError();
$search_obj		= new Search();
$customer		= new Customer();

//$ff				= new FrontPhoto();
$blogMst		= new BlogMst();
$utility		= new Utility();
$uMesg 			= new MesgUtility();
$uImg 			= new ImageUtility();
$uNum 			= new NumUtility();
######################################################################################################################
$typeM		= $utility->returnGetVar('typeM','');
//user id
$cusId			= $utility->returnSess('userid', 0);
//$cusDtl			= $client->getClientData($cusId);

// echo pathinfo($_SERVER['PHP_SELF'], PATHINFO_FILENAME);exit;

if(isset($_POST['btnSubmit'])){
    //post vars
    $firstName 		    = $_POST['firstName'];
    $lastName 		    = $_POST['lastName'];
    $mobNo              = $_POST['mobNumber'];
    $txtemail  		    = $_POST['txtemail'];
    $txtUserName 	    = $_POST['txtemail'];
    $txtPassword	    = $_POST['txtPassword'];
    $txtPasswordConfirm	= $_POST['txtPasswordConfirm'];
    $txtCountry		    = $_POST['txtCountry'];
    $txtGender		    = '';
    $txtProfession      = $_POST['txtProfession'];
    //$selUType  	    = $_POST['selUType'];



    //registering the post session variables
    $sess_arr	= array('firstName','lastName','txtemail','txtPassword','txtGender', 'txtProfession');
    // $utility->addPostSessArr($sess_arr);


    //defining error variables
    $action		= 'add_user';
    $url		= pathinfo($_SERVER['PHP_SELF'], PATHINFO_FILENAME);
    $id			= 0;
    $id_var		= '';
    $anchor		= 'addUser';
    $typeM		= 'ERROR';


    //check for errors
    $duplicate = $myError->duplicateUser($txtemail, 'user_name', 'customer');
    $email_id  = $myError->invalidEmail($txtemail);

    if($firstName == '' ){

        $myError->showErrorTA($action, $id, $id_var, $url, ERREG001, $typeM, $anchor);

    }elseif($lastName == '' ){

        $myError->showErrorTA($action, $id, $id_var, $url, ERREG002, $typeM, $anchor);
    }
    elseif(strlen($txtPassword) < 6){
        
        $myError->showErrorTA($action, $id, $id_var, $url, ERU117, $typeM, $anchor);

    }elseif( $txtPassword!=$txtPasswordConfirm){

        $myError->showErrorTA($action, $id, $id_var, $url, conp0001, $typeM, $anchor);

    }elseif(preg_match("/ER/i",$duplicate)){

        $myError->showErrorTA($action, $id, $id_var, $url, ERREG006, $typeM, $anchor);

    }elseif(preg_match("/ER/i",$email_id)){

        $myError->showErrorTA($action, $id, $id_var, $url, ERREG005, $typeM, $anchor);

    }else{
        $uniqueId= time().' '.mt_rand();
        $uniqueId = md5($uniqueId);
                    
        //Add New User
        $custId 	= $customer->addCustomer(1, 1, $txtUserName, $txtemail, $txtPassword, $firstName, $lastName, $txtGender,'', 'a',
        '', '', '', 'Y', $txtProfession, 0, $uniqueId,
        'N', 0);



        $customer->addCusAddress($custId, '', '', '', '', '', '', $txtCountry, $mobNo, '', '', $mobNo);

        //delete the session
        $utility->delSessArr($sess_arr);

        //send email

        // var url= "contact-inc.php?txtName=" + escape(txtName) + "&txtEmail=" + escape(txtEmail) + "&txtPhone=" + escape(txtPhone) + "&txtMessage=" + escape(txtMessage);



            $_SESSION['vkey']               = $uniqueId;
            $_SESSION['newCustomerSess']    = $custId;
            $_SESSION['fisrt-name']         = $firstName;
            $_SESSION['last-name']          = $lastName;
            $_SESSION['email']              = $txtemail;
            $_SESSION['profession']         = $txtProfession;


        $mailurl= 'register-email-inc.php';

        header('location:'.$mailurl);
        exit;
    }
}//Register

$errorMsg   = '';
if(isset($_GET['msg'])){
    $alertProp = 'alert alert-danger show';
    $errorMsg = $_GET['msg'];
}

?>
<!DOCTYPE HTML>
<html lang="zxx">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Connect with <?php echo COMPANY_S; ?></title>
    <link rel="shortcut icon" href="<?php echo FAVCON_PATH?>" type="image/png" />
    <link rel="apple-touch-icon" href="<?php echo FAVCON_PATH?>" />
    <meta name="description"
        content="Client register for buy ready web products or guest post services Or Reseller can register for sell his/her web products or guest post services">
    <meta name="keywords" content="Web Design, Web Development, Apps Development, SEO Services, Guest Post Services, Domain name with Ready Website,
Ready website for business, High Quality website sales, High quality blogs sales, expired domain sales" />

    <!-- Plugins Files -->
    <link href="<?= URL ?>/plugins/bootstrap-5.2.0/css/bootstrap.css" rel="stylesheet">
    <?php require_once ROOT_DIR.'/plugins/font-awesome/fontawesome.php'?>

    <link href="css/style.css" rel='stylesheet' type='text/css' />
    <link href="css/form.css" rel='stylesheet' type='text/css' />
    <link rel="stylesheet" href="css/register.css">
    <!-- //Custom Theme files -->
    <style>
    body {
        padding-top: 4.9rem !important;
    }
    </style>
</head>

<body id="page-top" class="" data-spy="scroll" data-target=".navbar-fixed-top">
    <!-- header -->
    <?php require_once 'partials/navbar.php'; ?>
    <!-- //header -->
    <div class="maincountainer d-flex  justify-content-center">
        <div id="main-wrapper" class="container my-3">
            <div class="row justify-content-center ">
                <div class="col-xl-12">
                    <div class="card border-0" style="box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;">
                        <div class="card-body p-0">
                            <div class="row no-gutters ">
                                <div class="col-lg-5 d-none d-lg-inline-block m-auto text-center">

                                    <div class=" m-auto text-center">

                                        <img src="./images/signup-img.webp" style="width: 90%;">
                                    </div>
                                </div>
                                <div class="col-lg-7">
                                    <div class="reg-div-below-card ">
                                        <div class="mb-3 mt-2">
                                            <h3 class="h4 font-weight-bold text-theme reg-heading">
                                                Join With Fastlinky</h3>
                                            <?php if ($errorMsg != '') { ?>
                                            <div class="alert-dismissible fade <?=$alertProp;?>" role="alert">
                                                <strong>Sorry!</strong> <?= $errorMsg; ?>
                                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                    aria-label="Close"></button>
                                            </div>
                                            <?php } ?>
                                        </div>
                                        <div class="section group">
                                            <div class="bfrom">
                                                <form class="form-horizontal-login needs-validation" role="form"
                                                    action="<?= $_SERVER['PHP_SELF'] ?>" name="regUserForm"
                                                    method="post" enctype="multipart/form-data" autocomplete="off"
                                                    id="regUserForm" novalidate>

                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="form-floating mb-2">
                                                                <input type="text" placeholder="firstname" minlength="3"
                                                                    id="firstName" name="firstName" class="form-control"
                                                                    required>
                                                                <label class="required-field">First Name</label>
                                                                <div class="invalid-feedback">
                                                                    Please Enter First your Name!
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-floating mb-2">
                                                                <input type="text" placeholder="lastname" minlength="3"
                                                                    id="lastName" name="lastName" class="form-control"
                                                                    required>
                                                                <label class="required-field">Last Name</label>
                                                                <div class="invalid-feedback">
                                                                    Please Enter your Last Name!
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="form-floating mb-2">
                                                                <input type="text"
                                                                    onkeypress="return event.charCode >= 48 && event.charCode <= 57"
                                                                    minlength="10" pattern="[0-9]+" maxlength="10"
                                                                    class="form-control" id="mobNumber" placeholder=" "
                                                                    name="mobNumber" required>
                                                                <label for="floatingInput"> Contact Number </label>
                                                                <div class="invalid-feedback">
                                                                    Please enter your contact number!
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-floating mb-2">
                                                                <input type="email" id="txtemail" name="txtemail"
                                                                    placeholder="example@email.com" inputmode="email"
                                                                    pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"
                                                                    autofill="off" autocomplete="false"
                                                                    class="form-control" required>
                                                                <label class="required-field">Email</label>
                                                                <div class="invalid-feedback">
                                                                    Please enter your email!
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="form-floating mb-2">
                                                                <select class="form-select" name="txtProfession"
                                                                    id="txtProfession"
                                                                    aria-label="Floating label select example" required>
                                                                    <option value="" selected="selected">Select
                                                                        Profession</option>
                                                                    <option value="Author">Author</option>
                                                                    <option value="Blogger">Blogger</option>
                                                                    <option value="Blogger">Blogger Outreach Manager
                                                                    </option>
                                                                    <option value="Business Analyser">Business
                                                                        Analyser
                                                                    </option>
                                                                    <option value="Marketing Manager">Marketing
                                                                        Manager
                                                                    </option>
                                                                    <option value="Web Developer">Web Developer
                                                                    </option>
                                                                    <option value="Others">Others</option>
                                                                </select>
                                                                <label for="profession">Profession</label>
                                                                <div class="invalid-feedback">
                                                                    Please choose a profession!
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-floating mb-2">
                                                                <select class="form-select" id="selectCountry"
                                                                    name="txtCountry" required>
                                                                    <option value="" selected="selected">Select
                                                                        Country</option>
                                                                    <?php
												                           if(isset($_SESSION['userid'])){
												                            
												                               $utility->populateDropDown($cusDtl[24], 'id', 'name', 'countries');
												                                }else{
												                             
												                                $utility->populateDropDown(0, 'id', 'name', 'countries');
												                               }
												                             ?>
                                                                </select>
                                                                <label for="floatingSelect">Country</label>
                                                                <div class="invalid-feedback">
                                                                    Please choose a country!
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="form-floating mb-2">
                                                                <input type="password" minlength="8" id="txtPassword"
                                                                    name="txtPassword" placeholder="(username)123"
                                                                    pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*_=+-]).{8,16}$"
                                                                    autocomplete="new-password" class="form-control"
                                                                    required>
                                                                <label class="required-field">Password </label>
                                                                <div class="invalid-feedback">
                                                                    Must be a combination of
                                                                    (A-Z),(a-z),(0-9),(!@#$%^&*=+-_) and >8
                                                                    characters long!
                                                                </div>
                                                                <div class="valid-feedback">
                                                                    Strong password!
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-6">
                                                            <div class="form-floating mb-2">
                                                                <input type="password" id="txtPasswordConfirm"
                                                                    name="txtPasswordConfirm" minlength="8"
                                                                    placeholder="Confirm Password"
                                                                    pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*_=+-]).{8,16}$"
                                                                    class="form-control " required>
                                                                <label class="required-field">Confirm
                                                                    Password</label>
                                                                <div class="form-text confirm-message"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row ">
                                                        <div class="col-sm-12">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox"
                                                                    id="gridCheck1" required>
                                                                <label class="form-check-label" for="gridCheck1">
                                                                    I Agree with the 
                                                                        <a class="term-n-policy" href="privacy-policy">
                                                                            Terms of service
                                                                        </a> 
                                                                        and 
                                                                        <a class="term-n-policy" href="privacy-policy">
                                                                            Privacy Policy
                                                                        </a>
                                                                        .
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 mb-3 submit-divclass  text-center">
                                                        <a href="/"><button class="my-buttons-hover bn21" type="submit"
                                                                id="userRegisterBtn" name="btnSubmit"><i
                                                                    class="fas fa-sign-in-alt pr-2"></i>
                                                                Register</button></a>
                                                    </div>
                                                    <div class=" sign-up-btn pr-3 text-right">
                                                        <span>Already have an account?</span> <a href="login.php"
                                                            class=""> Sign in
                                                            Now</a>
                                                    </div>

                                                </form>

                                                <br>
                                            </div>

                                        </div>
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
    <script src="plugins/jquery-3.6.0.min.js"></script>
    <script src="js/jquery-2.2.3.min.js"></script>
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

    <script>
    $('#txtPassword, #txtPasswordConfirm').on('keyup', function() {
        'use strict'
        $('.confirm-message').removeClass('success-message').removeClass('error-message');
        let password = $('#txtPassword').val();
        let confirm_password = $('#txtPasswordConfirm').val();
        if (password === "") {
            $('.confirm-message').text("Password Field cannot be empty!").addClass('error-message');
        } else if (confirm_password === "") {
            $('.confirm-message').text("Confirm Password Field cannot be empty!").addClass('error-message');
        } else if (confirm_password === password) {
            $('.confirm-message').text('Password Match!').addClass('success-message');
        } else {
            $('.confirm-message').text("Password Doesn't Match!").addClass('error-message');
            // $('#txtPasswordConfirm').addClass('is-invalid');
        }
    });
    </script>


    <script src="plugins/bootstrap-5.2.0/js/bootstrap.bundle.js"></script>
    <!-- //Bootstrap Core JavaScript -->
    <!-- <script src="js/regUser.js"></script>
    <script src="js/jquery.validate.js"></script> -->
</body>

</html>