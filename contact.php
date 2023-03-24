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
$utility		= new Utility();
$uMesg 			= new MesgUtility();
$uImg 			= new ImageUtility();
$uNum 			= new NumUtility();
######################################################################################################################
$typeM		= $utility->returnGetVar('typeM','');
//user id
$cusId		= $utility->returnSess('userid', 0);


?>
<?php
if(isset($_POST['emailSubmit']))
{
	//post vars
	$txtEmail 				= $_POST['txtEmail'];
	$_SESSION['txtEmail']	= $txtEmail;
	//echo $txtEmail; exit;
}


?>
<!DOCTYPE HTML>
<html lang="en">

<head>

    <title><?php echo COMPANY_S; ?> Global Support - Contact Us </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"
        content="LeeLija staff always available for your support. Our technical and SEO staffs always online, Leelija team provided free support for every one." />
    <meta charset="utf-8">
    <meta name="keywords"
        content="contact for SEO, contact for web development, support for on page SEO, support for technical SEO, contact for guest post" />
        <link href="css/contact-us.css" rel='stylesheet' type='text/css' />
        <link rel="icon" href="<?php echo FAVCON_PATH; ?>" type="image/png" >
	<!-- Bootstrap Core CSS -->
	<!-- <link href="css/bootstrap.css" rel='stylesheet' type='text/css' /> -->
	<link rel="stylesheet" href="plugins/bootstrap-5.2.0/css/bootstrap.css">
	<link rel="stylesheet" href="plugins/fontawesome-6.1.1/css/all.css">
	<!-- Custom CSS -->
	<link rel="stylesheet" href="css/leelija.css">

	<!-- <link href="css/style.css" rel='stylesheet' type='text/css' /> -->
	<link href="css/form.css" rel='stylesheet' type='text/css' />
	<link href="css/custom.css" rel='stylesheet' type='text/css' />
	<!-- font-awesome icons -->
	<!-- <link href="css/fontawesome-all.min.css" rel="stylesheet"> -->
	<!-- //Custom Theme files -->
	<!--webfonts-->
	<link href="//fonts.googleapis.com/css?family=Ubuntu:300,300i,400,400i,500,500i,700,700i" rel="stylesheet">

	<link href="//fonts.googleapis.com/css?family=Montserrat:400,500,600,700,900" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Nunito+Sans:400,700,900" rel="stylesheet">
</head>
<style>
body #home {
    padding-top: 1rem !important;
}
</style>

<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">
    <div id="home">
        <!-- header -->
        <?php require_once "partials/navbar.php"; ?>
        <!-- //header -->

        <!-- contact -->
        <?php require_once "contact-section.php"; ?>
        <!-- //contact -->

        <!-- Footer -->
        <?php require_once "partials/footer.php"; ?>

        <!-- /Footer -->
    </div>

    <script src="plugins/jquery-3.6.0.min.js"></script>
    <script src="plugins/bootstrap-5.2.0/js/bootstrap.js"></script>
    <script src="plugins/bootstrap-5.2.0/js/bootstrap.bundle.min.js"></script>
    <script src="plugins/php-email-form/validate.js"></script>
<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
(function () {
  'use strict'

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  var forms = document.querySelectorAll('.needs-validation')

  // Loop over them and prevent submission
  Array.prototype.slice.call(forms)
    .forEach(function (form) {
      form.addEventListener('submit', function (event) {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }

        form.classList.add('was-validated')
      }, false)
    })
})()
</script>
</body>

</html>