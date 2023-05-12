<?php
require_once "includes/constant.inc.php";
session_start();

require_once ROOT_DIR."/_config/dbconnect.php";

require_once ROOT_DIR."/classes/date.class.php";
require_once ROOT_DIR."/classes/error.class.php";
require_once ROOT_DIR."/classes/search.class.php";
require_once ROOT_DIR."/classes/customer.class.php";
require_once ROOT_DIR."/classes/login.class.php";
require_once ROOT_DIR."/classes/domain.class.php";

require_once ROOT_DIR."/classes/blog_mst.class.php";
require_once ROOT_DIR."/classes/utility.class.php";
require_once ROOT_DIR."/classes/utilityMesg.class.php";
require_once ROOT_DIR."/classes/content-order.class.php";
require_once ROOT_DIR."/classes/orderStatus.class.php";


/* INSTANTIATING CLASSES */
$error 			= new Error();
$search_obj		= new Search();
$customer		= new Customer();
$logIn			= new Login();
$domain			= new Domain();

$blogMst		= new BlogMst();
$ContentOrder   = new ContentOrder();
$OrderStatus    = new OrderStatus();

$utility		= new Utility();
$dateUtil      	= new DateUtil();
$uMesg 			= new MesgUtility();
######################################################################################################################
$typeM		= $utility->returnGetVar('typeM','');
//user id
$cusId		= $utility->returnSess('userid', 0);
$cusDtl		= $customer->getCustomerData($cusId);

$currentPage    = $utility->setCurrentPageSession();
require_once ROOT_DIR."/includes/check-seller-login.inc.php";


if (!isset($_GET['id'])) {
	header("Location: dashboard.php");
}

$orderId = base64_decode($_GET['id']);

if (isset($_POST['reject-order'])) {
                                
    $orderStatus    = 10; // Rejected
    $reason        = $_POST['cancellation-reason'];

    $rejected = $ContentOrder->ClientOrderOrderUpdate($orderId, $orderStatus, '', $reason);
    if ($rejected) {

        $updated = $ContentOrder->addOrderUpdate($_POST['order-id'], 'Rejected', $reason, $cusDtl[0][0]);
        if ($updated) {
            $uMesg->showSuccessT('success', 0, '', ''.$currentPage.'', "Order Rejected", 'SUCCESS');
        }
    }
}

if (isset($_POST['accept-order'])) {
    
    $orderStatus    = 3; // Processing 

    $accepted = $ContentOrder->ClientOrderOrderUpdate($orderId, $orderStatus, '', '');
    
    if ($accepted) {
        $updated = $ContentOrder->addOrderUpdate($orderId, 'Accepted', 'We are processing the order', $cusDtl[0][0]);
        if ($updated) {
            $uMesg->showSuccessT('success', 0, '', ''.$currentPage.'', "Order Accepted", 'SUCCESS');
        }
    }
}

if (isset($_POST['delivered'])) {
    $orderStatus    = 1; // Deliverd 
    $deliveredLink  = $_POST['post-link'];
    $deliveredLink  = rawurlencode($deliveredLink);

    $delivered = $ContentOrder->ClientOrderOrderUpdate($orderId, $orderStatus, 'deliveredLink', $deliveredLink);
    if ($delivered) {
        $updated = $ContentOrder->addOrderUpdate($orderId, 'Delivered', 'Article is delivered', $cusDtl[0][0]);
        if ($updated) {
            $uMesg->showSuccessT('success', 0, '', ''.$currentPage.'', "Order Delivered", 'SUCCESS');
        }
    }
}

$order = $ContentOrder->clientOrderById($orderId);
if (count($order) < 1) {
    header("Location: my-guest-post.php");
}

$showOrder  = $ContentOrder->clientOrderById($orderId);
$ordTxn = $ContentOrder->showTransectionByOrder($orderId);
$buyer = $customer->getCustomerData($showOrder[0]['clientUserId']);
$statusName = $OrderStatus->singleOrderStatus($showOrder[0]['clientOrderStatus']);

$ordUpdates = $ContentOrder->showOrderUpdateById($orderId, 'ASC');
$lastUpdate = $ContentOrder->lastUpdate($orderId);

$lastUpdateTime = $dateUtil->dateTimeNum($lastUpdate['updated_on'], '/');

?>
<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta name="robots" content="noindex,nofollow">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $showOrder[0]['clientOrderedSite']; ?> - Order Details | <?php echo COMPANY_FULL_NAME; ?></title>
    <link rel="shortcut icon" href="<?php echo FAVCON_PATH?>" type="image/png" />
    <link rel="apple-touch-icon" href="<?php echo FAVCON_PATH?>" />


    <!-- Bootstrap Core CSS -->
    <link href="plugins/bootstrap-5.2.0/css/bootstrap.css" rel='stylesheet' type='text/css' />
    <link href="<?php echo URL;?>/plugins/fontawesome-free-6.4.0/css/all.min.css" rel='stylesheet' type='text/css' />
    <link href="<?php echo URL;?>/plugins/fontawesome-free-6.4.0/css/fontawesome.min.css" rel='stylesheet'
        type='text/css' />
    <!-- <link href="plugins/fontawesome-6.1.1/css/all.css" rel='stylesheet' type='text/css' /> -->

    <!-- Custom CSS -->
    <link href="css/style.css" rel='stylesheet' type='text/css' />
    <link href="css/dashboard.css" rel='stylesheet' type='text/css' />
    <link href="css/order-view-update.css" rel='stylesheet' type='text/css' />
    <link href="css/order-list.css" rel='stylesheet' type='text/css' />
    <link href="css/my-orders.css" rel='stylesheet' type='text/css' />
    <!-- font-awesome icons -->
    <!-- <link href="css/fontawesome-all.min.css" rel="stylesheet"> -->
    <!-- //Custom Theme files -->
    <!--webfonts-->
    <link href="//fonts.googleapis.com/css?family=Ubuntu:300,300i,400,400i,500,500i,700,700i" rel="stylesheet">
    <!--//webfonts-->
    <link href="//fonts.googleapis.com/css?family=Montserrat:400,500,600,700,900" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Nunito+Sans:400,700,900" rel="stylesheet">
    <style>
    @media (min-width: 1280px) {
        .client_profile_dashboard_right {
            padding-right: 4rem !important;
            padding-left: 0 !important;
        }
    }

    @media (min-width: 767px) and (max-width:1130px) {
        .client_profile_dashboard_right {
            padding-right: 2rem !important;

        }
    }

    @media (max-width: 350px) {
        .p-kage-de-tails {
            background: aliceblue;
            padding: 1rem 1rem;
        }

        .ordered-details-table-css {
            font-size: 1rem;
            font-weight: 500;
        }
    }
    </style>
</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">
    <div id="home">
        <!-- header -->
        <?php require_once ROOT_DIR.'/partials/navbar.php'; ?>
        <!-- //header -->
        <!-- banner -->
        <div class="edit_profile">
            <div class="container-fluid1">
                <div class=" display-table">
                    <div class="row ">
                        <!--Row start-->
                        <div class="col-md-3 hidden-xs display-table-cell v-align" id="navigation">

                            <div class="client_profile_dashboard_left">
                                <?php include ROOT_DIR."/dashboard-inc.php";?>
                                <hr>
                            </div>

                        </div>
                        <div class="col-md-9  display-table-cell v-align client_profile_dashboard_right">

                            <!-- Details section Start  -->
                            <div class="p-kage-de-tails">
                                <div class="">
                                    <!-- Order Details Start -->
                                    <h5 class="pkage-title border-bottom pb-2">Order Details:</h5>
                                    <h5 class="pkage-headline pt-3">
                                        <?php echo $showOrder[0]['clientOrderedSite']; ?><span
                                            class="ms-2 badge <?php echo $statusName[0][1]; ?>"><?php echo $statusName[0][1]; ?></span>
                                    </h5>
                                    <!-- <p class="fs-6 fw-semibold"><?php echo $showOrder[0]['niche']; ?></p> -->
                                    <div class="row">
                                        <div class="col-md-8">
                                            <table class="ordered-details-table-css ">
                                                <tr>
                                                    <td>Order Id</td>
                                                    <td>:</td>
                                                    <td><?php echo "#".$showOrder[0]['order_id']; ?></td>
                                                </tr>
                                                <?php
                                        if ($showOrder[0]['clientTransactionId'] != null) {
                                        ?>
                                                <tr>
                                                    <td>Transection Id</td>
                                                    <td>:</td>
                                                    <td style="word-break: break-word;">
                                                        <?php echo "#".$showOrder[0]['clientTransactionId']; ?></td>
                                                </tr>
                                                <?php
                                        }
                                        ?>
                                                <tr>
                                                    <td>Price</td>
                                                    <td>:</td>
                                                    <td><?php echo "$".$showOrder[0]['clientOrderPrice']; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Payment</td>
                                                    <td>:</td>
                                                    <td><?php echo $showOrder[0]['paymentStatus']; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Payment</td>
                                                    <td>:</td>
                                                    <td><?php echo $dateUtil->fullDateTimeText($showOrder[0]['added_on']); ?>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="card current-status-card" data-bs-toggle="modal"
                                                data-bs-target="#orderTrackModal" onclick="orderTrack();">
                                                <div class="current-status-title">Current Status
                                                </div>
                                                <div class="d-flex ">
                                                    <div class="m-auto mx-xl-2 mx-0">
                                                        <i class="fa-sharp fa-solid fa-magnifying-glass-location"
                                                            style="font-size: 2rem;padding-right: 1rem; text-align: start;"></i>
                                                    </div>
                                                    <div>
                                                        <p class="current-status-p"><?php echo $lastUpdate['subject'];?>
                                                        </p>
                                                        <p class="current-status-p"><?php echo $lastUpdateTime; ?></p>
                                                    </div>
                                                </div>
                                                <div class="d_border mt-2 ">
                                                    Click Here to Track
                                                </div>
                                            </div>
                                            <div class="modal fade" id="orderTrackModal" tabindex="-1"
                                                aria-labelledby="orderTrackModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-scrollable modal-md">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="orderTrackModalLabel">

                                                            </h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body orderTrack-modal-body">


                                                            <div class="container track-contain">
                                                                <div class="row">
                                                                    <div class="col-md-12 p-0
                                                                        ">
                                                                        <div class="card trackcard">
                                                                            <div class="card-body tmline-cbody">
                                                                                <h1 class="track-heading card-title">
                                                                                    Track Your Order :</h1>
                                                                                <div id="content"
                                                                                    class="content-tmline">
                                                                                    <ul class="timeline">
                                                                                        <?php
                                                                                                foreach ($ordUpdates as $ordUpdate) {
                                                                                                    $updateCustomer = $customer->getCustomerByTypeId($ordUpdate['updated_by']);
                                                                                                    $updateTime = $dateUtil->dateTimeNum($ordUpdate['updated_on'], '/');
                                                                                                ?>
                                                                                        <li class="event"
                                                                                            data-date="<?php echo $updateTime; ?>">
                                                                                            <h3><?php echo $ordUpdate['subject']; ?>
                                                                                            </h3>
                                                                                            <p><?php echo $ordUpdate['dsc']; ?>
                                                                                            </p>
                                                                                        </li>
                                                                                        <?php
                                                                                                }
                                                                                            ?>
                                                                                        <!-- <li class="event"
                                                                                                data-date="2:30 - 4:00pm">
                                                                                                <h3>Order Confirmed
                                                                                                </h3>
                                                                                                <p>Lorem ipsum dolor sit
                                                                                                    amet </p>
                                                                                            </li>
                                                                                            <li class="event"
                                                                                                data-date="5:00 - 8:00pm">
                                                                                                <h3>Order Shipped</h3>
                                                                                                <p>Lorem ipsum dolor sit
                                                                                                    amet </p>
                                                                                            </li>
                                                                                            <li class="event"
                                                                                                data-date="8:30 - 9:30pm">
                                                                                                <h3>Delivered</h3>
                                                                                                <p>Lorem ipsum dolor sit
                                                                                                    amet
                                                                                                </p>
                                                                                            </li> -->
                                                                                    </ul>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <h1></h1>


                                        </div>
                                    </div>

                                    <!-- Order Details End -->

                                </div>


                                <!--  -->







                            </div>
                            <!-- Details section End -->

                            <?php
                                $delivered = false;
                                if($showOrder[0]['clientOrderStatus'] == 4 ){
                                    $fieldStatus = '';
                                }elseif($showOrder[0]['clientOrderStatus'] == 3 ){
                                    $fieldStatus = '';
                                }elseif($showOrder[0]['clientOrderStatus'] == 1 ||  $showOrder[0]['clientOrderStatus'] == 5 ){
                                    $fieldStatus = 'disabled';
                                    $delivered = true;
                                }else {
                                    $fieldStatus = 'disabled';
                                }

                                if ($delivered) {
                                    echo '<div class="delivered_sec container mt-4">
                                            <h3>Your ordered article link is: </h3>
                                            <div class="text-wrap">
                                                <input type="text" class="form-control" id="articleLink" value="'. rawurldecode($showOrder[0]['deliveredLink']).'">
                                                <div id="copyArticleLink" class="clipboard icon"></div>
                                            </div>
                                        </div>';

                                        
                                        if ( $showOrder[0]['clientOrderStatus'] != 5 ) {
                                            // echo '
                                            // <div class="btn_bx text-center mt-3">
                                            // <button class="btn btn-sm btn-primary">Finished</button>
                                            // <button class="btn btn-sm btn-danger">Need to Change</button>
                                            // </div>';
                                            echo '<p class="text-primary fw-semibold text-center">Please Wait For Customer Response</p>';
                                        }else {
                                            $ordUpdate = $ContentOrder->lastUpdate($orderId);
                                            echo '<p class="text-center fw-bold my-3">Order Completed on '. date('l jS \of F Y h:i:s A', strtotime($ordUpdate['updated_on'])).'</p>'; 
                                        }
                                }else{
                            ?>

                            <div class="card rounded-0 shadow-sm mt-4">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-6">
                                            <p class="text-primary fw-bold">Anchor Text</p>
                                            <div class="text-wrap">
                                                <input type="text" class="form-control" id="anchor-text"
                                                    value="<?php echo $order[0]['clientAnchorText'];?>">
                                                <div onclick="copyText('anchor-text')" class="clipboard icon"></div>
                                            </div>

                                        </div>
                                        <div class="col-6">
                                            <p class="text-primary fw-bold">Target URL</p>
                                            <div class="text-wrap">
                                                <input type="text" class="form-control" id="target-url"
                                                    value="<?php echo $order[0]['clientTargetUrl'];?>">
                                                <div onclick="copyText('target-url')" class="clipboard icon"></div>
                                            </div>

                                        </div>

                                        <?php
                                        if ($order[0]['clientContent'] =='') {
                                            ?>
                                        <p class="text-light bg-info fw-bold text-center my-5 py-5">Contents Will Be
                                            Updated Soon.</p>

                                        <?php
                                        }else{
                                        ?>
                                        <div class="col-12 mt-3">
                                            <p class="text-primary fw-bold">Content <span
                                                    class="text-danger fw-light"><small> Drag the right down corner of
                                                        the textarea to get the complete content</small></span></p>
                                            <div class="text-wrap">

                                                <textarea class="form-control" id="content"
                                                    rows="6"><?php echo $order[0]['clientContent'];?></textarea>
                                                <div onclick="copyText('content')" class="clipboard icon"></div>
                                            </div>
                                        </div>
                                        <?php
                                        }
                                        ?>

                                        <div class="col-12 mt-3">
                                            <p class="text-primary fw-bold">Special Requirements</p>
                                            <div class="text-wrap">
                                                <textarea class="form-control" id="special-requirements"
                                                    rows="6"><?php echo $order[0]['clientRequirement'];?></textarea>
                                            </div>

                                        </div>


                                    </div>

                                    <?php
                                    // ======== if order ordered ======== 
                                    if($order[0]['clientOrderStatus'] == 4){
                                        echo '
                                        <div class="d-flex justify-content-evenly p-4 p-md-5">
                                            <div class="col-sm-6 d-flex justify-content-evenly"
                                                style="padding-bottom: inherit;">
                                                <button class="btn btn-danger w-50" data-bs-toggle="modal"
                                                    data-bs-target="#rejectModal">Reject</button>
                                            </div>
                                            <div class="col-sm-6">
                                                <form action="'.$_SERVER['REQUEST_URI'].'" method="post" class="d-flex justify-content-evenly">
                                                    <button class="btn btn-primary w-50" name="accept-order">Accept</button>
                                                </form>
                                            </div>

                                        </div>';
                                    }


                                    // ======== if order rejected ======== 
                                    if ($order[0]['clientOrderStatus'] == 10) {
                                        echo '
                                        <p class="text-danger text-center">Order Has Been Rejected</p>
                                        <div class="d-flex justify-content-center">
                                            <a href="contact.php" class="btn w-50 contact_button text-center">Contact '.COMPANY_S.'</a>
                                        </div>';
                                    }


                                    // ======== if order is processing ========
                                    if($order[0]['clientOrderStatus'] == 3) {
                                        if ($order[0]['clientContent'] !='') {
                                            if ($order[0]['changesReq'] > 0) {
                                                echo '<div class="text-center">
                                                        <p class="text-danger fw-bold">Did You Cheaked the changes request?</p>
                                                        <button class="btn btn-primary" onclick="changesUpdate('.$orderId.')">Yes</button>
                                                    </div>';
                                            }else {
                                                
                                                echo '
                                                <div class="text-center py-4">
                                                    <button class="btn w-50 btn-primary" data-bs-toggle="modal"
                                                        data-bs-target="#deliverModal">Update Deliver</button>
                                                </div>';

                                            }
                                                
                                        }else {
                                            echo '
                                                <div class="d-flex justify-content-center">
                                                    <a href="contact.php" class="btn w-50 contact_button text-center"
                                                        name="">Contact'. COMPANY_S.'</a>
                                        </div>';
                                        }
                                }


                                // if delivered
                                if($order[0]['clientOrderStatus'] == 1) {
                                    echo '
                                    <div class="text-center py-4">
                                        <p class="text-light bg-primary fs-4 fw-bold">Order Delivered.</p>
                                    </div>';
                                }



                                // if delivered
                                if($order[0]['clientOrderStatus'] == 7) {
                                    echo '
                                    <div class="text-center py-4">
                                        <p class="text-light bg-danger fs-4 fw-bold">Order Cancelled.</p>
                                    </div>';
                                }


                                // if order is Hold
                                if ($order[0]['clientOrderStatus'] == 6) {
                                    if ($order[0]['changesReq'] > 0) {
                                    echo '<div class="text-center">
                                        <p class="text-danger font-weight-bold">Did You Cheaked the changes
                                            request?</p>
                                        <button class="btn btn-primary"
                                            onclick="changesUpdate(' . $orderId . ')">Yes
                                            (' . $order[0]['changesReq'] . ')</button>
                                    </div>';
                                    } else {

                                    echo '
                                    <div class="text-center py-4">
                                        <button class="btn w-50 btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#deliverModal">Update Deliver</button>
                                    </div>';
                                    }
                                }

                                ?>

                                    <!-- Start Reject Modal -->
                                    <div class="modal fade" id="rejectModal" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="POST">
                                                        <div class="mb-3">
                                                            <label for="cancellation-reason" class="form-label">Reason
                                                                of cancellation</label>
                                                            <textarea class="form-control" id="cancellation-reason"
                                                                name="cancellation-reason" rows="3"></textarea>
                                                        </div>
                                                        <div class="text-center">
                                                            <button class="btn btn-sm btn-danger"
                                                                name="reject-order">Reject</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Reject Modal  -->

                                    <!-- Deliver Update Modal -->
                                    <div class="modal fade" id="deliverModal" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header py-1">
                                                    <h4>Successfull Link</h4>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form name="deliverForm"
                                                        action="<?php echo $_SERVER['REQUEST_URI']; ?>"
                                                        onsubmit="return validateForm()" method="POST"
                                                        class="text-center">

                                                        <input type="text" class="form-control" name="post-link">
                                                        <span class="text-danger d-block" id="blank-msg"></span>
                                                        <button class="btn btn-sm btn-danger mt-3"
                                                            name="delivered">Delivered</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Deliver Update Modal -->



                                </div>
                                <?php
                            }
                            ?>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- //end display table-->
            </div>
        </div>


        <!-- //fixed-scroll-nav-js -->
        <script src="plugins/jquery-3.6.0.min.js"></script>
        <script src="plugins/bootstrap-5.2.0/js/bootstrap.js"></script>
        <!-- <script src="js/pageplugs/fixedNav.js"></script> -->
        <script src="plugins/sweetalert/sweetalert2.all.js"></script>
        <!-- Switch Customer Type -->
        <script src="js/customerSwitchMode.js"></script>
        <script src="js/script.js"></script>
        <script src="js/ajax.js"></script>


        <script>
        function validateForm() {

            let postUrl = document.forms["deliverForm"]["post-link"].value;
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
                        url: "ajax/order-update.ajax.php",
                        type: "POST",
                        data: {
                            changesOrder: ordId
                        },
                        success: function(data) {
                            alert(data);
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
        </script>

</body>

</html>