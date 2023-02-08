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

$id = $_REQUEST['txtCountriesId'];

?>

<label>State</label>
<select name="txtProvinceId" id="txtProvinceId" class="text_box_large" onchange="getCityByState(this.value)">
    <option value="0" selected disabled>-- Select One --</option>
    <option value="0"> Others </option>
    <?php 
    if(isset($_SESSION['txtProvinceId']) && ((int)$_SESSION['txtProvinceId'] > 0)){
        
        $utility->populateDropDown2($_SESSION['txtProvinceId'], 'state_id', 'state_name', 'country_id', $cusDetail[0][30], 'states');
    
    }else{
        
        $utility->populateDropDown2($cusDetail[0][28], 'state_id', 'state_name', 'country_id', $cusDetail[0][30], 'states');
                            }
    ?>
</select>
<div class="cl"></div>