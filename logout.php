<?php 
session_start();
require_once 'includes/constant.inc.php';

header("Cache-control: private");

session_destroy(); 
header("Location: ".URL);
?>