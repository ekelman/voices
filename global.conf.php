<?php
/****************************************************************************************************
* Author Name	: Anil Nautiyal
* Creation Date : 27th May-2011
* FileName		: global.conf.php
* Called From	: index.php and admin/index.php
* Description	: global.conf.php file provides the configuration settings for the web application and these variables are used throught out the site to refer banners, images, sitelinks, to include files and database settings. It also contains the different email address to be used in admin.
* Components Used : NA
* Tables Accessed : NA : only database settings for host
* Program Specs :
* UTP doc :
* Tested By :
******************************************************************************************************/

//hides/echo extra notices and warnings. set value on for error debugging
ini_set('display_errors','off');
//ini_set('display_errors','on');
error_reporting(E_COMPILE_ERROR|E_ERROR|E_CORE_ERROR|E_PARSE);

//server Name
define('BASE_URL', $_SERVER['HTTP_HOST']);

//Provides physical path of web directory where project files are
define('CODE_BASE', dirname(__FILE__));

//debug = true opens the smarty debug window and displays smarty variable details
define('DEBUG', false);

//define('DB_HOST', '74.208.133.254');
define('DB_HOST', 'localhost');
//define('DB_HOST', 'voices4change.db.10166029.hostedresource.com');
//define('DB_HOST', 'voices4change.db.10166029.hostedresource.com');

define('DB_USER', 'voices4change');
//define('DB_PASS', 'Brooklyn@2014');
//define('DB_NAME', 'voices4change');
define('DB_PASS', 'voices4change');
define('DB_NAME', 'mibersh_voices4change');

define('DB_TYPE', 'mysql');

/*
	define('DB_HOST', '50.63.54.249');
	define('DB_USER', 'voices2');
	define('DB_PASS', 'Vs123@321#');
	define('DB_NAME', 'voices4change');
	define('DB_TYPE', 'mysql');
*/
/*
define('DB_HOST', '50.63.54.249');
define('DB_USER', 'voices4change');
define('DB_PASS', 'voices4change');
define('DB_NAME', 'voices2_voices4change');
define('DB_TYPE', 'mysql');
*/

define('CHR_CURRENCY', chr(36)); //36 - dollar($), 156 - pound(£), 157 Yen(¥)
define('LOGO_WIDTH_SUPPLIER', '103'); //physical path of the Document
define('LOGO_HEIGHT_SUPPLIER','68'); //physical path of the Document

//site name used to display in title bar and Admin Panel block
$_CONF['SiteName'] = 'Voices For Change';

//URL (Virtual Path)of the site
$_CONF['SiteUrl'] = 'http://'.$_SERVER['HTTP_HOST'];

//Secured URL (Virtual Path)of the site
$_CONF['SSLSiteUrl'] = 'https://'.$_SERVER['HTTP_HOST'].'/';

//URL for images
$_CONF['ImageUrl'] = $_CONF['SiteUrl'] . '/images/';

//admin URL to display the admin links
$_CONF['AdminURL'] = $_CONF['SiteUrl'] . '/admin/';

//used to include the files
$_CONF['SitePath'] = CODE_BASE .'/';

//etc path
$_CONF['ConfPath'] = CODE_BASE.'/etc/';


// paths used to include the module files (model,constants and	controller files)
$_CONF['ModulesPath'] = CODE_BASE.'/modules/';

/*
LIB folder includes all the extra components that helps in the proper functioning of the site but does not play any role on client end. ADODB,Mails,Paypal class
*/

// Path to include the components of lib (ADODB, MAILclass,paypal class)
$_CONF['LibPath'] = CODE_BASE.'/lib/';

/*
VAR folder includes all the extra components that helps in the proper functioning of the site but does not play any role on client end. ADODB,Mails,Paypal class
*/
$_CONF['VarPath'] = CODE_BASE.'/var/';


$_CONF['LogoPath'] = $_CONF['SitePath'] . 'var/logo/'; //physical path of the Document


$_CONF['ImagePath'] = $_CONF['SitePath'] . 'images/'; //imagepath of the images for the site


// size used for paging of database records.
$_CONF['PageSize'] = 10;

//this converstion will be performed for date field data that is fetched through the database.
//date format to be used for database values retrieval
$_CONF['DateFormat'] = "Y-m-d h:m:s";

$_CONF['UploadDir']			=	CODE_BASE."/UserFiles/Image/";
$_CONF['UploadVideo']		=	CODE_BASE."/UserFiles/Video/";

$_CONF['UploadLogo']		= 	CODE_BASE."/UserFiles/affiliates_logo/";
$_CONF['profile_image']		= 	CODE_BASE."/UserFiles/er_pics/";
$_CONF['profile_image_front_end']	= 	$_CONF['SiteUrl']."/UserFiles/er_pics/thumb/";

$_CONF['UploadDoc']				= 	CODE_BASE."/UserFiles/affiliates_doc/";
$_CONF['PetitionFiles']			=	CODE_BASE."/UserFiles/petition_files/";

$_CONF['RandomStringLength']	=	10;
$_CONF['MAXVIDEOSIZE']			=	'5242880';

$_CONF['adminEmail'] 			=   "support@ourvoicesforchange.com";
$_CONF['vinceEmail'] 			=   "support@ourvoicesforchange.com";




		define('SMTP_PORT', 25);	
		define('SMTP_TIMEOUT', 30);	
		define('SMTP_HOST', 'mail.netsmartz.net');	
		define('SMTP_USERNAME', 'php@netsmartz.net');
		define('SMTP_PASSWORD', '1q2w3e4r5t6y');	
/*		
		
			define('SMTP_PORT', 25);	
			// define('SMTP_TIMEOUT', 30);	
			define('SMTP_HOST', 'p3smtpout.secureserver.net');	
			define('SMTP_USERNAME', 'support@ourvoicesforchange.com');
			define('SMTP_PASSWORD', 'password');	
	*/	
		


$_CONF['cicero_username'] 			=   "vsalluzzo@gmail.com";
$_CONF['cicero_password'] 			=   "Vs123@321";

//Paypal configuration for observer

//$_CONF['payment_url'] 			=  "https://www.sandbox.paypal.com/cgi-bin/webscr";
//$_CONF['business'] 				=  "mukesh_1268302053_biz@sebiz.net";
//$_CONF['business_subscribe'] 	=  "mukesh_1268302053_biz@sebiz.net";



$_CONF['payment_url'] 		=  "https://www.paypal.com/cgi-bin/webscr";
$_CONF['business'] 		=  "accounting@ourvoicesforchange.com";
$_CONF['business_subscribe'] 	=  "Vince@VoicesForChange.US";





$_CONF['currency_code'] 	=   "USD";
$_CONF['return'] 		=   $_CONF['SiteUrl']."/index.php?stage=subscriber&mode=paymentSuccess";
$_CONF['cancel_return'] 	=   $_CONF['SiteUrl']."/index.php?stage=subscriber&mode=paymentCancel";
$_CONF['notify_url'] 		=   $_CONF['SiteUrl']."/index.php?stage=subscriber&mode=paymentipn";
$_CONF['item_name'] 		=   "membersubscription";
$_CONF['amount'] 			=   100.00;


$_CONF['MandatoryMessage'] = "Mandatory Fields"; // displaying mandatory messages

//$link = mysql_connect(DB_HOST, DB_USER, DB_PASS);
//if (!$link) {
//    die('Could not connect: ' . mysql_error());
//} 

//$rv = mysql_select_db(DB_NAME, $link);
//if(!$rv){
//	die('Could not open: ' . mysql_error());
//}

?>