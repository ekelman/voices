<?php
	include("global.conf.php");
	require_once($_CONF['ModulesPath'].'system/functions.php');											    
	require_once($_CONF['ModulesPath'].'system/classes/Model.php');	
	require_once($_CONF['ModulesPath'].'subscriber/classes/SubscriberModel.php');

	global $_CONF;
	$siteUrl  			=	$_CONF['SiteUrl'];
	$oModel				=	new Model();
	$SubscriberModel	= new SubscriberModel();


	/*
	$query_sel_member = "select email,concat(first_name,' ',last_name) as full_name, member_id 
	from tbl_member where member_type='subscriber' and isActive = 'y' and member_id='69'";
	*/

	$query_sel_member = "select email,concat(first_name,' ',last_name) as full_name, member_id 
	from tbl_member where member_type !='affiliate' and member_type !='elected_official' and isActive = 'y'";
	
	$rs_sel_member  =	$oModel->Execute($query_sel_member);

	$oEmail = $oModel->GetEmail(41);
	
	echo "<br>email sent to<br>";
	
	while($row_sel_member = $rs_sel_member->FetchRow())
	{
		$member_email	= $row_sel_member['email'];
		$member_name 	= $row_sel_member['full_name'];
					
		$member_id 	= $row_sel_member['member_id'];

		$query = "select prim_affiliate_id, secondary_affiliates 
		from tbl_subscriber where subscriber_id = '$member_id'";
	
		$rs = $oModel->Execute($query);
		
		if($rs->RecordCount()) 
		{			
			$row = $rs->FetchRow();
			$primary_affiliates 		= $row['prim_affiliate_id'];				
			$secondary_affiliate_data 	= $row['secondary_affiliates'];
		}
		$arrAffiliates = array();
		
		if(!empty($primary_affiliates))
		{
			$arrAffiliates[] = 	$primary_affiliates; 
		}
		
		$secondary_affiliates = explode(',',	$secondary_affiliate_data);
		
		if(!empty($secondary_affiliate_data))
		{
			foreach($secondary_affiliates as $affiliateIDs){
				$arrAffiliates[] = $affiliateIDs;
			}
		}
		
		//fetch articles 
		$list = implode("," , $arrAffiliates);
				
		if(count($list))
		{
			/*
			$query_sel_bill = "select affart.article_title, affart.bill_number, affart.legtype, affart.article_id 
			from tbl_affiliate_articles affart
			left join tbl_bill_detail billdet			
			on affart.bill_number = billdet.bill_number and affart.legtype = billdet.legtype 
			where affart.vote_alert_sent = 0 and affart.article_type = 'bill' and affart.affiliate_id IN (". $list . ") and billdet.current_disposition = 'Pending' and  
			((billdet.bill_status_action_text = 'In SENATE. Placed on SENATE Legislative Calendar.' and billdet.bill_location = 'SENATE') 
			or 
			(billdet.bill_location = 'HOUSE' and billdet.bill_status_action_text = 'In HOUSE. Placed on HOUSE Union Calendar.'))";
			*/
			
			$query_sel_bill = "select affart.article_title, affart.bill_number, affart.legtype, affart.article_id 
			from tbl_affiliate_articles affart
			left join tbl_bill_detail billdet			
			on affart.bill_number = billdet.bill_number and affart.legtype = billdet.legtype 
			where affart.article_type = 'bill' and affart.affiliate_id IN (". $list . ") and billdet.current_disposition = 'Pending' and  
			((billdet.bill_status_action_text = 'In SENATE. Placed on SENATE Legislative Calendar.' and billdet.bill_location = 'SENATE') 
			or 
			(billdet.bill_location = 'HOUSE' and billdet.bill_status_action_text = 'In HOUSE. Placed on HOUSE Union Calendar.'))";
			
			$rs_sel_bill	=	$oModel->Execute($query_sel_bill);

			$billdesc = "";
			
			$billdesc = "<table cellspacing=\"0\" cellpadding=\"0\" border=1 width=\"350\">
			<tr height=\"25\" bgcolor=\"#C0904E\">
			<td width=\"350\"  align=\"center\"><B>Bill Title</B></td></tr>";

			$total_alerts = 0;
			while($row_sel_bill = $rs_sel_bill->FetchRow())
			{
				$query = "select subscriber_id 
				from tbl_vote_alert_notification 
				where subscriber_id = '$member_id' and article_id= '".$row_sel_bill['article_id']."'";
			
				$rs = $oModel->Execute($query);
				
				if(!$rs->RecordCount()) 
				{							
					$article_id 		= $row_sel_bill['article_id'];
					$article_title 		= $row_sel_bill['article_title'];
					$bill_number 		= $row_sel_bill['bill_number'];
					$legtype 			= $row_sel_bill['legtype'];
					
					$billdesc .= "<tr bgcolor='#FAE5C2' height='22'>
					<td align='center' bgcolor='#FAE5C2'><a href='$siteUrl/index.php?stage=subscriber&mode=VoteAlertsDetail&id=$article_id'>$article_title</a></td></tr>";
					
					/*				
					$query_sel_member = "update tbl_affiliate_articles set vote_alert_sent = 1 
					where bill_number = '$bill_number' and legtype= '$legtype'";
					*/
					
					$query_sel_member = "insert into tbl_vote_alert_notification set 
					subscriber_id = '".$member_id."',
					article_id= '".$row_sel_bill['article_id']."'";

					//echo $query_sel_member;
					$oModel->Execute($query_sel_member);
					
					$total_alerts++;
				}
			}

			$billdesc .= "</table>";		

			if($total_alerts > 0) {
				$dynamicInfo 	=	array($member_name,$billdesc,$siteUrl);
				$staticInfo 	=	array('(sMemberName)','(billDesc)','(siteUrl)');
				$body			=	$oEmail[0]->content;
				
				$newbody	=	str_replace($staticInfo,$dynamicInfo,$body);
				$text		=	CreateMailMessage($newbody);
				$subject	=	$oEmail[0]->subject;
				
				$text[body] = str_replace("<br />",'',$text[body]);	
				$result	=	SendMail($text[body], $subject, array($member_email),$_CONF['adminEmail']);	
				/*
				$to      = $member_email;
				$subject = 'the subject';
				$message = 'hello';
				$headers = 'From: '. $_CONF['adminEmail']. "\r\n" .
					'Reply-To: webmaster@example.com' . "\r\n" .
					'X-Mailer: PHP/' . phpversion();

				mail($to, $subject, $message, $headers);		
				*/
				echo $_CONF['adminEmail'].' -- '.$member_email."<br />";
			}
		}
	}
?>