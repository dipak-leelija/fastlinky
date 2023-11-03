<?php
session_start();
require_once "includes/constant.inc.php";
require_once "includes/content.inc.php";
require_once "includes/registration.inc.php";

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
if (isset($_GET['msg'])) {
    $response = $_GET['msg'];
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

    <!-- Plugins Files -->
    <link href="<?= URL ?>/plugins/bootstrap-5.2.0/css/bootstrap.css" rel="stylesheet" />
    <?php require_once ROOT_DIR.'/plugins/font-awesome/fontawesome.php'?>

    <!-- Custom CSS -->
    <link href="<?= URL ?>/css/style.css" rel='stylesheet' type='text/css' />
    <link href="<?= URL ?>/css/guest-post-offer.css" rel='stylesheet' type='text/css' />
    <link href="<?= URL ?>/css/package-summary.css" rel='stylesheet' type='text/css' />
    <link href="<?= URL ?>/css/form.css" rel='stylesheet' type='text/css' />
</head>

<body>
    <div>
        <section class="order-summary-section pb-4 px-3 px-md-0">
            <div class="container">

                <form id="paymentForm" name="paymentForm" action="" method="POST">
                    <div class="row">
                        <div class="col-lg-7 d-flex align-items-center p-4">
                            <?php
                                if ($response != '' ) {
                                    echo 
                                    "<div class=\"border border-danger text-center fw-bold text-danger py-2 mb-2\">
                                    {$response}
                                    </div>";
                                }
                                ?>
                            <div class="row">
                                <h4 class="pb-2 mb-4 text-center">Billing Details</h4>
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
                                        <input type="text"
                                            onkeypress="return event.charCode >= 48 && event.charCode <= 57"
                                            minlength="10" pattern="[0-9]+" maxlength="10" class="form-control"
                                            id="mob-no" name="mob-no" value="<?php echo $cusDtl[0][34]; ?>" required>
                                    </div>
                                </div>
                                <div class="col-sm-6 mb-3">
                                    <div class="form-group">
                                        <label class="required-field" for="country">Country</label>
                                        <select class="form-control" name="country" id="" onchange="getStateList(this)"
                                            required>
                                            <option value="" disabled selected>Select Country</option>
                                            <?php
												    $utility->populateDropDown($cusDtl[0][30], 'id', 'name', 'countries');
                                                ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-6 mb-3">
                                    <div class="form-group">
                                        <label class="required-field" for="pin-code">PIN Code</label>
                                        <input type="text"
                                            onkeypress="return event.charCode >= 48 && event.charCode <= 57"
                                            minlength="6" pattern="[0-9]+" maxlength="6" class="form-control"
                                            id="pin-code" name="pin-code" value="<?php echo $cusDtl[0][29]; ?>"
                                            required>
                                    </div>
                                </div>

                                <div class="col-sm-6 mb-3">
                                    <div class="form-group">
                                        <label class="required-field" for="state">State</label>
                                        <select class="form-control" name="state" id="stateId"
                                            onchange="getCitiesList(this)" required>
                                            <option value="" disabled selected>Select Country First</option>
                                            <?php
                                                if ($cusDtl[0][30] != '') {
                                                    $utility->populateDropDown2($cusDtl[0][28], 'id', 'name', 'country_id', $cusDtl[0][30], 'states');
                                                }
                                                ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-6 mb-3">
                                    <div class="form-group">
                                        <label class="required-field" for="city">City</label>
                                        <select class="form-control" name="city" id="city" required>
                                            <option value="" disabled selected>Select City</option>
                                            <?php
                                                if ($cusDtl[0][28] != '') {
                                                    $utility->populateDropDown2($cusDtl[0][27], 'id', 'name', 'state_id', $cusDtl[0][28], 'cities');
                                                }
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
                                    <div class="d-flex justify-content-start p-4 ps-0">
                                        <button type="button" class="btn btn-secondary d-none d-lg-block" onclick="goback()">
                                            Previous Page
                                        </button>
                                    </div>

                                    <div class="form-group">
                                        <div class="">
                                            <div class="row row justify-content-evenly">
                                                <!-- card 1 -->
                                                <?php
                                                    // echo count(($_POST[0]));exit;
                                                    // $totalCost      = 00.00;
                                                    $grossTotal     = 00.00;
                                                    $totalPayable   = 00.00;
                                                    $totalDiscount  = 00.00;
                                                    foreach ($_SESSION[PACK_ORD] as $index => $packId) {

                                                        $pack           = $GPPackage->packDetailsById($packId);
                                                        $itemPrice      = $pack['price'];

                                                        $packCat        = $GPPackage->packCatById($pack['category_id']);
                                                        $features       = $GPPackage->featureByPackageId($packId);

                                                        $packFullName   = $packCat['category_name'].' '.$pack['package_name'];
                                                        $discountp       = $packCat['discount'];
                                                        $discount = intval($discountp);
                                                        $discountedAmount = ($discount / 100) * $itemPrice;

                                                        $selectedPacks[]    = $packFullName;
                                                        $packsCosts[]       = $itemPrice;
                                                        $discounts[]        = $discountp;

                                                        $grossTotal     += $itemPrice;
                                                        $totalPayable   += ($itemPrice - $discountedAmount);
                                                        $totalDiscount  += $discountedAmount;


                                                    ?>
                                                <?php
                                                    }
                                                    ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-5 order-details-right d-flex">
                            <div class="d-flex flex-column justify-content-between w-100">

                                <div class="invoice-items" id="preview">
                                    <h2 class="mb-4">Summary</h2>
                                    <div class="cart-contents">
                                        <?php
                                            if (count($selectedPacks) == count($packsCosts)) {
                                                for ($i=0; $i < count($packsCosts); $i++) {
                                                    $selectedPacks[$i];
                                                    $packsCosts[$i];
                                                    $discounts[$i];
                                                ?>
                                        <div class="mb-4 d-flex justify-content-between">
                                            <div>
                                                <div class="text-500 text-start"><?= $selectedPacks[$i]; ?></div>
                                                <?php
                                                if (!empty($discounts[$i]) || $discounts[$i] > 0) {
                                                    echo '<div class="text-500 text-muted text-start">Discount</div>';
                                                }
                                                ?>
                                                <div><span class="me-1 text-muted text-start">Qty</span>1</div>
                                            </div>
                                            <div>
                                                <div class="text-end text-500"><?= CURRENCY.$packsCosts[$i]; ?></div>
                                                <?php
                                                if (!empty($discounts[$i]) || $discounts[$i] > 0) {
                                                    echo "<div>{$discounts[$i]}</div>";
                                                }
                                                ?>
                                            </div>

                                        </div>
                                        <?php
                                                }
                                            }?>
                                    </div>
                                </div>

                                <div class="form-group total_cart">

                                    <hr>
                                    <!-- Show total and payment terms -->
                                    <div class="mb-1 d-flex justify-content-between">
                                        <div class="text-start">
                                            <p>Gross Total</p>
                                        </div>
                                        <div class="text-end">
                                            <p><?= CURRENCY.$grossTotal; ?></p>
                                        </div>
                                    </div>

                                    <div class="mb-1 d-flex justify-content-between">
                                        <div class="text-start">
                                            Discount
                                        </div>
                                        <div class="text-end">
                                            <?= "-{$totalDiscount}";?>
                                        </div>
                                    </div>

                                    <div class="mb-4 d-flex justify-content-between">
                                        <div class="text-start">
                                            <h2 class="text-500">Net Pay</h2>
                                        </div>
                                        <div class="text-end">    
                                            <h2 class="text-500"><?php echo CURRENCY.$totalPayable; ?></h2>
                                        </div>
                                    </div>

                                    <hr>

                                    <button type="button" id="continue-btn" class="btn btn-primary w-100">
                                        Continue
                                    </button>
                                    <button type="button" class="btn btn-secondary w-100 mt-2 d-block d-lg-none" onclick="goback()">
                                            Previous Page
                                        </button>
                                </div>

                            </div>
                        </div>
                    </div>
                </form>
            </div>

        </section>
    </div>
    <!-- /Footer -->
    <script src="<?= URL ?>/plugins/bootstrap-5.2.0/js/bootstrap.js"></script>
    <script src="<?= URL ?>/js/jquery-2.2.3.min.js"></script>
    <script src="<?= URL ?>/js/script.js"></script>
    <script>
    let continueBtn = document.getElementById('continue-btn');

    continueBtn.addEventListener("click", function() {
        document.getElementById("paymentForm").action = "cheakout/package-order-summary.php";
        if (checkAddress("paymentForm") != false) {
            document.getElementById("paymentForm").submit();
        }
    });


    const checkAddress = (formName) => {
        var elements = document.forms[formName].elements;
        for (i = 0; i < elements.length; i++) {
            console.log(elements[i]);
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