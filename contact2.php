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

$errMsg = '';
$alertMsg  = '';

if(isset($_POST['firstname']) && isset($_POST['lastName']) && isset($_POST['email']) && isset($_POST['phone']) && isset($_POST['message'])){
	
	//get values in variables
	$fName					  = strip_tags(trim($_POST['firstname']));
	$lName					  = strip_tags(trim($_POST['lastName']));
	$fullName				  = $fName.' '.$lName;
	$txtEmail				  = strip_tags(trim($_POST['email']));
	$txtPhone				  = strip_tags(trim($_POST['phone']));
	$txtMessage				= strip_tags(trim($_POST['message']));
	
	$sess_arr	= array('firstname', 'lastName', 'email', 'phone', 'message');
	$utility->addGetSessArr($sess_arr);
	
	//checking for error
	$invalidEmail 	= $MyError->invalidEmail($txtEmail);

	if($fName == ''){

    $errMsg = ERLEADGEN001;
    $alertMsg  = 'alert-warning';

	}else if($lName == ''){

    $errMsg = ERLEADGEN002;
    $alertMsg  = 'alert-warning';

	}else if(preg_match("/^ER/",$invalidEmail)){

    $errMsg = ERLEADGEN003;
    $alertMsg  = 'alert-warning';

	}else if($txtPhone == '' || $txtPhone < 10){

    $errMsg = ERLEADGEN004;
    $alertMsg  = 'alert-warning';

	}else if($txtMessage == ''){
    
    $errMsg = ERLEADGEN006;
    $alertMsg  = 'alert-warning';

  }else{		
		
			//send email
			$subjectEmail 	= "Contact from ".$fullName." - ". $DateUtil->todayWithTime('.');
			$to 			= COMPANY_S. "<webtechhelp.org@gmail.com>";			
			$from 			= $fullName. "<".$txtEmail.">";
			
			 
			$body = '
				 <div style="width: 100%; height:auto; font:normal 13px Georgia, Times, Arial, Verdana, sans-serif;
							color: #000000; bachground-color:#fff;">
					<div style="padding:10px; margin:0px auto;" align="center">
						<img src="'.LOGO_WITH_PATH.'" height="'.LOGO_HEIGHT.'" width="'.LOGO_WIDTH.'" 
						 alt="'.LOGO_ALT.'" />
					</div>
					
					<div style="width: 650px; height:auto; margin:5px auto 10px auto; padding:20px 10px;
								font:normal 12px Helvetica, Arial, Verdana, sans-serif;
								color: #000000; bachground-color:#FCFCFC; -moz-border-radius: 4px; 
								-webkit-border-radius: 4px;border:1px solid #eee;">
								
						<h2 style="font:bold 12px Arial, Verdana, sans-serif;width:650px; height:30px;
								   background-color:#DCDCC7; color:#7C6677; text-align:center; line-height:30px;
								   vertical-align:middle; padding:0; margin:0">
							New Lead
						</h2>
						
						<p>Dear Admin,</p>
						<p>You have received a new lead. Below is the detail:</p>
						
						
						<p style="padding:10px">
							Name:    '.addslashes($fullName).'<br />
							Email:   '.$txtEmail.'<br />
							Phone:   '.$txtPhone.'<br />
							Message: '.addslashes($txtMessage).'<br />
						</p>
						
						<p>
						Regards,<br />
						Customer Service<br />
						'.COMPANY_S.'
						</p>
					</div>
			
			</div>
			';
			
				
			//send email to client
			$emailObj->sendEmail($to, $subjectEmail, $body, $fullName, $txtEmail);
			
			// Contact Data inser in contact table
			$added = $Contact->addContact($fullName, $txtEmail, $txtPhone, $txtMessage);
			if ($added) {
        $errMsg = SUCONTACT001;
        $alertMsg  = 'alert-primary';
      }
      
			$sess_arr	= array('firstname', 'lastName', 'email', 'phone', 'message');
			$utility->delSessArr($sess_arr);			
	}
	
}


?>
<?php

?>
<!DOCTYPE HTML>
<html lang="en">
<head>
    <?php require_once ROOT_DIR."/components/fastlinky-head.php" ?>

    <title><?php echo COMPANY_S; ?> Global Support - Contact Us </title>
    <meta name="description"
        content="LeeLija staff always available for your support. Our technical and SEO staffs always online, Leelija team provided free support for every one." />
    <meta name="keywords"
        content="contact for SEO, contact for web development, support for on page SEO, support for technical SEO, contact for guest post" />

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
            <h1 class="text-center">Contact us </h1>
            <p class="contact-us-p text-center">Fill out the form below to get your Free Proposal.</p>
            <div class="container">
                <div class="contact__wrapper  bg-transparent">
                    <div class="row no-gutters m-0">
                        <div class="col-lg-5 contact-info__wrapper order-lg-1">
                            <h2 class="color--white mb-5">Get in <strong class="h-25 w-25 p-2 rounded" style=" background-color: #ff7f50;">Touch</strong></h2>

                            <ul class="contact-info__list list-style--none position-relative z-index-101">
                                <a href="mailto:<?php echo CONTACT_MAIL; ?>" style="color:black;">
                                    <li class="mb-4 pl-4">
                                        <span class="position-absolute"><i class="fas fa-envelope"></i></span>
                                        <?php echo CONTACT_MAIL;?>
                                    </li>
                                </a>
                                <a href="tel:+91 874224523" style="color:black;">
                                    <li class="mb-4 pl-4">
                                        <span class="position-absolute"><i class="fas fa-phone"></i></span>
                                        <?php echo SITE_CONTACT_NO;?>
                                    </li>
                                </a>
                                <li class="mb-4 pl-4">
                                    <span class="position-absolute"><i class="fas fa-map-marker-alt"></i></span>
                                    Taki Road, Pirgacha, Barasat
                                    <br>Kolkata, West Bengal, India
                                    <br>Pincode- 700124
                                    <div class="mt-3">
                                        <a href="https://goo.gl/maps/AKCsxmTbJcdta2YKA" target="_blank"
                                            class="text-link link--right-icon text-dark">Get directions <i
                                                class="link__icon fa fa-directions"></i></a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-7 contact-form__wrapper pb-2  order-lg-2">
                            <?php
                          if ($errMsg != '') {
                            ?>
                            <div>
                                <div class="alert <?= $alertMsg ?> alert-dismissible fade show" role="alert">
                                    <strong><?= $errMsg ?></strong>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            </div>
                            <?php
                          }
                          ?>
                            <form method="post" action="contact" class="contact-form needs-validation" novalidate>
                                <div class="row">
                                    <div class="col-sm-12 mb-3">
                                        <div class="form-group">
                                            <label class="required-field" for="firstname">First Name</label>
                                            <input type="text" minlength="4" class="form-control border-0 border-bottom border-dark bg-transparent" id="firstname"
                                                name="firstname" required>
                                            <div class="invalid-feedback">
                                                Please Enter your first Name!
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-12 mb-3">
                                        <div class="form-group">
                                            <label for="lastName">Last Name</label>
                                            <input type="text" minlength="4" class="form-control border-0 border-bottom border-dark bg-transparent" id="lastName"
                                                name="lastName" required>
                                            <div class="invalid-feedback">
                                                Please Enter your last Name!
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-12 mb-3">
                                        <div class="form-group">
                                            <label class="required-field" for="email">Email</label>
                                            <input type="email" inputmode="email"
                                                pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" class="form-control border-0 border-bottom border-dark bg-transparent"
                                                id="email" name="email" required>
                                            <div class="invalid-feedback">
                                                Please enter your email!
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-12 mb-3">
                                        <div class="form-group">
                                            <label for="phone">Phone Number</label>
                                            <input type="text"
                                                onkeypress="return event.charCode >= 48 && event.charCode <= 57"
                                                minlength="10" pattern="[0-9]+" maxlength="10" class="form-control border-0 border-bottom border-dark bg-transparent"
                                                id="phone" name="phone" required>
                                            <div class="invalid-feedback">
                                                Please enter valid phone Number!
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-12 mb-3">
                                        <div class="form-group">
                                            <label class="required-field" for="message">How can we help?</label>
                                            <textarea class="form-control border-0 border-bottom border-dark bg-transparent" minlength="10" maxlength="1000" id="message" name="message"
                                                rows="4"  required></textarea>
                                            <div class="invalid-feedback">
                                                Please enter your queries!
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-12 mb-3 submit-divclass">
                                        <button type="submit" class="my-buttons-hover bn21">Submit</button>
                                    </div>

                                </div>
                            </form>
                        </div>
                        <!-- End Contact Form Wrapper -->
                    </div>
                </div>
            </div>
        </section>
        <!-- Footer -->
        <?php require_once "components/footer.php"; ?>
        <!-- /Footer -->
    </div>

    <script src="<?= URL ?>/plugins/jquery-3.6.0.min.js"></script>
    <script src="<?= URL ?>/plugins/bootstrap-5.2.0/js/bootstrap.js"></script>
    <script src="<?= URL ?>/plugins/bootstrap-5.2.0/js/bootstrap.bundle.min.js"></script>
    <script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
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