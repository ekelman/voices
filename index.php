<?php
/***********************************************************************************************************
	* Author Name	: Anil Nautiyal
	* Creation Date : 27th May-2011
	* FileName		: index.php	
	* Called From	: by default evertime and passes control to appropriate module controller.
	* Description	: by default it runs everytime and used to direct the flow depending on the stage and mode.
************************************************************************************************************/
header("Cache-Control: private, must-revalidate");    
header("Pragma: public");
session_start();

if(isset($_SESSION['admin_user']))
{
	session_destroy();
}
	

include_once("global.conf.php");                                             // load all the global paramaters

require_once($_CONF['ModulesPath']."system/classes/Model.php");                 // main model file that will be inherited by module model files 

require_once($_CONF['ModulesPath']."system/classes/View.php");					// main view file that will be inherited by module view files 

require_once($_CONF['ModulesPath']."system/classes/Controller.php");			// main controller file that will be inherited by module controller files 

require_once($_CONF['ModulesPath']."user/classes/user/UserController.php");
require_once($_CONF['ModulesPath']."user/classes/user/UserView.php");

$stage=(empty($_REQUEST['stage'])?'user':$_REQUEST['stage']);
$mode=(empty($_REQUEST['mode'])?'homePage':$_REQUEST['mode']);

if(!file_exists($_CONF['ModulesPath'].$stage."/classes/user/".ucfirst($stage)."Controller.php")){
	//if file does not exist check for static page
	$stage = 'user';
	$mode = 'homePage';
}

//include("cronjob.php");
require_once($_CONF['ModulesPath'].$stage."/classes/user/".ucfirst($stage)."Controller.php");
require_once($_CONF['ModulesPath'].$stage."/classes/user/".ucfirst($stage)."View.php");

$sController = ucfirst($stage)."Controller";
$obUser = new $sController();
$obUser->RunApplication();
?>