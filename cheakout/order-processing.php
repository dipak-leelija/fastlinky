<?php
session_start();

require_once dirname(__DIR__)."/includes/constant.inc.php";
require_once ROOT_DIR."/_config/dbconnect.php";

require_once ROOT_DIR."/includes/content.inc.php";
require_once ROOT_DIR."/includes/order-constant.inc.php";

require_once ROOT_DIR."/classes/customer.class.php";
require_once ROOT_DIR."/classes/gp-package.class.php";
require_once ROOT_DIR."/classes/gp-order.class.php";
require_once ROOT_DIR."/classes/notification.class.php";
require_once ROOT_DIR."/classes/date.class.php";
require_once ROOT_DIR."/classes/location.class.php";
require_once ROOT_DIR."/classes/utility.class.php";

/* INSTANTIATING CLASSES */
$DateUtil       = new DateUtil();

$customer		= new Customer();
$GPPackage      = new GuestPostpackage();
$PackageOrder   = new PackageOrder();
$Notifications  = new Notifications();
$Location       = new Location();
$utility		= new Utility();


###############################################################################endregion$typeM		    = $utility->returnGetVar('typeM','');
//user id
$cusId		    = $utility->returnSess('userid', 0);
$cusDtl		    = $customer->getCustomerData($cusId);
$currentPage    = $utility->setCurrentPageSession();

require_once ROOT_DIR."/includes/check-customer-login.inc.php";


$reference_link = URL.'/package-order-history.php?order=';


if (isset($_POST['paymentdata']) && isset($_POST['pppamn'])) {
    
    $requiredAmount = $_POST['pppamn'];

    if (isset($_SESSION['package'])) {
        unset($_SESSION['package']);

        $details = (array)json_decode($_POST['paymentdata']);
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


        if ($requiredAmount == $paid_amount) {
            
            if (isset($_SESSION['orderIds'])) {
                foreach ($_SESSION['orderIds'] as $eachOrderId) {
                    $reference_link .= base64_encode(urlencode($eachOrderId));
                    $updated[] = $PackageOrder->updatePayment($eachOrderId, $trxnId, 'Paypal', COMPLETEDCODE, ORDEREDCODE);
                }
                
                $falseExist =  in_array(false, $updated, true);
                if (!$falseExist) {
                    $added = $PackageOrder->addPackOrderDtls($eachOrderId, ORDEREDCODE, ORDS001, $cusDtl[0][2], $cusDtl[0][2]);
	                $Notifications->addNotification(ORD_UPDATE, ORDS001, ORD_PLCD_M, $reference_link, $cusId);

                    if ($added) {
                        $_SESSION['updatedOrders'] = $_SESSION['orderIds'];
                        // unset($_SESSION['orderIds']);
                        header('Location: ./package-order-successfull.php');
                        exit;
                    }
                }else {
                    echo 'Error:=> Failed to update Payment status of order!';
                }
            }else {
                echo 'Error:=> orderids session expired!';
            }
        }
    }else {
        echo 'Error:=> package session expired!';
    }
}






if (isset($_POST['paylaterForm'])) {
    if (isset($_SESSION['package'])) {
            unset($_SESSION['package']);
        if (isset($_SESSION['orderIds'])) {
            foreach ($_SESSION['orderIds'] as $eachOrderId) {
                $reference_link .= base64_encode(urlencode($eachOrderId));
                $updated[] = $PackageOrder->updatePayment($eachOrderId, '', PAYLATER, PENDINGCODE, ORDEREDCODE);
            }

            $falseExist =  in_array(false, $updated, true);
            if (!$falseExist) {
                $added = $PackageOrder->addPackOrderDtls($eachOrderId, ORDEREDCODE, ORDS001, $cusDtl[0][2], $cusDtl[0][2]);
                $Notifications->addNotification(ORD_UPDATE, ORDS001, ORD_PLCD_M, $reference_link, $cusId);
                if ($added) {
                    $_SESSION['updatedOrders'] = $_SESSION['orderIds'];
                    // unset($_SESSION['orderIds']);





                    // =====================================================================================================


require_once ROOT_DIR."/includes/email.inc.php";

require_once ROOT_DIR."/classes/class.phpmailer.php";
require_once ROOT_DIR."/classes/error.class.php"; 
require_once ROOT_DIR."/mail-sending/order-placed-template.php";


/* INSTANTIATING CLASSES */
$PHPMailer         = new PHPMailer();
$MyError 			= new MyError();

###############################################################################################

$orderId            ='#876876';
$orderDataArray     = array('Name','Service','Site','Transection ID',
                            'Amount', 'Payment Mode,', 'Status','Phone',
                            'Email', 'Placed on');

$orderDetailsArray  = array('Dipak Majumdar','Guest Posting','bizmaa.com',
                            '7657576465','$175','PayLater','ordered','7699753019',
                            'dipakmajumdar.leelija@gmail.com','12/12/2022');


    $fromMail       = CONTACT_MAIL;
    $toMail  		= 'dipakmajumdar.leelija@gmail.com';
	$toName   		= 'Dipak Majumdar';
	$subject        = 'Trying 2';
	$messageBody    = orderPlacedtoCustomerTemplate($orderId, 'Dipak', $orderDataArray, $orderDetailsArray);

	$invalidEmail 	= $MyError->invalidEmail($toMail);
	

    if(($toMail == '')||(mb_ereg("^ER",$invalidEmail))){
        echo 'Receiver Email Address May Invalid or Not Found!';
	}elseif($toName == ''){
        echo 'Receiver Name Not Found!';
    }else{

    
        try {
            $PHPMailer->IsSMTP();
            $PHPMailer->IsHTML(true);
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

            if ($PHPMailer->send()) {
                echo 'Message has been sent';
            }else {
                echo "Message could not be sent. Mailer Error:-> {$PHPMailer->ErrorInfo}";
            }
            $PHPMailer->ClearAllRecipients();


        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error:-> {$PHPMailer->ErrorInfo}";
        }
    }


// ========================================================================
                    // header('Location: ./package-order-successfull.php');
                    // exit;
                }
            }else {
                echo 'Error:=> Failed to update Payment status of order!';
            }
        }else {
            echo 'Error:=> orderids session expired!';
        }
    }else {
        echo 'Error:=> package session expired!';
    }
}


?>