<?php
session_start();
require_once "includes/constant.inc.php";

require_once ROOT_DIR."/_config/dbconnect.php";
require_once ROOT_DIR."/_config/dbconnect.trait.php";

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
$buyer          = $customer->getCustomerData($order['customer_id']);
$package        = $GPPackage->packDetailsById($order['package_id']);
$packageCat     = $GPPackage->packCatById($package['category_id']);
$packFeatures   = $GPPackage->featureByPackageId($order['package_id']);
$updates        = $PackageOrder->getPackOrdUpdates($orderId, 'ASC');


?>


<!DOCTYPE HTML>
<html lang="zxx">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="<?php echo FAVCON_PATH?>" type="image/png" />
    <link rel="apple-touch-icon" href="<?php echo FAVCON_PATH?>" />
    <title><?php echo $packageCat['category_name'].' '.$package['package_name'].' - '.COMPANY_S; ?></title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo URL; ?>/plugins/bootstrap-5.2.0/css/bootstrap.css" rel='stylesheet' type='text/css' />
    <!-- font-awesome icons -->
    <link href="<?php echo URL; ?>/plugins/fontawesome-6.1.1/css/all.css" rel='stylesheet' type='text/css' />
    <!-- Custom CSS -->
    <link href="<?php echo URL; ?>/css/style.css" rel='stylesheet' type='text/css' />
    <link href="<?php echo URL; ?>/css/leelija.css" rel='stylesheet' type='text/css' />
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
                                                <li> Price : <?php echo '$'.$order['price']; ?></li>
                                                <?php
                                                $ordStatus = $OrderStatus->singleOrderStatus($order['order_status']); 
                                                $payStatus = $OrderStatus->singleOrderStatus($order['status']);
                                                // foreach($packFeatures as $feature){
                                                //     echo $feature['features'];
                                                // }
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
                                <div class="p-3 row">
                                    <div class="col-12 col-md-6">
                                        <div class="action_box">
                                            <h5 class="fw-bold">Upload Links</h5>
                                            <?php
                                            for ($i=1; $i <= $package['blog_post']; $i++) { 
                                                $links = $PackageOrder->getPackOrdLinks($order['order_id'], $i);
                                                
                                                $existLinksNo = count($links);
                                                if ($existLinksNo > 0) 
                                                    $btnIcon = 'fa-regular fa-circle-check px-3 text-primary';
                                                else
                                                    $btnIcon = 'fa-solid fa-circle-exclamation px-3 text-warning';


                                                echo "<button class='d-block d_border mt-2 px-5 py-2 w-50' data-bs-toggle='modal' data-bs-target='#exampleModal-{$i}'>Link for {$utility->ordinal($i)} Post <i class='".$btnIcon."'></i></button>";

                                            ?>
                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModal-<?php echo $i; ?>" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content px-md-4">
                                                        <form action="ajax/package-order-update.ajax.php" method="POST">
                                                            <div class="modal-header">
                                                                <h1 class="modal-title fs-5" id="exampleModalLabel">
                                                                    Link for <?php echo $utility->ordinal($i); ?> Post
                                                                </h1>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
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

                                                                        <input type="text" class="form-control <?php echo $border; ?>"
                                                                            name="ancortext[]" placeholder="Ancor Text"
                                                                            value="<?php
                                                                            echo $eachLink['anchor']; ?>">
                                                                        <input type="text" class="form-control mt-1 <?php echo $border; ?>"
                                                                            name="url[]" placeholder="URL" value="<?php
                                                                            echo $eachLink['url']; ?>">


                                                                        <div class="d-flex justify-content-end mt-1">

                                                                            <!-- <span
                                                                                class="badge rounded-pill text-danger border border-danger ms-2 cursor_pointer">Issues</span> -->

                                                                            <span class=" badge rounded-pill text-danger
                                                                                border border-danger ms-2
                                                                                cursor_pointer"
                                                                                onclick="deleteElement('linkBox-<?php echo $linkNo; ?>')">Delete</span>
                                                                        </div>
                                                                        <!-- <span class="cursor_pointer">
                                                                            <i class="fa-solid fa-xmark text-danger"></i>
                                                                        </span> -->
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
                                                                <div class="text-end">
                                                                    <button type="button" class="btn btn-sm btn-primary"
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
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                    </div>

                                    <!-- right col start  -->
                                    <div class="col-12 col-md-6">

                                        <div class="stretch-card grid-margin mt-4">
                                            <div class="card status_card rounded-1r border shadow">
                                                <div class="card-body">
                                                    <p class="card-title">Updates</p>
                                                    <ul class="icon-data-list">

                                                        <?php
                                            foreach ($updates as $ordUpdate) {
                                            ?>

                                                        <li>
                                                            <div class="d-flex">
                                                                <img src="<?php echo URL?>/images/user/default-user-icon.png"
                                                                    alt="user">
                                                                <div>
                                                                    <p class="text-info mb-1">
                                                                        <?php
                                                                $updateShow = $OrderStatus->singleOrderStatus($ordUpdate['status']);
                                                                echo $updateShow[0][1];
                                                                ?>
                                                                    </p>
                                                                    <p class="mb-0">
                                                                        <?php
                                                                        if ($ordUpdate['dsc'] != null) {
                                                                            echo $ordUpdate['dsc'] . '<br>';
                                                                        }

                                                                        if ($ordUpdate['updator'] != null) {
                                                                            echo '<small>By ' . $ordUpdate['updator'] . '</small>';
                                                                        }
                                                                        ?>
                                                                    </p>
                                                                    <small><?php echo $ordUpdate['added_on']; ?></small>
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
                                    <!-- right col end  -->

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
        </script>

</body>

</html>