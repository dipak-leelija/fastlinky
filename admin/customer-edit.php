<?php
session_start();
require_once("../includes/constant.inc.php");
include_once('checkSession.php');

require_once "../_config/dbconnect.php";

require_once("../includes/content.inc.php"); 
require_once("../includes/customer.inc.php");
require_once("../includes/user.inc.php");
require_once("../includes/email.inc.php");
require_once("../includes/registration.inc.php");


require_once("../classes/adminLogin.class.php"); 
require_once("../classes/customer.class.php");
require_once("../classes/subscriber.class.php");


require_once("../classes/error.class.php");  
require_once("../classes/date.class.php"); 
require_once("../classes/utility.class.php");
require_once("../classes/utilityNum.class.php");
require_once("../classes/utilityMesg.class.php"); 
require_once("../classes/utilityImage.class.php");
require_once("../classes/utilityCurl.class.php");


/* INSTANTIATING CLASSES */
$adminLogin 	= new adminLogin();
$customer		= new Customer();
$subscribe		= new EmailSubscriber();
//$country		= new Countries();

$dateUtil      	= new DateUtil();
$error 			= new MyError();
$utility		= new Utility();
$uNum			= new NumUtility();
$uMesg 			= new MesgUtility();
$uImg 			= new ImageUtility();
$uCurl 			= new CurlUtility();


/////////////////////////////////////////////////////////////////////////////////////////////////

//declare variables
$typeM		= $utility->returnGetVar('typeM','');
$cus_id		= $utility->returnGetVar('cus_id','');



$cusDetail = $customer->getCustomerData($cus_id);


if(isset($_POST['btnUpdateCustomer'])){
    
	//hold the post data
	//$txtUserName			= $_POST['txtUserName'];
	//$txtEmail				= $_POST['txtEmail'];
	$txtfirstName			= $_POST['txtfirstName'];
	$txtLastName			= $_POST['txtLastName'];
	$txtBrief				= 	$_POST['txtBrief'];
	$txtDesc				= $_POST['txtDesc'];
	$txtCompanyName			= $_POST['txtCompanyName'];
	$txtProfession			= $_POST['txtProfession'];
	
	$txtDiscountOffered		= $_POST['txtDiscountOffered'];  
	$intOrder				= $_POST['intOrder'];
	$selCusType				= $_POST['selCusType'];

	
	// For customer address table 
	
	$txtAddress1  					= $_POST['txtAddress1'];
	$txtAddress2  					= $_POST['txtAddress2'];
	$txtAddress3  					= $_POST['txtAddress3'];
	$txtPostalCode  				= $_POST['txtPostalCode'];
	$txtCountriesId  				= $_POST['txtCountriesId'];
	
	if(isset($_POST['txtProvinceId']))
	{
		$txtProvinceId	= 	$_POST['txtProvinceId'];
	}
	else
	{
		$txtProvinceId	= 	0;
	}
	
	if(isset($_POST['txtCountyId']))
	{
		$txtCountyId	= 	$_POST['txtCountyId'];
	}
	else
	{
		$txtCountyId	= 	0;
	}
	$txtTownId			= 	$_POST['txtTownId'];
	
	$txtPhone1  					= $_POST['txtPhone1'];
	//$txtPhone2  					= $_POST['txtPhone2'];
	$txtFax  						= $_POST['txtFax'];
	$txtMobile  					= $_POST['txtMobile'];
	$fileCusAddImage  				= $_FILES['fileCusAddImage'];
	
	//designation
	if(isset($_POST['radioDesg'])){
		$radioDesg	= 	$_POST['radioDesg'];
	}else{
		$radioDesg	= 	'';
	}
	
	
	//gender
	if(isset($_POST['radioGender'])){
		$radioGender	= 	$_POST['radioGender'];
	}else{
		$radioGender	= 	'male';
	}
	
	//retailer type 
	if(isset($_POST['radioRt'])){
		$radioRt	= 	$_POST['radioRt'];
	}
	else{
		$radioRt	= 	'';
	}
	
	//Account verified 
	if(isset($_POST['radioAcc'])){

		$radioAcc	= 	$_POST['radioAcc'];

	}else{
		$radioAcc	= 	'';
	}
	
	//misc
	if(isset($_POST['radioFeatured'])){

		$radioFeatured	= 	$_POST['radioFeatured'];
	}else{

		$radioFeatured	= 	'N';
	}
	
	
	//defining error variables
	$action		= 'edit_user';
	$url		= $_SERVER['PHP_SELF'];
	$id			= $cus_id;
	$id_var		= 'cus_id';
	$anchor		= 'editCustomer';
	$typeM		= 'ERROR';
	
	
	//error check
	//$duplicateId	= $error->duplicateUser($txtEmail, 'email', 'customer');
	//$dupMemId		= $error->duplicateUser($txtMemberId, 'member_id', 'customer');
	//$invalidEmail 	= $error->invalidEmail($txtEmail);
	
    // print_r($_POST);
    // exit;
	
	
	//CHECK FIELD VALIDATION
	 
	if($txtfirstName == ''){
		$error->showErrorTA($action, $id, $id_var, $url, ERU108, $typeM, $anchor);
	}elseif($txtLastName == ''){
		$error->showErrorTA($action, $id, $id_var, $url, ERU109, $typeM, $anchor);
	}else if($selCusType == ''){
		$error->showErrorTA($action, $id, $id_var, $url, ERREG015, $typeM, $anchor);
	}elseif($txtPhone1 == ''){
		$error->showErrorTA($action, $id, $id_var, $url, ERREG003, $typeM, $anchor);
	}else{
		
		$txtTownId	= $_POST['txtTownId'];
		
		
		//update customer info					 				   
        $customer->editCustomer($cus_id, $txtfirstName, $txtLastName, $radioGender, $txtBrief, $txtDesc, $txtCompanyName, $radioFeatured, 
					    $txtProfession, $intOrder, $radioAcc, $txtDiscountOffered);





		// Update Customer Address
		$customer->updateCusAddress($cus_id, $txtAddress1, $txtAddress2, $txtAddress3, $txtTownId, $txtProvinceId,  $txtPostalCode,  $txtCountriesId, $txtPhone1, '', $txtFax, $txtMobile);
		   
		//add to the mass email system
		if(isset($_POST['checkNews']) && ($_POST['checkNews'] == 'yes')){

			//decide category
			if($radioDesg=='retailer'){
				$selCat=1;
			}else{
				$selCat	=2;
			}
			
			$subscribe->addSubscriber('','', $txtfirstName,$txtLastName, $selCat, $txtCompanyName, $txtPhone1);
			
		}
		
		//delete image if selected	
		if(isset($_POST['delImg']) && ($_POST['delImg'] == 1)){
			$utility->deleteFile($cus_id,'customer_id','../images/user/', 
								 'image', 'customer');
		}				   
		
		//update image
		if($_FILES['fileCusAddImage']['name'] != ''){
			//delete file
			$utility->deleteFile($cus_id,'customer_id','../images/user/', 
								 'image', 'customer');
			
			//renaming the file
			$newName = $utility->getNewName4($_FILES['fileCusAddImage'], '',$cus_id);
			
			//upload in the server
			$uImg->imgUpdResize($_FILES['fileCusAddImage'], '', $newName, 
								   '../images/users/', 200, 200, 
						            $cus_id,'image', 'customer_id', 'customer');
		}
		
		
		//forward
		$uMesg->showSuccessT('success', $cus_id, 'id', $_SERVER['PHP_SELF'], SUCUST202."&cus_id=".$cus_id, 'SUCCESS');

	}
}
?>

<link href="<?= URL ?>/style/admin/style.css" rel="stylesheet" type="text/css" />
<link href="<?= URL ?>/style/admin/admin.css" rel="stylesheet" type="text/css" />

<title><?php echo COMPANY_S; ?>- Edit Customer</title>

<div class="popup-form">
    <?php 
    //display message
    $uMesg->dispMessage($typeM, '../images/icons/', 'blackLarge');
    
    //close button
    echo $utility->showCloseButton();
    ?>

    <?php 
	if( (isset($_GET['action'])) && ($_GET['action'] == 'edit_user') )
	{
		$cusDetail = $customer->getCustomerData($cus_id);
        
        // foreach($cusDetail[0] as $key=>$value){
        //     echo $key.'=>'.$value.'<br>';
        // }
	?>
    <h3>Edit Customer </h3>
    <input type="hidden" id="cus_id" value="<?php echo $cus_id; ?>">
    <form action="<?php $_SERVER['PHP_SELF']?>?action=edit_user&amp;cus_id=<?php echo $cus_id; ?>" method="post"
        enctype="multipart/form-data">


        <label>First name</label>
        <input name="txtfirstName" type="text" class="text_box_large" id="txtfirstName"
            value="<?php echo $cusDetail[0][5];?>" size="25" />
        <div class="cl"></div>

        <label>Last Name</label>
        <input name="txtLastName" type="text" class="text_box_large" id="txtLastName"
            value="<?php echo $cusDetail[0][6];?>" size="25" />
        <div class="cl"></div>

        <label>Gender<span class="orangeLetter"></span></label>
        <input type="radio" class="radio" name="radioGender" id="radioGender" value="male" title="male"
            <?php echo $utility->checkString($cusDetail[0][7],'male');?> />
        <label for="radioGender">Male</label>

        <input type="radio" class="radio" name="radioGender" id="radioGender" value="female" title="female"
            <?php echo $utility->checkString($cusDetail[0][7],'female');?> />
        <label for="radioGender">Female</label>
        <div class="cl"></div>

        <label>Customer Type<span class="orangeLetter">*</span></label>

        <select name="selCusType" id="selCusType" class="textBoxA">
            <option value="">-- Select One --</option>

            <?php
            if(isset($_SESSION['selCusType'])){

                $utility->populateDropDown($_SESSION['selCusType'], 'customer_type_id', 'cus_type', 'customer_type');

            }else{

                $utility->populateDropDown($cusDetail[0][0], 'customer_type_id', 'cus_type', 'customer_type');

            }
            ?>
        </select>
        <div class="cl"></div>

        <label>Account Verified</label>
        <div class="fl marR10">
            <input type="radio" class="radio" name="radioAcc" id="radioAcc" value="Y" title="acc yes"
                <?php echo $utility->checkString($cusDetail[0][35],'Y');?> />
            <label for="radioAcc">Y</label>
        </div>

        <div class="fl marL10">
            <input type="radio" class="radio" name="radioAcc" id="radioAcc" value="N" title="acc no"
                <?php echo $utility->checkString($cusDetail[0][35],'N');?> />
            <label for="radioAcc">N</label>
        </div>
        <div class="cl"></div>



        <label>Brief</label>
        <textarea name="txtBrief" id="txtBrief" cols="30" rows="4" value="<?php echo $cusDetail[0][10];?>">
            </textarea>
        <div class="cl"></div>


        <label>Description</label>
        <textarea name="txtDesc" type="text" class="text_box_large" id="txtDesc" value="<?php echo $cusDetail[0][11];?>"
            size="25"></textarea>
        <div class="cl"></div>


        <label>Organization</label>
        <input name="txtCompanyName" type="text" class="text_box_large" id="txtCompanyName"
            value="<?php echo $cusDetail[0][12];?>" size="25" />
        <div class="cl"></div>

        <label>Profession</label>
        <input name="txtProfession" type="text" class="text_box_large" id="txtProfession"
            value="<?php echo $cusDetail[0][14];?>" size="25" />
        <div class="cl"></div>

        <label>Sort Order</label>
        <?php /*?><input name="intOrder" type="text" class="text_box_large" id="intOrder"
            value="<?php $utility->printSess2('intOrder', $numOrder); ?>" maxlength="3"
            onKeyPress="return intOnly(this, event)" /> (integer from 1 to 999)<?php */?>

        <input name="intOrder" type="text" class="text_box_large" id="intOrder" value="<?php echo $cusDetail[0][15];?>"
            size="25" />
        <div class="cl"></div>

        <label>Discount Offered</label>
        <input name="txtDiscountOffered" type="text" class="text_box_large" id="txtDiscountOffered"
            value="<?php echo $cusDetail[0][19];?>" size="25" />
        <div class="cl"></div>
        <div class="cl"></div>

        <h4>Customer Address</h4>

        <label>Address 1 <span class="orangeLetter">*</span></label>
        <input name="txtAddress1" type="text" class="text_box_large" id="txtAddress1"
            value="<?php echo $cusDetail[0][24];?>" size="30" />
        <div class="cl"></div>

        <label>Address 2</label>
        <input name="txtAddress2" type="text" class="text_box_large" id="txtAddress2"
            value="<?php echo $cusDetail[0][25];?>" size="30" />
        <div class="cl"></div>

        <label>Address 3</label>
        <input name="txtAddress3" type="text" class="text_box_large" id="txtAddress3"
            value="<?php echo $cusDetail[0][26];?>" size="30" />
        <div class="cl"></div>

        <?php 
			// $arr_val		= array(10, 13, 18, 25,  30, 44, 54, 73, 81, 99, 100, 103, 107, 110, 138, 149, 153, 162, 168, 193, 
			// 						196, 209, 222, 223);
									
			// $arr_label		= array('Argentina',  'Australia', 'Bangladesh',  'Bhutan', 'Brazil', 'China', 'Cuba', 'France', 
			// 						'Germany', 'India', 'Indonesia', 'Ireland', 'Japan', 'Kenya', 'Mexico', 'Nepal', 'New Zealand', 
			// 						'Pakistan', 'Philippines', 'South Africa', 'Srilanka', 'Thiland',  'UK',  'USA');
								

			?>


        <label>Select Country</label>
        <select name="txtCountriesId" class="text_box_large" id="txtCountriesId" onchange="getProvinceList()">
            <option value="0">-- Select --</option>
            <?php 
                
                    if(isset($_SESSION['txtProvinceId']) && ((int)$_SESSION['txtProvinceId'] > 0)){
                                
                        $utility->populateDropDown($_SESSION['txtProvinceId'], 'id', 'name', 'countries');

                    }else{

                        $utility->populateDropDown($cusDetail[0][30], 'id', 'name', 'countries');

                    }
                
               	// $utility->genDropDown($cusDetail[0][30], $arr_val, $arr_label);
				
                ?>
        </select>
        <div class="cl"></div>


        <div id="showError"></div>
        <!-- Province-->
        <div id="provinceId">
            <label>State</label>
            <select name="txtProvinceId" id="txtProvinceId" class="text_box_large"
                onchange="getCityByState(this.value)">
                <option value="0">-- Select One --</option>
                <?php 
                        if($cusDetail[0][30] > 0){
                            if(isset($_SESSION['txtProvinceId']) && ((int)$_SESSION['txtProvinceId'] > 0)){
                                
                                $utility->populateDropDown2($_SESSION['txtProvinceId'], 'id', 'name', 'country_id', $cusDetail[0][30], 'states');

                            }else{
                                $utility->populateDropDown2($cusDetail[0][28], 'id', 'name',  'country_id', $cusDetail[0][30], 'states');
                            }
                        }
                ?>
            </select>
            <div class="cl"></div>

        </div>

        <div id="townId">
            <label>City </label>
            <select name="txtTownId" id="txtTownId" class="text_box_large">
                <option value="0">-- Not Found --</option>
                <?php
                if($cusDetail[0][28] > 0){

                        if(isset($_SESSION['txtTownId']) && ((int)$_SESSION['txtTownId'] > 0)){

                            $utility->populateDropDown($_SESSION['txtTownId'], 'id', 'name', 'cities');

                        }else{

                            // $utility->populateDropDown($cusDetail[0][27], 'id', 'city', 'cities');
                            $utility->populateDropDown2($cusDetail[0][27], 'id', 'name',  'state_id', $cusDetail[0][28], 'cities');

                        }
                }
                ?>
            </select>
            <div class="cl"></div>

        </div>


        <label>Postal Code</label>
        <input name="txtPostalCode" type="text" class="text_box_large" id="txtPostalCode"
            value="<?php echo $cusDetail[0][29];?>" size="30" onKeyPress="return intOnly(this, event)" />
        <div class="cl"></div>


        <label>Phone<span class="orangeLetter">*</span></label>
        <input name="txtPhone1" type="text" class="text_box_large" id="txtPhone1"
            value="<?php echo $cusDetail[0][31];?>" size="30" />
        <div class="cl"></div>

        <label>Fax</label>
        <input name="txtFax" type="text" class="text_box_large" id="txtFax" value="<?php echo $cusDetail[0][33];?>"
            size="30" />
        <div class="cl"></div>

        <label>Mobile</label>
        <input name="txtMobile" type="text" class="text_box_large" id="txtMobile"
            value="<?php echo $cusDetail[0][34];?>" size="30" />
        <div class="cl"></div>

        <label>Image</label>
        <input name="fileCusAddImage" type="file" class="text_box_large" id="fileCusAddImage" />
        <span class="orangeLetter">* ( 800 pixels &times; 800 pixels) </span>

        <?php 
            if( ($cusDetail[0][11] != '' ) && (file_exists("../images/users/".$cusDetail[0][11])) ){
                echo "<input name=\"delImg\" type=\"checkbox\" value=\"1\"> 
                <span class='blackLarge'>Delete this image</span>"; 
            }
            ?>
        <div class="cl"></div>

        <label>Featured</label>
        <div class="fl marR10">
            <input type="radio" class="radio" name="radioFeatured" id="radioFeatured" value="Y" title="yes"
                <?php echo $utility->checkString($cusDetail[0][13],'Y');?> />
            <label for="radioFeatured">Y</label>
        </div>


        <div class="fl marL10">
            <input type="radio" class="radio" name="radioFeatured" id="radioFeatured" value="N" title="no"
                <?php echo $utility->checkString($cusDetail[0][13],'N');?> />
            <label for="radioFeatured">N</label>
        </div>
        <br>
        <span class="orangeLetter">Required, if do not want to display all the client in front page</span>
        <div class="cl"></div>

        <h3>Newsletter</h3>

        <input name="checkNews" id="checkNews" type="checkbox" class="" value="yes"
            <?php echo $utility->checkSessStr('checkNews','yes','checked'); ?> />
        <span class="blackLarge">If Customer wants to receive News Letter</span>
        <div class="cl"></div>

        <input name="btnUpdateCustomer" type="submit" class="button-add" id="btnUpdateCustomer" value="edit" />
        <input name="btnCancel" type="button" class="button-cancel" id="btnCancel" onClick="self.close()"
            value="cancel" />

    </form>

    <?php 
	}//eof
	?>
</div>

<!-- Javascript Libraries -->
<script src="<?= URL ?>/js/openwysiwyg/wysiwyg.js" language="JavaScript" type="text/javascript"></script>
<script src="<?= URL ?>/js/js_calendar/dhtmlgoodies_calendar/dhtmlgoodies_calendar.js?random=20051112"
    type="text/javascript">
</script>
<script src="<?= URL ?>/js/openwysiwyg/scripts/wysiwyg-settings.js" language="JavaScript" type="text/javascript">
</script>
<script src="<?= URL ?>/js/openwysiwyg/scripts/wysiwyg.js" language="JavaScript" type="text/javascript"></script>
<script src="<?= URL ?>/js/ajax.js" type="text/javascript"></script>
<script src="<?= URL ?>/js/utility.js" type="text/javascript"></script>
<script src="<?= URL ?>/js/advertiser.js" type="text/javascript"></script>
<script src="<?= URL ?>/js/location.js" type="text/javascript"></script>
<script src="<?= URL ?>/js/checkEmpty.js" type="text/javascript"></script>
<script src="<?= URL ?>/js/email.js" type="text/javascript"></script>
<script src="<?= URL ?>/js/package.js" type="text/javascript"></script>
<!-- eof JS Libraries -->

<!-- TinyMCE -->
<script src="<?= URL ?>/js/tinymce/jscripts/tiny_mce/tiny_mce.js" type="text/javascript"></script>
<script type="text/javascript">
tinyMCE.init({
    // General options
    mode: "textareas",
    theme: "advanced",
    plugins: "autolink,lists,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave",

    // Theme options
    theme_advanced_buttons1: "image,fontsizeselect,forecolor,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,link,unlink,|,bullist,numlist,|,outdent,indent",
    theme_advanced_buttons2: "undo,redo,|,emotions,|,pasteword,code",
    theme_advanced_buttons3: "",
    theme_advanced_buttons4: "",

    theme_advanced_toolbar_location: "top",
    theme_advanced_toolbar_align: "left",
    theme_advanced_statusbar_location: "bottom",
    theme_advanced_resizing: true,

    // Example content CSS (should be your site CSS)
    content_css: "css/content.css",

    // Drop lists for link/image/media/template dialogs
    template_external_list_url: "lists/template_list.js",
    external_link_list_url: "lists/link_list.js",
    external_image_list_url: "lists/image_list.js",
    media_external_list_url: "lists/media_list.js",

    // Style formats
    style_formats: [{
            title: 'Bold text',
            inline: 'b'
        },
        {
            title: 'Red text',
            inline: 'span',
            styles: {
                color: '#ff0000'
            }
        },
        {
            title: 'Red header',
            block: 'h1',
            styles: {
                color: '#ff0000'
            }
        },
        {
            title: 'Example 1',
            inline: 'span',
            classes: 'example1'
        },
        {
            title: 'Example 2',
            inline: 'span',
            classes: 'example2'
        },
        {
            title: 'Table styles'
        },
        {
            title: 'Table row 1',
            selector: 'tr',
            classes: 'tablerow1'
        }
    ],

    formats: {
        alignleft: {
            selector: 'p,h1,h2,h3,h4,h5,h6,td,th,div,ul,ol,li,table,img',
            classes: 'left'
        },
        aligncenter: {
            selector: 'p,h1,h2,h3,h4,h5,h6,td,th,div,ul,ol,li,table,img',
            classes: 'center'
        },
        alignright: {
            selector: 'p,h1,h2,h3,h4,h5,h6,td,th,div,ul,ol,li,table,img',
            classes: 'right'
        },
        alignfull: {
            selector: 'p,h1,h2,h3,h4,h5,h6,td,th,div,ul,ol,li,table,img',
            classes: 'full'
        },
        bold: {
            inline: 'span',
            'classes': 'bold'
        },
        italic: {
            inline: 'span',
            'classes': 'italic'
        },
        underline: {
            inline: 'span',
            'classes': 'underline',
            exact: true
        },
        strikethrough: {
            inline: 'del'
        }
    },

    // Replace values for the template plugin
    template_replace_values: {
        username: "Some User",
        staffid: "991234"
    }
});
</script>
<!-- /TinyMCE -->