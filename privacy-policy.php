<?php
session_start();
require_once("includes/constant.inc.php");

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
    <?php require_once ROOT_DIR."/partials/fastlinky-head.php " ?>

    <title>#1 Outreach & Link Building Services Agency in SEO - <?php echo COMPANY_S; ?></title>
    <meta name="description"
        content="Fastlinky is the #1 agency for creative high quality link building services and we are experts in SEO and outreach services that will boost your website's performance." />
    <meta name="keywords"
        content="seo services, local seo services, seo company, seo agency, Link Building services agency, link building, backlink building, seo link building, what is a backlink ,link building services, seo link building services, best link building services, back link building services, link building seo services" />


    <!-- Plugins Files -->
    <link href="<?= URL ?>/plugins/bootstrap-5.2.0/css/bootstrap.css" rel="stylesheet">
    <?php require_once ROOT_DIR.'/plugins/font-awesome/fontawesome.php'?>
    <link href="./plugins/sweetalert/sweetalert2.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/style.css" rel='stylesheet' type='text/css' />
    <link href="css/privacy-policy.css" rel='stylesheet' type='text/css' />
    <link href="css/testimonials.css" rel="stylesheet">
    <link href="css/clientside-logo.css" rel="stylesheet">
</head>

<body>
    <?php require_once "partials/navbar.php"; ?>
    <section class="privacy-main-banner-section">
        <!-- 1 para------------- Privacy Policy main headline -->
        <div>
            <h1>Privacy Policy </h1>
        </div>
        <!-- 2 para---------- What Kind Of Data Do We Collect? -->
        <div class="mb-3">
            <h3>What Kind Of Data Do We Collect?</h3>
            <p>Welcome to browse our website privately. At FastLinky, we receive information from you when you make an
                order or take a consideration. Depending on the situation, you might be required to submit your name,
                email address, or credit card information when placing an order or registering on our site. </p>
        </div>
        <!-- 3 para---------- What Do We Do With Your Data? -->
        <div class="mb-3">
            <h3>What Do We Do With Your Data?</h3>
            <p>The information we collect from you may be operated in one of such following ways: </p>
            <ul>
                <li>
                    <b>To Improve Our Website:</b><br>
                    To enhance the features of our website, we utilize the information and statements we collect from
                    you.
                </li>
                <li>
                    <b>For A Better Customer Experience:</b><br>
                    Your information enables us to respond to your support and customer service requirements more
                    quickly and efficiently.
                </li>
                <li>
                    <b>To Carry Out Deals:</b><br>
                    Without your permission, we will never deal, exchange, transfer, or give away your information to
                    any other business for any cause other than to send the ordered goods or provide the requested
                    services.
                </li>
                <li>
                    <b>To Send Periodic Emails:</b><br>
                    To receive rare company news, updates, or service information, the email address you offer us may
                    also be used to send you information and updates about your transaction. Note that if you ever
                    want to stop receiving emails from us, you can unsubscribe completely using the detailed steps
                    located at the bottom of each email.
                </li>

            </ul>
        </div>
        <!-- 4 para---- How Do We Protect Your Information? -->
        <div class="mb-3">
            <h3>How Do We Protect Your Information?</h3>
            <p>When you make an order, submit, or access your personal information, we’ll take several security measures
                to keep your information safe. </p>
            <p>SSL (Secure Socket Layer) technology will be used to encrypt and send all provided feedback or credit
                information to our payment gateway providers' database. And this position is accessible only to those
                with special access rights and confidentiality obligations.</p>
            <p>Your personal information—including credit card numbers, social security numbers, financial details,
                etc.—won't be composed on our servers after a transaction. </p>
        </div>
        <!-- 5 para----Do We Use Cookies? -->
        <div class="mb-3">
            <h3>Do We Use Cookies?</h3>
            <p>Yes, we use cookies to remember and process the products to gather total information about site traffic
                and site dealings to deliver better site experiences and tools in the future. </p>
            <p>Cookies enable the website's or service provider's strategies to identify your browser and record and
                recover particular information. </p>
        </div>
        <!-- 6 para---Do We Reveal Any Information To Outside Parties? -->
        <div class="mb-3">
            <h3>Do We Reveal Any Information To Outside Parties?</h3>
            <p>Your private details are never sold, traded, or otherwise transferred to irrelevant third parties.
                Therefore, we may reveal your information if we decide that doing so is necessary to pursue the law,
                execute our site's policies, or defend the rights, property, or security of other people. </p>
            <p>However, user data that cannot be used to identify an individual may still be shared with third parties
                for marketing, advertising, or other purposes. </p>
        </div>
        <!-- 7 para--- Your Support -->
        <div class="mb-3">
            <h3>Your Support:</h3>
            <p>Accept our internet privacy policy by using our site. </p>
        </div>
        <!-- 8 para---Modifications To Our Privacy Policy -->
        <div class="mb-3">
            <h3>Modifications To Our Privacy Policy:</h3>
            <p>We will update this website if we decide to make changes to our privacy policy. </p>
        </div>

    </section>
    <!-- 8 para--- Contact Us -->
    <div class="contact-us-privacy-section bg_mustard mb-0">
        <h3>Contact Us</h3>
        <h4>If you have any concerns about this privacy statement,
            please feel free to <a href="contact">contact</a>
            us </h4>
    </div>
    <!-- =---------------------------------------------------------------------------------------------- -->
    <!-- Footer -->
    <?php require_once "partials/footer.php"; ?>
    <!-- footer -->
    <script src="js/script.js"></script>
    <script src="js/jquery-2.2.3.min.js"></script>
    <script src="plugins/bootstrap-5.2.0/js/bootstrap.js"></script>
</body>

</html>