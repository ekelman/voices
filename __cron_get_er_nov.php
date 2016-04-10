<?php

	set_time_limit(0);
	require_once("global.conf.php");

	global $_CONF;	
	require_once($_CONF['SitePath']."webservices/nusoap.php");
	
	require_once($_CONF['ModulesPath'].'system/functions.php');							    
	require_once($_CONF['ModulesPath'].'system/classes/Model.php');
		
	//contains some common data classes 
	require_once($_CONF['ModulesPath'].'system/classes/dataclasses.php');								    
	
	//ini_set('display_errors','on');
	//error_reporting(E_COMPILE_ERROR|E_ERROR|E_CORE_ERROR|E_PARSE);

	$oModel = new Model();
	
	$wsdl	=	"http://cicero.azavea.com/Azavea.Cicero.WebService.v2/AuthenticationService.asmx?wsdl";
	$client	=	new nusoap_client($wsdl, 'wsdl');

	$wsdl_EOQueryService	=	"http://cicero.azavea.com/Azavea.Cicero.WebService.v2/ElectedOfficialQueryService.asmx?wsdl";	
	$client_EOQueryService	=	new nusoap_client($wsdl_EOQueryService, 'wsdl');
	
	$cicero_username = $_CONF['cicero_username'];
	$cicero_password = $_CONF['cicero_password'];

	$params	=	array('userName'=>$cicero_username,'password'=>$cicero_password); 
	
	$token_result	=	$client->call('GetToken',$params);
	$token = $token_result['GetTokenResult'];	
	
	$sSQL= "select subscriber_id, mail_street_address, mail_city, mail_state, mail_zip_code 
	from tbl_subscriber where subscriber_id='114'";
	
	//echo $sSQL;
	$rs = $oModel->Execute($sSQL);
	
	while($row = $rs->FetchRow())
	{
		
		$userData = array();
		
		$subscriber_id	= $row['subscriber_id'];
		$address		= "asdsadas";//$row['mail_street_address'];
		$city			= $row['mail_city'];
		$state			= $row['mail_state'];
		$postalCode		= $row['mail_zip_code'];

		$country		= "US";
		$districtType 	= "All";
		$includeAtLarge = false;
				
		
		$param_validate	=	array('authToken'=>$token,'address'=>$address,'city'=>$city,'state'=>$state,'postalCode'=>$postalCode,'country'=>$country,'districtType'=>$districtType,'includeAtLarge'=>$includeAtLarge); 
		
		$result_OfficialsByAddress	=	$client_EOQueryService->call('GetOfficialsByAddress',$param_validate);
		
		$officials = $result_OfficialsByAddress['GetOfficialsByAddressResult']['ElectedOfficialInfo'];
		
		echo "<br>++++++++++++++++++++<br>";
		echo count($officials);
		echo "<br>++++++++++++++++++++<br>";
		echo "<pre>";
		print_r($officials);					
	}						
	echo "<br />DONE SUCESSFULLY <br />";	
?>