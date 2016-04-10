<?php
	ini_set('display_errors','on');
	error_reporting(E_COMPILE_ERROR|E_ERROR|E_CORE_ERROR|E_PARSE);

	require_once("nusoap.php");

	echo "<br /><br /><br /><b>Cicero AuthenticationService</b><br />";
	$wsdl	=	"http://cicero.azavea.com/Azavea.Cicero.WebService.v2/AuthenticationService.asmx?wsdl";

	echo "<br /><br /><b>GetVersion</b><br />";
	$client	=	new nusoap_client($wsdl, 'wsdl');
	$param	=	array('eventid'=>'2'); 
	$result	=	$client->call('GetVersion');		
	echo "GetVersionResult : " . $result['GetVersionResult'];
	
	
	echo "<br /><br /><b>GetToken</b><br />";
	$params	=	array('userName'=>'vsalluzzo@gmail.com','password'=>'Vs123@123'); 
	$token_result	=	$client->call('GetToken',$params);
	$token = $token_result['GetTokenResult'];	
	echo "Token : ".$token;
	
/*	
	echo "<br /><br /><b>ValidateToken</b><br />";
	$param_validate	=	array('authToken'=>$token); 	
	$token_result	=	$client->call('ValidateToken',$param_validate);
	if($token_result) {
		echo "valid token";
	} else {
		echo "Invalid token";
	}


	echo "<br /><br /><br /><br /><b>Cicero AccountInfoService</b><br />";	
	$wsdl_AccountInfoService	=	"http://cicero.azavea.com/Azavea.Cicero.WebService.v2/AccountInfoService.asmx?wsdl";
	
	$client_AccountInfoService	=	new nusoap_client($wsdl_AccountInfoService, 'wsdl');
	$param_validate	=	array('authToken'=>$token); 
	
	$token_result	=	$client_AccountInfoService->call('GetCreditsRemaining',$param_validate);
	echo "Credits remaining : ".$token_result['GetCreditsRemainingResult'];
*/

		
/*	
	echo "<br /><br /><br /><br /><b>Cicero GetDistrictsByAddress</b><br />";	

	$address 		= "332 Jefferson Road";
	$city 			= "Rochester";
	$state			= "New York";
	$postalCode		= "14623";
	$country		= "US";
	$districtType 	= "All";

	$wsdl_GeocodingService	=	"http://cicero.azavea.com/Azavea.Cicero.WebService.v2/GeocodingService.asmx?wsdl";	
	$client_GeocodingService	=	new nusoap_client($wsdl_GeocodingService, 'wsdl');
	
	$param_validate	=	array('authToken'=>$token,'address'=>$address,'city'=>$city,'state'=>$state,'postalCode'=>$postalCode,'country'=>$country,'districtType'=>$districtType); 

	$result_districts	=	$client_GeocodingService->call('GetDistrictsByAddress',$param_validate);
	
	echo "<pre>";
	print_r($result_districts);

	*/
	
	echo "<br /><br /><br /><br /><b>Cicero ElectedOfficialQueryService</b><br />";	
	echo "<br /><br /><b>GetOfficialsByAddress</b><br />";
	$wsdl_EOQueryService	=	"http://cicero.azavea.com/Azavea.Cicero.WebService.v2/ElectedOfficialQueryService.asmx?wsdl";	
	$client_EOQueryService	=	new nusoap_client($wsdl_EOQueryService, 'wsdl');
	
	/*
	GetOfficialsByAddress (string authToken, string address, string city, string state,
string postalCode, string country, string districtType, bool includeAtLarge) :
ElectedOfficialInfo[]
	*/

	$address 		= "332 Jefferson Road";
	$city 			= "Rochester";
	$state			= "New York";
	$postalCode		= "14623";
	$country		= "US";
	$districtType 	= "All";

	
	$param_validate	=	array('authToken'=>$token,'address'=>$address,'city'=>$city,'state'=>$state,'postalCode'=>$postalCode,'country'=>$country,'districtType'=>$districtType,'includeAtLarge'=>false); 
	
	$result_OfficialsByAddress	=	$client_EOQueryService->call('GetOfficialsByAddress',$param_validate);
	
	echo "<pre>";
	print_r($result_OfficialsByAddress);
	
	
	
	
	/*
	GetOfficialsByDistrictIDList (string authToken, string districtIDList, string city,
string state, string country, string districtType*, bool includeAtLarge) :
ElectedOfficialInfo[]

	$address 		= "332 Jefferson Road";
	$city 			= "Rochester";
	$state			= "NY";
	$country		= "US";
	$districtIDList	= 'NY';
	$districtType 	= "NATIONAL_UPPER";
	
	$param_validate	=	array('authToken'=>$token,'districtIDList'=>$districtIDList,'city'=>$city,'state'=>$state,'country'=>$country,'districtType'=>$districtType,'includeAtLarge'=>true); 
	
	$result_OfficialsByDistrictID	=	$client_EOQueryService->call('GetOfficialsByDistrictIDList',$param_validate);
	
	echo "<pre>";
	print_r($result_OfficialsByDistrictID);
	
   [3] => Array
		(
			[DistrictID] => 29
			[DistrictType] => NATIONAL_LOWER
			[DistrictSubType] => LOWER
			[City] => 
			[State] => NY
			[Country] => US
		)

	[4] => Array
		(
			[DistrictID] => NY
			[DistrictType] => NATIONAL_UPPER
			[DistrictSubType] => UPPER
			[City] => 
			[State] => NY
			[Country] => US
		)
	*/

	die("<br /><br /><br />=================<br /><br /><br />");
?>