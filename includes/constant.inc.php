<?php 

	date_default_timezone_set("Asia/Calcutta");   //India time (GMT+5:30)

	//URLS Details 
	$protocol = isset($_SERVER['HTTPS']) ? 'https://' : 'http://';

	define('LOCAL_DIR',			'/fastlinky'); // value of this constant should be removed when it is in server
	define('URL', 				$protocol.$_SERVER['HTTP_HOST'].LOCAL_DIR);
	// define('ROOT_DIR', 			dirname(dirname(__FILE__)));
	// define('ADM_DIR', 			dirname(dirname(__FILE__)).'/admin/');
	define('ROOT_DIR', 			$_SERVER['DOCUMENT_ROOT'].LOCAL_DIR);
	define('ADM_DIR', 			$_SERVER['DOCUMENT_ROOT'].LOCAL_DIR.'/admin/');

	define('PAGE',				$_SERVER['PHP_SELF']);
	define('ADM_URL',  			URL.'/admin/');
	define('SELLER_AREA',  		URL."/dashboard.php");
	define('BUYER_AREA',  		URL."/app.client.php");
	define('IMG_PATH',  		URL."/images");


	
	//company
	define('COMPANY_FULL_NAME', 				'Fast Linky');						//company full name
	define('COMPANY_S', 						'Fast Linky');						//company short name
	define('COMPANY_L', 						'LL');								//company short name
	
	
	define('SITE_ADMIN_NAME',  					"Fast Linky Admin");
	define('SITE_ADMIN_EMAIL', 					"admin@fastlinky.com");
	define('SITE_ADMIN_EMAIL_P', 				"=CnBV7Zu)YV}");
	
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
	define("LOGO_WITH_PATH",					URL."/images/logo/logo.png");				//location of the logo
	define("LOGO_WIDTH",						'180');										//width of the logo
	define("LOGO_HEIGHT",						'50');										//height of the logo

	define("FAVCON_PATH",						URL."/images/logo/favicon.png");			//location of the favcon
	define("LOGO_ALT",							COMPANY_FULL_NAME);							//alternate text for the logo
	
	define("FOOTER_LOGO",						URL.'/images/logo/footer-logo.png');		//location of the logo
	define("FL_WIDTH",							'180');										//width of the logo
	define("FL_HEIGHT",							'55');										//height of the logo 

	define("LOGO_ADMIN_PATH",					'images/admin/icon/admin-logo.png');		//location of the logo
	define("LOGO_ADMIN_WIDTH",					'200');										//width of the logo
	define("LOGO_ADMIN_HEIGHT",					'55');										//height of the logo 

	define("ADMIN_IMG_PATH",					URL.'/images/admin/user/');					//location of the logo

	
	define('CURRENCY',							'$');
	define('CURRENCY_CODE',						'USD');
	define('START_YEAR',						'2022');
	define('HOME',								'Home');
	define('END_YEAR',  						date('Y') + 2); 


	//session constant
	define('ADM_SESS',   						"ADMINLOGGEDIN"); 		//admin session var	
	define('USR_SESS',   						"USERLOGGEDIN"); 		//user session var	
	// define('STAFF_SESS',   						"EMPLOGGEDIN");					//user session var

	
	//display style constant
	define('NRSPAN',  							"<span class='blackLarge'>");					//normal span
	define('ERSPAN',  							"<span class='orangeLetter'>");					//error span start
	define('SUSPAN',  							"<span class='greenLetter'>");					//success span start
	define('ENDSPAN', 							"</span>");										//end of span
	define('ER', 								'Error: ');
	define('SU', 								'Success !!! ');


	// Social Media Handles
	define("FB_LINK", 							"https://www.facebook.com/leelijaweb/");
	define("INSTA_LINK", 						"#");
	define("TWITTER_LINK", 						"https://twitter.com/lee_lija");
	define("PINTEREST_LINK", 					"https://in.pinterest.com/leelijaa/");
	define("LINKDIN_LINK", 						"https://www.linkedin.com/in/leelija/");
?>