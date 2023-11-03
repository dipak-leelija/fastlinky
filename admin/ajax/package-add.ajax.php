<?php
session_start();
require_once dirname(dirname(__DIR__))."/includes/constant.inc.php";
include_once ADM_DIR.'/checkSession.php';

require_once ROOT_DIR."/_config/dbconnect.php";

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
    <?php require_once ADM_DIR . "/incs/admin-common-headers.php" ?>
    <link rel="stylesheet" href="<?= URL ?>/plugins/data-table/style.css" />

</head>

<body>
    <div class="container-scroller">

        <!-- partial -->
        <div class="container-fluid">
            <div class="main-panel">
                <p class="font-weight-bold text-center bg-secondary py-3 <?php echo $msgShow, $tColor; ?>">
                    <?php echo $msg; ?></p>
                <div class="content-wrapper pt-0">
                    <div class="row">

                        <div class="card-body">
                            <form class="row" action="<?php $_SERVER['PHP_SELF']?>" method="POST">
                                <div class="col-md-12 mt-3">
                                    <label for="" class="mb-1">Package name</label>
                                    <input type="text" class="form-control" name="package">
                                </div>

                                <div class="col-12 mt-3">
                                    <label for="" class="mb-1">Package Category</label>
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