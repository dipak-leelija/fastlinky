<?php 

	date_default_timezone_set("Asia/Calcutta");   //India time (GMT+5:30)

	//URLS Details 
	$protocol = isset($_SERVER['HTTPS']) ? 'https' : 'http';

	define('URL', 				'http://'.$_SERVER['HTTP_HOST'].'/fastlinky');	 
	define('PAGE',				$_SERVER['PHP_SELF']);
	define('ADM_PATH',  		URL.'/admin/');
	define('SELLER_AREA',  		URL."/dashboard.php");
	define('BUYER_AREA',  		URL."/app.client.php");

	
	//company
	define('COMPANY_FULL_NAME', 'Fast Linky');						//company full name
	define('COMPANY_S', 		'Fast Linky');										//company short name
	define('COMPANY_L', 		'LL');											//company short name
	
	
	
	define('SITE_BILLING_NAME',  				"Fast Linky");
	define('SITE_EMAIL', 						"outreach@fastlinky.com");
	define('SITE_EMAIL_P', 						"Y(-,k1oITcE-");
	
	define('SITE_BILLING_EMAIL', 				"billing@fastlinky.com");
	define('SUPPORT_EMAIL', 					"billing@fastlinky.com");
	
	define('MARKETING_MAIL', 					"billing@fastlinky.com");
	define('MARKETING_MAIL_P', 					"Fast#/billing/#Linky@2022");
	
	define('SITE_CONTACT_NO',  					"+91 874224523");
	define('SITE_BILLING_CONTACT_NO',  			"+91 874224523");


	
	//define company logo
	define("LOGO_WITH_PATH",	URL."/images/logo/logo.png");					//location of the logo
	define("LOGO_WIDTH",		'180');											//width of the logo
	define("LOGO_HEIGHT",		'50');											//height of the logo

	define("FAVCON_PATH",		URL."/images/logo/favicon.png");				//location of the favcon
	define("LOGO_ALT",			COMPANY_FULL_NAME);								//alternate text for the logo
	
	define("FOOTER_LOGO",		URL.'/images/logo/footer-logo.png');			//location of the logo
	define("FL_WIDTH",			'180');											//width of the logo
	define("FL_HEIGHT",			'55');											//height of the logo 

	define("LOGO_ADMIN_PATH",	'images/admin/icon/admin-logo.png');			//location of the logo
	define("LOGO_ADMIN_WIDTH",	'200');											//width of the logo
	define("LOGO_ADMIN_HEIGHT",	'55');											//height of the logo 

	define("ADMIN_IMG_PATH",	URL.'/images/admin/user/');			//location of the logo

	
	define('CURRENCY',			'$');
	define('START_YEAR',		'2022');
	define('END_YEAR',  		date('Y') + 2); 
	define('HOME',				'Home');


	//session constant
	define('ADM_SESS',   		"continuecontent_SESSION_2016ADM_SESS"); 		//admin session var	
	define('USR_SESS',   		"USERcontinuecontent_ecom_SESS2016"); 			//user session var	
	define('STAFF_SESS',   		"SESS_continuecontentMar2016");					//user session var

	
	//display style constant
	define('NRSPAN',  			"<span class='blackLarge'>");					//normal span
	define('ERSPAN',  			"<span class='orangeLetter'>");					//error span start
	define('SUSPAN',  			"<span class='greenLetter'>");					//success span start
	define('ENDSPAN', 			"</span>");										//end of span
	define('ER', 				'Error: ');
	define('SU', 				'Success !!! ');


	// Social Media Handles
	define("FB_LINK", 			"https://www.facebook.com/leelijaweb/");
	define("INSTA_LINK", 		"#");
	define("TWITTER_LINK", 		"https://twitter.com/lee_lija");
	define("PINTEREST_LINK", 	"https://in.pinterest.com/leelijaa/");
	define("LINKDIN_LINK", 		"https://www.linkedin.com/in/leelija/");
?>