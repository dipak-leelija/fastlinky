<?php
session_start();
require_once dirname(__DIR__) .  "/includes/constant.inc.php";
require_once ROOT_DIR . "/_config/dbconnect.php";

require_once ROOT_DIR . "/includes/order-constant.inc.php";
require_once ROOT_DIR . "/includes/user.inc.php";
require_once ROOT_DIR . "/includes/email.inc.php";
require_once ROOT_DIR . "/includes/registration.inc.php";
require_once ROOT_DIR . "/includes/mail-functions.php";
require_once ROOT_DIR . "/includes/paypal.inc.php";

require_once ROOT_DIR . "/classes/domain.class.php"; 
require_once ROOT_DIR . "/classes/blog_mst.class.php"; 
require_once ROOT_DIR . "/classes/orderStatus.class.php";
require_once ROOT_DIR . "/classes/error.class.php";
require_once ROOT_DIR . "/classes/date.class.php";
require_once ROOT_DIR . "/classes/content-order.class.php";
require_once ROOT_DIR . "/classes/utility.class.php"; 
require_once ROOT_DIR . "/classes/utilityMesg.class.php"; 

/* INSTANTIATING CLASSES */
$domain			= new Domain();
$BlogMst		= new BlogMst();
$OrderStatus	= new OrderStatus();
$error			= new MyError();
$ContentOrder	= new ContentOrder();

$dateUtil		= new DateUtil();
$utility		= new Utility();
$uMesg 			= new MesgUtility();

###############################################################################################

require_once("../classes/customer.class.php");
$customer		= new Customer();
$cusId		= $utility->returnSess('userid', 0);
$cusDtl		= $customer->getCustomerData($cusId);


###############################################################################################

//declare vars
$typeM		= $utility->returnGetVar('typeM','');


if (!isset($_POST)) {
	header("Location: ../dashboard.php");
	exit;
}

if (!isset($_SESSION['payment-process']) || $_SESSION['payment-process'] != true) {
	header("Location: ".URL."/dashboard.php");
	exit;
}


// Update Order Status 
if (isset($_POST['data']) && isset($_POST['orderId'])) {
	
	$orderId = $_POST['orderId'];


	//fetch the order details
	$orderDetail 	= $ContentOrder->showOrderdContentsByCol('order_id', $orderId, '', '');

	$statusCode 		= $orderDetail[0]['order_status'];
	$clientEmail 		= $orderDetail[0]['clientEmail'];
	$clientOrderPrice 	= $orderDetail[0]['order_price'];
	$clientOrderedSite 	= $orderDetail[0]['clientOrderedSite'];
 

	// Transection Details by Id 
	// $ordTxn = $ContentOrder->showTransectionByOrder($orderId);
	// print_r($ordTxn['item_amount'] );exit;


	$details = (array)json_decode($_POST['data']);
	// print_r($details);
	$purchase_units = (array)$purchase_units = (array)$payer = $details['purchase_units'];
	$payments = (array)$payments = $purchase_units[0];
	$captures = (array)$captures = (array)$payments['payments'];
	$captures = (array)$captures = (array)$captures = $captures['captures'];
	$captures = (array)$captures = $captures[0];
	// print_r($captures);
	$amount = (array)$captures['amount'];
	$paid_amount = $amount['value'];   // paid ammount to paypal

	$trxnId 	= $captures['id'];		//geting the transection id 
	$trxnStatus = $captures['status'];	//geting the transection status

	$t_date = date('Y-m-d H:i:s');

	if ($trxnStatus == "COMPLETED") {
		
		$trxn_id	  = $trxnId;
		$_SESSION['pay_success']  = true;


		$ContentOrder->updatepayLaterTransection($orderId, COMPLETEDCODE, $trxn_id, "Paypal", 0, $paid_amount, $t_date, $clientEmail);
		$ContentOrder->contentOrderStatusUpdate($orderId, COMPLETEDCODE);

		$ContentOrder->addOrderUpdate($orderId, 'Payment Completed', '', $cusDtl[0][0]);


	}else {

		$ContentOrder->contentOrderStatusUpdate($orderId, FAILEDCODE);
		$ContentOrder->addOrderUpdate($orderId, 'Payment Failed', 'Paylater Payment Failed', $cusDtl[0][0]);
		
	}
	
}//end of post request data cheaking

// $orderDetail 	= $ContentOrder->showOrderdContentsByCol('order_id', $orderId, '', '');
// print_r($orderDetail);
// exit;
/*
if($_SESSION['pay_success'] == true) {

	$orderDetail 	= $ContentOrder->showOrderdContentsByCol('order_id', $orderId, '', '');


	// Client Details 
	$client		= $customer->getCustomerData($orderDetail[0]['clientUserId']);


	$domainDetails = $BlogMst->showBlogbyDomain($orderDetail[0]['clientOrderedSite']);
	

	// ===================================================================================================================
	// =========================================		SEND MAIL TO ADMIN		 =========================================
	// ===================================================================================================================


	$addedOn 	= date('l, jS \of F Y, h:i a', strtotime($orderDetail[0]['added_on']));


	// transection details 
	$txndtls_arr = array(
						'ORDER ID',			//0
						'TRANSECTION ID', 	//1
						'AMOUNT', 			//2
						'PAYMENT MODE',		//3
						'PAYMENT STATUS',	//4
						'PLACED ON'			//5
					);

	$txndata_arr = array(
						'#'.$orderDetail[0]['order_id'], 			//0
						'#'.$orderDetail[0]['clientTransactionId'],	//1
						'$'.$orderDetail[0]['clientOrderPrice'],	//2
						'Paypal',									//3
						$orderDetail[0]['paymentStatus'],			//4
						$addedOn
					);
	
	


	// $fromMail_site 		=	SITE_EMAIL;
	// $toMail_admin		=	SITE_BILLING_EMAIL;
	// $toName_admin		= 	SITE_BILLING_NAME;

	$fromMail 			= SITE_EMAIL;
	$toMail_admin		= 'dipakmajumdar.leelija@gmail.com';
	$toName_admin		= 'Admin';
    $subject    		= 'Paymant Recived - '.date("d-m-Y");

	// $sendedToadmin = paylaterPaymentMail($fromMail, $toMail_admin, $toName_admin, $subject, $txndtls_arr, $txndata_arr, $t_date);


	// ================================== MAIL SENDED TO ADMIN ================================== 


	// ===================================================================================================================
	// =========================================		SEND MAIL TO CLIENT		 =========================================
	// ===================================================================================================================

	$fromMail       = SITE_BILLING_EMAIL;
	$toMail         = $orderDetail[0]['clientEmail'];
	$toName         = $orderDetail[0]['clientName'];
	$subjectC		= "Payment Completed - ".date("d-m-Y");
	// $mailSended		= paylaterPaymentMail($fromMail, $toMail, $toName, $subjectC, $txndtls_arr, $txndata_arr, $t_date);

	// ================================== MAIL SENDED TO CLIENT ================================== 

	
}else {
	echo 'Payment Failed!';
}
*/


# ============= session array ============= #
$sess_arr = array('payment-process', 'updatedOrders');
$utility->delSessArr($sess_arr);
unset($_POST);
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel="shortcut icon" href="<?php echo FAVCON_PATH?>" type="image/png" />
    <link rel="apple-touch-icon" href="<?php echo FAVCON_PATH?>" />
    <title>Successful Order - Order Received</title>

	<link href="<?= URL ?>/plugins/bootstrap-5.2.0/css/bootstrap.css" rel="stylesheet">
    <?php require_once ROOT_DIR.'/plugins/font-awesome/fontawesome.php'?>

    <link rel="stylesheet" href="<?php echo URL ?>/css/style.css">
    <link rel="stylesheet" href="<?php echo URL ?>/css/payment-status.css">

</head>


<body>

    <!-- Start  Header -->
    <?php require_once "../partials/navbar.php"; ?>
    <!-- End  Header -->

    <!-- Start  container -->
    <div id="container">

        <div class="row flex-column  align-items-center mt-5">

            <!--======= column 1 =======-->
            <div class="col-11 col-md-10">
                <div class="mt-4 p-5 bg-lighter-blue text-white rounded">
                    <h2 class="text-primary">Thanking you for your payment.</h2>
                    <p><i class="fas fa-check-circle fs-5 text-primary"></i> We have received your payment. You will
                        receive email shortly in your account.</p>
                    <p><i class="fas fa-exclamation-circle fs-5 text-warning"></i> If you find any difficulty, drop an
                        email to <?php echo SITE_BILLING_EMAIL ?></p>
                    <?php
					// if ($sendedToadmin) {
						?>
                    <!-- <p><small>Order details has been sent to your email.</small></p> -->
                    <?php
					// }
					?>
                </div>
            </div>

            <!--======= column 2 =======-->

            <div class="col-11 col-md-10 mb-3 mb-md-5 p-4 text-center">
                <p>Your order status will updated to you, Now you can go back.</p>
                <div class="mt-3">
                    <a class="btn btn-primary" href="../app.client.php">My Account</a>
                    <a class="btn btn-primary" href="<?= URL ?>/guest-post-article-submit.php?order=<?= base64_encode(urlencode($orderId)) ?>">See Order</a>
                </div>
            </div>
        </div>
    </div>
    <div class="mainWrapBottom"></div>
    <!-- End  MainWrap -->

    <!-- Start Foter -->
    <?php require_once "../partials/footer.php"; ?>
    <!-- End Foter -->
	<script src="<?php echo URL;?>/plugins/jquery-3.6.0.min.js"></script>
    <script src="<?php echo URL;?>/plugins/bootstrap-5.2.0/js/bootstrap.bundle.js"></script>
</body>

</html>