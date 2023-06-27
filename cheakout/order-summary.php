<?php 
session_start();
require_once dirname(__DIR__)."/includes/constant.inc.php";

require_once ROOT_DIR . "/_config/dbconnect.php";

require_once ROOT_DIR . "/includes/paypal.inc.php";
require_once ROOT_DIR . "/includes/order-constant.inc.php";

require_once ROOT_DIR . "/classes/customer.class.php";
require_once ROOT_DIR . "/classes/content-order.class.php";
require_once ROOT_DIR . "/classes/blog_mst.class.php";
require_once ROOT_DIR . "/classes/date.class.php";
require_once ROOT_DIR . "/classes/utility.class.php";


include ROOT_DIR . "/Crypto.php";

$ContentOrder       = new ContentOrder();
$BlogMst            = new BlogMst();
$Customer           = new Customer();
$Utility		    = new Utility();
$DateUtil           = new DateUtil();

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

if (isset($_SESSION['domainName']) && isset($_SESSION['sitePrice']) && isset($_SESSION['ConetntCreationPlacementPrice'])) {

    
    $clientOrderedSite        = $_SESSION['domainName'];
    $clientOrderedSiteNos     = count( (array) $_SESSION['domainName']);
    $sitePrice                = $_SESSION['sitePrice'];
    
    
    if (isset($_POST['order-name'])) {

        /*-------------------------------------------------------------------------------
        |                                                                               |
        |                These Functions are used for order with content file           |
        |                                                                               |
        |------------------------------------------------------------------------------*/ 

        if($_POST['order-name'] == "onlyPlacementWithFile" ):

            $clientOrderPrice               = $_SESSION['sitePrice'];
            $_SESSION['clientOrderPrice']   = $clientOrderPrice;
	        $_SESSION['contetPrice'] 		= 00;

            /** 
             * 
             * Do Not Remove This Line
             * 
             **/
            // unset($_SESSION['ConetntCreationPlacementPrice']);

            $content_type       = 'doc';
            $clientContentTitle = $_POST['clientContentTitle1'];

            $clientAnchorText   = $_POST['clientAnchorText1'];
            $clientTargetUrl    = $_POST['clientTargetUrl1'];

            $refAnc1            = $_POST['reference-anchor1'];
            $refUrl1            = $_POST['reference-url1'];
            $refAnc2            = $_POST['reference-anchor2'];
            $refUrl2            = $_POST['reference-url2'];

            $clientRequirement  = $_POST['clientRequirement1'];
            $blogId             = $_POST['blogId'];
            
            
            $filename    = basename($_FILES['content-file']['name']);
            // $fileData    = $_FILES['content-file'];
            // print_r($filename);
            // echo '<br>'.$filename;
            // echo 'Hi';
            
            if ($filename != '') {
                
                $contentInfo    = 'Content Type: '.pathinfo($filename, PATHINFO_EXTENSION);
                $uploadedPath   = $Utility->fileUploadWithRename($_FILES['content-file'], CONT_DIR);

                if ($uploadedPath != false) {

                    $orderId = $ContentOrder->addGuestPostOrder($clientUserId, $clientEmail, $clientOrderedSite, $clientRequirement, $clientOrderPrice, INCOMPLETECODE);
                    
                    $_SESSION['orderId']    = $orderId;
    
                    $contentId = $ContentOrder->addContent($orderId, $content_type, $clientContentTitle, $uploadedPath);
    
                    $ContentOrder->addContentHyperlink($contentId, $clientAnchorText, $clientTargetUrl, $refAnc1, $refUrl1,$refAnc2, $refUrl2);

                }

            }else {
                if (isset($_SESSION['content-data'])) {
                    // print_r($_SESSION['content-data']);
                    
                    // $fileData           = '';
                    // $fileData           = $_FILES['content-file'];
                    $remainingorderId   = $_SESSION['content-data']['remainingorderId'];
                    
                    if ($filename != '') {
                        $contentInfo    = 'Content Type: '.pathinfo($filename, PATHINFO_EXTENSION);
                        $uploadedPath   = $Utility->fileUploadWithRename($_FILES['content-file'], CONT_DIR);        
                    }else {
                        $uploadedPath       = $_SESSION['content-data']['uploadedPath'];
                    }

                    // $contentTitle       = $_SESSION['content-data']['contentTitle'];
                    // $clientAnchorText   = $_SESSION['content-data']['clientAnchorText'];
                    // $clientTargetUrl    = $_SESSION['content-data']['clientTargetUrl'];

                    // $refAnc1            = $_SESSION['content-data']['reference-anchor1'];
                    // $refUrl1            = $_SESSION['content-data']['reference-url1'];
                    // $refAnc2            = $_SESSION['content-data']['reference-anchor2'];
                    // $refUrl2            = $_SESSION['content-data']['reference-url2'];
                    // $clientRequirement  = $_SESSION['content-data']['clientRequirement'];

                    // image array 
                    /*
                     [contentFile] => Array ( [name] => new article.docx [full_path] => new article.docx [type] => application/vnd.openxmlformats-officedocument.wordprocessingml.document [tmp_name] => C:\xampp\tmp\php9BF7.tmp [error] => 0 [size] => 15218 )
                     */

                    if (isset($_SESSION['content-data']['uploadedPath'])){
                        if ($_SESSION['content-data']['uploadedPath'] != '') {
                            $contentInfo    = 'Content Type: '.pathinfo($_SESSION['content-data']['uploadedPath'], PATHINFO_EXTENSION);
                            $uploadedPath = $_SESSION['content-data']['uploadedPath'];

                            //fetching the ordered blog
                            $clientOrderedSite  = $ContentOrder->getOrderBlog($remainingorderId);
                            
                            //fetching order contents
                            $remorderContents      = $ContentOrder->getOrderContent($remainingorderId);

                            // fetching order hyperlinks
                            $remorderHyperLink  = $ContentOrder->getContentHyperLinks($remorderContents['id']);

                            // contents
                            $contentId      = $remorderContents['id'];
                            $content_type   = $remorderContents['content_type'];
                            // $title          = $remorderContents['title'];
                            // $path           = $remorderContents['path'];
                            $content        = $remorderContents['content'];

                            // hyperlinks
                            $hyperLinkId = $remorderHyperLink['id'];

                            //update order details
                            $ContentOrder->updateGuestPostOrder($remainingorderId, $clientEmail, $clientOrderedSite, $clientRequirement, $clientOrderPrice, INCOMPLETECODE);

                            $ContentOrder->updateContent($remainingorderId, $content_type, $clientContentTitle, $uploadedPath, $content);
                            
                            $ContentOrder->updateContentHyperlink($hyperLinkId, $contentId, $clientAnchorText, $clientTargetUrl, $refAnc1, $refUrl1, $refAnc2, $refUrl2);

                        }else {
                            echo 'File Path is blank';
                            exit;
                        }
                    }else {
                        echo 'No Path Exists!';
                        exit;
                    }
                }else {
                    echo 'content Not exist!';
                    exit;
                }
            }

            echo $uploadedPath;
            
            $_SESSION['order-data'] = array();

            $_SESSION['content-data'] = array(
                'remainingorderId'  => $contentId,
                'contentTitle'      => $clientContentTitle,
                'contentFile'       => $_FILES['content-file'],
                'uploadedPath'      => $uploadedPath,
                'clientAnchorText'  => $clientAnchorText,
                'clientTargetUrl'   => $clientTargetUrl,
                'reference-anchor1' => $refAnc1,
                'reference-url1'    => $refUrl1,
                'reference-anchor2' => $refAnc2,
                'reference-url2'    => $refUrl2,
                'clientRequirement' => $clientRequirement
            );
            
            // exit;
        endif;

    }
    // exit;
    // ==============================================================================================================
    // ==============================================================================================================


    if (isset($_POST['order-name2'])){

        /*-------------------------------------------------------------------------------
        |                                                                               |
        |                These Functions are used for order without content             |
        |                                                                               |
        |------------------------------------------------------------------------------*/ 

        if($_POST['order-name2'] == "placementWithArticle" ):
        
            $clientOrderPrice               = $_SESSION['ConetntCreationPlacementPrice'];
            $_SESSION['clientOrderPrice']   = $clientOrderPrice;
	        $_SESSION['contetPrice'] 		= CONTENTPRICE;

            /** 
             * 
             * Do Not Remove This Line
             * 
             **/
            unset($_SESSION['ConetntCreationPlacementPrice']);

            $clientContent      = '';
            $content_type       = '';

            $blogId             = $_POST['blogId'];
            
            $clientContentTitle = $_POST['clientContentTitle2'];

            $clientAnchorText   = $_POST['clientAnchorText2'];
            $clientTargetUrl    = $_POST['clientTargetUrl2'];

            $refAnc1            = $_POST['reference-anchor1'];
            $refUrl1            = $_POST['reference-url1'];
            $refAnc2            = $_POST['reference-anchor2'];
            $refUrl2            = $_POST['reference-url2'];
            
            $clientRequirement  = $_POST['clientRequirement2'];
            
            

            $contentInfo = 'Content Will be publish by '. COMPANY_S;

            $orderId = $ContentOrder->addGuestPostOrder($clientUserId, $clientEmail, $clientOrderedSite, $clientRequirement, $clientOrderPrice, INCOMPLETECODE);
                
                $_SESSION['orderId']    = $orderId;

                $contentId = $ContentOrder->addContent($orderId, $content_type, $clientContentTitle);

                $ContentOrder->addContentHyperlink($contentId, $clientAnchorText, $clientTargetUrl, $refAnc1, $refUrl1, $refAnc2, $refUrl2);

            $_SESSION['order-data']   = array();

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

        endif;
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
    <title>Order Summary - <?php echo $clientOrderedSite;?> | <?php echo COMPANY_S; ?></title>
    <link rel="shortcut icon" href="<?php echo FAVCON_PATH?>" type="image/png" />
    <link rel="apple-touch-icon" href="<?php echo FAVCON_PATH?>" />

    <!-- plugins  files -->
    <link href="<?= URL ?>/plugins/bootstrap-5.2.0/css/bootstrap.css" rel="stylesheet">
    <?php require_once ROOT_DIR.'/plugins/font-awesome/fontawesome.php'?>

    <!-- custom css  -->
    <link rel="stylesheet" href="<?= URL; ?>/css/payment-summary-style.css">
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
                            <span class="badge text-bg-info p-2"><?php echo  $contentInfo; ?></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="Client-details-section">
                        <div class="card customer-d-card">
                            <h5>Bill Details</h5>
                            <p><label>Invoice No: </label></p>
                            <p><label>Invoice Date : <?php echo $DateUtil->todayDate("/"); ?> </label></p>
                            <p><label>Due Date : <?php echo $DateUtil->todayDate("/"); ?><label></p>
                            <p><label>Payment Mode : Paypal<label></p>
                        </div>
                    </div>
                </div>
            </div>

            <form method="post" id="orderForm">
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
                                <td> <?php echo CURRENCY.$sitePrice; ?></span>
                                </td>
                            </tr>
                            <?php if (isset($_POST['order-name2'])): ?>
                            <tr>
                                <td><b><?= 'Content' ?></b> </td>
                                <td><?= 1; ?></td>
                                <td><?= CURRENCY.CONTENTPRICE; ?></td>
                                <td><?= CURRENCY.CONTENTPRICE; ?></td>
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
                                                <div class="col-6 text-end fw-semibold">
                                                    <?php echo CURRENCY.$clientOrderPrice;?></div>
                                            </div>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="row">
                                                <div class="col-6">Total</div>
                                                <div class="col-6 text-end fw-semibold">
                                                    <?= CURRENCY; ?> <span id="amount"><?= $clientOrderPrice;?></span>
                                                </div>
                                            </div>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="row">
                                                <div class="col-12 text-end" id="payBtn">
                                                    <div id="paypal-payment-button">
                                                    </div>
                                                    <div class="col-12 text-end mb-1">
                                                        <button type="button"
                                                            class="btn rounded-pill w-100 fw-bolder pay_button"
                                                            onclick="paylaterOrder()">
                                                            PayLater
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="col-12 text-end" id="payBtn">
                                                    <button type="button"
                                                        class="btn btn-danger rounded-pill w-100 fw-semibold"
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

    <form action="paypal-order-success.php" method="post" id="send-data" class="d-none">
        <input type="text" name="data" id="form-inp">
        <input type="text" name="blogId" id="blogId" value="<?php echo $blogId; ?>">
    </form>


    <script
        src="https://www.paypal.com/sdk/js?client-id=<?= PAYPAL_CLIENT_ID; ?>&disable-funding=credit,card&currency=USD">
    </script>
    <script>
    let amount = document.getElementById("amount").innerText;

    let formInp = document.getElementById('form-inp');
    let form = document.getElementById('send-data');



    paypal.Buttons({
        style: {
            height: 45,
            layout: 'vertical',
            color: 'silver',
            shape: 'pill',
            label: 'paypal'
        },
        createOrder: function(data, actions) {
            // This function sets up the details of the transaction, including the amount and line item details.
            return actions.order.create({
                purchase_units: [{
                    amount: {
                        value: amount
                    }
                }]
            });
        },
        onApprove: function(data, actions) {
            // This function captures the funds from the transaction.
            return actions.order.capture().then(function(details) {
                // This function shows a transaction success message to your buyer.

                document.getElementById('payBtn').innerHTML =
                    `<div class="bg-secondary border border-info rounded text-center"><p class="fw-bold py-2 mb-0"><span><img src="images/icons/loading-2.gif" alt="loading"></span> Please Wait..</p></div>`;
                formInp.value = JSON.stringify(details);
                form.submit();

            });
        },
        onCancel: function(data) {

            console.log(data);
            sessionStorage.setItem('orderStatus', 'Cancled');
            if (sessionStorage.getItem('orderStatus') == 'Cancled') {
                alert('cancled');
            }
        },
        onError: function(err) {
            alert(`Error: ${err}`);
        }
    }).render('#paypal-payment-button');

    const paylaterOrder = () => {
        orderForm = document.getElementById("orderForm");
        orderForm.action = "paylater-order-success.php";
        orderForm.submit();
    }
    </script>
    <script src="<?= URL; ?>/plugins/bootstrap-5.2.0/js/bootstrap.js"></script>
</body>

</html>