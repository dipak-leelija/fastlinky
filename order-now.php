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
// $blogsDtls 	= $blogMst->ShowUserBlogData($cusDtl[0][2]);

$item = $blogMst->showBlog($id);
$sitename       = $item[0];
$siteNiche      = $item[23];
$blogPrice      = $item[9];
$greyNiche      = $item[28];
$greyNicheCost  = $item[29];
$sellingPrice   = $item[16];



$_SESSION[SUMMARYDOMAIN]        = $sitename;
$_SESSION[SUMMARYSITECOST]      = $sellingPrice;
$_SESSION[SUMMARYGREYNICHECOST] = $greyNicheCost;

// $contetCreationPlacementPrice                       = CONTENTPRICE +  $sellingPrice;
$_SESSION['ConetntCreationPlacementPrice']           = CONTENTPRICE +  $sellingPrice;
$_SESSION['GreyNicheConetntCreationPlacementPrice']  = CONTENTPRICE +  $greyNicheCost;


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

    $uploadedFileName = '';
    $uploadedPath     = '';

    if (isset($_SESSION['content-data']['contentFile']) && isset($_SESSION['content-data']['uploadedPath'])) {
        $SESScontentText      = $_SESSION['content-data']['contentFile'];
        // print_r($_SESSION['content-data']['contentFile']);exit;
        
        if (isset($SESScontentText['name'])) {
            $existingName = $SESScontentText['name'];
        }else {
            $existingName = $SESScontentText;
        }

        $uploadedPath       = $_SESSION['content-data']['uploadedPath'];
        $globalFile         = URL.'./uploads/contents/'.basename($_SESSION['content-data']['uploadedPath']);

        $uploadedFileName   = basename($_SESSION['content-data']['uploadedPath']);
    }
}
?>
<!DOCTYPE HTML>
<html lang="zxx">

<head>
    <meta name="robots" content="noindex,nofollow">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $sitename; ?> - Order | <?php echo COMPANY_S; ?></title>
    <link rel="shortcut icon" href="<?php echo FAVCON_PATH?>" type="image/png" />
    <link rel="apple-touch-icon" href="<?php echo FAVCON_PATH?>" />

    <!-- Plugins Files -->
    <link href="<?= URL ?>/plugins/bootstrap-5.2.0/css/bootstrap.css" rel="stylesheet">
    <?php require_once ROOT_DIR.'/plugins/font-awesome/fontawesome.php'?>

    <!-- Custom CSS -->
    <link href="css/style.css" rel='stylesheet' type='text/css' />
    <!-- <link href="css/leelija.css" rel='stylesheet' type='text/css' /> -->
    <link href="css/form.css" rel='stylesheet' type='text/css' />
    <link href="css/dashboard.css" rel='stylesheet' type='text/css' />
    <link href="css/order-now.css" rel='stylesheet' type='text/css' />

    <!--webfonts-->
    <link href="//fonts.googleapis.com/css?family=Ubuntu:300,300i,400,400i,500,500i,700,700i" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Montserrat:400,500,600,700,900" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Nunito+Sans:400,700,900" rel="stylesheet">
    <!--//webfonts-->
</head>

<body>
    <div id="home">

        <!-- navbar start -->
        <?php require_once 'partials/navbar.php'; ?>
        <!-- navbar end -->

        <!-- main section start -->
        <div class="edit_profile pb-5">
            <div class="container-fluid">
                <!--Row start-->
                <div class="row ">
                    <div class="col-md-3 col-sm-12 hidden-xs display-table-cell v-align" id="navigation">

                        <!--*****************TOOGLE OFFCANVAS FOR SIDEBAR ONLY IN MOBILE TAB ******************* -->
                        <div class="extra-added-butn-for-mob-tab ">
                            <button class="sidebar-icon-btn " type="button" data-bs-toggle="offcanvas"
                                data-bs-target="#staticBackdrop" aria-controls="staticBackdrop">
                                <i class="fa-solid fa-angles-right"></i>
                            </button>
                            <div class="offcanvas offcanvas-start " data-bs-scroll="true" data-bs-backdrop="static"
                                tabindex="-1" id="staticBackdrop" aria-labelledby="staticBackdropLabel">
                                <div class="offcanvas-header">
                                    <h5 class="offcanvas-title" id="staticBackdropLabel"></h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                                        aria-label="Close"></button>
                                </div>
                                <div class="offcanvas-body">
                                    <?php include("dashboard-inc.php");?>
                                    <hr class="myhrline">
                                </div>
                            </div>
                        </div>

                        <div class="client_profile_dashboard_left">
                            <?php include("dashboard-inc.php");?>
                            <hr class="myhrline">
                        </div>
                        <!--***********TOOGLE OFFCANVAS FOR SIDEBAR ONLY IN MOBILE TAB ******************* -->
                    </div>
                    <div class="col-md-9  ps-md-0 display-table-cell v-align extra-mrgin-top-for-mtab">
                        <div class="adding-border-css mt-3 mt-lg-0">

                            <!-- tab selections start  -->
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item w-50" role="presentation">
                                    <button class="nav-link active w-100" id="guest-post-tab" data-bs-toggle="tab"
                                        data-bs-target="#guest-post-tab-pane" type="button" role="tab"
                                        aria-controls="guest-post-tab-pane" aria-selected="true">Guest Post</button>
                                </li>
                                <li class="nav-item w-50" role="presentation">
                                    <button class="nav-link w-100" id="guest-post-with-content-tab" data-bs-toggle="tab"
                                        data-bs-target="#guest-post-with-content-tab-pane" type="button" role="tab"
                                        aria-controls="guest-post-with-content-tab-pane" aria-selected="false">Guest
                                        Post With
                                        Content</button>
                                </li>
                            </ul>
                            <!-- tab selections snd  -->

                            <div class="tab-content p-2">
                                <div class="tab-pane fade show active" id="guest-post-tab-pane" role="tabpanel"
                                    aria-labelledby="guest-post-tab" tabindex="0">

                                    <div class="d-md-flex d-block">
                                        <p class="pe-4">Domain: <span class="siteName"><?= $sitename; ?></span></p>
                                        <p class="pe-4">Niche: <span class="siteName"
                                                id="nicheName"><?= $siteNiche ?></span>
                                            <span class="siteName d-none" id="GreyNicheName"><?= $greyNiche == 'Allowed' ?  'Grey Niche': ''; ?></span>
                                        </p>
                                        <p class="pe-4">Price: <span class="siteName"
                                                id="sitePrice"><?= CURRENCY.$sellingPrice ?></span>
                                            <span class="siteName d-none"
                                                id="greyNichePrice"><?= CURRENCY.$greyNicheCost ?></span>
                                        </p>
                                    </div>
                                    <!-- <hr class="border-primary mb-2"> -->

                                    <!-- contentPlacement start here -->
                                    <div class="contentPlacement">
                                        <form method="post" id="orderForm" name="contentPlacementForm"
                                            enctype="multipart/form-data">

                                            <div class="form-group mt-3">
                                                <small class="text-danger">**Casino, CBD, Cannabis and etc except Adult
                                                    content</small>
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input shadow-none" type="checkbox" role="switch"
                                                        id="niche" name="niche">
                                                    <label class="form-check-label" for="niche">Are You Posting Grey
                                                        Niche Content?</label>
                                                </div>
                                            </div>


                                            <!-- <div class="form-group"> -->
                                            <!-- <label for="">Are You Posting Grey Niche Cintent?</label> -->

                                            <!-- <label for="niche">
                                                    <h5>Niche</h5>
                                                </label>
                                                <select name="niche" id="niche" class="form-control" required>
                                                    <option value="" selected disabled>Select</option>
                                                    <option value="<?= GREYNICHECONTENT ?>">Grey Niche Content</option>
                                                    <option value="<?= REGULARCONTENT ?>"><?= $siteNiche ?> Niche Content</option>

                                                </select> -->
                                            <!-- </div> -->

                                            <div class="form-group">
                                                <label for="clientContentTitle1">
                                                    <h5>Title</h5>
                                                </label>
                                                <input type="text" class="form-control"
                                                    placeholder="Enter the article title" name="clientContentTitle1"
                                                    value="<?= $SESSclientContentTitle != '' ? $SESSclientContentTitle : ''; ?>">
                                            </div>

                                            <!-- content upload section start -->
                                            <div class="content-upload">
                                                <div class="content-upload-wrap"
                                                    style="display : <?= $uploadedFileName == '' ? 'block' : 'none' ?>">
                                                    <input class="file-upload-input" name="content-file"
                                                        value="<?= $existingName == '' ? '' : $existingName ?>"
                                                        type='file' onchange="readURL(this);" accept=".doc, .docx" />
                                                    <div class="drag-text">
                                                        <p>
                                                            <i class="fa-sharp fa-solid fa-file-arrow-up"></i>
                                                            <br>
                                                            Drag and Drop Your Content File
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="file-upload-content"
                                                    style="display : <?= $uploadedFileName == '' ? 'none' : 'block' ?>">
                                                    <img class="file-upload-image" src="<?= $globalFile; ?>"
                                                        alt="Content File" />
                                                    <div class="image-title-wrap">
                                                        <button type="button" onclick="removeUpload()"
                                                            class="remove-image d-flex justify-content-between px-3">
                                                            <span class="image-title"><?= $uploadedFileName; ?></span>
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
                                                    <label for="">Your Content<span class="warning">*</span> (Must be a
                                                        minimum
                                                        of 500 words) Don't have a content, get one here
                                                        Place your content here. In your content, you can include up to
                                                        2 links
                                                        They can be in the form of URLs and anchors. In the "URL" and
                                                        "Anchor
                                                        text"
                                                        fields below, please insert the same URLs and anchors. <span
                                                            class="warning">(Don't add any images in your
                                                            article)</span></label>
                                                    <div class="form-group">
                                                        <textarea class="form-control" name="clientContent1" rows="9"
                                                            placeholder="Write or paste your content here"
                                                            onkeyup="checkContent(this)"></textarea>
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
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6 mb-2">
                                                        <input type="text" class="form-control"
                                                            placeholder="Client Anchor" name="clientAnchorText1"
                                                            value="<?= $SESSclientAnchorText; ?>">
                                                    </div>

                                                    <div class="col-md-6 mb-2">
                                                        <input type="text" class="form-control"
                                                            aria-describedby="Client URL" placeholder="Client URL"
                                                            name="clientTargetUrl1"
                                                            value="<?= $SESSclientTargetUrl; ?>">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6 mb-2">
                                                        <input type="text" class="form-control"
                                                            placeholder="Reference Anchor (optional)"
                                                            name="reference-anchor1"
                                                            value="<?= $SESSreferenceAnchor1; ?>">
                                                    </div>

                                                    <div class="col-md-6 mb-2">
                                                        <input type="text" class="form-control"
                                                            placeholder="Reference URL (optional)" name="reference-url1"
                                                            value="<?= $SESSreferenceUrl1; ?>">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6 mb-2">
                                                        <input type="text" class="form-control"
                                                            placeholder="Reference Anchor (optional)"
                                                            name="reference-anchor2"
                                                            value="<?= $SESSreferenceAnchor2; ?>">
                                                    </div>

                                                    <div class="col-md-6 mb-2">
                                                        <input type="text" class="form-control"
                                                            aria-describedby="Target Url"
                                                            placeholder="Reference URL (optional)" name="reference-url2"
                                                            value="<?= $SESSreferenceUrl2; ?>">
                                                    </div>
                                                </div>

                                            </div>
                                            <!-- hyperLinks section start -->

                                            <div class="form-group mt-3">
                                                <label for="clientRequirement1">
                                                    <h5>Special requirements</h5>
                                                    <p>If necessary, Write all your task requirements here, e. g.,
                                                        content
                                                        requirements, Category, deadline, necessity of disclosure,
                                                        preferences
                                                        regarding content placement, etc.</p>
                                                </label>
                                                <textarea class="form-control" rows="6"
                                                    name="clientRequirement1"><?php echo $SESSclientRequirement; ?></textarea>
                                            </div>

                                            <input type="hidden" id="blogId" name="blogId"
                                                value="<?php echo $_GET['id']?>">
                                            <input type="hidden" name="order-name" id="order-name">

                                        </form>

                                        <div class="d-flex justify-content-between py-3">
                                            <button class="btn btn-secondary w-25"
                                                onclick="history.back()">Back</button>
                                            <button class="btn btn-primary w-25"
                                                onclick="gotoSummary()">Continue</button>
                                        </div>
                                    </div>
                                    <!-- contentPlacement end here -->

                                </div>

                                <div class="tab-pane fade" id="guest-post-with-content-tab-pane" role="tabpanel"
                                    aria-labelledby="guest-post-with-content-tab" tabindex="0">

                                    <div class="siteName">
                                        <p><?= $sitename;  ?></p>
                                    </div>
                                    <small><b><?= CURRENCY,$contetCreationPlacementPrice;?></b> includes content
                                        price</small>
                                    <div>
                                        <p class="small">Estimated completion: <span class="deviveryDt">Approx 3 days
                                                after order confirmation
                                                <?= date('jS M Y',strtotime("+3 day"));?></span></p>
                                    </div>

                                    <hr class="border-primary mb-2">


                                    <!-- contentCreationPlacement start here -->
                                    <div class="contentCreationPlacement">
                                        <form method="post" action="cheakout/order-summary.php"
                                            name="contentCreationPlacementForm" id="orderForm2">

                                            <div class="form-group">
                                                <label for="clientContentTitle2">
                                                    <h5>Title</h5>
                                                </label>
                                                <input type="text" class="form-control"
                                                    placeholder="Enter the article title" name="clientContentTitle2"
                                                    value="<?php echo $SESSclientContentTitle; ?>">
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
                                                            value="<?= $SESSclientAnchorText; ?>">
                                                    </div>

                                                    <div class="col-md-6 mb-2">
                                                        <input type="text" class="form-control" name="clientTargetUrl2"
                                                            placeholder="Enter the client url"
                                                            value="<?= $SESSclientTargetUrl; ?>">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6 mb-2">
                                                        <input type="text" class="form-control"
                                                            placeholder="Enter the reference anchor text"
                                                            name="reference-anchor1"
                                                            value="<?= $SESSreferenceAnchor1; ?>">
                                                    </div>

                                                    <div class="col-md-6 mb-2">
                                                        <input type="text" class="form-control"
                                                            placeholder="Enter the reference URL" name="reference-url1"
                                                            value="<?= $SESSreferenceUrl1; ?>">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6 mb-2">
                                                        <input type="text" class="form-control"
                                                            placeholder="Enter the reference anchor text"
                                                            name="reference-anchor2"
                                                            value="<?= $SESSreferenceAnchor2; ?>">
                                                    </div>

                                                    <div class="col-md-6 mb-2">
                                                        <input type="text" class="form-control"
                                                            aria-describedby="Target Url"
                                                            placeholder="Enter the reference URL" name="reference-url2"
                                                            value="<?= $SESSreferenceUrl2; ?>">
                                                    </div>
                                                </div>

                                            </div>
                                            <!-- hyperLinks section start -->

                                            <div class="form-group">
                                                <label for="clientRequirement2">If necessary, Write all your task
                                                    requirements here, e. g., content requirements, Category, deadline,
                                                    necessity of disclosure, preferences regarding content placement,
                                                    etc.
                                                </label>
                                                <textarea class="form-control" rows="4"
                                                    name="clientRequirement2"><?= $SESSclientRequirement; ?></textarea>
                                            </div>

                                            <input type="hidden" id="blogId" name="blogId" value="<?= $_GET['id']?>">
                                            <input type="hidden" name="order-name2" id="order-name2"
                                                value="placementWOC">

                                        </form>

                                        <div class="d-flex justify-content-between py-3">
                                            <button class="btn btn-secondary w-25">Cancel</button>
                                            <button class="btn btn-primary w-25" type="button"
                                                onclick="gotoSummaryWOC()">Continue</button>
                                        </div>

                                    </div>
                                    <!-- contentCreationPlacement end here -->

                                </div>
                            </div>
                        </div>
                    </div>

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
    let nichecheck = document.getElementById('niche');
    const changeNiche = () => {
        let sitePrice = document.getElementById('sitePrice');
        let nicheName = document.getElementById('nicheName');
        let greyNichePrice = document.getElementById('greyNichePrice');
        let GreyNicheName = document.getElementById('GreyNicheName');

        if (nichecheck.checked) {
            sitePrice.classList.add('d-none');
            nicheName.classList.add('d-none');

            GreyNicheName.classList.remove('d-none');
            greyNichePrice.classList.remove('d-none');

        } else {
            sitePrice.classList.remove('d-none');
            nicheName.classList.remove('d-none');

            GreyNicheName.classList.add('d-none');
            greyNichePrice.classList.add('d-none');

        }
    }

    nichecheck.addEventListener('change', changeNiche)


    const gotoSummary = () => {

        let orderForm = document.getElementById("orderForm");
        let orderName = document.getElementById("order-name");
        orderForm.action = "cheakout/order-summary.php";
        document.getElementById("order-name").value = "onlyPlacementWithFile";

        /* Title validation start here */
        let niche = orderForm[0].value;
        if (niche == '') {
            alert(`Please Select Niche Type`);
            return false;
        }
        /* ----------------------------------------------------------- */


        /* Title validation start here */
        let title = orderForm[1].value;
        if (title == '') {
            alert(`Please Write a post title`);
            return false;
        }
        /* ----------------------------------------------------------- */

        /* Content validation start here */
        let contentFile = document.getElementsByName("content-file");
        let clientContent1 = document.getElementsByName("clientContent1");
        let existingFile = document.querySelector('.file-upload-image').src;

        // execute if content not exists 
        if (contentFile[0].value == '' && clientContent1[0].value == '' && existingFile == "") {
            alert(`Please provide the content!`);
            return false;
        }

        /*
        if (existingFile.includes('data:')) {
            alert('New File');
        }else{
            alert('Existing File');
        }
        */

        // execute if content file uploded 
        if (contentFile[0].value != '' && clientContent1[0].value == '') {
            orderName.value = "onlyPlacementWithFile";
        }

        // execute if content pasted 
        // console.log(clientContent1[0].value);
        // if (contentFile[0].value == '' && clientContent1[0].value != '') {
        //     if (WordCount(clientContent1[0].value) < 500) {
        //         alert('Your content Should contain minimum 500words');
        //     } else {
        //         orderName.value = "onlyPlacementWithText";
        //     }
        // }
        /* ----------------------------------------------------------- */




        /* HyperLinks validation start here */
        let clientAnchor = orderForm[5].value;
        let clientURL = orderForm[6].value;
        if (clientAnchor == '' || clientURL == '') {
            alert(`Please Provide Client Anchor and URL!`);
            return false;
        }

        let refAnc1 = orderForm[7].value;
        let refURL1 = orderForm[8].value;
        let refAnc2 = orderForm[9].value;
        let refURL2 = orderForm[10].value;
        if (refAnc1 == "" && refURL1 == '' && refAnc2 == '' && refURL2 == '') {
            alert(`Looks Like you have not provided any reference links yet, well you can do is later`);
        }
        /* ----------------------------------------------------------- */

        orderForm.submit();

    }


    const gotoSummaryWOC = () => {

        let orderForm = document.getElementById("orderForm2");
        let orderName = document.getElementById("order-name2");

        orderForm.action = "cheakout/order-summary.php";

        document.getElementsByName("order-name2");


        /* Title validation start here */
        let title = document.getElementsByName("clientContentTitle2")[0].value;
        if (title == '') {
            alert(`Please Write a post title`);
            return false;
        }
        /* ----------------------------------------------------------- */


        /* HyperLinks validation start here */
        let clientAnchor = document.getElementsByName("clientAnchorText2")[0].value;
        let clientURL = document.getElementsByName("clientTargetUrl2")[0].value;
        if (clientAnchor == '' || clientURL == '') {
            alert(`Please Provide Client Anchor and URL!`);
            return false;
        }

        let refAnc1 = document.getElementsByName("reference-anchor1")[0].value;
        let refURL1 = document.getElementsByName("reference-url1")[0].value;
        let refAnc2 = document.getElementsByName("reference-anchor2")[0].value;
        let refURL2 = document.getElementsByName("reference-url2")[0].value;
        if (refAnc1 == "" && refURL1 == '' && refAnc2 == '' && refURL2 == '') {
            alert(`Looks Like you have not provided any reference links yet, well you can do is later`);
        }
        /* ----------------------------------------------------------- */

        orderForm.submit();

    }
    </script>
</body>

</html>