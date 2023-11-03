<?php
session_start();
require_once dirname(__DIR__) .  "/includes/constant.inc.php";

require_once ROOT_DIR . "/_config/dbconnect.php";
require_once ROOT_DIR . "/includes/user.inc.php";
require_once ROOT_DIR . "/includes/content.inc.php";
require_once ROOT_DIR . "/includes/order-constant.inc.php";
require_once ROOT_DIR . "/includes/email.inc.php";
require_once ROOT_DIR . "/includes/registration.inc.php";
require_once ROOT_DIR . "/includes/paypal.inc.php";

require_once ROOT_DIR."/classes/class.phpmailer.php";
require_once ROOT_DIR."/mail-sending/order-placed-template.php";

require_once ROOT_DIR . "/classes/customer.class.php";
require_once ROOT_DIR . "/classes/encrypt.inc.php";
require_once ROOT_DIR . "/classes/domain.class.php"; 
require_once ROOT_DIR . "/classes/blog_mst.class.php"; 
require_once ROOT_DIR . "/classes/orderStatus.class.php";
require_once ROOT_DIR . "/classes/error.class.php";
require_once ROOT_DIR . "/classes/date.class.php";
require_once ROOT_DIR . "/classes/content-order.class.php";
require_once ROOT_DIR . "/classes/notification.class.php";

require_once ROOT_DIR . "/classes/wishList.class.php";
require_once ROOT_DIR . "/classes/location.class.php";

require_once ROOT_DIR . "/classes/utility.class.php"; 
require_once ROOT_DIR . "/classes/utilityMesg.class.php";


/* INSTANTIATING CLASSES */
$customer		= new Customer();
$domain			= new Domain();
$BlogMst		= new BlogMst();
$OrderStatus	= new OrderStatus();
$MyError		= new MyError();
$ContentOrder	= new ContentOrder();
$Notifications  = new Notifications();

$WishList		= new WishList();
$Location		= new Location();

$DateUtil		= new DateUtil();
$PHPMailer      = new PHPMailer();
$MyError 		= new MyError();
$utility		= new Utility();

###############################################################################################
//declare vars
$typeM		= $utility->returnGetVar('typeM','');

$cusId		= $utility->returnSess('userid', 0);
$cusDtl		= $customer->getCustomerData($cusId);


###############################################################################################


if (!isset($_POST)) {
	header("Location: ".URL . "/dashboard");
	exit;
}


if (!isset($_SESSION[ORDERDOMAIN]) && !isset($_SESSION[ORDERSITECOST]) && !isset($_SESSION[ORDERID])) {
	header("Location: ".URL . "/my-orders");
	exit;
}else {
	
	$clientUserId       = $_SESSION['userid'];
	$clientName         = $_SESSION['name'];
	$clientFName        = $_SESSION['welcome_name'];
	$clientEmail        = $_SESSION[USR_SESS];
	$orderId			= $_SESSION[ORDERID];
	$reference_link		= URL."/guest-post-article-submit.php?order=".base64_encode(urlencode($orderId));

	// Order Data
	$clientOrderedSite 	= $_SESSION[ORDERDOMAIN];
	$clientOrderPrice	= $_SESSION[ORDERSITECOST];
	$contetPrice 		= $_SESSION['contetPrice'];
	$contentData 		= $_SESSION['content-data'];

	
		$domain = $BlogMst->showBlogbyDomain($clientOrderedSite);
    	$itemAmount = $domain['ext_cost']; //ext_cost
		
		$content = $ContentOrder->getOrderContent($orderId);
		$nicheType = $content['niche_type'];
		if ($nicheType == GREYNICHECONTENT) {
			$itemAmount = $domain['grey_niche_cost'];
		}

		// $sess_arr = array(ORDERDOMAIN,'sitePrice');
		// $utility->delSessArr($sess_arr);

}


// Update Order Status 
if ( isset($_POST['blogId'])) {
	
	$blogId 				= $_POST['blogId'];
	$amount 				= 00;
	$paid_amount 			= 00;   // paid ammount
	$trxnId 				= '';	//geting the transection id 
	$trxnStatus 			= PENDINGCODE;	//geting the transection status
	$_SESSION['trxn_id']	= $trxnId;	
	$_SESSION['pay_success']  = true;


	$ContentOrder->contentOrderStatusUpdate($orderId, ORDEREDCODE);
	
	$ContentOrder->addOrderTransection($orderId, $trxnId, PAYLATER, $trxnStatus, $itemAmount, $contetPrice, $clientOrderPrice, $clientOrderPrice, $paid_amount, $clientEmail);
	
	$ContentOrder->addOrderUpdate($orderId, ORDS001, '', $clientUserId);
	$Notifications->addNotification(ORD_UPDATE, ORDS001, ORD_PLCD_M, $reference_link, $clientUserId);
	$BlogMst->incrBlogSoldQty($blogId, 1);


	
}//end of post request data cheaking



// if(isset($_SESSION['ordId'])) {
if(isset($_SESSION[ORDERID])) {

	$mailMsg = '';
	//fetch the order details
	$orderDetail 	= $ContentOrder->showOrderdContentsByCol('order_id', $orderId, '', '');

 
	//Remove Item From WishList after purchase
	$WishList->removeWish($orderDetail[0]['clientUserId'], $blogId);
	

	//order status
	// $statusCode			= $orderDetail[0]['order_status'];
	$statusName 		= $OrderStatus->getOrdStatName($orderDetail[0]['order_status']);
	$orderDate 			= $DateUtil->dateTimeNumber($orderDetail[0]['added_on']);


	// Client Details 
	$client		= $customer->getCustomerData($orderDetail[0]['clientUserId']);

	$customerFullName 	= $client[0][5].' '.$client[0][6]; 
	$customerFName		= $client[0][5];
	$customerEmail 		= $client[0][3];

	if ($client[0][31] != '') {
		$customerPhone = $client[0][31];
	}elseif ($client[0][32 != '']) {
		$customerPhone = $client[0][32];
	}elseif ($client[0][32] != '') {
		$customerPhone = $client[0][34];
	}else {
		$customerPhone = '';
	}


	$domainDetails = $BlogMst->showBlogbyDomain($orderDetail[0]['clientOrderedSite']);
	$sellerEmail = $domainDetails['created_by'];
	
	$seller = $customer->getCustomerByemail($sellerEmail);
	
	// transection details
	$txn = $ContentOrder->showTrxnByOrderId($orderId);
	$orderDomain = $utility->url_to_domain($clientOrderedSite);


	// ===================================================================================================================
	// =========================================		SEND MAIL TO ADMIN		 =========================================
	// ===================================================================================================================

	// customer details 
	$cusMailDataArr     = array( 'Order Status', 'Payment Mode', 'Phone', 'Email', 'Placed on');
	$cusMailValueArr  	= array( ORDERED, PAYLATER, $customerPhone, $customerEmail, $orderDate);


	// $fromMail_admin 	=	SITE_ADMIN_EMAIL;
	// $toMail_admin		=	SITE_EMAIL;
	// $toName_admin		= 	SITE_ADMIN_NAME;

	// adminOrderPlacedMail($fromMail_admin, $toMail_admin, $toName_admin, $cusDtls_arr, $cusData_arr,  $orddtls_arr, $orddata_arr, $txndtls_arr, $txndata_arr, $addedOn);


	// ================================== MAIL SENDED TO ADMIN ================================== 


	// ===================================================================================================================
	// =========================================		SEND MAIL TO CLIENT		 =========================================
	// ===================================================================================================================

    $toMail  		= $customerEmail;
	$toName   		= $customerFullName;
	$subject        = "Guest Post Order Placed Successfully!";
	$messageBody    = orderPlacedtoCustomerTemplate('#'.$orderId, $customerFName, $cusMailDataArr, $cusMailValueArr, $orderDomain);
	$invalidEmail 	= $MyError->invalidEmail($toMail);
	

    if(($toMail == '')||(mb_ereg("^ER",$invalidEmail))){
        $mailMsg = 'Receiver Email Address May Invalid or Not Found!';
	}elseif($toName == ''){
        $mailMsg = 'Receiver Name Not Found!';
    }else{

        try {
            $PHPMailer->IsSMTP();
            $PHPMailer->IsHTML(true);
			// $PHPMailer->Encoding = 'quoted-printable';
            $PHPMailer->Host        = gethostname();
            $PHPMailer->SMTPAuth    = true;
            $PHPMailer->Username    = SITE_EMAIL;
            $PHPMailer->Password    = SITE_EMAIL_P;
            $PHPMailer->From        = SITE_EMAIL;
            $PHPMailer->FromName    = COMPANY_FULL_NAME;
            $PHPMailer->Sender      = SITE_EMAIL;
            $PHPMailer->addAddress($toMail, $toName);
            $PHPMailer->Subject     = $subject;
            $PHPMailer->Body        = $messageBody;
            // $PHPMailer->send();

			// exit;

            if ($PHPMailer->send()) {
                $mailMsg = 'Message has been sent';
            }else {
                $mailMsg = "Message could not be sent. Mailer Error:-> {$PHPMailer->ErrorInfo}";
            }
            $PHPMailer->ClearAllRecipients();


        } catch (Exception $e) {
            $mailMsg = "Message could not be sent. Mailer Error:-> {$PHPMailer->ErrorInfo}";
        }
    }



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
	$sess_arr = array('reorder-page', 'contetPrice', ORDERDOMAIN, ORDERSITECOST, ORDERID, 'sitePrice', 'trxn_id', 'pay_success');
	$utility->delSessArr($sess_arr);
	unset($_SESSION['content-data']);
	unset($_POST);
}
		
?>
<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Successful Order - Order Received</title>

    <link rel="shortcut icon" href="<?php echo FAVCON_PATH?>" type="image/png" />
    <link rel="apple-touch-icon" href="<?php echo FAVCON_PATH?>" />

    <!-- plugins  files -->
    <link href="<?= URL ?>/plugins/bootstrap-5.2.0/css/bootstrap.css" rel="stylesheet" />
    <?php require_once ROOT_DIR.'/plugins/font-awesome/fontawesome.php'?>

	<!-- Custom css  -->
    <link href="<?= URL ?>/css/style.css" rel="stylesheet"  />
    <link href="<?= URL ?>/css/payment-status.css" rel="stylesheet" />

</head>


<body>

    <!-- Start  Header -->
    <?php require_once ROOT_DIR . "/components/navbar.php"; ?>
    <!-- End  Header -->

    <!-- Start  container -->
    <div id="container">

        <div class="row flex-column  align-items-center mt-5">

            <!--======= column 1 =======-->

            <div class="col-11 col-md-10">
                <div class="mt-4 p-5 bg-lighter-blue text-white rounded">
                    <h2 class="text-primary">Thanking you for your order.</h2>
                    <p><i class="fas fa-check-circle fs-5 text-primary"></i> We have received your order. 
						<?= $mailMsg != '' ? $mailMsg : ''; ?> </p>
                    <p><i class="fas fa-exclamation-circle fs-5 text-warning"></i> If you find any difficulty, drop an
                        email to <?php echo SITE_EMAIL ?></p>
                </div>
            </div>

            <!--======= column 2 =======-->

            <div class="col-11 col-md-10 mb-3 mb-md-5 p-4 text-center">
                <p>Your order status will updated to you, Now you can go back.</p>
                <div class="mt-3">
                    <a class="btn btn-primary" href=<?= URL."/app.client"; ?>>My Account</a>
                    <a class="btn btn-primary" href="<?= $reference_link; ?>">See Order</a>
                </div>
            </div>
        </div>
    </div>
    <div class="mainWrapBottom"></div>
    <!-- End  MainWrap -->

    <!-- Start Foter -->
    <?php require_once ROOT_DIR . "/components/footer.php"; ?>
    <!-- End Foter -->
    <script src="<?= URL;?>/plugins/jquery-3.6.0.min.js"></script>
    <script src="<?= URL;?>/plugins/bootstrap-5.2.0/js/bootstrap.bundle.js"></script>
</body>

</html>