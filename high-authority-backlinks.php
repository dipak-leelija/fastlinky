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


$packages = $GPPackage->packDetailsByCat(4);

?>
<!DOCTYPE HTML>
<html lang="zxx">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>High Authority Backlinks , Blogger Outreach - <?php echo COMPANY_S; ?></title>
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
    <link href="css/high-authority-backlinks.css" rel='stylesheet' type='text/css' />
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
    <!-- High Authority Backlinks main banner starting -->
    <section class="managed-link-building-main-banner">
        <div class="container mlb-main-cntainer">
            <div class="row mlb-main-start-row">
              
                <div class="col-12 col-lg-6 col-md-7  px-0 px-md-4">
                    <div class="d-flex flex-column justify-content-start mlb-wrapping">
                        <h2>Power Links</h2>
                        <h1 class="mlb-starting-main-h1">High Authority Backlinks Service </h1>
                        <p class=" mt-5 mb-4 py-0 py-md-2 mlb-starting-main-p">We have a huge database of manually
                            handpicked high-quality backlinks from authentic websites. We can offer every kind of
                            niche-relevant website. We made a strong connection with thousands of authentic site owners.
                            And that ensures you will get the relevant site of your domain.
                        </p>

                        <div class=" buttonsinfo ">
                        <a href="#pricing-cards">
                            <button type="button" class="btn managed-link-btn ">View Pricing</button>
                          </a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-6 col-md-5 vid-col">
                    <div class="d-flex flex-column justify-content-center">
                        <img src="./images/link-pushing.png " class="w-100" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end of High Authority Backlinks main banner -->
    <!-- --------------------------------------------------------------------------------------------- -->
    <!-- _______________________________________________________________________________________________ -->
    <!-- Backlinks From  High Authority And High Traffic Website start -->

    <section class="lbs-actually-matters-main">
        <div class="row">

            <div class=" col-xl-6 col-md-6">
                <h1 class="lbs-actually-matters-main-h1 ">Backlinks From <br>
                    <span>High Authority And High Traffic Website</span>
                </h1>


                <p><b> Fast Linky </b>will take your site to a higher standard. Our expert team collaborates with
                    high-quality sites
                    if they found the site will be beneficial for our eminent clients. The expert outreach team checked
                    every site thoroughly to ensure the site will be genuine with high traffic and excellent readership.
                    Moreover, as we are handpicking each site, we are getting information about the site’s negative
                    points. For instance, if any place has poor content quality, inbound link metrics, or spam links on
                    the post and traffic sources from a foreign country. These are the most essential points we have to
                    steer clear on the link-building times. Therefore we help our clients to save from these.</p>



                <div class=" buttonsinfo mt-3">
                <a href="#pricing-cards">
                    <button type="button" class="btn managed-link-btn ">Get Your Links Now</button>
                </a>
                </div>
            </div>
            <div class="col-xl-6 col-md-6 m-auto">
                <div class="text-center">
                    <img src="./images/boost-blog.png" class="w-75  mb-4 " alt="">
                </div>
            </div>
        </div>

    </section>
    <!-- Backlinks From High Authority And High Traffic Website ends -->
    <!-- _________________________________________________________________________________________________ -->
    <!-- _______________________________________________________________________________________________ -->
    <!-- Relevant Topics, Value Adding Content- start -->

    <section class="lbs-actually-matters-main">
        <div class="row">
            <div class="col-xl-6 col-md-6 m-auto">
                <div class="">
                    <div>
                        <img src="./images/related-search.png" class="w-75 mb-4" alt="">
                    </div>
                </div>
            </div>
            <div class=" col-xl-6 col-md-6">
                <h1 class="lbs-actually-matters-main-h1 ">Relevant Topics, <br>
                    <span>Value Adding Content-</span>
                </h1>


                <p> We build class and authentic link building. Our expert team emphasizes the topic of the site and the
                    niche relevant. We offer our clients appropriate and authentic site that goes with their URL.
                    Moreover, we choose niche-relevant topics. Our in-house native writers of the UK and US create
                    content with perfectly placed URLs and flawlessly inserted anchor text. Therefore the client has
                    great chances of getting a high success rate in publication and backlinks of their site relevant.
                </p>



                <div class=" buttonsinfo mt-3">
                <a href="#pricing-cards">
                    <button type="button" class="btn managed-link-btn ">Get Your Links Now</button>
                    </a>
                </div>
            </div>

        </div>

    </section>
    <!-- Relevant Topics, Value Adding Content- ends -->
    <!-- _________________________________________________________________________________________________ -->
    <!--========= Placement Guaranteed In Your Preference Site-  Start =========-->
    <section class="high-autority-placement-section">
        <div class="high-autority-placement-div ">
            <h2>Placement Guaranteed In <br> <strong>Your Preference Site-</strong> </h2>

            <p>If you are a client and you placed an order with your selected URLs and anchor texts, we are guaranteed
                that the content will be inserted into the perfect site that matches your website. Moreover, you have
                options of reviewing, and after the green signal, we will go ahead. In fact, there is an option of
                <span> replacement of service</span>
                after reviewing the site, we selected for you. In addition, we offer
                Do-It-Yourself(DIY) link-building services if the client wants to build links themselves.
                Quality sites always have strict publishing requirements, if your chosen website does not work we will
                offer amazing link replacements sites that seriously match your site. And the rest of the things are
                assured. We guaranteed placements and you just need to pay only for the links we provide.
            </p>

            <h2> <strong>Hassle-Free Link Building Just For You</strong> </h2>
            <div class=" buttonsinfo mt-5 justify-content-center cannabis-for-smallsizing">
            <a href="#pricing-cards">
                <button type="button" class="btn managed-link-btn ">View Pricing</button>
                </a>
            </div>
        </div>
    </section>


    <!---------- Placement Guaranteed In Your Preference Site-  End ---------------------->
    <!-- ____________________________________________________________________________________________ -->


    <!-- ------------------------------------------------ -->
    <!-- pricing section -->
    <!-- ------------------------------------------- -->

    <section class="mt-5">
        <h1 class="text-center pricing-bo-h1 mb-3 px-2 mt-5">High Authority Backlinks Pricing
        </h1>
        <p class="text-center pricing-bo-p1 mb-3">We offer blogger outreach links categorised as <br> per DA,
            DR, or organic traffic. Below is the pricing <br> for All 3 models.</p>

        <?php require_once "partials/pricing-cards.php"; ?>
    </section>

    <!-- ------------------------------------------------ -->
    <!-- pricing section ends -->
    <!-- ------------------------------------------- -->

    <!-- ================================================================================================ -->
    <!-- more information link-building start -->


    <!-- contact top -->
    <!-- <?php include('more-info.php');?> -->
    <!-- //contact top -->



    <!-- more information link-building ends -->
    <!-- ================================================================================================ -->
    <!-- How It Works-section starts -->
    <!-- __________________________________________________________________________________________ -->

    <section class="how-it-works-main-section">
        <h1>How It Works?</h1>
        <div class="text-center py-4">
            <img src="./images/dummy-img/link-inserting-123img.png" class="how-it-works-1st-img" alt="">
        </div>


        <div class="row m-0">
            <div class="col-md-4 col-xl-4">
                <div class="how-it-works-main-card-div">

                    <h4>Place Order And <span>Share Details</span> </h4>
                    <p>
                        So, let’s start and place orders with us for authentic link-building services. You just need to
                        share your desired URL link and anchor text. Our expert team will analyze all the aspects and
                        after that, they will start the whole process. </p>
                </div>
            </div>
            <div class="col-md-4 col-xl-4">
                <div class="how-it-works-main-card-div">

                    <h4>Picking Placements <span>And Crafting Content</span> </h4>
                    <p>
                        After placing the orders our prominent team will provide you with a list of different really
                        sites to the client’s URL. you have options of reviewing them and giving approval after
                        selecting one. You can inform us about your wanted backlinks site. We have a huge database of
                        suitable replacement websites for you. After your selection process is completed, our prominent
                        writers will start your content.</p>
                </div>
            </div>
            <div class="col-md-4 col-xl-4">
                <div class="how-it-works-main-card-div">

                    <h4>Publishing <span>And Reporting</span> </h4>
                    <p>
                        You can expect that the authority link will be live within 45 days. After the link was
                        published, our team will do a manual check for verifying if the link is live. When the published
                        backlinks will passed our quality check, we will notify you by updating the report and sharing
                        mail including new URL links. </p>
                </div>
            </div>
        </div>
    </section>

    <!-- How It Works-section ends -->
    <!-- __________________________________________________________________________________________ -->


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