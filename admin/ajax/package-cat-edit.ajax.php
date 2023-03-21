<?php 
session_start();
require_once "../../includes/constant.inc.php";
include_once('checkSession.php');

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

if(isset($_GET['data-id'])){
    $packCatId = $_GET['data-id'];
}

$msgShow    = 'd-none';
$msg        = '';
$tColor     = ''; 

if (isset($_POST['update'])) {
    // print_r($_POST['features']);exit;
    $category    = $_POST['category'];
    $modifiedBy     = '';

    $updated = $GPPackage->updatePackCat($packCatId, $category, $modifiedBy);
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



$package        = $GPPackage->packCatById($packCatId);
// $packageCats    = $GPPackage->allPackagesCat();
// $allFeatures       = $GPPackage->featureByPackageId($packageId);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="../vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="../css/vertical-layout-light/style.css">
</head>

<body>
    <div class="container-scroller">
        <!-- partial -->
        <div class="container-fluid">
            <div class="main-panel">
            <p class="font-weight-bold text-center bg-secondary py-3 <?php echo $msgShow, $tColor; ?>"><?php echo $msg; ?></p>
                <div class="content-wrapper pt-0">
                    <div class="container-fluid pt-4 text-center">
                        <p class="font-weight-bold <?php echo $tColor; ?>"></p>
                    </div>
                    <div class="row">

                        <div class="card-body">
                            <form class="row" action="<?php $_SERVER['REQUEST_URI']?>" method="POST">
                                <div class="col-md-12 mt-3">
                                    <label for="" class="mb-1">Package Category name</label>
                                    <input type="text" class="form-control" name="category" value="<?php echo $package['category_name']; ?>">
                                </div>

                                <div class="col-md-12 text-right mt-3">
                                    <button type="submit" name="update" class="btn btn-primary">update</button>
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
</body>

</html>