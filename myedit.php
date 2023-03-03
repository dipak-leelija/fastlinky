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
    <link href="plugins/bootstrap-5.2.0/css/bootstrap.css" rel='stylesheet' type='text/css' />
    <link href="plugins/bootstrap-5.2.0/css/bootstrap.min.css" rel='stylesheet' type='text/css' />
    <link href="plugins/fontawesome-6.1.1/css/all.css" rel='stylesheet' type='text/css' />

    <!-- Custom CSS -->
    <link href="css/leelija.css" rel='stylesheet' type='text/css' />
    <link href="css/style.css" rel='stylesheet' type='text/css' />
    <link href="css/form.css" rel='stylesheet' type='text/css' />
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
                            <hr>
                            <div class="container bootstrap snippets bootdey">
                                <!-- <div class="row">
                                    <div class="col-sm-10">
                                        <h1>User name</h1>
                                    </div>
                                    <div class="col-sm-2">
                                        <a href="/users" class="pull-right"><img title="profile image"
                                                class="img-circle img-responsive"
                                                src="https://bootdey.com/img/Content/avatar/avatar1.png"></a>
                                    </div>
                                </div> -->
                                <div class="row">
                                  
                                    <div class="col-sm-12">

                                        <ul class="nav nav-tabs" id="myTab">
                                            <li class="active"><a href="#home" data-toggle="tab">Home</a></li>
                                            <li><a href="#messages" data-toggle="tab">Messages</a></li>
                                            <li><a href="#settings" data-toggle="tab">Settings</a></li>
                                        </ul>

                                        <div class="tab-content">
                                            <div class="tab-pane active" id="home">
                                                <div class="table-responsive">
                                                    <table class="table table-hover">
                                                        <thead>
                                                            <tr>
                                                                <th>#</th>
                                                                <th>Label 1</th>
                                                                <th>Label 2</th>
                                                                <th>Label 3</th>
                                                                <th>Label </th>
                                                                <th>Label </th>
                                                                <th>Label </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="items">
                                                            <tr>
                                                                <td>1</td>
                                                                <td>Table cell</td>
                                                                <td>Table cell</td>
                                                                <td>Table cell</td>
                                                                <td>Table cell</td>
                                                                <td>Table cell</td>
                                                                <td>Table cell</td>
                                                            </tr>
                                                            <tr>
                                                                <td>2</td>
                                                                <td>Table cell</td>
                                                                <td>Table cell</td>
                                                                <td>Table cell</td>
                                                                <td>Table cell</td>
                                                                <td>Table cell</td>
                                                                <td>Table cell</td>
                                                            </tr>
                                                            <tr>
                                                                <td>3</td>
                                                                <td>Table cell</td>
                                                                <td>Table cell</td>
                                                                <td>Table cell</td>
                                                                <td>Table cell</td>
                                                                <td>Table cell</td>
                                                                <td>Table cell</td>
                                                            </tr>
                                                            <tr>
                                                                <td>4</td>
                                                                <td>Table cell</td>
                                                                <td>Table cell</td>
                                                                <td>Table cell</td>
                                                                <td>Table cell</td>
                                                                <td>Table cell</td>
                                                                <td>Table cell</td>
                                                            </tr>
                                                            <tr>
                                                                <td>5</td>
                                                                <td>Table cell</td>
                                                                <td>Table cell</td>
                                                                <td>Table cell</td>
                                                                <td>Table cell</td>
                                                                <td>Table cell</td>
                                                                <td>Table cell</td>
                                                            </tr>
                                                            <tr>
                                                                <td>6</td>
                                                                <td>Table cell</td>
                                                                <td>Table cell</td>
                                                                <td>Table cell</td>
                                                                <td>Table cell</td>
                                                                <td>Table cell</td>
                                                                <td>Table cell</td>
                                                            </tr>
                                                            <tr>
                                                                <td>7</td>
                                                                <td>Table cell</td>
                                                                <td>Table cell</td>
                                                                <td>Table cell</td>
                                                                <td>Table cell</td>
                                                                <td>Table cell</td>
                                                                <td>Table cell</td>
                                                            </tr>
                                                            <tr>
                                                                <td>8</td>
                                                                <td>Table cell</td>
                                                                <td>Table cell</td>
                                                                <td>Table cell</td>
                                                                <td>Table cell</td>
                                                                <td>Table cell</td>
                                                                <td>Table cell</td>
                                                            </tr>
                                                            <tr>
                                                                <td>9</td>
                                                                <td>Table cell</td>
                                                                <td>Table cell</td>
                                                                <td>Table cell</td>
                                                                <td>Table cell</td>
                                                                <td>Table cell</td>
                                                                <td>Table cell</td>
                                                            </tr>
                                                            <tr>
                                                                <td>10</td>
                                                                <td>Table cell</td>
                                                                <td>Table cell</td>
                                                                <td>Table cell</td>
                                                                <td>Table cell</td>
                                                                <td>Table cell</td>
                                                                <td>Table cell</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="col-md-4 col-md-offset-4 text-center">
                                                            <ul class="pagination" id="myPager"></ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--/table-resp-->

                                                <hr>

                                            </div>
                                            <!--/tab-pane-->
                                            <div class="tab-pane" id="messages">

                                                <h2></h2>

                                                <ul class="list-group">
                                                    <li class="list-group-item text-muted">Inbox</li>
                                                    <li class="list-group-item text-right"><a href="#"
                                                            class="pull-left">Here is your a link to the latest summary
                                                            report from the..</a> 2.13.2014</li>
                                                    <li class="list-group-item text-right"><a href="#"
                                                            class="pull-left">Hi Joe, There has been a request on your
                                                            account since that was..</a> 2.11.2014</li>
                                                    <li class="list-group-item text-right"><a href="#"
                                                            class="pull-left">Nullam sapien massaortor. A lobortis
                                                            vitae, condimentum justo...</a> 2.11.2014</li>
                                                    <li class="list-group-item text-right"><a href="#"
                                                            class="pull-left">Thllam sapien massaortor. A lobortis
                                                            vitae, condimentum justo...</a> 2.11.2014</li>
                                                    <li class="list-group-item text-right"><a href="#"
                                                            class="pull-left">Wesm sapien massaortor. A lobortis vitae,
                                                            condimentum justo...</a> 2.11.2014</li>
                                                    <li class="list-group-item text-right"><a href="#"
                                                            class="pull-left">For therepien massaortor. A lobortis
                                                            vitae, condimentum justo...</a> 2.11.2014</li>
                                                    <li class="list-group-item text-right"><a href="#"
                                                            class="pull-left">Also we, havesapien massaortor. A lobortis
                                                            vitae, condimentum justo...</a> 2.11.2014</li>
                                                    <li class="list-group-item text-right"><a href="#"
                                                            class="pull-left">Swedish chef is assaortor. A lobortis
                                                            vitae, condimentum justo...</a> 2.11.2014</li>

                                                </ul>

                                            </div>
                                            <!--/tab-pane-->
                                            <div class="tab-pane" id="settings">

                                                <hr>
                                                <form class="form" action="##" method="post" id="registrationForm">
                                                    <div class="form-group">

                                                        <div class="col-xs-6">
                                                            <label for="first_name">
                                                                <h4>First name</h4>
                                                            </label>
                                                            <input type="text" class="form-control" name="first_name"
                                                                id="first_name" placeholder="first name"
                                                                title="enter your first name if any.">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">

                                                        <div class="col-xs-6">
                                                            <label for="last_name">
                                                                <h4>Last name</h4>
                                                            </label>
                                                            <input type="text" class="form-control" name="last_name"
                                                                id="last_name" placeholder="last name"
                                                                title="enter your last name if any.">
                                                        </div>
                                                    </div>

                                                    <div class="form-group">

                                                        <div class="col-xs-6">
                                                            <label for="phone">
                                                                <h4>Phone</h4>
                                                            </label>
                                                            <input type="text" class="form-control" name="phone"
                                                                id="phone" placeholder="enter phone"
                                                                title="enter your phone number if any.">
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <div class="col-xs-6">
                                                            <label for="mobile">
                                                                <h4>Mobile</h4>
                                                            </label>
                                                            <input type="text" class="form-control" name="mobile"
                                                                id="mobile" placeholder="enter mobile number"
                                                                title="enter your mobile number if any.">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">

                                                        <div class="col-xs-6">
                                                            <label for="email">
                                                                <h4>Email</h4>
                                                            </label>
                                                            <input type="email" class="form-control" name="email"
                                                                id="email" placeholder="you@email.com"
                                                                title="enter your email.">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">

                                                        <div class="col-xs-6">
                                                            <label for="email">
                                                                <h4>Location</h4>
                                                            </label>
                                                            <input type="email" class="form-control" id="location"
                                                                placeholder="somewhere" title="enter a location">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">

                                                        <div class="col-xs-6">
                                                            <label for="password">
                                                                <h4>Password</h4>
                                                            </label>
                                                            <input type="password" class="form-control" name="password"
                                                                id="password" placeholder="password"
                                                                title="enter your password.">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">

                                                        <div class="col-xs-6">
                                                            <label for="password2">
                                                                <h4>Verify</h4>
                                                            </label>
                                                            <input type="password" class="form-control" name="password2"
                                                                id="password2" placeholder="password2"
                                                                title="enter your password2.">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-xs-12">
                                                            <br>
                                                            <button class="btn btn-lg btn-success" type="submit"><i
                                                                    class="glyphicon glyphicon-ok-sign"></i>
                                                                Save</button>
                                                            <button class="btn btn-lg" type="reset"><i
                                                                    class="glyphicon glyphicon-repeat"></i>
                                                                Reset</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>

                                        </div>
                                        <!--/tab-pane-->
                                    </div>
                                    <!--/tab-content-->

                                </div>
                                <!--/col-9-->
                            </div>
                            <!--/row-->
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
        document.getElementById('buttonid').addEventListener('click', openDialog);

        function openDialog() {
            document.getElementById('fileid').click();
        }
        </script> -->

</body>

</html>