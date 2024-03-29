<?php 
session_start();
require_once dirname(__DIR__) . "/includes/constant.inc.php"; 

require_once ROOT_DIR."/_config/dbconnect.php";
require_once ROOT_DIR."/includes/email.inc.php";

require_once ROOT_DIR."/classes/class.phpmailer.php";
require_once ROOT_DIR."/classes/error.class.php"; 
require_once ROOT_DIR."/mail-sending/order-placed-template.php";


/* INSTANTIATING CLASSES */
$PHPMailer      = new PHPMailer();
$MyError 			= new MyError();

###############################################################################################

$orderId            ='#876876';
$orderDataArray     = array('Name','Service','Site','Transection ID',
                            'Amount', 'Payment Mode,', 'Status','Phone',
                            'Email', 'Placed on');

$orderDetailsArray  = array('Dipak Majumdar','Guest Posting','bizmaa.com',
                            '7657576465','$175','PayLater','ordered','7699753019',
                            'dipakmajumdar.leelija@gmail.com','12/12/2022');


###############################################################################################


// print_r($_POST);exit;

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

        
    echo $messageBody;
    // exit;
    
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


?>