<?php

/**	
	Cicero Soap Client for retriving Elected representative records based on member address	

*/
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
	from tbl_subscriber where is_address_changed='yes'";
	
	//echo $sSQL;
	$rs = $oModel->Execute($sSQL);
	
	while($row = $rs->FetchRow())
	{
		
		$userData = array();
		
		$subscriber_id	= $row['subscriber_id'];
		$address		= $row['mail_street_address'];
		$city			= $row['mail_city'];
		$state			= $row['mail_state'];
		$postalCode		= $row['mail_zip_code'];

		$country		= "US";
		$districtType 	= "All";
		$includeAtLarge = false;

		//Update changed address
		$query_update  = "update tbl_subscriber 
		set is_address_changed='no' 
		where subscriber_id='".$subscriber_id."'";
				
		$oModel->Execute($query_update);	 				
		
		//detele old data from tbl_subscriber_elected_officer is already presented
		$query_delete  = "delete from tbl_subscriber_elected_officer 
		where subscriber_id='".$subscriber_id."'";
				
		$oModel->Execute($query_delete);	 				
				
		
		$param_validate	=	array('authToken'=>$token,'address'=>$address,'city'=>$city,'state'=>$state,'postalCode'=>$postalCode,'country'=>$country,'districtType'=>$districtType,'includeAtLarge'=>$includeAtLarge); 
		
		$result_OfficialsByAddress	=	$client_EOQueryService->call('GetOfficialsByAddress',$param_validate);
		
		$officials = $result_OfficialsByAddress['GetOfficialsByAddressResult']['ElectedOfficialInfo'];
		
		//echo "<pre>";
		//print_r($officials);					
						
		$er_officer = array();
		$i = 0;
		
		foreach($officials as $officer) {
		
			if(isset($officer['FirstName'])) {

				$er_officer[$i]['ElectedOfficialID'] = $officer['ElectedOfficialID'];
			} else {
				continue;
			}
			
			if(isset($officer['FirstName'])) {

				$er_officer[$i]['FirstName'] = $officer['FirstName'];
			} else {
			
				$er_officer[$i]['FirstName'] = "";
			}
			
			if(isset($officer['MiddleInitial'])) {
			
				$er_officer[$i]['MiddleInitial'] = $officer['MiddleInitial'];				
			} else {
			
				$er_officer[$i]['MiddleInitial'] = "";				
			}
			
			if(isset($officer['LastName'])) {
			
				$er_officer[$i]['LastName'] = $officer['LastName'];
			} else {
			
				$er_officer[$i]['LastName'] = "";
			}
			
			if(isset($officer['Title'])) {
			
				$er_officer[$i]['Title'] = $officer['Title'];
			} else {
			
				$er_officer[$i]['Title'] = "";
			}
			
			if(isset($officer['Party'])) {
			
				$er_officer[$i]['Party'] = $officer['Party'];
			} else {
			
				$er_officer[$i]['Party'] = "";
			}
			
			if(isset($officer['Description'])) {
			
				$er_officer[$i]['Description'] = $officer['Description'];
			} else {
			
				$er_officer[$i]['Description'] = "";
			}
			
			if(isset($officer['LastUpdateDate'])) {
			
				$er_officer[$i]['LastUpdateDate'] = $officer['LastUpdateDate'];
			} else {
			
				$er_officer[$i]['LastUpdateDate'] = "";
			}

			if(isset($officer['TermStartDate'])) {
			
				$er_officer[$i]['TermStartDate'] = $officer['TermStartDate'];
			} else {
			
				$er_officer[$i]['TermStartDate'] = "";
			}
			
			if(isset($officer['TermEndDate'])) {
			
				$er_officer[$i]['TermEndDate'] = $officer['TermEndDate'];
			} else {
			
				$er_officer[$i]['TermEndDate'] = "";
			}
			
			if(isset($officer['PrimaryAddress1'])) {
			
				$er_officer[$i]['PrimaryAddress1'] = $officer['PrimaryAddress1'];
			} else {
			
				$er_officer[$i]['PrimaryAddress1'] = "";
			}
			
			if(isset($officer['PrimaryAddress2'])) {
			
				$er_officer[$i]['PrimaryAddress2'] = $officer['PrimaryAddress2'];
			} else {
			
				$er_officer[$i]['PrimaryAddress2'] = "";
			}
			
			if(isset($officer['PrimaryAddress3'])) {
			
				$er_officer[$i]['PrimaryAddress3'] = $officer['PrimaryAddress3'];
			} else {
			
				$er_officer[$i]['PrimaryAddress3'] = "";
			}
			
			if(isset($officer['PrimaryCity'])) {
			
				$er_officer[$i]['PrimaryCity'] = $officer['PrimaryCity'];
			} else {
			
				$er_officer[$i]['PrimaryCity'] = "";
			}
			
			if(isset($officer['PrimaryState'])) {
			
				$er_officer[$i]['PrimaryState'] = $officer['PrimaryState'];
			} else {
			
				$er_officer[$i]['PrimaryState'] = "";
			}
			
			if(isset($officer['PrimaryPostalCode'])) {
			
				$er_officer[$i]['PrimaryPostalCode'] = $officer['PrimaryPostalCode'];
			} else {
			
				$er_officer[$i]['PrimaryPostalCode'] = "";
			}
			
			if(isset($officer['EMail1'])) {
			
				$er_officer[$i]['EMail1'] = $officer['EMail1'];
			} else {
			
				$er_officer[$i]['EMail1'] = "";
			}
						
			if(isset($officer['EMail2'])) {
			
				$er_officer[$i]['EMail2'] = $officer['EMail2'];
			} else {
			
				$er_officer[$i]['EMail2'] = "";
			}

			if(isset($officer['Url1'])) {
			
				$er_officer[$i]['Url1'] = $officer['Url1'];
			} else {
			
				$er_officer[$i]['Url1'] = "";
			}			
			
			if(isset($officer['Url2'])) {
			
				$er_officer[$i]['Url2'] = $officer['Url2'];
			} else {
			
				$er_officer[$i]['Url2'] = "";
			}			

			if(isset($officer['PrimaryPhone1'])) {
			
				$er_officer[$i]['PrimaryPhone1'] = $officer['PrimaryPhone1'];
			} else {
			
				$er_officer[$i]['PrimaryPhone1'] = "";
			}			
			
			if(isset($officer['PrimaryFax1'])) {
			
				$er_officer[$i]['PrimaryFax1'] = $officer['PrimaryFax1'];
			} else {
			
				$er_officer[$i]['PrimaryFax1'] = "";
			}			
			
			$i++;
		}

		if(count($er_officer) > 0) {
		
			foreach($er_officer as $officer) {
							
				//echo "<pre>";
				//print_r($officer);					
					
				$query_ed_sel 	= "select ElectedOfficialID from tbl_elected_officials 
				where ElectedOfficialID = '".$officer['ElectedOfficialID']."'";
				
				$rs_ed_sel		=	$oModel->Execute($query_ed_sel);
				if($row_ed_sel = $rs_ed_sel->FetchRow())
				{					
				
					$query_update = "update tbl_elected_officials set 						
					First_Name='".$officer['FirstName']."'
					,Middle_Name='".$officer['MiddleInitial']."'
					,Last_Name='".$officer['LastName']."'
					,Title='".$officer['Title']."'
					,PrimaryAddress1='".$officer['PrimaryAddress1']."'
					,PrimaryAddress2='".$officer['PrimaryAddress2']."'
					,PrimaryAddress3='".$officer['PrimaryAddress3']."'
					,PrimaryCity='".$officer['PrimaryCity']."'
					,PrimaryState='".$officer['PrimaryState']."'
					,PrimaryPostalCode='".$officer['PrimaryPostalCode']."'					
					,PrimaryPhone1='".$officer['PrimaryPhone1']."'					
					,PrimaryFax1='".$officer['PrimaryFax1']."'					
					,LastUpdateDate='".$officer['LastUpdateDate']."'
					,Term_Start='".$officer['TermStartDate']."'
					,Term_End='".$officer['TermEndDate']."'
					,Url1='".$officer['Url1']."'
					,Url2='".$officer['Url2']."'
					,EMail1='".$officer['EMail1']."'
					,EMail2='".$officer['EMail2']."'
					,Description='".$officer['Description']."'
					where ElectedOfficialID='".$officer['ElectedOfficialID']."'";
					
					//echo $query_update."<br>";
					$oModel->Execute($query_update);				 					
				} else {
				
					$query_insert = "insert into tbl_elected_officials set 						
					ElectedOfficialID='".$officer['ElectedOfficialID']."'
					,First_Name='".$officer['FirstName']."'
					,Middle_Name='".$officer['MiddleInitial']."'
					,Last_Name='".$officer['LastName']."'
					,Title='".$officer['Title']."'
					,PrimaryAddress1='".$officer['PrimaryAddress1']."'
					,PrimaryAddress2='".$officer['PrimaryAddress2']."'
					,PrimaryAddress3='".$officer['PrimaryAddress3']."'
					,PrimaryCity='".$officer['PrimaryCity']."'
					,PrimaryState='".$officer['PrimaryState']."'
					,PrimaryPostalCode='".$officer['PrimaryPostalCode']."'					
					,PrimaryPhone1='".$officer['PrimaryPhone1']."'					
					,PrimaryFax1='".$officer['PrimaryFax1']."'					
					,LastUpdateDate='".$officer['LastUpdateDate']."'
					,Term_Start='".$officer['TermStartDate']."'
					,Term_End='".$officer['TermEndDate']."'
					,Url1='".$officer['Url1']."'
					,Url2='".$officer['Url2']."'
					,EMail1='".$officer['EMail1']."'
					,EMail2='".$officer['EMail2']."'
					,Description='".$officer['Description']."'";
					
					//echo $query_insert."<br>";
					$oModel->Execute($query_insert);				 
				}
				
				$query_insert_subscriber_elected_officer  = "insert into tbl_subscriber_elected_officer set 						
				ElectedOfficialID='".$officer['ElectedOfficialID']."',subscriber_id='".$subscriber_id."'";
				
				//echo $query_insert_subscriber_elected_officer;
				
				$oModel->Execute($query_insert_subscriber_elected_officer);	 				
			}//foreach						
		}//if
		echo "Subscriber ID: ".$subscriber_id."<br />";		
	}//while
	echo "<br />----DONE SUCESSFULLY----<br />";	
?>