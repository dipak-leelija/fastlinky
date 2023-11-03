<?php
session_start();
require_once "includes/constant.inc.php";

require_once ROOT_DIR."/_config/dbconnect.php";

require_once ROOT_DIR."/classes/customer.class.php";
require_once ROOT_DIR."/classes/content-order.class.php";
require_once ROOT_DIR."/classes/orderStatus.class.php";
require_once ROOT_DIR."/classes/gp-order.class.php";
require_once ROOT_DIR."/classes/gp-package.class.php";
require_once ROOT_DIR."/classes/blog_mst.class.php";
require_once ROOT_DIR."/classes/utility.class.php";

/* INSTANTIATING CLASSES */
$customer		= new Customer();
$ContentOrder   = new ContentOrder();
$BlogMst		= new BlogMst();
$PackageOrder   = new PackageOrder();
$GPPackage      = new GuestPostpackage();
$OrderStatus    = new OrderStatus();
$utility		= new Utility();
######################################################################################################################
$typeM		= $utility->returnGetVar('typeM','');
//user id
$cusId		= $utility->returnSess('userid', 0);
$cusDtl		= $customer->getCustomerData($cusId);
require_once ROOT_DIR.'/includes/check-customer-login.inc.php';

$myOrders       = $ContentOrder->clientOrders($cusId);
$packOrders     = $PackageOrder->getPackOrderDetails($cusId, '*');


?>
<!DOCTYPE HTML>
<html lang="en">

<head>
    <meta name="robots" content="noindex,nofollow">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="<?php echo FAVCON_PATH?>" type="image/png" />
    <link rel="apple-touch-icon" href="<?php echo FAVCON_PATH?>" />
    <title>Package order history - <?php echo COMPANY_S; ?></title>

    <!-- Plugins Files -->
    <link href="<?= URL ?>/plugins/bootstrap-5.2.0/css/bootstrap.css" rel="stylesheet" />
    <?php require_once ROOT_DIR.'/plugins/font-awesome/fontawesome.php'?>

    <!-- Custom CSS -->
    <link href="<?= URL ?>/css/style.css" rel='stylesheet' type='text/css' />
    <link href="<?= URL ?>/css/dashboard.css" rel='stylesheet' type='text/css' />
    <link href="<?= URL ?>/css/my-orders.css" rel='stylesheet' type='text/css' />
    <link href="<?= URL ?>/css/order-list.css" rel='stylesheet' type='text/css' />
</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">
    <div id="home">
        <!-- header -->
        <?php  require_once ROOT_DIR."/components/navbar.php" ?>
        <!-- //header -->
        <!-- banner -->
        <div class="edit_profile">
            <div class="container-fluid">
                <!-- row start  -->
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
                        <!-- Guest Post Orders  Section-->
                        <div class="row m-0 w-100">
                            <div class="mb-3">
                                <h3 class="fw-bold text-center py-2">Package Order:</h3>
                            </div>

                            <?php
                                    $sl = 1;
                                    if (count($packOrders) > 0 ) {
                                        $showItems = 0;
                                        foreach ($packOrders as $eachPackOrd) {
                                            $ordPack    = $GPPackage->packDetailsById($eachPackOrd['package_id']);
                                            $packCat    = $GPPackage->packCatById($ordPack['category_id']);
                                            $status     = $OrderStatus->singleOrderStatus($eachPackOrd['order_status']);
                                            $pStatus    = $OrderStatus->singleOrderStatus($eachPackOrd['status']);  
                                    ?>
                            <div class="col-lg-10 m-auto">
                                <div class="card product_card   position-relative border rounded  mb-3">
                                    <div class="p-textdiv-card-history">
                                        <a href="package-order-history.php?order=<?php echo base64_encode(urlencode($eachPackOrd['order_id'])); ?>"
                                            class="text-dark">
                                            <h3 class="product-title-package-history"> Managed Link Building Basic
                                                <span
                                                    class="badge package-badges fs_p8 <?php echo $status[0]['orders_status_name'];?>"><?php echo $status[0]['orders_status_name'];?></span>
                                            </h3>
                                            <div>
                                                <small>
                                                    <b>
                                                        Transaction
                                                    </b>
                                                    :
                                                    <?php echo $eachPackOrd['transection_id'].' || '.$eachPackOrd['date'] ?>
                                                </small>
                                            </div>
                                            <div>
                                                <small>
                                                    <b>
                                                        Order Id
                                                    </b>
                                                    : <?php echo $eachPackOrd['order_id']; ?>
                                                </small>
                                            </div>
                                            <div>
                                                <small>
                                                    <b>
                                                        Price
                                                    </b>
                                                    : <?php echo $eachPackOrd['price']; ?>/package
                                                </small>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>


                            <?php
                                $showItems++;
                                            }
                                        }else {
                                        ?>

                            <div
                                class="product_card col-lg-5 m-auto text-center border border border-danger  border-1 rounded shadow py-4 mb-3">

                                <h3 class="product-title text-danger m-auto">No Orders</h3>
                                <a href="blogs-list.php" class="btn btn-sm btn-primary  w-25 mt-4">Explore</a>

                            </div>

                            <?php
                                        }

                                    ?>
                        </div>
                        <!-- Guest Post Orders  Section End-->

                    </div>
                </div>
                <!--// Row end-->
            </div>
        </div>
        <script src="<?= URL ?>/plugins/bootstrap-5.2.0/js/bootstrap.js" type="text/javascript"></script>
        <script src="<?= URL ?>/plugins/sweetalert/sweetalert2.all.min.js" type="text/javascript"></script>
        <script src="<?= URL ?>/plugins/data-table/simple-datatables.js"></script>
        <script src="<?= URL ?>/plugins/tinymce/tinymce.js"></script>
        <script src="<?= URL ?>/plugins/main.js"></script>
        <script src="<?= URL ?>/plugins/jquery-3.6.0.min.js"></script>
        <script src="<?= URL ?>/js/customerSwitchMode.js"></script>

        <script>
        /* jQuery Pagination */
        (function($) {

            var paginate = {
                startPos: function(pageNumber, perPage) {
                    return pageNumber * perPage;
                },
                getPage: function(items, startPos, perPage) {
                    var page = [];
                    items = items.slice(startPos, items.length);
                    for (var i = 0; i < perPage; i++) {
                        page.push(items[i]);
                    }
                    return page;
                },

                totalPages: function(items, perPage) {
                    return Math.ceil(items.length / perPage);
                },
                createBtns: function(totalPages, currentPage) {
                    var pagination = $('<div class="pagination" />');
                    pagination.append('<span class="pagination-button">&laquo;</span>');
                    for (var i = 1; i <= totalPages; i++) {
                        if (totalPages > 5 && currentPage !== i) {
                            if (currentPage === 1 || currentPage === 2) {
                                if (i > 5) continue;
                            } else if (currentPage === totalPages || currentPage === totalPages - 1) {
                                if (i < totalPages - 4) continue;
                            } else {
                                if (i < currentPage - 2 || i > currentPage + 2) {
                                    continue;
                                }
                            }
                        }
                        var pageBtn = $('<span class="pagination-button page-num" />');
                        if (i == currentPage) {
                            pageBtn.addClass('active');
                        }
                        pageBtn.text(i);
                        pagination.append(pageBtn);
                    }
                    pagination.append($('<span class="pagination-button">&raquo;</span>'));

                    return pagination;
                },

                createPage: function(items, currentPage, perPage) {
                    $('.pagination').remove();
                    var container = items.parent(),
                        items = items.detach().toArray(),
                        startPos = this.startPos(currentPage - 1, perPage),
                        page = this.getPage(items, startPos, perPage);

                    $.each(page, function() {
                        if (this.window === undefined) {
                            container.append($(this));
                        }
                    });
                    var totalPages = this.totalPages(items, perPage),
                        pageButtons = this.createBtns(totalPages, currentPage);

                    container.after(pageButtons);
                }
            };
            $.fn.paginate = function(perPage) {
                var items = $(this);
                if (isNaN(perPage) || perPage === undefined) {
                    perPage = 5;
                }
                if (items.length <= perPage) {
                    return true;
                }
                if (items.length !== items.parent()[0].children.length) {
                    items.wrapAll('<div class="pagination-items" />');
                }
                paginate.createPage(items, 1, perPage);
                $(document).on('click', '.pagination-button', function(e) {
                    var currentPage = parseInt($('.pagination-button.active').text(), 10),
                        newPage = currentPage,
                        totalPages = paginate.totalPages(items, perPage),
                        target = $(e.target);
                    newPage = parseInt(target.text(), 10);
                    if (target.text() == '«') newPage = 1;
                    if (target.text() == '»') newPage = totalPages;
                    if (newPage > 0 && newPage <= totalPages) {
                        paginate.createPage(items, newPage, perPage);
                    }
                });
            };

        })(jQuery);

        $('.product_card').paginate(4);
        </script>
</body>

</html>