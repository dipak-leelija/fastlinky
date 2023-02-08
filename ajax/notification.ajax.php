<?php
session_start();
require_once dirname(__DIR__).'/_config/dbconnect.php';
require_once dirname(__DIR__)."/_config/dbconnect.trait.php";

require_once dirname(__DIR__)."/includes/constant.inc.php";
// require_once dirname(__DIR__)."/includes/html2text.php";

require_once dirname(__DIR__)."/classes/emails.class.php";
require_once dirname(__DIR__)."/classes/date.class.php";

$Emails         = new Emails();
$DateUtil       = new DateUtil();



if (isset($_POST['actionId'])) {
    $msgId = $_POST['actionId'];

    
    $mails = $Emails->ShowMailsbyCol('id', $msgId);
    foreach ($mails as $eachMail) {
        // $returnArray = array('subject' => $eachMail['subject'], 'message' => $eachMail['message'], 'added_on' => $eachMail['added_on']);
                                    
        echo $eachMail['subject'].'|==>'.$eachMail['message'].'|==>'.$DateUtil->dateTimeText($eachMail['added_on']);;
    }
}

?>