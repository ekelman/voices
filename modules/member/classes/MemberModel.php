<?php	
	/****************************************************************************************
		* Author Name 			: Sandeep Singla
		* Creation Date			: 21st May-2007
		* FileName 				: MemberModel.php	
		* Called From 			: MemberController classes.
		* Description 			: MemberModel class is inhertited from model class and is used to
		                          execute queries on the site.
		* Components Used		: none
		* Tables Accessed 		: none
		* Program Specs 		:  
		* UTP doc 				:
		* Tested By 			:
	****************************************************************************************/	
	require_once($_CONF['ModulesPath'].'system/classes/Model.php');

	
	/***************************************************************
	*Class Header
	*Class Name: Member
	*Functionality: This class inherits model class which contains 
					all the database related functions.
	*Note         : none
	***************************************************************/
	class MemberModel extends Model
	{
		
		/*
		**************************************************************************************
		*Function Header
		*Function Name  : MemberModel
		*Function Type  : constructor
		*Functionality  : this fumction intializes member class and inherits model class
		*Input			: nothing
		*Output			: initialized objects
		*Return Value   : all the initialized values.
		*Note			: nothing
		***************************************************************************************
		*/
		function MemberModel()
		{
			parent::Model();
		}
		
		
		/*
		**************************************************************************************
		*Function Header
		*Function Name  : isExistUser
		*Function Type  : call by value
		*Functionality  : This function checks whether record corresponding to user_id exists
		                  in the table name passed 
		*Input			: $tableName,$user_id
		*Output			: nothing
		*Return Value   : boolean value either true or false
		***************************************************************************************
		*/
		function isExistUser($tableName,$user_id)
		{
			$query = "Select user_id from $tableName where user_id = $user_id";
			$rs = $this->Execute($query);
			if($rs->RecordCount() > 0)
			{
				return true;
			}
			else
			{
				return false;
			}
		}


		/***************************************************************************************
		*Function Header
		*Function Name  : isMember
		*Function Type  : Call by value	
		*Functionality  : checks if user exisits or not
		*Input			: $user_id which contains ID of the member.
		*Output			: IDs of al the users against a given email id
		*Return Value   : Array of true or false
		*Note			: nothing
		****************************************************************************************/		
		function isMember($user_id){							// check if member exists or not
			 $sSQL	=	"SELECT * FROM tbl_user ";
			 $sSQL	.=	" WHERE user_id = '". $user_id ."'";
			$response	=	$this->Execute($sSQL);
			$OMember	=	$this->_getPageArray($response, 'Member');
			
			if(count($OMember) && $OMember[0]->user_id != 0){
				return true;
			}else{
				return false;
			}
		}

		
		/*
		**************************************************************************************
		*Function Header
		*Function Name  : UserExist
		*Function Type  : Call by value	
		*Functionality  : checks wheather user exist with particular emailid	
		*Input			: email address 
		*Output			: returns true of user with this email exists.
		*Return Value   : boolean response from database class which tells whether query is 
						  executed or not.
		*Note			: nothing
		***************************************************************************************
		*/
		function UserExist($email)
		{
			$query	=	"SELECT user_id FROM tbl_user WHERE email='$email'";
			$rs		=	$this->Execute($query);
			if($rs->FetchRow())
			{
				return true;
			}
			else
			{
				return false;
			}
		}

		
		/***************************************************************************************
		*Function Header
		*Function Name  : isValidUser
		*Function Type  : Call by value	
		*Functionality  : Checks if the user trying to login is a valid user or not.
		*Input			: Member object $oMember
		*Output			: returns the name of the user trying to login if user is an authentic user.
		*Return Value   : $OMember
		*Note			: nothing
		****************************************************************************************/
		function isValidUser($oMember)
		{
			//Confirming the member type
			$member_type = "";
			$query  =  "select member_id,member_type, isActive, user_name from tbl_member 
			where user_name='$oMember->username' and `password` = '$oMember->password'";
			$rs		=	$this->Execute($query);
			
			while($row = $rs->FetchRow())
			{
				if($row['member_type'] != "") {
					 
					if($row['member_type'] == 'subscriber') {
					
						$member_type		=	'subscriber';
						$oMember->member_type	=	$member_type;
						
					} else if($row['member_type'] == 'affiliate') {
					
						$member_type	=	'affiliate';
						$oMember->member_type	=	$member_type;
					} else if($row['member_type'] == 'observer') {
					
						$member_type	=	'observer';
						$oMember->member_type	=	$member_type;
					} else if($row['member_type'] == 'elected_official') {
					
						$member_type	=	'elected_official';
						$oMember->member_type	=	$member_type;
					}
					
					$oMember->user_name	=	$row['user_name'];
					$oMember->member_id	=	$row['member_id'];
					
					if($row['isActive']	==	'y')
					{
						$oMember->status	=	1;
					} elseif($row['isActive']	==	'd') {
						
						$oMember->status	=	2;
					} else {
						$oMember->status	=	3;
					}
				}
			}
		
			return $oMember;		
		}
		
		
		/*
		**************************************************************************************
		*Function Header
		*Function Name  : GetEmails
		*Function Type  : Call by value	
		*Functionality  : get all emails from database	
		*Input			: nothing
		*Output			: emails info in form of member array
		*Return Value   : emails info in form of member array
		*Note			: nothing
		***************************************************************************************
		*/
		function GetEmails()
		{
			$query = "SELECT * FROM tbl_emails";
			$rs		=	$this->Execute($query);
			return $this->_getPageArray($rs, 'Member');
		}
		
		/*
		**************************************************************************************
		*Function Header
		*Function Name  : GetEmail
		*Function Type  : Call by value	
		*Functionality  : get email record from database.	
		*Input			: email id
		*Output			: email info in form of member array
		*Return Value   : email info in form of member array
		*Note			: nothing
		***************************************************************************************
		*/
		function GetEmail($id)
		{
			$query = "SELECT * FROM tbl_emails where email_id=$id";
			$rs		=	$this->Execute($query);
			return $this->_getPageArray($rs, 'Member');
		}//ef
		  
		  
		/*
		**************************************************************************************
		*Function Header
		*Function Name  : UpdateEmail
		*Function Type  : Call by value	
		*Functionality  : update the email record in database.	
		*Input			: nothing
		*Output			: nothing
		*Return Value   : boolean response from database class which tells whether query is 
						   executed or not.
		*Note			: nothing
		***************************************************************************************
		*/
		function UpdateEmail($oEmails)
		{
			$query = "update tbl_emails set
							  subject='".$oEmails->subject."'
							 ,content='".$oEmails->restore_content."'
							  where email_id=$oEmails->email_id";
			$rs = $this->Execute($query);
			return $rs;
		}//ef

		
		/*
		**************************************************************************************
		*Function Header
		*Function Name  : getReferralStatus
		*Function Type  : Call by value	
		*Functionality  : get email record from database.	
		*Input			: email id
		*Output			: email info in form of member array
		*Return Value   : email info in form of member array
		*Note			: nothing
		***************************************************************************************
		*/
		function getReferralStatus($email)
		{
			$query  = "SELECT isActive FROM tbl_member where email='$email'";
 			$rs		=	$this->Execute($query);
			return $this->_getPageArray($rs, 'Member');
		}//ef

		/*
		**************************************************************************************
		*Function Header
		*Function Name  : checkUserExists
		*Function Type  : Call by value	
		*Functionality  : get email record from database.	
		*Input			: email id
		*Output			: email info in form of member array
		*Return Value   : email info in form of member array
		*Note			: nothing
		***************************************************************************************
		*/
		function checkUserExists($email)
		{
			$sSQL	=	"SELECT member_id FROM tbl_member WHERE email = '".$email."'";
			$rs		=	$this->Execute($sSQL);
			if(is_object($rs))
			{
				if($rs->RecordCount())
				{
					return $this->_getPageArray($rs, 'Member');
				}
			}
			return false;
		}
		
		/*
		**************************************************************************************
		*Function Header
		*Function Name  : UpdatePassword
		*Function Type  : Call by value	
		*Functionality  : Update user password.	
		*Input			: email id
		*Output			: email info in form of member array
		*Return Value   : email info in form of member array
		*Note			: nothing
		***************************************************************************************
		*/
		function UpdatePassword($sendInDatabase,$email)
		{
			$query	=	"update tbl_member set password='$sendInDatabase' where email='$email'";
			$rs		=	$this->Execute($query);
			if(is_object($rs))
			{
				return true;
			}	
			return false;
		}

		
		/*
		**************************************************************************************
		*Function Header
		*Function Name  : getUserName
		*Function Type  : Call by value	
		*Functionality  : get username.	
		*Input			: email id
		*Output			: email info in form of member array
		*Return Value   : email info in form of member array
		*Note			: nothing
		***************************************************************************************
		*/		
		function getUserName($email="")
		{
			$query	=	"Select concat(first_name,' ',last_name) as fullname from tbl_member where email='".$email."'";
			$rs		=	$this->Execute($query);
			if(is_object($rs))
			{
				$row	=	$rs->FetchRow();
				$user_name = $row['fullname'];
				return $user_name;
			}	
			return false;
		}	
		
		
		/*
		**************************************************************************************
		*Function Header
		*Function Name  : getLoginName
		*Function Type  : Call by value	
		*Functionality  : get username.	
		*Input			: email id
		*Output			: email info in form of member array
		*Return Value   : email info in form of member array
		*Note			: nothing
		***************************************************************************************
		*/		
		function getLoginName($email="")
		{
			$query	=	"Select user_name from tbl_member where email='".$email."'";
			$rs		=	$this->Execute($query);
			if(is_object($rs))
			{
				$row	=	$rs->FetchRow();
				$user_name = $row['user_name'];
				return $user_name;
			}	
			return false;
		}
	   
	   	/*
		**************************************************************************************
		*Function Header
		*Function Name  : getVoteStatus
		*Function Type  : Call by value	
		*Functionality  : get vote status on article.	
		*Input			: email id
		*Output			: to check vote status on article before vote
		*Return Value   : email info in form of member array
		*Note			: nothing
		***************************************************************************************
		*/		
		function getVoteStatus($userName = "", $articleID = "")		
		{
			
			$status = 'NA';
			
			if($_SESSION['username'] == $userName)
			{	
				$query	=	"Select status from tbl_vote_status vs , tbl_member mem 
			 				where vs.affiliate_article_id = ".$articleID." and vs.member_id = mem.member_id    
							and mem.user_name ='".$userName."' ";
				$rs		=	$this->Execute($query);
				if(is_object($rs))
				{
					if($row	=	$rs->FetchRow())				
					{
						$status = $row['status'];					
					}				
				}	
			}
			
			return $status;
	   	}	
	   	
		  	/*
		**************************************************************************************
		*Function Header
		*Function Name  : getVoteStatus
		*Function Type  : Call by value	
		*Functionality  : get vote status on article.	
		*Input			: email id
		*Output			: to check vote status on poll before vote
		*Return Value   : email info in form of member array
		*Note			: nothing
		***************************************************************************************
		*/		
		function getVoteStatusOnPoll($userName = "", $articleID = "")		
		{
			
			$status = 'NA';
			
			if($_SESSION['username'] == $userName)
			{	
				$query	=	"Select status from tbl_subscriber_comment_er_article vs 
							, tbl_member mem  where vs.article_id = ".$articleID." and vs.subscriber_id = mem.member_id    
							 and mem.user_name ='".$userName."' ";
				
				$rs		=	$this->Execute($query);
				if(is_object($rs))
				{
					if($row	=	$rs->FetchRow())				
					{
						$status = $row['status'];					
					}				
				}	
			}
			
			return $status;
	   	}	
	   	
	   	/*
		**************************************************************************************
		*Function Header
		*Function Name  : memberVote
		*Function Type  : Call by value	
		*Functionality  : set vote status on article.	
		*Input			: email id
		*Output			: email info in form of member array
		*Return Value   : email info in form of member array
		*Note			: nothing
		***************************************************************************************
		*/		
		function memberVote($userName = "", $articleID = "", $status = '')		
		{
			
			$response  = 0;
			
			if($_SESSION['username'] == $userName)
			{
					
				$query	=	"Select member_id from tbl_member where user_name ='".$userName."' ";
				## echo $query;
				
				$rs		=	$this->Execute($query);
				if(is_object($rs))
				{
					if($row	=	$rs->FetchRow())				
					{
						$userID  = $row['member_id'];			
								
						$insertQuery = "insert into tbl_vote_status ( affiliate_article_id,member_id,
						status,date )  values ('" . $articleID . "','". $userID ."', '". $status ."', '".date('Y-m-d')."')";
						## echo $insertQuery;
								
						$rs 	=	$this->Execute($insertQuery);						
						$response	= mysql_insert_id();						
					}				
				}	
			}	
			
			return $response;
	   	}

			
	   	/*
		**************************************************************************************
		*Function Header
		*Function Name  : memberVote
		*Function Type  : Call by value	
		*Functionality  : set vote status on article.	
		*Input			: email id
		*Output			: email info in form of member array
		*Return Value   : email info in form of member array
		*Note			: nothing
		***************************************************************************************
		*/		
		function memberVoteOnPoll($userName = "", $articleID = "", $status = '')		
		{
			
			$response  = 0;
			
			if($_SESSION['username'] == $userName)
			{
					
				$query	=	"Select member_id from tbl_member where user_name ='".$userName."' ";
				## echo $query;
				
				$rs		=	$this->Execute($query);
				if(is_object($rs))
				{
					if($row	=	$rs->FetchRow())				
					{
						$userID  = $row['member_id'];			
								
						$insertQuery = "insert into tbl_subscriber_comment_er_article ( article_id,subscriber_id, status,comment_date ) ". 
						" values ('" . $articleID . "','". $userID ."', '". $status ."', '".date('Y-m-d')."')";
						 		
						$rs 	=	$this->Execute($insertQuery);						
						$response	= mysql_insert_id();						
					}				
				}	
			}	
			
			return $response;
	   	}

		
		/*
		**********************************************************************************
		*Function Header
		*Function Name  : getMemberID
		*Function Type  : Call by value	
		*Functionality  : 
		*Input			: 
		*Output			: 
		*Return Value   : 
		*Note			: nothing
		*********************************************************************************
		*/
		function getMemberID()
		{  
			$query = "SELECT * FROM tbl_member where user_name='".$_SESSION['username']."'";	
			$rs = $this->Execute($query);
			if(is_object($rs))
			{
				if($row	=	$rs->FetchRow())	
				{
					$userID  = $row['member_id'];			
					return ($userID);
				}
			}	
		}	
		
		
		/*
		**********************************************************************************
		*Function Header
		*Function Name  : getElectedSenator
		*Function Type  : Call by value	 at national level for vote alert notifications 
		*Functionality  : 
		*Input			: 
		*Output			: 
		*Return Value   : 
		*Note			: nothing
		*********************************************************************************
		*/
		function getElectedSenator($member_id)
		{  
			$query = 'select * from tbl_elected_officials where ElectedOfficialID 
			in (select ElectedOfficialID from tbl_subscriber_elected_officer where subscriber_id = "'.$member_id.'"
			 and title = "Senator")';
			
			$res = mysql_query($query);			
			$senators = array();
			
			while($row = mysql_fetch_assoc($res)) {
				array_push($senators, $row);
			}
		
			return $senators;			
		}//ef
		
		
		/*
		**********************************************************************************
		*Function Header
		*Function Name  : getArticleDetails 
		*Function Type  : Call by value	at national level for vote alert notifications 
		*Functionality  : 
		*Input			: 
		*Output			: 
		*Return Value   : 
		*Note			: nothing
		*********************************************************************************
		*/				
		function getArticleDetails($article_id)
		{  			
			$squery = "select * from tbl_affiliate_articles where article_id = '".$article_id."'";											 
			$res = mysql_query($squery);			
			while($newrow = mysql_fetch_assoc($res)) {
				$number  = $newrow["bill_number"];
				$legtype = $newrow["legtype"];
			
				$query = "select bill_title from tbl_bill_detail where bill_number = '".$number ."' and legtype='". $legtype ."'";
				$rs = mysql_query($query);			
				$bill_title = "";
			
				while($row = mysql_fetch_assoc($rs)) {
					$bill_title = $row['bill_title'];
				}
		
				return $bill_title;
			}			
		}//ef

		
		/*
		**************************************************************************************
		*Function Header
		*Function Name  : getUserName
		*Function Type  : Call by value	
		*Functionality  : get username.	
		*Input			: email id
		*Output			: email info in form of member array
		*Return Value   : email info in form of member array
		*Note			: nothing
		***************************************************************************************
		*/		
		function getNameLoginUser()
		{
			$query	= "Select concat(first_name,' ',last_name) as fullname from tbl_member where user_name='".$_SESSION['username']."'";	
			$rs = $this->Execute($query);
			if(is_object($rs))
			{
				if($row	=	$rs->FetchRow())	
				{
					$fullname  = $row['fullname'];			
					return ($fullname);
				}
			}	
		}		
	}//ec
?>