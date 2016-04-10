<?php
	include("global.conf.php");
	require_once($_CONF['ModulesPath'].'system/functions.php');											    
	require_once($_CONF['ModulesPath'].'system/classes/Model.php');	
	require_once($_CONF['ModulesPath'].'subscriber/classes/SubscriberModel.php');

	global $_CONF;
	$siteUrl  			=	$_CONF['SiteUrl'];
	$oModel				=	new Model();
	$SubscriberModel	= 	new SubscriberModel();

	$oEmail = $oModel->GetEmail(58);
	
	echo "<br />email sent to<br />";
	
	$query_sel_affiliate = "select email,concat(first_name,' ',last_name) as full_name, member_id 
	from tbl_member where member_type='affiliate' and isActive = 'y'";
	
	$rs_sel_affiliate  =	$oModel->Execute($query_sel_affiliate);
	
	while($row_sel_affiliate = $rs_sel_affiliate->FetchRow())
	{		
		
		$total_alerts = 0;
		//echo "<br />Before add :".$total_alerts."<br />";
		
		
		$aff_email	= $row_sel_affiliate['email'];
		
		$aff_name 	= ucwords($row_sel_affiliate['full_name']);
					
		$aff_id 	= $row_sel_affiliate['member_id'];

		$affquery = "select * from tbl_affiliate_association where (affiliate_id=$aff_id || associated_aff_id=$aff_id) and status='confirmed'";
			
		$affrs = $oModel->Execute($affquery);
		$aff_arr=array();
		while($affrow = $affrs->FetchRow())
		{		
			if($affrow['affiliate_id']!=$aff_id)
				$aff_arr[]=$affrow['affiliate_id'];
			else
				$aff_arr[]=$affrow['associated_aff_id'];
			
		}
		$aff_list = implode("," , $aff_arr);
		if($aff_list)
		{
			$artquery="select * from tbl_affiliate_articles where affiliate_id in ($aff_list) and created=CURDATE() order by article_id desc";
			$artrs = $oModel->Execute($artquery);
			$billdesc = "";
			
			$billdesc = '<table border="0" cellpadding="0" cellspacing="0" width="600"><tr><td style="padding: 6px;"><table width="586" border="0" cellspacing="0" cellpadding="0"><tr><td><img src="'.$siteUrl.'/images/header.gif" alt="" width="586" height="82" /></td></tr><tr><td height="6"></td></tr><tr><td style="padding:10px 20px 20px 20px; font-family: Verdana, Arial, Helvetica, sans-serif; font-size:12px; color:#000000;"><p><strong>Dear '.$aff_name.',</strong> <br /><br /> </p><p>You have received these notifications from Voicesforchange. </p><br /><ul style="line-height:23px">';

			
			while($artrow = $artrs->FetchRow())
			{
					
				$affiliate_id 		= $artrow['affiliate_id'];
				$article_id 		= $artrow['article_id'];
				$article_title 		= $artrow['article_title'];
				//$is_new_id 			= $artrow['id'];
				$billdesc .= "<li>";
				if($artrow['article_type']=='petition')
				{
					$bill_number 		= $artrow['bill_number'];
					$legtype 			= $artrow['legtype'];
				
					$billdesc .= "<a href='".$siteUrl."/index.php?stage=visitor&mode=affiliatePetitionsDetail&affID=$affiliate_id&id=$article_id&new='"." style='color:#464544;'>$article_title";
				
				}
				else if($artrow['article_type']=='bill')
				{
					$billdesc .= "<a href='".$siteUrl."/index.php?stage=subscriber&mode=affiliatePetitionsDetail&affID=$affiliate_id&id=$article_id'"." style='color:#464544;'>$article_title";

				}
				else if($artrow['article_type']=='news')
				{
					$billdesc .= "<a href='".$siteUrl."/index.php?stage=subscriber&mode=NewsDetail&affID=$affiliate_id&id=$article_id' style='color:#464544;'>$article_title";

				}
				else if($artrow['article_type']=='bulletin')
				{
					
					$billdesc .= "<a href='".$siteUrl."/index.php?stage=subscriber&mode=BulletinsDetail&affID=$affiliate_id&id=$article_id'"." style='color:#464544;'>$article_title";
				
				}
				
				
				$billdesc.="</a></li>";
				$total_alerts++;
			}

			$billdesc .= '</ul></td></tr><tr><td style="border-top:#c4c4c4 solid 1px;"><table width="586" border="0" cellspacing="0" cellpadding="0"><tr><td width="12" bgcolor="#d7d4bc">&nbsp;</td><td height="45" valign="middle" bgcolor="#d7d4bc"  style="font-family: Verdana, Arial, Helvetica, sans-serif; font-size:11px; color:#000000; line-height:1.4"><strong>Thank you for using our services!</strong><br />voicesforchange, URL: <a href="'.$siteUrl.'">'.$siteUrl.'</a><br /></td></tr></table></td></tr></table></td></tr></table>';	
				
			
			if($total_alerts > 0) {
				
				$body		=	$billdesc;
				$text		=	CreateMailMessage($body);
				//$subject	=	$oEmail[0]->subject;
				$subject='New Articles Alert Notification';
				$result	=	SendMail($text[body], $subject, array($aff_email),$_CONF['adminEmail'],$isHtml=1);
				echo $_CONF['adminEmail'].' -- '.$aff_email."<br />".$total_alerts."<br>";
			}

			
		}
	}
		

	
?>