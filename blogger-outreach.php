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
    <link rel="icon" href="images/logo/favicon.png" type="image/png">
    <title>Blogger Outreach Services, Blogger Outreach: <?php echo COMPANY_S; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"
        content="Fast Linky provided Guest Post Service at reasonable prices on fashion blogs, beauty blogs, health blogs, travel blogs, fitness blogs, tech blogs, home improvement  or more." />
    <meta charset="utf-8">
    <meta name="keywords"
        content="Guest Post, Guest Posting,Guest Post Service, blogger outreach, guest posting services, guest posting blogs, fashion blogs, beauty blogs, health blogs, travel blogs, fitness blogs, tech blogs, home improvement blogs, CBD blogs, Casino Blogs" />


    <!-- <link href="css/bootstrap.css" rel='stylesheet' type='text/css' /> -->
    <link rel="stylesheet" href="plugins/bootstrap-5.2.0/css/bootstrap.css">
    <link rel="stylesheet" href="plugins/fontawesome-6.1.1/css/all.css">
    <!-- Custom CSS -->
    <link href="css/leelija.css" rel='stylesheet' type='text/css' />
    <link href="css/style.css" rel='stylesheet' type='text/css' />
    <link href="css/guest-post-offer.css" rel='stylesheet' type='text/css' />
    <link href="css/blogger-outreach.css" rel='stylesheet' type='text/css' />
    <link rel="stylesheet" href="css/testimonials.css">
    <link rel="stylesheet" href="css/clientside-logo.css">

    <!-- font-awesome icons -->
    <link href="css/fontawesome-all.min.css" rel="stylesheet">
    <!-- //Custom Theme files -->
    <!--webfonts-->
    <link href="//fonts.googleapis.com/css?family=Ubuntu:300,300i,400,400i,500,500i,700,700i" rel="stylesheet">

    <link href="//fonts.googleapis.com/css?family=Montserrat:400,500,600,700,900" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Nunito+Sans:400,700,900" rel="stylesheet">
    <!--//webfonts-->



</head>

<body data-scrollbar>
    <?php require_once "partials/navbar.php"; ?>
    <!--___________________________________________________________________________________________________ -->
    <!-- starting of blogger-outreach main banner -->
    <div class="">
        <section class="blogger_outreach_banner">
            <div class="container bo-main-cntr">
                <div class="row blog-1main-row">
                    <div class="col-12 col-lg-6 col-md-6  px-0 px-md-2">
                        <div class="bo-wrap">
                            <h1 class="blogout-main-h1">Blogger <span>Outreach</span> Services </h1>
                            <p class=" mt-3 mb-4 py-0 py-md-2 blogout-main-p">White-Hat, Niche Relevant, Editorial <br>
                                Backlinks For Best And Long Lasting Result
                            </p>
                            <div class=" buttonsinfo ">
                                <a href="#pricing-cards">
                                    <button type="button" class="btn blogger-btn ">See Pricing</button>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 col-md-6 p-0">
                        <div class="bo-wrap">
                            <img src="./images/freepik-img/blogger-outreach-banner.png" class="w-100" alt="">
                        </div>

                    </div>

                </div>
            </div>
        </section>
    </div>
    <!-- end of blogger-outreach main banner -->
    <!-- --------------------------------------------------------------------------------------------- -->
    <!-- real-blogger-outreach-section start -->
    <section class="real-bo-section">
        <div class="row  real-bo-row1">
            <div class="col-lg-6 col-md-6 real-bo-col-first">
                <div class="">
                    <div>
                        <h1 class="real-bo-text-h1">Genuine Links, Authentic Influencers, <span> Favorable
                                Outcome</span> </h1>
                    </div>
                    <div>
                        <div class="py-4">
                            <div class="real-bo-secondcol-div1">
                                <div class=" px-3">
                                    <img src="./images/dummy-img/real-bo-ul-li-1.png" class="real-bo-second-ul-li-img"
                                        alt="">
                                </div>
                                <div class="">
                                    create <b> content</b>
                                </div>
                            </div>
                            <div class="real-bo-secondcol-div1">

                                <div class=" px-3">
                                    <img src="./images/dummy-img/real-bo-ul-li-2.png" class="real-bo-second-ul-li-img"
                                        alt="">
                                </div>
                                <div class="">
                                    <b>Secure </b> placements .
                                </div>
                            </div>
                            <div class="real-bo-secondcol-div1 mb-3">
                                <div class=" px-3">
                                    <img src="./images/dummy-img/real-bo-ul-li-3.png" class="real-bo-second-ul-li-img"
                                        alt="">
                                </div>
                                <div class="">
                                    Boost website <b> rankings</b>
                                </div>
                            </div>
                        </div>

                        <div class=" buttonsinfo ">
                            <a href="#pricing-cards">
                                <button type="button" class="btn blogger-btn ">Get Your Links Now</button>
                            </a>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-lg-6 col-md-6 real-bo-col-second">
                <div class="text-center">
                    <img src="./images/freepik-img/blogger-outrech-Link-Building.png" class="w-75 mb-4" alt="">
                </div>

                <p class="real-bo-text-p mb-3">Fast Linky works with a lot of influencers for securing
                    sustainable
                    and relevant links that easily enhance the client’s search engine rankings and offers
                    targeted traffic.</p>
                <p class="real-bo-text-p mb-3">We valued every business and website for its uniqueness. Our
                    expert public relation team placement each and every link manually by handpicking.</p>
            </div>
        </div>

    </section>
    <!-- real-blogger-outreach-section end -->
    <!-- _______________________________________________________________________________________________ -->

    <!-- AMAZING -blogger-outreach-section start -->

    <section class="real-bo-section">

        <div class="row  real-bo-row1">
            <div class="col-lg-6 col-md-6 m-auto real-bo-col-second">
                <div class="">
                    <div>
                        <img src="./images/freepik-img/blogger-outrech-cc.png" class="w-100  mb-4 " alt="">
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 real-bo-col-first">
                <div class="">
                    <div>
                        <h1 class="amazing-bo-text-h1">Creative Content + Prominent Placements <span> = Glittering
                                Results</span> </h1>
                        <div class="mt-3">
                            <p class="real-bo-text-p mb-3">Domain Authority is not a lone factor in our link-building
                                service model. Our main focus is to get the best outcome. Therefore, <b>Domain Ratings,
                                    previous link history, and Trust Flow </b> also matter.</p>
                            <p class="real-bo-text-p mb-3">Our created content passes through a couple of rounds of
                                tough editing</p>
                        </div>
                    </div>
                    <div>
                        <div class="py-4">
                            <div class="real-bo-secondcol-div1">
                                <div class=" px-3">
                                    <img src="./images/dummy-img/real-bo-ul-li-3.png" class="real-bo-second-ul-li-img"
                                        alt="">
                                </div>
                                <div class=""> Overall <b>creative Presentation</b> of Content
                                </div>
                            </div>
                            <div class="real-bo-secondcol-div1">
                                <div class=" px-3">
                                    <img src="./images/dummy-img/real-bo-ul-li-1.png" class="real-bo-second-ul-li-img"
                                        alt="">
                                </div>
                                <div class="">
                                    Quality Outgoing links with <b>Adequate Quantity.</b>
                                </div>
                            </div>
                            <div class="real-bo-secondcol-div1">

                                <div class=" px-3">
                                    <img src="./images/dummy-img/real-bo-ul-li-2.png" class="real-bo-second-ul-li-img"
                                        alt="">
                                </div>
                                <div class="">Valued clients
                                    <b>preference list</b>
                                </div>
                            </div>
                            <div class="real-bo-secondcol-div1 mb-3">
                                <div class=" px-3">
                                    <img src="./images/dummy-img/real-bo-ul-li-3.png" class="real-bo-second-ul-li-img"
                                        alt="">
                                </div>
                                <div class="">
                                    <b>Continuous monitoring </b>
                                    after placements
                                </div>
                            </div>

                        </div>

                        <div class=" getyour-linkbtn ">
                            <a href="#pricing-cards">
                                <button type="button" class="btn blogger-btn d-flex justify-content-right">Get Your
                                    Links Now</button>
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </section>
    <!-- AMAZING-blogger-outreach-section end -->
    <!-- _________________________________________________________________________________ -->
    <!-- ==================== Does-Blogger-Outreach Work For You starts ============================ -->
    <section class="works-for-you-bo-section">
        <div class="">
            <div>
                <h2 class=" text-center mt-4 my-3 works-bo-h2">How does blogger outreach <span> work for your
                        brand?</span></h2>
            </div>
            <div class="works-f-u-main-card-div">
                <div class="row">
                    <div class="col-md-4 col-xl-4 ">
                        <div class="card works-for-u-card">

                            <div class="pb-3 text-center text-sm-left">
                                <img src="./images/dummy-img/real-bo-ul-li-1.png" class="real-bo-second-ul-li-img"
                                    alt="">
                            </div>
                            <h4 class="how-fonts-h4  py-2">Businesses</h4>
                            <p class="">
                                To place your business site at a higher position in the search rankings is not a cup of
                                tea. You will face a massive challenge to do it. Let our expert team handle all the
                                pressure by generating quality backlinks that will boost your site rankings. Therefore
                                you can control the more essential aspects of doing your business </p>

                        </div>

                    </div>

                    <div class="col-md-4 col-xl-4">
                        <div class="card works-for-u-card">

                            <div class="pb-3 text-center text-sm-left">
                                <img src="./images/dummy-img/real-bo-ul-li-2.png" class="real-bo-second-ul-li-img"
                                    alt="">
                            </div>
                            <h4 class="how-fonts-h4  py-2">Resellers</h4>
                            <p class="">
                                As an SEO reseller if you are struggling to find a quality link for your clients our
                                blogger outreach service is a one-stop solution. We are not only experts in link
                                building but also offer white-label reports without any kind of credit for our work.
                                Therefore you can easily scale up. </p>

                        </div>

                    </div>

                    <div class="col-md-4 col-xl-4">
                        <div class="card works-for-u-card">

                            <div class=" pb-3 text-center text-sm-left">
                                <img src="./images/dummy-img/real-bo-ul-li-3.png" class="real-bo-second-ul-li-img"
                                    alt="">
                            </div>
                            <h4 class="how-fonts-h4  py-2">Affiliate Marketers</h4>
                            <p class="">
                                Most people are confused about what to do To boost affiliate sites, with the
                                result-based SEO strategy. The simple answer is to get sufficient high quality links.
                                Our expert team is proficient in this. You can focus on other vital aspects like
                                creative content and improve the conversation. </p>

                        </div>

                    </div>
                </div>
            </div>


            <div class="how-its-wrok-bo-main-div">


                <div>
                    <h1 class=" text-center mt-4 my-3 works-bo-h2"> <span>How Does It work?</span></h1>
                </div>
                <div class="works-f-u-main-card-div">
                    <div class="row">
                        <div class="col-md-4 col-xl-4">
                            <div class="card  how-it-work-f-u-card">

                                <div class="pb-3 text-center text-sm-left">
                                    <img src="./images/dummy-img/real-bo-ul-li-1.png" class="real-bo-second-ul-li-img"
                                        alt="">
                                </div>
                                <h4 class="how-fonts-h4  py-2">Best Prospect</h4>
                                <p class="">
                                    We have a huge database of prominent sites. We will offer the best prospects that
                                    can give you the wanted traffic you targetted. Our aim is to give the best link
                                    placements at the perfect sites.
                                </p>

                            </div>

                        </div>

                        <div class="col-md-4 col-xl-4">
                            <div class="card how-it-work-f-u-card">

                                <div class="pb-3 text-center text-sm-left">
                                    <img src="./images/dummy-img/real-bo-ul-li-2.png" class="real-bo-second-ul-li-img"
                                        alt="">
                                </div>
                                <h4 class="how-fonts-h4  py-2">Handle Outreach</h4>
                                <p class="">
                                    Not only we are finding the best prospect for you, but also we take care of the
                                    outreach portion too. Although this is time-consuming but our experts make it quick
                                    for you. Our outreach process is fully focused to build the long-term relationship
                                    with the best influencers. </p>

                            </div>

                        </div>

                        <div class="col-md-4 col-xl-4">
                            <div class="card how-it-work-f-u-card">

                                <div class=" pb-3 text-center text-sm-left">
                                    <img src="./images/dummy-img/real-bo-ul-li-3.png" class="real-bo-second-ul-li-img"
                                        alt="">
                                </div>
                                <h4 class="how-fonts-h4  py-2">Envision And Say For You</h4>
                                <p class="">
                                    Our native writers create novel content that has similar views to the outreached
                                    blogs. And we pitch it to the editor of it. Moreover, you as a client are always in
                                    the loop of the whole process. </p>

                            </div>

                        </div>
                        <div class="col-md-4 col-xl-4">
                            <div class="card how-it-work-f-u-card">

                                <div class="pb-3 text-center text-sm-left">
                                    <img src="./images/dummy-img/real-bo-ul-li-1.png" class="real-bo-second-ul-li-img"
                                        alt="">
                                </div>
                                <h4 class="how-fonts-h4  py-2">Make And Post Content</h4>
                                <p class="">
                                    Our native content writing team creates non-promotional guest posts. These posts are
                                    fully prolonged with natural editorial in-content links. Moreover, we assure you
                                    that the quality of the content will be the best and it will be published on a high
                                    DA relevant site. </p>

                            </div>

                        </div>

                        <div class="col-md-4 col-xl-4">
                            <div class="card how-it-work-f-u-card">

                                <div class="pb-3 text-center text-sm-left">
                                    <img src="./images/dummy-img/real-bo-ul-li-2.png" class="real-bo-second-ul-li-img"
                                        alt="">
                                </div>
                                <h4 class="how-fonts-h4  py-2">Deliver White Label Reports</h4>
                                <p class="">
                                    After publishing the content we will deliver the whole white label report to you.
                                    What you can share with your client. However, we will not take any credit for it.
                                </p>

                            </div>

                        </div>

                        <div class="col-md-4 col-xl-4 ">
                            <div class="card how-it-work-f-u-card">

                                <div class=" pb-3 text-center text-sm-left">
                                    <img src="./images/dummy-img/real-bo-ul-li-3.png" class="real-bo-second-ul-li-img"
                                        alt="">
                                </div>
                                <h4 class="how-fonts-h4  py-2">Customize Outreach Content</h4>
                                <p class="">
                                    Our target is to give niche relevant sites for our clients. Therefore we plan a
                                    custom outreach campaign. It ensures that the customer gets the link to the
                                    completely relevant site. </p>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Does-Blogger-Outreach Work For You ends -->
    <!-- _________________________________________________________________________________________ -->
    <!-- --------------------------------------------------------------------------------------------- -->
    <!-- clients-logo -->
    <?php require_once "partials/clientssides-logos.php"; ?>
    <!-- clients-logo -->
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
        <h1 class="text-center pricing-bo-h1 mb-3 mt-5">Blogger Outreach Pricing
        </h1>
        <p class="text-center pricing-bo-p1 mb-3">We offer blogger outreach links categorised as <br> per DA,
            DR, or organic traffic. Below is the pricing <br> for All 3 models.</p>

        <?php require_once "partials/pricing-cards.php"; ?>
    </section>

    <!-- ------------------------------------------------ -->
    <!-- pricing section ends -->
    <!-- ------------------------------------------- -->

    <!--  -->
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

    <div class="mt-4">
        <?php include_once 'partials/seller-action.php'; ?>
    </div>

    <!-- Footer -->
    <?php require_once "partials/footer.php"; ?>
    <!-- /Footer -->
    <script src="js/jquery-2.2.3.min.js"></script>
    <script src="plugins/bootstrap-5.2.0/js/bootstrap.js"></script>

</body>

</html>