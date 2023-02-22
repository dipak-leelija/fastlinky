<?php
session_start();

require_once("_config/dbconnect.php");
require_once "_config/dbconnect.trait.php";

require_once "includes/constant.inc.php";
require_once "classes/encrypt.inc.php";

require_once "classes/customer.class.php";
require_once "classes/content-order.class.php";
require_once "classes/gp-order.class.php";
require_once "classes/orderStatus.class.php";
// require_once "classes/order.class.php";
require_once "classes/domain.class.php";
require_once "classes/blog_mst.class.php";
require_once "classes/utility.class.php";

/* INSTANTIATING CLASSES */
$customer		= new Customer();
$ContentOrder   = new ContentOrder();
$Gporder        = new Gporder();
// $Order          = new Order();
$Domain         = new Domain();
$BlogMst		= new BlogMst();
$OrderStatus    = new OrderStatus();
$utility		= new Utility();
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
$myOrders       = $ContentOrder->clientOrders($cusId);
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
    <link href="plugins/bootstrap-5.2.0/css/bootstrap.css" rel='stylesheet' type='text/css' />
    <link href="plugins/fontawesome-6.1.1/css/all.css" rel='stylesheet' type='text/css' />
    <!-- Custom CSS -->

    <link href="css/style.css" rel='stylesheet' type='text/css' />
    <link href="css/leelija.css" rel='stylesheet' type='text/css' />
    <link href="css/dashboard.css" rel='stylesheet' type='text/css' />
    <link href="css/my-orders.css" rel='stylesheet' type='text/css' />
    <link href="css/order-list.css" rel='stylesheet' type='text/css' />

    <!-- font-awesome icons -->
    <!-- <link href="css/fontawesome-all.min.css" rel="stylesheet"> -->

    <!-- Datatable CSS  -->
    <link rel="stylesheet" href="plugins/data-table/style.css">


    <!--//webfonts-->
    <link href="//fonts.googleapis.com/css?family=Montserrat:400,500,600,700,900" rel="stylesheet">


</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">
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
                        <div class="col-md-9 mt-4 ps-md-0 display-table-cell v-align ">




                            <!-- Guest Post Orders  Section-->
                            <div class="row justify-content-evenly dashorder_row guest_post_orders ">

                                <div class=" mb-3">
                                    <h3 class="fw-bold text-center">Guest Posts:</h3>
                                </div>

                                <?php
                                    $sl = 1;
                                    if (count($myOrders) > 0 ) {
                                        $showItems = 0;
                                        foreach ($myOrders as $order) {
                                            $status = $OrderStatus->singleOrderStatus($order['clientOrderStatus']);  
                                ?>

                                <!-- ========================= -->

                                <div class="card product_card col-xl-10  position-relative border rounded  mb-3">
                                    <div>
                                        <a href="guest-post-article-submit.php?order=<?php echo base64_encode(urlencode($order['order_id'])); ?>"
                                            class="text-dark">

                                            <!-- ============== Order Status start ==============  -->
                                            <div class="orderStatus <?php echo $status[0]['orders_status_name'];?>">
                                                <p><?php echo $status[0]['orders_status_name'];?></p>
                                            </div>
                                            <!-- ============== Order Status end ==============  -->

                                            <h3 class="product-title maining-title">
                                                <?php echo $order['clientOrderedSite']; ?></h3>
                                            <small>
                                                <b>
                                                    TRANSECTION
                                                </b>
                                                :<?php echo $order['clientTransactionId'].' || '.$order['added_on'] ?>
                                            </small>
                                            <small>
                                                <b>
                                                    ORDER ID
                                                </b>
                                                :<?php echo $order['order_id']; ?>
                                            </small>
                                            <div>
                                                <span><i class="fa fa-angle-double-right me-1"></i>Ancor Text:
                                                    <?php echo $order['clientAnchorText'];?></span>
                                                <br>
                                                <span><i class="fa fa-angle-double-right me-1"></i>Target URL:
                                                    <?php echo $order['clientTargetUrl'];?></span>
                                            </div>
                                            <div class="d-flex justify-content-between pt-2">
                                                <!-- <div class="col-6 text-end"> -->
                                                <?php
                                                        //============== payment Status start ============== 
                                                        if($order['paymentStatus'] != ''){
                                                            if ($order['paymentStatus'] == "Completed") 
                                                                $payStatus = 'complete-status';
                                                            else
                                                                $payStatus = '';


                                                            echo '<p class="'.$payStatus.'">Payment : '.$order['paymentStatus'].'</p>';
                                                        }
                                                        //============== payment Status end ============== 
                                                ?>
                                            </div>
                                        </a>
                                    </div>
                                </div>

                                <!-- ========================= -->
                                <?php
                                            $showItems++;
                                            if ($showItems == 8) {
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
                        <!--Row end-->
                    </div>
                </div>
                <!-- //end display table-->
            </div>
        </div>
        <script src="plugins/bootstrap-5.2.0/js/bootstrap.js" type="text/javascript"></script>
        <script src="plugins/sweetalert/sweetalert2.all.min.js" type="text/javascript"></script>
        <script src="plugins/data-table/simple-datatables.js"></script>
        <script src="plugins/tinymce/tinymce.js"></script>
        <script src="plugins/main.js"></script>
        <script src="plugins/jquery-3.6.0.min.js"></script>

        <!-- //fixed-scroll-nav-js -->
        <!-- <script src="js/pageplugs/fixedNav.js"></script> -->
        <script src="js/customerSwitchMode.js"></script>
        <script>
        /* jQuery Pagination */

        (function($) {

            var paginate = {
                startPos: function(pageNumber, perPage) {
                    // determine what array position to start from
                    // based on current page and # per page
                    return pageNumber * perPage;
                },

                getPage: function(items, startPos, perPage) {
                    // declare an empty array to hold our page items
                    var page = [];

                    // only get items after the starting position
                    items = items.slice(startPos, items.length);

                    // loop remaining items until max per page
                    for (var i = 0; i < perPage; i++) {
                        page.push(items[i]);
                    }

                    return page;
                },

                totalPages: function(items, perPage) {
                    // determine total number of pages
                    return Math.ceil(items.length / perPage);
                },

                createBtns: function(totalPages, currentPage) {
                    // create buttons to manipulate current page
                    var pagination = $('<div class="pagination" />');

                    // add a "first" button
                    pagination.append('<span class="pagination-button">&laquo;</span>');

                    // add pages inbetween
                    for (var i = 1; i <= totalPages; i++) {
                        // truncate list when too large
                        if (totalPages > 5 && currentPage !== i) {
                            // if on first two pages
                            if (currentPage === 1 || currentPage === 2) {
                                // show first 5 pages
                                if (i > 5) continue;
                                // if on last two pages
                            } else if (currentPage === totalPages || currentPage === totalPages - 1) {
                                // show last 5 pages
                                if (i < totalPages - 4) continue;
                                // otherwise show 5 pages w/ current in middle
                            } else {
                                if (i < currentPage - 2 || i > currentPage + 2) {
                                    continue;
                                }
                            }
                        }

                        // markup for page button
                        var pageBtn = $('<span class="pagination-button page-num" />');

                        // add active class for current page
                        if (i == currentPage) {
                            pageBtn.addClass('active');
                        }

                        // set text to the page number
                        pageBtn.text(i);

                        // add button to the container
                        pagination.append(pageBtn);
                    }

                    // add a "last" button
                    pagination.append($('<span class="pagination-button">&raquo;</span>'));

                    return pagination;
                },

                createPage: function(items, currentPage, perPage) {
                    // remove pagination from the page
                    $('.pagination').remove();

                    // set context for the items
                    var container = items.parent(),
                        // detach items from the page and cast as array
                        items = items.detach().toArray(),
                        // get start position and select items for page
                        startPos = this.startPos(currentPage - 1, perPage),
                        page = this.getPage(items, startPos, perPage);

                    // loop items and readd to page
                    $.each(page, function() {
                        // prevent empty items that return as Window
                        if (this.window === undefined) {
                            container.append($(this));
                        }
                    });

                    // prep pagination buttons and add to page
                    var totalPages = this.totalPages(items, perPage),
                        pageButtons = this.createBtns(totalPages, currentPage);

                    container.after(pageButtons);
                }
            };

            // stuff it all into a jQuery method!
            $.fn.paginate = function(perPage) {
                var items = $(this);

                // default perPage to 5
                if (isNaN(perPage) || perPage === undefined) {
                    perPage = 5;
                }

                // don't fire if fewer items than perPage
                if (items.length <= perPage) {
                    return true;
                }

                // ensure items stay in the same DOM position
                if (items.length !== items.parent()[0].children.length) {
                    items.wrapAll('<div class="pagination-items" />');
                }

                // paginate the items starting at page 1
                paginate.createPage(items, 1, perPage);

                // handle click events on the buttons
                $(document).on('click', '.pagination-button', function(e) {
                    // get current page from active button
                    var currentPage = parseInt($('.pagination-button.active').text(), 10),
                        newPage = currentPage,
                        totalPages = paginate.totalPages(items, perPage),
                        target = $(e.target);

                    // get numbered page
                    newPage = parseInt(target.text(), 10);
                    if (target.text() == '«') newPage = 1;
                    if (target.text() == '»') newPage = totalPages;

                    // ensure newPage is in available range
                    if (newPage > 0 && newPage <= totalPages) {
                        paginate.createPage(items, newPage, perPage);
                    }
                });
            };

        })(jQuery);

        /* This part is just for the demo,
        not actually part of the plugin */
        $('.item_order_bx').paginate(2);
        </script>

</body>

</html>