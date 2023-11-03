<?php
require_once("../includes/constant.inc.php");
session_start();
$page = "adminfaqEdit";
include_once('checkSession.php');
require_once("../_config/dbconnect.php");

require_once("../classes/adminLogin.class.php"); 
require_once("../classes/utility.class.php");
require_once("../classes/faqs.class.php");

/* INSTANTIATING CLASSES */
$adminLogin 	= new adminLogin();
$utility		= new Utility();
$faqs		    = new faqs();

/////////////////////////////////////////////////////////////////////////////////////////////////

//declare variables
$typeM		= $utility->returnGetVar('typeM','');
//admin detail
$userData 		=  $adminLogin->getUserDetail($_SESSION[ADM_SESS]);
//parent ids
$pIds	= $utility->getAllId('categories_id', 'static_categories');

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $id		        = $_POST['id'];
	$question		= $_POST['question'];
	$ans		    = $_POST['ans'];
	$page	        = $_POST['page'];
	$addfaq         = $faqs->editfaqs($question, $ans, $page, $id);
}
else if(isset($_POST['btnCancel']))
{
	header("Location: faqs.php");
}
$faqsDtl 	= $faqs->getfaqDetails($_GET['id']); 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once ADM_DIR . "/incs/admin-common-headers.php" ?>
    <title>Skydash Admin</title>
    <link rel="stylesheet" href="<?= URL ?>/plugins/data-table/style.css" />
</head>

<body>
    <div class="container-scroller">
        <?php require_once "components/_navbar.php"; ?>
        <div class="container-fluid page-body-wrapper">
            <?php require_once "components/_settings-panel.php"; ?>
            <?php require_once "components/_sidebar.php"; ?>
            <?php
               foreach ($faqsDtl as $showdata) {
                $showquestion = $showdata['question'];
                $showans      = $showdata['ans'];
                $showpage     = $showdata['page'];
                $showid       = $showdata['id'];
               }?>
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row">
                        <div class="ml-3 mb-3">
                            <h2>EDIT Frequently Asked Questions (FAQs)</h2>
                        </div>
                        <form method="POST" action="<?php echo $_SERVER['PHP_SELF']."?id=$showid"?>"
                            class="row ml-3 mr-3 bg-white text-dark rounded">
                            <input type="hidden" class="form-control" value="<?php echo $showid; ?>" name="id">
                            <div class="col-12 m-3">
                                <label for="inputAddress" class="form-label">Question</label>
                                <input type="text" name="question" class="form-control w-75" id="inputAddress"
                                    value="<?php echo $showquestion; ?>" placeholder="">
                            </div>
                            <div class="col-12 m-3">
                                <label for="inputAddress2" class="form-label">Question Description</label>
                                <input type="text" name="ans" class="form-control w-75" id="inputAddress2"
                                    value="<?php echo $showans; ?>" placeholder="ANS">
                            </div>


                            <div class="col-12 m-3">
                                <label for="inputAddress2" class="form-label">Page Name</label>
                                <input type="text" name="page" class="form-control w-75" id="inputAddress2"
                                    value="<?php echo $showpage; ?>" placeholder="Apartment, studio, or floor">
                            </div>


                            <div class="col-12 m-3">
                                <input name="btneditfaqs" type="submit" class="btn btn-primary" value="EDIT" />
                                <input type="button" onclick="location.href='faqs.php';" class="btn btn-primary"
                                    value="cancel" />

                            </div>
                        </form>

                    </div>
                </div>
                <!-- content-wrapper ends -->

                <!-- Footer Start  -->
                <?php require_once "components/_footer.php"; ?>
                <!-- Footer End  -->

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
</body>

</html>