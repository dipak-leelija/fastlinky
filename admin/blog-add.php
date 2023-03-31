<?php
session_start();
require_once dirname(__DIR__) . "/includes/constant.inc.php";
include_once ADM_DIR . "/checkSession.php";
require_once ROOT_DIR . "/_config/dbconnect.php";
require_once ROOT_DIR . "/classes/adminLogin.class.php"; 
require_once ROOT_DIR . "/classes/date.class.php";
require_once ROOT_DIR . "/classes/content-order.class.php";
require_once ROOT_DIR . "/classes/utility.class.php";
require_once ROOT_DIR . "/classes/blog_mst.class.php";
require_once ROOT_DIR . "/classes/utilityMesg.class.php";
require_once ROOT_DIR . "/classes/error.class.php";
$uMesg 			= new MesgUtility();


/* INSTANTIATING CLASSES */
$adminLogin 	= new adminLogin();
$dateUtil      	= new DateUtil();
$utility		= new Utility();
$blogMst		= new BlogMst();
$MyError		= new MyError();

######################################################################################################################

//declare vars
$typeM			= $utility->returnGetVar('typeM','');
$keyword		= $utility->returnGetVar('keyword','');
$type			= $utility->returnGetVar('type','');
$mode			= $utility->returnGetVar('mode','');

$msg            = '';



if(isset($_POST['btnAddDomain'])){

	$txtDomain			= $_POST['txtDomain'];
	//$txtDomainUrl		= $_POST['txtDomainUrl'];
	$txtNicheId			= $_POST['txtNicheId'];
	$txtDa				= $_POST['txtDa'];
	$txtPa				= $_POST['txtPa'];
	$txtCf				= $_POST['txtCf'];
	$txtTf				= $_POST['txtTf'];
	$txtAlxTraffic		= $_POST['txtAlxTraffic'];
	$txtOrgTraffic		= $_POST['txtOrgTraffic'];
	$txtMozRank			= $_POST['txtMozRank'];
	$txtPrice			= $_POST['txtPrice'];
	$txtFollow			= $_POST['txtFollow'];
	$txtExtUrl			= $_POST['txtExtUrl'];
	$txtDomComments		= $_POST['txtDomComments'];
	$txtDelTime			= $_POST['txtDelTime'];
    $addedBy            = $_SESSION[ADM_SESS];
    // echo $txtFollow; exit;


	//add Blog post session variables
	$sess_arr	= array('txtDomain', 'txtDomainUrl', 'txtNicheId', 'txtDa', 'txtPa', 'txtCf', 'txtTf', 'txtAlxTraffic', 'txtOrgTraffic', 'txtMozRank','txtDelTime', 'txtExtUrl', 'txtPrice');
	$utility->addPostSessArr($sess_arr);

	//defining error variables
	$action		= 'add_domain';
	$url		= $_SERVER['PHP_SELF'];
	$id			= 0;
	$id_var		= '';
	$anchor		= 'addDomain';
	$typeM		= 'ERROR';
	$msg = '';

    $theDomain	    = $MyError->extractDomain($txtDomain);
    $exampDomain	= $MyError->extractDomain($txtExtUrl);
    
    $isNotExist =  $blogMst->searchBlog($theDomain);

	if(preg_match("^ER^",$isNotExist)){
        if ($theDomain == $exampDomain) {
            // echo 'Can be proceed!';
            
            //add Guest Blogs
            $blogId = $blogMst->addBlog($txtDomain,$txtNicheId, $txtDa, $txtPa, $txtCf, $txtTf, '', $txtMozRank, $txtAlxTraffic,$txtOrgTraffic, $txtFollow, '', $txtPrice, '', '', '', '', '', '', $txtPrice, $txtExtUrl, $txtDomComments, $txtDelTime,$addedBy, 'No');
            
            $showsBlog = $blogMst->showBlog($blogId);

            if(count($showsBlog) > 0){
                // deleting the sessions
                $utility->delSessArr($sess_arr);

                // show message after successfully added the new blog
                $msg = 'New Blog Added successfully!';
            }
        }else {
            $msg = 'Blog Domain and example url\'s domain not matched!';
        }
    }else {
        $msg = 'The Domain is alreday exists!';
    }

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Add New Blog - <?php echo COMPANY_FULL_NAME; ?></title>
    <link rel="shortcut icon" href="<?php echo FAVCON_PATH; ?>" type="image/png">

    <link rel="stylesheet" href="<?php echo ADM_URL; ?>/vendors/feather/feather.css">
    <link rel="stylesheet" href="<?php echo ADM_URL; ?>/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="<?php echo URL; ?>/plugins/data-table/style.css">
    <link rel="stylesheet" href="<?php echo ADM_URL; ?>/css/vertical-layout-light/style.css">
    <link rel="stylesheet" href="<?php echo ADM_URL; ?>/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="<?php echo URL; ?>/plugins/sweetalert/sweetalert2.css">


    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.2.1/css/all.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.2.1/css/sharp-solid.css">
</head>

<body>
    <div class="container-scroller">
        <?php require_once "partials/_navbar.php"; ?>

        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <?php require_once "partials/_settings-panel.php"; ?>


            <!-- sidebar start -->
            <?php require_once "partials/_sidebar.php"; ?>
            <!-- sidebar end-->

            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row">

                        <div class="col-lg-12 grid-margin stretch-card">
                            <!-- card start -->
                            <div class="card">
                                <div class="card-body">
                                    <section class="py-0 branches position-relative" id="explore">
                                        <div class="container py-md-2 p-0 container-fluid text-center">
                                            <?php
                                            if ($msg != '') {
                                                echo
                                                    '<div class="border border-danger rounded font-weight-bold py-3 mb-3">
                                                    '.$msg.'
                                                    </div>';
                                            }
                                            ?>
                                            <form class="form-horizontal" role="form"
                                                action="<?php echo $_SERVER['PHP_SELF'] ?>" name="formContactform"
                                                method="post" enctype="multipart/form-data" autocomplete="off">
                                                <div class="form-group">
                                                    <div class="row align-items-center">
                                                        <label class="text-left col-md-2" for="txtDomain">Blog
                                                            Url:</label>
                                                        <div class="col-md-10">
                                                            <input type="text" placeholder="https://example.com/"
                                                                class="form-control" id="txtDomain" name="txtDomain"
                                                                value="<?php $utility->printSess2('txtDomain',''); ?>"
                                                                required />
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="row align-items-center">
                                                        <label class="text-left col-md-2" for="txtNicheId">Niche</label>
                                                        <div class="col-md-10">
                                                            <select id="txtNicheId" class="form-control"
                                                                name="txtNicheId" required>
                                                                <option value="" selected="selected">Select
                                                                </option>
                                                                <?php
                                                                $BlogMst  = $blogMst->ShowBlogNichMast();
                                                                foreach($BlogMst as $eachRecord){
                                                                        echo '<option value="'.$eachRecord['niche_name'].'">'.$eachRecord['niche_name'].'</option>';
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row align-items-center">
                                                        <!-- begion row -->
                                                        <div class="col-md-6">
                                                            <div class="row align-items-center">
                                                                <label class="text-left col-md-4"
                                                                    for="txtDa">DA:</label>
                                                                <div class="col-md-8">
                                                                    <input type="text" class="form-control" id="txtDa"
                                                                        name="txtDa" placeholder="Domain Authority"
                                                                        value="<?php $utility->printSess2('txtDa',''); ?>"
                                                                        required />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="row align-items-center">
                                                                <label class="text-left col-md-4"
                                                                    for="txtPa">PA:</label>
                                                                <div class="col-md-8">
                                                                    <input type="text" class="form-control" id="txtPa"
                                                                        name="txtPa" placeholder="Page Authority"
                                                                        value="<?php $utility->printSess2('txtPa',''); ?>"
                                                                        required />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="row align-items-center">
                                                        <div class="col-md-6">
                                                            <div class="row align-items-center">
                                                                <label class="text-left col-md-4"
                                                                    for="txtCf">CF:</label>
                                                                <div class="col-md-8">
                                                                    <input type="text" class="form-control" id="txtCf"
                                                                        name="txtCf" placeholder="Citation Flow"
                                                                        value="<?php $utility->printSess2('txtCf',''); ?>" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="row align-items-center">
                                                                <label class="text-left col-md-4"
                                                                    for="txtTf">TF:</label>
                                                                <div class="col-md-8">
                                                                    <input type="text" class="form-control" id="txtTf"
                                                                        name="txtTf" placeholder="Trust Flow"
                                                                        value="<?php $utility->printSess2('txtTf',''); ?>" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="form-group">
                                                    <div class="row align-items-center">
                                                        <div class="col-md-6">
                                                            <div class="row align-items-center">
                                                                <label class="text-left col-md-4"
                                                                    for="txtAlxTraffic">Alexa
                                                                    Rank:</label>
                                                                <div class="col-md-8">
                                                                    <input type="text" class="form-control"
                                                                        id="txtAlxTraffic" name="txtAlxTraffic"
                                                                        value="<?php $utility->printSess2('txtAlxTraffic',''); ?>"
                                                                        required />
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="row align-items-center">
                                                                <label class="text-left col-md-4"
                                                                    for="txtOrgTraffic">Organic
                                                                    Traffic:
                                                                </label>
                                                                <div class="col-md-8">
                                                                    <input type="text" class="form-control"
                                                                        id="txtOrgTraffic" name="txtOrgTraffic"
                                                                        value="<?php $utility->printSess2('txtOrgTraffic',''); ?>"
                                                                        required />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row align-items-center">
                                                        <label class="text-left col-md-2" for="txtMozRank">Moz
                                                            Rank:
                                                        </label>
                                                        <div class="col-md-10">
                                                            <input type="text" class="form-control" id="txtMozRank"
                                                                name="txtMozRank"
                                                                value="<?php $utility->printSess2('txtMozRank',''); ?>"
                                                                required />
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="row align-items-center">
                                                        <!-- begion row -->
                                                        <div class="col-md-6">
                                                            <div class="row align-items-center">
                                                                <label class="text-left col-md-4" for="txtFollow">Link
                                                                    Type</label>
                                                                <div class="col-md-8">
                                                                    <select id="txtFollow" class="form-control"
                                                                        name="txtFollow" required>
                                                                        <option value="DoFollow">
                                                                            DoFollow</option>
                                                                        <option value="NoFollow">
                                                                            NoFollow</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="row align-items-center">
                                                                <label class="text-left col-md-4"
                                                                    for="txtDelTime">Publishing Time:</label>
                                                                <div class="col-md-8">
                                                                    <input type="text" class="form-control m-auto"
                                                                        id="txtDelTime" name="txtDelTime"
                                                                        placeholder="(In Hours)"
                                                                        value="<?php $utility->printSess2('txtDelTime',''); ?>"
                                                                        required />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row align-items-center">
                                                        <label class="text-left col-md-2" for="txtExtUrl">Example
                                                            Url:</label>
                                                        <div class="col-md-10">
                                                            <input type="text" class="form-control" id="txtExtUrl"
                                                                placeholder="https://example.com/article"
                                                                name="txtExtUrl"
                                                                value="<?php $utility->printSess2('txtExtUrl',''); ?>"
                                                                required />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row align-items-center">
                                                        <label class="text-left col-md-2"
                                                            for="txtPrice">Price($):</label>
                                                        <div class="col-md-10">
                                                            <input type="text" class="form-control" id="txtPrice"
                                                                name="txtPrice"
                                                                value="<?php $utility->printSess2('txtPrice',''); ?>"
                                                                required />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row align-items-center">
                                                        <label class="text-left col-md-2"
                                                            for="txtDomComments">Remarks:</label>
                                                        <div class="col-md-10">
                                                            <textarea type="text" class="form-control"
                                                                id="txtDomComments" name="txtDomComments" rows="5"
                                                                value="<?php $utility->printSess2('txtDomComments',''); ?>"></textarea>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="">
                                                    <button type="submit" name="btnAddDomain"
                                                        class="btn btn-primary">Add For Sell</button>
                                                </div>
                                            </form>
                                        </div>
                                    </section>
                                    <!-- //Main content -->
                                </div>
                            </div>
                            <!-- card end -->
                        </div>
                    </div>
                </div>
                <!-- content-wrapper ends -->
            </div>
            <!-- main-panel ends -->
            <!-- /partial -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->

    <!-- container-scroller -->
    <script src="<?php echo URL; ?>/plugins/jquery-3.6.0.min.js"></script>
    <script src="<?php echo URL; ?>/plugins/data-table/simple-datatables.js"></script>
    <script src="<?php echo URL; ?>/plugins/tinymce/tinymce.js"></script>
    <script src="<?php echo URL; ?>/plugins/main.js"></script>
    <script src="<?php echo URL; ?>/plugins/sweetalert/sweetalert2.all.min.js" type="text/javascript"></script>


    <script src="<?php echo ADM_URL; ?>/vendors/js/vendor.bundle.base.js"></script>
    <script src="<?php echo ADM_URL; ?>/js/off-canvas.js"></script>
    <script src="<?php echo ADM_URL; ?>/js/hoverable-collapse.js"></script>
    <script src="<?php echo ADM_URL; ?>/js/template.js"></script>
    <script src="<?php echo ADM_URL; ?>/js/settings.js"></script>
    <script src="<?php echo ADM_URL; ?>/js/todolist.js"></script>
    <script src="<?php echo ADM_URL; ?>/js/fastlinky-admin.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</body>

</html>