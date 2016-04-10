<?php
	session_start();
	/***********************************************************************************************************
		* Author Name		: Anil Nautiyal
		* Creation Date 	: 27th May-2011
		* FileName			: SubscriberController.php	
		* Called From 		: index.php file.
		* Description		: SubscriberController file is used to control the SubscriberModel and SubscriberView                          files,it passes control according to the operation required.
		* Components Used 	: Validation for server side validations
		* Tables Accessed 	: none
		* Program Specs 	:     
		* UTP doc 			:
		* Tested By 		:  
	************************************************************************************************************/
	require_once($_CONF['ModulesPath'].'billresources/classes/BillresourcesModel.php');
	require_once($_CONF['ModulesPath'].'accession/classes/AccessionModel.php');
	require_once($_CONF['ModulesPath'].'member/classes/MemberModel.php');
										
	//contains constants that are used in this module
	require_once($_CONF['ModulesPath'].'system/classes/Validation.php');
										
	//contains validation functions
	require_once($_CONF['ModulesPath'].'system/functions.php');	
										    								    
	//contains some common data classes 
	require_once($_CONF['ModulesPath'].'system/classes/dataclasses.php');								    
	
	/***************************************************************
	*Class Header
	*Class Name    : BillResourcesController
	*Functionality : This class controls SubscriberModel and SubscriberView
					 to handle Subscribers on the site.
	*Note          : SubscriberController inherits UserController that 
 	                contains functions for the user site.
	***************************************************************/

	class BillresourcesController extends UserController
	{
		var $oModel;
		var $LogoFile;
		
		var $last_error = "";            // last error message set by this class
		var $last_time = 0;              // last function execution time (debug info)
		
		
		/***************************************************************************************
		*Function Header
		*Function Name  : SubscriberController
		*Function Type  : Constructor	
		*Functionality  : Initializes objects of different classes 
		*Input			: nothing
		*Output			: Class objects
		*Return Value   : nothing
		*Note			: nothing
		****************************************************************************************/
		
		function BillresourcesController()
		{
			parent::UserController();
			$this->oModel	= new BillresourcesModel();				
			$this->aModel	= new AccessionModel();				
			$this->oView	= new BillResourcesView();			
		}

		/*	***********************************************************************************
		*function header
		*function name  : getUserElectedOfficials
		*function type  : call by value	
		*functionality  : 
		*input			: 
		*output			: 
		*return value   : nothing
		*note			: nothing
		************************************************************************************
		*/
		
		function BillDetail()
		{
			/* permissions */			
			
			$this->oView->bill_resources_bill_summary_view = false; 										
			$this->oView->page_access_allowed = true; 										
				
			// requirement by client:: if session exist than check permission otherwise create a visitor user						
			if(!empty($_SESSION["member_type"]))
			{							
				if(!$this->aModel->checkSpecificAccessPermission("Bill Resources","Bill Summary","View") )
				{
					$this->oView->page_access_allowed = false; 					
				}
			}	
			
			/** permissions **/
			
			$this->oView->bill_resources_bill_detail_view = false; 										
			if( $this->aModel->checkSpecificAccessPermission("Bill Resources","Bill Detail","View") )
				$this->oView->bill_resources_bill_detail_view = true; 													
			
			/** permissions **/
			
			// echo "<pre>"; print_r($this->oModel->getBillDetail()); exit;
			$this->oView->display_bill = $this->oModel->getBillDetail();
			$this->oView->BillDetail();
		}

		
		/************************************************************************************
		*function header
		*function name  : BillCompleteDetails
		*function type  : call by value	
		*functionality  : 
		*input			: 
		*output			: 
		*return value   : nothing
		*note			: nothing
		************************************************************************************
		*/
		
		function BillCompleteDetails( $billNumber = NULL )
		{
		
			/* permissions */						
			$this->oView->bill_resources_bill_detail_view = false; 							
			
			if( $this->aModel->checkSpecificAccessPermission("Bill Resources","Bill Detail","View") )
			{			
				$this->oView->bill_resources_bill_detail_view = true; 													
			}
			/** permissions **/
		
			if(isset($_REQUEST["billNo"]))
				$billNumber = $_REQUEST["billNo"];
				
			## echo "<pre>"; print_r($this->oModel->getBillDetail()); exit;
			$this->oView->display_bill = $this->oModel->getBillDetail( $billNumber );
		
			$affiliate_support =  $this->oModel->getAffiliateDetail( $billNumber ,'support');
			$affiliate_against =  $this->oModel->getAffiliateDetail( $billNumber ,'oppose');
			
			/*
			 * [affiliate_comment] => jhnm,nm,nm,
            [indication_of_position] => support
            [first_name] => affi
            [last_name] => Affiliate
			 * */
			
			## getting affiliate Details 
			$this->oView->get_affiliate_details_in_support = $affiliate_support;			
			$this->oView->get_affiliate_details_against = $affiliate_against;
			
			$this->oView->BillCompleteDetails();
		}
		
	};//ec
?>