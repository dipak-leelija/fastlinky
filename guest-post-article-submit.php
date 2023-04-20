<?php
session_start();
require_once __DIR__ . "/includes/constant.inc.php";
require_once __DIR__ . "/includes/order-constant.inc.php";
require_once ROOT_DIR . "/_config/dbconnect.php";

require_once ROOT_DIR . "/classes/customer.class.php";
require_once ROOT_DIR . "/classes/content-order.class.php";
require_once ROOT_DIR . "/classes/orderStatus.class.php";
require_once ROOT_DIR . "/classes/location.class.php";
require_once ROOT_DIR . "/classes/date.class.php";
require_once ROOT_DIR . "/classes/utility.class.php";
require_once ROOT_DIR . "/classes/utilityMesg.class.php";

/* INSTANTIATING CLASSES */
$customer		= new Customer();
$ContentOrder   = new ContentOrder();
$OrderStatus    = new OrderStatus();
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

$thisPage =  $Utility->currentUrl();
$updatedBy =  $_SESSION[USR_SESS];

?>


<!DOCTYPE HTML>
<html lang="zxx">

<head>
    <meta name="robots" content="noindex,nofollow">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My Order Details - <?php echo COMPANY_S; ?></title>
    <link rel="shortcut icon" href="<?php echo FAVCON_PATH?>" type="image/png" />
    <link rel="apple-touch-icon" href="<?php echo FAVCON_PATH?>" />

    <!-- Bootstrap Core CSS -->
    <link href="plugins/bootstrap-5.2.0/css/bootstrap.css" rel='stylesheet' type='text/css' />
    <!-- font-awesome icons -->
    <!-- <link href="plugins/fontawesome-6.1.1/css/all.css" rel='stylesheet' type='text/css' /> -->
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.4.0/css/all.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.4.0/css/sharp-solid.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.4.0/css/sharp-regular.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.4.0/css/sharp-light.css">

    <!-- Custom CSS -->
    <link href="css/style.css" rel='stylesheet' type='text/css' />
    <link href="css/dashboard.css" rel='stylesheet' type='text/css' />
    <link href="css/my-orders.css" rel='stylesheet' type='text/css' />
    <link href="css/order-list.css" rel='stylesheet' type='text/css' />

    <!--//webfonts-->
    <link href="//fonts.googleapis.com/css?family=Montserrat:400,500,600,700,900" rel="stylesheet">
    <script src="plugins/sweetalert/sweetalert2.all.min.js" type="text/javascript"></script>

</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">

    <?php

if (isset($_POST['articleSubmit'])) {
    // print_r($_REQUEST);
    // exit;

    $contentId              = $_POST['content-id'];

    $clientContentTitle     = $_POST['clientContentTitle'];

    $clientAnchorText       = $_POST['clientAnchorText'];
    $clientTargetUrl        = $_POST['clientTargetUrl'];

    $refAnc1                = $_POST['reference-anchor1'];
    $refUrl1                = $_POST['reference-url1'];
    $refAnc2                = $_POST['reference-anchor2'];
    $refUrl2                = $_POST['reference-url2'];


    $clientRequirement  = $_POST['clientRequirement'];

    $titleUpdate = $ContentOrder->titleUpdate($orderId, $clientContentTitle);
    $LinksUpdate = $ContentOrder->updateHyperLinks($contentId, $clientAnchorText, $clientTargetUrl, $refAnc1, $refUrl1, $refAnc2, $refUrl2);
    $reqUpdate   = $ContentOrder->orderSingleDataUpdate($orderId, 'clientRequirement', $clientRequirement, $updatedBy);

    $checkArray = array($titleUpdate, $LinksUpdate, $reqUpdate);
    if (!in_array(false, $checkArray) || !in_array(0, $checkArray)) {
       ?>
    <script>
    Swal.fire({
        title: 'Updated!',
        text: 'Contents Updated',
        icon: 'success',
        confirmButtonText: 'Continue'
    })
    </script>
    <?php
    }
    // exit;
    // if (isset($_POST['clientContent'])) {
        
    //     $clientContent      = $_POST['clientContent'];

    //     $updated = $ContentOrder->ClientOrderContentUpdate($orderId, $clientAnchorText, $clientTargetUrl, $clientContent, $clientRequirement);

    //     if ($updated) {
    //         $statusUpdated = $ContentOrder->addOrderUpdate($orderId, 'Content Updated', '', $cusDtl[0][0]);

    // ?>
    // <script>
    //         Swal.fire({
    //             title: 'Updated!',
    //             text: 'Contents Updated',
    //             icon: 'success',
    //             confirmButtonText: 'Continue'
    //         })
    //         
    </script>
    // <?php
    //     }
    // }else {
    //         $updated = $ContentOrder->ClientOrderContentUpdate($orderId, $clientAnchorText, $clientTargetUrl, '', $clientRequirement);

    //         if ($updated) {
    //         $statusUpdated = $ContentOrder->addOrderUpdate($orderId, 'Content Updated', '', $cusDtl[0][0]);

    // ?>
    // <script>
    // Swal.fire({
    //     title: 'Updated!',
    //     text: 'Contents Updated',
    //     icon: 'success',
    //     confirmButtonText: 'Continue'
    // })
    // 
    </script>
    // <?php
    //         }
    // }

}


if (isset($_POST['changesReq'])) {

    // $orderStatus    = 6; // Hold 

    $orderId            = $_POST['orderId'];
    $clientContent      = $_POST['clientContent'];
    $clientTargetUrl    = $_POST['clientTargetUrl'];
    $clientAnchorText   = $_POST['clientAnchorText'];
    $clientRequirement  = $_POST['clientRequirement'];

    $orderStatus        = 3; // Processesing

    $updated = $ContentOrder->ClientOrderContentUpdate($orderId, $clientAnchorText, $clientTargetUrl, $clientContent, $clientRequirement);
    
    $showOrder  = $ContentOrder->clientOrderById($orderId);
    $ContentOrder->ClientOrderOrderUpdate($orderId, $orderStatus, 'changesReq', $showOrder[0]['changesReq']+1 );

    if ($updated) {
        $statusUpdated = $ContentOrder->addOrderUpdate($orderId, 'Changes Request', '', $cusDtl[0][0]);
        if ($statusUpdated) {        
    ?>
    <script>
    Swal.fire({
        title: 'Requested!',
        text: 'Changes Request Sended ',
        icon: 'success',
        confirmButtonText: 'Continue'
    })
    </script>
    <?php
        }
    }

}

$txnStatus  ='';
$txnMode    = '';
$itemAmount ='';
$paidAmount ='';
$transectionId  =   '';

#####################################################################


$showOrder                  = $ContentOrder->clientOrderById($orderId);
    $orderStatusCode        = $showOrder[0]['order_status'];
    $statusName             = $OrderStatus->singleOrderStatus($orderStatusCode);
        $orderStatusName    = $statusName[0]['orders_status_name'];

    $orderDate              = $DateUtil->dateTimeText($showOrder[0]['added_on']);




$orderContent   = $ContentOrder->getOrderContent($orderId);
    $orderContentId = $orderContent['id'];
$contentLink    = $ContentOrder->getContentHyperLinks($orderContentId);

$ordTxn         = $ContentOrder->showTransectionByOrder($orderId);
if ($ordTxn != false) {
    $txnMode            = $ordTxn['transection_mode'];
    
    if ($ordTxn['transection_id'] != null) {
        $transectionId = $ordTxn['transection_id'];
    }

    if ($ordTxn['transection_status'] != null) {
        $txnStatus = $ordTxn['transection_status'];
    }

    if ($ordTxn['item_amount'] != null) {
        $itemAmount = $ordTxn['item_amount'];
    }

    if ($ordTxn['paid_amount'] != null) {
        $paidAmount = $ordTxn['paid_amount'];
    }
}



$buyer          = $customer->getCustomerData($showOrder[0]['clientUserId']);
$customerName   = $buyer[0][5].' '.$buyer[0][6];

?>

    <div id="home">
        <!-- header -->
        <?php  require_once "partials/navbar.php" ?>
        <?php //include 'header-user-profile.php'?>

        <!-- //header -->
        <!-- banner -->
        <div class="edit_profile">
            <div class="container-fluid">
                <div class=" display-table">
                    <div class="row ">
                        <!--Row start-->
                        <div class="col-md-3 hidden-xs display-table-cell v-align" id="navigation">

                            <div class="client_profile_dashboard_left">
                                <?php include("dashboard-inc.php");?>
                                <hr class="myhrline">
                            </div>

                        </div>
                        <div class="col-md-9 ps-md-0 display-table-cell v-align ">
                            <div class="div-border-css">
                                <!-- Details section Start  -->
                                <div class="p-3 p-kage-de-tails">
                                    <div class="row">
                                        <!-- Order Details Start -->
                                        <div class="col-md-6 ">
                                            <h5 class="pkage-title border-bottom pb-2">
                                                Order Details: <span
                                                    class="badge text-bg-primary"><?= $orderStatusName; ?></span>
                                            </h5>
                                            <h5 class="pkage-headline pt-2">
                                                <?php echo $showOrder[0]['clientOrderedSite']; ?></h5>
                                            <ul class="listing-adrs">
                                                <li> Order Id : <?= "#".$orderId; ?></li>

                                                <?php
                                                if ($transectionId != null) {
                                                    echo '<li> Transection Id : '.$transectionId.'</li>';
                                                }
                                                
                                                if ($orderStatusCode != INCOMPLETECODE) {
                                                ?>
                                                <li> Item Amount : <?= CURRENCY.$itemAmount ?></li>
                                                <li> Paid Amount : <?= CURRENCY.$paidAmount ?></li>
                                                <li> Transection Mode : <?= $txnMode; ?></li>
                                                <?php
                                                }
                                                ?>

                                                <?php
                                                if ($txnStatus  != null) {
                                                    echo '<li> Payment Status : '.$txnStatus.'</li>';
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
                                
                                // if($orderStatusCode == ORDEREDCODE || $orderStatusCode == PROCESSINGCODE || $orderStatusCode == INCOMPLETECODE){
                                //     $fieldStatus = '';
                                // }
                                $validStatusCodes = [ORDEREDCODE, PROCESSINGCODE, INCOMPLETECODE];
                                if (in_array($orderStatusCode, $validStatusCodes)) {
                                    $fieldStatus = '';
                                }
                                
                                if($orderStatusCode == FAILEDCODE || $orderStatusCode == COMPLETEDCODE ){
                                    $fieldStatus = 'disabled';
                                    $delivered = true;
                                }

                                if ($delivered) {
                                    echo '<div class="delivered_sec container mt-4">
                                            <h3>Your ordered article link is: </h3>
                                            <div class="text-wrap">
                                                    <input type="text" class="form-control" id="articleLink" value="'. rawurldecode($showOrder [0]['deliveredLink']).'">
                                                    <div onclick="copyText(\'articleLink\')" class="clipboard icon"></div>
                                                </div>
                                            </div>';

                                        if ( $showOrder[0]['clientOrderStatus'] != 5 ) {
                                            echo '
                                            <div class="btn_bx text-center mt-3">
                                                <button class="btn btn-sm btn-primary" onclick="finishedOrder('.$orderId.')">Finished</button>
                                                <button class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="changeRequest('.$orderId.')">Change Request</button>
                                            </div>';
                                        }else {
                                            $ordUpdate = $ContentOrder->lastUpdate($orderId);
                                            $updateDate = date('l jS \of F Y h:i:s A', strtotime($ordUpdate['updated_on']));
                                            echo '
                                                <div class="text-center">
                                                    <p class="text-center fw-bold my-3">Order Completed on '.$updateDate.'</p>';

                                                    $dueDate = date_create($ordUpdate['updated_on']);
                                                    date_add($dueDate, date_interval_create_from_date_string("2 days"));
                                                    $dueDate = date_format($dueDate, "l jS \of F Y h:i:s A");

                                                    
                                            if ($ordTxnd['transection_status'] == "Pay Later") {
                                                echo '<small class="d-block text-danger fw-bold my-1">Pay Before '.$dueDate.'</small>';
                                            }
                                            
                                            
                                            if ($ordTxn['transection_status'] == "Pay Later") {
                                                echo '<a class="btn btn-primary text-center" href="payments/paylater-pay-now.php?order='.base64_encode($orderId).'">Pay Now</a>';
                                            }
                                            
                                            echo '</div>';
                                        }

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
                                                    echo 'Content Wll Be Uploded By ' . COMPANY_S;
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

                                                <div class="col-md-6">
                                                    <h5>Anchor Text</h5>
                                                </div>

                                                <div class="col-md-6">
                                                    <h5>Target Url</h5>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6 mb-2">
                                                    <input type="text" class="form-control"
                                                        placeholder="Enter the anchor text for client url"
                                                        name="clientAnchorText"
                                                        value="<?= $contentLink['client_anchor']?>">
                                                </div>

                                                <div class="col-md-6 mb-2">
                                                    <input type="text" class="form-control"
                                                        aria-describedby="Target Url" placeholder="Enter the client url"
                                                        name="clientTargetUrl" value="<?= $contentLink['client_url']?>">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6 mb-2">
                                                    <input type="text" class="form-control"
                                                        placeholder="Enter the reference anchor text"
                                                        name="reference-anchor1"
                                                        value="<?= $contentLink['reference_anchor1']?>">
                                                </div>

                                                <div class="col-md-6 mb-2">
                                                    <input type="text" class="form-control"
                                                        placeholder="Enter the reference URL" name="reference-url1"
                                                        value="<?= $contentLink['reference_url1']?>">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6 mb-2">
                                                    <input type="text" class="form-control"
                                                        placeholder="Enter the reference anchor text"
                                                        name="reference-anchor2"
                                                        value="<?= $contentLink['reference_anchor2']?>">
                                                </div>

                                                <div class="col-md-6 mb-2">
                                                    <input type="text" class="form-control"
                                                        aria-describedby="Target Url"
                                                        placeholder="Enter the reference URL" name="reference-url2"
                                                        value="<?= $contentLink['reference_url2']?>">
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
                                            if ($showOrder[0]['clientRequirement'] != null ) {
                                                echo $showOrder[0]['clientRequirement'];
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
                                            <input type="text" class="form-control" id="tid" name="content-id"
                                                value="<?= $orderContentId; ?>">
                                        </div>
                                        <div class="text-center">

                                            <?php
                                            if($orderStatusCode == ORDEREDCODE){
                                                
                                                echo '<button class="btn btn-primary" name="articleSubmit" id="updateButton" type="button" >Update</button>';
                                            }

                                            if($orderStatusCode == PROCESSINGCODE){
                                                
                                                echo '<button class="btn apply-button" name="changesReq" type="submit">Request for Changes</button>';
                                            
                                            }
                                            
                                            if($orderStatusCode == HOLDCODE){
                                                
                                                echo '<p class="text-light bg-danger">'.$statusName[0][1].' Order\'s Contents can\'t be uploded</p>';
                                            
                                            }

                                            if($orderStatusCode == INCOMPLETECODE){
                                                
                                                echo '<a class="btn btn-primary" >Complete The Order now</a>';
                                            
                                            }

                                            // else{
                                            //     if ($delivered) {
                                            //         echo '<p class="text-light bg-primary fw-bold fs-4"> Order '.$statusName[0][1].' </p>';
                                            //     }else{
                                            //         echo '<p class="text-light bg-danger">'.$statusName[0][1].' Order\'s Contents can\'t be uploded</p>';
                                            //     }
                                            // }
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
                            <input type="hidden" name="return-page" value="<?php echo $Utility->currentUrl()?>">
                            <input type="hidden" name="order-id" value="<?php echo $orderId?>">
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
        <script src="plugins/jquery-3.6.0.min.js"></script>
        <script src="plugins/bootstrap-5.2.0/js/bootstrap.js" type="text/javascript"></script>
        <script src="plugins/sweetalert/sweetalert2.all.min.js" type="text/javascript"></script>
        <!-- <script src="plugins/data-table/simple-datatables.js"></script> -->
        <!-- <script src="plugins/tinymce/tinymce.js"></script> -->
        <!-- <script src="plugins/main.js"></script> -->
        <script src="js/customerSwitchMode.js"></script>
        <script src="js/script.js"></script>
        <script src="js/ajax.js" type="text/javascript"></script>
        <script>
        const finishedOrder = (ordId) => {
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
                            ordId: ordId
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
                    document.getElementById('orderForm').submit();

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