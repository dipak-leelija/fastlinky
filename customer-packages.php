<?php
require_once "includes/constant.inc.php";
session_start();

require_once ROOT_DIR."/_config/dbconnect.php";

require_once ROOT_DIR."/classes/customer.class.php";
require_once ROOT_DIR."/classes/utility.class.php";
require_once ROOT_DIR."/classes/gp-package.class.php";

/* INSTANTIATING CLASSES */
$customer		= new Customer();
$GPPackage      = new GuestPostpackage();
$utility		= new Utility();
######################################################################################################################
$typeM		    = $utility->returnGetVar('typeM','');
//user id
$cusId		    = $utility->returnSess('userid', 0);
$cusDtl		    = $customer->getCustomerData($cusId);
$currentPage    = $utility->setCurrentPageSession();

require_once ROOT_DIR."/includes/check-customer-login.inc.php";

/* PAGE ACTIVE */
$activePage = basename($_SERVER['PHP_SELF'], ".php");

$failed = false;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // The request is using the POST method
    if (isset($_POST['package'])) {
        if (isset($_SESSION['package'])) {
            unset($_SESSION['package']);
            unset($_SESSION['orderIds']);

            $_SESSION['package'] = $_POST['package'];
            if (isset($_SESSION['package'])) {
                header('Location: packages-summary.php');
                exit;
            }
        }else {
            $_SESSION['package'] = $_POST['package'];
            if (isset($_SESSION['package'])) {
                header('Location: packages-summary.php');
                exit;
            }
        }
    }else {
        $failed = true;
    }
}
?>
<!DOCTYPE HTML>
<html lang="zxx">

<head>
    <meta name="robots" content="noindex,nofollow">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="<?php echo FAVCON_PATH?>" type="image/png" />
    <link rel="apple-touch-icon" href="<?php echo FAVCON_PATH?>" />
    <title>Packages - <?php echo COMPANY_S; ?></title>
    <meta name="keywords" content="" />
    <meta name="description" content="" />


    <!-- Plugins Files -->
    <link href="<?= URL ?>/plugins/bootstrap-5.2.0/css/bootstrap.css" rel="stylesheet">
    <?php require_once ROOT_DIR.'/plugins/font-awesome/fontawesome.php'?>

    <link href="<?= URL ?>/css/style.css" rel='stylesheet' type='text/css' />
    <link href="<?= URL ?>/css/dashboard.css" rel='stylesheet' type='text/css' />
    <link href="<?= URL ?>/css/pricing-mainpage.css" rel='stylesheet' type='text/css' />

    <style>
    #packageList {
        background-color: white;
        /* border: 1px solid blue; */
        border-radius: 0 0 5px 5px;
        border-top: none;
        font-family: sans-serif;
        padding: 5px 5px 5px 15px;
        max-height: 10.4rem;
        overflow-y: auto;
        box-shadow: rgba(50, 50, 93, 0.25) 0px 13px 27px -5px, rgba(0, 0, 0, 0.3) 0px 8px 16px -8px;
    }

    .form-control:focus {

        box-shadow: none !important;
    }

    #packageList option {
        background-color: white;
        padding: 4px;
        margin-bottom: 1px;
        font-size: 15px;
        cursor: pointer;
    }

    #packageList option:hover,
    .active {
        background-color: lightblue;
    }



    /* =========================================== */
    </style>


</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">
    <div id="home">
        <!-- header -->
        <?php require_once 'components/navbar.php'; ?>
        <!-- //header -->
        <!-- banner -->
        <div class="edit_profile">
            <div class="container-fluid">
                <div class=" display-table">
                    <!--Row start-->
                    <div class="row ">
                        <div class="col-md-3 col-sm-12 hidden-xs display-table-cell v-align"
                            style="z-index: 99; background: white;" id="navigation">

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
                            if($failed){
                            ?>
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <strong>oh hoo,</strong> Please Select a package!
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                            <?php
                            }
                            ?>
                            <div class="w-100 mt-3 mt-lg-0">
                                <label>Select Package Category</label>
                                <input class="form-control mt-1" autocomplete="off" role="combobox" list=""
                                    id="searchDatalist" name="package" placeholder="Search here"
                                    onfocusout="hideBlock(this)">
                                <!-- Its important that you keep list attribute empty to hide the default dropdown icon and the browser's default datalist -->
                                <datalist id="packageList" role="listbox">
                                    <?php
                                    $allPackCat = $GPPackage->allPackagesCat();
                                    foreach ($allPackCat as $eachPackCat) {
                                        echo '<option value="'.$eachPackCat['id'].'">'.$eachPackCat['category_name'].'</option>';
                                    }
                                    ?>
                                </datalist>
                            </div>
                            <div>

                                <form class="row m-0 mt-4" action="<?php echo $_SERVER['PHP_SELF']?>" method="post"
                                    novalidate>
                                    <!-- card 1 -->
                                    <?php
                                    $allPacks = $GPPackage->allPackages();
                                    foreach ($allPacks as $eachPack) {
                                        // $pack           = $GPPackage->packDetailsById($packId);
                                        $packCat        = $GPPackage->packCatById($eachPack['category_id']);
                                        $features       = $GPPackage->featureByPackageId($eachPack['id']);
                                        $packFullName   = $packCat['category_name'].' '.$eachPack['package_name'];
                                    ?>


                                    <div class="col-md-3 px-1 my-2 my-md-3">
                                        <div class="card p-card h-100" id="">
                                            <input id="c-box-<?php echo $eachPack['id']?>"
                                                value="<?php echo $eachPack['id']?>" type="checkbox" name="package[]"
                                                required="" class="d-none cart-input">
                                            <div class="price-card-wrapper">
                                                <label for="c-box-<?php echo $eachPack['id']?>"
                                                    class="item-details d-flex flex-column">
                                                    <p class="pricing-title"><?php echo $packFullName;?> (5 Links)</p>
                                                    <ul class="">
                                                        <li> <strong><?php echo $eachPack['blog_post'];?> Per
                                                                Month</strong> </li>
                                                        <?php
                                                        foreach ($features as $eachfeature) {
                                                            echo '<li>'. $eachfeature['features'].'</li>';
                                                        }
                                                        ?>

                                                    </ul>
                                                    <div class="item-price">
                                                        <div class="default-price">
                                                            <?php echo CURRENCY.$eachPack['price']?>/Package</div>
                                                    </div>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                    }
                                    ?>
                                    <!-- card 1 end -->
                                    <div class="text-end text-right mt-5 sticky_fixed-btn-div pe-0 ">
                                        <button class="btn btn-primary" type="submit">Next <i class="fa-sharp fa-solid fa-arrow-right-long"></i></button>
                                    </div>
                                </form>

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
        <script src="<?= URL ?>/plugins/jquery-3.6.0.min.js"></script>
        <script src="<?= URL ?>/js/jquery.min.js" type="text/javascript"></script>
        <script src="<?= URL ?>/plugins/bootstrap-5.2.0/js/bootstrap.js"></script>
        <script src="<?= URL ?>/plugins/sweetalert/sweetalert2.all.js"></script>
        <!-- js-->
        <script src="<?= URL ?>/js/jquery-ui.js"></script>
        <script src="<?= URL ?>/js/cart.js"></script>
        <script src="<?= URL ?>/js/ajax.js" type="text/javascript"></script>

        <script src="<?= URL ?>/js/wishlist.js" type="text/javascript"></script>
        <script src="<?= URL ?>/js/customerSwitchMode.js" type="text/javascript"></script>


        <!-- DataTables -->
        <script src="<?= URL ?>/plugins/tinymce/tinymce.js"></script>
        <script src="<?= URL ?>/plugins/main.js"></script>

        <script>
        const hideBlock = (elem) => {
            // let packageElem = document.getElementById('packageList');

            window.onclick = e => {

                let clickedId = e.target.parentNode.id;
                let listInputId = e.target.id;

                if (clickedId.trim() != 'packageList') {
                    document.getElementById('packageList').style.display = 'none';
                    if (elem.id == listInputId) {
                        document.getElementById('packageList').style.display = 'block';

                    }
                }

            }

        }


        let searchDatalist = document.getElementById('searchDatalist');
        searchDatalist.onfocus = function() {
            packageList.style.display = 'block';
            searchDatalist.style.borderRadius = "5px 5px 0 0";
        };
        for (let option of packageList.options) {
            option.onclick = function() {
                searchDatalist.value = option.innerText;
                packageList.style.display = 'none';
                searchDatalist.style.borderRadius = "5px";
                // alert(option.value);
            }
        };

        searchDatalist.oninput = function() {
            currentFocus = -1;
            var text = searchDatalist.value.toUpperCase();
            for (let option of packageList.options) {
                if (option.innerText.toUpperCase().indexOf(text) > -1) {
                    option.style.display = "block";
                } else {
                    option.style.display = "none";
                }
            };
        }
        var currentFocus = -1;
        searchDatalist.onkeydown = function(e) {
            if (e.keyCode == 40) {
                currentFocus++
                addActive(packageList.options);
            } else if (e.keyCode == 38) {
                currentFocus--
                addActive(packageList.options);
            } else if (e.keyCode == 13) {
                e.preventDefault();
                if (currentFocus > -1) {
                    /*and simulate a click on the "active" item:*/
                    if (packageList.options) packageList.options[currentFocus].click();
                }
            }
        }

        function addActive(x) {
            if (!x) return false;
            removeActive(x);
            if (currentFocus >= x.length) currentFocus = 0;
            if (currentFocus < 0) currentFocus = (x.length - 1);
            x[currentFocus].classList.add("active");
        }

        function removeActive(x) {
            for (var i = 0; i < x.length; i++) {
                x[i].classList.remove("active");
            }
        }
        </script>

</body>

</html>