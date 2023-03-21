<?php 
require_once("../includes/constant.inc.php");
session_start();
include_once('checkSession.php');
require_once "../_config/dbconnect.php";

require_once("../classes/adminLogin.class.php"); 
require_once("../classes/date.class.php"); 
require_once("../classes/content-order.class.php");
require_once("../classes/utility.class.php"); 
require_once("../classes/contact.class.php");


/* INSTANTIATING CLASSES */
$adminLogin 	= new adminLogin();
$dateUtil      	= new DateUtil();
$utility		= new Utility();
$Contact		= new Contact();

######################################################################################################################

//declare vars
$typeM			= $utility->returnGetVar('typeM','');
$keyword		= $utility->returnGetVar('keyword','');
$type			= $utility->returnGetVar('type','');
$mode			= $utility->returnGetVar('mode','');

$ContactDtls	   = $Contact->ShowContact();
	
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Skydash Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="vendors/feather/feather.css">
    <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
    <!-- <link rel="stylesheet" href="vendors/mdi/css/materialdesignicons.min.css"> -->
    <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="../plugins/data-table/style.css">

    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.2.1/css/all.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.2.1/css/sharp-solid.css">


    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="css/vertical-layout-light/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="images/favicon.png" />
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
                                                        Id
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
                                                $i=1;                                             
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
                                                        <?php echo $utility->displayEmail($row['contact_email'], $row['contact_name'], "YES", "customer_mail.php"); ?>
                                                    </td>
                                                    <td style="WHITE-SPACE: inherit;">
                                                        <?php echo substr($row['message'], 0, 50); ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $dateUtil->dateTimeNumber($row['added_on']); ?>
                                                    </td>
                                                    <td>
                                                        <a class="text-decoration-none mx-1"
                                                            href="contact_view.php?action=edit_niches&id=<?php echo $id; ?>">
                                                            <i class="fa-regular fa-eye"></i>
                                                        </a>
                                                        <a href='contact_delete.php?id=<?php    echo $id;  ?>'
                                                            class="text-decoration-none mx-1">
                                                            <i class="fa-regular fa-trash-can-xmark text-danger mx-1"
                                                                onclick="return deleteContact();"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                                <?php
                                                $i++;}
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
    <script src="vendors/js/vendor.bundle.base.js"></script>
    <script src="../plugins/jquery-3.6.0.min.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="js/off-canvas.js"></script>
    <script src="js/hoverable-collapse.js"></script>
    <script src="js/template.js"></script>
    <script src="js/settings.js"></script>
    <script src="js/todolist.js"></script>

    <!-- <script src="plugins/bootstrap-5.2.0/js/bootstrap.js"></script> -->
    <script src="../plugins/data-table/simple-datatables.js"></script>
    <script src="../plugins/tinymce/tinymce.js"></script>
    <script src="../plugins/main.js"></script>

    <script>
    function deleteContact() {

        return confirm("Are you sure that you want to delete the contact Contents ?")

    };
    </script>

    <!-- endinject -->
    <!-- Custom js for this page-->
    <!-- End custom js for this page-->
</body>

</html>