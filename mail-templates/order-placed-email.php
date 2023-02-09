<?php 

require_once dirname(__DIR__) . '/includes/constant.inc.php';







function mailFooter(){
    $body = '
        <style>
        /* FOOTER DIVISION CSS STARTS */
        /* footer */
        .ts-td7-footer-div {
            padding: 0px;
            text-align: center;
            font-size: 12px;
            background-color: #f3b165;
        }
        .footer-text-address{
            margin-bottom: 2rem;
            margin-top: 2rem;
        }
        .footer-text-address h1{
            font-size: 2rem;
            color: darkblue;
            border-bottom: 2px solid #003399;
            padding-bottom: 5px;
            width: fit-content;
            margin: auto;
            margin-bottom: 20px;
        }
        .footer-text-address p{
            margin: 0;
            font-size: 14px;
            line-height: 1.4;
        }
        .social-icons-div{
            background: darkblue;
                padding: 12px;
                margin: 0px;
        }
        .social-icons-div a{
            text-decoration:none;
        }
        .social-icons-div img{
            display:inline-block;
            padding: 4px;
            vertical-align: sub !important;
        }
    </style>
        <tr>
            <td class="ts-td7-footer-div">
                <div class="footer-text-address">
                    <h1>Get In Touch</h1>
                    <div>
                        <p>Barasat, Kolkata, West Bengal, 700125, India</p>
                        <p style="font-size: 15px; font-weight: 600; line-height: 23.8px; text-align: center;">
                            <a class="t-d-none" style="color: #000;" rel="noopener" href="tel:'.SITE_CONTACT_NO.'" target="_blank">
                            '.SITE_CONTACT_NO.'
                            </a>
                        </p>
                        <p style="font-size: 15px; font-weight: 600; line-height: 23.8px; text-align: center; color: #fff;">
                            <a style="text-decoration: none; color: #000;" rel="noopener" href="tel:'.SITE_BILLING_CONTACT_NO.'" target="_blank">
                            '.SITE_BILLING_CONTACT_NO.'
                            </a>
                        </p>
                        <p style="font-size: 15px; font-weight: 600; line-height: 23.8px; text-align: center;">
                            <a style="text-decoration: none;" rel="noopener" href="mailto:'.SITE_EMAIL.'" target="_blank">
                            '.SITE_EMAIL.'
                            </a>
                        </p>
                        <p style="font-size: 15px; font-weight: 600; line-height: 23.8px; text-align: center;">
                            <a style="text-decoration: none;" rel="noopener" href="mailto:'.SITE_BILLING_EMAIL.'" target="_blank">
                            '.SITE_BILLING_EMAIL.'
                            </a>
                        </p>
                    </div>

                </div>

                <p class="social-icons-div">
                    <a href="'.FB_LINK.'" title="Facebook" target="_blank">
                        <img src="https://fastlinky.com/images/icons/social-media-icons/facebook2x.png" width="35" height="35" alt="facebook">
                    </a>
                    <a href="'.TWITTER_LINK.'" title="Twitter" target="_blank">
                        <img src="https://fastlinky.com/images/icons/social-media-icons/twitter2x.png" width="35" height="35" alt="t">
                    </a>
                    <a href="'.LINKDIN_LINK.'" title="Linkedin" target="_blank">
                        <img src="https://fastlinky.com/images/icons/social-media-icons/linkedin2x.png" width="35" height="35" alt="Li">
                    </a>
                    <a href="'.INSTA_LINK.'" title="Instagram" target="_blank">
                        <img src="https://fastlinky.com/images/icons/social-media-icons/instagram2x.png" width="35" height="35" alt="insta">
                    </a>
                </p>
            </td>
        </tr>
    ';
    return $body;
}


echo orderPlaced();

function orderPlaced(){

    $mail = 

'<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:o="urn:schemas-microsoft-com:office:office">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="x-apple-disable-message-reformatting">
    <title></title>
    <link rel="stylesheet" href="order-placed-email.css">
    <link rel="stylesheet" href="plugins/fontawesome-6.1.1/css/all.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville&family=Pacifico&display=swap"
        rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Ubuntu:300,300i,400,400i,500,500i,700,700i" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Montserrat:400,500,600,700,900" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Nunito+Sans:400,700,900" rel="stylesheet">
    <style>
    @import url("https://fonts.googleapis.com/css2?family=Pacifico&display=swap");

    body {
        margin: 0;
        padding: 0;
        word-spacing: normal;
    }

    .maindivofpage {
        text-size-adjust: 100%;
        -webkit-text-size-adjust: 100%;
        -ms-text-size-adjust: 100%;
    }

    .table-first {
        width: 100%;
        border: none;
        border-spacing: 0;
    }

    .table-second {
        width: 94%;
        max-width: 600px;
        border: 1px solid #c9c6c6;
        border-spacing: 0;
        text-align: left;
        font-family: Arial, sans-serif;
        font-size: 16px;
        line-height: 22px;
        color: #363636;
    }

    .order-placed-header {
        display: flex;
        justify-content: space-between;
        padding: 15px 30px;
        text-align: center;
        font-size: 24px;
        font-weight: bold;
        background: aliceblue;
    }

    .left-icon img {
        width: 100px;
        max-width: 100%;
        height: auto;
        border: none;
        text-decoration: none;
        color: #ffffff;
    }

    .right-icon{
        display: flex;
        align-items: center;
    }
    .right-icon span{
        display: flex;
        align-items: center;
        font-size: 18px;
    }

    .right-icon img {
        width: 30px;
        margin-left: 10px;
        max-width: 100%;
        height: auto;
        border: none;
        text-decoration: none;
        color: #ffffff;
    }

    .customer-details-div {
        padding-bottom: 0px !important;
        padding: 2rem;
    }

    .customer-details-div p {
        margin-bottom: 0;
        text-align: justify;
    }

    .customer-details-div-h1 {
        margin: 0;
        font-size: 22px;
        line-height: 1.1;
        font-weight: bold;
        letter-spacing: -0.02em;
        font-family: \'Satoshi-Variable\';

    }

    .ts-td2-a-tag {
        color: #e50d70;
        text-decoration: underline;
    }

    .ts-td4-img-section {
        text-align: justify;
        padding: 30px 2rem 11px 2rem;
        font-size: 0;
        border-bottom: 1px solid #f0f0f5;
        border-color: rgba(201, 201, 207, .35);
    }





    .col-lge {
        display: inline-block;
        width: 100%;
        /* max-width: 395px; */
        vertical-align: top;
        padding-bottom: 20px;
        font-family: Arial, sans-serif;
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


    .ts-td6-text-div {
        padding: 30px;
        background-color: aliceblue;
    }

    table,
    td,
    div,
    h1,
    p {
        font-family: Arial, sans-serif;
    }

    @media screen and (max-width: 530px) {
        .customer-details-div-h1 {
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


        .order-dtail-table-main{
            word-break: break-word;
            padding: 0 6rem;
        }
    .order-details-headline{
    display: flex;
    width: 100%;
    word-break: break-word;
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
    .order-dtail-table-main {
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
    .right-icon span {
        font-size: 13px;
    }
    .right-icon img {
        width: 22px;
    }
   }
.
    </style>
</head>

<body>
    <div role="article" aria-roledescription="email" lang="en" class="maindivofpage">
        <table role="presentation" class="table-first">
            <tr>
                <td align="center" style="padding:0;">
                    <table role="presentation" class="table-second">
                        <!-- **************************  LOGO IMAGE HEADER SECTION ************************ -->
                        <tr>
                            <td class="order-placed-header">
                                <div class="left-icon">
                                    <img src="'.LOGO_WITH_PATH.'" alt="Logo">
                                </div>
                                <div class="right-icon">
                                    <span>
                                    Order PLaced 
                                    <img src="'.IMG_PATH.'icons/success.png" alt="Order Placed">
                                    <span>
                                </div>
                            </td>
                        </tr>
                        <!-- **************************  LOGO IMAGE HEADER SECTION ENDS ************************ -->
                        <tr>
                            <td class="customer-details-div">
                                <h1 class="customer-details-div-h1">Hi Dipak, Your order has been place successfully</h1>
                                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Iste ducimus iure maiores
                                    explicabo, at doloremque recusandae aperiam illo corporis dolorem tempora labore
                                    cumque ex, voluptatum cum ab dolorum magnam suscipit.</p>
                            </td>
                        </tr>
                    
                        <tr>
                        <td>
                    
                            <div class="order-dtail-table-main">
                                <h4 class="order-details-headline">
                                    <div class="order-details-headline-div"> Order Details :</div>
                                    <div class="order-details-headline-div  "> #JBHUYTG786G</div>
                                </h4>
                    
                                <div class="order-details-main-div">
                                <div class="order-details-sub-div extra-font"> Site Name :</div>
                                <div class="order-details-sub-div extra-space"> dipakmajumdar.com</div>
                                </div>
                    
                                <div class="order-details-main-div">
                                <div class="order-details-sub-div extra-font"> Order date :</div>
                                <div class="order-details-p-div extra-space"> 12/12/2022</div>
                                </div>
                    
                                <div class="order-details-main-div">
                                <div class="order-details-sub-div extra-font"> Helen :</div>
                                <div class="order-details-sub-div extra-space"> UKrains</div>
                                </div>
                    
                                <div class="order-details-main-div">
                                <div class="order-details-sub-div extra-font"> Giovanni :</div>
                                <div class="order-details-sub-div extra-space"> Italiansss</div>
                                </div>
                            </div>
                        </td>
                    </tr>
                                     


                        <tr>
                            <td class="ts-td4-img-section">
                                <div class="col-lge">
                                    <p class="col-lge-p1">Nullam mollis sapien vel cursus
                                        fermentum. Integer porttitor augue id ligula facilisis pharetra. In eu ex et
                               elit ultricies ornare nec ac ex. Mauris sapien massa, placerat non venenatis et,
                                        tincidunt eget leo.</p>
                                    <p class="col-lge-p2" style="">Nam non ante risus. Vestibulum vitae
                                        eleifend nisl, quis vehicula justo. Integer viverra efficitur pharetra. Nullam
                                        eget erat nibh.</p>
                                    <p class="col-lge-p3">
                                        <a href="#" class="col-lge-p3-atag">
                                            <span class="col-lge-p3-span">Track your order</span>
                                        </a>
                                    </p>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="ts-td6-text-div">
                                <p style="margin:0;text-align: justify;">Duis sit amet accumsan nibh, varius tincidunt
                                    lectus. Quisque
                                    commodo, nulla ac feugiat cursus, arcu orci condimentum tellus, vel placerat libero
                                    sapien et libero. Suspendisse auctor vel orci nec finibus.</p>
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


?>