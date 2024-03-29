<?php
require_once("includes/constant.inc.php");
session_start();

require_once("_config/dbconnect.php");

require_once("classes/date.class.php");
require_once("classes/error.class.php");
require_once("classes/search.class.php");
require_once("classes/customer.class.php");
require_once("classes/login.class.php");

//require_once("../classes/front_photo.class.php");
require_once("classes/blog_mst.class.php");
require_once("classes/domain.class.php");
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

//$ff				= new FrontPhoto();
$blogMst		= new BlogMst();
$domain			= new Domain();
$utility		= new Utility();
$uMesg 			= new MesgUtility();
$uImg 			= new ImageUtility();
$uNum 			= new NumUtility();
######################################################################################################################
$typeM		= $utility->returnGetVar('typeM','');
//user id
$cusId		= $utility->returnSess('userid', 0);
$cusDtl		= $customer->getCustomerData($cusId);
$blog_id	= $utility->returnGetVar('blog_id','');

if($cusId == 0)
	{
		header("Location: index.php");
	}

if(isset($_POST['btnEditDomain']))
	{
		$txtDomain			= $_POST['txtDomain'];
		//$txtDomainUrl		= $_POST['txtDomainUrl'];
		$txtNicheId			= $_POST['txtNicheId'];
		$txtDa				= $_POST['txtDa'];
		$txtPa				= $_POST['txtPa'];
		$txtCf				= $_POST['txtCf'];
		$txtTf				= $_POST['txtTf'];
		$txtAlxTraffic		= $_POST['txtAlxTraffic'];
		$txtOrgTraffic		= $_POST['txtOrgTraffic'];
		$txtPrice			= $_POST['txtPrice'];
		$txtMozRank			= $_POST['txtMozRank'];
		$txtFollow			= $_POST['txtFollow'];
		$txtExtUrl			= $_POST['txtExtUrl'];
		$txtDomComments		= $_POST['txtDomComments'];
		$txtDelTime			= $_POST['txtDelTime'];

		//add Blog post session variables
	$sess_arr	= array('txtDomain','txtDomainUrl', 'txtNicheId', 'txtDa','txtPa','txtCf','txtTf','txtAlxTraffic','txtOrgTraffic','txtPrice');
	$utility->addPostSessArr($sess_arr);

	//defining error variables
	$action		= 'add_domain';
	$url		= $_SERVER['PHP_SELF'];
	$id			= 0;
	$id_var		= '';
	$anchor		= 'addDomain';
	$typeM		= 'ERROR';
	$msg = '';

	if($txtDomain == ''){
		echo "Please put the Blog url";
	}else{
		//edit Guest Blogs
		$blogMst->editBlog($blog_id,$txtDomain,$txtNicheId, $txtDa, $txtPa, $txtCf, $txtTf, '', $txtMozRank, $txtAlxTraffic,$txtOrgTraffic, $txtFollow, '', $txtPrice,
		'', '', '', '', '', '', $txtPrice, $txtExtUrl, $txtDomComments, $txtDelTime,$cusDtl[0][2]);

		//deleting the sessions
		$utility->delSessArr($sess_arr);

		//forward the web page
		$uMesg->showSuccessT('success', 0, '', 'gblogs-list.php', "Domain Name Has been Successfully Added", 'SUCCESS');
	}


	}
?>
<!DOCTYPE HTML>
<html lang="zxx">

<head>
    <meta name="robots" content="noindex,nofollow">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Domain name with website or blogs ready for you | Domains :: w3layouts</title>
    <link rel="shortcut icon" href="<?php echo FAVCON_PATH?>" type="image/png" />
    <link rel="apple-touch-icon" href="<?php echo FAVCON_PATH?>" />
    <meta name="keywords" content="Precedence Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
SmartPhone Compatible web template, free WebDesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />

    <!-- Plugins Files -->
    <link href="<?= URL ?>/plugins/bootstrap-5.2.0/css/bootstrap.css" rel="stylesheet" />
    <?php require_once ROOT_DIR.'/plugins/font-awesome/fontawesome.php'?>

    <!-- Custom CSS -->
    <link href="<?= URL;?>/css/style.css" rel='stylesheet' type='text/css' />
    <link href="<?= URL;?>/css/form.css" rel='stylesheet' type='text/css' />
    <link href="<?= URL;?>/css/custom.css" rel='stylesheet' type='text/css' />
    <link href="<?= URL;?>/css/dashboard.css" rel='stylesheet' type='text/css' />
</head>

<body>
    <div id="home">
        <!-- header -->
        <?php require_once 'components/navbar.php'; ?>
        <!-- //header -->
        <div class="banner1">

        </div>
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
                        <div class="col-md-9  ps-md-0 display-table-cell v-align ">

                            <div class="client_add_blog mt-4">

                                <section class="py-0 branches position-relative" id="explore">
                                    <div class="container py-md-0 p-0 container-fluid text-center">
                                        <?php
				                          if( (isset($_GET['action'])) && ($_GET['action'] == 'EditBlog') )
			                	          {
					                       $blogDtls		= $blogMst->showBlog($blog_id);
			                             ?>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <!-- <h2 class="stat-title text-center pb-lg-4">Add Your Guest Posting Blogs
                                                </h2> -->
                                                <div class="bfrom">
                                                    <!--start from div-->
                                                    <form class="form-horizontal" role="form"
                                                        action="<?php $_SERVER['PHP_SELF']."?action=edit_blog&blog_id=".$blog_id; ?>"
                                                        name="formContactform" method="post"
                                                        enctype="multipart/form-data" autocomplete="off">
                                                        <b
                                                            style="color: red;"><?php $uMesg->dispMessage($typeM, '../images/icon/', 'blackLarge');?></b>
                                                        <div class="form-group">
                                                            <div class="row align-items-center">
                                                                <label class="control-label col-md-2"
                                                                    for="txtDomain">Blog Url:<span class="orangeLetter">
                                                                </label>
                                                                <div class="col-md-10">
                                                                    <input type="text" class="form-control"
                                                                        id="txtDomain" name="txtDomain"
                                                                        value="<?php echo $blogDtls[0]; ?>" required />
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <div class="row align-items-center">
                                                                <label class="control-label col-md-2"
                                                                    for="txtNicheId">Niche</label>
                                                                <div class="col-md-10">
                                                                    <select id="txtNicheId" class="form-control"
                                                                        name="txtNicheId" required>
                                                                        <option value="<?php echo $blogDtls[23]; ?>"
                                                                            selected="selected">
                                                                            <?php echo $blogDtls[23]; ?></option>
                                                                        <?php
															$BlogMst  = $blogMst->ShowBlogNichMast();
															foreach($BlogMst as $eachRecord)
																{
																	echo '<option value="'.$eachRecord['niche_name'].'">'.$eachRecord['niche_name'].'</option>';
																}
														?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="row align-items-center">
                                                                <!-- begion row -->
                                                                <div class="col-md-6">
                                                                    <div class="row align-items-center">
                                                                        <label class="control-label col-md-4"
                                                                            for="txtDa">DA:</label>
                                                                        <div class="col-md-8">
                                                                            <input type="text" class="form-control"
                                                                                id="txtDa" name="txtDa"
                                                                                value="<?php echo $blogDtls[1]; ?>"
                                                                                required />
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="row align-items-center">
                                                                        <label class="control-label col-md-2"
                                                                            for="txtPa">PA:</label>
                                                                        <div class="col-md-10">
                                                                            <input type="text" class="form-control"
                                                                                id="txtPa" name="txtPa"
                                                                                value="<?php echo $blogDtls[2]; ?>"
                                                                                required />
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="row align-items-center">
                                                                <!-- begion row -->
                                                                <div class="col-md-6">
                                                                    <div class="row">
                                                                        <label class="control-label col-md-4"
                                                                            for="txtCf">CF:</label>
                                                                        <div class="col-md-8">
                                                                            <input type="text" class="form-control"
                                                                                id="txtCf" name="txtCf"
                                                                                value="<?php echo $blogDtls[3]; ?>" />
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="row align-items-center">
                                                                        <label class="control-label col-md-2"
                                                                            for="txtTf">TF:</label>
                                                                        <div class="col-md-10">
                                                                            <input type="text" class="form-control"
                                                                                id="txtTf" name="txtTf"
                                                                                value="<?php echo $blogDtls[4]; ?>" />
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="row align-items-center">
                                                                <label class="control-label col-md-2"
                                                                    for="txtAlxTraffic">Alexa Traffic:<span
                                                                        class="orangeLetter"> </label>
                                                                <div class="col-md-6">
                                                                    <input type="text" class="form-control"
                                                                        id="txtAlxTraffic" name="txtAlxTraffic"
                                                                        value="<?php echo $blogDtls[25]; ?>" required />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="row align-items-center">
                                                                <label class="control-label col-md-2"
                                                                    for="txtOrgTraffic">Organic Traffic:<span
                                                                        class="orangeLetter"> </label>
                                                                <div class="col-md-6">
                                                                    <input type="text" class="form-control"
                                                                        id="txtOrgTraffic" name="txtOrgTraffic"
                                                                        value="<?php echo $blogDtls[26]; ?>" required />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="row align-items-center">
                                                                <label class="control-label col-md-2"
                                                                    for="txtMozRank">Moz Rank:<span
                                                                        class="orangeLetter"> </label>
                                                                <div class="col-md-6">
                                                                    <input type="text" class="form-control"
                                                                        id="txtMozRank" name="txtMozRank"
                                                                        value="<?php echo $blogDtls[6]; ?>" required />
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <div class="row align-items-center">
                                                                <!-- begion row -->
                                                                <div class="col-md-6">
                                                                    <div class="row align-items-center">
                                                                        <label class="control-label col-md-4"
                                                                            for="txtFollow">Link Type</label>
                                                                        <div class="col-md-8">
                                                                            <select id="txtFollow"
                                                                                class="form-control select2"
                                                                                name="txtFollow" required>
                                                                                <?php if($blogDtls[7] !='DoFollow' && $blogDtls[7] !='NoFollow') {
															echo '<option value="'.$blogDtls[7].'" selected>'.$blogDtls[7].'</option>';
														} 
														?>
                                                                                <option value="DoFollow"
                                                                                    <?php if($blogDtls[7] =='DoFollow') { echo "selected";} ?>>
                                                                                    DoFollow</option>
                                                                                <option value="NoFollow"
                                                                                    <?php if($blogDtls[7] =='NoFollow') { echo "selected";} ?>>
                                                                                    NoFollow</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="row align-items-center">
                                                                        <label class="control-label col-md-3"
                                                                            for="txtDelTime">Publishing
                                                                            Time(Hours):</label>
                                                                        <div class="col-md-9">
                                                                            <input type="text"
                                                                                class="form-control float-right"
                                                                                id="txtDelTime" name="txtDelTime"
                                                                                value="<?php echo $blogDtls[27]; ?>"
                                                                                required />
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="row align-items-center">
                                                                <label class="control-label col-md-2"
                                                                    for="txtExtUrl">Example Url:<span
                                                                        class="orangeLetter"> </label>
                                                                <div class="col-md-10">
                                                                    <input type="text" class="form-control"
                                                                        id="txtExtUrl" name="txtExtUrl"
                                                                        value="<?php echo $blogDtls[17]; ?>" required />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="row align-items-center">
                                                                <label class="control-label col-md-2"
                                                                    for="txtPrice">Price($):<span class="orangeLetter">
                                                                </label>
                                                                <div class="col-md-6">
                                                                    <input type="text" class="form-control"
                                                                        id="txtPrice" name="txtPrice"
                                                                        value="<?php echo $blogDtls[9]; ?>" required />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="row align-items-center">
                                                                <label class="control-label col-md-2"
                                                                    for="txtDomComments">Remarks:<span
                                                                        class="orangeLetter"> </label>
                                                                <div class="col-md-10">
                                                                    <textarea type="text" class="form-control"
                                                                        id="txtDomComments" name="txtDomComments"
                                                                        rows="5"><?php echo $blogDtls[18]; ?></textarea>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row justify-content-evenly  align-items-center">
                                                            <div class="col-12 col-md-6 text-center form-group">
                                                                <!--<input type="submit" name="btnAddDomain" class="btn btn-success " id="btn_start_test" value="Add New Record" />-->
                                                                <a href="account.php" class="cancel_btn btn-block"
                                                                    id="btn_start_test" role="button">Cancel</a>
                                                            </div>
                                                            <div class="col-12 col-md-6 text-center form-group">
                                                                <button type="submit" name="btnEditDomain"
                                                                    class="update_btn">Update</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                                <!--end from div-->

                                            </div>
                                        </div>
                                        <?php
				                              }
			                                ?>
                                    </div>
                                </section>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- //contact top -->

        <!-- Footer -->
        <?php require_once 'components/footer.php'; ?>
        <!-- /Footer -->
    </div>
    <script src="<?= URL;?>/plugins/bootstrap-5.2.0/js/bootstrap.js"></script>
</body>

</html>