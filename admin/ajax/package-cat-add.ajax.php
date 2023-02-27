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

$msg = '';
$tColor = ''; 
if (isset($_POST['addPackage'])) {
        $added = $GPPackage->addNewPackageCat($_POST['category'], '');
        if ($added) {
            $tColor = 'text-primary'; 
            $msg = 'New Package Category Added';
        }else {
            $msg = 'Failed to add';
            $tColor = 'text-danger'; 
        }
}

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
                <div class="content-wrapper pt-0">
                    <div class="container-fluid pt-4 text-center">
                        <p class="font-weight-bold <?php echo $tColor; ?>"></p>
                    </div>
                    <div class="row">

                        <div class="card-body">
                            <form class="row" action="<?php $_SERVER['PHP_SELF']?>" method="POST">
                                <div class="col-md-12 mt-3">
                                    <label for="" class="mb-1">Package Category name</label>
                                    <input type="text" class="form-control" name="category">
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
</body>

</html>