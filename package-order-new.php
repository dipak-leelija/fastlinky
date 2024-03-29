<?php
session_start();
require_once "includes/constant.inc.php";

require_once ROOT_DIR."/_config/dbconnect.php";

require_once ROOT_DIR."/classes/date.class.php";
require_once ROOT_DIR."/classes/error.class.php";
require_once ROOT_DIR."/classes/search.class.php";
require_once ROOT_DIR."/classes/customer.class.php";
require_once ROOT_DIR."/classes/login.class.php";
require_once ROOT_DIR."/classes/services.class.php";

require_once ROOT_DIR."/classes/blog_mst.class.php";
require_once ROOT_DIR."/classes/gp-package.class.php";
require_once ROOT_DIR."/classes/utility.class.php";
require_once ROOT_DIR."/classes/utilityMesg.class.php";
require_once ROOT_DIR."/classes/utilityImage.class.php";
require_once ROOT_DIR."/classes/utilityNum.class.php";
require_once ROOT_DIR."/classes/faqs.class.php";

/* INSTANTIATING CLASSES */
$dateUtil       = new DateUtil();

$GPPackage      = new GuestPostpackage();
// $error 			= new Error();
// $search_obj	    = new Search();
$customer		= new Customer();
// $logIn			= new Login();
// $service		= new Services();
// $blogMst		= new BlogMst();
$utility		= new Utility();
$uMesg 			= new MesgUtility();
$uImg 			= new ImageUtility();
$uNum 			= new NumUtility();
$faqs		    = new faqs();
######################################################################################################################
$typeM		= $utility->returnGetVar('typeM','');
//user id
$cusId		= $utility->returnSess('userid', 0);
$packages   = $GPPackage->packDetailsByCat(1);

?>

<!DOCTYPE HTML>
<html lang="zxx">

<head>
    <meta charset="utf-8">
    <meta name="robots" content="noindex,nofollow">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="images/logo/favicon.png" type="image/png">
    <title>Managed Link Building, Blogger Outreach: <?php echo COMPANY_S; ?></title>
    <!-- Plugins Files -->
    <link href="<?= URL ?>/plugins/bootstrap-5.2.0/css/bootstrap.css" rel="stylesheet" />
    <?php require_once ROOT_DIR.'/plugins/font-awesome/fontawesome.php'?>

    <!-- Custom CSS -->
    <link href="<?= URL ?>/css/style.css" rel='stylesheet' type='text/css' />
</head>
<body>
    <?php require_once "components/navbar.php"; ?>
    <section class="managed-link-building-main-banner">
        <div class="container mlb-main-cntainer">
            <div class="row mlb-main-start-row">
                <div class="col-12 col-lg-7 col-md-7  px-0 px-md-4">
                    <div class="mlb-wrapping">
                        <h1 class="mlb-starting-main-h1">Link <span>Building</span> Services </h1>
                        <p class=" mt-3 mb-4 py-0 py-md-2 mlb-starting-main-p">We will lead you and your brand <br>
                            to a
                            new height.
                        </p>
                        <div>
                            <ul>
                                <li class="tick-check"> &#10004; <b class="tick-check-p">Quality over Quantity</b>
                                </li>
                                <li class="tick-check"> &#10004; <b class="tick-check-p">Relevant, White Hat Links
                                    </b></li>
                                <li class="tick-check"> &#10004; <b class="tick-check-p"> No paid links, No PBNs</b>
                                </li>
                                <li class="tick-check"> &#10004; <b class="tick-check-p">Inhouse team of experts</b>
                                </li>

                            </ul>

                        </div>
                        <div class=" buttonsinfo ">
                            <a href="#pricing-cards">
                                <button type="button" class="btn managed-link-btn ">See
                                    Pricing</button>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-5 col-md-5 vid-col">
                    <div class="mlb-wrapping">
                        <img src="./images/Managed_Link_Building-banner.png" class="w-100" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <?php require_once "components/footer.php"; ?>
    <!-- /Footer -->
    <script src="<?= URL ?>/js/jquery-2.2.3.min.js"></script>
    <script src="<?= URL ?>/plugins/bootstrap-5.2.0/js/bootstrap.js"></script>

</body>

</html>