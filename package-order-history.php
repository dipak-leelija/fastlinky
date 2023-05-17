<?php
session_start();
require_once "includes/constant.inc.php";

require_once ROOT_DIR."/_config/dbconnect.php";
require_once ROOT_DIR."/includes/order-constant.inc.php";

require_once ROOT_DIR."/classes/customer.class.php";
require_once ROOT_DIR."/classes/gp-order.class.php";
require_once ROOT_DIR."/classes/gp-package.class.php";
require_once ROOT_DIR."/classes/orderStatus.class.php";
require_once ROOT_DIR."/classes/location.class.php";
require_once ROOT_DIR."/classes/date.class.php";
require_once ROOT_DIR."/classes/utility.class.php";
require_once ROOT_DIR."/classes/utilityMesg.class.php";

/* INSTANTIATING CLASSES */
$customer		= new Customer();
$PackageOrder   = new PackageOrder();
$GPPackage      = new GuestPostpackage();
$OrderStatus    = new OrderStatus();
$Location       = new Location();
$DateUtil       = new DateUtil();
$utility		= new Utility();
$uMesg          = new MesgUtility();
######################################################################################################################
$typeM		    = $utility->returnGetVar('typeM','');
//user id
$cusId		    = $utility->returnSess('userid', 0);
$cusDtl		    = $customer->getCustomerData($cusId);
$currentPage    = $utility->setCurrentPageSession();

require_once ROOT_DIR."/includes/check-customer-login.inc.php";

if(isset($_GET['order'])){
    $orderId			  		= urldecode(base64_decode($_GET['order']));
}else {
    header("Location: my-orders.php");
}

$order          = $PackageOrder->gpOrderById($orderId);
$orderStatus    = $order['order_status'];
$paymentMode    = $order['payment_type'];
$orderPrice     = $order['price'];
$buyer          = $customer->getCustomerData($order['customer_id']);
$package        = $GPPackage->packDetailsById($order['package_id']);
$packageCat     = $GPPackage->packCatById($package['category_id']);
$packFeatures   = $GPPackage->featureByPackageId($order['package_id']);
$updates        = $PackageOrder->getPackOrdUpdates($orderId, 'ASC');


?>


<!DOCTYPE HTML>
<html lang="en">

<head>
    <meta name="robots" content="noindex,nofollow">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="<?php echo FAVCON_PATH?>" type="image/png" />
    <link rel="apple-touch-icon" href="<?php echo FAVCON_PATH?>" />
    <title><?php echo $packageCat['category_name'].' '.$package['package_name'].' - '.COMPANY_S; ?></title>

    <!-- Plugins Files -->
    <link href="<?= URL ?>/plugins/bootstrap-5.2.0/css/bootstrap.css" rel="stylesheet">
    <?php require_once ROOT_DIR.'/plugins/font-awesome/fontawesome.php'?>

    <!-- Custom CSS -->
    <link href="<?php echo URL; ?>/css/style.css" rel='stylesheet' type='text/css' />
    <link href="<?php echo URL; ?>/css/dashboard.css" rel='stylesheet' type='text/css' />
    <link href="<?php echo URL; ?>/css/my-orders.css" rel='stylesheet' type='text/css' />
    <link href="<?php echo URL; ?>/css/order-list.css" rel='stylesheet' type='text/css' />

    <!--//webfonts-->
    <link href="//fonts.googleapis.com/css?family=Montserrat:400,500,600,700,900" rel="stylesheet">
    <script src="plugins/sweetalert/sweetalert2.all.min.js" type="text/javascript"></script>
</head>
<body>
    <div id="home">
        <!-- header -->
        <?php  require_once "partials/navbar.php" ?>
        <!-- //header -->

        <!-- banner -->
        <div class="edit_profile">
            <div class="container-fluid">
                <div class=" display-table">
                    <div class="row ">
                        <!--Row start-->
                        <div class="col-md-3 hidden-xs display-table-cell v-align " id="navigation">

                            <div class="client_profile_dashboard_left">
                                <?php include("dashboard-inc.php");?>
                                <hr class="myhrline">
                            </div>

                        </div>
                        <div class="col-md-9 ps-md-0 display-table-cell v-align  ">
                            <div class="div-border-css">
                                <!-- Details section Start  -->
                                <div class="p-3 p-kage-de-tails">
                                    <div class="row">
                                        <!-- Order Details Start -->
                                        <div class="col-md-6 ">
                                            <h5 class="pkage-title border-bottom pb-2">Order Details:</h5>
                                            <h5 class="pkage-headline pt-2">
                                                <?php echo $packageCat['category_name'].' '.$package['package_name']; ?>
                                            </h5>
                                            <p class="fs-6 fw-semibold"><?php echo $order['niche']; ?></p>
                                            <ul class="listing-adrs">
                                                <li> Order Id : <?php echo "#".$order['order_id']; ?>
                                                </li>
                                                <?php
                                            if ($order['transection_id'] != null) {
                                                echo '<li> Transection Id : '.$order['transection_id'];
                                            }
                                            ?>
                                                </li>
                                                <li> Price : <?php echo '$'.$orderPrice; ?></li>
                                                <?php
                                                $ordStatus = $OrderStatus->singleOrderStatus($orderStatus); 
                                                $payStatus = $OrderStatus->singleOrderStatus($order['status']);
                                                    ?>
                                                <li> Order : <?php echo $ordStatus[0][1]; ?></li>
                                                <li> Payment : <?php echo $payStatus[0][1]; ?></li>
                                                <li> Date :
                                                    <?php echo $DateUtil->fullDateTimeText($order['date']); ?>
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
                                <div class="card crd-box-fr-scroll mt-3">
                                    <div class="p-0 px-0 row m-0">
                                        <div class="col-12 col-md-6 m-auto">
                                            <div class="action_box">
                                                <h5 class="fw-bold text-center ">Upload Links</h5>
                                                <?php
                                                for ($i=1; $i <= $package['blog_post']; $i++) { 
                                                    $links = $PackageOrder->getPackOrdLinks($order['order_id'], $i);
                                                    $publishedStatus = $PackageOrder->getPackPubUrl($order['order_id'], $i);
                                                    $pulished = false;
                                                    $btnBg = '';

                                                    if (count($publishedStatus) > 0) {
                                                        $pulished = true;
                                                        $btnBg = 'bg_mustard';
                                                    }
                                                    
                                                    $existLinksNo = count($links);
                                                    if ($existLinksNo > 0) 
                                                        $btnIcon = 'fa-regular fa-circle-check px-3 text-primary';
                                                    else
                                                        $btnIcon = 'fa-solid fa-circle-exclamation px-3 text-warning';


                                                    echo "<button class='d-block  d_border mt-2 px-3 py-2  w-75 m-auto   ".$btnBg."' data-bs-toggle='modal' data-bs-target='#exampleModal-{$i}'>Link for {$utility->ordinal($i)} Post <i class='".$btnIcon."'></i></button>";

                                                ?>

                                                <!-- Modal start -->
                                                <div class="modal fade" id="exampleModal-<?php echo $i; ?>"
                                                    tabindex="-1" aria-labelledby="exampleModalLabel"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content px-md-4">
                                                            <form action="ajax/package-order-update.ajax.php"
                                                                method="POST">
                                                                <?php
                                                            if ($pulished) {
                                                                // echo 'Published';
                                                                ?>
                                                                <div class="modal-header">
                                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">
                                                                        <?php echo $utility->ordinal($i); ?> Post
                                                                        Published
                                                                        Link
                                                                    </h1>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal"
                                                                        aria-label="Close"></button>
                                                                </div>

                                                                <div class="modal-body" id="update-modal-body">
                                                                    <input type="text" class="form-control mt-1"
                                                                        value="<?php echo $publishedStatus['url']; ?>">
                                                                </div>

                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">Close</button>
                                                                </div>
                                                                <?php
                                                            }else{
                                                            ?>
                                                                <div class="modal-header">
                                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">
                                                                        Link for <?php echo $utility->ordinal($i); ?>
                                                                        Post
                                                                    </h1>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal"
                                                                        aria-label="Close"></button>
                                                                </div>

                                                                <div class="modal-body" id="update-modal-body">
                                                                    <div class="mb-3" id="fieldBox-<?php echo $i; ?>">
                                                                        <?php
                                                                    if ($existLinksNo > 0) {
                                                                        $linkNo = 0;
                                                                        foreach ($links as $eachLink) {
                                                                        $linkNo ++;
                                                                        ?>
                                                                        <div class="mb-4"
                                                                            id="linkBox-<?php echo $linkNo; ?>">
                                                                            <label for="ancortext"
                                                                                class="form-label fw-bold mb-0">Link
                                                                                <?php echo $linkNo; ?></label>

                                                                            <div class="text-danger fs-small">
                                                                                <?php
                                                                            $border = '';
                                                                            $issues = $PackageOrder->getPackOrdLinksIssue($eachLink['id']);
                                                                            if (count($issues) > 0) {
                                                                                $border = 'border-danger';
                                                                                foreach ($issues as $eachIssue) {
                                                                                    echo $eachIssue['issue']; 
                                                                                }
                                                                            }
                                                                            ?>
                                                                            </div>

                                                                            <input type="text"
                                                                                class="form-control <?php echo $border; ?>"
                                                                                name="ancortext[]"
                                                                                placeholder="Ancor Text" value="<?php
                                                                            echo $eachLink['anchor']; ?>">
                                                                            <input type="text"
                                                                                class="form-control mt-1 <?php echo $border; ?>"
                                                                                name="url[]" placeholder="URL" value="<?php
                                                                            echo $eachLink['url']; ?>">


                                                                            <div
                                                                                class="d-flex justify-content-end mt-1">

                                                                                <span class=" badge rounded-pill text-danger
                                                                                border border-danger ms-2
                                                                                cursor_pointer"
                                                                                    onclick="deleteElement('linkBox-<?php echo $linkNo; ?>')">Remove</span>
                                                                            </div>
                                                                        </div>
                                                                        <?php
                                                                        }
                                                                    }else {
                                                                        $linkNo = 1;
                                                                        echo '
                                                                        <div>
                                                                            <label for="ancortext"
                                                                                class="form-label mb-0">Link '.$linkNo.'</label>
                                                                            <input type="text" class="form-control"
                                                                                name="ancortext[]" placeholder="Ancor Text">
                                                                            <input type="text" class="form-control mt-1"
                                                                                name="url[]" placeholder="URL">
                                                                        </div>';
                                                                    }
                                                                    ?>
                                                                        <input type="hidden" name="order-id"
                                                                            value="<?php echo $order['order_id']; ?>">
                                                                        <input type="hidden" name="for-post"
                                                                            value="<?php echo $i?>">
                                                                        <input type="hidden" name="sectionAdded"
                                                                            id="sectionAdded-<?php echo $i; ?>"
                                                                            value="<?php echo $linkNo;?>">
                                                                    </div>
                                                                    <?php
                                                                if ($existLinksNo >= 3 ) {
                                                                    $addBtnDispaly = 'd-none';
                                                                }else {
                                                                    $addBtnDispaly = 'd-block';
                                                                } ?>
                                                                    <div class="text-end <?php echo $addBtnDispaly; ?>">
                                                                        <button type="button"
                                                                            class="btn btn-sm btn-primary"
                                                                            onclick="addField('fieldBox-<?php echo $i; ?>', 'sectionAdded-<?php echo $i; ?>', 3)">Add</button>
                                                                    </div>
                                                                </div>

                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-bs-dismiss="modal"
                                                                        onclick="reloadPage()">Close</button>
                                                                    <button type="submit" class="btn btn-primary"
                                                                        id="modal-action-btn">Save
                                                                        changes</button>
                                                                </div>
                                                                <?php
                                                            }
                                                            ?>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- modal end  -->

                                                <?php } ?>
                                                <!-- for loop end  -->

                                                <?php if ($orderStatus == DELIVEREDCODE): ?>

                                                <div class="d-flex justify-content-evenly p-4 ">
                                                    <button class="btn btn-danger w-25">Raise Issue</button>
                                                    <button class="btn btn-primary w-25"
                                                        onclick="finishOrder(<?= $orderId; ?>)">Finish</button>
                                                </div>

                                                <?php endif; ?>


                                                <?php if ($orderStatus == COMPLETEDCODE){
                                                    $LastUpdate = $PackageOrder->getLastUpdateTime($orderId);
                                                    $LastUpdate = $DateUtil->fullDateTimeText($LastUpdate);
                                                    
                                                    echo '<p class="fw-bold text-center mt-3">Order Completed On '.$LastUpdate.'</p>';
                                                    
                                                    if ($paymentMode == PAYLATER) {
                                                        
                                                        echo '<div class="text-center mt-2">
                                                                <button class="btn btn-sm btn-primary w-25">Pay Now</button>
                                                            </div>';

                                                    }

                                                } ?>
                                            </div>
                                        </div>
                                        <!-- right col start  -->
                                        <div class="col-12 col-md-6">
                                            <div class="stretch-card grid-margin">
                                                <h5 class="fw-bold mt-3 mt-md-0 mb-2 text-center text-md-start">Updates
                                                </h5>

                                                <div class="card status_card extra-scroll-add">
                                                    <div class="card-body p-0">
                                                        <ul class="icon-data-list">

                                                            <?php
                                                      foreach ($updates as $ordUpdate) {
                                                       ?>

                                                            <li>
                                                                <div class="d-flex">
                                                                    <img src="<?php echo URL?>/images/user/default-user-icon.png"
                                                                        alt="user">
                                                                    <div>
                                                                        <h5 class="text-info mb-0">
                                                                            <?php
                                                                $updateShow = $OrderStatus->singleOrderStatus($ordUpdate['status']);
                                                                echo $updateShow[0][1];
                                                                ?>
                                                                        </h5>
                                                                        <p class="mb-0">
                                                                            <?php
                                                                        if ($ordUpdate['dsc'] != null) {
                                                                            echo $ordUpdate['dsc'] . '<br>';
                                                                        }

                                                                        if ($ordUpdate['updator'] != null) {
                                                                            echo '<small>By ' . $ordUpdate['updator'] . '</small> <br>';
                                                                        }
                                                                        ?>
                                                                            <small><?php echo $ordUpdate['added_on']; ?></small>
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                                <hr>
                                                            </li>
                                                            <?php
                                                       }
                                                       ?>

                                                        </ul>
                                                    </div>
                                                </div>

                                                <div class="">
                                                    <button type="button" class="btn btn-primary w-100"
                                                        style="    border-radius:0px 0px 0.375rem 0.375rem; border-top:none;"
                                                        data-bs-toggle="modal" data-bs-target="#exampleModal">View
                                                        More</button>
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="exampleModal" tabindex="-1"
                                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-lg m-0 m-sm-auto">
                                                            <div class="modal-content px-0 px-md-4">
                                                                <div class="modal-header">
                                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">
                                                                        Updates
                                                                    </h1>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal" aria-label="Close">
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body p-2">
                                                                    <div class="col-12 ">
                                                                        <div class="stretch-card grid-margin">
                                                                            <div class="card status_card "
                                                                                style="   overflow-y: scroll; max-height: 500px;">
                                                                                <div class="card-body p-0">
                                                                                    <ul class="icon-data-list">

                                                                                        <?php
                                                                                        foreach ($updates as $ordUpdate) {
                                                                                        ?>
                                                                                        <li>
                                                                                            <div class="d-flex">
                                                                                                <img src="<?php echo URL?>/images/user/default-user-icon.png"
                                                                                                    alt="user">
                                                                                                <div>
                                                                                                    <h5
                                                                                                        class="text-info mb-0">
                                                                                                        <?php
                                                                                                        $updateShow = $OrderStatus->singleOrderStatus($ordUpdate['status']);
                                                                                                        echo $updateShow[0][1];
                                                                                                        ?>
                                                                                                    </h5>
                                                                                                    <p class="mb-0">
                                                                                                        <?php
                                                                                                        if ($ordUpdate['dsc'] != null) {
                                                                                                            echo $ordUpdate['dsc'] . '<br>';
                                                                                                        }

                                                                                                        if ($ordUpdate['updator'] != null) {
                                                                                                            echo '<small>By ' . $ordUpdate['updator'] . '</small> <br>';
                                                                                                        }
                                                                                                        ?>
                                                                                                        <small><?php echo $ordUpdate['added_on']; ?></small>
                                                                                                    </p>
                                                                                                </div>
                                                                                            </div>
                                                                                            <hr>
                                                                                        </li>
                                                                                        <?php
                                             }
                                             ?>
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

                                        </div>
                                        <!-- right col end  -->

                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                    <!--Row end-->
                </div>
                <!-- //end display table-->
            </div>


        </div>
        <script src="<?php echo URL; ?>/plugins/jquery-3.6.0.min.js"></script>
        <script src="<?php echo URL; ?>/plugins/bootstrap-5.2.0/js/bootstrap.js" type="text/javascript"></script>
        <script src="<?php echo URL; ?>/js/script.js"></script>
        <script src="<?php echo URL; ?>/js/customerSwitchMode.js"></script>
        <script src="<?php echo URL; ?>/plugins/sweetalert/sweetalert2.all.min.js" type="text/javascript"></script>
        <script src="<?php echo URL; ?>/js/ajax.js" type="text/javascript"></script>
        <script>
        const addField = (secId, curSecNumsField = '', maxSec) => {
            curentNumSec = incrFieldValue(curSecNumsField, maxSec);
            if (curentNumSec <= maxSec) {

                let sec = document.getElementById(secId);
                let newsec = `<div>
                <label for="ancortext" class="form-label mb-0 mt-2">Link ${curentNumSec}</label>
                <input type="text" class="form-control" name="ancortext[]" placeholder="Ancor Text">
                <input type="text" class="form-control mt-1" name="url[]" placeholder="URL">
                </div>`;
                sec.insertAdjacentHTML('beforeend', newsec);
            } else {
                alert('Maximum Link Added');
            }
        }

        const incrFieldValue = (curSecNumsField, maxSec) => {
            let nums = document.getElementById(curSecNumsField);
            let currentNum = nums.value;
            let curentNumSec = nums.value = Number(currentNum) + 1;
            return curentNumSec;
        }





        const finishOrder = (orderId) => {
            Swal.fire({
                title: 'Are you sure?',
                // text: "Changes Completed!",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, Finish'
            }).then((result) => {
                if (result.isConfirmed) {

                    $.ajax({
                        url: "admin/ajax/package-status-updates.ajax.php",
                        type: "POST",
                        data: {
                            finishOrder: orderId,
                        },
                        success: function(response) {
                            // console.log(response);
                            if (response.includes('finished!')) {
                                location.reload();
                            } else {
                                Swal.fire(
                                    'Failed!',
                                    response,
                                    'error'
                                )
                            }

                        }
                    });

                }
            })
        }



        // if(request.status == 200)
        // {
        // 	var xmlResponse = request.responseText;

        // 	document.getElementById("edit-file").innerHTML = xmlResponse;
        // 	$("#editfile-form").on('submit',(function(e) {

        // 	}));
        // }
        // else if(request.status == 404)
        // {
        // 	alert("Request page doesn't exist");
        // }
        </script>

</body>

</html>