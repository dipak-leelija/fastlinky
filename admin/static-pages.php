<?php
require_once("../includes/constant.inc.php");
session_start();
$page = "adminStaticPage";
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

	
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once ADM_DIR . "/incs/admin-common-headers.php" ?>
    <title>Static Pages - <?php echo COMPANY_S?></title>
    <link rel="stylesheet" href="css/fastlinky.css">
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

            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row">

                        <div class="col-lg-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-header bg-white d-flex justify-content-between">
                                    <h4 class="card-title">Static Pages</h4>
                                    <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                                        data-target="#addPageModal"> Add New Page
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
                                                // $i=1;                                             
                                                // foreach($blogsDtls as $row){
                                                // $id = $row['niche_id'];
                                                ?>

                                                <tr>
                                                    <td>
                                                        <?php //echo $i; ?>
                                                    </td>
                                                    <td style="WHITE-SPACE: inherit;">
                                                        <?php //echo $row['niche_name']; ?>
                                                    </td>
                                                    <td style="WHITE-SPACE: inherit;">
                                                        <?php //echo $row['seo_url']; ?>
                                                    </td>
                                                    <td>
                                                        <?php //echo $dateUtil->dateTimeNumber($row['added_on']); ?>
                                                    </td>
                                                    <td>
                                                        <?php //echo $row['added_by']; ?>
                                                    </td>
                                                    <td>
                                                        <!-- <a class="text-decoration-none mx-1"
                                                            href="niches_edit.php?action=edit_niches&id=<?php //echo $id; ?>">
                                                            <i class="fa-regular fa-eye"></i>
                                                        </a>
                                                        <a href='niche_delete.php?id=<?php   // echo $id;  ?>'
                                                            class="text-decoration-none mx-1">
                                                            <i class="fa-regular fa-trash-can-xmark text-danger mx-1"
                                                                onclick="return deleteNiche();"></i>
                                                        </a> -->
                                                    </td>
                                                </tr>
                                                <?php
                                               // $i++;}
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

    <!-- Modal -->
    <div class="modal fade" id="addPageModal" tabindex="-1" aria-labelledby="addPageModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addPageModalLabel">Add New Page</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="forms-sample">
                        <div class="form-group">
                            <label for="pageFullName">Page Url</label>
                            <input type="text" class="form-control" id="pageFullName"
                                placeholder="Page full name with extension">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <script src="vendors/js/vendor.bundle.base.js"></script>
    <script src="../plugins/jquery-3.6.0.min.js"></script>

    <script src="js/off-canvas.js"></script>
    <script src="js/hoverable-collapse.js"></script>
    <script src="js/template.js"></script>
    <script src="js/settings.js"></script>
    <script src="js/todolist.js"></script>

    <!-- <script src="plugins/bootstrap-5.2.0/js/bootstrap.js"></script> -->
    <script src="../plugins/data-table/simple-datatables.js"></script>
    <script src="../plugins/tinymce/tinymce.js"></script>
    <script src="../plugins/main.js"></script>

    <script src="js/fastlinky-admin.js.js"></script>
    <script>
    function deleteNiche() {
        return confirm("Are you sure that you want to delete the niches Contents ?")
    }

    const urlt
    </script>
</body>

</html>