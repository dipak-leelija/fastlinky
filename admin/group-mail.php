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
                                <!-- <div class="card-header bg-light">
                                    <h4 class="card-title">Sending Group Mail</h4>
                                </div> -->
                                <div class="card-body">
                                    <!-- <div class="row justify-content-center">
                                        <div class="border rounded mx-auto col-md-8 col-lg-7 py-3"> -->
                                    <form class="mail-form needs-validation" action="ajax/group-mail-action.php"
                                        method="post" name="formCustomerMail" novalidate>
                                        <div class="form-group">
                                            <label for="mailTo">Send Mail to</label>
                                            <select class="form-control" name="mailTo" id="mailTo" required>
                                                <option value="" selected disabled>Select</option>
                                                <option value="all-subscriber">All Subscriber</option>
                                                <option value="all-customer">All Customer</option>
                                                <option value="seller-only">Seller Only</option>
                                                <option value="client-only">Client Only</option>
                                            </select>
                                            <div class="invalid-feedback">
                                                Please select user.
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="mailSubject">Subject</label>
                                            <input type="text" class="form-control" name="mail-subject" required>
                                            <div class="invalid-feedback">
                                                Please write a subject for mail.
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label for="mailMessage">Message</label>
                                            <textarea class="form-control" name="mail-message" id="summernote"
                                                required></textarea>
                                            <div class="invalid-feedback">
                                                Mail can't be blank.
                                            </div>

                                        </div>


                                        <div class="d-flex justify-content-around justify-content-md-end">
                                            <button class="btn btn-danger mr-2" onclick="history.back()">Cancel</button>
                                            <button type="submit" class="btn btn-primary" id="sendMail"
                                                name="btnSendMail">
                                                Submit
                                            </button>
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

    <div class="position-fixed bottom-0 right-0 p-3" style="z-index: 999; right: 0; bottom: 0;">
        <div id="sendingToast" class="toast border border-info hide" role="alert" aria-live="assertive"
            aria-atomic="true" data-autohide="false">
            <div class="toast-header bg-info">
                <img src="../images/icons/loading-iconic.gif" class="rounded mr-2" alt="...">
                <strong class="mr-auto text-light">Sending Mail...</strong>
            </div>
            <div class="toast-body align-text-bottom">
                <img src="../images/icons/error.gif" alt="" width="18px" style="margin-bottom: 5px">
                Please Do not click anywhere or close the tab.
            </div>
        </div>
    </div>

    <!-- <script src="<?= URL ?>/plugins/jquery-3.6.0.min.js"></script> -->
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
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (() => {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        const forms = document.querySelectorAll('.needs-validation')
        const mainWrapperDiv = document.querySelector(".main-panel");
        const sendingToast = document.getElementById("sendingToast");

        // Loop over them and prevent submission
        Array.from(forms).forEach(form => {
            form.addEventListener('submit', event => {

                if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                } else {
                    disableDivWithToast()
                }

                form.classList.add('was-validated')
            }, false)
        })

        const disableDivWithToast = () => {
            const toast = new bootstrap.Toast(sendingToast)
            toast.show()

            // disable the main-wrapper div
            mainWrapperDiv.style.pointerEvents = "none";
            mainWrapperDiv.style.opacity = "0.5";
            mainWrapperDiv.style.background = "#000";
        }

        document.addEventListener("DOMContentLoaded", function() {
            var summernote = document.getElementById("summernote");

            if (summernote) {
                // Initialize the summernote editor
                $(summernote).summernote({
                    height: "300px"
                });
            }
        });
    })()
    </script>

</body>

</html>