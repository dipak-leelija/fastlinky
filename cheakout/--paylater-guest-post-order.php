<?php 
session_start();
require_once dirname(__DIR__) . "/includes/constant.inc.php";

require_once ROOT_DIR . "/_config/dbconnect.php";

require_once ROOT_DIR . "/includes/order-constant.inc.php";
require_once ROOT_DIR . "/includes/paypal.inc.php";

require_once ROOT_DIR . "/classes/customer.class.php";
require_once ROOT_DIR . "/classes/content-order.class.php";
require_once ROOT_DIR . "/classes/blog_mst.class.php";
require_once ROOT_DIR . "/classes/utility.class.php";
require_once ROOT_DIR . "/classes/date.class.php";


include ROOT_DIR . "/Crypto.php";

$ContentOrder     = new ContentOrder();
$BlogMst          = new BlogMst();
$Customer         = new Customer();
$Utility		  = new Utility();
$DateUtil         = new DateUtil();

######################################################################################################################
$typeM		= $Utility->returnGetVar('typeM','');
//user id
$cusId		= $Utility->returnSess('userid', 0);
$cusDtl		= $Customer->getCustomerData($cusId);

require_once ROOT_DIR."/includes/check-customer-login.inc.php";

######################################################################################################################

$todayDate          = $DateUtil->todayDate("/");
$clientUserId       = $_SESSION['userid'];
$clientName         = $_SESSION['name'];
$clientEmail        = $_SESSION[USR_SESS];

if (isset($_SESSION['domainName']) && isset($_SESSION['sitePrice'])) {
    
    
    $clientOrderedSite              = $_SESSION['domainName'];
    $clientOrderedSiteNos           = count( (array) $_SESSION['domainName']);
    $sitePrice                      = $_SESSION['sitePrice'];

    if (isset($_POST['order-name'])) {
        
        /*-------------------------------------------------------------------------------
        |                                                                               |
        |                These Functions are used for order with content file           |
        |                                                                               |
        |------------------------------------------------------------------------------*/

        if($_POST['order-name'] == "onlyPlacementWithFile" ){

            $clientOrderPrice               = $_SESSION['sitePrice'];
            $_SESSION['contetPrice']        = 00;
            $_SESSION['clientOrderPrice']   = $clientOrderPrice;

            unset($_SESSION['ConetntCreationPlacementPrice']);

            $content_type       = 'doc';
            $clientContentTitle = $_POST['clientContentTitle1'];

            $clientAnchorText   = $_POST['clientAnchorText1'];
            $clientTargetUrl    = $_POST['clientTargetUrl1'];

            $refAnc1    = $_POST['reference-anchor1'];
            $refUrl1    = $_POST['reference-url1'];
            $refAnc2    = $_POST['reference-anchor2'];
            $refUrl2    = $_POST['reference-url2'];


            $clientRequirement  = $_POST['clientRequirement1'];
            $blogId             = $_POST['blogId'];
            
            
            $filename   = basename($_FILES['content-file']['name']);
            
            $contentInfo = 'Content Type: '.pathinfo($filename, PATHINFO_EXTENSION);

            $uploadedPath = $Utility->fileUploadWithRename($_FILES['content-file'], CONT_DIR);
            if ($uploadedPath != false) {

                $orderId = $ContentOrder->addGuestPostOrder($clientUserId, $clientEmail, $clientOrderedSite, $clientRequirement, $clientOrderPrice, INCOMPLETECODE);
                
                $_SESSION['orderId']    = $orderId;

                $contentId = $ContentOrder->addContent($orderId, $content_type, $clientContentTitle, $uploadedPath);

                $ContentOrder->addContentHyperlink($contentId, $clientAnchorText, $clientTargetUrl, $refAnc1, $refUrl1,$refAnc2, $refUrl2);
            }

            $_SESSION['order-data'] = array();

            $_SESSION['content-data'] = array(
                'contentTitle'      => $clientContentTitle,
                'contentFile'       => $_FILES['content-file'],
                'clientAnchorText'  => $clientAnchorText,
                'clientTargetUrl'   => $clientTargetUrl,
                'reference-anchor1' => $refAnc1,
                'reference-url1'    => $refUrl1,
                'reference-anchor2' => $refAnc2,
                'reference-url2'    => $refUrl2,
                'clientRequirement' => $clientRequirement
            );
        }        
        
    }
    
    // ==============================================================================================================
    // ==============================================================================================================

    if (isset($_POST['order-name2'])) {

        /*-------------------------------------------------------------------------------
        |                                                                               |
        |                These Functions are used for order without content             |
        |                                                                               |
        |------------------------------------------------------------------------------*/

        if($_POST['order-name2'] == "placementWithArticle" ){

            $clientOrderPrice               = $_SESSION['ConetntCreationPlacementPrice'];
            $_SESSION['contetPrice']        = CONTENTPRICE;
            
            $_SESSION['clientOrderPrice']   = $clientOrderPrice;
            
            unset($_SESSION['ConetntCreationPlacementPrice']);


            $content_type       = '';
            $clientContentTitle = $_POST['clientContentTitle2'];

            $clientAnchorText   = $_POST['clientAnchorText2'];
            $clientTargetUrl    = $_POST['clientTargetUrl2'];

            $refAnc1    = $_POST['reference-anchor1'];
            $refUrl1    = $_POST['reference-url1'];
            $refAnc2    = $_POST['reference-anchor2'];
            $refUrl2    = $_POST['reference-url2'];


            $clientRequirement  = $_POST['clientRequirement2'];
            $blogId             = $_POST['blogId'];
            
            
            
            $contentInfo = 'Content Will be uploaded by '. COMPANY_S;

                $orderId = $ContentOrder->addGuestPostOrder($clientUserId, $clientEmail, $clientOrderedSite, $clientRequirement, $clientOrderPrice, INCOMPLETECODE);
                
                $_SESSION['orderId']    = $orderId;

                $contentId = $ContentOrder->addContent($orderId, $content_type, $clientContentTitle);

                $ContentOrder->addContentHyperlink($contentId, $clientAnchorText, $clientTargetUrl, $refAnc1, $refUrl1,$refAnc2, $refUrl2);

            $_SESSION['order-data'] = array();

            $_SESSION['content-data'] = array(
                'contentTitle'      => $clientContentTitle,
                'clientAnchorText'  => $clientAnchorText,
                'clientTargetUrl'   => $clientTargetUrl,
                'reference-anchor1' => $refAnc1,
                'reference-url1'    => $refUrl1,
                'reference-anchor2' => $refAnc2,
                'reference-url2'    => $refUrl2,
                'clientRequirement' => $clientRequirement
            );

        }
    }

    $domain = $BlogMst->showBlogbyDomain($clientOrderedSite);
}else {
    $redirectTo = "../order-now.php?id=".$_POST['blogId'];
    header('Location: '.$redirectTo);
    exit;
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Summary | <?php echo COMPANY_S; ?></title>

    <link rel="shortcut icon" href="<?php echo FAVCON_PATH?>" type="image/png" />
    <link rel="apple-touch-icon" href="<?php echo FAVCON_PATH?>" />

    <!-- plugins  files -->
    <link href="<?= URL ?>/plugins/bootstrap-5.2.0/css/bootstrap.css" rel="stylesheet">
    <?php require_once ROOT_DIR.'/plugins/font-awesome/fontawesome.php'?>

	<!-- Custom css  -->
    <!-- main custom-css for this page  -->
    <link rel="stylesheet" href="../css/payment-summary-style.css">
    <!-- end -->
</head>

<body>
    <section class="paylater-main-section">
        <!-- logo codes -->
        <div class="logos-section">
            <div class="text-center">
                <img src="<?php echo LOGO_WITH_PATH; ?>" alt="<?php echo COMPANY_FULL_NAME; ?>" class="main_logo">
            </div>
        </div>
        <!-- cards for customers details -->
        <div class="second-main-div-for-details">
            <div class="row">
                <div class="col-md-6 ">
                    <div class="customer-details-section">
                        <div class="card customer-d-card">
                            <h5>Customer Details</h5>
                            <p><label><?php echo $clientName;?></label></p>
                            <p><label>Anchor Text : <?php echo $clientAnchorText; ?></label></p>
                            <p><label>Target Url : <?php echo $clientTargetUrl;?> </label></p>
                            <span class="badge text-bg-info p-2"><?php echo $contentInfo; ?></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="Client-details-section">
                        <div class="card customer-d-card">
                            <h5>Bill Details</h5>
                            <p><label>Invoice No: Not Generated</label></p>
                            <p><label>Invoice Date : <?php echo $todayDate; ?> </label></p>
                            <p><label>Due Date : <?php echo $todayDate; ?><label></p>
                            <p><label>Payment Mode : PayLater<label></p>
                        </div>
                    </div>
                </div>
            </div>
            <form action="paylater-order-success.php" method="post">
                <input type="hidden" name="blogId" id="blogId" value="<?php echo $blogId; ?>">

                <div class=" display-table text-center">
                    <!-- <div class="features_grids table-responsive"> -->
                    <table class="table detailing-table">
                        <thead class="table-secondary">
                            <tr>
                                <th scope="col">Item</th>
                                <th scope="col">QTY</th>
                                <th scope="col">Rate</th>
                                <th scope="col">Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><b><?php echo $clientOrderedSite; ?></b> </td>
                                <td><?php echo $clientOrderedSiteNos; ?></td>
                                <td><?php echo CURRENCY.$sitePrice; ?></td>
                                <td><?php echo CURRENCY.$sitePrice; ?></td>
                            </tr>

                            <?php if(isset($_POST['order-name2'])): ?>
                            <tr>
                                <td><b><?= 'Content' ?></b> </td>
                                <td><?= 1; ?></td>
                                <td><?php echo CURRENCY.CONTENTPRICE; ?></td>
                                <td><?php echo CURRENCY.CONTENTPRICE; ?></td>
                            </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                    <!-- </div> -->
                </div>

                <!-- invoice table -->
                <div class="mt-5">
                    <div class="row" style="display: flex; justify-content: end;">
                        <div class="col-md-5  ">
                            <table class="table table-responsive">
                                <thead class="table-secondary">
                                    <tr>
                                        <th class="text-center" scope="col">Invoice Summary</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="row">
                                                <div class="col-6">Subtotal</div>
                                                <div class="col-6" style="text-align: end;">
                                                    <?php echo CURRENCY.$clientOrderPrice; ?></div>
                                            </div>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="row">
                                                <div class="col-6">Total</div>
                                                <div class="col-6" style="text-align: end;">
                                                    <?php echo CURRENCY.$clientOrderPrice; ?></div>
                                            </div>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="row">
                                                <div class="col-8"><b> Payment Method </b></div>
                                                <div class="col-4" style="text-align: end;"><b>Paylater</b> </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="row">
                                                <div class="col-12 text-end">
                                                    <button type="submit"
                                                        class="btn btn-primary rounded-pill w-100 fw-semibold">Place
                                                        Order</button>
                                                </div>
                                                <div class="col-12 text-end">
                                                    <button type="button"
                                                        class="btn btn-danger rounded-pill w-100 fw-semibold mt-2"
                                                        onclick="history.back()">Cancel</button>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <script src="../plugins/bootstrap-5.2.0/js/bootstrap.js"></script>
</body>

</html>