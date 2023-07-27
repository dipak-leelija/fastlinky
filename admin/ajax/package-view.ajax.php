<?php 
session_start();
require_once dirname(dirname(__DIR__))."/includes/constant.inc.php";
include_once ADM_DIR.'/checkSession.php';

require_once ROOT_DIR."/includes/user.inc.php";
require_once ROOT_DIR.'/classes/encrypt.inc.php';

require_once ROOT_DIR."/_config/dbconnect.php";

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

if(isset($_GET['data-id'])){
    $packageId = $_GET['data-id'];
}

$msgShow    = 'd-none';
$msg        = '';
$tColor     = '';

if (isset($_POST['updatePackage'])) {
    // print_r($_POST['features']);exit;
    $packageName    = $_POST['package'];
    $categoryId     = $_POST['package_id'];
    $price          = $_POST['price'];
    $blogPosts      = $_POST['blog-posts'];
    $modifiedBy     = '';

    $features       = $_POST['features'];
    // print_r($features);exit;
    if (count($features) > 0) {
        $deleteFirst = $GPPackage->delfeature($packageId);

        if ($deleteFirst) {
            foreach ($features as $eachFeature) {
                // echo $eachFeature.'<br><br>';
                $added = $GPPackage->addPackageFeature($packageId, $eachFeature, $modifiedBy);
            }
        }
    }
    
    $updated = $GPPackage->updatePack($packageId, $categoryId, $packageName, $blogPosts, $price, $modifiedBy);
        if ($updated) {
            $msgShow    = 'd-block';
            $tColor     = 'text-primary'; 
            $msg        = 'Package Updated!';
        }else {
            $msgShow    = 'd-block';
            $msg        = 'Failed to update package!';
            $tColor     = 'text-danger'; 
        }
}

$package        = $GPPackage->packDetailsById($packageId);
$packageCats    = $GPPackage->allPackagesCat();
$allFeatures       = $GPPackage->featureByPackageId($packageId);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once ADM_DIR . "/incs/admin-common-headers.php" ?>
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
                            <form class="row" action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="POST">
                                <div class="col-md-12 mt-3">
                                    <label for="" class="mb-1">Package name</label>
                                    <input type="text" class="form-control" name="package"
                                        value="<?php echo $package['package_name']?>">
                                </div>

                                <div class="col-md-4 mt-3">
                                    <label for="" class="mb-1">Package Category</label>
                                    <select name="package_id" id="" class="form-control">
                                        <option value="">Select Package Category</option>
                                        <?php
                                        foreach ($packageCats as $eachCat) {
                                            if ($package['category_id'] == $eachCat['id']) {
                                                $selected   = 'selected';
                                            }else {
                                                $selected   = '';
                                            }
                                            echo '<option value="'.$eachCat['id'].'"'.$selected.'>'.$eachCat['category_name'].'</option>';
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="col-md-4 mt-3">
                                    <label for="" class="mb-1">Price</label>
                                    <input type="number" class="form-control" name="price"
                                        value="<?php echo $package['price'];?>">
                                </div>
                                <div class="col-md-4 mt-3">
                                    <label for="" class="mb-1">Blog Posts</label>
                                    <input type="number" class="form-control" name="blog-posts"
                                        value="<?php echo $package['blog_post'];?>">
                                </div>

                                <div class="col-md-12 mt-4" id="featureBox">
                                    <label for="" class="mb-1">Features</label>
                                    <?php
                                    if (count($allFeatures) > 0) {
                                        foreach ($allFeatures as $singleFeature) {
                                            echo '<div class="d-flex align-items-center mt-2">
                                            <input type="text" class="form-control" name="features[]" value="'.$singleFeature['features'].'">
                                            <span><i class="fa-solid fa-xmark h3 mb-0 pb-0 ml-3" onclick="deleteField(this)"></i></span>
                                            </div>';
                                        }
                                    }else {
                                        echo '<input type="text" class="form-control" name="features[]">';
                                    }
                                    ?>
                                </div>

                                <div class="col-md-12 text-right mt-3">
                                    <button type="button" class="btn btn-sm btn-primary" onclick="addField()">More <i
                                            style="font-size: 0.6rem;" class="fa-solid fa-plus"></i> </button>
                                </div>
                                <div class="col-md-12 text-right mt-3">
                                    <button type="reset" class="btn btn-danger">Reset</button>
                                    <button type="submit" name="updatePackage" class="btn btn-primary">Update</button>
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
    <script src="<?php echo ADM_PATH; ?>/vendors/js/vendor.bundle.base.js"></script>
    <script src="<?php echo URL; ?>/plugins/jquery-3.6.0.min.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="<?php echo ADM_PATH; ?>/js/off-canvas.js"></script>
    <script src="<?php echo ADM_PATH; ?>/js/hoverable-collapse.js"></script>
    <script src="<?php echo ADM_PATH; ?>/js/template.js"></script>
    <script src="<?php echo ADM_PATH; ?>/js/settings.js"></script>
    <script src="<?php echo ADM_PATH; ?>/js/todolist.js"></script>

    <!-- <script src="plugins/bootstrap-5.2.0/js/bootstrap.js"></script> -->
    <script src="<?php echo URL; ?>/plugins/data-table/simple-datatables.js"></script>
    <script src="<?php echo URL; ?>/plugins/tinymce/tinymce.js"></script>
    <script src="<?php echo URL; ?>/plugins/main.js"></script>
    <script src="<?php echo URL; ?>/plugins/sweetalert/sweetalert2.all.js"></script>

    <script>
    const addField = () => {
        let filed = `<div class="d-flex align-items-center mt-2">
                        <input type="text" class="form-control" name="features[]">
                        <span><i class="fa-solid fa-xmark h3 mb-0 pb-0 ml-3" onclick="deleteField(this)"></i></span>
                    </div>`;
        document.getElementById("featureBox").innerHTML += filed;
    }

    const deleteField = (elem) => {
        Swal.fire({
            // title: 'Are you sure?',
            title: "Want to delete?",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes'
        }).then((result) => {
            if (result.isConfirmed) {
                elem.parentNode.parentNode.remove();
            }
        })
    }
    </script>

    <!-- endinject -->
    <!-- Custom js for this page-->
    <!-- End custom js for this page-->
</body>

</html>