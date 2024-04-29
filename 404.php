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
$customer        = new Customer();
$service        = new Services();
$Feedback       = new Feedback();
$blogMst        = new BlogMst();
$utility        = new Utility();
$uMesg             = new MesgUtility();
$uImg             = new ImageUtility();
$uNum             = new NumUtility();
$faqs            = new faqs();

######################################################################################################################
$typeM        = $utility->returnGetVar('typeM', '');
//user id
$cusId        = $utility->returnSess('userid', 0);
if (isset($_GET['seo_url'])) {
    $seo_url                      = $_GET['seo_url'];
}

?>
<!DOCTYPE HTML>
<html lang="zxx">

<head>
    <?php require_once ROOT_DIR . "/components/fastlinky-head.php" ?>

    <title>#1 Outreach & Link Building Services Agency in SEO - <?= COMPANY_S; ?></title>
    <meta name="description"
        content="Fastlinky is the #1 link building agency for creative high quality link building services and we are experts in SEO and outreach services that will boost your website's performance." />
    <meta name="keywords"
        content="seo services, local seo services, seo company, seo agency, Link Building services agency, link building, backlink building, seo link building, what is a backlink ,link building services, seo link building services, best link building services, back link building services, link building seo services" />

    <!-- plugins  files -->
    <?php require_once ROOT_DIR . "/plugins/font-awesome/fontawesome.php" ?>

    <link href="<?= URL ?>/plugins/bootstrap-5.2.0/css/bootstrap.css" rel="stylesheet" />
    <link href="<?= URL ?>/plugins/sweetalert/sweetalert2.css" rel="stylesheet" />
    <!-- Custom CSS -->
    <link href="<?= URL ?>/css/style.css" rel='stylesheet' type='text/css' />
    <link href="<?= URL ?>/css/index.css" rel='stylesheet' type='text/css' />
    <link href="<?= URL ?>/css/testimonials.css" rel="stylesheet" />
    <link href="<?= URL ?>/css/clientside-logo.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

</head>

<body>
    <?php require_once "components/navbar.php"; ?>
    <!--------------------------------------------------->

    <div class='d-flex justify-content-center align-items-center error'>
            <img src="images/error.svg" alt="">
    </div>
    <!-- Footer -->
    <?php require_once "components/footer.php"; ?>
    <!-- footer -->
    <!-- -------------------------------------- -->
    <script src="<?= URL ?>/js/script.js"></script>
    <script src="<?= URL ?>/js/jquery-2.2.3.min.js"></script>
    <script src="<?= URL ?>/plugins/bootstrap-5.2.0/js/bootstrap.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
    var swiper = new Swiper(".mySwiper", {
        slidesPerView: 4,
        spaceBetween: 10,
        loop: true,
        // pagination: {
        //     el: ".swiper-pagination",
        //     clickable: true,
        // },
        centeredSlides: true,
        autoplay: {
            delay: 2500,
            disableOnInteraction: false,
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        breakpoints: {
            // When window width is >= 576px (for mobile devices)
            280: {
                slidesPerView: 3,
            },
            // When window width is >= 768px (for iPad)
            768: {
                slidesPerView: 3,
            },
            // When window width is >= 992px
            992: {
                slidesPerView: 4,
            },
            // When window width is >= 1200px
            1200: {
                slidesPerView: 5,
            },
        },
    });
    </script>
</body>

</html>