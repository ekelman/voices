<?php
/*
 * config.inc.php
 *
 * PHP Toolkit for PayPal v0.50
 * http://www.paypal.com/pdn
 *
 * Copyright (c) 2004 PayPal Inc
 *
 * Released under Common Public License 1.0
 * http://opensource.org/licenses/cpl.php
 *
*/

//Configuration Settings
//$paypal[business]="steve.netsmartz@gmail.com";
$paypal[business]="paypalpayments@angleback.com";

//$paypal[site_url]="http://singleslots.sebiz.net/";
//$paypal[site_url]="http://203.200.97.185:8707/";
$paypal[site_url]	=	$_CONF['SiteUrl'];

$paypal[image_url]="";
$paypal[success_url]="index.php?stage=subscription&mode=OnPaymentSuccess";

//$paypal[success_url]="php_paypal/success.php";
//$paypal[success_url]="php_paypal/ipn/ipn.php";
$paypal[cancel_url]="php_paypal/error.php";
$paypal[notify_url]="php_paypal/ipn/ipn.php";
$paypal[return_method]="2"; //1=GET 2=POST
//$paypal[currency_code]="USD"; //[USD,GBP,JPY,CAD,EUR]
$paypal[currency_code]="CAD"; //[USD,GBP,JPY,CAD,EUR]
$paypal[lc]="US";

//$paypal[url]="http://www.paypal.com/cgi-bin/webscr";
$paypal[url]="https://www.paypal.com/cgi-bin/webscr";
//$paypal[url]="https://www.sandbox.paypal.com/cgi-bin/webscr";
$paypal[post_method]="fso"; //fso=fsockopen(); curl=curl command line libCurl=php compiled with libCurl support
$paypal[curl_location]="/usr/local/bin/curl";

$paypal[bn]="toolkit-php";
$paypal[cmd]="_xclick";

//Payment Page Settings
$paypal[display_comment]="0"; //0=yes 1=no
$paypal[comment_header]="Comments";
$paypal[continue_button_text]="Continue >>";
$paypal[background_color]=""; //""=white 1=black
$paypal[display_shipping_address]=""; //""=yes 1=no
$paypal[display_comment]="1"; //""=yes 1=no

/*
//Subscription Settings
$paypal[memberid_fk]="$_POST[memberid_fk]";
$paypal[subscription_plan_id]="$_POST[subscription_plan_id]";
$paypal[payment_details]="$_POST[payment_details]";
$paypal[a3]=20;
$paypal[p3]=3;
$paypal[t3]="M";


//Shipping and Taxes
$paypal[shipping_amount]="$_POST[shipping_amount]";
$paypal[shipping_amount_per_item]="";
$paypal[handling_amount]="";
$paypal[custom_field]="";
*/

//Customer Settings
$paypal[firstname]=$_POST['First_Name'];
$paypal[lastname]="$_POST[lastname]";
$paypal[address1]="$_POST[address1]";
$paypal[address2]="$_POST[address2]";
$paypal[city]="$_POST[city]";
$paypal[state]="$_POST[state]";
$paypal[zip]="$_POST[zip]";
$paypal[email]="$_POST[email]";
$paypal[phone_1]="$_POST[phone1]";
$paypal[phone_2]="$_POST[phone2]";
$paypal[phone_3]="$_POST[phone3]";
?>