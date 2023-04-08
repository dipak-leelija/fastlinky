<?php
require_once "includes/constant.inc.php";
session_start();

require_once ROOT_DIR."/_config/dbconnect.php";

require_once ROOT_DIR."/classes/date.class.php";
require_once ROOT_DIR."/classes/error.class.php";
require_once ROOT_DIR."/classes/search.class.php";
require_once ROOT_DIR."/classes/customer.class.php";
require_once ROOT_DIR."/classes/login.class.php";
require_once ROOT_DIR."/classes/services.class.php";

require_once ROOT_DIR."/classes/blog_mst.class.php";
require_once ROOT_DIR."/classes/gp-package.class.php";
require_once ROOT_DIR."/classes/utility.class.php";
require_once ROOT_DIR."/classes/utilityMesg.class.php";
require_once ROOT_DIR."/classes/utilityImage.class.php";
require_once ROOT_DIR."/classes/utilityNum.class.php";
require_once ROOT_DIR."/classes/faqs.class.php";

/* INSTANTIATING CLASSES */
$dateUtil       = new DateUtil();

$GPPackage      = new GuestPostpackage();
// $error 			= new Error();
// $search_obj	    = new Search();
$customer		= new Customer();
// $logIn			= new Login();
// $service		= new Services();
// $blogMst		= new BlogMst();
$utility		= new Utility();
$uMesg 			= new MesgUtility();
$uImg 			= new ImageUtility();
$uNum 			= new NumUtility();
$faqs		    = new faqs();
######################################################################################################################
$typeM		= $utility->returnGetVar('typeM','');
//user id
$cusId		= $utility->returnSess('userid', 0);


// if(isset($_GET['seo_url'])){
	//  $seo_url			  		= $_GET['seo_url'];
	// $return_url 	= base64_decode($_GET["return_url"]); //get return url
// }

$packages = $GPPackage->packDetailsByCat(1);
// print_r($packages);
// exit;

?>

<!DOCTYPE HTML>
<html lang="zxx">

<head>
    <meta name="robots" content="noindex,nofollow">
    <link rel="icon" href="images/logo/favicon.png" type="image/png">
    <title>Order page - <?php echo COMPANY_S; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"
        content="LeeLija provided Guest Post Service at reasonable prices on fashion blogs, beauty blogs, health blogs, travel blogs, fitness blogs, tech blogs, home improvement  or more." />
    <meta charset="utf-8">
    <meta name="keywords"
        content="Guest Post, Guest Posting,Guest Post Service, blogger outreach, guest posting services, guest posting blogs, fashion blogs, beauty blogs, health blogs, travel blogs, fitness blogs, tech blogs, home improvement blogs, CBD blogs, Casino Blogs" />


    <!-- <link href="css/bootstrap.css" rel='stylesheet' type='text/css' /> -->
    <link rel="stylesheet" href="plugins/bootstrap-5.2.0/css/bootstrap.css">
    <link rel="stylesheet" href="plugins/fontawesome-6.1.1/css/all.css">
    <!-- Custom CSS -->
    <link href="css/leelija.css" rel="stylesheet" />
    <!-- <link href="css/style.css" rel='stylesheet' type='text/css' />  -->
    <link href="css/guest-post-offer.css" rel='stylesheet' type='text/css' />
    <link href="css/pricing-mainpage.css" rel='stylesheet' type='text/css' />
    <link href="css/form.css" rel='stylesheet' type='text/css' />
    <link rel="stylesheet" href="css/testimonials.css">
    <link rel="stylesheet" href="css/clientside-logo.css">

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
    <div id="home">
        <?php require_once "partials/navbar.php"; ?>

        <section class="order-summary-section pb-4">
            <div class="container">

                <div class="row main_row">
                    <!-- -------------------------- -->
                    <!-- column-1 clients details -->
                    <!-- --------------------------------- -->
                    <div class="col-lg-7 client-details-left">
                        <div class="">
                            <form role="form" method="post" action="submit" data-preview="" class="" id=""
                                novalidate="">
                                <div class="row">
                                    <div class="col-sm-6 mb-3">
                                        <div class="form-group">
                                            <label class="required-field" for="firstname">First Name</label>
                                            <input type="text" minlength="4" class="form-control" id="firstname"
                                                name="firstname" placeholder="John" required>
                                        </div>
                                    </div>

                                    <div class="col-sm-6 mb-3">
                                        <div class="form-group">
                                            <label for="lastName">Last Name</label>
                                            <input type="text" minlength="4" class="form-control" id="lastName"
                                                name="lastName" placeholder="Doe" required>
                                        </div>
                                    </div>

                                    <div class="col-sm-12 mb-3">
                                        <div class="form-group">
                                            <label class="required-field" for="email">Email</label>
                                            <input type="email" class="form-control" id="email" name="email"
                                                placeholder="example@gmail.com" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 mb-3">
                                        <div class="form-group">
                                            <label class="required-field mb-1" for="text">Choose your Plan <span
                                                    class="multiple">multiple</span></label>
                                            <div class="">
                                                <div class="row ">
                                                    <!-- card 1 -->
                                                    <div class="col-md-4 px-md-1 h-100">
                                                        <div class="card p-card" id="">
                                                            <input id="field_2_0" value="120" type="checkbox"
                                                                name="field_2[0]" required="" class="d-none cart-input">
                                                            <div class="price-card-wrapper">
                                                                <label for="field_2_0"
                                                                    class="item-details d-flex flex-column">
                                                                    <p class="pricing-title">Link Building Basic Package
                                                                        (5
                                                                        Links)</p>
                                                                    <ul class="">
                                                                        <li> <strong>5 Links Per Month</strong> </li>
                                                                        <li> DR 20-29: 2 links</li>
                                                                        <li> DR 30-39: 2 links</li>
                                                                        <li> DR 40-49: 1 link</li>

                                                                    </ul>
                                                                    <div class="item-price">
                                                                        <div class="default-price">
                                                                            $249.00/month
                                                                        </div>
                                                                    </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- card 2 -->
                                                    <div class="col-md-4 px-md-1 h-100">
                                                        <div class="card p-card" id="">
                                                            <input id="field_2_1" value="76" type="checkbox"
                                                                name="field_2[1]" required="" class="d-none cart-input">
                                                            <div class="price-card-wrapper">
                                                                <label for="field_2_1"
                                                                    class="item-details d-flex flex-column">
                                                                    <p class="pricing-title">Link Building Premium
                                                                        Package (10
                                                                        Links)</p>
                                                                    <ul class="">
                                                                        <li> <strong>5 Links Per Month</strong> </li>
                                                                        <li> DR 20-29: 5 links</li>
                                                                        <li> DR 30-39: 4 links</li>
                                                                        <li> DR 40-49: 1 link</li>

                                                                    </ul>
                                                                    <div class="item-price">
                                                                        <div class="default-price">
                                                                            $499.00/month
                                                                        </div>
                                                                    </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- card 3 -->
                                                    <div class="col-md-4 px-md-1 h-100">
                                                        <div class="card p-card" id="">
                                                            <input id="field_2_2" value="121" type="checkbox"
                                                                name="field_2[2]" required="" class="d-none cart-input">
                                                            <div class="price-card-wrapper">
                                                                <label for="field_2_2"
                                                                    class="item-details d-flex flex-column">
                                                                    <p class="pricing-title">Link Building Luxery
                                                                        Package (14
                                                                        Links)</p>
                                                                    <ul class="">
                                                                        <li> <strong>5 Links Per Month</strong> </li>
                                                                        <li> DR 20-29: 5 links</li>
                                                                        <li> DR 30-39: 5 links</li>
                                                                        <li> DR 40-49: 2 links</li>
                                                                        <li> DR 50-59: 1 link</li>

                                                                    </ul>
                                                                    <div class="item-price">
                                                                        <div class="default-price">
                                                                            $699.00/month
                                                                        </div>
                                                                    </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- card-3 end -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                    <!-- ------------------------------------- -->
                    <!-- column-2 payment details -->
                    <!-- ------------------------------------- -->
                    <div class="col-lg-5 order-details-right">
                        <div>
                            <form action="">
                                <!-- invoice summary -->
                                <div class="invoice-items" id="">
                                    <h2 class="mb-4">Summary</h2>
                                    <div class="cart-contents">
                                        <div class="mb-4 d-flex justify-content-between">
                                            <div>
                                                <div class="text-500">Link Building Basic Package (5 Links)</div>
                                                <div>
                                                    <span class="me-1 text-muted">Qty</span>
                                                    1
                                                </div>
                                            </div>
                                            <div class="text-right text-500">
                                                $249.00
                                            </div>
                                        </div>
                                        <hr>
                                        <!-- Show total and payment terms -->
                                        <div class="mb-4 d-flex justify-content-between">
                                            <div>
                                                <div class="text-500">Total</div>
                                                <div class="text-muted">USD</div>
                                            </div>
                                            <div class="text-right">
                                                <h2 class="m-0">$249.00</h2>
                                                <div class="mt-1 text-muted small">$249.00/month</div>
                                            </div>
                                        </div>
                                        <hr>
                                    </div>
                                </div>
                                <!-- invoice summary ends -->
                                <!-- payment options -->
                                <div class="box-payment-btn">
                                    <div class="bx_width_40">
                                        <input type="hidden" name="order-name" id="order-name">
                                        <div class="form-group myformgrp">
                                            <button type="submit" onclick="paypalOrder2()" class="paypalBtn">
                                                <span class="paypal_logo"><img src="images/payments/paypal-logo.png"
                                                        alt=""></span>
                                                <span class="pay">Pay</span><span class="pal">Pal</span>
                                            </button>
                                        </div>

                                        <div class="form-group myformgrp">
                                            <button type="submit" class="cardBtn" id="orderNowCcavenue"
                                                onclick="ccAvenueOrder2()">
                                                <span class="masterCard"><img
                                                        src="images/payments/masterCard.png"></span>
                                                <span class="visaCard"><img src="images/payments/visaCard.png"></span>
                                                <span> Credit or Debit Card</span>
                                            </button>
                                        </div>

                                        <div class="form-group myformgrp">
                                            <button type="submit" class="payLaterBtn" onclick="payLaterOrder2()">
                                                <span class="paylater_logo"><img
                                                        src="images/payments/pay-later.png"></span>
                                                <span> PayLater</span>
                                            </button>
                                        </div>
                                    </div>

                                </div>
                                <!-- payment options ends -->
                            </form>
                        </div>
                    </div>
                </div>
        </section>
        <!-- Footer -->
        <?php require_once "partials/footer.php"; ?>
    </div>
    <!-- /Footer -->
    <script src="plugins/bootstrap-5.2.0/js/bootstrap.js"></script>
    <script src="js/jquery-2.2.3.min.js"></script>
    <script src="js/script.js"></script>
    <script src="js/orderNow.js"></script>
    <script>
    const paypalOrder = () => {

        document.getElementById("order-name").value = "onlyPlacement";
        // document.getElementById("orderForm").action = "order-details.php";
        document.getElementById("orderForm").action = "payments/paypal-order-details.php";

        if (validateForm1() != false) {
            document.getElementById("orderForm").submit();
        }

    }
    const ccAvenueOrder = () => {

        document.getElementById("order-name").value = "ccAvOrder";
        document.getElementById("orderForm").action = "payments/gpwishlistOrder/payment.php";

        if (validateForm1() != false) {
            document.getElementById("orderForm").submit();
        }

    }

    const payLaterOrder = () => {
        // alert('Hi');

        document.getElementById("order-name").value = "onlyPlacement";

        document.getElementById("orderForm").action = "payments/paylater-payment.php";
        // document.getElementById("orderForm").submit();
        if (validateForm1() != false) {
            document.getElementById("orderForm").submit();
        }

    }


    const paypalOrder2 = () => {
        document.getElementById("order-name2").value = "placementWithArticle";
        // document.getElementById("orderForm2").action = "order-details-with-creation.php";
        // document.getElementById("orderForm2").action = "order-details.php";
        document.getElementById("orderForm2").action = "payments/paypal-order-details.php";

        if (validateForm2() != false) {
            document.getElementById("orderForm2").submit();
        }

    }


    const payLaterOrder2 = () => {
        // alert('Hi');

        document.getElementById("order-name2").value = "placementWithArticle";

        document.getElementById("orderForm2").action = "payments/paylater-payment.php";
        // document.getElementById("orderForm").submit();
        if (validateForm2() != false) {
            document.getElementById("orderForm2").submit();
        }

    }
    </script>



    <script>
    window.onload = function() {
        var d = new Date().getTime();
        document.getElementById("tid").value = d;
    };
    </script>
    <script>
    window.onload = function() {
        var d = new Date().getTime();
        document.getElementById("tid2").value = d;
    };
    </script>
</body>

</html>