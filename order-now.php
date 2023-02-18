<?php
session_start();
// var_dump($_SESSION);
//include_once('checkSession.php');
require_once "_config/dbconnect.php";
require_once "_config/dbconnect.trait.php";

require_once "includes/constant.inc.php";
require_once "classes/date.class.php";
require_once "classes/error.class.php";
require_once "classes/search.class.php";
require_once "classes/customer.class.php";
require_once "classes/blog_mst.class.php";
require_once "classes/utility.class.php";
require_once "classes/utilityMesg.class.php";
require_once "classes/utilityImage.class.php";
require_once "classes/utilityNum.class.php";

/* INSTANTIATING CLASSES */

$dateUtil       = new DateUtil();
$error 			= new Error();
$search_obj	    = new Search();
$customer		= new Customer();

//$ff				= new FrontPhoto();
$blogMst		= new BlogMst();
$utility		= new Utility();
$uMesg 			= new MesgUtility();
$uImg 			= new ImageUtility();
$uNum 			= new NumUtility();
######################################################################################################################
$typeM		= $utility->returnGetVar('typeM','');
//user id
$cusId		= $utility->returnSess('userid', 0);
$cusDtl		= $customer->getCustomerData($cusId);

$id = $_GET['id'];

$_SESSION['reorder-page'] = $utility->currentUrl();

if($cusId == 0){
    $_SESSION['orderNow']= 'orderNow';
    $_SESSION['orderNowId']= 'orderNow';  
    header("Location: login.php");
    exit;
}

if($cusDtl[0][0] == 2){
    header("Location: dashboard.php");
    exit;
}

//echo $cusId;exit;
$blogsDtls 	= $blogMst->ShowUserBlogData($cusDtl[0][2]);

$wishListsingleData = $blogMst->showBlog($id);

$currency  = "$";
$contetCreation= 15;

$contentPlacementPrice = $wishListsingleData[9]+$wishListsingleData[16];
$contetCreationPlacementPrice = $contetCreation +  $contentPlacementPrice;

$_SESSION['domainName'] = $wishListsingleData[0];
$_SESSION['sitePrice']  = $contentPlacementPrice;
$_SESSION['ConetntCreationPlacementPrice']  = $contetCreationPlacementPrice;


// Variable decleared to fetch content from session  
$SESSclientContent      ='';
$SESSclientAnchorText   ='';
$SESSclientTargetUrl    ='';
$SESSclientRequirement  ='';
// cheaking session id to fetch content if exists  
if (isset($_SESSION['order-data'])) {
    $SESSclientContent      = $_SESSION['order-data']['clientContent'];
    $SESSclientAnchorText   =  $_SESSION['order-data']['clientAnchorText'];
    $SESSclientTargetUrl    =  $_SESSION['order-data']['clientTargetUrl'];
    $SESSclientRequirement  =  $_SESSION['order-data']['clientRequirement'];

}
?>
<!DOCTYPE HTML>
<html lang="zxx">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $wishListsingleData[0]; ?> - Order | <?php echo COMPANY_S; ?></title>
    <link rel="shortcut icon" href="<?php echo FAVCON_PATH?>" type="image/png" />
    <link rel="apple-touch-icon" href="<?php echo FAVCON_PATH?>" />

    <!-- Bootstrap Core CSS -->
    <link href="plugins/bootstrap-5.2.0/css/bootstrap.css" rel='stylesheet' type='text/css' />
    <link href="plugins/fontawesome-6.1.1/css/all.css" rel='stylesheet' type='text/css' />

    <!-- Custom CSS -->
    <link href="css/style.css" rel='stylesheet' type='text/css' />
    <link href="css/leelija.css" rel='stylesheet' type='text/css' />
    <link href="css/form.css" rel='stylesheet' type='text/css' />
    <link href="css/dashboard.css" rel='stylesheet' type='text/css' />
    <link href="css/order-now.css" rel='stylesheet' type='text/css' />

    <!-- font-awesome icons -->
    <link href="css/fontawesome-all.min.css" rel="stylesheet">

    <!--webfonts-->
    <link href="//fonts.googleapis.com/css?family=Ubuntu:300,300i,400,400i,500,500i,700,700i" rel="stylesheet">
    <!--//webfonts-->
    <link href="//fonts.googleapis.com/css?family=Montserrat:400,500,600,700,900" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Nunito+Sans:400,700,900" rel="stylesheet">
</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">
    <div id="home">

        <!-- navbar start -->
        <?php require_once 'partials/navbar.php'; ?>
        <!-- navbar end -->

        <!-- main section start -->
        <div class="edit_profile pb-5">
            <div class="container-fluid">
                <!--Row start-->
                <div class="row ">

                    <!-- right side start  -->
                    <div class="col-md-3 hidden-xs display-table-cell v-align" id="navigation">

                        <div class="client_profile_dashboard_left">
                            <?php include("dashboard-inc.php");?>
                            <hr class="myhrline">
                        </div>

                    </div>
                    <!-- right side end  -->

                    <!-- left side start  -->
                    <div class="col-md-9  ps-md-0  display-table-cell v-align client_profile_dashboard_right">
                        <div class="adding-border-css">
                            <!-- placement selection button section start -->
                            <div class="row">
                                <div class="col-sm-6">
                                    <button class="btn btn-primary" id="contentPlaceMent">
                                        Content Placement(<?php echo $contentPlacementPrice;?>)
                                    </button>

                                    <div class="siteName">
                                        <p><?php echo  $wishListsingleData[0];  ?></p>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <button class="btn btn-primary" id="contentCreationPlacement">
                                        Content Creation And Placement(<?php echo $contetCreationPlacementPrice;?>)
                                    </button>
                                    <div>
                                        <p class="estimatedDate">Estimated completion:
                                            <?php echo date('jS M Y',strtotime("+3 day"));?></p>
                                        <p class="deviveryDt">Approx 3 days after order confirmation</p>
                                    </div>
                                </div>
                            </div>
                            <!-- placement selection button section end -->

                            <hr class="border-primary">

                            <!-- contentPlacement start here -->
                            <div class="contentPlacement">
                                <form method="post" id="orderForm" name="contentPlacementForm">
                                    <div class="form-group">
                                        <label for="">Your Content<span class="warning">*</span> (Must be a minimum of
                                            500 words) Don't have a content, get one here
                                            Place your content here. In your content, you can include up to 2 links They
                                            can be in the form of URLs and anchors. In the "URL" and "Anchor text"
                                            fields below,
                                            please insert the same URLs and anchors. <span class="warning">(Don't add
                                                any images in your article)</span></label>
                                        <div class="form-group">
                                            <textarea class="form-control" name="clientContent1" id="" rows="9"
                                                placeholder="Put your content here"><?php echo $SESSclientContent; ?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="clientTargetUrl1">
                                            <h5>Target Url<span class="warning">*</span></h5>
                                            <p>Enter the URL that you have included in your content above</p>
                                        </label>
                                        <input type="text" class="form-control" aria-describedby="Target Url"
                                            placeholder="Enter Your Target URL" name="clientTargetUrl1"
                                            value="<?php echo $SESSclientTargetUrl; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="clientAnchorText1">
                                            <h5>Anchor Text<span class="warning"> *</span></h5>
                                            <p> Enter the anchor text that you have included in your content above.</p>
                                        </label>
                                        <input type="text" class="form-control" placeholder="Enter Your Anchor Text"
                                            name="clientAnchorText1" value="<?php echo $SESSclientAnchorText; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="clientRequirement1">
                                            <h5>Special requirements</h5>
                                            <p>If necessary, Write all your task requirements here, e. g., content
                                                requirements, Category, deadline, necessity of disclosure, preferences
                                                regarding content placement, etc.</p>
                                        </label>
                                        <textarea class="form-control" rows="6"
                                            name="clientRequirement1"><?php echo $SESSclientRequirement; ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="tid" name="tid" value="">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control d-none" id="blogId" name="blogId"
                                            value="<?php echo $_GET['id']?>">
                                    </div>

                                    <input type="hidden" name="order-name" id="order-name">

                                </form>

                                <div class="box-payment-btn">
                                    <div class="bx_width_40">

                                        <div class="form-group">
                                            <button type="submit" onclick="paypalOrder()" class="paypalBtn">
                                                <span class="paypal_logo"><img src="images/payments/paypal-logo.png"
                                                        alt=""></span>
                                                <span class="pay">Pay</span><span class="pal">Pal</span>
                                            </button>
                                        </div>

                                        <div class="form-group">
                                            <button type="submit" class="cardBtn" id="orderNowCcavenue"
                                                onclick="ccAvenueOrder()">
                                                <span class="masterCard"><img
                                                        src="images/payments/masterCard.png"></span>
                                                <span class="visaCard"><img src="images/payments/visaCard.png"></span>
                                                <span> Credit or Debit Card</span>
                                            </button>
                                        </div>

                                        <div class="form-group">
                                            <button type="submit" class="payLaterBtn" onclick="payLaterOrder()">
                                                <span class="paylater_logo"><img
                                                        src="images/payments/pay-later.png"></span>
                                                <span> PayLater</span>
                                            </button>
                                        </div>
                                    </div>

                                </div>


                            </div>
                            <!-- contentPlacement end here -->

                            <!-- contentCreationPlacement start here -->
                            <div class="contentCreationPlacement">
                                <form method="post" name="contentCreationPlacementForm" id="orderForm2">

                                    <!-- action="order-details2.php?domainName2=<?php echo $wishListsingleData[0];?>&sitePrice2=<?php echo $contetCreationPlacement; ?>" -->

                                    <div class="form-group">
                                        <label for="clientTargetUrl2">
                                            <h5>Target Url<span class="warning"> *</span></h5>
                                            <p>Enter The URL That You Have Included In Your Content Above</p>
                                        </label>
                                        <input type="text" class="form-control" aria-describedby="clientTargetUrl2"
                                            placeholder="Enter Your Target URL" name="clientTargetUrl2"
                                            value="<?php echo $SESSclientTargetUrl; ?>">
                                    </div>


                                    <div class="form-group">
                                        <label for="clientAnchorText2">
                                            <h5>Anchor Text<span class="warning">*</span></h5>
                                            <p> Enter the anchor text that you have included in your content above.</p>
                                        </label>
                                        <input type="text" class="form-control" aria-describedby="clientAnchorText2"
                                            placeholder="Enter the Anchor text" name="clientAnchorText2"
                                            value="<?php echo $SESSclientAnchorText; ?>">
                                    </div>

                                    <div class="form-group">
                                        <label for="clientRequirement2">If necessary, Write all your task
                                            requirements here, e. g., content requirements, Category, deadline,
                                            necessity of disclosure, preferences regarding content placement, etc.
                                        </label>
                                        <textarea class="form-control" rows="4"
                                            name="clientRequirement2"><?php echo $SESSclientRequirement; ?></textarea>
                                    </div>

                                    <div class="form-group">
                                        <input type="text" class="form-control" id="tid2" name="tid2" value="">
                                    </div>

                                    <input type="hidden" name="order-name2" id="order-name2">


                                    <div class="form-group">
                                        <input type="text" class="form-control d-none" id="blogId" name="blogId"
                                            value="<?php echo $_GET['id']?>">
                                    </div>

                                </form>

                                <div class="box-payment-btn">
                                    <div class="bx_width_40">

                                        <div class="form-group">
                                            <button type="submit" onclick="paypalOrder2()" class="paypalBtn">
                                                <span class="paypal_logo"><img src="images/payments/paypal-logo.png"
                                                        alt=""></span>
                                                <span class="pay">Pay</span><span class="pal">Pal</span>
                                            </button>
                                        </div>

                                        <div class="form-group">
                                            <button type="submit" class="cardBtn" id="orderNowCcavenue"
                                                onclick="ccAvenueOrder2()">
                                                <span class="masterCard"><img
                                                        src="images/payments/masterCard.png"></span>
                                                <span class="visaCard"><img src="images/payments/visaCard.png"></span>
                                                <span> Credit or Debit Card</span>
                                            </button>
                                        </div>

                                        <div class="form-group">
                                            <button type="submit" class="payLaterBtn" onclick="payLaterOrder2()">
                                                <span class="paylater_logo"><img
                                                        src="images/payments/pay-later.png"></span>
                                                <span> PayLater</span>
                                            </button>
                                        </div>
                                    </div>

                                </div>

                            </div>
                            <!-- contentCreationPlacement end here -->
                        </div>
                    </div>
                    <!-- left side end  -->

                </div>
                <!--Row end-->
            </div>
        </div>
        <!-- main section end -->

    </div>

    <!-- js-->
    <!-- //Bootstrap Core JavaScript -->
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