<?php
session_start();
require_once dirname(__DIR__) .  "/includes/constant.inc.php";
require_once ROOT_DIR . "/_config/dbconnect.php";

require_once ROOT_DIR . "/includes/order-constant.inc.php";
require_once ROOT_DIR . "/includes/content.inc.php";
require_once ROOT_DIR . "/includes/user.inc.php";
require_once ROOT_DIR . "/includes/email.inc.php";
require_once ROOT_DIR . "/includes/registration.inc.php";
require_once ROOT_DIR . "/includes/mail-functions.php";
require_once ROOT_DIR . "/includes/paypal.inc.php";

require_once ROOT_DIR . "/classes/gp-order.class.php";
require_once ROOT_DIR . "/classes/orderStatus.class.php";
require_once ROOT_DIR . "/classes/error.class.php";
require_once ROOT_DIR . "/classes/notification.class.php";
require_once ROOT_DIR . "/classes/date.class.php";
require_once ROOT_DIR . "/classes/utility.class.php"; 
require_once ROOT_DIR . "/classes/utilityMesg.class.php"; 

/* INSTANTIATING CLASSES */
$PackageOrder   = new PackageOrder();
$OrderStatus	= new OrderStatus();
$error			= new MyError();
$Notifications  = new Notifications();
$dateUtil		= new DateUtil();
$utility		= new Utility();
$uMesg 			= new MesgUtility();

###############################################################################################

require_once ROOT_DIR ."/classes/customer.class.php";
$customer		= new Customer();
$cusId			= $utility->returnSess('userid', 0);
$cusDtl			= $customer->getCustomerData($cusId);


###############################################################################################


//declare vars
$typeM			= $utility->returnGetVar('typeM','');

if (!isset($_POST)) {
	$previousPage = $utility->goToPreviousSessionPage();
	if ($previousPage == 0 || $previousPage == null) {
		header("Location: ".URL."/app.client");
		exit;
	}else {
		header("Location: ".$previousPage);
		exit;
	}
}

if (!isset($_SESSION['payment-process']) || $_SESSION['payment-process'] != true) {
	header("Location: ".URL."/app.client");
	exit;
}

$reference_link = URL.'/package-order-history?order=';

// Update Order Status 
if (isset($_POST['data']) && isset($_POST['orderId'])) {
	
	$orderId = $_POST['orderId'];
	
	//fetch the order details
	$orderDetail 	= $PackageOrder->gpOrderById($orderId);

	$statusCode 		= $orderDetail['order_status'];
	$orderPrice 		= $orderDetail['price'];
	$dueAmount 			= $orderDetail['due_amount'];
	$paidAmount 		= $orderDetail['paid_amount'];
	$reference_link	   .= base64_encode(urlencode($orderId));
	
	//order status
	$statusName 		= $OrderStatus->getOrdStatName($statusCode);


	$details = (array)json_decode($_POST['data']);
	// print_r($details);exit;
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

	$t_date = $dateUtil->todayWithTime('-');

	if (ucfirst(strtolower($trxnStatus)) == COMPLETED) {
		
		$_SESSION['pay_success']  = true;

		$updated = $PackageOrder->updatePayment($orderId, $trxnId, 'Paypal', COMPLETEDCODE, COMPLETEDCODE);
		if ($updated == 1 || $updated == true) {
			$added = $PackageOrder->addPackOrderDtls($orderId, COMPLETEDCODE, ORDPY001, $cusDtl[0][2], $cusDtl[0][2]);
			$Notifications->addNotification(ORD_UPDATE, ORDPY001, ORD_PY_SUCESS, $reference_link, $cusId);

		}
		
	}else {
		$updated = $PackageOrder->updatePayment($orderId, $trxnId, 'PayLater', FAILEDCODE, COMPLETEDCODE);
		if ($updated == 1 || $updated == true) {
			$added = $PackageOrder->addPackOrderDtls($orderId, FAILEDCODE, ORDPY006, $cusDtl[0][2], $cusDtl[0][2]);
			$Notifications->addNotification(ORD_UPDATE, ORDPY006, ORD_PY_FAILED, $reference_link, $cusId);
		}
	}
	
}//end of post request data cheaking

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

	//session array
	$sess_arr = array('payment-process', 'sitePrice', 'order-data', 'orderId', 'trxn_id', 'pay_success');
	$utility->delSessArr($sess_arr);
	unset($_POST);
}else {
	echo 'Payment Failed!';
}

*/



?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel="shortcut icon" href="<?php echo FAVCON_PATH?>" type="image/png" />
    <link rel="apple-touch-icon" href="<?php echo FAVCON_PATH?>" />
    <title>Payment Success - Order Received</title>
    <link rel="stylesheet" href="<?= URL ?>/style/ansysoft.css" type="text/css" />
    <link rel="stylesheet" href="<?= URL ?>/plugins/bootstrap-5.2.0/css/bootstrap.css" />
    <link rel="stylesheet" href="<?= URL ?>/plugins/fontawesome-6.1.1/css/all.css" />
    <link rel="stylesheet" href="<?= URL ?>/css/style.css" />
    <link rel="stylesheet" href="<?= URL ?>/css/payment-status.css" />

</head>


<body>

    <!-- Start  Header -->
    <?php require_once URL."/components/navbar.php"; ?>
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
                    <a class="btn btn-primary" href="<?= URL ?>/app.client">My Account</a>
                    <a class="btn btn-primary" href="<?= URL ?>/my-orders">My Orders</a>
                </div>
            </div>
        </div>
    </div>
    <div class="mainWrapBottom"></div>
    <!-- End  MainWrap -->

    <!-- Start Foter -->
    <?php require_once URL."/components/footer.php"; ?>
    <!-- End Foter -->
	<script src="<?= URL;?>/plugins/jquery-3.6.0.min.js"></script>
    <script src="<?= URL;?>/plugins/bootstrap-5.2.0/js/bootstrap.bundle.js"></script>
</body>

</html>