<?php
session_start();
require_once("includes/constant.inc.php");

require_once ROOT_DIR."/_config/dbconnect.php";
require_once ROOT_DIR."/_config/dbconnect.trait.php";

require_once ROOT_DIR."/classes/customer.class.php";
require_once ROOT_DIR."/classes/gp-package.class.php";
require_once ROOT_DIR."/classes/date.class.php";
require_once ROOT_DIR."/classes/utility.class.php";
require_once ROOT_DIR."/classes/faqs.class.php";

/* INSTANTIATING CLASSES */
$customer		= new Customer();
$GPPackage      = new GuestPostpackage();
$dateUtil       = new DateUtil();
$utility		= new Utility();
$faqs		    = new faqs();
######################################################################################################################
$typeM		= $utility->returnGetVar('typeM','');
//user id
$cusId		= $utility->returnSess('userid', 0);


$packages = $GPPackage->packDetailsByCat(6);
require_once ROOT_DIR."/includes/package-submission.inc.php";

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
                        <h1 class="mlb-starting-main-h1">Link <span>insertion</span> service</h1>
                        <p class=" mt-3 mb-4 py-0 py-md-2 mlb-starting-main-p"><b>Link insertion</b> is a unique way to
                            make a positive impact on your backlink profile and increase your SERP ranking.
                        </p>
                        <div class="add-css-frleft">
                            <ul>
                                <li class="tick-check"> &#10004; <b class="tick-check-p">Suitable links
                                    </b> </li>
                                <li class="tick-check"> &#10004; <b class="tick-check-p">Real blogs, genuine result </b>
                                </li>
                                <li class="tick-check"> &#10004; <b class="tick-check-p">100% unique & editorial</b>
                                </li>
                                <li class="tick-check"> &#10004; <b class="tick-check-p">No PBNs</b></li>
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
                            style="background-image: linear-gradient(120deg, #FDA33B 50%, #FA8273 80%); border-radius: 4rem;"
                            alt="">
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
                    <span> Benefits Of </span>Our Link Insertion Service
                </h1>
                <div class="actually-card-div1">
                    <div class="  actually-card-inn-img-div">
                        <img src="./images/dummy-img/real-bo-ul-li-1.png" class="insertion-page-second-ul-li-img" alt="">
                    </div>
                    <div class="lbp-texting">
                        <strong>Proper Links </strong> <br>
                        We always provide you with a natural link that is editorially related to the content.
                    </div>
                </div>
                <div class="actually-card-div1">
                    <div class="  actually-card-inn-img-div">
                        <img src="./images/dummy-img/real-bo-ul-li-2.png" class="insertion-page-second-ul-li-img" alt="">
                    </div>
                    <div class="lbp-texting">
                        <strong>Anchor Text </strong> <br>
                        Anchor text is the key to your success but using the same keyword multiple times should harm
                        your SEO. We use up-to-date articles that bring useful information to your <b>niche edit
                            service. </b>
                    </div>
                </div>
                <div class="actually-card-div1 ">
                    <div class="  actually-card-inn-img-div">
                        <img src="./images/dummy-img/real-bo-ul-li-3.png" class="insertion-page-second-ul-li-img" alt="">
                    </div>
                    <div class="lbp-texting">
                        <strong>Relevant Article </strong> <br>
                        Always place the backlinks on relevant blog posts with the right page authority.
                    </div>
                </div>
                <div class="actually-card-div1">
                    <div class="  actually-card-inn-img-div">
                        <img src="./images/dummy-img/real-bo-ul-li-1.png" class="insertion-page-second-ul-li-img" alt="">
                    </div>
                    <div class="lbp-texting">
                        <strong>No Duplicity </strong> <br>
                        There are no duplicate link placements here, so you will get 100% unique ones.
                    </div>
                </div>
                <div class="actually-card-div1">
                    <div class="  actually-card-inn-img-div">
                        <img src="./images/dummy-img/real-bo-ul-li-1.png" class="insertion-page-second-ul-li-img" alt="">
                    </div>
                    <div class="lbp-texting">
                        <strong>Save Money</strong> <br>
                        An efficient way for us to build links for you that are more affordable to buy.
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-md-6 m-auto">
                <div class="">
                    <div>
                        <img src="./images/freepik-img/livecenter-img-front.png" class=" w-100  my-4 " alt="">
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

        <?php  require_once "partials/pricing-cards.php"; ?>
    </section>

    <!-- ------------------------------------------------ -->
    <!-- pricing section ends -->
    <!-- ------------------------------------------- -->

    <!-- How It Works-section starts -->
    <!-- __________________________________________________________________________________________ -->

    <section class="how-it-works-main-section">
        <h1>How Does <span> Our Link Insertion Service Works?</span></h1>
        <div class="text-center py-4">
            <img src="./images/dummy-img/link-inserting-123img.png" class="how-it-works-1st-img" alt="">
        </div>


        <div class="row m-0">
            <div class="col-md-4 col-xl-4">
                <div class="how-it-works-main-card-div">
                    <div class=" ">
                        <img src="./images/dummy-img/link-insertion-service-howitwork1.png" class="w-100" alt="">
                    </div>
                    <h4>Real <span>Blog Post</span> </h4>
                    <p>
                        Choose anchor text in your <b>niche edit service</b>. At Fastlinky we search for real blog posts
                        on real websites to connect with site owners to get you suitable link placement on these posts.
                        Be careful, otherwise, you can get links from low-quality sites that will damage your SEO. </p>
                </div>
            </div>
            <div class="col-md-4 col-xl-4">
                <div class="how-it-works-main-card-div">
                    <div class="">
                        <img src="./images/dummy-img/link-insertion-service-howitwork2.png" class="w-100" alt="">
                    </div>
                    <h4>Beneficial <span>Content</span> </h4>
                    <p>
                        Our professional team strives to improve these blog posts perfectly. They ensure that your link
                        is naturally included in the content.</p>
                </div>
            </div>
            <div class="col-md-4 col-xl-4">
                <div class="how-it-works-main-card-div">
                    <div class="">
                        <img src="./images/dummy-img/link-insertion-service-howitwork3.png" class="w-100" alt="">
                    </div>
                    <h4>Valid <span>Report</span> </h4>
                    <p>
                        You can get a valid report of every single <b>niche edit service</b> that we secure for you from
                        within
                        your dashboard. </p>
                </div>
            </div>
        </div>
    </section>

    <!-- How It Works-section ends -->
    <!--  -->
    <section class="who-can-take-section">
        <div class="">
            <div>
                <h2 class=" text-center mt-4 my-3 who-advantages-main-h2">Why You Choose FastLinky <span> For Link
                        Insertion Service? </span>
                </h2>

            </div>
            <div class=" mt-5">
                <div class="row">
                    <div class=" col-sm-6 col-md-6 col-lg-3">
                        <div class="who-take-card">
                            <div class="text-center pb-3 ">
                                <img src="./images/dummy-img/real-bo-ul-li-2.png" class="" alt="">
                            </div>
                            <h4 class="how-fonts-h4  ">Skilled writers</h4>
                            <p class="">
                                We have a team of professional writers. They create quality content that improves the
                                importance of existing posts. They ensure that the link seems completely natural and the
                                blog owner also appreciates it. </p>
                        </div>

                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-3 ">
                        <div class="who-take-card">
                            <div class="text-center pb-3 ">
                                <img src="./images/dummy-img/real-bo-ul-li-1.png" class="" alt="">
                            </div>
                            <h4 class="how-fonts-h4 ">Originality</h4>
                            <p class="">
                                We will always help you to choose the right opportunity. The reason we achieve more
                                success is that we always connect with choosy bloggers. </p>
                        </div>

                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-3">
                        <div class="who-take-card">
                            <div class="text-center pb-3">
                                <img src="./images/dummy-img/real-bo-ul-li-3.png" class="" alt="">
                            </div>
                            <h4 class="how-fonts-h4  ">SEO Purposes </h4>
                            <p class="">
                                We always create links that are valuable for SEO, and we carefully check all sites to
                                confirm that they just exist to sell links.
                            </p>
                        </div>

                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-3">
                        <div class="who-take-card">
                            <div class="text-center pb-3">
                                <img src="./images/dummy-img/real-bo-ul-li-3.png" class="" alt="">
                            </div>
                            <h4 class="how-fonts-h4  ">Contextual Link Building </h4>
                            <p class="">
                                A <b>contextual link</b> is a rich link to your web page content, we serve relevant
                                links that increase your premium URL power. We can recognize the highest ranking and
                                most specific blogs to target for link insertion.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- How Does Our FastLinky’s Guest Posting Service Work? ends -->
        <!-- --------------------------------------------- -->
    </section>


        <!-- _______________________________________________________________________________________________ -->
    <!-- Advantages Of Link Insert start -->

    <section class="lbs-actually-matters-main">
        <div class="row">
            <div class=" col-xl-6 col-md-6">
                <h1 class="lbs-actually-matters-main-h1 mb-3">
                How Does 
                    <span> link insertion Boost SEO? </span>
                </h1>
               <p>
               When you add suitable links on your website to existing content on other websites, it is called <b>link insertion</b>. <b>Link insertion </b> is a backlink from another page to your page that helps provide extra knowledge to the reader of the original article. We provide you with an adequate link insertion service. This is also called the <b>Niche edit service</b> . At FastLinky, you can get the best service to insert your link.
               </p>
            </div>
            <div class="col-xl-6 col-md-6 m-auto">
                <div class="">
                    <div>
                        <img src="./images/freepik-img/livecenter-img-front.png" class=" w-100  my-4 " alt="">
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