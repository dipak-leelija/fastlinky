<?php
session_start();
require_once dirname(__DIR__)."/includes/constant.inc.php";
$page = "Mail-groups-mail";
include_once('checkSession.php');

require_once ROOT_DIR."/_config/dbconnect.php";

require_once ROOT_DIR."/includes/email.inc.php"; 

require_once ROOT_DIR."/classes/adminLogin.class.php"; 
require_once ROOT_DIR."/classes/customer.class.php";
require_once ROOT_DIR."/classes/search.class.php";
include_once ROOT_DIR."/classes/emails.class.php";
require_once ROOT_DIR."/classes/error.class.php"; 
require_once ROOT_DIR."/classes/date.class.php"; 
require_once ROOT_DIR."/classes/utility.class.php"; 
require_once ROOT_DIR."/classes/utilityMesg.class.php"; 
require_once ROOT_DIR."/classes/customer.class.php"; 

/* INSTANTIATING CLASSES */
$adminLogin 	= new adminLogin();
$customer	    = new Customer();
$search_obj		= new Search();
$emailObj   	= new Emails();

$dateUtil      	= new DateUtil();
$error 			= new MyError();
$utility		= new Utility();
$uMesg 			= new MesgUtility();

$Customer		= new Customer();

###############################################################################################

//declare vars
$typeM		= $utility->returnGetVar('typeM','');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once ADM_DIR . "/incs/admin-common-headers.php" ?>
    <title>Customer Emails | <?php echo COMPANY_S; ?></title>

    <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
    <!-- <link rel="stylesheet" href="<?= URL ?>/plugins/summernote/summernote.css"> -->
    <link rel="stylesheet" href="<?= URL ?>/plugins/summernote/summernote-lite.min.css">
</head>

<body>
    <div class="container-scroller">
        <?php require_once "partials/_navbar.php"; ?>

        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <?php require_once "partials/_settings-panel.php"; ?>


            <!-- partial -->
            <?php require_once "partials/_sidebar.php"; ?>

            <!-- main-panel start -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row">
                        <div class="col-lg-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-header bg-light">
                                    <h4 class="card-title">Sending Group Mail</h4>
                                </div>
                                <div class="card-body">
                                    <!-- <div class="row justify-content-center">
                                        <div class="border rounded mx-auto col-md-8 col-lg-7 py-3"> -->
                                            <form action="group-mail-action.php" method="post"
                                                name="formCustomerMail">

                                                <div class="form-group">
                                                    <label for="mailTo">Send Mail to</label>
                                                    <select class="form-control" name="mailTo" id="mailTo" required>
                                                        <option value="" selected disabled>Select</option>
                                                        <option value="all-subscriber">All Subscriber</option>
                                                        <option value="all-customer">All Customer</option>
                                                        <option value="seller-only">Seller Only</option>
                                                        <option value="client-only">Client Only</option>
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label for="mailSubject">Subject</label>
                                                    <input type="text" class="form-control" name="mail-subject" required>
                                                </div>


                                                <div class="form-group">
                                                    <label for="mailMessage">Message</label>
                                                    <textarea class="form-control" name="mail-message"
                                                     id="summernote" required></textarea>

                                                </div>


                                                <div class="d-flex justify-content-around justify-content-md-end">
                                                    <button class="btn btn-danger mr-2"
                                                        onclick="history.back()">Cancel</button>
                                                    <button type="submit" class="btn btn-primary"
                                                        onclick="mailSubmit(this)" name="btnSendMail"
                                                        id="btnSendMail">Submit</button>
                                                </div>

                                            </form>

                                        <!-- </div>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- row end  -->
                </div>
                <!-- content wrapper ends -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->

    <script src="<?= URL ?>/plugins/jquery-3.6.0.min.js"></script>
    <script src="<?= URL ?>/plugins/tinymce/tinymce.js"></script>
    <script src="<?= URL ?>/plugins/main.js"></script>

    <script src="<?= ADM_URL ?>vendors/js/vendor.bundle.base.js"></script>
    <script src="<?= ADM_URL ?>js/off-canvas.js"></script>
    <script src="<?= ADM_URL ?>js/hoverable-collapse.js"></script>
    <script src="<?= ADM_URL ?>js/template.js"></script>
    <script src="<?= ADM_URL ?>js/settings.js"></script>
    <script src="<?= ADM_URL ?>js/todolist.js"></script>
    <script src="<?= URL ?>/plugins/summernote/summernote-lite.min.js"></script>

    <script>
    $(document).ready(function() {
        $('#summernote').summernote({
            height: "450px"
        });
    });
    </script>

</body>

</html>