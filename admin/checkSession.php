<?php 
require_once "../includes/constant.inc.php";
if(!isset($_SESSION[ADM_SESS]))
{
	header("Location: index.php");
	exit;
}
?>