<?php
session_start();
require_once("_config/dbconnect.php");
require_once "_config/dbconnect.trait.php";

require_once("includes/constant.inc.php");
require_once("classes/search.class.php");
require_once("classes/customer.class.php");
// require_once("classes/domain.class.php");

require_once("classes/blog_mst.class.php");
require_once("classes/utility.class.php");

/* INSTANTIATING CLASSES */
$search_obj		= new Search();
$customer		= new Customer();
// $logIn			= new Login();
// $domain			= new Domain();

//$ff				= new FrontPhoto();
$blogMst		= new BlogMst();
$utility		= new Utility();
######################################################################################################################
$typeM		= $utility->returnGetVar('typeM','');
//user id
$cusId		= $utility->returnSess('userid', 0);
$cusDtl		= $customer->getCustomerData($cusId);

if($cusDtl[0][0] == 0){
	header("Location: index.php");
}

if($cusDtl[0][0] == 1){ 
	header("Location: app.client.php");
}

$blogsDtls 	= $blogMst->ShowUserBlogData($cusDtl[0][2]);

?>
<!DOCTYPE HTML>
<html lang="zxx">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Seller Dashboard :: <?php echo COMPANY_S; ?></title>
    <link rel="shortcut icon" href="<?php echo FAVCON_PATH?>" type="image/png"/>
    <link rel="apple-touch-icon" href="<?php echo FAVCON_PATH?>" />

    <!-- Bootstrap Core CSS -->
    <!-- <link href="css/bootstrap.css" rel='stylesheet' type='text/css' /> -->
    <link href="plugins/bootstrap-5.2.0/css/bootstrap.css" rel='stylesheet' type='text/css' />
    <link href="plugins/fontawesome-6.1.1/css/all.css" rel='stylesheet' type='text/css' />

    <!-- Custom CSS -->
    <link href="css/leelija.css" rel='stylesheet' type='text/css' />
    <link href="css/style.css" rel='stylesheet' type='text/css' />
    <link href="css/form.css" rel='stylesheet' type='text/css' />
    <link href="css/dashboard.css" rel='stylesheet' type='text/css' />
    <!-- //Custom Theme files -->
    <!--webfonts-->
    <link href="//fonts.googleapis.com/css?family=Ubuntu:300,300i,400,400i,500,500i,700,700i" rel="stylesheet">
    <!--//webfonts-->
    <link href="//fonts.googleapis.com/css?family=Montserrat:400,500,600,700,900" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Nunito+Sans:400,700,900" rel="stylesheet">
</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">
    <div id="home">
        <!-- header -->
        <?php require_once 'partials/navbar.php'; ?>
        <!-- //header -->
        <!-- banner -->
        <div class="edit_profile" style="overflow: hidden;">
            <div class="container-fluid">
                <div class=" display-table">
                    <div class="row ">
                        <!--Row start-->
                        <div class="col-md-3 hidden-xs display-table-cell v-align" id="navigation">
                            <div class="client_profile_dashboard_left">
                                <?php include("dashboard-inc.php");?>
                                <hr class="myhrline">
                            </div>

                        </div>
                        <div class="col-md-9 mt-4 ps-md-0 display-table-cell v-align client_profile_dashboard_right">
                            <div class="container p-0">
                                
                                <!--<button type="button" class="slide-toggle">Slide Toggle</button> -->
                                <header>
                                    <div class="add_project_section text-right">
                                        <div class=" display-table">
                                            <!-- start display-->
                                            <div class="grid_1">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="dbox">
                                                            <ul class="list1">
                                                                <li class="list1_right">
                                                                    <a href="gblogs-list.php">
                                                                        <p>Blogs for Guest Service</p><span
                                                                            class="d-block text-center"><?php echo count($blogsDtls); ?></span>
                                                                    </a>
                                                                </li>
                                                                <div class="clearfix"> </div>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="dbox">
                                                            <ul class="list1">
                                                                <li class="list1_right">
                                                                    <p>Balance</p> <span
                                                                        class="d-block text-center text-white">$</span>
                                                                </li>
                                                                <div class="clearfix"> </div>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="dbox">
                                                            <ul class="list1">
                                                                <li class="list1_right">
                                                                    <p>My Reward</p><span
                                                                        class="d-block text-center text-white">0</span>
                                                                </li>
                                                                <div class="clearfix"> </div>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end display //-->

                                    </div>
                                </header>

                                <div class="user-dashboard">
                                    <!-- Dashboard Body Start-->
                                    <div class="bfrom">
                                        <!--start from div-->
                                    </div>
                                </div><!-- Dashboard Body end //-->
                            </div>
                        </div>
                        <!--Row end-->
                    </div>

                    <!-- Modal -->
                    <div id="add_project" class="modal fade" role="dialog">
                        <div class="modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header login-header">
                                    <button type="button" class="close" data-dismiss="modal">×</button>
                                    <h4 class="modal-title">Add Project</h4>
                                </div>
                                <div class="modal-body">
                                    <input type="text" placeholder="Project Title" name="name">
                                    <input type="text" placeholder="Post of Post" name="mail">
                                    <input type="text" placeholder="Author" name="passsword">
                                    <textarea placeholder="Desicrption"></textarea>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="cancel" data-dismiss="modal">Close</button>
                                    <button type="button" class="add-project" data-dismiss="modal">Save</button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- //end display table-->
            </div>
        </div>
        <!-- js-->
        <!-- <script src="js/jquery-2.2.3.min.js"></script> -->
        <script src="plugins/jquery-3.6.0.min.js"></script>
		<!-- alax custom library  -->
        <script src="js/ajax.js"></script>
        <script src="js/customerSwitchMode.js"></script>
		




        <!-- js-->
        <!-- Scrolling Nav JavaScript -->
        <script src="js/scrolling-nav.js"></script>
        <script>
        $(document).ready(function() {
            $('[data-toggle="offcanvas"]').click(function() {
                $("#navigation").toggleClass("hidden-xs");
            });
        });
        </script>


        <!-- //fixed-scroll-nav-js -->
        <script src="js/pageplugs/fixedNav.js"></script>


        <!-- Banner text Responsiveslides -->

        <!-- //Banner text  Responsiveslides -->
        <!-- start-smooth-scrolling -->
        <script src="js/move-top.js"></script>
        <script src="js/easing.js"></script>
        <script>
        jQuery(document).ready(function($) {
            $(".scroll").click(function(event) {
                event.preventDefault();

                $('html,body').animate({
                    scrollTop: $(this.hash).offset().top
                }, 1000);
            });
        });
        </script>
        <!-- //end-smooth-scrolling -->
        <!-- smooth-scrolling-of-move-up -->
        <script src="js/pageplugs/toPageTop.js"></script>

        <script src="js/SmoothScroll.min.js"></script>
        <!-- //smooth-scrolling-of-move-up -->
        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.js">
        </script>
        <!-- //Bootstrap Core JavaScript -->





        
</body>

</html>