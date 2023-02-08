<!--
Author: Safikul Islam
Author URL: https://webtechhelp.org
-->
<?php 
session_start();
// include_once('checkSession.php');
// require_once("_config/connect.php"); 
require_once("_config/dbconnect.php");
require_once "_config/dbconnect.trait.php";

require_once("includes/constant.inc.php");
require_once("classes/date.class.php");  
require_once("classes/error.class.php"); 
require_once("classes/search.class.php");	
require_once("classes/customer.class.php");
require_once("classes/order.class.php"); 
require_once("classes/checkout.class.php");
require_once("classes/login.class.php"); 

require_once("classes/countries.class.php"); 
require_once("classes/blog_mst.class.php"); 
require_once("classes/domain.class.php"); 
require_once("classes/utility.class.php"); 
require_once("classes/utilityMesg.class.php"); 
require_once("classes/utilityImage.class.php");
require_once("classes/utilityNum.class.php");

/* INSTANTIATING CLASSES */
$dateUtil      	= new DateUtil();
$myError 			= new MyError();
$search_obj		= new Search();
$customer		= new Customer();
$logIn			= new Login();
$order			= new Order();
$checkout		= new Checkout();

$country		= new Countries();
$blogMst		= new BlogMst();
$domain			= new Domain();
$utility		= new Utility();
$uMesg 			= new MesgUtility();
$uImg 			= new ImageUtility();
$uNum 			= new NumUtility();
######################################################################################################################
$typeM			= $utility->returnGetVar('typeM','');
//user id
$cusId			= $utility->returnSess('userid', 0);
// if ($cusId == 0) {
// 	echo 'Please Login First';
// }else {
// 	echo 'Logged In';
// }
// exit;
// print_r($cusId);
$cusDtl			= $customer->getCustomerData($cusId);
// echo $cusDtl[0][30]; exit;
if ($cusDtl == NULL) {
	header("Location: login.php");
	exit;
}
// echo var_dump($cusDtl);
// exit;
foreach($cusDtl as $rowCusDtl){
	$rowCusDtl[30];
}
$countriesDtls 	= $country->showCountry($rowCusDtl[30]); //countries_id
// print_r($countriesDtls[0][0]); exit;
$domainDtls		= $domain->ShowDomainData();

//Current Url
$current_url 	= base64_encode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);

if (isset($_POST['paytmPay'])) {
    print_r($_POST);
    exit;
}

if (isset($_POST['paypalPay'])) {
    print_r($_POST);
    exit;
}

if(isset($_POST['btnSubmit']))
{
	//post var
	$txtBillingName 			= $_POST['txtBillingName'];
	$txtBillingEmail	  		= $_POST['txtBillingEmail'];
	$txtBillingAdd 				= $_POST['txtBillingAdd'];
	$txtPostCode 				= $_POST['txtPostCode'];
	$txtCountry  				= $_POST['txtCountry'];	//''
	$txtNotes  					= $_POST['txtNotes'];
	$paymentData                = $_POST['paymentData'];

	//defining error variables
	$action		= 'order_now';
	$url		= $_SERVER['PHP_SELF'];
	$id			= 0; 
	$id_var		= '';
	$anchor		= 'ordForm';
	$typeM		= 'ERROR';

	//registering the post session variables
	$sess_arr	= array('txtBillingName','txtBillingEmail','txtBillingAdd', 'txtPostCode','txtCountry');
	$utility->addPostSessArr($sess_arr);
	
	//check validity
	$invalidEmail 	= $myError->invalidEmail($txtBillingEmail);
	
	
	if(($txtBillingName == '')){

		$myError->showErrorTA($action, $id, $id_var, $url, ERORDERL001, $typeM, $anchor);

	}else if(($txtBillingAdd == '')){

		$myError->showErrorTA($action, $id, $id_var, $url, ERORDERL002, $typeM, $anchor);

	}else if(($invalidEmail == '')||(preg_match("/^ER/i",$invalidEmail))){

		$myError->showErrorTA($action, $id, $id_var, $url, ERORDERL003, $typeM, $anchor);

	}else if($txtPostCode == '') {

		$myError->showErrorTA($action, $id, $id_var, $url, ERORDERL004, $typeM, $anchor);

	}else{
		//echo $cusId;exit;
		//customer details
		$client_dtl		= $customer->getCustomerData($cusId);
		// print_r($client_dtl); exit;
		// echo $txtPostCode; exit;
		
		//Update Customer details
		$customer->editCustomerDtls($cusId, $txtBillingName);
		
		$customer->updateCusAddress($cusId, $txtBillingAdd, $client_dtl[0][25], $client_dtl[0][26], $client_dtl[0][27], $client_dtl[0][28], $txtPostCode, $txtCountry, $client_dtl[0][31], $client_dtl[0][32], $client_dtl[0][33], $client_dtl[0][34]);
		
		//Add Orders
	    $ordId	= $order->addOrder($cusId, $txtBillingName, $_SESSION['tAmount'], $client_dtl[0][5], $txtBillingAdd, $client_dtl[0][25], $client_dtl[0][26], $client_dtl[0][29], 
		$client_dtl[0][34], $client_dtl[0][28], $txtCountry, $txtBillingEmail, $txtNotes);
		
		$totalAmt = 0;
		$ordProdIds = array();
		foreach ($_SESSION["domain"] as $cart_itm){

			$domainDtl		= $domain->showDomains($cart_itm['code']);
			$ordProdIds[]	= $checkout->addOrdProd($ordId, 'domain', $domainDtl[19], '', $domainDtl[0], $domainDtl[17], $domainDtl[17], 0.0, 1);
			$totalAmt		= $totalAmt + $domainDtl[17];
		}
		
		//generate order key
		$ordKey = $order->generateOrderCode('ORDER', $ordId);
		//order amount
		$ordAmt	= $totalAmt; //0.01;//$totalPrice;//0.01
		
		//update order code
        
		$order->updateOrderCode($ordId, $ordKey, $ordAmt);
		
		//update order status
        /**
			 * 
			 * ORDER STATUS CODE
			 * 1 = Delivered
			 * 2 = Pending
			 * 3 = Processing
			 * 4 = Oedered
			 * 
			 *  */ 
		$order->updateOrderStatus($ordId, 4);

		//hold order values in session
		$_SESSION['ordId']	= $ordId;
		$_SESSION['ordKey']	= $ordKey;
		$_SESSION['ordAmt']	= $ordAmt;

		//forward to payment page
		// $uMesg->showSuccessT('success', 0, '', 'payment.php', 'SUORDERL101', 'SUCCESS'); //SUORDERL101
        header("Location: payments/paypal-payment-response.php?data=".base64_encode($paymentData));
	}
}

?>
<!DOCTYPE HTML>
<html lang="zxx">

<head>
    <title>CheckOut: </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <meta name="description"
        content="LeeLija can Instantly find the Domain Name and Ready Blogs Or Websites that you have been looking for. Find the right Blog or Website today.">
    <meta name="keywords" content="Precedence Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
SmartPhone Compatible web template, free WebDesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <script>
    addEventListener("load", function() {
        setTimeout(hideURLbar, 0);
    }, false);

    function hideURLbar() {
        window.scrollTo(0, 1);
    }
    </script>

    <!-- Bootstrap Core CSS -->
    <!-- <link href="css/bootstrap.css" rel='stylesheet' type='text/css' /> -->
    <link rel="stylesheet" href="plugins/bootstrap-5.2.0/css/bootstrap.css">
    <link rel="stylesheet" href="plugins/fontawesome-6.1.1/css/all.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/leelija.css">
    <link href="css/style.css" rel='stylesheet' type='text/css' />
    <link rel="stylesheet" href="css/cheakout.css" type='text/css'>

    <!-- //Custom Theme files -->
    <script src="js/ajax.js"></script>

</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">
    <div id="home">
        <!-- header -->
        <?php require_once "partials/navbar.php"; ?>
        <!-- //header -->
        <!-- banner -->
        <div class="banner1">

        </div>
        <!-- //banner -->
        <!-- Main Content -->
        <!--<section class="py-5 branches position-relative" id="explore">-->
        <div class="container text-center">
            <!-- <form id="billingForm" action="<?php echo $_SERVER['PHP_SELF'] ?>" name="billingForm" method="post"
                enctype="multipart/form-data" autocomplete="off"> -->
            <div class="row">
                <!-- Start Row-->
                <div id="msg">
                    <?php //$uMesg->dispMessage($typeM, 'images/icon/', 'blackLarge');?>
                </div>
                <div class="col-sm-6">
                    <!----------------------start login area-------------------------------->


                    <div title="regsitration" class="billing-details" id="form-login">
                        <h2 class="text-primary fw-normal pb-2">Billing Details</h2>
                        <?php
							if($cusId !="")
								{
							?>

                        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data"
                            autocomplete="off" name="billingForm" id="billingForm">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingInput" placeholder=" "
                                    name="txtBillingName" value="<?php echo $cusDtl[0][37]; ?>">
                                <label for="floatingInput">Billing Name</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control" id="floatingInput" placeholder=" "
                                    name="txtBillingEmail" value="<?php echo $cusDtl[0][3]; ?>">
                                <label for="floatingInput">Email address</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingInput" placeholder=" "
                                    name="txtBillingAdd" value="<?php echo $cusDtl[0][24]; ?>">
                                <label for="floatingInput">Billing Address</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="number" class="form-control" id="floatingInput" placeholder=" "
                                    name="txtPostCode" value="<?php echo $cusDtl[0][29]; ?>">
                                <label for="floatingInput">Billing Zip</label>
                            </div>

                            <div class="form-floating">
                                <select class="form-select" id="floatingSelect" title="Countries" name="txtCountry">
                                    <option selected value="<?php echo $cusDtl[0][30]; ?>">
                                        <?php echo $countriesDtls[0][0]; ?></option>
                                    <?php 
										if(isset($_SESSION['userid'])){
											//$utility->genDropDown($_SESSION['txtCountriesId'], $arr_val, $arr_label);
											$utility->populateDropDown($cusDtl[24], 'countries_id', 'countries_name', 'countries');
										}else{
											//$utility->genDropDown(0, $arr_val, $arr_label);
											$utility->populateDropDown(0, 'countries_id', 'countries_name', 'countries');
										}
										?>
                                </select>
                                <label for="floatingSelect">Country</label>
                            </div>

                            <div class="form-floating">
                                <textarea class="form-control" id="floatingTextarea" name="txtNotes"
                                    style="height: 150px" placeholder=" "></textarea>
                                <label for="floatingTextarea">Write your requirements here</label>
                            </div>
<!-- 
                            <input type="hidden" name="paymentData" id="paymentData" value="">
                            <input type="hidden" name="btnSubmit" id="btnSubmit" value="btnSubmit"> -->
                            <button hidden="hidden" id="paymentBtn">paymentBtn</button>
                        </form>

                        <?php	
								} else {
							?>
                        <div class="text-block2">
                            <p>Login Or Register</p>
                        </div>
                        <div class="fspace"></div>
                        <div class="row">
                            <!-- Start Row-->

                            <a href="login.php?return_url=<?php echo $current_url; ?>" class="btn btn-success btn-block"
                                onclick="loginForm()">Login</a>
                            OR
                            <a href="register.php?return_url=<?php echo $current_url; ?>"
                                class="btn btn-primary btn-block" onclick="loginForm()">Register</a>
                        </div>
                        <?php	
								}
							?>
                    </div>

                    <!----------------------------------- eof Form login Area ----------------------------------->
                </div>
                <div class="col-sm-6">
                    <?php
						if(isset($_SESSION["domain"])){
							
										$total 		= 0;
										$totalAmt 	= 0;
										//echo '<ol>';
									foreach ($_SESSION["domain"] as $cart_itm)
									{
										$domainDtl		= $domain->showDomains($cart_itm['code']);
										$subtotal 		= $cart_itm["qty"];
										$total 			= ($total + $subtotal);
										$nicheDtls	 	= $blogMst->showBlogNichMst($domainDtl[1]);
										//$Amt			= $domainDtl[8];
										$totalAmt		= $totalAmt + $domainDtl[17];
								?>

                    <!--Start Row-->
                    <div class="row coutrow">
                        <!--Start Row-->
                        <div class="col-sm-10 ckoutcol">

                            <h2 class="stat-title text-center  pb-lg-3"><?php echo $domainDtl[0]; ?></h2>
                            <h3 class="sub-title2"><i class="fa-solid fa-angles-right"></i>URL :<a rel="nofollow"
                                    href="<?php echo $domainDtl[9];?>" target="_blank">
                                    <?php echo $domainDtl[9];?></a>
                            </h3>
                            <h3 class="sub-title1 fs-4 fw-bold"><i class="fa-solid fa-right-long"></i> Price :
                                $<?php echo $domainDtl[8];?></h3>

                            <div class="ckoutdiv">

                                <h3 class="sub-title1"><i class="fa-solid fa-right-long"></i> Niche :
                                    <?php echo $nicheDtls[0][1];?></h3>
                                <h3 class="sub-title1"><i class="fa-solid fa-right-long"></i> DA :
                                    <?php echo $domainDtl[2];?>
                                </h3>
                                <h3 class="sub-title1">
                                    <i class="fa-solid fa-right-long"></i>
                                    PA : <?php echo $domainDtl[3];?>
                                </h3>
                                <h3 class="sub-title1"><i class="fa-solid fa-right-long"></i> TF :
                                    <?php echo $domainDtl[5];?>
                                </h3>
                                <h3 class="sub-title1">
                                    <i class="fa-solid fa-right-long"></i>
                                    CF : <?php echo $domainDtl[4];?>
                                </h3>
                                <h3 class="sub-title1"><i class="fa-solid fa-right-long"></i> Alexa :
                                    <?php echo $domainDtl[6];?>
                                </h3>
                                <h3 class="sub-title1">
                                    <i class="fa-solid fa-right-long"></i> Organic
                                    Traffic : <?php echo $domainDtl[7];?>
                                </h3>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <a href="removecart.php?removep=<?php echo $domainDtl[19];?>" class="btn btn-danger btn-sm">
                                Remove
                            </a>
                        </div>
                    </div>
                    <!--end Row-->


                    <?php
							}
								}
						?>
                    <p class="text-end fs-4 fw-bolder">
                        Total: $<?php echo '<span id="totalAmount">'.$totalAmt.'</span>';
								$_SESSION['tAmount']	= $totalAmt;
							?>
                    </p>
                    <?php 
								if($cusId !=""){
							?>

                    <div class="payment-sec d-flex flex-column">
                        <div class="cl"></div>

                        <div class="bGray"></div>


                        <div id="smart-button-container">
                            <div style="text-align: center;">
                                <div id="paypal-button-container"></div>
                            </div>
                        </div>
                        <p><small>Paytm for indian user</small></p>
                        <div class="paytm-btn-container w-100">
                            <button onclick="goToPayment()"><img src="images/icons/paytm-icon.png" alt=""></button>
                        </div>

                    </div>

                    <?php 
								}
							?> <br>
                    <!-- <a href="domains.php" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a> -->
                </div>
            </div><!-- end Row-->

        </div>

        <!-- Footer -->
        <?php require_once "partials/footer.php"; ?>
        <!-- /Footer -->
    </div>
    <!-- js-->
    <script src="js/jquery-2.2.3.min.js"></script>
    <script src="js/cregistration.js"></script>

    <!-- <script src="https://www.paypal.com/sdk/js?client-id=AZ_nrt4ttDxFLyCD6JFIM2lBKMLPTCyyVWY-_hREWz7keFGEQ3zPXeNMqmOVPUxCc1njzfdPG5-Ttcn1&enable-funding=venmo&disable-funding=credit,card&currency=USD" data-sdk-integration-source="button-factory"></script> -->

    <script>
    const goToPayment = () => {
        document.getElementById('paymentBtn').setAttribute("name", "paytmPay");
        document.getElementById('paymentBtn').click();
    }
    </script>
    <script
        src="https://www.paypal.com/sdk/js?client-id=Ad-k2bukRixHHQ6YLq08lkeobaQU8EJtuiiW6vuuthWJIOdqEpUlpz73mKZBxU_pvTPy9q086XgtFw2d&disable-funding=credit,card&currency=USD"
        data-sdk-integration-source="button-factory"></script>
    <script>
    let totalAmount = document.getElementById('totalAmount').innerText;
    let paymentData = document.getElementById('paymentData');

    // alert(totalAmount);

    function initPayPalButton() {
        paypal.Buttons({
            style: {
                shape: 'rect',
                color: 'blue',
                layout: 'vertical',
                label: 'paypal',

            },

            createOrder: function(data, actions) {
                return actions.order.create({
                    purchase_units: [{
                        "amount": {
                            "currency_code": "USD",
                            "value": totalAmount
                        }
                    }]
                });
            },

            onApprove: function(data, actions) {
                return actions.order.capture().then(function(orderData) {

                    // Full available details
                    // console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
                    // var transaction = orderData.purchase_units[0].payments.captures[0];
                    // alert('Transaction '+ transaction.status + ': ' + transaction.id + '\n\nSee console for all available details');

                    paymentData.value = JSON.stringify(orderData);

                    // Show a success message within this page, e.g.
                    const element = document.getElementById('paypal-button-container');
                    element.innerHTML = '';
                    element.innerHTML = '<h3>Thank you for your payment!</h3>';

                    // Or go to another URL:  actions.redirect('thank_you.html');
                    alert('done');
                    document.getElementById('paymentBtn').setAttribute("name", "paypalPay");
                    document.getElementById('billingForm').submit();

                });
            },

            onError: function(err) {
                console.log(err);
                alert('error');
            }
        }).render('#paypal-button-container');
    }
    initPayPalButton();
    </script>

    <!-- Bootstrap Core JavaScript -->
    <script src="plugins/bootstrap-5.2.0/js/bootstrap.js"></script>

</body>

</html>


<!-- sandbox details  -->
<!-- https://www.paypal.com/sdk/js?client-id=Ad-k2bukRixHHQ6YLq08lkeobaQU8EJtuiiW6vuuthWJIOdqEpUlpz73mKZBxU_pvTPy9q086XgtFw2d&disable-funding=credit,card&currency=USD -->

<!-- rahulmajumdar client-id  -->
<!-- https://www.paypal.com/sdk/js?client-id=AZ_nrt4ttDxFLyCD6JFIM2lBKMLPTCyyVWY-_hREWz7keFGEQ3zPXeNMqmOVPUxCc1njzfdPG5-Ttcn1&enable-funding=venmo&disable-funding=credit,card&currency=USD -->
