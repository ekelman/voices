<?php
	
	require_once("global.conf.php");
	
	//don't timeout!
	set_time_limit(0);

	require_once($_CONF['ModulesPath'].'system/functions.php');											    
	require_once($_CONF['ModulesPath'].'system/classes/Model.php');	
	
	//contains some common data classes 
	require_once($_CONF['ModulesPath'].'system/classes/dataclasses.php');								    

	//connection details
	$oModel 	= new Model();
			
	//Pull certain elements	
	$xmlFileName = "20110321voices_samp_after.xml";
	
	$xmlDoc = new DOMDocument();
	$xmlDoc->load($xmlFileName);

	$x = $xmlDoc->documentElement;
	
	$billProfile = array();
	
	if($x->hasChildNodes())
	{			
		foreach($x->childNodes as $billProfile)
		{
		
			$state 					= "";		
			$session_id 			= "";  	
			$legtype 				= "";  	
			$bill_number 			= "";  		
			$bill_title			 	= "";
			$intro_date 			= "";
			$current_disposition 	= "";
			$bill_location 			= "";
			$bill_summary 			= "";
			$public_text_link 		= "";  						
			$last_action_text  		= "";	
			$last_action_date  		= "";									
			$last_amend_date   		= "";	
			$final_status_date	 	= "";	
			$final_status_action 	= "";
		
			if($billProfile->nodeType != XML_TEXT_NODE)
			{										
				$billKeyArray = $billProfile->getElementsByTagName("bill_key");					
			
				foreach($billKeyArray as $billKey)
				{	
					if ($billKey->nodeType != XML_TEXT_NODE)
					{	
						$state 			=   $billKey->getElementsByTagName('state')->item(0)->nodeValue;
						$session_id 	=  	$billKey->getElementsByTagName('session_id')->item(0)->nodeValue;    
						$legtype 		=  	$billKey->getElementsByTagName('legtype')->item(0)->nodeValue;    
						$bill_number 	=  	$billKey->getElementsByTagName('bill_number')->item(0)->nodeValue;
					}
				}					

				$sSQL_select	=	"select bill_id from tbl_bill_detail where bill_number = '".trim($bill_number)."' and legtype = '".trim($legtype)."'";
				$response 		=	$oModel->Execute($sSQL_select);
				
				//echo $sSQL_select;
				
				if($response->RecordCount()) {
				
					$current_disposition 	=  	$billProfile->getElementsByTagName('current_disposition')->item(0)->nodeValue;    					
					$bill_location 			=  	$billProfile->getElementsByTagName('bill_location')->item(0)->nodeValue;    

					$last_amend_date   =	$billProfile->getElementsByTagName('last_amend_date')->item(0)->nodeValue;					
					
					$statusActionArray		=  	$billProfile->getElementsByTagName('status_action');    					
					$total = $statusActionArray->length;
					$lastStatusAction = $statusActionArray->item($total-1);					
					
					$last_action_text  =	$lastStatusAction->getElementsByTagName('action_text')->item(0)->nodeValue;
					$last_action_date  =	$lastStatusAction->getElementsByTagName('action_date')->item(0)->nodeValue;										
					
					$finalStatusArray  	 =	$billProfile->getElementsByTagName("final_status");					
					if($finalStatusArray->length)
					{
						$final_status_date	 =	$finalStatusArray->item(0)->getElementsByTagName('date')->item(0)->nodeValue;
						$final_status_action =	$finalStatusArray->item(0)->getElementsByTagName('action')->item(0)->nodeValue;										
					}
				
					$billUpdateQuery = "UPDATE `tbl_bill_detail` 
					SET
					`last_amend_date`= '".mysql_real_escape_string($last_amend_date)."', 
					`final_status_date`= '".mysql_real_escape_string($final_status_date)."', `final_status_action`= '".mysql_real_escape_string($final_status_action)."', `current_disposition`= '". mysql_real_escape_string($current_disposition)."', 
					`bill_location`= '".mysql_real_escape_string($bill_location)."', 
					`bill_status_action_text`= '".mysql_real_escape_string($last_action_text)."', 
					`bill_status_action_date`= '". mysql_real_escape_string($last_action_date)."'
					 WHERE bill_number = '".mysql_real_escape_string($bill_number)."' and legtype = '".mysql_real_escape_string($legtype)."'";
					
					mysql_query($billUpdateQuery);

					//echo 'Update '.$bill_number.' -- '.$legtype."<br />";
				} else {
				
					$bill_title			 	=  	$billProfile->getElementsByTagName('bill_title')->item(0)->nodeValue;    
					$intro_date 			=  	$billProfile->getElementsByTagName('intro_date')->item(0)->nodeValue;    
					$current_disposition 	=  	$billProfile->getElementsByTagName('current_disposition')->item(0)->nodeValue;    					
					$bill_location 			=  	$billProfile->getElementsByTagName('bill_location')->item(0)->nodeValue;    
					$bill_summary 			=  	$billProfile->getElementsByTagName('bill_summary')->item(0)->nodeValue;    
					$public_text_link 		=  	$billProfile->getElementsByTagName('public_text_link')->item(0)->nodeValue;    					
									
					$statusActionArray		=  	$billProfile->getElementsByTagName('status_action');    					
					$total = $statusActionArray->length;
					$lastStatusAction = $statusActionArray->item($total-1);					
					
					$last_action_text  =	$lastStatusAction->getElementsByTagName('action_text')->item(0)->nodeValue;
					$last_action_date  =	$lastStatusAction->getElementsByTagName('action_date')->item(0)->nodeValue;										
					$last_amend_date   =	$lastStatusAction->getElementsByTagName('last_amend_date')->item(0)->nodeValue;					
					
					$finalStatusArray  	 =	$billProfile->getElementsByTagName("final_status");					
					if($finalStatusArray->length)
					{
						$final_status_date	 =	$finalStatusArray->item(0)->getElementsByTagName('date')->item(0)->nodeValue;
						$final_status_action =	$finalStatusArray->item(0)->getElementsByTagName('action')->item(0)->nodeValue;										
					}
					
					$billDetailQuery = "INSERT INTO `tbl_bill_detail` (	`bill_number`, `state`, `session_id`, `legtype`, `bill_title`,`intro_date`, `last_amend_date`, `final_status_date`, `final_status_action`, `current_disposition`, `bill_location`, `bill_summary`, `bill_status_action_text`, `bill_status_action_date`, `public_text_link`) 
					VALUES ('".$bill_number."', '".$state." ', '".$session_id."',
					'".mysql_real_escape_string($legtype)."', '".mysql_real_escape_string($bill_title)."', '" .mysql_real_escape_string($intro_date)."', '".mysql_real_escape_string($last_amend_date)."', '".mysql_real_escape_string($final_status_date)."', '".mysql_real_escape_string($final_status_action)."', '".mysql_real_escape_string($current_disposition)."', '".mysql_real_escape_string($bill_location)."', '".mysql_real_escape_string($bill_summary)."', '".mysql_real_escape_string($last_action_text)."', '".mysql_real_escape_string($last_action_date)."', '".mysql_real_escape_string($public_text_link)."')";
					
					mysql_query($billDetailQuery);	

					//echo 'Insert '.$bill_number.' -- '.$legtype."<br />";
					
					$bill_ID = mysql_insert_id(); 
					## print_r($bill_ID . "<br/> ");
					
					## related bills
					$relatedBillArray = $billProfile->getElementsByTagName("related_bill");					
					foreach($relatedBillArray as $relatedBill)
					{
						if($relatedBill->nodeType != XML_TEXT_NODE)
						{	
							$related_state 		 =	$relatedBill->getElementsByTagName('related_state')->item(0)->nodeValue;
							$related_session_id  =  $relatedBill->getElementsByTagName('related_session_id')->item(0)->nodeValue;    						$related_legtype 	 =  $relatedBill->getElementsByTagName('related_legtype')->item(0)->nodeValue;    
							$related_bill_number =	$relatedBill->getElementsByTagName('related_bill_number')->item(0)->nodeValue;    					
					
							$relatedBillQuery = "INSERT INTO `tbl_related_bills` (`bill_id`, `related_bill_number`, `related_bill_legtype`, `related_bill_session_id`, `related_bill_state`) VALUES ('" . $bill_ID ."', '" . $related_bill_number . "', '" . mysql_real_escape_string($related_legtype) . "', '" . $related_session_id . "', '" . mysql_real_escape_string($related_state)  . "');";
							
							mysql_query($relatedBillQuery);
						}		
					}	
					
					## authors
					$authorArray = $billProfile->getElementsByTagName("author");					
					foreach($authorArray as $author)
					{	
						if($author->nodeType != XML_TEXT_NODE)
						{	
							$author_name   =  $author->getElementsByTagName('name')->item(0)->nodeValue;
							$author_party  =  $author->getElementsByTagName('party')->item(0)->nodeValue;    						
							$author_house  =  $author->getElementsByTagName('house')->item(0)->nodeValue;    
						
							$authorQuery = "INSERT INTO `tbl_bill_authors`( `bill_id`, `bill_author_name`, `bill_author_party`, `bill_author_house`) VALUES  ('" . $bill_ID ."', '" . mysql_real_escape_string($author_name) . "', '" . mysql_real_escape_string($author_party) . "', '" . mysql_real_escape_string($author_house). "');";
							
							mysql_query($authorQuery);							
						}		
					}
				}
			}
		}		
	}
	
	echo "<br />============DONE============<br />";
?>