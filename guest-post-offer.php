<?php
require_once("includes/constant.inc.php");
session_start();

require_once("_config/dbconnect.php");

require_once("classes/date.class.php");
require_once("classes/error.class.php");
require_once("classes/search.class.php");
require_once("classes/customer.class.php");


require_once "classes/gp-offer.class.php";
require_once("classes/utility.class.php");
require_once("classes/utilityMesg.class.php");
require_once("classes/utilityImage.class.php");
require_once("classes/utilityNum.class.php");
require_once("classes/gp-order.class.php");
require_once("classes/faqs.class.php");
/* INSTANTIATING CLASSES */

$dateUtil       = new DateUtil();

$error 			= new Error();

$search_obj	    = new Search();

$customer		= new Customer();

// $logIn			= new Login();

$GpOfferList  = new GpOfferList();

// $service		= new Services();

// $blogMst		= new BlogMst();

$utility		= new Utility();

$uMesg 			= new MesgUtility();

$uImg 			= new ImageUtility();

$uNum 			= new NumUtility();
$faqs		    = new faqs();
// $gp				  = new Gporder();

######################################################################################################################

$typeM		= $utility->returnGetVar('typeM','');

//user id

$cusId		= $utility->returnSess('userid', 0);







if(isset($_GET['seo_url'])){

	$seo_url			  		= $_GET['seo_url'];

}

?>
<?php

/*

define('WP_USE_THEMES', false);

require('blog/wp-load.php');

query_posts('showposts=3');

*/

?>
<!DOCTYPE HTML>
<html lang="zxx">

<head>
    <meta name="robots" content="noindex,nofollow">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Guest Post Offers Service, Blogger Outreach Services - <?php echo COMPANY_S; ?></title>
    <link rel="shortcut icon" href="<?php echo FAVCON_PATH?>" type="image/png" />
    <link rel="apple-touch-icon" href="<?php echo FAVCON_PATH?>" />
    <meta name="description"
        content="LeeLija provided Guest Post Service at reasonable prices on fashion blogs, beauty blogs, health blogs, travel blogs, fitness blogs, tech blogs, home improvement  or more." />
    <meta name="keywords"
        content="Guest Post, Guest Posting,Guest Post Service, blogger outreach, guest posting services, guest posting blogs, fashion blogs, beauty blogs, health blogs, travel blogs, fitness blogs, tech blogs, home improvement blogs, CBD blogs, Casino Blogs" />
    <!-- <link href="css/bootstrap.css" rel='stylesheet' type='text/css' /> -->
    <link rel="stylesheet" href="plugins/bootstrap-5.2.0/css/bootstrap.css">
    <link rel="stylesheet" href="plugins/fontawesome-6.1.1/css/all.css">
    <!-- Custom CSS -->
    <link href="css/leelija.css" rel='stylesheet' type='text/css' />
    <link href="css/style.css" rel='stylesheet' type='text/css' />
    <link href="css/guest-post-offer.css" rel='stylesheet' type='text/css' />
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
    <div class="blogger-banner  banner">
        <h1 class="blogbanner-heading">Our Premium Service in Guest Posting</h1>
        <div class="gp-heading-details-2">
            <p>

                In the last couple of years, we are one of the leading companies in the SEO and Digital

                Marketing Sector. <br> We helped a lot of brands to stand in the market with our professional

                SEO and Guest Posting Services.<br> We worked as a team with the company to catch more leads on the
                website.



            </p>



        </div>



    </div>



    <!--Banner Dividor-->

    <?php //include ('quote.php') ?>

    <!--/End of baneer Dividor-->





    <!-- ================================================================================================ -->



    <section class="blogger-fourth-section">

        <div class="price-table">

            <div class="container">





                <div class="price-table-box">

                    <div class="row mb-3">

                        <?php

                        $list = $GpOfferList->getGpOfferList();

                        foreach($list as $blog){

                    

                    echo '<div class="col-md-4 mb-3">

                            <div class="item_bx" id="">     

                                <p class="package_type_cat"><a href="'.$blog['link'].'" target="_blank">'.$blog['domain'].'</a></p>

                                <p class="price-box-title"><span class="item_dollar">$</span><span

                                        class="item_price">'.$blog['price'].'</span></p>

                                <ul class="item_bx_ul">

                                    <li><i class="fas fa-check-square"></i> 1 Blog Post </li>

                                    <li><i class="fas fa-check-square"></i>'.$blog['follow'].' Link</li>

                                    <li><i class="fas fa-check-square"></i>DA: '.$blog['da'].'</li>

                                    <li><i class="fas fa-check-square"></i>TF :'.$blog['pa'].'</li>

                                    <li><i class="fas fa-check-square"></i>Spam: '.$blog['spam'].'</li>

                                    <li><i class="fas fa-check-square"></i>Organic Traffic: '.$blog['organic_traffic'].'K</li>

                                </ul>



                                <a href="guest-post-offer-order.php?data-id='.$blog['id'].'"><button>Order Now</button></a>

                                <!-- <form action="guest-post-offer-order.php" method="post">

                                <button >Order Now</button>

                            </form> -->

                            <!-- <button type="button" name="package-purchase-btn" id="package-purchase-btn"

                                class="package-purchase-btn">purchase now</button> -->



                            </div>

                        </div>';

                            }

                    ?>

                    </div>

                </div>

            </div>

        </div>

    </section>







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

    <!-- --------------------------------------- -->
    <!-- feedback form -->
    <?php require_once "partials/feedback.php"; ?>
    <!-- feedback form -->
    <!-- ----------------------------------------------- -->
    <!-- Footer -->
    <?php require_once "partials/footer.php"; ?>
    <!-- footer -->
    <!-- -------------------------------------- -->
    <!-- ================================================================================================ -->



    <script src="js/jquery-2.2.3.min.js"></script>
    <script src="plugins/bootstrap-5.2.0/js/bootstrap.js"></script>
</body>

</html>