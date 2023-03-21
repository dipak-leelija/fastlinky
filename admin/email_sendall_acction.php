<?php
require_once("../includes/constant.inc.php");
session_start();
include_once 'checkSession.php';
require_once "../_config/dbconnect.php";

require_once "../classes/customer.class.php";
require_once "../classes/emails.class.php";
require_once "../classes/class.phpmailer.php";

require_once "../classes/utility.class.php";

/* INSTANTIATING CLASSES */
$Customer	    = new Customer();
$emailObj   	= new Emails();
$PHPMailer      = new PHPMailer();
$Utility		= new Utility();

########################################################################################################

$allCustomerIds	= $Customer->getAllCustomer('ALL', "added_on", "DESC");



if(isset($_POST["btnSendMail"])){

    $fromMail       = MARKETING_MAIL;
	$subject        = $_POST['mail-subject'];
	$messageBody    = $_POST['mail-message'];

     
        try {
            $PHPMailer->IsSMTP();
            $PHPMailer->IsHTML(true);
            $PHPMailer->Host        = gethostname();
            $PHPMailer->SMTPAuth    = true;
            $PHPMailer->Username    = MARKETING_MAIL;
            $PHPMailer->Password    = 'Fast#/billing/#Linky@2022';
            $PHPMailer->From        = MARKETING_MAIL;
            $PHPMailer->FromName    = COMPANY_FULL_NAME;
            $PHPMailer->Sender      = MARKETING_MAIL;
            $PHPMailer->Subject     = $subject;
            $PHPMailer->Body        = $messageBody;

            foreach ($allCustomerIds as $eachId) {
                    $allCustomers   = $Customer->getCustomerData($eachId);
                
                    $toName   = $allCustomers[0][5].' '.$allCustomers[0][6];
                    $toMail  = $allCustomers[0][3];

                    if ($toMail != null) {
                        // echo $toMail.'=>'.$toName.'<br>';
                        
                        // $toMail = 'dipakmajumdar.leelija@gmail.com';
                        // $toName = 'Dipak Majumdar';
                        $PHPMailer->addAddress($toMail, $toName);
                        $PHPMailer->send();
                        $PHPMailer->ClearAllRecipients();
                        // $PHPMailer->ClearAddresses();
                    }
                }

            echo 'Message has been sent';
    
            // $addemaildetails  = $emailObj->emaildetails($toName, $toMail, $subject, $messageBody, $fromMail);
                
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error:-> {$PHPMailer->ErrorInfo}";
        }
   
   
   
}
?> 