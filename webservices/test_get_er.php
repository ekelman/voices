<?php

	require_once("../global.conf.php");
	require_once("nusoap.php");
	
	global $_CONF;
	require_once($_CONF['ModulesPath'].'system/functions.php');							    
	require_once($_CONF['ModulesPath'].'system/classes/Model.php');	
	require_once($_CONF['ModulesPath'].'subscriber/classes/SubscriberModel.php');	
	
	
	ini_set('display_errors','on');
	error_reporting(E_COMPILE_ERROR|E_ERROR|E_CORE_ERROR|E_PARSE);

	
	class Cron {
		var $emp_id;
		var $email;
	};

	$oModel = new SubscriberModel();
	
	$id =  93;
	$oModel->saveElectedOfficials($id);
?>