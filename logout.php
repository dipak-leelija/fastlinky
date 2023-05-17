<?php 
require_once 'includes/constant.inc.php';
session_start();

header("Cache-control: private");

session_destroy(); 
header("Location: ".URL);
?>