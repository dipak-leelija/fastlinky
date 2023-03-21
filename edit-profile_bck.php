<?php
require_once "includes/constant.inc.php";
session_start();

require_once("_config/dbconnect.php");

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
                        <div class="col-md-3 col-sm-12 hidden-xs display-table-cell v-align" id="navigation">

                            <div class="client_profile_dashboard_left">
                                <?php include("dashboard-inc.php");?>
                                <hr class="myhrline">
                            </div>

                        </div>
                        <div class="col-md-9  ps-md-0 display-table-cell v-align client_profile_dashboard_right">
                            <section class="" id="explore">
                                <div class="row">
                                    <div class="bfrom">
                                        <!-- <div class="styling-details-dynamic">
                                                    <div class="mineing">
                                                        <table class="ordered-details-table-css w-100">
                                                            <tbody style="vertical-align: baseline;text-align: start;">
                                                                <tr>
                                                                    <td>Name</td>
                                                                    <td>:</td>
                                                                    <td class="text-start">
                                                                        <?php echo $cusDtl[0][5].' '.$cusDtl[0][6]; ?>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Email Id</td>
                                                                    <td>:</td>
                                                                    <td class="text-start"
                                                                        style="word-break: break-word;">
                                                                        <?php echo $cusDtl[0][3]; ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Gender </td>
                                                                    <td>:</td>
                                                                    <td class="text-start"><?php echo $cusDtl[0][7]; ?>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Profession</td>
                                                                    <td>:</td>
                                                                    <td class="text-start"><?php echo $cusDtl[0][14]; ?>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Phone No</td>
                                                                    <td>:</td>
                                                                    <td class="text-start"><?php echo $cusDtl[0][34]; ?>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Address </td>
                                                                    <td>:</td>
                                                                    <td class="text-start">
                                                                        <?php
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
                                                                            $city = $Location->getCityDataById($cusDtl[0][27])[1];
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
                                                                        ?>
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>Joined On</td>
                                                                    <td>:</td>
                                                                    <td class="text-start"
                                                                        style="word-break: break-word;">
                                                                        <?php echo date('l jS \of F Y h:i:s A', strtotime($cusDtl[0][22])); ?>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div> -->
                                        <!--start from div-->
                                        <form class="form-horizontal" role="form"
                                            action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post"
                                            enctype="multipart/form-data" autocomplete="off">
                                            <b
                                                style="color: red;"><?php $uMesg->dispMessage($typeM, '../images/icon/', 'blackLarge');?></b>
                                            <!-- begion row -->
                                            <div class="form-group">
                                                <div class="row">
                                                    <!-- <div class="col-lg-2 col-md-2 col-sm-2">
                                                                <div class="circle editing-profile-img">
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
                                                            <div class="col-lg-10 col-md-10 col-sm-10 m-auto">
                                                                <div class="p-image">
                                                                    <div
                                                                        class="card col-sm-12 col-md-12 col-lg-12 flduplod">
                                                                        <input class="pl-0 file-upload" type="file"
                                                                            name="fileImg" id="fileImg"
                                                                            accept="image/*" />
                                                                    </div>
                                                                </div>
                                                            </div> -->
                                                    <div class="col-12 col-sm-auto mb-3">
                                                        <div class="mx-auto" style="width: 140px;">
                                                            <div class="d-flex justify-content-center align-items-center rounded"
                                                                style="height: 140px; background-color: rgb(233, 236, 239);">
                                                                <img src="images/icons/user.png" alt="" class="w-100">
                                                                <!-- <span
                                                                            style="color: rgb(166, 168, 170); font: bold 8pt Arial;">140x140</span> -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="col d-flex flex-column flex-sm-row justify-content-between mb-3">
                                                        <div
                                                            class="edit-top-div_detail order-sm-1 order-2  mb-2 mb-sm-0">
                                                            <h4 class="pt-sm-2 pb-1 mb-0 text-nowrap">Rozy Hayat
                                                            </h4>
                                                            <div class="text-start edit-top-div_detail">
                                                                <p class="mb-0"> <small>Female</small></p>
                                                                <p class="mb-0"> <small>9093615636</small></p>
                                                                <p class="mb-0">rozy.leelija@gmail.com</p>
                                                                <p class="mb-0">Barasat, Kolkata, India, 700125
                                                                </p>
                                                            </div>
                                                            <div class="mt-2">
                                                                <input id='fileid' type='file' hidden />
                                                                <button class="btn btn-primary" id='buttonid'
                                                                    type="button">
                                                                    <i class="fa fa-fw fa-camera"></i>
                                                                    <span>Change Photo</span>
                                                                </button>

                                                            </div>
                                                        </div>
                                                        <div class="text-center text-sm-right order-sm-2 order-1">
                                                            <span class="badge badge-mustard">Web
                                                                Developer</span>
                                                            <div class="text-muted"><small>Joined 09 Dec
                                                                    2017</small></div>
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
                                                    <button class="nav-link my_nav_tab" id="contact-tab"
                                                        data-bs-toggle="tab" data-bs-target="#contact" type="button"
                                                        role="tab" aria-controls="contact" aria-selected="false">Change
                                                        password</button>
                                                </li>
                                            </ul>
                                            <div class="tab-content" id="myTabContent">
                                                <div class="tab-pane overviews-div fade active show " id="Overview"
                                                    role="tabpanel" aria-labelledby="Overview-tab">
                                                    <div class="mb-3">
                                                        <div class="col-md-12">
                                                            <h4 class="profile-hr mb-0">About <span></span></h4>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <p> Lorem ipsum dolor sit amet consectetur
                                                                adipisicing elit. Ratione soluta quos recusandae
                                                                debitis animi, tenetur praesentium sint
                                                                doloremque tempora illo vero explicabo assumenda
                                                                magni. Inventore tempora impedit modi enim
                                                                voluptates.</p>
                                                        </div>
                                                    </div>
                                                    <h4 class="profile-hr">Profile Details <span></span></h4>
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <label>Name</label>
                                                        </div>
                                                        <div class="col-md-9">
                                                            <p> Rozy Hayat</p>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <label>Email</label>
                                                        </div>
                                                        <div class="col-md-9">
                                                            <p> rozyhayat.leelija@gmail.com</p>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <label>Gender</label>
                                                        </div>
                                                        <div class="col-md-9">
                                                            <p>Female</p>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <label>Address</label>
                                                        </div>
                                                        <div class="col-md-9">
                                                            <p>Barasat, Kolkata, India, 700125</p>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <label>Phone</label>
                                                        </div>
                                                        <div class="col-md-9">
                                                            <p>123 456 7890</p>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <label>Profession</label>
                                                        </div>
                                                        <div class="col-md-9">
                                                            <p>Web Developer and Designer</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="profile" role="tabpanel"
                                                    aria-labelledby="profile-tab">
                                                    <div class="form-floating mb-3">
                                                        <input type="text" maxlength="80" class="form-control"
                                                            id="floatingInput" placeholder=" " name="name" value=""
                                                            required="">
                                                        <label for="floatingInput">Name</label>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="row align-items-center">
                                                            <label for="" class="col-xl-2 control-label">First
                                                                Name</label>
                                                            <div class="col-xl-4">
                                                                <input type="text" class="form-control" name="fname"
                                                                    value="<?php echo $cusDtl[0][5]; ?>" required>
                                                            </div>
                                                            <label for="" class="col-xl-2 control-label">last
                                                                Name</label>
                                                            <div class="col-xl-4">
                                                                <input type="text" class="form-control" name="lname"
                                                                    value="<?php echo $cusDtl[0][6]; ?>" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="row align-items-center">
                                                            <label for="" class="col-xl-2 control-label">Email
                                                                Id</label>
                                                            <div class="col-xl-4">
                                                                <input type="email" class="form-control" name="email_id"
                                                                    value="<?php echo $cusDtl[0][3]; ?>" required>
                                                            </div>
                                                            <label for="" class="col-xl-2 control-label">Mobile
                                                                No</label>
                                                            <div class="col-xl-4">
                                                                <input type="number" class="form-control"
                                                                    name="mobNumber"
                                                                    value="<?php echo $cusDtl[0][34]; ?>" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="row align-items-center">
                                                            <label for="" class="col-xl-2 control-label">Gender</label>
                                                            <div class="col-xl-4 genderingrow ">
                                                                <div class="form-check">
                                                                    <input class="form-check-input p-0" type="radio"
                                                                        name="gender" value="male" <?php 
                                                                if ($cusDtl[0][7] == "male") {
                                                                    echo 'checked';
                                                                }
                                                                ?> required>
                                                                    <label class="form-check-label" for="gridRadios1">
                                                                        Male
                                                                    </label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input p-0" type="radio"
                                                                        name="gender" value="Female" <?php 
                                                                if ($cusDtl[0][7] == "female") {
                                                                    echo 'checked';
                                                                }
                                                                ?>>
                                                                    <label class="form-check-label" for="gridRadios2">
                                                                        Female
                                                                    </label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input p-0" type="radio"
                                                                        name="gender" value="others" <?php 
                                                                if ($cusDtl[0][7] == "others") {
                                                                    echo 'checked';
                                                                }
                                                                ?>>
                                                                    <label class="form-check-label" for="gridRadios2">
                                                                        Transgender
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <label for="txtProfession"
                                                                class="col-xl-2 control-label">Profession</label>
                                                            <div class="col-xl-4">
                                                                <select id="txtProfession"
                                                                    class="form-select myselectcss" name="txtProfession"
                                                                    required>
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
                                                                    <option value="Web Developer">Web Developer
                                                                    </option>
                                                                    <option value="Others">Others</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <div class="row align-items-center">

                                                            <label for="" class="col-xl-2 control-label">About
                                                                You</label>
                                                            <div class="col-xl-4">
                                                                <textarea class="form-control" rows="2" id=""
                                                                    name="txtBrief"><?php echo $cusDtl[0][10]; ?></textarea>
                                                            </div>

                                                            <label for=""
                                                                class="col-xl-2 control-label">Description</label>
                                                            <div class="col-xl-4">
                                                                <textarea class="form-control" rows="2" id=""
                                                                    name="txtDesc"><?php echo trim(stripslashes($cusDtl[0][11])); ?></textarea>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <div class="row align-items-center">
                                                            <label for=""
                                                                class="col-xl-2 control-label">Organization</label>
                                                            <div class="col-xl-4">
                                                                <input class="form-control" name="organization"
                                                                    value="<?php echo $cusDtl[0][12]; ?>" readonly>
                                                            </div>

                                                            <label for="" class="col-xl-2 control-label">Discount
                                                                Offered</label>
                                                            <div class="col-xl-4">
                                                                <input class="form-control" name="discount"
                                                                    value="<?php echo $cusDtl[0][19]; ?>" readonly>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="row align-items-center">
                                                            <label for=""
                                                                class="col-xl-2 control-label">Featured</label>
                                                            <div class="col-xl-4">
                                                                <input class="form-control" name="featured"
                                                                    value="<?php echo $cusDtl[0][13]; ?>" readonly>
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
                                                <div class="tab-pane fade" id="contact" role="tabpanel"
                                                    aria-labelledby="contact-tab">
                                                    <form class="form-horizontal mt-4" role="form"
                                                        action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post"
                                                        enctype="multipart/form-data" autocomplete="off">
                                                        <div class="form-group">
                                                            <div class="row align-items-center">
                                                                <label for="address1"
                                                                    class="col-xl-2 control-label">Address1</label>
                                                                <div class="col-xl-4">
                                                                    <input type="text" class="form-control"
                                                                        name="address1"
                                                                        value="<?php echo $cusDtl[0][24]; ?>" required>
                                                                </div>
                                                                <label for="address2"
                                                                    class="col-xl-2 control-label">Address2</label>
                                                                <div class="col-xl-4">
                                                                    <input type="text" class="form-control"
                                                                        name="address2"
                                                                        value="<?php echo $cusDtl[0][25]; ?>" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="row align-items-center">

                                                                <!-- City Dropdown Start -->
                                                                <label for="city"
                                                                    class="col-xl-2 control-label">City</label>
                                                                <div class="col-xl-4">
                                                                    <select id="city" class="form-select " name="cityId"
                                                                        required>
                                                                        <option value="" selected disabled>
                                                                            Select City
                                                                        </option>
                                                                        <?php
                                                    $utility->populateDropDown($cusDtl[0][27], 'id', 'city', 'cities')
                                                ?>
                                                                    </select>
                                                                </div>
                                                                <!-- City Dropdown end -->


                                                                <!-- Pin code input Start -->
                                                                <label for="postal_code"
                                                                    class="col-xl-2 control-label">Postal
                                                                    Code</label>
                                                                <div class="col-xl-4">
                                                                    <input type="number" class="form-control"
                                                                        name="postal_code"
                                                                        value="<?php echo $cusDtl[0][29]; ?>" required>
                                                                </div>
                                                                <!-- Pin code input end -->

                                                            </div>
                                                        </div>
                                                        <div class="form-group ">
                                                            <div class="row align-items-center">
                                                                <label for="country"
                                                                    class="col-xl-2 control-label">Country</label>
                                                                <div class="col-xl-4">
                                                                    <select id="country" class="form-select "
                                                                        name="countryId" required>
                                                                        <option value="" selected disabled>
                                                                            Select Country
                                                                        </option>
                                                                        <?php
                                                    $utility->populateDropDown($cusDtl[0][30], 'id', 'country_name', 'countries')
                                                ?>
                                                                    </select>
                                                                </div>
                                                                <label for="stateId"
                                                                    class="col-xl-2 control-label">State</label>
                                                                <div class="col-xl-4">
                                                                    <select id="stateId" class="form-select "
                                                                        name="stateId" required>
                                                                        <option value="" selected disabled>
                                                                            Select State
                                                                        </option>
                                                                        <?php
                                                    $utility->populateDropDown($cusDtl[0][28], 'state_id', 'state_name', 'states')
                                                ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="row align-items-center">
                                                                <label for="phone1"
                                                                    class="col-xl-2 control-label">Phone1</label>
                                                                <div class="col-xl-4">
                                                                    <input type="number" class="form-control"
                                                                        name="phone1"
                                                                        value="<?php echo $cusDtl[0][31]; ?>" required>
                                                                </div>

                                                                <label for="phone2"
                                                                    class="col-xl-2 control-label">Phone2</label>
                                                                <div class="col-xl-4">
                                                                    <input type="number" class="form-control"
                                                                        name="phone2"
                                                                        value="<?php echo $cusDtl[0][32]; ?>" required>
                                                                </div>
                                                            </div>
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


                                            <!-- </div> -->

                                        </form>

                                        <!-- address update form start -->

                                        <!-- address update form end -->
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

        <!-- <script>
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
        </script> -->
        <script>
        var firstTabEl = document.querySelector('#myTab li:last-child a')
        var firstTab = new bootstrap.Tab(firstTabEl)

        firstTab.show()
        </script>

        <script>
        document.getElementById('buttonid').addEventListener('click', openDialog);

        function openDialog() {
            document.getElementById('fileid').click();
        }
        </script>

</body>

</html>