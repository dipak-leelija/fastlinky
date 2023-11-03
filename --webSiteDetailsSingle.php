<?php
session_start();
require_once("includes/constant.inc.php");
require_once "_config/dbconnect.php";

require_once("classes/date.class.php");
require_once("classes/error.class.php");
require_once("classes/search.class.php");
require_once("classes/customer.class.php");
require_once("classes/login.class.php");
require_once("classes/domain.class.php");
require_once("classes/wishList.class.php");
//require_once("../classes/front_photo.class.php");
require_once("classes/blog_mst.class.php");
require_once("classes/utility.class.php");
require_once("classes/utilityMesg.class.php");
require_once("classes/utilityImage.class.php");
require_once("classes/utilityNum.class.php");

/* INSTANTIATING CLASSES */

$dateUtil      	= new DateUtil();
$error 			= new Error();
$search_obj		= new Search();
$customer		= new Customer();
$logIn			= new Login();
$domain			= new Domain();

//$ff				= new FrontPhoto();
$blogMst		= new BlogMst();
$utility		= new Utility();
$uMesg 			= new MesgUtility();
$uImg 			= new ImageUtility();
$uNum 			= new NumUtility();
######################################################################################################################
$typeM		= $utility->returnGetVar('typeM','');
//user id
$cusId		= $utility->returnSess('userid', 0);
$cusDtl		= $customer->getCustomerData($cusId);
if($cusId == 0)
{
header("Location: index.php");
}
if($cusDtl[0] == 1){
header("Location: dashboard.php");
}

//echo $cusId;exit;
$blogsDtls 	= $blogMst->ShowUserBlogData($cusDtl[0][2]);
// $domainDtls	= $domain->ShowUserDomainData($cusDtl[0][2]);

?>
<!DOCTYPE HTML>
<html lang="en">

<head>
    <meta name="robots" content="noindex,nofollow">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User Dashboard | Dashboard :: <?php echo COMPANY_S; ?></title>
    
    <!-- Plugins Files -->
    <link href="<?= URL ?>/plugins/bootstrap-5.2.0/css/bootstrap.css" rel="stylesheet" />
    <?php require_once ROOT_DIR.'/plugins/font-awesome/fontawesome.php'?>

    <!-- Custom CSS -->
    <link href="<?= URL ?>/css/style.css" rel='stylesheet' type='text/css' />
    <link href="<?= URL ?>/css/form.css" rel='stylesheet' type='text/css' />
    <link href="<?= URL ?>/css/dashboard.css" rel='stylesheet' type='text/css' />
</head>
<body>
    <div id="home">
        <!-- header -->
        <?php include 'components/navbar.php' ?>
        <!-- //header -->
        <div class="edit_profile">
            <div class="container-fluid1">
                <div class=" display-table">
                    <!--Row start-->
                    <div class="row ">
                        <div class="col-md-3 hidden-xs display-table-cell v-align" id="navigation">

                            <div class="client_profile_dashboard_left">
                                <?php include("dashboard-inc.php");?>
                                <hr>
                            </div>

                        </div>
                        <div class="col-md-9 px-4 px-md-0 mt-4 d-flex flex-column justify-content-center align-items-center client_profile_dashboard_right">


                        <?php 
                            $wishListModel = new WishList();
                            $doller= "$";
                            $id = $_REQUEST['id'];
                            $wishListsingleData = $blogMst->showBlog($id);
                        ?>
                            <div class="card rounded shadow  w-75">
                                <div class="card-body">
                                    <h3 class="card-title"><?php echo $wishListsingleData [0]; ?></h3>
                                    <span class="badge text-bg-primary"><?php echo $wishListsingleData [23]; ?></span>
                                    <p class="card-text align-middle ">
                                    <div class="row px-5 pt-2">
                                        <div class="col-6">
                                            <p><i class="fa-solid fa-square align-middle  fs_bullet me-1"></i><b>DA:</b></p>
                                            <p><i class="fa-solid fa-square align-middle  fs_bullet me-1"></i><b>TF:</b></p>
                                            <p><i class="fa-solid fa-square align-middle  fs_bullet me-1"></i><b>Link Type:</b></p>
                                            <p><i class="fa-solid fa-square align-middle  fs_bullet me-1"></i><b>Price:</b></p>

                                        </div>
                                        <div class="col-6">
                                            <p><b><?php echo round($wishListsingleData [1]); ?></b></p>
                                            <p><b><?php echo round($wishListsingleData [4]); ?></b></p>
                                            <p><b><?php echo $wishListsingleData [7]; ?></b></p>
                                            <p><b><?php echo $doller . $wishListsingleData [9]; ?></b></p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <a href="order-now.php?id=<?php echo $id; ?>" class="btn btn-primary text-right w-25 text-center mt-4">Order now</a>

                        </div>
                    </div>
                    <!--Row end-->
                </div>
                <!-- //end display table-->

                <!-- Footer -->
                <?php require_once 'components/footer.php' ?>
                <!-- /Footer -->
            </div>
        </div>
        <!-- js-->
        <script src="<?= URL ?>/js/jquery-2.2.3.min.js"></script>
        <script src="<?= URL ?>/js/scrolling-nav.js"></script>
        <script>
        $(document).ready(function() {
            $('[data-toggle="offcanvas"]').click(function() {
                $("#navigation").toggleClass("hidden-xs");
            });
        });
        </script>
        <!-- //fixed-scroll-nav-js -->
        <script>
        $(window).scroll(function() {
            if ($(document).scrollTop() > 70) {
                $('nav.pagescrollfix,nav.RWDpagescrollfix').addClass('shrink');
            } else {
                $('nav.pagescrollfix,nav.RWDpagescrollfix').removeClass('shrink');
            }
        });
        </script>
        <!-- Banner text Responsiveslides -->
        <script src="<?= URL ?>/js/responsiveslides.min.js"></script>
        <script>
        // You can also use"$(window).load(function() {"
        $(function() {
            // Slideshow 4
            $("#slider3").responsiveSlides({
                auto: true,
                pager: true,
                nav: false,
                speed: 500,
                namespace: "callbacks",
                before: function() {
                    $('.events').append("<li>before event fired.</li>");
                },
                after: function() {
                    $('.events').append("<li>after event fired.</li>");
                }
            });

        });
        </script>
        <!-- //Banner text  Responsiveslides -->
        <!-- start-smooth-scrolling -->
        <script src="<?= URL ?>/js/move-top.js"></script>
        <script src="<?= URL ?>/js/easing.js"></script>
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
        <script>
        $(document).ready(function() {
            /*
            var defaults = {
            containerID: 'toTop', // fading element id
            containerHoverID: 'toTopHover', // fading element hover id
            scrollSpeed: 1200,
            easingType: 'linear'
            };
            */

            $().UItoTop({
                easingType: 'easeOutQuart'
            });

        });
        </script>
        <script>
        $(document).ready(function() {
            var readURL = function(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('.profile-pic').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(input.files[0]);
                }
            }


            $(".file-upload").on('change', function() {
                readURL(this);
            });

            $(".upload-button").on('click', function() {
                $(".file-upload").click();
            });
        });
        </script>
        <script src="<?= URL ?>/js/SmoothScroll.min.js"></script>
        <script src="<?= URL ?>/js/bootstrap.js"></script>
        <script src="<?= URL ?>/js/customerSwitchMode.js"></script>
</body>

</html>