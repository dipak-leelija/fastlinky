<?php
session_start();
require_once "includes/constant.inc.php";

require_once ROOT_DIR."/_config/dbconnect.php";

require_once ROOT_DIR."/includes/user.inc.php";
require_once ROOT_DIR."/includes/email.inc.php";
require_once ROOT_DIR."/includes/registration.inc.php";
require_once ROOT_DIR."/includes/mail-functions.php";
require_once ROOT_DIR."/includes/paypal.inc.php";

require_once ROOT_DIR."/classes/customer.class.php";
require_once ROOT_DIR."/classes/domain.class.php";
require_once ROOT_DIR."/classes/blog_mst.class.php";
require_once ROOT_DIR."/classes/orderStatus.class.php";
require_once ROOT_DIR."/classes/error.class.php";
require_once ROOT_DIR."/classes/date.class.php";
require_once ROOT_DIR."/classes/content-order.class.php";
require_once ROOT_DIR."/classes/wishList.class.php";
require_once ROOT_DIR."/classes/utility.class.php"; 
require_once ROOT_DIR."/classes/utilityMesg.class.php"; 

/* INSTANTIATING CLASSES */
$customer		= new Customer();
$domain			= new Domain();
$BlogMst		= new BlogMst();
$OrderStatus	= new OrderStatus();
$error			= new MyError();
$ContentOrder	= new ContentOrder();
$WishList		= new WishList();
$dateUtil		= new DateUtil();
$utility		= new Utility();
$uMesg 			= new MesgUtility();

###############################################################################################

$cusId		= $utility->returnSess('userid', 0);
$cusDtl		= $customer->getCustomerData($cusId);


###############################################################################################

//declare vars
$typeM		= $utility->returnGetVar('typeM','');


if (!isset($_POST)) {
	header("Location: dashboard.php");
	exit;
}

if (!isset($_SESSION['domainName']) && !isset($_SESSION['clientOrderPrice']) && !isset($_SESSION['order-data'])) {
	header("Location: my-orders.php");
	exit;
}else {
	
	$clientUserId       = $_SESSION['userid'];
	$clientName         = $cusDtl[0][5].' '.$cusDtl[0][6];
	$clientEmail        = $cusDtl[0][3];

	// Order Data
	$clientOrderedSite 	= $_SESSION['domainName'];
	$clientOrderPrice	= $_SESSION['clientOrderPrice'];
	$orderData 			= $_SESSION['order-data'];
	
	$clientContent		= $orderData['clientContent'];
	$clientTargetUrl	= $orderData['clientTargetUrl'];
	$clientAnchorText 	= $orderData['clientAnchorText'];
	$clientRequirement	= $orderData['clientRequirement'];
	
				
        /**
         * 
         * ORDER STATUS CODE
         * 1 = Delivered
         * 2 = Pending
         * 3 = Processing
         * 4 = Oedered
         * 
         *  */ 
		$clientOrderData = $ContentOrder->contentOrderDetails($clientUserId, $clientName, $clientEmail, $clientOrderedSite,$clientTargetUrl, $clientAnchorText, $clientContent, $clientRequirement, $clientOrderPrice, 2);

		$_SESSION['orderId'] = $clientOrderData ;
		$domain = $BlogMst->showBlogbyDomain($clientOrderedSite);
    	$itemAmount = $domain[9]+$domain[16]; // cost + ext_cost
		
		// $sess_arr = array('domainName','sitePrice','order-data');
		// $utility->delSessArr($sess_arr);

}


// Update Order Status 
if (isset($_POST['data']) && isset($_POST['blogId'])) {
	
	$blogId = $_POST['blogId'];

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
		
		$_SESSION['trxn_id']	  = $trxnId;
		$_SESSION['pay_success']  = true;



		/**
		 * 
		 * ORDER STATUS CODE
		 * 1 = Delivered
		 * 2 = Pending
		 * 3 = Processing
		 * 4 = Oedered
		 * 
		 *  */ 
		$ContentOrder->contentOrderStatusUpdate($_SESSION['orderId'], $_SESSION['trxn_id'], $trxnStatus, 4);
		$ContentOrder->addOrderTransection($_SESSION['orderId'], $_SESSION['trxn_id'], "Paypal", $itemAmount, 0, $paid_amount, $t_date, $clientEmail);

		$ContentOrder->addOrderUpdate($_SESSION['orderId'], 'Order Placed', '', $cusDtl[0][0]);
		$BlogMst->incrBlogSoldQty($blogId, 1);


	}else {

		$ContentOrder->contentOrderStatusUpdate($_SESSION['orderId'], $_SESSION['trxn_id'], $trxnStatus, 2);
		
	}
	
}//end of post request data cheaking



// if(isset($_SESSION['ordId'])) {
if(isset($_SESSION['orderId'])) {

	//fetch the order details
	$orderDetail 	= $ContentOrder->showOrderdContentsByCol('order_id', $_SESSION['orderId'], '', '');

 
	//Remove Item From WishList after purchase
	$WishList->removeWish($orderDetail[0]['clientUserId'], $blogId);
	

	//order status
	$statusCode	= $orderDetail[0]['clientOrderStatus'];
	$statusName 		= $OrderStatus->getOrdStatName($statusCode);


	// Client Details 
	$client		= $customer->getCustomerData($orderDetail[0]['clientUserId']);


	$domainDetails = $BlogMst->showBlogbyDomain($orderDetail[0]['clientOrderedSite']);
	$sellerEmail = $domainDetails[19];

	$seller = $customer->getCustomerByemail($sellerEmail);

	// ===================================================================================================================
	// =========================================		SEND MAIL TO ADMIN		 =========================================
	// ===================================================================================================================


	$addedOn 	= date('l, jS \of F Y, h:i a', strtotime($orderDetail[0]['added_on']));


	// customer details 
	$cusDtls_arr = array(
					'CUSTOMER NAME',		//0
					'CUSTOMER EMAIL', 		//1
					'BUSINESS NAME', 		//2
					'CITY',					//3
					'STATE',				//4
					'POSTAL CODE',			//5
					'PHONE',				//6
					'PLACED ON'				//7
					);

	$cusData_arr = array(
						$orderDetail[0]['clientName'], 		//0
						$orderDetail[0]['clientEmail'],		//1
						$client[0][12],						//2
						$client[0][27],						//3
						$client[0][28],						//4
						$client[0][29],						//5
						$client[0][34],						//6
						$addedOn							//7
					);



	
	// order details 
	$orddtls_arr = array(
						'NAME', 		//0
						'SERVICE',		//1
						'SITE',			//2
						'CITY', 		//3
						'ZIP CODE', 	//4
						'COUNTRY', 		//5
						'PHONE', 		//6
						'EMAIL', 		//7
						'STATUS', 		//8
						'PLACED ON',	//9
					);

	$orddata_arr = array(
						$orderDetail[0]['clientName'],	//0 
						'Guest Posting', 				//1
						$clientOrderedSite,				//2
						$client[0][27],		 			//3
						$client[0][29], 				//4
						$client[0][30], 				//5
						$client[0][34], 				//6
						$orderDetail[0]['clientEmail'], //7
						$statusName,					//8
						$addedOn
					);
	



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
	
	


	// $fromMail_admin 		=	SITE_EMAIL;
	// $toMail_admin		=	SITE_BILLING_EMAIL;
	// $toName_admin		= 	SITE_BILLING_NAME;

	$fromMail_admin 	=	SITE_EMAIL;
	$toMail_admin		=	'rahulmajumdar400@gmail.com';
	$toName_admin		= 	'Leelija Admin';

	// adminOrderPlacedMail($fromMail_admin, $toMail_admin, $toName_admin, $cusDtls_arr, $cusData_arr,  $orddtls_arr, $orddata_arr, $txndtls_arr, $txndata_arr, $addedOn);


	// ================================== MAIL SENDED TO ADMIN ================================== 


	// ===================================================================================================================
	// =========================================		SEND MAIL TO CLIENT		 =========================================
	// ===================================================================================================================

	$fromMail       = SITE_BILLING_EMAIL;
	$toMail         = $orderDetail[0]['clientEmail'];
	$toName         = $orderDetail[0]['clientName'];
	

	// $mailSended = customerOrderPlacedMail($fromMail, $toMail, $toName, $orddtls_arr, $orddata_arr, $txndtls_arr, $txndata_arr, $addedOn);

	// ================================== MAIL SENDED TO CLIENT ================================== 
	

	// ===================================================================================================================
	// =========================================		SEND MAIL TO SELLER		 =========================================
	// ===================================================================================================================

	$fromMail       = SITE_BILLING_EMAIL;
	$blogName		= $clientOrderedSite;
	$sellerMail     = $sellerEmail;
	$sellerName     = $seller['fname'].' '.$seller['lname'];
	

	// sellerOrderinformMail($fromMail, $sellerMail, $sellerName, $blogName, $orddtls_arr, $orddata_arr, $addedOn);

	// ================================== MAIL SENDED TO SELLER ================================== 
	

	//session array
	$sess_arr = array('domainName', 'clientOrderPrice', 'order-data', 'orderId', 'trxn_id', 'pay_success');
	$utility->delSessArr($sess_arr);
	unset($_POST);
}
		
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="robots" content="noindex,nofollow">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Success - Order Received | <?php echo COMPANY_S; ?></title>
    <link rel="shortcut icon" href="<?php echo FAVCON_PATH?>" type="image/png" />
    <link rel="apple-touch-icon" href="<?php echo FAVCON_PATH?>" />

    <!-- <link rel="stylesheet" href="<?php echo URL ?>style/ansysoft.css" type="text/css" /> -->
    <link rel="stylesheet" href="<?php echo URL ?>/plugins/bootstrap-5.2.0/css/bootstrap.css">
    <link rel="stylesheet" href="<?php echo URL ?>/plugins/fontawesome-6.1.1/css/all.css">
	<link href="css/style.css" rel='stylesheet' type='text/css' />
    <link rel="stylesheet" href="<?php echo URL ?>/css/payment-status.css">

</head>


<body>

    <!-- Start  Header -->
    <?php require_once "partials/navbar.php"; ?>
    <!-- End  Header -->

    <!-- Start  container -->
    <div id="container" class="mt-5">

        <div class="row flex-column  align-items-center">

            <!--======= column 1 =======-->
            <div class="col-11 col-md-10">
                <div class="mt-4 p-5 bg-lighter-blue text-white rounded">
                    <h2 class="text-primary">Thanking you for your payment.</h2>
                    <p><i class="fas fa-check-circle fs-5 text-primary"></i> We have received your payment. You will
                        receive email shortly in your account.</p>
                    <p><i class="fas fa-exclamation-circle fs-5 text-warning"></i> If you find any difficulty, drop an
                        email to <?php echo SITE_BILLING_EMAIL ?></p>
                    <?php
					// if ($mailSended) {
					// 	?>
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
                    <a class="btn btn-primary" href="app.client.php">My Account</a>
                    <a class="btn btn-primary" href="my-orders.php">My Orders</a>
                </div>
            </div>
        </div>
    </div>
    <div class="mainWrapBottom"></div>
    <!-- End  MainWrap -->

    <!-- Start Foter -->
    <?php require_once ROOT_DIR."/partials/footer.php"; ?>
    <!-- End Foter -->
</body>

</html>