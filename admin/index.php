<?php
	/*
	*********************************************************************************************
		* Author Name			: Anil Nautiyal
		* Creation Date 		: 27th May-2011
		* FileName 				: index.php
		* Description 			: This is admin root file
		* Components Used		: none
		* Tables Accessed 		: none
		* Program Specs 		:
		* UTP doc 				:
		* Tested By 			:
	*********************************************************************************************
	*/
	session_start();
	
	$_CONF['ADMIN_PAGE'] = 1;
	include_once("../global.conf.php");
	require_once($_CONF['ModulesPath']."admin/classes/AdminController.php");
	require_once($_CONF['ModulesPath']."admin/classes/AdminView.php");
	require_once($_CONF['ModulesPath']."system/classes/Model.php");
	
	$stage=(empty($_REQUEST['stage'])?'admin':$_REQUEST['stage']);
	$mode=(empty($_REQUEST['mode'])?'m_default':$_REQUEST['mode']);
	
	if(!file_exists($_CONF['ModulesPath'].$stage."/classes/".ucfirst($stage)."Controller.php")){
		$stage = 'admin';
		$mode = 'm_default';
	}
	
	require_once($_CONF['ModulesPath'].$stage."/classes/".ucfirst($stage)."Controller.php");
	require_once($_CONF['ModulesPath'].$stage."/classes/".ucfirst($stage)."View.php");

	$sController = ucfirst($stage)."Controller";
	$obAdmin = new $sController();
	$obAdmin->RunApplication();
?>