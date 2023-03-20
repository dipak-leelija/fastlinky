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

require_once ROOT_DIR . "/classes/gp-package.class.php";
require_once ROOT_DIR . "/classes/utility.class.php";
require_once ROOT_DIR . "/classes/utilityMesg.class.php";

require_once ROOT_DIR . "/classes/gp-order.class.php";
require_once ROOT_DIR . "/classes/orderStatus.class.php";


/* INSTANTIATING CLASSES */
$DateUtil          = new DateUtil();
$error             = new Error();
$customer        = new Customer();
$Countries      = new Countries();
$Location       = new Location();

$GPPackage        = new GuestPostpackage();
$PackageOrder   = new PackageOrder();
$OrderStatus    = new OrderStatus();

$utility        = new Utility();
$uMesg             = new MesgUtility();
######################################################################################################################

$currentUrl = $utility->currentUrl();

// echo $_GET['ord_id'];
$orderId = $_GET['ord_id'];



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


    //order details
    $showOrder  = $PackageOrder->gpOrderById($orderId);
    // print_r($showOrder);
    // exit;

    $buyer          = $customer->getCustomerData($showOrder['customer_id']);
    $package        = $GPPackage->packDetailsById($showOrder['package_id']);
    $packageCat     = $GPPackage->packCatById($package['category_id']);
    $packFeatures   = $GPPackage->featureByPackageId($showOrder['package_id']);

    // order status names
    $statusName = $OrderStatus->singleOrderStatus($showOrder['order_status']);

    $updates = $PackageOrder->getPackOrdUpdates($orderId, 'ASC');

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="<?php echo FAVCON_PATH?>" type="image/png" />
    <link rel="apple-touch-icon" href="<?php echo FAVCON_PATH?>" />
    <title><?php echo $packageCat['category_name'].' '.$package['package_name']; ?> Order Details -
        <?php echo COMPANY_FULL_NAME; ?></title>

    <link rel="stylesheet" href="<?php echo ADM_URL ?>vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="<?php echo URL ?>/plugins/sweetalert/sweetalert2.css">

    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.2.1/css/all.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.2.1/css/sharp-solid.css">

    <!-- inject:css -->
    <link rel="stylesheet" href="<?php echo ADM_URL ?>css/vertical-layout-light/style.css">
    <link rel="stylesheet" href="<?php echo URL ?>/css/order-now.css">

</head>

<body>
    <div class="container-scroller">
        <?php require_once ADM_DIR . "partials/_navbar.php"; ?>

        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <?php require_once ADM_DIR . "partials/_settings-panel.php"; ?>


            <!-- partial -->
            <?php require_once ADM_DIR . "partials/_sidebar.php"; ?>
            <!-- partial:../../ -->

            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="card">
                        <div class="card-body">
                            <!-- Details section Start  -->
                            <div class="p-3" style="background: aliceblue;">
                                <div class="">
                                    <!-- Order Details Start -->
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div>
                                                <h3
                                                    class="pkage-title font-weight-bold border-bottom border-primary py-2">
                                                    Order
                                                    Details:</h3>
                                                <h5 class="pkage-headline pt-1">
                                                    <?php echo $packageCat['category_name'].' '.$package['package_name']; ?><span
                                                        class="ms-2 badge <?php echo $statusName[0][1]; ?>"><?php echo $statusName[0][1]; ?></span>
                                                </h5>
                                                <table class="ordered-details-table-css ">
                                                    <tr>
                                                        <td>Order Id</td>
                                                        <td>:</td>
                                                        <td><?php echo "#" . $showOrder['order_id']; ?></td>
                                                    </tr>
                                                    <?php
                                                        if ($showOrder['status'] != null) {
                                                        ?>
                                                    <tr>
                                                        <td>Transection Id</td>
                                                        <td>:</td>
                                                        <td style="word-break: break-word;">
                                                            <?php echo "#" . $showOrder['transection_id']; ?>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                        }
                                                        ?>
                                                    <tr>
                                                        <td>Payment Mode</td>
                                                        <td>:</td>
                                                        <td><?php echo $showOrder['payment_type']; ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Order Price</td>
                                                        <td>:</td>
                                                        <td><?php echo CURRENCY . $showOrder['price']; ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Total Amount</td>
                                                        <td>:</td>
                                                        <td><?php echo CURRENCY . $showOrder['paid_amount']; ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Payment</td>
                                                        <td>:</td>
                                                        <td><?php echo $DateUtil->fullDateTimeText($showOrder['date']); ?>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                        <!-- Order Details End -->

                                        <!-- payment details start -->
                                        <div class="col-md-6">
                                            <div>
                                                <h3
                                                    class="pkage-title border-bottom border-primary font-weight-bold py-2">
                                                    Payment Details:
                                                </h3>
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
                                        </div>
                                        <!-- payment details end  -->

                                    </div>
                                    <!-- end of row  -->
                                </div>
                            </div>
                            <!-- Details section End -->


                            <!-- cheaking the order status to procced -->
                            <?php
                                // 4 is the code of ordered status 
                                if ($showOrder['order_status'] == 4) {
                                    ?>
                            <div class="rounded mt-3" style="background: aliceblue;">
                                <div class="d-flex justify-content-center py-3">
                                    <button class="btn btn-sm btn-danger mx-2" data-toggle="modal"
                                        data-target="#rejectModal">Reject Order</button>
                                    <button class="btn btn-sm btn-primary mx-2"
                                        onClick="acceptOrder('<?php echo $orderId;?>')">Accept Order</button>
                                </div>
                            </div>
                            <?php
                                }elseif ($showOrder['order_status'] == 10) {
                                    ?>
                            <div class="rounded bg-danger mt-3 text-center">
                                <div class="d-flex justify-content-center pt-3">
                                    <h4 class="font-weight-bold"> Order Rejected </h4>
                                </div>
                                <button class="btn btn-sm btn-info mt-1 mb-3" data-toggle="modal"
                                    data-target="#updatesModal">View Updates</button>
                            </div>

                            <div class="modal fade" id="updatesModal" tabindex="-1" aria-labelledby="updatesModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p class="card-title">Updates</p>
                                            <ul class="icon-data-list">
                                                <?php
                                                    foreach ($updates as $ordUpdate) {
                                                    ?>

                                                <li>
                                                    <div class="d-flex">
                                                        <img src="images/faces/face1.jpg" alt="user">
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
                                        <div class="modal-footer">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <?php
                                }else {
                                    ?>

                            <!-- start row  -->
                            <div class="row">
                                <div class="col-md-6 mt-4">
                                    <div class="action_box">
                                        <h5 class="fw-bold">Upload Links</h5>
                                        <?php
                                            for ($i=1; $i <= $package['blog_post']; $i++) { 
                                                $links = $PackageOrder->getPackOrdLinks($showOrder['order_id'], $i);

                                                $existLinksNo = count($links);
                                                if ($existLinksNo > 0) 
                                                    $btnIcon = 'fa-regular fa-circle-check px-3 text-primary';
                                                else
                                                    $btnIcon = 'fa-solid fa-circle-exclamation px-3 text-warning';


                                                echo "<button class='d-block d_border border-primary mt-2 px-5 py-2 w-50' data-toggle='modal' data-target='#exampleModal-{$i}'>Link for {$utility->ordinal($i)} Post <i class='".$btnIcon."'></i></button>";

                                            ?>
                                        <!-- Modal start -->
                                        <div class="modal fade" id="exampleModal-<?php echo $i; ?>" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg modal-dialog-scrollable">
                                                <div class="modal-content px-md-4">
                                                    <form action="ajax/package-posting-update.ajax.php" method="POST"
                                                        name="urlsForm-<?php echo $i; ?>">
                                                        <div class="modal-header">
                                                            <h3 class="modal-title fs-5" id="exampleModalLabel">
                                                                Link for <?php echo $utility->ordinal($i); ?> Post
                                                            </h3>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>



                                                        <div class="modal-body" id="update-modal-body">
                                                            <div class="mb-3" id="fieldBox-<?php echo $i; ?>">
                                                                <?php
                                                                    if ($existLinksNo > 0) {
                                                                        $linkNo = 0;
                                                                        foreach ($links as $eachLink) {
                                                                        $linkNo ++;
                                                                        ?>
                                                                <div class="mb-4" id="linkBox-<?php echo $linkNo; ?>">
                                                                    <label for="ancortext" class="form-label mb-0">Link
                                                                        <?php echo $linkNo; ?></label>
                                                                    <input type="text" class="form-control"
                                                                        name="ancortext[]" placeholder="Ancor Text"
                                                                        value="<?php echo $eachLink['anchor']; ?>">
                                                                    <input type="text" class="form-control mt-1"
                                                                        name="url[]" placeholder="URL"
                                                                        value="<?php echo $eachLink['url']; ?>">
                                                                    <div class="d-flex justify-content-end mt-1">
                                                                        <button type="button"
                                                                            onclick="deleteElement('linkBox-<?php echo $linkNo; ?>')"
                                                                            class="btn btn-sm btn-danger">Cancel
                                                                            Link</button>
                                                                        <button type="button"
                                                                            class="btn btn-sm btn-warning ml-2"
                                                                            data-toggle='modal'
                                                                            data-target='#issueModal'
                                                                            data-dismiss="modal" aria-label="Close"
                                                                            onclick="linkIssue(<?php echo $eachLink['id'].','. $i; ?>)">Have
                                                                            an issue?</button>
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
                                                                    value="<?php echo $showOrder['order_id']; ?>">
                                                                <input type="hidden" name="for-post"
                                                                    value="<?php echo $i?>">
                                                                <input type="hidden" name="sectionAdded"
                                                                    id="sectionAdded-<?php echo $i; ?>"
                                                                    value="<?php echo $linkNo;?>">
                                                            </div>
                                                            <div class="text-right">
                                                                <button type="button" class="btn btn-sm btn-primary"
                                                                    onclick="addField('fieldBox-<?php echo $i; ?>', 'sectionAdded-<?php echo $i; ?>', 3)">Add</button>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Close</button>

                                                            <button type="button" class="btn btn-primary"
                                                                data-dismiss="modal"
                                                                onclick="validateForm('urlsForm-<?php echo $i; ?>', '<?php echo $i; ?>')">Update</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Modal end -->
                                        <?php
                                            }
                                            ?>
                                    </div>
                                </div>


                                <!-- start of updates  -->
                                <div class="col-md-4">
                                    <div class="mt-4">
                                        <p class="card-title mb-2">Updates</p>
                                        <div class="card status_card rounded border">
                                            <div class="card-body">
                                                <ul class="icon-data-list">

                                                    <?php
                                                    foreach ($updates as $ordUpdate) {
                                                    ?>

                                                    <li>
                                                        <div class="d-flex">
                                                            <img src="images/faces/face1.jpg" alt="user">
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
                                <!-- end of updates  -->
                            </div>
                            <!-- end row  -->

                            <?php
                                }
                            ?>

                        </div>
                    </div>
                </div>

                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>




    <!-- Modal start -->
    <div class="modal fade" id="issueModal" tabindex="-1" aria-labelledby="issueModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title fs-5" id="issueModalLabel">
                        Raise Link Issue
                    </h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="update-modal-body">
                    <div class="form-group">
                        <label for="linkIssue" class="col-form-label pt-0 pb-0">Write the issue:</label>
                        <textarea class="form-control" id="linkIssue"></textarea>
                    </div>
                    <input type="hidden" id="raiseLinkId">
                    <input type="hidden" id="raiseLinkPostNo">
                    <input type="hidden" id="orderId" value="<?php echo $orderId;?>">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" onclick="raiseIssue()">Save
                        changes</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal end -->

    <!-- Reject Modal start -->
    <div class="modal fade" id="rejectModal" tabindex="-1" aria-labelledby="rejectModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- <form action="ajax/package-posting-update.ajax.php" method="POST"> -->
                <div class="modal-header">
                    <h3 class="modal-title fs-5" id="rejectModalLabel">
                        Link for Post
                    </h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="rejectForm" method="POST">
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Reason:</label>
                            <textarea class="form-control" id="rejectDsc"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-danger"
                        onclick="rejectOrder(<?php echo $orderId; ?>)">Reject</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Reject Modal start -->


    <!-- Reject Modal start -->
    <div class="modal fade" id="publishModal" tabindex="-1" aria-labelledby="publishModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- <form action="ajax/package-posting-update.ajax.php" method="POST"> -->
                <div class="modal-header">
                    <h3 class="modal-title fs-5" id="publishModalLabel">
                        Published URL
                    </h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="publishForm" method="POST">
                        <div class="form-group">
                            <input type="text" id="publishedUrl" class="form-control">
                            <input type="hidden" id="forPost" class="form-control">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-danger"
                        onclick="publishUrl(<?php echo $orderId; ?>)">Update</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Reject Modal start -->



    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="<?php echo ADM_URL; ?>vendors/js/vendor.bundle.base.js"></script>
    <script src="<?php echo ADM_URL; ?>js/off-canvas.js"></script>
    <script src="<?php echo ADM_URL; ?>js/hoverable-collapse.js"></script>
    <script src="<?php echo ADM_URL; ?>js/template.js"></script>
    <script src="<?php echo ADM_URL; ?>js/settings.js"></script>
    <script src="<?php echo ADM_URL; ?>js/todolist.js"></script>

    <!-- <script src="plugins/bootstrap-5.2.0/js/bootstrap.js"></script> -->
    <!-- <script src="../plugins/data-table/simple-datatables.js"></script> -->
    <script src="<?php echo URL; ?>/plugins/tinymce/tinymce.js"></script>
    <script src="<?php echo URL; ?>/plugins/main.js"></script>
    <script src="<?php echo URL; ?>/plugins/sweetalert/sweetalert2.all.min.js" type="text/javascript"></script>
    <script src="<?php echo URL; ?>/js/ajax.js" type="text/javascript"></script>
    <script src="<?php echo URL; ?>/js/script.js" type="text/javascript"></script>


    <script>
    const rejectOrder = (ordId) => {
        Swal.fire({
            title: 'Are you sure?',
            text: "Reject the order!",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, Completed'
        }).then((result) => {
            if (result.isConfirmed) {
                rejectDsc = document.getElementById('rejectDsc').value;
                $.ajax({
                    url: "ajax/package-status-updates.ajax.php",
                    type: "POST",
                    data: {
                        changesOrder: ordId,
                        rejectDsc: rejectDsc
                    },
                    success: function(response) {
                        alert(response);
                        if (response.includes('updated!')) {
                            location.reload();
                        } else {
                            Swal.fire(
                                'failed!',
                                'Failed to Reject Order!! 😥.',
                                'error'
                            )
                        }

                    }
                });
            }
        })
        return false;
    }


    const acceptOrder = (ordId) => {

        Swal.fire({
            title: 'Are you sure?',
            // text: "Changes Completed!",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, Accept'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "ajax/package-status-updates.ajax.php",
                    type: "POST",
                    data: {
                        acceptOrder: ordId,
                    },
                    success: function(response) {
                        // alert(response);
                        if (response.includes('updated!')) {
                            location.reload();
                        } else {
                            Swal.fire(
                                'Failed!',
                                'Failed to Accept Order!! 😥.',
                                'error'
                            )
                        }

                    }
                });
            }
        })

    }


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


    const linkIssue = (linkId, postNo) => {
        document.getElementById('raiseLinkId').value = linkId;
        document.getElementById('raiseLinkPostNo').value = postNo;

    }


    const raiseIssue = () => {
        let issueMsg = document.getElementById('linkIssue').value;
        let orderId = document.getElementById('orderId').value;
        let linkId = document.getElementById('raiseLinkId').value;
        let postNo = document.getElementById('raiseLinkPostNo').value;


        $.ajax({
            url: "ajax/package-status-updates.ajax.php",
            type: "POST",
            data: {
                issueOrder: linkId,
                orderId: orderId,
                postNo: postNo,
                issueMsg: issueMsg
            },
            success: function(response) {
                console.log(response);
                if (response.includes('updated!')) {
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


    const publishUrl = (orderId) => {

        let publishedUrl = document.getElementById('publishedUrl').value;
        let postNo = document.getElementById('forPost').value;

        if (postNo == '') {
            Swal.fire('Failed!', 'Number of post is not found!', 'error');
            return false;
        }
        if (publishedUrl == '') {
            Swal.fire('Failed!', 'URL Not Found!', 'error');
            return false;
        }
        let cheakedUrl = checkUrl(publishedUrl);

        if(cheakedUrl == true){
            $.ajax({
                    url: "ajax/package-posting-update.ajax.php",
                    type: "POST",
                    data: {
                        publishOrder: orderId,
                        forPost: postNo,
                        url: publishedUrl
                    },
                    success: function(response) {
                        // alert(`response=> ${response}`);
                        if (response.trim().includes('updated!')) {
                            location.reload();
                        } else {
                            Swal.fire('Failed!', response.trim(), 'error');
                        }

                    }
                });
        }
    }

    function validateForm(formName, forPost) {
        let x = document.forms[formName]['ancortext[]'];
        let y = document.forms[formName]['url[]'];
        if (x.length == undefined && y.length == undefined) {
            if (x.value != '' && y.value != '') {
                $("#publishModal").modal();
                document.getElementById('forPost').value = forPost;
                // document.getElementById('forPostTxt').innerText = forPost;
            } else {
                Swal.fire('Error!', 'Link Not Found.', 'error');
            }

        } else {

            for (let i = 0; i < x.length; i++) {
                for (let j = 0; j < y.length; j++) {

                    if ((x[i].value !== null && y[i].value !== null) || (x[i].value !== '' && y[i].value !== '')) {
                        $("#publishModal").modal();
                        document.getElementById('forPost').value = forPost;
                        // document.getElementById('forPostTxt').innerText = forPost;
                    } else {
                        Swal.fire(
                            'Error!',
                            'Link(s) Not Found.',
                            'error'
                        )
                    }
                }
            }

        }
    }

    // const validateForm = () => {

    //     // alert("Hi");
    //     // return false;
    //     let postUrl = document.getElementById("deliver-link").value;
    //     if (postUrl == "") {
    //         document.getElementById('blank-msg').innerText = "Link Can't be blank";
    //         return false;
    //     } else {
    //         // function isValidHttpUrl(postUrl) {
    //         let url;
    //         try {
    //             url = new URL(postUrl);
    //         } catch (_) {
    //             document.getElementById('blank-msg').innerText = "Link is not valid";
    //             return false;
    //         }
    //         return url.protocol === "http:" || url.protocol === "https:";
    //         // }
    //     }
    // }
    </script>
</body>

</html>