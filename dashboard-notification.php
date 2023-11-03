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

if($cusDtl[0][0] == 3){ 
	header("Location: app.client.php");
}


// $Emails->getemailDetail('to_email', $colVal)

$mails = $Emails->ShowMailsbyCol('to_email', $_SESSION['USERcontinuecontent_ecom_SESS2016']);

?>
<!DOCTYPE HTML>
<html lang="zxx">

<head>
    <meta name="robots" content="noindex,nofollow">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $cusDtl[0][5].' '.$cusDtl[0][6];?> - Notifications | <?php echo COMPANY_S; ?></title>
    <link rel="icon" href="<?php echo FAVCON_PATH; ?>" type="image/png">

    <!-- Plugins Files -->
    <link href="<?= URL ?>/plugins/bootstrap-5.2.0/css/bootstrap.css" rel="stylesheet" />
    <?php require_once ROOT_DIR.'/plugins/font-awesome/fontawesome.php'?>

    <!-- Custom CSS -->
    <link href="<?= URL ?>/css/my-orders.css" rel='stylesheet' type='text/css' />
    <link href="<?= URL ?>/css/style.css" rel='stylesheet' type='text/css' />
    <link href="<?= URL ?>/css/dashboard.css" rel='stylesheet' type='text/css' />
    <link href="<?= URL ?>/css/dashboard-notification.css" rel='stylesheet' type='text/css' />

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
        <?php require_once 'components/navbar.php'; ?>
        <!-- //header -->
        <div class="edit_profile" style="overflow: hidden;">
            <div class="container-fluid1">
                <div class=" display-table">
                    <div class="row ">
                        <!--Row start-->
                        <div class="col-md-3 hidden-xs display-table-cell v-align" id="navigation">
                            <div class="client_profile_dashboard_left">
                                <?php include("dashboard-inc.php");?>

                            </div>

                        </div>
                        <div class="col-md-9  display-table-cell v-align client_profile_dashboard_right">
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

    <script src="<?= URL ?>/plugins/bootstrap-5.2.0/js/bootstrap.js"></script>
    <script src="<?= URL ?>/plugins/jquery-3.6.0.min.js"></script>
    <script src="<?= URL ?>/js/ajax.js"></script>
    <script src="<?= URL ?>/js/customerSwitchMode.js"></script>

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
                var i = currentPage;
                i <= totalPages;
                i++;
                if (target.text() == '»') newPage = i++;
                i--;
                if (target.text() == '«') newPage = --i;
                if (newPage > 0 && newPage <= totalPages) {
                    paginate.createPage(items, newPage, perPage);
                }
            });
        };

    })(jQuery);
    $('.item_order_bx').paginate(6);
    </script>
</body>

</html>