<?php
	include("global.conf.php");	
	require_once($_CONF['ModulesPath'].'system/functions.php');											    
	require_once($_CONF['ModulesPath'].'system/classes/Model.php');	
	require_once($_CONF['ModulesPath'].'subscriber/classes/SubscriberModel.php');

	global $_CONF;
	$siteUrl  			=	$_CONF['SiteUrl'];
	$oModel				=	new Model();
	$SubscriberModel	= 	new SubscriberModel();

	function pr($val){
		echo "<br/><pre>";
		print_r($val);
	};

	## get mail content from db
	$oEmail = $oModel->GetEmail(57);
	
	$query_select_peititons = "select `tbl_affiliate_articles`.`article_id`,
		`tbl_affiliate_articles`.`affiliate_id`,
		`article_title`,`affiliate_comment`, `petition_level`, tbl_member.email,
		tbl_member.first_name, tbl_member.last_name
			from 
		tbl_affiliate_articles ,tbl_member
			where 
		tbl_member.member_id = tbl_affiliate_articles.affiliate_id
			and 
		voting_end = '".date('Y-m-d',mktime("-1 day"))."' ";
	
	
	 echo $query_select_peititons;
	
	$rs_sel_petitions =	$oModel->Execute($query_select_peititons);
	
	while($row_sel_petition = $rs_sel_petitions->FetchRow())
	{	
		$email_array 		= array(); // to store elected representative and affilate 
		
		$petition_id		= $row_sel_petition['article_id'];
		$petition_title		= $row_sel_petition['article_title'];		
		$petition_content	= $row_sel_petition['affiliate_comment'];				
		$petition_level		= $row_sel_petition['petition_level'];
		
		$receiver['email'] 	= $row_sel_petition["email"];		
		$receiver['name']  	= $row_sel_petition["first_name"]." ".$row_sel_petition["last_name"];		
		$receiver['id'] 	= $row_sel_petition['affiliate_id'];
		$email_array[]		= $receiver; 	 
		
		
		if($petition_level=="Federal") {
			$ER_type = 'Senator';
		}		
		else if($petition_level=="State"){
			$ER_type = 'Representative';
		}
		
		## Now fetch vote status on this petition of different members 
		## will be reuired incase of CSV creation 		
		$query_sel_member = "select email,first_name,last_name,
			tbl_subscriber.mail_zip_code, tbl_vote_status.member_id 
				from
			tbl_member ,tbl_vote_status ,tbl_subscriber
				where 
			member_type !='affiliate' and member_type !='elected_official' 
			and isActive = 'y' ".
			" and tbl_subscriber.subscriber_id  = tbl_member.member_id " . 
			" and tbl_vote_status.member_id = tbl_member.member_id " . 
			" and affiliate_article_id = ".$petition_id.
			" order by tbl_subscriber.mail_zip_code asc;";	
		
		$rs_sel_member   =	$oModel->Execute($query_sel_member);				
		$member_id_array = array();
		$er_id_array = array();
		
		/* creating CSV file */					
		$PetitionName 	= ucwords(str_replace(" ","_",$petition_title));	
		$pdfFileName 	= 'Petition_' . $PetitionName.'_'.date("Y-m-d").'_UserDetails.csv';		
		$file_name 		= $_CONF['PetitionFiles'] . $pdfFileName ;
		
		if(!$handle = fopen($file_name, 'w+')) {			
			die("can't create file");
		}
			
		$fileHeader = array ('S.No.', 'First Name', 'Last Name', 'Zip Code');			
		// Write $somecontent to our opened file.
		if (fputcsv($handle, $fileHeader) === FALSE) {		
			die("error 2");
	    }
		    
		$ctr = 1;
			
																				
		while($row_sel_member = $rs_sel_member->FetchRow())							
		{																																									
			$member_email	= $row_sel_member['email'];
			$member_fname 	= $row_sel_member['first_name'];
			$member_lname 	= $row_sel_member['last_name'];
			$member_id 		= $row_sel_member['member_id'];
			$mail_zip_code  = $row_sel_member['mail_zip_code'];
			$member_id_array[]		= $member_id;			
			
			## wrirting to csv file
			$fileContent = array ($ctr,$member_fname ,$member_lname, $mail_zip_code);		
			fputcsv($handle, $fileContent);
			$ctr++;
		}
		
		fclose($handle);
		
		$member_id_array =  array_unique($member_id_array);		

		
		if(!count($member_id_array))
			continue;
		
		$member_id_string = implode(",",$member_id_array);			
		### pr($member_id_string);
		
		## get Elected officials of members and send mail to these
		$query_sel_electedofficials = 
			" select distinct `tbl_elected_officials`.`Elected_Officer_ID`, ".
			" tbl_elected_officials.`EMail1`,tbl_elected_officials.`First_Name`,tbl_elected_officials.`Last_Name` " .
			" from " .
			" tbl_member, tbl_subscriber_elected_officer, tbl_elected_officials " .
			" where " .
			" `tbl_member`. member_id = `tbl_subscriber_elected_officer`.subscriber_id " .
			" and `tbl_subscriber_elected_officer`.ElectedOfficialID = ".
			" `tbl_elected_officials`.ElectedOfficialID ".
			" and `tbl_member`.member_id in (". $member_id_string   .")" .
			" and tbl_elected_officials.Title='".$ER_type."'";

		## echo $query_sel_electedofficials."<br/><br/>";				

		$rs_sel_electedofficials  =	$oModel->Execute($query_sel_electedofficials);																								
		
		while($row_sel_electedofficials = $rs_sel_electedofficials->FetchRow())							
		{												
			$er_id 			= $row_sel_electedofficials['Elected_Officer_ID'];
			
			if(!empty($row_sel_electedofficials['EMail1']))
			{
				$receiver['email']  = $row_sel_electedofficials['EMail1'];		
				$receiver['name'] 	= $row_sel_electedofficials["First_Name"]." ".$row_sel_electedofficials["Last_Name"];		
				$receiver['id'] 	= $er_id ;
				$email_array[]		= $receiver; 	 
			}
		}	
		
		pr($petition_title);
	
		for($i=0;$i<count($email_array);$i++) 
		{			
			$email = $email_array[$i]['email'];
			$name  = $email_array[$i]['name'];
			$member_id = $email_array[$i]['id'];
			
			pr(" >> Mail sent to " .$email);		
		
				
			$billdesc 	= "Dear " . $name ."<br/><br/>";
			$billdesc .= "Voices4Changes has conducted a survey on following petition <br/><br/>";
			$billdesc .= "<table cellspacing=\"0\" cellpadding=\"0\" border=1 width=\"100%\">
				<tr height=\"25\" bgcolor=\"#C0904E\">".
				"<td width=\"350\" align=\"center\"><B>" .
				$petition_title."</B></td></tr>" .
				"<tr height=\"25\" ><td width=\"350\" align=\"center\">" .
				$petition_content .
				"</td></tr>";				
			$billdesc .= "</table><br/><br/>";	
			$billdesc .= "Attached document contains the list of registered members of Voices4Change ";	
			$billdesc .= " which are supporting this petition.<br/><br/>";	
			$billdesc .= "<span style='color:#F6783B;'>Voices4Change mail delivery system!!!<br />
							Auto-generated e-mail, please, do not reply!!! </span>";

			$newbody = $billdesc;
			####################
			
			$text		= CreateMailMessage($newbody);
			$subject	= $oEmail[0]->subject;
				
			$text[body] = str_replace("<br />",'',$text[body]);	
			## $result	= SendMail($text[body], $subject, array($member_email),$_CONF['adminEmail']);
			
			if($i==0)	
				$temp_email  = 'paras.shah@netsmartz.net';//$email;		
								//anilnaut111@gmail.com
			else	
				$temp_email  = 'paras.shah@netsmartz.net';	
			/*	
			echo "<r>";
			pr(" >> Mail sent to " .$temp_email);
			
			$result		= SendMail($text[body], $subject,array( $temp_email), $_CONF['adminEmail'],1,$file_name);					  			
			*/
			//$temp_email  = 'himender.singh@sebiz.net';
			//$result		= SendMail($text[body], $subject,array( $email), $_CONF['adminEmail'],1,$file_name);					  								
			$result2	= SendMail($text[body], $subject,array( $temp_email), $_CONF['adminEmail'],1,$file_name);
			
			$mail_sent =0;
			
			$usertype='elected_official';
			
			if($i==0) {
			
				$usertype='affiliate'; 
			}	
			
			if($result)	{
			
				$mail_sent =1;
				
				$petition_detail_insert_query = "insert into `tbl_petition_notification_detail`". 
				"(`article_id`,`email`,`member_id`,`member_type`,`filename`,`mail_sent`,`name`,`article_title`,`date_sent`) ".
				" values (".$petition_id.",'".$email."',".$member_id.",'".$usertype."','" .
				$pdfFileName."',".$mail_sent.",'".$name."','".$petition_title."','" . date("Y-m-d")."');";
				
				// echo $petition_detail_insert_query;			
				$oModel->Execute($petition_detail_insert_query);
			}
		}	
	}
	
?>