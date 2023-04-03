<?php
session_start();
require_once "../includes/constant.inc.php";
require_once ROOT_DIR."/includes/user.inc.php";
include_once ADM_DIR . "checkSession.php";


require_once ROOT_DIR.'/classes/encrypt.inc.php';
require_once ROOT_DIR."/_config/dbconnect.php";


require_once ROOT_DIR."/classes/gp-package.class.php";
require_once ROOT_DIR."/classes/location.class.php"; 
include_once ROOT_DIR."/classes/countries.class.php";
require_once ROOT_DIR."/classes/search.class.php";
require_once ROOT_DIR."/classes/error.class.php";

require_once ROOT_DIR."/classes/date.class.php";
require_once ROOT_DIR."/classes/utility.class.php";
require_once ROOT_DIR."/classes/utilityMesg.class.php"; 
require_once ROOT_DIR."/classes/utilityImage.class.php";
require_once ROOT_DIR."/classes/utilityNum.class.php";
require_once ROOT_DIR."/classes/utilityStr.class.php";

/* INSTANTIATING CLASSES */
$dateUtil      	= new DateUtil();
$error 			= new Error();
$GPPackage      = new GuestPostpackage();
$lc		 		= new Location();
$country		= new Countries();
$search_obj		= new Search();

$utility		= new Utility();
$uMesg 			= new MesgUtility();
$uImg 			= new ImageUtility();
$uNum 			= new NumUtility();
$uStr 			= new StrUtility();

###############################################################################################

//declare vars
$typeM		= $utility->returnGetVar('typeM','');

$packages = $GPPackage->allPackages();
$packageCats = $GPPackage->allPackagesCat();
// print_r($packages);
// exit;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Packages - <?php echo COMPANY_FULL_NAME;?></title>
    <link rel="icon" href="<?php echo FAVCON_PATH;?>" type="image/png">
    <!-- plugins:css -->
    <link rel="stylesheet" href="<?php echo ADM_URL; ?>/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="<?php echo ADM_URL; ?>/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="<?php echo URL; ?>/plugins/data-table/style.css">
    <link rel="stylesheet" href="<?php echo URL; ?>/css/order-table.css">

    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.2.1/css/all.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.2.1/css/sharp-solid.css">

    <link rel="stylesheet" href="<?php echo ADM_URL; ?>/css/vertical-layout-light/style.css">
    <!-- endinject -->

<!-- 
    <style>
    @media (max-width:1200px) {
        .modal .modal-dialog .modal-content .modal-body {
            padding: 0px !important;
        }
    }
    </style> -->
</head>

<body>
    <div class="container-scroller">
        <?php require_once "partials/_navbar.php"; ?>

        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <?php require_once "partials/_settings-panel.php"; ?>


            <!-- partial -->
            <?php require_once "partials/_sidebar.php"; ?>
            <!-- partial:../../ -->

            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row justify-content-between">

                        <div class="col-lg-5">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-block d-md-flex justify-content-between">
                                        <h4 class="card-title">Package Category</h4>
                                        <button class="btn btn-sm btn-primary" data-toggle="modal"
                                            data-target="#mainModal"
                                            onclick="showModal('show_modal_body', 'ajax/package-cat-add.ajax.php')">Add
                                            Category</button>
                                    </div>
                                    <div class="table-responsive">
                                        <table id="dtBasicExample" class="table table-striped datatable"
                                            cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>
                                                        SL.NO.
                                                    </th>
                                                    <th>
                                                        Package Name
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
                                                $i = 1;
                                                foreach ($packageCats as $eachCat) {
                                                ?>
                                                <tr>
                                                    <td>
                                                        <?php echo $i++; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $eachCat['category_name']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $dateUtil->printDate($eachCat['added_on']); ?>
                                                    </td>
                                                    <td>
                                                        <a href="javascript:void(0)" data-toggle="modal" data-target="#mainModal"
                                                            onclick="showModal('show_modal_body', 'ajax/package-cat-edit.ajax.php?data-id=<?php echo $eachCat['id']; ?>')"
                                                            class="text-decoration-none mx-1">
                                                            <i class="fa-regular fa-pen-to-square mx-1"></i>
                                                        </a>
                                                        <a href="javascript:void(0)">
                                                            <i class="fa-regular fa-trash-can-xmark text-danger mx-1"
                                                                onclick="deleteField(<?php echo $eachCat['id']; ?>, this, 'ajax/package-cat-delete.ajax.php');"></i>
                                                        </a>

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


                        <div class="col-lg-7">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-block d-md-flex justify-content-between">
                                        <h4 class="card-title">Packages</h4>
                                        <button class="btn btn-sm btn-primary" data-toggle="modal"
                                            data-target="#mainModal"
                                            onclick="showModal('show_modal_body', 'ajax/package-add.ajax.php')">Add
                                            Package</button>
                                    </div>
                                    <div class="table-responsive">
                                        <table id="dtBasicExample" class="table table-striped datatable"
                                            cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>
                                                        SL.NO.
                                                    </th>
                                                    <th>
                                                        Package Name
                                                    </th>
                                                    <th>
                                                        Category
                                                    </th>
                                                    <th>
                                                        Price
                                                    </th>
                                                    <!-- <th>
                                                        Added On
                                                    </th> -->
                                                    <th>
                                                        Action
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $i = 1;
                                                foreach ($packages as $eachPackage) {
                                                $packCat = $GPPackage->packCatById($eachPackage['category_id']);
                                                ?>
                                                <tr>
                                                    <td>
                                                        <?php echo $i++; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $eachPackage['package_name']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $packCat['category_name']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $eachPackage['price']; ?>
                                                    </td>
                                                    <!-- <td>
                                                        <?php //echo $dateUtil->printDate($eachPackage['added_on']); ?>
                                                    </td> -->
                                                    <td>
                                                        <!-- <a class="text-decoration-none mx-1" href="javascript:void(0)"
                                                            data-toggle="modal" data-target="#mainModal"
                                                            onclick="showModal('ajax/customer-view.php?cus_id=<?php //echo $eachPackage['id'];?>', 'show_modal_body')">
                                                            <i class="fa-regular fa-eye"></i>
                                                        </a> -->

                                                        <a href="javascript:void(0)" data-toggle="modal"
                                                            data-target="#mainModal"
                                                            onclick="showModal('show_modal_body', 'ajax/package-edit.ajax.php?data-id=<?php echo $eachPackage['id']; ?>')"
                                                            class="text-decoration-none mx-1">
                                                            <i class="fa-regular fa-pen-to-square mx-1"></i>
                                                        </a>
                                                        <a href="javascript:void(0)">
                                                            <i class="fa-regular fa-trash-can-xmark text-danger mx-1"
                                                                onclick="deleteField(<?php echo $eachPackage['id']; ?>, this, 'ajax/package-delete.ajax.php');"></i>
                                                        </a>
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
                <div class="modal fade" id="mainModal" tabindex="-1" aria-labelledby="mainModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="mainModalLabel">User Details</h5>
                                <button type="button" onclick="reloadPage()" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body pt-3" id="show_modal_body">
                                ...
                            </div>
                            <!-- <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                            </div> -->
                        </div>
                    </div>
                </div>

                <!-- Footer Start  -->
                <?php require_once "partials/_footer.php"; ?>
                <!-- Footer End  -->

                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="<?php echo ADM_URL; ?>/vendors/js/vendor.bundle.base.js"></script>
    <script src="<?php echo URL; ?>/plugins/jquery-3.6.0.min.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="<?php echo ADM_URL; ?>/js/fastlinky-admin.js"></script>
    <script src="<?php echo ADM_URL; ?>/js/off-canvas.js"></script>
    <script src="<?php echo ADM_URL; ?>/js/hoverable-collapse.js"></script>
    <script src="<?php echo ADM_URL; ?>/js/template.js"></script>
    <script src="<?php echo ADM_URL; ?>/js/settings.js"></script>
    <script src="<?php echo ADM_URL; ?>/js/todolist.js"></script>

    <script src="<?php echo URL; ?>/plugins/data-table/simple-datatables.js"></script>
    <script src="<?php echo URL; ?>/plugins/tinymce/tinymce.js"></script>
    <script src="<?php echo URL; ?>/plugins/main.js"></script>


    <!-- Added Js  -->
    <script src="<?php echo URL; ?>/js/utility.js"></script>
    <script src="<?php echo URL; ?>/js/ajax.js"></script>
    <script src="<?php echo URL; ?>/plugins/sweetalert/sweetalert2.all.js"></script>


    <script>
    function loadPage(pageUrl, lodedToId) {
        $.ajax({
            url: pageUrl,
            type: "GET",
            success: function(response) {
                document.getElementById(lodedToId).innerHTML = response;
            }
        });
    }

    const showModal = (modalBodyId, url) => {
        // loadPage(url, modalBodyId);

        let modal = document.getElementById(modalBodyId);
        modal.innerHTML = '<iframe width="99%" height="400px" frameborder="0" allowtransparency="true" src="' +
            url + '"></iframe>';
    }


    const deleteField = (deleteId, element, url) => {
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
                    url: url,
                    type: "POST",
                    data: {
                        action: 'delete',
                        deleteId: deleteId
                    },
                    success: function(response) {
                        // alert(response);
                        if (response.includes('deleted')) {
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
    <!-- endinject -->
    <!-- Custom js for this page-->
    <!-- End custom js for this page-->
</body>

</html>