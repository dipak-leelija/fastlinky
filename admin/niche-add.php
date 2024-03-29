<?php
require_once "../includes/constant.inc.php";
session_start();
$page = "adminNicheAdd";
include_once('checkSession.php');
require_once("../_config/dbconnect.php");

require_once("../classes/adminLogin.class.php"); 
require_once("../classes/utility.class.php");
require_once("../classes/blog_mst.class.php");

/* INSTANTIATING CLASSES */
$adminLogin 	= new adminLogin();
$utility		= new Utility();
$blogs		    = new BlogMst();

/////////////////////////////////////////////////////////////////////////////////////////////////

//declare variables
$typeM		= $utility->returnGetVar('typeM','');
//admin detail
$userData 		=  $adminLogin->getUserDetail($_SESSION[ADM_SESS]);
//parent ids
$pIds	= $utility->getAllId('categories_id', 'static_categories');


if(isset($_POST['btnAddniche']))
{
	$niche_name		= $_POST['niche_name'];
	$seo_url		= $_POST['seo_url'];
    $added_by	    = $_SESSION[ADM_SESS];
	$addniche         = $blogs->addNiche($niche_name, $seo_url, $added_by);
}
else if(isset($_POST['btnCancel']))
{
	header("Location: blog-niche.php");
}
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
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="ml-3 mb-3">
                        <h2>Add New Niche</h2>
                    </div>
                    <div class="row">

                        <?php 
                    //CREATING NEW USER FORM
                    if( (isset($_GET['action'])) && ($_GET['action'] == 'addniche') )
                    {
            
                    ?>
                        <form action="<?php echo $_SERVER['PHP_SELF']."?action=addniche"?>" method="post"
                            class="row ml-3 mr-3 bg-white text-dark rounded">

                            <div class="col-12 m-3">
                                <label for="inputAddress" class="form-label">Niche Name</label>
                                <input type="text" name="niche_name" class="form-control w-75" id="inputAddress"
                                    placeholder="">
                            </div>
                            <div class="col-12 m-3">
                                <label for="inputAddress2" class="form-label">Seo Url</label>
                                <input type="text" name="seo_url" class="form-control w-75 h-75" id="inputAddress2"
                                    placeholder="URL..">
                            </div>

                            <div class="col-12 m-3">
                                <button name="btnAddniche" type="submit" class="btn btn-primary">Add</button>
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