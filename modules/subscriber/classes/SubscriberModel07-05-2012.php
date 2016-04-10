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
	class SubscriberModel extends Model
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
		function SubscriberModel()
		{
			parent::Model();
		}
		
		
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
			$query = "select m.first_name, m.last_name, m.email, s.mail_street_address, s.mail_city,
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
		*Function Name  : getSubscriberDetails
		*Function Type  : Call by value	
		*Functionality  : Used to get the details of the employer from the database
		*Input			: emp id
		*Output			: object containing employer details
		*Return Value   : nothing
		*Note			: nothing
		****************************************************************************************/		
		
		function getSubscriberStateAbbreviation($subID)
		{
			$stateAbbr = "";			
			$query = "select abbr from tbl_states where name = ( select s.mail_state from 
				 tbl_member m left join tbl_subscriber s	on m.member_id = s.subscriber_id 					
				 where m.member_id = '".$subID."')";
			
			$rs	= $this->Execute($query);
			$oState = array();
			while($row = $rs->FetchRow())
			{
				$stateAbbr = $row['abbr'];								
			}					
			return $stateAbbr;
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
			where member_type = 'affiliate' 			
			order by first_name asc";
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
		*Function Name  : getAffiliatesSubscriberJoin
		*Function Type  : Call by value	
		*Functionality  : get all the getAffiliates from database	
		*Input			: nothing
		*Output			: location array
		*Return Value   : location array
		*Note			: nothing
		***************************************************************************************
		*/
	   	function getAffiliatesSubscriberJoin()
		{
			$query = "select m.member_id, aff.organisation_name
			from tbl_member m
			left join tbl_affiliate aff
			on m.member_id = aff.affiliate_id
			where m.member_type = 'affiliate' and m.isActive != 'd'			
			order by aff.organisation_name asc";
			$rs = $this->Execute($query);
			$oAffiliate = array();
			while($row = $rs->FetchRow())
			{
				$member_id = $row['member_id'];
				$affiliate_name = $row['organisation_name'];
				$oAffiliate[$member_id] = $affiliate_name;
			}
			
			return $oAffiliate;
		}//ef
		
		
		/*
		**************************************************************************************
		*Function Header
		*Function Name  : savePaymentStatus
		*Function Type  : Call by value	
		*Functionality  : get all the getAffiliates from database	
		*Input			: nothing
		*Output			: location array
		*Return Value   : location array
		*Note			: nothing
		***************************************************************************************
		*/
	   	function savePaymentStatus($item_name, $amount, $transaction_id ,$payment_date , $referrerID = '')
		{
			$paymentSuccess = false;			
						
			$username  	= $_SESSION["username"];		
			$usertype 	= $_SESSION["member_type"];		
			
			## getmemberand affilaite ID 					
			$query =	"select m.member_id, s.prim_affiliate_id 
						 from tbl_member m left join tbl_subscriber s
						 on m.member_id = s.subscriber_id
						 where m.member_type = '" . $usertype . "' and m.user_name = '". $username. "'";

			$rs = $this->Execute($query);
			
			while($row = $rs->FetchRow())
			{			
				// print_R($row);
				$member_id 				= $row['member_id'];
				$primary_affiliate_id 	= $row['prim_affiliate_id'];							
				
				$insertQuery 	= " insert into `tbl_payment_success` ( `member_id`, `type_id`, `amount`, `date`, `item_name`,	`transaction_id`)
							values ( $member_id, 	$referrerID, 		$amount, '".$payment_date."',  '".$item_name."','".$transaction_id."')";
				$newrs = $this->Execute($insertQuery);
				
				if($newrs) {
					$paymentSuccess = true;
				}
			}	
			return $paymentSuccess;						
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
			if(count($arrAffiliates)>0) {
			
				foreach($arrAffiliates as $affID) {
					$query = "select organisation_name from tbl_affiliate where affiliate_id = '$affID'";
					$rs = $this->Execute($query);
					while($row = $rs->FetchRow()){
						$myAffiliates[$affID] = $row['organisation_name'];
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
		*Functionality  : get all the Affiliates ID from database of a subscriber 
		*Input			: nothing
		*Output			: location array
		*Return Value   : location array
		*Note			: nothing
		***************************************************************************************
		*/
		function getMyAffiliatesID($uID = null)
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
			
			return  $arrAffiliates;			
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
	
			if(count($arrAffiliates) > 0) {
				
				foreach($arrAffiliates as $affID) {
					
					$query = "select first_name, last_name , reg_date , banner, description, donation_url,organisation_name 
					from tbl_member ,	tbl_affiliate where member_id = '$affID' and affiliate_id =  '$affID'";
					$rs = $this->Execute($query);
					
					$myAffiliate = array();	
					
					while($row = $rs->FetchRow()) {						
										
						$row['member_id'] 	 		=	$affID;								
						$row['name'] 				=	$row['first_name']." ".$row['last_name'];
						/*
							$myAffiliate['reg_date'] 			=	$row['reg_date'];							
							$myAffiliate['banner'] 				=	$row['banner'];							
							$myAffiliate['organisation_name'] 	=	$row['organisation_name'];		
							$myAffiliate['donation_url'] 		= 	$row['donation_url'];	
							$myAffiliate['description'] 		=	$row['description'];		
							echo "<pre>----";
							print_r($row);
						*/						
						$myAffiliates[] = $row;												
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
		*Function Name  : getAffiliateSponsor
		*Function Type  : Call by value	
		*Functionality  : fetch all sponsors of that affiliate
		*Input			: nothing.
		*Output			: nothing
		*Return Value   : Employer array
		*Note			: nothing
		***************************************************************************************
		*/
		function getAffiliateSponsor( $affiliateID = null,$page =1,$limit = 5)
		{
								
			# fetch articles 
			if($limit != ""){
				
				$start = ($page - 1)*$limit;			
				$query = "select * from tbl_sponsors 
				 where affiliate_id = '$affiliateID' order by id desc limit  $start , $limit ";
			} else {
				
				$query = "select * from tbl_sponsors
				where affiliate_id = '$affiliateID' order by id desc";
			}
															
			$rs = $this->Execute($query);
					
			$myAffiliateSponsors = array();
			while($row = $rs->FetchRow()) {
				$desc = substr($row['sponsor_description'],0,100);
				$row['sponsor_description'] = $desc;
				$myAffiliate		= $row;
				array_push($myAffiliateSponsors,$myAffiliate);	
			}
			return $myAffiliateSponsors;
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
			$query = "select prim_affiliate_id, secondary_affiliates 
			from tbl_subscriber 
			where subscriber_id = '$uID' limit $limit";
		
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
			
			$secondary_affiliates = explode(',', $secondary_affiliate_data);
			
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
					$query = "select * from tbl_affiliate_articles 
					where affiliate_id IN (". $list . ") 
					order by article_id desc limit  $start , $limit ";
				}
				else
				{			
					## $page =0 i.e. show all elements 
					$query = "select * from tbl_affiliate_articles 
					where affiliate_id IN (". $list . ") 
					order by article_id desc";
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
		*Function Name  : getAffiliateArticlesMain
		*Function Type  : Call by value	
		*Functionality  : get all the Articles related to Affiliate from database	
		*Input			: nothing
		*Output			: location array
		*Return Value   : location array
		*Note			: nothing
		***************************************************************************************
		*/
		function getAffiliateArticlesMain($uID = null,$page = 1,$limit = 5)
		{	
			/*		
			$query = "select prim_affiliate_id, secondary_affiliates 
			from tbl_subscriber 
			where subscriber_id = '$uID' limit $limit";
			*/
			$query = "select prim_affiliate_id, secondary_affiliates 
			from tbl_subscriber 
			where subscriber_id = '$uID'";			
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
			
			$secondary_affiliates = explode(',', $secondary_affiliate_data);
			
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
					$query = "select * from tbl_affiliate_articles 
					where affiliate_id IN (". $list . ") and (article_type='bill' or article_type='petition') 
					order by article_id desc limit  $start , $limit ";
				}
				else
				{			
					## $page =0 i.e. show all elements 
					$query = "select * from tbl_affiliate_articles 
					where affiliate_id IN (". $list . ") and (article_type='bill' or article_type='petition') 
					order by article_id desc";
			
				}

				$rs = $this->Execute($query);

				while($row = $rs->FetchRow()) {
					$desc = substr($row['affiliate_comment'],0,100);
					$row['affiliate_comment'] = $desc;
					$myAffiliate		= $row;					
					
					//echo "<pre>";
					//print_r($myAffiliate);
					
					if($myAffiliate['article_type'] == 'bill') {
						
						if($this->isPending($myAffiliate)) {						
							array_push($myAffiliateArticles,$myAffiliate);
						}
					} else {
						array_push($myAffiliateArticles,$myAffiliate);
					}
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
					$newQuery = "select bill_id,current_disposition from tbl_bill_detail 
					where bill_number = '".$number ."' and legtype='". $legtype ."' and current_disposition = 'Pending'";
					$newrs = mysql_query($newQuery);										
					while($rowNew = mysql_fetch_assoc($newrs)) {
						$row["current_disposition"] = $rowNew["current_disposition"]; 						
					}
					if($row["current_disposition"] == "Pending") {
						$myAffiliate		= $row;
						array_push($myAffiliateArticles,$myAffiliate);
					}	
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
				if($_REQUEST["search_field"] == 'fname')
				{
					$query = "SELECT member_id, first_name, last_name, email, isActive, member_type 
						FROM tbl_member where (member_type !='affiliate' and member_type !='elected_official' and `isActive` != 'd' ) and
						( first_name like  '%".$search_text."%') ";		   	
				}	
				else if($_REQUEST["search_field"] == 'lname')
				{
					$query = "SELECT member_id, first_name, last_name, email, isActive, member_type 
						FROM tbl_member where (member_type !='affiliate' and member_type !='elected_official' and `isActive` != 'd' ) and
						(last_name like '%".$search_text."%') ";		   	
				}	
				else if($_REQUEST["search_field"] == 'email')
				{
					$query = "SELECT member_id, first_name, last_name, email, isActive, member_type 
						FROM tbl_member where (member_type !='affiliate' and member_type !='elected_official'  and `isActive` != 'd') and
						".$search_field ."='".$search_text."'";		   	
				} 
				else 
				{
					$query = "SELECT member_id, first_name, last_name, email, isActive, member_type 
						FROM tbl_member where (member_type !='affiliate' and member_type !='elected_official'  and `isActive` != 'd')";		   	
				}
			}		
			else
			{
				$query = "SELECT member_id, first_name, last_name, email, isActive, member_type
					FROM tbl_member where (member_type='subscriber' or member_type='observer'  and `isActive` !='d')";		   
			}			
		   
		    $rs		=	$this->Execute($query);
		    return $this->_getPageArray($rs, 'Subscriber');
		} //ef	

		
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
	
		   $query = "SELECT *,concat(m.first_name,' ',m.last_name) as affiliate_name 
		   FROM tbl_subscriber s    
		   left join tbl_member m 
		   on s.prim_affiliate_id = m.member_id 
		   WHERE subscriber_id = '$id'";
		   $rs		=	$this->Execute($query);
		    return $this->_getPageArray($rs, 'Subscriber');
		}//ef
			

		/*
		**************************************************************************************
		*Function Header
		*Function Name  : getProfileInfo1SubscriberEdit
		*Function Type  : Call by value	
		*Functionality  : fetch all employers registered through the site.
		*Input			: nothing.
		*Output			: nothing
		*Return Value   : Employer array
		*Note			: nothing
		***************************************************************************************
		*/
		function getProfileInfo1SubscriberEdit($id)
		{
	
		   $query = "SELECT *,concat(aff.organisation_name) as affiliate_name 
		   FROM tbl_subscriber s    
		   left join tbl_affiliate aff 
		   on s.prim_affiliate_id = aff.affiliate_id 
		   WHERE subscriber_id = '$id'";
		   $rs		=	$this->Execute($query);
		    return $this->_getPageArray($rs, 'Subscriber');
		}//ef
			

		/*
		**************************************************************************************
		*Function Header
		*Function Name  : getProfileInfo1SubscriberEditUpdated
		*Function Type  : Call by value	
		*Functionality  : fetch all employers registered through the site.
		*Input			: nothing.
		*Output			: nothing
		*Return Value   : Employer array
		*Note			: nothing
		***************************************************************************************
		*/
		function getProfileInfo1SubscriberEditUpdated($user_name)
		{
	
		   	$query = "SELECT s.*, m.*, aff.organisation_name as affiliate_name 
		   	FROM tbl_member m    
		   	left join tbl_subscriber s 
		   	on m.member_id = s.subscriber_id   
		   	left join tbl_affiliate aff 
		   	on s.prim_affiliate_id = aff.affiliate_id
		   	WHERE user_name = '$user_name'";
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
		function updateProfile($oSubscriber)
		{
	    	$pass = "";
		   	if(strlen($oSubscriber->password)){
				$pass=", password ='".$oSubscriber->password."'";
		   	} 
		   
			$query = "UPDATE tbl_member SET first_name='".$oSubscriber->first_name."',
		   last_name = '".$oSubscriber->last_name."',
		   email = '".$oSubscriber->email."'{$pass}		  
		   WHERE member_id = '".$oSubscriber->member_id."'";
		   
			$this->Execute($query);
		   
			$query = "UPDATE tbl_subscriber 
			SET  mail_street_address ='".$oSubscriber->mail_street_address."',
		   mail_city='".$oSubscriber->mail_city."',
		   mail_state ='".$oSubscriber->mail_state."',
		   mail_zip_code ='".$oSubscriber->mail_zip_code."',
		   bill_street_address ='".$oSubscriber->bill_street_address."' ,
		   bill_city ='".$oSubscriber->bill_city."',
		   bill_state ='".$oSubscriber->bill_state."',
		   bill_zip_code ='".$oSubscriber->bill_zip_code."',
		   is_address_changed ='".$oSubscriber->is_address_changed."',
		   secondary_affiliates ='".$oSubscriber->secondary_afflliates."'		   
		   WHERE subscriber_id = '".$oSubscriber->member_id."'";
		   
		   return $this->Execute($query);
		    //return $this->_getPageArray($rs, 'Subscriber');*/
		}//ef	

		
				
		/*
		**************************************************************************************
		*Function Header
		*Function Name  : upgradeSubscriber
		*Function Type  : Call by value	
		*Functionality  : upgrade subscriber Informartion with Affiliate Data
		*Input			: nothing.
		*Output			: nothing
		*Return Value   : Employer array
		*Note			: nothing
		***************************************************************************************
		*/		
		function upgradeSubscriber($oSubscriber)		
		{  
			
			$query = "UPDATE tbl_subscriber SET prim_affiliate_id = '".$oSubscriber->primary_affiliates."'
			,secondary_affiliates = '".$oSubscriber->secondary_affiliates."' 
		     WHERE subscriber_id = '".$oSubscriber->member_id."'";
			
			return $this->Execute($query);		    
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
			$query = 'select mail_street_address, mail_city, mail_state, mail_zip_code, is_address_changed 
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
			if($row = $rs->FetchRow()) {
				$affiliateID	=	$row["affiliate_id"];
			} else {
				$affiliateID = false;
			}
			return $affiliateID;
		}
		
	/*
		**********************************************************************************
		*Function Header
		*Function Name  : checkPromocodeAffiliateID
		*Function Type  : Call by value	
		*Functionality  : 
		*Input			: 
		*Output			: 
		*Return Value   : 
		*Note			: nothing
		*********************************************************************************
		*/
		function checkPromocodeAffiliateID($promocode = NULL)
		{
			$query = "select affiliate_id from tbl_affiliate where promo_code = '".$promocode."'";
			$affiliateID = 0;
			$rs = $this->Execute($query);
			if($row = $rs->FetchRow()) {
				$affiliateID	=	$row["affiliate_id"];
			} else {
				$affiliateID = false;
			}
			return $affiliateID;
		}		
		
		/*
		**********************************************************************************
		*Function Header
		*Function Name  : addSubscriberCommentToAffArticle
		*Function Type  : Call by value	
		*Functionality  : 
		*Input			: 
		*Output			: 
		*Return Value   : 
		*Note			: Add comment to affiliate article
		*********************************************************************************
		*/
		function addSubscriberCommentToAffArticle($subscriberID = NULL,$articleID = NULL,$subscriberComment = NULL )
		{
			$query = "insert into tbl_subscriber_comment_aff_article( `article_id` ,`subscriber_id` , `subscriber_comment`,`comment_date`)
			values($articleID, $subscriberID, '".$subscriberComment ."', now())";	
			
			$rs = $this->Execute($query);
			$newid = mysql_insert_id();
			return($newid);
		}

		
		/*
		**********************************************************************************
		*Function Header
		*Function Name  : getSubscriberCommentForAffArticle
		*Function Type  : Call by value	
		*Functionality  : fetch subscriber comments to affiliate articel 
		*Input			: 
		*Output			: 
		*Return Value   : 
		*Note			: 
		*********************************************************************************
		*/
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
		}//ef
		
		
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
		function getERPollDetails($article_id)
		{
			$query = "SELECT er_comments.* FROM tbl_elected_officials_comments er_comments
			left join tbl_member m
			on er_comments.elected_officer_id = m.ElectedOfficialID
			where article_id = '".$article_id."' and article_type='poll'";
	
			$rs = $this->Execute($query);
			return $this->_getPageArray($rs, 'ElectoralDistrictComments');
		}//ef				
		
		
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
		/*
		function getSubscriptionAmount()
		{		
			
			$query = "select subscription_price from tbl_usergroups where `name` = 'subscriber'";
			$subscription_price = 0;
			$rs = $this->Execute($query);
			while($row = $rs->FetchRow()) {
				$subscription_price		= $row["subscription_price"];
			}
			return $subscription_price;
		}//ef
		*/
		
		/*
		**************************************************************************************
		*Function Header
		*Function Name  : setUserTypeSubscriber
		*Function Type  : Call by value	
		*Functionality  : 		
		*Input			: 
		*Output			: 	
		*Return Value   : .
		*Note			: nothing
		***************************************************************************************
		*/
		function setUserTypeSubscriber($user_id = NULL)
		{
			$sSQL	=	"UPDATE tbl_member set member_type = 'subscriber' 
			WHERE member_id = '" . $user_id . "'";
			$response =  $this->Execute($sSQL);
			return $response;		
		}//ef
		
		
		/*
		**************************************************************************************
		*Function Header
		*Function Name  : getArticleAffiliateId
		*Function Type  : Call by value	
		*Functionality  : get all the getAffiliates from database	
		*Input			: nothing
		*Output			: location array
		*Return Value   : location array
		*Note			: nothing
		***************************************************************************************
		*/
		function getArticleAffiliateId($article_id = "")
		{					
			
			$query = "select affiliate_id from tbl_affiliate_articles where article_id = '$article_id'";
			
			$rs = $this->Execute($query);						
			while($row = $rs->FetchRow()) {
				
				return $row['affiliate_id'];
			}
			
			return false;
		}//ef	   			
		
		
		/*
		**************************************************************************************
		*Function Header
		*Function Name  : getProfileUserName
		*Function Type  : Call by value	
		*Functionality  : fetch all employers registered through the site.
		*Input			: nothing.
		*Output			: nothing
		*Return Value   : Employer array
		*Note			: nothing
		***************************************************************************************
		*/
		function getProfileUserName($id)
		{
	
		   $query = "SELECT * from tbl_member where member_id = '$id'";
		   $rs		=	$this->Execute($query);
		   return $this->_getPageArray($rs, 'Subscriber');
		}//ef

		
		/*
		**************************************************************************************
		*Function Header
		*Function Name  : getSubscriberAddressDetails
		*Function Type  : Call by reference
		*Functionality  : get record of the .	
		*Input			: page id
		*Output			: Page object
		*Return Value   : object
		*Note			: nothing
		***************************************************************************************
		*/
		function getSubscriberAddressDetails($visitor_id){
			
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
		**************************************************************************************
		*Function Header
		*Function Name  : getVoteStatus
		*Function Type  : Call by value	
		*Functionality  : get vote status on article.	
		*Input			: email id
		*Output			: email info in form of member array
		*Return Value   : email info in form of member array
		*Note			: nothing
		***************************************************************************************
		*/		
		function getVoteStatus($member_id = "", $articleID = "")		
		{
			
			$status = 'NA';
			
			$query	=	"Select status from tbl_vote_status vs 
		 				where vs.affiliate_article_id = '".$articleID."' and vs.member_id = '".$member_id."'";
			$rs		=	$this->Execute($query);
			
			// echo $query;
			
			if(is_object($rs))
			{
				if($row	=	$rs->FetchRow())				
				{
					$status = $row['status'];					
				}				
			}	
			
			return $status;
	   	}//ef
		
		
		 	/*
		**************************************************************************************
		*Function Header
		*Function Name  : getVoteStatusonPoll
		*Function Type  : Call by value	
		*Functionality  : get vote status on poll.	
		*Input			: email id
		*Output			: email info in form of member array
		*Return Value   : email info in form of member array
		*Note			: nothing
		***************************************************************************************
		*/		
		function getVoteStatusonPoll($memberID = "", $articleID = "")		
		{
			
			$status = 'NA';
			
			$query	=	"Select status from tbl_subscriber_comment_er_article vs
		 				where vs.article_id = '".$articleID."' and vs.subscriber_id = '".$memberID."'";
						
			$rs		=	$this->Execute($query);			
			
			if(is_object($rs))
			{
				if($row	=	$rs->FetchRow())				
				{
				
					$status = $row['status'];					
				}				
				
			}	
			
			return $status;
	   	}//ef
		
		
		/*
		**************************************************************************************
		*Function Header
		*Function Name  : getVoteStatus
		*Function Type  : Call by value	
		*Functionality  : get vote status on article.	
		*Input			: email id
		*Output			: email info in form of member array
		*Return Value   : email info in form of member array
		*Note			: nothing
		***************************************************************************************
		*/		
		function  savePetitionInformation($affiliateID = "", $articleID = "", $userID = "")			
		{		
			$hashKey = 	base64_encode("$affiliateID" . "$articleID" . "$userID");
			
			$query  =	"select status from `tbl_temp_payment_check` where `hashkey` = '".$hashKey."'";			
			$rs		=	$this->Execute($query);									
			
			if(is_object($rs))
			{
				if(!($row =	$rs->FetchRow()))				
				{					
					$query  =	"insert into `tbl_temp_payment_check`(`user_id`, `hashkey`, `user_type`)".
								 "values($userID, '$hashKey', 'observer')";  
					
					$status	=	$this->Execute($query);
				}	
			}
	   	}//ef
		
		
		/*
		**************************************************************************************
		*Function Header
		*Function Name  : updatePetitionInformation
		*Function Type  : Call by value	
		*Functionality  : update petition status 
		*Input			: email id
		*Output			: email info in form of member array
		*Return Value   : email info in form of member array
		*Note			: nothing
		***************************************************************************************
		*/		
		function updatePetitionInformation($hashKey = "")		
		{
			$query  = "update  `tbl_temp_payment_check` set `status` = 1 where `hashkey` = '".$hashKey."'";  			
			$status		=	$this->Execute($query);
			return $status;
	   	}//ef
		
		
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
		*************************************************************************************
		*Function Header
		*Function Name  : isPending
		*Function Type  : Call by value	
		*Functionality  : checks that Email or Username already exists or not.
		*Input			: email id.
		*Output			: 
		*Return Value   : array
		*Note			: nothing		
		*************************************************************************************
		*/
		private function isPending($myAffiliateArticle)
		{
			/*
			$sSQL_username	=	"select bill_id from tbl_bill_detail 
			where affart.vote_alert_sent = 0 and affart.article_type = 'bill' and affart.affiliate_id IN (". $list . ") and billdet.current_disposition = 'Pending' and  
			((billdet.bill_status_action_text = 'In SENATE. Placed on SENATE Legislative Calendar.' and billdet.bill_location = 'SENATE') 
			or 
			(billdet.bill_location = 'HOUSE' and billdet.bill_status_action_text = 'In HOUSE. Placed on HOUSE Union Calendar.'))";
			*/
			
			$sSQL	=	"select bill_id from tbl_bill_detail 
			where current_disposition = 'Pending' and legtype='".$myAffiliateArticle['legtype']."' 
			and bill_number='".$myAffiliateArticle['bill_number']."'";			
			
			//echo $sSQL;
			
			$rs	=	$this->Execute($sSQL);
			if($rs->RecordCount()) {
				
				$return = true;
			} else {
			 			
				$return = false;
			}
			
			return $return;
		}//ef
		
		
		/*		
		*************************************************************************************
		*Function Header
		*Function Name  : checkDuplicationEdit
		*Function Type  : Call by value	
		*Functionality  : checks that Email or Username already exists or not.
		*Input			: email id.
		*Output			: 
		*Return Value   : array
		*Note			: nothing		
		*************************************************************************************
		*/
		function checkDuplicationEdit($oSubscriber)
		{
			$return = false;
			
			$sSQL_Email	=	"select * from tbl_member 
			where email='".$oSubscriber->email."' and member_id !='".$oSubscriber->member_id."' and isActive != 'd'";
			$rs_Email	=	$this->Execute($sSQL_Email);
			if($rs_Email->RecordCount()) {
				$return = true;
			}
			
			return $return;
		}//ef
		
		
		/*
		**************************************************************************************
		*Function Header
		*Function Name  : addSubscriberERComment
		*Function Type  : Call by value	
		*Functionality  : add a employer from site	
		*Input			: object $oSubscriber containing subscriber's basic information
		*Output			: adds a record in database
		*Return Value   : boolean response from database class which tells whether query is executed or not.
		*Note			: nothing
		***************************************************************************************
		*/		
		function addSubscriberERComment($oMember)
		{
			$query = "insert into tbl_subscriber_comment_er_article set
			article_id='".$oMember->article_id."', 
			subscriber_id='".$oMember->member_id."',
			subscriber_comment='".$oMember->comment."'";
			
			$rs = $this->Execute($query);
			$newid= mysql_insert_id();
		}		
		
		
		/*
		**************************************************************************************
		*Function Header
		*Function Name  : getAffiliateArticles
		*Function Type  : Call by value	
		*Functionality  : get article details
		*Input			: nothing
		*Output			: location array
		*Return Value   : location array
		*Note			: nothing
		***************************************************************************************
		*/
		function getAffiliateVotePetitionAlerts( $affiliateID = null,$page =1,$limit = 5)
		{
								
			# fetch articles 
			if($limit != 0) {
				
				$start = ($page - 1)*$limit;
				$limit_text = "limit $start, $limit";
			} else {
				$limit_text = "";				
			}
			
			$query = "select * from tbl_affiliate_articles 
			where affiliate_id = $affiliateID and (article_type='bill' or article_type='petition')  
			order by article_id desc {$limit_text}";
															
			$rs = $this->Execute($query);
					
			$myAffiliateArticles = array();
			while($row = $rs->FetchRow()) {
				$desc = substr($row['affiliate_comment'],0,100);
				$row['affiliate_comment'] = $desc;
				$myAffiliate = $row;
				
				
				if($myAffiliate['article_type'] == 'bill') {
					
					if($this->isPending($myAffiliate)) {						
						array_push($myAffiliateArticles,$myAffiliate);
					}
				} else {
					array_push($myAffiliateArticles,$myAffiliate);
				}
			}
			return $myAffiliateArticles;
		}//ef		
	};//ec
?>