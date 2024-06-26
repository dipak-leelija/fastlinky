<?php
session_start();
require_once __DIR__ . "/includes/constant.inc.php";
include_once ROOT_DIR . "/includes/contact-us-email.inc.php";
include_once ROOT_DIR . "/includes/user.inc.php";
require_once ROOT_DIR . "/_config/dbconnect.php";

require_once ROOT_DIR . "/classes/customer.class.php";
require_once ROOT_DIR . "/classes/contact.class.php";
require_once ROOT_DIR . "/classes/error.class.php";
require_once ROOT_DIR . "/classes/emails.class.php";
require_once ROOT_DIR . "/classes/date.class.php";
require_once ROOT_DIR . "/classes/utility.class.php";

/* INSTANTIATING CLASSES */
$customer		= new Customer();
$Contact        = new Contact();
$MyError 		= new MyError();
$emailObj		= new Emails();
$DateUtil      	= new DateUtil();
$utility		= new Utility();
######################################################################################################################
$typeM		= $utility->returnGetVar('typeM','');
//user id
$cusId		= $utility->returnSess('userid', 0);

require_once ROOT_DIR."/components/how-we-work.inc.php";

?>
<!DOCTYPE HTML>
<html lang="en">

<head>
    <?php require_once ROOT_DIR."/components/fastlinky-head.php" ?>

    <title>How we Work - <?= COMPANY_S; ?></title>
    <meta name="description" content="" />
    <meta name="keywords" content="" />

    <!-- Plugins Files -->
    <link href="<?= URL ?>/plugins/bootstrap-5.2.0/css/bootstrap.css" rel="stylesheet" />
    <?php require_once ROOT_DIR.'/plugins/font-awesome/fontawesome.php'?>

    <!-- Custom CSS -->
    <link href="<?= URL ?>/css/style.css" rel='stylesheet' type='text/css' />
    <link href="<?= URL ?>/css/form.css" rel='stylesheet' type='text/css' />
    <link href="<?= URL ?>/css/custom.css" rel='stylesheet' type='text/css' />
    <link href="<?= URL ?>/css/how-we-work.css" rel="stylesheet">
    <link href="<?= URL ?>/css/lets-talk-section.css" rel="stylesheet" />


    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous"> -->



</head>

<body>
    <!-- header -->
    <?php require_once "components/navbar.php"; ?>
    <!-- //header -->
    <main>
        <article>
            <!-- =========================== Header Main Text Area Start =========================== -->
            <div class="position-relative z-20 bg-white mt-3 pt-4">
                <div class="w-100 py-3">
                    <div class="px-3">
                        <div data-aos="move-up" class="pt-3 pt-sm-4 py-4 text-center">
                            <h1 class="fs-1 fw-bolder lh-sm green-highlight tracking-tighter">
                                How Do We <strong> Work </strong>?</h1>
                            <div class="w-md-50 w-75 mx-auto">
                                <div class="pt-2">
                                    <p class="mb-5 fs-5">We take great pride in offering every one of our link-building
                                        clients a fully personalised strategy. This suggests that to make sure we're
                                        constructing the appropriate links for your company, our SEO experts will
                                        carefully plan our approach.
                                    </p>
                                    <!-- <p class="mb-5 fs-5">
                                                <strong
                                                    class="fw-bold text-black">Here's
                                                    how it works...</strong>
                                            </p> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- =========================== Header Main Text Area End =========================== -->

            <div x-data="enterView">
                <div class="position-relative z-10 pt-4">

                    <?php // echo IMG_PATH ?>
                    <!-- 1st sec start  -->
                    <?php eachStep('<strong>Planning</strong> and Analysis', 'Ready for the achievement', IMG_PATH.'Planning-and-Analysis.png', array('a complete audit of links and content', 'Competitor analysing', 'Analysis of the anchor text and target page')); ?>
                    <!-- 1st sec end  -->

                    <!-- 2nd sec start  -->
                    <?php eachStep('Formulation of <strong>Strategies</strong>', 'Creating a better plan', IMG_PATH.'Formulation-of-Strategies.png', array('Choosing the best link-building techniques', 'Finding objects with links in content', 'Building our reliable outreach image')); ?>
                    <!-- 2nd sec end  -->

                    <!-- 3rd sec start  -->
                    <?php eachStep('Targets for <strong>Prospecting</strong>', 'Who are we aiming for?', IMG_PATH.'Targets-for-Prospecting.png', array('Finding connections that others are unable to find', 'We are searching for the appropriate individuals who can make our links properly', 'We discover unique information and specifics about every link prospect')); ?>
                    <!-- 3rd sec end  -->

                    <!-- 4th sec start  -->
                    <?php eachStep('<strong>Outreach </strong> Approach', 'Starting a public relations campaign', IMG_PATH.'Outreach-Approach.png', array('We design email templates and do frequent A/B testing', 'Our group has started several outreach endeavours to cover our bases', 'We arrange for frequent phone conversations and follow-ups with decision-makers')); ?>
                    <!-- 4th sec end  -->

                    <!-- 5th sec start  -->
                    <?php eachStep('<strong>Building </strong> Relationships', 'Connecting is everything', IMG_PATH.'Building-Relationships.png', array('With editors and partners, we grow trust', 'We produce enduring connections', 'Our priority is obtaining links that influence your results')); ?>
                    <!-- 5th sec end  -->

                    <!-- 6th sec start  -->
                    <?php eachStep('<strong>Delivery </strong> Outcomes', 'Monitoring and enhancement', IMG_PATH.'Delivery-Outcomes.png', array('We constantly monitor links and important indicators', 'Our group regularly benchmarks against competitors and measures results', 'We talk with our clients to exchange ideas', 'To make sure we stay ahead of the competition, planning is essential')); ?>
                    <!-- 6th sec end  -->
                    <div class="position-absolute z-10 top-0 start-0 w-100">
                        <div class="px-4">
                            <div class="d-flex">
                                <div class="col-5 col-xl-6">
                                    <div class="main-line-head pointer-events-none transform -translate-x-1">
                                    </div>
                                </div>
                                <div class="col-7 col-xl-6"></div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="position-fixed top-0 start-0 w-100">
                    <div class="px-4">
                        <div class="d-flex">
                            <div class="col-md-5 col-xl-6">
                                <div class="main-line w-0.5 h-screen pointer-events-none transform -translate-x-1">
                                    <div class="h-100"></div>
                                    <div class="position-absolute top-0 start-0 w-0.5 h-1/2"></div>
                                </div>
                            </div>
                            <div class="col-7 col-xl-6"></div>

                        </div>
                    </div>
                </div>
            </div>
        </article>
    </main>
    <!---------------------------------------------------------------- -->
    <!-- curious section starts -->
    <?php // require_once "components/curious-section.inc.php"; ?>
    <section class="lets-talk-section py-0" style="z-index: 999; background: var(--pure-white);">
        <div class="row justify-content-between layoutdiv h-100">
            <div class="col-12 col-md-4 p-0 order-2 order-md-1 imgdiv">
                <img src="https://optimise2.assets-servd.host/obedient-zorilla/production/images/Universal-cool-graphics/footer-3D.png?w=1600&q=80&fm=webp&fit=crop&crop=focalpoint&fp-x=0.5&fp-y=0.5&dm=1653141251&s=c1bdfa6eac6fcf827bfa2426c2dc5630"
                    alt="">
            </div>
            <div class="col-12 col-md-8 d-flex flex-column justify-content-center order-1 order-md-2 mt-0 px-5 py-4">
                <div class="h1 fw-bold">Curious? <br> Let’s talk link building</div>
                <div class="max-w-lg mb-4">
                    <div class="redactor text-gray-800">We love talking link building. Let us know about your project
                        and we'll send you a free proposal</div>
                </div>
                <div class="d-flex justify-content-between flex-wrap">
                    <button class="btn border-0 layoutbutton fw-bold">Get In Touch <i
                            class="fa-regular fa-comment-dots ps-2"></i></button>
                </div>
            </div>
        </div>
    </section>
    <!-- curious section ended -->
    <!---------------------------------------------------------------- -->

    <!-- Footer -->
    <?php require_once "components/footer.php"; ?>
    <!-- /Footer -->

    <script src="<?= URL ?>/plugins/jquery-3.6.0.min.js"></script>
    <script src="<?= URL ?>/plugins/bootstrap-5.2.0/js/bootstrap.js"></script>
    <script src="<?= URL ?>/plugins/bootstrap-5.2.0/js/bootstrap.bundle.min.js"></script>
    <script src="<?= URL ?>/js/how-we-work.js"></script>
</body>

</html>