<?php
session_start();
require_once __DIR__ . "/includes/constant.inc.php";

require_once ROOT_DIR . "/_config/dbconnect.php";
require_once ROOT_DIR . "/includes/order-constant.inc.php";
require_once ROOT_DIR . "/classes/date.class.php";
require_once ROOT_DIR . "/classes/error.class.php";
require_once ROOT_DIR . "/classes/search.class.php";
require_once ROOT_DIR . "/classes/customer.class.php";
require_once ROOT_DIR . "/classes/blog_mst.class.php";
require_once ROOT_DIR . "/classes/utility.class.php";
require_once ROOT_DIR . "/classes/utilityMesg.class.php";
require_once ROOT_DIR . "/classes/utilityImage.class.php";
require_once ROOT_DIR . "/classes/utilityNum.class.php";

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
    $_SESSION['orderNowId']= $id;  
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

$contentPlacementPrice = $wishListsingleData[9]+$wishListsingleData[16];
$contetCreationPlacementPrice = CONTENTPRICE +  $contentPlacementPrice;

$_SESSION['domainName']     = $wishListsingleData[0];
$_SESSION['sitePrice']      = $contentPlacementPrice;
$_SESSION['ConetntCreationPlacementPrice']  = $contetCreationPlacementPrice;


// Variable decleared to fetch content from session  
$SESSclientContentTitle = '';

$SESSclientContent      = '';
$SESScontentText        = '';

$SESSclientAnchorText   = '';
$SESSclientTargetUrl    = '';

$SESSreferenceAnchor1   = '';
$SESSreferenceUrl1      = '';
$SESSreferenceAnchor2   = '';
$SESSreferenceUrl2      = '';

$SESSclientRequirement  = '';

// cheaking session id to fetch content if exists  
if (isset($_SESSION['content-data'])) {
    
    $SESSclientContentTitle = $_SESSION['content-data']['contentTitle'];
    $SESSclientAnchorText   = $_SESSION['content-data']['clientAnchorText'];
    $SESSclientTargetUrl    = $_SESSION['content-data']['clientTargetUrl'];
    $SESSreferenceAnchor1   = $_SESSION['content-data']['reference-anchor1'];
    $SESSreferenceUrl1      = $_SESSION['content-data']['reference-url1'];
    $SESSreferenceAnchor2   = $_SESSION['content-data']['reference-anchor2'];
    $SESSreferenceUrl2      = $_SESSION['content-data']['reference-url2'];
    $SESSclientRequirement  = $_SESSION['content-data']['clientRequirement'];

    
    if (isset($_SESSION['content-data']['clientContent'])) {
        $SESScontentText      = $_SESSION['content-data']['clientContent'];
    
    }
}
?>
<!DOCTYPE HTML>
<html lang="zxx">

<head>
    <meta name="robots" content="noindex,nofollow">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $wishListsingleData[0]; ?> - Order | <?php echo COMPANY_S; ?></title>
    <link rel="shortcut icon" href="<?php echo FAVCON_PATH?>" type="image/png" />
    <link rel="apple-touch-icon" href="<?php echo FAVCON_PATH?>" />

    <!-- Bootstrap Core CSS -->
    <link href="plugins/bootstrap-5.2.0/css/bootstrap.css" rel='stylesheet' type='text/css' />
    <link href="<?php echo URL;?>/plugins/fontawesome-free-6.4.0/css/all.min.css" rel='stylesheet' type='text/css' />
    <link href="<?php echo URL;?>/plugins/fontawesome-free-6.4.0/css/fontawesome.min.css" rel='stylesheet'
        type='text/css' />
    <!-- <link href="plugins/fontawesome-6.1.1/css/all.css" rel='stylesheet' type='text/css' /> -->

    <!-- Custom CSS -->
    <link href="css/style.css" rel='stylesheet' type='text/css' />
    <link href="css/leelija.css" rel='stylesheet' type='text/css' />
    <link href="css/form.css" rel='stylesheet' type='text/css' />
    <link href="css/dashboard.css" rel='stylesheet' type='text/css' />
    <link href="css/order-now.css" rel='stylesheet' type='text/css' />

    <!-- font-awesome icons -->
    <!-- <link href="css/fontawesome-all.min.css" rel="stylesheet"> -->

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
                                        Content Placement(<?= $contentPlacementPrice;?>)
                                    </button>

                                    <div class="siteName">
                                        <p><?= $wishListsingleData[0];  ?></p>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <button class="btn btn-primary" id="contentCreationPlacement">
                                        Content Creation And Placement(<?= $contetCreationPlacementPrice;?>)
                                    </button>
                                    <div>
                                        <p class="estimatedDate">Estimated completion:
                                            <?= date('jS M Y',strtotime("+3 day"));?></p>
                                        <p class="deviveryDt">Approx 3 days after order confirmation</p>
                                    </div>
                                </div>
                            </div>
                            <!-- placement selection button section end -->

                            <hr class="border-primary">

                            <!-- contentPlacement start here -->
                            <div class="contentPlacement">
                                <form method="post" id="orderForm" name="contentPlacementForm"
                                    enctype="multipart/form-data">

                                    <div class="form-group">
                                        <label for="clientContentTitle1">
                                            <h5>Title</h5>
                                        </label>
                                        <input type="text" class="form-control" placeholder="Enter the article title"
                                            name="clientContentTitle1" value="<?= $SESSclientContentTitle; ?>">
                                    </div>

                                    <!-- content upload section start -->
                                    <div class="content-upload">
                                        <div class="content-upload-wrap">
                                            <input class="file-upload-input" name="content-file" type='file'
                                                onchange="readURL(this);" accept=".doc, .docx" />
                                            <div class="drag-text">
                                                <p><i class="fa-sharp fa-solid fa-file-arrow-up"></i> <br>
                                                    Drag and Drop Your Content File</p>
                                            </div>
                                        </div>
                                        <div class="file-upload-content">
                                            <img class="file-upload-image" src="#" alt="your image" />
                                            <div class="image-title-wrap">
                                                <button type="button" onclick="removeUpload()"
                                                    class="remove-image d-flex justify-content-between px-3">
                                                    <span class="image-title">Uploaded Image</span>
                                                    <span><i class="fa-sharp fa-solid fa-xmark fs-5"></i></span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- content upload section end -->

                                    <!-- OR DIVIDER STARTED -->
                                    <div id="or-divider" class="bg_mustard p-2 my-4 mx-0 text-light d-none"
                                        style="border: 1px solid gainsboro;">
                                        <h5 class="text-center mb-0">OR</h5>
                                    </div>
                                    <!-- OR DIVIDER ENDED -->

                                    <!-- content text section start -->
                                    <div id="content-text">
                                        <div class="form-group d-none">
                                            <label for="">Your Content<span class="warning">*</span> (Must be a minimum
                                                of 500 words) Don't have a content, get one here
                                                Place your content here. In your content, you can include up to 2 links
                                                They can be in the form of URLs and anchors. In the "URL" and "Anchor
                                                text"
                                                fields below, please insert the same URLs and anchors. <span
                                                    class="warning">(Don't add any images in your
                                                    article)</span></label>
                                            <div class="form-group">
                                                <textarea class="form-control" name="clientContent1" id="" rows="9"
                                                    placeholder="Write or paste your content here"
                                                    onkeyup="checkContent(this)"><?php echo $SESScontentText; ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- content text section end -->

                                    <!-- hyperLinks section start -->
                                    <div class="mt-3" id="hyperLinks">
                                        <div class="row">

                                            <div class="col-md-6">
                                                <h5>Anchor Text</h5>
                                            </div>

                                            <div class="col-md-6">
                                                <h5>Target Url</h5>
                                            </div>
                                            <!-- <div class="col-md-2">
                                                <h5>Action</h5>
                                            </div> -->
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6 mb-2">
                                                <input type="text" class="form-control"
                                                    placeholder="Enter the anchor text for client url"
                                                    name="clientAnchorText1"
                                                    value="<?php echo $SESSclientAnchorText; ?>">
                                            </div>

                                            <div class="col-md-6 mb-2">
                                                <input type="text" class="form-control" aria-describedby="Target Url"
                                                    placeholder="Enter the client url" name="clientTargetUrl1"
                                                    value="<?php echo $SESSclientTargetUrl; ?>">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 mb-2">
                                                <input type="text" class="form-control"
                                                    placeholder="Enter the reference anchor text"
                                                    name="reference-anchor1"
                                                    value="<?php echo $SESSreferenceAnchor1; ?>">
                                            </div>

                                            <div class="col-md-6 mb-2">
                                                <input type="text" class="form-control"
                                                    placeholder="Enter the reference URL" name="reference-url1"
                                                    value="<?php echo $SESSreferenceUrl1; ?>">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 mb-2">
                                                <input type="text" class="form-control"
                                                    placeholder="Enter the reference anchor text"
                                                    name="reference-anchor2"
                                                    value="<?php echo $SESSreferenceAnchor2; ?>">
                                            </div>

                                            <div class="col-md-6 mb-2">
                                                <input type="text" class="form-control" aria-describedby="Target Url"
                                                    placeholder="Enter the reference URL" name="reference-url2"
                                                    value="<?php echo $SESSreferenceUrl2; ?>">
                                            </div>
                                        </div>

                                    </div>
                                    <!-- hyperLinks section start -->

                                    <div class="form-group mt-3">
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

                                        <!-- <div class="form-group">
                                            <button type="submit" class="cardBtn" id="orderNowCcavenue"
                                                onclick="ccAvenueOrder()">
                                                <span class="masterCard"><img
                                                        src="images/payments/masterCard.png"></span>
                                                <span class="visaCard"><img src="images/payments/visaCard.png"></span>
                                                <span> Credit or Debit Card</span>
                                            </button>
                                        </div> -->

                                        <div class="form-group">
                                            <button type="button" class="payLaterBtn" onclick="payLaterOrder()">
                                                <span class="paylater_logo"><img src="images/payments/pay-later.png"></span>
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

                                    <div class="form-group">
                                        <label for="clientContentTitle2">
                                            <h5>Title</h5>
                                        </label>
                                        <input type="text" class="form-control" placeholder="Enter the article title"
                                            name="clientContentTitle2" value="<?php echo $SESSclientContentTitle; ?>">
                                    </div>

                                    <!-- hyperLinks section start -->
                                    <div class="mt-3" id="hyperLinks">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h5>Anchor Text</h5>
                                            </div>

                                            <div class="col-md-6">
                                                <h5>Target Url</h5>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6 mb-2">
                                                <input type="text" class="form-control"
                                                    placeholder="Enter the anchor text for client url"
                                                    name="clientAnchorText2"
                                                    value="<?php echo $SESSclientAnchorText; ?>">
                                            </div>

                                            <div class="col-md-6 mb-2">
                                                <input type="text" class="form-control" name="clientTargetUrl2"
                                                    placeholder="Enter the client url"
                                                    value="<?php echo $SESSclientTargetUrl; ?>">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 mb-2">
                                                <input type="text" class="form-control"
                                                    placeholder="Enter the reference anchor text"
                                                    name="reference-anchor1"
                                                    value="<?php echo $SESSreferenceAnchor1; ?>">
                                            </div>

                                            <div class="col-md-6 mb-2">
                                                <input type="text" class="form-control"
                                                    placeholder="Enter the reference URL" name="reference-url1"
                                                    value="<?php echo $SESSreferenceUrl1; ?>">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 mb-2">
                                                <input type="text" class="form-control"
                                                    placeholder="Enter the reference anchor text"
                                                    name="reference-anchor2"
                                                    value="<?php echo $SESSreferenceAnchor2; ?>">
                                            </div>

                                            <div class="col-md-6 mb-2">
                                                <input type="text" class="form-control" aria-describedby="Target Url"
                                                    placeholder="Enter the reference URL" name="reference-url2"
                                                    value="<?php echo $SESSreferenceUrl2; ?>">
                                            </div>
                                        </div>

                                    </div>
                                    <!-- hyperLinks section start -->

                                    <div class="form-group">
                                        <label for="clientRequirement2">If necessary, Write all your task
                                            requirements here, e. g., content requirements, Category, deadline,
                                            necessity of disclosure, preferences regarding content placement, etc.
                                        </label>
                                        <textarea class="form-control" rows="4"
                                            name="clientRequirement2"><?php echo $SESSclientRequirement; ?></textarea>
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

                                        <!-- <div class="form-group">
                                            <button type="submit" class="cardBtn" id="orderNowCcavenue"
                                                onclick="ccAvenueOrder2()">
                                                <span class="masterCard"><img
                                                        src="images/payments/masterCard.png"></span>
                                                <span class="visaCard"><img src="images/payments/visaCard.png"></span>
                                                <span> Credit or Debit Card</span>
                                            </button>
                                        </div> -->

                                        <div class="form-group">
                                            <button type="button" class="payLaterBtn" onclick="payLaterOrder2()">
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
    <script src="js/content-upload.js"></script>


    <script>
    const paypalOrder = () => {

        let orderForm = document.getElementById("orderForm");
        let orderName = document.getElementById("order-name");

        document.getElementById("order-name").value = "onlyPlacement";
        orderForm.action = "cheakout/paypal-guest-post-order-summary.php";
        // orderForm.action = "payments/paypal-order-details.php";

        // if (validateForm1() != false) {
        //     document.getElementById("orderForm").submit();
        // }


        let contentFile = document.getElementsByName("content-file");
        let clientContent1 = document.getElementsByName("clientContent1");

        // execute if content not exists 
        if (contentFile[0].value == '' && clientContent1[0].value == '') {
            alert('Content Not Avilable');
            return false;
        }

        // execute if content file uploded 
        if (contentFile[0].value != '' && clientContent1[0].value == '') {
            // console.log('Content file exists');
            orderName.value = "onlyPlacementWithFile";

        }

        // execute if content pasted 
        if (contentFile[0].value == '' && clientContent1[0].value != '') {
            console.log('Content file exists');
            if (WordCount(contentFile[0].value) < 500) {
                alert('Your content Should contain minimum 500words');
            } else {
                orderName.value = "onlyPlacementWithText";
            }
        }

        orderForm.submit();

    }

    // const ccAvenueOrder = () => {

    //     document.getElementById("order-name").value = "ccAvOrder";
    //     document.getElementById("orderForm").action = "payments/gpwishlistOrder/payment.php";

    //     if (validateForm1() != false) {
    //         document.getElementById("orderForm").submit();
    //     }

    // }

    const payLaterOrder = () => {
        let orderForm = document.getElementById("orderForm");
        let orderName = document.getElementById("order-name");

        orderForm.action = "./cheakout/paylater-guest-post-order.php";

        let contentFile = document.getElementsByName("content-file");
        let clientContent1 = document.getElementsByName("clientContent1");

        // execute if content not exists 
        if (contentFile[0].value == '' && clientContent1[0].value == '') {
            alert('Content Not Avilable');
            return false;
        }

        // execute if content file uploded 
        if (contentFile[0].value != '' && clientContent1[0].value == '') {
            // console.log('Content file exists');
            orderName.value = "onlyPlacementWithFile";

        }

        // execute if content pasted 
        if (contentFile[0].value == '' && clientContent1[0].value != '') {
            console.log('Content file exists');
            if (WordCount(contentFile[0].value) < 500) {
                alert('Your content Should contain minimum 500words');
            } else {
                orderName.value = "onlyPlacementWithText";
            }
        }

        orderForm.submit();

    }


    const paypalOrder2 = () => {
        document.getElementById("order-name2").value = "placementWithArticle";
        document.getElementById("orderForm2").action = "cheakout/paypal-guest-post-order-summary.php";


        if (validateForm2() != false) {
            document.getElementById("orderForm2").submit();
        }

    }


    const payLaterOrder2 = () => {

        let orderForm = document.getElementById("orderForm2");
        let orderName = document.getElementById("order-name2");

        orderName.value = "placementWithArticle";
        orderForm.action = "./cheakout/paylater-guest-post-order.php";

        let clientAnchorText2 = document.getElementsByName("clientAnchorText2");
        let clientTargetUrl2 = document.getElementsByName("clientTargetUrl2");


        if (clientAnchorText2[0].value != '' && clientTargetUrl2[0].value != '') {
            orderForm.submit();
        } else {
            alert('Please enter the client url and anchor');
        }

    }
    </script>

    <script>
    // function hideTextfields() {
    //     var element = document.getElementById("content-text");
    //     var orDivider = document.getElementById("or-divider");

    //     element.style.display = "none";
    //     orDivider.style.display = "none";
    // }
    </script>
</body>

</html>