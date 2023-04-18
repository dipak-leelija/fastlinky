<?php
require_once "includes/constant.inc.php";
session_start();

require_once "_config/dbconnect.php";

require_once "classes/date.class.php";
require_once "classes/error.class.php";
require_once "classes/search.class.php";
require_once "classes/customer.class.php";
require_once "classes/login.class.php";
require_once "classes/services.class.php";

require_once "classes/utility.class.php";
require_once "classes/utilityMesg.class.php";
require_once "classes/utilityImage.class.php";
require_once "classes/utilityNum.class.php";

/* INSTANTIATING CLASSES */
$dateUtil      	= new DateUtil();
$error 			= new Error();
$search_obj		= new Search();
$customer		= new Customer();
$logIn			= new Login();
$service		= new Services();

$utility		= new Utility();
$uMesg 			= new MesgUtility();
$uImg 			= new ImageUtility();
$uNum 			= new NumUtility();
######################################################################################################################
$typeM		= $utility->returnGetVar('typeM','');
//user id
$cusId		= $utility->returnSess('userid', 0);
?>
<!DOCTYPE HTML>
<html lang="zxx">

<head>
    <meta charset="utf-8">
    <title>About <?php echo COMPANY_S; ?></title>
    <link rel="icon" href="<?php echo FAVCON_PATH; ?>" type="image/png">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="keywords" content="" />


    <!-- Bootstrap Core CSS -->
    <!-- <link href="css/bootstrap.css" rel='stylesheet' type='text/css' /> -->
    <link rel="stylesheet" href="plugins/bootstrap-5.2.0/css/bootstrap.css">
    <link rel="stylesheet" href="plugins/fontawesome-6.1.1/css/all.css">
    <!-- <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet"> -->
    <!-- Custom CSS -->
    <link href="css/style.css" rel='stylesheet' type='text/css' />
    <link href="css/about-us.css" rel='stylesheet' type='text/css' />

</head>


<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">
    <?php require_once "partials/navbar.php"; ?>
    <!-- Know More About Us section starts -->
    <section class="about-banner_section" id="about">
        <div class="container">
            <!-- row-1 -->
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="about-avatar">
                        <img class="about-banner-img" src="./images/portfolio/pexels-pixabay-267507.jpg" title=""
                            alt="">

                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-text ">
                        <h3 class="dark-color">Know More About Us</h3>
                        <h6 class="theme-color lead">check out who we are</h6>
                        <p>We are a team of passionate SEO professionals who are dedicated to delivering high-quality
                            link-building services. We strive to provide premium backlinks and improve your search
                            engine rankings. We at Fastlinky understand the importance of building a strong and diverse
                            backlink profile. This is the reason why we solely focus on link building.

                            Our team uses a range of tactics and strategies to help our clients achieve their goals. We
                            are always looking for new ways to help our clients succeed. Our writers are constantly
                            updating and expanding our website to ensure that we are providing the most current and
                            relevant information available.

                            We pride ourselves on our transparency and customer service. We are confident that our
                            link-building services can make a real difference for your business.
                        </p>

                    </div>
                </div>

            </div>
            <!-- ..................................... -->
            <!-- Know More About Us section ends -->
            <!-- ............................................. -->
            <!-- row-2 -->
            <!-- our mission starts -->
            <div class="row align-items-center ">

                <div class="col-lg-6">
                    <div class="about-text">
                        <h3 class="dark-color">Our Mission</h3>

                        <p>At Faslinky our mission is to help you attract targeted visitors to your website. Whether you
                            are just starting now or an experienced firm that wishes to take its firm to the next level.
                            We are committed to assisting our clients in using backlinks strategically to improve their
                            rankings on search engines. Since we believe they are an essential component of any good
                            content marketing plan. You can become more visible and increase your presence by making use
                            of our strategic backlinks.

                            Building a strong backlink can be a very time time-consuming task and managing it can be
                            more complex. For this reason, we provide a selection of offerings aimed at making the
                            procedure as simple and efficient as feasible. Our professional staff is committed to giving
                            our customers the best service and assistance possible and we have years of expertise in the
                            field.

                            We are here to support you in achieving your objectives. To make sure that our clients are
                            pleased with the backlink services we are dedicated to assisting our clients in achieving
                            their maximum potential.
                        </p>

                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-avatar">
                        <img class="about-banner-img" src="./images/growing-time.png" title="" alt="">

                    </div>
                </div>
            </div>
            <!-- ...................................................... -->
            <!-- our mission starts -->
            <!-- ....................................................... -->
            <!-- counter section starts -->

            <div class="counter-section mt-5">
                <div class="row">
                    <div class="col-6 col-lg-3">
                        <div class="count-data text-center">
                            <h6 class="count h2" data-to="500" data-speed="500">2022</h6>
                            <p class="m-0px font-w-600">Fastlinky is Established </p>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3">
                        <div class="count-data text-center">
                            <h6 class="count h2" data-to="150" data-speed="150">150+</h6>
                            <p class="m-0px font-w-600">Happy Clients</p>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3">
                        <div class="count-data text-center">
                            <h6 class="count h2" data-to="850" data-speed="850">850+</h6>
                            <p class="m-0px font-w-600">Project Completed</p>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3">
                        <div class="count-data text-center">
                            <h6 class="count h2" data-to="190" data-speed="190">190+</h6>
                            <p class="m-0px font-w-600">Telephonic Talk</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- counter section starts -->
        </div>
    </section>
    <!-- ...................................................... -->
    <!-- banner section ends  -->
    <!-- ............................................ -->
    <!-- why choose us section starts -->
    <!-- ...................................................... -->
    <section class="why-choose-us-section">
        <div class="container">
            <div class="text-center mb-2-9 mb-lg-6">
                <h2 class="display-18 display-md-16 display-lg-14 font-weight-700">Why choose Us </h2>
                <p class="fs-4 " style="font-family: sans-serif;">The trusted source for why choose us</p>

            </div>
            <div class="row align-items-center">
                <div class="col-sm-6 col-lg-4 mb-2-9 mb-sm-0">
                    <div class="pr-md-3">
                        <div class="text-center text-sm-right mb-2-9">
                            <div class="mb-4">
                                <img src="./images/handshakes.png" width="80px" height="80px" alt="..."
                                    class="rounded-circle ">
                            </div>
                            <h4 class="sub-info">Quality above quantity</h4>
                            <p class="display-30 mb-0">Instead of simply aiming to get more backlinks, we concentrate on providing high-quality backlinks from reliable and respected domains. This will raise your website's credibility and dependability in the results of search engines.</p>
                        </div>
                        <div class="text-center text-sm-right">
                            <div class="mb-4">
                                <img src="./images/cost-effective.png" width="80px" height="80px" alt="..."
                                    class="rounded-circle ">
                            </div>
                            <h4 class="sub-info">Personalized strategy</h4>
                            <p class="display-30 mb-0">We are aware that every firm is distinct and has certain requirements. Because of this, we take a personalized approach to backlink development, making sure to adjust our plans to suit your unique objectives and requirements.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 d-none d-lg-block">
                    <div class="why-choose-center-image">
                        <img src="./images/About-Page-intro-pic.png" alt="..." class="rounded-circle">
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="pl-md-3">
                        <div class="text-center text-sm-left mb-2-9">
                            <div class="mb-4">
                                <img src="./images/team-works.png" width="80px" height="80px" alt="..."
                                    class="rounded-circle ">
                            </div>
                            <h4 class="sub-info">Knowledge and practice</h4>
                            <p class="display-30 mb-0">Our team of professionals has years of backlink-building expertise and is well-versed in the complexities of the market. We thoroughly choose the greatest backlinks for your company and make sure they are of the highest caliber using our knowledge.</p>
                        </div>

                        <div class="text-center text-sm-left">
                            <div class="mb-4">
                                <img src="./images/exellences.png" width="80px" height="80px" alt="..."
                                    class="rounded-circle ">
                            </div>
                            <h4 class="sub-info">Thorough information</h4>
                            <p class="display-30 mb-0">We offer clear information so you can observe how your backlink development activities are progressing and comprehend the effects they are making on the accessibility and rankings of your website.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ............................................. -->
    <!-- why choose us section ends -->
    <!-- ............................................................. -->
    <!-- Our Workshop History section starts -->
    <!-- .......................................................... -->
    <!-- <section class="our-Workshop-History-section">
        <div class="container">
            <div class="">
                <h2 class="our-Workshop-History-section-h2">Our Workshop History</h2>
                <div class="heading-separator"></div>
            </div>
            <div class="row">
                <div class="history-wrapper">
                    <div class="title-wrap text-center one-of-two">
                        <h2 class="h1 text-secondary mb-0 text-uppercase">fastlinky.com</h2>
                        <p class="fs-3 font-weight-500">Lorem ipsum dolor </p>
                    </div>
                    <div class="timeline-box one-of-two">
                        <img class="mb-1-6 rounded" src="./images/random1.jpg" width="280px" height="280px" alt="...">
                        <div class="content">
                            <h3 class="h4 mb-2 mb-md-3">Lorem ipsum dolor sit amet consectetur</h3>
                            <p class="mb-0">Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse
                                molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan
                                et iusto odio dignissim qui blandit praesent luptatum</p>
                        </div>
                        <div class="yearly-div">2015</div>
                    </div>
                    <div class="timeline-box one-of-two">
                        <img class="mb-1-6 rounded" src="./images/random4.jpg" width="280px" height="280px" alt="...">
                        <div class="content">
                            <h3 class="h4 mb-2 mb-md-3">Lorem ipsum dolor sit amet consectetur</h3>
                            <p class="mb-0">Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse
                                molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan
                                et iusto odio dignissim qui blandit praesent luptatum</p>
                        </div>
                        <div class="yearly-div">2017</div>
                    </div>
                    <div class="timeline-box one-of-two">
                        <img class="mb-1-6 rounded" src="./images/random2.png" width="280px" height="280px" alt="...">
                        <div class="content">
                            <h3 class="h4 mb-2 mb-md-3">Lorem ipsum dolor sit amet consectetur</h3>
                            <p class="mb-0">Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse
                                molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan
                                et iusto odio dignissim qui blandit praesent luptatum</p>
                        </div>
                        <div class="yearly-div">2019</div>
                    </div>
                    <div class="timeline-box one-of-two">
                        <img class="mb-1-6 rounded" src="./images/random3.png" width="280px" height="280px" alt="...">
                        <div class="content">
                            <h3 class="h4 mb-2 mb-md-3">Lorem ipsum dolor sit amet consectetur</h3>
                            <p class="mb-0">Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse
                                molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan
                                et iusto odio dignissim qui blandit praesent luptatum</p>
                        </div>
                        <div class="yearly-div">2022</div>
                    </div>
                </div>
            </div>
        </div>
    </section> -->
    <!-- ..................................................... -->
    <!-- Our Workshop History section ends -->
    <!-- ..................................................... -->
    <!-- Our features section starts -->
    <!-- ..................................................... -->
    <section class="  mb-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="section-title text-center mb-2 pb-0">
                        <h4 class="title mb-2  dark-color ">Our Features</h4>
                        <p class="text-muted para-desc mx-auto mb-0">Lorem ipsum dolor sit amet consectetur adipisicing
                            elit. Iste, inventore recusandae? Ad possimus, repellat delectus tempore minus.</p>
                    </div>
                </div>
                <!--end col-->
            </div>
            <!--end row-->

            <div class="row">
                <div class="col-lg-4 col-md-6 col-12 mt-4 pt-2">
                    <div class="card service-wrapper rounded border-0 shadow p-4">
                        <div class="icon text-center text-custom h1 shadow rounded bg-white">
                            <span class="uim-svg"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                    width="1em">
                                    <rect width="20" height="15" x="2" y="3" class="uim-tertiary" rx="3"></rect>
                                    <path class="uim-primary"
                                        d="M16,21H8a.99992.99992,0,0,1-.832-1.55469l4-6a1.03785,1.03785,0,0,1,1.66406,0l4,6A.99992.99992,0,0,1,16,21Z">
                                    </path>
                                </svg></span>
                        </div>
                        <div class="content mt-4">
                            <h5 class="title">Complete Accountability</h5>
                            <p class="text-muted mt-3 mb-0">At our website, we bear full responsibility for the outcomes we produce. We are dedicated to giving your firm a return on its money spent on backlink building since we recognize that it is an investment.</p>
                            <div class="mt-3">
                                <!-- <a href="javascript:void(0)" class="text-custom">Read More <i
                                        class="mdi mdi-chevron-right"></i></a> -->
                            </div>
                        </div>
                        <div class="big-icon h1 text-custom">
                            <span class="uim-svg"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                    width="1em">
                                    <rect width="20" height="15" x="2" y="3" class="uim-tertiary" rx="3"></rect>
                                    <path class="uim-primary"
                                        d="M16,21H8a.99992.99992,0,0,1-.832-1.55469l4-6a1.03785,1.03785,0,0,1,1.66406,0l4,6A.99992.99992,0,0,1,16,21Z">
                                    </path>
                                </svg></span>
                        </div>
                    </div>
                </div>
                <!--end col-->


                <div class="col-lg-4 col-md-6 col-12 mt-4 pt-2">
                    <div class="card service-wrapper rounded border-0 shadow p-4">
                        <div class="icon text-center text-custom h1 shadow rounded bg-white">
                            <span class="uim-svg"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                    width="1em">
                                    <path class="uim-primary"
                                        d="M12,6a.99974.99974,0,0,1,1,1v4.42249l2.09766,1.2113a1.00016,1.00016,0,0,1-1,1.73242l-2.59766-1.5A1.00455,1.00455,0,0,1,11,12V7A.99974.99974,0,0,1,12,6Z">
                                    </path>
                                    <path class="uim-tertiary"
                                        d="M2,12A10,10,0,1,0,12,2,10,10,0,0,0,2,12Zm9-5a1,1,0,0,1,2,0v4.42249l2.09766,1.2113a1.00016,1.00016,0,0,1-1,1.73242l-2.59766-1.5A1.00455,1.00455,0,0,1,11,12Z">
                                    </path>
                                </svg></span>
                        </div>
                        <div class="content mt-4">
                            <h5 class="title">Competitive costs</h5>
                            <p class="text-muted mt-3 mb-0">We provide backlink-building services at cheap prices, making it feasible for companies of all sizes to increase their online visibility and connect with their target market.</p>
                            <div class="mt-3">
                                <!-- <a href="javascript:void(0)" class="text-custom">Read More <i
                                        class="mdi mdi-chevron-right"></i></a> -->
                            </div>
                        </div>
                        <div class="big-icon h1 text-custom">
                            <span class="uim-svg" ><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                    width="1em">
                                    <path class="uim-primary"
                                        d="M12,6a.99974.99974,0,0,1,1,1v4.42249l2.09766,1.2113a1.00016,1.00016,0,0,1-1,1.73242l-2.59766-1.5A1.00455,1.00455,0,0,1,11,12V7A.99974.99974,0,0,1,12,6Z">
                                    </path>
                                    <path class="uim-tertiary"
                                        d="M2,12A10,10,0,1,0,12,2,10,10,0,0,0,2,12Zm9-5a1,1,0,0,1,2,0v4.42249l2.09766,1.2113a1.00016,1.00016,0,0,1-1,1.73242l-2.59766-1.5A1.00455,1.00455,0,0,1,11,12Z">
                                    </path>
                                </svg></span>
                        </div>
                    </div>
                </div>
                <!--end col-->

                <div class="col-lg-4 col-md-6 col-12 mt-4 pt-2">
                    <div class="card service-wrapper rounded border-0 shadow p-4">
                        <div class="icon text-center text-custom h1 shadow rounded bg-white">
                            <span class="uim-svg" ><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                    width="1em">
                                    <path class="uim-quaternary"
                                        d="M6,23H2a.99974.99974,0,0,1-1-1V16a.99974.99974,0,0,1,1-1H6a.99974.99974,0,0,1,1,1v6A.99974.99974,0,0,1,6,23Z">
                                    </path>
                                    <path class="uim-tertiary"
                                        d="M14,23H10a.99974.99974,0,0,1-1-1V10a.99974.99974,0,0,1,1-1h4a.99974.99974,0,0,1,1,1V22A.99974.99974,0,0,1,14,23Z">
                                    </path>
                                    <path class="uim-primary"
                                        d="M22,23H18a.99974.99974,0,0,1-1-1V2a.99974.99974,0,0,1,1-1h4a.99974.99974,0,0,1,1,1V22A.99974.99974,0,0,1,22,23Z">
                                    </path>
                                </svg></span>
                        </div>
                        <div class="content mt-4">
                            <h5 class="title">Contemporary Work Processes</h5>
                            <p class="text-muted mt-3 mb-0">In order to give the finest outcomes to our clients, we have adopted a modern workflow. To provide the greatest outcomes for our clients, we are always searching for methods to streamline our processes and procedures..</p>
                            <div class="mt-3">
                                <!-- <a href="javascript:void(0)" class="text-custom">Read More <i
                                        class="mdi mdi-chevron-right"></i></a> -->
                            </div>
                        </div>
                        <div class="big-icon h1 text-custom">
                            <span class="uim-svg" ><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                    width="1em">
                                    <path class="uim-quaternary"
                                        d="M6,23H2a.99974.99974,0,0,1-1-1V16a.99974.99974,0,0,1,1-1H6a.99974.99974,0,0,1,1,1v6A.99974.99974,0,0,1,6,23Z">
                                    </path>
                                    <path class="uim-tertiary"
                                        d="M14,23H10a.99974.99974,0,0,1-1-1V10a.99974.99974,0,0,1,1-1h4a.99974.99974,0,0,1,1,1V22A.99974.99974,0,0,1,14,23Z">
                                    </path>
                                    <path class="uim-primary"
                                        d="M22,23H18a.99974.99974,0,0,1-1-1V2a.99974.99974,0,0,1,1-1h4a.99974.99974,0,0,1,1,1V22A.99974.99974,0,0,1,22,23Z">
                                    </path>
                                </svg></span>
                        </div>
                    </div>
                </div>
                <!--end col-->

                <div class="col-lg-4 col-md-6 col-12 mt-4 pt-2">
                    <div class="card service-wrapper rounded border-0 shadow p-4">
                        <div class="icon text-center text-custom h1 shadow rounded bg-white">
                            <span class="uim-svg" ><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                    width="1em">
                                    <path class="uim-tertiary"
                                        d="M20 11a.99018.99018 0 0 1-.71-.29 1.16044 1.16044 0 0 1-.21-.33008.94107.94107 0 0 1 0-.75976A1.02883 1.02883 0 0 1 19.29 9.29a1.04667 1.04667 0 0 1 1.41992 0 1.14718 1.14718 0 0 1 .21.33008.94107.94107 0 0 1 0 .75976 1.16044 1.16044 0 0 1-.21.33008A.99349.99349 0 0 1 20 11zM19 6.5a1.0032 1.0032 0 0 1 1-1h0a1.0032 1.0032 0 0 1 1 1h0a1.0032 1.0032 0 0 1-1 1h0A1.0032 1.0032 0 0 1 19 6.5zM20 4a.98979.98979 0 0 1-.91992-1.37988A1.02883 1.02883 0 0 1 19.29 2.29a1.04669 1.04669 0 0 1 1.41992 0 1.02883 1.02883 0 0 1 .21.33008A.98919.98919 0 0 1 20.71 3.71a1.16044 1.16044 0 0 1-.33008.21A.9994.9994 0 0 1 20 4zM7.03027 6.24023a.99364.99364 0 0 1 .7295-1.21h0a.9907.9907 0 0 1 1.21.7295h0a.99891.99891 0 0 1-.7295 1.21h0A.96451.96451 0 0 1 8 7H8A.99122.99122 0 0 1 7.03027 6.24023zm4-1a.99364.99364 0 0 1 .7295-1.21h0a.9907.9907 0 0 1 1.21.7295h0a.99891.99891 0 0 1-.7295 1.21h0A.96451.96451 0 0 1 12 6h0A1.00294 1.00294 0 0 1 11.03027 5.24023zm4-1a.99816.99816 0 0 1 .7295-1.21h0a1.00272 1.00272 0 0 1 1.21.7295h0a.99891.99891 0 0 1-.7295 1.21h0A.96451.96451 0 0 1 16 5h0A.99122.99122 0 0 1 15.03027 4.24023zM4 8A.99042.99042 0 0 1 3 7a.83154.83154 0 0 1 .08008-.37988A1.02883 1.02883 0 0 1 3.29 6.29 1.04669 1.04669 0 0 1 4.71 6.29a1.02883 1.02883 0 0 1 .21.33008A.99013.99013 0 0 1 4 8zM4 11a.99018.99018 0 0 1-.71-.29 1.16044 1.16044 0 0 1-.21-.33008.94107.94107 0 0 1 0-.75976A1.14718 1.14718 0 0 1 3.29 9.29 1.04667 1.04667 0 0 1 4.71 9.29a1.14718 1.14718 0 0 1 .21.33008.94107.94107 0 0 1 0 .75976 1.16044 1.16044 0 0 1-.21.33008A.99349.99349 0 0 1 4 11zM15 10a1.0032 1.0032 0 0 1 1-1h0a1.0032 1.0032 0 0 1 1 1h0a1.0032 1.0032 0 0 1-1 1h0A1.0032 1.0032 0 0 1 15 10zm-4 0a1.0032 1.0032 0 0 1 1-1h0a1.0032 1.0032 0 0 1 1 1h0a1.0032 1.0032 0 0 1-1 1h0A1.0032 1.0032 0 0 1 11 10zM7 10A1.0032 1.0032 0 0 1 8 9H8a1.0032 1.0032 0 0 1 1 1H9a1.0032 1.0032 0 0 1-1 1H8A1.0032 1.0032 0 0 1 7 10z">
                                    </path>
                                    <polygon class="uim-primary" points="20 14 20 21 4 17 4 14 20 14"></polygon>
                                    <path class="uim-primary"
                                        d="M20,22a.97427.97427,0,0,1-.24219-.03027l-16-4A.99961.99961,0,0,1,3,17V14a.99943.99943,0,0,1,1-1H20a.99943.99943,0,0,1,1,1v7a1.0005,1.0005,0,0,1-1,1ZM5,16.21875l14,3.5V15H5Z">
                                    </path>
                                </svg></span>
                        </div>
                        <div class="content mt-4">
                            <h5 class="title">Personalized strategy</h5>
                            <p class="text-muted mt-3 mb-0">To provide the greatest outcomes for our clients, we are always searching for methods to streamline our processes and procedures..</p>
                            <div class="mt-3">
                                <!-- <a href="javascript:void(0)" class="text-custom">Read More <i
                                        class="mdi mdi-chevron-right"></i></a> -->
                            </div>
                        </div>
                        <div class="big-icon h1 text-custom">
                            <span class="uim-svg" ><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                    width="1em">
                                    <path class="uim-tertiary"
                                        d="M20 11a.99018.99018 0 0 1-.71-.29 1.16044 1.16044 0 0 1-.21-.33008.94107.94107 0 0 1 0-.75976A1.02883 1.02883 0 0 1 19.29 9.29a1.04667 1.04667 0 0 1 1.41992 0 1.14718 1.14718 0 0 1 .21.33008.94107.94107 0 0 1 0 .75976 1.16044 1.16044 0 0 1-.21.33008A.99349.99349 0 0 1 20 11zM19 6.5a1.0032 1.0032 0 0 1 1-1h0a1.0032 1.0032 0 0 1 1 1h0a1.0032 1.0032 0 0 1-1 1h0A1.0032 1.0032 0 0 1 19 6.5zM20 4a.98979.98979 0 0 1-.91992-1.37988A1.02883 1.02883 0 0 1 19.29 2.29a1.04669 1.04669 0 0 1 1.41992 0 1.02883 1.02883 0 0 1 .21.33008A.98919.98919 0 0 1 20.71 3.71a1.16044 1.16044 0 0 1-.33008.21A.9994.9994 0 0 1 20 4zM7.03027 6.24023a.99364.99364 0 0 1 .7295-1.21h0a.9907.9907 0 0 1 1.21.7295h0a.99891.99891 0 0 1-.7295 1.21h0A.96451.96451 0 0 1 8 7H8A.99122.99122 0 0 1 7.03027 6.24023zm4-1a.99364.99364 0 0 1 .7295-1.21h0a.9907.9907 0 0 1 1.21.7295h0a.99891.99891 0 0 1-.7295 1.21h0A.96451.96451 0 0 1 12 6h0A1.00294 1.00294 0 0 1 11.03027 5.24023zm4-1a.99816.99816 0 0 1 .7295-1.21h0a1.00272 1.00272 0 0 1 1.21.7295h0a.99891.99891 0 0 1-.7295 1.21h0A.96451.96451 0 0 1 16 5h0A.99122.99122 0 0 1 15.03027 4.24023zM4 8A.99042.99042 0 0 1 3 7a.83154.83154 0 0 1 .08008-.37988A1.02883 1.02883 0 0 1 3.29 6.29 1.04669 1.04669 0 0 1 4.71 6.29a1.02883 1.02883 0 0 1 .21.33008A.99013.99013 0 0 1 4 8zM4 11a.99018.99018 0 0 1-.71-.29 1.16044 1.16044 0 0 1-.21-.33008.94107.94107 0 0 1 0-.75976A1.14718 1.14718 0 0 1 3.29 9.29 1.04667 1.04667 0 0 1 4.71 9.29a1.14718 1.14718 0 0 1 .21.33008.94107.94107 0 0 1 0 .75976 1.16044 1.16044 0 0 1-.21.33008A.99349.99349 0 0 1 4 11zM15 10a1.0032 1.0032 0 0 1 1-1h0a1.0032 1.0032 0 0 1 1 1h0a1.0032 1.0032 0 0 1-1 1h0A1.0032 1.0032 0 0 1 15 10zm-4 0a1.0032 1.0032 0 0 1 1-1h0a1.0032 1.0032 0 0 1 1 1h0a1.0032 1.0032 0 0 1-1 1h0A1.0032 1.0032 0 0 1 11 10zM7 10A1.0032 1.0032 0 0 1 8 9H8a1.0032 1.0032 0 0 1 1 1H9a1.0032 1.0032 0 0 1-1 1H8A1.0032 1.0032 0 0 1 7 10z">
                                    </path>
                                    <polygon class="uim-primary" points="20 14 20 21 4 17 4 14 20 14"></polygon>
                                    <path class="uim-primary"
                                        d="M20,22a.97427.97427,0,0,1-.24219-.03027l-16-4A.99961.99961,0,0,1,3,17V14a.99943.99943,0,0,1,1-1H20a.99943.99943,0,0,1,1,1v7a1.0005,1.0005,0,0,1-1,1ZM5,16.21875l14,3.5V15H5Z">
                                    </path>
                                </svg></span>
                        </div>
                    </div>
                </div>
                <!--end col-->

                <div class="col-lg-4 col-md-6 col-12 mt-4 pt-2">
                    <div class="card service-wrapper rounded border-0 shadow p-4">
                        <div class="icon text-center text-custom h1 shadow rounded bg-white">
                            <span class="uim-svg" ><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                    width="1em">
                                    <path class="uim-quaternary"
                                        d="M12,22a.99974.99974,0,0,1-1-1V3a1,1,0,0,1,2,0V21A.99974.99974,0,0,1,12,22Z">
                                    </path>
                                    <polygon class="uim-primary" points="21 12 16 7 16 17 21 12"></polygon>
                                    <path class="uim-primary"
                                        d="M16,18a1,1,0,0,1-1-1V7a.99991.99991,0,0,1,1.707-.707l5,5a.99962.99962,0,0,1,0,1.41406l-5,5A.99893.99893,0,0,1,16,18Zm1-8.58594v5.17188L19.58594,12Z">
                                    </path>
                                    <path class="uim-tertiary"
                                        d="M3 13a.99075.99075 0 0 1-.92041-1.37988A1.14883 1.14883 0 0 1 2.29 11.29a1.04669 1.04669 0 0 1 1.41992 0 1.03724 1.03724 0 0 1 .21.33008A.83792.83792 0 0 1 4 12a.99042.99042 0 0 1-1 1zM4.79 15.21a1.00761 1.00761 0 0 1 0-1.41992h0a1.00671 1.00671 0 0 1 1.41992 0h0a1.0085 1.0085 0 0 1 0 1.41992h0a1.02749 1.02749 0 0 1-.71.29h0A1.02577 1.02577 0 0 1 4.79 15.21zM8 18a.99183.99183 0 0 1-.71-.29 1.16213 1.16213 0 0 1-.21045-.33008A.99906.99906 0 0 1 7 17a1.05 1.05 0 0 1 .29-.71 1.0387 1.0387 0 0 1 1.08984-.21 1.15384 1.15384 0 0 1 .33008.21A1.05232 1.05232 0 0 1 9 17a.9994.9994 0 0 1-.08008.37988 1.17124 1.17124 0 0 1-.21.33008A.99183.99183 0 0 1 8 18zM7 13.66992a.996.996 0 0 1 1-1H8a.99632.99632 0 0 1 1 1H9a1.00319 1.00319 0 0 1-1 1H8A1.00288 1.00288 0 0 1 7 13.66992zm0-3.33984a1.00288 1.00288 0 0 1 1-1H8a1.00319 1.00319 0 0 1 1 1H9a.99693.99693 0 0 1-1 1H8A.99663.99663 0 0 1 7 10.33008zM8 8a.99075.99075 0 0 1-.92041-1.37988A1.03011 1.03011 0 0 1 7.29 6.29a.98544.98544 0 0 1 1.62988.33008A.99013.99013 0 0 1 8 8zM4.79 10.21A1.00761 1.00761 0 0 1 4.79 8.79h0A1.00671 1.00671 0 0 1 6.21 8.79h0a1.0085 1.0085 0 0 1 0 1.41992h0a1.02749 1.02749 0 0 1-.71.29h0A1.02577 1.02577 0 0 1 4.79 10.21z">
                                    </path>
                                </svg></span>
                        </div>
                        <div class="content mt-4">
                            <h5 class="title">Process improvement</h5>
                            <p class="text-muted mt-3 mb-0">In order to give our clients the best outcomes possible, we are always searching for methods to streamline our tasks and procedures.</p>
                            <div class="mt-3">
                                <!-- <a href="javascript:void(0)" class="text-custom">Read More <i
                                        class="mdi mdi-chevron-right"></i></a> -->
                            </div>
                        </div>
                        <div class="big-icon h1 text-custom">
                            <span class="uim-svg" ><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                    width="1em">
                                    <path class="uim-quaternary"
                                        d="M12,22a.99974.99974,0,0,1-1-1V3a1,1,0,0,1,2,0V21A.99974.99974,0,0,1,12,22Z">
                                    </path>
                                    <polygon class="uim-primary" points="21 12 16 7 16 17 21 12"></polygon>
                                    <path class="uim-primary"
                                        d="M16,18a1,1,0,0,1-1-1V7a.99991.99991,0,0,1,1.707-.707l5,5a.99962.99962,0,0,1,0,1.41406l-5,5A.99893.99893,0,0,1,16,18Zm1-8.58594v5.17188L19.58594,12Z">
                                    </path>
                                    <path class="uim-tertiary"
                                        d="M3 13a.99075.99075 0 0 1-.92041-1.37988A1.14883 1.14883 0 0 1 2.29 11.29a1.04669 1.04669 0 0 1 1.41992 0 1.03724 1.03724 0 0 1 .21.33008A.83792.83792 0 0 1 4 12a.99042.99042 0 0 1-1 1zM4.79 15.21a1.00761 1.00761 0 0 1 0-1.41992h0a1.00671 1.00671 0 0 1 1.41992 0h0a1.0085 1.0085 0 0 1 0 1.41992h0a1.02749 1.02749 0 0 1-.71.29h0A1.02577 1.02577 0 0 1 4.79 15.21zM8 18a.99183.99183 0 0 1-.71-.29 1.16213 1.16213 0 0 1-.21045-.33008A.99906.99906 0 0 1 7 17a1.05 1.05 0 0 1 .29-.71 1.0387 1.0387 0 0 1 1.08984-.21 1.15384 1.15384 0 0 1 .33008.21A1.05232 1.05232 0 0 1 9 17a.9994.9994 0 0 1-.08008.37988 1.17124 1.17124 0 0 1-.21.33008A.99183.99183 0 0 1 8 18zM7 13.66992a.996.996 0 0 1 1-1H8a.99632.99632 0 0 1 1 1H9a1.00319 1.00319 0 0 1-1 1H8A1.00288 1.00288 0 0 1 7 13.66992zm0-3.33984a1.00288 1.00288 0 0 1 1-1H8a1.00319 1.00319 0 0 1 1 1H9a.99693.99693 0 0 1-1 1H8A.99663.99663 0 0 1 7 10.33008zM8 8a.99075.99075 0 0 1-.92041-1.37988A1.03011 1.03011 0 0 1 7.29 6.29a.98544.98544 0 0 1 1.62988.33008A.99013.99013 0 0 1 8 8zM4.79 10.21A1.00761 1.00761 0 0 1 4.79 8.79h0A1.00671 1.00671 0 0 1 6.21 8.79h0a1.0085 1.0085 0 0 1 0 1.41992h0a1.02749 1.02749 0 0 1-.71.29h0A1.02577 1.02577 0 0 1 4.79 10.21z">
                                    </path>
                                </svg></span>
                        </div>
                    </div>
                </div>
                <!--end col-->

                <div class="col-lg-4 col-md-6 col-12 mt-4 pt-2">
                    <div class="card service-wrapper rounded border-0 shadow p-4">
                        <div class="icon text-center text-custom h1 shadow rounded bg-white">
                            <span class="uim-svg" ><svg xmlns="http://www.w3.org/2000/svg"
                                    enable-background="new 0 0 24 24" viewBox="0 0 24 24" width="1em">
                                    <path class="uim-quaternary"
                                        d="M15,2c-3.3772,0.00142-6.27155,2.41462-6.88025,5.73651c2.90693-1.59074,6.553-0.52375,8.14374,2.38317c0.98206,1.79462,0.98206,3.96594,0,5.76057c3.8013-0.69634,6.31837-4.3424,5.62202-8.14369C21.27662,4.41261,18.37925,1.99872,15,2z">
                                    </path>
                                    <circle cx="7" cy="17" r="5" class="uim-primary"></circle>
                                    <path class="uim-tertiary"
                                        d="M11,7c-3.08339,0.00031-5.66461,2.33759-5.97,5.40582c2.5358-1.08949,5.47469,0.08297,6.56418,2.61877c0.54113,1.25947,0.54113,2.68593,0,3.94541c3.29729-0.32786,5.7045-3.26663,5.37664-6.56392C16.66569,9.33735,14.08386,6.99972,11,7z">
                                    </path>
                                </svg></span>
                        </div>
                        <div class="content mt-4">
                            <h5 class="title">Fresh Designs</h5>
                            <p class="text-muted mt-3 mb-0">Our backlink website has a clean, contemporary design that is intended to be user-friendly and simple to explore.</p>
                            <div class="mt-3">
                                <!-- <a href="javascript:void(0)" class="text-custom">Read More <i
                                        class="mdi mdi-chevron-right"></i></a> -->
                            </div>
                        </div>
                        <div class="big-icon h1 text-custom">
                            <span class="uim-svg" ><svg xmlns="http://www.w3.org/2000/svg"
                                    enable-background="new 0 0 24 24" viewBox="0 0 24 24" width="1em">
                                    <path class="uim-quaternary"
                                        d="M15,2c-3.3772,0.00142-6.27155,2.41462-6.88025,5.73651c2.90693-1.59074,6.553-0.52375,8.14374,2.38317c0.98206,1.79462,0.98206,3.96594,0,5.76057c3.8013-0.69634,6.31837-4.3424,5.62202-8.14369C21.27662,4.41261,18.37925,1.99872,15,2z">
                                    </path>
                                    <circle cx="7" cy="17" r="5" class="uim-primary"></circle>
                                    <path class="uim-tertiary"
                                        d="M11,7c-3.08339,0.00031-5.66461,2.33759-5.97,5.40582c2.5358-1.08949,5.47469,0.08297,6.56418,2.61877c0.54113,1.25947,0.54113,2.68593,0,3.94541c3.29729-0.32786,5.7045-3.26663,5.37664-6.56392C16.66569,9.33735,14.08386,6.99972,11,7z">
                                    </path>
                                </svg></span>
                        </div>
                    </div>
                </div>
                <!--end col-->
            </div>
            <!--end row-->
        </div>

    </section>

    <!-- ...................................................... -->
    <!-- Our features section starts -->
    <!-- ..................................................... -->
    <!-- get started wrok with us  starts -->
    <!-- ............................. -->
    <section class="get-started-section">
        <h2 class="text-center ">For Best Outreach Services</h2>
        <div class="my-a-btn-div">
            <a class="my-a-btn" href="register.php">Register Now</a>
        </div>

    </section>

    <!-- ..................................................... -->
    <!-- get started wrok with us ends -->
    <!-- ............................. -->
  <!-- --------------------------------------- -->
    <!-- feedback form -->
    <?php //require_once "partials/feedback.php"; ?>
    <!-- feedback form -->
    <!-- ----------------------------------------------- -->
    <!-- Footer -->
    <?php require_once "partials/footer.php"; ?>
    <!-- footer -->
    <!-- -------------------------------------- -->

    <!-- </div> -->

    <script src="plugins/bootstrap-5.2.0/js/bootstrap.js"></script>

    <!-- ==== js for smooth scrollbar ==== -->
    <!-- <script src="plugins/smooth-scrollbar.js"></script> -->
    <!-- <script>
    var Scrollbar = window.Scrollbar;
    Scrollbar.init(document.querySelector('body'));
    </script> -->
    <!-- ==== js for smooth scrollbar End ==== -->


</body>

</html>