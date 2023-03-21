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
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login with <?php echo COMPANY_S; ?></title>
    <link rel="shortcut icon" href="<?php echo FAVCON_PATH?>" type="image/png" />
    <link rel="apple-touch-icon" href="<?php echo FAVCON_PATH?>" />

    <meta name="description" content="">
    <meta name="keywords" content="" />

    <link rel="stylesheet" href="plugins/bootstrap-5.2.0/css/bootstrap.css">
    <link rel="stylesheet" href="plugins/fontawesome-6.1.1/css/all.css">

    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/leelija.css">
    <link href="css/style.css" rel='stylesheet' type='text/css' />
    <link href="css/form.css" rel='stylesheet' type='text/css' />

    <style>
    *,
    *:before,
    *:after {
        margin: 0;
        padding: 0;
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        -ms-box-sizing: border-box;
        box-sizing: border-box;
        transition: all 0.3s ease-out;
        -webkit-transition: all 0.3s ease-out;
        -moz-transition: all 0.3s ease-out;
    }

    body {
        font-family: 'Nunito', sans-serif;
        width: 100%;
        height: 100%;
        overflow-x: hidden;
        font-weight: 400;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
        text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.004);
        margin: 0;
    }

    html {
        width: 100%;
        height: 100%;
    }

    h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
        font-weight: 400;
        padding: 0;
        margin: 0;
    }

    p {
        padding: 0;
        margin: 0;
    }

    a {
        text-decoration: none;
        padding: 0;
        margin: 0;
        outline: medium none !important;
    }

    a:hover {
        text-decoration: none;
        outline: medium none !important;
    }

    a:focus {
        text-decoration: none;
        outline: medium none !important;
    }

    img {
        display: inline-block;
        vertical-align: middle;
        max-width: 100%;
    }

    .clear {
        clear: both;
        width: 0;
        height: 0;
        visibility: hidden;
        overflow: hidden;
    }

    .test .open {

        display: none !important;
    }

    .smiley .open {
        display: block;
    }

    .smiley .close {
        display: none;
    }

    .test .close {
        display: block !important;
    }

    /********************************************************************/

    .feedback_container {
        text-align: center;
        padding: 50px;
    }

    .title_feedback {
        font-size: 31px;
        font-weight: 800;
        padding-bottom: 30px;
    }

    .rating_div,
    .question {
        margin-bottom: 80px;
    }

    .smiley {
        width: 72%;
        margin: auto;
    }

    .smiley span {
        display: block;
        float: left;
        margin: 0 20px;
        width: 70px;
        height: 70px;
        cursor: pointer;
    }

    .close {
        opacity: 1 !important;
    }

    .question a {
        text-align: center;
        display: block;
        border: 2px solid #f18700;
        margin-bottom: 30px;
        font-size: 18px;
        color: #000;
        font-weight: 800;
        padding: 10px 0;
    }

    .question a:hover,
    .question a.active_qa {
        background: #f18700;
        color: #fff;
    }

    .comment_div textarea {
        width: 100%;
        border: 2px solid #f18700;
        resize: none;
        outline: 0;
        font-weight: 800;
        padding: 20px;
        font-size: 18px;
    }

    .submit_btn {
        margin-top: 40px;
    }

    .submit_btn a {
        display: inline-block;
        background: #f18700;
        color: #fff;
        font-size: 20px;
        font-weight: 700;
        padding: 10px 40px;
        text-transform: uppercase;
    }

    @media only screen and (max-width: 800px) {

        .smiley {
            width: 97%;
        }

        .smiley span {
            width: 50px;
            height: 50px;
        }

    }

    @media only screen and (max-width: 640px) {

        .feedback_container {
            text-align: center;
            padding: 30px;
        }

        .title_feedback {
            font-size: 24px;
        }

        .smiley {
            width: 100%;
        }

        .smiley span {
            width: 40px;
            height: 40px;
            margin: 0 10px;
        }

    }
    </style>
</head>

<body class="pt-0">
    <div id="home">
        <!-- header -->
        <?php require_once "partials/navbar.php"; ?>
        <!-- //header -->
        <section class="" style="margin-top: 2.9rem">

            <!-- <button type="button" class="btn btn-primary btn-lg" data-toggle="modal"
                data-target="#myModal">Feedback</button>

          
            <div class="modal fade bs-example-modal-lg" id="myModal" tabindex="-1" role="dialog"
                aria-labelledby="myModalLabel">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-body">

                           

                        </div>
                    </div>
                </div>
            </div> -->
            <div class="feedback_container">

                <div class="rating_div">

                    <h4 class="title_feedback">Please Rate Our Website</h4>

                    <div class="smiley">
                        <span class="open"><img src="./images/dummy-img/dead_tminl7.png" /></span>
                        <span class="close"><img src="./images/dummy-img/dead-active_gcseca.png" /></span>

                    </div>
                    <div class="smiley">
                        <span class="open"><img src="./images/dummy-img/sad_il7kmb.png" /></span>
                        <span class="close"><img src="./images/dummy-img/sad-active_rhibzn.png" />
                    </div>
                    <div class="smiley">
                        <span class="open"><img src="./images/dummy-img/sceptic_we1bxv.png" /></span>
                        <span class="close"><img src="./images/dummy-img/sceptic-active_kez7sa.png" />
                    </div>
                    <div class="smiley">
                        <span class="open""><img src=" ./images/dummy-img/more-happy_f53bgi.png" /></span>
                        <span class="close"><img src="./images/dummy-img/more-happy-active_d2hget.png" />
                    </div>
                    <div class="smiley">
                        <span class="open"><img src="./images/dummy-img/happy_kakekm.png" /></span>
                        <span class="close"><img src="./images/dummy-img/happy-active_fs6ztw.png" />
                    </div>

                </div>

                <div class="qa_div">

                    <h4 class="title_feedback">What Could Be Better?</h4>

                    <div class="question">

                        <div class="row">

                            <div class="col-md-4">
                                <a href="javascript:;">Navigation Experience</a>
                            </div>

                            <div class="col-md-4">
                                <a href="javascript:;">Overall Experience</a>
                            </div>

                            <div class="col-md-4">
                                <a href="javascript:;">Website Look & Feel</a>
                            </div>

                        </div>

                        <div class="row">

                            <div class="col-md-4"> </div>

                            <div class="col-md-4">
                                <a href="javascript:;">Information Availablity</a>
                            </div>

                            <div class="col-md-4"> </div>

                        </div>

                    </div>

                </div>

                <div class="comment_div">

                    <h4 class="title_feedback">Comments / Suggestions?</h4>

                    <textarea rows="8"></textarea>

                </div>

                <div class="submit_btn">
                    <a href="">Submit</a>
                </div>

            </div>
        </section>
    </div>

    <!-- js-->

    <script src="plugins/bootstrap-5.2.0/js/bootstrap.js"></script>

    <!-- ==== js for smooth scrollbar ==== -->
    <script src="plugins/smooth-scrollbar.js"></script>
    <script>
    $(document).ready(function() {


        $(".question a").click(function() {
            $(this).toggleClass("active_qa");
        });

        $(".smiley").click(function() {
            $(this).toggleClass("test");
            $(this).siblings().removeClass("test");


        });

    });
    </script>
</body>

</html>