<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
require_once "../includes/constant.inc.php";

require_once "../_config/dbconnect.php";
require_once "../_config/dbconnect.trait.php";


require_once "../includes/user.inc.php";
require_once "../includes/email.inc.php";
require_once "../includes/registration.inc.php";
require_once "../includes/mail-functions.php";
require_once "../includes/paypal.inc.php";

require_once "../classes/domain.class.php"; 
require_once "../classes/blog_mst.class.php"; 
require_once "../classes/orderStatus.class.php";
require_once "../classes/error.class.php";
require_once "../classes/date.class.php";
require_once "../classes/content-order.class.php";
require_once "../classes/wishList.class.php";
require_once "../classes/utility.class.php"; 
require_once "../classes/utilityMesg.class.php"; 

/* INSTANTIATING CLASSES */
$domain			= new Domain();
$BlogMst		= new BlogMst();
// $ordObj			= new Order();
$OrderStatus	= new OrderStatus();
$error			= new MyError();
$ContentOrder	= new ContentOrder();
$WishList		= new WishList();

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


if (!isset($_SESSION['domainName']) && !isset($_SESSION['sitePrice']) && !isset($_SESSION['order-data'])) {
	header("Location: ../my-orders.php");
	exit;
}else {
	
	$clientUserId       = $_SESSION['userid'];
	$clientName         = $_SESSION['name'];
	$clientEmail        = $_SESSION['USERcontinuecontent_ecom_SESS2016'];

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

		$_SESSION['orderId'] = $clientOrderData;

		$domain = $BlogMst->showBlogbyDomain($clientOrderedSite);
    	$itemAmount = $domain[9]+$domain[16]; // cost + ext_cost
		
		// $sess_arr = array('domainName','sitePrice','order-data');
		// $utility->delSessArr($sess_arr);

}


// Update Order Status 
if ( isset($_POST['blogId'])) {
	
	$blogId 				= $_POST['blogId'];
	$amount 				= 00;
	$paid_amount 			= 00;   // paid ammount
	$trxnId 				= '';	//geting the transection id 
	$trxnStatus 			= 'Pay Later';	//geting the transection status
	$t_date 				= date('Y-m-d H:i:s');
	$_SESSION['trxn_id']	= $trxnId;

	if ($trxnStatus == "Pay Later") {
		
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
		$ContentOrder->addOrderTransection($_SESSION['orderId'], $_SESSION['trxn_id'], "Pay Later", $itemAmount, $clientOrderPrice, $paid_amount, $t_date, $clientEmail);

		$ContentOrder->addOrderUpdate($_SESSION['orderId'], 'Order Placed', '', $cusDtl[0][0]);


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

	adminOrderPlacedMail($fromMail_admin, $toMail_admin, $toName_admin, $cusDtls_arr, $cusData_arr,  $orddtls_arr, $orddata_arr, $txndtls_arr, $txndata_arr, $addedOn);


	// ================================== MAIL SENDED TO ADMIN ================================== 


	// ===================================================================================================================
	// =========================================		SEND MAIL TO CLIENT		 =========================================
	// ===================================================================================================================

	$fromMail       = SITE_BILLING_EMAIL;
	$toMail         = $orderDetail[0]['clientEmail'];
	$toName         = $orderDetail[0]['clientName'];
	

	$mailSended = customerOrderPlacedMail($fromMail, $toMail, $toName, $orddtls_arr, $orddata_arr, $txndtls_arr, $txndata_arr, $addedOn);

	// ================================== MAIL SENDED TO CLIENT ================================== 
	

	// ===================================================================================================================
	// =========================================		SEND MAIL TO SELLER		 =========================================
	// ===================================================================================================================

	$fromMail       = SITE_BILLING_EMAIL;
	$blogName		= $clientOrderedSite;
	$sellerMail     = $sellerEmail;
	$sellerName     = $seller['fname'].' '.$seller['lname'];
	

	sellerOrderinformMail($fromMail, $sellerMail, $sellerName, $blogName, $orddtls_arr, $orddata_arr, $addedOn);

	// ================================== MAIL SENDED TO SELLER ================================== 
	


	//session array
	$sess_arr = array('domainName', 'sitePrice', 'order-data', 'orderId', 'trxn_id', 'pay_success');
	$utility->delSessArr($sess_arr);
	unset($_POST);
}
		
?>
<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Payment Success - Order Received</title>
    <link rel="stylesheet" href="<?php echo URL ?>style/ansysoft.css" type="text/css" />
    <link rel="stylesheet" href="../plugins/bootstrap-5.2.0/css/bootstrap.css">
    <link rel="stylesheet" href="../plugins/fontawesome-6.1.1/css/all.css">

    <!-- <link rel="stylesheet" href="css/style.css"> -->
    <link rel="stylesheet" href="../css/leelija.css">
    <link rel="stylesheet" href="../css/payment-status.css">

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
                    <h2 class="text-primary">Thanking you for your order.</h2>
                    <p><i class="fas fa-check-circle fs-5 text-primary"></i> We have received your order. You will
                        receive email shortly in your account.</p>
                    <p><i class="fas fa-exclamation-circle fs-5 text-warning"></i> If you find any difficulty, drop an
                        email to <?php echo SITE_BILLING_EMAIL ?></p>
					<?php
					if ($mailSended) {
						?>
						<p><small>Order details has been sent to your email.</small></p>
						<?php
					}
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
    <?php require_once "../partials/footer.php"; ?>
    <!-- End Foter -->
</body>

</html>