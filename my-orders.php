<?php
session_start();
require_once "includes/constant.inc.php";

require_once ROOT_DIR."/_config/dbconnect.php";
require_once ROOT_DIR."/_config/dbconnect.trait.php";

require_once ROOT_DIR."/classes/encrypt.inc.php";

require_once ROOT_DIR."/classes/customer.class.php";
require_once ROOT_DIR."/classes/content-order.class.php";
require_once ROOT_DIR."/classes/gp-order.class.php";
require_once ROOT_DIR."/classes/gp-package.class.php";
require_once ROOT_DIR."/classes/orderStatus.class.php";
require_once ROOT_DIR."/classes/date.class.php";
require_once ROOT_DIR."/classes/utility.class.php";

/* INSTANTIATING CLASSES */
$customer		= new Customer();
$ContentOrder   = new ContentOrder();
$PackageOrder   = new PackageOrder();
$GPPackage      = new GuestPostpackage();
$OrderStatus    = new OrderStatus();
$DateUtil       = new DateUtil();
$utility		= new Utility();
######################################################################################################################
$typeM		= $utility->returnGetVar('typeM','');
//user id
$cusId		= $utility->returnSess('userid', 0);
$cusDtl		= $customer->getCustomerData($cusId);

require_once ROOT_DIR.'/includes/check-customer-login.inc.php';

$myOrders       = $ContentOrder->clientOrders($cusId);
$packOrders     = $PackageOrder->getPackOrderDetails($cusId, 5);
// $orders         = $Order->getOrdersByCusId($cusId);


?>
<!DOCTYPE HTML>
<html lang="zxx">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My Orders | <?php echo COMPANY_S; ?></title>
    <link rel="shortcut icon" href="<?php echo FAVCON_PATH?>" type="image/png" />
    <link rel="apple-touch-icon" href="<?php echo FAVCON_PATH?>" />

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo URL;?>/plugins/bootstrap-5.2.0/css/bootstrap.css" rel='stylesheet' type='text/css' />
    <link href="<?php echo URL;?>/plugins/fontawesome-6.1.1/css/all.css" rel='stylesheet' type='text/css' />
    <!-- Custom CSS -->

    <link href="<?php echo URL;?>/css/style.css" rel='stylesheet' type='text/css' />
    <link href="<?php echo URL;?>/css/leelija.css" rel='stylesheet' type='text/css' />
    <link href="<?php echo URL;?>/css/dashboard.css" rel='stylesheet' type='text/css' />
    <link href="<?php echo URL;?>/css/my-orders.css" rel='stylesheet' type='text/css' />
    <link href="<?php echo URL;?>/css/order-list.css" rel='stylesheet' type='text/css' />


    <!--//webfonts-->
    <link href="//fonts.googleapis.com/css?family=Montserrat:400,500,600,700,900" rel="stylesheet">


</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">
    <div id="home">
        <!-- header -->
        <?php  require_once ROOT_DIR."/partials/navbar.php" ?>
        <!-- //header -->

        <!-- banner -->
        <div class="edit_profile">
            <div class="container-fluid">
                <div class=" display-table">
                    <div class="row ">
                        <!--Row start-->
                        <div class="col-md-3 hidden-xs display-table-cell v-align" id="navigation">

                            <div class="client_profile_dashboard_left">
                                <?php include ROOT_DIR."/dashboard-inc.php";?>
                                <hr class="myhrline">
                            </div>

                        </div>
                        <div class="col-md-9 mt-4 ps-md-0 display-table-cell v-align ">
                            <!-- row -->
                            <div class="row">

                                <!-- ========================= -->
                                <!-- Guest Post Orders  Section-->
                                <div class="col-md-6">
                                    <div class=" mb-3">
                                        <h3 class="fw-bold text-center">Package Order :</h3>
                                    </div>
                                    <?php
                                    $sl = 1;
                                    if (count($packOrders) > 0 ) {
                                        foreach ($packOrders as $eachPackOrder) {
                                            $ordPack    = $GPPackage->packDetailsById($eachPackOrder['package_id']);
                                            $packCat    = $GPPackage->packCatById($ordPack['category_id']);
                                            $status     = $OrderStatus->singleOrderStatus($eachPackOrder['order_status']);
                                            $pStatus    = $OrderStatus->singleOrderStatus($eachPackOrder['status']); 
                                ?>

                                    <div class="card product_card  position-relative border rounded  mb-3">
                                        <div class="p-textdiv-card">
                                            <a href="package-order-history.php?order=<?php echo base64_encode(urlencode($eachPackOrder['order_id'])); ?>"
                                                class="text-dark">
                                                <h3 class="product-title maining-title">
                                                    <?php echo $packCat['category_name'].' '.$ordPack['package_name']; ?>
                                                    <span
                                                        class="badge fs_p8 <?php echo $status[0]['orders_status_name'];?>"><?php echo $status[0]['orders_status_name'];?></span>
                                                </h3>
                                                <div>
                                                    <small>
                                                        <b>
                                                            TRANSECTION
                                                        </b>
                                                        :<?php echo $eachPackOrder['transection_id'].'<b> || </b>'.$eachPackOrder['date'] ?>
                                                    </small>
                                                </div>
                                                <div>
                                                    <small>
                                                        <b>
                                                            ORDER ID
                                                        </b>
                                                        : #<?php echo $eachPackOrder['order_id']; ?>
                                                    </small>
                                                </div>
                                                <div>
                                                    <small>
                                                        <b>
                                                            Price
                                                        </b>
                                                        : <?php echo CURRENCY.$ordPack['price']; ?>/Package
                                                    </small>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <!-- ========================= -->

                                    <?php
                                        }
                                        ?>
                                    <div class="see_all">
                                        <a href="package-order-list.php">See All</a>
                                    </div>
                                    <?php
                                    }else {
                                    ?>
                                    <div
                                        class="product_card col-lg-5 text-center border border border-danger  border-1 rounded py-4 mb-3">
                                        <h3 class="product-title text-danger m-auto">No Orders</h3>
                                        <a href="blogs-list.php" class="btn btn-sm btn-primary  w-25 mt-4">Explore</a>
                                    </div>
                                    <?php
                                    }
                                    ?>
                                </div>
                                <!-- Package Orders Section End-->




                                <!-- ========================= -->
                                <!-- Guest Post Orders  Section-->
                                <div class="col-md-6">
                                    <div class=" mb-3">
                                        <h3 class="fw-bold text-center">Guest Post Order :</h3>
                                    </div>
                                    <?php
                                    $sl = 1;
                                    if (count($myOrders) > 0 ) {
                                        $showItems = 0;
                                        foreach ($myOrders as $order) {
                                            $status = $OrderStatus->singleOrderStatus($order['clientOrderStatus']);  
                                ?>

                                    <div class="card product_card  position-relative border rounded  mb-3">
                                        <div class="p-textdiv-card">
                                            <a href="guest-post-article-submit.php?order=<?php echo base64_encode(urlencode($order['order_id'])); ?>"
                                                class="text-dark">
                                                <h3 class="product-title maining-title">
                                                    <?php echo $order['clientOrderedSite']; ?>
                                                    <span
                                                        class="badge fs_p8 <?php echo $status[0]['orders_status_name'];?>"><?php echo $status[0]['orders_status_name'];?></span>
                                                </h3>
                                                <div>
                                                    <small>
                                                        <b>
                                                            ORDER ID
                                                        </b>
                                                        : #<?php echo $order['order_id'].'<b> || </b>'.$DateUtil->dateTimeNum2($order['added_on'], '-'); ?>
                                                    </small>
                                                </div>

                                                <div>
                                                    <span><i class="fa fa-angle-double-right me-1"></i>Ancor Text:
                                                        <?php echo $order['clientAnchorText'];?></span>
                                                    <br>
                                                    <span><i class="fa fa-angle-double-right me-1"></i>Target URL:
                                                        <?php echo $order['clientTargetUrl'];?></span>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <!-- ========================= -->

                                    <?php
                                            $showItems++;
                                            if ($showItems == 5) {
                                                break;
                                            }
                                        }
                                        ?>
                                    <div class="see_all">
                                        <a href="guest-post-order-list.php">See All</a>
                                    </div>
                                    <?php
                                    }else {
                                    ?>
                                    <div
                                        class="product_card col-lg-5 text-center border border border-danger  border-1 rounded py-4 mb-3">
                                        <h3 class="product-title text-danger m-auto">No Orders</h3>
                                        <a href="blogs-list.php" class="btn btn-sm btn-primary  w-25 mt-4">Explore</a>
                                    </div>
                                    <?php
                                    }
                                    ?>
                                </div>
                                <!-- Guest Post Orders  Section End-->


                            </div>
                            <!-- row -->


                        </div>
                        <!--Row end-->
                    </div>
                </div>
                <!-- //end display table-->
            </div>
        </div>
        <script src="<?php echo URL;?>/plugins/bootstrap-5.2.0/js/bootstrap.js" type="text/javascript"></script>
        <script src="<?php echo URL;?>/plugins/sweetalert/sweetalert2.all.min.js" type="text/javascript"></script>
        <script src="<?php echo URL;?>/plugins/data-table/simple-datatables.js"></script>
        <script src="<?php echo URL;?>/plugins/tinymce/tinymce.js"></script>
        <script src="<?php echo URL;?>/plugins/main.js"></script>
        <script src="<?php echo URL;?>/plugins/jquery-3.6.0.min.js"></script>

        <!-- //fixed-scroll-nav-js -->
        <script src="<?php echo URL;?>/js/customerSwitchMode.js"></script>

</body>
</html>