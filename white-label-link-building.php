<?php
session_start();
require_once("includes/constant.inc.php");

require_once ROOT_DIR."/_config/dbconnect.php";
require_once ROOT_DIR."/_config/dbconnect.trait.php";

require_once ROOT_DIR."/classes/date.class.php";
require_once ROOT_DIR."/classes/customer.class.php";

//require_once("../classes/front_photo.class.php");
require_once ROOT_DIR."/classes/gp-package.class.php";
require_once ROOT_DIR."/classes/utility.class.php";
require_once ROOT_DIR."/classes/faqs.class.php";


/* INSTANTIATING CLASSES */
$dateUtil       = new DateUtil();
$GPPackage      = new GuestPostpackage();
$customer		= new Customer();
$utility		= new Utility();
$faqs		    = new faqs();
######################################################################################################################
$typeM		= $utility->returnGetVar('typeM','');
//user id
$cusId		= $utility->returnSess('userid', 0);


$packages = $GPPackage->packDetailsByCat(2);


?>

<!DOCTYPE HTML>
<html lang="zxx">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> White Label Link Building Service for SEO agencies and Resellers - <?php echo COMPANY_S; ?></title>
    <link rel="shortcut icon" href="<?php echo FAVCON_PATH?>" type="image/png" />
    <link rel="apple-touch-icon" href="<?php echo FAVCON_PATH?>" />
    <meta name="description"
        content="With Fastlinky's high-dominance White Label Link Building Service for SEO agencies & Resellers you will get outstanding backlinks. It will help you get the desired search engine rankings. " />
    <meta name="keywords"
        content="Guest Post, Guest Posting,Guest Post Service, blogger outreach, guest posting services, guest posting blogs, fashion blogs, beauty blogs, health blogs, travel blogs, fitness blogs, tech blogs, home improvement blogs, CBD blogs, Casino Blogs" />


    <!-- <link href="css/bootstrap.css" rel='stylesheet' type='text/css' /> -->
    <link rel="stylesheet" href="plugins/bootstrap-5.2.0/css/bootstrap.css">
    <link rel="stylesheet" href="plugins/fontawesome-6.1.1/css/all.css">
    <!-- Custom CSS -->
    <link href="css/leelija.css" rel='stylesheet' type='text/css' />
    <link href="css/style.css" rel='stylesheet' type='text/css' />
    <link href="css/guest-post-offer.css" rel='stylesheet' type='text/css' />
    <link href="css/white-label-link-building.css" rel='stylesheet' type='text/css' />
    <link rel="stylesheet" href="css/testimonials.css">


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
    <!-- starting of white lebel links building main banner    -->
    <section class="white_lebel_link_banner">
        <div class="container bo-main-cntr">
            <div class="row blog-1main-row">

                <div class="col-12 col-lg-5 col-md-5  p-0">
                    <div class="bo-wrap p-0">
                        <img src="./images/white-label-link-building.png" class="w-100" alt="">
                    </div>

                </div>
                <div class="d-flex flex-column justify-content-center  col-12 col-lg-7 col-md-7  px-0 px-md-4">
                    <div class="bo-wrap">
                        <h1 class="blogout-main-h1">White Label Link Building Services </h1>
                        <p class=" mt-3 mb-4 py-0 py-md-2 white-lebel-main-p">Fast Linky works with a lot
                            of
                            business leaders as the background partner in white label link building for delivering
                            results to our eminent clients.
                        </p>
                        <div class=" buttonsinfo ">
                            <a href="#pricing-cards">
                                <button type="button" class="btn blogger-btn ">See Pricing</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end of white lebel links building main banner -->
    <!-- --------------------------------------------------------------------------------------------- -->


    <!--Banner Dividor-->
    <?php //include ('quote.php') ?>
    <!--/End of baneer Dividor-->

    <!-- ______________________________________________________________________________________________ -->

    <!-- trustworthy-white-lebel-section start -->
    <section class="trustwhite-section">
        <div class="row  real-bo-row1">
            <div class="col-lg-6 col-md-6 real-bo-col-first">
                <div>
                    <h1 class="trustworthy-white-lebel-text-h1">Trustworthy Link Building Process <span> For You And
                            Your
                            Clients</span> </h1>
                </div>
                <div>
                    <div class="py-4">
                        <div class="real-bo-secondcol-div1">
                            <div class=" px-3 trustworthy-img-div">
                                <img src="./images/dummy-img/real-bo-ul-li-1.png" class="real-bo-second-ul-li-img"
                                    alt="">
                            </div>
                            <div class=" lbp-texting">
                                Collect do follow the editorial links for clients. The link should be <b> indexable
                                    and unique.</b>
                            </div>
                        </div>
                        <div class="real-bo-secondcol-div1">

                            <div class=" px-3 trustworthy-img-div">
                                <img src="./images/dummy-img/real-bo-ul-li-2.png" class="real-bo-second-ul-li-img"
                                    alt="">
                            </div>
                            <div class=" lbp-texting">
                                Our expert checks all the insert links carefully <b>to avoid any kind of duplicate
                                    links.</b>
                            </div>
                        </div>
                        <div class="real-bo-secondcol-div1">
                            <div class=" px-3 trustworthy-img-div">
                                <img src="./images/dummy-img/real-bo-ul-li-1.png" class="real-bo-second-ul-li-img"
                                    alt="">
                            </div>
                            <div class=" lbp-texting">
                                Our own expert writers create <b>industry-relevant</b> but non-promotional content.
                            </div>
                        </div>
                        <div class="real-bo-secondcol-div1 mb-3">
                            <div class=" px-3 trustworthy-img-div">
                                <img src="./images/dummy-img/real-bo-ul-li-3.png" class="real-bo-second-ul-li-img"
                                    alt="">
                            </div>
                            <div class=" lbp-texting">
                                We follow the <b> business guidelines</b> strictly.
                            </div>
                        </div>

                    </div>

                    <div class=" buttonsinfo ">
                        <a href="#pricing-cards">
                            <button type="button" class="btn blogger-btn">Get Your Links Now</button>
                        </a>
                    </div>
                </div>

            </div>
            <div class="col-lg-6 col-md-6 real-bo-col-second">
                <div class="text-center">
                    <img src="./images/process-showing-fastlinky.png" class="w-100 mb-4" alt="">
                </div>
            </div>
        </div>
    </section>

    <!-- trustworthy-white-lebel-section end -->
    <!-- _______________________________________________________________________________________________ -->

    <!--  Our Work Procedure-section start -->

    <section class="trustwhite-section wp-building1">
        <h1 class="work-procedure-white-lebel-text-h1 wp-building2">Our Work Procedure </h1>
        <div class="row  real-bo-row1">

            <div class="col-lg-6 col-md-6 real-bo-col-second">
                <div class="text-center">
                    <img src="./images/links-processing.png" class="w-75 mb-4" alt="">
                </div>
            </div>
            <div class="col-lg-6 col-md-6 real-bo-col-first">
                <div class="">

                    <div>
                        <div class="py-4">
                            <div class="real-bo-secondcol-div1">
                                <div class=" px-3 trustworthy-img-div">
                                    <img src="./images/dummy-img/real-bo-ul-li-3.png" class="real-bo-second-ul-li-img"
                                        alt="">
                                </div>
                                <div class="lbp-texting">
                                    <div>
                                        <b>Outreach Influencers : </b>
                                    </div>
                                    Expert outreach influencers researched very deeply to
                                    get relevant keywords for better conceptualizing concepts.
                                </div>
                            </div>
                            <div class="real-bo-secondcol-div1">
                                <div class=" px-3 trustworthy-img-div">
                                    <img src="./images/dummy-img/real-bo-ul-li-1.png" class="real-bo-second-ul-li-img"
                                        alt="">
                                </div>
                                <div class="lbp-texting ">
                                    <div> <b>Create Beautiful Content : </b></div>

                                    Content is the main focus. Our professional
                                    writers provide natural content that is unique readable and relevant to clients.
                                </div>
                            </div>
                            <div class="real-bo-secondcol-div1">

                                <div class=" px-3 trustworthy-img-div">
                                    <img src="./images/dummy-img/real-bo-ul-li-2.png" class="real-bo-second-ul-li-img"
                                        alt="">
                                </div>
                                <div class="lbp-texting ">
                                    <div>
                                        <b> Publish Content : </b>
                                    </div>
                                    We published that content
                                    on the
                                    perfect
                                    influencing site. The content gets high traffic and you will get your targetted
                                    audience.
                                </div>
                            </div>
                            <div class="real-bo-secondcol-div1 mb-3">
                                <div class=" px-3 trustworthy-img-div">
                                    <img src="./images/dummy-img/real-bo-ul-li-3.png" class="real-bo-second-ul-li-img"
                                        alt="">
                                </div>
                                <div class="lbp-texting ">
                                    <div><b>Special Report :</b></div>
                                    A special report on the white label progress of improvement in the website ranking
                                    on the readership, SERPs, and links will be sent to you.
                                </div>
                            </div>

                        </div>

                        <div class=" getyour-linkbtn ">
                            <a href="#pricing-cards">
                                <button type="button" class="btn blogger-btn">Get Your Links Now</button>
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </section>
    <!-- Our Work Procedure-section end -->
    <!-- ______________________________________________________________________________________________________ -->


    <!-- ================================================================================================ -->
    <!-- more information blogger outreach start -->


    <!-- contact top -->
    <!-- <?php include('more-info.php');?> -->
    <!-- //contact top -->



    <!-- more information blogger outreach ends -->
    <!-- ================================================================================================ -->
    <!-- ___________________________________________________________________________________________ -->
    <!-- testimonials customers reviews -->
    <?php require_once "partials/testimonials.php"; ?>
    <!-- testimonials customers reviews -->
    <!-- _________________________________________________________________________________________ -->
    <!-- _______________________________________________________________________________________________ -->

    <!-- What We Can Deliver-section start -->

    <section class="trustwhite-section">
        <h1 class="work-procedure-white-lebel-text-h1">What We Can Deliver?</span> </h1>
        <div class="row  real-bo-row1">

            <div class="col-lg-6 col-md-6 real-bo-col-first">
                <div class="">
                    <div>
                        <div class="py-4">
                            <div class="real-bo-secondcol-div1">
                                <div class=" px-3 trustworthy-img-div">
                                    <img src="./images/dummy-img/real-bo-ul-li-3.png" class="real-bo-second-ul-li-img"
                                        alt="">
                                </div>
                                <div class="lbp-texting">
                                    <b> White Label Services : </b> We work as behind-the-scenes partners for you. Our
                                    service on white label link building lets you take all credit. Moreover, you will be
                                    shown as the marketer.
                                </div>
                            </div>
                            <div class="real-bo-secondcol-div1">
                                <div class=" px-3 trustworthy-img-div">
                                    <img src="./images/dummy-img/real-bo-ul-li-1.png" class="real-bo-second-ul-li-img"
                                        alt="">
                                </div>
                                <div class="lbp-texting">
                                    <b>Business Growth : </b> An outsourcing service never costs you more than you earn.
                                    Therefore, you can generate more revenue while we will work for you.
                                </div>
                            </div>
                            <div class="real-bo-secondcol-div1">

                                <div class=" px-3 trustworthy-img-div">
                                    <img src="./images/dummy-img/real-bo-ul-li-2.png" class="real-bo-second-ul-li-img"
                                        alt="">
                                </div>
                                <div class="lbp-texting"><b> Quality Work : </b> Our quality is our preface. We never
                                    compromise
                                    with quality. You don’t think about it twice. Otherwise, you should keep eye on the
                                    production. Link building for your site is in safe hands.
                                </div>
                            </div>
                            <div class="real-bo-secondcol-div1 mb-3">
                                <div class=" px-3 trustworthy-img-div">
                                    <img src="./images/dummy-img/real-bo-ul-li-3.png" class="real-bo-second-ul-li-img"
                                        alt="">
                                </div>
                                <div class="lbp-texting">
                                    <b> Client Satisfaction :</b>
                                    Client satisfaction is our topmost priority. We will never try to contact your
                                    clients. Moreover, we will try to help you to create a strong bond between you and
                                    your clients by delivering superfast services.
                                </div>
                            </div>
                        </div>

                        <div class=" buttonsinfo ">
                            <a href="#pricing-cards">
                                <button type="button" class="btn blogger-btn">Get Your Links Now</button>
                            </a>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-lg-6 col-md-6 real-bo-col-second">
                <div class="text-center">
                    <img src="./images/Consulting-amico.png" class="w-75  mb-4 " alt="">
                </div>
            </div>
        </div>

    </section>
    <!-- What We Can Deliver-section end -->

    <!-- ------------------------------------------------ -->
    <!-- pricing section -->
    <!-- ------------------------------------------- -->

    <section class="mt-5">
        <h1 class="text-center pricing-bo-h1 mb-3 mt-5">White Label Link Building Pricing
        </h1>
        <p class="text-center pricing-bo-p1 mb-3">We offer blogger outreach links categorised as <br> per DA,
            DR, or organic traffic. Below is the pricing <br> for All 3 models.</p>

        <?php require_once "partials/pricing-cards.php"; ?>
    </section>

    <!-- ------------------------------------------------ -->
    <!-- pricing section ends -->
    <!-- ------------------------------------------- -->
    <!-- ______________________________________________________________________________________________________ -->

    <!--  Why Fast Linky Can Give You That Top Level? starts -->
    <section class="works-for-you-bo-section">
        <div class="">
            <div class="how-its-wrok-bo-main-div">
                <div>
                    <h2 class=" text-center mt-4 my-3 works-bo-h2">Why Fast Linky Can <span> Give You That Top
                            Level?</span></h2>
                </div>
                <div class="works-f-u-main-card-div">
                    <div class="row">
                        <div class="col-md-4 col-xl-4">
                            <div class="card  how-it-work-f-u-card">

                                <div class="pb-3 text-center text-md-start">
                                    <img src="./images/dummy-img/real-bo-ul-li-1.png" class="real-bo-second-ul-li-img"
                                        alt="">
                                </div>
                                <h4 class="how-fonts-h4 text-center text-md-start py-2">Specially Engaged Managers</h4>
                                <p class="lbp-texting">
                                    When you place your order, we assign a dedicated manager to supervise. Therefore,
                                    you got a quick response and delivery on or before time.
                                </p>

                            </div>

                        </div>

                        <div class="col-md-4 col-xl-4">
                            <div class="card how-it-work-f-u-card">

                                <div class="pb-3 text-center text-md-start">
                                    <img src="./images/dummy-img/real-bo-ul-li-2.png" class="real-bo-second-ul-li-img"
                                        alt="">
                                </div>
                                <h4 class="how-fonts-h4 text-center text-md-start py-2">Supreme Keyword Research</h4>
                                <p class="lbp-texting">
                                    We have a proficient team that picks up the trending and highest-ranking keywords
                                    for you. </p>

                            </div>

                        </div>

                        <div class="col-md-4 col-xl-4">
                            <div class="card how-it-work-f-u-card">

                                <div class=" pb-3 text-center text-md-start">
                                    <img src="./images/dummy-img/real-bo-ul-li-3.png" class="real-bo-second-ul-li-img"
                                        alt="">
                                </div>
                                <h4 class="how-fonts-h4 text-center text-md-start py-2">Zero Spam Service</h4>
                                <p class="lbp-texting">
                                    Our team never indulges in the spam policy and keeps away from PBNs. Our creative
                                    content gives good readership and popularity. </p>

                            </div>

                        </div>
                        <div class="col-md-4 col-xl-4">
                            <div class="card how-it-work-f-u-card">

                                <div class="pb-3 text-center text-md-start">
                                    <img src="./images/dummy-img/real-bo-ul-li-2.png" class="real-bo-second-ul-li-img"
                                        alt="">
                                </div>
                                <h4 class="how-fonts-h4 text-center text-md-start py-2">Existing Link Analysis</h4>
                                <p class="lbp-texting">
                                    We ensure our clients that backlinks are never repeated. Moreover, before doing
                                    outreach our expert team thoroughly checks the client’s link profile. </p>

                            </div>

                        </div>

                        <div class="col-md-4 col-xl-4">
                            <div class="card how-it-work-f-u-card">

                                <div class="pb-3 text-center text-md-start">
                                    <img src="./images/dummy-img/real-bo-ul-li-1.png" class="real-bo-second-ul-li-img"
                                        alt="">
                                </div>
                                <h4 class="how-fonts-h4 text-center text-md-start py-2">Native Professionals</h4>
                                <p class="lbp-texting">
                                    Our team of PR experts and content writers are local to UK and US. therefore, the
                                    laity of content never is compromised.
                                </p>

                            </div>

                        </div>

                        <div class="col-md-4 col-xl-4 ">
                            <div class="card how-it-work-f-u-card">

                                <div class=" pb-3 text-center text-md-start">
                                    <img src="./images/dummy-img/real-bo-ul-li-3.png" class="real-bo-second-ul-li-img"
                                        alt="">
                                </div>
                                <h4 class="how-fonts-h4 text-center text-md-start py-2">Vast database of Authentic Influencers</h4>
                                <p class="lbp-texting">
                                    We are engaged with 1000+ authentic bloggers and influencers from each industry.
                                    Therefore you will get appropriate traffics. </p>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Why Fast Linky Can Give You That Top Level? ends -->
    <!-- ____________________________________________________________________________________________________ -->


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

    <!-- _______________________________________________________________________________________________ -->

    <!-- What Makes Us Special In This Category-section start -->

    <section class="trustwhite-section">
        <h1 class="work-procedure-white-lebel-text-h1">What Makes Us Special In This Category? </h1>
        <div class="row  real-bo-row1">

            <div class="col-lg-6 col-md-6 real-bo-col-second">
                <div class="">
                    <div>
                        <img src="./images/searching-fastlinky-image.png" class="w-75 mb-4" alt="">
                    </div>

                </div>
            </div>
            <div class="col-lg-6 col-md-6 d-flex flex-column justify-content-center real-bo-col-first">
                <div class="py-4">
                    <div class="real-bo-secondcol-div1">
                        <div class=" px-3 trustworthy-img-div">
                            <img src="./images/dummy-img/real-bo-ul-li-3.png" class="real-bo-second-ul-li-img" alt="">
                        </div>
                        <div class="lbp-texting">
                            <b> Customization in Price Range on bulk orders. </b> We genuinely care for your
                            brand, and that’s why we provide customized prices on several occasions.
                        </div>
                    </div>
                    <div class="real-bo-secondcol-div1">
                        <div class=" px-3 trustworthy-img-div">
                            <img src="./images/dummy-img/real-bo-ul-li-1.png" class="real-bo-second-ul-li-img" alt="">
                        </div>
                        <div class="lbp-texting">
                            We Work as your <b>outsourcing partner.</b> After placing the order, we will handle
                            all work. For instance, from generating content to publishing it on the website.
                        </div>
                    </div>
                    <div class="real-bo-secondcol-div1">

                        <div class=" px-3 trustworthy-img-div">
                            <img src="./images/dummy-img/real-bo-ul-li-2.png" class="real-bo-second-ul-li-img" alt="">
                        </div>
                        <div class="lbp-texting"> <b>Client satisfaction</b> is our topmost priority. We are
                            ready to help you at any time. Your client will be never disappointed.
                        </div>
                    </div>


                </div>

                <div class=" getyour-linkbtn ">
                    <a href="#pricing-cards">
                        <button type="button" class="btn blogger-btn">Get Your Links Now</button>
                    </a>
                </div>

            </div>
        </div>

    </section>
    <!-- What Makes Us Special In This Category-section end -->
    <!-- ______________________________________________________________________________________________________ -->

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
    <!-- footer ends -->
    <script src="js/jquery-2.2.3.min.js"></script>
    <script src="plugins/bootstrap-5.2.0/js/bootstrap.js"></script>

</body>

</html>