<?php 
session_start();
require_once dirname(dirname(__DIR__))."/includes/constant.inc.php";
include_once ADM_DIR.'/checkSession.php';
require_once ROOT_DIR."/_config/dbconnect.php";

require_once ROOT_DIR."/includes/user.inc.php";
require_once ROOT_DIR."/classes/encrypt.inc.php";

require_once ROOT_DIR."/classes/adminLogin.class.php"; 
require_once ROOT_DIR."/classes/date.class.php";  
require_once ROOT_DIR."/classes/error.class.php";  
require_once ROOT_DIR."/classes/customer.class.php"; 
require_once ROOT_DIR."/classes/location.class.php"; 
require_once ROOT_DIR."/classes/subscriber.class.php";
require_once ROOT_DIR."/classes/pagination.class.php";
require_once ROOT_DIR."/classes/search.class.php";

require_once ROOT_DIR."/classes/utility.class.php"; 
require_once ROOT_DIR."/classes/utilityMesg.class.php"; 
require_once ROOT_DIR."/classes/utilityImage.class.php";
require_once ROOT_DIR."/classes/utilityNum.class.php";
require_once ROOT_DIR."/classes/utilityStr.class.php";

/* INSTANTIATING CLASSES */
$adminLogin 	= new adminLogin();
$dateUtil      	= new DateUtil();
$error 			= new Error();
$customer		= new Customer();
$Location		= new Location();
$subscribe		= new EmailSubscriber();
$pages			= new Pagination();
$search_obj		= new Search();

$utility		= new Utility();
$uMesg 			= new MesgUtility();
$uImg 			= new ImageUtility();
$uNum 			= new NumUtility();
$uStr 			= new StrUtility();

###############################################################################################

//declare vars
$typeM		= $utility->returnGetVar('typeM','');
// $cus_id		= $utility->returnGetVar('cus_id','');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once ADM_DIR . "/incs/admin-common-headers.php" ?>
    <title>Skydash Admin</title>
    <link rel="stylesheet" href="<?= URL ?>/css/order-table.css" />
    <style>
    .content-wrapper {
        background: #F5F7FF;
        padding: 2.375rem 2rem !important;
        width: 100%;
        -webkit-flex-grow: 1;
        flex-grow: 1;
    }

    .card-for-personal {
        margin: auto;
        box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
        padding: 2rem 0.5rem 2rem 1rem;
    }

    .card-for-personal p {
        font-size: 1rem;
        font-weight: 500;
        line-height: 1.2;
    }

    .imgcls-for-dp {
        width: 75px;
        height: 75px;
        border-radius: 100%;
        border: 2px solid black;
    }

    .aligning-for-name {
        align-items: center;
        padding: 0 1rem;
    }

    .aligning-name-h5 {
        color: firebrick;
        font-weight: 600;
        font-size: 1.2rem;
        margin: 0;
    }

    .type-users-css {
        color: white;
        /* background-color: RGBA(255, 193, 7, var(--bs-bg-opacity, 1)) !important; */
        background-color: RGBA(25, 135, 84, var(--bs-bg-opacity, 1)) !important;
        border-radius: 20px;
        font-size: 14px;
        line-height: 1;
        padding: .375rem .5625rem;
        font-weight: 500;
    }

    .infos-css-style {
        color: darkblue;
        font-size: 1.3rem;
        text-decoration: underline;
    }

    .labeling-css-profession {
        font-size: 0.85rem;
        font-weight: 500;
        color: gray;
    }

    .text-endingcss-style {
        text-align: end;
    }
    </style>
</head>

<body>
    <div class="container-scroller">
        <div class="container-fluid">
            <div class="content-wrapper">
                <!-- ========================================== -->
                <?php 
					if(isset($_GET['cus_id']) && ($_GET['cus_id'] > 0)){

						$noEntry = $utility->getNoOfEntry($_GET['cus_id'], 'customer_id', 'customer');
                        $cus_id	= $_GET['cus_id'];
								
						if($noEntry > 0){
							
                            $cus_id	= $_GET['cus_id'];
							$cusDtl 	= $customer->getCustomerData($cus_id);
									
						 ?>


                <!-- newwwww -->
                <div class="">
                    <div class="">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="d-flex justify-content-center justify-content-md-start">
                                    <div>
                                        <?php
                                            $imageName = $cusDtl[0][9];
                                            if ($cusDtl[0][9] == null) $imageName = 'default-user-icon.png';
                                        ?>
                                        <img src="../../images/user/<?php echo $imageName; ?>" class="imgcls-for-dp"
                                            alt="image" />
                                    </div>
                                    <div class="d-flex aligning-for-name">
                                        <h5 class="aligning-name-h5"><?php echo $cusDtl[0][5]." ".$cusDtl[0][6]; ?><br>
                                            <label class="labeling-css-profession mb-0"><i
                                                    class="fa-sharp fa-solid fa-briefcase"></i>
                                                <?php echo $cusDtl[0][14]; ?></label> <br>
                                            <label class="labeling-css-profession"><i class="fa-solid fa-user"></i>
                                                <?php echo $cusDtl[0][0]; ?></label>
                                        </h5>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="d-flex flex-column align-items-center align-items-md-end mt-2 mt-md-0">
                                    <p class="text-center">Email : <?php echo $cusDtl[0][3]; ?></p>
                                    <p class="text-center">Mobile : <?php echo $cusDtl[0][34]; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="pt-3">
                    <div class="row">
                        <div class="col-md-6 col-lg-4">
                            <div class="card card-for-personal">
                                <h4 class="infos-css-style">Address Information <i class="fa-solid fa-location-dot"></i>
                                </h4>
                                <p>Organization : <?php echo $cusDtl[0][12]; ?></p>
                                <p>Address : <?php echo $cusDtl[0][24]; ?></p>
                                <p>Phone 1 : <?php echo $cusDtl[0][31]; ?></p>
                                <p>Phone 2 : </p>
                                <p>Fax : <?php echo $cusDtl[0][33]; ?></p>
                                <p>Town/City : <?php
                                                    $city = $Location->getCityDataById($cusDtl[0][27]);
                                                    if (count($city) > 0) {
                                                        echo $city['name'];
                                                    }
                                                ?>
                                </p>
                                <p>Province : <?php
                                                    $state = $Location->getStateData($cusDtl[0][28]);
                                                    if (count($state) > 0) {
                                                        echo $state['name'];
                                                    }
                                                ?>

                                </p>
                                <p>Country : <?php 
                                                $country = $Location->getCountyById($cusDtl[0][30]);
                                                if ($country != NULL) {
                                                    echo $country['name'];
                                                }
                                            ?>

                                </p>
                                <p>Pin Code : <?php echo $cusDtl[0][29]; ?></p>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4 mt-3 mt-md-0">
                            <div class="card card-for-personal">
                                <h4 class="infos-css-style">General View <i class="fa-regular fa-calendar-days"></i>
                                </h4>
                                <p>Created on <?php echo $dateUtil->printDate($cusDtl[0][22]); ?></p>
                                <p>Modified on <?php echo $dateUtil->printDate($cusDtl[0][23]); ?></p>
                                <p>Sort Order <?php echo $cusDtl[0][15]; ?></p>
                                <p>News Letter</p>

                            </div>
                        </div>
                        <div class="col-lg-4 mt-3">
                            <div class="card card-for-personal">
                                <h4 class="infos-css-style">Password Manager <i class="fa-regular fa-calendar-days"></i>
                                </h4>
                                <p>Current Password : <?php echo md5_decrypt($cusDtl[0][4],USER_PASS); ?></p>
                                <p>Change Password: <a href="javascript:void(0)"
                                        onClick="MM_openBrWindow('customer_pass_edit.php?action=edit_pass&user_id=<?php echo $cus_id; ?>','EditAdvertiserPass','width=450,height=320')">
                                        Edit Password
                                    </a>
                                </p>
                                <p>Sort Order <?php echo $cusDtl[0][15]; ?></p>
                                <p>News Letter</p>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php 
								}
						  }
						 ?>

            <!-- ========================================== -->
        </div>
        <!-- content-wrapper ends -->
        <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="<?= ADM_URL ?>vendors/js/vendor.bundle.base.js"></script>
    <script src="<?= URL ?>/plugins/jquery-3.6.0.min.js"></script>
    <script src="<?= ADM_URL ?>js/off-canvas.js"></script>
    <script src="<?= ADM_URL ?>js/hoverable-collapse.js"></script>
    <script src="<?= ADM_URL ?>js/template.js"></script>
    <script src="<?= ADM_URL ?>js/settings.js"></script>
    <script src="<?= ADM_URL ?>js/todolist.js"></script>
    <script src="<?= URL ?>/plugins/data-table/simple-datatables.js"></script>
    <script src="<?= URL ?>/plugins/tinymce/tinymce.js"></script>
    <script src="<?= URL ?>/plugins/main.js"></script>
    <!-- Added Js  -->
    <script src="<?= URL ?>/js/utility.js"></script>
</body>

</html>