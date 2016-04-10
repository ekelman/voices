<?php
 	/*************************************************************************************
		* Author Name 			: Gagandeep Kaur
		* Creation Date			: 23 May-2007
		* FileName 				: EmployerView.php	
		* Called From 			: Admin EmployerController and where the Employer details are required.
		* Description 			: EmployerView file is used to interact with the front end that displays forms,pages etc 
								  using html template files. 
		* Components Used 		: none
		* Tables Accessed 		: none
		* Program Specs 		:  
		* UTP doc 				:
		* Tested By 			:
	*********************************************************************************************/
	

	require_once($_CONF['ModulesPath'].'system/classes/Grid.php');								          // this class creates a grid ot display data
	
	/***************************************************************
	*Class Header
	*Class Name    : EmployerView
	*Functionality : This class controls how the data is displayed 
					 on the front end using the HTML templates.
	*Note          : EmployerView inherits AdminView which containts
				 	 the display functionality for the admin site.
	***************************************************************/

	class ElectedrepresentativeView extends AdminView
	{
		//Categories Array used for population
		var $vPage;
		var $sErrorMsg;
		
	
		/***************************************************************************************
		*Function Header
		*Function Name  : EmployerView
		*Function Type  : Constructor	
		*Functionality  : Initializes objects of different classes 
		*Input			: nothing
		*Output			: Class objects
		*Return Value   : nothing
		*Note			: nothing
		****************************************************************************************/
		
		function ElectedrepresentativeView(){
			
			parent::AdminView();
		}//ef

		
		/*
		**************************************************************************************
		*Function Header
		*Function Name  : ListElectedrepresentative
		*Function Type  : Call by value	
		*Functionality  : List all the Subscriber
		*Input			: nothing
		*Output			: List of all the Subscriber
		*Return Value   : nothing
		*Note			: this function uses grid class to generate a list of all the Employers.
		***************************************************************************************
		*/
		function ListElectedrepresentative()
		{
			
			global $_CONF;
			$i	=	-1;
			// create headings for the data grid
			$OHeadCell = array();

			$OHeadCell[++$i]					= new gCell();
			$OHeadCell[$i]->iType				= GRID_ELE_TEXT;
			$OHeadCell[$i]->vProperty['Text']	= 'First Name';
			$OHeadCell[$i]->vProperty['Sort']	= false;
			
			
			$OHeadCell[++$i]					= new gCell();
			$OHeadCell[$i]->iType				= GRID_ELE_TEXT;
			$OHeadCell[$i]->vProperty['Text']	= 'Middle Name';
			$OHeadCell[$i]->vProperty['Sort']	= false;
			
			
			$OHeadCell[++$i]					= new gCell();
			$OHeadCell[$i]->iType				= GRID_ELE_TEXT;
			$OHeadCell[$i]->vProperty['Text']	= 'Last Name';
			$OHeadCell[$i]->vProperty['Sort']	= false;
			
			
			$OHeadCell[++$i]					= new gCell();
			$OHeadCell[$i]->iType				= GRID_ELE_TEXT;
			$OHeadCell[$i]->vProperty['Text']	= 'Email';
			$OHeadCell[$i]->vProperty['Sort']	= false;
					
			$OHeadCell[++$i]					= new gCell();
			$OHeadCell[$i]->iType				= GRID_ELE_TEXT;
			$OHeadCell[$i]->vProperty['Text']	= 'Create Account';
			$OHeadCell[$i]->vProperty['Sort']	= false;
			
			/**/
			//data details
			$i	=	-1;
			
			$ODataCell[++$i] 					= new gCell();
			$ODataCell[$i]->iType 				= GRID_ELE_COL;
			$ODataCell[$i]->vProperty['Col'] 	= 'First_Name';
			
			$ODataCell[++$i] 					= new gCell();
			$ODataCell[$i]->iType 				= GRID_ELE_COL;
			$ODataCell[$i]->vProperty['Col'] 	= 'Middle_Name';
			
			$ODataCell[++$i] 					= new gCell();
			$ODataCell[$i]->iType 				= GRID_ELE_COL;
			$ODataCell[$i]->vProperty['Col'] 	= 'Last_Name';
			
			$ODataCell[++$i] 					= new gCell();
			$ODataCell[$i]->iType 				= GRID_ELE_COL;
			$ODataCell[$i]->vProperty['Col'] 	= 'EMail1';
			
			$ODataCell[++$i] 					= 	new gCell();
			$ODataCell[$i]->iType 				= 	GRID_ELE_IMAGE_LINK;
			$ODataCell[$i]->vProperty['Text']	= 	'Create Account';
			$ODataCell[$i]->vProperty['Image']	= 	$_CONF[ImageUrl].'icons/edit.gif';
			$ODataCell[$i]->vProperty['Link']	= 	'index.php';
			$ODataCell[$i]->vProperty['FixedQueryString']		= 	array('stage'=>'electedrepresentative','mode'=>'CreateElectedrepresentativeAccount');
			$ODataCell[$i]->vProperty['FloatingQueryString']	= 	array('id'=>'ElectedOfficialID');
			$ODataCell[$i]->vProperty['bNewWindow']				= 	true;
			
			$oGrid = new Grid();
			$oGrid->sTitle 			=	"List of all Elected Representatives";
			$oGrid->sDescription 	= 	"&nbsp;";
			$oGrid->sStage 			= 	"subscriber";
			$oGrid->oHeadRow 		= 	$OHeadCell;
			$oGrid->oDataRow		= 	$ODataCell;
			$oGrid->sIdentifier 	= 	'ElectedOfficialID';
			$oGrid->oTemplate		= 	&$this->obTemplate;

			$oGrid->oData					= &$this->oMember;
			$oGrid->vPage = &$this->vPage;
			
			$this->obTemplate->assign('VPage', $this->vPage['TotalPages']);
			$this->obTemplate->assign('search_field', $this->search_field);
			$this->obTemplate->assign('search_text', $this->search_text);
			$this->obTemplate->assign('CustomForm', $this->obTemplate->fetch("electedrepresentative/ihtml/search_fields.html"));			
			$this->obTemplate->assign('Content', $oGrid->build());
			$this->parse();	
		} //ef
		
		
		/*		
		 *************************************************************************************
		*function header
		*function name  : CreateElectedrepresentativeAccount
		*function type  : call by value	
		*functionality  : display the details of employer to edit
		*input			: member id
		*output			: display the details of employer to edit.
		*return value   : nothing
		*note			: nothing		
		*************************************************************************************
		*/
		function CreateElectedrepresentativeAccount($err="")
		{			
			//die("CreateElectedrepresentativeAccount");
			global $_CONF;
		 
			$this->obTemplate->clear_cache('electedrepresentative/ihtml/create_profile.html');
			$this->obTemplate->assign('oElectoralDistrict',$this->oElectoralDistrict);		
			$this->obTemplate->assign('sErrorMsg', $this->sErrorMsg);	
			
			$this->obTemplate->assign('Content',$this->obTemplate->fetch('electedrepresentative/ihtml/create_profile.html'));
			$this->parse();
		}//ef		
		
		
		/*
		**************************************************************************************
		*Function Header
		*Function Name  : ListElectedrepresentativeAccounts
		*Function Type  : Call by value	
		*Functionality  : List all the ElectedrepresentativeAccounts
		*Input			: nothing
		*Output			: List of all the ElectedrepresentativeAccounts
		*Return Value   : nothing
		*Note			: This function uses grid class to generate a list of all the ElectedrepresentativeAccounts.
		***************************************************************************************
		*/
		function ListElectedrepresentativeAccounts()
		{
			
			global $_CONF;
			$i	=	-1;
			// create headings for the data grid
			$OHeadCell = array();

			$OHeadCell[++$i]					= new gCell();
			$OHeadCell[$i]->iType				= GRID_ELE_TEXT;
			$OHeadCell[$i]->vProperty['Text']	= 'First Name';
			$OHeadCell[$i]->vProperty['Sort']	= false;
			
			
			$OHeadCell[++$i]					= new gCell();
			$OHeadCell[$i]->iType				= GRID_ELE_TEXT;
			$OHeadCell[$i]->vProperty['Text']	= 'Last Name';
			$OHeadCell[$i]->vProperty['Sort']	= false;
			
			
			$OHeadCell[++$i]					= new gCell();
			$OHeadCell[$i]->iType				= GRID_ELE_TEXT;
			$OHeadCell[$i]->vProperty['Text']	= 'Email';
			$OHeadCell[$i]->vProperty['Sort']	= false;
					
			$OHeadCell[++$i]					= new gCell();
			$OHeadCell[$i]->iType				= GRID_ELE_TEXT;
			$OHeadCell[$i]->vProperty['Text']	= 'Edit Account';
			$OHeadCell[$i]->vProperty['Sort']	= false;
			
			//data details
			$i	=	-1;
			
			$ODataCell[++$i] 					= new gCell();
			$ODataCell[$i]->iType 				= GRID_ELE_COL;
			$ODataCell[$i]->vProperty['Col'] 	= 'first_name';
			
			$ODataCell[++$i] 					= new gCell();
			$ODataCell[$i]->iType 				= GRID_ELE_COL;
			$ODataCell[$i]->vProperty['Col'] 	= 'last_name';
			
			$ODataCell[++$i] 					= new gCell();
			$ODataCell[$i]->iType 				= GRID_ELE_COL;
			$ODataCell[$i]->vProperty['Col'] 	= 'email';
			
			$ODataCell[++$i] 					= 	new gCell();
			$ODataCell[$i]->iType 				= 	GRID_ELE_IMAGE_LINK;
			$ODataCell[$i]->vProperty['Text']	= 	'Edit Account';
			$ODataCell[$i]->vProperty['Image']	= 	$_CONF[ImageUrl].'icons/edit.gif';
			$ODataCell[$i]->vProperty['Link']	= 	'index.php';
			$ODataCell[$i]->vProperty['FixedQueryString']		= 	array('stage'=>'electedrepresentative','mode'=>'EditElectedrepresentative');
			$ODataCell[$i]->vProperty['FloatingQueryString']	= 	array('id'=>'member_id');
			$ODataCell[$i]->vProperty['bNewWindow']				= 	true;
			
			$oGrid = new Grid();
			$oGrid->sTitle 			=	"List of all Elected Representative Accounts";
			$oGrid->sDescription 	= 	"&nbsp;&nbsp;";
			$oGrid->sStage 			= 	"electedrepresentative";
			$oGrid->oHeadRow 		= 	$OHeadCell;
			$oGrid->oDataRow		= 	$ODataCell;
			$oGrid->sIdentifier 	= 	'member_id';
			$oGrid->oTemplate		= 	&$this->obTemplate;

			$oGrid->oData					= &$this->oMember;
			$oGrid->vPage = &$this->vPage;
			
			$this->obTemplate->assign('VPage', $this->vPage['TotalPages']);
			$this->obTemplate->assign('search_field', $this->search_field);
			$this->obTemplate->assign('search_text', $this->search_text);
			$this->obTemplate->assign('CustomForm', $this->obTemplate->fetch("electedrepresentative/ihtml/search_fields_accounts.html"));			
			$this->obTemplate->assign('Content', $oGrid->build());
			$this->parse();	
		} //ef
		
		
		/*		
		 *************************************************************************************
		*function header
		*function name  : EditElectedrepresentative
		*function type  : call by value	
		*functionality  : display the details of employer to edit
		*input			: member id
		*output			: display the details of employer to edit.
		*return value   : nothing
		*note			: nothing		
		*************************************************************************************
		*/
		function EditElectedrepresentative($err="")
		{			
			global $_CONF;
			$this->obTemplate->assign('profileimageurl', $_CONF['profile_image_front_end']);	
		 
			$this->obTemplate->clear_cache('electedrepresentative/ihtml/edit_profile.html');
			$this->obTemplate->assign('oElectoralDistrict',$this->oElectoralDistrict);		
			$this->obTemplate->assign('sErrorMsg', $this->sErrorMsg);	
			
			$this->obTemplate->assign('Content',$this->obTemplate->fetch('electedrepresentative/ihtml/edit_profile.html'));
			$this->parse();
		}//ef		
	}//ec
?>