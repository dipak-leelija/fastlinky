<?php
session_start();
// var_dump($_SESSION);
//include_once('checkSession.php');
require_once "../_config/dbconnect.php";
require_once "../_config/dbconnect.trait.php";

require_once "../classes/customer.class.php";
require_once "../classes/utility.class.php";


/* INSTANTIATING CLASSES */

$customer		= new Customer();

$utility		= new Utility();

######################################################################################################################
$typeM		= $utility->returnGetVar('typeM','');
$cus_id		= $utility->returnGetVar('cus_id','');

$cusDetail = $customer->getCustomerData($cus_id);

$stateId = $_REQUEST['stateId'];

?>

<label>City</label>
<select name="txtProvinceId" id="txtProvinceId" class="text_box_large">
    <option value="0" selected disabled>-- Select One --</option>
    <option value="0"> Others </option>
    <?php 
    if(isset($_SESSION['txtTownId']) && ((int)$_SESSION['txtTownId'] > 0)){
        
        $utility->populateDropDown2($_SESSION['txtTownId'], 'id', 'city', 'state_id', $stateId, 'cities');
    
    }else{
        
        $utility->populateDropDown2($cusDetail[0][27], 'id', 'city', 'state_id', $stateId, 'cities');
    }
    ?>
</select>
<div class="cl"></div>