<?php
require_once __DIR__ . "/includes/constant.inc.php";
require_once ROOT_DIR . "/includes/registration.inc.php";
session_start();

require_once ROOT_DIR . "/_config/dbconnect.php";

require_once ROOT_DIR . "/classes/date.class.php";
require_once ROOT_DIR . "/classes/error.class.php";
require_once ROOT_DIR . "/classes/search.class.php";
require_once ROOT_DIR . "/classes/customer.class.php";

require_once ROOT_DIR . "/classes/blog_mst.class.php";
require_once ROOT_DIR . "/classes/utility.class.php";
require_once ROOT_DIR . "/classes/utilityMesg.class.php";
require_once ROOT_DIR . "/classes/utilityImage.class.php";
require_once ROOT_DIR . "/classes/utilityNum.class.php";



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

if(isset($_POST['btnSubmit'])){
    //post vars
    $customerType       = 1;
    $firstName 		    = $_POST['firstName'];
    $lastName 		    = $_POST['lastName'];    
    // $fullname           = explode(" ",$firstName );
    // $firstName          = $fullname[0];
    // $lastName           = $fullname[1];
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
    $url		= $_SERVER['PHP_SELF'];
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
        $custId 	= $customer->addCustomer($customerType, 1, $txtUserName, $txtemail, $txtPassword, $firstName, $lastName, $txtGender,'', 'a',
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

    <!-- Bootstrap Core CSS -->
    <!-- <link href="css/bootstrap.css" rel='stylesheet' type='text/css' /> -->
    <link href="css/style.css" rel='stylesheet' type='text/css' />
    <link rel="stylesheet" href="plugins/bootstrap-5.2.0/css/bootstrap.css">
    <link rel="stylesheet" href="plugins/fontawesome-6.1.1/css/all.css">
    <!-- <link href="css/contact-us.css" rel='stylesheet' type='text/css' /> -->
    <link rel="stylesheet" href="css/register.css">
    <link href="css/form.css" rel='stylesheet' type='text/css' />
    <link rel="stylesheet" href="css/leelija.css">
    <!-- //Custom Theme files -->
    <!--webfonts-->
    <link href="//fonts.googleapis.com/css?family=Ubuntu:300,300i,400,400i,500,500i,700,700i" rel="stylesheet">
    <!--//webfonts-->

    <link href="//fonts.googleapis.com/css?family=Montserrat:400,500,600,700,900" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Nunito+Sans:400,700,900" rel="stylesheet">
</head>

<body id="page-top" class="pt-0" data-spy="scroll" data-target=".navbar-fixed-top">
    <div id="home">
        <!-- header -->
        <?php require_once 'partials/navbar.php'; ?>
        <!-- //header -->
        <section class="register-section">
            <div id="main-wrapper" class="container">
                <div class="row justify-content-center mb-3">
                    <div class="col-xl-12">
                        <div class="card border-0" style="box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;">
                            <div class="card-body p-0">
                                <div class="row no-gutters " style="background: #ff9a44;">
                                    <div class="col-lg-7"
                                        style="background: #fff; box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;">
                                        <div class="reg-div-below-card ">
                                            <div class="mb-3 mt-2">
                                                <h3 class="h4 font-weight-bold text-theme reg-heading">
                                                    Join With Fastlinky</h3>
                                            </div>
                                            <div class="section group">
                                                <div class="bfrom">
                                                    <form class="form-horizontal-login needs-validation" role="form"
                                                        action="<?php echo $_SERVER['PHP_SELF'] ?>" onsubmit="return userCheck()" name="regUserForm"
                                                        method="post" enctype="multipart/form-data" autocomplete="off"
                                                        id="regUserForm" novalidate>
                                                        
                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <label class="required-field">Register As </label>

                                                                <div class="d-flex  user-client-radio">
                                                                    <div class="form-check form-check-inline mb-0">
                                                                        <input class="form-check-input" type="radio"
                                                                            name="inlineRadioOptions" id="inlineRadio1"
                                                                            value="option1" required>
                                                                        <label class="form-check-label"
                                                                            for="inlineRadio1">Client</label>
                                                                        <!-- <div class="invalid-feedback">
                                                                            Choose one!
                                                                        </div>
                                                                        <div class="valid-feedback">
                                                                            Looks good!
                                                                        </div> -->
                                                                    </div>
                                                                    <div class="form-check form-check-inline mb-0">
                                                                        <input class="form-check-input" type="radio"
                                                                            name="inlineRadioOptions" id="inlineRadio2"
                                                                            value="option2">
                                                                        <label class="form-check-label"
                                                                            for="inlineRadio2" required>Seller</label>

                                                                    </div>
                                                                </div>
                                                                <div class="invalid-feedback" id="select-user-type">
                                                                    Please Select One
                                                                </div>
                                                            </div> -->

                                                            <div class="col-sm-6">
                                                                <label class="required-field">Name</label>
                                                                <input type="text" minlength="8" id="firstName"
                                                                    name="firstName" placeholder="John Doe"
                                                                    class="form-control" required>
                                                                <div class="invalid-feedback">
                                                                    Please Enter your Name!
                                                                </div>
                                                                <div class="valid-feedback">
                                                                    Looks good!
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <div class="form-floating mb-2">
                                                                    <input type="number"
                                                                        oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                                                        maxlength="10" class="form-control"
                                                                        id="mobNumber" placeholder=" " name="mobNumber"
                                                                        required>
                                                                    <label for="floatingInput"> Contact Number </label>
                                                                    <div class="invalid-feedback">
                                                                        Please enter your contact number!
                                                                    </div>
                                                                    <div class="valid-feedback">
                                                                        Looks good!
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <div class="form-floating mb-2">
                                                                    <input type="email" id="txtemail" name="txtemail"
                                                                        placeholder="example@email.com"
                                                                        class="form-control" required>
                                                                    <label class="required-field">Email</label>
                                                                    <div class="invalid-feedback">
                                                                        Please enter your email!
                                                                    </div>
                                                                    <div class="valid-feedback">
                                                                        Looks good!
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <label for="profession"
                                                                    class="control-label required-field">
                                                                    Select
                                                                    Your Profession</label>
                                                                <select id="txtProfession"
                                                                    class="form-control py-0 select2  mb-3"
                                                                    name="txtProfession" style="align-items: center;"
                                                                    required>
                                                                    <option value="" selected="selected">-- Select
                                                                        Profession --
                                                                    </option>
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

                                                                <div class="invalid-feedback">
                                                                    Please choose a profession!
                                                                </div>
                                                                <div class="valid-feedback">
                                                                    Looks good!
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <label for="country"
                                                                    class="control-label required-field">
                                                                    Select
                                                                    Your Country</label>
                                                                <select id="selectCountry" name="txtCountry"
                                                                    class="form-control py-0 " required>
                                                                    <option value="">-- Select Country --</option>
                                                                    <?php
												         if(isset($_SESSION['userid'])){
												              //$utility->genDropDown($_SESSION['txtCountriesId'], $arr_val, $arr_label);
												            $utility->populateDropDown($cusDtl[24], 'id', 'country_name', 'countries');
												              }else{
												                //$utility->genDropDown(0, $arr_val, $arr_label);
												                 $utility->populateDropDown(0, 'id', 'country_name', 'countries');
												                          }
												                     ?>
                                                                </select>

                                                                <div class="invalid-feedback">
                                                                    Please choose a country!
                                                                </div>
                                                                <div class="valid-feedback">
                                                                    Looks good!
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <label class="required-field">Password</label>
                                                                <input type="password" minlength="6" id="txtPassword"
                                                                    name="txtPassword" placeholder="(username)123"
                                                                    class="form-control" required>
                                                                <div class="invalid-feedback">
                                                                    Your password must be 6-20 characters long!
                                                                </div>
                                                                <div class="valid-feedback">
                                                                    Strong password!
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <div class="form-floating mb-2">
                                                                    <input type="password" id="txtPasswordConfirm"
                                                                        name="txtPasswordConfirm" minlength="6"
                                                                        placeholder="Confirm Password"
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
                                                                        I Agree with the <a class="term-n-policy" href="">Terms of service</a>
                                                                        and <a class="term-n-policy" href="">Privacy Policy</a> .
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 mb-3 submit-divclass  text-center">
                                                            <a href="/"><button class="my-buttons-hover bn21"
                                                                    type="submit" id="userRegisterBtn"
                                                                    name="btnSubmit"><i
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
                                    <div class="col-lg-5 d-none d-lg-inline-block m-auto text-center">

                                        <div class=" m-auto text-center">

                                            <img src="./images/signup.png" style="width: 100%;">
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

    // const userCheck = ()=>{
    //     let customerType = document.forms["regUserForm"]["customer-type"].value;
    //     boxes = document.querySelectorAll('.user-client-radio');

    //     if (customerType == '' || customerType == null ) {
    //         document.getElementById('select-user-type').classList.add('d-block');
    //         for (const box of boxes) {
    //             box.classList.add('border-danger');
    //         }
    //         return false;
    //     }else{
    //         document.getElementById('select-user-type').classList.add('d-none');
    //         for (const box of boxes) {
    //             box.classList.remove('border-danger');
    //         }      
    //     }
    // }


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