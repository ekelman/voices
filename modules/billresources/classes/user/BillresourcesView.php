<?php
	/**************************************************************************************************
	* Author Name	: Anil Nautiyal
	* Creation Date : 27th May-2011
	* FileName		: SubscriberView.php	     
	* Called From	: SubscriberController and where the Subscriber details are required.
	* Description	: SubscriberView file is used to interact with the front end that displays                           forms,pages etc using html template files. 
	* Components Used : none
	* Tables Accessed : none
	* Program Specs :  
	* UTP doc :
	* Tested By :
	*************************************************************************************************/
	require_once($_CONF['ModulesPath'].'system/classes/Grid.php');	// this class creates a grid ot display data
	/***************************************************************
	*Class Header
	*Class Name		: SubscriberView
	*Functionality	: This clss controls how the data is displayed 
					  on the front end using the HTML templates.
	*Note			: EmployerView inherits UserView contains the 
					  display functionality for the user site.
	***************************************************************/
	class BillresourcesView extends UserView
	{		
		var $sErrMsg;
		var $sErrorMsg;
		var $uProfile;

		/***************************************************************************************
		*Function Header
		*Function Name  : SubscriberView
		*Function Type  : Constructor	
		*Functionality  : Initializes objects of different classes 
		*Input			: nothing
		*Output			: Class objects
		*Return Value   : nothing
		*Note			: nothing
		****************************************************************************************/
		function BillresourcesView()
		{
			parent::UserView();
		}// end of fu
				
		/*
		**************************************************************************************
		*function header
		*function name  : MyAffiliates
		*function type  : call by value	
		*functionality  : 
		*input			: 
		*output			: 
		*return value   : nothing
		*note			: nothing
		***************************************************************************************
		*/
		function BillDetail()
		{			
			$this->obTemplate->assign('Bills',$this->display_bill);
			//$this->obTemplate->assign('Content',$this->display_bill[0]['bill_id']);
				
			$this->obTemplate->assign('ViewPage', $this->page_access_allowed);							
			
			$this->obTemplate->assign('BillResourcesBillSummaryView',$this->bill_resources_bill_summary_view);					
			$this->obTemplate->assign('BillResourcesBillDetailView', $this->bill_resources_bill_detail_view);				
			
			$this->obTemplate->assign('Content',$this->obTemplate->fetch('billresources/ihtml/bills.html'));
			$this->parse();
		}
		
	
		
		/*
		**************************************************************************************
		*function header
		*function name  : BillCompleteDetails
		*function type  : call by value	
		*functionality  : 
		*input			: 
		*output			: 
		*return value   : nothing
		*note			: nothing
		***************************************************************************************
		*/
		function BillCompleteDetails()
		{			
			$this->obTemplate->assign('Bills',$this->display_bill);
			
			$this->obTemplate->assign('AffiliateDetailsInSupport',$this->get_affiliate_details_in_support);
			$this->obTemplate->assign('AffiliateDetailsAgainst',$this->get_affiliate_details_against);
			
			/* permissions*/
			$this->obTemplate->assign('BillResourcesBillDetailView', $this->bill_resources_bill_detail_view);							
			/* permissions*/
			
			$this->obTemplate->assign('Content',$this->obTemplate->fetch('billresources/ihtml/bill_complete_detail.html'));
			$this->parse();
		}
	
	};//ec
?>