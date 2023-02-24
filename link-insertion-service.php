<?php
session_start();

require_once("_config/dbconnect.php");
require_once "_config/dbconnect.trait.php";

require_once("includes/constant.inc.php");
require_once("classes/date.class.php");
require_once("classes/error.class.php");
require_once("classes/search.class.php");
require_once("classes/customer.class.php");
require_once("classes/login.class.php");
require_once("classes/services.class.php");

//require_once("../classes/front_photo.class.php");
require_once("classes/blog_mst.class.php");
require_once("classes/utility.class.php");
require_once("classes/utilityMesg.class.php");
require_once("classes/utilityImage.class.php");
require_once("classes/utilityNum.class.php");
require_once("classes/faqs.class.php");

/* INSTANTIATING CLASSES */
$dateUtil   = new DateUtil();
$error 			= new Error();
$search_obj	= new Search();
$customer		= new Customer();
$logIn			= new Login();
$service		= new Services();
$blogMst		= new BlogMst();
$utility		= new Utility();
$uMesg 			= new MesgUtility();
$uImg 			= new ImageUtility();
$uNum 			= new NumUtility();
$faqs		    = new faqs();
######################################################################################################################
$typeM		= $utility->returnGetVar('typeM','');
//user id
$cusId		= $utility->returnSess('userid', 0);


if(isset($_GET['seo_url']))
	{
		 $seo_url			  		= $_GET['seo_url'];
		// $return_url 	= base64_decode($_GET["return_url"]); //get return url
	}

?>
<!DOCTYPE HTML>
<html lang="zxx">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Link insertion & Buy niche Edits Service - <?php echo COMPANY_S; ?></title>
    <link rel="shortcut icon" href="<?php echo FAVCON_PATH?>" type="image/png" />
    <link rel="apple-touch-icon" href="<?php echo FAVCON_PATH?>" />
    <meta name="description"
        content="Fast Linky provided Guest Post Service at reasonable prices on fashion blogs, beauty blogs, health blogs, travel blogs, fitness blogs, tech blogs, home improvement  or more." />
    <meta name="keywords"
        content="Guest Post, Guest Posting,Guest Post Service, blogger outreach, guest posting services, guest posting blogs, fashion blogs, beauty blogs, health blogs, travel blogs, fitness blogs, tech blogs, home improvement blogs, CBD blogs, Casino Blogs" />


    <!-- <link href="css/bootstrap.css" rel='stylesheet' type='text/css' /> -->
    <link rel="stylesheet" href="plugins/bootstrap-5.2.0/css/bootstrap.css">
    <link rel="stylesheet" href="plugins/fontawesome-6.1.1/css/all.css">
    <!-- Custom CSS -->
    <link href="css/leelija.css" rel='stylesheet' type='text/css' />
    <link href="css/style.css" rel='stylesheet' type='text/css' />
    <link href="css/guest-post-offer.css" rel='stylesheet' type='text/css' />
    <link href="css/link-insertion-service.css" rel='stylesheet' type='text/css' />
    <link rel="stylesheet" href="css/testimonials.css">


    <!-- font-awesome icons -->
    <!-- <link href="css/fontawesome-all.min.css" rel="stylesheet"> -->
    <!-- //Custom Theme files -->
    <!--webfonts-->
    <link href="//fonts.googleapis.com/css?family=Ubuntu:300,300i,400,400i,500,500i,700,700i" rel="stylesheet">

    <link href="//fonts.googleapis.com/css?family=Montserrat:400,500,600,700,900" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Nunito+Sans:400,700,900" rel="stylesheet">
    <!--//webfonts-->
</head>

<body data-scrollbar>
    <?php require_once "partials/navbar.php"; ?>
    <!--____________________________________________________________________________________________ -->
    <!-- Link Insertion Services main banner starting -->
    <section class="managed-link-building-main-banner">
        <div class="container mlb-main-cntainer">
            <div class="row mlb-main-start-row">
                <div class="col-12 col-lg-6 col-md-6  px-0 px-md-2">
                    <div class="mlb-wrapping">
                        <h1 class="mlb-starting-main-h1">Link <span>Insertion</span> Services </h1>
                        <p class=" mt-3 mb-4 py-0 py-md-2 mlb-starting-main-p">Find your website link placed
                            contextually in suitable blog posts on authentic websites.
                        </p>
                        <div class="add-css-frleft">
                            <ul>
                                <li class="tick-check"> &#10004; <b class="tick-check-p">100% editorial, niche relevant,
                                    </b> </li>
                                <li class="tick-check"> &#10004; <b class="tick-check-p">outreach-based edits for better
                                        traffic and better results </b></li>
                            </ul>
                        </div>
                        <div class=" buttonsinfo ">
                            <a href="#pricing-cards">
                                <button type="button" class="btn managed-link-btn ">Get Started</button>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-6 col-md-6  p-0">
                    <div class="mlb-wrapping">
                        <img src="./images/freepik-img/link-insertion-banner.png " class="img-fluid"
                            style="background-image: linear-gradient(120deg, #FDA33B 50%, #FA8273 80%); border-radius: 4rem;" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end of Link Insertion Service main banner -->
    <!-- --------------------------------------------------------------------------------------------- -->
    <!-- _______________________________________________________________________________________________ -->
    <!-- Advantages Of Link Insert start -->

    <section class="lbs-actually-matters-main">
        <div class="row">
            <div class=" col-xl-6 col-md-6">
                <h1 class="lbs-actually-matters-main-h1 mb-3">
                    <span> Advantages </span> Of Link Insert
                </h1>
                <div class="actually-card-div1">
                    <div class="  actually-card-inn-img-div">
                        <img src="./images/dummy-img/real-bo-ul-li-1.png" class="managed-page-second-ul-li-img" alt="">
                    </div>
                    <div class="lbp-texting">
                        In the content, <b>Editorial Links</b> are inserted naturally, like within the flow of
                        words.
                    </div>
                </div>
                <div class="actually-card-div1">
                    <div class="  actually-card-inn-img-div">
                        <img src="./images/dummy-img/real-bo-ul-li-2.png" class="managed-page-second-ul-li-img" alt="">
                    </div>
                    <div class="lbp-texting">
                        The links are placed naturally and published on <b>niche-relevant and authority websites</b>
                        for High URL Ratings.
                    </div>
                </div>
                <div class="actually-card-div1 ">
                    <div class="  actually-card-inn-img-div">
                        <img src="./images/dummy-img/real-bo-ul-li-3.png" class="managed-page-second-ul-li-img" alt="">
                    </div>
                    <div class="lbp-texting">
                        <b>Genuine Outreach</b> offers valuable niche relevant edits on authentic websites.
                    </div>
                </div>
                <div class="actually-card-div1">
                    <div class="  actually-card-inn-img-div">
                        <img src="./images/dummy-img/real-bo-ul-li-1.png" class="managed-page-second-ul-li-img" alt="">
                    </div>
                    <div class="lbp-texting">
                        Guaranteed <b>Zero Duplication</b> Policy. Every time you got a unique site.
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-md-6 m-auto">
                <div class="">
                    <div>
                        <img src="./images/freepik-img/link-insertion-adv.png" class=" w-100  mb-4 " alt="">
                    </div>
                </div>
            </div>
        </div>
        <div class=" buttonsinfo mt-3">
            <a href="#pricing-cards">
                <button type="button" class="btn managed-link-btn ">See Pricing</button>
            </a>
        </div>
    </section>
    <!-- Advantages Of Link Insert ends -->
    <!-- _________________________________________________________________________________________________ -->
    <!-- ___________________________________________________________________________________________ -->
    <!-- testimonials customers reviews -->
    <?php require_once "partials/testimonials.php"; ?>
    <!-- testimonials customers reviews -->
    <!-- _________________________________________________________________________________________ -->

    <!-- ------------------------------------------------ -->
    <!-- pricing section -->
    <!-- ------------------------------------------- -->

    <section class="mt-5">
        <h1 class="text-center pricing-bo-h1 mb-3 mt-5">Niche Edits Pricing
        </h1>
        <p class="text-center pricing-bo-p1 mb-3">We offer blogger outreach links categorised as <br> per DA,
            DR, or organic traffic. Below is the pricing <br> for All 3 models.</p>

        <?php require_once "partials/pricing-cards.php"; ?>
    </section>

    <!-- ------------------------------------------------ -->
    <!-- pricing section ends -->
    <!-- ------------------------------------------- -->

    <!-- How It Works-section starts -->
    <!-- __________________________________________________________________________________________ -->

    <section class="how-it-works-main-section">
        <h1>How It <span> <b>Works?</b> </span></h1>
        <div class="text-center py-4">
            <img src="./images/dummy-img/link-inserting-123img.png" class="how-it-works-1st-img" alt="">
        </div>


        <div class="row m-0">
            <div class="col-md-4 col-xl-4">
                <div class="how-it-works-main-card-div">
                    <div class=" ">
                        <img src="./images/dummy-img/link-insertion-service-howitwork1.png" class="w-100" alt="">
                    </div>
                    <h4>Genuine <span>Outreach</span> </h4>
                    <p>
                        Just select which anchor text and URL you want to link for your site. Our expert outreach team
                        will find authentic websites and real blog posts for your specification. Moreover, they will
                        connect you with the site admins or owners to get perfect contextual link arrangements in their
                        posts. </p>
                </div>
            </div>
            <div class="col-md-4 col-xl-4">
                <div class="how-it-works-main-card-div">
                    <div class="">
                        <img src="./images/dummy-img/link-insertion-service-howitwork2.png" class="w-100" alt="">
                    </div>
                    <h4>Valuable <span>Content</span> </h4>
                    <p>
                        We have prominent native writers from UK and US. they value every anchor text. Therefore, they
                        create niche relevant blog post and the anchor text are placed lawlessly in the content.</p>
                </div>
            </div>
            <div class="col-md-4 col-xl-4">
                <div class="how-it-works-main-card-div">
                    <div class="">
                        <img src="./images/dummy-img/link-insertion-service-howitwork3.png" class="w-100" alt="">
                    </div>
                    <h4>Reliable <span>Reporting</span> </h4>
                    <p>
                        You will get every real-time notification and view of single niche edit. The client can all
                        these features within your dashboard. Moreover, you will get to know the full DA metrics. Also,
                        a client can export a non-branded CSV that can be used for White Label reporting. </p>
                </div>
            </div>
        </div>
    </section>

    <!-- How It Works-section ends -->
    <!-- __________________________________________________________________________________________ -->
    <!-- extra details -->
    <div class="features-sec">
        <div class="features">
            <div class="container">
                <div class="row">
                    <div class="col-sm-3">
                        <p class="features-sec-head-icon">
                            <i class="fas fa-chart-line"></i>
                        </p>
                        <div class="features-sec-all-details">
                            <p class="features-sec-head">
                                Real Ranking Sites
                            </p>
                            <p class="features-sec-details">
                                Manual outreach on 100% real sites ranking in Google
                            </p>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <p class="features-sec-head-icon">
                            <i class="fas fa-th"></i>
                        </p>
                        <div class="features-sec-all-details">
                            <p class="features-sec-head">
                                Customize Your Criteria
                            </p>
                            <p class="features-sec-details">
                                Choose between Domain Authority or Publisher Traffic
                            </p>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <p class="features-sec-head-icon">
                            <i class="fas fa-truck"></i>
                        </p>
                        <div class="features-sec-all-details">
                            <p class="features-sec-head">
                                Fast Deliverables
                            </p>
                            <p class="features-sec-details">
                                7-day turnaround time guaranteed for your Guest Post
                            </p>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <p class="features-sec-head-icon">
                            <i class="fas fa-users"></i>
                        </p>
                        <div class="features-sec-all-details">
                            <p class="features-sec-head">
                                Reseller Friendly
                            </p>
                            <p class="features-sec-details">
                                Reseller friendly white-label reports to share with your clients
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- extra details -->

    <!-- ================================================================================================= -->
    <!-- Frequently Asked Questions starts -->
    <!-- ================================================================================================ -->
    <!-- new faq for indexpage -->

    <?php require_once "partials/faqs-new.php"; ?>

    <!-- ================================================================================================= -->
    <!-- Frequently Asked Questions ends -->
    <!-- ================================================================================================ -->
    <!-- ================================================================================================ -->

    <div class="mt-4">
        <?php include_once 'partials/seller-action.php'; ?>
    </div>
    <!-- ============================================================== -->
    <!-- Footer -->
    <?php require_once "partials/footer.php"; ?>
    <!-- /Footer -->

    <script src="js/jquery-2.2.3.min.js"></script>
    <script src="plugins/bootstrap-5.2.0/js/bootstrap.js"></script>

</body>

</html>