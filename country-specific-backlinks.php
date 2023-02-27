<?php
session_start();
require_once "includes/constant.inc.php";

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

$packages = $GPPackage->packDetailsByCat(5);

?>
<!DOCTYPE HTML>
<html lang="zxx">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Country Specific Backlinks , Blogger Outreach - <?php echo COMPANY_S; ?></title>
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
    <link href="css/country-specific-backlinks.css" rel='stylesheet' type='text/css' />
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
    <!-- Link Insertion Services main banner starting -->
    <section class="country-specific-main-banner">
        <div class="row ">
            <div class="col-12 col-lg-6 px-0 col-md-5 ">
                <div class="">
                    <img src="./images/freepik-img/multilingual-website-setup.png" class="w-100" alt="">
                </div>
            </div>
            <div class="col-12 col-lg-6 col-md-7  px-0 px-md-4">
                <div class="">
                    <h1 class="country-specific-banner-h1">International Multilingual Country-Specific Backlinks</h1>
                    <p class=" mt-3 mb-4 py-0 py-md-2 country-specific-banner-p">Country-specific link building for
                        broader reach and more clear visibility of your website.
                    </p>
                    <div class=" buttonsinfo mt-5">
                        <a href="#pricing-cards">
                            <button type="button" class="btn blogger-btn ">See Pricing</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end of Link Insertion Service main banner -->
    <!-- --------------------------------------------------------------------------------------------- -->
    <!-- _______________________________________________________________________________________________ -->
    <!-- Reach your audience globally and boost your website’s  start -->
    <!-- -------------------------------------------------------------------------------- -->
    <section class="reach-your-audience-globally-section">
        <div class="row ">
            <div class="col-lg-6 col-md-6">
                <div>
                    <h1 class="mb-5">Reach your audience globally and boost your website’s online visibility all over
                        the world with our expert country-specific link-building services.
                    </h1>
                </div>
                <div class="">
                    <p>
                        Reaching your casino website at the top of organic search results is not a cup of tea for
                        seeing the market competition. However, if you take the right steps towards link buildings
                        can add extra sparkling to get online success and push towards far ahead. Our expert team
                        provides high-quality online gaming link-building services that guaranteed quick and
                        endurable results for ambitious online gambling and casino companies
                    </p>
                    <p>Online gaming link-building services and conventional link-building services are totally
                        different from each other. Because the iGaming link building is a different but challenging
                        platform. However, the casein o marketplace is very competitive. Therefore, you need the
                        help of link-building services to remain in the market or go ahead of your competitors in
                        the search engine ranking market.
                    </p>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 m-auto">
                <div>
                    <img src="./images/freepik-img/country-spc-research.png" class=" w-100  mb-4 " alt="">
                </div>
            </div>
            <div class=" buttonsinfo mt-3">
            <a href="#pricing-cards">
                <button type="button" class="btn blogger-btn ">Get Your Links Now</button>
              </a>
            </div>
        </div>
    </section>
    <!-- --------------------------------------------------------------------------------------------- -->
    <!-- Reach your audience globally and boost your website’s  end -->
    <!-- _______________________________________________________________________________________________ -->
    <!-- Why Country-Specific Link Buildings? starts -->
    <!-- __________________________________________________________________________________________ -->
    <section class="why-country-specific-link-section">
        <h2>Why Country-Specific Link Buildings?</h2>
        <div class="row m-0">
            <div class="col-md-4 col-xl-4">
                <div class="why-country-specific-link-card-div">
                    <div class=" img-country-div">
                        <img src="./images/dummy-img/country-specific-hover-1.webp" class="w-100" alt="">
                    </div>
                    <h4>Broader Reach Of Business</h4>
                    <p>
                        Position your brand to the new world of authentic customers from all over the world through your
                        search engine rankings improving.</p>
                </div>
            </div>
            <div class="col-md-4 col-xl-4">
                <div class="why-country-specific-link-card-div">
                    <div class="img-country-div">
                        <img src="./images/dummy-img/country-specific-hover-2.webp" class="w-100" alt="">
                    </div>
                    <h4>International Presence</h4>
                    <p>
                        Take your business website to the top of the queries of search engine ranking all over the
                        world.</p>
                </div>
            </div>
            <div class="col-md-4 col-xl-4">
                <div class="why-country-specific-link-card-div">
                    <div class="img-country-div">
                        <img src="./images/dummy-img/country-specific-hover-3.webp" class="w-100" alt="">
                    </div>
                    <h4>Multilingual Content Publication</h4>
                    <p>Our outreach blogging expert creates multilingual content for helping clients to do diverse
                        business across the world. </p>
                </div>
            </div>
        </div>
    </section>
    <!-- ---------------------------------------------------------------------- -->
    <!-- Why Country-Specific Link Buildings? ends -->
    <!-- ................................................................... -->


    <!-- ------------------------------------------------ -->
    <!-- pricing section -->
    <!-- ------------------------------------------- -->

    <section class="mt-5">
        <h1 class="text-center pricing-bo-h1 mb-3 px-2 mt-5">Country-Specific Outreach Pricing
        </h1>
        <p class="text-center pricing-bo-p1 mb-3">We offer blogger outreach links categorised as <br> per DA,
            DR, or organic traffic. Below is the pricing <br> for All 3 models.</p>

        <?php require_once "partials/pricing-cards.php"; ?>
    </section>

    <!-- ------------------------------------------------ -->
    <!-- pricing section ends -->
    <!-- ------------------------------------------- -->

    <!-- __________________________________________________________________________________________ -->
    <!-- how it works section starts -->
    <!-- --------------------------------------------------------------------------------------------->
    <section class="how-itsworks-casino-section">
        <div class="how-itsworks-main-div-casino">
            <h1>
                How <strong>Does It Work</strong>
            </h1>
            <p>
                It is not an unknown fact that link building is the most essential factor of a perfect SEO movement. On
                the other hand, country-specific link building enhances it to a higher step for improving the online
                presence in the international market. Our expert team always keep stable and suitable relationship with
                a different international website without any language barrier. That is how we make our clients happy in
                international link outreach.
            </p>
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="text-center text-sm-start">
                        <img src="./images/dummy-img/real-bo-ul-li-1.png" class="" alt="">
                    </div>
                    <h3>Research</h3>
                    <div class="text-start mb-5">
                        Our expert niche relevant team thoroughly researches your website, industry, and competitor.
                        After that, they make the strategy of which country to target and the best keyword for ideal
                        placements search rankings.
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="text-center text-sm-start ">
                        <img src="./images/dummy-img/real-bo-ul-li-2.png" class="" alt="">
                    </div>
                    <h3>Outreach</h3>
                    <div class="text-start mb-5">
                        We at Fast Linky build strong relationships with different international bloggers and
                        influencers
                        for gaining high authority guest post service. We assure our client that the placement of the
                        link will purely be based on the target-oriented country and with respectable organic traffic
                        per month.
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="text-center text-sm-start ">
                        <img src="./images/dummy-img/real-bo-ul-li-3.png" class="" alt="">
                    </div>
                    <h3>Multi-Lingual Content</h3>
                    <div class="text-start mb-5">
                        Our expert outreach team works with prominent writers who create well-readable and multi-langual
                        content for link-building posts.
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="text-center text-sm-start ">
                        <img src="./images/dummy-img/real-bo-ul-li-1.png" class="" alt="">
                    </div>
                    <h3>Publishing & Reporting</h3>
                    <div class="text-start mb-5">
                        Fast Linky ensures its clients that they will get sustainable and long-term results with
                        multilingual links across the world. Our writers create niche-relevant content and insert anchor
                        links and anchor text flawlessly. We also offer details reporting of our full work process.
                        That’s why our whole ok remains fully transparent.
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- -=----------------------------------------------------------------------------------------------- -->
    <!-- how it works section ends -->
    <!-- _______________________________________________________________________________________________ -->
    <!-- _______________________________________________________________________________________________ -->
    <!-- Advantages Of Link Insert start -->
    <section class="country-specific-international-section">
        <div class="row">
            <div class="col-xl-6 col-md-6 ">
                <h2 class="country-specific-international-section-h2 mb-3 mt-4">
                    What Is Our Offer In <br> <span>International Multilingual Link Outreach?</span>
                </h2>
                <div class="text-center">
                        <img src="./images/freepik-img/country-reach-outreach.png" class=" w-75  mb-4 " alt="">
                </div>
            </div>
            <div class=" col-xl-6 col-md-6">

                <div class="actually-card-div1">
                    <div class="  actually-card-inn-img-div">
                        <img src="./images/dummy-img/real-bo-ul-li-1.png" class="managed-page-second-ul-li-img" alt="">
                    </div>
                    <div class="lbp-texting">
                        <b>Publisher Selection</b>
                        Perfect selection of link placements that easily goes with promoted products or services.
                        Moreover, we help clients to get the target audience within the budget range.
                    </div>
                </div>
                <div class="actually-card-div1">
                    <div class="  actually-card-inn-img-div">
                        <img src="./images/dummy-img/real-bo-ul-li-2.png" class="managed-page-second-ul-li-img" alt="">
                    </div>
                    <div class="lbp-texting">
                        <b>Publisher Outreach</b>
                        Directly communicate and outreach to preferred publishers in their native languages without any
                        intermediaries.
                    </div>
                </div>
                <div class="actually-card-div1 ">
                    <div class="  actually-card-inn-img-div">
                        <img src="./images/dummy-img/real-bo-ul-li-3.png" class="managed-page-second-ul-li-img" alt="">
                    </div>
                    <div class="lbp-texting">
                        <b>Multilingual Content Creation</b>
                        Highly impactful, perfectly SEO-optimized multilingual content from our expert native writers.
                    </div>
                </div>
                <div class="actually-card-div1">
                    <div class="  actually-card-inn-img-div">
                        <img src="./images/dummy-img/real-bo-ul-li-1.png" class="managed-page-second-ul-li-img" alt="">
                    </div>
                    <div class="lbp-texting">
                        <b>Detailed Reporting</b> We offer full details of our work process that contains progression of
                        published links.
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Advantages Of Link Insert ends -->
    <!-- _________________________________________________________________________________________________ -->
    <!-- ================================================================================================ -->
    <!-- more information link-building start -->

    <!-- contact top -->
    <!-- <?php include('more-info.php');?> -->
    <!-- //contact top -->

    <!-- more information link-building ends -->
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

    <!-- Footer -->
    <?php require_once "partials/footer.php"; ?>
    <!-- /Footer -->

    <script src="js/jquery-2.2.3.min.js"></script>
    <script src="plugins/bootstrap-5.2.0/js/bootstrap.js"></script>

</body>

</html>