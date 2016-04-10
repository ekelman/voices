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

	class SubscriberView extends AdminView
	{
		//Categories Array used for population
		var $OCategory;
		var $category_for;
		var $OCategoriesSearch;
		var $vPage;
		var $sErrorMsg;
		var $oSubscriber;
		
	
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
		
		function SubscriberView(){
			parent::AdminView();
		}//ef
	
	/*
		**************************************************************************************
		*Function Header
		*Function Name  : SubscriberDetails
		*Function Type  : Call by value	
		*Functionality  : List all the Subscriber
		*Input			: nothing
		*Output			: List of all the Subscriber
		*Return Value   : nothing
		*Note			: this function uses grid class to generate a list of all the Employers.
		***************************************************************************************
		*/
		function SubscriberDetails()
		{
			global $_CONF;
				//print_r($this->oSubscriber);die;
			//$security_question		=	$this->member_arrays[security_ques];
			$this->obTemplate->clear_cache('subscriber/ihtml/subscriber_details.html');
			//echo "<pre>";
			//print_r($this->oSubscriber);
			$this->obTemplate->assign('oSubscriber',$this->oSubscriber);
			
			$this->obTemplate->assign('Content',$this->obTemplate->fetch('subscriber/ihtml/subscriber_details.html'));
			$this->parse();
		} //ef
		/*
		**************************************************************************************
		*Function Header
		*Function Name  : ListSubscriber
		*Function Type  : Call by value	
		*Functionality  : List all the Subscriber
		*Input			: nothing
		*Output			: List of all the Subscriber
		*Return Value   : nothing
		*Note			: this function uses grid class to generate a list of all the Employers.
		***************************************************************************************
		*/
		function ListSubscriber()
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
			$OHeadCell[$i]->vProperty['Text']	= 'Member Type';
			$OHeadCell[$i]->vProperty['Sort']	= false;
			
			$OHeadCell[++$i]					= new gCell();
			$OHeadCell[$i]->iType				= GRID_ELE_TEXT;
			$OHeadCell[$i]->vProperty['Text']	= 'Status';
			$OHeadCell[$i]->vProperty['Sort']	= false;
			
			$OHeadCell[++$i]					= new gCell();
			$OHeadCell[$i]->iType				= GRID_ELE_TEXT;
			$OHeadCell[$i]->vProperty['Text']	= 'View Details';
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
			
			$ODataCell[++$i] 					= new gCell();
			$ODataCell[$i]->iType 				= GRID_ELE_COL;
			$ODataCell[$i]->vProperty['Col'] 	= 'member_type';
			
			$ODataCell[++$i] 					= new gCell();
			$ODataCell[$i]->iType 				= GRID_ELE_COL;
			$ODataCell[$i]->vProperty['Col'] 	= 'isActive';
			
			$ODataCell[++$i] 					= 	new gCell();
			$ODataCell[$i]->iType 				= 	GRID_ELE_IMAGE_LINK;
			$ODataCell[$i]->vProperty['Text']	= 	'View Details';
			$ODataCell[$i]->vProperty['Image']	= 	$_CONF[ImageUrl].'icons/details.gif';
			$ODataCell[$i]->vProperty['Link']	= 	'index.php';
			$ODataCell[$i]->vProperty['FixedQueryString']		= 	array('stage'=>'subscriber','mode'=>'SubscriberDetails');
			$ODataCell[$i]->vProperty['FloatingQueryString']	= 	array('id'=>'member_id');
			$ODataCell[$i]->vProperty['bNewWindow']				= 	false;
			
			
			//operations displayed in the dropdown box like activate,deactivate and delete account	
			$SVerticalOperation['Text'] 		= 	array('Activate', 'Deactivate', 'Delete');
			$SVerticalOperation['Operation'] 	= 	array('ActivateSubscriber','DeactivateSubscriber','DeleteSubscriber');
			$SVerticalOperation['Confirm'] 		= 	array(0, 0, 1);
										
		
			$oGrid = new Grid();
			$oGrid->sTitle 			=	"List of all Members";
			$oGrid->sDescription 	= 	"&nbsp;";
			$oGrid->sStage 			= 	"subscriber";
			$oGrid->oHeadRow 		= 	$OHeadCell;
			$oGrid->oDataRow		= 	$ODataCell;
			$oGrid->sIdentifier 	= 	'member_id';
			$oGrid->oTemplate		= 	&$this->obTemplate;

			// operations displayed in the dropdown box like activate,deactivate and delete account				
			$oGrid->oData			= &$this->oSubscriber;
			$oGrid->bShowCheckBoxes = true;				
			$oGrid->SVerticalOperation	= $SVerticalOperation;
			$oGrid->vPage = &$this->vPage;
			
			$this->obTemplate->assign('VPage', $this->vPage['TotalPages']);
			$this->obTemplate->assign('search_field', $this->search_field);
			$this->obTemplate->assign('search_text', $this->search_text);
			$this->obTemplate->assign('CustomForm', $this->obTemplate->fetch("subscriber/ihtml/search_fields.html"));
			$this->obTemplate->assign('Content', $oGrid->build());
			$this->parse();			
		} //ef
		/*
		**************************************************************************************
		*Function Header
		*Function Name  : EmployerDetails
		*Function Type  : Call by value	
		*Functionality  : Display the details of employer.
		*Input			: Loaction,employer array.
		*Output			: Display the details of employer.
		*Return Value   : nothing
		*Note			: nothing.
		***************************************************************************************
		*/
		function EmployerDetails()
		{
			global $_CONF;
			$this->member_arrays =  parse_ini_file($_CONF['ModulesPath'].'referrer/ihtml/member-arrays.conf', true);			
			$hear_mode		=	$this->member_arrays[hear_mode];
			$security_question		=	$this->member_arrays[security_ques];
			$this->obTemplate->clear_cache('employer/ihtml/employer_details.html');
			$this->obTemplate->assign('oProvince', $this->oProvince);
			$this->obTemplate->assign('oEmployer',$this->oEmployer);
			$this->obTemplate->assign('search_field', $this->search_field);
			$this->obTemplate->assign('search_text', $this->search_text);
			$this->obTemplate->assign('Content',$this->obTemplate->fetch('employer/ihtml/employer_details.html'));
			$this->parse();
		}//ef
		/*
		**************************************************************************************
		*Function Header
		*Function Name  : EmployerEdit
		*Function Type  : Call by value	
		*Functionality  : Display the employer details to edit.
		*Input			: category,location,hear mode,security question,employer array.
		*Output			: Display the employer details to edit.
		*Return Value   : nothing
		*Note			: nothing.
		***************************************************************************************
		*/
		function EmployerEdit()
	   {
	      global $_CONF;
		 
			$this->member_arrays =  parse_ini_file($_CONF['ModulesPath'].'referrer/ihtml/member-arrays.conf', true);			
			$hear_mode		=	$this->member_arrays[hear_mode];
			$security_question		=	$this->member_arrays[security_ques];
			$this->obTemplate->clear_cache('employer/ihtml/edit_profile.html');
			$this->obTemplate->assign('oCategory', $this->oCategory);
			$this->obTemplate->assign('oProvince', $this->oProvince);
			$this->obTemplate->assign('oEmployer',$this->oEmployer);
			$this->obTemplate->assign('hear_mode', $hear_mode);	
			$this->obTemplate->assign('sErrorMsg', $this->sErrorMsg);	
			$this->obTemplate->assign('security_question', $security_question);		
			$this->obTemplate->assign('search_field', $this->search_field);
			$this->obTemplate->assign('search_text', $this->search_text);
			$this->obTemplate->assign('Content',$this->obTemplate->fetch('employer/ihtml/edit_profile.html'));
			$this->parse();
	 }//ef
     /*
		**************************************************************************************
		*Function Header
		*Function Name  : PaymentDetails
		*Function Type  : Call by value	
		*Functionality  : List all the payments made on the site
		*Input			: Job array
		*Output			: List all the payments made on the site
		*Return Value   : nothing
		*Note			: this function uses grid class to generate a list of all the payments.
		***************************************************************************************
		*/
     function PaymentDetails($Job)
	 {
	    global $_CONF;
			$i	=	-1;
			// create headings for the data grid
			$OHeadCell = array();

			$OHeadCell[++$i]					= new gCell();
			$OHeadCell[$i]->iType				= GRID_ELE_TEXT;
			$OHeadCell[$i]->vProperty['Text']	= 'Amount Paid';
			$OHeadCell[$i]->vProperty['Sort']	= true;

			$OHeadCell[++$i]					= new gCell();
			$OHeadCell[$i]->iType				= GRID_ELE_TEXT;
			$OHeadCell[$i]->vProperty['Text']	= 'Employer';
			$OHeadCell[$i]->vProperty['Sort']	= true;


			$OHeadCell[++$i]					= new gCell();
			$OHeadCell[$i]->iType				= GRID_ELE_TEXT;
			$OHeadCell[$i]->vProperty['Text']	= 'Company Name';
			$OHeadCell[$i]->vProperty['Sort']	= false;

			$OHeadCell[++$i]					= new gCell();
			$OHeadCell[$i]->iType				= GRID_ELE_TEXT;
			$OHeadCell[$i]->vProperty['Text']	= 'Job Title';
			$OHeadCell[$i]->vProperty['Sort']	= false;


			

			$OHeadCell[++$i]					= new gCell();
			$OHeadCell[$i]->iType				= GRID_ELE_TEXT;
			$OHeadCell[$i]->vProperty['Text']	= 'Start Date';
			$OHeadCell[$i]->vProperty['Sort']	= false;
			
			
			$OHeadCell[++$i] = new gCell();
			$OHeadCell[$i]->iType = GRID_ELE_TEXT;
			$OHeadCell[$i]->vProperty['Text']= 'Referrer Details';

			
			
			//data details
			$i	=	-1;
			
			$ODataCell[++$i] 					= new gCell();
			$ODataCell[$i]->iType 				= GRID_ELE_COL;
			$ODataCell[$i]->vProperty['Col'] 	= 'amount_paid';
			
			
			
			$ODataCell[++$i] 					= new gCell();
			$ODataCell[$i]->iType 				= GRID_ELE_COL;
			$ODataCell[$i]->vProperty['Col'] 	= 'employer_name';

			$ODataCell[++$i] 					= new gCell();
			$ODataCell[$i]->iType 				= GRID_ELE_COL;
			$ODataCell[$i]->vProperty['Col'] 	= 'comp_name';

			$ODataCell[++$i] 					= new gCell();
			$ODataCell[$i]->iType 				= GRID_ELE_COL;
			$ODataCell[$i]->vProperty['Col'] 	= 'title';

			
			
			$ODataCell[++$i] 					= new gCell();
			$ODataCell[$i]->iType 				= GRID_ELE_COL;
			$ODataCell[$i]->vProperty['Col'] 	= 'start_date';
			
			$ODataCell[++$i] 					= 	new gCell();
			$ODataCell[$i]->iType 				= 	GRID_ELE_IMAGE_LINK;
			$ODataCell[$i]->vProperty['Text']	= 	'View Details';
			$ODataCell[$i]->vProperty['Image']	= 	$_CONF[ImageUrl].'icons/details.gif';
			$ODataCell[$i]->vProperty['Link']	= 	'index.php';
			$ODataCell[$i]->vProperty['FixedQueryString']		= 	array('stage'=>'employer','mode'=>'ReferrerDetails');
			$ODataCell[$i]->vProperty['FloatingQueryString']	= 	array('cid'=>'candidate_id','jid'=>'job_id','paid'=>'isPaid','rid'=>'refer_id');
			$ODataCell[$i]->vProperty['bNewWindow']				= 	false;

			
			
			$oGrid = new Grid();
			$oGrid->sTitle 			=	"Payment Details";
			$oGrid->sDescription 	= 	"List of all Payments";
			$oGrid->sStage 			= 	"employer";
			$oGrid->oHeadRow 		= 	$OHeadCell;
			$oGrid->oDataRow		= 	$ODataCell;
			$oGrid->sIdentifier 	= 	'member_id';
			$oGrid->oTemplate		= 	&$this->obTemplate;
			$oGrid->oData						= $Job;
			$oGrid->bShowCheckBoxes = false;				
			$oGrid->SVerticalOperation	= $SVerticalOperation;
			$oGrid->vPage = &$this->vPage;
			$this->obTemplate->assign('VPage', $this->vPage['TotalPages']);
			$this->obTemplate->assign('Content', $oGrid->build());
			$this->parse();			
	 
	 }//ef
	  /*
		**************************************************************************************
		*Function Header
		*Function Name  : ReferrerDetails
		*Function Type  : Call by value	
		*Functionality  : to display the details of referrer with paid status
		*Input			: Job array
		*Output			: page to show the details of referrer.
		*Return Value   : nothing
		*Note			: this function uses grid class to generate a list of all the payments.
		***************************************************************************************
		*/
	 function ReferrerDetails($oReferrer,$rewardAmount)
	 {
	 $this->obTemplate->assign('oReferrer',$oReferrer);
	 $this->obTemplate->assign('rewardAmount',$rewardAmount); $this->obTemplate->assign('Content',$this->obTemplate->fetch('employer/ihtml/referrer_details.html'));
	 $this->parse();
	 }//ef


	 	/*
		**************************************************************************************
		*Function Header
		*Function Name  : EmployerAccounts
		*Function Type  : Call by value	
		*Functionality  : List all the Employers
		*Input			: nothing
		*Output			: List of all the Employers
		*Return Value   : nothing
		*Note			: this function uses grid class to generate a list of all the Employers.
		***************************************************************************************
		*/
		function EmployerAccounts()
		{
			global $_CONF;
			$i	=	-1;
			// create headings for the data grid
			$OHeadCell = array();
			
			$OHeadCell[++$i]					= new gCell();
			$OHeadCell[$i]->iType				= GRID_ELE_TEXT;
			$OHeadCell[$i]->vProperty['Text']	= 'Company Name';
			$OHeadCell[$i]->vProperty['Sort']	= true;

			$OHeadCell[++$i]					= new gCell();
			$OHeadCell[$i]->iType				= GRID_ELE_TEXT;
			$OHeadCell[$i]->vProperty['Text']	= 'First Name';
			$OHeadCell[$i]->vProperty['Sort']	= true;

			$OHeadCell[++$i]					= new gCell();
			$OHeadCell[$i]->iType				= GRID_ELE_TEXT;
			$OHeadCell[$i]->vProperty['Text']	= 'Last Name';
			$OHeadCell[$i]->vProperty['Sort']	= true;

			$OHeadCell[++$i]					= new gCell();
			$OHeadCell[$i]->iType				= GRID_ELE_TEXT;
			$OHeadCell[$i]->vProperty['Text']	= 'Email';
			$OHeadCell[$i]->vProperty['Sort']	= true;

			$OHeadCell[++$i] = new gCell();
			$OHeadCell[$i]->iType = GRID_ELE_TEXT;
			$OHeadCell[$i]->vProperty['Text']= 'Manage Account';
			
			//data details
			$i	=	-1;
					
			$ODataCell[++$i] 					= new gCell();
			$ODataCell[$i]->iType 				= GRID_ELE_COL;
			$ODataCell[$i]->vProperty['Col'] 	= 'company_name';
	
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
			$ODataCell[$i]->vProperty['Text']	= 	'Manage Account';
			$ODataCell[$i]->vProperty['Image']	= 	$_CONF[ImageUrl].'icons/edit.gif';
			$ODataCell[$i]->vProperty['Link']	= 	'index.php';
			$ODataCell[$i]->vProperty['FixedQueryString']		= 	array('stage'=>'employer','mode'=>'manageAccount');
			$ODataCell[$i]->vProperty['FloatingQueryString']	= 	array('id'=>'member_id');
			$ODataCell[$i]->vProperty['bNewWindow']				= 	true;
			
			$oGrid = new Grid();
			$oGrid->sTitle 			=	"Employers List";
			$oGrid->sDescription 	= 	"Manage Accounts of Employers";
			$oGrid->sStage 			= 	"employer";
			$oGrid->oHeadRow 		= 	$OHeadCell;
			$oGrid->oDataRow		= 	$ODataCell;
			$oGrid->sIdentifier 	= 	'member_id';
			$oGrid->oTemplate		= 	&$this->obTemplate;

			// operations displayed in the dropdown box like activate,deactivate and delete account	
			
			$oGrid->oData				= &$this->OEmployer;
			$oGrid->bShowCheckBoxes 	= false;				
			$oGrid->SVerticalOperation	= $SVerticalOperation;
			$oGrid->vPage = &$this->vPage;
			$this->obTemplate->assign('VPage', $this->vPage['TotalPages']);
			$this->obTemplate->assign('search_field', $this->search_field);
			$this->obTemplate->assign('search_text', $this->search_text);
			$this->obTemplate->assign('CustomForm', $this->obTemplate->fetch("employer/ihtml/search_fields_account.html"));
			$this->obTemplate->assign('Content', $oGrid->build());
			$this->parse();			
		} //ef
	 	/*
		**************************************************************************************
		*Function Header
		*Function Name  : StatusCandidateReport
		*Function Type  : Call by value	
		*Functionality  : 
		*Input			: nothing
		*Output			: 
		*Return Value   : nothing
		*Note			: .
		***************************************************************************************
		*/
		function StatusCandidateReport()
		{
			global $_CONF;
			$this->member_arrays =  parse_ini_file($_CONF['ModulesPath'].'referrer/ihtml/member-arrays.conf', true);			
			$status		=	$this->member_arrays[status];
			$resultSum = array_sum($this->result);
			$result1 = $this->result;
			foreach($result1 as $key=>$value)
			{
				$averageResult = ($value*100)/$resultSum;
				$resultAverage[$key] = round($averageResult,2);
			}
			
			$resultaverageSum = array_sum($resultAverage);
			$this->obTemplate->assign('result',$this->result);
			$this->obTemplate->assign('resultAverage',$resultAverage);
			$this->obTemplate->assign('resultaverageSum',$resultaverageSum);
			$this->obTemplate->assign('SelectedLocationName',$this->SelectedLocationName); 
			$this->obTemplate->assign('CurDate',date("Y-m-d")); 
			$this->obTemplate->assign('resultSum',$resultSum);
			$this->obTemplate->assign('oLocation',$this->oLocation); 
				
			$this->obTemplate->assign('status',$status);
			$this->obTemplate->assign('location_id',$this->location_id);
			$this->obTemplate->assign('oLocation',$this->oLocation);  
			$this->obTemplate->assign('Content',$this->obTemplate->fetch('employer/ihtml/status_candidate_report.html'));
			$this->parse();
		}

		function StatusCandidateDetails()
		{
			
			global $_CONF;
			
			$this->member_arrays =  parse_ini_file($_CONF['ModulesPath'].'referrer/ihtml/member-arrays.conf', true);			
			$status		=	$this->member_arrays[status];
			$i	=	-1;
			// create headings for the data grid
			$OHeadCell = array();

			$OHeadCell[++$i]					= new gCell();
			$OHeadCell[$i]->iType				= GRID_ELE_TEXT;
			$OHeadCell[$i]->vProperty['Text']	= 'Company Name';
			$OHeadCell[$i]->vProperty['Sort']	= true;

			$OHeadCell[++$i]					= new gCell();
			$OHeadCell[$i]->iType				= GRID_ELE_TEXT;
			$OHeadCell[$i]->vProperty['Text']	= 'Client Name';
			$OHeadCell[$i]->vProperty['Sort']	= true;

			$OHeadCell[++$i]					= new gCell();
			$OHeadCell[$i]->iType				= GRID_ELE_TEXT;
			$OHeadCell[$i]->vProperty['Text']	= 'Date of Posting';
			$OHeadCell[$i]->vProperty['Sort']	= false;


			$OHeadCell[++$i]					= new gCell();
			$OHeadCell[$i]->iType				= GRID_ELE_TEXT;
			$OHeadCell[$i]->vProperty['Text']	= 'Job Title';
			$OHeadCell[$i]->vProperty['Sort']	= false;

			$OHeadCell[++$i]					= new gCell();
			$OHeadCell[$i]->iType				= GRID_ELE_TEXT;
			$OHeadCell[$i]->vProperty['Text']	= 'Candidate Name';
			$OHeadCell[$i]->vProperty['Sort']	= false;
			
			
			//data details
			$i	=	-1;
			
			$ODataCell[++$i] 					= new gCell();
			$ODataCell[$i]->iType 				= GRID_ELE_COL;
			$ODataCell[$i]->vProperty['Col'] 	= 'company_name';
			
			
			$ODataCell[++$i] 					= new gCell();
			$ODataCell[$i]->iType 				= GRID_ELE_COL;
			$ODataCell[$i]->vProperty['Col'] 	= 'client_name';

			$ODataCell[++$i] 					= new gCell();
			$ODataCell[$i]->iType 				= GRID_ELE_COL;
			$ODataCell[$i]->vProperty['Col'] 	= 'posting_date';

			$ODataCell[++$i] 					= new gCell();
			$ODataCell[$i]->iType 				= GRID_ELE_COL;
			$ODataCell[$i]->vProperty['Col'] 	= 'job_title';

			$ODataCell[++$i] 					= new gCell();
			$ODataCell[$i]->iType 				= GRID_ELE_COL;
			$ODataCell[$i]->vProperty['Col'] 	= 'candidate_name';
			
			
			
			
			/*$this->member_arrays =  parse_ini_file($_CONF['ModulesPath'].'referrer/ihtml/member-arrays.conf', true);	
			$payment_method		=	$this->member_arrays[payment_method];
			$this->obTemplate->assign('payment_method', $payment_method);	
			$this->obTemplate->assign('payment_method_id', $this->payment_method_id);	
			$this->obTemplate->assign('from_date',$this->from_date); 
			$this->obTemplate->assign('to_date',$this->to_date); 

			
			$this->obTemplate->assign('CustomForm', $this->obTemplate->fetch("employer/ihtml/search_form.html"));*/
			
			$string = "<table cellspacing='0' cellpadding='0' border='0'><tr><td><B>Title [".$status[$this->status_id]."]&nbsp;&nbsp;&nbsp;#[".count($this->result)."]</B></td></tr></table>";
			$this->obTemplate->assign('CustomForm',$string);
		
			
			
			$oGrid = new Grid();
			$oGrid->sTitle 			=	"Status Candidate Details";
			
			/*if($pid=$this->payment_method_id!=0)
			{
				$Description= "$payment_method[$pid] billing";
			}
			else{
				$Description="All billing ";
			}
			if($this->from_date!="")
			{
				$Description .= " for $this->from_date";
			}
			if($this->to_date!="")
			{
				$Description .= " to $this->to_date";
			}*/
			
			$oGrid->sDescription 	= 	$Description;
			$oGrid->sStage 			= 	"employer";
			$oGrid->oHeadRow 		= 	$OHeadCell;
			$oGrid->oDataRow		= 	$ODataCell;
			$oGrid->sIdentifier 	= 	'member_id';
			$oGrid->oTemplate		= 	&$this->obTemplate;

			$oGrid->oData						= &$this->result;
			$oGrid->bShowCheckBoxes = false;				
			$oGrid->SVerticalOperation	= $SVerticalOperation;
			$oGrid->vPage = &$this->vPage;
			//$this->obTemplate->assign('VPage', $this->vPage['TotalPages']);
			//$string = "<table width='100%'><tr><td><table width='50%' align='right'><tr>                                                        <td width='356' height='10' align='right' valign='middle' class='arial11b000000'>Total :</td>                                                        <td width='116' align='left' valign='middle'> $ $this->total</td>                                                      </tr></table></td></tr></table>";
			//$this->obTemplate->assign('CustomForm1',$string);
			$this->obTemplate->assign('Content', $oGrid->build());
			$this->parse();	
		}

		function StatusOpenPostingsReport()
		{
			global $_CONF;
			$this->member_arrays =  parse_ini_file($_CONF['ModulesPath'].'referrer/ihtml/member-arrays.conf', true);			
			$status		=	$this->member_arrays[status];
			$resultSum = array_sum($this->result);
			$result1 = $this->result;

			foreach($result1 as $key=>$value)
			{
				$averageResult = ($value*100)/$resultSum;
				$resultAverage[$key] = round($averageResult,2);
			}
			
			$resultaverageSum = array_sum($resultAverage);
			$this->obTemplate->assign('result',$this->result);
			$this->obTemplate->assign('resultAverage',$resultAverage);
			$this->obTemplate->assign('resultaverageSum',$resultaverageSum);
			$this->obTemplate->assign('resultSum',$resultSum);
			$this->obTemplate->assign('oLocation',$this->oLocation);
			$this->obTemplate->assign('SelectedLocationName',$this->SelectedLocationName); 	
			$this->obTemplate->assign('CurDate',date("Y-m-d")); 
			$this->obTemplate->assign('status',$status);
			$this->obTemplate->assign('location_id',$this->location_id); $this->obTemplate->assign('Content',$this->obTemplate->fetch('employer/ihtml/status_open_postings_report.html'));
			$this->parse();
		}
		function OpenPostingsCategoryReport()
		{
			global $_CONF;
			$this->member_arrays =  parse_ini_file($_CONF['ModulesPath'].'referrer/ihtml/member-arrays.conf', true);			
			$status		=	$this->member_arrays[status];
			$resultSum = array_sum($this->result);
			$result1 = $this->result;
			foreach($result1 as $key=>$value)
			{
				$averageResult = ($value*100)/$resultSum;
				$resultAverage[$key] = round($averageResult,2);
			}
			$resultaverageSum = array_sum($resultAverage);
			print_r($this->result);
			$this->obTemplate->assign('result',$this->result);
			$this->obTemplate->assign('resultAverage',$resultAverage);
			$this->obTemplate->assign('resultaverageSum',$resultaverageSum);
			$this->obTemplate->assign('resultSum',$resultSum);
			$this->obTemplate->assign('oLocation',$this->oLocation);
			$this->obTemplate->assign('oCategories',$this->oCategories); 	
			$this->obTemplate->assign('SelectedLocationName',$this->SelectedLocationName); 	
			$this->obTemplate->assign('CurDate',date("Y-m-d")); 
			$this->obTemplate->assign('status',$status);
			$this->obTemplate->assign('location_id',$this->location_id);
			$this->obTemplate->assign('oLocation',$this->oLocation); 
			$this->obTemplate->assign('Content',$this->obTemplate->fetch('employer/ihtml/open_postings_category.html'));
			$this->parse();
		}

		function OpenJobTypeReport()
		{
			global $_CONF;
			$this->member_arrays =  parse_ini_file($_CONF['ModulesPath'].'referrer/ihtml/member-arrays.conf', true);			
			$jobType		=	$this->member_arrays[contract];
			$resultSum = array_sum($this->result);
			$result1 = $this->result;
			foreach($result1 as $key=>$value)
			{
				$averageResult = ($value*100)/$resultSum;
				$resultAverage[$key] = round($averageResult,2);
			}
			
			$resultaverageSum = array_sum($resultAverage);
			$this->obTemplate->assign('result',$this->result);
			$this->obTemplate->assign('resultAverage',$resultAverage);
			$this->obTemplate->assign('resultaverageSum',$resultaverageSum);
			$this->obTemplate->assign('resultSum',$resultSum);
			$this->obTemplate->assign('oLocation',$this->oLocation); 
			$this->obTemplate->assign('SelectedLocationName',$this->SelectedLocationName); 	
			$this->obTemplate->assign('CurDate',date("Y-m-d")); 	
			$this->obTemplate->assign('jobType',$jobType);
			$this->obTemplate->assign('location_id',$this->location_id);  
			$this->obTemplate->assign('Content',$this->obTemplate->fetch('employer/ihtml/open_job_type.html'));
			$this->parse();
		}


		function TopCompaniesLocation()
		{
			global $_CONF;
			
			$resultSum = array_sum($this->result);
			$result1 = $this->result;
			foreach($result1 as $key=>$value)
			{
				$averageResult = ($value*100)/$resultSum;
				$resultAverage[$key] = round($averageResult,2);
			}
			
			$resultaverageSum = array_sum($resultAverage);
			$this->obTemplate->assign('result',$this->result);
			$this->obTemplate->assign('resultAverage',$resultAverage);
			$this->obTemplate->assign('resultaverageSum',$resultaverageSum);
			$this->obTemplate->assign('SelectedLocationName',$this->SelectedLocationName); 	
			$this->obTemplate->assign('CurDate',date("Y-m-d")); 	
			$this->obTemplate->assign('resultSum',$resultSum);
			$this->obTemplate->assign('oLocation',$this->oLocation);
			$this->obTemplate->assign('from_date',$this->from_date); 
			$this->obTemplate->assign('to_date',$this->to_date); 
			$this->obTemplate->assign('location_id',$this->location_id); 
			$this->obTemplate->assign('Content',$this->obTemplate->fetch('employer/ihtml/top_companies_location.html'));
			$this->parse();
		}

		function TopCompaniesCategory()
		{
			global $_CONF;
			$resultSum = array_sum($this->result);
			$result1 = $this->result;
			
			foreach($result1 as $key=>$value)
			{
				$averageResult = ($value*100)/$resultSum;
				$resultAverage[$key] = round($averageResult,2);
			}
			
			$resultaverageSum = array_sum($resultAverage);
			$this->obTemplate->assign('result',$this->result);
			$this->obTemplate->assign('resultAverage',$resultAverage);
			$this->obTemplate->assign('resultaverageSum',$resultaverageSum);
			$this->obTemplate->assign('resultSum',$resultSum);
			$this->obTemplate->assign('SelectedCategoryName',$this->SelectedCategoryName); 	
			$this->obTemplate->assign('CurDate',date("Y-m-d")); 	
			$this->obTemplate->assign('oCategories',$this->oCategories);
			$this->obTemplate->assign('from_date',$this->from_date); 
			$this->obTemplate->assign('to_date',$this->to_date); 
			$this->obTemplate->assign('category_id',$this->category_id); $this->obTemplate->assign('Content',$this->obTemplate->fetch('employer/ihtml/top_companies_category.html'));
			$this->parse();
		}
		function BillingAR()
		{
			
			global $_CONF;
			$i	=	-1;
			// create headings for the data grid
			$OHeadCell = array();

			$OHeadCell[++$i]					= new gCell();
			$OHeadCell[$i]->iType				= GRID_ELE_TEXT;
			$OHeadCell[$i]->vProperty['Text']	= 'Company Name';
			$OHeadCell[$i]->vProperty['Sort']	= true;

			$OHeadCell[++$i]					= new gCell();
			$OHeadCell[$i]->iType				= GRID_ELE_TEXT;
			$OHeadCell[$i]->vProperty['Text']	= 'Employer Name';
			$OHeadCell[$i]->vProperty['Sort']	= false;

			$OHeadCell[++$i]					= new gCell();
			$OHeadCell[$i]->iType				= GRID_ELE_TEXT;
			$OHeadCell[$i]->vProperty['Text']	= 'Employer contact tel number and email';
			$OHeadCell[$i]->vProperty['Sort']	= false;


			$OHeadCell[++$i]					= new gCell();
			$OHeadCell[$i]->iType				= GRID_ELE_TEXT;
			$OHeadCell[$i]->vProperty['Text']	= 'Reference Number';
			$OHeadCell[$i]->vProperty['Sort']	= false;

			$OHeadCell[++$i]					= new gCell();
			$OHeadCell[$i]->iType				= GRID_ELE_TEXT;
			$OHeadCell[$i]->vProperty['Text']	= 'Date of invoice or paypal pmt';
			$OHeadCell[$i]->vProperty['Sort']	= false;
			
			$OHeadCell[++$i]					= new gCell();
			$OHeadCell[$i]->iType				= GRID_ELE_TEXT;
			$OHeadCell[$i]->vProperty['Text']	= 'Days Overdue';
			$OHeadCell[$i]->vProperty['Sort']	= true;
			
			$OHeadCell[++$i] = new gCell();
			$OHeadCell[$i]->iType = GRID_ELE_TEXT;
			$OHeadCell[$i]->vProperty['Text']= 'Candidate Name';
			$OHeadCell[$i]->vProperty['Sort']	= false;

			$OHeadCell[++$i] = new gCell();
			$OHeadCell[$i]->iType = GRID_ELE_TEXT;
			$OHeadCell[$i]->vProperty['Text']= 'Total Amount client is paying';
			$OHeadCell[$i]->vProperty['Sort']	= true;
			
			//data details
			$i	=	-1;
			
			$ODataCell[++$i] 					= new gCell();
			$ODataCell[$i]->iType 				= GRID_ELE_COL;
			$ODataCell[$i]->vProperty['Col'] 	= 'company_name';
			
			
			$ODataCell[++$i] 					= new gCell();
			$ODataCell[$i]->iType 				= GRID_ELE_COL;
			$ODataCell[$i]->vProperty['Col'] 	= 'employer_name';

			$ODataCell[++$i] 					= new gCell();
			$ODataCell[$i]->iType 				= GRID_ELE_COL;
			$ODataCell[$i]->vProperty['Col'] 	= 'contact_no';

			$ODataCell[++$i] 					= new gCell();
			$ODataCell[$i]->iType 				= GRID_ELE_COL;
			$ODataCell[$i]->vProperty['Col'] 	= 'ref_no';

			$ODataCell[++$i] 					= new gCell();
			$ODataCell[$i]->iType 				= GRID_ELE_COL;
			$ODataCell[$i]->vProperty['Col'] 	= 'date_of_payment';
			
			$ODataCell[++$i] 					= new gCell();
			$ODataCell[$i]->iType 				= GRID_ELE_COL;
			$ODataCell[$i]->vProperty['Col'] 	= 'days_overdue';
			
			$ODataCell[++$i] 					= new gCell();
			$ODataCell[$i]->iType 				= GRID_ELE_COL;
			$ODataCell[$i]->vProperty['Col'] 	= 'candidate_name';
			
			$ODataCell[++$i] 					= new gCell();
			$ODataCell[$i]->iType 				= GRID_ELE_COL;
			$ODataCell[$i]->vProperty['Col'] 	= 'reward_amount';
			
			
			$this->member_arrays =  parse_ini_file($_CONF['ModulesPath'].'referrer/ihtml/member-arrays.conf', true);	
			$payment_method		=	$this->member_arrays[payment_method];
			$this->obTemplate->assign('payment_method', $payment_method);	
			$this->obTemplate->assign('payment_method_id', $this->payment_method_id);	
			$this->obTemplate->assign('from_date',$this->from_date); 
			$this->obTemplate->assign('to_date',$this->to_date); 

			
			$this->obTemplate->assign('CustomForm', $this->obTemplate->fetch("employer/ihtml/search_form.html"));
			
			
		
			
			
			$oGrid = new Grid();
			$oGrid->sTitle 			=	"Billing A/R";
			
			if($pid=$this->payment_method_id!=0)
			{
				$Description= "$payment_method[$pid] billing";
			}
			else{
				$Description="All billing ";
			}
			if($this->from_date!="")
			{
				$Description .= " for $this->from_date";
			}
			if($this->to_date!="")
			{
				$Description .= " to $this->to_date";
			}
			
			$oGrid->sDescription 	= 	$Description;
			$oGrid->sStage 			= 	"employer";
			$oGrid->oHeadRow 		= 	$OHeadCell;
			$oGrid->oDataRow		= 	$ODataCell;
			$oGrid->sIdentifier 	= 	'member_id';
			$oGrid->oTemplate		= 	&$this->obTemplate;

			$oGrid->oData						= &$this->result;
			$oGrid->bShowCheckBoxes = false;				
			$oGrid->SVerticalOperation	= $SVerticalOperation;
			$oGrid->vPage = &$this->vPage;
			$this->obTemplate->assign('VPage', $this->vPage['TotalPages']);
			$string = "<table width='100%'><tr><td><table width='50%' align='right'><tr>
                                                        <td width='356' height='10' align='right' valign='middle' class='arial11b000000'>Total :</td>
                                                        <td width='116' align='left' valign='middle'> $ $this->total</td>
                                                      </tr></table></td></tr></table>
";
			$this->obTemplate->assign('CustomForm1',$string);
			$this->obTemplate->assign('Content', $oGrid->build());
			$this->parse();	
		}

		
		function Guarantee()
		{
			
			global $_CONF;
			$i	=	-1;
			// create headings for the data grid
			$OHeadCell = array();

			$OHeadCell[++$i]					= new gCell();
			$OHeadCell[$i]->iType				= GRID_ELE_TEXT;
			$OHeadCell[$i]->vProperty['Text']	= 'Company Name';
			$OHeadCell[$i]->vProperty['Sort']	= true;
			
			$OHeadCell[++$i]					= new gCell();
			$OHeadCell[$i]->iType				= GRID_ELE_TEXT;
			$OHeadCell[$i]->vProperty['Text']	= 'Employer Name';
			$OHeadCell[$i]->vProperty['Sort']	= false;
	
			$OHeadCell[++$i] = new gCell();
			$OHeadCell[$i]->iType = GRID_ELE_TEXT;
			$OHeadCell[$i]->vProperty['Text']= 'Candidate Name';
			$OHeadCell[$i]->vProperty['Sort']	= false;
						
			$OHeadCell[++$i] = new gCell();
			$OHeadCell[$i]->iType = GRID_ELE_TEXT;
			$OHeadCell[$i]->vProperty['Text']= 'Referrer Name';
			$OHeadCell[$i]->vProperty['Sort']	= false;
		
			$OHeadCell[++$i]					= new gCell();
			$OHeadCell[$i]->iType				= GRID_ELE_TEXT;
			$OHeadCell[$i]->vProperty['Text']	= 'Start Date';
			$OHeadCell[$i]->vProperty['Sort']	= false;
		
			$OHeadCell[++$i]					= new gCell();
			$OHeadCell[$i]->iType				= GRID_ELE_TEXT;
			$OHeadCell[$i]->vProperty['Text']	= 'Days after Start Date';
			$OHeadCell[$i]->vProperty['Sort']	= false;
	
			$OHeadCell[++$i]					= new gCell();
			$OHeadCell[$i]->iType				= GRID_ELE_TEXT;
			$OHeadCell[$i]->vProperty['Text']	= 'Bohire Fee';
			$OHeadCell[$i]->vProperty['Sort']	= true;
	
			$OHeadCell[++$i]					= new gCell();
			$OHeadCell[$i]->iType				= GRID_ELE_TEXT;
			$OHeadCell[$i]->vProperty['Text']	= 'Referral Reward';
			$OHeadCell[$i]->vProperty['Sort']	= false;


			
			//data details
			$i	=	-1;
			
			$ODataCell[++$i] 					= new gCell();
			$ODataCell[$i]->iType 				= GRID_ELE_COL;
			$ODataCell[$i]->vProperty['Col'] 	= 'company_name';
			
			
			$ODataCell[++$i] 					= new gCell();
			$ODataCell[$i]->iType 				= GRID_ELE_COL;
			$ODataCell[$i]->vProperty['Col'] 	= 'employer_name';

			$ODataCell[++$i] 					= new gCell();
			$ODataCell[$i]->iType 				= GRID_ELE_COL;
			$ODataCell[$i]->vProperty['Col'] 	= 'candidate_name';
			
			$ODataCell[++$i] 					= new gCell();
			$ODataCell[$i]->iType 				= GRID_ELE_COL;
			$ODataCell[$i]->vProperty['Col'] 	= 'referrer_name';
			
			$ODataCell[++$i] 					= new gCell();
			$ODataCell[$i]->iType 				= GRID_ELE_COL;
			$ODataCell[$i]->vProperty['Col'] 	= 'start_date';

			$ODataCell[++$i] 					= new gCell();
			$ODataCell[$i]->iType 				= GRID_ELE_COL;
			$ODataCell[$i]->vProperty['Col'] 	= 'days_after_start_date';

			$ODataCell[++$i] 					= new gCell();
			$ODataCell[$i]->iType 				= GRID_ELE_COL;
			$ODataCell[$i]->vProperty['Col'] 	= 'bohire_fee';

			$ODataCell[++$i] 					= new gCell();
			$ODataCell[$i]->iType 				= GRID_ELE_COL;
			$ODataCell[$i]->vProperty['Col'] 	= 'reward_amount';

		
			$this->member_arrays =  parse_ini_file($_CONF['ModulesPath'].'referrer/ihtml/member-arrays.conf', true);	
			$payment_method		=	$this->member_arrays[payment_method];
			$this->obTemplate->assign('payment_method', $payment_method);	
			$this->obTemplate->assign('payment_method_id', $this->payment_method_id);	
			$this->obTemplate->assign('from_date',$this->from_date); 
			$this->obTemplate->assign('to_date',$this->to_date); 

			$this->obTemplate->assign('CustomForm', $this->obTemplate->fetch("employer/ihtml/search_form_guarantee.html"));
			
			
			$oGrid = new Grid();
			$oGrid->sTitle 			=	"30 Day Guarantee";
			if($pid=$this->payment_method_id!=0)
			{
				$Description= "$payment_method[$pid] Referrer Payments due";
				
			}
			else{
				$Description="All Referrer Payments due";
			}
			if($this->from_date!="")
			{
				$Description .= " for $this->from_date";
			}
			if($this->to_date!="")
			{
				$Description .= " to $this->to_date";
			}
			
			$oGrid->sDescription 	= 	$Description;
			$oGrid->sStage 			= 	"employer";
			$oGrid->oHeadRow 		= 	$OHeadCell;
			$oGrid->oDataRow		= 	$ODataCell;
			$oGrid->sIdentifier 	= 	'member_id';
			$oGrid->oTemplate		= 	&$this->obTemplate;

			$oGrid->oData						= &$this->result;
			$oGrid->bShowCheckBoxes = false;				
			$oGrid->SVerticalOperation	= $SVerticalOperation;
			$oGrid->vPage = &$this->vPage;
			$this->obTemplate->assign('VPage', $this->vPage['TotalPages']);
			$string = "<table width='100%'><tr><td><table width='100%' align='right' border='0'>
			<tr><td width='150'>&nbsp;<td width='100'>&nbsp;</td><td style='font-size:13px;font-weight:bold;text-decoration:underline' align='center'>Bohire Fee</td><td style='font-size:13px;font-weight:bold;text-decoration:underline' align='center'>Referral Reward</td></tr>
			<tr><td width='150'>&nbsp;<td width='100' style='font-size:13px;font-weight:bold;text-decoration:none'>Total</td><td align='center'>$$this->totalBohireFee</td><td align='center'>$$this->totalReferralReward</td></tr>
			<tr><td width='150'>&nbsp;<td width='100' style='font-size:13px;font-weight:bold;text-decoration:none'>Total Revenue</td><td align='center'>&nbsp;</td><td align='center'>$$this->totalRevenue ($this->totalBohireFee+$this->totalReferralReward)</td></tr>
			</table></td></tr></table>
";
			$this->obTemplate->assign('CustomForm1',$string);
			$this->obTemplate->assign('Content', $oGrid->build());
			$this->parse();	
		}
	 	/*
		**************************************************************************************
		*Function Header
		*Function Name  : EmployerAccountsResumeDatabase
		*Function Type  : Call by value	
		*Functionality  : List all the Employers
		*Input			: nothing
		*Output			: List of all the Employers
		*Return Value   : nothing
		*Note			: this function uses grid class to generate a list of all the Employers.
		***************************************************************************************
		*/
		function EmployerAccountsResumeDatabase()
		{
			global $_CONF;
			$i	=	-1;
			// create headings for the data grid
			$OHeadCell = array();
			
			$OHeadCell[++$i]					= new gCell();
			$OHeadCell[$i]->iType				= GRID_ELE_TEXT;
			$OHeadCell[$i]->vProperty['Text']	= 'Name';
			$OHeadCell[$i]->vProperty['Sort']	= true;

			$OHeadCell[++$i]					= new gCell();
			$OHeadCell[$i]->iType				= GRID_ELE_TEXT;
			$OHeadCell[$i]->vProperty['Text']	= 'Company Name';
			$OHeadCell[$i]->vProperty['Sort']	= true;

			$OHeadCell[++$i]					= new gCell();
			$OHeadCell[$i]->iType				= GRID_ELE_TEXT;
			$OHeadCell[$i]->vProperty['Text']	= 'IsApprove';
			$OHeadCell[$i]->vProperty['Sort']	= true;

			$OHeadCell[++$i]					= new gCell();
			$OHeadCell[$i]->iType				= GRID_ELE_TEXT;
			$OHeadCell[$i]->vProperty['Text']	= 'Price';
			$OHeadCell[$i]->vProperty['Sort']	= true;

			$OHeadCell[++$i]					= new gCell();
			$OHeadCell[$i]->iType				= GRID_ELE_TEXT;
			$OHeadCell[$i]->vProperty['Text']	= 'Access Expires';
			$OHeadCell[$i]->vProperty['Sort']	= true;

			$OHeadCell[++$i] = new gCell();
			$OHeadCell[$i]->iType = GRID_ELE_TEXT;
			$OHeadCell[$i]->vProperty['Text']= 'Edit';
			
			
			//data details
			$i	=	-1;
					
			$ODataCell[++$i] 					= new gCell();
			$ODataCell[$i]->iType 				= GRID_ELE_COL;
			$ODataCell[$i]->vProperty['Col'] 	= 'fullname';
	
			$ODataCell[++$i] 					= new gCell();
			$ODataCell[$i]->iType 				= GRID_ELE_COL;
			$ODataCell[$i]->vProperty['Col'] 	= 'company_name';
			
			$ODataCell[++$i] 					= new gCell();
			$ODataCell[$i]->iType 				= GRID_ELE_COL;
			$ODataCell[$i]->vProperty['Col'] 	= 'approve_status';

			$ODataCell[++$i] 					= new gCell();
			$ODataCell[$i]->iType 				= GRID_ELE_COL;
			$ODataCell[$i]->vProperty['Col'] 	= 'price';

			$ODataCell[++$i] 					= new gCell();
			$ODataCell[$i]->iType 				= GRID_DATE;
			$ODataCell[$i]->vProperty['Col'] 	= 'date_access_expired';

			$ODataCell[++$i] 					= 	new gCell();
			$ODataCell[$i]->iType 				= 	GRID_ELE_IMAGE_LINK;
			$ODataCell[$i]->vProperty['Text']	= 	'Manage Account';
			$ODataCell[$i]->vProperty['Image']	= 	$_CONF[ImageUrl].'icons/edit.gif';
			$ODataCell[$i]->vProperty['Link']	= 	'index.php';
			$ODataCell[$i]->vProperty['FixedQueryString']		= 	array('stage'=>'employer','mode'=>'EditEmployerAccountsResumeDatabase');
			$ODataCell[$i]->vProperty['FloatingQueryString']	= 	array('id'=>'member_id');
			$ODataCell[$i]->vProperty['bNewWindow']				= 	false;
			
			$oGrid = new Grid();
			$oGrid->sTitle 			=	"Employer Resume Database";
			$oGrid->sDescription 	= 	"Manage list of Employers for resume database.";
			$oGrid->sStage 			= 	"employer";
			$oGrid->oHeadRow 		= 	$OHeadCell;
			$oGrid->oDataRow		= 	$ODataCell;
			$oGrid->sIdentifier 	= 	'member_id';
			$oGrid->oTemplate		= 	&$this->obTemplate;

			// operations displayed in the dropdown box like activate,deactivate and delete account	
			
			$oGrid->oData				= &$this->OEmployer;
			$oGrid->bShowCheckBoxes 	= false;				
			$oGrid->SVerticalOperation	= $SVerticalOperation;
			$oGrid->vPage = &$this->vPage;
			$this->obTemplate->assign('VPage', $this->vPage['TotalPages']);
			$this->obTemplate->assign('search_field', $this->search_field);
			$this->obTemplate->assign('search_text', $this->search_text);
			$this->obTemplate->assign('CustomForm', $this->obTemplate->fetch("employer/ihtml/search_fields_resume_database.html"));
			$this->obTemplate->assign('Content', $oGrid->build());
			$this->parse();
		} //ef
		/*
		**************************************************************************************
		*Function Header
		*Function Name  : EditEmployerAccountsResumeDatabase
		*Function Type  : Call by value	
		*Functionality  : .
		*Input			: .
		*Output			: .
		*Return Value   : nothing
		*Note			: nothing.
		***************************************************************************************
		*/
		function EditEmployerAccountsResumeDatabase()
	   	{
	    	global $_CONF;
		 
			$this->obTemplate->clear_cache('employer/ihtml/edit_profile_resumedb.html');
			$this->obTemplate->assign('oEmployer',$this->oEmployer);
			$this->obTemplate->assign('Content',$this->obTemplate->fetch('employer/ihtml/edit_profile_resumedb.html'));
			$this->parse();
		}//ef
		/*
		**************************************************************************************
		*Function Header
		*Function Name  : PriceEdit
		*Function Type  : Call by value	
		*Functionality  : .
		*Input			: .
		*Output			: .
		*Return Value   : nothing
		*Note			: nothing.
		***************************************************************************************
		*/
		function ListPrice()
		{
			global $_CONF;
			$i	=	-1;
			// create headings for the data grid
			$OHeadCell = array();
			
			$OHeadCell[++$i]					= new gCell();
			$OHeadCell[$i]->iType				= GRID_ELE_TEXT;
			$OHeadCell[$i]->vProperty['Text']	= 'Subscription Type';
			$OHeadCell[$i]->vProperty['Sort']	= true;

			$OHeadCell[++$i]					= new gCell();
			$OHeadCell[$i]->iType				= GRID_ELE_TEXT;
			$OHeadCell[$i]->vProperty['Text']	= 'Subscription Price';
			$OHeadCell[$i]->vProperty['Sort']	= true;

			$OHeadCell[++$i] = new gCell();
			$OHeadCell[$i]->iType = GRID_ELE_TEXT;
			$OHeadCell[$i]->vProperty['Text']= 'Edit';
			
			
			//data details
			$i	=	-1;
					
			$ODataCell[++$i] 					= new gCell();
			$ODataCell[$i]->iType 				= GRID_ELE_COL;
			$ODataCell[$i]->vProperty['Col'] 	= 'price_text';
	
			$ODataCell[++$i] 					= new gCell();
			$ODataCell[$i]->iType 				= GRID_ELE_COL;
			$ODataCell[$i]->vProperty['Col'] 	= 'price';
			
			$ODataCell[++$i] 					= 	new gCell();
			$ODataCell[$i]->iType 				= 	GRID_ELE_IMAGE_LINK;
			$ODataCell[$i]->vProperty['Text']	= 	'Edit Price';
			$ODataCell[$i]->vProperty['Image']	= 	$_CONF[ImageUrl].'icons/edit.gif';
			$ODataCell[$i]->vProperty['Link']	= 	'index.php';
			$ODataCell[$i]->vProperty['FixedQueryString']		= 	array('stage'=>'employer','mode'=>'PriceEdit');
			$ODataCell[$i]->vProperty['FloatingQueryString']	= 	array('id'=>'price_id');
			$ODataCell[$i]->vProperty['bNewWindow']				= 	false;
			
			$oGrid = new Grid();
			$oGrid->sTitle 			=	"Employer Resume Database";
			$oGrid->sDescription 	= 	"Manage Subscriptions.";
			$oGrid->sStage 			= 	"employer";
			$oGrid->oHeadRow 		= 	$OHeadCell;
			$oGrid->oDataRow		= 	$ODataCell;
			$oGrid->sIdentifier 	= 	'price_id';
			$oGrid->oTemplate		= 	&$this->obTemplate;

			// operations displayed in the dropdown box like activate,deactivate and delete account	
			
			$oGrid->oData				= &$this->OEmployer;
			$oGrid->bShowCheckBoxes 	= false;				
			$oGrid->SVerticalOperation	= $SVerticalOperation;
			$oGrid->vPage = &$this->vPage;
			$this->obTemplate->assign('VPage', $this->vPage['TotalPages']);
/*			$this->obTemplate->assign('search_field', $this->search_field);
			$this->obTemplate->assign('search_text', $this->search_text);
			$this->obTemplate->assign('CustomForm', $this->obTemplate->fetch("employer/ihtml/search_fields_resume_database.html"));*/
			$this->obTemplate->assign('Content', $oGrid->build());
			$this->parse();
		}//ef
		/*
		**************************************************************************************
		*Function Header
		*Function Name  : PriceEdit
		*Function Type  : Call by value	
		*Functionality  : .
		*Input			: .
		*Output			: .
		*Return Value   : nothing
		*Note			: nothing.
		***************************************************************************************
		*/
		function PriceEdit()
		{
			$this->obTemplate->clear_cache('employer/ihtml/edit_price.html');
			$this->obTemplate->assign('oEmployer',$this->oEmployer);
			$this->obTemplate->assign('Content',$this->obTemplate->fetch('employer/ihtml/edit_price.html'));
			$this->parse();
		}//ef
	}//ec
?>