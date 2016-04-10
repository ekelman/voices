<?php
	/*
	**********************************************************************************************************
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


	/***************************************************************
	*Class Header
	*Class Name: Subscriber
	*Functionality: This class inherits model class which contains all the database related functions.
	*Note         : none
	***************************************************************/
	class AffiliatesModel extends Model
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
			
		function AffiliatesModel()
		{
			parent::Model();
		}
			
	
		/*
		*************************************************************************************
		*Function Header
		*Function Name  : getStatesList
		*Function Type  : Call by value	
		*Functionality  : Activates a employer or list of employers		
		*Input			: Array of employer ids $IId
		*Output			: Activates a employer or list of employers
		*Return Value   : boolean response from database class which tells whether query is 
						  executed or not.
		*Note			: nothing
		***************************************************************************************
		*/		
		function getStatesList()
		{
			$sSQL	=	"select abbr , name from tbl_states";
			$response =  $this->Execute($sSQL);
			
			$stateList = array();
			
			while($row = $response->FetchRow())
			{			
				$arr['abbr']  = $row['abbr'];
				$arr['name']  = $row['name'];
				$stateList[]  = $arr;
			}
			
			return $stateList;			
		}		
		
	
		/*
		*************************************************************************************
		*Function Header
		*Function Name  : ActivateAffiliate
		*Function Type  : Call by value	
		*Functionality  : Activates a employer or list of employers		
		*Input			: Array of employer ids $IId
		*Output			: Activates a employer or list of employers
		*Return Value   : boolean response from database class which tells whether query is 
						  executed or not.
		*Note			: nothing
		***************************************************************************************
		*/		
		function ActivateAffiliate($IId=array())
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
		*Function Name  : DeactivateAffiliate
		*Function Type  : Call by value	
		*Functionality  : Deactivates a Affiliate or list of Affiliates		
		*Input			: Array of Affiliates ids $IId
		*Output			: Deactivates a Affiliate or list of Affiliates	
		*Return Value   : boolean response from database class which tells whether query is 
						  executed or not.
		*Note			: nothing
		***************************************************************************************
		*/	
		function DeactivateAffiliate($IId=array())
		{				
	
			$sSQL = "UPDATE tbl_member set isActive='n' WHERE member_id in('".implode("','", $IId)."')";
			$response =  $this->Execute($sSQL);
			return $response;
		}
		
		
		/*
		**************************************************************************************
		*Function Header
		*Function Name  : DeleteAffiliate
		*Function Type  : Call by value	
		*Functionality  : Deletes a referrer or list of referrers
		*Input			: Array of referrer ids $IId
		*Output			: Deletes a referrer or list of referrers
		*Return Value   : boolean response from database class which tells whether query is 
						  executed or not.
		*Note			: nothing
		***************************************************************************************
		*/		
		function DeleteAffiliate($IId=array())
		{
			//$sSQL = "UPDATE tbl_job set isActive='0' WHERE emp_id in('".implode("','", $IId)."')";
			//$response =  $this->Execute($sSQL);
			$date = date('Ymd-His');
			$sSQL = "UPDATE tbl_member set isActive='d',user_name = CONCAT(`user_name`,'".$date."'),email = CONCAT(`email`,'".$date."')
			WHERE member_id in('".implode("','", $IId)."')";
			
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
		*Function Name  : getAffilliateSubscribers 
		*Function Type  : Call by value	
		*Functionality  : fetch all subscribers of an affiliate 
		*Input			: nothing.
		*Output			: nothing
		*Return Value   : Employer array
		*Note			: nothing
		***************************************************************************************
		*/
		function getAffilliateSubscribers($affID)
		{				
			
			$query = "SELECT member_id from tbl_member m 
				left join tbl_affiliate aff 
				where (member_type='subscriber' and `isActive` !='d')
			
			select m.member_id 
			from tbl_member m 
			left join tbl_affiliate aff
			on m.member_id = aff.affiliate_id
			where m.member_type = 'affiliate' and m.isActive != 'd'			
			order by aff.organisation_name asc";			
		   
		   
	 
			
			$query = "select m.member_id 
			from tbl_member m
			left join tbl_affiliate aff
			on m.member_id = aff.affiliate_id
			where m.member_type = 'affiliate' and m.isActive != 'd'			
			order by aff.organisation_name asc";			
		   
		    $rs		=	$this->Execute($query);
		    return $this->_getPageArray($rs, 'Subscriber');
		} //ef	

		
		

		/*
		**************************************************************************************
		*Function Header
		*Function Name  : checkBillNumber
		*Function Type  : Call by value	
		*Functionality  :check a bill number exist or not
		*Input			: nothing
		*Output			: 0/1 based on 
		*Return Value   : location array
		*Note			: nothing
		***************************************************************************************
		*/		
		function checkBillNumber($legtype , $number)
		{

			$query = "select bill_id,current_disposition from tbl_bill_detail 
			where bill_number = '".$number ."' and legtype='". $legtype ."'";
			$rs = mysql_query($query);
			$bill_id = "";
			
			while($row = mysql_fetch_assoc($rs)) {
				$bill_id = $row['bill_id'];
				
				$query_article = "select article_id from tbl_affiliate_articles 
				where bill_number = '".$number ."' and legtype='". $legtype ."'";
				$rs_article = mysql_query($query_article);				
				
				if($row_article = mysql_fetch_assoc($rs_article)) {
					return "02";					
				}
				
				if($row['current_disposition'] != 'Pending')
					return "0";
			}
			//return "--".$query."--";
			return $bill_id;			
		}

		
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
		function addAffiliate($oAffiliate)
		{
			$query = "insert into tbl_member set 
			first_name='".$oAffiliate->first_name."'
			,last_name='".$oAffiliate->last_name."'
			,user_name='".$oAffiliate->username."'
			,email='".$oAffiliate->email."'
			,password=md5('".$oAffiliate->password."')
			,member_type='affiliate'
			,reg_date=now()";
			
			$rs = $this->Execute($query);
			$newid= mysql_insert_id();
			
			$oAffiliate->affiliate_code = $oAffiliate->affiliate_code.$newid;
			
			$query_affiliate = "insert into tbl_affiliate set 
			affiliate_id = '".$newid."'
			,organisation_name = '".$oAffiliate->organisation_name."'
			,affiliate_code = '".$oAffiliate->affiliate_code."'
			,promo_code = '".$oAffiliate->promo_code."'
			,description = '".$oAffiliate->description."'			
			,organisation_website ='".$oAffiliate->organisation_website."'
			,street_address = '".$oAffiliate->address."'
			,city = '".$oAffiliate->city."'
			,state = '".$oAffiliate->state."'
			,zip_code = '".$oAffiliate->postal_code."'
			,country = '".$oAffiliate->country."'";
			
			$rs_affiliate = $this->Execute($query_affiliate);
			
			return $newid;
		}
		
		
		/*
		**************************************************************************************
		*Function Header
		*Function Name  : getAllAffiliates
		*Function Type  : Call by value	
		*Functionality  : fetch all employers registered through the site.
		*Input			: nothing.
		*Output			: nothing
		*Return Value   : Employer array
		*Note			: nothing
		***************************************************************************************
		*/
		function getAllAffiliates($search_field="",$search_text="")
		{
	
			if(isset($_REQUEST["search_field"])) {
				
				if(trim($_REQUEST["search_field"]) != "") {
					
					if($_REQUEST["search_field"] == 'name') {
						
						$query = "SELECT m.member_id, aff.organisation_name as fullname, m.email, m.isActive 
						FROM tbl_member m 
						left join tbl_affiliate aff 
						on m.member_id = aff.affiliate_id 
						where (member_type='affiliate' and isActive !='d') 
						and (aff.organisation_name like '%".$search_text."%') ";
					} else {
						
						$query = "SELECT m.member_id, aff.organisation_name as fullname, m.email, m.isActive 
						FROM tbl_member m 
						left join tbl_affiliate aff 
						on m.member_id = aff.affiliate_id 
						where (member_type='affiliate' and isActive !='d') and
							".$search_field ."='".$search_text."'";
					}
				} else {
					$query = "SELECT m.member_id, aff.organisation_name as fullname, m.email, m.isActive 
					FROM tbl_member m 
					left join tbl_affiliate aff 
					on m.member_id = aff.affiliate_id 
					where (member_type='affiliate' and isActive !='d')";
				}		
			} 
			else
			{
				$query = "SELECT m.member_id, aff.organisation_name as fullname, m.email, m.isActive 
				FROM tbl_member m 
				left join tbl_affiliate aff 
				on m.member_id = aff.affiliate_id 
				where (member_type='affiliate' and isActive !='d')";
			}
		   
		    $rs		=	$this->Execute($query);
		    return $this->_getPageArray($rs, 'Affiliate');
		}//ef

		
		/*
		**************************************************************************************
		*Function Header
		*Function Name  : getAllAffiliatePayment
		*Function Type  : Call by value	
		*Functionality  : fetch all list of subscriber  of this primary affiliate
		*Input			: nothing.
		*Output			: nothing
		*Return Value   : Employer array
		*Note			: nothing
		***************************************************************************************
		*/		
		function getAllAffiliatePayment($affiliateID="", $search_field="",$search_text="")
		{	
			
			$query = "select m.member_id, concat(m.first_name,' ',m.last_name) as fullname,m.email ,
			ps.amount,"." ps.date from tbl_payment_success ps left join tbl_member m 
			 on m.member_id = ps.member_id "." where m.member_type = 'subscriber' and ps.item_name= 'membersubscription'".
				" and  ps.type_id = ". $affiliateID;
			
		    $rs		=	$this->Execute($query);
		    return $this->_getPageArray($rs, 'Affiliate');		
		}//ef
	
	
		/*
		**************************************************************************************
		*Function Header
		*Function Name  : getAllAffiliatePayment
		*Function Type  : Call by value	
		*Functionality  : fetch all employers registered through the site.
		*Input			: nothing.
		*Output			: nothing
		*Return Value   : Employer array
		*Note			: nothing
		***************************************************************************************
		*/		
		function getAffiliatePaymentAmount($affiliateID="")
		{	
			
			$query = "select sum(ps.amount) as sum ".
				" from tbl_payment_success ps 
				left join tbl_member m 
				on m.member_id = ps.member_id ".
				" where m.member_type = 'subscriber' and ps.item_name= 'membersubscription'".
				" and  ps.type_id = ". $affiliateID;
			
			$rs = $this->Execute($query);			
			
			if($row = $rs->FetchRow())
			{				
				return ($row["sum"]);				
			}
			else
			{
				return("0");
			}
		}//ef	
		
		
		/*
		**************************************************************************************
		*Function Header
		*Function Name  : updateAffiliateBannerFrontEnd
		*Function Type  : Call by value	
		*Functionality  : update the logo name 
		*Input			: object $oEmployer containing employer basic information
		*Output			: update the logo name
		*Return Value   : boolean response from database class which tells whether query is 
						  executed or not.
		*Note			: nothing
		***************************************************************************************
		*/
		function updateAffiliateBannerFrontEnd($oAffiliate)
		{
			$query= "update tbl_affiliate  set banner ='".$oAffiliate->organisation_banner."' 
			 where affiliate_id = $oAffiliate->member_id";
			
			$rs = $this->Execute($query);
			return $rs;
		}//ef
		
		
		/*
		**************************************************************************************
		*Function Header
		*Function Name  : updateAffiliateBanner
		*Function Type  : Call by value	
		*Functionality  : update the logo name 
		*Input			: object $oEmployer containing employer basic information
		*Output			: update the logo name
		*Return Value   : boolean response from database class which tells whether query is 
						  executed or not.
		*Note			: nothing
		***************************************************************************************
		*/
		function updateAffiliateBanner($oAffiliate)
		{
			$query= "update tbl_affiliate  set banner ='".$oAffiliate->organisation_banner."' 
			 where affiliate_id = $oAffiliate->affiliate_id";
			
			$rs = $this->Execute($query);
			return $rs;
		}//ef
		
		
		/*		
		*************************************************************************************
		*Function Header
		*Function Name  : getAffiliate
		*Function Type  : Call by value	
		*Functionality  : get all the getAffiliates from database	
		*Input			: nothing
		*Output			: location array
		*Return Value   : location array
		*Note			: nothing		
		*************************************************************************************
		*/
	   	function getAffiliate($member_id)
		{
			$query = "select m.*,af.*
			from tbl_member m 
			left join tbl_affiliate af 
			on m.member_id = af.affiliate_id
			where member_id = '".$member_id."' and member_type='affiliate'";
			$rs = $this->Execute($query);
			$oAffiliate = new Affiliate();
			$row = $rs->FetchRow();
			
			$oAffiliate->member_id				=		$row['member_id'];
			$oAffiliate->first_name				=		$row['first_name'];
			$oAffiliate->last_name				=		$row['last_name'];
			$oAffiliate->user_name				=		$row['user_name'];
			$oAffiliate->email					=		$row['email'];
			$oAffiliate->isActive				=		$row['isActive'];
			$oAffiliate->member_type			=		$row['member_type'];
			$oAffiliate->reg_date				=		$row['reg_date'];
			$oAffiliate->affiliate_id			=		$row['affiliate_id'];
			$oAffiliate->organisation_name		=		$row['organisation_name'];
			$oAffiliate->affiliate_code			=		$row['affiliate_code'];
			$oAffiliate->promo_code			=		$row['promo_code'];			
			$oAffiliate->banner					=		$row['banner'];
			$oAffiliate->donation_url			=		$row['donation_url'];
			$oAffiliate->organisation_website	=		$row['organisation_website'];
			$oAffiliate->street_address			=		$row['street_address'];
			$oAffiliate->city					=		$row['city'];
			$oAffiliate->state					=		$row['state'];
			$oAffiliate->zip_code				=		$row['zip_code'];
			$oAffiliate->country				=		$row['country'];
			$oAffiliate->description			=		$row['description'];
			
			return $oAffiliate;
		}//ef
		
		
		/*
		**************************************************************************************
		*Function Header
		*Function Name  : UpdateAffiliate
		*Function Type  : Call by value	
		*Functionality  : get all the getAffiliates from database	
		*Input			: nothing
		*Output			: location array
		*Return Value   : location array
		*Note			: nothing
		***************************************************************************************
		*/
	   	function UpdateProfile($member_id)
		{
		
			$pass = "";
		   	if(strlen($this->uProfile['password'])){
				$pass=", password ='".md5(trim($this->uProfile['password']))."'";
			
		   	} 
		   
			$query ="UPDATE tbl_member SET first_name='".$this->uProfile['firstName']."',
					last_name = '".$this->uProfile['lastName']."',
					email = '".$this->uProfile['email']."'{$pass}
					where member_id = '".$member_id."' and member_type='affiliate'";
		   
			
			$this->Execute($query);
			
			$query ="UPDATE tbl_affiliate SET organisation_name='".$this->uProfile['org_name']."',
					organisation_website = '".$this->uProfile['org_address']."',
					state  = '".$this->uProfile['state']."',
					zip_code = '".$this->uProfile['zip_code']."',
					country = '".$this->uProfile['country']."',
					donation_url = '".$this->uProfile['donation_url']."',
					description = '".$this->uProfile['description']."',
					street_address = '".$this->uProfile['street_address']."',
					city   = '".$this->uProfile['city']."'
					where affiliate_id = '".$member_id."'";
					
			return $this->Execute($query);
		}//ef		
		
		
		
		
		/*
		**************************************************************************************
		*Function Header
		*Function Name  : UpdateProfileFrontEnd
		*Function Type  : Call by value	
		*Functionality  : get all the getAffiliates from database	
		*Input			: nothing
		*Output			: location array
		*Return Value   : location array
		*Note			: nothing
		***************************************************************************************
		*/
	   	function UpdateProfileFrontEnd($oAffiliate)
		{		
			$pass = "";
		   	if(strlen($this->uProfile['password'])){
				$pass=", password ='".md5($oAffiliate->password)."'";			
		   	} 
		   
			$query ="UPDATE tbl_member SET first_name='".$oAffiliate->first_name."',
					last_name = '".$oAffiliate->last_name."',
					email = '".$oAffiliate->email."'{$pass}
					where member_id = '".$oAffiliate->member_id."' and member_type='affiliate'";
		   			
			$this->Execute($query);
			
			$query ="UPDATE tbl_affiliate SET organisation_name = '".$oAffiliate->organisation_name."',
					organisation_website = '".$oAffiliate->organisation_website."',
					state = '".$oAffiliate->state."',
					zip_code = '".$oAffiliate->zip_code."',
					country = '".$oAffiliate->country."',
					donation_url = '".$oAffiliate->donation_url."',
					description = '".$oAffiliate->description."',
					street_address = '".$oAffiliate->street_address."',
					city = '".$oAffiliate->city."'
					where affiliate_id = '".$oAffiliate->member_id."'";
			//die();
			$rs = $this->Execute($query);
			return $rs;
		}//ef

		
		/*
		**************************************************************************************
		*Function Header
		*Function Name  : getAffiliateID
		*Function Type  : Call by value	
		*Functionality  : get the logged in affiliate id from database	
		*Input			: nothing
		*Output			: location array
		*Return Value   : location array
		*Note			: nothing
		***************************************************************************************
		*/
	   	function addAffiliateBill($aff_id)
		{	
			/*
				echo "<pre>";
				print_r($this->mBillContent);
				die();
			*/
			$query = "INSERT INTO tbl_affiliate_articles(`affiliate_id`,`article_title`,`bill_number`,`legtype`,`indication_of_position`,
					  `voting_start`,`voting_end`,`allow_voting`,`affiliate_comment`,`created`,`article_type`,`petition_level`,`petition_state`)
					  VALUES('".$aff_id."','".$this->mBillContent->article_title."','".$this->mBillContent->bill_number."',
					  '".$this->mBillContent->legtype."',
					  '".$this->mBillContent->indication_position."','".$this->mBillContent->voting_start."',
					  '".$this->mBillContent->voting_end."','".$this->mBillContent->allow_voting."',
					  '".$this->mBillContent->affiliate_comment."','".$this->mBillContent->created."',
					  '".$this->mBillContent->article_type."','".$this->mBillContent->petition_level."','".$this->mBillContent->petition_state."')";	
			
			
			$rs = $this->Execute($query);
			return mysql_insert_id();
		}//ef
		
		
	/*
		**************************************************************************************
		*Function Header
		*Function Name  : addSponsor
		*Function Type  : Call by value	
		*Functionality  : get the logged in affiliate id from database	
		*Input			: nothing
		*Output			: location array
		*Return Value   : location array
		*Note			: nothing
		***************************************************************************************
		*/
	   	function addSponsor($aff_id)
		{	
			/*
				echo "<pre>";
				print_r($this->Sponsor);
				die();
			*/	
			
			$query = "INSERT INTO tbl_sponsors(`affiliate_id`,`sponsor_name`,`sponsor_description`,`sponsor_url`)
					  VALUES('".$aff_id."','".$this->Sponsor->sponsor_name."','".$this->Sponsor->sponsor_description."',
					  '".$this->Sponsor->sponsor_url."')";	
					  
			$rs = $this->Execute($query);
			return mysql_insert_id();
		}//ef
		
		
				
		/*
		**************************************************************************************
		*Function Header
		*Function Name  : updateSponsor
		*Function Type  : Call by value	
		*Functionality  : get the logged in affiliate id from database	
		*Input			: nothing
		*Output			: location array
		*Return Value   : location array
		*Note			: nothing
		***************************************************************************************
		*/
	   	function updateSponsor($aff_id)
		{	
			/*
				echo "<pre>";
				print_r($this->Sponsor);
				die();
			*/	
			
			$query = " update tbl_sponsors set`sponsor_name`= '".$this->Sponsor->sponsor_name."',
			`sponsor_description` = '".$this->Sponsor->sponsor_description."',
			`sponsor_url` = '".$this->Sponsor->sponsor_url."' 					  
  			 where `affiliate_id` = ".$aff_id." and id = ".$this->Sponsor->id;
					  	
					  
			$response =  $this->Execute($query);
			return $response;
		}//ef
		
		/*
		**************************************************************************************
		*Function Header
		*Function Name  : editNews
		*Function Type  : Call by value	
		*Functionality  : get the logged in affiliate id from database	
		*Input			: nothing
		*Output			: location array
		*Return Value   : location array
		*Note			: nothing
		***************************************************************************************
		*/
	   	function editNews($file=null)
		{	
			
				/*echo "<pre>";
				print_r($this->mBillContent);
				die();*/
			
			if($file!='')
			{
				$support=",support_file='".$file."'";
			}
			else
			{
				$support=" ";
			}
			$sSQL	=	"UPDATE tbl_affiliate_articles set article_title='".$this->mBillContent->article_title."',affiliate_comment='".$this->mBillContent->affiliate_comment."' $support  WHERE affiliate_id=".$this->mBillContent->affiliate_id." AND article_id=".$this->mBillContent->article_id." ";
				
			$response =  $this->Execute($sSQL);
			return $response;
			
			
		}//ef
		
		/*
		**************************************************************************************
		*Function Header
		*author			: Vikas Rana
		*Function Name  : deleteNews
		*Function Type  : Call by value	
		*Functionality  : delete articles according to the ID passed
		*Input			: nothing
		*Output			: 
		*Return Value   : nothing
		*Note			: nothing
		***************************************************************************************
		*/
	   	function deleteAffiliateContent($article_id)
		{	
							
			$sSQL	=	"DELETE from tbl_affiliate_articles WHERE article_id=".$article_id." ";
			
			if($this->Execute($sSQL))
			{
				$dSQLComment	=	"DELETE from tbl_subscriber_comment_aff_article WHERE article_id=".$article_id." ";
				$this->Execute($dSQLComment);
				return true;
			}
			else
			{
				return false;
			}
			
		}//ef
		
		/*
		**************************************************************************************
		*Function Header
		*author			: Paras Shah
		*Function Name  : deleteSponsor
		*Function Type  : Call by value	
		*Functionality  : delete Sponsors according to the ID passed
		*Input			: nothing
		*Output			: 
		*Return Value   : nothing
		*Note			: nothing
		***************************************************************************************
		*/
	   	function deleteSponsor($id)
		{								
			$sSQL	=	"DELETE from tbl_sponsors WHERE id=".$id." ";
			
			if($this->Execute($sSQL))
			{
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
		*Function Name  : deleteAffiliateArticleComment
		*Function Type  : Call by value	
		*Functionality  : 
		*Input			: 
		*Output			: 
		*Return Value   : .
		*Note			: nothing		
		*************************************************************************************
		*/
		function deleteAffiliateArticleComment($articleID,$commentID)
		{   
			$query = "delete from tbl_subscriber_comment_aff_article where article_id =".
			$articleID ." and id =".$commentID;				
				
				if($this->Execute($query))			
					return true;
				else	
					return false;
		}//ef
		
		
		
		/**************************************************************************************
		* 
		*Function Header
		*Function Name  : addAffiliateNews
		*Function Type  : Call by value	
		*Functionality  : get the logged in affiliate id from database	
		*Input			: nothing
		*Output			: location array
		*Return Value   : location array
		*Note			: nothing
		***************************************************************************************
		*/
	   	function addAffiliateNews($aff_id) {
			
			$query = "INSERT INTO tbl_affiliate_articles(`affiliate_id`,`article_title`,`affiliate_comment`,`created`,`article_type`)
					  VALUES('".$aff_id."','".$this->mBillContent->article_title."','".$this->mBillContent->affiliate_comment."','".$this->mBillContent->created."','".$this->mBillContent->article_type."')";	
			
			$rs = $this->Execute($query);
			return mysql_insert_id();
		}//ef
		
		
		/*
		**************************************************************************************
		*Function Header
		*Function Name  : updateAffiliateArticle
		*Function Type  : Call by value	
		*Functionality  : update the logo name 
		*Input			: object $mBillContent containing bill basic information
		*Output			: update the support file
		*Return Value   : boolean response from database class which tells whether query is 
						  executed or not.
		*Note			: nothing
		***************************************************************************************
		*/
		function updateAffiliateArticle($mBillContent)
		{
			$query= "update tbl_affiliate_articles set support_file ='".$mBillContent->support_file."' where article_id = $mBillContent->id";	
			$rs = $this->Execute($query);			
			return $rs;
		}//ef
		
		
		/**************************************************************************************
		*Function Header
		*Function Name  : getAffiliateID
		*Function Type  : Call by value	
		*Functionality  : get the logged in affiliate id from database	
		*Input			: nothing
		*Output			: location array
		*Return Value   : location array
		*Note			: nothing
		***************************************************************************************
		*/
	   	function getAffiliateID($username)
		{
			$query = "select member_id
			from tbl_member 
			where user_name = '".$username."' and member_type='affiliate'";
			$rs = $this->Execute($query);
			$row = $rs->FetchRow();
			$member_id	=	$row['member_id'];
			return $member_id;
		}//ef
		
		
		/*
		**************************************************************************************
		*Function Header
		*Function Name  : checkDuplication
		*Function Type  : Call by value	
		*Functionality  : checks that Email or Username already exists or not.
		*Input			: email id.
		*Output			: employer array in case email id exists.
		*Return Value   : array
		*Note			: nothing
		***************************************************************************************
		*/
		function checkDuplication($oAffiliate)
		{
			$sSQL_username	=	"select * from tbl_member 
			where user_name='".$oAffiliate->username."'";
			$rs_username	=	$this->Execute($sSQL_username);
			if($rs_username->RecordCount()) {
				return "username";
			}			
			
			$sSQL_Email	=	"select * from tbl_member 
			where email='".$oAffiliate->email."' and isActive !='d'";
			$rs_Email	=	$this->Execute($sSQL_Email);
			if($rs_Email->RecordCount()) {
				return "email";
			}
			
			$sSQL_Promo	=	"select * from tbl_affiliate aff, tbl_member mem
							 	where aff.affiliate_id = mem.member_id and 
								aff.promo_code='".$oAffiliate->promo_code."' 
								and mem.isActive !='d'";
			
			$rs_Promo	=	$this->Execute($sSQL_Promo);			
			if($rs_Promo->RecordCount()) {
				return "promo_code";
			}

			
			
			return "notfound";
		}//ef
		
		
		/*
		**************************************************************************************
		*Function Header
		*Function Name  : checkDuplicationEdit
		*Function Type  : Call by value	
		*Functionality  : checks that Email or Username already exists or not.
		*Input			: email id.
		*Output			: employer array in case email id exists.
		*Return Value   : array
		*Note			: nothing
		***************************************************************************************
		*/
		function checkDuplicationEdit($oAffiliate)
		{
			$sSQL_Email	=	"select * from tbl_member 
			where email='".$oAffiliate->email."' and member_id !='".$oAffiliate->member_id."' and isActive !='d'";
			$rs_Email	=	$this->Execute($sSQL_Email);
			if($rs_Email->RecordCount()) {
				return "email";
			}
			
			return "notfound";
		}//ef
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
		function getAffiliateVoteAlerts( $affiliateID = null,$page =1,$limit = 5)
		{
								
			# fetch articles
			if($limit != "") {
				 
				$start = ($page - 1)*$limit;			
				$query = "select * from tbl_affiliate_articles 
				where affiliate_id = $affiliateID and article_type='bill' 
				order by article_id desc limit  $start , $limit ";
			} else {
				
				$query = "select * from tbl_affiliate_articles 
				where affiliate_id = $affiliateID and article_type='bill' 
				order by article_id desc";
			}															
			$rs = $this->Execute($query);
					
			$myAffiliateArticles = array();
			while($row = $rs->FetchRow()) {
				$desc = substr($row['affiliate_comment'],0,100);
				$row['affiliate_comment'] = $desc;
				$myAffiliate		= $row;
				array_push($myAffiliateArticles,$myAffiliate);	
			}
			return $myAffiliateArticles;
		}//ef
		
		
		/*
		**************************************************************************************
		*Function Header
		*Function Name  : getAffiliateAlerts
		*Function Type  : Call by value	
		*Functionality  : get article details
		*Input			: nothing
		*Output			: location array
		*Return Value   : location array
		*Note			: nothing
		***************************************************************************************
		*/
		function getAffiliateAlertsMain($affiliateID = null)
		{
								
			# fetch articles 
			$query = "select * from tbl_affiliate_articles 
			where affiliate_id = $affiliateID and (article_type='bill' or article_type='petition') 
			order by article_id desc";
															
			$rs = $this->Execute($query);
					
			$myAffiliateArticles = array();
			while($row = $rs->FetchRow()) {
				$desc = substr($row['affiliate_comment'],0,100);
				$row['affiliate_comment'] = $desc;
				$myAffiliate		= $row;
				array_push($myAffiliateArticles,$myAffiliate);	
			}
			return $myAffiliateArticles;
		}//ef
		
		
		/*
		**************************************************************************************
		*Function Header
		*Function Name  : getAffiliateAlerts
		*Function Type  : Call by value	
		*Functionality  : get article details
		*Input			: nothing
		*Output			: location array
		*Return Value   : location array
		*Note			: nothing
		***************************************************************************************
		*/
		function getAffiliateAlerts($affiliateID = null,$page =1,$limit = 5)
		{
								
			# fetch articles 
			$start = ($page - 1)*$limit;			
			$query = "select * from tbl_affiliate_articles 
			where affiliate_id = $affiliateID and (article_type='bill' or article_type='petition') 
			order by article_id desc limit  $start , $limit ";
															
			$rs = $this->Execute($query);
					
			$myAffiliateArticles = array();
			while($row = $rs->FetchRow()) {
				$desc = substr($row['affiliate_comment'],0,100);
				$row['affiliate_comment'] = $desc;
				$myAffiliate		= $row;
				array_push($myAffiliateArticles,$myAffiliate);	
			}
			return $myAffiliateArticles;
		}//ef
		

		/*
		**************************************************************************************
		*Function Header
		*Function Name  : getAffiliatePetitions
		*Function Type  : Call by value	
		*Functionality  : get article details
		*Input			: nothing
		*Output			: location array
		*Return Value   : location array
		*Note			: nothing
		***************************************************************************************
		*/
		function getAffiliatePetitions( $affiliateID = null,$page =1,$limit = 5)
		{
			$myAffiliateArticles = array();
			# fetch bills
			if($limit != "") {
				 
				$start = ($page - 1)*$limit;			
				$query = "select * from tbl_affiliate_articles 
				where affiliate_id = $affiliateID and article_type='bill' 
				order by article_id desc limit  $start , $limit ";
			} else {
				
				$query = "select * from tbl_affiliate_articles 
				where affiliate_id = $affiliateID and article_type='bill' 
				order by article_id desc";
			}															
			$rs = $this->Execute($query);
			
			while($row = $rs->FetchRow()) {
				$desc = substr($row['affiliate_comment'],0,100);
				$row['affiliate_comment'] = $desc;
				$myAffiliate		= $row;
				array_push($myAffiliateArticles,$myAffiliate);	
			}
			
			# fetch articles 
			if($limit != "") {
				
				$start = ($page - 1)*$limit;			
				$query = "select * from tbl_affiliate_articles 
				where affiliate_id = $affiliateID and article_type='petition'
					
				order by article_id desc limit  $start , $limit ";
			} else {
				
				$query = "select * from tbl_affiliate_articles 
				where affiliate_id = $affiliateID and article_type='petition' 
				order by article_id desc";				
			}											
			$rs = $this->Execute($query);
					
			
			while($row = $rs->FetchRow()) {
				$desc = substr($row['affiliate_comment'],0,100);
				$row['affiliate_comment'] = $desc;
				$myAffiliate		= $row;
				array_push($myAffiliateArticles,$myAffiliate);	
			}
			
			
			return $myAffiliateArticles;
		}//ef


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
		function getAffiliateNews( $affiliateID = null,$page =1,$limit = 5)
		{
								
			# fetch articles
			if($limit != "") { 
				
				$start = ($page - 1) * $limit;			
				$query = "select * from tbl_affiliate_articles 
				where affiliate_id = '$affiliateID' and article_type='news' 
				order by article_id desc limit  $start , $limit ";
			} else {
				
				$query = "select * from tbl_affiliate_articles 
				where affiliate_id = '$affiliateID' and article_type='news' 
				order by article_id desc";				
			}												
			$rs = $this->Execute($query);
					
			$myAffiliateArticles = array();
			while($row = $rs->FetchRow()) {
				$desc = substr($row['affiliate_comment'],0,100);
				$row['affiliate_comment'] = $desc;
				$myAffiliate		= $row;
				array_push($myAffiliateArticles,$myAffiliate);	
			}
			return $myAffiliateArticles;
		}//ef
		

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
		function getAffiliateBulletin( $affiliateID = null,$page =1,$limit = 5)
		{
								
			# fetch articles 
			if($limit != ""){
				
				$start = ($page - 1)*$limit;			
				$query = "select * from tbl_affiliate_articles 
				where affiliate_id = '$affiliateID'  and article_type='bulletin' 
				order by article_id desc limit  $start , $limit ";
			} else {
				
				$query = "select * from tbl_affiliate_articles 
				where affiliate_id = '$affiliateID'  and article_type='bulletin' 
				order by article_id desc";
			}
															
			$rs = $this->Execute($query);
					
			$myAffiliateArticles = array();
			while($row = $rs->FetchRow()) {
				$desc = substr($row['affiliate_comment'],0,100);
				$row['affiliate_comment'] = $desc;
				$myAffiliate		= $row;
				array_push($myAffiliateArticles,$myAffiliate);	
			}
			return $myAffiliateArticles;
		}//ef
				
		
		/*
		**************************************************************************************
		*Function Header
		*Function Name  : getAffiliateArticleDetail

		*Function Type  : Call by value	
		*Functionality  : fetch all employers registered through the site.

		*Input			: nothing.
		*Output			: nothing
		*Return Value   : Employer array
		*Note			: nothing
		***************************************************************************************
		*/
		function getAffiliateArticleDetail($affiliateID = NULL ,$articleID =NULL)
		{
		
			# fetch articles 
			$query = "select * from tbl_affiliate_articles 
			where affiliate_id = $affiliateID and article_id = $articleID";
														
			$rs = $this->Execute($query);
			$myAffiliateArticles = array();
			
			if($rs) {
				while($row = $rs->FetchRow()) {
					## no need of current disposition in case of petition 
					$number  = $row["bill_number"];
					$legtype = $row["legtype"];
					$newQuery = "select bill_id, current_disposition, bill_status_action_text, bill_location 
					from tbl_bill_detail where bill_number = '".$number ."' and legtype='". $legtype ."'";
					$newrs = mysql_query($newQuery);
															
					while($rowNew = mysql_fetch_assoc($newrs)) {
						$row["current_disposition"] = $rowNew["current_disposition"]; 						

					}
					
					$myAffiliate		= $row;
					array_push($myAffiliateArticles,$myAffiliate);					
				}
			}
			return $myAffiliateArticles;
		}


				
		

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
		*Function Name  : getArticleDetailOneTime
		*Function Type  : Call by value	
		*Functionality  : fetch article details 
		*Input			: nothing.
		*Output			: nothing
		*Return Value   : Employer array
		*Note			: nothing
		***************************************************************************************
		*/
		function getArticleDetailOneTime($articleID =NULL)
		{
		
			# fetch articles 
			$query = "select * from tbl_affiliate_articles where article_id = '$articleID'";
														
			$rs = $this->Execute($query);
					
			$myAffiliateArticles = array();
			
			while($row = $rs->FetchRow()) {
				
				## no need of current disposition in case of petition 
				$number  = $row["bill_number"];
				$legtype = $row["legtype"];
				$newQuery = "select bill_id,current_disposition from tbl_bill_detail 
				where bill_number = '".$number ."' and legtype='". $legtype ."'";
				$newrs = mysql_query($newQuery);
													
				while($rowNew = mysql_fetch_assoc($newrs)) {
					$row["current_disposition"] = $rowNew["current_disposition"]; 						
				}
				$myAffiliate		= $row;
				array_push($myAffiliateArticles,$myAffiliate);
			}
			
			return $myAffiliateArticles;
		}
		
		
		/*
		**************************************************************************************
		*Function Header
		*Function Name  : getAffiliateNewsDetail
		*Function Type  : Call by value	
		*Functionality  : fetch all employers registered through the site.
		*Input			: nothing.
		*Output			: nothing
		*Return Value   : Employer array
		*Note			: nothing
		***************************************************************************************
		*/
		function getAffiliateNewsDetail($affiliateID = NULL ,$articleID =NULL)
		{
		
			# fetch articles 
			$query = "select * from tbl_affiliate_articles 
			where affiliate_id = $affiliateID and article_id = $articleID";
														
			$rs = $this->Execute($query);
					
			$myAffiliateArticles = array();
			
			while($row = $rs->FetchRow()) {
				$myAffiliate		= $row;
				array_push($myAffiliateArticles,$myAffiliate);
			}
			
			return $myAffiliateArticles;		
		}
		
		
		/*
		**************************************************************************************
		*Function Header
		*Function Name  : getAffiliateSponsorDetail
		*Function Type  : Call by value	
		*Functionality  : fetch all employers registered through the site.
		*Input			: nothing.
		*Output			: nothing
		*Return Value   : Employer array
		*Note			: nothing
		***************************************************************************************
		*/
		function getAffiliateSponsorDetail($affiliateID = NULL ,$sponsorID =NULL)
		{
		
			# fetch articles 
			$query = "select * from tbl_sponsors
			where affiliate_id = $affiliateID and id = $sponsorID";
			
			$rs = $this->Execute($query);
					
			$myAffiliateSponsors = array();
			
			while($row = $rs->FetchRow()) {
				$myAffiliate		= $row;
				array_push($myAffiliateSponsors,$myAffiliate);
			}

			
			return $myAffiliateSponsors;		
		}
		
		
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
		function getVotingStatus($articleID = NULL,&$support = 0 ,&$total =0 )
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
		**********************************************************************************
		*Function Header
		*Function Name  : getSubscriberCommentForBulletin
		*Function Type  : Call by value	
		*Functionality  : fetch subscriber comments to affiliate articel 
		*Input			: 
		*Output			: 
		*Return Value   : 
		*Note			: 
		*********************************************************************************
		*/
		function getSubscriberCommentForAffArticle( $articleID = NULL )
		{
			$query = "select * from `tbl_subscriber_comment_aff_article` `com_article` left join  `tbl_member` m
				on com_article.subscriber_id = m.member_id
				where com_article.`article_id` = $articleID";
			
			$subscribersComment = array();
			
			$rs = $this->Execute($query);
			while($row = $rs->FetchRow()) {				
				array_push($subscribersComment,$row);	
			}			
			return $subscribersComment;
		}


		
		/*
		************************************************************************************
		*Function Header
		*Function Name  : getAffiliatesList
		*Function Type  : Call by value	
		*Functionality  : 	
		*Input			: 
		*Output			: 
		*Return Value   : 
		*Note			: 		
		************************************************************************************
		*/
		function getAffiliatesList()
		{
			$query = "select a.affiliate_id, concat(m.first_name,' ', m.last_name) as name, a.organisation_name, m.reg_date, a.banner, a.description 
			from tbl_member m 
			left join tbl_affiliate a 
			on m.member_id = a.affiliate_id 
			where m.member_type = 'affiliate' and isActive <> 'd'";

			$rs = $this->Execute($query);
		    return $this->_getPageArray($rs, 'Affiliate');
		}//ef		

		
		/**************************************************************************************
		*Function Header
		*Function Name  : function getAffiliateDetails($affID)
		*Function Type  : Call by value	
		*Functionality  : Used to get the details of the employer from the database
		*Input			: emp id
		*Output			: object containing employer details
		*Return Value   : nothing
		*Note			: nothing
		****************************************************************************************/		
		function getAffiliateDetails($affID)
		{
			$query = "select m.*,a.* from tbl_member m 	left join tbl_affiliate a
			on m.member_id = a.affiliate_id where m.member_id = '".$affID."'";
			
			$rs		=	$this->Execute($query);
			return $this->_getPageArray($rs, 'Affiliate');
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
		*Function Name  : getTotalSigns
		*Function Type  : Call by value	
		*Functionality  : 	
		*Input			: 
		*Output			: 
		*Return Value   : 
		*Note			: 		
		************************************************************************************
		*/
		function getTotalSigns($articleID)
		{
			$query = "select v.member_id, m.first_name, m.last_name, sub.mail_zip_code
			from tbl_vote_status v 
			left join tbl_member m 
			on v.member_id = m.member_id 
			left join tbl_subscriber sub 
			on m.member_id = sub.subscriber_id 
			where affiliate_article_id = '".$articleID."' 
			order by m.first_name, m.last_name";
			
			$rs = $this->Execute($query);
						
		    return $this->_getPageArray($rs, 'Affiliate');
		}//ef				
	};//ec
?>