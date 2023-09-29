<?php

require_once ROOT_DIR."/includes/order-constant.inc.php";
require_once ROOT_DIR."/classes/class.phpmailer.php";
require_once ROOT_DIR."/includes/email.inc.php";
require_once ROOT_DIR."/mail-sending/mail-page.php";
require_once ROOT_DIR."/classes/error.class.php";



$PHPMailer      = new PHPMailer();
$MyError 		= new MyError();

$subject        = "Order Accepted - #{$orderId}";
$messageBody    = orderAccepted ($orderId, $toName, '');
$messageBody    = mainTemplate($messageBody);

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
            // echo 'Message has been sent';
            $completed[] = true;
        }else {
            echo "Message could not be sent. Mailer Error:-> {$PHPMailer->ErrorInfo}";
        }
        $PHPMailer->ClearAllRecipients();


    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error:-> {$PHPMailer->ErrorInfo}";
    }
}