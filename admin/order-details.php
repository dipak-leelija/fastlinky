<?php
session_start();
$page = "adminOrderDetails";
require_once dirname(__DIR__) . "/includes/constant.inc.php";
require_once ROOT_DIR . "/_config/dbconnect.php";

include_once ADM_DIR . 'checkSession.php';

require_once ROOT_DIR . "/includes/order-constant.inc.php";
require_once ROOT_DIR . "/includes/content.inc.php";


require_once ROOT_DIR . "/classes/date.class.php";
require_once ROOT_DIR . "/classes/error.class.php";
require_once ROOT_DIR . "/classes/customer.class.php";
require_once ROOT_DIR . "/classes/location.class.php";

require_once ROOT_DIR . "/classes/blog_mst.class.php";

require_once ROOT_DIR . "/classes/content-order.class.php";
require_once ROOT_DIR . "/classes/orderStatus.class.php";
require_once ROOT_DIR . "/classes/notification.class.php";

require_once ROOT_DIR . "/classes/date.class.php";
require_once ROOT_DIR . "/classes/utility.class.php";
require_once ROOT_DIR . "/classes/utilityMesg.class.php";

/* INSTANTIATING CLASSES */
$dateUtil           = new DateUtil();
$error              = new Error();
$customer           = new Customer();
$Location           = new Location();

$BlogMst            = new BlogMst();
$ContentOrder       = new ContentOrder();
$OrderStatus        = new OrderStatus();
$Notifications      = new Notifications();

$DateUtil           = new DateUtil();
$utility            = new Utility();
$uMesg              = new MesgUtility();
######################################################################################################################

$currentUrl = $utility->currentUrl();


$orderId = $_GET['ord_id'];

######################################################################################################################
$reference_link =   URL.'/guest-post-article-submit.php?order=';
$transectionId  = '';
$itemAmount     = '00';
$paidAmount     = '00';
$paymentMode    = '';
$paymentStatus  = '';
$itemAmount     = '';
$paidAmount     = '';
$paymentTime    = '';
    
//order details
$showOrder      = $ContentOrder->clientOrderById($orderId);
    
if ($showOrder == false) {
    header("Location: orders.php");exit;
}

$customerId     = $showOrder['clientUserId'];
$domain         = $showOrder['clientOrderedSite'];
$toMail         = $showOrder['clientEmail'];
$orderDate      = $showOrder['added_on'];
$ordStatCode    = $showOrder['order_status'];
    
// order status names
$statusName = $OrderStatus->getOrdStatName($ordStatCode);

//transection details
$ordTxn     = $ContentOrder->showTransectionByOrder($orderId);

if ($ordTxn != false) {
    $transectionId  = $ordTxn['transection_id'];
    $paymentMode    = $ordTxn['transection_mode'];
    $paymentStatus  = $OrderStatus->getOrdStatName($ordTxn['transection_status']);
    $itemAmount     = $ordTxn['item_amount'];
    $paidAmount     = $ordTxn['paid_amount'];
    $paymentTime    = $ordTxn['updated_on'];
}
// $ordTxn['transection_id'];


// contents of the order
$orderContent   = $ContentOrder->getOrderContent($orderId);
    $orderContentId = $orderContent['id'];
    $contentPath    = $orderContent['path'];
    $contentTitle   = $orderContent['title'];
$contentLink    = $ContentOrder->getContentHyperLinks($orderContentId);


//blog details
$item       = $BlogMst->showBlogbyDomain($domain);

//blog creator / seller
$seller     = $customer->getCustomerByemail($item['created_by']);
// print_r($seller);exit;

//customer / buyer
$buyer      = $customer->getCustomerData($customerId);
$buyerName  = $buyer[0][5].' '.$buyer[0][6];
$toName     = $buyer[0][5];


########################################################################################################

// if (isset($_POST['delivered'])) {
//     echo 'here'; exit;
//     // $orderStatus    = 1; // Deliverd 
//     // $deliveredLink  = $_POST['post-link'];
//     // $deliveredLink  = rawurlencode($deliveredLink);

//     // $delivered = $ContentOrder->ClientOrderOrderUpdate($orderId, $orderStatus, 'deliveredLink', $deliveredLink, NOW);
//     // if ($delivered) {
//     //     $publishDate = '';
//     //     require_once ROOT_DIR."/mail-sending/delivered-mail.php";
//     //     $uMesg->redirectURL($currentUrl, 'WARNING', 'Order Delivered But Mail Skipped');
//     // }
// }

if (isset($_POST['deliver-order'])) {
    $deliveredLink      = $_POST['deliver-link'];
    // $customerId         = $_POST['customer-id'];
    // $orderId            = $_POST['order-id'];
    $reference_link    .= base64_encode(urlencode($orderId));
    
    $deliveredLink  = rawurlencode($deliveredLink);

    $delivered = $ContentOrder->ClientOrderOrderUpdate($orderId, DELIVEREDCODE, 'deliveredLink', $deliveredLink, NOW);
    $Notifications->addNotification(ORD_UPDATE, ORD_DEL, ORD_DLVRD_M, $reference_link, $customerId);

    if ($delivered) {
        $updated = $ContentOrder->addOrderUpdate($orderId, ORD_DEL, '', 0);
        if ($updated) {
            require_once ROOT_DIR."/mail-sending/delivered-mail.php";
            // $uMesg->redirectURL($currentUrl, 'WARNING', 'Order Delivered But Mail Skipped');
        }

    }
}

########################################################################################################

if (isset($_FILES['content-file'])) {

    $uploadedPath = $utility->fileUploadWithRename($_FILES['content-file'], CONT_DIR);
    if ($uploadedPath != false ) {
        $ContentOrder->contentUpdate($orderId, 'doc', $uploadedPath);
        $ContentOrder->addOrderUpdate($orderId, 'Content Updated', CONT_UPDT, 0);

        require_once ROOT_DIR."/mail-sending/content-uploaded-mail.php";

    }
    ?>
<script>
    alert('Content Uploded').then((result)=>{
        if (result.isConfirmed) {
            window.location = window.location.href;
        }
    });
</script>
<?php
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once ADM_DIR . "/incs/admin-common-headers.php" ?>

    <title><?= $domain; ?> - Order Details | <?php echo COMPANY_FULL_NAME; ?></title>

    <link rel="stylesheet" href="<?= URL?>/plugins/sweetalert/sweetalert2.css">

    <!-- inject:css -->
    <link rel="stylesheet" href="<?= URL?>/css/order-now.css">
    <link rel="stylesheet" href="<?= URL?>/css/order-list.css">
    <!-- endinject -->

</head>
<style>
     @media (max-width: 308px){
    #progressbar li:after {
        left: 3.3%;
    }
  }
      @media (max-width: 991px){
    #progressbar li:after {
        left: 1.8%;
    }
  }
  @media (min-width: 1406px){
    #progressbar li:after {
        left: 1.87%;
    }
  }
</style>
<body>
    <div class="container-scroller">
        <?php require_once "partials/_navbar.php"; ?>

        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <?php require_once "partials/_settings-panel.php"; ?>


            <!-- partial -->
            <?php require_once "partials/_sidebar.php"; ?>
            <!-- partial:../../ -->

            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="card">
                        <div class="card-body">
                            <div class=" display-table">

                                <!-- Details section Start  -->
                                <div class="">
                                    <div class="">
                                        <!-- Order Details Start -->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div>
                                                    <h5 class="border-bottom border-primary py-2">
                                                        Order Details:
                                                    </h5>
                                                    <h5 class="pkage-headline pt-1">
                                                        <?= $domain; ?><span
                                                            class="ms-2 badge <?php echo $statusName; ?>"><?php echo $statusName; ?></span>
                                                    </h5>
                                                    <table class="ordered-details-table-css ">
                                                        <tr>
                                                            <td>Order Id</td>
                                                            <td>:</td>
                                                            <td><?php echo "#" . $showOrder['order_id']; ?></td>
                                                        </tr>
                                                        <?php
                                                        if ($transectionId != null) {
                                                        ?>
                                                        <tr>
                                                            <td>Transection Id</td>
                                                            <td>:</td>
                                                            <td style="word-break: break-word;">
                                                                <?php echo "#" . $transectionId; ?>
                                                            </td>
                                                        </tr>
                                                        <?php
                                                        }
                                                        ?>
                                                        <tr>
                                                            <td>Payment</td>
                                                            <td>:</td>
                                                            <td><?php echo $DateUtil->dateTimeText($orderDate); ?>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                            <!-- Order Details End -->

                                            <!-- payment details start -->
                                            <div class="col-md-6">
                                                <div>
                                                    <h5 class="border-bottom border-primary py-2">
                                                        Payment Details:
                                                    </h5>
                                                    <table class="ordered-details-table-css ">
                                                        <?php
                                                        if ($transectionId != null) {
                                                        ?>
                                                        <tr>
                                                            <td>Transection Id </td>
                                                            <td>:</td>
                                                            <td style="word-break: break-word;">
                                                                <?php echo "#" . $transectionId; ?>
                                                            </td>
                                                        </tr>
                                                        <?php
                                                        }
                                                        ?>
                                                        <tr>
                                                            <td>Item Price </td>
                                                            <td>:</td>
                                                            <td>
                                                                <?= CURRENCY.$itemAmount; ?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Paid Amount </td>
                                                            <td>:</td>
                                                            <td>
                                                                <?= CURRENCY.$paidAmount; ?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Payment Mode </td>
                                                            <td>:</td>
                                                            <td>
                                                                <?= $paymentMode; ?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Payment Status </td>
                                                            <td>:</td>
                                                            <td>
                                                                <?= $paymentStatus; ?>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>Payment Time </td>
                                                            <td>:</td>
                                                            <td>
                                                                <?= $DateUtil->dateTimeText($paymentTime); ?>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                            <!-- payment details end  -->

                                            <!-- customer details start  -->
                                            <div class="col-md-6">
                                                <div>
                                                    <h5 class="border-bottom border-primary py-2">
                                                        Customer Details:
                                                    </h5>
                                                    <table class="ordered-details-table-css ">
                                                        <tr>
                                                            <td>Customer Name</td>
                                                            <td>:</td>
                                                            <td>
                                                                <?= $buyerName; ?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Email</td>
                                                            <td>:</td>
                                                            <td style="word-break: break-word;">
                                                                <?= $buyer[0][2]; ?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Contact</td>
                                                            <td>:</td>
                                                            <td><?= $buyer[0][31]; ?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Secendary Contact</td>
                                                            <td>:</td>
                                                            <td><?= $buyer[0][32]; ?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Mobile</td>
                                                            <td>:</td>
                                                            <td><?= $buyer[0][34]; ?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Fax</td>
                                                            <td>:</td>
                                                            <td><?= $buyer[0][33]; ?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Addess</td>
                                                            <td>:</td>
                                                            <td>
                                                                <?php
                                                                if ($buyer[0][24] != null) {
                                                                    echo $buyer[0][24] . ',';
                                                                }

                                                                if ($buyer[0][24] != null) {
                                                                    echo $buyer[0][25] . ',';
                                                                }

                                                                if ($buyer[0][24] != null) {
                                                                    echo $buyer[0][26];
                                                                }

                                                                ?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>City / Town</td>
                                                            <td>:</td>
                                                            <td>
                                                                <?php
                                                                $city = $Location->getCityDataById($buyer[0][27]);
                                                                if ($city != null) {
                                                                    echo $city['name'];
                                                                }
                                                                ?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>State</td>
                                                            <td>:</td>
                                                            <td>
                                                                <?php
                                                                $state = $Location->getStateData($buyer[0][28]);
                                                                if ($state != null) {
                                                                    echo $state['name'];
                                                                }
                                                                ?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Pin / Zip Code</td>
                                                            <td>:</td>
                                                            <td><?php echo $buyer[0][29]; ?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Country</td>
                                                            <td>:</td>
                                                            <td>
                                                                <?php
                                                                $country = $Location->getCountyById($buyer[0][30]);
                                                                // print_r($country);
                                                                echo $country['name'];
                                                                ?>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                            <!-- customer details end  -->

                                            <!-- seller details start  -->
                                            <div class="col-md-6">
                                                <div>
                                                    <h5 class="border-bottom border-primary py-2">
                                                        Seller Details:</h5>
                                                        <?php if (!empty($seller)): ?>
                                                    <table class="ordered-details-table-css ">
                                                        <tr>
                                                            <td>Customer Name</td>
                                                            <td>:</td>
                                                            <td><?php echo $seller['fname'] . ' ' . $seller['lname']; ?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Email</td>
                                                            <td>:</td>
                                                            <td style="word-break: break-word;">
                                                                <?php echo $seller['email']; ?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Contact</td>
                                                            <td>:</td>
                                                            <td><?php echo $seller['phone1']; ?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Secendary Contact</td>
                                                            <td>:</td>
                                                            <td><?php echo $seller['phone2']; ?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Mobile</td>
                                                            <td>:</td>
                                                            <td><?php echo $seller['mobile']; ?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Fax</td>
                                                            <td>:</td>
                                                            <td><?php echo $seller['mobile']; ?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Addess</td>
                                                            <td>:</td>
                                                            <td>
                                                                <?php
                                                                if ($seller['address1'] != null) {
                                                                    echo $seller['address1'] . ',';
                                                                }

                                                                if ($seller['address2'] != null) {
                                                                    echo $seller['address2'] . ',';
                                                                }

                                                                if ($seller['address3'] != null) {
                                                                    echo $seller['address3'];
                                                                }

                                                                ?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>City / Town</td>
                                                            <td>:</td>
                                                            <td>
                                                                <?php
                                                                $city = $Location->getCityDataById($seller['town']);
                                                                if ($city != null) {
                                                                    echo $city['name'];
                                                                }
                                                                ?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>State</td>
                                                            <td>:</td>
                                                            <td>
                                                                <?php
                                                                $state = $Location->getStateData($seller['province']);
                                                                if ($state != null) {
                                                                    echo $state['name'];
                                                                }
                                                                ?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Pin / Zip Code</td>
                                                            <td>:</td>
                                                            <td><?php echo $seller['postal_code']; ?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Country</td>
                                                            <td>:</td>
                                                            <td>
                                                                <?php
                                                                $country = $Location->getCountyById($seller['countries_id']);
                                                                echo $country['name'];
                                                                ?>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                    <?php else: ?>
                                                        <div class="text-center text-primary p-4">
                                                            <h5><i class="fa-regular fa-store"></i><strong> This item is sold by <?= COMPANY_S ?></strong></h5>
                                                        </div>
                                                    <?php endif; ?>

                                                </div>
                                            </div>
                                            <!-- seller details end  -->
                                        </div>
                                        <!-- end of row  -->
                                    </div>
                                </div>
                                <!-- Details section End -->

                                <?php
                                
                                $delivered = false;

                                if ($ordStatCode == PROCESSINGCODE || $ordStatCode == ORDEREDCODE) {
                                    $fieldStatus = '';
                                }
                                
                                
                                if ($ordStatCode == DELIVEREDCODE || $ordStatCode == COMPLETEDCODE) {
                                    $fieldStatus = 'disabled';
                                    $delivered = true;
                                }
                                ?>

                                <?php if ($delivered):
                                    echo '<div class="delivered_sec rounded-1r border mt-4 p-4">
                                            <h3>Your ordered article link is: </h3>
                                            <div class="text-wrap">
                                                <input type="text" class="form-control" id="articleLink"
                                                value="'.rawurldecode($showOrder['deliveredLink']) . '">
                                                <div id="copyArticleLink" class="clipboard icon"></div>
                                            </div>';

                                        if ($ordStatCode == DELIVEREDCODE) {
                                            echo '<div class="btn_bx text-center mt-3">
                                                    <input type="hidden" name="customer-id" value="<?= $customerId; ?>">
                                                    <button class="btn btn-sm btn-primary" onclick="finishedOrder(\''.$orderId.'\', \''.$customerId.'\')">Finished</button>
                                                    <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#updateModal" onclick="changeRequest()">Need to Change</button>
                                                </div>';
                                        } else {
                                            if ($paymentMode == PAYLATER) {
                                                echo '<div class="text-center">
                                                        <p>'.PAYLATER.' Payment Required to close the order </p>
                                                        <button class="btn btn-sm btn-primary text-light"><a class="text-light" href="#">Contact Customer</a></button>
                                                        </div>';
                                            }else {
                                                $ordUpdate = $ContentOrder->lastUpdate($orderId);
                                                echo '<p class="text-center font-weight-bold my-3">Order Completed on ' .
                                                $DateUtil->dateTimeText($ordUpdate['updated_on']). '</p>';
                                            }
                                        }

                                    echo '</div>';
                                
                                endif;
                                ?>

                                <div class="row">

                            <div class="col-lg-8">
                                <div class="card rounded-1r border shadow mt-4">
                                    <div class="card-body">

                                        <!-- row start -->
                                        <div class="row">

                                            <!-- title section start  -->
                                            <div class="col-12">
                                                <h5 class="text-primary font-weight-bold">Title</h5>

                                                <div class="text-wrap">
                                                    <input type="text" class="form-control" id="anchor-text"
                                                        value="<?= $contentTitle ?>">
                                                    <div id="copyAnchorText" class="clipboard icon">
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- title section end  -->

                                            <div class="col-12 mt-3">
                                                <?php
                                                        if ($contentPath == '') {

                                                            if ($orderContent['content_type'] == '') {
                                                            ?>
                                                <p class="text-primary font-weight-bold">
                                                    Content
                                                    <span class="text-danger font-weight-light">
                                                        <small> Content Required By
                                                            <?php echo COMPANY_S;?></small>
                                                    </span>
                                                </p>

                                                <!-- content upload section start -->
                                                <div class="content-upload">
                                                    <div class="content-upload-wrap border">
                                                        <form action="" method="post" id="content-form"
                                                            enctype="multipart/form-data">
                                                            <input class="file-upload-input" name="content-file"
                                                                type='file' onchange="readURL(this);"
                                                                accept=".doc, .docx" />
                                                        </form>
                                                        <div class="drag-text">
                                                            <p>
                                                                <i class="fa-sharp fa-solid fa-file-arrow-up"></i>
                                                                <br>
                                                                Drag and Drop Your Content File
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="file-upload-content">
                                                        <img class="file-upload-image" src="#" alt="your image" />
                                                        <div class="image-title-wrap">
                                                            <button type="button" onclick="removeUpload()"
                                                                class="remove-image d-flex justify-content-between px-3">
                                                                <span class="image-title">Uploaded Image</span>
                                                                <span><i
                                                                        class="fa-sharp fa-solid fa-xmark fs-5"></i></span>
                                                            </button>
                                                        </div>
                                                        <button class="btn btn-sm btn-primary"
                                                            onclick="uploadContent()">Update Content</button>
                                                    </div>
                                                </div>
                                                <!-- content upload section end -->

                                                <!-- OR DIVIDER STARTED -->
                                                <div id="or-divider" class="bg_mustard p-2 my-4 mx-0 text-light d-none"
                                                    style="border: 1px solid gainsboro;">
                                                    <h5 class="text-center mb-0">OR</h5>
                                                </div>
                                                <!-- OR DIVIDER ENDED -->

                                                <!-- content text section start -->
                                                <div id="content-text">
                                                    <div class="form-group d-none">
                                                        <label for="">Your Content<span class="warning">*</span>
                                                            (Must be a minimum
                                                            of 500 words) Don't have a content, get one here
                                                            Place your content here. In your content, you can
                                                            include up to 2 links
                                                            They can be in the form of URLs and anchors. In the
                                                            "URL" and "Anchor
                                                            text"
                                                            fields below, please insert the same URLs and
                                                            anchors. <span class="warning">(Don't add any images
                                                                in your
                                                                article)</span></label>
                                                        <div class="form-group">
                                                            <textarea class="form-control" name="clientContent1" id=""
                                                                rows="9" placeholder="Write or paste your content here"
                                                                onkeyup="checkContent(this)"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- content text section end -->

                                                <!-- <div class="border rounded text-center py-4" data-toggle="modal"
                                                            data-target="#updateModal">
                                                            <button class="btn btn-sm btn-primary my-4"
                                                                onclick="updateSingle()">Upload Content</button>
                                                        </div> -->
                                                <?php
                                                            } else {
                                                            ?>
                                                <p
                                                    class="text-light bg-info font-weight-bold text-center w-100 my-5 py-5">
                                                    Contents Will Be Updated Soon.
                                                </p>

                                                <?php
                                                            }
                                                        }else {
                                                        ?>
                                                <h5 class="text-primary font-weight-bold">
                                                    Content
                                                    <span class="text-danger font-weight-light">
                                                        <small class="text-capitalize">
                                                            You can View or Download the content by clicking on
                                                            the respective button
                                                        </small>
                                                    </span>
                                                </h5>
                                                <div
                                                    class="bg-primary text-light rounded d-flex justify-content-between w-100 p-2">
                                                    <?= basename($contentPath); ?>

                                                    <a href="<?= URL ?>/content-download.php?data='<?=base64_encode(urlencode($orderId))?>"
                                                        target="_blank" rel="noopener noreferrer">
                                                        <span class="badge text-bg-info text-light">
                                                            Download
                                                            <i class="fa-sharp fa-regular fa-file-arrow-down"></i>
                                                        </span>
                                                    </a>

                                                </div>
                                                <?php
                                                        }
                                                        ?>
                                            </div>


                                            <!-- anchor texts start  -->
                                            <div class="col-sm-6 mt-3">
                                                <h5 class="text-primary font-weight-bold">Anchor Text</h5>

                                                <div class="text-wrap mb-2">
                                                    <input type="text" class="form-control" id="anchor-text"
                                                        value="<?= $contentLink['client_anchor'] ?>">
                                                    <div id="copyAnchorText" class="clipboard icon">
                                                    </div>
                                                </div>

                                                <div class="text-wrap mb-2">
                                                    <input type="text" class="form-control" id="anchor-text"
                                                        value="<?= $contentLink['reference_anchor1'] ?>">
                                                    <div id="copyAnchorText" class="clipboard icon">
                                                    </div>
                                                </div>

                                                <div class="text-wrap mb-2">
                                                    <input type="text" class="form-control" id="anchor-text"
                                                        value="<?= $contentLink['reference_anchor2'] ?>">
                                                    <div id="copyAnchorText" class="clipboard icon">
                                                    </div>
                                                </div>

                                            </div>
                                            <!-- anchor texts end -->

                                            <!-- anchor links start -->
                                            <div class=" col-sm-6 mt-3">
                                                <h5 class="text-primary font-weight-bold">Target URL</h5>

                                                <div class="text-wrap mb-2">
                                                    <input type="text" class="form-control" id="anchor-text"
                                                        value="<?= $contentLink['client_url'] ?>">
                                                    <div id="copyAnchorText" class="clipboard icon">
                                                    </div>
                                                </div>
                                                <div class="text-wrap mb-2">
                                                    <input type="text" class="form-control" id="target-url"
                                                        value="<?= $contentLink['reference_url1']; ?>">
                                                    <div id="copyTargetUrl" class="clipboard icon">
                                                    </div>
                                                </div>
                                                <div class="text-wrap mb-2">
                                                    <input type="text" class="form-control" id="target-url"
                                                        value="<?= $contentLink['reference_url2']; ?>">
                                                    <div id="copyTargetUrl" class="clipboard icon">
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- anchor links end -->

                                            <div class="col-12 mt-3">
                                                <h5 class="text-primary font-weight-bold">Special Requirements
                                                </h5>
                                                <div class="text-wrap">
                                                    <textarea class="form-control" id="special-requirements"
                                                        rows="6"><?php echo $showOrder['clientRequirement']; ?></textarea>
                                                    <div id="copyRequirements" class="clipboard icon">
                                                    </div>
                                                </div>

                                            </div>


                                        </div>
                                        <!-- row end -->


                                        <!--========== if Order status is Ordered  ==========-->
                                        <?php if ($ordStatCode == ORDEREDCODE):?>
                                        <div class="container p-4">
                                            <p class="text-danger text-center">It's Seller turn to take action
                                            </p>
                                            <div class="d-md-flex justify-content-around">

                                                <button class="btn btn-danger w-25" data-toggle="modal"
                                                    data-target="#updateModal" onclick="rejectOrder()">Reject</button>

                                                <button class="btn btn-primary w-25" name="accept-order"
                                                    onclick="acceptOrder(<?= $orderId; ?>, <?= $customerId; ?>)">Accept</button>
                                            </div>
                                        </div>
                                        <?php endif;?>
                                        <!--==========/ if Order status is Ordered  ==========-->



                                        <!--========== if Order is Incomplete  ==========-->
                                        <?php if ($ordStatCode == INCOMPLETECODE):?>
                                        <div class="d-flex justify-content-around p-4 p-md-5">
                                            <button class="btn btn-primary w-25">Contact Customer</button>
                                            <button class="btn btn-primary w-25" name="accept-order">Contact
                                                Seller</button>

                                        </div>
                                        <?php endif; ?>
                                        <!--==========/ if Order is Incomplete  ==========-->




                                        <!-- ============ if order rejected ============ -->
                                        <?php if ($ordStatCode == REJECTEDCODE): ?>
                                        <div class="bg-danger font-weight-bold mt-1">
                                            <p class="text-light text-center py-2">Order Has Been
                                                <?= REJECTED ?>
                                            </p>
                                        </div>
                                        <?php endif ?>
                                        <!-- ============/ if order rejected ============ -->


                                        <!-- =============== if order is Hold =============== -->
                                        <?php if ($ordStatCode == HOLDCODE):
                                                    if ($showOrder['changesReq'] > 0) {

                                                        $chngMsg = 'There is a Request for Changes!';
                                                        if ($showOrder['changesReq'] > 1):
                                                            $chngMsg = 'There is Some Request for Changes!';
                                                        endif;
                                                    ?>
                                        <div class="text-center mt-2">
                                            <p class="text-danger font-weight-bold"><?= $chngMsg; ?></p>
                                            <button class="btn btn-sm btn-primary"
                                                onclick="changesUpdate(<?= $orderId; ?>)">Chnages Updated
                                                ?</button>
                                        </div>
                                        <?php } else {

                                                    echo '
                                                    <div class="text-center py-4">
                                                        <button class="btn w-50 btn-primary" data-bs-toggle="modal"
                                                            data-bs-target="#deliverModal">Update Deliver</button>
                                                    </div>';
                                                    }
                                                endif;
                                                ?>
                                        <!-- ===============/ if order is Hold =============== -->

                                        <!-- =============== if order is delivered =============== -->
                                        <?php if ($ordStatCode == DELIVEREDCODE): ?>
                                        <div class="text-center py-4">
                                            <p class="text-light bg-primary fs-4 font-weight-bold">
                                                Order Delivered.
                                            </p>
                                        </div>
                                        <?php endif; ?>
                                        <!-- =============== if order is delivered =============== -->


                                        <!-- ============ if order is processing ============-->
                                        <?php
                                                if ($ordStatCode == PROCESSINGCODE) {
                                                    if ($contentPath != '') {

                                                        if ($showOrder['changesReq'] > 0) {
                                                            
                                                            $chngMsg = 'There is a Request for Changes!';
                                                            if ($showOrder['changesReq'] > 1):
                                                                $chngMsg = 'There is Some Request for Changes!';
                                                            endif;
                                                            ?>

                                        <div class="text-center mt-2">
                                            <p class="text-danger font-weight-bold"><?= $chngMsg; ?></p>
                                            <button class="btn btn-sm btn-primary"
                                                onclick="changesUpdate(<?= $orderId; ?>)">Chnages Updated
                                                ?</button>
                                        </div>

                                        <?php 
                                                        } else {

                                                            echo '
                                                            <div class="d-flex justify-content-center my-3">
                                                                <button class="btn btn-danger w-25 mx-2" onclick="cancelOrder(' . $orderId . ')">Cancel Order</button>

                                                                <button class="btn w-25 btn-primary mx-2" data-toggle="modal" data-target="#deliverModal">Update Deliver</button>
                                                            </div>';

                                                            }
                                                    } else {
                                                        echo '<p class="text-danger font-weight-bold text-center mt-2">Please Upload The Content First</p>';

                                                    }
                                                }
                                                ?>
                                        <!-- ============/ if order is processing ============-->

                                    </div>
                                </div>
                            </div>


                            <!-- start of updates  -->
                            <div class="col-lg-4">
                                <div class="stretch-card grid-margin mt-4">
                                    <div class="card status_card p-0 rounded-1r border shadow">
                                        <div class="card-body">
                                            <p class="card-title" style="margin-bottom: 0.75rem;">Updates</p>

                                            <ul class="icon-data-list" id="progressbar">
                                                <?php
                                                    $ordUpdates = $ContentOrder->showOrderUpdateById($showOrder['order_id'], 'ASC');
                                                    // print_r($ordUpdates);
                                                    foreach ($ordUpdates as $ordUpdate) {
                                                        if ($ordUpdate['updated_by'] != 0) {
                                                        
                                                            $newCus = $utility->getSingleData('customer_type', 'customer', 'customer_id', $ordUpdate['updated_by']);
                                                            $updateCustomer = $customer->getCustomerByTypeId($newCus['customer_type']);

                                                            $avatar = $customer->getCustomerAvatar($customerId);
                                                            if ($avatar == '') {
                                                                $avatar = DFAULT_AVATAR_PATH;
                                                            }else{
                                                                $avatar = USER_IMG_PATH.$avatar;
                                                            }
                                                        
                                                        }
                                                        

                                                        if ($ordUpdate['updated_by'] == 0) {
                                                            $updateBy = COMPANY_S;
                                                            $userImg  = FAVCON_PATH;
                                                        } else {
                                                            $updateBy = $updateCustomer['cus_type'];
                                                            $userImg  = $avatar;
                                                        }

                                                         
                                                    ?>

                                                <li id="step">
                                                    <div class="d-flex pl-4" style="margin-top: -1.18rem;">
                                                        <!-- <img src="<?= $userImg ?>" alt="user"> -->
                                                        <div>
                                                            <p class="text-primary mb-0">
                                                                <?php echo $ordUpdate['subject']; ?></p>
                                                            <p class="mb-0">
                                                                <small><?php
                                                                        if ($ordUpdate['dsc'] != null) {
                                                                            echo $ordUpdate['dsc'] . '<br>';
                                                                        }
                                                                        ?></small>

                                                                <small>By <?= $updateBy ?></small>
                                                            </p>
                                                            <small style="font-size: 83%;">
                                                                <?= $DateUtil->dateTimeNumber($ordUpdate['updated_on']); ?>
                                                            </small>
                                                        </div>
                                                    </div>
                                                </li>
                                                <?php
                                                    }
                                                    ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end of updates  -->
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Start Reject Modal -->
        <div class="modal fade" id="rejectModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="POST">
                            <div class="mb-3">
                                <label for="cancellation-reason" class="form-label">Reason
                                    of cancellation</label>
                                <textarea class="form-control" id="cancellation-reason" name="cancellation-reason"
                                    rows="3"></textarea>
                            </div>
                            <div class="text-center">
                                <button class="btn btn-sm btn-danger" name="reject-order">Reject</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Reject Modal  -->


        <!-- Update Modal -->
        <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="ajax/order-update.php" method="POST" id="updateForm">
                        <div class="modal-header px-4 py-3">
                            <h5 class="modal-title" id="updateModalLabel"></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <input type="hidden" name="return-page" value="<?= $utility->currentUrl() ?>">
                        <input type="hidden" name="order-id" value="<?= $orderId ?>">
                        <input type="hidden" name="customer-id" value="<?= $customerId; ?>">

                        <div class="modal-body p-3" id="updateModalBody">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" id="action-btn" name="add-content">Save
                                changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Update Modal End -->

        <!-- Deliver Modal -->
        <div class="modal fade" id="deliverModal" tabindex="-1" aria-labelledby="deliverModallLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="<?= $currentUrl ?>" method="POST" onsubmit="return validateForm()">
                        <div class="modal-header">
                            <h5 class="modal-title">Successfull Delivery Link</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <input type="hidden" name="return-page" value="<?= $utility->currentUrl() ?>">
                        <!-- <input type="hidden" name="order-id" value="<?= $orderId ?>"> -->
                        <!-- <input type="hidden" name="customer-id" value="<?= $customerId; ?>"> -->
                        <div class="modal-body p-2" id="deliverModalBody">
                            <input type="text" class="form-control" name="deliver-link" id="deliver-link"
                                placeholder="Paste the link here">
                            <span class="text-danger d-block" id="blank-msg"></span>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary" name="deliver-order">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Update Modal End -->
        <!-- partial -->
    </div>
    <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="vendors/js/vendor.bundle.base.js"></script>
    <script src="js/off-canvas.js"></script>
    <script src="js/hoverable-collapse.js"></script>
    <script src="js/template.js"></script>
    <script src="js/settings.js"></script>
    <script src="js/todolist.js"></script>

    <!-- <script src="plugins/bootstrap-5.2.0/js/bootstrap.js"></script> -->
    <!-- <script src="../plugins/data-table/simple-datatables.js"></script> -->
    <script src="../plugins/tinymce/tinymce.js"></script>
    <script src="../plugins/main.js"></script>
    <script src="../plugins/sweetalert/sweetalert2.all.min.js" type="text/javascript"></script>
    <script src="../js/ajax.js" type="text/javascript"></script>
    <script src="../js/content-upload.js"></script>


    <script>
    const acceptOrder = (ordId, customerId) => {

        if (confirm("Are You Sure ?")) {
            window.location.href = `ajax/order-update.php?order-id=${ordId}&customer-id=${customerId}`;
        }

        // reject-order

    }


    const rejectOrder = () => {

        document.getElementById('updateModalLabel').innerText = 'Reject Order';
        document.getElementById('action-btn').name = 'reject-order';
        document.getElementById('updateModalBody').innerHTML =
            `<p class="text-primary font-weight-bold">Reason of cancellation</p>
                                <textarea class="form-control"  name="cancellation-reason" rows="6" required></textarea>`;

    }


    const updateSingle = () => {
        content = document.getElementById('updateModalBody').innerHTML = `<p class="text-primary font-weight-bold">Paste The Content Here</p>
            <textarea class="form-control" id="content" name="content" rows="6"></textarea>`;
        // content.innerHTML = ;
    }

    const cancelOrder = (ordId) => {
        if (confirm("Are You Sure ?")) {
            window.location.href = `ajax/order-update.php?cancel-order=${ordId}`;
        }

    }

    const validateForm = () => {

        // alert("Hi");
        // return false;
        let postUrl = document.getElementById("deliver-link").value;
        if (postUrl == "") {
            document.getElementById('blank-msg').innerText = "Link Can't be blank";
            return false;
        } else {
            // function isValidHttpUrl(postUrl) {
            let url;
            try {
                url = new URL(postUrl);
            } catch (_) {
                document.getElementById('blank-msg').innerText = "Link is not valid";
                return false;
            }
            return url.protocol === "http:" || url.protocol === "https:";
            // }
        }
    }


    const finishedOrder = (ordId, customerId) => {
        Swal.fire({
            title: 'Are you sure?',
            text: "Order Completed!",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, Completed'
        }).then((result) => {
            if (result.isConfirmed) {

                $.ajax({
                    url: "ajax/order-update.php",
                    type: "POST",
                    data: {
                        ordId: ordId,
                        customerId: customerId
                    },
                    success: function(data) {
                        // alert(data);
                        if (data.includes('finished')) {
                            location.reload();
                        } else {
                            Swal.fire(
                                'failed!',
                                'Failed to Complete Order!! 😥.',
                                'error'
                            )
                        }

                    }
                });
            }
        })
        return false;
    }


    const changeRequest = () => {
        // alert('Hi');
        document.getElementById('updateModalLabel').innerText = 'What to change?';
        document.getElementById('action-btn').name = 'changes-request';
        document.getElementById('updateModalBody').innerHTML =
            `<textarea class="form-control"  name="changes-req" rows="6" required></textarea>`;

    }


    const changesUpdate = (ordId) => {
        Swal.fire({
            title: 'Are you sure?',
            text: "Changes Completed!",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, Completed'
        }).then((result) => {
            if (result.isConfirmed) {

                $.ajax({
                    url: "ajax/order-update.php",
                    type: "POST",
                    data: {
                        changesOrder: ordId
                    },
                    success: function(data) {
                        // alert(data);
                        if (data.includes('updated')) {
                            location.reload();
                        } else {
                            Swal.fire(
                                'failed!',
                                'Failed to Complete Order!! 😥.',
                                'error'
                            )
                        }

                    }
                });
            }
        })
        return false;
    }

    const uploadContent = () => {
        document.getElementById('content-form').submit();
        // $.ajax({
        //     url: "ajax/order-update.php",
        //     type: "POST",
        //     data: {
        //         // contentUpload: <?= $orderId; ?>
        //         contentUpload  : $("#content-form").serialize()
        //     },
        //     success: function(response) {
        //         console.log(response);
        //         // if (data.includes('finished')) {
        //         //     location.reload();
        //         // } else {
        //         //     Swal.fire(
        //         //         'failed!',
        //         //         'Failed to Complete Order!! 😥.',
        //         //         'error'
        //         //     )
        //         // }

        //     }
        // });
    }
    </script>

    <!-- endinject -->
    <!-- Custom js for this page-->
    <!-- End custom js for this page-->
</body>

</html>