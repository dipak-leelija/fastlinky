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
require_once("classes/gp-order.class.php");
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
$gp				= new Gporder();
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
    <title>Managed Link Building, Blogger Outreach: <?php echo COMPANY_S; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"
        content="LeeLija provided Guest Post Service at reasonable prices on fashion blogs, beauty blogs, health blogs, travel blogs, fitness blogs, tech blogs, home improvement  or more." />
    <meta charset="utf-8">
    <meta name="keywords"
        content="Guest Post, Guest Posting,Guest Post Service, blogger outreach, guest posting services, guest posting blogs, fashion blogs, beauty blogs, health blogs, travel blogs, fitness blogs, tech blogs, home improvement blogs, CBD blogs, Casino Blogs" />


    <!-- <link href="css/bootstrap.css" rel='stylesheet' type='text/css' /> -->
    <link rel="stylesheet" href="plugins/bootstrap-5.2.0/css/bootstrap.css">
    <link rel="stylesheet" href="plugins/fontawesome-6.1.1/css/all.css">
    <!-- Custom CSS -->
    <link href="css/leelija.css" rel="stylesheet" />
    <link href="css/style.css" rel='stylesheet' type='text/css' />
    <link href="css/guest-post-offer.css" rel='stylesheet' type='text/css' />
    <link href="css/managed-link-building.css" rel='stylesheet' type='text/css' />
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
    <!--____________________________________________________________________________________________ -->
    <!-- starting of managed-link-building main banner -->
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
    <!-- end of managed-link-building main banner -->
    <!-- ------------------------------------------------------------------------- -->
    <!-- Why does A brand need link buildings start -->
    <section class="a-brand-need-link-section">
        <div class="row  ">
            <div class="a-brand-need-link-main-div">
                <h1 class="text-center a-brand-need-link-main-h1 ">Why does <span>A brand need</span> link buildings?
                </h1>
            </div>
            <div class="col-lg-6 col-md-6 a-brand-need-link-main-col-1">
                <div class="">
                    <div>
                        <div class="mt-5">
                            <ul>
                                <li class="square-box-p"> <span class="sq-pen-css"><i
                                            class="fa-solid fa-spa fa-beat-fade css-beats"></i></span>

                                    Google
                                    has
                                    complex algorithms to deal with. Therefore, backlinks still is an essential factor
                                    to determine the keyword for which the site is trending.
                                </li>
                                <li class="square-box-p"> <span class="sq-pen-css"><i
                                            class="fa-solid fa-spa fa-beat-fade css-beats"></i></span>

                                    Link
                                    building
                                    is a vital part of SEO service. Depending on your link it signals to Google that
                                    your website has quality content resources.
                                </li>
                                <li class="square-box-p"> <span class="sq-pen-css"><i
                                            class="fa-solid fa-spa fa-beat-fade css-beats"></i></span>

                                    Moreover,
                                    if
                                    your site has more backlinks, it's a high possibility to get upper rankings.
                                </li>
                                <li class="square-box-p"> <span class="sq-pen-css"> <i
                                            class="fa-solid fa-spa fa-beat-fade css-beats"></i></span>

                                    In fact,
                                    if
                                    your site got more backlinks, the value of your site significantly arises. The
                                    backlinks create an extra impression on google as your site is more trustworthy and
                                    credible.

                            </ul>
                        </div>

                        <div class=" buttonsinfo ">
                            <a href="#pricing-cards">
                                <button type="button" class="btn managed-link-btn ">Get Your Links Now</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="text-center">

                    <img src="./images/Managed_Link_Building-strategy.png" class=" w-75  mb-4 " alt="">
                </div>
            </div>
        </div>
    </section>
    <!--Why does A brand need link buildings end -->
    <!-- ________________________________________________________________________________________ -->

    <section class="a-brand-need-link-section mt-0 mb-0">
        <div class="row ">
            <div class="col-lg-6 col-md-6">
                <div class="">
                    <div>
                        <img src="./images/growing-time.png" class="w-75  mb-4 " alt="">
                    </div>

                </div>
            </div>
            <div class="col-lg-6 col-md-6 a-brand-need-link-main-col-1">
                <div class="">
                    <div>
                        <div class="mt-5">
                            <p class="need-link-text-p mb-3">At Leelija, we are helping a lot of owners with our
                                high-quality link-building procedure. We will help you with our top-quality
                                link-building services that might easier your path to go for your big dream. Otherwise,
                                it might be difficult for you to touch that. We have expert teams that create content
                                strategies on our behalf of you. Through high-quality backlinks, your website’s profile
                                will be strengthened organically. </p>
                            <p class="need-link-text-p mb-3">Keep in touch with us for more details and to boost your
                                brand. </p>
                        </div>
                    </div>
                    <div>
                        <div class=" getyour-linkbtn mt-5 ">
                            <a href="#pricing-cards">
                                <button type="button" class="btn managed-link-btn d-flex justify-content-right">Get Your
                                    Links Now</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Why does A brand need link buildings section2 end -->
    <!-- ________________________________________________________________________________________ -->
    <!-- pricing section -->
    <!-- ------------------------------------------- -->

    <section class="mt-5">
        <h1 class="text-center pricing-bo-h1 mb-3 px-2">Link Building Pricing
        </h1>
        <p class="text-center pricing-bo-p1 mb-3">We offer blogger outreach links categorised as <br> per DA,
            DR, or organic traffic. Below is the pricing <br> for All 3 models.</p>

        <?php require_once "partials/pricing-cards.php"; ?>
    </section>

    <!-- ------------------------------------------------ -->
    <!-- pricing section ends -->
    <!-- ------------------------------------------- -->

    <!-- Link Building Services that Actually Matters-starts -->
    <section class="lbs-actually-matters-main">
        <div>
            <div class="row">
                <div class=" col-xl-6 col-md-6">
                    <h1 class="lbs-actually-matters-main-h1 mb-3">
                        Link Building Services <br> <span>That Actually Matters !</span>
                    </h1>

                    <div class="actually-card-div1">
                        <div class="  actually-card-inn-img-div">
                            <img src="./images/dummy-img/real-bo-ul-li-1.png" class="managed-page-second-ul-li-img"
                                alt="">
                        </div>
                        <div class="lbp-texting">
                            <div class="ibp-centering-b">
                                <b> Authority Backlinks : </b>
                            </div>
                            We help brands to create diverse link profiles. We
                            publish editorial writings on different authoritative domains.
                        </div>
                    </div>
                    <div class="actually-card-div1">
                        <div class="  actually-card-inn-img-div">
                            <img src="./images/dummy-img/real-bo-ul-li-2.png" class="managed-page-second-ul-li-img"
                                alt="">
                        </div>
                        <div class="lbp-texting">
                            <div class="ibp-centering-b">
                                <b> Detailed Vetting Process : </b>
                            </div>
                            Our expert team has done the whole outreach process
                            in properly oriented vetting. They look for unusual places that could be advantageous for
                            your company profile.
                        </div>
                    </div>

                </div>
                <div class="col-xl-6 col-md-6">
                    <div class="actually-card-div1 ">
                        <div class="  actually-card-inn-img-div">
                            <img src="./images/dummy-img/real-bo-ul-li-3.png" class="managed-page-second-ul-li-img"
                                alt="">
                        </div>
                        <div class="lbp-texting">
                            <div class="ibp-centering-b">
                                <b> Content is the key point : </b>
                            </div>
                            We do not provide content based on links. Moreover,
                            we create beautiful content that everyone loves to read.
                        </div>
                    </div>
                    <div class="actually-card-div1">
                        <div class="  actually-card-inn-img-div">
                            <img src="./images/dummy-img/real-bo-ul-li-1.png" class="managed-page-second-ul-li-img"
                                alt="">
                        </div>
                        <div class="lbp-texting">
                            <div class="ibp-centering-b">
                                <b> Increasing ROI: </b>
                            </div>
                            Our aim is to help the brand to achieve its target by
                            providing organic growth and increased ROI.
                        </div>
                    </div>
                    <div class=" getyour-linkbtn mt-5 ">
                        <a href="#pricing-cards">
                            <button type="button" class="btn managed-link-btn d-flex justify-content-center w-100 ">Get
                                Your
                                Links Now</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Link Building Services that Actually Matters-ends -->
    <!-- ________________________________________________________________________________________ -->

    <!-- ____________________________________________________________________________________________ -->

    <!-- our-secret-delivering-main-sec starts -->
    <section class="our-secret-delivering-main-sec">
        <div class="">
            <div>
                <h2 class=" text-center mt-4 my-3 our-secret-d-h2"> <span> Effective and Transparent</span> Link
                    Building
                    Process</h2>

            </div>
            <div class="our-secrect-delvry-main">
                <div class="row">
                    <div class="col-md-6 col-xl-6 ">
                        <div class="our-secret-delivering-main-card">

                            <div class="text-center pb-3 ">
                                <img src="./images/dummy-img/real-bo-ul-li-1.png" class="managed-page-second-ul-li-img"
                                    alt="">
                            </div>
                            <h4 class="how-fonts-h4 ">Authentic Link</h4>
                            <p class="">
                                We have a huge database of industry related websites from authentic bloggers. These real
                                bloggers already gained trust in the market. After placing the order we reach out to
                                them for improving your online appearance. </p>

                        </div>

                    </div>

                    <div class="col-md-6 col-xl-6">
                        <div class="our-secret-delivering-main-card">

                            <div class="text-center pb-3 ">
                                <img src="./images/dummy-img/real-bo-ul-li-2.png" class="managed-page-second-ul-li-img"
                                    alt="">
                            </div>
                            <h4 class="how-fonts-h4  ">Build Editorial Content</h4>
                            <p class="">
                                Our expert professionals research your website to generate unique content for your
                                brand. This magazine-style content increases the readership and viewership of your
                                website. </p>

                        </div>

                    </div>

                    <div class="col-md-6 col-xl-6">
                        <div class="our-secret-delivering-main-card">

                            <div class="text-center pb-3">
                                <img src="./images/dummy-img/real-bo-ul-li-3.png" class="managed-page-second-ul-li-img"
                                    alt="">
                            </div>
                            <h4 class="how-fonts-h4  ">Publication of Content</h4>
                            <p class="">
                                We communicate with manually outreached bloggers and keep in touch until the content is
                                published with a do-follow link. Moreover, we stay in the loop with the bloggers for
                                editing if needed before or after publishing. </p>

                        </div>

                    </div>
                    <div class="col-md-6 col-xl-6">
                        <div class="our-secret-delivering-main-card">

                            <div class="text-center pb-3">
                                <img src="./images/dummy-img/real-bo-ul-li-1.png" class="managed-page-second-ul-li-img"
                                    alt="">
                            </div>
                            <h4 class="how-fonts-h4  ">Report & Tracking</h4>
                            <p class="">
                                We provide a white label report and a SERP tracking dashboard. In the report you will
                                find where we created a link for you and the dashboard will help you to check the result
                                and plan for future campaigning. </p>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- our-secret-delivering-main-sec ends -->


    <!-- --------------------------------------------------------------------------------------------- -->
    <!-- clients-logo -->
    <?php require_once "partials/clientssides-logos.php"; ?>
    <!-- clients-logo -->
    <!-- _________________________________________________________________________________________________ -->
    <!-- ______________________________________________________________________________________________ -->

    <section class="our-secret-delivering-main-sec pb-5">
        <div class="">
            <div>
                <h2 class=" text-center mt-4 my-3 our-secret-d-h2">Our Secret to Delivering Wanted Results <span>To Top
                        Brands</span> </h2>

            </div>
            <div class="our-secrect-delvry-main">
                <div class="row">
                    <div class="col-md-6 col-xl-3">
                        <div class="our-secret-delivering-main-card2">

                            <div class="text-chnging-css pb-3 ">
                                <img src="./images/dummy-img/real-bo-ul-li-1.png" class="managed-page-second-ul-li-img"
                                    alt="">
                            </div>
                            <h4 class="how-fonts-h4 ">Campaign Customization</h4>
                            <p class="">
                                We arrange, create and cooperate to offer custom link-building campaigns that benefit
                                the company significantly. </p>

                        </div>

                    </div>

                    <div class="col-md-6 col-xl-3">
                        <div class="our-secret-delivering-main-card2">

                            <div class="text-chnging-css pb-3 ">
                                <img src="./images/dummy-img/real-bo-ul-li-2.png" class="managed-page-second-ul-li-img"
                                    alt="">
                            </div>
                            <h4 class="how-fonts-h4  ">Enhance SERP</h4>
                            <p class="">
                                Our plan is very clear. Create top-notch do-follow links that cause high traffic to your
                                website. </p>

                        </div>

                    </div>

                    <div class="col-md-6 col-xl-3">
                        <div class="our-secret-delivering-main-card2">

                            <div class="text-chnging-css pb-3">
                                <img src="./images/dummy-img/real-bo-ul-li-3.png" class="managed-page-second-ul-li-img"
                                    alt="">
                            </div>
                            <h4 class="how-fonts-h4  ">Generate Revenue</h4>
                            <p class="">
                                Editorial and niche-relevant backlinks always lead to improving SERP. Generally, that
                                improves the website traffic. </p>

                        </div>

                    </div>
                    <div class="col-md-6 col-xl-3">
                        <div class="our-secret-delivering-main-card2">

                            <div class="text-chnging-css pb-3">
                                <img src="./images/dummy-img/real-bo-ul-li-1.png" class="managed-page-second-ul-li-img"
                                    alt="">
                            </div>
                            <h4 class="how-fonts-h4  ">Target Audience</h4>
                            <p class="">
                                Customer satisfaction is our main motto. At Leelija, we assigned a dedicated expert to
                                your account after placing an order. Therefore, your queries will be resolved very
                                quickly and you will get quick delivery. </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- our secret delivering result ends -->
    <!-- _________________________________________________________________________________________________ -->

    <!--================================= Client Review section Start =================================-->
    <!-- ___________________________________________________________________________________________ -->
    <!-- testimonials customers reviews -->
    <?php require_once "partials/testimonials.php"; ?>
    <!-- testimonials customers reviews -->
    <!-- _________________________________________________________________________________________ -->
    <!------------------------------------ Client Review section End ------------------------------------->
    <!-- ____________________________________________________________________________________________ -->
    <!-- _______________________________________________________________________________________________ -->

    <!-- Why fastlinky?-section start -->

    <section class="why-leelija-section-mains">
        <h1 class="why-leelija-h1">Why <?php echo COMPANY_S; ?></span> </h1>
        <div class="row  ">
            <div class="col-lg-6 col-md-6  m-auto ">
                <div class="">

                    <div>
                        <img src="./images/searching-fastlinky-image.png" class="w-75  mb-4 " alt="">
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 a-brand-need-link-main-col-1">
                <div class="">

                    <div>
                        <div class="py-4">
                            <div class="why-leelija-main-for-card">
                                <div class="  actually-card-inn-img-div">
                                    <img src="./images/dummy-img/real-bo-ul-li-3.png"
                                        class="managed-page-second-ul-li-img" alt="">
                                </div>
                                <div class="text-chnging-css ">
                                    Leelija is a <b> trustable white-label link-building provider</b> . We provide
                                    relevant backlinks through which you will find the result. Moreover, we customize
                                    services according to customer needs.
                                </div>
                            </div>
                            <div class="why-leelija-main-for-card">
                                <div class=" actually-card-inn-img-div">
                                    <img src="./images/dummy-img/real-bo-ul-li-1.png"
                                        class="managed-page-second-ul-li-img" alt="">
                                </div>
                                <div class="text-chnging-css ">
                                    We provide <b>guaranteed customer satisfaction</b> with our work. We will keep in
                                    touch after project delivery.
                                </div>
                            </div>
                            <div class="why-leelija-main-for-card">

                                <div class=" actually-card-inn-img-div">
                                    <img src="./images/dummy-img/real-bo-ul-li-2.png"
                                        class="managed-page-second-ul-li-img" alt="">
                                </div>
                                <div class="text-chnging-css">We provide a <b>dedicated account manager</b> after placing an
                                    order as the customer is our top priority.
                                </div>
                            </div>
                            <div class="why-leelija-main-for-card">
                                <div class=" actually-card-inn-img-div">
                                    <img src="./images/dummy-img/real-bo-ul-li-3.png"
                                        class="managed-page-second-ul-li-img" alt="">
                                </div>
                                <div class="text-chnging-css ">
                                    We provide <b>convenient dashboards</b> to check new orders or renew orders or the
                                    status of the order.
                                </div>
                            </div>
                            <div class="why-leelija-main-for-card">
                                <div class=" actually-card-inn-img-div">
                                    <img src="./images/dummy-img/real-bo-ul-li-1.png"
                                        class="managed-page-second-ul-li-img" alt="">
                                </div>
                                <div class="text-chnging-css ">
                                    We create <b>in-house content for better quality</b> . Your topic will be assigned
                                    to those who have experts in niche skills.
                                </div>
                            </div>
                            <div class="why-leelija-main-for-card">
                                <div class=" actually-card-inn-img-div">
                                    <img src="./images/dummy-img/real-bo-ul-li-2.png"
                                        class="managed-page-second-ul-li-img" alt="">
                                </div>
                                <div class="text-chnging-css ">
                                    We have a <b>huge database of authentic influencers</b> . Over the years we work
                                    with a lot of influencers for industry-related blogs.
                                </div>
                            </div>
                            <div class="why-leelija-main-for-card">
                                <div class=" actually-card-inn-img-div">
                                    <img src="./images/dummy-img/real-bo-ul-li-3.png"
                                        class="managed-page-second-ul-li-img" alt="">
                                </div>
                                <div class="text-chnging-css ">
                                    Our expert checks all the aspects before submitting the project. Therefore, there
                                    will be <b>no duplicate links</b> .
                                </div>
                            </div>
                        </div>

                        <div class=" getyour-linkbtn mt-5 ">
                            <a href="#pricing-cards">
                                <button type="button" class="btn managed-link-btn d-flex justify-content-center ">Get
                                    Your
                                    Links Now</button>
                            </a>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </section>
    <!-- Why Leelija?-section end -->
    <!-- ___________________________________________________________________________________________ -->

    <!--  What Makes Leelija So Special? starts -->

    <section class="lbs-actually-matters-main">
        <div>

            <div class="row">
                <h1 class="lbs-actually-matters-main-h1 textttting mb-3">
                    What Makes <span>Leelija So Special?</span>
                </h1>
                <div class=" col-xl-6 col-md-6">
                    <div class="actually-card-div1 mb-4 mt-5">
                        <div class="  actually-card-inn-img-div">
                            <img src="./images/dummy-img/real-bo-ul-li-3.png" class="managed-page-second-ul-li-img"
                                alt="">
                        </div>
                        <div class="lbp-texting">
                            <b> Outsourcing Partner : </b> <br> Link building is a continuous process. We will keep in
                            touch with you at every step. We help a lot of owners by giving quality link profiles from
                            high-traffic websites.
                        </div>
                    </div>
                    <div class="actually-card-div1 mb-4">
                        <div class="  actually-card-inn-img-div">
                            <img src="./images/dummy-img/real-bo-ul-li-1.png" class="managed-page-second-ul-li-img"
                                alt="">
                        </div>
                        <div class="lbp-texting">
                            <b> After Delivery Service </b> <br> After completing the whole project and publishing
                            content on behalf of you, still we will revisit them.
                        </div>
                    </div>

                </div>
                <div class="col-xl-6 col-md-6">


                    <div class="actually-card-div1">
                        <div class="  actually-card-inn-img-div">
                            <img src="./images/dummy-img/real-bo-ul-li-1.png" class="managed-page-second-ul-li-img"
                                alt="">
                        </div>
                        <div class="lbp-texting">
                            <b> Convenient Dashboard : </b> <br> We provide end-to-end subscriptions. After placing the
                            order we will do the hard work for you. For instance content creation to publishing it on
                            high-traffic websites, everything will be managed.
                        </div>
                    </div>
                    <div class="actually-card-div1">
                        <div class="  actually-card-inn-img-div">
                            <img src="./images/dummy-img/real-bo-ul-li-2.png" class="managed-page-second-ul-li-img"
                                alt="">
                        </div>
                        <div class="lbp-texting">
                            <b> Keyword Selection : </b> <br> Our team is working in this field for several years. They
                            always set their eye on high ranked relevant keywords. Therefore, it will easily boost your
                            website rankings.
                        </div>

                    </div>

                </div>
                <a href="#pricing-cards">
                    <div class=" getyour-linkbtn-for-lbs-matter  ">
                        <button type="button"
                            class="btn managed-link-btn d-flex justify-content-center external-css-fr-size ">Get Your
                            Links Now</button>
                    </div>
                </a>
            </div>
    </section>

    <!-- What Makes Leelija So Special? ends -->
    <!-- ______________________________________________________________________________________________ -->


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
        <?php include('partials/seller-action.php') ?>
    </div>
    <!-- Footer -->
    <?php require_once "partials/footer.php"; ?>
    <!-- /Footer -->
    <script src="js/jquery-2.2.3.min.js"></script>
    <script src="plugins/bootstrap-5.2.0/js/bootstrap.js"></script>

</body>

</html>