<?php 
require_once("../includes/constant.inc.php");
session_start();
include_once('checkSession.php');
require_once "../_config/dbconnect.php";

require_once("../includes/user.inc.php");
require_once('../classes/encrypt.inc.php');

require_once("../classes/adminLogin.class.php"); 
require_once("../classes/date.class.php");  
require_once("../classes/error.class.php");  
require_once("../classes/customer.class.php"); 
require_once("../classes/location.class.php"); 
include_once("../classes/countries.class.php");
require_once("../classes/subscriber.class.php");
require_once("../classes/pagination.class.php");
require_once("../classes/search.class.php");

require_once("../classes/utility.class.php"); 
require_once("../classes/utilityMesg.class.php"); 
require_once("../classes/utilityImage.class.php");
require_once("../classes/utilityNum.class.php");
require_once("../classes/utilityStr.class.php");

/* INSTANTIATING CLASSES */
$adminLogin 	= new adminLogin();
$dateUtil      	= new DateUtil();
$error 			= new Error();
$Customer		= new Customer();
$lc		 		= new Location();
$country		= new Countries();
$subscribe		= new EmailSubscriber();
$pages			= new Pagination();
$search_obj		= new Search();

$utility		= new Utility();
$uMesg 			= new MesgUtility();
$uImg 			= new ImageUtility();
$uNum 			= new NumUtility();
$uStr 			= new StrUtility();

###############################################################################################

//declare vars
$typeM		= $utility->returnGetVar('typeM','');
$numResDisplay	= (int)$utility->returnGetVar('numResDisplay', 10);

/*if($numResDisplay == 0)
{
	$numResDisplay = 10;
}*/

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
	
}
else
{
	$link = '';
	$noOfCus	= $Customer->getAllCustomer('ALL', "added_on", "DESC");
}

$noOfCus	= $Customer->getAllCustomer('ALL', "added_on", "DESC");
// print_r($noOfCus);
// exit;

$allCusatomer = $Customer->getAllCust();
// print_r($allCusatomer);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Customer Emails | <?php echo COMPANY_S; ?></title>
    <?php require_once ADM_DIR . "/incs/admin-common-headers.php" ?>
    <link rel="stylesheet" href="<?= ADM_URL ?>vendors/mdi/css/materialdesignicons.min.css" />
    <link rel="stylesheet" href="<?= URL ?>/plugins/data-table/style.css" />
    <link rel="stylesheet" href="<?= URL ?>/css/order-table.css" />
    <style>
    @media (max-width:1200px) {
        .modal .modal-dialog .modal-content .modal-body {
            padding: 0px !important;
        }
    }

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
        <?php require_once "components/_navbar.php"; ?>

        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <?php require_once "components/_settings-panel.php"; ?>


            <!-- partial -->
            <?php require_once "components/_sidebar.php"; ?>
            <!-- partial:../../ -->

            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row">

                        <div class="col-lg-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Email Maintenance</h4>
                                    <div class="table-responsive">
                                        <table id="dtBasicExample" class="table table-striped datatable"
                                            cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>
                                                        Name
                                                    </th>
                                                    <th>
                                                        User Type
                                                    </th>
                                                    <th>
                                                        Email
                                                    </th>


                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                foreach ($noOfCus as $customerId) {
                                                    // echo $customer;
                                                    $dtls = $Customer->getCustomerData($customerId);
                                                ?>
                                                <tr>
                                                    <td>
                                                        <?php echo $dtls[0][5]." ".$dtls[0][6]; ?>
                                                    </td>
                                                    <td>
                                                        <?php if($dtls[0][0] == 1){ echo "User";} else{ echo "Client";}?>
                                                    </td>
                                                    <td>
                                                        <!-- <div class="progress">
                                                            <div class="progress-bar bg-success" role="progressbar"
                                                                style="width: 25%" aria-valuenow="25" aria-valuemin="0"
                                                                aria-valuemax="100"></div>
                                                        </div> -->
                                                        <?php echo $utility->displayEmail($dtls[0][3], $dtls[0][5]." ".$dtls[0][6], "YES", "customer_mail.php"); ?>

                                                    </td>

                                                </tr>
                                                <?php
                                                }
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



                <!-- Modal -->
                <div class="modal fade" id="viewModal" tabindex="-1" aria-labelledby="viewModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="viewModalLabel">Modal title</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body show_modal_body">
                                ...
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- partial -->
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
    <!-- Added Js  -->
    <script src="<?= URL ?>/js/utility.js"></script>
</body>

</html>