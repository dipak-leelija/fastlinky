<?php
error_reporting(E_ALL);
error_reporting(-1);
ini_set('error_reporting', E_ALL);

session_start();
require_once dirname(dirname(__DIR__))."/includes/constant.inc.php";
include_once ADM_DIR.'/checkSession.php';
require_once ROOT_DIR."/_config/dbconnect.php";

require_once ROOT_DIR."/classes/customer.class.php";
require_once ROOT_DIR."/classes/emails.class.php";
require_once ROOT_DIR."/classes/subscriber.class.php";
require_once ROOT_DIR."/classes/class.phpmailer.php";
require_once ROOT_DIR."/classes/utility.class.php";

/* INSTANTIATING CLASSES */
$Customer	        = new Customer();
$emailObj   	    = new Emails();
$EmailSubscriber    = new EmailSubscriber();
$PHPMailer          = new PHPMailer();
$Utility		    = new Utility();

########################################################################################################


if(isset($_POST["btnSendMail"])){

    if($_POST['mailTo'] === 'all-subscriber'){
        
        $allMails = $EmailSubscriber->getAllMail();
        $allMails = json_decode($allMails);

    }elseif($_POST['mailTo'] === 'all-customer') {
        
        $allIds	= $Customer->getAllCustomerId();
        $allIds = json_decode($allIds);

    }elseif($_POST['mailTo'] === 'seller-only') {

        $allIds = $Customer->getAllSellerId();
        $allIds = json_decode($allIds);

    }elseif($_POST['mailTo'] === 'client-only') {

        $allIds = $Customer->getAllClientId();
        $allIds = json_decode($allIds);

    }

    $fromMail       = MARKETING_MAIL;
	$subject        = $_POST['mail-subject'];
	$messageBody    = $_POST['mail-message'];

     
        try {
            $PHPMailer->IsSMTP();
            $PHPMailer->IsHTML(true);
            $PHPMailer->Host        = gethostname();
            $PHPMailer->SMTPAuth    = true;
            $PHPMailer->Username    = MARKETING_MAIL;
            $PHPMailer->Password    = MARKETING_MAIL_PASS;
            $PHPMailer->From        = MARKETING_MAIL;
            $PHPMailer->FromName    = COMPANY_FULL_NAME;
            $PHPMailer->Sender      = MARKETING_MAIL;
            $PHPMailer->Subject     = $subject;
            $PHPMailer->Body        = $messageBody;

            if($_POST['mailTo'] !== 'all-subscriber'){

                foreach ($allIds as $eachId) {
                    $allCustomers   = $Customer->getCustomerData($eachId);
                
                    $toName   = $allCustomers[0][5].' '.$allCustomers[0][6];
                    $toMail  = $allCustomers[0][3];

                    if ($toMail != null) {

                        $PHPMailer->addAddress($toMail, $toName);
                        $PHPMailer->send();
                        $PHPMailer->ClearAllRecipients();
                        // $PHPMailer->ClearAddresses();
                    }
                }

            }else {
                 foreach ($allMails as $eachMail) {

                    $toName   = '';
                    $toMail   = $eachMail;

                    if ($toMail != null) {
                        $PHPMailer->addAddress($toMail, $toName);
                        $PHPMailer->send();
                        $PHPMailer->ClearAllRecipients();
                        // $PHPMailer->ClearAddresses();
                    }
                }
            }


            echo 'Message has been sent';
    
            // $addemaildetails  = $emailObj->emaildetails($toName, $toMail, $subject, $messageBody, $fromMail);
                
        } catch (Exception $e) {
            echo $e->getMessage().'<br>';
            echo "Message could not be sent. Mailer Error:-> {$PHPMailer->ErrorInfo}";
        }
   
}
?> 