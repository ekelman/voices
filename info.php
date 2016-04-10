<?php
phpinfo();
ini_set("max_execution_time",200);

	include("global.conf.php");	
	require_once($_CONF['ModulesPath'].'system/functions.php');											    
	require_once($_CONF['ModulesPath'].'system/classes/Model.php');	
	require_once($_CONF['ModulesPath'].'subscriber/classes/SubscriberModel.php');

	global $_CONF;
	
	## get mail content from db
	//	mail($temp_email,'normal','body');			
	
	$temp_email  = 'paras.shah@netsmartz.net';	
	// print_R(" >> Mail sent to " .$temp_email);
	
	$text		= 'smtp body';
	$subject	= 'smtp subject';
	
	$result2	= SendMail($text,$subject,array($temp_email), $_CONF['adminEmail'],1);
	
	echo "<br />============DONE============<br />";
?>