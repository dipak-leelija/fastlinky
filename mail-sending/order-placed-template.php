<?php 

require_once dirname(__DIR__) . '/includes/constant.inc.php';




function mailFooter(){
    $body = '
        <tr>
            <td style="padding: 0px; text-align: center; font-size: 12px; background-color: #f3b165;">
                <div class="footer-text-address" style="margin: 2rem auto; ">
                    <h1 style="font-size: 2rem; color: darkblue; border-bottom: 2px solid #003399; padding-bottom: 5px; width: fit-content; margin: auto; margin-bottom: 20px;">Get In Touch</h1>
                    <div>
                        <p style="margin: 0; font-size: 14px; line-height: 1.4">Barasat, Kolkata, West Bengal, 700125, India</p>
                        <p style="margin: 0; font-size: 15px; font-weight: 600; line-height: 23.8px; text-align: center;">
                            <a style="color: #000; text-decoration: none;" rel="noopener" href="tel:'.SITE_CONTACT_NO.'" target="_blank">
                            '.SITE_CONTACT_NO.'
                            </a>
                        </p>
                        <p style="margin: 0; font-size: 15px; font-weight: 600; line-height: 23.8px; text-align: center; color: #fff;">
                            <a style=" color: #000; text-decoration: none;" rel="noopener" href="tel:'.SITE_BILLING_CONTACT_NO.'" target="_blank">
                            '.SITE_BILLING_CONTACT_NO.'
                            </a>
                        </p>
                        <p style="margin: 0; font-size: 15px; font-weight: 600; line-height: 23.8px; text-align: center;">
                            <a style="text-decoration: none;" rel="noopener" href="mailto:'.SITE_EMAIL.'" target="_blank">
                            '.SITE_EMAIL.'
                            </a>
                        </p>
                        <p style="margin: 0; font-size: 15px; font-weight: 600; line-height: 23.8px; text-align: center;">
                            <a style="text-decoration: none;" rel="noopener" href="mailto:'.SITE_BILLING_EMAIL.'" target="_blank">
                            '.SITE_BILLING_EMAIL.'
                            </a>
                        </p>
                    </div>

                </div>

                <p style="background: darkblue; padding: 12px; margin: 0px;">
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
    ';
    return $body;
}


function orderPlacedtoCustomer($orderId, $orderDataArray, $orderDetailsArray){

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

    .maindivofpage {
        text-size-adjust: 100%;
        -webkit-text-size-adjust: 100%;
        -ms-text-size-adjust: 100%;
    }

    .table-second {
        width: 100%;
        max-width: 600px;
        border: 1px solid #c9c6c6;
        border-spacing: 0;
        text-align: left;
        font-family: "Cabin", sans-serif;
        font-size: 16px;
        line-height: 22px;
        color: #363636;
    }

    .order-placed-header {
        display: flex;
        display:-webkit-flex;
        padding: 15px 30px;
        text-align: center;
        font-size: 24px;
        font-weight: bold;
        background: aliceblue;
        justify-content: space-between;
    }

    .header-logo {
        width: 100px;
        max-width: 100%;
        height: auto;
        border: none;
        text-decoration: none;
        color: #ffffff;
    }

    
    .header-right{
        display: flex;
        align-items: center;
        font-size: 18px;
    }

    .header-right img {
        width: 40px;
        margin-left: 10px;
        max-width: 100%;
        text-decoration: none;
        color: #ffffff;
        object-fit: contain;
    }

    .customer-details-div {
        padding-bottom: 0px !important;
        padding: 2rem;
    }

    .customer-details-div h1 {
        margin: 0;
        font-size: 22px;
        line-height: 1.1;
        font-weight: bold;
        letter-spacing: -0.02em;
        font-family: "Cabin", sans-serif;

    }

    .customer-details-div p {
        margin-bottom: 0;
        text-align: justify;
    }

    .order-details-description {
        text-align: justify;
        padding: 30px 2rem 11px 2rem;
        font-size: 0;
        border-bottom: 1px solid #f0f0f5;
        border-color: rgba(201, 201, 207, .35);
    }


    .col-lge {
        display: inline-block;
        width: 100%;
        vertical-align: top;
        padding-bottom: 20px;
        font-size: 16px;
        line-height: 22px;
        color: #363636;
    }

    .col-lge-p1 {
        margin-top: 0;
        margin-bottom: 12px;
    }

    .col-lge-p2 {
        margin-top: 0;
        margin-bottom: 18px;
    }

    .col-lge-p3 {
        margin: 0;
        text-align: center;
    }

    .col-lge-p3-atag {
        background: #ff3884;
        text-decoration: none;
        padding: 10px 25px;
        color: #ffffff;
        border-radius: 4px;
        display: inline-block;
        mso-padding-alt: 0;
        text-underline-color: #ff3884;
    }

    .col-lge-p3-span {
        mso-text-raise: 10pt;
        font-weight: bold;
    }


    .order-details-desc-important {
        padding: 15px 30px;
        background-color: aliceblue;
    }

    table,
    td,
    div,
    h1,
    p {
        font-family: inherit;
    }

    @media screen and (max-width: 530px) {
        .customer-details-div h1 {
            font-size: 20px;
        }

        .customer-details-div {
            padding: 15px;
        }

        .col-lge {
            max-width: 100% !important;
            text-align: center;
        }

    }
    .tables-fr-cdetails{
        width: 100%;
        text-align: left;
    }
    .tables-fr-cdetails td{
        width: 50%;
    }
    .tables-fr-cdetails th{
        padding: 1rem 0;
        width: 50%;
    }
    .tables-fr-cdetails tr{
        word-break: break-all;
        display: flex;
    }

    .order-details-table{
        word-break: break-word;
        padding: 0 6rem;
        font-weight: 600;
        font-family: "Cabin", sans-serif;
    }

    .order-details-headline{
        display: flex;
        width: 100%;
        word-break: break-word;
        margin: 20px 0px 5px;
   }

   .order-details-headline-div{
        width: 50%;
   }
   .order-details-main-div{
        display: flex;
        width: 100%;
   }
   .order-details-sub-div{
        width: 50%;
   }
   @media(max-width:600px){
        .order-details-table {
            padding: 0 1rem;
        }
   }

   @media(max-width:320px){
        .order-details-headline{
            margin-bottom: 0.5rem; 
            display: block;
            width: 100%;
            word-break: break-word;
        }
        .order-details-headline-div{
            width: 100%;
        }
        .order-details-main-div{
            display: block;
            width: 100%;
        }
        .order-details-sub-div{
            width: 100%;
        }
        .extra-space{
            padding-left: 6px;
        }
        .extra-font{
            font-weight: 600;
        }
        .order-placed-header {
            padding: 15px 8px;
        }
        .header-right {
            font-size: 13px;
        }
        .header-right img {
            width: 22px;
        }
   }
    </style>
</head>

<body>
    <div role="article" aria-roledescription="email" lang="en" class="maindivofpage">
        <table role="presentation" style="width: 100%; border: none; border-spacing: 0;">
            <tr>
                <td align="center" style="padding:0;">
                    <table role="presentation" class="table-second">
                        <!-- **************************  LOGO IMAGE HEADER SECTION ************************ -->
                        <tr>
                            <td>
                                <div class="order-placed-header">
                                        <img class="header-logo" src="'.LOGO_WITH_PATH.'" alt="'.COMPANY_FULL_NAME.'">
                                        <span class="header-right">
                                            Order PLaced 
                                            <img src="'.IMG_PATH.'/icons/success.png" alt="">
                                        <span>
                                </div>
                            </td>
                        </tr>
                        <!-- **************************  LOGO IMAGE HEADER SECTION ENDS ************************ -->
                        <tr>
                            <td class="customer-details-div">
                                <h1>Hi Dipak, Your order has been place successfully</h1>
                                <p>Thank you very much for placing an order with us! We truly appreciate your trust and look forward to making your experience as enjoyable as possible.</p>
                            </td>
                        </tr>
                    
                        <tr>
                            <td>
                        
                                <div class="order-details-table">
                                    <h4 class="order-details-headline">
                                        <div class="order-details-headline-div"> Order ID :</div>
                                        <div class="order-details-headline-div  "> '.$orderId.'</div>
                                    </h4>';
                                    // $orderDataArray, $orderDetailsArray
                                    for ($i=0; $i<count($orderDataArray); $i++) { 
                                        $mail .= '<div class="order-details-main-div">
                                                <div class="order-details-sub-div extra-font">'.$orderDataArray[$i].' :</div>
                                                <div class="order-details-sub-div extra-space">'.$orderDetailsArray[$i].'</div>
                                                </div>';
                                    }
                        $mail .= '</div>

                            </td>
                        </tr>

                        <tr>
                            <td class="order-details-description">
                                <div class="col-lge">
                                    <p class="col-lge-p1">Nullam mollis sapien vel cursus
                                        fermentum. Integer porttitor augue id ligula facilisis pharetra. In eu ex et
                               elit ultricies ornare nec ac ex. Mauris sapien massa, placerat non venenatis et,
                                        tincidunt eget leo.</p>
                                    <p class="col-lge-p2" style="">Nam non ante risus. Vestibulum vitae
                                        eleifend nisl, quis vehicula justo. Integer viverra efficitur pharetra. Nullam
                                        eget erat nibh.</p>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="order-details-desc-important">
                                <small style="margin:0;text-align: justify;">Duis sit amet accumsan nibh, varius tincidunt
                                    lectus. Quisque
                                    commodo, nulla ac feugiat cursus, arcu orci condimentum tellus, vel placerat libero
                                    sapien et libero. Suspendisse auctor vel orci nec finibus.</small>
                            </td>
                        </tr>';

                        // <!-- ************************** FOOTER STARTS ************************ -->
                        $mail .= mailFooter();
                        // <!-- ************************** FOOTER ENDS ************************ -->
            $mail .= '</table>
                </td>
            </tr>
        </table>
    </div>
</body>

</html>';

return $mail;
} 

// $arr1 = array('Name', 'Date');
// $arr2 = array('Dipak Majumdar', '29/08/1999');
// echo orderPlacedtoCustomer('#786876', $arr1, $arr2);
?>