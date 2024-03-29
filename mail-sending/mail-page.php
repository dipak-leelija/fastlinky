<?php 

require_once dirname(__DIR__) . '/includes/constant.inc.php';
require_once ROOT_DIR . "/classes/encrypt.inc.php";

// $orderDataArray     = array('name', 'roll', 'class', 'date');
// $orderDetailsArray  = array('Dipak', '12', 'nine', '10-12-2023');

// echo orderPlacedtoCustomerTemplate('#JHB3ETR23', 'Dipak', $orderDataArray, $orderDetailsArray, $domain = '');

// $mailBody = orderAccepted ('#767656', 'Dipak', 'dipakmajumdar.com');

// echo mainTemplate($mailBody);


function orderPlacedBody ($orderId, $firstName, $orderDataArray, $orderDetailsArray, $domain){

    $mail ='<tr>
                <td style="padding-bottom: 0px !important; padding: 2rem;">
                    <h1 style="margin: 0; font-size: 22px; line-height: 1.1; font-weight: bold; letter-spacing: -0.02em; font-family: "Cabin", sans-serif;">Hi '.$firstName.', Your order has been place successfully</h1>
                    <p style="margin-bottom: 0; text-align: justify; font-family: inherit;">Thank you very much for placing an order with us! We truly appreciate your trust and look forward to making your experience as enjoyable as possible.</p>
                </td>
            </tr>

            <tr>
                <td style="padding:1rem 2rem;">            
                    <div>
                        <h4 style="display:flex; width:100%; word-break:break-word; margin:0px">
                            <div style="width:50%"> Order ID :</div>
                            <div style="width:50%"> '.$orderId.'</div>
                        </h4>';

            if ($domain != '') {
                $mail .='<div style="display: flex; width: 100%;">
                            <div style="width: 50%;">Site Name :</div>
                            <div style="width: 50%;"><span>'.$domain.'</span></div>
                        </div>';
                        }

                        // $orderDataArray, $orderDetailsArray
            for ($i=0; $i<count($orderDataArray); $i++) {
                $mail .= '<div style="display: flex; width: 100%;">
                            <div style="width: 50%;">'.$orderDataArray[$i].' :</div>
                            <div style="width: 50%;">'.$orderDetailsArray[$i].'</div>
                        </div>';
            }

            $mail .= '</div>
                </td>
            </tr>';

    return $mail;
}


function orderAccepted ($orderId, $firstName, $domain){

    $mail ="<tr>
                <td style='padding-bottom: 0px !important; padding: 2rem;'>
                    <h1 style='margin: 0; font-size: 22px; line-height: 1.1; font-weight: bold; letter-spacing: -0.02em; font-family: \"Cabin\", sans-serif;'>Hi {$firstName}, Your order has been accepted</h1>
                    <p style='margin-bottom: 0; text-align: justify; font-family: inherit;'>We are pleased to confirm that your order for the domain <strong>{$domain}</strong> and order id <strong>#{$orderId}</strong> has been accepted.</p>
                </td>
            </tr>
            
            <tr>
                <td style='padding: 1rem 2rem;'>
                    <p style='margin-bottom: 0; text-align: justify; font-family: inherit;'>Your order is now Processing and will be Completed as soon as possible. You will receive confirmation email with required information once your order has Completed.
                    <br>
                    In the meantime, you can check the status of your order at any time by logging into your account on our website: <a href='".BUYER_AREA."'>".COMPANY_S."</a>
                    <br>
                    If you have any questions or concerns, please do not hesitate to contact us at 
                    <a style='text-decoration: none;' rel='noopener' href='mailto:".SITE_EMAIL." target='_blank'>
                        ".SITE_EMAIL."
                    </a> 
                    or 
                    <a style='color: #000000; text-decoration: none;' rel='noopener' href='tel:".SITE_CONTACT_NO." target='_blank'>
                        ".SITE_CONTACT_NO."
                    </a>.
                    </p>
                </td>
            </tr>";
            
    return $mail;
}



function changeRequest($orderId, $firstName, $domain, $_DIFFARR){

    $mail ="<tr>
                <td style='padding-bottom: 0px !important; padding: 2rem;'>
                    <h1 style='margin: 0; font-size: 22px; line-height: 1.1; font-weight: bold; letter-spacing: -0.02em; font-family: \"Cabin\", sans-serif;'>Hi {$firstName}, We Have Recived Your Change Request!</h1>
                    <p style='margin-bottom: 0; text-align: justify; font-family: inherit;'>We are pleased to inform that we have seen a changes request to your order for the domain <strong>{$domain}</strong> and order id <strong>#{$orderId}</strong></p>
                </td>
            </tr>
            
            <style>
            .contents a{
            }
            </style>
            <tr>
                <td class='contents' style='padding: 1rem 2rem;'>";
                foreach($_DIFFARR as $diff){
                    $mail .= "<p style='margin-bottom: 0; text-align: justify; font-family: inherit;'>
                                <strong>Previous: </strong>
                                <span style='color: #a53232;'>{$diff[0]}</span>
                            <p>
                            <p style='margin-bottom: 0; text-align: justify; font-family: inherit;'>
                                <strong>Updated: </strong>
                                <span style='color: #2a1ca1;'>{$diff[1]}</span>
                            <p>";
                }
        $mail .= "</td>
            </tr>";
            
    return $mail;
}


function contentUploaded($orderId, $firstName, $domain){

    $mail ="<tr>
                <td style='padding-bottom: 0px !important; padding: 2rem;'>
                    <h1 style='margin: 0; font-size: 22px; line-height: 1.1; font-weight: bold; letter-spacing: -0.02em; font-family: \"Cabin\", sans-serif;'>Hi {$firstName}, We Have Uploaded Your Content!</h1>
                    <p style='margin-bottom: 0; text-align: justify; font-family: inherit;'>We are pleased to inform you that we have been uploaded you post content to your order for the domain <strong>{$domain}</strong> and order id <strong>#{$orderId}</strong></p>

                    <p style='margin-bottom: 0; text-align: justify; font-family: inherit;'>Plaese make sure to check the uploaded content and ask for any correction if required.</p>
                </td>
            </tr>";
            
    return $mail;
}


function orderDelivered($orderId, $firstName, $domain, $deliveredLink, $contentTitle, $publishDate){

    $mail ="<tr>
                <td style='padding-bottom: 0px !important; padding: 2rem;'>
                    <h1 style='margin: 0; font-size: 22px; line-height: 1.1; font-weight: bold; letter-spacing: -0.02em; font-family: \"Cabin\", sans-serif;'>Hi {$firstName}, Your Guest Post is Posted!</h1>
                    <p style='margin-bottom: 0; text-align: justify; font-family: inherit;'> We are thrilled to inform you that your guest post, titled <strong>{$contentTitle}</strong>, is now live on {$domain}.<p>

                    <p style='margin-bottom: 0; text-align: justify; font-family: inherit;'>You can view your published article by clicking on the following link: <a href='{$deliveredLink}'>{$deliveredLink}</a>.
                    <br>
                    We encourage you to share this link with your network, friends, and followers to maximize its reach. Your insights and expertise will undoubtedly provide valuable information and inspiration to our readers.
                    <p>
                    <p style='margin-bottom: 0; text-align: justify; font-family: inherit;'>
                    Here are some additional details about your guest post:
                    <br>
                    Title: <strong>{$contentTitle}</strong>
                    <br>
                    Order Id: <strong>#{$orderId}</strong>
                    <br>
                    Publication Date: <strong>{$publishDate}</strong>
                    <br>
                    URL:<strong><a href='{$deliveredLink}'>{$deliveredLink}</a></strong>
                    <br>
                    We believe that your article will resonate with our audience and contribute significantly to the ongoing discussions in our niche. Your unique perspective and well-researched content are much appreciated.
                    </p>
                    <p style='margin-bottom: 0; text-align: justify; font-family: inherit;'>Please feel free to let us know if you have any questions or if there are any other ways we can assist you. We are open to future collaborations and welcome additional guest contributions from you in the future.<p>
                    <p style='margin-bottom: 0; text-align: justify; font-family: inherit;'>Once again, thank you for your valuable contribution to {$domain}. We look forward to seeing more of your work in the future.<p>

                    <p style='margin-bottom: 0; text-align: justify; font-family: inherit;'>Plaese make sure to check the uploaded content and ask for any correction if required.</p>
                </td>
            </tr>";
            
    return $mail;

}



function orderFinished($orderId, $firstName, $contentTitle, $publishDate) {
    $mail = "<tr>
                <td style='padding-bottom: 0px !important; padding: 2rem;'>
                    <h1 style='margin: 0; font-size: 22px; line-height: 1.1; font-weight: bold; letter-spacing: -0.02em; font-family: \"Cabin\", sans-serif;'>Hi {$firstName}, Your Order is Successfully Completed!</h1>
                    <p style='margin-bottom: 0; text-align: justify; font-family: inherit;'> We are delighted to inform you that your order, with Order ID #{$orderId}, has been completed successfully.<p>

                    <p style='margin-bottom: 0; text-align: justify; font-family: inherit;'>Here are the details of your order:
                    <br>
                    Title: <strong>{$contentTitle}</strong>
                    <br>
                    Order ID: <strong>#{$orderId}</strong>
                    <br>
                    Publication Date: <strong>{$publishDate}</strong>
                    <p>

                    <p style='margin-bottom: 0; text-align: justify; font-family: inherit;'>
                    We have successfully delivered your order, and we are pleased to inform you that it has been completed without any issues. You can now access your live url of the post anytime.
                    </p>

                    <p style='margin-bottom: 0; text-align: justify; font-family: inherit;'>If you have any questions or need further assistance, please do not hesitate to reach out to our customer support team. We are here to help you with any additional requests or concerns you may have.
                    </p>

                    <p style='margin-bottom: 0; text-align: justify; font-family: inherit;'>Thank you for choosing our services. We value your trust and look forward to serving you again in the future.
                    </p>
                </td>
            </tr>";

    return $mail;
}



function mainTemplate($mailBody){

    $mail = 

'<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="x-apple-disable-message-reformatting">
    <title></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville&family=Pacifico&display=swap"
        rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Ubuntu:300,300i,400,400i,500,500i,700,700i" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Montserrat:400,500,600,700,900" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Nunito+Sans:400,700,900" rel="stylesheet">
    <style type="text/css">
    @import url("https://fonts.googleapis.com/css2?family=Pacifico&display=swap");
    @import url("https://fonts.googleapis.com/css2?family=Cabin:wght@400;600&family=Rubik:wght@300;400&display=swap");


    body{
        margin: 0;
        padding: 0;
        word-spacing: normal;
    }


    table,
    td,
    div,
    {
        font-family: inherit;
    }

    </style>
</head>

<body>
    <div role="article" aria-roledescription="email" lang="en" style="text-size-adjust: 100%; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; font-family: inherit;">
        <table role="presentation" style="width: 100%; border: none; border-spacing: 0;">
            <tr>
                <td align="center" style="padding:0;">
                    <table role="presentation" style="width: 600px; color: #363636;">
                        <!-- **************************  LOGO IMAGE HEADER SECTION ************************ -->
                        <tbody>
                        <tr>
                            <td>
                                <div style="display: flex; flex-direction: row; padding: 15px 10px; font-size: 24px; font-weight: bold; background: aliceblue; font-family: inherit;">
                                    <div style="width: 50%;">
                                        <img style="width: 100px; max-width: 100%; height: auto; border: none; text-decoration: none; color: #ffffff;" src="'.LOGO_WITH_PATH.'" alt="'.COMPANY_FULL_NAME.'">
                                    </div>
                                    <div style="width: 50%;">
                                        <div style="text-align: end;">
                                            <img style="width: 155px; object-fit: contain;" src="'.IMG_PATH.'/icons/order-placed-icon.png" alt="">
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>';
                        // <!-- **************************  LOGO IMAGE HEADER SECTION ENDS ************************ -->

                        $mail .= $mailBody;

                        // <tr>
                        //     <td style="text-align: justify; padding: 30px 2rem 11px 2rem; font-size: 0; border-bottom: 1px solid #f0f0f5; border-color: rgba(201, 201, 207, .35);">
                        //         <div style="display: inline-block; width: 100%; vertical-align: top; padding-bottom: 20px; font-size: 16px; line-height: 22px; color: #363636; font-family: inherit;">
                        //             <p style="margin-top: 0; margin-bottom: 12px; font-family: inherit;">Nullam mollis sapien vel cursus
                        //                 fermentum. Integer porttitor augue id ligula facilisis pharetra. In eu ex et
                        //        elit ultricies ornare nec ac ex. Mauris sapien massa, placerat non venenatis et,
                        //                 tincidunt eget leo.</p>
                        //             <p style="margin-top: 0; margin-bottom: 18px; font-family: inherit;">Nam non ante risus. Vestibulum vitae
                        //                 eleifend nisl, quis vehicula justo. Integer viverra efficitur pharetra. Nullam
                        //                 eget erat nibh.</p>
                        //         </div>
                        //     </td>
                        // </tr>

                $mail .= '<tr>
                            <td style="padding: 15px 30px; background-color: aliceblue;">
                                <small style="margin:0;text-align: justify;">We kindly request that you promptly inform us of any discrepancies, inaccuracies, or missing details in the information provided to ensure we can promptly address and rectify any issues.</small>
                            </td>
                        </tr>

                         <!-- ************************** FOOTER STARTS ************************ -->

                        <tr>
                            <td style="padding: 0px; text-align: center; font-size: 12px; background-color: #f3b165;">
                                <div class="footer-text-address" style="margin: 2rem auto; ">
                                    <h1 style="font-size: 2rem; color: #00008b; border-bottom: 2px solid #003399; padding-bottom: 5px; width: fit-content; margin: auto; margin-bottom: 20px; font-family: inherit;">Get In Touch</h1>
                                    <div>
                                        <p style="margin: 0; font-size: 14px; line-height: 1.4 font-family: inherit;">Barasat, Kolkata, West Bengal, 700125, India</p>
                                        <p style="margin: 0; font-size: 15px; font-weight: 600; line-height: 23.8px; text-align: center; font-family: inherit;">
                                            <a style="color: #000000; text-decoration: none;" rel="noopener" href="tel:'.SITE_CONTACT_NO.'" target="_blank">
                                            '.SITE_CONTACT_NO.'
                                            </a>
                                        </p>
                                        <p style="margin: 0; font-size: 15px; font-weight: 600; line-height: 23.8px; text-align: center; color: #fff;font-family: inherit;">
                                            <a style=" color: #000000; text-decoration: none;" rel="noopener" href="tel:'.SITE_BILLING_CONTACT_NO.'" target="_blank">
                                            '.SITE_BILLING_CONTACT_NO.'
                                            </a>
                                        </p>
                                        <p style="margin: 0; font-size: 15px; font-weight: 600; line-height: 23.8px; text-align: center; font-family: inherit;">
                                            <a style="text-decoration: none;" rel="noopener" href="mailto:'.SITE_EMAIL.'" target="_blank">
                                            '.SITE_EMAIL.'
                                            </a>
                                        </p>
                                        <p style="margin: 0; font-size: 15px; font-weight: 600; line-height: 23.8px; text-align: center; font-family: inherit;">
                                            <a style="text-decoration: none;" rel="noopener" href="mailto:'.SITE_BILLING_EMAIL.'" target="_blank">
                                            '.SITE_BILLING_EMAIL.'
                                            </a>
                                        </p>
                                    </div>

                                </div>

                                <p style="background: #00008b; padding: 12px; margin: 0px; font-family: inherit;">
                                    <a href="'.FB_LINK.'" title="Facebook" target="_blank" style="text-decoration:none;">
                                        <img style="display:inline-block; padding: 4px; vertical-align: sub !important;" src="https://fastlinky.com/images/icons/social-media-icons/facebook2x.png" width="35" height="35" alt="facebook">
                                    </a>
                                    <a href="'.TWITTER_LINK.'" title="Twitter" target="_blank" style="text-decoration:none;">
                                        <img style="display:inline-block; padding: 4px; vertical-align: sub !important;" src="https://fastlinky.com/images/icons/social-media-icons/twitter2x.png" width="35" height="35" alt="t">
                                    </a>
                                    <a href="'.LINKDIN_LINK.'" title="Linkedin" target="_blank" style="text-decoration:none;">
                                        <img style="display:inline-block; padding: 4px; vertical-align: sub !important;" src="https://fastlinky.com/images/icons/social-media-icons/linkedin2x.png" width="35" height="35" alt="Li">
                                    </a>
                                    <a href="'.INSTA_LINK.'" title="Instagram" target="_blank" style="text-decoration:none;">
                                        <img style="display:inline-block; padding: 4px; vertical-align: sub !important;" src="https://fastlinky.com/images/icons/social-media-icons/instagram2x.png" width="35" height="35" alt="insta">
                                    </a>
                                </p>
                            </td>
                        </tr>

                         <!-- ************************** FOOTER ENDS ************************ -->


                        <tbody>
                    </table>
                </td>
            </tr>
        </table>
    </div>
</body>

</html>';

return $mail;
}

?>