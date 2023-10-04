<?php
if (isset($orderId) && isset($toName) && isset($toMail) && isset($domain) && isset($deliveredLink) && isset($contentTitle)):

    require_once ROOT_DIR."/includes/order-constant.inc.php";
    require_once ROOT_DIR."/classes/class.phpmailer.php";
    require_once ROOT_DIR."/includes/email.inc.php";
    require_once ROOT_DIR."/mail-sending/mail-page.php";
    require_once ROOT_DIR."/classes/error.class.php";

    $PHPMailer      = new PHPMailer();
    $MyError 		= new MyError();

    $subject        = "Your Guest Post Is Now Live on {$domain}";
    $messageBody    = orderDelivered($orderId, $toName, $domain, $deliveredLink, $contentTitle, NOW);
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
                $PHPMailer->ClearAllRecipients();
                $uMesg->redirectURL($currentUrl, 'SUCCESS', 'Order Delivered and Mail Sent!');
            }else {
                $PHPMailer->ClearAllRecipients();
                $msg = "Mailer Error:-> {$PHPMailer->ErrorInfo}";
                $uMesg->redirectURL($currentUrl, 'WARNING', 'Order Delivered but'.$msg);
            }
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error:-> {$PHPMailer->ErrorInfo}";
            echo "Error:-> {$e->getMessage()}";

        }
    }
endif;