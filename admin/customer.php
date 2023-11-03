<?php
require_once("../includes/constant.inc.php");
session_start();
$page = "adminCustomer";
include_once('checkSession.php');
require_once "../_config/dbconnect.php";

require_once("../includes/user.inc.php");
require_once('../classes/encrypt.inc.php');

require_once("../classes/adminLogin.class.php"); 
require_once("../classes/date.class.php");  
require_once("../classes/error.class.php");  
require_once("../classes/customer.class.php"); 
require_once("../classes/location.class.php"); 
require_once("../classes/subscriber.class.php");
require_once("../classes/pagination.class.php");
require_once("../classes/search.class.php");

require_once("../classes/utility.class.php"); 
require_once("../classes/utilityMesg.class.php"); 
require_once("../classes/utilityImage.class.php");
require_once("../classes/utilityNum.class.php");
require_once("../classes/utilityStr.class.php");

/* INSTANTIATING CLASSES */
$adminLogin 	= new adminLogin();
$dateUtil      	= new DateUtil();
$error 			= new Error();
$Customer		= new Customer();
$lc		 		= new Location();
$subscribe		= new EmailSubscriber();
$pages			= new Pagination();
$search_obj		= new Search();

$utility		= new Utility();
$uMesg 			= new MesgUtility();
$uImg 			= new ImageUtility();
$uNum 			= new NumUtility();
$uStr 			= new StrUtility();

###############################################################################################

//declare vars
$typeM		= $utility->returnGetVar('typeM','');

$allCustomerIds	= $Customer->getAllCustomerId();
$allCustomerIds = json_decode($allCustomerIds);
// print_r($noOfCus);
// exit;

$allCusatomer = $Customer->getAllCust();
// print_r($allCusatomer);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once ADM_DIR . "/incs/admin-common-headers.php" ?>

    <title>Customers | <?php echo COMPANY_FULL_NAME;?></title>
    <link rel="stylesheet" href="vendors/mdi/css/materialdesignicons.min.css" />
    <link rel="stylesheet" href="<?= URL ?>/plugins/data-table/style.css" />
    <link rel="stylesheet" href="<?= URL ?>/css/order-table.css" />
    <style>
    @media (max-width:1200px) {
        .modal .modal-dialog .modal-content .modal-body {
            padding: 0px !important;
        }
    }
    </style>
</head>

<body>
    <div class="container-scroller">
        <?php require_once "components/_navbar.php"; ?>

        <div class="container-fluid page-body-wrapper">
            <?php require_once "components/_settings-panel.php"; ?>
            <?php require_once "components/_sidebar.php"; ?>

            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row">

                        <div class="col-lg-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">All Customer Details</h4>
                                    <div class="table-responsive">
                                        <table id="dtBasicExample" class="table table-striped datatable"
                                            cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>
                                                        User
                                                    </th>
                                                    <th>
                                                        Name
                                                    </th>
                                                    <th>
                                                        Email
                                                    </th>
                                                    <th>
                                                        User Type
                                                    </th>
                                                    <th>
                                                        Verified
                                                    </th>
                                                    <th>
                                                        Added On
                                                    </th>
                                                    <th>
                                                        Action
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                foreach ($allCustomerIds as $customerId) {
                                                    // echo $customer;
                                                    $dtls = $Customer->getCustomerData($customerId);
                                                ?>
                                                <tr>
                                                    <td class="py-1">
                                                        <?php
                                                        $imageName = $dtls[0][9];
                                                        if ($dtls[0][9] == null) $imageName = 'default-user-icon.png';
                                                        ?>
                                                        <img src="<?= IMG_PATH ?>/user/<?php echo $imageName; ?>" alt="<?php echo $dtls[0][5]."-".$dtls[0][6]; ?>" />
                                                    </td>
                                                    <td>
                                                        <?= $dtls[0][5]." ".$dtls[0][6]; ?>
                                                    </td>
                                                    <td>
                                                        <?= $dtls[0][3]; ?>
                                                    </td>
                                                    <td>
                                                        <?= $dtls[0][0] == 1 ? "User" : "Client" ?>
                                                    </td>
                                                    <td>
                                                        <?= $Customer->renderVerifyStr($customerId, ERUVERF003, $dtls[0][16]); ?>
                                                    </td>
                                                    <td>
                                                        <?= $dateUtil->printDate($dtls[0][22]); ?>
                                                    </td>
                                                    <td>
                                                        
                                                        <a class="text-decoration-none small mx-1"
                                                            href="javascript:void(0)"
                                                            data-toggle="modal"
                                                            data-target="#viewModal"
                                                            onclick="showModal('ajax/customer-view.php?cus_id=<?= $customerId;?>', 'show_modal_body')">
                                                            <span class="badge badge-primary">
                                                                View    
                                                                <i class="fa-regular fa-eye"></i>
                                                            </span>
                                                        </a>

                                                        <a href="<?= URL ?>/admin/customer-mail.php?customer=<?= $customerId?>"
                                                            class="text-decoration-none small mx-1">
                                                            <span class="badge badge-secondary text-light">
                                                                Mail
                                                                <i class="fa-regular fa-envelope"></i>
                                                            </span>
                                                        </a>


                                                        <a href="javascript:void(0)"
                                                            onClick="MM_openBrWindow('customer-edit.php?action=edit_user&cus_id=<?php echo $customerId; ?>','CustomerEdit','scrollbars=yes,width=700,height=650')"
                                                            class="text-decoration-none mx-1">
                                                            <i class="fa-regular fa-pen-to-square mx-1"></i>
                                                        </a>
                                                        
                                                        <i class="fa-regular fa-trash-can-xmark text-danger mx-1"
                                                            onclick="deleteUser(<?php echo $customerId; ?>, this);"></i>
                                                    </td>
                                                </tr>
                                                <?php
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- content-wrapper ends -->



                <!-- Modal -->
                <div class="modal fade" id="viewModal" tabindex="-1" aria-labelledby="viewModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="viewModalLabel">User Details</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body show_modal_body">
                                ...
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Footer Start  -->
                <?php require_once "components/_footer.php"; ?>
                <!-- Footer End  -->

                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="<?= ADM_URL ?>vendors/js/vendor.bundle.base.js"></script>
    <script src="<?= URL ?>/plugins/jquery-3.6.0.min.js"></script>
    <script src="<?= ADM_URL ?>js/off-canvas.js"></script>
    <script src="<?= ADM_URL ?>js/hoverable-collapse.js"></script>
    <script src="<?= ADM_URL ?>js/template.js"></script>
    <script src="<?= ADM_URL ?>js/settings.js"></script>
    <script src="<?= ADM_URL ?>js/todolist.js"></script>
    <script src="<?= URL ?>/plugins/data-table/simple-datatables.js"></script>
    <script src="<?= URL ?>/plugins/tinymce/tinymce.js"></script>
    <script src="<?= URL ?>/plugins/main.js"></script>
    <!-- Added Js  -->
    <script src="<?= URL ?>/js/utility.js"></script>
    <script src="<?= URL ?>/js/ajax.js"></script>
    <script src="<?= URL ?>/plugins/sweetalert/sweetalert2.all.js"></script>
    <script>
    const showModal = (url, modalBodyClass) => {

        // let url = 'ajax/department.ajax.php?departmenttype=' + id;

        $(`.${modalBodyClass}`).html(

            '<iframe width="99%" height="400px" frameborder="0" allowtransparency="true" src="' + url +

            '"></iframe>')

    }


    const deleteUser = (userId, element) => {
        Swal.fire({
            // title: 'Are you sure?',
            title: "Want to delete?",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes'
        }).then((result) => {
            if (result.isConfirmed) {

                $.ajax({
                    url: "ajax/customer-delete.ajax.php",
                    type: "POST",
                    data: {
                        action: 'deleteUser',
                        userId: userId
                    },
                    success: function(response) {
                        // alert(response);
                        if (response.includes('SU103')) {
                            // location.reload();
                            $(element).closest("tr").fadeOut()
                        } else {
                            Swal.fire(
                                'Failed to Delete!!!',
                                '',
                                'error'
                            )
                        }

                    }
                });
            }
        })
        return false;
    }
    </script>
</body>

</html>