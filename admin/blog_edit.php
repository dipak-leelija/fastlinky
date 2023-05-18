<?php
require_once("../includes/constant.inc.php");
session_start();
$page = "adminBlogEdit";
include_once('checkSession.php');
require_once("../_config/dbconnect.php");

require_once("../classes/adminLogin.class.php"); 
require_once("../classes/utility.class.php");
require_once("../classes/blog_mst.class.php");

/* INSTANTIATING CLASSES */
$adminLogin 	= new adminLogin();
$utility		= new Utility();
$blogs		    = new BlogMst();

/////////////////////////////////////////////////////////////////////////////////////////////////

//declare variables
$typeM		= $utility->returnGetVar('typeM','');
//admin detail
$userData 		=  $adminLogin->getUserDetail($_SESSION[ADM_SESS]);
//parent ids
$pIds	= $utility->getAllId('categories_id', 'static_categories');

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $blog_id		      = $_POST['blog_id'];
	$domain		          = $_POST['domain'];
	$niche		          = $_POST['niche'];
	$da	                  = $_POST['da'];
    $pa		              = $_POST['pa'];
	$cf		              = $_POST['cf'];
	$tf		              = $_POST['tf'];
	$gip	              = $_POST['gip'];
    $mozr		          = $_POST['mozr'];
	$alexa_traffic		  = $_POST['alexa_traffic'];
	$organic_trafic		  = $_POST['organic_trafic'];
	$follow	              = $_POST['follow'];
    $internal		      = $_POST['internal'];
	$cost		          = $_POST['cost'];
	$review_type		  = $_POST['review_type'];
	$issue	              = $_POST['issue'];
    $issue_comment		  = $_POST['issue_comment'];
	$int_email		      = $_POST['int_email'];
	$ext_email		      = $_POST['ext_email'];
	$ext_contact_name	  = $_POST['ext_contact_name'];
    $ext_cost		      = $_POST['ext_cost'];
	$ex_url		          = $_POST['ex_url'];
	$domain_comments      = $_POST['domain_comments'];
	$deliver_time	      = $_POST['deliver_time'];
    $updated_by	          = $_SESSION[ADM_SESS];

	$addfaq               = $blogs->editBlog($blog_id,$domain,$niche, $da, $pa, $cf, $tf, $gip, $mozr,$alexa_traffic,$organic_trafic, $follow, $internal,
                                   $cost, $review_type, $issue, $issue_comment, $int_email, $ext_email, $ext_contact_name,$ext_cost, 
                                   $ex_url, $domain_comments,$deliver_time,$updated_by);
}
$blogsDtls 	= $blogs->showBlog($_GET['id']); 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once ADM_DIR . "/incs/admin-common-headers.php" ?>
    <title>Skydash Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
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
            <!-- background-color: #cddbff; -->
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                <div class="ml-3 mb-3">
                            <h2>EDIT BLOGS</h2>
                        </div>
                    <div class="row">
                       
                        <form action="<?php echo $_SERVER['PHP_SELF']."?id=".$_GET['id'].""?>" method="post"
                            class="form-sample  bg-white text-dark w-100 rounded">

                            <!-- <form class="form-sample"> -->

                            <div class="row ml-3 mr-3 mt-3">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Blog Id</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="blog_id" class="form-control"
                                                value="<?php echo $_GET['id']; ?>" readonly />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Domain Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="domain" value="<?php echo $blogsDtls[0]; ?>"
                                                class="form-control" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row ml-3 mr-3">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Domain Authority</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="da" value="<?php echo $blogsDtls[1]; ?>"
                                                class="form-control" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Page Authority</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="pa"
                                                value="<?php echo $blogsDtls[2]; ?>" placeholder="" />
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row ml-3 mr-3">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Citation Flow</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="cf" value="<?php echo $blogsDtls[3]; ?>"
                                                class="form-control" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Trust Flow</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="tf" value="<?php echo $blogsDtls[4]; ?>"
                                                class="form-control" />
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row ml-3 mr-3">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Google Index Page</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="gip" value="<?php echo $blogsDtls[5]; ?>"
                                                class="form-control" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Moz Rank</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="mozr" value="<?php echo $blogsDtls[6]; ?>"
                                                class="form-control" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row ml-3 mr-3">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Link Type</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="follow" value="<?php echo $blogsDtls[7]; ?>"
                                                class="form-control" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Source</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="internal" value="<?php echo $blogsDtls[8]; ?>"
                                                class="form-control" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row ml-3 mr-3">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Domain Issue</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="issue" value="<?php echo $blogsDtls[11]; ?>"
                                                class="form-control" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Domain Issue Comments</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="issue_comment"
                                                value="<?php echo $blogsDtls[12]; ?>" class="form-control" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row ml-3 mr-3">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Internal Email</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="int_email" value="<?php echo $blogsDtls[13]; ?>"
                                                class="form-control" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">External Email</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="ext_email" value="<?php echo $blogsDtls[14]; ?>"
                                                class="form-control" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row ml-3 mr-3">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">External Contact Number</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="ext_contact_name"
                                                value="<?php echo $blogsDtls[15]; ?>" class="form-control" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">External Cost</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="ext_cost" value="<?php echo $blogsDtls[16]; ?>"
                                                class="form-control" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row ml-3 mr-3">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Example Url</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="ex_url" value="<?php echo $blogsDtls[17]; ?>"
                                                class="form-control" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Domain Comments</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="domain_comments"
                                                value="<?php echo $blogsDtls[18]; ?>" class="form-control" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row ml-3 mr-3">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Cost Price</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="cost" value="<?php echo $blogsDtls[9]; ?>"
                                                class="form-control" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Review Type</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="review_type" value="<?php echo $blogsDtls[10]; ?>"
                                                class="form-control" />
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row ml-3 mr-3">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Alexa Traffic</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="alexa_traffic"
                                                value="<?php echo $blogsDtls[25]; ?>" class="form-control" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Organic Trafic</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="organic_trafic"
                                                value="<?php echo $blogsDtls[10]; ?>" class="form-control" />
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row ml-3 mr-3">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Niche</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="niche" value="<?php echo $blogsDtls[23]; ?>"
                                                class="form-control" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Deliver Time</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="deliver_time" value="<?php echo $blogsDtls[27]; ?>"
                                                class="form-control" />
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row ml-3 mr-3">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Updated By</label>
                                        <div class="col-sm-9">
                                        <input type="text" name="updated_by" value="<?php echo $blogsDtls[21]; ?>"
                                                class="form-control" readonly/>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 m-3">
                                    <input name="btneditfaqs" type="submit" class="btn btn-primary" value="EDIT" />
                                    <input type="button" onclick="location.href='blog_master.php';"
                                        class="btn btn-primary" value="cancel" />

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- content-wrapper ends -->
                
                <!-- Footer Start  -->
                <?php require_once "partials/_footer.php"; ?>
                <!-- Footer End  -->

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