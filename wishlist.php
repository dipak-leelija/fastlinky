<?php
session_start();
require_once "includes/constant.inc.php";
require_once("_config/dbconnect.php");
require_once "classes/customer.class.php";
require_once "classes/wishList.class.php";
require_once "classes/blog_mst.class.php";
require_once "classes/utility.class.php";
require_once "classes/wishList.class.php";

/* INSTANTIATING CLASSES */

$customer		= new Customer();
$blogMst		= new BlogMst();
$utility		= new Utility();
$WishList       = new WishList();

######################################################################################################################

$typeM		= $utility->returnGetVar('typeM','');

//user id

$cusId		= $utility->returnSess('userid', 0);
$cusDtl		= $customer->getCustomerData($cusId);
if($cusId == 0){
    header("Location: index.php");
}

if($cusDtl[0] == 1){
    header("Location: dashboard.php");
}

$userWishLists = $WishList->showUserWishes($_SESSION['userid']);

?>

<!DOCTYPE HTML>
<html lang="zxx">
<head>
    <meta name="robots" content="noindex,nofollow">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="<?php echo FAVCON_PATH?>" type="image/png" />
    <link rel="apple-touch-icon" href="<?php echo FAVCON_PATH?>" />
    <title>Wishlist | <?php echo COMPANY_S; ?></title>
    <!-- Plugins Files -->
    <link href="<?= URL ?>/plugins/bootstrap-5.2.0/css/bootstrap.css" rel="stylesheet" />
    <?php require_once ROOT_DIR.'/plugins/font-awesome/fontawesome.php'?>

    <!-- Custom CSS -->
    <link href="<?= URL ?>/css/style.css" rel='stylesheet' type='text/css' />
    <link href="<?= URL ?>/css/dashboard.css" rel='stylesheet' type='text/css' />
    <link href="<?= URL ?>/css/wishlist.css" rel='stylesheet' type='text/css' />
    <style>
    @media (min-width:768px) {
        .table-responsive {
            overflow-x: auto !important;
            -webkit-overflow-scrolling: touch !important;
        }
    }
    </style>
</head>

<body>
    <div id="home">
        <!-- navbar start -->
        <?php require_once 'components/navbar.php' ?>
        <!-- navbar end -->
        <div class="edit_profile">
            <div class="container-fluid">
                <div class=" display-table">
                    <div class="row ">
                        <div class="col-md-3 col-sm-12 hidden-xs display-table-cell v-align" id="navigation">
                            <!--*****************TOOGLE OFFCANVAS FOR SIDEBAR ONLY IN MOBILE TAB ******************* -->
                            <div class="extra-added-butn-for-mob-tab ">
                                <button class="sidebar-icon-btn " type="button" data-bs-toggle="offcanvas"
                                    data-bs-target="#staticBackdrop" aria-controls="staticBackdrop">
                                    <i class="fa-solid fa-angles-right"></i>
                                </button>
                                <div class="offcanvas offcanvas-start " data-bs-scroll="true" data-bs-backdrop="static"
                                    tabindex="-1" id="staticBackdrop" aria-labelledby="staticBackdropLabel">
                                    <div class="offcanvas-header">
                                        <h5 class="offcanvas-title" id="staticBackdropLabel"></h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="offcanvas-body">
                                        <?php include("dashboard-inc.php");?>
                                        <hr class="myhrline">
                                    </div>
                                </div>
                            </div>
                            <div class="client_profile_dashboard_left">
                                <?php include("dashboard-inc.php");?>
                                <hr class="myhrline">
                            </div>
                            <!--***********TOOGLE OFFCANVAS FOR SIDEBAR ONLY IN MOBILE TAB ******************* -->
                        </div>
                        <div class="col-md-9  ps-md-0 display-table-cell v-align extra-mrgin-top-for-mtab">
                            <?php
                                $x=1;
                                if($userWishLists !=null){
                            ?>
                            <div class="wishListtable m-auto mt-3 mt-md-0">
                                <div class="table-responsive" id="insideTable">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th scope="col">No</th>
                                                <th scope="col">Site Name</th>
                                                <th scope="col">Niche</th>
                                                <th scope="col">DA</th>
                                                <th scope="col">DR</th>
                                                <th scope="col">Link Type</th>
                                                <th scope="col">Price ( <?= CURRENCY?> )</th>
                                                <th scope="col">Grey Niche Price( <?= CURRENCY?> )</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            foreach($userWishLists as $singleWish) { 
                                        ?>
                                            <tr>
                                                <td><?php echo $x; $x++?></td>
                                                <td><?php echo $singleWish['domain'];?></td>
                                                <td><?php echo $singleWish['niche'];?></td>
                                                <td><?php echo $singleWish['da'];?></td>
                                                <td><?php echo $singleWish['dr'];?></td>
                                                <td><?php echo $singleWish['follow'];?></td>
                                                <td><?php echo $singleWish['ext_cost'];?></td>
                                                <td><?php echo $singleWish['grey_niche_cost'];?></td>
                                                <td>

                                                    <a href="order-now.php?id=<?php echo $singleWish['blog_id'] ?>"
                                                        class="badge text-bg-success">
                                                        <span>
                                                            <i class="fas fa-shopping-bag"></i>
                                                        </span> Buy
                                                    </a>

                                                    <a href="javascript:void()"
                                                        id="<?php echo $singleWish['blog_id'];?>"
                                                        onclick="delWish(this);" class="badge text-bg-danger">
                                                        <span>
                                                            <i class="fas fa-minus-circle"></i>
                                                        </span> Remove
                                                    </a>
                                                </td>
                                            </tr>
                                            <?php
                                            } 
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <?php
                                }else {
                                    ?>
                            <div class="border p-4 text-danger text-center empty_bx mt-3 mt-md-0">
                                <p class="emp_icon">
                                    <i class="fa-solid fa-heart-circle-plus"
                                        onclick="gotoNewPage('blogs-list.php')"></i>
                                </p>
                                <p>Wishlist Empty!</p>
                            </div>
                            <?php
                                }
                                ?>
                        </div>
                        <!--Row end-->
                    </div>
                </div>
                <!-- //end display table-->
            </div>
        </div>
        <script src="<?= URL ?>/plugins/bootstrap-5.2.0/js/bootstrap.js" type="text/javascript"></script>
        <script src="<?= URL ?>/plugins/jquery-3.6.0.min.js" type="text/javascript"></script>
        <script src="<?= URL ?>/plugins/sweetalert/sweetalert2.all.min.js" type="text/javascript"></script>
        <script src="<?= URL ?>/js/ajax.js" type="text/javascript"></script>

        <script>
        const gotoNewPage = (pageUrl) => {
            window.location.href = pageUrl;
        }

        const delWish = (t) => {

            Swal.fire({
                title: 'Are you sure?',
                text: "want to remove this item?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, Remove'
            }).then((result) => {
                if (result.isConfirmed) {
                    blogId = t.id;
                    btn = t;
                    $.ajax({
                        url: "wishlistDataRemove.php",
                        type: "GET",
                        data: {
                            BlogId: blogId
                        },
                        success: function(data) {
                            // alert(data);
                            if (data) {
                                $(`#${blogId}`).closest("tr").fadeOut();
                            } else {
                                // $("success-message").slideUp();
                                Swal.fire(
                                    'failed!',
                                    'Item Not Removed 😥.',
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
        <script src="<?= URL ?>/js/customerSwitchMode.js"></script>
</body>

</html>