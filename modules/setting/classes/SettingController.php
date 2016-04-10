<?php
	/****************************************************************************************
		* Author Name 		: Gagandeep Kaur
		* Creation Date : 17th Jan 2012
		* FileName 			: EmployerController.php	
		* Called From 		: Admin index page

		* Description 		: EmployerController file is used to control the EmployerModel and EmployerView files,it passes control according to the operation required.

		* Components Used	: Validation for server side validations
		* Tables Accessed	: none
		* Program Specs		: nothing 
		* UTP doc			: nothing
		* Tested By			: nothing
	*********************************************************************************************/
	
	require_once($_CONF['ModulesPath'].'setting/classes/SettingModel.php');	//this class contains all the queries related to Category class 
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

	class SettingController extends AdminController {
		
	/***************************************************************************************
	*Function Header
	*Function Name  : SettingController
	*Function Type  : Constructor	
	*Functionality  : Initializes objects of different classes 
	*Input			: nothing
	*Output			: Class objects
	*Return Value   : nothing
	*Note			: nothing
	****************************************************************************************/
			
		function SettingController(){
			global $_CONF;
			parent::AdminController();
			$this->oView = new SettingView();
			$this->oModel = new SettingModel();
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
	    
		function list_settings() {
	   
	   		$err ='';
			if($_REQUEST['msg']==4){							
				$err ="Error in creating setting.";
			} else if($_REQUEST['msg']==1) {			
				$err="Setting is created Successfully.";
			} else if($_REQUEST['msg']==2){							
				$err ="Setting is updated Successfully.";
			} else if($_REQUEST['msg']==3){							
				$err ="Error in updating setting.";
			}
			
			
			$this->oModel->bPagingApplied = true;
			if(!empty($_REQUEST['sort'])){
				$this->oModel->bSortingApplied = true;
				$this->oModel->vSort['Field'] = $_REQUEST['sort'];
				$this->oModel->vSort['Direction'] = $_REQUEST['direction'];
			}
			
			//$this->oModel->vPage['PageSize'] = 4;
			
			$this->oModel->vPage['CurrentPage'] = (empty($_REQUEST['pos']) ? 0 : $_REQUEST['pos']);
			$_REQUEST['pos'] = $this->oModel->vPage['CurrentPage'];
			$obPage = $this->oModel->getSettingList();
			$this->oView->obPage = &$obPage;
			$this->oView->vPage = $this->oModel->vPage;			
			$this->oView->sErrorMsg			= $err;			
			$this->oView->listSettings();						
		
		}//ef
		
				/*
		**************************************************************************************
		*function header
		*function name  : SettingDetails
		*function type  : call by value	
		*functionality  : display the details of Setting
		*input			: id
		*output			: display the details of SettingDetails
		*return value   : nothing
		*note			: nothing
		***************************************************************************************
		*/		
		function setting_detail()
		{
			if(isset($_REQUEST['id']))
			{
				$setting_id = $_REQUEST['id'];
				$oSetting = $this->oModel->getSettingDetail($setting_id);				
				$oSetting = $oSetting[0];				
				$this->oView->oSetting = $oSetting;			
				$this->oView->SettingDetail();						
			}
			else
			{
				header("locations:index.php?stage=setting&mode=list_settings");
			}						
			
		}//ef
			
		/*
		 ************************************************************************************
		*function header
		*function name  : edit_setting
		*function type  : call by value	
		*functionality  : display the details of Setting to edit
		*input			: member id
		*output			: display the details of Setting to edit.
		*return value   : nothing
		*note			: nothing		
		*************************************************************************************
		*/
		function edit_setting($err="")
		{			
			
			if(isset($_REQUEST['id']))
			{				
				$setting_id = $_REQUEST['id'];
				$oSetting 	= $this->oModel->getSettingDetail($setting_id);
				$oSetting  	= $oSetting[0];			
				$this->oView->oSetting = $oSetting;			
				$this->oView->sErrorMsg = $err;
				$this->oView->editSetting();			
			}	
			else
			{
				header("locations:index.php?stage=setting&mode=list_settings");
			}
							
			
		}//ef
	
		
		
		/*************************************************************************************************
		*Function Header		
		*Function Name  : addNewSettingGroup
		*Function Type  : call by value
		*Functionality  : displays the form to change password
		*Input			: nothing
		*Output			: displays the form to change password
		*Return Value   : Boolean
		*Note			: nothing
		*********************************************************************************************/
		function addNewSettingGroup($oMember,$sErrorMsg="")
		{
	
			$this->oView->sErrorMsg = $sErrorMsg;
			$this->oView->oMember = $oMember;
				
			$this->oView->addNewSettingGroup();			
		}		
		
		
		/*************************************************************************************************
		*Function Header		
		*Function Name  : saveSettingGroup
		*Function Type  : call by value
		*Functionality  : displays the form to change password
		*Input			: nothing
		*Output			: displays the form to change password
		*Return Value   : Boolean
		*Note			: nothing
		*********************************************************************************************/
		function saveSettingGroup()
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
				$sErrorMsg	= "Setting Group Name already exists.";
				$this->addNewSettingGroup($oMember,$sErrorMsg);
				die();
			} else {			
				$rs = $this->oModel->addSettingGroup($oMember);				
				if($rs) {				
					header("location:".$_CONF['AdminURL']."index.php?stage=accession&mode=manage_permissions&msg=1");
					die();												
				} else {					
					$sErrorMsg	= "SQL error, Please try again.";					
					$this->addNewSettingGroup($oMember,$sErrorMsg);
					die();
				}//if
			}//if			
		}//ef


		/*
		**************************************************************************************
		*function header
		*function name  : updateSettingGroup
		*function type  : call by value	
		*functionality  : update the account of employer
		*input			: oEmployer array
		*output			: update the account of employer
		*return value   : nothing
		*note			: nothing
		***************************************************************************************
		*/
		function update_setting()
		{  
			global $_CONF;
			
			
			$sErrorMsg	= ""; 
			$oSetting->id			=	$_POST['id'];
			$oSetting->field_value	=	$_POST['field_value'];									
			$oSetting->field_details	=	$_POST['field_details'];						
			$rs = $this->oModel->updateSetting($oSetting);
					
			if($rs) {			
				header("location:".$_CONF['AdminURL']."index.php?stage=setting&mode=list_settings&msg=2");
				die();												
			} else {
				header("location:".$_CONF['AdminURL']."index.php?stage=setting&mode=list_settings&msg=3");
				die();												
			}//if
		}//ef			
	}//ec
?>