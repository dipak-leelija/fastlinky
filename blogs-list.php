<?php
session_start();
//include_once('checkSession.php');
// require_once("_config/dbconnect.php");
require_once("_config/dbconnect.php");
require_once "_config/dbconnect.trait.php";

require_once("includes/constant.inc.php");
require_once("classes/date.class.php");
require_once("classes/error.class.php");
require_once("classes/search.class.php");
require_once("classes/customer.class.php");
require_once("classes/login.class.php");
require_once("classes/blog_mst.class.php");

//require_once("../classes/front_photo.class.php");
require_once("classes/blog_mst.class.php");
require_once("classes/utility.class.php");
require_once("classes/utilityMesg.class.php");
require_once("classes/utilityImage.class.php");
require_once("classes/utilityNum.class.php");

require_once "classes/wishList.class.php";

/* INSTANTIATING CLASSES */
$dateUtil      	= new DateUtil();
$error 			= new Error();
$search_obj		= new Search();
$customer		= new Customer();
$logIn			= new Login();
$blogMst		= new BlogMst();

//$ff				= new FrontPhoto();
// $blogMst		= new BlogMst();
$utility		= new Utility();
$uMesg 			= new MesgUtility();
$uImg 			= new ImageUtility();
$uNum 			= new NumUtility();

$WishList		= new WishList();
######################################################################################################################
$typeM		= $utility->returnGetVar('typeM','');
//user id
$cusId		= $utility->returnSess('userid', 0);
$cusDtl		= $customer->getCustomerData($cusId);

if($cusId == 0){
	header("Location: index.php");
}

if($cusDtl[0] == 2){ 
	header("Location: dashboard.php");
}
	
//echo $cusId;exit;
$blogDtls		= $blogMst->ShowBlogApprData();
/* PAGE ACTIVE */
$activePage = basename($_SERVER['PHP_SELF'], ".php");
?>
<!DOCTYPE HTML>
<html lang="zxx">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="<?php echo FAVCON_PATH?>" type="image/png"/>
    <link rel="apple-touch-icon" href="<?php echo FAVCON_PATH?>" />
    <title> Guest posting Blogs List | <?php echo COMPANY_S; ?></title>
    <meta name="keywords" content="" />
    <meta name="description" content="" />
   

    <!-- New Files  -->
    <link rel="stylesheet" href="plugins/bootstrap-5.2.0/css/bootstrap.css">
    <link rel="stylesheet" href="plugins/fontawesome-6.1.1/css/all.css">
    <link rel="stylesheet" href="plugins/data-table/style.css">
    <!-- <link rel="stylesheet" href="plugins"> -->

    <!-- End New Files  -->

    <link href="css/style.css" rel='stylesheet' type='text/css' />
    <link rel="stylesheet" href="css/leelija.css">
    <link href="css/dashboard.css" rel='stylesheet' type='text/css' />
    <link href="css/blog-list.css" rel='stylesheet' type='text/css' />
    <link href="../css/jquery-ui.css" rel="stylesheet">

    <!--//webfonts-->
    <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/themes/base/jquery-ui.css" rel="stylesheet"
        type="text/css">

    <link href="//fonts.googleapis.com/css?family=Montserrat:400,500,600,700,900" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Nunito+Sans:400,700,900" rel="stylesheet">


    <style>
    .list-group-item+.list-group-item {
        border-top-width: 1px;
    }
    .accordion {
        --bs-accordion-border-width: none;
        --bs-accordion-btn-focus-box-shadow: none;

    }

    .accordion-button:not(.collapsed) {
        color: var(--bs-accordion-active-color);
        background-color: white;

    }

    @media (max-width:312px) {
        .accordion-button {
            font-size: .9rem;
        }
    }
    </style>
</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">
    <div id="home">
        <!-- header -->
        <?php require_once 'partials/navbar.php'; ?>
        <!-- //header -->
        <!-- banner -->
        <div class="edit_profile">
            <div class="container-fluid">
                <div class=" display-table">
                    <!--Row start-->
                    <div class="row ">
                        <div class="col-md-3 hidden-xs display-table-cell v-align" id="navigation">

                            <div class="client_profile_dashboard_left">
                            <?php include("dashboard-inc.php");?>
                            <hr class="myhrline">
                            </div>

                        </div>
                        <div class="col-md-9 mt-4 ps-md-3 px-md-4 display-table-cell v-align ">
                            <div class="accordion" id="accordionExample">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingOne">
                                        <button class="accordion-button collapsed text-primary  faq-acc-button border-0 fw-normal" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false"
                                            aria-controls="collapseOne">
                                            <i class="fa-solid fa-magnifying-glass-plus pe-2" style="font-size: 18px;"></i>
                                            Search Filter
                                        </button>
                                    </h2>
                                    <div id="collapseOne" class="accordion-collapse collapse "
                                        aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <div class="row">
                                                <div class="col-lg-3 col-md-4  col-sm-12 py-2">
                                                    <div class="list-group">
                                                        <h5>DA</h5>
                                                        <input type="hidden" id="hidden_minimum_da" value="0" />
                                                        <input type="hidden" id="hidden_maximum_da" value="100" />
                                                        <p id="da_show">1 - 100</p>
                                                        <div id="da_range"></div>
                                                    </div>

                                                    <div class="list-group mt-3">
                                                        <h5>TF</h5>
                                                        <input type="hidden" id="hidden_minimum_tf" value="0" />
                                                        <input type="hidden" id="hidden_maximum_tf" value="100" />
                                                        <p id="tf_show">1 - 100</p>
                                                        <div id="tf_range"></div>
                                                    </div>

                                                </div>
                                                <div class="col-lg-9 col-md-8 col-sm-12 py-2">
                                                    <div class="list-group">
                                                        <h5>Niches</h5>
                                                        <div>
                                                            <?php
								                            $BlogMst  = $blogMst->ShowBlogNichMast();
								                            foreach($BlogMst as $row){
                                                            ?>
                                                            <div class="list-group-item checkbox d-inline-block mt-1">
                                                                <label><input type="checkbox" class="common_selector niche" value="<?php echo $row['niche_name']; ?>"> <?php echo $row['niche_name']; ?></label>
                                                            </div>
                                                            <?php
								                            }
							                                ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--Content sec start-->
                            <div class="table-responsive" id="insideTable">

                                <div class="container text-center text-primary loader">
                                    <img src="images/preloader/loading-preloader.gif" alt="">
                                    <h3>Loding List...</h3>
                                </div>

                            </div>
                        </div>
                        <!--Content end start-->

                    </div>
                    <!--Row end-->

                </div>
            </div>
            <!-- //end container sec -->
        </div>
        <!-- js-->
        <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js"></script>
        <script src="plugins/jquery-3.6.0.min.js"></script>
        <script src="js/jquery.min.js" type="text/javascript"></script>
        <script src="plugins/bootstrap-5.2.0/js/bootstrap.js"></script>
        <script src="plugins/sweetalert/sweetalert2.all.js"></script>
        <!-- js-->
        <script src="js/jquery-ui.js"></script>
        <script src="js/cart.js"></script>
        <script src="js/ajax.js" type="text/javascript"></script>
       
        <script src="js/wishlist.js" type="text/javascript"></script>
        <script src="js/customerSwitchMode.js" type="text/javascript"></script>


        <!-- DataTables -->
        <script src="plugins/data-table/simple-datatables.js"></script>
        <script src="plugins/tinymce/tinymce.js"></script>
        <script src="plugins/main.js"></script>


        <!--Start fetching DATA-->
        <script>
        $(document).ready(function() {

            filter_data();

            function filter_data() {
                $('.filter_data').html('<div id="loading" style="" ></div>');
                var action = 'fetch_data';
                var minimum_da = $('#hidden_minimum_da').val();
                var maximum_da = $('#hidden_maximum_da').val();
                var minimum_tf = $('#hidden_minimum_tf').val();
                var maximum_tf = $('#hidden_maximum_tf').val();
                var niche = get_filter('niche');
                $.ajax({
                    url: "blog-list.inc.php",
                    method: "POST",
                    data: {
                        action: action,
                        minimum_da: minimum_da,
                        maximum_da: maximum_da,
                        minimum_tf: minimum_tf,
                        maximum_tf: maximum_tf,
                        niche: niche
                    },
                    success: function(data) {

                        $('#insideTable').html(data);
                    }
                });
            }

            function get_filter(class_name) {
                var filter = [];
                $('.' + class_name + ':checked').each(function() {
                    filter.push($(this).val());
                });
                return filter;
            }

            $('.common_selector').click(function() {
                filter_data();
            });

            $('#da_range').slider({
                range: true,
                min: 0,
                max: 100,
                values: [1, 100],
                step: 2,
                stop: function(event, ui) {
                    $('#da_show').html(ui.values[0] + ' - ' + ui.values[1]);
                    $('#hidden_minimum_da').val(ui.values[0]);
                    $('#hidden_maximum_da').val(ui.values[1]);
                    filter_data();
                }
            });
            $('#tf_range').slider({
                range: true,
                min: 0,
                max: 100,
                values: [1, 100],
                step: 2,
                stop: function(event, ui) {
                    $('#tf_show').html(ui.values[0] + ' - ' + ui.values[1]);
                    $('#hidden_minimum_tf').val(ui.values[0]);
                    $('#hidden_maximum_tf').val(ui.values[1]);
                    filter_data();
                }
            });

        });
        </script>


</body>

</html>