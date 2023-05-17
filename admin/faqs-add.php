<?php
require_once("../includes/constant.inc.php");
session_start();
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


if(isset($_POST['btnAddfaqs']))
{
	$question		= $_POST['question'];
	$ans		    = $_POST['ans'];
	$page	        = $_POST['page'];
	$addfaq         = $faqs->addFaqs($question, $ans, $page);
}
else if(isset($_POST['btnCancel']))
{
	header("Location: faqs.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once ADM_DIR . "/incs/admin-common-headers.php" ?>
    <title>Skydash Admin</title>
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
            <!-- partial:../../ -->
            <!-- background-color: #cddbff; -->
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row">
                        <div class="ml-3 mb-3">
                            <h2>Add New FAQS</h2>
                        </div>
                        <?php 
                    //CREATING NEW USER FORM
                    if( (isset($_GET['action'])) && ($_GET['action'] == 'addfaqs') )
                    {
            
                    ?>
                        <form action="<?php echo $_SERVER['PHP_SELF']."?action=addfaqs"?>" method="post"
                            class="row ml-3 mr-3 bg-white text-dark rounded">

                            <div class="col-12 m-3">
                                <label for="inputAddress" class="form-label">Question</label>
                                <input type="text" name="question" class="form-control w-75" id="inputAddress"
                                    placeholder="QUE...">
                            </div>
                            <div class="col-12 m-3">
                                <label for="inputAddress2" class="form-label">Question Description</label>
                                <textarea type="text" name="ans" class="form-control w-75 h-75" id="inputAddress2"
                                    placeholder="ANS"></textarea>
                            </div>


                            <div class="col-12 m-3">
                                <label for="inputAddress2" class="form-label">Page Name</label>
                                <input type="text" name="page" class="form-control w-75" id="inputAddress2"
                                    placeholder="PAGES">
                            </div>


                            <div class="col-12 m-3">
                                <button name="btnAddfaqs" type="submit" class="btn btn-primary">Add</button>
                                <input name="btnCancel" type="submit" class="btn btn-primary" value="cancel" />

                            </div>
                        </form>
                        <?php 
                    }//eof
                    ?>
                    </div>
                </div>
                <!-- content-wrapper ends -->

                <!-- Footer Start  -->
                <?php require_once "partials/_footer.php"; ?>
                <!-- Footer End  -->

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