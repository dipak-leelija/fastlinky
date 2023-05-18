<?php
session_start();
$page = "adminBlogMaster";
require_once dirname(__DIR__) . "/includes/constant.inc.php";
include_once ADM_DIR . "/checkSession.php";
require_once ROOT_DIR . "/_config/dbconnect.php";
require_once ROOT_DIR . "/classes/adminLogin.class.php"; 
require_once ROOT_DIR . "/classes/date.class.php";
require_once ROOT_DIR . "/classes/content-order.class.php";
require_once ROOT_DIR . "/classes/utility.class.php";
require_once ROOT_DIR . "/classes/blog_mst.class.php";


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
    <?php require_once ADM_DIR . "/incs/admin-common-headers.php" ?>
    <title>Listed Blogs - <?php echo COMPANY_FULL_NAME; ?></title>

    <link rel="stylesheet" href="<?php echo URL; ?>/plugins/data-table/style.css">
    <link rel="stylesheet" href="<?php echo ADM_URL; ?>/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="<?php echo URL; ?>/plugins/sweetalert/sweetalert2.css">

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
                                    <div class="border-bottom d-flex justify-content-between pb-1">
                                        <h4 class="card-title">Listed Blogs</h4>
                                        <button type="button" class="btn btn-sm btn-primary"
                                            onclick="goTo('blog-add.php')">Add New Blog
                                        </button>
                                    </div>

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
    <script>
    $(document).ready(function() {
        function lodetable() {
            $.ajax({
                url: "blog-table.ajax.php",
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


    <script>
    function disapproved() {
        return confirm("Are you sure that you want to disapproved the blog?")
    };

    function approved() {
        return confirm("Are you sure that you want to approved the blog?")
    };

    const deleteBlog = (elem) => {
        let blogId = elem.id;
        Swal.fire({
            title: 'Are you sure?',
            text: "want to Delete this blog?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, Delete'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "ajax/blog-delete.ajax.php",
                    type: "POST",
                    data: {
                        delBlogId: blogId
                    },
                    success: function(response) {
                        // alert(response);
                        if (response.includes('true')) {
                            $(`#${blogId}`).closest("tr").fadeOut();
                        } else {
                            // $("success-message").slideUp();
                            Swal.fire(
                                'failed!',
                                'Item Can Not Deleted 😥.',
                                'error'
                            )
                        }
                    }
                });
            }
        })
        return false;
    }
    </script>


</body>

</html>