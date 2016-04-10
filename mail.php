<?php
	echo date("Y-m-d H:i:s");

	include("global.conf.php");	
	require_once($_CONF['ModulesPath'].'system/functions.php');											    
	require_once($_CONF['ModulesPath'].'system/classes/Model.php');	
	require_once($_CONF['ModulesPath'].'subscriber/classes/SubscriberModel.php');

	global $_CONF;
	
	## get mail content from db
	//	mail($temp_email,'normal','body');			
	
	$temp_email  = 'paras.shah@netsmartz.net';	
	//  print_R(" >> Mail sent to " .$temp_email);
	
	$text		= 'smtp d fgbdf gdfgdgdg body';
	$subject	= 'smtp subject asd asd asd adsa sada dasda dads';
	

	$result2	= SendMail($text,$subject,array($temp_email), $_CONF['adminEmail'],1);
	
	print_R("result >>".$result2);
	echo "<br />============DONE============<br />";
?>