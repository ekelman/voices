<?php
	/*	**********************************************************************************************************
	* Author Name			: Anil Nautiyal
	* Creation Date 		: 27th May-2011
	* FileName 				: VisitorModel.php	
	* Called From 			: VisitorController classes.
	* Description 			: VisitorModel class is inhertited from model class and is used to                               execute queries on the site.
	* Components Used		: none
	* Tables Accessed 		: none
	* Program Specs 		:  
	* UTP doc 				:
	* Tested By 			:
	*****************************************************************************************************
	*/
	
	/***************************************************************
	*Class Header
	*Class Name: VisitorModel
	*Functionality: This class inherits model class which contains 
					all the database related functions.
	*Note         : none
	***************************************************************/
	class VisitorModel extends Model
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
			
		function VisitorModel()
		{
			parent::Model();
		}
			/*

		/**************************************************************************************
		*Function Header
		*Function Name  : getSubscriberDetails
		*Function Type  : Call by value	
		*Functionality  : Used to get the details of the employer from the database
		*Input			: emp id
		*Output			: object containing employer details
		*Return Value   : nothing
		*Note			: nothing
		****************************************************************************************/
		
		function getSubscriberDetails($subID)
		{
			$query = "select m.first_name, m.last_name, m.email, m.member_type, s.mail_street_address, s.mail_city,
			s.mail_state, s.mail_zip_code, s.mail_country, s.bill_street_address, s.bill_city,
			s.bill_state, s.bill_zip_code, s.bill_country
			from tbl_member m 
			left join tbl_subscriber s
			on m.member_id = s.subscriber_id
			where m.member_id = '".$subID."'";
			
			$rs		=	$this->Execute($query);
			return $this->_getPageArray($rs, 'Subscriber');
		}//ef
		
		/**************************************************************************************
		*Function Header
		*Function Name  : ActivateSubscriber
		*Function Type  : Call by value	
		*Functionality  : Activates a employer or list of employers		
		*Input			: Array of employer ids $IId
		*Output			: Activates a employer or list of employers
		*Return Value   : boolean response from database class which tells whether query is 
						  executed or not.
		*Note			: nothing
		***************************************************************************************
		*/
		
		function ActivateSubscriber($IId=array())
		{
			//$sSQL = "UPDATE tbl_member set isActive='y' WHERE member_id in('".implode("','", $IId)."')";
			//$response =  $this->Execute($sSQL);
			$sSQL	=	"UPDATE tbl_member set isActive='y' WHERE member_id in('".implode("','", $IId)."')";
			$response =  $this->Execute($sSQL);
			return $response;
			
		}
		
		
		/*
		**************************************************************************************
		*Function Header
		*Function Name  : setUserType
		*Function Type  : Call by value	
		*Functionality  : 		
		*Input			: 
		*Output			: 	
		*Return Value   : .
		*Note			: nothing
		***************************************************************************************
		*/
		function setUserType($username = NULL,$userType = NULL)
		{
			$sSQL	=	"UPDATE tbl_member set member_type = '" . $userType . "' 
			WHERE user_name = '" . $username . "'";
			$response =  $this->Execute($sSQL);
			return $response;		
		}
		
		
		/*
		**************************************************************************************
		*Function Header
		*Function Name  : setUserTypeOneTimeSubscriber
		*Function Type  : Call by value	
		*Functionality  : 		
		*Input			: 
		*Output			: 	
		*Return Value   : .
		*Note			: nothing
		***************************************************************************************
		*/
		function setUserTypeOneTimeSubscriber($member_id)
		{
			$sSQL	=	"UPDATE tbl_member set isActive='d' 
			WHERE member_id = '" . $member_id . "'";
			$response =  $this->Execute($sSQL);
			return $response;		
		}
		
		
		/*
		**************************************************************************************
		*Function Header
		*Function Name  : DeactivateSubscriber
		*Function Type  : Call by value	
		*Functionality  : Deactivates a Subscriber or list of Subscribers		
		*Input			: Array of Subscribers ids $IId
		*Output			: Deactivates a Subscriber or list of Subscribers	
		*Return Value   : boolean response from database class which tells whether query is 
						  executed or not.
		*Note			: nothing
		***************************************************************************************
		*/
		
		function DeactivateSubscriber($IId=array())
		{				
			$sSQL = "UPDATE tbl_member set isActive='n' WHERE member_id in('".implode("','", $IId)."')";
			$response =  $this->Execute($sSQL);
			return $response;
		}
		
		/*
		**************************************************************************************
		*Function Header
		*Function Name  : DeleteSubscriber
		*Function Type  : Call by value	
		*Functionality  : Deletes a referrer or list of referrers
		*Input			: Array of referrer ids $IId
		*Output			: Deletes a referrer or list of referrers
		*Return Value   : boolean response from database class which tells whether query is 
						  executed or not.
		*Note			: nothing
		***************************************************************************************
		*/
		
		function DeleteSubscriber($IId=array())
		{
			//$sSQL = "UPDATE tbl_job set isActive='0' WHERE emp_id in('".implode("','", $IId)."')";
			//$response =  $this->Execute($sSQL);
			$sSQL = "UPDATE tbl_member set isActive='d' WHERE member_id in('".implode("','", $IId)."')";
			$response =  $this->Execute($sSQL);
			return $response;
		}
		
		
		/*
		**************************************************************************************
		*Function Header
		*Function Name  : getAffiliates
		*Function Type  : Call by value	
		*Functionality  : get all the getAffiliates from database	
		*Input			: nothing
		*Output			: location array
		*Return Value   : location array
		*Note			: nothing
		***************************************************************************************
		*/
	   function getAffiliates()
		{
			$query = "select member_id,concat(first_name,' ',last_name) as affiliate_name
			from tbl_member 
			where member_type = 'affiliate' order by first_name asc";
			$rs = $this->Execute($query);
			$oAffiliate = array();
			while($row = $rs->FetchRow())
			{
				$member_id = $row['member_id'];
				$affiliate_name = $row['affiliate_name'];
				$oAffiliate[$member_id] = $affiliate_name;
			}
			
			return $oAffiliate;
		}//ef
		
		
		
		/*
		**************************************************************************************
		*Function Header
		*Function Name  : getMyAffiliates
		*Function Type  : Call by value	
		*Functionality  : get all the getAffiliates from database	
		*Input			: nothing
		*Output			: location array
		*Return Value   : location array
		*Note			: nothing
		***************************************************************************************
		*/
		function getMySecondaryAffiliates($uID = null)
		{
			$query = "select secondary_affiliates from tbl_subscriber where subscriber_id = '$uID'";
			$rs = $this->Execute($query);
			
			if($rs->RecordCount()) {			
				$row = $rs->FetchRow();
				$secondary_affiliates = $row['secondary_affiliates'];
			}
			$secondary_affiliates = explode(',',$secondary_affiliates);
			$arrAffiliates = array();
			foreach($secondary_affiliates as $affiliateIDs){
				$arrAffiliates[] = $affiliateIDs;
			}
			$myAffiliates = array();
			if(count($arrAffiliates)>0){
				foreach($arrAffiliates as $affID){
						$query = "select first_name, last_name from tbl_member where member_id = '$affID'";
						$rs = $this->Execute($query);
						while($row = $rs->FetchRow()){
							$myAffiliates[$affID] = $row['first_name']." ".$row['last_name'];
						}
				}
				
			}
			return $myAffiliates;
		}//ef
		
		/*
		**************************************************************************************
		*Function Header
		*Function Name  : getMyAffiliates
		*Function Type  : Call by value	
		*Functionality  : get all the getAffiliates from database	
		*Input			: nothing
		*Output			: location array
		*Return Value   : location array
		*Note			: nothing
		***************************************************************************************
		*/
		function getMyAffiliates($uID = null)
		{
			$query = "select prim_affiliate_id , secondary_affiliates from tbl_subscriber where subscriber_id = '$uID'";
			$rs = $this->Execute($query);
			
			if($rs->RecordCount()) {			
				$row = $rs->FetchRow();
				$primary_affiliates 	= $row['prim_affiliate_id'];				
				$secondary_affiliate_data 	= $row['secondary_affiliates'];
			}
			
			$arrAffiliates = array();
			
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
			
			$myAffiliates = array();
			$myAffiliate = array();
			if(count($arrAffiliates)>0){
				foreach($arrAffiliates as $affID) {
						$query = "select first_name, last_name , reg_date , banner, description, donation_url,organisation_name 
						from tbl_member ,	tbl_affiliate where member_id = '$affID' and affiliate_id =  '$affID'";
						$rs = $this->Execute($query);
						while($row = $rs->FetchRow()) {
							$myAffiliate['name'] 				= $row['first_name']." ".$row['last_name'];
							$myAffiliate['reg_date'] 			= $row['reg_date'];							
							$myAffiliate['banner'] 				=  $row['banner'];							
							$myAffiliate['description'] 		=  $row['description'];		
							$myAffiliate['organisation_name'] 	=  $row['organisation_name'];		
							$myAffiliate['donation_url'] 		=  $row['donation_url'];	
							$myAffiliate['member_id'] 	 		=  $affID;								
							array_push($myAffiliates,$myAffiliate);													
						}						
					
				}				
			}			
			return $myAffiliates;
		}//ef
		

		
		

		/*
		**************************************************************************************
		*Function Header
		*Function Name  : getAffiliateData
		*Function Type  : Call by value	
		*Functionality  : get all the getAffiliates from database	
		*Input			: nothing
		*Output			: location array
		*Return Value   : location array
		*Note			: nothing
		***************************************************************************************
		*/
		function getAffiliateData($affID = null)
		{					
			$myAffiliates = array();
			$myAffiliate = array();
			
			
			$query = "select first_name, last_name , reg_date , banner, description from tbl_member ,
			tbl_affiliate where member_id = '$affID' and affiliate_id =  '$affID'";
			
			$rs = $this->Execute($query);
			while($row = $rs->FetchRow()) 
			{
				$myAffiliate['name'] 		= $row['first_name']." ".$row['last_name'];
				$myAffiliate['reg_date'] 	= $row['reg_date'];							
				$myAffiliate['banner'] 		= $row['banner'];							
				$myAffiliate['description'] = $row['description'];		
				array_push($myAffiliates,$myAffiliate);													
			}			
						
			return $myAffiliates;
		}//ef

		
		/*
		**************************************************************************************
		*Function Header
		*Function Name  : getAffiliateArticles
		*Function Type  : Call by value	
		*Functionality  : get all the Articles related to Affiliate from database	
		*Input			: nothing
		*Output			: location array
		*Return Value   : location array
		*Note			: nothing
		***************************************************************************************
		*/
		function getAffiliateArticles($uID = null,$page =1,$limit = 5)
		{			
			$query = "select prim_affiliate_id , secondary_affiliates from tbl_subscriber where subscriber_id = '$uID' limit $limit";
		
			$rs = $this->Execute($query);
			
			if($rs->RecordCount()) 
			{			
				$row = $rs->FetchRow();
				$primary_affiliates 		= $row['prim_affiliate_id'];				
				$secondary_affiliate_data 	= $row['secondary_affiliates'];
			}
			$arrAffiliates = array();
			
			if(!empty( $primary_affiliates ))
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
			
			// fetch articles 
			$list = implode("," , $arrAffiliates);
			
			$myAffiliateArticles = array();
			$myAffiliate = array();
			
			if(count($list))
			{
				if($page)
				{			
					$start = ($page - 1)*$limit;			
					$query = "select * from tbl_affiliate_articles where affiliate_id IN (". $list . ") order by article_id desc limit  $start , $limit ";
				}
				else
				{			
					## $page =0 i.e. show all elements 
					$query = "select * from tbl_affiliate_articles where affiliate_id IN (". $list . ") order by article_id desc";
				}
		
			
				$rs = $this->Execute($query);

				while($row = $rs->FetchRow()) {
					$desc = substr($row['affiliate_comment'],0,100);
					$row['affiliate_comment'] = $desc;
					$myAffiliate		= $row;
					array_push($myAffiliateArticles,$myAffiliate);	
				}
			}
			
			return $myAffiliateArticles;
		}//ef
			


		/*
		**************************************************************************************
		*Function Header
		*Function Name  : getAffiliateArticleDetail
		*Function Type  : Call by value	
		*Functionality  : get all the Articles related to Affiliate from database	
		*Input			: Article ID
		*Output			: location array
		*Return Value   : location array
		*Note			: nothing
		***************************************************************************************
		*/
		function getAffiliateArticleDetail( $articleID = null)
		{
			// fetch articles 			
			$myAffiliateArticles = array();
			$myAffiliate = array();
			if(!empty($articleID))
			{
				$query = "select * from tbl_affiliate_articles where article_id = ". $articleID;
				$rs = $this->Execute($query);
				while($row = $rs->FetchRow()) {
					
					$number  = $row["bill_number"];
					$legtype = $row["legtype"];
					$newQuery = "select bill_id,current_disposition from tbl_bill_detail where bill_number = '".$number ."' and legtype='". $legtype ."'";
					$newrs = mysql_query($newQuery);										
					while($rowNew = mysql_fetch_assoc($newrs)) {
						$row["current_disposition"] = $rowNew["current_disposition"]; 						
					}
					$myAffiliate		= $row;
					array_push($myAffiliateArticles,$myAffiliate);	
				}
			}	

			return $myAffiliateArticles;
		}//ef
			
		
		
		/*
		**************************************************************************************
		*Function Header
		*Function Name  : AddSubscriber
		*Function Type  : Call by value	
		*Functionality  : add a employer from site	
		*Input			: object $oSubscriber containing subscriber's basic information
		*Output			: adds a record in database
		*Return Value   : boolean response from database class which tells whether query is executed or not.
		*Note			: nothing
		***************************************************************************************
		*/		
		function AddSubscriber($oSubscriber)
		{
			$query = "insert into tbl_member set 
			first_name='".$oSubscriber->first_name."'
			,last_name='".$oSubscriber->last_name."'
			,user_name='".$oSubscriber->user_name."'
			,email='".$oSubscriber->email."'
			,password=md5('".$oSubscriber->password."')
			,member_type='observer'
			,reg_date=now()";
			
			$rs = $this->Execute($query);
			$newid= mysql_insert_id();
			
			$query = "insert into tbl_subscriber set 
			subscriber_id = '".$newid."'
			,mail_street_address = '".$oSubscriber->mail_address."'
			,mail_city = '".$oSubscriber->mail_city."'
			,mail_state = '".$oSubscriber->mail_state."'
			,mail_zip_code = '".$oSubscriber->mail_postal_code."'
			,is_billing = '".$oSubscriber->isBillingInfo."'
			,bill_street_address = '".$oSubscriber->billingAddress."'
			,bill_city = '".$oSubscriber->billingCity."'
			,bill_state = '".$oSubscriber->billingState."'
			,bill_zip_code = '".$oSubscriber->billingZipCode."'
			,prim_affiliate_id = '".$oSubscriber->primary_afflliates."'
			,secondary_affiliates = '".$oSubscriber->secondary_afflliates."'";
			
			$rs = $this->Execute($query);
			
			return $newid;
		}
		
		/*
		**************************************************************************************
		*Function Header
		*Function Name  : getAllEmployers
		*Function Type  : Call by value	
		*Functionality  : fetch all employers registered through the site.
		*Input			: nothing.
		*Output			: nothing
		*Return Value   : Employer array
		*Note			: nothing
		***************************************************************************************
		*/
		function getAllSubscriber($search_field="",$search_text="")
		{
	
			
			if(isset($_REQUEST["search_field"]))
			{
			
				if($_REQUEST["search_field"] == 'name')
				{
					$query = "SELECT member_id, concat(first_name,' ',last_name) as fullname,email, isActive 
						FROM tbl_member where (member_type='subscriber' or member_type='observer' ) and
						( first_name like  '%".$search_text."%' or  last_name like '%".$search_text."%') ";
		   	
				}	
				else
				{
					$query = "SELECT member_id, concat(first_name,' ',last_name) as fullname,email, isActive 
						FROM tbl_member where (member_type='subscriber' or member_type='observer' ) and
						".$search_field ."='".$search_text."'";
		   	
				}
			}		
			else
			{
				$query = "SELECT member_id, concat(first_name,' ',last_name) as fullname,email, isActive 
					FROM tbl_member where (member_type='subscriber' or member_type='observer' )";
		   
			}
			
		   
		    $rs		=	$this->Execute($query);
		    return $this->_getPageArray($rs, 'Subscriber');
		}//ef	

		/*
		**************************************************************************************
		*Function Header
		*Function Name  : getProfileInfo
		*Function Type  : Call by value	
		*Functionality  : fetch all employers registered through the site.
		*Input			: nothing.
		*Output			: nothing
		*Return Value   : Employer array
		*Note			: nothing
		***************************************************************************************
		*/
		function getProfileInfo($member)
		{
	
		   $query = "SELECT * FROM tbl_member WHERE `user_name` = '".$member."'";
		    $rs		=	$this->Execute($query);
		    return $this->_getPageArray($rs, 'Subscriber');
		}//ef

		
		/*
		**************************************************************************************
		*Function Header
		*Function Name  : getProfileInfo1
		*Function Type  : Call by value	
		*Functionality  : fetch all employers registered through the site.
		*Input			: nothing.
		*Output			: nothing
		*Return Value   : Employer array
		*Note			: nothing
		***************************************************************************************
		*/
		function getProfileInfo1($id)
		{
	
		   $query = "SELECT *,concat(m.first_name,' ',m.last_name) as affiliate_name FROM tbl_subscriber s    
		   left join tbl_member m on s.prim_affiliate_id = m.member_id 
		   WHERE subscriber_id = '$id'";
		   $rs		=	$this->Execute($query);
		    return $this->_getPageArray($rs, 'Subscriber');
		}//ef
			
		/*
		**************************************************************************************
		*Function Header
		*Function Name  : updateProfile
		*Function Type  : Call by value	
		*Functionality  : fetch all employers registered through the site.
		*Input			: nothing.
		*Output			: nothing
		*Return Value   : Employer array
		*Note			: nothing
		***************************************************************************************
		*/		
		function updateProfile()
		{
	    	$pass = "";
		   	if(strlen($this->updProfile['password'])){
				$pass=", password ='".$this->updProfile['password']."'";
		   	} 
		   
			$query = "UPDATE tbl_member SET first_name='".$this->updProfile['firstName']."',
		   last_name = '".$this->updProfile['lastName']."',
		   email = '".$this->updProfile['email']."',
		   user_name = '".$this->updProfile['UserName']."'{$pass}
		   WHERE member_id = '".$this->updProfile['ID']."'";
		   
			$this->Execute($query);
		   
			$query = "UPDATE tbl_subscriber 
			SET  mail_street_address ='".$this->updProfile['streetAddress']."',
		   mail_city='".$this->updProfile['City']."',
		   bill_street_address ='".$this->updProfile['billingAddress']."' ,
		   bill_city ='".$this->updProfile['billCity']."',
		   mail_state ='".$this->updProfile['state']."',
		   mail_zip_code ='".$this->updProfile['zipCode']."',
		   bill_state ='".$this->updProfile['billState']."',
		   bill_zip_code ='".$this->updProfile['billZipCode']."',
		   is_address_changed ='".$this->updProfile['is_address_changed']."',
		   secondary_affiliates ='".$this->updProfile['secondary_afflliates']."'
		   
		   WHERE subscriber_id = '".$this->updProfile['ID']."'";
		   
		   return $this->Execute($query);
		    //return $this->_getPageArray($rs, 'Subscriber');*/
		}//ef	

		
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
		function getElectedOfficials($member_id)
		{  
			$query = 'select * from tbl_elected_officials 
			where ElectedOfficialID 
			in (select ElectedOfficialID from tbl_subscriber_elected_officer where subscriber_id = "'.$member_id.'")';
			
			$rs = $this->Execute($query);
			return $this->_getPageArray($rs, 'Member');
		}//ef

		
		/*
		**********************************************************************************
		*Function Header
		*Function Name  : getStreetAddress
		*Function Type  : Call by value	
		*Functionality  : 
		*Input			: 
		*Output			: 
		*Return Value   : 
		*Note			: nothing
		*********************************************************************************
		*/
		function getStreetAddress($member_id)
		{  
			$query = 'select mail_street_address, is_address_changed 
			from tbl_subscriber 
			where subscriber_id = "'.$member_id.'"';
			$rs = $this->Execute($query);
			return $this->_getPageArray($rs, 'Member');
		}//ef		
		
		
		/*
		**********************************************************************************
		*Function Header
		*Function Name  : getPrimaryAffIDfromCode
		*Function Type  : Call by value	
		*Functionality  : 
		*Input			: 
		*Output			: 
		*Return Value   : 
		*Note			: nothing
		*********************************************************************************
		*/
		function getPrimaryAffIDfromCode($affCode = NULL)
		{
			$query = "select affiliate_id from tbl_affiliate where affiliate_code = '".$affCode."'";
			$affiliateID = 0;
			$rs = $this->Execute($query);
			while($row = $rs->FetchRow()) {
					$affiliateID		= $row["affiliate_id"];
				}
			return $affiliateID;
		}
		
		
		/*
		**********************************************************************************
		*Function Header
		*Function Name  : getPromoCode
		*Function Type  : Call by value	
		*Functionality  : 
		*Input			: 
		*Output			: 
		*Return Value   : 
		*Note			: nothing
		*********************************************************************************
		*/
		function getPromoCode($promo_code = "",$user_group_name = "")
		{		
			if($user_group_name == "") {
				
				$query = "select subscription_price from tbl_usergroups where promo_code = '".$promo_code."' and `name` not in ('administrator','affiliate','subscriber','observer')";
				$subscription_price = 0;
				$rs = $this->Execute($query);
				while($row = $rs->FetchRow()) {
					$subscription_price		= $row["subscription_price"];
				}
				return $subscription_price;
			} else {
				
				$query = "select * from tbl_usergroups where `name` = '".$user_group_name."'";
				$rs = $this->Execute($query);
				return $this->_getPageArray($rs, 'Member');
			} 
		}
		
		
		## Add comment to affiliate articel 
		function addSubscriberCommentToAffArticle($subscriberID = NULL,$articleID = NULL,$subscriberComment = NULL )
		{
			$query = "insert into tbl_subscriber_comment_aff_article( `article_id` ,`subscriber_id` , `subscriber_comment`,`comment_date`)
			values($articleID, $subscriberID, '".$subscriberComment ."', now())";	
			$rs = $this->Execute($query);
			$newid = mysql_insert_id();
			return($newid);
		}

		## fetch subscriber comments to affiliate articel 
		function getSubscriberCommentForAffArticle( $articleID = NULL,$subscriberID = NULL )
		{
			$query = "select * from `tbl_subscriber_comment_aff_article` `com_article` left join  `tbl_member` m
				on com_article.subscriber_id = m.member_id
				where com_article.`article_id` = $articleID";
			
			if($subscriberID !=NUll )				
			$query .= " and  com_article.`subscriber_id` = $subscriberID ";
			
			$subscribersComment = array();
			
			$rs = $this->Execute($query);
			while($row = $rs->FetchRow()) {				
				array_push($subscribersComment,$row);	
			}			
			return $subscribersComment;
		}
		
		/*		
		************************************************************************
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
				where elected_officer_id='".$er_id."' and article_type='article' limit 0, $limit";
			} else {
				
				$query = "SELECT * FROM tbl_elected_officials_comments 
				where elected_officer_id='".$er_id."' and article_type='article'";
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
				where elected_officer_id='".$er_id."' and article_type='poll' limit 0, $limit";
			} else {
				
				$query = "SELECT * FROM tbl_elected_officials_comments 
				where elected_officer_id='".$er_id."' and article_type='poll'";
			}
			
			$rs = $this->Execute($query);
			return $this->_getPageArray($rs, 'ElectoralDistrictComments');
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
		function getERArticleDetails($article_id)
		{  
			$query = "SELECT er_comments.* FROM tbl_elected_officials_comments er_comments
			left join tbl_member m
			on er_comments.elected_officer_id = m.ElectedOfficialID
			where article_id = '".$article_id."' and article_type='article'";
	
			$rs = $this->Execute($query);
			return $this->_getPageArray($rs, 'ElectoralDistrictComments');
		}

		
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
		function getERPollDetails($article_id)
		{
			$query = "SELECT er_comments.* FROM tbl_elected_officials_comments er_comments
			left join tbl_member m
			on er_comments.elected_officer_id = m.ElectedOfficialID
			where article_id = '".$article_id."' and article_type='poll'";
	
			$rs = $this->Execute($query);
			return $this->_getPageArray($rs, 'ElectoralDistrictComments');
		}				

		
		/*
		**************************************************************************************
		*Function Header
		*Function Name  : addOneTimeSubscriber scrapped now
		*Function Type  : Call by value	
		*Functionality  : add a employer from site	
		*Input			: object $oSubscriber containing subscriber's basic information
		*Output			: adds a record in database
		*Return Value   : boolean response from database class which tells whether query is executed or not.
		*Note			: nothing
		***************************************************************************************
		*/		
		function addOneTimeSubscriber($oVisitor)
		{
			$query = "insert into tbl_member set 
			first_name='".$oVisitor->first_name."'
			,last_name='".$oVisitor->last_name."'
			,user_name='onetimesubscriber'
			,email='".$oVisitor->email."'
			,password=md5('123456')
			,member_type='".$oVisitor->member_type."'
			,isActive='n'
			,reg_date=now()";
			
			
			$rs = $this->Execute($query);
			$newid= mysql_insert_id();
			
			$query = "insert into tbl_subscriber set 
			subscriber_id = '".$newid."'
			,mail_street_address = '".$oVisitor->mail_address."'
			,mail_city = '".$oVisitor->mail_city."'
			,mail_state = '".$oVisitor->mail_state."'
			,mail_zip_code = '".$oVisitor->mail_postal_code."'
			,is_address_changed = 'no'";
			
			$rs = $this->Execute($query);
			
			return $newid;
		}//ef

		/*
		**************************************************************************************
		*Function Header
		*Function Name  : addOneTimeObserver
		*Function Type  : Call by value	
		*Functionality  : add a employer from site	
		*Input			: object $oSubscriber containing subscriber's basic information
		*Output			: adds a record in database
		*Return Value   : boolean response from database class which tells whether query is executed or not.
		*Note			: nothing
		***************************************************************************************
		*/
		
		function addOneTimeObserver($oSubscriber)
		{
			$query = "insert into tbl_member set 
			first_name='".$oSubscriber->first_name."'
			,last_name='".$oSubscriber->last_name."'
			,user_name='".$oSubscriber->user_name."'
			,email='".$oSubscriber->email."'
			,password=md5('".$oSubscriber->password."')
			,member_type='observer'
			,reg_date=now()";
			
			$rs = $this->Execute($query);
			$newid= mysql_insert_id();
			
			$query = "insert into tbl_subscriber set 
			subscriber_id = '".$newid."'
			,mail_street_address = '".$oSubscriber->mail_address."'
			,mail_city = '".$oSubscriber->mail_city."'
			,mail_state = '".$oSubscriber->mail_state."'
			,mail_zip_code = '".$oSubscriber->mail_postal_code."'
			,is_billing = '".$oSubscriber->isBillingInfo."'
			,bill_street_address = '".$oSubscriber->billingAddress."'
			,bill_city = '".$oSubscriber->billingCity."'
			,bill_state = '".$oSubscriber->billingState."'
			,bill_zip_code = '".$oSubscriber->billingZipCode."'
			,prim_affiliate_id = '".$oSubscriber->primary_afflliates."'
			,secondary_affiliates = '".$oSubscriber->secondary_afflliates."'";
			
			$rs = $this->Execute($query);
			
			return $newid;
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
		function checkDuplication($oSubscriber)
		{

			$sSQL_username	=	"select * from tbl_member 
			where user_name='".$oSubscriber->user_name."'";
			$rs_username	=	$this->Execute($sSQL_username);
			if($rs_username->RecordCount()) {
				return "username";
			}			

			$sSQL_Email	=	"select * from tbl_member 
			where email='".$oSubscriber->email."' and isActive != 'd'";
			$rs_Email	=	$this->Execute($sSQL_Email);
			if($rs_Email->RecordCount()) {
				return "email";
			}
			
			return "notfound";
		}//ef

		
		/*
		**************************************************************************************
		*Function Header
		*Function Name  : getMemeberType
		*Function Type  : Call by reference
		*Functionality  : get record of the .	
		*Input			: page id
		*Output			: Page object
		*Return Value   : object
		*Note			: nothing
		***************************************************************************************
		*/
		function getMemeberType($promo_code){
			$sSQL = "SELECT * FROM tbl_usergroups where promo_code='".$promo_code."'";
			$rs = $this->Execute($sSQL);
			return $this->_getPageArray($rs, 'Member');
		}//ef

		
		/*
		**************************************************************************************
		*Function Header
		*Function Name  : getVisitorAddressDetails
		*Function Type  : Call by reference
		*Functionality  : get record of the .	
		*Input			: page id
		*Output			: Page object
		*Return Value   : object
		*Note			: nothing
		***************************************************************************************
		*/
		function getVisitorVerify($visitor_id){
			
			$query = "select member_id from tbl_member where member_id = '".$visitor_id."'";

			$rs = $this->Execute($query);
			while($row = $rs->FetchRow()) {

				$sSQL= "select subscriber_id, mail_street_address, mail_city, mail_state, mail_zip_code 
				from tbl_subscriber where subscriber_id='".$visitor_id."'";
		
				//echo $sSQL;
				$rs = $this->Execute($sSQL);				
				return $this->_getPageArray($rs, 'Member');
			}
			return false;			
		}//ef
		
		
		/*
		**********************************************************************************
		*Function Header
		*Function Name  : getVisitorPetitionSignStatus
		*Function Type  : Call by value	
		*Functionality  : 
		*Input			: 
		*Output			: 
		*Return Value   : 
		*Note			: nothing
		*********************************************************************************
		*/
		function getVisitorPetitionSignStatus($article_id, $visitor_id)
		{
			$query = "select id from tbl_vote_status 
			where member_id = '".$visitor_id."' and affiliate_article_id= '".$article_id."'";
			
			$rs = $this->Execute($query);
			while($row = $rs->FetchRow()) {
				return true;
			}
			return false;
		}
		
		
	   	/*
		**************************************************************************************
		*Function Header
		*Function Name  : memberVoteOneTime
		*Function Type  : Call by value	
		*Functionality  : set vote status on article.	
		*Input			: email id
		*Output			: email info in form of member array
		*Return Value   : email info in form of member array
		*Note			: nothing
		***************************************************************************************
		*/		
		function memberVoteOneTime($visitor_id = "", $articleID = "", $status = '')		
		{
			
			$insertQuery = "insert into tbl_vote_status ( affiliate_article_id,member_id,
			status,date )  values ('" . $articleID . "','". $visitor_id ."', '". $status ."', '".date('Y-m-d')."')";
			
			## echo $insertQuery;
					
			$rs 	=	$this->Execute($insertQuery);						
			$response	= mysql_insert_id();						
			
			return $response;
	   	}//ef


		/*
		**************************************************************************************
		*Function Header
		*Function Name  : getArticleAffiliateInfo
		*Function Type  : Call by value	
		*Functionality  : get all the getAffiliates from database	
		*Input			: nothing
		*Output			: location array
		*Return Value   : location array
		*Note			: nothing
		***************************************************************************************
		*/
		function getArticleAffiliateInfo($affID = null)
		{					
			
			$query = "select first_name, last_name, email from tbl_member where member_id = '$affID'";
			
			$rs = $this->Execute($query);						
			while($row = $rs->FetchRow()) {
				
				return $this->_getPageArray($rs, 'Member');
			}
			
			return false;
		}//ef	   	

		
		/*
		************************************************************************************
		*Function Header
		*Function Name  : getTotalSignsCount
		*Function Type  : Call by value	
		*Functionality  : 	
		*Input			: 
		*Output			: 
		*Return Value   : 
		*Note			: 		
		************************************************************************************
		*/
		function getTotalSignsCount($articleID)
		{
			$query = "select count(v.member_id) as 'signs_count' 
			from tbl_vote_status v 
			left join tbl_member m 
			on v.member_id = m.member_id 
			left join tbl_subscriber sub 
			on m.member_id = sub.subscriber_id 
			where affiliate_article_id = '".$articleID."'";
			$rs = $this->Execute($query);
						
			if($rs) {
				$row 	= $rs->FetchRow();
				$signs_count	= $row['signs_count'];
			} else {
				$signs_count = 0;
			}
			
		    return $signs_count;
		}//ef		


		/*
		************************************************************************************
		*Function Header
		*Function Name  : getTotalSignsCount
		*Function Type  : Call by value	
		*Functionality  : 	
		*Input			: 
		*Output			: 
		*Return Value   : 
		*Note			: 		
		************************************************************************************
		*/
		
		function isValidPetition($articleID = null)
		{					
			$return = false;
			$query = "select * from tbl_affiliate_articles 
			where article_id = '".$articleID."'";
			
			$rs = $this->Execute($query);						
			if($row = $rs->FetchRow()) {
				
				$today = date('Y-m-d');
				//print_r($row);
				//die();
				if($today <= $row["voting_end"] && $today >= $row["voting_start"]) {
					$return = true;					
				}
			}
			
			return $return;
		}//ef	   	
		
		
		/*
		************************************************************************************
		*/
		
		/*
		************************************************************************************
		*Function Header
		*Function Name  : saveOneTimePetitionPaymentDetails
		*Function Type  : Call by value	
		*Functionality  : Save payment details 	
		*Input			: 
		*Output			: 
		*Return Value   : 
		*Note			: 		
		************************************************************************************
		*/
		
		function saveOneTimePetitionPaymentDetails($visitor_id,$article_id,$transaction_id,$amount,$currency,$payment_date )			
		{					
																					
			$paymentSuccess = false;
				
			$insertQuery 	= " insert into `tbl_payment_success` ( `member_id`, `type_id`, `amount`, `date`, 				`item_name`,				`transaction_id`)
							values ( $visitor_id, 	$article_id, 							$amount, '".$payment_date."', 'One Time Petition Sign Fee','".$transaction_id."')";
				
			$newrs = $this->Execute($insertQuery);
				
			if($newrs) {
					$paymentSuccess = true;
				}
				
			return $paymentSuccess;		
		}	// ef
				
			
				/*
		************************************************************************************
		*Function Header
		*Function Name  : saveOneTimePetitionPaymentDetails
		*Function Type  : Call by value	
		*Functionality  : Save payment details 	
		*Input			: 
		*Output			: 
		*Return Value   : 
		*Note			: 		
		************************************************************************************
		*/
		
		function saveOneTimePetitionArticleDetails($userID,$articleID,$affiliateID)			
		{		
			$hashKey = 	base64_encode("$affiliateID" . "$articleID" . "$userID");
			
			$query  =	"select status from `tbl_temp_payment_check` where `hashkey` = '".$hashKey."'";			
			$rs		=	$this->Execute($query);									
			
			if(is_object($rs))
			{
				if(!($row =	$rs->FetchRow()))				
				{					
					$query  =	"insert into `tbl_temp_payment_check`(`user_id`, `hashkey`, `user_type`,`status`)".
								 "values($userID, '$hashKey', 'observer','1')";  
					// echo $query;			 
					
					$status	=	$this->Execute($query);
				}
				
				// for temporary solutions 
				$this->saveAffiliate($userID,$articleID,$affiliateID); 
			}
		}
		
		/******** TEmp ***********/
		/* temp code saving this affiliate as user's secondary affiliate for now */		
		function saveAffiliate($userID,$articleID,$affiliateID)
		{	
			/*make it primary */
			$query  = "update `tbl_subscriber` set `prim_affiliate_id` = '".$affiliateID."' 
				where `subscriber_id` = '".$userID."'";  			
				
			$status		=	$this->Execute($query);		
			
			/*
			$secondary_affiliates = array();
			$query  =	"select secondary_affiliates from `tbl_subscriber` where `subscriber_id` = '".$userID."'";			
			$rs		=	$this->Execute($query);									
				
			if(is_object($rs))
			{
				if(($row =	$rs->FetchRow()))				
				{	
					$secondary_affiliates = explode(",",$row["secondary_affiliates"]);										
					
				}
			}			
			if(!in_array($affiliateID,$secondary_affiliates ))
			{
				array_push($secondary_affiliates ,$affiliateID);				
				$secondary_affiliates_string = implode(",",$secondary_affiliates);				
				$query  = "update `tbl_subscriber` set `secondary_affiliates` = '".$secondary_affiliates_string."' 
				where `subscriber_id` = '".$userID."'";  			
				$status		=	$this->Execute($query);				
			}
			*/			
			
				
		}// ef
		
		/*
		**************************************************************************************
		*Function Header
		*Function Name  : getPetitionInformation
		*Function Type  : Call by value	
		*Functionality  : update petition status 
		*Input			: email id
		*Output			: email info in form of member array
		*Return Value   : email info in form of member array
		*Note			: nothing
		***************************************************************************************
		*/				
		function getPetitionInformation($affiliateID = "", $articleID = "", $userID = "")		
		{
			$hashKey = 	base64_encode("$affiliateID" . "$articleID" . "$userID");
			
			$query  =	"select status from `tbl_temp_payment_check` where `hashkey` = '".$hashKey."'";						
			$rs		=	$this->Execute($query);
			$status = 0;		

			if(is_object($rs))
			{
				if($row	=	$rs->FetchRow())				
				{					
					$status = $row['status'];					
				}				
			}				
			return $status;		
	   	}//ef	
		
//Changes on 15-05-2012

function deleteArticleNewNotification($newID=null)
{
	$query="delete from tbl_affiliate_articles_notifications where id=".$newID;
	$rs = $this->Execute($query);
}//ef
	
		
	};//ec
?>