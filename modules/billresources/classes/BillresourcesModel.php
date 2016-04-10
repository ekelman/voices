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
	

	class BillResourcesModel extends Model
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
			
		function BillResourcesModel()
		{
			parent::Model();
		}
		
		/*
		**********************************************************************************
		*Function Header
		*Function Name  : getBillDetail
		*Function Type  : Call by value	
		*Functionality  : 
		*Input			: 
		*Output			: 
		*Return Value   : 
		*Note			: nothing
		*********************************************************************************
		*/
		
		function getBillDetail( $billNumber = '' )
		{
			
			## only those bills will get displayed for which there are entries in tbl_affiliate_articles
			
			if($billNumber =='')
				$query = " select * from tbl_bill_detail where  bill_number in  (select distinct  bill_number from 
				tbl_affiliate_articles)	";
			else
				$query = " select * from tbl_bill_detail where bill_number = ".$billNumber;

			$rs = $this->Execute($query);
			$billarr = array();
			
			while($row = $rs->FetchRow()) {

				
				if($billNumber =='')
					$row['bill_summary'] = substr($row['bill_summary'],0,100);
					array_push($billarr,$row);	
			}
			
			return $billarr;
		}
		
		
		/*
		**********************************************************************************
		*Function Header
		*Function Name  : getAffiliateDetail
		*Function Type  : Call by value	
		*Functionality  : 
		*Input			: 
		*Output			: 
		*Return Value   : 
		*Note			: nothing
		*********************************************************************************
		*/
		
		
		function getAffiliateDetail( $billNumber , $support)
		{		
			$query = "select tbd.article_id,tbd.affiliate_comment, tbd.indication_of_position, mem.first_name ,mem.last_name, aff.organisation_name  
			from tbl_affiliate_articles tbd
			left join tbl_member mem
			on tbd.affiliate_id  = mem.member_id
			left join tbl_affiliate aff
			on mem.member_id = aff.affiliate_id
			where  
			bill_number = ".$billNumber." and tbd.indication_of_position = '" .$support . "'";
			
			$rs = $this->Execute($query);
			$affarr = array();
			
			while($row = $rs->FetchRow()) {				
				array_push($affarr,$row);	
			}
			
			return $affarr;			
		}
		
		
		
	};//ec
?>