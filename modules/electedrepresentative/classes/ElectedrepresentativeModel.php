<?php
	/*	**********************************************************************************************************
	* Author Name			: Anil Nautiyal
	* Creation Date 		: 27th May-2011
	* FileName 				: SubscriberModel.php	
	* Called From 			: SubscriberController classes.
	* Description 			: SubscriberModel class is inhertited from model class and is used to                               execute queries on the site.
	* Components Used		: none
	* Tables Accessed 		: none
	* Program Specs 		:  
	* UTP doc 				:
	* Tested By 			:
	*****************************************************************************************************
	*/
	
	//getting nusoap lib  file
	require_once($_CONF['SitePath']."webservices/nusoap.php");


	/***************************************************************
	*Class Header
	*Class Name: Subscriber
	*Functionality: This class inherits model class which contains 
					all the database related functions.
	*Note         : none
	***************************************************************/	
	class ElectedrepresentativeModel extends Model
	{
			
		/*
		**************************************************************************************
		*Function Header
		*Function Name  : SubscriberModel
		*Function Type  : constructor
		*Functionality  : this fumction intializes Subscriber class and inherits model class
		*Input			: nothing
		*Output			: initialized objects
		*Return Value   : all the initialized values.
		*Note			: nothing
		***************************************************************************************
		*/
		function ElectedrepresentativeModel()
		{
			parent::Model();
		}

		
		/*
		**********************************************************************************
		*Function Header
		*Function Name  : getElectedOfficials
		*Function Type  : Call by value	
		*Functionality  : 
		*Input			: 
		*Output			: 
		*Return Value   : 
		*Note			: nothing
		*********************************************************************************
		*/
		function getElectedOfficialsAdmin($search_field="",$search_text="")
		{  
			
			if(isset($_REQUEST["search_field"]) and (trim($_REQUEST["search_field"]) != ""))
			{
			
				if($_REQUEST["search_field"] == 'fname')
				{
					/*
					$query = "SELECT concat(First_Name,' ' ,Middle_Name, ' ', Last_Name) as full_name, EMail1, ElectedOfficialID
					FROM tbl_elected_officials where ( First_Name like  '%".$search_text."%' or  Middle_Name like '%".$search_text."%'
					or  Last_Name like '%".$search_text."%') ";
					*/
					
					$query = "SELECT First_Name, Middle_Name, Last_Name, EMail1, ElectedOfficialID
					FROM tbl_elected_officials where First_Name like  '%".$search_text."%'";
					/**/
					
		 		} elseif($_REQUEST["search_field"] == 'mname') {
					/*
					$query = "SELECT concat(First_Name,' ' ,Middle_Name, ' ', Last_Name) as full_name, EMail1, ElectedOfficialID
					FROM tbl_elected_officials where ( First_Name like  '%".$search_text."%' or  Middle_Name like '%".$search_text."%'
					or  Last_Name like '%".$search_text."%') ";
					*/
					
					$query = "SELECT First_Name, Middle_Name, Last_Name, EMail1, ElectedOfficialID
					FROM tbl_elected_officials where Middle_Name like '%".$search_text."%'";
					/**/
					
		 		} elseif($_REQUEST["search_field"] == 'lname') {
					/*
					$query = "SELECT concat(First_Name,' ' ,Middle_Name, ' ', Last_Name) as full_name, EMail1, ElectedOfficialID
					FROM tbl_elected_officials where ( First_Name like  '%".$search_text."%' or  Middle_Name like '%".$search_text."%'
					or  Last_Name like '%".$search_text."%') ";
					*/
					
					$query = "SELECT First_Name, Middle_Name, Last_Name, EMail1, ElectedOfficialID
					FROM tbl_elected_officials where Last_Name like '%".$search_text."%'";
					/**/
					
		 		} else if($_REQUEST["search_field"] == 'email') {
					$query = "SELECT First_Name, Middle_Name, Last_Name, EMail1, ElectedOfficialID
					 FROM tbl_elected_officials where EMail1 = '".$search_text."'";
				} 
			}		
			else
			{
				$query = "SELECT First_Name, Middle_Name, Last_Name, EMail1, ElectedOfficialID
				FROM tbl_elected_officials";
			}
			
			//$query = "SELECT member_id, concat(first_name,' ',last_name) as fullname,email,isActive FROM tbl_member where member_type='subscriber'";
	
			$rs = $this->Execute($query);
			return $this->_getPageArray($rs, 'Member');
		}

		
		/*
		**********************************************************************************
		*Function Header
		*Function Name  : getElectedOfficialsAccountsAdmin
		*Function Type  : Call by value	
		*Functionality  : 
		*Input			: 
		*Output			: 
		*Return Value   : 
		*Note			: nothing
		*********************************************************************************
		*/
		function getElectedOfficialsAccountsAdmin($search_field="",$search_text="")
		{  
			
			if(isset($_REQUEST["search_field"]) and (trim($_REQUEST["search_field"]) != ""))
			{
			
				if($_REQUEST["search_field"] == 'fname')
				{
					$query = "SELECT first_name, last_name, email, member_id, ElectedOfficialID
					FROM tbl_member 
					where member_type='elected_official' and first_name like  '%".$search_text."%'";
		 		}	
				else if($_REQUEST["search_field"] == 'lname')
				{
					$query = "SELECT first_name, last_name, email, member_id, ElectedOfficialID
					FROM tbl_member 
					where member_type='elected_official' and last_name like '%".$search_text."%'";
		 		}	
		 		else if($_REQUEST["search_field"] == 'email')
				{
					$query = "SELECT first_name, last_name, email, member_id, ElectedOfficialID
					 FROM tbl_member 
					 where member_type='elected_official' and email = '".$search_text."'";
				} 
			}		
			else
			{
				$query = "SELECT first_name, last_name, email, member_id, ElectedOfficialID
				FROM tbl_member where member_type='elected_official'";
			}
			
			//$query = "SELECT member_id, concat(first_name,' ',last_name) as fullname,email,isActive FROM tbl_member where member_type='subscriber'";
	
			$rs = $this->Execute($query);
			return $this->_getPageArray($rs, 'Member');
		}
		
		
		/*
		**********************************************************************************
		*Function Header
		*Function Name  : getElectedOfficialsDetailsAdmin
		*Function Type  : Call by value	
		*Functionality  : 
		*Input			: 
		*Output			: 
		*Return Value   : 
		*Note			: nothing
		*********************************************************************************
		*/
		function getElectedOfficialsDetailsAdmin($er_id)
		{  
			$query = 'SELECT concat(First_Name," ", Middle_Name) as First_Name, Last_Name, EMail1, ElectedOfficialID 
			FROM tbl_elected_officials where ElectedOfficialID="'.$er_id.'"';
			
			//$query = "SELECT member_id, concat(first_name, ' ', last_name) as fullname,email,isActive FROM tbl_member where member_type='subscriber'";
	
			$rs = $this->Execute($query);
			return $this->_getPageArray($rs, 'ElectoralDistrict');
		}
		
		/*
		**********************************************************************************
		*Function Header
		*Function Name  : getElectedOfficialsDetailsAdmin
		*Function Type  : Call by value	
		*Functionality  : 
		*Input			: 
		*Output			: 
		*Return Value   : 
		*Note			: nothing
		*********************************************************************************
		*/
		function getElectedMemberDetailsAdmin($er_id)
		{  
			$query = 'SELECT m.user_name, m.first_name, m.last_name, m.email, m.member_id, m.ElectedOfficialID, er.OfficerProfileImage 
			FROM tbl_member m 
			left join tbl_elected_officials er 
			on m.ElectedOfficialID = er.ElectedOfficialID 
			where m.member_id="'.$er_id.'" or m.ElectedOfficialID="'.$er_id.'"';
			
			//echo $query;
			
			$rs = $this->Execute($query);
			return $this->_getPageArray($rs, 'ElectoralDistrict');
		}
		
		/*
		**********************************************************************************
		*Function Header
		*Function Name  : getElectedOfficials
		*Function Type  : Call by value	
		*Functionality  : 
		*Input			: 
		*Output			: 
		*Return Value   : 
		*Note			: nothing
		*********************************************************************************
		*/
		function getElectedOfficials()
		{  
			$query = "SELECT * FROM tbl_elected_officials";
	
			$rs = $this->Execute($query);
			return $this->_getPageArray($rs, 'Member');
		}		
		
		
		/*
		**********************************************************************************
		*Function Header
		*Function Name  : getElectedRepresentativeDetails
		*Function Type  : Call by value	
		*Functionality  : 
		*Input			: 
		*Output			: 
		*Return Value   : 
		*Note			: nothing
		*********************************************************************************
		*/
		function getElectedRepresentativeDetails($er_id)
		{  
			$query = "SELECT * FROM tbl_elected_officials 
			where ElectedOfficialID='".$er_id."'";
	
			$rs = $this->Execute($query);
			return $this->_getPageArray($rs, 'Member');
		}	

		
		/*
		**********************************************************************************
		*Function Header
		*Function Name  : getElectedRepresentativeID
		*Function Type  : Call by value	
		*Functionality  : 
		*Input			: 
		*Output			: 
		*Return Value   : 
		*Note			: nothing
		*********************************************************************************
		*/
		function getElectedRepresentativeID($er_username)
		{  
			$query = "SELECT * FROM tbl_member 
			where user_name='".$er_username."'";
	
			$rs = $this->Execute($query);
			return $this->_getPageArray($rs, 'Member');
		}		

		
		/*
		**********************************************************************************
		*Function Header
		*Function Name  : getElectedRepresentativeDetails
		*Function Type  : Call by value	
		*Functionality  : 
		*Input			: 
		*Output			: 
		*Return Value   : 
		*Note			: nothing
		*********************************************************************************
		*/
		function getElectedRepresentativeEmailMember($er_id)
		{  
			$query = "SELECT email FROM tbl_member 
			where ElectedOfficialID='".$er_id."'";
			
			/*
			$rs_Email = $this->Execute($query);
			
			if($rs_Email) {
				if($rs_Email->RecordCount()) {
					$row = $rs_Email->FetchRow();
					$email = $row['email'];
				
					return $email;
				}
			}
			
			return "";
			*/
			$rs = $this->Execute($query);
			
			if($row = $rs->FetchRow()) {
				
				$return = true;  			
			} else {
				
				$return = false;							
			}
			
			return $return;
		}		
		
		/*		
		 * ***********************************************************************
		*Function Header
		*Function Name  : getElectedRepresentativeComments
		*Function Type  : Call by value	
		*Functionality  : 
		*Input			: 
		*Output			: 
		*Return Value   : 
		*Note			: nothing	
		************************************************************************
		*/
		function getElectedRepresentativeComments($er_id, $limit="")
		{  
			if($limit != "") {
				
				$query = "SELECT * FROM tbl_elected_officials_comments 
				where elected_officer_id='".$er_id."' and article_type='article' order by comment_date desc limit 0, $limit";
			} else {
				
				$query = "SELECT * FROM tbl_elected_officials_comments 
				where elected_officer_id='".$er_id."' and article_type='article' order by comment_date desc";
			}	
			
			$rs = $this->Execute($query);
			return $this->_getPageArray($rs, 'ElectoralDistrictComments');
		}		

		
		/*		
		 * ***********************************************************************
		*Function Header
		*Function Name  : getElectedRepresentativePolls
		*Function Type  : Call by value	
		*Functionality  : 
		*Input			: 
		*Output			: 
		*Return Value   : 
		*Note			: nothing	
		************************************************************************
		*/
		function getElectedRepresentativePolls($er_id,$limit = "")
		{  
			if($limit != "") {
				
				$query = "SELECT * FROM tbl_elected_officials_comments 
				where elected_officer_id='".$er_id."' and article_type='poll' order by comment_date desc limit 0, $limit";
			} else {
				
				$query = "SELECT * FROM tbl_elected_officials_comments 
				where elected_officer_id='".$er_id."' and article_type='poll'  order by comment_date desc";
			}
			
			$rs = $this->Execute($query);
			return $this->_getPageArray($rs, 'ElectoralDistrictComments');
		}		
		
		
		/*		
		*************************************************************************************
		*Function Header
		*Function Name  : checkDuplication
		*Function Type  : Call by value	
		*Functionality  : checks that Email or Username already exists or not.
		*Input			: email id.
		*Output			: 
		*Return Value   : array
		*Note			: nothing		
		*************************************************************************************
		*/
		function checkDuplication($oElectoralDistrict)
		{
			$sSQL_username	=	"select * from tbl_member 
			where user_name='".$oElectoralDistrict->user_name."'";
			$rs_username	=	$this->Execute($sSQL_username);
			if($rs_username->RecordCount()) {
				return "username";
			}			
			
			$sSQL_Email	=	"select * from tbl_member 
			where email='".$oElectoralDistrict->EMail1."' and isActive != 'd'";
			$rs_Email	=	$this->Execute($sSQL_Email);
			if($rs_Email->RecordCount()) {
				return "email";
			}
			
			return "notfound";
		}//ef
		
		

		/*
		 *************************************************************************************
		*Function Header
		*Function Name  : checkDuplicationUpdate
		*Function Type  : Call by value	
		*Functionality  : checks that Email
		*Input			: email id.
		*Output			: 
		*Return Value   : array
		*Note			: nothing		
		***************************************************************************************
		*/
		function checkDuplicationUpdate($oElectoralDistrict)
		{
			$sSQL_Email	=	"select * from tbl_member 
			where email='".$oElectoralDistrict->email."' and member_id != '".$oElectoralDistrict->member_id."' and isActive !='d'";
			
			$rs_Email	=	$this->Execute($sSQL_Email);
			if($rs_Email->RecordCount()) {
				return true;
			}
			
			return false;
		}//ef
		
		
		
		/*
		************************************************************************************
		*Function Header
		*Function Name  : isERExists
		*Function Type  : Call by value	
		*Functionality  : checks that Email or Username already exists or not.
		*Input			: email id.
		*Output			: 
		*Return Value   : array
		*Note			: nothing		
		*************************************************************************************
		*/
		function isERExists($er_id)
		{
			$sSQL_exists	=	"select member_id from tbl_member 
			where ElectedOfficialID='".$er_id."'";
			$rs_exists	=	$this->Execute($sSQL_exists);
			if($rs_exists->RecordCount()) {
				return true;
			}
			
			return false;
		}//ef
		
		
		/*		************************************************************************************
		*Function Header
		*Function Name  : addAdminElectedrepresentative
		*Function Type  : Call by value	
		*Functionality  : 
		*Input			: 
		*Output			: 
		*Return Value   : .
		*Note			: nothing		************************************************************************************
		*/
		function addAdminElectedrepresentative($oElectoralDistrict)
		{   
		
			$query = "insert into tbl_member set 
			first_name='".$oElectoralDistrict->First_Name."'
			,last_name='".$oElectoralDistrict->Last_Name."'
			,user_name='".$oElectoralDistrict->user_name."'
			,email='".$oElectoralDistrict->EMail1."'
			,password=md5('".$oElectoralDistrict->password."')
			,member_type='elected_official'
			,ElectedOfficialID='".$oElectoralDistrict->ElectedOfficialID."'
			,reg_date=now()";
			
			$rs 	= $this->Execute($query);
			$newid	= mysql_insert_id();
			
			if($oElectoralDistrict->OfficerProfileImage != '')
			{
				$query_er = "update tbl_elected_officials 
				set OfficerProfileImage='".$oElectoralDistrict->OfficerProfileImage."' 
				where ElectedOfficialID='".$oElectoralDistrict->ElectedOfficialID."'";
				$this->Execute($query_er);
			}
			return $newid; 
		}//ef

		
		/*		
		 *************************************************************************************
		*Function Header
		*Function Name  : updateAdminElectedrepresentative
		*Function Type  : Call by value	
		*Functionality  : 
		*Input			: 
		*Output			: 
		*Return Value   : .
		*Note			: nothing		
		*************************************************************************************
		*/
		function updateAdminElectedrepresentative($oElectoralDistrict)
		{   
		
			$query = "update tbl_member set 
			email='".$oElectoralDistrict->email."'";
			
			if($oElectoralDistrict->password !='')
			{
				$query .= ",password=md5('".$oElectoralDistrict->password."')";
			}

			$query .= " where member_type='elected_official' and 
			member_id='".$oElectoralDistrict->member_id."'";
			
			$rs = $this->Execute($query);
			
			if($oElectoralDistrict->OfficerProfileImage != '')
			{
				$query_er = "update tbl_elected_officials 
				set OfficerProfileImage='".$oElectoralDistrict->OfficerProfileImage."' 
				where ElectedOfficialID='".$oElectoralDistrict->ElectedOfficialID."'";
				$this->Execute($query_er);
			}
			
			$newid= mysql_insert_id();
		}//ef

		
		/*		
		 *************************************************************************************
		*Function Header
		*Function Name  : updateElectedrepresentative
		*Function Type  : Call by value	
		*Functionality  : 
		*Input			: 
		*Output			: 
		*Return Value   : .
		*Note			: nothing		
		*************************************************************************************
		*/
		function updateElectedrepresentative($oElectoralDistrict)
		{   
		
			$query = "update tbl_member set 
			email='".$oElectoralDistrict->email."'";
			
			if($oElectoralDistrict->password !='')
			{
				$query .= ",password=md5('".$oElectoralDistrict->password."')";
			}

			$query .= " where member_type='elected_official' and 
			member_id='".$oElectoralDistrict->member_id."'";
			
			$rs = $this->Execute($query);
		}//ef
		
		
		/*
		 * ************************************************************************************
		*Function Header
		*Function Name  : addErArticle
		*Function Type  : Call by value	
		*Functionality  : 
		*Input			: 
		*Output			: 
		*Return Value   : .
		*Note			: nothing		
		*************************************************************************************
		*/
		function addERArticle($oElectoralDistrictComments)
		{   
		
			$query = "insert into tbl_elected_officials_comments set 
			elected_officer_id='".$oElectoralDistrictComments->elected_officer_id."'
			,comment='".$oElectoralDistrictComments->comment."'
			,comment_date=now()";
			//die("----");
			$rs = $this->Execute($query);
			$newid= mysql_insert_id();
		}//ef
		
		
			/*
		 * ************************************************************************************
		*Function Header
		*Function Name  : updateERArticle
		*Function Type  : Call by value	
		*Functionality  : 
		*Input			: 
		*Output			: 
		*Return Value   : .
		*Note			: nothing		
		*************************************************************************************
		*/
		function updateERArticle($oElectoralDistrictComments)
		{   
			$query = "update tbl_elected_officials_comments set 
			elected_officer_id='".$oElectoralDistrictComments->elected_officer_id."'
			,comment='".$oElectoralDistrictComments->comment."'
			,comment_modified=now() where article_id =".$oElectoralDistrictComments->article_id;
			
			$rs = $this->Execute($query);
			$newid= mysql_insert_id();
			
		}//ef
		
		/*
		 * ************************************************************************************
		*Function Header
		*Function Name  : deleteERArticle
		*Function Type  : deleteERArticle and associated comments 
		*Functionality  : 
		*Input			: 
		*Output			: 
		*Return Value   : .
		*Note			: nothing		
		*************************************************************************************
		*/
		function deleteERArticle($oElectoralDistrictComments)
		{   
			$query = "delete from tbl_elected_officials_comments where ".
			" elected_officer_id='".$oElectoralDistrictComments->elected_officer_id."'".
			" and article_id =".$oElectoralDistrictComments->article_id;
			
			if( $this->Execute($query))
			{
				$query = "delete from tbl_subscriber_comment_er_article where ".				
				" article_id =".$oElectoralDistrictComments->article_id;				
				$this->Execute($query);			
				return true;
			}			
			else
			{
				return false;
			}
			
		}//ef
		
		
		/*
		 * ************************************************************************************
		*Function Header		
		*Function Name  : deleteERArticleComment
		*Function Type  : Call by value	
		*Functionality  : 
		*Input			: 
		*Output			: 
		*Return Value   : .
		*Note			: nothing		
		*************************************************************************************
		*/
		function deleteERArticleComment($oElectoralDistrictComments,$commentID)
		{   
			$query = "delete from tbl_subscriber_comment_er_article where article_id =".
			$oElectoralDistrictComments->article_id ." and id =".$commentID;				
				
				if($this->Execute($query))			
					return true;
				else	
					return false;
		}//ef
		
		
		/*
		 * ************************************************************************************
		*Function Header
		*Function Name  : deleteERPoll
		*Function Type  : deleteERPoll and associated comments / votes
		*Functionality  : 
		*Input			: 
		*Output			: 
		*Return Value   : .
		*Note			: nothing		
		*************************************************************************************
		*/
		function deleteERPoll($oElectoralDistrictComments)
		{   
			$query = "delete from tbl_elected_officials_comments where ".
			" elected_officer_id='".$oElectoralDistrictComments->elected_officer_id."'".
			" and article_id =".$oElectoralDistrictComments->article_id . 
			" and article_type='poll' ";
			
			if( $this->Execute($query))
			{
				$query = "delete from tbl_subscriber_comment_er_article where ".				
				" article_id =".$oElectoralDistrictComments->article_id;				
				$this->Execute($query);			
				return true;
			}			
			else
			{
				return false;
			}
			
			
			
		}//ef
		
		
		/*
		 * ************************************************************************************
		*Function Header

		*Function Name  : addErPoll
		*Function Type  : Call by value	
		*Functionality  : 
		*Input			: 
		*Output			: 
		*Return Value   : .
		*Note			: nothing		
		*************************************************************************************
		*/
		function addErPoll($oElectoralDistrictComments)
		{   
		
			$query = "insert into tbl_elected_officials_comments set 
			elected_officer_id='".$oElectoralDistrictComments->elected_officer_id."'
			,comment='".$oElectoralDistrictComments->comment."'
			,article_type='poll',comment_date=now()";
			//die("----");
			$rs = $this->Execute($query);
			$newid= mysql_insert_id();
		}//ef
		

		/*		
		 ************************************************************************
		*Function Header
		*Function Name  : getERArticleDetails
		*Function Type  : Call by value	
		*Functionality  : 
		*Input			: 
		*Output			: 
		*Return Value   : 
		*Note			: nothing	
		**************************************************************************
		*/
		function getERArticleDetails($username, $article_id)
		{  
			$query = "SELECT er_comments.* FROM tbl_elected_officials_comments er_comments
			left join tbl_member m
			on er_comments.elected_officer_id = m.ElectedOfficialID
			where user_name = '".$username."' and article_id = '".$article_id."' and article_type='article'";
	
			$rs = $this->Execute($query);
			return $this->_getPageArray($rs, 'ElectoralDistrictComments');
		}
		
		
		/*
		**************************************************************************************
		*Function Header
		*Function Name  : getERArticleComment
		*Function Type  : Call by value	
		*Functionality  : get comments on ER articvle by subscriber 
		*Input			: nothing.
		*Output			: nothing
		*Return Value   : Employer array
		*Note			: nothing
		***************************************************************************************
		*/
		function getERArticleComment($article_id)
		{	
		   $query = "SELECT s.*,concat(m.first_name,' ',m.last_name) as subscriber_name
		   from tbl_subscriber_comment_er_article s
		   left join tbl_member m
		   on s.subscriber_id = m.member_id
		   where article_id = '".$article_id."'";
		   $rs	=	$this->Execute($query);
		   return $this->_getPageArray($rs, 'Subscriber');
		}//ef
		
		/*		
		 ************************************************************************
		*Function Header
		*Function Name  : getERPollDetails
		*Function Type  : Call by value	
		*Functionality  : 
		*Input			: 
		*Output			: 
		*Return Value   : 
		*Note			: nothing	
		**************************************************************************
		*/
		function getERPollDetails($username, $article_id)
		{
			$query = "SELECT er_comments.* FROM tbl_elected_officials_comments er_comments
			left join tbl_member m
			on er_comments.elected_officer_id = m.ElectedOfficialID
			where user_name = '".$username."' and article_id = '".$article_id."' and article_type='poll'";
	
			$rs = $this->Execute($query);
			return $this->_getPageArray($rs, 'ElectoralDistrictComments');
		}				
		
		
		/*
		*************************************************************************************
		*Function Header
		*Function Name  : getVotingStatusER
		*Function Type  : Call by value	
		*Functionality  : 	
		*Input			: nothing
		*Output			: 
		*Return Value   : 
		*Note			: nothing
		************************************************************************************
		*/		
		function getVotingStatusER($articleID = NULL,&$support = 0 ,&$total =0 )
		{			
			# fetch articles 
			$query = "select count(*) as `total` from tbl_vote_status where
			 affiliate_article_id = $articleID";
	
			$rs = $this->Execute($query);
			
			while($row = $rs->FetchRow()) {
				$total		= $row['total'];
			}
						
			$query = "select count(*) as `support` from tbl_vote_status where
			 affiliate_article_id = $articleID and status ='support' ";
			 
			$rs = $this->Execute($query);
			
			while($row = $rs->FetchRow()) {
				$support		= $row['support'];
			}
		}		
				
		
		/*		
		 ************************************************************************
		*Function Header
		*Function Name  : getMySubscribers
		*Function Type  : Call by value	
		*Functionality  : 
		*Input			: 
		*Output			: 
		*Return Value   : 
		*Note			: nothing	
		**************************************************************************
		*/
		function getMySubscribers($erID)
		{
			$query = "select distinct(subscriber_id) from tbl_subscriber_elected_officer 
			where ElectedOfficialID = '".$erID."'";
			//die($query);
			$rs = $this->Execute($query);
			return $this->_getPageArray($rs, 'Member');
		}//ef
				
		
		/*		
		 ************************************************************************
		*Function Header
		*Function Name  : getMySubscribersAffiliates
		*Function Type  : Call by value	
		*Functionality  : 
		*Input			: 
		*Output			: 
		*Return Value   : 
		*Note			: nothing	
		**************************************************************************
		*/
		function getMySubscribersAffiliates($mySubscribers)
		{
			$arrAffiliates = array();
			
			foreach($mySubscribers as $subscriber) {
				
			 	$query = "select prim_affiliate_id, secondary_affiliates 
			 	from tbl_subscriber 
			 	where subscriber_id = '".$subscriber->subscriber_id."'";			
				$rs = $this->Execute($query);
			
				if($rs->RecordCount()) 
				{			
					$row = $rs->FetchRow();
					$primary_affiliates 		= $row['prim_affiliate_id'];				
					$secondary_affiliate_data 	= $row['secondary_affiliates'];
				}
			
			
				if(!empty( $primary_affiliates ))
				{
					$arrAffiliates[] = 	$primary_affiliates; 
				}
				
				$secondary_affiliates = explode(',', $secondary_affiliate_data);
				
				if(!empty($secondary_affiliate_data))
				{
					foreach($secondary_affiliates as $affiliateIDs){
						$arrAffiliates[] = $affiliateIDs;
					}
				}
			}
			
			$arrAffiliates = array_unique($arrAffiliates);			
			//die($query);			
			return $arrAffiliates;
		}//ef
				
		
		/*
		**************************************************************************************
		*Function Header
		*Function Name  : getAffiliateArticleDetailER
		*Function Type  : Call by value	
		*Functionality  : fetch all employers registered through the site.
		*Input			: nothing.
		*Output			: nothing
		*Return Value   : Employer array
		*Note			: nothing
		***************************************************************************************
		*/
		function getAffiliateArticleDetailER($mySubscribersAffiliates, $home ="")
		{
			$myAffiliateArticles = array();
			
			#fetch articles 
			if(count($mySubscribersAffiliates) > 0) {
				
				$mySubscribersAffiliates = implode(',',$mySubscribersAffiliates);
				
				$query = "select * from tbl_affiliate_articles 
				where affiliate_id in (".$mySubscribersAffiliates.") and article_type='bill'";
				/*
				echo $query;
				die();
				*/
			} else {
				return $myAffiliateArticles;
			}
			
			//echo $query;
			$rs = $this->Execute($query);				
			$ctr = 0; 
			
			if($rs) {
				
				while($row = $rs->FetchRow()) {
					
					$total = 0;
					$support = 0;
					## no need of current disposition in case of petition 
					$number  = $row["bill_number"];
					$legtype = $row["legtype"];
					$newQuery = "select bill_id, current_disposition, bill_status_action_text, bill_location, bill_title 
					from tbl_bill_detail 
					where bill_number = '".$number ."' and legtype='". $legtype ."'";
					
					//echo $newQuery."<br>";
					$newrs = mysql_query($newQuery);
					$rowNew = mysql_fetch_assoc($newrs);
															
					if($rowNew["current_disposition"] != "Pending") {
						
						//echo "<br>"."test"."<br>";
						
						$row["current_disposition"] = $rowNew["current_disposition"];
						$row["bill_title_original"] = $rowNew["bill_title"];						
												
						$query = "select count(*) as `total` from tbl_vote_status where
						 affiliate_article_id = '".$row['article_id']."'";						
						//echo "<br>".$query."<br>";
				
						$rs_total = $this->Execute($query);						
						while($row_total = $rs_total->FetchRow()) {
							$total	= $row_total['total'];
						}
									
						$query = "select count(*) as `support` from tbl_vote_status where
						 affiliate_article_id = '".$row['article_id']."' and status ='support'";						
						//echo "<br>".$query."<br>";
					
						$rs_support = $this->Execute($query);						
						while($row_support = $rs_support->FetchRow()) {
							$support	= $row_support['support'];
						}
							
						if($total > 0) {
							$supportPercentage = (int)(($support / $total ) * 100); 
							$opposePercentage  = 100 - $supportPercentage;
						} else {
							$supportPercentage = 0; 
							$opposePercentage  = 0;
						}
						
						$row["supportPercentage"] 	= $supportPercentage;
						$row["opposePercentage"] 	= $opposePercentage;
						$myAffiliate	= $row;					 													
						
						array_push($myAffiliateArticles,$myAffiliate);
						
						if($home == "yes") {						
							if($ctr == 5) {
								break;
							} else {
								 $ctr++;
							}
						}
						/*
						echo "<br>".$home."--".$ctr."<br>";
						*/	
					}
									
				}
			}
			
			//echo "<br>".$ctr."<br>";	
			//echo "<pre>";
			//print_r($myAffiliateArticles);
			//die();
			
			return $myAffiliateArticles;
		}//ef		
		
		
/*
		*************************************************************************************
		*Function Header
		*Function Name  : getVotingStatus
		*Function Type  : Call by value	
		*Functionality  : 	
		*Input			: nothing
		*Output			: 
		*Return Value   : 
		*Note			: nothing
		************************************************************************************
		*/		
		function getPollVotingStatus($articleID = NULL,&$support = 0 ,&$total =0 )
		{			
			# fetch articles 
			$query = "select count(*) as `total` from tbl_subscriber_comment_er_article 
			where article_id = $articleID";
	
			$rs = $this->Execute($query);
			
			while($row = $rs->FetchRow()) {
				$total		= $row['total'];
			}
						
			$query = "select count(*) as `support` from  tbl_subscriber_comment_er_article where
			 article_id = $articleID and status ='support' ";
			 
			$rs = $this->Execute($query);
			
			while($row = $rs->FetchRow()) {
				$support		= $row['support'];
			}
		}
		
		
	};//ec
?>