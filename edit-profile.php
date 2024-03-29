<?php
require_once "includes/constant.inc.php";
require_once "includes/user.inc.php";

session_start();

require_once ROOT_DIR."/_config/dbconnect.php";

require_once ROOT_DIR."/classes/date.class.php";
require_once ROOT_DIR."/classes/error.class.php";
require_once ROOT_DIR."/classes/search.class.php";
require_once ROOT_DIR."/classes/customer.class.php";
require_once ROOT_DIR."/classes/location.class.php";

require_once ROOT_DIR."/classes/utility.class.php";
require_once ROOT_DIR."/classes/utilityMesg.class.php";
require_once ROOT_DIR."/classes/utilityImage.class.php";
require_once ROOT_DIR."/classes/utilityNum.class.php";

/* INSTANTIATING CLASSES */
$dateUtil      	= new DateUtil();
$error 			= new Error();
$search_obj		= new Search();
$customer		= new Customer();
$Location       = new Location();
//$ff				= new FrontPhoto();
$utility		= new Utility();
$uMesg 			= new MesgUtility();
$uImg 			= new ImageUtility();
$uNum 			= new NumUtility();
######################################################################################################################
$typeM		= $utility->returnGetVar('typeM','');
//user id
$cusId		= $utility->returnSess('userid', 0);
$cusDtl		= $customer->getCustomerData($cusId); 
$currentPage = $utility->setCurrentPageSession();
require_once ROOT_DIR."/includes/check-customer-login.inc.php";

//Edit Profile
if(isset($_POST['btnSubmit'])){
     
    $txtFname           = $_POST['fname'];
    $txtLname           = $_POST['lname'];
    $txtGender          = $_POST['gender'];
	$txtProfession		= $_POST['txtProfession'];
	$txtDesc			= $_POST['txtDesc'];
	$txtBrief       	= $_POST['txtBrief'];
	$txtorganization	= $_POST['organization'];
	$mobNumber      	= $_POST['mobNumber'];

	//registering the post session variables
	$sess_arr	= array( 'txtProfession', 'txtDesc');

    $customer->editCustomerSingleData($cusId, 'mobile', $mobNumber, 'customer_address');

	$customer->editCustomer($cusId, $txtFname, $txtLname, $txtGender, $txtBrief, $txtDesc, $txtorganization, $cusDtl[0][13], $txtProfession, $cusDtl[0][15], $cusDtl[0][13], $cusDtl[0][19]);

	$utility->delSessArr($sess_arr);

}

if (isset($_POST['picture-update'])) {
    //uploading images
	if($_FILES['profile-picture']['name'] != ''){
        
        // delete old image 
        $utility->deleteFile($cusId, 'customer_id', 'images/user/', 'image', 'customer');

		//rename the file
		$newName = $utility->getNewName4($_FILES['profile-picture'], '', $cusId);
		//upload and crop the file
		$uImg->imgCropResize($_FILES['profile-picture'], '', $newName, 'images/user/', 200, 200, $cusId, 'image', 'customer_id','customer');
	}
}

//Edit Address
if(isset($_POST['addressUpdate'])){

    $address1       = $_POST['address1'];
    $address2       = $_POST['address2'];
    $cityId         = $_POST['cityId'];
	$stateId       	= $_POST['stateId'];
	$postalCode	    = $_POST['postal_code'];
	$countryId		= $_POST['countryId'];
	$phone1	        = $_POST['phone1'];
	$phone2      	= $_POST['phone2'];

	$customer->updateCusAddress($cusId, $address1, $address2, $cusDtl[0][26], $cityId, $stateId, $postalCode, $countryId, $phone1, $phone2, $cusDtl[0][33], $cusDtl[0][34]);

}
//Edit Address
if(isset($_POST['passUpdate'])){
    // print_r($_POST);
    // $address1       = $_POST['address1'];
    // $address2       = $_POST['address2'];
    // $cityId         = $_POST['cityId'];
	// $stateId       	= $_POST['stateId'];
	// $postalCode	    = $_POST['postal_code'];
	// $countryId		= $_POST['countryId'];
	// $phone1	        = $_POST['phone1'];
	// $phone2      	= $_POST['phone2'];

	// $customer->updateCusAddress($cusId, $address1, $address2, $cusDtl[0][26], $cityId, $stateId, $postalCode, $countryId, $phone1, $phone2, $cusDtl[0][33], $cusDtl[0][34]);

}

if(isset($_POST['btnCancel'])){
	//forward
	$uMesg->showSuccessT('success', $id, 'id', "dashboard.php", "", 'Cancel');
}
?>
<!DOCTYPE HTML>
<html lang="en">

<head>
    <meta name="robots" content="noindex,nofollow">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Edit My Profile | <?php echo COMPANY_S; ?></title>
    <link rel="icon" href="<?php echo FAVCON_PATH; ?>" type="image/png" />
    <!-- Plugins Files -->
    <link href="<?= URL ?>/plugins/bootstrap-5.2.0/css/bootstrap.css" rel="stylesheet" />
    <?php require_once ROOT_DIR.'/plugins/font-awesome/fontawesome.php'?>

    <!-- Custom CSS -->
    <link href="<?= URL ?>/css/style.css" rel='stylesheet' type='text/css' />
    <link href="<?= URL ?>/css/dashboard.css" rel='stylesheet' type='text/css' />
    <link href="<?= URL ?>/css/edit-profile.css" rel='stylesheet' type='text/css' />
    <!-- //Custom Theme files -->
</head>

<body>
    <div id="home">
        <!-- header -->
        <?php require_once "components/navbar.php"; ?>
        <!-- //header -->
        <div class="edit_profile" style="overflow: hidden;">
            <div class="container-fluid">
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

                    <div
                        class="col-md-9  ps-md-0 display-table-cell v-align client_profile_dashboard_right extra-mrgin-top-for-mtab special_sticky">
                        <section class="mt-3 mt-lg-0" id="explore">
                            <div class="row">
                                <div class="bfrom">
                                    <div class="dform">
                                        <!-- <form class="form-horizontal" role="form"
                                        action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post"
                                        enctype="multipart/form-data" autocomplete="off"> -->
                                        <?php
                                            if (isset($_GET['action'])) {
                                                echo '<div class="border border-danger px-3 py-2  mb-2">
                                                        <p class="fw-bold">'.$_GET['action'].'</p>
                                                    </div>';
                                            }
                                        ?>
                                        <b
                                            style="color: red;"><?php $uMesg->dispMessage($typeM, '../images/icon/', 'blackLarge');?></b>
                                        <!-- row -->
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-12 col-sm-auto mb-3">
                                                    <div class="mx-auto" style="width: 140px;">
                                                        <div class="d-flex justify-content-center align-items-center rounded"
                                                            style="height: 140px; background-color: rgb(233, 236, 239);">
                                                            <?php
                                                                if (!empty($cusDtl[0][9])){
                                                                    echo '<img class="profile-pic rounded editingimg"
                                                                src="images/user/'.$cusDtl[0][9].'">';
                                                                }else {
                                                                    echo '<img class="profile-pic rounded editingimg"
                                                                src="images/icons/user.png">';
                                                                }
                                                            ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div
                                                    class="col d-flex flex-column flex-sm-row justify-content-between mb-3">
                                                    <div class="edit-top-div_detail order-sm-1 order-2  mb-2 mb-sm-0">
                                                        <h4 class="pt-sm-2 pb-1 mb-0 text-nowrap">
                                                            <?php echo $cusDtl[0][5].' '.$cusDtl[0][6]; ?>
                                                        </h4>
                                                        <span class="badge badge-mustard"><?php echo $cusDtl[0][14]; ?>
                                                        </span>
                                                        <div class="text-start edit-top-div_detail">
                                                            <p class="mb-0"><?php echo $cusDtl[0][3]; ?></p>
                                                            <!-- <div class="text-muted">
                                                                <small>
                                                                    Last login <?= $dateUtil->dateTimeText($cusDtl[0][21]) ?>
                                                                </small>
                                                            </div> -->
                                                        </div>

                                                        <div class="input-group mt-2">
                                                            <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post"
                                                                enctype="multipart/form-data">
                                                                <input type="file"
                                                                    class="form-control file-upload d-none"
                                                                    id="img-select" name="profile-picture" id="fileImg"
                                                                    accept="image/*">
                                                                <label class="input-group-text btn btn-primary rounded"
                                                                    for="img-select">
                                                                    <i class="fa fa-fw fa-camera pe-2"></i>
                                                                    Change Photo
                                                                </label>

                                                                <button id="upload-btn" type="submit"
                                                                    name="picture-update"
                                                                    class="input-group-text btn btn-info rounded text-light fw-semibold ms-2 d-none">
                                                                    <i
                                                                        class="fa-solid fa-arrow-up-from-bracket pe-1"></i>
                                                                    Upload
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                    <div class="text-center text-sm-right order-sm-2 order-1">
                                                        <!-- <span
                                                            class="badge badge-mustard"><?php echo $cusDtl[0][14]; ?>
                                                        </span>
                                                        <div class="text-muted">
                                                            <small>
                                                                <?php
                                                                    echo $dateUtil->dateTimeText($cusDtl[0][22]);?>
                                                            </small>
                                                        </div> -->
                                                        <div class="text-muted">
                                                            <small>
                                                                Last login
                                                                <?= $dateUtil->dateTimeText($cusDtl[0][21]) ?>
                                                            </small>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link my_nav_tab active" id="Overview-tab"
                                                    data-bs-toggle="tab" data-bs-target="#Overview" type="button"
                                                    role="tab" aria-controls="Overview"
                                                    aria-selected="true">Overview</button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link my_nav_tab" id="profile-tab"
                                                    data-bs-toggle="tab" data-bs-target="#profile" type="button"
                                                    role="tab" aria-controls="profile" aria-selected="false">Edit
                                                    Profile</button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link my_nav_tab" id="address_edit-tab"
                                                    data-bs-toggle="tab" data-bs-target="#address_edit" type="button"
                                                    role="tab" aria-controls="address_edit" aria-selected="false">Edit
                                                    Address</button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link my_nav_tab" id="change-tab" data-bs-toggle="tab"
                                                    data-bs-target="#change-password" type="button" role="tab"
                                                    aria-controls="change-password" aria-selected="false">Change
                                                    password</button>
                                            </li>
                                        </ul>

                                        <div class="tab-content" id="myTabContent">
                                            <div class="tab-pane overviews-div fade active show " id="Overview"
                                                role="tabpanel" aria-labelledby="Overview-tab">

                                                <h4 class="profile-hr">Profile Details <span></span></h4>
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <label>Name</label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <p><?php echo $cusDtl[0][5].' '.$cusDtl[0][6]; ?></p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <label>Email</label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <p><?php echo $cusDtl[0][3]; ?></p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <label>Gender</label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <p class="text-capitalize"><?php echo $cusDtl[0][7]; ?></p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <label>Address</label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <p>
                                                            <?php
                                                                      
                                                            if (!empty($cusDtl[0][27])) {
                                                                $city = $Location->getCityDataById($cusDtl[0][27])['name'];
                                                            }
                                                            
                                                            if (!empty($cusDtl[0][28])) {
                                                                $state = $Location->getStateName($cusDtl[0][28]);
                                                            }
                                                            
                                                            if (!empty($cusDtl[0][30])) {
                                                                $country = $Location->getCountyById($cusDtl[0][30])['name'];
                                                            }

                                                            $addressArr = array(
                                                                'address1' => $cusDtl[0][24],
                                                                'address2' => $cusDtl[0][25],
                                                                'address3' => $cusDtl[0][26],
                                                                'city' => $city,
                                                                'state' => $state,
                                                                'country' => $country,
                                                                'zipcode' => $cusDtl[0][29]
                                                                
                                                            );
                                                            
                                                            $Location->printAddress($addressArr);

                                                            ?>
                                                        </p>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <label>Phone</label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <p><?php echo $cusDtl[0][34]; ?></p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <label>Profession</label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <p><?php echo $cusDtl[0][14]; ?></p>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <div class="col-md-3">
                                                        <label>Joined On</label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <p><?php echo date('l jS \of F Y h:i:s A', strtotime($cusDtl[0][22])); ?>
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="mb-0">
                                                    <div class="col-md-12">
                                                        <h4 class="profile-hr mb-0">About <span></span></h4>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <p> <?php echo $cusDtl[0][10]; ?></p>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="tab-pane fade profiles_tediting-div" id="profile"
                                                role="tabpanel" aria-labelledby="profile-tab">
                                                <form class="form-horizontal" role="form"
                                                    action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post"
                                                    autocomplete="off">
                                                    <div class="row ">
                                                        <div class="col-sm-6">
                                                            <div class="form-floating mb-3">
                                                                <input type="text" maxlength="25" class="form-control"
                                                                    name="fname" value="<?php echo $cusDtl[0][5]; ?>"
                                                                    required>
                                                                <label> First Name </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-floating mb-3">
                                                                <input type="text" maxlength="25" class="form-control"
                                                                    name="lname" value="<?php echo $cusDtl[0][6]; ?>"
                                                                    required>
                                                                <label> Last Name </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row ">
                                                        <div class="col-sm-6">
                                                            <div class="form-floating mb-3">
                                                                <input type="email" maxlength="100" class="form-control"
                                                                    name="email_id" value="<?php echo $cusDtl[0][3]; ?>"
                                                                    required>
                                                                <label> Email Id </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-floating mb-3">
                                                                <input type="number"
                                                                    oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                                                    maxlength="10" class="form-control" name="mobNumber"
                                                                    value="<?php echo $cusDtl[0][34]; ?>" required>
                                                                <label> Contact Number </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <fieldset class="row ">
                                                        <div class="col-sm-6">
                                                            <div class="form-floating mb-3">
                                                                <select class="form-select" id="floatingSelect"
                                                                    aria-label="Floating label select example"
                                                                    name="txtProfession">
                                                                    <option value="<?php echo $cusDtl[0][14];?>"
                                                                        selected="selected">
                                                                        <?php echo $cusDtl[0][14];?>
                                                                    </option>
                                                                    <option value="Author">Author</option>
                                                                    <option value="Blogger">Blogger</option>
                                                                    <option value="Blogger">Blogger Outreach
                                                                        Manager
                                                                    </option>
                                                                    <option value="Business Analyser">Business
                                                                        Analyser
                                                                    </option>
                                                                    <option value="Marketing Manager">Marketing
                                                                        Manager
                                                                    </option>
                                                                    <option value="Others">Others</option>
                                                                </select>
                                                                <label for="floatingSelect">Profession</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6 ">
                                                            <div class="form-floating mb-3">
                                                                <select class="form-select text-capitalize"
                                                                    id="floatingSelectGrid"
                                                                    aria-label="Floating label select example"
                                                                    name="gender" required>
                                                                    <option value="<?php echo $cusDtl[0][7];?>"
                                                                        selected="selected">
                                                                        <?php echo $cusDtl[0][7];?>
                                                                    </option>
                                                                    <option value="Male">Male</option>
                                                                    <!-- <option value="Female">Female</option> -->
                                                                    <option value="Transgender">Transgender</option>
                                                                </select>
                                                                <label for="floatingSelectGrid">Gender </label>
                                                            </div>
                                                        </div>
                                                    </fieldset>

                                                    <div class="row ">
                                                        <div class="col-sm-6">
                                                            <div class="form-floating mb-3">
                                                                <textarea class="form-control" id="floatingTextarea2"
                                                                    rows="2" id="" name="txtBrief"
                                                                    style="height: 100px"><?php echo $cusDtl[0][10]; ?></textarea>
                                                                <label for="floatingTextarea2">About
                                                                    You</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-floating mb-3">
                                                                <textarea class="form-control" rows="2" id=""
                                                                    name="txtDesc"
                                                                    style="height: 100px"><?php echo trim(stripslashes($cusDtl[0][11])); ?></textarea>
                                                                <label for="floatingTextarea2">Description</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row ">
                                                        <div class="col-sm-6">
                                                            <div class="form-floating mb-3">
                                                                <input type="text" maxlength="25" class="form-control"
                                                                    name="organization"
                                                                    value="<?php echo $cusDtl[0][12]; ?>" readonly>
                                                                <label> Organization </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-floating mb-3">
                                                                <input type="text" maxlength="25" class="form-control"
                                                                    name="discount"
                                                                    value="<?php echo $cusDtl[0][19]; ?>" readonly>
                                                                <label> Discount Offered </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row ">
                                                        <div class="col-sm-6">
                                                            <div class="form-floating mb-3">
                                                                <input type="text" maxlength="25" class="form-control"
                                                                    name="featured"
                                                                    value="<?php echo $cusDtl[0][13]; ?>" readonly>
                                                                <label> Organization </label>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="d-grid gap-2   d-md-flex col-12 col-md-3 mx-auto my-3">
                                                        <button type="submit" name="btnCancel"
                                                            class="btn botton-midle btn-danger">Cancel</button>
                                                        <button type="submit" name="btnSubmit"
                                                            class="btn botton-midle btn-primary">Update</button>
                                                    </div>
                                                    <div class="form-group">
                                                    </div>
                                                </form>
                                            </div>

                                            <!-- address tab panel start  -->
                                            <div class="tab-pane fade chnge_tab_div" id="address_edit" role="tabpanel"
                                                aria-labelledby="address_edit-tab">
                                                <form class="form-horizontal" role="form"
                                                    action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post"
                                                    enctype="multipart/form-data" autocomplete="off">
                                                    <div class="row ">
                                                        <div class="col-sm-6">
                                                            <div class="form-floating mb-3">
                                                                <input type="text" maxlength="25" class="form-control"
                                                                    id="address1" name="address1"
                                                                    value="<?php echo $cusDtl[0][24]; ?>" required>
                                                                <label for="address1"> Address1 </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-floating mb-3">
                                                                <input type="text" maxlength="25" class="form-control"
                                                                    id="address2" name="address2"
                                                                    value="<?php echo $cusDtl[0][25]; ?>" required>
                                                                <label for="address2"> Address2 </label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <fieldset class="row ">
                                                        <div class="col-sm-6">
                                                            <div class="form-floating mb-3">
                                                                <select id="city" class="form-select " name="cityId"
                                                                    required>
                                                                    <option value="" selected disabled>
                                                                        Select City
                                                                    </option>
                                                                    <option value="" disabled selected>Select State
                                                                        First
                                                                    </option>
                                                                    <?php
                                                            $utility->populateDropDown2($cusDtl[0][27], 'id', 'name', 'state_id', $cusDtl[0][28], 'cities')
                                                                ?>
                                                                </select>
                                                                <label for="City">City</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-floating mb-3">
                                                                <input type="number"
                                                                    oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                                                    maxlength="6" class="form-control"
                                                                    id="floatingInput" name="postal_code"
                                                                    value="<?php echo $cusDtl[0][29]; ?>" required>
                                                                <label for="floatingInput"> Postal Code </label>
                                                            </div>
                                                        </div>
                                                    </fieldset>
                                                    <fieldset class="row ">
                                                        <div class="col-sm-6">
                                                            <div class="form-floating mb-3">
                                                                <select id="stateId" class="form-select " name="stateId"
                                                                    required onchange="getCitiesList(this)">
                                                                    <option value="" selected disabled>
                                                                        Select Country First
                                                                    </option>
                                                                    <?php
                                                                $utility->populateDropDown2($cusDtl[0][28], 'id', 'name', 'country_id', $cusDtl[0][30], 'states')
                                                            ?>
                                                                </select>
                                                                <label for="stateId">State</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6 ">
                                                            <div class="form-floating mb-3">
                                                                <select id="country" class="form-select "
                                                                    name="countryId" onchange="getStateList(this)"
                                                                    required>
                                                                    <option value="" selected disabled>Select
                                                                        Country
                                                                    </option>
                                                                    <?php
                                                                $utility->populateDropDown($cusDtl[0][30], 'id', 'name', 'countries')
                                                                ?>
                                                                </select>
                                                                <label for="country">Country </label>
                                                            </div>
                                                        </div>
                                                    </fieldset>
                                                    <div class="row ">
                                                        <div class="col-sm-6">
                                                            <div class="form-floating mb-3">
                                                                <input type="number"
                                                                    oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                                                    maxlength="10" class="form-control" id="phone1"
                                                                    name="phone1" value="<?php echo $cusDtl[0][31]; ?>"
                                                                    required>
                                                                <label for="phone1"> Phone1 </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-floating mb-3">
                                                                <input type="number"
                                                                    oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                                                    maxlength="10" class="form-control" id="phone2"
                                                                    name="phone2" value="<?php echo $cusDtl[0][32]; ?>"
                                                                    required>
                                                                <label for="phone2"> Phone2 </label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="d-grid gap-2   d-md-flex col-12 col-md-3 mx-auto my-3">
                                                        <button type="submit" name="btnCancel"
                                                            class="btn botton-midle btn-danger">Cancel</button>
                                                        <button type="submit" name="addressUpdate"
                                                            class="btn botton-midle btn-primary">Update</button>
                                                    </div>
                                                </form>
                                            </div>
                                            <!-- address tab panel end  -->

                                            <!-- password tab panel start  -->
                                            <div class="tab-pane fade chnge_tab_div" id="change-password"
                                                role="tabpanel" aria-labelledby="change-tab">
                                                Loading....
                                            </div>
                                            <!-- password tab panel end -->

                                        </div>
                                    </div>
                                </div>
                                <!--end from div-->
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
        <!-- js-->
        <script src="<?= URL ?>/plugins/jquery-3.6.0.min.js"></script>
        <script src="<?= URL ?>/plugins/bootstrap-5.2.0/js/bootstrap.js"></script>
        <script src="<?= URL ?>/js/customerSwitchMode.js"></script>
        <script src="<?= URL ?>/js/ajax.js" type="text/javascript"></script>
        <script src="<?= URL ?>/js/script.js" type="text/javascript"></script>

        <script>
        window.onload = function() {
            $.ajax({
                url: "partials/change-password.inc.php",
                method: "POST",
                data: {
                    action: "ChangePassword"
                },
                success: function(response) {
                    document.getElementById("change-password").innerHTML = response;
                }
            });
        };
        // =========================================================================


        // <!-- document.getElementById("passUpdate").addEventListener("click", changePassword); -->

        function changePassword() {
            // Prevent the default action of the form submission
            event.preventDefault();

            // Create an AJAX request
            $.ajax({
                url: 'ajax/change-password.ajax.php',
                type: 'POST',
                data: $('#password-form').serialize(),
                success: function(response) {
                    // Display the response from the server
                    alert(response);
                },
                error: function() {
                    alert('failure');
                }
            });
        }

        // Add an event listener to the submit button
        // $('#passUpdate').on('click', changePassword);
        // =========================================================================

        document.addEventListener("DOMContentLoaded", () => {
            var readURL = (input) => {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = (e) => {
                        document.querySelector(".profile-pic").src = e.target.result;
                    }

                    reader.readAsDataURL(input.files[0]);
                    document.querySelector("#upload-btn").classList.remove("d-none");
                }
            };


            document.querySelector("#img-select").addEventListener("change", function() {
                readURL(this);
            });
        });
        </script>
</body>

</html>