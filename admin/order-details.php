<?php
require_once "../includes/constant.inc.php";
session_start();
include_once ADM_DIR . 'checkSession.php';

require_once ROOT_DIR . "/_config/dbconnect.php";
require_once ROOT_DIR . "/_config/dbconnect.trait.php";

require_once ROOT_DIR . "/classes/date.class.php";
require_once ROOT_DIR . "/classes/error.class.php";
require_once ROOT_DIR . "/classes/customer.class.php";
require_once ROOT_DIR . "/classes/countries.class.php";
require_once ROOT_DIR . "/classes/location.class.php";

require_once ROOT_DIR . "/classes/blog_mst.class.php";
require_once ROOT_DIR . "/classes/utility.class.php";
require_once ROOT_DIR . "/classes/utilityMesg.class.php";

require_once ROOT_DIR . "/classes/content-order.class.php";
require_once ROOT_DIR . "/classes/orderStatus.class.php";


/* INSTANTIATING CLASSES */
$dateUtil          = new DateUtil();
$error             = new Error();
$customer        = new Customer();
$Countries      = new Countries();
$Location       = new Location();

$BlogMst        = new BlogMst();
$ContentOrder   = new ContentOrder();
$OrderStatus    = new OrderStatus();

$utility        = new Utility();
$uMesg             = new MesgUtility();
######################################################################################################################

$currentUrl = $utility->currentUrl();

// echo $_GET['ord_id'];
$orderId = $_GET['ord_id'];



if (isset($_POST['delivered'])) {
    $orderStatus    = 1; // Deliverd 
    $deliveredLink  = $_POST['post-link'];
    $deliveredLink  = rawurlencode($deliveredLink);

    $delivered = $ContentOrder->ClientOrderOrderUpdate($orderId, $orderStatus, 'deliveredLink', $deliveredLink);
    if ($delivered) {
        $uMesg->showSuccessT('success', 0, '', '' . $currentUrl . '', "Order Delivered", 'SUCCESS');
    }
}

$order = $ContentOrder->clientOrderById($orderId);



######################################################################################################################

//declare vars
$typeM            = $utility->returnGetVar('typeM', '');
$keyword        = $utility->returnGetVar('keyword', '');
$type            = $utility->returnGetVar('type', '');
$mode            = $utility->returnGetVar('mode', '');
$noOfOrd        = array();

if ((isset($_GET['btnSearch'])) && ($_GET['btnSearch'] == 'search')) {
    $link    = "&btnSearch=search&keyword=" . $_GET['keyword'] . "&mode=&type=" . $_GET['type'];
    $noOfOrd = $search_obj->searchOrder($mode, $keyword, $type);
} else {
    if (isset($_GET['user_id']) && isset($_GET['status'])) {
        $user_id    = $_GET['user_id'];
        //echo $user_id ; exit;
        $status        = $_GET['status'];
    } else {
        $user_id    = 'all';
        $status        = 'all';
    }

    // echo $user_id.'----'.$status;exit;
    $allOrders    = $ContentOrder->showAllOrderdContents($user_id, $status);
    // print_r($allOrders);
    // exit;

    //order details
    $showOrder  = $ContentOrder->clientOrderById($orderId);

    //transection details
    $ordTxn     = $ContentOrder->showTransectionByOrder($orderId);

    //blog details
    $item       = $BlogMst->showBlogbyDomain($showOrder[0]['clientOrderedSite']);

    //blog creator / seller
    $seller     = $customer->getCustomerByemail($item[19]);

    //customer / buyer
    $buyer      = $customer->getCustomerData($showOrder[0]['clientUserId']);

    // order status names
    $statusName = $OrderStatus->singleOrderStatus($showOrder[0]['clientOrderStatus']);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?php echo $showOrder[0]['clientOrderedSite']; ?> - Order Details | <?php echo COMPANY_FULL_NAME; ?></title>
    <link rel="shortcut icon" href="<?php echo FAVCON_PATH?>" type="image/png" />
    <link rel="apple-touch-icon" href="<?php echo FAVCON_PATH?>" />
    
    <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
    <!-- <link rel="stylesheet" href="../plugins/data-table/style.css"> -->
    <link rel="stylesheet" href="../plugins/sweetalert/sweetalert2.css">

    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.2.1/css/all.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.2.1/css/sharp-solid.css">


    <!-- inject:css -->
    <link rel="stylesheet" href="css/vertical-layout-light/style.css">
    <link rel="stylesheet" href="../css/order-now.css">
    <!-- <link rel="stylesheet" href="../plugins/bootstrap-5.2.0/css/bootstrap.css"> -->
    <!-- endinject -->
    <link rel="shortcut icon" href="images/favicon.png" />
</head>

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
                                                    <h5 class="pkage-title border-bottom border-primary py-2">Order
                                                        Details:</h5>
                                                    <h5 class="pkage-headline pt-1">
                                                        <?php echo $showOrder[0]['clientOrderedSite']; ?><span
                                                            class="ms-2 badge <?php echo $statusName[0][1]; ?>"><?php echo $statusName[0][1]; ?></span>
                                                    </h5>
                                                    <table class="ordered-details-table-css ">
                                                        <tr>
                                                            <td>Order Id</td>
                                                            <td>:</td>
                                                            <td><?php echo "#" . $showOrder[0]['order_id']; ?></td>
                                                        </tr>
                                                        <?php
                                                        if ($showOrder[0]['clientTransactionId'] != null) {
                                                        ?>
                                                        <tr>
                                                            <td>Transection Id</td>
                                                            <td>:</td>
                                                            <td style="word-break: break-word;">
                                                                <?php echo "#" . $showOrder[0]['clientTransactionId']; ?>
                                                            </td>
                                                        </tr>
                                                        <?php
                                                        }
                                                        ?>
                                                        <tr>
                                                            <td>Payment</td>
                                                            <td>:</td>
                                                            <td><?php echo date('l jS \of F Y h:i:s A', strtotime($showOrder[0]['added_on'])); ?>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                            <!-- Order Details End -->

                                            <!-- payment details start -->
                                            <div class="col-md-6">
                                                <div>
                                                    <h5 class="pkage-title border-bottom border-primary py-2">
                                                        Payment Details:
                                                    </h5>
                                                    <table class="ordered-details-table-css ">
                                                        <tr>
                                                            <td>Current Price</td>
                                                            <td>:</td>
                                                            <td><?php echo "$" . $showOrder[0]['clientOrderPrice']; ?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Order Price</td>
                                                            <td>:</td>
                                                            <td><?php echo "$" . $ordTxn['item_amount']; ?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Total Amount</td>
                                                            <td>:</td>
                                                            <td><?php echo "$" . $ordTxn['paid_amount']; ?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Payment Mode</td>
                                                            <td>:</td>
                                                            <td><?php echo $ordTxn['transection_mode']; ?>
                                                            </td>
                                                        </tr>
                                                        <?php
                                                        if ($ordTxn['transection_id'] != null) {
                                                        ?>
                                                        <tr>
                                                            <td>Payment</td>
                                                            <td>:</td>
                                                            <td><?php echo $ordTxn['transection_id']; ?></td>
                                                        </tr>
                                                        <?php
                                                        }
                                                        ?>
                                                        <tr>
                                                            <td>Time </td>
                                                            <td>:</td>
                                                            <td><?php echo date('l jS \of F Y h:i:s A', strtotime($ordTxn['t_date'])); ?>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                            <!-- payment details end  -->

                                            <!-- customer details start  -->
                                            <div class="col-md-6">
                                                <div>
                                                    <h5 class="pkage-title border-bottom border-primary py-2">Customer
                                                        Details:</h5>
                                                    <table class="ordered-details-table-css ">
                                                        <tr>
                                                            <td>Customer Name</td>
                                                            <td>:</td>
                                                            <td><?php echo $showOrder[0]['clientName']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Email</td>
                                                            <td>:</td>
                                                            <td style="word-break: break-word;">
                                                                <?php echo $buyer[0][2]; ?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Contact</td>
                                                            <td>:</td>
                                                            <td><?php echo $buyer[0][31]; ?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Secendary Contact</td>
                                                            <td>:</td>
                                                            <td><?php echo $buyer[0][32]; ?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Mobile</td>
                                                            <td>:</td>
                                                            <td><?php echo $buyer[0][34]; ?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Fax</td>
                                                            <td>:</td>
                                                            <td><?php echo $buyer[0][33]; ?>
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
                                                                    echo $city[1];
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
                                                                    echo $state[0];
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
                                                                $country = $Countries->showCountry($buyer[0][30]);
                                                                // print_r($country);
                                                                echo $country[0];
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
                                                    <h5 class="pkage-title border-bottom border-primary py-2">
                                                        Seller Details:</h5>
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
                                                                    echo $city[1];
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
                                                                    echo $state[0];
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
                                                                $country = $Countries->showCountry($seller['countries_id']);
                                                                echo $country[0];
                                                                ?>
                                                            </td>
                                                        </tr>
                                                    </table>
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
                                if ($showOrder[0]['clientOrderStatus'] == 4) {
                                    $fieldStatus = '';
                                } elseif ($showOrder[0]['clientOrderStatus'] == 3) {
                                    $fieldStatus = '';
                                } elseif ($showOrder[0]['clientOrderStatus'] == 1 || $showOrder[0]['clientOrderStatus'] == 5) {
                                    $fieldStatus = 'disabled';
                                    $delivered = true;
                                } else {
                                    $fieldStatus = 'disabled';
                                }

                                if ($delivered) {
                                    echo '<div class="delivered_sec rounded-1r border shadow mt-4 p-4">
                                                        <h3>Your ordered article link is: </h3>
                                                        <div class="text-wrap">
                                                            <input type="text" class="form-control" id="articleLink" value="' . rawurldecode($showOrder[0]['deliveredLink']) . '">
                                                            <div id="copyArticleLink" class="clipboard icon"></div>
                                                        </div>';

                                    if ($showOrder[0]['clientOrderStatus'] != 5) {
                                        echo '
                                                            <div class="btn_bx text-center mt-3">
                                                                <button class="btn btn-sm btn-primary" onclick="finishedOrder(\''.$orderId.'\')">Finished</button>
                                                                <button class="btn btn-sm btn-danger"  data-toggle="modal"
                                                                data-target="#updateModal" onclick="changeRequest()">Need to Change</button>
                                                            </div>';
                                    } else {
                                        $ordUpdate = $ContentOrder->lastUpdate($orderId);
                                        echo '<p class="text-center font-weight-bold my-3">Order Completed on ' . date('l jS \of F Y h:i:s A', strtotime($ordUpdate['updated_on'])) . '</p>';
                                    }

                                    echo '</div>';
                                }
                                
                                ?>

                                <div class="row">



                                    <div class="col-md-8">
                                        <div class="card rounded-1r border shadow mt-4">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <h5 class="text-primary font-weight-bold">Anchor Text</h5>
                                                        <div class="text-wrap">
                                                            <input type="text" class="form-control" id="anchor-text"
                                                                value="<?php echo $order[0]['clientAnchorText']; ?>">
                                                            <div id="copyAnchorText" class="clipboard icon">
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="col-6">
                                                        <h5 class="text-primary font-weight-bold">Target URL</h5>
                                                        <div class="text-wrap">
                                                            <input type="text" class="form-control" id="target-url"
                                                                value="<?php echo $order[0]['clientTargetUrl']; ?>">
                                                            <div id="copyTargetUrl" class="clipboard icon">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <?php
                                                    if ($order[0]['clientContent'] == '') {

                                                        if ($order[0]['clientTargetUrl'] > $ordTxn['item_amount']) {
                                                        ?>
                                                            <div class="col-12 mt-3">
                                                                <p class="text-primary font-weight-bold">
                                                                    Content
                                                                    <span class="text-danger font-weight-light">
                                                                        <small> Content Required By <?php echo COMPANY_S;?></small>
                                                                    </span>
                                                                </p>
                                                                <div class="border rounded text-center py-4" data-toggle="modal"
                                                                    data-target="#updateModal">
                                                                    <button class="btn btn-sm btn-primary my-4"
                                                                        onclick="updateSingle()">Upload Content</button>
                                                                </div>
                                                            </div>

                                                        <?php
                                                        } else {
                                                        ?>

                                                            <p class="text-light bg-info font-weight-bold text-center w-100 my-5 py-5">
                                                                Contents Will Be Updated Soon.
                                                            </p>

                                                        <?php
                                                            }
                                                    } else {
                                                        ?>
                                                    <div class="col-12 mt-3">
                                                        <h5 class="text-primary font-weight-bold">Content <span
                                                                class="text-danger font-weight-light"><small> Drag the
                                                                    right down corner of
                                                                    the textarea to get the complete
                                                                    content</small></span></h5>
                                                        <div class="text-wrap">

                                                            <textarea class="form-control" id="content"
                                                                rows="6"><?php echo $order[0]['clientContent']; ?></textarea>
                                                            <div id="copyContent" class="clipboard icon"></div>
                                                        </div>
                                                    </div>
                                                    <?php
                                                    }
                                                    ?>

                                                    <div class="col-12 mt-3">
                                                        <h5 class="text-primary font-weight-bold">Special Requirements
                                                        </h5>
                                                        <div class="text-wrap">
                                                            <textarea class="form-control" id="special-requirements"
                                                                rows="6"><?php echo $order[0]['clientRequirement']; ?></textarea>
                                                            <div id="copyRequirements" class="clipboard icon">
                                                            </div>
                                                        </div>

                                                    </div>


                                                </div>


                                                <!--========== if Order status is Ordered  ==========-->
                                                <?php

                                                if ($order[0]['clientOrderStatus'] == 4) {
                                                ?>
                                                <div class="container p-4">
                                                    <p class="text-danger text-center">It's Seller turn to take action
                                                    </p>
                                                    <div class="d-md-flex justify-content-around">

                                                        <button class="btn btn-danger w-25" data-toggle="modal"
                                                            data-target="#updateModal"
                                                            onclick="rejectOrder()">Reject</button>

                                                        <button class="btn btn-primary w-25" name="accept-order"
                                                            onclick="acceptOrder(<?php echo $orderId; ?>)">Accept</button>
                                                    </div>
                                                </div>
                                                <?php
                                                }
                                                ?>



                                                <!--========== if Order is Processesing  ==========-->




                                                <!--========== if Order is Cancelled  ==========-->
                                                <?php
                                                if ($order[0]['clientOrderStatus'] == 7) {
                                                ?>
                                                <div class="d-flex justify-content-around p-4 p-md-5">

                                                    <button class="btn btn-primary w-25">Contact Customer</button>

                                                    <button class="btn btn-primary w-25" name="accept-order">Contact
                                                        Seller</button>

                                                </div>
                                                <?php
                                                }
                                                ?>




                                                <?php

                                                // ======== if order rejected ======== 
                                                if ($order[0]['clientOrderStatus'] == 10) { //if Rejected
                                                    echo '
                                                <p class="text-danger text-center">Order Has Been Rejected</p>
                                                <div class="d-flex justify-content-center">
                                                    <a href="contact.php" class="btn w-50 contact_button text-center"
                                                        name="">Contact' . COMPANY_S . '</a>
                                                </div>';
                                                }


                                                // if order is processing
                                                if ($order[0]['clientOrderStatus'] == 3) {
                                                    if ($order[0]['clientContent'] != '') {


                                                        if ($order[0]['changesReq'] > 0) {
                                                            echo '<div class="text-center">
                                                                <p class="text-danger font-weight-bold">Did You Cheaked the changes
                                                                    request?</p>
                                                                <button class="btn btn-primary"
                                                                    onclick="changesUpdate(' . $orderId . ')">Yes
                                                                    (' . $order[0]['changesReq'] . ')</button>
                                                            </div>';
                                                            } else {
            
                                                            // echo '
                                                            // <div class="text-center py-4">
                                                            //     <button class="btn w-50 btn-primary" data-bs-toggle="modal"
                                                            //         data-bs-target="#deliverModal">Update Deliver</button>
                                                            // </div>';

                                                            echo '
                                                            <div class="d-flex justify-content-center my-3">
                                                                <button class="btn btn-danger w-25 mx-2" onclick="cancelOrder(' . $orderId . ')">Cancel Order</button>

                                                                <button class="btn w-25 btn-primary mx-2" data-toggle="modal" data-target="#deliverModal" onclick="deliverOrder()">Update Deliver</button>
                                                            </div>';

                                                            }
                                                    } else {
                                                        echo '
                                                        <div class="d-flex justify-content-center">
                                                            <a href="contact.php" class="btn w-50 contact_button text-center"
                                                                name="">Contact '.COMPANY_S.'</a>
                                            </div>';
                                            }
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


                                            if ($order[0]['clientOrderStatus'] == 1) { // if delivered
                                            ?>
                                            <div class="text-center py-4">
                                                <p class="text-light bg-primary fs-4 font-weight-bold">Order
                                                    Delivered.</p>
                                            </div>
                                            <?php
                                                }
                                                ?>

                                        </div>
                                    </div>
                                </div>


                                <!-- start of updates  -->
                                <div class="col-md-4">
                                    <div class="stretch-card grid-margin mt-4">
                                        <div class="card status_card rounded-1r border shadow">
                                            <div class="card-body">
                                                <p class="card-title">Updates</p>
                                                <ul class="icon-data-list">
                                                    <?php
                                                    $ordUpdates = $ContentOrder->showOrderUpdateById($showOrder[0]['order_id'], 'ASC');
                                                    // print_r($ordUpdates);
                                                    foreach ($ordUpdates as $ordUpdate) {
                                                        $updateCustomer = $customer->getCustomerByTypeId($ordUpdate['updated_by']);
                                                    ?>

                                                    <li>
                                                        <div class="d-flex">
                                                            <img src="images/faces/face1.jpg" alt="user">
                                                            <div>
                                                                <p class="text-info mb-1">
                                                                    <?php echo $ordUpdate['subject']; ?></p>
                                                                <p class="mb-0">
                                                                    <?php
                                                                        if ($ordUpdate['dsc'] != null) {
                                                                            echo $ordUpdate['dsc'] . '<br>';
                                                                        }
                                                                        if ($ordUpdate['updated_by'] == 0) {
                                                                            echo '<small>By ' . COMPANY_S . '</small>';
                                                                        } else {
                                                                            echo '<small>By ' . $updateCustomer[0]['cus_type'] . '</small>';
                                                                        }

                                                                        ?>
                                                                </p>
                                                                <small><?php echo $ordUpdate['updated_on']; ?></small>
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
            <div class="modal fade" id="rejectModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
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
            <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form action="ajax/order-update.php" method="POST" id="updateForm">
                            <div class="modal-header px-4 py-3">
                                <h5 class="modal-title" id="updateModalLabel"></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <input type="hidden" name="return-page" value="<?php echo $utility->currentUrl() ?>">
                            <input type="hidden" name="order-id" value="<?php echo $orderId ?>">
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
            <div class="modal fade" id="deliverModal" tabindex="-1" aria-labelledby="deliverModallLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form action="ajax/order-update.php" method="POST" onsubmit="return validateForm()">
                            <div class="modal-header">
                                <h5 class="modal-title">Successfull Delivery Link</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <input type="hidden" name="return-page" value="<?php echo $utility->currentUrl() ?>">
                            <input type="hidden" name="order-id" value="<?php echo $orderId ?>">
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


    <script>
    const acceptOrder = (ordId) => {

        if (confirm("Are You Sure ?")) {
            window.location.href = `ajax/order-update.php?accept-order=${ordId}`;
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


    const deliverOrder = () => {



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
                    url: "ajax/order-update.php",
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
        // alert('Hi');
        document.getElementById('updateModalLabel').innerText = 'What to change?';
        document.getElementById('action-btn').name = 'changes-request';
        document.getElementById('updateModalBody').innerHTML = `<textarea class="form-control"  name="changes-req" rows="6" required></textarea>`;

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

    <!-- endinject -->
    <!-- Custom js for this page-->
    <!-- End custom js for this page-->
</body>

</html>