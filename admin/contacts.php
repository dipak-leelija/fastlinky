<?php 
require_once("../includes/constant.inc.php");
session_start();
$page = "adminContact";
include_once('checkSession.php');
require_once "../_config/dbconnect.php";

require_once("../classes/adminLogin.class.php"); 
require_once("../classes/date.class.php"); 
require_once("../classes/content-order.class.php");
require_once("../classes/utility.class.php"); 
require_once("../classes/contact.class.php");


/* INSTANTIATING CLASSES */
$adminLogin 	= new adminLogin();
$Contact		= new Contact();
$dateUtil      	= new DateUtil();
$utility		= new Utility();

######################################################################################################################

//declare vars
$typeM			= $utility->returnGetVar('typeM','');
$keyword		= $utility->returnGetVar('keyword','');
$type			= $utility->returnGetVar('type','');
$mode			= $utility->returnGetVar('mode','');

$ContactDtls	   = $Contact->showAllContact();
	
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once ADM_DIR . "/incs/admin-common-headers.php" ?>
    <title>Contacts - <?php echo COMPANY_S; ?> </title>
    <link rel="stylesheet" href="<?= ADM_URL ?>vendors/ti-icons/css/themify-icons.css" />
    <link rel="stylesheet" href="<?= URL ?>/plugins/data-table/style.css" />
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
                                    <h4 class="card-title">Contact Management</h4>
                                    <div class="table-responsive">
                                        <table id="dtBasicExample" class="table table-striped datatable"
                                            cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>
                                                        SL.
                                                    </th>
                                                    <th>
                                                        Full Name
                                                    </th>
                                                    <th>
                                                        E-Mail (send now)
                                                    </th>
                                                    <th>
                                                        Message
                                                    </th>
                                                    <th>
                                                        Created On
                                                    </th>
                                                    <th>
                                                        Action
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $i= count($ContactDtls);                                             
                                                foreach($ContactDtls as $row){
                                                $id = $row['id'];
                                                ?>

                                                <tr>
                                                    <td>
                                                        <?php echo $i; ?>
                                                    </td>
                                                    <td style="WHITE-SPACE: inherit;">
                                                        <?php echo $row['contact_name']; ?>
                                                    </td>
                                                    <td style="WHITE-SPACE: inherit;">
                                                        <?php echo $utility->displayEmail($row['contact_email'], $row['contact_name'], "YES", "customer-mail.php"); ?>
                                                    </td>
                                                    <td style="WHITE-SPACE: inherit;">
                                                        <?php echo substr($row['message'], 0, 50); ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $dateUtil->dateTimeNumber($row['added_on']); ?>
                                                    </td>
                                                    <td>
                                                        <a class="text-decoration-none mx-1"
                                                            href="contact-message.php?action=edit_niches&id=<?php echo $id; ?>">
                                                            <i class="fa-regular fa-eye"></i>
                                                        </a>
                                                        <span class="text-decoration-none mx-1">
                                                            <i class="fa-regular fa-trash-can-xmark text-danger mx-1"
                                                                onclick="deleteContact(<?= $id ?>, this)"></i>
                                                        </spam>
                                                    </td>
                                                </tr>
                                                <?php
                                                $i--;}
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
    <script src="<?= URL ?>/plugins/sweetalert/sweetalert2.all.js"></script>

    <script>

    const deleteContact = (contactId, element) => {
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
                    url: "ajax/contact-delete.php",
                    type: "POST",
                    data: {
                        action: 'deleteContact',
                        contactId: contactId
                    },
                    success: function(response) {
                        if (response.includes('SU103')) {
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