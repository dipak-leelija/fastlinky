<?php 
error_reporting(E_ALL);
error_reporting(-1);
ini_set('error_reporting', E_ALL);

session_start();
require_once "../includes/constant.inc.php";

include_once ADM_DIR .'/checkSession.php';

require_once ROOT_DIR . "/_config/dbconnect.php";

require_once ROOT_DIR . "/includes/email.inc.php";

require_once ROOT_DIR . "/classes/customer.class.php";
require_once ROOT_DIR . "/classes/search.class.php";

require_once ROOT_DIR . "/classes/class.phpmailer.php";
include_once ROOT_DIR . "/classes/emails.class.php";

require_once ROOT_DIR . "/classes/error.class.php"; 
require_once ROOT_DIR . "/classes/date.class.php"; 
require_once ROOT_DIR . "/classes/utility.class.php"; 
require_once ROOT_DIR . "/classes/utilityMesg.class.php"; 

/* INSTANTIATING CLASSES */
$customer	    = new Customer();
$search_obj		= new Search();

$PHPMailer      = new PHPMailer();
$emailObj   	= new Emails();

$dateUtil      	= new DateUtil();
$MyError 			= new MyError();
$utility		= new Utility();
$uMesg 			= new MesgUtility();

###############################################################################################

//declare vars
$typeM		= $utility->returnGetVar('typeM','');


// print_r($_POST);exit;

if(isset($_POST)){

    $fromMail       = MARKETING_MAIL;
    $toMail  		= $_POST['to-email'];
	$toName   		= $_POST['to-name'];
	$subject        = $_POST['mail-subject'];
	$messageBody    = $_POST['mailMessage'];
	$mailFormat     = $_POST['mail-format'];
    $format         = false;
    if ($mailFormat == 1) {
        $format = true;
    }

	$invalidEmail 	= $MyError->invalidEmail($toMail);
	
	//defining error variables
	$action		= 'send_email';
	$url		= $_SERVER['PHP_SELF'];
	$arr_id		= array($toName, $toMail);
	$id_var		= array('toName','toEmail');
	$linkName	= 'sendMail';
	$typeM		= 'ERROR';
	

    if(($toMail == '')||(mb_ereg("^ER",$invalidEmail))){
		// $error->showErrorArrTL($action, $arr_id, $arr_var, $url, ERE002, $typeM, $linkName);
        echo 'Receiver Email Address May Invalid or Not Found!';
	}elseif($toName == ''){
		// $error->showErrorArrTL($action, $arr_id, $arr_var, $url, ERE004, $typeM, $linkName);
        echo 'Receiver Name Not Found!';
    }else{
		
        try {
            $PHPMailer->IsSMTP();
            $PHPMailer->IsHTML($format);
            $PHPMailer->Host        = gethostname();
            $PHPMailer->SMTPAuth    = true;
            $PHPMailer->Username    = MARKETING_MAIL;
            $PHPMailer->Password    = 'Fast#/billing/#Linky@2022';
            $PHPMailer->From        = MARKETING_MAIL;
            $PHPMailer->FromName    = COMPANY_FULL_NAME;
            $PHPMailer->Sender      = MARKETING_MAIL;
            $PHPMailer->addAddress($toMail, $toName);
            $PHPMailer->Subject     = $subject;
            $PHPMailer->Body        = $messageBody;
            $PHPMailer->send();
            echo 'Message has been sent';

            $addemaildetails  = $emailObj->emaildetails($toName, $toMail, $subject, $messageBody, $fromMail);
            
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error:-> {$PHPMailer->ErrorInfo}";
        }
    }


}


?>