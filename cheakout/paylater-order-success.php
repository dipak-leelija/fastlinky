<?php
session_start();
require_once dirname(__DIR__) .  "/includes/constant.inc.php";

require_once ROOT_DIR . "/includes/user.inc.php";
require_once ROOT_DIR . "/includes/email.inc.php";
require_once ROOT_DIR . "/includes/registration.inc.php";
require_once ROOT_DIR . "/includes/mail-functions.php";
require_once ROOT_DIR . "/includes/paypal.inc.php";

require_once ROOT_DIR . "/_config/dbconnect.php";
require_once ROOT_DIR . "/classes/customer.class.php";
require_once ROOT_DIR . "/classes/domain.class.php"; 
require_once ROOT_DIR . "/classes/blog_mst.class.php"; 
require_once ROOT_DIR . "/classes/orderStatus.class.php";
require_once ROOT_DIR . "/classes/error.class.php";
require_once ROOT_DIR . "/classes/date.class.php";
require_once ROOT_DIR . "/classes/content-order.class.php";
require_once ROOT_DIR . "/classes/wishList.class.php";
require_once ROOT_DIR . "/classes/location.class.php";

require_once ROOT_DIR . "/classes/utility.class.php"; 
require_once ROOT_DIR . "/classes/utilityMesg.class.php"; 

/* INSTANTIATING CLASSES */
$customer		= new Customer();
$domain			= new Domain();
$BlogMst		= new BlogMst();
$OrderStatus	= new OrderStatus();
$error			= new MyError();
$ContentOrder	= new ContentOrder();
$WishList		= new WishList();
$Location		= new Location();

$dateUtil		= new DateUtil();
$utility		= new Utility();
$uMesg 			= new MesgUtility();

###############################################################################################
//declare vars
$typeM		= $utility->returnGetVar('typeM','');

$cusId		= $utility->returnSess('userid', 0);
$cusDtl		= $customer->getCustomerData($cusId);



// $clientName = $cusDtl[0][5].' '.$cusDtl[0][5];

###############################################################################################


if (!isset($_POST)) {
	header("Location: ".URL . "/dashboard.php");
	exit;
}


if (!isset($_SESSION['domainName']) && !isset($_SESSION['sitePrice']) && !isset($_SESSION['order-data']) && !isset($_SESSION['orderId'])) {
	header("Location: ".URL . "/my-orders.php");
	exit;
}else {
	
	$clientUserId       = $_SESSION['userid'];
	$clientName         = $_SESSION['name'];
	$clientEmail        = $_SESSION[USR_SESS];

	// Order Data
	$clientOrderedSite 	= $_SESSION['domainName'];
	$clientOrderPrice	= $_SESSION['clientOrderPrice'];
	$contentData 		= $_SESSION['content-data'];
	
		$domain = $BlogMst->showBlogbyDomain($clientOrderedSite);
    	$itemAmount = $domain[9]+$domain[16]; // cost + ext_cost
		
		$sess_arr = array('domainName','sitePrice','order-data');
		$utility->delSessArr($sess_arr);

}


// Update Order Status 
if ( isset($_POST['blogId'])) {
	
	$blogId 				= $_POST['blogId'];
	$amount 				= 00;
	$paid_amount 			= 00;   // paid ammount
	$trxnId 				= '';	//geting the transection id 
	$trxnStatus 			= 'Completed';	//geting the transection status
	$t_date 				= date('Y-m-d H:i:s');
	$_SESSION['trxn_id']	= $trxnId;
	

	if ($trxnStatus == "Completed") {
		
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
		$ContentOrder->contentOrderStatusUpdate($_SESSION['orderId'], 4);
		
		$ContentOrder->addOrderTransection($_SESSION['orderId'], $trxnId, "Pay Later", $trxnStatus, $itemAmount, $clientOrderPrice, $paid_amount, $clientEmail);
		
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
	$statusCode			= $orderDetail[0]['order_status'];
	$statusName 		= $OrderStatus->getOrdStatName($statusCode);


	// Client Details 
	$client		= $customer->getCustomerData($orderDetail[0]['clientUserId']);

	//country details
	$countryDetails = $Location->getCountyById($client[0][30]);
	$countryName   	= $countryDetails['name'];

	//city details
	$cityDetails 	= $Location->getCityDataById($client[0][27]);
	$cityName = '';
	if (isset($cityDetails['city'])) {
		$cityName = $cityDetails['city'];
	}

	//state details
	$stateDetails 	= $Location->getStateData($client[0][28]);
	$stateName = '';
	if (isset($stateName['state_name'])) {
		$stateName 		= $stateDetails['state_name'];
	}


	$domainDetails = $BlogMst->showBlogbyDomain($orderDetail[0]['clientOrderedSite']);
	$sellerEmail = $domainDetails[19];
	
	$seller = $customer->getCustomerByemail($sellerEmail);
	
	// transection details
	$txn = $ContentOrder->showTrxnByOrderId($_SESSION['orderId']);
	

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
						$clientName,						//0
						$orderDetail[0]['clientEmail'],		//1
						$client[0][12],						//2
						$cityName,							//3
						$stateName,							//4
						$client[0][29],						//5
						$client[0][34],						//6
						$addedOn							//7
					);



	
	// order details for admin and customer
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
						$clientName,					//0 
						'Guest Posting', 				//1
						$clientOrderedSite,				//2
						$cityName,			 			//3
						$client[0][29], 				//4
						$countryName,	 				//5
						$client[0][34], 				//6
						$orderDetail[0]['clientEmail'], //7
						$statusName,					//8
						$addedOn
					);
	

	// order details for admin and customer
	$orddtls_arr_seller = array(
						'NAME', 		//0
						'SERVICE',		//1
						'SITE',			//2
						'CITY', 		//3
						'ZIP CODE', 	//4
						'COUNTRY', 		//5
						'STATUS', 		//6
						'PLACED ON',	//7
					);

	$orddata_arr_seller = array(
						$clientName,					//0 
						'Guest Posting', 				//1
						$clientOrderedSite,				//2
						$cityName,			 			//3
						$client[0][29], 				//4
						$countryName,	 				//5
						$statusName,					//6
						$addedOn						//7
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
						'#'.$txn['transection_id'],					//1
						'$'.$txn['item_amount'],					//2
						'PayLater',									//3
						$txn['transection_status'],					//4
						$addedOn
					);
	
	


	// $fromMail_admin 	=	SITE_ADMIN_EMAIL;
	// $toMail_admin		=	SITE_EMAIL;
	// $toName_admin		= 	SITE_ADMIN_NAME;

	// adminOrderPlacedMail($fromMail_admin, $toMail_admin, $toName_admin, $cusDtls_arr, $cusData_arr,  $orddtls_arr, $orddata_arr, $txndtls_arr, $txndata_arr, $addedOn);


	// ================================== MAIL SENDED TO ADMIN ================================== 


	// ===================================================================================================================
	// =========================================		SEND MAIL TO CLIENT		 =========================================
	// ===================================================================================================================

	// $fromMail       = SITE_EMAIL;
	// $toMail         = $orderDetail[0]['clientEmail'];
	// $toName         = $clientName;
	

	// $mailSended = customerOrderPlacedMail($fromMail, $toMail, $toName, $orddtls_arr, $orddata_arr, $txndtls_arr, $txndata_arr, $addedOn);

	// ================================== MAIL SENDED TO CLIENT ================================== 
	

	// ===================================================================================================================
	// =========================================		SEND MAIL TO SELLER		 =========================================
	// ===================================================================================================================

	// $fromMail       = SITE_EMAIL;
	// $blogName		= $clientOrderedSite;
	// $sellerMail     = $sellerEmail;
	// $sellerName     = $seller['fname'].' '.$seller['lname'];
	

	// sellerOrderinformMail($fromMail, $sellerMail, $sellerName, $blogName, $orddtls_arr_seller, $orddata_arr_seller, $addedOn);

	// ================================== MAIL SENDED TO SELLER ================================== 
	


	//session array
	$sess_arr = array('domainName', 'sitePrice', 'order-data', 'orderId', 'trxn_id', 'pay_success');
	$utility->delSessArr($sess_arr);
	unset($_SESSION['content-data']);
	unset($_POST);
}
		
?>
<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Payment Success - Order Received</title>
	
	<link rel="shortcut icon" href="<?php echo FAVCON_PATH?>" type="image/png" />
    <link rel="apple-touch-icon" href="<?php echo FAVCON_PATH?>" />

    <link rel="stylesheet" href="<?php echo URL ?>style/ansysoft.css" type="text/css" />
    <link rel="stylesheet" href="<?php echo URL ?>/plugins/bootstrap-5.2.0/css/bootstrap.css">
    <link rel="stylesheet" href="<?php echo URL ?>/plugins/fontawesome-6.1.1/css/all.css">

    <link rel="stylesheet" href="<?php echo URL ?>/css/leelija.css">
    <link rel="stylesheet" href="<?php echo URL ?>/css/payment-status.css">

</head>


<body>

    <!-- Start  Header -->
    <?php require_once ROOT_DIR . "/partials/navbar.php"; ?>
    <!-- End  Header -->

    <!-- Start  container -->
    <div id="container">

        <div class="row flex-column  align-items-center mt-5">

            <!--======= column 1 =======-->
            <div class="col-11 col-md-10">
                <div class="mt-4 p-5 bg-lighter-blue text-white rounded">
                    <h2 class="text-primary">Thanking you for your order.</h2>
                    <p><i class="fas fa-check-circle fs-5 text-primary"></i> We have received your order. You will
                        receive email shortly in your account.</p>
                    <p><i class="fas fa-exclamation-circle fs-5 text-warning"></i> If you find any difficulty, drop an
                        email to <?php echo SITE_BILLING_EMAIL ?></p>
					<?php
					// if ($mailSended) {
					?>
					<!-- // 	<p><small>Order details has been sent to your email.</small></p> -->
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
                    <a class="btn btn-primary" href="../my-orders.php">My Orders</a>
                </div>
            </div>
        </div>
    </div>
    <div class="mainWrapBottom"></div>
    <!-- End  MainWrap -->

    <!-- Start Foter -->
    <?php require_once ROOT_DIR . "/partials/footer.php"; ?>
    <!-- End Foter -->
	<script src="<?php echo URL;?>/plugins/jquery-3.6.0.min.js"></script>
    <script src="<?php echo URL;?>/plugins/bootstrap-5.2.0/js/bootstrap.bundle.js"></script>
</body>

</html>