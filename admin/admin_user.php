<?php 
require_once("../includes/constant.inc.php");
session_start();
include_once('checkSession.php');
require_once "../_config/dbconnect.php";

require_once("../classes/adminLogin.class.php"); 
require_once("../classes/date.class.php"); 

require_once("../classes/content-order.class.php");

require_once("../classes/utility.class.php"); 

/* INSTANTIATING CLASSES */
$adminLogin 	= new adminLogin();
$dateUtil      	= new DateUtil();

// $product		= new Product();

$utility		= new Utility();

######################################################################################################################

//declare vars
$typeM			= $utility->returnGetVar('typeM','');
$keyword		= $utility->returnGetVar('keyword','');
$type			= $utility->returnGetVar('type','');
$mode			= $utility->returnGetVar('mode','');

$adminData	   = $adminLogin->ShowUserData();
	
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>fastlinky Admin</title>
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
    <style>
    .addnewbtncss {
        margin: auto;
        display: flex;
        align-items: center;
        margin-right: 1rem;
        margin-top: -2.6rem;

    }

    @media (min-width:150px) and (max-width:390px) {
        .addnewbtncss {
            margin: 0rem;
            display: flex;
            align-items: center;
            margin-right: 0rem;
            margin-top: -1.2rem;
        }
    }
    </style>
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
                                    <h4 class="card-title">Admin User</h4>
                                    <button type="button" class="btn btn-primary .ml-1 addnewbtncss"
                                        onclick="location.href='add_user.php?action=add_user#addAdmin';"> Add New Admin
                                    </button>
                                    <div class="table-responsive">
                                        <table id="dtBasicExample" class="table table-striped datatable"
                                            cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>
                                                        Id
                                                    </th>
                                                    <th>
                                                        Name
                                                    </th>
                                                    <th>
                                                        Login Id
                                                    </th>                                                 
                                                    <th>
                                                        Added On
                                                    </th>
                                                    <th>
                                                        Last Login
                                                    </th>
                                                    <th>
                                                        Action
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $i=1;                                             
                                                foreach($adminData as $row){
                                                $id = $row['username'];
                                                ?>

                                                <tr >
                                                    <td class="p-0">
                                                        <?php echo $i; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row['fname']." ".$row['lname']; ?>
                                                    </td>
                                                    <td style="WHITE-SPACE: inherit;">
                                                        <?php echo $row['username']; ?>
                                                    </td>                                                                                                 
                                                    <td>
                                                        <?php echo $row['added_on']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row['last_logon']; ?>
                                                    </td>
                                                    <td>
                                                        <a class="text-decoration-none mx-1"
                                                            href="admin_edit.php?action=edit_user&id=<?php echo $id; ?>">
                                                            <i class="fa-regular fa-eye"></i>
                                                        </a>
                                                        <a class="text-decoration-none mx-1"
                                                            href="admin_password.php?action=edit_pass&id=<?php echo $id; ?>">
                                                            <i class="fa-regular fa-pen-to-square mx-1"></i>
                                                        </a>
                                                        <a href='admin_delete.php?id=<?php    echo $id;  ?>'
                                                            class="text-decoration-none mx-1">
                                                            <i class="fa-regular fa-trash-can-xmark text-danger mx-1"
                                                                onclick="return deleteUser();"></i>
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
                <!-- partial:../../partials/_footer.html -->
                <footer class="footer">
                    <div class="d-sm-flex justify-content-center justify-content-sm-between">
                        <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2021.
                            Premium <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap admin
                                template</a> from BootstrapDash. All rights reserved.</span>
                        <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made
                            with <i class="ti-heart text-danger ml-1"></i></span>
                    </div>
                </footer>
                <!-- partial -->
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
    function deleteUser() {

        return confirm("Are you sure that you want to delete the User Contents ?")

    };
    </script>

    <!-- endinject -->
    <!-- Custom js for this page-->
    <!-- End custom js for this page-->
</body>

</html>