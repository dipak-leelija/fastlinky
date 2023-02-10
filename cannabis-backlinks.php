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
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Link Building Services for Cannabis & CBD SEO - <?php echo COMPANY_S; ?></title>
    <link rel="shortcut icon" href="<?php echo FAVCON_PATH?>" type="image/png" />
    <link rel="apple-touch-icon" href="<?php echo FAVCON_PATH?>" />
    <meta name="description"
        content="Fastlinky provides high quality Cannabis & CBD Link Building services and SEO that can boost your authority and ranking while you reach the desired audience." />
    <meta name="keywords"
        content="cannabis seo experts,	cbd seo	,marijuana seo,	cbd seo agency,	CBD Link building, Cannabis Link building,	Cannabis & CBD Link building Service,Cannabis & CBD Link building,	FastLinky, CBD Link Building Services,	cannabis link building services,Cannabis Backlinks, cannabis seo, cannabis seo experts,  cbd seo, cbd seo company" />

    <!-- <link href="css/bootstrap.css" rel='stylesheet' type='text/css' /> -->
    <link rel="stylesheet" href="plugins/bootstrap-5.2.0/css/bootstrap.css">
    <link rel="stylesheet" href="plugins/fontawesome-6.1.1/css/all.css">
    <!-- Custom CSS -->
    <link href="css/leelija.css" rel='stylesheet' type='text/css' />
    <link href="css/style.css" rel='stylesheet' type='text/css' />
    <link href="css/guest-post-offer.css" rel='stylesheet' type='text/css' />
    <link href="css/cannabis-backlinks.css" rel='stylesheet' type='text/css' />
    <link rel="stylesheet" href="css/partials.css">


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
    <!-- Cannabis Backlinks main banner starting -->
    <section class="managed-link-building-main-banner">
        <div class="container mlb-main-cntainer">
            <div class="row mlb-main-start-row">
                <div class="col-12 col-lg-5 col-md-5  p-2 p-md-0">
                    <div class="">
                        <img src="./images/freepik-img/cannabis-banner.png" class="w-100" alt="">
                    </div>
                </div>
                <div class="col-12 col-lg-7 col-md-7  px-0 px-md-4">
                    <div class="mlb-wrapping">
                        <h1 class="mlb-starting-main-h1">SEO link-building services for Cannabis & CBD</h1>
                        <p class=" mt-5 mb-4 py-0 py-md-2 mlb-starting-main-p">Rank top on the SERP, manage certified
                            traffic to your website, get powerful backlinks for cannabis and CBD link-building services,
                            and attention to our website. We promote effective CBD link-building services.
                        </p>
                        <!-- <div>
                            <ul>
                                <li class="tick-check"> &#10004; <b class="tick-check-p">We are the one-stop solution
                                        with <br> cannabis and CBD link-building services.
                                    </b> </li>

                            </ul>
                        </div> -->
                        <div class=" buttonsinfo mt-5 mb-0">
                            <a href="#pricing-cards">
                                <button type="button" class="btn managed-link-btn ">See Pricing</button>
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- end of Cannabis Backlinks main banner -->
    <!-- --------------------------------------------------------------------------------------------- -->
    <!-- _______________________________________________________________________________________________ -->
    <!-- Collaboration opportunity-cb start -->

    <section class="lbs-actually-matters-main">
        <div class="row">

            <div class=" col-xl-6 col-md-6">
                <h1 class="lbs-actually-matters-main-h1 ">How FastLinky Is Increase
                    <span>Your Cannabis and CBD Link Building Services</span>
                </h1>
                <p>To know about Cannabis and CBD Link Building Services, first, we should know about CBD meaning, which
                    means cannabidiol, it is a chemical that is found in the Sativa plant, the other name of cannabis
                    also known as marijuana. </p>
                <p>Cannabis is used for smoking, vaporizing, or with food. Cannabis is mostly used for entertainment,
                    although it is used as a medicinal drug. It is the most often-used illegal drug in the World. In
                    research, we found 232 million people used cannabis in 2022. </p>
                <p>
                    <i> As per the CBD market, the cannabis and CBD industry will gain 33.6 billion by 2025. To learn
                        about cannabis in full detail, FastLinky is the best site to know. </i>
                </p>

                <div class=" buttonsinfo mt-3">
                    <a href="#pricing-cards">
                        <button type="button" class="btn managed-link-btn ">View Pricing</button>
                    </a>
                </div>
            </div>
            <div class="col-xl-6 col-md-6 m-auto text-center">
                <div class="">
                    <div>
                        <img src="./images/freepik-img/cbd-collab.png" class=" w-100  mb-4 " alt="">
                    </div>
                </div>
            </div>

        </div>

    </section>
    <!-- Collaboration opportunity-cb ends -->
    <!-- _________________________________________________________________________________________________ -->


    <!-- Cannabis & CBD Link Building Service starts -->
    <!-- _________________________________________________________________________________________________ -->

    <section class="lbs-actually-matters-main">
        <div class="row">
            <div class="col-xl-6 col-md-6 m-auto text-center">
                <div class="">
                    <div>
                        <img src="./images/freepik-img/cbd-services.png" class=" w-100  mb-4 " alt="">
                    </div>
                </div>
            </div>
            <div class=" col-xl-6 col-md-6">
                <h1 class="cannabis-cbd-service-h1 ">Cannabis & CBD <br>
                    <span>Link Building Service</span>
                </h1>
                <p class="mb-5">With an enlarged number of hemp businesses and connected products, cannabis is the
                    fastest growing business in highly competitive, all over the world. </p>


                <div class=" buttonsinfo mt-3">
                    <a href="#pricing-cards">
                        <button type="button" class="btn managed-link-btn ">View Pricing</button>
                    </a>
                </div>
            </div>


        </div>

    </section>

    <!-- Cannabis & CBD Link Building Service ends -->
    <!-- _________________________________________________________________________________________________ -->


    <!--========= Cannabis Link Building Or Regular Link Building-  Start =========-->
    <section class="cannabis-clb-rlb-section">
        <div class="cannabis-clb-rlb-main-div ">
            <h2>Why Choose Cannabis Link-Building From <strong>From All Over The Common Link Building? </strong> </h2>

            <ul>
                <li> <span><i class="fa-solid fa-circle-check"></i></span> It is a large CBD fund, which is growing
                    repeatedly.</li>
                <li> <span><i class="fa-solid fa-circle-check"></i></span> The content writing team who experts to write
                    the best to create content with CBD niche.</li>
                <li> <span><i class="fa-solid fa-circle-check"></i></span>This is the fastest-growing business among
                    other illegal businesses to rank all over the world. </li>
                <li> <span><i class="fa-solid fa-circle-check"></i></span> Experienced how to grow the business and
                    create CBD-relevant audiences.</li>
                <li> <span><i class="fa-solid fa-circle-check"></i></span> Cannabis link-building improves the ranking
                    of your website. </li>
            </ul>
            <div class=" buttonsinfo mt-5 justify-content-center cannabis-for-smallsizing">
                <a href="#pricing-cards">
                    <button type="button" class="btn managed-link-btn ">View Pricing</button>
                </a>
            </div>
        </div>
    </section>


    <!---------- Cannabis Link Building Or Regular Link Building-  End ---------------------->
    <!-- ____________________________________________________________________________________________ -->
    <!-- _______________________________________________________________________________________________ -->
    <!-- How will Fast Linky Help You To Grow in the CBD business? start -->

    <section class="cbd-business-main-section">
        <div class="row">
            <div class="col-xl-6 col-md-6 m-auto text-center">
                <div class="">
                    <div>
                        <img src="./images/freepik-img/cbd-imgs1.png" class=" w-100  mb-4 " alt="">
                    </div>
                </div>
            </div>
            <div class=" col-xl-6 col-md-6">
                <h1 class="cbd-business-main-section-h1 ">How FastLinky Boosts Your Business
                    <strong>To The Top</strong>
                </h1>
                <p>
                    If you want to know why FastLinky is one of the best site to know about the CBD Link Building
                    Service, you must follow our site. Here you always have the right link to grow your business.
                </p>

                <ul>
                    <li class="d-flex"> <span> <i class="fa-solid fa-square-check pe-2"></i></span>
                        <p class="mb-0">Whenever you buy links to your cannabis business using our cannabis link-building service, we
                            make sure to give you the best quality links from high-traffic websites.</p>
                    </li>
                    <li class="d-flex"> <span><i class="fa-solid fa-square-check pe-2"></i></span>
                        <p class="mb-0"> Whenever you buy links to your cannabis business using our cannabis link-building service,
                            we make sure to give you the best quality links from high-traffic websites.</p>
                    </li>
                    <li class="d-flex"> <span><i class="fa-solid fa-square-check pe-2"></i></span>
                        <p class="mb-0">Here you find beneficial and searchable content for you.</p>
                    </li>

                </ul>

                <div class=" buttonsinfo ">
                    <a href="#pricing-cards">
                        <button type="button" class="btn managed-link-btn ">View Pricing</button>
                    </a>
                </div>
            </div>

        </div>

    </section>
    <!-- Collaboration opportunity-cb ends -->
    <!-- _________________________________________________________________________________________________ -->

    <!-- ------------------------------------------------ -->
    <!-- pricing section -->
    <!-- ------------------------------------------- -->

    <section class="mt-sm-5 mt-0">
        <h1 class="text-center pricing-bo-h1 mb-3 px-2">Cannabis Backlinks Pricing
        </h1>
        <p class="text-center pricing-bo-p1 mb-3">We offer blogger outreach links categorised as <br> per DA,
            DR, or organic traffic. Below is the pricing <br> for All 3 models.</p>

        <?php require_once "partials/pricing-cards.php"; ?>
    </section>

    <!-- ------------------------------------------------ -->
    <!-- pricing section ends -->
    <!-- ------------------------------------------- -->


    <!-- ================================================================================================ -->
    <!-- Why is Link Building Important for Cannabis Business? start -->

    <section class="why-is-lb-important-main pb-0">
        <div class="row">
            <div class="col-xl-6 col-md-6 m-auto text-center">
                <div class="">
                    <div>
                        <img src="./images/freepik-img/cbd-img-2.png" class=" w-100  mb-4 " alt="">
                    </div>
                </div>
            </div>
            <div class=" col-xl-6 col-md-6">
                <h1 class="why-is-lb-important-main-h1 ">Why FastLinky Is Best For
                    <span>Cannabis Link-Building Services?</span>
                </h1>
                <p>
                    To upgrade your opportunity of increasing the traffic to your website, you can achieve the help of
                    cannabis link-building services, like our site FastLinky. </p>
                <p>
                    If you are interested in cannabis, you
                    should follow our website. We are launched with high-quality links with fresh content which will
                    help you to increase your cannabis site and climb the top rank. We have extensive knowledge of SEO
                    and also worked with many clients in the cannabis market. </p>
                <p>
                    Get high-quality backlinks of cannabis and
                    CBD link-building services, this site will always help you to choose the best option.
                </p>


            </div>
        </div>
    </section>
    <!-- Why is Link Building Important for Cannabis Business?  ends -->
    <!-- __________________________________________________________________________________________ -->
    <!-- __________________________________________________________________________________________ -->
    <!-- Why is Link Building Important for Cannabis Business? start -->

    <section class="improve-your-roi-organic-main ">


        <div class="row ">

            <div class=" col-xl-6 col-md-6">
                <h1 class="why-is-lb-important-main-h1 ">Why Is Link Building Major For
                    <span> The Cannabis Business?</span>
                </h1>
                <p>
                    Link building is highly effective and a major part of the cannabis industry. Link building is one of
                    the effective ways to increase your online visibility.
                </p>
                <p> We believe that every customer has a
                    different need, and we must focus on the service which is always ranking on google. We should know
                    how to create magnificent link-building that improves your business.
                </p>
                <p> We at FastLinky, do fresh
                    content from the other site based on the clients' sites. You can enjoy 100% natural traffic. By the
                    way, it is an authentic way to increase your brand.
                </p>



            </div>
            <div class="col-xl-6 col-md-6 m-auto text-center">
                <div class="">
                    <div>
                        <img src="./images/freepik-img/cbd-img-3.png" class=" w-100  mb-4 " alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Collaboration opportunity-cb ends -->
    <!-- __________________________________________________________________________________________ -->
     <!-- Cannabis & CBD Link Building Service starts -->
    <!-- _________________________________________________________________________________________________ -->

    <section class="lbs-actually-matters-main">
        <div class="row">
            <div class="col-xl-6 col-md-6 m-auto text-center">
                <div class="">
                    <div>
                        <img src="./images/freepik-img/cbd-services.png" class=" w-100  mb-4 " alt="">
                    </div>
                </div>
            </div>
            <div class=" col-xl-6 col-md-6">
                <h1 class="cannabis-cbd-service-h1 ">
                    <span>CBD SEO Company </span>
                </h1>
                <p class="mb-5">A CBD SEO Company can support you to smash the marketing noise and improve your customer base like Coalition Technologies. It is a vital support service. Coalition Technologies has experts in web design, PPC advertising, digital marketing, development, etc. This is the agency to help to boost the traffic on your website. Further, if you are interested in searching for top cannabis SEO experts in cannabis production, you may not find a site as good as FastLinky. We are experienced and have worked in the cannabis niche for years.</p>


                <div class=" buttonsinfo mt-3">
                    <a href="#pricing-cards">
                        <button type="button" class="btn managed-link-btn ">View Pricing</button>
                    </a>
                </div>
            </div>


        </div>

    </section>

    <!-- Cannabis & CBD Link Building Service ends -->
    <!-- _________________________________________________________________________________________________ -->
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
    <!-- =---------------------------------------------------------------------------------------------- -->


    <!-- Footer -->
    <?php require_once "partials/footer.php"; ?>

    <script src="js/jquery-2.2.3.min.js"></script>



    <!-- /Footer -->
    <!-- <script type="text/javascript">
    $(document).ready(function() {
        $(".faq-li").click(function() {
            var icon = $(this).children("i");
            var notThis = $(".faq-li").not(this);
            var include = icon.hasClass("fa-circle-plus");
            $(this).children("i").toggleClass("fa-circle-plus fa-circle-minus");
            $(this).children(".faq-details").toggle();
            notThis.children(".faq-details").css("display", "none");
            notThis.children("i").addClass("fa-circle-plus").remove("fa-circle-minus");
        })
    });
    </script> -->



    <script src="plugins/bootstrap-5.2.0/js/bootstrap.js"></script>

</body>

</html>