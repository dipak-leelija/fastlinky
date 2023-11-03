<?php
require_once("../includes/constant.inc.php");
session_start();
$page = "adminBlogNiches";
include_once('checkSession.php');

require_once "../_config/dbconnect.php";

require_once "../classes/adminLogin.class.php"; 
require_once "../classes/date.class.php";
require_once "../classes/content-order.class.php";
require_once "../classes/utility.class.php";
require_once "../classes/blog_mst.class.php";


/* INSTANTIATING CLASSES */
$adminLogin 	= new adminLogin();
$dateUtil      	= new DateUtil();
$utility		= new Utility();
$blogMst		= new BlogMst();

######################################################################################################################

//declare vars
$typeM			= $utility->returnGetVar('typeM','');
$keyword		= $utility->returnGetVar('keyword','');
$type			= $utility->returnGetVar('type','');
$mode			= $utility->returnGetVar('mode','');

$blogsDtls	   = $blogMst->ShowBlogNichMast();
	
?>

<!DOCTYPE html>
<html lang="en">

<head>
<?php require_once ADM_DIR . "/incs/admin-common-headers.php" ?>
    <title>Niches - <?php echo COMPANY_S?></title>
    <link rel="stylesheet" href="<?= ADM_URL ?>css/fastlinky.css" />
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
                    <div class="row">

                        <div class="col-lg-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-header bg-white d-flex justify-content-between">
                                    <h4 class="card-title">Niche Maintenance</h4>
                                    <button type="button" class="btn btn-sm btn-primary"
                                        onclick="location.href='niche-add.php?action=addniche';"> Add New Niche
                                    </button>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="dtBasicExample" class="table table-striped datatable"
                                            cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>
                                                        SL. NO.
                                                    </th>
                                                    <th>
                                                        Niche Name
                                                    </th>
                                                    <th>
                                                        Seo Url
                                                    </th>
                                                    <th>
                                                        Added On
                                                    </th>
                                                    <th>
                                                        Added By
                                                    </th>
                                                    <th>
                                                        Action
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $i=1;                                             
                                                foreach($blogsDtls as $row){
                                                $id = $row['niche_id'];
                                                ?>

                                                <tr>
                                                    <td>
                                                        <?php echo $i; ?>
                                                    </td>
                                                    <td style="WHITE-SPACE: inherit;">
                                                        <?php echo $row['niche_name']; ?>
                                                    </td>
                                                    <td style="WHITE-SPACE: inherit;">
                                                        <?php echo $row['seo_url']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $dateUtil->dateTimeNumber($row['added_on']); ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row['added_by']; ?>
                                                    </td>
                                                    <td>
                                                        <a class="text-decoration-none mx-1"
                                                            href="niches_edit.php?action=edit_niches&id=<?php echo $id; ?>">
                                                            <i class="fa-regular fa-eye"></i>
                                                        </a>
                                                        <a href='niche_delete.php?id=<?php    echo $id;  ?>'
                                                            class="text-decoration-none mx-1">
                                                            <i class="fa-regular fa-trash-can-xmark text-danger mx-1"
                                                                onclick="return deleteNiche();"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                                <?php
                                                $i++;}
                                              ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- content-wrapper ends -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->

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
    <script>
    function deleteNiche() {
        return confirm("Are you sure that you want to delete the niches Contents ?")
    }
    </script>
</body>
</html>