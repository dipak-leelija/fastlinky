<?php
require_once "../includes/constant.inc.php";
session_start();
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

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $id		        = $_POST['id'];
	$niche_name		= $_POST['niche_name'];
	$seo_url		= $_POST['seo_url'];
	$modified_on	= $_POST['modified_on'];
    $added_by	    = $_SESSION[ADM_SESS];

	$nicheupdate    = $blogs->updateNiche($niche_name, $seo_url, $modified_on, $added_by, $id);
}
$blogsDtls 	= $blogs->showBlogNichMst($_GET['id']); 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Skydash Admin</title>
    <!-- plugins:css -->
    <!-- <link rel="stylesheet" href="vendors/mdi/css/materialdesignicons.min.css"> -->
    <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="../plugins/data-table/style.css">

    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.2.1/css/all.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.2.1/css/sharp-solid.css">


    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="css/vertical-layout-light/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="images/favicon.png" />

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
                            <h2>EDIT NICHE</h2>
                        </div>
                        <form method="POST" action="<?php echo $_SERVER['PHP_SELF']."?id=".$_GET['id'].""?>"
                            class="row ml-3 mr-3 bg-white text-dark rounded">
                            <input type="hidden" class="form-control" value="<?php echo $_GET['id']; ?>" name="id">
                            <div class="col-12 m-3">
                                <label for="inputAddress" class="form-label">Niche Name</label>
                                <input type="text" name="niche_name" class="form-control w-75" id="inputAddress"
                                value="<?php echo $blogsDtls[0][1]; ?>">
                            </div>
                            <div class="col-12 m-3">
                                <label for="inputAddress2" class="form-label">Seo Url</label>
                                <input type="text" name="seo_url" class="form-control w-75" id="inputAddress2"
                                value="<?php echo $blogsDtls[0][6]; ?>" >
                            </div>

                            <div class="col-12 m-3">
                                <label for="inputAddress2" class="form-label">Modified On</label>
                                <input type="text" name="modified_on" class="form-control w-75" id="inputAddress2"
                                value="<?php echo $blogsDtls[0][4]; ?>" readonly>
                            </div>
                            <div class="col-12 m-3">
                                <label for="inputAddress2" class="form-label">Added By</label>
                                <input type="text" name="added_by" class="form-control w-75" id="inputAddress2"
                                value="<?php echo $blogsDtls[0][3]; ?>" readonly>
                            </div>


                            <div class="col-12 m-3">
                            <input name="btneditfaqs" type="submit" class="btn btn-primary" value="EDIT" />
                                <input  type="button"  onclick="location.href='blog-niche.php';" class="btn btn-primary" value="cancel" />

                            </div>
                        </form>
                     
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