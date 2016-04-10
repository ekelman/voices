<?php
	
	require_once("global.conf.php");
	
	//don't timeout!
	set_time_limit(5*60);

	require_once($_CONF['ModulesPath'].'system/functions.php');											    
	require_once($_CONF['ModulesPath'].'system/classes/Model.php');	
	
	//contains some common data classes 
	require_once($_CONF['ModulesPath'].'system/classes/dataclasses.php');								    

	//connection details
	$oModel 	= new Model();
			
	
	$query_sel_subscriber = "select email,concat(first_name,' ',last_name) as full_name,reg_date, member_id 
	from tbl_member where member_type='subscriber' and isActive = 'y'";
	
	$rs_sel_subscriber  =	$oModel->Execute($query_sel_subscriber);
	
	while($row_sel_subscriber = $rs_sel_subscriber->FetchRow())
	{		
		$full_name	= $row_sel_subscriber['full_name'];
		$member_id	= $row_sel_subscriber['member_id'];
		$sub_email	= $row_sel_subscriber['email'];
		$reg_date	= $row_sel_subscriber['reg_date'];
		$expiredate = date('Y-m-d', strtotime('+1 year', strtotime($reg_date)));
		$curdate=date('Y-m-d');
		if($expiredate<=$curdate)
		{
			$membershipUpdateQuery = "UPDATE `tbl_member` 
					SET
					`member_type`= 'observer' 
					 WHERE member_type = 'subscriber' and member_id = '".mysql_real_escape_string($member_id)."'";
			if($oModel->Execute($membershipUpdateQuery))
			{
				$membershipDeleteQuery = "DELETE from `tbl_subscriber` 
					WHERE subscriber_id = '".mysql_real_escape_string($member_id)."'";
				$oModel->Execute($membershipDeleteQuery);
				
				
				$content 	= "Dear " . $full_name ."<br/><br/>";
				$content .= "Your membership with Voices4Change has been expired.<br/><br/>";
				$content .= "<span style='color:#F6783B;'>Voices4Change mail delivery system!!!<br />
								Auto-generated e-mail, please, do not reply!!! </span>";

				$newbody = $content;
				$text		= CreateMailMessage($newbody);
				$subject	= 'Membership Expired';
					
				$text[body] = str_replace("<br />",'',$text[body]);	
				
				$is_sent	= SendMail($text[body], $subject,array($sub_email), $_CONF['adminEmail'],1);
				
			}
			echo  $full_name."'s membership type changed to observer<br/>";
		}
	}	

?>