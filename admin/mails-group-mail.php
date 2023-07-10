<?php
require_once("../includes/constant.inc.php");
session_start();
$page = "Mail-groups-mail";
include_once('checkSession.php');
require_once "../_config/dbconnect.php";

require_once("../includes/email.inc.php"); 

require_once("../classes/adminLogin.class.php"); 
require_once("../classes/customer.class.php");
require_once("../classes/search.class.php");
include_once("../classes/emails.class.php");
require_once("../classes/error.class.php"); 
require_once("../classes/date.class.php"); 
require_once("../classes/utility.class.php"); 
require_once("../classes/utilityMesg.class.php"); 
require_once("../classes/customer.class.php"); 

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

//declare vars
$numResDisplay	= (int)$utility->returnGetVar('numResDisplay', 10);


//no of customer
if((isset($_GET['btnSearch'])) &&($_GET['btnSearch'] == 'Search'))
{
	$selStatus		= $utility->returnGetVar('selStatus','');
	$cId			= $utility->returnGetVar('cId',0);
	$loc			= $utility->returnGetVar('loc','');
	$keyword		= $utility->returnGetVar('keyword','');
	$numResDisplay	= $utility->returnGetVar('numResDisplay',10);
	
	$statVar	= "&selStatus=".$selStatus;
	$cntVar		= "&cId=".$cId;
	$numVar		= "&numResDisplay=".$numResDisplay;
	$keyVar		= "&keyword=".$keyword;
	$srchVar	= "&btnSearch=Search";
	$locVar		= "&loc=".$loc;
	
	$link =	$keyVar.$statVar.$cntVar.$numVar.$srchVar.$locVar;
	
	$noOfCus = $search_obj->searchCus($keyword, $selStatus, $loc);
	
}else{
	$link = '';
	$noOfCus	= $Customer->getAllCustomer('ALL', "added_on", "DESC");
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once ADM_DIR . "/incs/admin-common-headers.php" ?>
    <title>Customer Emails | <?php echo COMPANY_S; ?></title>

    <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="../plugins/data-table/style.css">
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
                                    <div class="row justify-content-center">
                                        <div class="border rounded mx-auto col-md-8 col-lg-7 py-3">
                                            <form action="email_sendall_acction.php" method="post"
                                                name="formCustomerMail">
                                                <div class="form-group">
                                                    <label for="mailSubject">Subject</label>
                                                    <input type="text" class="form-control" name="mail-subject">
                                                </div>


                                                <div class="form-group">
                                                    <label for="mailMessage">Message</label>
                                                    <textarea class="form-control" name="mail-message"
                                                        rows="20"></textarea>

                                                </div>


                                                <div class="d-flex justify-content-around justify-content-md-end">
                                                    <button class="btn btn-danger mr-2"
                                                        onclick="history.back()">Cancel</button>
                                                    <button type="submit" class="btn btn-primary"
                                                        onclick="mailSubmit(this)" name="btnSendMail"
                                                        id="btnSendMail">Submit</button>
                                                </div>

                                            </form>

                                        </div>
                                    </div>
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