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
                        <div class="col-md-9 mt-0 ps-md-0 display-table-cell v-align client_profile_dashboard_right">
                            <div class=" p-0">
                                
                                <!--<button type="button" class="slide-toggle">Slide Toggle</button> -->
                                <header>
                                     <!-- dasboard top cards -->
                                     <div class="row">
                                       
                                        <div class="col-lg-3 col-sm-6">
                                            <div class="dboard-cd-box mt-md-0">
                                                <div class="inner">
                                                    <h3> $18538 </h3>
                                                    <p> Balance </p>
                                                </div>
                                                <div class="dboard-icn_font">
                                                    <i class="fa-solid fa-sack-dollar" aria-hidden="true"></i>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-sm-6">
                                            <div class="dboard-cd-box mt-md-0">
                                                <div class="inner">
                                                    <h3> 64 </h3>
                                                    <p> My Reward </p>
                                                </div>
                                                <div class="dboard-icn_font">
                                                    <i class="fa-solid fa-medal" aria-hidden="true"></i>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-sm-6">
                                            <a href="my-guest-post.php">
                                                <div class="dboard-cd-box mt-md-0">
                                                    <div class="inner">
                                                        <h3> 73 </h3>
                                                        <p> My Orders</p>
                                                    </div>
                                                    <div class="dboard-icn_font">
                                                        <i class="fa-solid fa-cart-shopping" aria-hidden="true"></i>
                                                    </div>

                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-lg-3 col-sm-6">
                                            <a href="edit-profile.php">
                                                <div class="dboard-cd-box mt-md-0 ">
                                                    <div class="inner">
                                                        <h3> 13 </h3>
                                                        <p>Setting</p>
                                                    </div>
                                                    <div class="dboard-icn_font" aria-hidden="true">
                                                    <i class="fa-solid fa-gears"></i>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <!-- <div class="add_project_section text-right">
                                        <div class=" display-table">
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
                                    </div> -->
                                </header>
                                <div class="row">
                                    <div class=" col-lg-6 ">
                                        <div class=" table-responsive py-3 p-0">
                                            <h4>Guest Posting Blogs</h4>
                                            <a href="gblogs-list.php">
                                                <div class="card table-responsive p-2"
                                                    style="border-left: 2px solid #FDA33B;">
                                                    <table class="table  table-hover">
                                                        <thead class="table-light">
                                                            <tr>
                                                                <th scope="col">#</th>
                                                                <th scope="col">First</th>
                                                                <th scope="col">Last</th>
                                                                <th scope="col">Handle</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <th scope="row">1</th>
                                                                <td>Mark</td>
                                                                <td>Otto</td>
                                                                <td>@mdo</td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">2</th>
                                                                <td>Jacob</td>
                                                                <td>Thornton</td>
                                                                <td>@fat</td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">3</th>
                                                                <td>Larry</td>
                                                                <td>the Bird</td>
                                                                <td>@twitter</td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">4</th>
                                                                <td>Larry</td>
                                                                <td>the Bird</td>
                                                                <td>@twitter</td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">5</th>
                                                                <td>Larry</td>
                                                                <td>the Bird</td>
                                                                <td>@twitter</td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">6</th>
                                                                <td>jarrt</td>
                                                                <td>the Bird</td>
                                                                <td>@twitter</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </a>
                                        </div>

                                    </div>
                                    <div class=" col-lg-6">
                                        <a href="notifications.php">
                                            <div class="pt-3 pb-0 p-0">
                                                <h4 style=" color: black;">Recent Notification</h4>
                                                <div class="alert alert-warning alert-dismissible fade show"
                                                    role="alert">
                                                    <strong>Holy guacamole!</strong> You should check in on some of
                                                    those
                                                    fields below.
                                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                        aria-label="Close"></button>
                                                </div>
                                            </div>
                                        </a>
                                        <div class="col-lg-12 ">
                                            <a href="add-blog.php">
                                                <div class="card package-details-pricing-crd">
                                                    <h4> Add Blog For Guest Post </h4>
                                                    <img src="./images/package-pricingcard.png" class="w-100 pkg-img1"
                                                        alt="">
                                                    <img src="./images/package-pricingcard2.png" class="w-100 pkg-img2"
                                                        alt="">
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
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