<?php
session_start();
$page = "viewEmail-history";
require_once dirname(__DIR__) ."/includes/constant.inc.php";
include_once ADM_DIR .'/checkSession.php';
require_once ROOT_DIR."/_config/dbconnect.php";

require_once ROOT_DIR."/classes/emails.class.php"; 
require_once ROOT_DIR."/classes/utility.class.php";
require_once ROOT_DIR."/classes/utilityImage.class.php";

/* INSTANTIATING CLASSES */
$Email 	        = new Emails();
$utility		= new Utility();
$uImg 			= new ImageUtility();

/////////////////////////////////////////////////////////////////////////////////////////////////

//declare variables
$typeM		    = $utility->returnGetVar('typeM','');
//admin detail

$emailDetail = $Email->getemailDetail('id', $_GET['id']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once ADM_DIR . "/incs/admin-common-headers.php" ?>

    <title><?= $emailDetail[2]; ?> - <?= COMPANY_S ?></title>
    <link rel="stylesheet" href="<?= ADM_URL ?>vendors/ti-icons/css/themify-icons.css" />
    <link rel="stylesheet" href="<?= URL ?>/plugins/data-table/style.css" />
</head>
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

<body>
    <div class="container-scroller">
        <?php require_once "components/_navbar.php"; ?>
        <div class="container-fluid page-body-wrapper">
            <?php require_once "components/_settings-panel.php"; ?>
            <?php require_once "components/_sidebar.php"; ?>
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="ml-3 mb-3">
                        <h2 class="fs-3">View Email History</h2>
                    </div>

                    <div class="card py-5 px-md-5 px-3 ">
                        <div>
                            <h3 class="text-center">Customer Emails History Section </h3>
                        </div>
                        <div class="d-sm-flex justify-content-end my-3 align-items-center">
                            <h5>Date & Time :</h5>
                            <p class="pl-2"><?php echo $emailDetail[5]; ?></p>
                        </div>
                        <div class="d-sm-flex">
                            <h5>Customer Name :</h5>
                            <p class="pl-2"><?php echo $emailDetail[2]; ?></p>
                        </div>
                        <div class="d-sm-flex">
                            <h5>Customer Email :</h5>
                            <p class="pl-2" style="word-break: break-word;"> <?php echo $emailDetail[1]; ?></p>
                        </div>
                        <div class="d-sm-flex">
                            <h5>Admin Email :</h5>
                            <p class="pl-2" style="word-break: break-word;"> <?php echo $emailDetail[0]; ?></p>
                        </div>

                        <div class="d-sm-flex">
                            <h5>Subject :</h5>
                            <p class="pl-2"> <?php echo $emailDetail[3]; ?></p>
                        </div>
                        <div class="d-sm-flex">
                            <h5>Message:</h5>
                            <p class="pl-2"> <?php echo $emailDetail[4]; ?></p>
                        </div>
                    </div>
                    <div class="col-12 m-3 text-center">
                        <input type="button" onclick="location.href='mails-history.php';" class="btn btn-primary"
                            value="Go Back" />

                    </div>
                    <!-- <div class="row">

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
                    </div> -->
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
</body>

</html>