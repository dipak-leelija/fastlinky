<?php
require_once("includes/constant.inc.php");
session_start();

require_once ROOT_DIR . "/_config/dbconnect.php";

require_once ROOT_DIR . "/classes/date.class.php";
require_once ROOT_DIR . "/classes/customer.class.php";
require_once ROOT_DIR . "/classes/services.class.php";
require_once ROOT_DIR . "/classes/feedback.class.php";

require_once ROOT_DIR . "/classes/blog_mst.class.php";
require_once ROOT_DIR . "/classes/faqs.class.php";
require_once ROOT_DIR . "/classes/utility.class.php";
require_once ROOT_DIR . "/classes/utilityMesg.class.php";
require_once ROOT_DIR . "/classes/utilityImage.class.php";
require_once ROOT_DIR . "/classes/utilityNum.class.php";

// require_once("classes/gp-package.class.php");
/* INSTANTIATING CLASSES */
$dateUtil       = new DateUtil();
$customer		= new Customer();
$service		= new Services();
$Feedback       = new Feedback();
$blogMst		= new BlogMst();
$utility		= new Utility();
$uMesg 			= new MesgUtility();
$uImg 			= new ImageUtility();
$uNum 			= new NumUtility();
$faqs		    = new faqs();

// $GPPackage      = new GuestPostpackage();
######################################################################################################################
$typeM		= $utility->returnGetVar('typeM','');
//user id
$cusId		= $utility->returnSess('userid', 0);


if(isset($_GET['seo_url']))
	{
		 $seo_url			  		= $_GET['seo_url'];
	}

?>

<!DOCTYPE HTML>
<html lang="zxx">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>#1 Outreach & Link Building Services Agency in SEO - <?php echo COMPANY_S; ?></title>
    <link rel="shortcut icon" href="<?php echo FAVCON_PATH?>" type="image/png" />
    <link rel="apple-touch-icon" href="<?php echo FAVCON_PATH?>" />
    <meta name="description"
        content="Fastlinky is the #1 agency for creative high quality link building services and we are experts in SEO and outreach services that will boost your website's performance." />
    <meta name="keywords"
        content="seo services, local seo services, seo company, seo agency, Link Building services agency, link building, backlink building, seo link building, what is a backlink ,link building services, seo link building services, best link building services, back link building services, link building seo services" />


    <link rel="stylesheet" href="plugins/bootstrap-5.2.0/css/bootstrap.css">
    <link rel="stylesheet" href="plugins/fontawesome-6.1.1/css/all.css">
    <!-- Custom CSS -->
    <link href="css/style.css" rel='stylesheet' type='text/css' />
    <link href="css/index.css" rel='stylesheet' type='text/css' />
    <link href="css/testimonials.css" rel="stylesheet">
    <link href="css/clientside-logo.css" rel="stylesheet">

    <!-- font-awesome icons -->
    <link href="css/fontawesome-all.min.css" rel="stylesheet">
    <link href="./plugins/sweetalert/sweetalert2.css" rel="stylesheet">
    <!-- //Custom Theme files -->

</head>

<body>
    <?php require_once "partials/navbar.php"; ?>
    <!--____________________________________________________________________________________________ -->
    <!-- starting of index-link-building main banner -->

    <section class="indexpage-main-banner">
        <div class="cube "></div>
        <div class="">
            <div class="row ">
                <div class="col-12 col-lg-6 col-md-6 px-0 px-md-3 d-flex align-items-center">
                    <div class="index-wrap">
                        <h1 class="indexpage-starting-main-h1">
                            Get High-Quality Backlinks To Boost Your Website’s Organic Growth
                        </h1>
                        <p class=" mt-3 mb-4 py-0 py-md-2 indexpage-starting-main-p">FastLinky offers data-driven
                            strategies
                            and <strong>SEO link building services</strong> to help international brands grow their ROI
                            3x faster.
                        </p>

                        <div class=" buttonsinfo ">
                            <button class="btn indexpage-link-btn" onclick="goTo('customer-packages')"> Get Started
                                Now</button>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-6 col-md-6 p-0">
                    <div class="p-0 ">
                        <img src="./images/fast-linky-outreach.png" class="w-100" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end of index-link-building main banner -->
    <!-- --------------------------------------------------------------------------------------------- -->
    <!-- clients-logo -->
    <?php require_once "partials/clientssides-logos.php"; ?>
    <!-- clients-logo -->
    <!-- _________________________________________________________________________________________________ -->
    <!-- Backlinks From High Authority And High Traffic Websites start -->
    <section class="backlinks-HA-HT-section">
        <div class="row  ">

            <div class="col-lg-6 col-md-6">
                <h1 class="backlinks-HA-HT-main-h1 mb-3">Backlinks From <span>High Authority And High
                        Traffic Websites</span>
                </h1>
                <div class="mt-0  ">
                    <p class="backlinks-HA-HT-main-p mb-3">Many business owners benefit from FastLinky's top-notch
                        <b>backlinks services</b>. We at FastLinky will provide you with the <b>best link building
                            services</b> to make
                        pursuing
                        your big purpose easier. We have expert teams who can develop content strategies for you. Our
                        high-quality <b>backlink building</b> services will help keep your website's organic profile.
                    </p>
                </div>

                <div class=" buttonsinfo ">
                    <button type="button" onclick="goTo('customer-packages')" class="btn indexpage-link-btn ">Get
                        Your Links Now</button>
                </div>

            </div>
            <div class="col-lg-6 col-md-6">
                <div class="">
                    <div>
                        <img src="./images/boost-blog.png" class="w-100  mb-4 " alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Backlinks From High Authority And High Traffic Websites end -->
    <!-- __________________________________________________________________________________________ -->
    <!-- ___________________________________________________________________________________________ -->
    <!-- testimonials customers reviews -->
    <?php require_once "partials/testimonials.php"; ?>
    <!-- testimonials customers reviews -->
    <!-- ________________________________________________________________________________________ -->
    <!-- Link Building Services that Actually Matters-starts -->
    <section class="lbs-actually-matters-main">
        <div>
            <div class="row">
                <div class=" col-xl-5 col-md-5">
                    <h1 class="sec_heading mb-3">
                        What Makes Us <br><span>A Reliable Link Building Provider?</span>
                    </h1>
                    <p class="service-index-p text-md-start">
                        Our specialty is link development. We work to gather backlinks for you that are typically
                        impossible to acquire through standard <b>SEO services</b> while keeping <b>domain authority</b>
                        and organic
                        development in mind.
                    </p>
                    <div>
                        <img src="./images/freepik-img/country-reach-outreach.webp " class="w-100 " alt="">
                    </div>
                </div>
                <div class="col-xl-7 col-md-7 mt-3 mt-md-0">
                    <div class="row">
                        <div class="col-md-6 mb-2">
                            <div class="our-secret-delivering-main-card2 h-100">
                                <div class="text-chnging-css pb-3 ">
                                    <img src="./images/dummy-img/real-bo-ul-li-1.png" style="width: 75px;" alt="">
                                </div>
                                <h4 class="how-fonts-h4 ">Services For Fully Customized Link Building</h4>
                                <p class="">
                                    Clients are most important. We take that carefully, and all of our work is driven by
                                    the selection and guidance of our clients. For the utmost, our team carefully places
                                    appropriate keywords. </p>

                            </div>
                        </div>
                        <div class="col-md-6 mb-2">
                            <div class="our-secret-delivering-main-card2 h-100">
                                <div class="text-chnging-css pb-3 ">
                                    <img src="./images/dummy-img/real-bo-ul-li-2.png" style="width: 75px;" alt="">
                                </div>
                                <h4 class="how-fonts-h4 ">Increased Readership</h4>
                                <p class="">
                                    Get relevant niche-driven traffic and enjoy <b>high domain authority backlinks</b>
                                    that
                                    were personally acquired. To guarantee quality and quick-performing plans, we
                                    personally connect with real bloggers from your sector. </p>
                            </div>
                        </div>
                        <div class="col-md-6 mb-2">
                            <div class="our-secret-delivering-main-card2 h-100">
                                <div class="text-chnging-css pb-3 ">
                                    <img src="./images/dummy-img/real-bo-ul-li-3.png" style="width: 75px;" alt="">
                                </div>
                                <h4 class="how-fonts-h4 ">Perfect Reliable Outcomes</h4>
                                <p class="">
                                    Since we provide every service locally, organization and communication are excellent
                                    and progress quickly. There's no need to repeat yourself to us! We take care of
                                    everything you want to appear on your website, including <b>high domain authority
                                        backlinks</b> and ratings. </p>
                            </div>
                        </div>
                        <div class="col-md-6 mb-2">
                            <div class="our-secret-delivering-main-card2 h-100">
                                <div class="text-chnging-css pb-3 ">
                                    <img src="./images/dummy-img/real-bo-ul-li-1.png" style="width: 75px;" alt="">
                                </div>
                                <h4 class="how-fonts-h4 ">Business Expertise</h4>
                                <p class="">
                                    We now have more than ten years of business experience. We have a group of
                                    professionals working together to develop a database of publishers, produce
                                    authentic content, and provide our clients with the best <b>SEO services </b> that
                                    are of
                                    the highest caliber. </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center">
                <button type="button" onclick="goTo('customer-packages')" class="btn indexpage-link-btn ">Get
                    Your
                    Links Now</button>
            </div>
        </div>
    </section>

    <!-- Link Building Services that Actually Matters-ends -->
    <!-- ________________________________________________________________________________________ -->
    <!-- _________________________________________________________________________________________ -->
    <!--  Why Choose Fastlinky  starts -->
    <section class="services-index-section ">
        <div class="custom-cntainr">
            <div>
                <h2 class=" text-center mt-4 my-3 service-index-h2"> <span>Services</span> That We Provide </h2>
            </div>
            <p class="service-index-p">
            From <b>managed link building services</b>  to  <b>country specific links</b>, cannabis backlinks, guest posting, and casino backlinks you will find everything at Fastlinky.
            </p>
            <div class="service-index-card-div">
                <div class="row row-cols-1 row-cols-sm-3">
                    <div class="col my-2 my-md-4 px-md-3">
                        <div class="card h-100 service-index-card-box pt-md-5">
                            <div class="pb-3 text-center text-md-start">
                                <img src="./images/dummy-img/real-bo-ul-li-2.png" class="" alt="">
                            </div>
                            <h4 class="how-fonts-h4 text-center text-md-start py-2">Blogger Outreach Service</h4>
                            <p class="h-100">
                                Get authoritative, high-quality links that lead to editorial content on real,
                                traffic-generating websites.</p>
                            <div class="my-3">
                                <a class="services-a-btn" href="blogger-outreach">Learn More <i
                                        class="fa-solid fa-chevron-right ps-1"></i></a>
                            </div>

                        </div>
                    </div>
                    <div class="col my-2 my-md-4 px-md-3">
                        <div class="card h-100 service-index-card-box pt-md-5">
                            <div class="pb-3 text-center text-md-start">
                                <img src="./images/dummy-img/real-bo-ul-li-1.png" class="" alt="">
                            </div>
                            <h4 class="how-fonts-h4 text-center text-md-start py-2">White Label Link Building</h4>
                            <p class="h-100">
                                We offer trustworthy, <b>excellent link-building services</b> that are totally
                                accessible.
                            </p>
                            <div class="my-3">
                                <a class="services-a-btn" href="white-label-link-building">Learn More <i
                                        class="fa-solid fa-chevron-right ps-1"></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="col my-2 my-md-4 px-md-3">
                        <div class="card h-100 service-index-card-box pt-md-5">
                            <div class=" pb-3 text-center text-md-start">
                                <img src="./images/dummy-img/real-bo-ul-li-3.png" class="" alt="">
                            </div>
                            <h4 class="how-fonts-h4 text-center text-md-start py-2">Country-Specific Backlinks
                            </h4>
                            <p class="h-100">
                                Improve SEO with <b>country-specific backlinks</b> from multilingual content.</p>
                            <div class="my-3">
                                <a class="services-a-btn" href="country-specific-backlinks">Learn More <i
                                        class="fa-solid fa-chevron-right ps-1"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col my-2 my-md-4 px-md-3">
                        <div class="card h-100 service-index-card-box pt-md-5">
                            <div class="pb-3 text-center text-md-start">
                                <img src="./images/dummy-img/real-bo-ul-li-2.png" class="" alt="">
                            </div>
                            <h4 class="how-fonts-h4 text-center text-md-start py-2">High Authority Backlinks</h4>
                            <p class="h-100">
                                Direct your organic growth to search engines with high DR SaaS backlinks.</p>
                            <div class="my-3">
                                <a class="services-a-btn" href="high-authority-backlinks">Learn More <i
                                        class="fa-solid fa-chevron-right ps-1"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col my-2 my-md-4 px-md-3">
                        <div class="card h-100 service-index-card-box pt-md-5">
                            <div class="pb-3 text-center text-md-start">
                                <img src="./images/dummy-img/real-bo-ul-li-1.png" class="" alt="">
                            </div>
                            <h4 class="how-fonts-h4 text-center text-md-start py-2">Link Insertion Service</h4>
                            <p class="h-100">
                                Get a variety of helpful and work-based backlinks from the previous posts.
                            </p>
                            <div class="my-3">
                                <a class="services-a-btn" href="link-insertion-service">Learn More <i
                                        class="fa-solid fa-chevron-right ps-1"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col my-2 my-md-4 px-md-3">
                        <div class="card h-100 service-index-card-box pt-md-5">
                            <div class=" pb-3 text-center text-md-start">
                                <img src="./images/dummy-img/real-bo-ul-li-3.png" class="" alt="">
                            </div>
                            <h4 class="how-fonts-h4 text-center text-md-start py-2">Managed Link Building
                            </h4>
                            <p class="h-100">
                                With FastLinky, you can organize regular links from high-ranking websites and set up
                                monthly backlinking campaigns.</p>
                            <div class="my-3">
                                <a class="services-a-btn" href="managed-link-building">Learn More <i
                                        class="fa-solid fa-chevron-right ps-1"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col my-2 my-md-4 px-md-3">
                        <div class="card h-100 service-index-card-box pt-md-5">
                            <div class=" pb-3 text-center text-md-start">
                                <img src="./images/dummy-img/real-bo-ul-li-3.png" class="" alt="">
                            </div>
                            <h4 class="how-fonts-h4 text-center text-md-start py-2">Cannabis Backlink
                            </h4>
                            <p class="h-100">
                            Get powerful backlinks for <b>Cannabis</b>  and <b>CBD link-building services.</b>  </p>
                            <div class="my-3">
                                <a class="services-a-btn" href="cannabis-backlinks">Learn More <i
                                        class="fa-solid fa-chevron-right ps-1"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col my-2 my-md-4 px-md-3">
                        <div class="card h-100 service-index-card-box pt-md-5">
                            <div class=" pb-3 text-center text-md-start">
                                <img src="./images/dummy-img/real-bo-ul-li-3.png" class="" alt="">
                            </div>
                            <h4 class="how-fonts-h4 text-center text-md-start py-2">Guest Posting
                            </h4>
                            <p class="h-100">
                            We offer high-quality <b>guest posting services</b>  with useful backlinks and content links that boost the organic growth of your site. </p>
                            <div class="my-3">
                                <a class="services-a-btn" href="guest-posting">Learn More <i
                                        class="fa-solid fa-chevron-right ps-1"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col my-2 my-md-4 px-md-3">
                        <div class="card h-100 service-index-card-box pt-md-5">
                            <div class=" pb-3 text-center text-md-start">
                                <img src="./images/dummy-img/real-bo-ul-li-3.png" class="" alt="">
                            </div>
                            <h4 class="how-fonts-h4 text-center text-md-start py-2">Casino Backlinks
                            </h4>
                            <p class="h-100">
                            Buy <b>casino backlinks</b>  to grow your <b>online gambling and casino websites</b> . </p>
                            <div class="my-3">
                                <a class="services-a-btn" href="casino-backlinks">Learn More <i
                                        class="fa-solid fa-chevron-right ps-1"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Why Choose Fastlinky  ends -->
    <!-- ____________________________________________________________________________________________________ -->

    <!-- _________________________________________________________________________________________________ -->
    <!-- All set to rank on the first page of Google? start -->
    <section class="backlinks-HA-HT-section mb-5">
        <div class="row">
            <div class="col-lg-6 col-md-6 m-auto">
                <h1 class="only-catchy-headline mb-4">Are You Ready To Be Present On Google's Front Page?
                </h1>
                <div class=" buttonsinfo ">
                    <button type="button" onclick="goTo('customer-packages')"
                        class="btn indexpage-link-btn ">Outrank Your Competition</button>
                </div>

            </div>
            <div class="col-lg-6 col-md-6">
                <div class="">
                    <div>
                        <img src="./images/freepik-img/country-spc-research.webp" class="w-100 " alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- All set to rank on the first page of Google? end -->
    <!-- __________________________________________________________________________________________ -->

    <!-- ____________________________________________________________________________________________ -->

    <!-- our-secret-delivering-main-sec starts -->
    <section class="our-secret-delivering-main-sec pt-2">
        <div class="">
            <div>
                <h2 class=" text-center mt-4 my-3 our-secret-d-h2">How <span> FastLinky works?</span></h2>
            </div>
            <p class="service-index-p text-md-center">
                We work for manual outreach <b>link building services</b> to gain a number of trustworthy and
                high-quality backlinks from authoritative websites that are relevant to our customer base as quickly as
                possible.
            </p>
            <div class="our-secrect-delvry-main custom-cntainr">
                <div class="row ">
                    <div class="col-md-6 my-3">
                        <div class="our-secret-delivering-main-card h-100">

                            <div class="text-center pb-3 ">
                                <img src="./images/dummy-img/real-bo-ul-li-1.png" alt="">
                            </div>
                            <h4 class="how-fonts-h4 ">Analyze And Plan</h4>
                            <p class="">
                                We carry out an overall analysis of your website and create a quick development path for
                                it. At FastLinky, we create a fantastic <b>link building </b> plan just for you using
                                the information that is accessible. </p>

                        </div>

                    </div>

                    <div class="col-md-6 my-3">
                        <div class="our-secret-delivering-main-card h-100">

                            <div class="text-center pb-3 ">
                                <img src="./images/dummy-img/real-bo-ul-li-2.png" alt="">
                            </div>
                            <h4 class="how-fonts-h4  ">Customized Outreach Strategy</h4>
                            <p class="">
                                Team FastLinky searches for outstanding websites that are appropriate to the requirement
                                of one of our clients. Next, we develop our <b>custom outreach services</b> . To achieve
                                the best outcomes, we update and pinch our outreach strategies frequently. </p>

                        </div>

                    </div>

                    <div class="col-md-6 my-3">
                        <div class="our-secret-delivering-main-card h-100">
                            <div class="text-center pb-3">
                                <img src="./images/dummy-img/real-bo-ul-li-3.png" alt="">
                            </div>
                            <h4 class="how-fonts-h4  ">Creating High-Quality Backlinks</h4>
                            <p class="">
                                Our goal is to obtain high-authority backlinks for our customers. We develop a strong
                                backlink profile for our clients using various <b>whitehat link building services</b> ,
                                which ultimately help them rank higher than their rivals.</p>

                        </div>
                    </div>
                    <div class="col-md-6 my-3">
                        <div class="our-secret-delivering-main-card h-100">

                            <div class="text-center pb-3">
                                <img src="./images/dummy-img/real-bo-ul-li-1.png" alt="">
                            </div>
                            <h4 class="how-fonts-h4 ">Help You Outrank Your Competitors</h4>
                            <p class="">
                                We put more priority on quality. In order to deliver excellent results and grow your
                                company, our <b>Link Building services agency</b> is completely ready with client
                                requirements and expectations. </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- our-secret-delivering-main-sec ends -->
    <!-- ______________________________________________________________________________________________ -->

    <section class="our-secret-delivering-main-sec py-0">
        <div class="">
            <div>
                <h2 class=" text-center mt-4 my-3 our-secret-d-h2">Benefits Of <span>Hiring A Skilled Link Building
                        Agency</span> </h2>
            </div>
            <p class="service-index-p text-md-center fw-semibold mb-5">
                Here are some of the benefits of hiring your link building team over producing one in-house.
            </p>
            <div class="our-secrect-delvry-main">
                <div class="row ">
                    <div class="col-xl-3 col-sm-6">
                        <div class="our-secret-delivering-main-card2 h-100">
                            <div class="text-chnging-css pb-3 ">
                                <img src="./images/dummy-img/real-bo-ul-li-1.png" alt="">
                            </div>
                            <h4 class="how-fonts-h4 ">Increase Company Awareness</h4>
                            <p class="">
                                By linking to guest posts, our <b>link building services agency</b> will increase the
                                visibility of your website. Therefore, brand recognition will give your business an
                                advantage over competitors. Remember that when keywords on your website are related to
                                other reliable sites with high domain authority, traffic to your site will be developed
                                automatically. </p>

                        </div>

                    </div>

                    <div class="col-xl-3 col-sm-6">
                        <div class="our-secret-delivering-main-card2 h-100">
                            <div class="text-chnging-css pb-3 ">
                                <img src="./images/dummy-img/real-bo-ul-li-2.png" alt="">
                            </div>
                            <h4 class="how-fonts-h4  ">Build Connections</h4>
                            <p class="">
                                Our <b>SEO agency</b> must contact other leading companies in order to build
                                high-quality
                                links. Although improving your site link is the main goal of our <b>blogger outreach
                                    agency</b> , there are additional advantages that will help your company overall.
                                However,
                                you can build powerful links that are helpful to both companies. You can even create
                                other positive collaborations that will advance your business. </p>

                        </div>

                    </div>

                    <div class="col-xl-3 col-sm-6">
                        <div class="our-secret-delivering-main-card2 h-100">
                            <div class="text-chnging-css pb-3">
                                <img src="./images/dummy-img/real-bo-ul-li-3.png" alt="">
                            </div>
                            <h4 class="how-fonts-h4  ">Better And High-Quality Content </h4>
                            <p class="">
                                Your readers will always appreciate high-quality content, which is one of the key
                                benefits of <b>link building</b> . Yes, FastLinky will help in creating informative and
                                useful
                                content. The ultimate clients will benefit from the extra valuation. Visitors to the
                                website will keep visiting if the article is very informative. By doing this, you can
                                boost revenue. </p>
                        </div>

                    </div>
                    <div class="col-xl-3 col-sm-6">
                        <div class="our-secret-delivering-main-card2 h-100">
                            <div class="text-chnging-css pb-3">
                                <img src="./images/dummy-img/real-bo-ul-li-1.png" alt="">
                            </div>
                            <h4 class="how-fonts-h4  ">Cost Savings</h4>
                            <p class="">
                                If you rarely prefer <b>link building services</b> or need them for particular
                                campaigns, our
                                link-building company will frequently be less expensive than hiring an in-house team.
                                With an in-house team, you must make financial investments in hiring, informing, and
                                observing employees. When working with <b>a link building services agency</b> , you can
                                typically select from a variety of pricing structures and package deals and purchase the
                                services you actually need. </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- _______________________________________________________________________________________________ -->
    <!-- our secret delivering result ends -->
    <!-- ================================================================================================= -->
    <!-- Frequently Asked Questions starts -->
    <!-- ================================================================================================ -->

    <?php require_once "partials/faqs-new.php"; ?>

    <!-- ================================================================================================= -->
    <!-- Frequently Asked Questions ends -->
    <!-- ================================================================================================ -->
    <!-- actionpage starts -->
    <section class="actionpage-section">
        <div>
            <h2> For any further information</h2>
            <!-- <h2>Have any query?</h2> -->
        </div>
        <div class="text-center mt-3 mt-lg-0">
            <a href="contact" class="btn action-contact_btn mt-3 ms-2">Contact Us</a>
            <a href="login" class="btn action-start_btn mt-3 ms-2">Get Started</a>
        </div>
    </section>

    <!-- actionpage ends -->
    <!-- ---------------------------------------------------------------------------------- -->
    <!-- --------------------------------------- -->
    <!-- feedback form -->
    <?php require_once "partials/feedback.php"; ?>
    <!-- feedback form -->
    <!-- ----------------------------------------------- -->
    <!-- Footer -->
    <?php require_once "partials/footer.php"; ?>
    <!-- footer -->
    <!-- -------------------------------------- -->
    <script>
    const goTo = (url) => {
        location.href = url;
    }
    </script>
    <script src="js/script.js"></script>
    <script src="js/jquery-2.2.3.min.js"></script>
    <script src="plugins/bootstrap-5.2.0/js/bootstrap.js"></script>
</body>

</html>