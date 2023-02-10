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
    <title>Guest Post Service, Blogger Outreach Services - <?php echo COMPANY_S; ?></title>
    <link rel="shortcut icon" href="<?php echo FAVCON_PATH?>" type="image/png" />
    <link rel="apple-touch-icon" href="<?php echo FAVCON_PATH?>" />
    <meta name="description"
        content="Fastlinky provided Guest Post Service at reasonable prices on fashion blogs, beauty blogs, health blogs, travel blogs, fitness blogs, tech blogs, home improvement  or more." />
    <meta name="keywords"
        content="Guest Post, Guest Posting,Guest Post Service, blogger outreach, guest posting services, guest posting blogs, fashion blogs, beauty blogs, health blogs, travel blogs, fitness blogs, tech blogs, home improvement blogs, CBD blogs, Casino Blogs" />

    <!-- <link href="css/bootstrap.css" rel='stylesheet' type='text/css' /> -->
    <link rel="stylesheet" href="plugins/bootstrap-5.2.0/css/bootstrap.css">
    <link rel="stylesheet" href="plugins/fontawesome-6.1.1/css/all.css">
    <!-- Custom CSS -->
    <link href="css/leelija.css" rel='stylesheet' type='text/css' />
    <link href="css/style.css" rel='stylesheet' type='text/css' />


    <!-- font-awesome icons -->
    <link href="css/fontawesome-all.min.css" rel="stylesheet">
    <!-- //Custom Theme files -->
    <!--webfonts-->
    <link href="//fonts.googleapis.com/css?family=Ubuntu:300,300i,400,400i,500,500i,700,700i" rel="stylesheet">

    <link href="//fonts.googleapis.com/css?family=Montserrat:400,500,600,700,900" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Nunito+Sans:400,700,900" rel="stylesheet">
    <!--//webfonts-->

    <style>
    .hr-seprator-css {
        padding: 50px 8rem;
    }

    .separator {
        /* margin-top: 25px;
	 margin-bottom: 80px; */
        border: 0;
    }

    .separator--line {
        border: 0;
        border-bottom: 3px solid #d3d3d3e0;
        animation: separator-width 7s ease-out forwards;
        animation-iteration-count: infinite;
        width: 0;
        /* border-bottom: 3px solid #bada55; */
        /* animation: separator-width 1s ease-out forwards; */
    }

    @keyframes separator-width {
        0% {
            width: 0;
        }

        100% {
            width: 100%;
        }
    }

    .separator--dots {
        margin: auto;
        overflow: visible;
        border: 0;
        content: "";
        background-color: #bada55;
        /* background-color: lightgray; */
        display: block;
        height: 7px;
        width: 7px;
        border-radius: 50%;
        position: relative;
    }

    .separator--dots:before {
        content: "";
        /* background-color: lightgray; */
        background-color: #bada55;
        display: block;
        height: 7px;
        width: 7px;
        border-radius: 50%;
        position: absolute;
        left: -32px;
        animation: dot-move-left 1s ease-out forwards;
        animation-duration: 5s;
        animation-iteration-count: infinite;
    }

    .separator--dots:after {
        content: "";
        /* background-color: lightgray; */
        background-color: #bada55;
        display: block;
        height: 7px;
        width: 7px;
        border-radius: 50%;
        position: absolute;
        left: 32px;
        animation: dot-move-right 1s ease-out forwards;
        animation-duration: 5s;
        animation-iteration-count: infinite;
    }

    @keyframes dot-move-right {
        0% {
            left: 0;
        }

        100% {
            left: 32px;
        }
    }

    @keyframes dot-move-left {
        0% {
            left: 0;
        }

        100% {
            left: -32px;
        }
    }

    @media(max-width:991px) {
        .hr-seprator-css {
            padding: 30px 3rem;
        }
    }

    @media (max-width: 375px) {
        .hr-seprator-css {
            padding: 0px 1rem;
        }
    }
    </style>
</head>

<body data-scrollbar>
    <?php require_once "partials/navbar.php"; ?>
    <!-- <div class="blogger-banner  banner">
        <h1 class="blue_color_class text-uppercase font-weight-bold">Blogger Outreach</h1>
    </div> -->

    <div class="blogger-banner  banner">
        <h1 class="blogbanner-heading">Premium Guest Post & Blogger Outreach Service</h1>
        <div class="gp-heading-details-2">
            <p>
                Manual Blogger outreach service & 10,000+ Regular basis updated sites - Ready for you! <br>
                You can now buy High DA, Traffic niches oriented Guest Posts from quality sites for <br> USA, UK,
                CANADA,
                AUSTRALIA,INDIA and other country.
            </p>

        </div>

    </div>

    <!--Banner Dividor-->
    <?php //include ('quote.php') ?>
    <!--/End of baneer Dividor-->


    <!-- pricing section -->
    <h1 class="text-center pricing-bo-h1 mb-3 px-2">Guest Post Placement Pricing
    </h1>
    <p class="text-center pricing-bo-p1 mb-3 px-2">We offer blogger outreach links categorised as <br> per DA,
        DR, or organic traffic. Below is the pricing <br> for All 3 models.</p>

    <?php require_once "partials/pricing-cards.php"; ?>
    <!-- pricing section end -->
    <!-- ================================================================================================ -->


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


    <!-- ===================================================================================================== -->

    <div class="blogger-third-section">
        <div class="container ">
            <h2 class="text-center">Build Relationships With Real Bloggers</h2>
            <div class="row">
                <div class="col-md-6">
                    <div class="build-relationship-text">
                        <p>Having thousands of databases of real bloggers, Fastlinky is the ultimate hub for guest
                            posting. Outreaching any type of blog is our duty, owing to the list of blog sites that we
                            have in our database. For the same, we have fifteen outreach specialists who work manually
                            for blog outreach, of any given blog. Our main goal is to build strong relationships with
                            the bloggers blog or bloggers websites, by cooperating with each other. The main tasks are
                            analysing followers and traffics, presence of social media, domain authority analysis, and
                            metrics of Moz.
                            Our company works for big brands, top blogs, outreach agencies, partners, and also for
                            digital media. Our outreach bloggers always stand efficient in pitching, finding, engaging,
                            and following the relevant bloggers or admins.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 text-center m-auto">

                    <img src="images/freepik-img/guest-posting-imgs.png" alt="blogging" class="w-75">



                </div>

            </div>
        </div>
    </div>

    <!-- ================================================================================================ -->

    <section class="blogger-fourth-section py-md-5">
        <div class="container">
            <div class="row align-items-center m-0">
                <div class="col-lg-6 ps-0">
                    <img src="images/freepik-img/guest-posting-imgs-2.png" alt="Blogging Outreach" class="w-100">
                </div>
                <div class="col-lg-6">
                    <div class="right-ul-section">
                        <h3>Get Knowledge About Blogging Outreach:</h3>
                        <p class="mb-5">Blogging outreach is quite a simple business tactic, and sometimes it is called
                            influencer marketing. Such blog outreach services, as provided by us, help build a strong
                            connection with the genuine blogs, and other communities. </p>

                        <p>The primary goal of our blogger outreach service is to furnish genuine and quality content.
                            This further helps to promote any product, brand, blog, website and service. Promoting those
                            posts or guest blogs via social media gives an extra value. It helps in gaining more
                            popularity and traffic to your blogging websites.</p>


                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- ================================================================================================ -->

    <section class="blogger-fifth-section">
        <div class="container">
            <h3 class="blogger-fifth-section-main-head">Why to Choose Fastlinky for Blogger Outreach Service?</h3>
            <div class="row align-items-center m-0">
                <div class="col-lg-6">
                    <div class="right-ul-section">
                        <ul>
                            <li> We, at Fastlinky, have already reached and researched 10,0000 genuine high-authority
                                blogs, with different themes. </li>
                            <li> Our outreach specialists are well trained and have immense experience.</li>
                            <li> We render your post promotions through social media remarks and mentions.</li>
                            <li> We provide Manual outreach service and daily research available. </li>
                            <li> We give quality outbound links from high authority websites of your post, that will
                                further gain credibility.</li>
                            <li> Our specialists have the ability to provide you with precious links, within viewpoints.
                            </li>
                            <li> We have the Online reporting panel accessible. </li>
                            <li>Online reporting panel accessible.</li>
                            <li>Our experts examine overall the blogs to give you better links. </li>
                            <li>We update bloggers database regularly to maintain SEO metrics. </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 pe-0 m-auto text-center">
                    <img src="images/freepik-img/guest-posting-why-choose.png" alt="Blogger Outreach Service"
                        class="w-75">
                </div>
            </div>
        </div>
    </section>

    <!-- ================ Regester Now Section Start ================ -->
    <?php require_once "partials/reg-now.php"; ?>
    <!------------------- Regester Now Section End ------------------->


    <!-- ================================================================================================ -->

    <section class="native-content-section">

        <div class="leelija-gp-service-head">
            <h3>Why Choose Fastlinky for Guest Posts Services?</h3>
        </div>
        <div class="container">
            <div class="row align-items-center m-0">

                <div class="col-lg-6">
                    <img src="images/freepik-img/guest-posting-imgs-3.png" alt="Guest Posts Services" class="w-100">
                </div>

                <div class="col-lg-6">
                    <h3 class="native-content">White Label Guest Post Service</h3>
                    <p class="native-content-p">If you are an agency, you will get a white-labelled report that includes
                        the URL of the article used for link placements and the domain metrics will be sent within 15
                        days. Though we build the links, they remain your property.</p>
                </div>



            </div>

        </div>
    </section>

    <!-- ================================================================================================ -->

    <section class="native-content-section">
        <!-- line seprator for divisions   -->
        <section class="hr-seprator-css">
            <hr class="separator separator--line" />
            <hr class="separator separator--dots" />
        </section>
        <!-- line seprator for divisions   -->
        <div class="leelija-gp-service-head">
        </div>
        <div class="container">
            <div class="row align-items-center m-0">



                <div class="col-lg-6">
                    <h3 class="native-content">Tried and Tested Result Oriented Approach for Maximum ROI</h3>
                    <p class="native-content-p">Our strategies ensure to give the best result by boosting your reach
                        organically. We adhere to the Tried & Tested Result Oriented Approach, which further ensures
                        maximum ROI. We also look after what should be practiced and what should be avoided, in order to
                        enhance your returns on investment. One of the main reasons behind it is the ‘links and guests’,
                        which we have with us onboard, at Fastlinky. These things are assured by us, while envisaging
                        the
                        maximum ROI-</p> <br>


                    <ul>
                        <li><i class="far fa-check-circle"></i> Relevance of Blogs</li>
                        <li><i class="far fa-check-circle"></i> Related Niche Websites for Guest posting</li>
                        <li> <i class="far fa-check-circle"></i>Quality of the content</li>
                        <li> <i class="far fa-check-circle"></i>Traffic of the website</li>
                        <li> <i class="far fa-check-circle"></i>Relevant suggestions </li>
                    </ul>

                </div>
                <div class="col-lg-6">
                    <img src="images/freepik-img/guest-posting-roi.png"
                        alt="guest post approach" class="w-100">
                </div>
            </div>

        </div>
    </section>
    <!-- line seprator for divisions   -->
    <section class="hr-seprator-css">
        <hr class="separator separator--line" />
        <hr class="separator separator--dots" />
    </section>
    <!-- line seprator for divisions   -->
    <!-- ================================================================================================ -->

    <section class="native-content-section pt-5">

        <div class="container">
            <div class="row align-items-center m-0">
                <div class="col-lg-6">
                    <img src="images/freepik-img/guest-posting-imgs-4.png" alt="Native Content" class="w-100">
                </div>
                <div class="col-lg-6">
                    <h3 class="native-content">Native Content</h3>
                    <p class="native-content-p">Our native writers take the baton and come up with top quality content
                        with your backlinks weaved naturally into the material. Once written, it passes through
                        two-steps of quality check.</p>
                </div>



            </div>

        </div>
    </section>

    <!-- ================================================================================================ -->

    <section class="native-content-section">

        <div class="leelija-gp-service-head">
            <!-- line seprator for divisions   -->
            <section class="hr-seprator-css">
                <hr class="separator separator--line" />
                <hr class="separator separator--dots" />
            </section>
            <!-- line seprator for divisions   -->
        </div>
        <div class="container">
            <div class="row align-items-center m-0">



                <div class="col-lg-6">
                    <h3 class="native-content">Your No-Hassle Solution</h3>
                    <p class="native-content-p">The work given to us makes sure to have less burden on your part. You
                        will technically have least worries regarding your blog outreach, as we put enough importance
                        on-

                    <ul>
                        <li> <i class="far fa-check-circle"></i>Superior Quality</li>
                        <li> <i class="far fa-check-circle"></i> Affordable Service</li>
                        <li> <i class="far fa-check-circle"></i> Quick Turnaround Time</li>
                        <li> <i class="far fa-check-circle"></i> Risk-Free SEO</li>
                        <li><i class="far fa-check-circle"></i>Relevant Guest Linking</li>
                    </ul><br>



                    Considering all these, we, at Fastlinky, are the ultimate No-Hassle Solution for you, owing to our
                    stream-lined process of Outreaching your services.
                    </p>
                </div>

                <div class="col-lg-6">
                    <img src="images/freepik-img/guest-posting-imgs8.png" alt=" Guest Linking solution" class="w-100">
                </div>

            </div>

        </div>
    </section>

    <!-- ================================================================================================ -->
    <div class="leelija-gp-service-head">
        <!-- line seprator for divisions   -->
        <section class="hr-seprator-css">
            <hr class="separator separator--line" />
            <hr class="separator separator--dots" />
        </section>
        <!-- line seprator for divisions   -->
    </div>
    <section class="native-content-section ">

        <div class="container">
            <div class="row align-items-center m-0">
                <div class="col-lg-6">
                    <img src="images/freepik-img/guest-posting-imgs-7.png " alt="Real Sites" class="w-100">
                </div>

                <div class="col-lg-6">
                    <h3 class="native-content">Powerful Links From Real Sites</h3>
                    <p class="native-content-p">All the links that are undoubtedly going to be posted on the best sites
                        for blogging, will also be having 100% efficient traffic on their website. This happens at
                        Fastlinky, without fail. Secondly, the backlinking will be made in such a manner and will be
                        containing perfectly anchored texts, that your future affiliations will become the strongest. So
                        at Fastlinky, you get only Powerful Links from Real Sites.</p>
                </div>


            </div>

        </div>
    </section>

    <!-- ================================================================================================ -->

    <!-- line seprator for divisions   -->
    <section class="hr-seprator-css">
        <hr class="separator separator--line" />
        <hr class="separator separator--dots" />
    </section>
    <!-- line seprator for divisions   -->

    <section class="native-content-section">
        <div class="container">
            <div class="row align-items-center m-0">


                <div class="col-lg-6">
                    <h3 class="native-content">No PBNs Is Our Motto, And We Stick By It</h3>
                    <p class="native-content-p">

                        You get No PBN or Private Blogging Networks from us at Fastlinky. A lot of guest posting
                        services
                        fake their clients on this part. For your kind information, let us make you aware of the fact
                        that Google policies are strictly against PBN’S. But at Fastlinky, we swear on the core of each
                        and every detailed work given by us, to never go through these PBN’s. So be rest assured, as ‘NO
                        PBN’s’ is our primary and ultimate aim.
                    </p>
                </div>
                <div class="col-lg-6">
                    <img src="images/freepik-img/guest-posting-no-pbns.png" alt="PBNs sites" class="w-100">
                </div>
            </div>
        </div>
    </section>

    <!-- ================================================================================================ -->

    <section class="link-building-strategy-sec">

        <div class="container">
            <h3 class="link-building-strategy-head">Most Scalable Link Building Strategy</h3>
            <div class="row">

                <div class="col-sm-6">

                    <!-- <p>The size or requirement of the order doesn’t matter as we can manage your blogger outreach orders effectively with quick and sustainable SEO benefits.</p> -->

                    <div class="link-building-items">

                        <ul>
                            <li>
                                <i class="fas fa-check-circle"></i>
                                <p>If you are a business owner, and look up to boost your website ranking high, need not
                                    to
                                    worry, we can take up the challenge in your business favour.</p>
                            </li>
                            <li>
                                <i class="fas fa-check-circle"></i>

                                <p> Don’t worry about your top competitors, we will provide effective solutions to rack
                                    up
                                    your oppositions.</p>

                            </li>
                            <li>

                                <i class="fas fa-check-circle"></i>

                                <p>Guest posts help you to boost your service pages, by doing so one can assists own
                                    site’s
                                    pages rank higher in search engine.</p>

                            </li>
                        </ul>

                    </div>
                </div>
                <div class="col-sm-6">

                    <img src="images/freepik-img/guest-posting-imgs-6.png" alt="link buiding" class="w-100">

                </div>
            </div>
        </div>

    </section>

    <!-- ================================================================================================ -->

    <section class="benefits-of-choosing-sec">

        <div class="benefits-of-choosing">
            <h3 class="benefits-of-choosing-head">Benefits of Choosing Fastlinky</h3>
            <div class="container">
                <div class="row">

                    <div class=" col-sm-6 col-md-6 col-12 col-lg-4">

                        <div class="affordable-pricing">
                            <p class="affordable-pricing-icon"><i class="far fa-money-bill-alt"></i></p>
                            <h5>Affordable Pricing</h3>
                                <p class="affordable-pricing-details">
                                    You get the most affordable guest posting services from us, at Fastlinky. We give
                                    you
                                    a customised package for your own, if the prices seem to be unfit to you. The work
                                    delivered by us will be ensuring all the money you have spent.
                                </p>
                        </div>

                    </div>

                    <div class=" col-sm-6 col-md-6 col-12 col-lg-4">

                        <div class="affordable-pricing">
                            <p class="affordable-pricing-icon"><i class="fas fa-certificate"></i></p>
                            <h5> Superior Quality </h5>
                            <p class="affordable-pricing-details">
                                Perfectly anchored text, content written by experienced and native writers, well
                                proofread write-ups, well-researched inputs, and market/trend-friendly work on the
                                paper, is our prime attribute. Stay assured for the quality of work, that you will be
                                getting at Fastlinky.
                            </p>
                        </div>

                    </div>

                    <div class=" col-sm-6 col-md-6 col-12 col-lg-4">

                        <div class="affordable-pricing">
                            <p class="affordable-pricing-icon"><i class="fas fa-cogs"></i></p>
                            <h5>Seamless Process</h5>
                            <p class="affordable-pricing-details">
                                Our venture promises to work on a seamless process, which has ultimately resulted in
                                bringing happiness amongst thousands of other businesses. Each and every work done is in
                                a seamless manner; starting from doing the research for the content, till proper linking
                                of that blog for guest posting.
                            </p>
                        </div>

                    </div>

                    <div class=" col-sm-6 col-md-6 col-12 col-lg-4">

                        <div class="affordable-pricing">
                            <p class="affordable-pricing-icon"><i class="fas fa-stopwatch"></i></p>
                            <h5>On-Time Delivery</h3>
                                <p class="affordable-pricing-details">
                                    The best part about Fastlinky is the turnaround time. We are efficient and equally
                                    punctual at rendering our works. You get all your works on time, as we clearly
                                    evaluate the essence of time of our clients.
                                </p>
                        </div>

                    </div>

                    <div class=" col-sm-6 col-md-6 col-12 col-lg-4">

                        <div class="affordable-pricing">
                            <p class="affordable-pricing-icon"><i class="fas fa-check"></i></p>
                            <h5> Trusted by 5000+ </h5>
                            <p class="affordable-pricing-details">
                                Join us by getting our service, and become satisfied by our service, like 10000+ others.
                                The impression that Fastlinky leaves is impeccable, as quoted by many of our clients.
                                The
                                ultimate arrangement and working agenda of our team is so result-oriented, that
                                Fastlinky
                                has won the trust of many.
                            </p>
                        </div>

                    </div>

                    <div class=" col-sm-6 col-md-6 col-12 col-lg-4">

                        <div class="affordable-pricing">
                            <p class="affordable-pricing-icon"><i class="far fa-money-bill-alt"></i></p>
                            <h5>Money-Back Guarantee</h5>
                            <p class="affordable-pricing-details">
                                If at all you feel like not being satisfied by our work, we assure you to restore the
                                amount taken by you. It is because we believe in client satisfaction, and not solely to
                                do business. So stay rest assured to have your money-back, if you feel like our service
                                doesn't satisfy you.</p>
                        </div>

                    </div>

                </div>
            </div>
        </div>

    </section>

    <!-- ================================================================================================ -->

    <section class="risk-free-sec">

        <div class="risk-free">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 m-auto ps-0">
                        <img src="images/freepik-img/guest-posting-seo-img.png" alt="Risk-Free SEO Service"
                            class="w-75">
                    </div>
                    <div class="col-sm-6">
                        <h4 class="risk-free-head">
                            100% Risk-Free SEO Service
                        </h4>
                        <div class="risk-free-content">

                            <p>We make promises to give the best SEO services to our client. Don’t worry, your valuable
                                money is safe with us until we make you happy.</p>
                            <p>Buying an SEO service from Fastlinky, remember you are covered under safe hands. </p>
                            <p> If you are not satisfied with our work, no worry we assure 100% money-back guarantee.
                            </p>
                            <p>We understand the value of your hard-earned money.</p>
                            <p>As a responsible organization, we are committed to give you 100% money-back if we fail to
                                make our deal fulfill as promised.</p>
                            <p>
                                Sincerely,<br>
                                <span class="cEo">
                                    <span> Safikul Islam </span><br>
                                    CEO, Fastlinky.
                                </span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <!-- ================================================================================================ -->


    <div class="blogger-third-section">
        <div class="container text-center">
            <h2>Drive Good Results for Your Website</h2>
            <div class="row">
                <div class="col-md-12">
                    <p>We have experience team of blogging outreach experts who help to get in touch with quality blogs.
                        And we can strongly say that we provide one of the best services in this line of work. We have
                        knowledge of work trained team, influential relationship with bloggers and manual blogging
                        outreach services. </p>
                </div>

            </div>
        </div>
    </div>
    <!-- ================================================================================================ -->

    <!-- ================================================================================================= -->
    <!-- Frequently Asked Questions starts -->
    <!-- ================================================================================================ -->
    <!-- new faq for indexpage -->

    <?php require_once "partials/faqs-new.php"; ?>

    <!-- ================================================================================================= -->
    <!-- Frequently Asked Questions ends -->
    <!-- ================================================================================================ -->
    <!-- ================================================================================================ -->
    <!-- seller action page -->
    <div class="mt-4">
        <?php include_once 'partials/seller-action.php'; ?>
    </div>
    <!-- seller action page ends -->
    <!-- ====================================================================== -->
    <!-- Footer -->
    <?php require_once "partials/footer.php"; ?>
    <!-- Footer -->
    <script src="js/jquery-2.2.3.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function() {
        $("select").change(function() {
            var crntSel = $(this).val();
            var crntSec = $(this).parents().parents().parents().children('.package-purchase-btn').css(
                'background', '#1E80C0').css('color', 'white');
        });

        $(".package-purchase-btn").click(function() {
            var nicheV = $(this).parents().attr('id');
            var niche = "#" + nicheV + "";
            var currentNiche = $(niche).children('.price-box-ul').children('li').children(
                '.select-niche').val();

            if (currentNiche == '' || currentNiche == null) {
                $(niche).children(".chooseNiche").html("Please Choose a Niche");
            } else {
                window.location.href = 'package-order.php?package-type=' + nicheV + '&niche=' +
                    currentNiche;
            }

        })
    })
    </script>
    <script src="plugins/bootstrap-5.2.0/js/bootstrap.js"></script>

</body>

</html>