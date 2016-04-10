<?php
	/*	**********************************************************************************************************
	* Author Name			: Paras Shah
	* Creation Date 		: 30th July-2011
	* FileName 				: AccessionModel.php	
	* Called From 			: AccessionController classes.
	* Description 			: AccessionModel class is inhertited from model class and is used to                               execute queries on the site.
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
	

	class AccessionModel extends Model
	{
			
		/*
		**************************************************************************************
		*Function Header
		*Function Name  : AccessionModel
		*Function Type  : constructor
		*Functionality  : this fumction intializes Subscriber class and inherits model class
		*Input			: nothing
		*Output			: initialized objects
		*Return Value   : all the initialized values.
		*Note			: nothing
		***************************************************************************************
		*/
			
		function AccessionModel()
		{
			parent::Model();
		}
			/*

	
		/***************************************************************************************
		*Function Header
		*Function Name  : get User Type Data 
		*Function Type  : call by value
		*Functionality  : this function fetches all the data related to different user type. 
		*Output			: NIL.
		*Return Value   : NIL.
		*Note			: NIL
		****************************************************************************************/


		function getUserTypeInfo() {
			
			$query = "select * from tbl_usergroups where id<>1";			
			$rs = $this->Execute($query);
			$userCategory = array();
			
			while($row = $rs->FetchRow())
			{
				$category_id = $row['id'];
				$category_name = htmlspecialchars_decode(stripslashes(ucfirst($row['name'])));
				$userCategory[$category_id] = $category_name;
			}
			
			return $userCategory;			
			
		}//End Function
		
		/***************************************************************************************
		*Function Header
		*Function Name  : get Capabilities DAta 
		*Function Type  : call by value
		*Functionality  : this function fetches all the data related to different user type. 
		*Output			: NIL.
		*Return Value   : NIL.
		*Note			: NIL
		****************************************************************************************/

		
		
		function getCapabilityInfo() {
			
			$query = "select * from tbl_capabilities where is_active=1";			
			$rs = $this->Execute($query);
			$capability = array();
			
			while($row = $rs->FetchRow())
			{
				$capability_id = $row['id'];
				$capability_name = htmlspecialchars_decode(stripslashes($row['capability_name']));
				$capability[$capability_id] = $capability_name;
			}
			
			return $capability;			
			
		}//End Function
		
		
		/***************************************************************************************
		*Function Header
		*Function Name  : get Content Data 
		*Function Type  : call by value
		*Functionality  : this function fetches all the data related to different content 
		* [ Section , category , content ] 
		*Output			: NIL.
		*Return Value   : NIL.
		*Note			: NIL
		****************************************************************************************/
		
		
		function getContentData() {
			
			$query = "select * from tbl_contents where is_active=1";			
			$rs = $this->Execute($query);
			$contents = array();
			$content = array();
			
			while($row = $rs->FetchRow())
			{
				$content['id'] 					= $row['id'];
				$content['section_name'] 		= $row['section_name'];
				$content['category_name'] 		= $row['category_name'];
				array_push($contents,$content);				
			}
			
			return $contents;		
			
		}//End Function
		
	
		/***************************************************************************************
		*Function Header
		*Function Name  : get permission for a content for a user  
		*Function Type  : call by value
		*Functionality  : this function fetches permissions for a user   
		* [ Section , category , content ] 
		*Output			: NIL.
		*Return Value   : NIL.
		*Note			: NIL
		****************************************************************************************/
		
		function getAccessPermissionArray($userID) {
			
			$accessions =array();
			$accession =array();
			
			$query = "select * from tbl_accessions where usergroup_id = ".$userID;			
			$rs = $this->Execute($query);
			
			while($row = $rs->FetchRow())
			{
				$accession['id'] 				= $row['id'];
				$accession['content_id'] 		= $row['content_id'];
				$accession['capability_id']		= $row['capability_id'];												
				$accession['permission']		= $row['permission'];
				array_push($accessions,$accession);				
			}
			
			return $accessions;		
			
		}//End Function
		
		
		
		/***************************************************************************************
		*Function Header
		*Function Name  : get permission for a content for a user  
		*Function Type  : call by value
		*Functionality  : this function fetches permissions for a user   
		* [ Section , category , content ] 
		*Output			: NIL.
		*Return Value   : NIL.
		*Note			: NIL
		****************************************************************************************/
		
		function getAccessPermission($userID,$section,$category,$content) {
			
			$permission	= false;									
			
			$query = "select * from tbl_accessions,	tbl_contents, tbl_capabilities
where usergroup_id = " . $userID . " and section_name = '".$section."' and 
category_name = '".$section."' and capability_name = '".$category."'";			

			echo $query; 
			
			$rs = $this->Execute($query);
			
			while($row = $rs->FetchRow())
			{
				$permission	= $row['permission'];									
			}
			
			return $permission;					
		}//End Function
		
		
		
	
		/***************************************************************************************
		*Function Header
		*Function Name  : saving permission data for a user 
		*Function Type  : call by value
		*Functionality  : this function fetches permissions for a user   
		* [ Section , category , content ] 
		*Output			: NIL.
		*Return Value   : NIL.
		*Note			: NIL
		****************************************************************************************/		
		function saveUserInfo($userID = NULL,$contentID= NULL, $capabilityID= NULL,$permission= NULL)
		{
			
				$selectQuery = "select id from  tbl_accessions where 
					usergroup_id='".$userID."' and content_id 	='".$contentID."' and capability_id ='".$capabilityID."'";

				$rs = $this->Execute($selectQuery);
				
				if($row = $rs->FetchRow())			
				{		
					$id = $row['id'];
					
					$query = " update tbl_accessions set 
						  usergroup_id   ='".$userID."'
						, content_id 	='".$contentID."'
						, capability_id ='".$capabilityID."'
						, permission    ='".$permission."' 
						  where id      =".$id;
					
					if($permission == 'N/A')			
					{
						$query = "delete from tbl_accessions where id =".$id;						
					}
					
					$rs = $this->Execute($query);
				
					return $id;
						
				}
				else if($permission !='N/A')
				{					
					$query = " insert into tbl_accessions set 
						 usergroup_id   ='".$userID."'
						, content_id 	='".$contentID."'
						, capability_id ='".$capabilityID."'
						, permission    ='".$permission."'";
					
					
					$rs = $this->Execute($query);
				
					if($rs)
						$newid = mysql_insert_id();
					else
						$newid = 0;	
					
					return $newid; 
				}
				
				
		}	



	
		/***************************************************************************************
		*Function Header
		*Function Name  : check access permission for a page or area or module for user
		*Function Type  : call by value
		*Functionality  : this function fetches permissions for a user   
		* [ Section , category , content ] 
		*Output			: NIL.
		*Return Value   : 1  if user is allowed to access otherwise zero.	
		*Note			: NIL
		## checkAccessPermission( 'Administrator', 'ER Content', 'News', 'View')
		****************************************************************************************/
		
		function checkAccessPermission()
		{	
			if(isset($_SESSION))
			{
				
				$userType = $_SESSION['member_type'];
				
				#####################				
				$accessions =array();
				$accession =array();
			
				$query = "select CON.section_name as `section`, CON.category_name as `category`, CAP.capability_name as `capability`, ACC.permission  as `permission` 
								from 
						 tbl_usergroups USG, tbl_accessions ACC , tbl_contents CON, tbl_capabilities CAP 							
								where 
						ACC.content_id = CON.id and ACC.capability_id = CAP.id 	and ACC.usergroup_id = USG.id and USG.name = '".$userType."' ";				
				//echo $query; 
				$rs = $this->Execute($query);
			
				while($row = $rs->FetchRow())
				{
					$_SESSION[ $row['section'] ][ $row['category'] ][ $row['capability'] ] = $row['permission']; 
					
				}			
			}	
		}		
		
		/***************************************************************************************
		*Function Header
		*Function Name  : saving permission data for a user 
		*Function Type  : call by value
		*Functionality  : this function fetches permissions for a user   
		* [ Section , category , content ] 
		*Output			: NIL.
		*Return Value   : NIL.
		*Note			: NIL
		****************************************************************************************/
		function checkSpecificAccessPermission($section = NULL, $category = NULL, $capability = NULL)
		{	
			$accessPermission = 0;
			
			if(isset($_SESSION))
			{				
				$userType = $_SESSION['member_type'];
				
				## Fetching user type 
				$selectQuery = " select ACC.permission as Permission			
							from 
				tbl_usergroups USG, tbl_accessions ACC, tbl_contents CON, tbl_capabilities CAP
							where 
				ACC.content_id = CON.id and CON.section_name = '". $section ."' and CON.category_name = '".$category."'  
				and ACC.capability_id = CAP.id and CAP.capability_name  = '".$capability."' 
				and ACC.usergroup_id = USG.id and USG.name = '".$userType."' ";

				$rs = $this->Execute($selectQuery);
					
				if($row = $rs->FetchRow())			
				{		
					$permission = $row['Permission'];				
					if($permission == 'Y')
					{
						$accessPermission = 1;
					}
				}					
			
			}		
			return $accessPermission;
		}		
		
		
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
		function checkDuplication($groupname)
		{
			$sSQL	=	"select id from tbl_usergroups where `name`='".$groupname."'";
			$rs	=	$this->Execute($sSQL);
			if($rs->RecordCount()) {
				return true;
			}			
			
			return false;
		}//ef
		
		
		/***************************************************************************************
		*Function Header
		*Function Name  : saving permission data for a user 
		*Function Type  : call by value
		*Functionality  : this function fetches permissions for a user   
		* [ Section , category , content ] 
		*Output			: NIL.
		*Return Value   : NIL.
		*Note			: NIL
		****************************************************************************************/
		function addSubscriberGroup($oMember)
		{	
			 
			$query_usergroups = "insert into tbl_usergroups set 
			`name`='".$oMember->name."'
			,promo_code='".$oMember->promo_code."'
			,subscription_price='".$oMember->subscription_price."'
			,assigned_affiliates='".$oMember->assigned_affiliates."'";
			
			$rs_usergroups 	= $this->Execute($query_usergroups);
			$newid	= mysql_insert_id();
			
			
			if($newid) {
				
				$accessions =array();
				$accession =array();
				
				$query = "select * from tbl_accessions where usergroup_id = 3";			
				$rs = $this->Execute($query);
				
				while($row = $rs->FetchRow())
				{
					$accession['content_id'] 		= $row['content_id'];
					$accession['capability_id']		= $row['capability_id'];												
					$accession['permission']		= $row['permission'];
					array_push($accessions,$accession);				
				}
				/*
				echo "<pre>";
				print_r($accessions);
				die();
								
				$asdsad = "sdsadas";
				
				 * */
				foreach ($accessions as $accession_insert) {
					$query_accessions = "insert into tbl_accessions set 
						 usergroup_id = '".$newid."', content_id = '".$accession_insert['content_id']."', 
						 capability_id = '".$accession_insert['capability_id']."', 
						 permission = '".$accession_insert['permission']."'";
										
					$rs_accessions = $this->Execute($query_accessions);
				}
			}
			return $newid;
		}//ef

		
		/*
		**************************************************************************************
		*Function Header
		*Function Name  : getUsersList
		*Function Type  : Call by reference
		*Functionality  : get record of the page corresponding to page id.	
		*Input			: page id
		*Output			: Page object
		*Return Value   : object
		*Note			: nothing
		***************************************************************************************
		*/
		function getUsersList(){
			$sSQL = "SELECT * FROM tbl_usergroups where id !=1";
			$rs = $this->Execute($sSQL);
			return $this->_getPageArray($rs, 'Member');
		}//ef
		
		
		/*
		**************************************************************************************
		*Function Header
		*Function Name  : getUserGroupDetails
		*Function Type  : Call by reference
		*Functionality  : get record of the .	
		*Input			: page id
		*Output			: Page object
		*Return Value   : object
		*Note			: nothing
		***************************************************************************************
		*/
		function getUserGroupDetails($UserGroup_id){
			$sSQL = "SELECT * FROM tbl_usergroups where id='".$UserGroup_id."'";
			$rs = $this->Execute($sSQL);
			return $this->_getPageArray($rs, 'Member');
		}//ef
		
		
		/***************************************************************************************
		*Function Header
		*Function Name  : updateSubscriberGroup 
		*Function Type  : call by value
		*Functionality  : this function fetches permissions for a user   
		* [ Section , category , content ] 
		*Output			: NIL.
		*Return Value   : NIL.
		*Note			: NIL
		****************************************************************************************/
		function updateSubscriberGroup($oMember)
		{	
			$query_usergroups = "Update tbl_usergroups set 
			subscription_price='".$oMember->subscription_price."'
			,assigned_affiliates='".$oMember->assigned_affiliates."'
			where id='".$oMember->id."'";
			
			$rs_usergroups 	= $this->Execute($query_usergroups);
			//die();
			return $rs_usergroups;
		}		
	};//ec
?>