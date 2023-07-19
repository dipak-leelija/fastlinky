<?php
session_start();
require_once("../includes/constant.inc.php");
$page = "adminContactViews";
include_once('checkSession.php');
require_once("../_config/dbconnect.php");

require_once("../classes/adminLogin.class.php");
require_once("../classes/date.class.php");
require_once("../classes/utility.class.php");
require_once("../classes/contact.class.php");

/* INSTANTIATING CLASSES */
$adminLogin 	= new adminLogin();
$DateUtil 	= new DateUtil();
$utility		= new Utility();
$Contact		= new Contact();

/////////////////////////////////////////////////////////////////////////////////////////////////


$ContactDtl 	= $Contact->showContactInfo($_GET['id']);
$time           = $DateUtil->dateTimeText($ContactDtl[5]);

$Contact->markAsSeenContact($_GET['id']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once ADM_DIR . "/incs/admin-common-headers.php" ?>
    <title>Message From <?= $ContactDtl[1]; ?> - <?php echo COMPANY_S; ?></title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
    <style>
    @media(max-width:390px) {
        h3,
        .h3 {
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
          
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="card py-5 px-3 px-md-5">
                        <div class="text-center">
                            <h3 >Contact Message</h3>
                            <p><small><b><?= $time; ?></b></small></p>
                        </div>
                        <div class="d-sm-flex">
                            <h5>Full Name :</h5>
                            <p class="pl-2"><?= $ContactDtl[1]; ?></p>
                        </div>
                        <div class="d-sm-flex">
                            <h5>Email :</h5>
                            <p class="pl-2" style="word-break: break-word;"> <?= $ContactDtl[2]; ?></p>
                        </div>
                        <div class="d-sm-flex">
                            <h5>Contact No. :</h5>
                            <p class="pl-2"> <?= $ContactDtl[3]; ?></p>
                        </div>

                        <div class="d-sm-flex">
                            <h5>Message:</h5>
                            <p class="pl-2"> <?= $ContactDtl[4]; ?></p>
                        </div>

                    </div>
                    <div class="col-12 mt-3 text-center">
                        <input type="button" onclick="history.back()" class="btn btn-primary"
                            value="Go Back" />

                    </div>

                    </form>

                    <!-- </div> -->
                </div>
                <!-- content-wrapper ends -->

                <!-- footer start -->
                <?php require_once "partials/_footer.php"; ?>
                <!-- footer end -->

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

    <script src="../plugins/tinymce/tinymce.js"></script>
    <script src="../plugins/main.js"></script>


    <!-- endinject -->
    <!-- Custom js for this page-->
    <!-- End custom js for this page-->
</body>

</html>