<?php
session_start();
require_once __DIR__ . "/includes/constant.inc.php";
require_once __DIR__ . "/includes/order-constant.inc.php";
require_once __DIR__ . "/includes/content.inc.php";
require_once ROOT_DIR . "/_config/dbconnect.php";

require_once ROOT_DIR . "/classes/customer.class.php";
require_once ROOT_DIR . "/classes/content-order.class.php";
require_once ROOT_DIR . "/classes/orderStatus.class.php";
require_once ROOT_DIR . "/classes/notification.class.php";
require_once ROOT_DIR . "/classes/location.class.php";
require_once ROOT_DIR . "/classes/date.class.php";
require_once ROOT_DIR . "/classes/utility.class.php";
require_once ROOT_DIR . "/classes/utilityMesg.class.php";

/* INSTANTIATING CLASSES */
$customer		= new Customer();
$ContentOrder   = new ContentOrder();
$OrderStatus    = new OrderStatus();
$Notifications  = new Notifications();
$Location       = new Location();
$DateUtil       = new DateUtil();
$Utility		= new Utility();
$uMesg          = new MesgUtility();
######################################################################################################################
$typeM		= $Utility->returnGetVar('typeM','');
//user id
$cusId		= $Utility->returnSess('userid', 0);
$cusDtl		= $customer->getCustomerData($cusId);

require_once ROOT_DIR."/includes/check-customer-login.inc.php";

if(isset($_GET['order'])){
    $orderId			  		= urldecode(base64_decode($_GET['order']));

}else {
    header("Location: my-orders.php");
}

$thisPage   = $Utility->currentUrl();
$updatedBy  = $_SESSION[USR_SESS];

$reference_link = $thisPage;

//session array
$sess_arr = array('contetPrice', ORDERDOMAIN, ORDERSITECOST, ORDERID, SUMMARYDOMAIN, SUMMARYSITECOST, 'content-data', 'ConetntCreationPlacementPrice');
$Utility->delSessArr($sess_arr);



$txnStatus  ='';
$txnMode    = '';
$itemAmount ='';
$paidAmount ='';
$transectionId  =   '';

#####################################################################

$showOrder                  = $ContentOrder->clientOrderById($orderId);

if ($showOrder == false) {
    header("Location: my-orders.php");
    exit;
}
    $orderStatusCode        = $showOrder['order_status'];
    $orderStatusName             = $OrderStatus->getOrdStatName($orderStatusCode);

    $orderDate              = $DateUtil->timeZoneConvert($showOrder['added_on']);
    $orderDate              = $DateUtil->dateTimeText($orderDate);




$orderContent   = $ContentOrder->getOrderContent($orderId);
    $orderContentId = $orderContent['id'];
$contentLink    = $ContentOrder->getContentHyperLinks($orderContentId);
$clientAnchor       = $contentLink['client_anchor'];
$clientURL          = $contentLink['client_url'];
$referenceAnchor1   = $contentLink['reference_anchor1'];
$referenceURL1      = $contentLink['reference_url1'];
$referenceAnchor2   = $contentLink['reference_anchor2'];
$referenceURL2      = $contentLink['reference_url2'];


$ordTxn         = $ContentOrder->showTransectionByOrder($orderId);
if ($ordTxn != false) {
    $txnMode            = $ordTxn['transection_mode'];
    
    if ($ordTxn['transection_id'] != null) {
        $transectionId = $ordTxn['transection_id'];
    }

    if ($ordTxn['transection_status'] != null) {
        $txnStatus = $ordTxn['transection_status'];
        $txnStatusName = $OrderStatus->getOrdStatName($txnStatus);
    }
    
    if ($ordTxn['item_amount'] != null) {
        $itemAmount = $ordTxn['item_amount'];
    }

    if ($ordTxn['paid_amount'] != null) {
        $paidAmount = $ordTxn['paid_amount'];
    }
}



$buyer          = $customer->getCustomerData($showOrder['clientUserId']);
$customerName   = $buyer[0][5].' '.$buyer[0][6];

?>


<!DOCTYPE HTML>
<html lang="en">

<head>
    <meta name="robots" content="noindex,nofollow">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My Order Details - <?php echo COMPANY_S; ?></title>
    <link rel="shortcut icon" href="<?php echo FAVCON_PATH?>" type="image/png" />
    <link rel="apple-touch-icon" href="<?php echo FAVCON_PATH?>" />

    <!-- Plugins Files -->
    <link href="<?= URL ?>/plugins/bootstrap-5.2.0/css/bootstrap.css" rel="stylesheet" />
    <?php require_once ROOT_DIR.'/plugins/font-awesome/fontawesome.php'?>

    <!-- Custom CSS -->
    <link href="<?= URL ?>/css/style.css" rel='stylesheet' type='text/css' />
    <link href="<?= URL ?>/css/dashboard.css" rel='stylesheet' type='text/css' />
    <link href="<?= URL ?>/css/my-orders.css" rel='stylesheet' type='text/css' />
    <link href="<?= URL ?>/css/order-list.css" rel='stylesheet' type='text/css' />
    <script src="<?= URL ?>/plugins/sweetalert/sweetalert2.all.min.js" type="text/javascript"></script>

</head>

<body>
<?php

if (isset($_POST['changesReq'])) {

    // $contentId              = $_POST['content-id'];
    $_DIFFARR             = array();

    $clientContentTitle     = trim($_POST['clientContentTitle']);

    $clientAnchorText       = trim($_POST['clientAnchorText']);
    $clientTargetUrl        = trim($_POST['clientTargetUrl']);

    $refAnchor1             = trim($_POST['reference-anchor1']);
    $refUrl1                = trim($_POST['reference-url1']);
    $refAnchor2             = trim($_POST['reference-anchor2']);
    $refUrl2                = trim($_POST['reference-url2']);

    $clientRequirement      = trim($_POST['clientRequirement']);

    if ($clientAnchorText !== $clientAnchor) {
        
        array_push($_DIFFARR, array($clientAnchor, $clientAnchorText));
    }

    if ($clientTargetUrl !== $clientURL) {
        
        array_push($_DIFFARR, array($clientURL, $clientTargetUrl));
    }

    if ($refAnchor1 !== $referenceAnchor1) {
        
        array_push($_DIFFARR, array($referenceAnchor1, $refAnchor1));
    }

    if ($refUrl1 !== $referenceURL1) {

        array_push($_DIFFARR, array($referenceURL1, $refUrl1));
    }

    if ($refAnchor2 !== $referenceAnchor2) {
        
        array_push($_DIFFARR, array($referenceAnchor2, $refAnchor2));
    }

    if ($refUrl2 !== $referenceURL2) {
        
        array_push($_DIFFARR, array($referenceURL2, $refUrl2));
    }

    $orderStatus        = PROCESSINGCODE; // Processesing

    $updatedTitle = $ContentOrder->titleUpdate($orderId, $clientContentTitle);

    $updatedLinks = $ContentOrder->updateHyperLinks($orderContentId, $clientAnchorText, $clientTargetUrl, $refAnchor1, $refUrl1, $refAnchor2, $refUrl2);


    // $showOrder  = $ContentOrder->clientOrderById($orderId);
    $updated    = $ContentOrder->ClientOrderOrderUpdate($orderId, $orderStatus, 'changesReq', $showOrder['changesReq']+1 );

    $updateResponse  = [$updatedTitle, $updatedLinks, $updated];

    if (!in_array(false, $updateResponse) || !in_array(0, $updateResponse)) {
        // send mail
        $toName = $buyer[0][5];
        $toMail = $buyer[0][3];
        $domain = $showOrder['clientOrderedSite'];

        require_once ROOT_DIR."/mail-sending/order-change-request-mail.php";
        
        $statusUpdated = $ContentOrder->addOrderUpdate($orderId, ORD_CNG_REQ, '', $cusId);
        $Notifications->addNotification(ORD_UPDATE, ORD_CNG_REQ, ORD_CNG_REQ_M, $reference_link, $cusId);

        if ($statusUpdated) {        
    ?>
    <script>
    Swal.fire({
        title: 'Requested!',
        text: 'Changes Request Sended ',
        icon: 'success',
        confirmButtonText: 'Continue'
    }).then((result) => {
        if (result.isConfirmed) {
            // Reload the page
            window.location = window.location.href;
        }
    });
    </script>
    <?php
        }
    }

}

?>

    <div id="home">
        <!-- header -->
        <?php  require_once "components/navbar.php" ?>
        <!-- header end -->
        <div class="edit_profile">
            <div class="container-fluid">
                <div class=" display-table">
                    <div class="row ">
                        <div class="col-md-3 col-sm-12 hidden-xs display-table-cell v-align" id="navigation">

                            <!--*****************TOOGLE OFFCANVAS FOR SIDEBAR ONLY IN MOBILE TAB ******************* -->
                            <div class="extra-added-butn-for-mob-tab ">
                                <button class="sidebar-icon-btn " type="button" data-bs-toggle="offcanvas"
                                    data-bs-target="#staticBackdrop" aria-controls="staticBackdrop">
                                    <i class="fa-solid fa-angles-right"></i>
                                </button>
                                <div class="offcanvas offcanvas-start " data-bs-scroll="true" data-bs-backdrop="static"
                                    tabindex="-1" id="staticBackdrop" aria-labelledby="staticBackdropLabel">
                                    <div class="offcanvas-header">
                                        <h5 class="offcanvas-title" id="staticBackdropLabel"></h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="offcanvas-body">
                                        <?php include("dashboard-inc.php");?>
                                        <hr class="myhrline">
                                    </div>
                                </div>
                            </div>

                            <div class="client_profile_dashboard_left">
                                <?php include("dashboard-inc.php");?>
                                <hr class="myhrline">
                            </div>
                            <!--***********TOOGLE OFFCANVAS FOR SIDEBAR ONLY IN MOBILE TAB ******************* -->
                        </div>
                        <div class="col-md-9  ps-md-0 display-table-cell v-align extra-mrgin-top-for-mtab">
                            <div class="div-border-css mt-3 mt-lg-0">
                                <!-- Details section Start  -->
                                <div class="p-3 p-kage-de-tails">
                                    <div class="row">
                                        <!-- Order Details Start -->
                                        <div class="col-md-6 ">
                                            <h5 class="pkage-title border-bottom pb-2">
                                                Order Details: <span
                                                    class="badge text-bg-primary"><?= $orderStatusName; ?></span>
                                            </h5>
                                            <h5 class="pkage-headline text-lowercase pt-2">
                                                <?php echo $showOrder['clientOrderedSite']; ?></h5>
                                            <ul class="listing-adrs">
                                                <li> Order Id : <?= "#".$orderId; ?></li>

                                                <?php
                                                if ($transectionId != null) {
                                                    echo '<li> Transection Id : '.$transectionId.'</li>';
                                                }
                                                
                                                if ($orderStatusCode != INCOMPLETECODE) {
                                                ?>
                                                <li> Item Price : <?= CURRENCY.$itemAmount ?></li>
                                                <li> Paid Amount : <?= CURRENCY.$paidAmount ?></li>
                                                <li> Transection Mode : <?= $txnMode; ?></li>
                                                <?php
                                                }
                                                ?>

                                                <?php
                                                if ($txnStatus  != null) {
                                                    echo '<li> Payment Status : '.$txnStatusName.'</li>';
                                                }
                                                ?>
                                                <li> Date : <?= $orderDate; ?></li>
                                            </ul>
                                        </div>
                                        <!-- Order Details End -->


                                        <!-- Customer details Start  -->
                                        <div class="col-md-6 pkagerow">
                                            <h5 class="pkage-title border-bottom pb-2">Customer Details:</h5>
                                            <h5 class="pkage-headline pt-2 pb-1">
                                                <?=  $customerName ?></h5>

                                            <ul class="listing-adrs">
                                                <li> Email : <?php echo $buyer[0][3]; ?></li>
                                                <li> <?php echo $buyer[0][24]; ?>,
                                                    <?php echo $buyer[0][29]; ?></li>
                                                <li>
                                                    <?php
                                                $country = $Location->getCountyById($buyer[0][30]);
                                                echo $country['name'];
                                                ?>
                                                </li>
                                            </ul>
                                        </div>
                                        <!-- Customer details End -->

                                    </div>
                                </div>
                                <!-- Details section End -->

                                <?php
                                $delivered = false;
                                $fieldStatus = '';
                                
                                $validStatusCodes = [ORDEREDCODE, PROCESSINGCODE, INCOMPLETECODE];
                                if (in_array($orderStatusCode, $validStatusCodes)) {
                                    $fieldStatus = '';
                                }
                                
                                if($orderStatusCode == FAILEDCODE || $orderStatusCode == DELIVEREDCODE || $orderStatusCode == COMPLETEDCODE ){
                                    $fieldStatus = 'disabled';
                                    $delivered = true;
                                }
                                ?>

                                <?php if ($delivered){ ?>

                                <div class="delivered_sec container mt-4">
                                    <h3>Your ordered article link is: </h3>
                                    <div class="text-wrap">
                                        <input type="text" class="form-control" id="articleLink"
                                            value="<?= rawurldecode($showOrder['deliveredLink']) ?>">
                                        <div onclick="copyText('articleLink')" class="clipboard icon"></div>
                                    </div>
                                </div>


                                <?php if ( $orderStatusCode == DELIVEREDCODE ):?>
                                <div class="btn_bx text-center mt-3">
                                    <button class="btn btn-sm btn-primary"
                                        onclick="finishedOrder(<?= $orderId ?>, <?= $cusId ?>)">Finished</button>
                                    <button class="btn btn-sm btn-info" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal" onclick="changeRequest(<?= $orderId ?>)">Change
                                        Request</button>
                                </div>
                                <?php endif; ?>


                                <?php if( $orderStatusCode == COMPLETEDCODE):
                                        $ordUpdate = $ContentOrder->lastUpdate($orderId);
                                        
                                        $updateZoneDate              = $DateUtil->timeZoneConvert($ordUpdate['updated_on']);
                                        $updateDate                  = $DateUtil->dateTimeText($updateZoneDate);

                                        echo '
                                        <div class="text-center">
                                            <p class="text-center fw-bold my-3">Order Completed on '.$updateDate.'</p>';

                                            $updateDate = date("Y-m-d h:i", strtotime($updateZoneDate));
                                            $days = 2;
                                            $dueDate = strtotime("+".$days."days", strtotime($updateDate));
                                            $dueDate = date("Y-m-d h:ia", $dueDate);
                                            $dueDate = $DateUtil->dateTimeText($dueDate);
                                            

                                            if ($ordTxn['transection_status'] == PENDINGCODE) {
                                            echo '<small class="d-block text-capitalize text-danger fw-bold my-1">Pay Before
                                                '.$dueDate.'</small>';
                                            }


                                            if ($ordTxn['transection_status'] == PENDINGCODE) {
                                            echo '<a class="btn btn-primary text-center"
                                                href="payments/paylater-pay-now.php?order='.base64_encode($orderId).'">Pay
                                                Now</a>';
                                            }

                                            echo '
                                        </div>';
                                        endif;

                                }
                                ?>
                                <form action="" method="post" class="mt-4" id="orderForm">
                                    <div class="row px-3" id="row1">
                                        <?php
                                        // cheacking if the content is avilable 
                                        if ($orderContent != false) {
                                        ?>
                                        <!-- ================================================================ -->
                                        <!-- ================================================================ -->

                                        <div class="form-group">

                                            <div class="form-group">
                                                <label for="clientContentTitle">
                                                    <h5>Title</h5>
                                                </label>
                                                <input type="text" class="form-control"
                                                    placeholder="Enter the article title" name="clientContentTitle"
                                                    id="clientContentTitle" value="<?= $orderContent['title']?>">
                                            </div>
                                        </div>
                                        <!-- ================================================================ -->
                                        <!-- ================================================================ -->

                                        <div class="form-group">
                                            <?php
                                                if ($orderContent['content_type'] == '') {
                                                    echo '<p class="bg_mustard text-light rounded fw-bold py-2 ps-2">Content Wll Be Uploded By ' . COMPANY_S.'</p>';
                                                }elseif ($orderContent['content_type'] == 'doc') {
                                                ?>
                                            <div class="bg-primary rounded d-flex justify-content-between w-100 p-2">
                                                <span
                                                    class="fw-bold text-light"><?= basename($orderContent['path']) ?></span>

                                                <a href="content-download.php?data='<?=base64_encode(urlencode($orderId))?>"
                                                    target="_blank" rel="noopener noreferrer"><span
                                                        class="badge text-bg-info text-light">Download <i
                                                            class="fa-sharp fa-regular fa-file-arrow-down"></i></span></a>
                                            </div>
                                            <?php
                                                }
                                            ?>
                                        </div>

                                        <!-- ================================================================ -->
                                        <!-- ================================================================ -->

                                        <!-- hyperLinks section start -->
                                        <div class="mt-3" id="hyperLinks">
                                            <div class="row">

                                                <div class="col-md-6 d-none d-md-block">
                                                    <h5>Anchor Text</h5>
                                                </div>

                                                <div class="col-md-6 d-none d-md-block">
                                                    <h5>Target Url</h5>
                                                </div>

                                                <h5 class="d-md-none">Anchor Text And URL</h5>

                                            </div>

                                            <div class="row mb-3 mb-md-0">
                                                <div class="col-md-6 mb-2">
                                                    <input type="text" class="form-control"
                                                        placeholder="Enter the anchor text for client url"
                                                        name="clientAnchorText"
                                                        value="<?= $clientAnchor?>">
                                                </div>

                                                <div class="col-md-6 mb-2">
                                                    <input type="text" class="form-control"
                                                        aria-describedby="Target Url" placeholder="Enter the client url"
                                                        name="clientTargetUrl" value="<?= $clientURL?>">
                                                </div>
                                            </div>
                                            <div class="row mb-3 mb-md-0">
                                                <div class="col-md-6 mb-2">
                                                    <input type="text" class="form-control"
                                                        placeholder="Enter the reference anchor text"
                                                        name="reference-anchor1"
                                                        value="<?= $referenceAnchor1 ?>">
                                                </div>

                                                <div class="col-md-6 mb-2">
                                                    <input type="text" class="form-control"
                                                        placeholder="Enter the reference URL" name="reference-url1"
                                                        value="<?= $referenceURL1 ?>">
                                                </div>
                                            </div>
                                            <div class="row mb-3 mb-md-0">
                                                <div class="col-md-6 mb-2">
                                                    <input type="text" class="form-control"
                                                        placeholder="Enter the reference anchor text"
                                                        name="reference-anchor2"
                                                        value="<?= $referenceAnchor2?>">
                                                </div>

                                                <div class="col-md-6 mb-2">
                                                    <input type="text" class="form-control"
                                                        aria-describedby="Target Url"
                                                        placeholder="Enter the reference URL" name="reference-url2"
                                                        value="<?= $referenceURL2 ?>">
                                                </div>
                                            </div>

                                        </div>
                                        <!-- hyperLinks section ended -->

                                        <!-- ================================================================ -->
                                        <!-- ================================================================ -->

                                        <div class="form-group mt-3">
                                            <label for="special-requirements">
                                                <h5>Special requirements</h5>
                                                <p class="caution-abouts">If necessary, Write all your task requirements
                                                    here, e. g., content
                                                    requirements, Category, deadline, necessity of disclosure,
                                                    preferences
                                                    regarding content placement, etc.</p>
                                            </label>
                                            <textarea class="form-control" id="special-requirements" rows="6"
                                                name="clientRequirement" <?php echo $fieldStatus; ?>><?php
                                            if ($showOrder['clientRequirement'] != null ) {
                                                echo $showOrder['clientRequirement'];
                                            }
                                            ?></textarea>
                                        </div>
                                        <?php
                                        }
                                        // content is avilablity cheacking end 
                                        ?>

                                        <!-- ================================================================ -->
                                        <!-- ================================================================ -->

                                        <div class="form-group">
                                            <!-- <input type="number" id="tid" name="content-id"
                                                value="<?= $orderContentId; ?>"> -->
                                            <input type="number" id="tid" name="order-id" value="<?= $orderId; ?>">
                                            <input type="number" class="d-none" id="formAction"
                                                name="updateBeforeProcess">
                                        </div>
                                        <div class="text-center">

                                            <?php
                                            if($orderStatusCode == ORDEREDCODE){
                                                echo '<button class="btn btn-primary" id="updateButton" type="button" >Update</button>';
                                            }

                                            if($orderStatusCode == PROCESSINGCODE){
                                                echo '<button class="btn apply-button" name="changesReq" type="submit">Request for Changes</button>';
                                            }
                                            
                                            if($orderStatusCode == HOLDCODE){
                                                echo '<p class="text-light bg-danger">'.HOLD.' Order\'s Contents can\'t be uploded</p>';
                                            }

                                            if($orderStatusCode == INCOMPLETECODE){
                                                echo '<a class="btn btn-primary" href="cheakout/order-summary.php?order='.$_GET['order'].'">Complete The Order now</a>';
                                            }

                                            if($orderStatusCode == REJECTEDCODE){
                                                echo '<p class="text-light bg-danger py-2">This Order Has Been '.REJECTED.'</p>';
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </form>


                            </div>
                        </div>
                        <!--Row end-->
                    </div>
                </div>
                <!-- //end display table-->
            </div>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form action="ajax/order-update.ajax.php" method="POST">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <input type="hidden" name="return-page" value="<?= $Utility->currentUrl()?>">
                            <input type="hidden" name="order-id" value="<?= $orderId?>">
                            <input type="hidden" name="customer-id" value="<?= $cusId?>">
                            <div class="modal-body" id="update-modal-body">

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" id="modal-action-btn">Save
                                    changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


        </div>
        <script src="<?= URL ?>/plugins/jquery-3.6.0.min.js"></script>
        <script src="<?= URL ?>/plugins/bootstrap-5.2.0/js/bootstrap.js" type="text/javascript"></script>
        <script src="<?= URL ?>/plugins/sweetalert/sweetalert2.all.min.js" type="text/javascript"></script>
        <script src="<?= URL ?>/js/customerSwitchMode.js"></script>
        <script src="<?= URL ?>/js/script.js"></script>
        <script src="<?= URL ?>/js/ajax.js" type="text/javascript"></script>
        <script>
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
                        url: "ajax/order-update.ajax.php",
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


        const changeRequest = (orderId) => {

            document.getElementById('modal-action-btn').name = 'changes-request';
            document.getElementById('update-modal-body').innerHTML = `<p class="text-primary fw-bold">What to change?</p>
                                <textarea class="form-control"  name="changes-req" rows="6" required></textarea>`;

        }

        document.getElementById("updateButton").addEventListener("click", function() {
            Swal.fire({
                title: 'Are you sure?',
                text: "Update Title and Hyperlinks ?",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, Update'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('formAction').value = 'updateBeforeProcess';
                    event.preventDefault();
                    // document.getElementById('orderForm').submit();
                    $.ajax({
                        url: "ajax/order-update.ajax.php",
                        type: "POST",
                        data: $('#orderForm').serialize(),
                        success: function(data) {
                            console.log(data);
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

                } else {
                    return false;
                }
            })
        });
        // const formConfirm = () => {
        //     Swal.fire({
        //         title: 'Are you sure?',
        //         text: "Order Completed!",
        //         icon: 'question',
        //         showCancelButton: true,
        //         confirmButtonColor: '#3085d6',
        //         cancelButtonColor: '#d33',
        //         confirmButtonText: 'Yes, Completed'
        //     }).then((result) => {
        //         if (result.isConfirmed) {
        //             document.getElementById('orderForm').submit();

        //         } else {
        //             return false;
        //         }
        //     })
        // }
        </script>

</body>

</html>