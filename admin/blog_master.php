<?php 
session_start();
include_once('checkSession.php');

require_once "../includes/constant.inc.php";
require_once "../_config/dbconnect.php";
require_once "../_config/dbconnect.trait.php";
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



$blogsDtls	   = $blogMst->ShowBlogData();
	
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Blog List - <?php echo COMPANY_FULL_NAME; ?></title>
    <link rel="shortcut icon" href="images/favicon.png" />

    <link rel="stylesheet" href="vendors/feather/feather.css">
    <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="../plugins/data-table/style.css">
    <link rel="stylesheet" href="css/vertical-layout-light/style.css">
    <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="../plugins/sweetalert/sweetalert2.css">


    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.2.1/css/all.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.2.1/css/sharp-solid.css">

    <style>
    .addnewbtncss {
        margin: auto;
        display: flex;
        align-items: center;
        margin-right: 1rem;
        margin-top: -2.6rem;

    }

    @media (min-width:150px) and (max-width:390px) {
        .addnewbtncss {
            margin: 0rem;
            display: flex;
            align-items: center;
            margin-right: 0rem;
            margin-top: -1.2rem;
        }
    }
    </style>
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
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Niche wise Blogs Maintenance</h4>
                                    <button type="button" class="btn btn-primary .ml-1 addnewbtncss"
                                        onclick="location.href='blog_add.php?action=addblog';"> Add New Blogs
                                    </button>
                                    <div class="table-responsive" id="table">

                                    </div>
                                </div>
                            </div>
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
    <script src="../plugins/sweetalert/sweetalert2.all.min.js" type="text/javascript"></script>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
    $(document).ready(function() {
        function lodetable() {
            $.ajax({
                url: "blog_table.ajax.php",
                type: "GET",
                success: function(data) {
                    $('#table').html(data);
                }
            });
        }
        lodetable();

        $(document).on("change", "#cheak", function(e) {
            var approved = $(this).val();
            var id = $(this).data('id');
            if (approved == 'yes') {
                approved = 'no';
            } else {
                approved = 'yes';
            }

            $.ajax({
                url: "blog-approve.php",
                type: "POST",
                data: {
                    approved: approved,
                    id: id
                },
                success: function(data) {

                }
            });
        });
    });
    </script>
</body>

</html>