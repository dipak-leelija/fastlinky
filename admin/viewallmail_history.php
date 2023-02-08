<?php 
session_start();
include_once('checkSession.php');
require_once("../_config/dbconnect.php");
require_once("../_config/dbconnect.trait.php");

require_once("../classes/email.class.php"); 
require_once("../classes/utility.class.php");
require_once("../classes/utilityImage.class.php");

/* INSTANTIATING CLASSES */
$Email 	        = new Email();
$utility		= new Utility();
$uImg 			= new ImageUtility();

/////////////////////////////////////////////////////////////////////////////////////////////////

//declare variables
$typeM		    = $utility->returnGetVar('typeM','');
//admin detail

$emailDetail = $Email->getallemailDetail($_GET['id']);
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
            <!-- background-color: #cddbff; -->
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="ml-3 mb-3">
                        <h2>View Email History</h2>
                    </div>
                    <div class="row">

                        <form method="POST" action="<?php echo $_SERVER['PHP_SELF']?>"
                            class="row ml-3 m-3 bg-white text-dark rounded">

                            <div class="col-12 m-3">
                                <label for="inputAddress" class="form-label">To Name</label>
                                <input type="text" name="niche_name" class="form-control w-75" id="inputAddress"
                                    value="<?php echo $emailDetail[2]; ?>" readonly>
                            </div>

                            <div class="col-12 m-3">
                                <label for="inputAddress2" class="form-label">To EMail</label>
                                <input type="text" name="txtFName" class="form-control w-75"
                                    value="<?php echo $emailDetail[1]; ?>" readonly>
                            </div>
                            <div class="col-12 m-3">
                                <label for="inputAddress2" class="form-label">From EMail</label>
                                <input type="text" name="txtSurname" class="form-control w-75"
                                    value="<?php echo $emailDetail[0]; ?>" readonly>
                            </div>

                            <div class="col-12 m-3">
                                <label for="inputAddress2" class="form-label">Subject</label>
                                <input type="text" name="txtAddress" class="form-control w-75"
                                    value="<?php echo $emailDetail[3]; ?>" readonly>
                            </div>
                            <div class="col-12 m-3">
                                <label for="inputAddress2" class="form-label">Message</label>
                                <textarea type="text" name="txtEmail" class="form-control w-75"
                                    readonly><?php echo $emailDetail[4]; ?></textarea>
                            </div>

                            <div class="col-12 m-3">
                                <label for="inputAddress2" class="form-label">Created On</label>
                                <input type="text" name="txtEmail" class="form-control w-75"
                                    value="<?php echo $emailDetail[5]; ?>" readonly>
                            </div>

                            <div class="col-12 m-3">
                                <input type="button" onclick="location.href='email_history.php';"
                                    class="btn btn-primary" value="cancel" />

                            </div>
                        </form>
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

    <!-- endinject -->
    <!-- Custom js for this page-->
    <!-- End custom js for this page-->
</body>

</html>