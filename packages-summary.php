<?php
require_once "includes/constant.inc.php";
require_once "includes/content.inc.php";
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
$customer		= new Customer();
$utility		= new Utility();
$uMesg 			= new MesgUtility();
$uImg 			= new ImageUtility();
$uNum 			= new NumUtility();
$faqs		    = new faqs();
######################################################################################################################
$typeM		    = $utility->returnGetVar('typeM','');
//user id
$cusId		    = $utility->returnSess('userid', 0);
$currentPage    = $utility->setCurrentPageSession();

if (!isset($_SESSION[PACK_ORD])) {
    header('Location: customer-packages.php' );
    exit;   
}

$response = '';
if (isset($_POST['update-address'])) {
    // print_r($_POST);exit;
    
    $fname      = $_POST["firstname"];
    $lname      = $_POST["lastName"];
    $city       = $_POST["city"];
    $state      = $_POST["state"];
    $mobile     = $_POST["mob-no"];
    $pincode    = $_POST["pin-code"];
    $country    = $_POST["country"];
   
    $response = $customer->updateAddrDuringPackOrd($cusId, $fname, $lname, $city, $pincode, $state, $country, $mobile);

}

$cusDtl         = $customer->getCustomerData($cusId);
require_once ROOT_DIR."/includes/check-customer-login.inc.php";




?>

<!DOCTYPE HTML>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="<?php echo FAVCON_PATH?>" type="image/png" />
    <link rel="apple-touch-icon" href="<?php echo FAVCON_PATH?>" />
    <title>Managed Link Building, Blogger Outreach: <?php echo COMPANY_S; ?></title>
    <meta name="description" content="" />
    <meta name="keywords" content="" />

    <link rel="stylesheet" href="plugins/bootstrap-5.2.0/css/bootstrap.css">
    <link rel="stylesheet" href="plugins/fontawesome-6.1.1/css/all.css">
    <!-- Custom CSS -->
    <link href="css/style.css" rel='stylesheet' type='text/css' />
    <link href="css/guest-post-offer.css" rel='stylesheet' type='text/css' />
    <link href="css/package-summary.css" rel='stylesheet' type='text/css' />
    <link href="css/form.css" rel='stylesheet' type='text/css' />


    <!-- font-awesome icons -->
    <link href="css/fontawesome-all.min.css" rel="stylesheet">
    <!-- //Custom Theme files -->
</head>

<body data-scrollbar>
    <div id="home">
        <?php require_once "partials/navbar.php"; ?>

        <section class="order-summary-section pb-4">
            <div class="container">

                <div class="row">
                    <div class="col-lg-7 p-4">
                        <div class="">
                            <?php
                            if ($response != '' ) {
                                echo $response;
                            }
                            ?>
                            <form id="addressForm" name="addressForm" action="<?php $_SERVER['PHP_SELF']?>"
                                method="POST">
                                <div class="row">
                                    <h4 class="pb-2">Billing Details:</h4>
                                    <div class="col-sm-6 mb-3">
                                        <div class="form-group">
                                            <label class="required-field" for="firstname">First Name</label>
                                            <input type="text" minlength="4" class="form-control" id="firstname"
                                                name="firstname" value="<?php echo $cusDtl[0][5]; ?>" required>
                                        </div>
                                    </div>

                                    <div class="col-sm-6 mb-3">
                                        <div class="form-group">
                                            <label for="lastName">Last Name</label>
                                            <input type="text" minlength="4" class="form-control" id="lastName"
                                                name="lastName" value="<?php echo $cusDtl[0][6]; ?>" required>
                                        </div>
                                    </div>

                                    <div class="col-sm-6 mb-3">
                                        <div class="form-group">
                                            <label class="required-field" for="email">Email</label>
                                            <input type="email" class="form-control" id="email" name="email"
                                                value="<?php echo $cusDtl[0][3]; ?>" disabled required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 mb-3">
                                        <div class="form-group">
                                            <label class="required-field" for="mob-no">Mob No</label>
                                            <input type="number" class="form-control" id="mob-no" name="mob-no"
                                                value="<?php echo $cusDtl[0][34]; ?>" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 mb-3">
                                        <div class="form-group">
                                            <label class="required-field" for="city">City</label>
                                            <select class="form-control" name="city" id="city" required>
                                                <option value="" disabled selected>Select City</option>
                                                <?php
												    $utility->populateDropDown($cusDtl[0][27], 'id', 'city', 'cities');
												?>
                                                <option value="0">Others</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 mb-3">
                                        <div class="form-group">
                                            <label class="required-field" for="pin-code">PIN Code</label>
                                            <input type="number" class="form-control" id="pin-code" name="pin-code"
                                                value="<?php echo $cusDtl[0][29]; ?>" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 mb-3">
                                        <div class="form-group">
                                            <label class="required-field" for="state">State</label>
                                            <select class="form-control" name="state" id="state" required>
                                                <option value="" disabled selected>Select State</option>
                                                <?php
                                                    // $utility->populateDropDown2($cusDtl[0][28], 'state_id', 'state_name', 'country_id', $cusDtl[0][30], 'states');
												    $utility->populateDropDown($cusDtl[0][28], 'state_id', 'state_name', 'states');
                                                ?>
                                                <option value="0">Others</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 mb-3">
                                        <div class="form-group">
                                            <label class="required-field" for="country">Country</label>
                                            <select class="form-control" name="country" id="" required>
                                                <option value="" disabled selected>Select Country</option>
                                                <?php
												    $utility->populateDropDown($cusDtl[0][30], 'id', 'country_name', 'countries');
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 mb-3">
                                        <small class="fw-normal">
                                            Please ensure that you provide accurate and complete information to
                                            avoid any
                                            delays or issues with your order. Once you have reviewed and submitted
                                            your
                                            details you can place order.
                                        </small>
                                        <div class="d-flex justify-content-evenly p-4">
                                            <button type="button" class="btn btn-secondary" onclick="goback()">Previous Page</button>
                                            <button type="submit" class="btn btn-secondary" name="update-address">Update
                                                Address</button>
                                        </div>

                                        <div class="form-group">
                                            <div class="">
                                                <div class="row row justify-content-evenly">
                                                    <!-- card 1 -->
                                                    <?php
                                                    // echo count(($_POST[0]));exit;
                                                    $totalCost = '00.00';
                                                    foreach ($_SESSION[PACK_ORD] as $index => $packId) {

                                                        $pack           = $GPPackage->packDetailsById($packId);
                                                        $packCat        = $GPPackage->packCatById($pack['category_id']);
                                                        $features       = $GPPackage->featureByPackageId($packId);

                                                        $packFullName   = $packCat['category_name'].' '.$pack['package_name'];

                                                        $selectedPacks[]    = $packFullName;
                                                        $packsCosts[]       = $pack['price'];
                                                        $totalCost += $pack['price'];
                                                    ?>
                                                    <!-- <div class="col-md-4 px-md-2"> -->
                                                    <!-- <div class="card price-card-wrapper" id=""> -->

                                                    <p class="pricing-title"><?php //echo $packFullName; ?></p>
                                                    <!-- <ul class=""> -->
                                                    <!-- <li> <strong><?php //echo $pack['blog_post'];?> Blog Post</strong> </li> -->
                                                    <?php
                                                                // foreach ($features as $eachfeature) {
                                                                //     echo '<li>'. $eachfeature['features'].'</li>';
                                                                // }
                                                                ?>

                                                    <!-- </ul> -->
                                                    <!-- </div> -->
                                                    <!-- </div> -->
                                                    <?php
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                    <div class="col-lg-5 order-details-right">
                        <div>
                            <form id="paymentForm" action="" method="POST">
                                <div class="">
                                    <div class="invoice-items" id="preview">
                                        <h2 class="mb-4">Summary</h2>
                                        <div class="cart-contents">
                                            <?php
                                                if (count($selectedPacks) == count($packsCosts)) {
                                                    for ($i=0; $i < count($packsCosts); $i++) {
                                                        $selectedPacks[$i];
                                                        $packsCosts[$i];
                                                    ?>
                                            <div class="mb-4 d-flex justify-content-between">
                                                <div>
                                                    <div class="text-500"><?php echo $selectedPacks[$i]; ?></div>
                                                    <div>
                                                        <span class="me-1 text-muted">Qty</span>
                                                        1
                                                    </div>
                                                </div>
                                                <div class="text-right text-500">
                                                    <?php echo CURRENCY.$packsCosts[$i]; ?>
                                                </div>
                                            </div>
                                            <?php
                                                    }
                                            }?>
                                            <hr>
                                            <!-- Show total and payment terms -->
                                            <div class="mb-4 d-flex justify-content-between">
                                                <div>
                                                    <div class="text-500">Total</div>
                                                    <div class="text-muted"><?php echo CURRENCY_CODE; ?></div>
                                                </div>
                                                <div class="text-right">
                                                    <h2 class="m-0"><?php echo CURRENCY.$totalCost; ?></h2>
                                                    <div class="mt-1 text-muted small">
                                                        <?php echo CURRENCY.$totalCost; ?> Total Cost</div>
                                                </div>
                                            </div>
                                            <hr>
                                        </div>
                                    </div>

                                    <div class="box-payment-btn">
                                        <div class="bx_width_40">
                                            <input type="hidden" name="order-name" id="order-name">
                                            <div class="form-group myformgrp">
                                                <button type="button" onclick="paypalOrder()" class="paypalBtn">
                                                    <span class="paypal_logo"><img src="images/payments/paypal-logo.png"
                                                            alt=""></span>
                                                    <span class="pay">Pay</span><span class="pal">Pal</span>
                                                </button>
                                            </div>

                                            <!-- <div class="form-group myformgrp">
                                                <button type="submit" class="cardBtn" id="orderNowCcavenue"
                                                    onclick="ccAvenueOrder2()">
                                                    <span class="masterCard"><img
                                                            src="images/payments/masterCard.png"></span>
                                                    <span class="visaCard"><img
                                                            src="images/payments/visaCard.png"></span>
                                                    <span> Credit or Debit Card</span>
                                                </button>
                                            </div> -->

                                            <div class="form-group myformgrp">
                                                <button type="button" class="payLaterBtn" onclick="payLaterOrder()">
                                                    <span class="paylater_logo"><img
                                                            src="images/payments/pay-later.png"></span>
                                                    <span> PayLater</span>
                                                </button>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
        </section>
    </div>
    <!-- /Footer -->
    <script src="plugins/bootstrap-5.2.0/js/bootstrap.js"></script>
    <script src="js/jquery-2.2.3.min.js"></script>
    <script src="js/script.js"></script>
    <script>
    const paypalOrder = () => {
        document.getElementById("paymentForm").action = "cheakout/paypal-pay.php";
        if (checkAddress("addressForm") != false) {
            document.getElementById("paymentForm").submit();
        }
    }

    const payLaterOrder = () => {
        document.getElementById("paymentForm").action = "cheakout/paylater-order.php";
        if (checkAddress("addressForm") != false) {
            document.getElementById("paymentForm").submit();
        }
    }



    const checkAddress = (formName) => {
        var elements = document.forms[formName].elements;
        for (i = 0; i < elements.length; i++) {
            let type = elements[i].type;
            if (type != 'button' && type != 'submit') {
                if (elements[i].value == '') {
                    alert('Please Fill The Complete Biling Address!');
                    return false;
                }
            }

        }
    }
    </script>
</body>

</html>