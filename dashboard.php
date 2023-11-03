<?php
require_once "includes/constant.inc.php";
session_start();

require_once ROOT_DIR."/_config/dbconnect.php";

require_once ROOT_DIR."/classes/customer.class.php";
require_once ROOT_DIR."/classes/content-order.class.php";
require_once ROOT_DIR."/classes/blog_mst.class.php";
require_once ROOT_DIR."/classes/orderStatus.class.php";
require_once ROOT_DIR."/classes/date.class.php";
require_once ROOT_DIR."/classes/utility.class.php";


/* INSTANTIATING CLASSES */
$customer		= new Customer();
$ContentOrder   = new ContentOrder();
$BlogMst		= new BlogMst();
$OrderStatus    = new OrderStatus();
$DateUtil       = new DateUtil();
$utility		= new Utility();
######################################################################################################################
$typeM		= $utility->returnGetVar('typeM','');
//user id
$cusId		= $utility->returnSess('userid', 0);
$cusDtl		= $customer->getCustomerData($cusId);

require_once ROOT_DIR."/includes/check-seller-login.inc.php";

$blogsDtls 	    = $BlogMst->ShowUserBlogData($cusDtl[0][2]);
$sellerOrders   = $ContentOrder->contentOrdersBySeller($cusDtl[0][2]);
$mostSelling    = $BlogMst->mostSellingBlogs($cusId);


?>
<!DOCTYPE HTML>
<html lang="zxx">

<head>
    <meta name="robots" content="noindex,nofollow">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Seller Dashboard - <?php echo COMPANY_S; ?></title>
    <link rel="shortcut icon" href="<?php echo FAVCON_PATH?>" type="image/png" />
    <link rel="apple-touch-icon" href="<?php echo FAVCON_PATH?>" />

    <!-- Plugins Files -->
    <link href="<?= URL ?>/plugins/bootstrap-5.2.0/css/bootstrap.css" rel="stylesheet" />
    <?php require_once ROOT_DIR.'/plugins/font-awesome/fontawesome.php'?>

    <!-- Custom CSS -->
    <link href="<?= URL ?>/css/style.css" rel='stylesheet' type='text/css' />
    <link href="<?= URL ?>/css/form.css" rel='stylesheet' type='text/css' />
    <link href="<?= URL ?>/css/dashboard.css" rel='stylesheet' type='text/css' />
    <link href="<?= URL ?>/css/order-list.css" rel='stylesheet' type='text/css' />

</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">
    <div id="home">
        <!-- header -->
        <?php require_once ROOT_DIR.'/components/navbar.php'; ?>
        <!-- //header -->
        <!-- banner -->
        <div class="edit_profile" style="overflow: hidden;">
            <div class="container-fluid">
                <div class=" display-table">
                    <div class="row ">
                        <!--Row start-->
                        <div class="col-md-3 hidden-xs display-table-cell v-align" id="navigation">
                            <div class="client_profile_dashboard_left">
                                <?php include ROOT_DIR.'/dashboard-inc.php';?>
                                <hr class="myhrline">
                            </div>

                        </div>
                        <div class="col-md-9 mt-0 ps-md-0 display-table-cell v-align client_profile_dashboard_right">
                            <div class=" p-0">
                                <header>
                                    <!-- dasboard top cards -->
                                    <div class="row">

                                        <div class="col-lg-3 col-sm-6">
                                            <div class="dboard-cd-box mt-md-0">
                                                <div class="inner">
                                                    <h3> $00.00 </h3>
                                                    <p> Balance </p>
                                                </div>
                                                <div class="dboard-icn_font">
                                                    <i class="fa-solid fa-sack-dollar" aria-hidden="true"></i>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-sm-6">
                                            <div class="dboard-cd-box mt-md-0">
                                                <div class="inner">
                                                    <h3> 00 </h3>
                                                    <p> My Reward </p>
                                                </div>
                                                <div class="dboard-icn_font">
                                                    <i class="fa-solid fa-medal" aria-hidden="true"></i>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="col-lg-3 col-sm-6">
                                            <a href="edit-profile.php">
                                                <div class="dboard-cd-box mt-md-0 ">
                                                    <div class="inner">
                                                        <h3>
                                                            <?php
                                                                $newOrders = 0;
                                                                foreach ($sellerOrders as $eachOrder) {
                                                                    if ($eachOrder['clientOrderStatus'] == 4) {
                                                                        $newOrders += 1;
                                                                    }
                                                                }
                                                                echo $newOrders; 
                                                            ?>
                                                        </h3>

                                                        <p>New Orders</p>
                                                    </div>
                                                    <div class="dboard-icn_font" aria-hidden="true">
                                                        <i class="fa-solid fa-cart-plus"></i>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>

                                        <div class="col-lg-3 col-sm-6">
                                            <a href="my-guest-post.php">
                                                <div class="dboard-cd-box mt-md-0">
                                                    <div class="inner">
                                                        <h3><?php echo count($sellerOrders); ?> </h3>
                                                        <p> Total Orders</p>
                                                    </div>
                                                    <div class="dboard-icn_font">
                                                        <i class="fa-solid fa-cart-shopping" aria-hidden="true"></i>
                                                    </div>

                                                </div>
                                            </a>
                                        </div>

                                    </div>
                                </header>
                                <div class="row">
                                    <div class=" col-lg-6 ">
                                        <div class=" table-responsive py-3 p-1">
                                            <h4>Guest Posting Blogs</h4>
                                            <div class="card table-responsive db_shadow border-0 p-2">
                                                <table class="table table-hover">

                                                    <thead style="color: white; background: #212529;">
                                                        <tr>
                                                            <th style="width: fit-content;">Order Id</th>
                                                            <th style="width: fit-content;">Domian</th>
                                                            <th style="width: fit-content;">Status</th>
                                                            <th style="width: fit-content;">Order Date</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                    $noOrders = false;
                                                    $sl = 0;

                                                    if (count($sellerOrders) > 0) {
                                                        foreach ($sellerOrders as $order) {
                                                            $sl ++;
                                                            $status = $OrderStatus->singleOrderStatus($order['clientOrderStatus']);
                                                            echo '<tr>
                                                                    <td>#'.$order['order_id'].'</td>
                                                                    <td>'.$order['clientOrderedSite'].'</td>
                                                                    <td>
                                                                        <span class="badge text-bg-primary '.$status[0]["orders_status_name"].'">'.$status[0]["orders_status_name"].'<span>
                                                                    </td>
                                                                    <td class="text-center">'.$DateUtil->dateTimeNumber($order['added_on']).'</td>
                                                                </tr>';
                                                            
                                                            if ($sl == 7) {
                                                                break;
                                                            }
                                                        }
                                                    }else {
                                                        $noOrders = true;
                                                    }
                                                    ?>
                                                    </tbody>
                                                </table>
                                                <?php
                                                if ($noOrders == true) {
                                                    echo '<div class="border border-danger rounded p-1">
                                                            <p class="text-primary">No Orders</p>
                                                        </div>';
                                                }
                                                ?>
                                            </div>
                                        </div>

                                    </div>
                                    <div class=" col-lg-6">
                                        <a href="notifications.php">
                                            <div class="pt-3 pb-0 p-0">
                                                <h4 class="text-dark">Recent Notification</h4>
                                                <div class="alert alert-warning db_shadow" role="alert">
                                                    <strong> No Notifications</strong>
                                                </div>
                                            </div>
                                        </a>
                                        <div class="col-lg-12 ">
                                            <div class="table-responsive py-2 p-1">
                                                <h4>Most Posting Blogs</h4>
                                                <div class="card table-responsive db_shadow border-0 p-2">
                                                    <table class="table table-hover">
                                                        <thead class="table-light">
                                                            <tr>
                                                                <th scope="col">SL. NO.</th>
                                                                <th scope="col">Domain</th>
                                                                <th scope="col">Sold</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                        if (count($mostSelling) > 0) {
                                                            $sl = 1;
                                                            foreach ($mostSelling as $blog) {
                                                                echo'
                                                                <tr>
                                                                <th scope="row">'.$sl++.'</th>
                                                                <td>'.$blog['domain'].'</td>
                                                                <td>'.$blog['sold_qty'].'<small> Times</small></td>
                                                                </tr>';
                                                            }
                                                        }else {
                                                            $sl = 0;
                                                        }
                                                        ?>
                                                        </tbody>
                                                    </table>
                                                    <?php
                                                    if ($sl == 0) {
                                                    }
                                                    ?>
                                                    <div class="text-info">
                                                        No Order yet!
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Row end-->
                    </div>
                </div>
                <!-- //end display table-->
            </div>
        </div>
        <!-- js-->
        <script src="<?= URL ?>/plugins/jquery-3.6.0.min.js"></script>
        <script src="<?= URL ?>/plugins/bootstrap-5.2.0/js/bootstrap.bundle.js"></script>
        <script src="<?= URL ?>/js/customerSwitchMode.js"></script>

</body>

</html>