<?php
require_once("includes/constant.inc.php");
session_start();

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
// if($cusId == 0)
// {
// header("Location: index.php");
// }
// if($cusDtl[0] == 1){
// header("Location: dashboard.php");
// }

//echo $cusId;exit;
// $blogsDtls 	= $blogMst->ShowUserBlogData($cusDtl[2]);
// $domainDtls	= $domain->ShowUserDomainData($cusDtl[2]);

?>
<!DOCTYPE HTML>
<html lang="zxx">

<head>
    <meta name="robots" content="noindex,nofollow">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User Dashboard - <?php echo COMPANY_S; ?></title>

    <!-- plugins  files -->
    <link href="<?= URL ?>/plugins/bootstrap-5.2.0/css/bootstrap.css" rel="stylesheet" />
    <?php require_once ROOT_DIR.'/plugins/font-awesome/fontawesome.php'?>

    <link href="<?= URL ?>/css/style.css" rel='stylesheet' type='text/css' />
    <link href="<?= URL ?>/css/form.css" rel='stylesheet' type='text/css' />
    <link href="<?= URL ?>/css/dashboard.css" rel='stylesheet' type='text/css' />
</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">
    <div id="home">
        <!-- header -->
        <?php include('header-user-profile.php') ?>
        <!-- //header -->
        <div class="edit_profile">
            <div class="container-fluid1">
                <div class=" display-table">
                    <div class="row ">
                        <div class="col-md-12 mt-4 pl-0 display-table-cell v-align client_profile_dashboard_right">

                            <div class="container">
                                <table class="table table-dark">
                                    <thead>

                                    </thead>
                                    <tbody>
                                        <?php 

                                          $wishListModel = new WishList();
                                          $doller= "$";
                                          print_r($_REQUEST);
                                          $id = $_REQUEST['id'];
                                          $wishListsingleData = $blogMst->showBlog($id);
                                          var_dump($wishListsingleData);
                                          // foreach($wishListsingleData as $row)
                                          // // var_dump($row);
                                          // { 
                                        ?>
                                        <tr>
                                            <th>Website Name</th>
                                            <td><?php echo $wishListsingleData[0]; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Niche</th>
                                            <td><?php echo $wishListsingleData[23];  ?></td>
                                        </tr>
                                        <tr>
                                            <th>Link Type</th>
                                            <td><?php echo $wishListsingleData[7];  ?></td>
                                        </tr>
                                        <tr>
                                            <th>DA</th>
                                            <td><?php echo round($wishListsingleData[1]);  ?></td>
                                        </tr>
                                        <tr>
                                            <th>TF</th>
                                            <td><?php  echo round($wishListsingleData[4]);  ?></td>
                                        </tr>
                                        <tr>
                                            <th>Price($)</th>
                                            <td><?php echo $doller.round($wishListsingleData[9]); ?></td>
                                        </tr>



                                    </tbody>

                                </table>
                                <div class="blogDetails mb-4">
                                    <a href="order-now.php?id=<?php echo $id; ?>" class="btn">Order now</a>
                                </div>
                            </div>

                        </div>
                        <!--Row end-->
                    </div>


                </div>
                <!-- //end display table-->

                <!-- Footer -->
                <?php require_once 'components/footer.inc.php'; ?>
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