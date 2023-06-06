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
$return_url		= "";
//$cusDtl			= $client->getClientData($cusId);


?>
<!DOCTYPE HTML>
<html lang="zxx">

<head>
    <meta name="robots" content="noindex,nofollow">
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

    <style>
    .feedback-main-card {
        max-width: 23rem;
        margin: auto;
        border: none;
        box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
    }

    .required-field {
        color: var(--black) !important;
    }

    div.stars {
        display: flex;
        margin: auto;
        justify-content: center;
    }

    input.star {
        display: none;
    }

    label.star {
        float: right;
        padding: 2px 8px 0px !important;
        font-size: 30px;
        /* color: #4A148C; */
        color: var(--mustard) !important;
        transition: all .2s;
    }

    input.star:checked~label.star:before {
        content: '\f005';
        color: #FD4;
        transition: all .25s;
    }

    input.star-5:checked~label.star:before {
        color: #FE7;
        text-shadow: 0 0 10px #952;
    }

    input.star-1:checked~label.star:before {
        color: #F62;
    }

    label.star:hover {
        transform: rotate(-15deg) scale(1.3);
    }

    label.star:before {
        content: '\f006';
        font-family: FontAwesome;
    }
    </style>
    <style media="screen">
    .auto-popup-feedback {
        border-radius: 8px;
        font-family: "Poppins", sans-serif;
        display: none;
        z-index: 99;
    }

    .closing-icon {
        text-align: end;
        font-size: 1.65rem;
        padding-right: .4rem;
        cursor: pointer;
        color: #ff0000ab;
    }

    .auto-popup-feedback h2 {
        margin-top: -20px;
    }

    .auto-popup-feedback p {
        font-size: 14px;
        text-align: justify;
        margin: 20px 0;
        line-height: 25px;
    }
    </style>
</head>
<body>
    <div id="home">
        <!-- header -->
        <?php require_once "partials/navbar.php"; ?>
        <!-- //header -->

        <div class="auto-popup-feedback">
            <div>
                <div class="card feedback-main-card">
                    <div class="text-end">
                        <i id="close" class="fa-sharp fa-solid fa-circle-xmark closing-icon pt-2"></i>
                    </div>
                    <div class="row no-gutters  m-auto">
                        <div class="col pt-1">
                            <form method="post" class="contact-form needs-validation" novalidate>
                                <div class="row">
                                    <div class="col-sm-12 mb-0">
                                        <div class="form-group">
                                            <label class="required-field" for="firstname">How Satisfied were you with
                                                your recent visit in the following areas?</label>
                                            <div class="stars">
                                                <form action="">
                                                    <div>
                                                        <input class="star star-5" id="star-5" type="radio"
                                                            name="star" />
                                                        <label class="star star-5" for="star-5"></label>
                                                        <input class="star star-4" id="star-4" type="radio"
                                                            name="star" />
                                                        <label class="star star-4" for="star-4"></label>
                                                        <input class="star star-3" id="star-3" type="radio"
                                                            name="star" />
                                                        <label class="star star-3" for="star-3"></label>
                                                        <input class="star star-2" id="star-2" type="radio"
                                                            name="star" />
                                                        <label class="star star-2" for="star-2"></label>
                                                        <input class="star star-1" id="star-1" type="radio"
                                                            name="star" />
                                                        <label class="star star-1" for="star-1"></label>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 mb-0">
                                        <div class="form-group">
                                            <label class="required-field" for="firstname">Full Name</label>
                                            <input type="text" minlength="4" class="form-control" id="firstname"
                                                name="firstname" placeholder="John" required>
                                            <div class="invalid-feedback">
                                                Please Enter your first Name!
                                            </div>
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-12 mb-0">
                                        <div class="form-group">
                                            <label class="required-field" for="email">Email</label>
                                            <input type="email" class="form-control" id="email" name="email"
                                                placeholder="example@gmail.com" required>
                                            <div class="invalid-feedback">
                                                Please enter your email!
                                            </div>
                                            <div class="valid-feedback">
                                                Email is valid!
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 mb-0">
                                        <div class="form-group">
                                            <label class="required-field" for="message">What feature can we add to
                                                improve?</label>
                                            <textarea class="form-control mb-0" minlength="10" id="message"
                                                name="message" rows="2" placeholder="Hi there, I would like to....."
                                                required></textarea>
                                            <div class="invalid-feedback">
                                                Please enter your queries!
                                            </div>
                                            <div class="valid-feedback">
                                                We will solve this soon!
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 mb-0 submit-divclass text-center">
                                        <a href="/">

                                            <button class="my-buttons-hover bn21">Submit <i class="fas fa-comments"
                                                    style="font-size: 1.2rem;"></i></button>
                                        </a>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- js-->
    <script src="plugins/bootstrap-5.2.0/js/bootstrap.js"></script>
    <script src="plugins/smooth-scrollbar.js"></script>
    <script type="text/javascript">
    window.addEventListener("load", function() {
        setTimeout(
            function open(event) {
                document.querySelector(".auto-popup-feedback").style.display = "block";
            },
            8000
        )
    });
    document.querySelector("#close").addEventListener("click", function() {
        document.querySelector(".auto-popup-feedback").style.display = "none";
    });
    </script>
</body>

</html>