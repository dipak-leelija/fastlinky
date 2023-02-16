<?php 
session_start();
require_once "../includes/constant.inc.php";

require_once "../_config/dbconnect.php";
require_once "../_config/dbconnect.trait.php";

require_once "../includes/paypal.inc.php";

require_once "../classes/customer.class.php";
require_once "../classes/content-order.class.php";
require_once "../classes/blog_mst.class.php";
require_once "../classes/date.class.php";
require_once "../classes/utility.class.php";


include "../Crypto.php";

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

if($cusId == 0){
	header("Location: index.php");
}

if($cusDtl[0] == 1){ 
	header("Location: dashboard.php");
}
######################################################################################################################


$clientName               = $_SESSION['name'];

if (isset($_SESSION['domainName']) && isset($_SESSION['sitePrice']) && isset($_SESSION['ConetntCreationPlacementPrice'])) {

    
    $clientOrderedSite        = $_SESSION['domainName'];
    $clientOrderedSiteNos     = count( (array) $_SESSION['domainName']);


    if (isset($_POST['order-name'])) {
        if($_POST['order-name'] == 'onlyPlacement' ){
        
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
    $totalDomainCost = $domain[9]+$domain[16]; // cost + ext_cost
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

    <link rel="stylesheet" href="../plugins/bootstrap-5.2.0/css/bootstrap.css">
    <link rel="stylesheet" href="../css/payment-summary-style.css">
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
                            <p><label><?php echo  $contentLength; ?></label></p>
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
                                <td> <?php echo CURRENCY; ?><span id="amount"><?php echo $clientOrderPrice; ?></span>
                                </td>
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
                                                    <?php echo CURRENCY.$clientOrderPrice;?></div>
                                            </div>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="row">
                                                <div class="col-8"><b> Payment Method </b></div>
                                                <div class="col-4 text-end"><b>PayPal</b> </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="row">
                                                <div class="col-12 text-end" id="payBtn">
                                                    <div id="paypal-payment-button">
                                                    </div>
                                                </div>
                                                <div class="col-12 text-end" id="payBtn">
                                                   <button type="button" class="btn btn-danger rounded-pill w-100 fw-semibold" onclick="history.back()">Cancel</button>
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

    <form action="../pay-success.php" method="post" id="send-data" class="d-none">
        <input type="text" name="data" id="form-inp">
        <input type="text" name="blogId" id="blogId" value="<?php echo $blogId; ?>">
    </form>


    <script
        src="https://www.paypal.com/sdk/js?client-id=Ad-k2bukRixHHQ6YLq08lkeobaQU8EJtuiiW6vuuthWJIOdqEpUlpz73mKZBxU_pvTPy9q086XgtFw2d&disable-funding=credit,card&currency=USD">
    // Live Id = AVfNiFu9M4brh84SlYmeHtHJCtdjW1CUmWl5T0wLsU2JOm6VNB6pCRcxi8zKxBbCO9p0t54pPtF65Tim
    </script>
    <!-- <script>paypal.Buttons().rander('#paypal-payment-button');</script> -->
    <script>
    let amount = document.getElementById("amount").innerText;

    let formInp = document.getElementById('form-inp');
    let form = document.getElementById('send-data');



    paypal.Buttons({
        style: {
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
    </script>
    <script src="../plugins/bootstrap-5.2.0/js/bootstrap.js"></script>
</body>

</html>


<script>
window.onload = setInterval(() => {
    let paypalBtn = document.querySelector('paypal-button-label-container')
    if (paypalBtn) {
        console.log('dom manipulation')
    }
}, 100)
</script>