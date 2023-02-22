<?php
session_start();
//include_once('checkSession.php');
// require_once("_config/connect.php");
require_once("_config/dbconnect.php");
require_once "_config/dbconnect.trait.php";

require_once("includes/constant.inc.php");
require_once("classes/date.class.php");
require_once("classes/error.class.php");
// require_once("classes/search.class.php");
require_once("classes/customer.class.php");
// require_once("classes/login.class.php");
require_once("classes/blog_mst.class.php");

//require_once("../classes/front_photo.class.php");
require_once("classes/blog_mst.class.php");
require_once("classes/utility.class.php");
// require_once("classes/utilityMesg.class.php");
// require_once("classes/utilityImage.class.php");
// require_once("classes/utilityNum.class.php");

/* INSTANTIATING CLASSES */
$dateUtil      	= new DateUtil();
$error 			= new Error();
// $search_obj		= new Search();
$customer		= new Customer();
// $logIn			= new Login();
$blogMst		= new BlogMst();

//$ff				= new FrontPhoto();
$blogMst		= new BlogMst();
$utility		= new Utility();
// $uMesg 			= new MesgUtility();
// $uImg 			= new ImageUtility();
// $uNum 			= new NumUtility();
######################################################################################################################
$typeM		= $utility->returnGetVar('typeM','');
//user id
$cusId		= $utility->returnSess('userid', 0);
$cusDtl		= $customer->getCustomerData($cusId);

if($cusId == 0){
	header("Location: index.php");
}

// echo $cusId;exit;
// echo $cusDtl[0][2];
$blogDtls		= $blogMst->ShowUserBlogData($cusDtl[0][2]);
// print_r($blogDtls);exit;

?>
<!DOCTYPE HTML>
<html lang="zxx">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Guest posting Blogs List| :: <?php echo COMPANY_S; ?></title>
    <link rel="shortcut icon" href="<?php echo FAVCON_PATH?>" type="image/png" />
    <link rel="apple-touch-icon" href="<?php echo FAVCON_PATH?>" />

    <!-- <script>
    addEventListener("load", function() {
        setTimeout(hideURLbar, 0);
    }, false);

    function hideURLbar() {
        window.scrollTo(0, 1);
    }
    </script> -->

    <!-- Bootstrap Core CSS -->
    <!-- <link href="css/bootstrap.css" rel='stylesheet' type='text/css' /> -->
    <link rel="stylesheet" href="plugins/bootstrap-5.2.0/css/bootstrap.css" />
    <link rel="stylesheet" href="plugins/fontawesome-6.1.1/css/all.css" />
    <link rel="stylesheet" href="plugins/data-table/style.css">

    <!-- Custom CSS -->
    <link href="css/leelija.css" rel='stylesheet' type='text/css' />
    <link href="css/style.css" rel='stylesheet' type='text/css' />
    <!-- <link href="css/form.css" rel='stylesheet' type='text/css' /> -->
    <link href="css/dashboard.css" rel='stylesheet' type='text/css' />

    <link href="//fonts.googleapis.com/css?family=Montserrat:400,500,600,700,900" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Nunito+Sans:400,700,900" rel="stylesheet">

</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">
    <div id="home">
        <!-- header -->
        <?php include 'partials/navbar.php'?>

        <!-- //header -->
        <!-- banner -->
        <div class="edit_profile" style="overflow: hidden;">
            <div class="container-fluid">
                <div class=" display-table">
                    <div class="row ">
                        <!--Row start-->
                        <div class="col-md-3 col-sm-12 hidden-xs display-table-cell v-align" id="navigation">

                            <div class="client_profile_dashboard_left">
                                <?php include("dashboard-inc.php");?>
                                <hr class="myhrline">
                            </div>

                        </div>
                        <div class="col-md-9  ps-md-0 display-table-cell v-align ">
                    
                            <div class="col-md-12 col-sm-12  display-table-cell v-align ">
                                <!--Content sec start-->
                                <div class="features your_blog_lists" id="features">
                                    <!--Features Content start-->
                                    <div class="wrap">
                                        <!--Wrap start-->
                                        <h2 class="title color-blue font-weight-bold text-center text-uppercase pb-3 pt-3 pt-md-0">
                                            Your Blogs List</h2>

                                        <div class="features_grids table-responsive">
                                            <table class="table table-striped table-hover datatable">
                                                <thead>
                                                    <tr>
                                                        <th>Sl. No.</th>
                                                        <th>Domain</th>
                                                        <th>Niche</th>
                                                        <th class="dataTable_numeric">DA</th>
                                                        <th class="dataTable_numeric">PA</th>
                                                        <th class="dataTable_numeric">CF</th>
                                                        <th class="dataTable_numeric">TF</th>
                                                        <th>Link Type</th>
                                                        <th>Publish Time</th>
                                                        <th>Charge($)</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    <?php
											    if(count($blogDtls) !=0){
											    $sl = 1;
												foreach($blogDtls as $eachRecord){
										     ?>
                                                    <tr>
                                                        <td><?php echo $sl; ?></td>
                                                        <td style="width: 80px;font-weight:500; word-break: normal;">
                                                            <?php echo $eachRecord['domain'];?></td>
                                                        <td><?php echo $eachRecord['niche'];?></td>
                                                        <td class="text-center">
                                                            <?php echo round($eachRecord['da']);?></td>
                                                        <td class="text-center">
                                                            <?php echo round($eachRecord['pa']);?></td>
                                                        <td class="text-center">
                                                            <?php echo $eachRecord['cf'];?></td>
                                                        <td class="text-center">
                                                            <?php echo round($eachRecord['tf']);?></td>
                                                        <td><?php echo $eachRecord['follow']; ?></td>
                                                        <td><?php echo round($eachRecord['deliver_time']);?>Hours
                                                        </td>

                                                        <td class="text-center">
                                                            <?php
																if($eachRecord['cost'] == 0){
																	echo "Free";
																}
																else{
																	echo $eachRecord['cost'];
																}
														?>
                                                        </td>
                                                        <td>
                                                            <?php if($eachRecord['approved']=="No"){
															echo "Pending";
														}
														else{
															echo "Approved";
															}


														?>
                                                        </td>
                                                        <td>
                                                            <a href="edit-my-blog.php?action=EditBlog&blog_id=<?php echo $eachRecord['blog_id']; ?>"
                                                                title="Edit"><i class="fa-solid fa-pen-to-square"></i>
                                                                Edit</a>
                                                        </td>
                                                    </tr>

                                                    <?php

                                                    $sl++;
                                                    }
                                                }
                                                else{

                                                }
                                                ?>
                                                </tbody>
                                            </table>

                                        </div>
                                        <!--end features grid and responsive table-->
                                    </div>
                                    <!--Wrap End-->
                                </div>
                                <!--Features Content end-->
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <script src="plugins/jquery-3.6.0.min.js"></script>

    <script src="plugins/bootstrap-5.2.0/js/bootstrap.js"></script>

    <script src="plugins/data-table/simple-datatables.js"></script>
    <script src="plugins/tinymce/tinymce.js"></script>
    <script src="plugins/main.js"></script>

</body>

</html>