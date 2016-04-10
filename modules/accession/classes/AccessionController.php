<?php
	/****************************************************************************************
		* Author Name 		: Gagandeep Kaur
		* Creation Date		: 23 May-2007
		* FileName 			: EmployerController.php	
		* Called From 		: Admin index page

		* Description 		: EmployerController file is used to control the EmployerModel and EmployerView files,it passes control according to the operation required.

		* Components Used	: Validation for server side validations
		* Tables Accessed	: none
		* Program Specs		: nothing 
		* UTP doc			: nothing
		* Tested By			: nothing
	*********************************************************************************************/
	
	require_once($_CONF['ModulesPath'].'accession/classes/AccessionModel.php');	//this class contains all the queries related to Category class 
	require_once($_CONF['ModulesPath'].'system/classes/Validation.php');	//this class contains fucntions to create server side validations
	require_once($_CONF['ModulesPath'].'system/functions.php');				//this class contains all the queries related to search categories

	//contains some common data classes 
	require_once($_CONF['ModulesPath'].'system/classes/dataclasses.php');								    
	
	/******************************************************************
	*Class Header
	*Class Name		: EmployerController
	*Functionality	: This class controls EmployerModel and EmployerView to 
					  handle employer related function on the site.
	*Note        	: EmployerController inherits AdminController that 
 	                  contains functions for the admin site.
	*******************************************************************/

	class AccessionController extends AdminController {
		
	/***************************************************************************************
	*Function Header
	*Function Name  : AccessionController
	*Function Type  : Constructor	
	*Functionality  : Initializes objects of different classes 
	*Input			: nothing
	*Output			: Class objects
	*Return Value   : nothing
	*Note			: nothing
	****************************************************************************************/
			
		function AccessionController(){
			global $_CONF;
			parent::AdminController();
			$this->oView = new AccessionView();
			$this->oModel = new AccessionModel();
		}//ef
		
	/*************************************************************************************************
		*Function Header
		*Function Name  : manage_permissions
		*Function Type  : call by value
		*Functionality  : displays the form to change password
		*Input			: nothing
		*Output			: displays the form to change password
		*Return Value   : Boolean
		*Note			: nothing
		*********************************************************************************************/
		function manage_permissions($userID = NULL) {
			
			if($_REQUEST['msg']==1)	{
				$sMsg="New subscriber group has been added successfully.";
			} 
			
			if(isset($_REQUEST["userID"])) {			
				$userID = $_REQUEST["userID"];				
			}	
			else {
				$userID = 2; // Administrator
			}
			
			//$_SESSION['LeftClick'] = "Manage Permissions";
			//$value = $this->oModel->checkAccessPermission( 'Administrator', 'ER Content', 'News', 'View');
			
		
			$userType 		= $this->oModel->getUserTypeInfo();			
			$capabilityType = $this->oModel->getCapabilityInfo();
			$contentData 	= $this->oModel->getContentData();
			
				
			$permissionData = $this->oModel->getAccessPermissionArray($userID);
			
			$permission 	= array();
			
			foreach($permissionData as $perm) {
				$permission[ $perm['content_id'] ][ $perm['capability_id'] ] = $perm['permission'];
			}
			
			/*
				echo "<pre>";
				print_r($permission);
			*/	
			
			$this->oView->sErrorMsg 		= $sMsg;
			$this->oView->userID 			= $userID;
			$this->oView->userType 			= $userType;
			$this->oView->capabilityType 	= $capabilityType;
			$this->oView->contentData 		= $contentData;
			$this->oView->permissionData 	= $permission;
																
			## fetching user type			
			$this->oView->manage_permissions();
		}		
		
		
		/*************************************************************************************************
		*Function Header		
		*Function Name  : edit_permissions
		*Function Type  : call by value
		*Functionality  : displays the form to edit permission
		*Input			: nothing
		*Output			: displays the form to edit permission
		*Return Value   : Boolean
		*Note			: nothing
		*********************************************************************************************/
		function edit_permissions() {

			if($_REQUEST['msg']==1)	{
				$sMsg="New subscriber group has been added successfully.";
			} 
			
			if(isset($_REQUEST["userID"])) {			
				$userID = $_REQUEST["userID"];				
			}	
			else {
				$userID = 2; // Administrator
			}
			
			//$_SESSION['LeftClick'] = "Manage Permissions";
			//$value = $this->oModel->checkAccessPermission( 'Administrator', 'ER Content', 'News', 'View');
			
		
			$userType 		= $this->oModel->getUserTypeInfo();			
			$capabilityType = $this->oModel->getCapabilityInfo();
			$contentData 	= $this->oModel->getContentData();
			
				
			$permissionData = $this->oModel->getAccessPermissionArray($userID);
			
			$permission 	= array();
			
			foreach($permissionData as $perm) {
				$permission[ $perm['content_id'] ][ $perm['capability_id'] ] = $perm['permission'];
			}
			
			/*
				echo "<pre>";
				print_r($permission);
			*/	
			
			$this->oView->sErrorMsg 		= $sMsg;
			$this->oView->userID 			= $userID;
			$this->oView->userType 			= $userType;
			$this->oView->capabilityType 	= $capabilityType;
			$this->oView->contentData 		= $contentData;
			$this->oView->permissionData 	= $permission;
																
			## fetching user type			
			$this->oView->edit_permissions();
		
		}		
		
		
		
		/*************************************************************************************************
		*Function Header		
		*Function Name  : save_permissions
		*Function Type  : call by value
		*Functionality  : displays the form to save permission
		*Input			: nothing
		*Output			: displays the form to save permission
		*Return Value   : Boolean
		*Note			: nothing
		*********************************************************************************************/
		
		function save_permissions() {
			$sMsg = -1; 
			
			if(isset($_SESSION["admin_user"]))
			{
				if(isset($_REQUEST))
				{			
					$userID 		= $_REQUEST['usertype'];
					$contentID 		= $_REQUEST['contenttype'];
					$capabilityID 	= $_REQUEST['capabilitytype'];
					$permission 	= $_REQUEST['permission'];
				
					if($permission=='Y'||$permission=='N' || $permission=='N/A')
					{
						if($this->oModel->saveUserInfo($userID,$contentID, $capabilityID,$permission))
						{
							$sMsg = 1;
						}
						else					
						{
							$sMsg = 0;
						}					
					}
				}	
				else
				{			
					$userID = 2; // Administrator			
				}		
			}
			
			
			echo $sMsg;
			exit();
			
			/*
			$userType 		= $this->oModel->getUserTypeInfo();			
			$capabilityType = $this->oModel->getCapabilityInfo();
			$contentData 	= $this->oModel->getContentData();
			
			
			$this->oView->sErrorMsg 		= $sMsg;			
			$this->oView->userType 			= $userType;
			$this->oView->capabilityType 	= $capabilityType;			
			$this->oView->contentData 		= $contentData;
			$this->oView->userID 			= $userID;
			
			## fetching user type			
			$this->oView->edit_permissions();
			*/
		}
		
		
		/*************************************************************************************************
		*Function Header		
		*Function Name  : addNewSubscriberGroup
		*Function Type  : call by value
		*Functionality  : displays the form to change password
		*Input			: nothing
		*Output			: displays the form to change password
		*Return Value   : Boolean
		*Note			: nothing
		*********************************************************************************************/
		function addNewSubscriberGroup($oMember,$sErrorMsg="")
		{
	
			$this->oView->sErrorMsg = $sErrorMsg;
			$this->oView->oMember = $oMember;
				
			$this->oView->addNewSubscriberGroup();			
		}		
		/*************************************************************************************************
		*Function Header		
		*Function Name  : saveSubscriberGroup
		*Function Type  : call by value
		*Functionality  : displays the form to change password
		*Input			: nothing
		*Output			: displays the form to change password
		*Return Value   : Boolean
		*Note			: nothing
		*********************************************************************************************/
		function saveSubscriberGroup()
		{
			global $_CONF;
			
			$sErrorMsg	= ""; 
	        $oMember->name					=	$_POST['groupname'];
			$oMember->promo_code			=	$_POST['promo_code'];
			$oMember->subscription_price	=	$_POST['subscription_price'];
			
			$oMember->assigned_affiliates	=	$_POST['assigned_affiliates'];
									
			$isDuplicate	=	$this->oModel->checkDuplication($oMember->name);

			if($isDuplicate)
			{	
						
				$sErrorMsg	= "Subscriber Group Name already exists.";
				$this->addNewSubscriberGroup($oMember,$sErrorMsg);
				die();			
			} else {			
			
				$rs = $this->oModel->addSubscriberGroup($oMember);
						
				if($rs) {
				
					header("location:".$_CONF['AdminURL']."index.php?stage=accession&mode=manage_permissions&msg=1");
					die();												
				} else {
					
					$sErrorMsg	= "SQL error, Please try again.";
					$this->addNewSubscriberGroup($oMember,$sErrorMsg);
					die();
				}//if
			}//if			
		}//ef


		/*
		**************************************************************************************
		*function header
		*function name  : listUserGroups
		*function type  : call by value	
		*functionality  : List all admin managed pages.
		*input			: nothing
		*output			: List all admin managed pages
		*return value   : nothing
		*note			: nothing
		***************************************************************************************
		*/
	   function listUserGroups(){
	   	
	   					
			if($_REQUEST['msg']==1){			
				$err="Group is created Successfully.";
			} else if($_REQUEST['msg']==2){			
				$err="Group is updated Successfully.";
			}
			
			
			$this->oModel->bPagingApplied = true;
			if(!empty($_REQUEST['sort'])){
				$this->oModel->bSortingApplied = true;
				$this->oModel->vSort['Field'] = $_REQUEST['sort'];
				$this->oModel->vSort['Direction'] = $_REQUEST['direction'];
			}
			
			//$this->oModel->vPage['PageSize'] = 4;
			
			$this->oModel->vPage['CurrentPage'] = (empty($_REQUEST['pos']) ? 0 : $_REQUEST['pos']);
 			$obPage = $this->oModel->getUsersList();
			$_REQUEST['pos'] = $this->oModel->vPage['CurrentPage'];
			$this->oView->obPage = &$obPage;
			$this->oView->vPage = $this->oModel->vPage;
			
			$this->oView->sErrorMsg			= $err;			
			$this->oView->listUserGroups();			
		}//ef

		
		/*
		**************************************************************************************
		*function header
		*function name  : UserGroupDetails
		*function type  : call by value	
		*functionality  : display the details of User Group
		*input			: id
		*output			: display the details of UserGroupDetails
		*return value   : nothing
		*note			: nothing
		***************************************************************************************
		*/
		function UserGroupDetails()
		{
			if(isset($_REQUEST['id']))
			{
				$UserGroup_id = $_REQUEST['id'];
				$oMember = $this->oModel->getUserGroupDetails($UserGroup_id);
				
				$oMember = $oMember[0];				
			}
			  
			
			//$oAffiliate = $oLocation[$oEmployer->location];
			//$this->oView->oAffiliate = $oAffiliate;
			/**/
			
			$this->oView->oMember = $oMember;
			
			$this->oView->UserGroupDetails();		
		}//ef

		
		/*
		 ************************************************************************************
		*function header
		*function name  : editUserGroup
		*function type  : call by value	
		*functionality  : display the details of User Group to edit
		*input			: member id
		*output			: display the details of User Group to edit.
		*return value   : nothing
		*note			: nothing		
		*************************************************************************************
		*/
		function editUserGroup($err="")
		{
			
			if(isset($_REQUEST['id']))
			{
				$emp_id = $_REQUEST['id'];
				$UserGroup_id = $_REQUEST['id'];
				$oMember = $this->oModel->getUserGroupDetails($UserGroup_id);
				$oMember  = $oMember[0];
			}
			
			/*
			$oCategory = $this->oModel->getCategories();
			$this->oView->oCategory = $oCategory;
			*/
			
			$this->oView->oMember = $oMember;			
			$this->oView->sErrorMsg = $err;
			$this->oView->editUserGroup();
		}//ef
		/*
		**************************************************************************************
		*function header
		*function name  : updateSubscriberGroup
		*function type  : call by value	
		*functionality  : update the account of employer
		*input			: oEmployer array
		*output			: update the account of employer
		*return value   : nothing
		*note			: nothing
		***************************************************************************************
		*/
		function updateSubscriberGroup()
		{  
			global $_CONF;
			
			$sErrorMsg	= ""; 
			$oMember->id	=	$_POST['id'];
			$oMember->subscription_price	=	$_POST['subscription_price'];
			
			$oMember->assigned_affiliates	=	$_POST['assigned_affiliates'];
									
			$rs = $this->oModel->updateSubscriberGroup($oMember);
					
			if($rs) {
			
				header("location:".$_CONF['AdminURL']."index.php?stage=accession&mode=listUserGroups&msg=2");
				die();												
			} else {
				
				$sErrorMsg	= "SQL error, Please try again.";
				$this->addNewSubscriberGroup($oMember,$sErrorMsg);
				die();
			}//if
		}//ef			
	}//ec
?>