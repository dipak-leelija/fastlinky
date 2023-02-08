<?php 
session_start();
require_once "../_config/dbconnect.php";
require_once "../_config/dbconnect.trait.php";

require_once "../includes/constant.inc.php";
require_once "../includes/paypal.inc.php";

require_once "../classes/customer.class.php";
require_once "../classes/content-order.class.php";
require_once "../classes/blog_mst.class.php";
require_once "../classes/utility.class.php";
require_once "../classes/date.class.php";


include "../Crypto.php";

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

if($cusId == 0){
	header("Location: index.php");
}

if($cusDtl[0] == 1){ 
	header("Location: dashboard.php");
}
######################################################################################################################

$todayDate      = $DateUtil->todayDate("/");
$clientName     = $_SESSION['name'];

if (isset($_SESSION['domainName']) && isset($_SESSION['sitePrice'])) {
    
    
    $clientOrderedSite        = $_SESSION['domainName'];
    $clientOrderedSiteNos     = count( (array) $_SESSION['domainName']);


    if (isset($_POST['order-name'])) {
        if($_POST['order-name'] == "onlyPlacement" ){

            $clientOrderPrice         = $_SESSION['sitePrice'];
            $_SESSION['clientOrderPrice'] = $clientOrderPrice;
            unset($_SESSION['sitePrice']);
            unset($_SESSION['ConetntCreationPlacementPrice']);

            $clientContent      = $_POST['clientContent1'];
            $clientTargetUrl    = $_POST['clientTargetUrl1'];
            $clientAnchorText   = $_POST['clientAnchorText1'];
            $clientRequirement  = $_POST['clientRequirement1'];
            $blogId             = $_POST['blogId'];
            $tid                = $_POST['tid'];
            
            $_SESSION['order-data'] = array(
                            "clientContent"=>$clientContent,
                            "clientTargetUrl"=>$clientTargetUrl,
                            "clientAnchorText"=>$clientAnchorText,
                            "clientRequirement"=>$clientRequirement
                        );

            $contentLength = 'Content Length: '.str_word_count($clientContent).' Words';
            
        }
    }

    if (isset($_POST['order-name2'])) {
        if($_POST['order-name2'] == "placementWithArticle" ){

            $clientOrderPrice         = $_SESSION['ConetntCreationPlacementPrice'];
            $_SESSION['clientOrderPrice'] = $clientOrderPrice;
            unset($_SESSION['sitePrice']);
            unset($_SESSION['ConetntCreationPlacementPrice']);


            $clientContent      = '';
            $clientTargetUrl    = $_POST['clientTargetUrl2'];
            $clientAnchorText   = $_POST['clientAnchorText2'];
            $clientRequirement  = $_POST['clientRequirement2'];
            $blogId             = $_POST['blogId'];
            $tid                = $_POST['tid2'];
            
            $_SESSION['order-data'] = array(
                            "clientContent"=>$clientContent,
                            "clientTargetUrl"=>$clientTargetUrl,
                            "clientAnchorText"=>$clientAnchorText,
                            "clientRequirement"=>$clientRequirement
                        );
            $contentLength = 'Content Will be publish by '. COMPANY_S;
        }
    }

    $domain = $BlogMst->showBlogbyDomain($clientOrderedSite);
    // print_r($domain);
    $totalDomainCost = $domain[9]+$domain[16]; // cost + ext_cost
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Summary | <?php echo COMPANY_S; ?></title>
    <link rel="shortcut icon" href="<?php echo FAVCON_PATH?>" type="image/png"/>
    <link rel="apple-touch-icon" href="<?php echo FAVCON_PATH?>" />

    <link rel="stylesheet" href="../plugins/bootstrap-5.2.0/css/bootstrap.css">

    <!-- main custom-css for this page  -->
    <link rel="stylesheet" href="../css/paylater-payment-style.css">
    <!-- end -->
</head>

<body>
    <section class="paylater-main-section">
        <!-- logo codes -->
        <div class="logos-section">
            <div class="text-center">
                <img src="<?php echo LOGO_WITH_PATH; ?>" alt="<?php echo COMPANY_FULL_NAME; ?>" class="w-25">
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
                            <p><label><?php echo $contentLength; ?></label></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="Client-details-section">
                        <div class="card customer-d-card">
                            <h5>Bill Details</h5>
                            <p><label>Invoice No: </label></p>
                            <p><label>Invoice Date : <?php echo $todayDate; ?> </label></p>
                            <p><label>Due Date : <?php echo $todayDate; ?><label></p>
                            <p><label>Payment Mode : Paypal<label></p>
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
                                <td><?php echo CURRENCY.$totalDomainCost; ?></td>
                                <td><?php echo CURRENCY.$clientOrderPrice; ?></td>
                            </tr>
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
                                                <div class="col-6" style="text-align: end;"><?php echo CURRENCY.$clientOrderPrice; ?></div>
                                            </div>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="row">
                                                <div class="col-6">Total</div>
                                                <div class="col-6" style="text-align: end;"><?php echo CURRENCY.$clientOrderPrice; ?></div>
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
                                                    <button class="btn btn-primary">Place Order</button>
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
    <script src="plugins/bootstrap-5.2.0/js/bootstrap.js"></script>
</body>

</html>