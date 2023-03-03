<?php
session_start();
require_once("_config/dbconnect.php");
require_once "_config/dbconnect.trait.php";

require_once "includes/constant.inc.php";
require_once "classes/date.class.php";
require_once "classes/error.class.php";
require_once "classes/search.class.php";
require_once "classes/customer.class.php";
require_once "classes/location.class.php";

require_once "classes/utility.class.php";
require_once "classes/utilityMesg.class.php";
require_once "classes/utilityImage.class.php";
require_once "classes/utilityNum.class.php";

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

if($cusId == 0){
	header("Location: index.php");
}

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


		//uploading images
		if($_FILES['fileImg']['name'] != ''){
			//rename the file
			$newName = $utility->getNewName4($_FILES['fileImg'], '', $cusId);

			//upload and crop the file
			$uImg->imgCropResize($_FILES['fileImg'], '', $newName, 'images/user/', 200, 200, $cusId, 'image', 'customer_id','customer');
		}

		$utility->delSessArr($sess_arr);

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



if(isset($_POST['btnCancel'])){
	//forward
	$uMesg->showSuccessT('success', $id, 'id', "dashboard.php", "", 'Cancel');
}
?>
<!DOCTYPE HTML>
<html lang="zxx">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Edit My Profile | <?php echo COMPANY_S; ?></title>
    <link rel="icon" href="<?php echo FAVCON_PATH; ?>" type="image/png">

    <!-- Bootstrap Core CSS -->
    <link href="plugins/bootstrap-5.2.0/css/bootstrap.min.css" rel='stylesheet' type='text/css' />
    <link href="plugins/bootstrap-5.2.0/css/bootstrap.css" rel='stylesheet' type='text/css' />
    <link href="plugins/fontawesome-6.1.1/css/all.css" rel='stylesheet' type='text/css' />

    <!-- Custom CSS -->
    <link href="css/leelija.css" rel='stylesheet' type='text/css' />
    <link href="css/style.css" rel='stylesheet' type='text/css' />
    <!-- <link href="css/form.css" rel='stylesheet' type='text/css' /> -->
    <link href="css/dashboard.css" rel='stylesheet' type='text/css' />
    <link href="css/edit-profile.css" rel='stylesheet' type='text/css' />
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
        <?php require_once "partials/navbar.php"; ?>
        <?php //include 'header-user-profile.php'?>

        <!-- //header -->
        <!-- banner -->

        <div class="edit_profile" style="overflow: hidden;">
            <div class="container-fluid">
                <div class=" display-table">
                    <div class="row ">
                        <!--Row start-->
                        <div class="col-md-3 col-sm-12 hidden-xs display-table-cell v-align special_fixed"
                            id="navigation">

                            <div class="client_profile_dashboard_left">
                                <?php include("dashboard-inc.php");?>
                                <hr class="myhrline">
                            </div>

                        </div>
                        <div
                            class="col-md-9  ps-md-0 display-table-cell v-align client_profile_dashboard_right special_sticky">
                            <section class="" id="explore">
                                <div class="row">
                                    <div class="bfrom">
                                        <form class="form-horizontal" role="form"
                                            action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post"
                                            enctype="multipart/form-data" autocomplete="off">
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
                                                        <div
                                                            class="edit-top-div_detail order-sm-1 order-2  mb-2 mb-sm-0">
                                                            <h4 class="pt-sm-2 pb-1 mb-0 text-nowrap"><?php echo $cusDtl[0][5].' '.$cusDtl[0][6]; ?>
                                                            </h4>
                                                            <div class="text-start edit-top-div_detail">
                                                                <p class="mb-0"><?php echo $cusDtl[0][3]; ?></p>
                                                                <div class="text-muted"><small>Last login 2 hours
                                                                        ago</small></div>
                                                            </div>

                                                            <div class="input-group mt-2">
                                                                <input type="file" class="form-control file-upload"
                                                                    id="inputGroupFile02"
                                                                    style=" visibility: hidden; display: none;"
                                                                    name="fileImg" id="fileImg" accept="image/*">
                                                                <label class="input-group-text label_design_as_btn"
                                                                    for="inputGroupFile02"> <i
                                                                        class="fa fa-fw fa-camera pe-2
                                                                        "></i> Change
                                                                    Photo</label>
                                                            </div>
                                                        </div>
                                                        <div class="text-center text-sm-right order-sm-2 order-1">
                                                            <span class="badge badge-mustard"><?php echo $cusDtl[0][14]; ?></span>
                                                            <div class="text-muted"><small><?php echo date('l jS \of F Y h:i:s A', strtotime($cusDtl[0][22])); ?></small></div>
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
                                                        data-bs-toggle="tab" data-bs-target="#address_edit"
                                                        type="button" role="tab" aria-controls="address_edit"
                                                        aria-selected="false">Edit Address</button>
                                                </li>
                                                <li class="nav-item" role="presentation">
                                                    <button class="nav-link my_nav_tab" id="change-tab"
                                                        data-bs-toggle="tab" data-bs-target="#change" type="button"
                                                        role="tab" aria-controls="change" aria-selected="false">Change
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
                                                            <p><?php echo $cusDtl[0][7]; ?></p>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <label>Address</label>
                                                        </div>
                                                        <div class="col-md-9">
                                                            <p><?php
                                                                        if (!empty($cusDtl[0][24])) {
                                                                            echo $cusDtl[0][24];
                                                                        }
                                                                        
                                                                        if (!empty($cusDtl[0][24]) && empty($cusDtl[0][25])) {
                                                                            echo ', ';
                                                                        }elseif (!empty($cusDtl[0][24]) && !empty($cusDtl[0][25])) {
                                                                            echo ', ';
                                                                        }
                                                                        
                                                                        if (!empty($cusDtl[0][25])) {
                                                                            echo $cusDtl[0][25];
                                                                        }
                                                                        
                                                                        if (!empty($cusDtl[0][25]) && empty($cusDtl[0][26])) {
                                                                            echo ', ';
                                                                        }

                                                                        if (!empty($cusDtl[0][26])) {
                                                                            echo $cusDtl[0][26];
                                                                        }

                                                                        if (!empty($cusDtl[0][27]) && empty($cusDtl[0][30])) {
                                                                            echo ', ';
                                                                        }
                                                                        
                                                                        if (!empty($cusDtl[0][27])) {
                                                                            // -------need to fix address ------
                                                                            // $city = $Location->getCityDataById($cusDtl[0][27])[1];
                                                                            // print_r($city[1]);
                                                                        }
                                                                        
                                                                        if (!empty($cusDtl[0][27]) && empty($cusDtl[0][30])) {
                                                                            echo ', ';
                                                                        }

                                                                        if (!empty($cusDtl[0][30])) {
                                                                            echo $Location->getCountyDataByCountyId($cusDtl[0][30])[1];
                                                                        }

                                                                        if (!empty($cusDtl[0][29])) {
                                                                            echo ', ';
                                                                            echo $cusDtl[0][29];
                                                                        }
                                                                        ?></p>
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
                                                            <p><?php echo date('l jS \of F Y h:i:s A', strtotime($cusDtl[0][22])); ?></p>
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
                                                    <div class="row ">
                                                        <div class="col-sm-6">
                                                            <div class="form-floating mb-3">
                                                                <input type="text" maxlength="25" class="form-control"
                                                                    id="floatingInput" placeholder=" " name="fname"
                                                                    value="<?php echo $cusDtl[0][5]; ?>" required>
                                                                <label for="floatingInput"> First Name </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-floating mb-3">
                                                                <input type="text" maxlength="25" class="form-control"
                                                                    id="floatingInput" placeholder=" " name="lname"
                                                                    value="<?php echo $cusDtl[0][6]; ?>" required>
                                                                <label for="floatingInput"> Last Name </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row ">
                                                        <div class="col-sm-6">
                                                            <div class="form-floating mb-3">
                                                                <input type="email" maxlength="25" class="form-control"
                                                                    id="floatingInput" placeholder=" " name="email_id"
                                                                    value="<?php echo $cusDtl[0][3]; ?>" required>
                                                                <label for="floatingInput"> Email Id </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-floating mb-3">
                                                                <input type="number"
                                                                    oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                                                    maxlength="10" class="form-control"
                                                                    id="floatingInput" placeholder=" " name="mobNumber"
                                                                    value="<?php echo $cusDtl[0][34]; ?>" required>
                                                                <label for="floatingInput"> Contact Number </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <fieldset class="row ">
                                                        <div class="col-sm-6">
                                                            <div class="form-floating mb-3">
                                                                <select class="form-select" id="floatingSelect"
                                                                    aria-label="Floating label select example">
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
                                                                    <!-- <option value="Web Developer">Web Developer
                                                                    </option> -->
                                                                    <option value="Others">Others</option>
                                                                </select>
                                                                <label for="floatingSelect">Profession</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6 ">
                                                            <div class="form-floating mb-3">
                                                                <select class="form-select" id="floatingSelectGrid"
                                                                    aria-label="Floating label select example"
                                                                    name="gender" required="">
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
                                                                    id="floatingInput" name="organization"
                                                                    value="<?php echo $cusDtl[0][12]; ?>" readonly>
                                                                <label for="floatingInput"> Organization </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-floating mb-3">
                                                                <input type="text" maxlength="25" class="form-control"
                                                                    id="floatingInput" name="discount"
                                                                    value="<?php echo $cusDtl[0][19]; ?>" readonly>
                                                                <label for="floatingInput"> Discount
                                                                    Offered </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row ">
                                                        <div class="col-sm-6">
                                                            <div class="form-floating mb-3">
                                                                <input type="text" maxlength="25" class="form-control"
                                                                    id="floatingInput" name="featured"
                                                                    value="<?php echo $cusDtl[0][13]; ?>" readonly>
                                                                <label for="floatingInput"> Organization </label>
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
                                                </div>

                                                <div class="tab-pane fade chnge_tab_div" id="address_edit"
                                                    role="tabpanel" aria-labelledby="address_edit-tab">

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
                                                                    <?php
                                                                           $utility->populateDropDown($cusDtl[0][27], 'id', 'city', 'cities')
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
                                                                    required>
                                                                    <option value="" selected disabled>
                                                                        Select State
                                                                    </option>
                                                                    <?php
                                                                             $utility->populateDropDown($cusDtl[0][28], 'state_id', 'state_name', 'states')
                                                                            ?>
                                                                </select>
                                                                <label for="stateId">State</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6 ">
                                                            <div class="form-floating mb-3">
                                                                <select id="country" class="form-select "
                                                                    name="countryId" required>
                                                                    <option value="" selected disabled>
                                                                        Select Country
                                                                    </option>
                                                                    <?php
                                                                             $utility->populateDropDown($cusDtl[0][30], 'id', 'country_name', 'countries')
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
                                                    <div class="form-group">
                                                    </div>

                                                </div>

                                                <div class="tab-pane fade chnge_tab_div" id="change" role="tabpanel"
                                                    aria-labelledby="change-tab">
                                                    <form class="form-horizontal mt-4" role="form"
                                                        action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post"
                                                        enctype="multipart/form-data" autocomplete="off">

                                                        <div class="form-floating mb-3">
                                                            <input type="password" class="form-control"
                                                                id="floatingPassword" placeholder="Password">
                                                            <label for="floatingPassword"> Recent Password</label>
                                                        </div>
                                                        <div class="form-floating mb-3">
                                                            <input type="password" class="form-control"
                                                                id="floatingPassword" placeholder="Password">
                                                            <label for="floatingPassword"> Change New Password</label>
                                                        </div>
                                                        <div class="form-floating mb-3">
                                                            <input type="password" class="form-control"
                                                                id="floatingPassword" placeholder="Password">
                                                            <label for="floatingPassword">Confirm New Password</label>
                                                        </div>
                                                        
                                                        <div
                                                            class="d-grid gap-2   d-md-flex col-12 col-md-3 mx-auto my-3">
                                                            <button type="submit" name="btnCancel"
                                                                class="btn botton-midle btn-danger">Cancel</button>
                                                            <button type="submit" name="addressUpdate"
                                                                class="btn botton-midle btn-primary">Update</button>
                                                        </div>
                                                        <div class="form-group">
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </form>

                                    </div>
                                    <!--end from div-->
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- js-->
        <script src="plugins/jquery-3.6.0.min.js"></script>
        <script src="plugins/bootstrap-5.2.0/js/bootstrap.js"></script>
        <script src="js/customerSwitchMode.js"></script>

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

        <script>
        document.getElementById('buttonid').addEventListener('click', openDialog);

        function openDialog() {
            document.getElementById('fileid').click();
        }
        </script>
        <!-- <script>
        function thisFileUpload() {
            document.getElementById("file").click();
        };
        </script> -->

</body>

</html>