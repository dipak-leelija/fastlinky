<?php
require_once("../includes/constant.inc.php");
session_start();
$page = "adminContactViews";
include_once('checkSession.php');
require_once("../_config/dbconnect.php");

require_once("../classes/adminLogin.class.php"); 
require_once("../classes/utility.class.php");
require_once("../classes/contact.class.php");

/* INSTANTIATING CLASSES */
$adminLogin 	= new adminLogin();
$utility		= new Utility();
$Contact		= new Contact();

/////////////////////////////////////////////////////////////////////////////////////////////////

$ContactDtl 	= $Contact->showContactInfo($_GET['id']);
$Contact->markAsSeenContact($_GET['id']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once ADM_DIR . "/incs/admin-common-headers.php" ?>
    <title>Skydash Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="../plugins/data-table/style.css">
    <style>
@media(max-width:390px) {
    h2, .h2 {
        font-size: 1.5rem;
    }

    h3, .h3 {
        font-size: 1.325rem;
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
            <!-- background-color: #cddbff; -->
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <!-- <div class="row"> -->
                    <div class="ml-3 mb-3">
                        <h2>Contact View</h2>
                    </div>
                    <div class="card py-5 px-3 px-md-5">
                        <div>
                            <h3 class="text-center">Customer Query section </h3>
                        </div>
                        <div class="d-sm-flex justify-content-end my-3 align-items-center" >
                            <h5>Date & Time :</h5>
                            <p class="pl-2">10July, 12:35 p.m</p>
                        </div>
                        <div class="d-sm-flex">
                            <h5>Full Name :</h5>
                            <p class="pl-2"><?php  echo $ContactDtl[1]; ?></p>
                        </div>
                        <div class="d-sm-flex">
                            <h5>Email :</h5>
                            <p class="pl-2" style="word-break: break-word;"> <?php echo $ContactDtl[2]; ?></p>
                        </div>
                        <div class="d-sm-flex">
                            <h5>Contact No. :</h5>
                            <p class="pl-2"> <?php echo $ContactDtl[3]; ?></p>
                        </div>

                        <div class="d-sm-flex">
                            <h5>Message:</h5>
                            <p class="pl-2"> <?php echo $ContactDtl[4]; ?></p>
                        </div>

                    </div>
                    <div class="col-12 mt-3 text-center">
                        <input type="button" onclick="location.href='contact.php';" class="btn btn-primary"
                            value="Go Back" />

                    </div>
                    <!-- <input type="hidden" class="form-control" value="<?php echo $showid; ?>" name="id">
                        <div class="col-12 m-3">
                            <label for="full-name" class="form-label">Full Name</label>
                            <input type="text" class="form-control w-75" id="full-name"
                                value="<?php echo $ContactDtl[1]; ?>">
                        </div>
                        <div class="col-12 m-3">
                            <label for="email" class="form-label">E-Mail</label>
                            <input type="text" class="form-control w-75" id="email"
                                value="<?php echo $ContactDtl[2]; ?>">
                        </div>
                        <div class="col-12 m-3">
                            <label for="contact-number" class="form-label">Contact No.</label>
                            <input type="text" class="form-control w-75" id="contact-number"
                                value="<?php echo $ContactDtl[3]; ?>">
                        </div>
                        <div class="col-12 m-3">
                            <label for="contact-message" class="form-label">Message</label>
                            <textarea class="form-control w-75" rows="6" cols="30"
                                id="contact-message"><?php echo $ContactDtl[4]; ?></textarea>
                        </div>

                        <div class="col-12 m-3">
                            <input type="button" onclick="location.href='contact.php';" class="btn btn-primary"
                                value="Go Back" />

                        </div> -->

                    </form>

                    <!-- </div> -->
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