<?php
session_start();

// var_dump($_SESSION);
require_once("_config/dbconnect.php");
require_once "_config/dbconnect.trait.php";

require_once "includes/constant.inc.php";
require_once "classes/customer.class.php";
require_once "classes/content-order.class.php";
require_once "classes/orderStatus.class.php";
require_once "classes/location.class.php";
require_once "classes/utility.class.php";
require_once "classes/utilityMesg.class.php";

/* INSTANTIATING CLASSES */
$customer		= new Customer();
$ContentOrder   = new ContentOrder();
$OrderStatus    = new OrderStatus();
$Location       = new Location();
$utility		= new Utility();
$uMesg          = new MesgUtility();
######################################################################################################################
$typeM		= $utility->returnGetVar('typeM','');
//user id
$cusId		= $utility->returnSess('userid', 0);
$cusDtl		= $customer->getCustomerData($cusId);

if($cusId == 0){
    header("Location: index.php");
}

if($cusDtl[0][0] == 2){
    header("Location: dashboard.php");
}
if(isset($_GET['order'])){
    $orderId			  		= urldecode(base64_decode($_GET['order']));

}else {
    header("Location: my-orders.php");
}

$thisPage =  $utility->currentUrl();

?>


<!DOCTYPE HTML>
<html lang="zxx">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My Order Details | <?php echo COMPANY_S; ?></title>
    <link rel="shortcut icon" href="<?php echo FAVCON_PATH?>" type="image/png" />
    <link rel="apple-touch-icon" href="<?php echo FAVCON_PATH?>" />

    <!-- Bootstrap Core CSS -->
    <link href="plugins/bootstrap-5.2.0/css/bootstrap.css" rel='stylesheet' type='text/css' />
    <!-- font-awesome icons -->
    <link href="plugins/fontawesome-6.1.1/css/all.css" rel='stylesheet' type='text/css' />
    <!-- Custom CSS -->
    <link href="css/style.css" rel='stylesheet' type='text/css' />
    <link href="css/leelija.css" rel='stylesheet' type='text/css' />
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
    
    $orderId            = $_POST['orderId'];
    $clientTargetUrl    = $_POST['clientTargetUrl'];
    $clientAnchorText   = $_POST['clientAnchorText'];
    $clientRequirement  = $_POST['clientRequirement'];


    if (isset($_POST['clientContent'])) {
        
        $clientContent      = $_POST['clientContent'];

        $updated = $ContentOrder->ClientOrderContentUpdate($orderId, $clientAnchorText, $clientTargetUrl, $clientContent, $clientRequirement);

        if ($updated) {
            $statusUpdated = $ContentOrder->addOrderUpdate($orderId, 'Content Updated', '', $cusDtl[0][0]);

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
    }
    else {
            $updated = $ContentOrder->ClientOrderContentUpdate($orderId, $clientAnchorText, $clientTargetUrl, '', $clientRequirement);

            if ($updated) {
            $statusUpdated = $ContentOrder->addOrderUpdate($orderId, 'Content Updated', '', $cusDtl[0][0]);

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
    }

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



?>

    <div id="home">
        <!-- header -->
        <?php  require_once "partials/navbar.php" ?>
        <?php //include 'header-user-profile.php'?>

        <!-- //header -->
        <!-- banner -->
        <div class="edit_profile">
            <div class="container-fluid1">
                <div class=" display-table">
                    <div class="row ">
                        <!--Row start-->
                        <div class="col-md-3 hidden-xs display-table-cell v-align" id="navigation">

                            <div class="client_profile_dashboard_left">
                                <?php include("dashboard-inc.php");?>
                                <hr>
                            </div>

                        </div>
                        <div class="col-md-9 display-table-cell v-align client_profile_dashboard_right">

                            <!-- Details section Start  -->
                            <div class="p-3 p-kage-de-tails">
                                <div class="row">
                                    <!-- Order Details Start -->
                                    <div class="col-md-6 ">
                                        <?php
                                            $showOrder  = $ContentOrder->clientOrderById($orderId);
                                            $ordTxn = $ContentOrder->showTransectionByOrder($orderId);
                                            $buyer = $customer->getCustomerData($showOrder[0]['clientUserId']);
                                        ?>
                                        <h5 class="pkage-title border-bottom pb-2">Order Details:</h5>
                                        <h5 class="pkage-headline pt-2">
                                            <?php echo $showOrder[0]['clientOrderedSite']; ?></h5>
                                        <!-- <p class="fs-6 fw-semibold"><?php echo $showOrder[0]['niche']; ?></p> -->
                                        <ul class="listing-adrs">
                                            <li> Order Id : <?php echo "#".$showOrder[0]['order_id']; ?>
                                            </li>
                                            <?php
                                            if ($showOrder[0]['clientTransactionId'] != null) {
                                                echo '<li> Transection Id : '.$showOrder[0]['clientTransactionId'];
                                            }
                                            ?>
                                            </li>
                                            <li> Price : <?php echo '$'.$showOrder[0]['clientOrderPrice']; ?></li>
                                            <?php  $statusName = $OrderStatus->singleOrderStatus($showOrder[0]['clientOrderStatus']) ?>
                                            <li> Order : <?php echo $statusName[0][1]; ?></li>
                                            <li> Payment : <?php echo $showOrder[0]['paymentStatus']; ?></li>
                                            <li> Date :
                                                <?php echo date('l jS \of F Y h:i:s A', strtotime($showOrder[0]['added_on'])); ?>
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- Order Details End -->


                                    <!-- Customer details Start  -->
                                    <div class="col-md-6 pkagerow">
                                        <h5 class="pkage-title border-bottom pb-2">Customer Details:</h5>
                                        <h5 class="pkage-headline pt-2 pb-1">
                                            <?php echo $buyer[0][5].' '.$buyer[0][6]; ?></h5>

                                        <ul class="listing-adrs">
                                            <li> Email : <?php echo $buyer[0][3]; ?></li>
                                            <li> <?php echo $buyer[0][24]; ?>,
                                                <?php echo $buyer[0][29]; ?></li>
                                            <li>
                                                <?php
                                                $country = $Location->getCountyDataByCountyId($buyer[0][30]);
                                                echo $country[1];
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
                                if($showOrder[0]['clientOrderStatus'] == 4 ){
                                    $fieldStatus = '';
                                }elseif($showOrder[0]['clientOrderStatus'] == 3 ){
                                    $fieldStatus = '';
                                }elseif($showOrder[0]['clientOrderStatus'] == 1 || $showOrder[0]['clientOrderStatus'] == 5 ){
                                    $fieldStatus = 'disabled';
                                    $delivered = true;
                                }else {
                                    $fieldStatus = 'disabled';
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

                                                    
                                            if ($showOrder[0]['paymentStatus'] == "Pay Later") {
                                                echo '<small class="d-block text-danger fw-bold my-1">Pay Before '.$dueDate.'</small>';
                                            }
                                            
                                            
                                            if ($showOrder[0]['paymentStatus'] == "Pay Later") {
                                                echo '<a class="btn btn-primary text-center" href="payments/paylater-pay-now.php?order='.base64_encode($orderId).'">Pay Now</a>';
                                            }
                                            
                                            echo '</div>';
                                        }

                                }
                            ?>
                            <form action="" method="post" class="mt-4" id="orderForm">
                                <div class="row px-3" id="row1">
                                    <div class="form-group">
                                        <label for="content">
                                            <h5>Content<span class="warning">*</span></h5>
                                            <p class="caution-abouts">Your Content<span class="warning">*</span> (Must
                                                be a
                                                minimum of
                                                500 words) Don't have a content, get one here
                                                Place your content here. In your content, you can include up to 2 links
                                                They
                                                can be in the form of URLs and anchors. In the "URL" and "Anchor text"
                                                fields below,
                                                please insert the same URLs and anchors. <span class="warning">(Don't
                                                    add
                                                    any images in your article)</span></p>
                                        </label>
                                        <?php
                                        if ($showOrder[0]['clientOrderPrice'] > $ordTxn['item_amount']) {
                                            if ($showOrder[0]['clientContent'] == null ) {
                                        ?>
                                        <p class="text-light bg-info fw-bold text-center my-5 py-5">Contents Will Be
                                            Updated Soon.</p>
                                        <?php
                                            }else {
                                        ?>
                                        <div class="form-group">
                                            <textarea class="form-control" name="clientContent" id="content" rows="9"
                                                placeholder="Put your content here"
                                                disabled><?php echo $showOrder[0]['clientContent']; ?></textarea>
                                        </div>
                                        <?php
                                            }
                                        }else{
                                        ?>
                                        <div class="form-group">
                                            <textarea class="form-control" name="clientContent" id="content" rows="9"
                                                placeholder="Put your content here" <?php echo $fieldStatus; ?>><?php
                                            if ($showOrder[0]['clientContent'] != null ) {
                                                echo $showOrder[0]['clientContent'];
                                            }
                                            ?></textarea>
                                        </div>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="target-url">
                                            <h5>Target Url<span class="warning">*</span></h5>
                                            <p class="caution-abouts">Enter The URL That You Have Included In Your
                                                Content Above</p>
                                        </label>
                                        <input type="text" class="form-control" id="target-url"
                                            aria-describedby="emailHelp" placeholder="Enter Your Target URL"
                                            name="clientTargetUrl" value="<?php
                                            if ($showOrder[0]['clientTargetUrl'] != null ) {
                                                echo $showOrder[0]['clientTargetUrl'];
                                            }
                                            ?>" <?php echo $fieldStatus; ?>>
                                    </div>

                                    <div class="form-group">

                                        <label for="anchor-text">
                                            <h5>Anchor Text<span class="warning"> *</span></h5>
                                            <p class="caution-abouts">Enter The Anchor Text That You Have Included In
                                                Your Content Above.</p>
                                        </label>

                                        <input type="text" class="form-control" id="anchor-text"
                                            placeholder="Enter Your Anchor Text" name="clientAnchorText" value="<?php
                                            if ($showOrder[0]['clientAnchorText'] != null ) {
                                                echo $showOrder[0]['clientAnchorText'];
                                            }
                                            ?>" <?php echo $fieldStatus; ?>>

                                    </div>


                                    <div class="form-group">
                                        <label for="special-requirements">
                                            <h5>Special requirements</h5>
                                            <p class="caution-abouts">If necessary, Write all your task requirements
                                                here, e. g., content
                                                requirements, Category, deadline, necessity of disclosure, preferences
                                                regarding content placement, etc.</p>
                                        </label>
                                        <textarea class="form-control" id="special-requirements" rows="6"
                                            name="clientRequirement" <?php echo $fieldStatus; ?>><?php
                                            if ($showOrder[0]['clientRequirement'] != null ) {
                                                echo $showOrder[0]['clientRequirement'];
                                            }
                                            ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="tid" name="orderId"
                                            value="<?php echo $orderId; ?>">
                                    </div>
                                    <div class="text-center">

                                        <?php
                                            if($showOrder[0]['clientOrderStatus'] == 4){
                                                
                                                echo '<button class="btn btn-primary" name="articleSubmit" type="submit">Update</button>';

                                            }else if($showOrder[0]['clientOrderStatus'] == 3){
                                                
                                                echo '<button class="btn apply-button" name="changesReq" type="submit">Request for Changes</button>';
                                            
                                            }else if($showOrder[0]['clientOrderStatus'] == 6){
                                                
                                                echo '<p class="text-light bg-danger">'.$statusName[0][1].' Order\'s Contents can\'t be uploded</p>';
                                            
                                            }else{
                                                if ($delivered) {
                                                    echo '<p class="text-light bg-primary fw-bold fs-4"> Order '.$statusName[0][1].' </p>';
                                                }else{
                                                    echo '<p class="text-light bg-danger">'.$statusName[0][1].' Order\'s Contents can\'t be uploded</p>';
                                                }
                                            }
                                        ?>
                                    </div>
                                </div>
                            </form>



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
                            <input type="hidden" name="return-page" value="<?php echo $utility->currentUrl()?>">
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
        </script>

</body>

</html>