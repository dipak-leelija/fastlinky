<?php 
session_start();
include_once('checkSession.php');
require_once "../../includes/constant.inc.php";

require_once ROOT_DIR."/_config/dbconnect.php";
require_once ROOT_DIR."/_config/dbconnect.trait.php";

require_once ROOT_DIR."/includes/user.inc.php";
require_once ROOT_DIR.'/classes/encrypt.inc.php';

require_once ROOT_DIR."/classes/gp-package.class.php";
require_once ROOT_DIR."/classes/date.class.php"; 
require_once ROOT_DIR."/classes/utility.class.php";


/* INSTANTIATING CLASSES */
$GPPackage      = new GuestPostpackage();
$dateUtil      	= new DateUtil();
$utility		= new Utility();


###############################################################################################

//declare vars
$typeM		= $utility->returnGetVar('typeM','');

$msgShow    = 'd-none';
$msg        = '';
$tColor     = '';

if (isset($_POST['addPackage'])) {
    $packageName    = $_POST['package'];
    $categoryId     = $_POST['package_id'];
    $price          = $_POST['price'];
    $blogPosts      = $_POST['blog-posts'];
    $addedBy        = '';

    $added = $GPPackage->insertNewPackage($packageName, $categoryId, $price, $blogPosts, $addedBy);
        if ($added) {
            $msgShow    = 'd-block';
            $tColor     = 'text-primary'; 
            $msg        = 'New Package Added';
        }else {
            $msgShow    = 'd-block';
            $msg        = 'Failed to add package';
            $tColor     = 'text-danger'; 
        }
}

$packageCats = $GPPackage->allPackagesCat();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="../vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="../../plugins/data-table/style.css">

    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="../css/vertical-layout-light/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="images/favicon.png" />

</head>

<body>
    <div class="container-scroller">

        <!-- partial -->
        <div class="container-fluid">
            <div class="main-panel">
                <p class="font-weight-bold text-center bg-secondary py-3 <?php echo $msgShow, $tColor; ?>"><?php echo $msg; ?></p>
                <div class="content-wrapper pt-0">
                    <div class="row">

                        <div class="card-body">
                            <form class="row" action="<?php $_SERVER['PHP_SELF']?>" method="POST">
                                <div class="col-md-12 mt-3">
                                    <label for="" class="mb-1">Package name</label>
                                    <input type="text" class="form-control" name="package">
                                </div>

                                <div class="col-12 mt-3">
                                    <label for="" class="mb-1">Price</label>
                                    <select name="package_id" id="" class="form-control">
                                        <option value="">Select Package Category</option>
                                        <?php
                                        foreach ($packageCats as $eachCat) {
                                            echo '<option value="'.$eachCat['id'].'">'.$eachCat['category_name'].'</option>';
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="col-12 mt-3">
                                    <label for="" class="mb-1">Price</label>
                                    <input type="number" class="form-control" name="price">
                                </div>
                                <div class="col-md-12 mt-3">
                                    <label for="" class="mb-1">Blog Posts</label>
                                    <input type="number" class="form-control" name="blog-posts">
                                </div>
                                <div class="col-md-12 text-right mt-3">
                                    <button type="reset" class="btn btn-danger">Reset</button>
                                    <button type="submit" name="addPackage" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
                <!-- content-wrapper ends -->

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