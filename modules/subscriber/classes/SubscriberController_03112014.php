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
	
	require_once($_CONF['ModulesPath'].'subscriber/classes/SubscriberModel.php');	//this class contains all the queries related to Category class 
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

	class SubscriberController extends AdminController{
		

		
		/*
		**************************************************************************************
		*Function Header
		*Function Name  : EmployerController
		*Function Type  : Constructor	
		*Functionality  : Initializes objects of different classes 
		*Input			: nothing
		*Output			: Class objects
		*Return Value   : nothing
		*Note			: nothing
		***************************************************************************************
		*/			
		function SubscriberController(){
			global $_CONF;
			parent::AdminController();
			$this->oView = new SubscriberView();
			$this->oModel = new SubscriberModel();
		}//ef
		
		
		/*
		**************************************************************************************
		*function header
		*function name  : EmployerDetails
		*function type  : call by value	
		*functionality  : display the details of employer
		*input			: member id
		*output			: display the details of employer
		*return value   : nothing
		*note			: nothing
		***************************************************************************************
		*/
		function SubscriberDetails()
		{
			if(isset($_REQUEST['id']))
			{
				$subID = $_REQUEST['id'];
				$oSubscriber = $this->oModel->getSubscriberDetails($subID);
			}
			
			$this->oView->oSubscriber = $oSubscriber[0];
			$this->oView->SubscriberDetails();		
		}//ef
		
		
		/***************************************************************************************
		*Function Header
		*Function Name  : ListSubscriber
		*Function Type  : call by value	
		*Functionality  : List all the employers
		*Input			: nothing
		*Output			: List of all the employers
		*Return Value   : nothing
		*Note			: nothing
		*************************************************************************************/

		function ListSubscriber($err="")
		{
			$search_field	=	$_REQUEST['search_field'];
			$search_text	=	$_REQUEST['search_text'];
			
			if($_REQUEST['msg']==1)
			{
				$err="Changes have been Updated Successfully.";
			} elseif($_REQUEST['msg']=='2') {
				$err= "This Member account has been already Activated.";
			} elseif($_REQUEST['msg']=='3') {
				$err= "This Member account has been Successfully Activated.";
			} elseif($_REQUEST['msg']=='4') {
				$err= "This Member has been already Approved.";
			} elseif($_REQUEST['msg']=='5') {
				$err= "There is some technical problem in sending approving email.<br>Please try later.";
			} elseif($_REQUEST['msg']=='6') {
				$err= "This Member has been successfully Approved.";
			} 
			
			$this->oModel->bPagingApplied 	= true;
			$this->oModel->vPage['PageSize']=10;
		
			if(!empty($_REQUEST['sort']))
			{					    							
				// defining sort field 
				$this->oModel->bSortingApplied 		= true;
				$this->oModel->vSort['Field']		= $_REQUEST['sort'];
				$this->oModel->vSort['Direction'] 	= $_REQUEST['direction'];
			} else {
				$this->oModel->bSortingApplied 		= true;
				$this->oModel->vSort['Field']		= 'member_id';
				$this->oModel->vSort['Direction'] 	= 0;
			}
			$this->oModel->vPage['CurrentPage'] 	= (empty($_REQUEST['pos']) ? 0 : $_REQUEST['pos']);
			$oSubscriber							=	$this->oModel->getAllSubscriber($search_field,$search_text);
			$_REQUEST['pos'] 						= $this->oModel->vPage['CurrentPage'];
			
			$this->oView->oSubscriber				= &$oSubscriber;
			$this->oView->vPage 					= $this->oModel->vPage;	
			$this->oView->sErrorMsg					= $err;
			$this->oView->search_field 				= $search_field;
			$this->oView->search_text 				= $search_text;
			$this->oView->ListSubscriber();
		}//ef

		
		/**************************************************************************************
		*Function Header
		*Function Name  : ActivateSubscriber
		*Function Type  : Call by value	
		*Functionality  : Activates a employer or list of employers
		*Input			: member id or ids
		*Output			: Activates a employer or list of employers
		*Return Value   : nothing
		*Note			: nothing
		***************************************************************************************
		*/
		function ActivateSubscriber()
		{
			$_REQUEST['mode'] 		= "ActivateSubscriber";
			$this->oModel->ActivateSubscriber($_REQUEST['identity']);
			//$this->oModel->ActivateEmployerJobs($_REQUEST['identity']);
			$err="Successfully Activated.";
			$this->ListSubscriber($err);			
		}
		
		/*
		**************************************************************************************
		*Function Header
		*Function Name  : DeactivateSubscriber
		*Function Type  : Call by value	
		*Functionality  : Deactivates employer or list of employers
		*Input			: member id or id
		*Output			: Deactivates employer or list of employers
		*Return Value   : nothing
		*Note			: nothing
		***************************************************************************************
		*/
		
		function DeactivateSubscriber()
		{								
			$_REQUEST['mode'] 		= "DeactivateEmployer";
			$this->oModel->DeactivateSubscriber($_REQUEST['identity']);
			//$this->oModel->DeactivateEmployerJobs($_REQUEST['identity']);
			$err="Successfully Deactivated.";
			$this->ListSubscriber($err);
		}
		
		
		
		/*
		**************************************************************************************
		*Function Header
		*Function Name  : DeleteSubscriber
		*Function Type  : Call by value	
		*Functionality  : Deletes Subscriber or list of Subscriber
		*Input			: member id or ids
		*Output			: Deletes Subscriber or list of Subscriber
		*Return Value   : nothing
		*Note			: nothing
		***************************************************************************************
		*/
		
		function DeleteSubscriber()
		{							
			$_REQUEST['mode'] 		= "DeleteSubscriber";
			$this->oModel->DeleteSubscriber($_REQUEST['identity']);
			$err = "Record(s) deleted successfully.";
			$this->ListSubscriber($err);
		}//ef
		
		
		/*
		**************************************************************************************
		*function header
		*function name  : PaymentDetails
		*function type  : call by value	
		*functionality  : showing the details of all payments made on the site.
		*input			: nothing.
		*output			: grid showing the details of all payments made on teh site and also calculate the referral reward made and its status
		                  of paid or not paid.
		*return value   : nothing
		*note			: nothing
		***************************************************************************************
		*/
		function PaymentDetails()
		{       
			if($_REQUEST['msg']==1)
			{
			 $this->oView->sErrorMsg ="Status is updated Successfully.";
			}
			$Job=$this->oModel->ShowPaymentDetails();
			for($i=0;$i<count($Job);$i++)
			{
				$Job[$i]->amount_paid  = "$".$Job[$i]->amount_paid;
			}
			//print_r($Job);
			$this->oView->PaymentDetails($Job);
		}//ef
		
			
		/*
		**************************************************************************************
		*function header
		*function name  : ListPrice
		*function type  : call by value	
		*functionality  : display the details of employer to edit
		*input			: member id
		*output			: display the details of employer to edit.
		*return value   : nothing
		*note			: nothing
		***************************************************************************************
		*/
		function ListPrice($err="")
		{
			if($err == "" && $_REQUEST['msg'] != "" ) {
				if($_REQUEST['msg'] == 1) {
					$err = "Subscription price has been updated successfully.";
				}
			}
			
			$this->oView->sErrorMsg = $err;
			$this->oModel->bPagingApplied 	= true;
			$this->oModel->vPage['PageSize']=50;
			if(!empty($_REQUEST['sort']))
			{	
				// defining sort field 
				$this->oModel->bSortingApplied 		= true;
				$this->oModel->vSort['Field']		= $_REQUEST['sort'];
				$this->oModel->vSort['Direction'] 	= $_REQUEST['direction'];
			} else {
				$this->oModel->bSortingApplied 		= true;
				$this->oModel->vSort['Field']		= 'price_text';
				$this->oModel->vSort['Direction'] 	= 0;
			}
			$this->oModel->vPage['CurrentPage'] 	= (empty($_REQUEST['pos']) ? 0 : $_REQUEST['pos']);
			$OEmployer	=	$this->oModel->getAllSubscription();
			
			$_REQUEST['pos'] 						= $this->oModel->vPage['CurrentPage'];
			$this->oView->OEmployer					= &$OEmployer;
			$this->oView->vPage 					= $this->oModel->vPage;	
			$this->oView->ListPrice();
		}//ef
	}//ec
?>