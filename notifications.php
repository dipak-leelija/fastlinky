<?php
require_once "includes/constant.inc.php";
session_start();

require_once "_config/dbconnect.php";

require_once "classes/search.class.php";
require_once "classes/customer.class.php";
require_once "classes/emails.class.php";
require_once "classes/blog_mst.class.php";
require_once "classes/date.class.php";
require_once "classes/utility.class.php";


/* INSTANTIATING CLASSES */
// $dateUtil      	= new DateUtil();
$search_obj		= new Search();
$customer		= new Customer();
$Emails         = new Emails();
$blogMst		= new BlogMst();
$DateUtil       = new DateUtil();
$utility		= new Utility();
######################################################################################################################
$typeM		= $utility->returnGetVar('typeM','');
//user id
$cusId		= $utility->returnSess('userid', 0);
$cusDtl		= $customer->getCustomerData($cusId);
// print_r($cusDtl);
// print_r($_SESSION);

if($cusId == 0){
    header("Location: index.php");
}

if($cusDtl[0][0] == 0){
	header("Location: index.php");
}



// $Emails->getemailDetail('to_email', $colVal)

$mails = $Emails->ShowMailsbyCol('to_email', $_SESSION[USR_SESS]);

?>
<!DOCTYPE HTML>
<html lang="zxx">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $cusDtl[0][5].' '.$cusDtl[0][6];?> - Notifications | <?php echo COMPANY_S; ?></title>
    <link rel="icon" href="<?php echo FAVCON_PATH; ?>" type="image/png">

    <!-- Bootstrap Core CSS -->
    <!-- <link href="css/bootstrap.css" rel='stylesheet' type='text/css' /> -->
    <link href="plugins/bootstrap-5.2.0/css/bootstrap.css" rel='stylesheet' type='text/css' />
    <link href="plugins/fontawesome-6.1.1/css/all.css" rel='stylesheet' type='text/css' />

    <!-- Custom CSS -->
    <link href="css/my-orders.css" rel='stylesheet' type='text/css' />
    <link href="css/leelija.css" rel='stylesheet' type='text/css' />
    <link rel="stylesheet" href="css/partials.css">
    <link href="css/style.css" rel='stylesheet' type='text/css' />
    <!-- <link href="css/form.css" rel='stylesheet' type='text/css' /> -->
    <link href="css/dashboard.css" rel='stylesheet' type='text/css' />
    <link href="css/dashboard-notification.css" rel='stylesheet' type='text/css' />

    <style>
    .toast:not(.show) {
        display: inherit !important;
    }

    .toast {
        --bs-toast-padding-x: 0.75rem;
        --bs-toast-padding-y: 0.5rem;
        --bs-toast-spacing: 1.5rem;
        --bs-toast-max-width: 350px;
        --bs-toast-box-shadow: none !important;
        width: 100% !important;
        --bs-toast-border-color: none;
    }
    </style>
</head>

<body>
    <div id="home">
        <!-- header -->
        <?php require_once 'partials/navbar.php'; ?>
        <!-- //header -->
        <!-- banner -->
        <div class="edit_profile" style="overflow: hidden;">
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
                        <div class="col-md-9 ps-md-0  display-table-cell v-align ">
                            <div class="toast">
                                <h2 class="notice-title">Notifications <i class="fa-solid fa-bell fa-shake"></i></h2>

                                <?php
                                
                                if (count($mails) > 0) {
                                    foreach ($mails as $eachMail) {

                                        $msgDate = $DateUtil->dateTimeText($eachMail['added_on']);
                                        $substr = 'Dear '.$cusDtl[0][5].' '.$cusDtl[0][6].',';
                                        $dsc = $eachMail['message'];

                                        if (str_contains($eachMail['message'], $substr)) {
                                            $dsc = str_replace($substr,"",$eachMail['message']);
                                        }
                                        if (str_contains($eachMail['message'], $substr)) {
                                            $dsc = str_replace($substr,"",$eachMail['message']);
                                        }

                                        
                                        $checkArray = array('<!DOCTYPE html>', '<!doctype html>', '<html');
                                        foreach ($checkArray as $element) {
                                            if (strpos($dsc, $element) !== FALSE) {
                                                $dsc   = 'Cheakout the notification';
                                            }
                                        }
                                    ?>

                                    <!-- notification-1 -->
                                    <div class="notification-main-division my-2 item_order_bx coloring-cd"
                                        data-bs-toggle="modal" data-bs-target="#notificationModal"
                                        onclick="notificationAcive('<?php echo $eachMail['id'];?>')">
                                        <div class="row">
                                            <div
                                                class="col-xl-1 ps-xl-1 col-lg-2 col-md-2 col-sm-2 col-3 m-auto image-column-div">
                                                <div>
                                                    <img src="<?php echo FAVCON_PATH; ?>"
                                                        class="notify-person-img rounded me-2" alt="...">
                                                </div>
                                            </div>
                                            <div class="col-xl-10 col-lg-8 col-md-8 col-sm-8 col-9 info-column-div">
                                                <div class="notification-para">
                                                    <p class="notify-body">
                                                        <strong
                                                            class="person-name"><?php echo $eachMail['subject']; ?></strong>
                                                        <!-- created a new website. -->
                                                    </p>
                                                    <p class="notify-body">
                                                        <?php
                                                        echo substr($dsc, 0, 200).'..';

                                                        ?></p>
                                                    <p class="notify-body">
                                                        <small class="notify-time"><?php echo $msgDate;?></small>
                                                    </p>
                                                </div>

                                            </div>
                                            <!-- <div
                                                class="col-xl-1 col-lg-2 col-md-2 col-sm-2 d-sm-inline-block justify-content-end d-none m-auto">
                                                <div style=" text-align: end;">
                                                    <img src="images/portfolio/2.jpg" class="notify-post-img rounded me-2"
                                                        alt="...">
                                                </div>
                                            </div> -->
                                        </div>
                                    </div>

                                <?php
                                    } 
                                }else {
                                ?>
                                <div class="container border border-info rounded">
                                    <h4 class="text-center py-4">No Notifications</h4>
                                </div>
                                <?php
                                }
                                ?>
                                <!-- notification end-->

                            </div>
                        </div>
                        <!--Row end-->
                    </div>

                </div>
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="notificationModal" tabindex="-1" aria-labelledby="notificationLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content rounded-0">
                <div class="modal-header">
                    <h1 class="modal-title fs-5"><span id="notificationLabel"></span> <small class="text-muted fs_12p"
                            id="notificationDate"></small></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="notificationDsc">
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>

    <!-- <script src="js/bootstrap.js"></script> -->
    <script src="plugins/bootstrap-5.2.0/js/bootstrap.js"></script>
    <script src="plugins/jquery-3.6.0.min.js"></script>
    <!-- alax custom library  -->
    <script src="js/ajax.js"></script>
    <script src="js/customerSwitchMode.js"></script>






    <script>
    const notificationAcive = (notificationId) => {
        let notificationLabel = document.getElementById('notificationLabel');
        let notificationDate = document.getElementById('notificationDate');
        let notificationDsc = document.getElementById('notificationDsc');

        $.ajax({
            url: "ajax/notification.ajax.php",
            type: "POST",
            data: {
                actionId: notificationId
            },
            success: function(response) {
                result = response.split('|==>');

                subject = result[0];
                dsc = result[1];
                msgDate = result[2];

                notificationLabel.innerText = subject;
                notificationDsc.innerHTML = dsc;
                notificationDate.innerText = msgDate;

            }
        });

    }
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
                var i = currentPage;
                i <= totalPages;
                i++;
                if (target.text() == '»') newPage = i++;
                i--;
                if (target.text() == '«') newPage = --i;
                // ensure newPage is in available range
                if (newPage > 0 && newPage <= totalPages) {
                    paginate.createPage(items, newPage, perPage);
                }
            });
        };

    })(jQuery);

    /* This part is just for the demo,
    not actually part of the plugin */
    $('.item_order_bx').paginate(6);
    </script>



</body>

</html>