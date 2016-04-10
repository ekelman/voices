<?php

	include("global.conf.php");
	require_once($_CONF['ModulesPath'].'system/functions.php');											    
	require_once($_CONF['ModulesPath'].'system/classes/Model.php');	
	require_once($_CONF['ModulesPath'].'subscriber/classes/SubscriberModel.php');

	global $_CONF;
	$siteUrl  			=	$_CONF['SiteUrl'];
	$oModel				=	new Model();
	$SubscriberModel	= 	new SubscriberModel();


	/*
	$query_sel_member = "select email,concat(first_name,' ',last_name) as full_name, member_id 
	from tbl_member where member_type='subscriber' and isActive = 'y' and member_id='69'";
	*/

	$query_sel_member = "select email,concat(first_name,' ',last_name) as full_name, member_id 
	from tbl_member where member_type='subscriber' and isActive = 'y'";
	
	//echo $query_sel_member;
	
	$rs_sel_member  =	$oModel->Execute($query_sel_member);

	$oEmail = $oModel->GetEmail(58);
	
	echo "<br />email sent to<br />";
	
	while($row_sel_member = $rs_sel_member->FetchRow())
	{		
		$total_alerts = 0;
		//echo "<br />Before add :".$total_alerts."<br />";
		
		
		$member_email	= $row_sel_member['email'];
		
		$member_name 	= ucwords($row_sel_member['full_name']);
					
		$member_id 	= $row_sel_member['member_id'];

		$query = "select prim_affiliate_id, secondary_affiliates from tbl_subscriber where subscriber_id = '$member_id'";
	
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
		
			/*$query_sel_bill = "select affart.article_title, affart.affiliate_id, affart.bill_number, affart.legtype, affart.article_id 
			from tbl_affiliate_articles affart 
			where affart.vote_alert_sent = 0 and affart.article_type = 'petition' and affart.affiliate_id IN (". $list . ")";
*/			
			/* $query_sel_bill = "select aa.*,aan.id,aan.is_new from tbl_affiliate_articles aa left join (select * from tbl_affiliate_articles_notifications where member_id=$member_id) aan using(article_id) where aa.affiliate_id in (". $list . ") and aa.created=CURDATE() order by aa.article_id desc LIMIT 1";
			*/
			$query_sel_bill = "select DISTINCT(aa.affiliate_id) from tbl_affiliate_articles aa left join (select * from tbl_affiliate_articles_notifications where member_id=$member_id LIMIT 1) aan using(article_id) where aa.affiliate_id in (". $list . ") and aa.created=CURDATE() order by aa.article_id desc";
			$rs_sel_bill	=	$oModel->Execute($query_sel_bill);
			 
			
			$billdesc = "";
			
			
     

			
			$billdesc = '<table border="0" cellpadding="0" cellspacing="0" width="600"><tr><td style="padding: 6px;"><table width="586" border="0" cellspacing="0" cellpadding="0"><tr><td><img src="'.$siteUrl.'/images/header.gif" alt="" width="586" height="82" /></td></tr><tr><td height="6"></td></tr><tr><td style="padding:10px 20px 20px 20px; font-family: Verdana, Arial, Helvetica, sans-serif; font-size:12px; color:#000000;"><p><strong>Dear '.$member_name.',</strong> <br /><br /> </p><p>You have received these notifications from Voicesforchange. </p><br /><ul style="line-height:23px">';

			
			while($row_sel_bill = $rs_sel_bill->FetchRow())
			{
				
				$affiliate_id 		= $row_sel_bill['affiliate_id'];
				$article_id 		= $row_sel_bill['article_id'];
				$article_title 		= $row_sel_bill['article_title'];
				$is_new_id 			= $row_sel_bill['id'];
				
				$query_aff = "select first_name,last_name from tbl_member where member_type='affiliate' AND member_id=$affiliate_id";
				$rs_aff	=	$oModel->Execute($query_aff);
				$affDetail=$rs_aff->FetchRow();
				
				$content='"'.ucfirst($affDetail['first_name']).' '.ucfirst($affDetail['last_name']).'"  HAS POSTED NEW CONTENT FOR YOU TO CONSIDER.';
				
				$billdesc .= "<li>";
				/* if($row_sel_bill['article_type']=='petition')
				{
					$bill_number 		= $row_sel_bill['bill_number'];
					$legtype 			= $row_sel_bill['legtype'];
				
					$billdesc .= "<a href='".$siteUrl."/index.php?stage=visitor&mode=affiliatePetitionsDetail&affID=$affiliate_id&id=$article_id&new=$is_new_id'"." style='color:#464544;'>$article_title";
				
				}
				else if($row_sel_bill['article_type']=='bill')
				{
					$billdesc .= "<a href='".$siteUrl."/index.php?stage=visitor&mode=affiliatePetitionsDetail&affID=$affiliate_id&id=$article_id&new=$is_new_id'"." style='color:#464544;'>$article_title";

				}
				else if($row_sel_bill['article_type']=='news')
				{
					$billdesc .= "<a href='".$siteUrl."/index.php?stage=visitor&mode=NewsDetail&affID=$affiliate_id&id=$article_id&new=$is_new_id' style='color:#464544;'>$article_title";

				}
				else if($row_sel_bill['article_type']=='bulletin')
				{
					
					$billdesc .= "<a href='".$siteUrl."/index.php?stage=subscriber&mode=BulletinsDetail&affID=$affiliate_id&id=$article_id'"." style='color:#464544;'>$article_title";
				
				}
				*/
				$billdesc.=$content;
				
				/* if($row_sel_bill['is_new']==1)
				$billdesc.="<img border='0'	alt='' src='".$siteUrl."/images/btn_new.gif' style='border: none;'>";
				
				$billdesc.="</a>"; */
				$billdesc.="</li>";
				
				/*
				$query_sel_member = "update tbl_affiliate_articles set vote_alert_sent = 1 
				where article_id='$article_id'";
				$oModel->Execute($query_sel_member);
				*/
				$total_alerts++;
			}
			$billdesc .= '</ul></td></tr><tr><td style="border-top:#c4c4c4 solid 1px;"><table width="586" border="0" cellspacing="0" cellpadding="0"><tr><td width="12" bgcolor="#d7d4bc">&nbsp;</td><td height="45" valign="middle" bgcolor="#d7d4bc"  style="font-family: Verdana, Arial, Helvetica, sans-serif; font-size:11px; color:#000000; line-height:1.4"><strong>Thank you for using our services!</strong><br />voicesforchange, URL: <a href="'.$siteUrl.'">'.$siteUrl.'</a><br /></td></tr></table></td></tr></table></td></tr></table>';	
				
			//echo "<br />".$total_alerts."<br />";
			
			if($total_alerts > 0) {
				
				//$dynamicInfo 	=	array($member_name,$billdesc,$siteUrl);
				//$staticInfo 	=	array('(sMemberName)','(billDesc)','(siteUrl)');
				//$body			=	$oEmail[0]->content;
				$body		=	$billdesc;
				
				//$newbody	=	str_replace($staticInfo,$dynamicInfo,$body);
				$text		=	CreateMailMessage($body);
				//$subject	=	$oEmail[0]->subject;
				$subject='New Articles Alert Notification';
				//$new_button	=	'./images/btn_new.gif';
				
				//$text[body] = str_replace("<br />",'',$text[body]);	
				$result	=	SendMail($text[body], $subject, array($member_email),$_CONF['adminEmail'],$isHtml=1);
					
				/*
				 * -----------------------------
				$to      = "anil.nautiyal@netsmartz.net";
				$subject = 'the subject';
				$message = 'hello sent to :'.$member_email;
				$headers = 'From: '. $_CONF['adminEmail']. "\r\n" .
					'Reply-To: webmaster@example.com' . "\r\n" .
					'X-Mailer: PHP/' . phpversion();

				mail($to, $subject, $message, $headers);		
				-----------------------------
				*/
				echo $_CONF['adminEmail'].' -- '.$member_email."<br />".$total_alerts."<br>";;
			}
		}
	}
?>