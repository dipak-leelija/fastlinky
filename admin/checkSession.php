<?php
if(!isset($_SESSION[ADM_SESS]))
{
	header("Location: index.php");
	exit;
}
?>