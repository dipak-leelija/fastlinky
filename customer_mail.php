<?php 
require_once "../includes/constant.inc.php"; 
require_once "../includes/email.inc.php";

session_start();

include_once('checkSession.php');

require_once "../_config/dbconnect.php";

require_once("../classes/adminLogin.class.php"); 
require_once("../classes/customer.class.php");
require_once("../classes/search.class.php");

include_once("../classes/emails.class.php");

require_once("../classes/error.class.php"); 
require_once("../classes/date.class.php"); 
require_once("../classes/utility.class.php"); 
require_once("../classes/utilityMesg.class.php"); 

/* INSTANTIATING CLASSES */
$adminLogin 	= new adminLogin();
$customer	    = new Customer();
$search_obj		= new Search();

// $PHPMailer      = new PHPMailer();
$emailObj   	= new Emails();

$dateUtil      	= new DateUtil();
$error 			= new MyError();
$utility		= new Utility();
$uMesg 			= new MesgUtility();

###############################################################################################

//declare vars
$typeM		= $utility->returnGetVar('typeM','');


$toName  = $_GET['toName'];
$toEmail = $_GET['toEmail'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="robots" content="noindex,nofollow">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Send Mail to <?php echo $toName;?> | <?php echo COMPANY_S; ?></title>
    <link rel="shortcut icon" href="<?php echo FAVCON_PATH; ?>" type="image/png">

    <link rel="stylesheet" href="vendors/feather/feather.css">
    <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
    <!-- <link rel="stylesheet" href="vendors/mdi/css/materialdesignicons.min.css"> -->
    <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="../plugins/data-table/style.css">
    <link rel="stylesheet" href="css/vertical-layout-light/style.css">
    <link href="<?php echo URL;?>/plugins/fontawesome-free-6.4.0/css/all.min.css" rel='stylesheet' type='text/css' />
    <link href="<?php echo URL;?>/plugins/fontawesome-free-6.4.0/css/fontawesome.min.css" rel='stylesheet'
        type='text/css' />
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.2.1/css/all.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.2.1/css/sharp-solid.css">
</head>

<body class="modal-open">
    <div class="container-scroller">
        <?php require_once "partials/_navbar.php"; ?>

        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <?php require_once "partials/_settings-panel.php"; ?>


            <!-- partial -->
            <?php require_once "partials/_sidebar.php"; ?>

            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="card row py-5 px-2">
                        <div class="border rounded mx-auto col-md-8 col-lg-7">
                            <div class="card-body">
                                <h4 class="card-title">Send Mail to <?php echo $toName;?> </h4>
                                <form class="mail-form" action="" method="post">
                                    <input type="hidden" name="to-name" value="<?php echo $toName;?>">
                                    <input type="hidden" name="to-email" value="<?php echo $toEmail;?>">

                                    <div class="d-md-flex">

                                        <div class="form-group col-sm">
                                            <label for="toName">User Name</label>
                                            <p class="font-weight-bolder border-bottom pb-1 pl-1"><?php echo $toName; ?>
                                            </p>
                                        </div>
                                        <div class="form-group col-sm">
                                            <label for="userEmail">User Email</label>
                                            <p class="font-weight-bolder border-bottom pb-1 pl-1">
                                                <?php echo $toEmail; ?></p>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="mailSubject">Subject</label>
                                        <input type="text" class="form-control" id="mailSubject" name="mail-subject">
                                    </div>
                                    <div class="form-group">
                                        <label for="mailMessage">Message</label>
                                        <textarea class="form-control" id="mailMessage" name="mailMessage"
                                            rows="20"><?php echo "Dear ".$toName.",\r\n\n";?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="mail-format">Format</label>
                                        <select class="custom-select" id="mail-format" name="mail-format">
                                            <option value="0">Text</option>
                                            <option value="1">HTML</option>
                                        </select>
                                    </div>
                                    <div class="d-flex justify-content-around justify-content-md-end">
                                        <button class="btn btn-danger mr-2" onclick="history.back()">Cancel</button>
                                        <button type="button" class="btn btn-primary"
                                            onclick="mailSubmit(this)">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- content-wrapper ends -->

            </div>
            <!-- main-panel ends -->
            <!-- partial -->
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


    <div class="position-fixed bottom-0 right-0 p-3" style="z-index: 999; right: 0; bottom: 0;">
        <div id="sendedToast" class="toast border border-primary hide" role="alert" aria-live="assertive"
            aria-atomic="true" data-autohide="false">
            <div class="toast-header bg-primary text-light">
                <img src="../images/icons/mail-sended20x20.gif" class="rounded mr-2" alt="...">
                <strong class="mr-auto">Mail Sent</strong>
                <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="toast-body">
                <img src="../images/icons/success.png" alt="" width="18px" style="margin-bottom: 5px">
                Mail has been sended successfully, Now you can go back.
            </div>
        </div>
    </div>

    <div class="position-fixed bottom-0 right-0 p-3" style="z-index: 999; right: 0; bottom: 0;">
        <div id="failedToast" class="toast border border-danger hide" role="alert" aria-live="assertive"
            aria-atomic="true" data-autohide="false">
            <div class="toast-header bg-danger text-light">
                <img src="../images/icons/error-small.gif" class="rounded mr-2" alt="...">
                <strong class="mr-auto">Failed</strong>
                <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="toast-body">
                <img src="../images/icons/error-small.png" alt="" width="18px" style="margin-bottom: 3px">
                Mail Can not send, please try again.
            </div>
        </div>
    </div>


    <!-- plugins:js -->
    <script src="../plugins/jquery-3.6.0.min.js"></script>
    <script src="vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
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
    // $(document).ready(function() {
    //     $('#failedToast').toast('show');
    // })
    </script>
    <script>
    const sendMail = () => {
        $('#sendingToast').toast('show');
        return new Promise(function(resolve, reject) {
            $.ajax({
                url: "../mail-sending/single-customer_mail.php",
                type: "POST",
                data: $(".mail-form").serialize(),
                success: function(response) {
                    // alert(response)
                    $('#sendedToast').toast('show');
                    $('#sendingToast').toast('hide');
                    resolve(response)
                },
                error: function(response) {
                    // alert("some Error");
                    alert(response)
                    $('#failedToast').toast('show');
                    $('#sendingToast').toast('hide');
                    reject(response)
                }
            });
        });
    }

    const mailSubmit = (t) => {
        t.disabled = true;
        sendMail().then(function(result) {
            if (result.includes('Message has been sent')) {
                $('#sendingToast').toast('hide');
            } else {
                console.log('failed');
            }
        }).catch(function(err) {
            t.disabled = false;
            console.log(err)
            console.log("Mail Can not send")
        })
    }
    </script>
</body>

</html>