<?php 

require_once "includes/constant.inc.php";
require_once "includes/paypal.inc.php";

session_start();
require_once "_config/dbconnect.php";

require_once "classes/customer.class.php";
require_once "classes/content-order.class.php";
require_once "classes/utility.class.php";

include "Crypto.php";

$ContentOrder     = new ContentOrder();
$Customer         = new Customer();
$Utility		    = new Utility();

######################################################################################################################
$typeM		= $Utility->returnGetVar('typeM','');
//user id
$cusId		= $Utility->returnSess('userid', 0);
$cusDtl		= $Customer->getCustomerData($cusId);

if($cusId == 0){
	header("Location: index.php");
}

if($cusDtl[0][0] == 2){ 
	header("Location: dashboard.php");
}
######################################################################################################################


$clientName               = $_SESSION['name'];

if (isset($_SESSION['domainName']) && isset($_SESSION['sitePrice'])) {
    
    
    $clientOrderedSite        = $_SESSION['domainName'];
    $clientOrderPrice         = $_SESSION['ConetntCreationPlacementPrice'];


    // if(isset($_POST['OrderNowPaypal']) || isset($_POST['orderNowCcavenue'])){
    if($_POST['order-name2'] == 'OrderNowPaypal2' ){

    $clientContent      = '';
    $clientTargetUrl    = $_POST['clientTargetUrl2'];
    $clientAnchorText   = $_POST['clientAnchorText2'];
    $clientRequirement  = $_POST['clientRequirement2'];
    $blogId             = $_POST['blogId'];
    $tid                = $_POST['tid'];
    
    $_SESSION['order-data'] = array(
                    "clientContent"=>$clientContent,
                    "clientTargetUrl"=>$clientTargetUrl,
                    "clientAnchorText"=>$clientAnchorText,
                    "clientRequirement"=>$clientRequirement
                );
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="robots" content="noindex,nofollow">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Summary | <?php echo COMPANY_S; ?></title>
    <link href="css/style.css" rel='stylesheet' type='text/css' />
    <link rel="stylesheet" href="plugins/bootstrap-5.2.0/css/bootstrap.css">
    <!-- <link rel="stylesheet" href="css/fontawesome-all.min.css"> -->
    <link href="<?php echo URL;?>/plugins/fontawesome-free-6.4.0/css/all.min.css" rel='stylesheet' type='text/css' />
    <link href="<?php echo URL;?>/plugins/fontawesome-free-6.4.0/css/fontawesome.min.css" rel='stylesheet'
        type='text/css' />

</head>

<body>
    <section class="container d-flex align-items-center flex-column mt-5">
        <div class="border px-2 mt-2">
            <div class="row justify-content-center">
                <div class="col-12 py-3 d-flex justify-content-center">
                    <img src="images/logo/logo.png" alt="">
                </div>
                <div class="col-11 py-2 text-dark border rounded-pill bg-primary bg-opacity-10 ">
                    <div class="row">
                        <div class="col-8 fw-semibold">
                            <span class="fs-5"><?php echo $clientOrderedSite; ?></span>
                        </div>
                        <div class="col-4 fw-semibold text-center">
                            <span class="fs-5">Price: <?php echo '$'.$clientOrderPrice; ?></span>
                        </div>
                    </div>
                </div>
            </div>

            <hr>

            <div class="row">
                <div class="col-12 col-md-6 mt-2 mt-md-3">
                    <label for="formGroupExampleInput" class="form-label fw-semibold">Customer Name:</label>
                    <input type="text" class="form-control rounded-0 border-primary bg-light "
                        style="--bs-border-opacity: 0.2;" id="customer-name" value="<?php echo $clientName;?>" disabled>
                </div>
                <div class="col-12 col-md-6 mt-2 mt-md-3">
                    <label for="formGroupExampleInput2" class="form-label fw-semibold">Seller Acount:</label>
                    <input type="text" class="form-control rounded-0 border-primary bg-light"
                        style="--bs-border-opacity: 0.2;" id="formGroupExampleInput2"
                        value="<?php echo PAYPAL_BUSINESS; ?>" disabled>
                </div>

                <input type="hidden" class="form-control rounded-0 border-primary bg-light"
                    style="--bs-border-opacity: 0.2;" id="formGroupExampleInput" value="<?php echo $clientTargetUrl;?>"
                    disabled>

                <input type="hidden" class="form-control rounded-0 border-primary bg-light"
                    style="--bs-border-opacity: 0.2;" id="formGroupExampleInput2"
                    value="<?php echo $clientAnchorText; ?>" disabled>


                <textarea class="form-control rounded-0 border-primary bg-light" style="--bs-border-opacity: 0.2;"
                    name="" id="" cols="30" rows="5" hidden disabled><?php echo $clientContent; ?></textarea>


                <textarea class="form-control rounded-0 border-primary bg-light" style="--bs-border-opacity: 0.2;"
                    name="" id="" cols="30" rows="5" hidden disabled><?php echo $clientRequirement; ?></textarea>


            </div>

            <hr>

            <div class="p-1">
                <div class="row border border-2 rounded-pill bg-primary text-light fs-5 fw-semibold my-auto py-2">
                    <div class="col-6 col-md-8">
                        <p class="mb-0">Payable:</p>
                    </div>
                    <div class="col-6 col-md-4 text-center">
                        <p class="mb-0">Price: $ <span> <?php echo $clientOrderPrice;?></span></p>
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-end mt-2">
                <div id="paypal-payment-button">
                </div>
            </div>
        </div>

        <input type="hidden" id="amount" value="<?php echo $clientOrderPrice;?>">

    </section>


    <form action="pay-success.php" method="post" id="send-data" class="d-none">
        <input type="text" name="data" id="form-inp">
        <input type="text" name="blogId" id="blogId" value="<?php echo $blogId; ?>">
    </form>


    <script
        src="https://www.paypal.com/sdk/js?client-id=Ad-k2bukRixHHQ6YLq08lkeobaQU8EJtuiiW6vuuthWJIOdqEpUlpz73mKZBxU_pvTPy9q086XgtFw2d&disable-funding=credit,card&currency=USD">
    // Live Id = AVfNiFu9M4brh84SlYmeHtHJCtdjW1CUmWl5T0wLsU2JOm6VNB6pCRcxi8zKxBbCO9p0t54pPtF65Tim
    </script>
    <!-- <script>paypal.Buttons().rander('#paypal-payment-button');</script> -->
    <script>
    let amount = document.getElementById("amount").value;
    let customerName = document.getElementById("customer-name").value;


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

                formInp.value = JSON.stringify(details);
                form.submit();

            });
        },
        onCancel: function(data) {

            // console.log(data);
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
    <script src="plugins/bootstrap-5.2.0/js/bootstrap.js"></script>
</body>

</html>


<script>
window.onload = setInterval(() => {
    let paypalBtn = document.querySelector('paypal-button-label-container');
    // if (paypalBtn) {
    //   console.log(paypalBtn);
    // }
}, 100)
</script>