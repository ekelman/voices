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
		

		
	/***************************************************************************************
	*Function Header
	*Function Name  : EmployerController
	*Function Type  : Constructor	
	*Functionality  : Initializes objects of different classes 
	*Input			: nothing
	*Output			: Class objects
	*Return Value   : nothing
	*Note			: nothing
	****************************************************************************************/
			
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
	
		/**************************************************************************************
		*Function Header
		*Function Name  : ActivateEmployer
		*Function Type  : Call by value	
		*Functionality  : Activates a employer or list of employers
		*Input			: member id or ids
		*Output			: Activates a employer or list of employers
		*Return Value   : nothing
		*Note			: nothing
		***************************************************************************************
		*/
		
		
		
		/***************************************************************************************
		*Function Header
		*Function Name  : ListEmployers
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
				$err= "This Employer account has been already Activated.";
			} elseif($_REQUEST['msg']=='3') {
				$err= "This Employer account has been Successfully Activated.";
			} elseif($_REQUEST['msg']=='4') {
				$err= "This Employer has been already Approved.";
			} elseif($_REQUEST['msg']=='5') {
				$err= "There is some technical problem in sending approving email.<br>Please try later.";
			} elseif($_REQUEST['msg']=='6') {
				$err= "This Employer has been successfully Approved.";
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
		function EmployerDetails()
		{
			if(isset($_REQUEST['id']))
			{
				$emp_id = $_REQUEST['id'];
				$oEmployer = $this->oModel->getEmployerDetails($emp_id);
				
				$oEmployer = $oEmployer[0];
				$oReferrer=$this->oModel->GetReferrerName($oEmployer->referred_id);
				
				$oEmployer->referrer=$oReferrer[0]->first_name." ".$oReferrer[0]->last_name;
			}
			  
			$oProvince = $this->oModel->getProvince();
			$oEmployer->location = $oLocation[$oEmployer->location];
			$this->oView->oLocation = $oLocation;
			$this->oView->oEmployer = $oEmployer;
			$this->oView->search_field 	= $_REQUEST['search_field'];
			$this->oView->search_text 	= $_REQUEST['search_text'];
			$this->oView->EmployerDetails();		
		}//ef
		
		/**************************************************************************************
		*Function Header
		*Function Name  : ActivateEmployer
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
		*Function Header
		*Function Name  : DeleteEmployer
		*Function Type  : Call by value	
		*Functionality  : Deletes employer or list of employers
		*Input			: member id or ids
		*Output			: Deletes employer or list of employers
		*Return Value   : nothing
		*Note			: nothing
		***************************************************************************************
		*/
		
		function DeleteEmployer()
		{							
			$_REQUEST['mode'] 		= "DeleteEmployer";
			$this->oModel->DeleteEmployer($_REQUEST['identity']);

			//Required later
			/*$oJob= $this->oModel->GetEmployerJobs($_REQUEST['identity']);
			for($i=0;$i< count($oJob);$i++)
			{
			$jobIds[]=$oJob[$i]->job_id;
			}
			$rs= $this->oModel->DeleteEmployer($_REQUEST['identity']);
			if($rs)
			{
			$rs1=$this->oModel->DeleteEmployerJobs($jobIds);
			}*/
			
			$err = "Record(s) deleted successfully.";
			
			$this->ListEmployers($err);
		}//ef
/*
		**************************************************************************************
		*function header
		*function name  : EmployerEdit
		*function type  : call by value	
		*functionality  : display the details of employer to edit
		*input			: member id
		*output			: display the details of employer to edit.
		*return value   : nothing
		*note			: nothing
		***************************************************************************************
		*/
		function EmployerEdit($err="")
		{
			
			if(isset($_REQUEST['id']))
			{
				$emp_id = $_REQUEST['id'];
				$oEmployer = $this->oModel->getEmployerDetails($emp_id);
				$oEmployer  = $oEmployer[0];
				$oEmployer->hear_mode = explode(",",$oEmployer->hear_mode);
				$oEmployer->category = explode(",",$oEmployer->category);
			}
			$oCategory = $this->oModel->getCategories();
			$oProvince = $this->oModel->getProvince();
			$this->oView->oCategory = $oCategory;
			$this->oView->oProvince = $oProvince;
			$this->oView->oEmployer = $oEmployer;
			$this->oView->search_field 	= $_REQUEST['search_field'];
			$this->oView->search_text 	= $_REQUEST['search_text'];
			
			$this->oView->sErrorMsg=$err;
			$this->oView->EmployerEdit();
		}//ef
		/*
		**************************************************************************************
		*function header
		*function name  : UpdateEmployer
		*function type  : call by value	
		*functionality  : update the account of employer
		*input			: oEmployer array
		*output			: update the account of employer
		*return value   : nothing
		*note			: nothing
		***************************************************************************************
		*/
		function UpdateEmployer()
		{  
			if ($_POST['Cancel']=='Cancel') {    
				$this->ListEmployers();
			   	die();
		  	}
		    $oEmployer->id					=	htmlentities($_POST['id'],ENT_QUOTES);
	        $oEmployer->first_name			=	htmlentities($_POST['first_name'],ENT_QUOTES);
			$oEmployer->last_name			=	htmlentities($_POST['last_name'],ENT_QUOTES);
			$oEmployer->company_name		=	htmlentities($_POST['company_name'],ENT_QUOTES);
			$oEmployer->job_title			=	htmlentities($_POST['job_title'],ENT_QUOTES);
			$oEmployer->address				=	htmlentities($_POST['address'],ENT_QUOTES);
			$oEmployer->province	        =	htmlentities($_POST['province_id'],ENT_QUOTES);
			$oEmployer->city	            =	htmlentities($_POST['city'],ENT_QUOTES);
			$oEmployer->logo				=	htmlentities($_POST['logo'],ENT_QUOTES);
			$oEmployer->postal_code			=	htmlentities($_POST['postal_code'],ENT_QUOTES);
			$oEmployer->postal_code1		=	htmlentities($_POST['postal_code1'],ENT_QUOTES);
			$oEmployer->phone_no1			=	htmlentities($_POST['phone_no1'],ENT_QUOTES);
			$oEmployer->phone_no2			=	htmlentities($_POST['phone_no2'],ENT_QUOTES);
			$oEmployer->phone_no3			=	htmlentities($_POST['phone_no3'],ENT_QUOTES);
			$oEmployer->ext					=	htmlentities($_POST['ext'],ENT_QUOTES);
			$oEmployer->epassword			=	$_POST['password'];
			$oEmployer->hear_mode			=	implode(",",$_POST['hear_mode']);
			$oEmployer->company_bio			=	htmlentities($_POST['company_bio'],ENT_QUOTES);
			$oEmployer->comp_website		=	htmlentities($_POST['company_website'],ENT_QUOTES);
			$oEmployer->security_question	=	htmlentities($_POST['security_question'],ENT_QUOTES);
			$oEmployer->security_ans		=	htmlentities($_POST['answer'],ENT_QUOTES);
			$oEmployer->newsletter			=	$_POST['newsletter'];
			$oEmployer->staffing_agency		=	$_POST['staffing_agency'];
			
			$OVE[]	=	new ValidationElement(array('First Name'=>$oEmployer->first_name), array('Blank'));
			$OVE[]	=	new ValidationElement(array('Last Name'=>$oEmployer->last_name), array('Blank'));
			$OVE[]	=	new ValidationElement(array('Company Name'=>$oEmployer->company_name), array('Blank'));
			$OVE[]	=	new ValidationElement(array('Job Title'=>$oEmployer->job_title), array('Blank'));
			$OVE[]	=	new ValidationElement(array('Address'=>$oEmployer->address), array('Blank'));
			$OVE[]	=	new ValidationElement(array('Province'=>$oEmployer->province), array('Blank'));
			$OVE[]	=	new ValidationElement(array('City'=>$oEmployer->city), array('Blank'));
			$OVE[]	=	new ValidationElement(array('Postal Code'=>$oEmployer->postal_code), array('Blank'));
			$OVE[]	=	new ValidationElement(array('Postal Code'=>$oEmployer->postal_code1), array('Blank'));
			$OVE[]	=	new ValidationElement(array('Phone no'=>$oEmployer->phone_no1), array('Blank'));
			$OVE[]	=	new ValidationElement(array('Phone no'=>$oEmployer->phone_no2), array('Blank'));
			$OVE[]	=	new ValidationElement(array('Phone no'=>$oEmployer->phone_no3), array('Blank'));
			
			
			$OVE[]	=	new ValidationElement(array('Security Question'=>$oEmployer->security_question), array('Blank'));
			$OVE[]	=	new ValidationElement(array('Security Answer'=>$oEmployer->security_ans), array('Blank'));
			$oVC					=		new ValidationCheck($OVE);
		    $bResponse 				= 		$oVC->Check();
			$errorMessage			=		implode("<br>", $oVC->SErrorMsg);
	        if($bResponse==0)
			{
				$this->EmployerEdit($errorMessage);
			 	die();
			} else {
			
				$rs= $this->oModel->UpdateAdminEmployer($oEmployer);
			 	header("location:".$_CONF['AdminURL']."index.php?stage=employer&mode=ListEmployers&msg=1&search_field=$_REQUEST[search_field]&search_text=$_REQUEST[search_text]");
			}
		}//ef
		/*
		**************************************************************************************
		*function header
		*function name  : ApproveEmployer
		*function type  : call by value	
		*functionality  : approving the new registeration of employer and sending confirmation mail.
		*input			: member id
		*output			: approving the new registeration of employer and sending confirmation mail.
		*return value   : nothing
		*note			: nothing
		***************************************************************************************
		*/
		function ApproveEmployer() 
		{       
			global $_CONF;
			$id= $_REQUEST['id'];
			$oEmployer=$this->oModel->CheckApprove($id);
			if($oEmployer)
			{
				//$err= "This Employer has been already Approved.";
				echo "<script>location.href='index.php?stage=employer&mode=ListEmployers&msg=4&search_text=$_REQUEST[search_text]&search_field=$_REQUEST[search_field]'</script>";
				
				//$this->ListEmployers($err);
			} else { 
			
				$oEmployer=$this->oModel->getEmployerDetails($id);
				$rs=$this->oModel->MakeApprove($id);
			
				if($rs)
				{
					$oEmail=$this->oModel->GetEmail(3);
					$sesID				=	session_id();
					$timestamp			=	date("mdYHis",time());
					$activationNumber	=	$oEmployer[0]->member_id."$sesID$timestamp";
					$encryptedid	=	md5($activationNumber);		
					$activationArray['member_id']				=	$oEmployer[0]->member_id;		
					$activationArray['activationNumber']	=	$encryptedid;
					$this->oModel->saveActivationNumber($activationArray);			
			   
					$email=$oEmployer[0]->email;
					$sName= $oEmployer[0]->first_name." ". $oEmployer[0]->last_name;
					$sUserName	=	  $oEmployer[0]->email;
					$spassword	=	      $oEmployer[0]->passwordtemp;
					$slink	=	"<a href='".$_CONF['SiteUrl']."/index.php?stage=employer&mode=ActivateAccount&activeno=$encryptedid'>Activate</a>";
					$dynamicInfo = array(stripslashes(html_entity_decode($sName)),$sUserName,$spassword,$slink);
					$staticInfo =array('(sName)','(sUserName)','(spassword)','(slink)');
					$body=stripslashes(html_entity_decode($oEmail[0]->content));
					$newbody = str_replace($staticInfo,$dynamicInfo,$body);
					$text		=	CreateMailMessage($newbody);
					$subject= $oEmail[0]->subject;
					$result	=	SendMail($text[body], $subject, array($email),"admin@bohire.com");
					$testEmail = $_CONF['ClintonEmailId'];
					$result1	=	SendMail($text[body], $subject, array($testEmail),"admin@bohire.com");
					if(!$result){
					   
					   //$this->oView->SErrorMsg	= "There is some technical problem in sending approving email.<br>Please try later.";

						echo "<script>location.href='index.php?stage=employer&mode=ListEmployers&msg=5&search_text=$_REQUEST[search_text]&search_field=$_REQUEST[search_field]'</script>";
					}
					
					//$err= "This Employer has been successfully Approved.";
					//$this->oView->search_field 	= $_REQUEST['search_field'];
					//$this->oView->search_text 	= $_REQUEST['search_text'];
					
					//$this->ListEmployers($err);
					
					echo "<script>location.href='index.php?stage=employer&mode=ListEmployers&msg=6&search_text=$_REQUEST[search_text]&search_field=$_REQUEST[search_field]'</script>";
					die();
				}
				echo "<script>location.href='index.php?stage=employer&mode=ListEmployers'</script>";
			}
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
	{       if($_REQUEST['msg']==1)
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
		*function name  : ReferrerDetails
		*function type  : call by value	
		*functionality  : showing the referrer details including the privelege to change the status of referral paid or not.
		*input			: paid status,job id,candidate id,referrer id.
		*output			: eferrer details including the privelege to change the status of referral paid or not.
		*return value   : nothing
		*note			: nothing
		***************************************************************************************
		*/
	function ReferrerDetails()
	{
		$oReferrer=$this->oModel->getEmployerDetails($_REQUEST['rid']);
		$oReferrer[0]->paid=$_REQUEST['paid'];
		$oReferrer[0]->jid=$_REQUEST['jid'];
		$oReferrer[0]->cid=$_REQUEST['cid'];
		$oReferrer[0]->rid=$_REQUEST['rid'];
		$rewardAmount = $this->oModel->getRewardamount($_REQUEST['jid'],$_REQUEST['cid']);
		$this->oView->ReferrerDetails($oReferrer[0],$rewardAmount);
	}//ef
	/*
		**************************************************************************************
		*function header
		*function name  : UpdatePaidStatus
		*function type  : call by value	
		*functionality  : changing the status of referrer
		*input			: status variable,candidate id,job id.
		*output			: updating the chnaged  status of referrer in database.
		*return value   : nothing
		*note			: nothing
		***************************************************************************************
		*/
	function UpdatePaidStatus()
	{
	global $_CONF;
	if(isset($_POST['Cancel']))
	{
	header("location:".$_CONF['AdminURL']."index.php?stage=employer&mode=PaymentDetails");
	}
	if(isset($_POST['submit']))
	{
	
	$rs=$this->oModel->UpdatePaidStatus($_POST['Paid'],$_POST['cid'],$_POST['jid']);
	if($rs)
	{
    header("location:".$_CONF['AdminURL']."index.php?stage=employer&mode=PaymentDetails&msg=1");
	}
	}
	}
		/*
		**************************************************************************************
			*Function Header
			*Function Name  : ActivateLink
			*Function Type  : call by value	
			*Functionality  : 
			*Input			: nothing
			*Output			: 
			*Return Value   : nothing
			*Note			: nothing
		************************************************************************************
		*/
		function ActivateLink() {
			 global $_CONF;
			 
			 $id= $_REQUEST['id'];
			 $oEmployer=$this->oModel->CheckActivation($id);
			 
			 if($oEmployer) {
				 
				//$err= "This Employer account has been already Activated.";
				//$this->oView->search_field 	= $_REQUEST['search_field'];
				//$this->oView->search_text 	= $_REQUEST['search_text'];
				
				//$this->ListEmployers($err);
				echo "<script>location.href='index.php?stage=employer&mode=ListEmployers&msg=2&search_text=$_REQUEST[search_text]&search_field=$_REQUEST[search_field]'</script>";
				
			 } else {
				
				$oEmployer=$this->oModel->getEmployerDetails($id);
				$rs=$this->oModel->MakeActivation($id);
				
				if($rs) {
					
					//$err= "This Employer account has been Successfully Activated.";
					//$this->oView->search_field 	= $_REQUEST['search_field'];
				   // $this->oView->search_text 	= $_REQUEST['search_text'];
				
					//$this->ListEmployers($err);
					echo "<script>location.href='index.php?stage=employer&mode=ListEmployers&msg=3&search_text=$_REQUEST[search_text]&search_field=$_REQUEST[search_field]'</script>";
					die();
				}
				echo "<script>location.href='index.php?stage=employer&mode=ListEmployers'</script>";
			 }
		}

	/***************************************************************************************
		*Function Header
		*Function Name  : EmployerAccounts
		*Function Type  : call by value	
		*Functionality  : List all the employer accounts
		*Input			: nothing
		*Output			: List of all the employers
		*Return Value   : nothing
		*Note			: nothing
		*************************************************************************************/

		function EmployerAccounts()
		{
		$search_field	=	$_REQUEST['search_field'];
		$search_text	=	$_REQUEST['search_text'];
		$this->oModel->bPagingApplied 	= true;
		$this->oModel->vPage['PageSize']=50;
			if(!empty($_REQUEST['sort']))
			{					    							
				// defining sort field 
				$this->oModel->bSortingApplied 		= true;
				$this->oModel->vSort['Field']		= $_REQUEST['sort'];
				$this->oModel->vSort['Direction'] 	= $_REQUEST['direction'];
			}
			else
			{
				$this->oModel->bSortingApplied 		= true;
				$this->oModel->vSort['Field']		= 'member_id';
				$this->oModel->vSort['Direction'] 	= 0;
			}
			$this->oModel->vPage['CurrentPage'] 	= (empty($_REQUEST['pos']) ? 0 : $_REQUEST['pos']);
			$OEmployer	=	$this->oModel->getAllEmployers($search_field,$search_text);
			$_REQUEST['pos'] 						= $this->oModel->vPage['CurrentPage'];
			$this->oView->OEmployer					= &$OEmployer;
			$this->oView->vPage 					= $this->oModel->vPage;	
			$this->oView->search_field 				= $search_field;
			$this->oView->search_text 				= $search_text;
			$this->oView->EmployerAccounts();
		}//ef
		/*
		**************************************************************************************
		*Function Header
		*Function Name  : manageAccount
		*Function Type  : call by value	
		*Functionality  : 
		*Input			: nothing
		*Output			: 
		*Return Value   : nothing
		*Note			: nothing
		************************************************************************************
		*/
		function manageAccount()
		{
			global $_CONF;
			if($_REQUEST['id'])
			{
				$member_id = $_REQUEST['id'];
			}
			$OEmployer	=	$this->oModel->getEmployerDetails($member_id);
			$oEmployer = $OEmployer[0];
			$_SESSION['email']		=   $oEmployer->email;					
			$_SESSION['member_id']	=   $oEmployer->member_id;
			$_SESSION['member_name']=	$oEmployer->first_name." ".$oMember->last_name;	
			$_SESSION['member_type']=	$oEmployer->member_type;
			
			echo "<script>location.href=\"$_CONF[SiteUrl]/index.php?stage=employer&mode=EmployerHome\"</script>";
			die();
		}

		function StatusCandidateReport()
		{
			$oLocation = $this->oModel->getLocations();
			$location_id = 0;
			$SelectedLocationName="All";
			//$oEmployer->location = $oLocation[$oEmployer->location];
			if(isset($_REQUEST['location_id']))
			{
				$location_id = $_REQUEST['location_id'];
				if($location_id!=0)
				{
					$SelectedLocation = $this->oModel->getSelectedLocations($location_id);
					$SelectedLocationName=$SelectedLocation[0]->location_name;
					
				}
				else
				{
					$SelectedLocationName="All";
				}
			}
			$result = $this->oModel->getCandidateReport($location_id);
			$this->oView->oLocation = $oLocation;
			$this->oView->location_id = $location_id;
			$this->oView->result = $result;
			$this->oView->SelectedLocationName = $SelectedLocationName;
			$this->oView->StatusCandidateReport();
		}

		function StatusCandidateDetails()
		{
			$status_id = $_REQUEST['status_id'];
			$oLocation = $this->oModel->getLocations();
			$location_id = 0;
			$SelectedLocationName="All";
			//$oEmployer->location = $oLocation[$oEmployer->location];
			if(isset($_REQUEST['location_id']))
			{
				$location_id = $_REQUEST['location_id'];
				if($location_id!=0)
				{
					$SelectedLocation = $this->oModel->getSelectedLocations($location_id);
					$SelectedLocationName=$SelectedLocation[0]->location_name;
					
				}
				else
				{
					$SelectedLocationName="All";
				}
				
			}
			$this->oModel->bPagingApplied 	= true;
			$this->oModel->vPage['PageSize']=50;
			if(!empty($_REQUEST['sort']))
			{					    							
				// defining sort field 
				$this->oModel->bSortingApplied 		= true;
				$this->oModel->vSort['Field']		= $_REQUEST['sort'];
				$this->oModel->vSort['Field1']		= 'posting_date';
				$this->oModel->vSort['Direction'] 	= $_REQUEST['direction'];
			}
			else
			{					    							
				// defining sort field 
				$this->oModel->bSortingApplied 		= true;
				$this->oModel->vSort['Field']		= 'posting_date';
				$this->oModel->vSort['Direction'] 	= 0;
			}

			$result = $this->oModel->getCandidateStatusDetails($location_id,$status_id);
			
			$this->oView->oLocation = $oLocation;
			$this->oView->location_id = $location_id;
			$this->oView->result = $result;
			$this->oView->status_id = $status_id;
			$this->oView->StatusCandidateDetails();
		}

		function StatusOpenPostingsReport()
		{
			$oLocation = $this->oModel->getRegions();
			$location_id = 0;
			$SelectedLocationName="All";
			//$oEmployer->location = $oLocation[$oEmployer->location];
			if(isset($_REQUEST['location_id']))
			{
				$location_id = $_REQUEST['location_id'];
				if($location_id!=0)
				{
					$SelectedLocation = $this->oModel->getSelectedLocations($location_id);
					$SelectedLocationName=$SelectedLocation[0]->location_name;
					
				}
				else
				{
					$SelectedLocationName="All";
				}
				
			}

			$result = $this->oModel->getOpenPostingsReport($location_id);
			$this->oView->oLocation = $oLocation;
			$this->oView->SelectedLocationName = $SelectedLocationName;
			$this->oView->location_id = $location_id;
			$this->oView->result = $result;
			$this->oView->StatusOpenPostingsReport();
		}

		function OpenPostingsCategoryReport()
		{
			$oLocation = $this->oModel->getLocations();
			$oCategories = $this->oModel->getCategories();
			$SelectedLocationName="All";
			$location_id = 0;
			//$oEmployer->location = $oLocation[$oEmployer->location];
			if(isset($_REQUEST['location_id']))
			{
				$location_id = $_REQUEST['location_id'];
				if($location_id!=0)
				{
					$SelectedLocation = $this->oModel->getSelectedLocations($location_id);
					$SelectedLocationName=$SelectedLocation[0]->location_name;
					
				}
				else
				{
					$SelectedLocationName="All";
				}
			}
			$result = $this->oModel->getOpenPostingsCategoryReport($location_id);
			$this->oView->oLocation = $oLocation;
			$this->oView->oCategories = $oCategories;
			$this->oView->SelectedLocationName = $SelectedLocationName;
			$this->oView->location_id = $location_id;
			$this->oView->result = $result;
			$this->oView->OpenPostingsCategoryReport();
		}

		function OpenJobTypeReport()
		{
			$oLocation = $this->oModel->getLocations();
			$location_id = 0;
			//$oEmployer->location = $oLocation[$oEmployer->location];
			$SelectedLocationName="All";
			if(isset($_REQUEST['location_id']))
			{
				$location_id = $_REQUEST['location_id'];
				if($location_id!=0)
				{
					$SelectedLocation = $this->oModel->getSelectedLocations($location_id);
					$SelectedLocationName=$SelectedLocation[0]->location_name;
					
				}
				else
				{
					$SelectedLocationName="All";
				}
			}
			$result = $this->oModel->getJobTypeReport($location_id);
			$this->oView->oLocation = $oLocation;
			$this->oView->location_id = $location_id;
			$this->oView->SelectedLocationName = $SelectedLocationName;
			$this->oView->result = $result;
			$this->oView->OpenJobTypeReport();
		}

		function TopCompaniesLocation()
		{
			$oLocation = $this->oModel->getLocations();
			$location_id = 0;
			$from_date = '';
			$to_date = '';
			$SelectedLocationName="All";
			//$oEmployer->location = $oLocation[$oEmployer->location];
			if(isset($_REQUEST['location_id']))
			{
				$location_id = $_REQUEST['location_id'];
				if($location_id!=0)
				{
					$SelectedLocation = $this->oModel->getSelectedLocations($location_id);
					$SelectedLocationName=$SelectedLocation[0]->location_name;
					
				}
				else
				{
					$SelectedLocationName="All";
				}
			}
			if(isset($_REQUEST['from_date']))
			{
				$from_date = $_REQUEST['from_date'];
			}
			if(isset($_REQUEST['to_date']))
			{
				$to_date = $_REQUEST['to_date'];
			}
			
			$result = $this->oModel->getTopCompaniesLocation($location_id,$from_date,$to_date);
			$this->oView->oLocation = $oLocation;
			$this->oView->location_id = $location_id;
			$this->oView->SelectedLocationName = $SelectedLocationName;
			$this->oView->from_date = $from_date;
			$this->oView->to_date = $to_date;
			$this->oView->result = $result;
			$this->oView->TopCompaniesLocation();
		}

		function TopCompaniesCategory()
		{
			$oCategories = $this->oModel->getCategories();
			$category_id = 0;
			$from_date = '';
			$to_date = '';
			$SelectedCategoryName="All";
			//$oEmployer->location = $oLocation[$oEmployer->location];
			if(isset($_REQUEST['category_id']))
			{
				$category_id = $_REQUEST['category_id'];
				if($category_id!=0)
				{
					$SelectedCategory = $this->oModel->getSelectedCategories($category_id);
					$SelectedCategoryName=$SelectedCategory[0]->category_name;
					
				}
				else
				{
					$SelectedCategoryName="All";
				}
			}
			if(isset($_REQUEST['from_date']))
			{
				$from_date = $_REQUEST['from_date'];
			}
			if(isset($_REQUEST['to_date']))
			{
				$to_date = $_REQUEST['to_date'];
			}
			
			$result = $this->oModel->getTopCompaniesCategory($category_id,$from_date,$to_date);
			$this->oView->oCategories = $oCategories;
			$this->oView->category_id = $category_id;
			$this->oView->SelectedCategoryName = $SelectedCategoryName;
			$this->oView->from_date = $from_date;
			$this->oView->to_date = $to_date;
			$this->oView->result = $result;
			$this->oView->TopCompaniesCategory();
		}
		
		function BillingAR()
		{
			$oCategory = $this->oModel->getCategories();

			$location_id = 0;
			$from_date = '';
			$to_date = '';
			$this->oModel->bPagingApplied 	= true;
			if(!empty($_REQUEST['sort']))
			{					    							
				// defining sort field 
				$this->oModel->bSortingApplied 		= true;
				$this->oModel->vSort['Field']		= $_REQUEST['sort'];
				$this->oModel->vSort['Direction'] 	= $_REQUEST['direction'];
			}
			else
			{
				$this->oModel->bSortingApplied 		= true;
				$this->oModel->vSort['Field']		= 'company_name';
				$this->oModel->vSort['Direction'] 	= 0;
			}
			//$oEmployer->location = $oLocation[$oEmployer->location];
			if(isset($_REQUEST['payment_method_id']))
			{
				$payment_method_id = $_REQUEST['payment_method_id'];
			}
			if(isset($_REQUEST['from_date']))
			{
				$from_date = $_REQUEST['from_date'];
			}
			if(isset($_REQUEST['to_date']))
			{
				$to_date = $_REQUEST['to_date'];
			}
			$this->oModel->vPage['CurrentPage'] 	= (empty($_REQUEST['pos']) ? 0 : $_REQUEST['pos']);
			$result = $this->oModel->getBillingAR($payment_method_id,$from_date,$to_date);
			$_REQUEST['pos'] 						= $this->oModel->vPage['CurrentPage'];
			$this->oView->vPage 					= $this->oModel->vPage;
			$cnt=0;
			foreach($result as $oResult)
			{
				if($oResult->payment_method == 1)
				{
					$result[$cnt]->days_overdue=$oResult->days_overdue;
				}
				elseif($oResult->payment_method == 2)
				{
					$result[$cnt]->days_overdue="n/a";
				}
				$cnt++;
				
			}
			$total=0;

			$this->oModel->bPagingApplied 	= false;
			$result1 = $this->oModel->getBillingAR($payment_method_id,$from_date,$to_date);
			foreach($result1 as $oResult)
			{
				$total=$total+ $oResult->reward_amount;
				
			}
			$this->oView->payment_method_id = $payment_method_id;
			$this->oView->from_date = $from_date;
			$this->oView->to_date = $to_date;
			$this->oView->result = $result;
			$this->oView->total = $total;
			$this->oView->BillingAR();
		}
		
			
		function Guarantee()
		{
			$oCategory = $this->oModel->getCategories();

			$location_id = 0;
			$from_date = '';
			$to_date = '';
			$this->oModel->bPagingApplied 	= true;
			if(!empty($_REQUEST['sort']))
			{					    							
				// defining sort field 
				$this->oModel->bSortingApplied 		= true;
				$this->oModel->vSort['Field']		= $_REQUEST['sort'];
				$this->oModel->vSort['Direction'] 	= $_REQUEST['direction'];
			}
			else
			{
				$this->oModel->bSortingApplied 		= true;
				$this->oModel->vSort['Field']		= 'company_name';
				$this->oModel->vSort['Direction'] 	= 0;
			}
			//$oEmployer->location = $oLocation[$oEmployer->location];
			if(isset($_REQUEST['payment_method_id']))
			{
				$payment_method_id = $_REQUEST['payment_method_id'];
			}
			if(isset($_REQUEST['from_date']))
			{
				$from_date = $_REQUEST['from_date'];
			}
			if(isset($_REQUEST['to_date']))
			{
				$to_date = $_REQUEST['to_date'];
			}
			$this->oModel->vPage['CurrentPage'] 	= (empty($_REQUEST['pos']) ? 0 : $_REQUEST['pos']);
			$result = $this->oModel->getGuarantee($payment_method_id,$from_date,$to_date);
			$_REQUEST['pos'] 						= $this->oModel->vPage['CurrentPage'];
			$this->oView->vPage 					= $this->oModel->vPage;
			foreach($result as $oResult)
			{
				if($oResult->payment_method == 1)
				{
					$result[$cnt]->days_overdue=$oResult->days_overdue;
				}
				elseif($oResult->payment_method == 2)
				{
					$result[$cnt]->days_overdue="n/a";
				}
				$cnt++;
				
			}
			$cnt=0;
			$total=0;
			$totalBohireFee = 0;
			$this->oModel->bPagingApplied 	= false;
			$result1 = $this->oModel->getGuarantee($payment_method_id,$from_date,$to_date);
			foreach($result1 as $oResult)
			{
				$total=$total+ $oResult->reward_amount;
				$totalBohireFee =  $totalBohireFee+$oResult->bohire_fee;
				$totalReferralReward =  $totalReferralReward+$oResult->reward_amount;
				$totalRevenue =  $totalReferralReward+$totalBohireFee;
			}
			$this->oView->payment_method_id = $payment_method_id;
			$this->oView->from_date = $from_date;
			$this->oView->to_date = $to_date;
			$this->oView->result = $result;
			$this->oView->total = $total;
			$this->oView->totalBohireFee = $totalBohireFee;
			$this->oView->totalReferralReward = $totalReferralReward;
			$this->oView->totalRevenue = $totalRevenue;
			$this->oView->Guarantee();
		}
		
		function DownloadEmployerAccounts()
		{
			$csv_columns = $this->oModel->getEmployerAccountDetails();
			header('Cache-control: private');
			header('Content-type: text/csv');
			header('Content-disposition:  attachment; filename="employer_accounts.csv"');
			print stripslashes($csv_columns);
			exit;
		}
		/*
		**************************************************************************************
		*Function Header
		*Function Name  : EmployerAccountsResumeDatabase
		*Function Type  : call by value	
		*Functionality  : List all the employer accounts
		*Input			: nothing
		*Output			: List of all the employers
		*Return Value   : nothing
		*Note			: nothing
		************************************************************************************
		*/
		function EmployerAccountsResumeDatabase($err = "")
		{
			if($err == "" && $_REQUEST['msg'] != "" ) {
				if($_REQUEST['msg'] == 1) {
					$err = "Employer detail has been updated successfully.";
				}
			}
			
			$this->oView->sErrorMsg = $err;
			$search_field	=	$_REQUEST['search_field'];
			$search_text	=	$_REQUEST['search_text'];
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
				$this->oModel->vSort['Field']		= 'member_id';
				$this->oModel->vSort['Direction'] 	= 0;
			}
			$this->oModel->vPage['CurrentPage'] 	= (empty($_REQUEST['pos']) ? 0 : $_REQUEST['pos']);
			$OEmployer	=	$this->oModel->getAllEmployersResumeDatabase($search_field,$search_text);
			foreach($OEmployer as $Employer) {
				$str = $Employer->date_access_expired;
				if (($timestamp = strtotime($str)) === false) {
					$Employer->date_access_expired = "";
				}
			}
			
			$_REQUEST['pos'] 						= $this->oModel->vPage['CurrentPage'];
			$this->oView->OEmployer					= &$OEmployer;
			$this->oView->vPage 					= $this->oModel->vPage;	
			$this->oView->search_field 				= $search_field;
			$this->oView->search_text 				= $search_text;
			$this->oView->EmployerAccountsResumeDatabase();
		}//ef
		/*
		**************************************************************************************
		*Function Header
		*Function Name  : EditEmployerAccountsResumeDatabase
		*Function Type  : call by value	
		*Functionality  : 
		*Input			: nothing
		*Output			: 
		*Return Value   : nothing
		*Note			: nothing
		************************************************************************************
		*/
		
		function EditEmployerAccountsResumeDatabase()
		{
			if(isset($_REQUEST['id']))
			{
				$emp_id = $_REQUEST['id'];
				$oEmployer = $this->oModel->getEmployerResumeDatabase($emp_id);
				$oEmployer  = $oEmployer[0];
			}
			$str = $oEmployer->date_access_expired;
			if (($timestamp = strtotime($str)) === false) {
				$oEmployer->date_access_expired = "";
			}
			$oEmployer->isApproved = trim($oEmployer->isApproved);

			$this->oView->oEmployer = $oEmployer;
			$this->oView->EditEmployerAccountsResumeDatabase();
		}//ef
		/*
		**************************************************************************************
		*function header
		*function name  : UpdateEmployerAccountsResumeDatabase
		*function type  : call by value	
		*functionality  : 
		*input			: 
		*output			: .
		*return value   : nothing
		*note			: nothing
		***************************************************************************************
		*/
		function UpdateEmployerAccountsResumeDatabase($err="")
		{
			global $_CONF;
		    $oEmployer->member_id			=	$_POST['id'];
	        $oEmployer->isApproved			=	$_POST['status'];
			$oEmployer->price				=	$_POST['price'];
			$oEmployer->company_name		=	htmlentities($_POST['company_name'],ENT_QUOTES);
			$oEmployer->fullname			=	htmlentities($_POST['fullname'],ENT_QUOTES);
			$oEmployer->date_access_expired	=	$_POST['expire_date'];
			

			$OVE[]	=	new ValidationElement(array('Status'=>$oEmployer->isApproved), array('Blank'));
			$OVE[]	=	new ValidationElement(array('Price'=>$oEmployer->price), array('Blank'));
			$OVE[]	=	new ValidationElement(array('Access Expire Date'=>$oEmployer->date_access_expired), array('Blank'));

			$oVC					=		new ValidationCheck($OVE);
		    $bResponse 				= 		$oVC->Check();
			$errorMessage			=		implode("<br>", $oVC->SErrorMsg);
	        if(!$bResponse)
			{
				if(is_numeric($_REQUEST['price'])) {
					if($_REQUEST['price'] <= 0) {
						$bResponse 		= false;
						$errorMessage	= "Price should greater than zero.";
					}
				} else {
				    $bResponse 		= false;
					$errorMessage	= "Price should be numeric.";
				}
			}
			
			
	        if($bResponse == 0){
				$this->oView->sErrorMsg = $errorMessage;
				$this->oView->oEmployer = $oEmployer;
				$this->oView->EditEmployerAccountsResumeDatabase();
			} else {
				$str = $oEmployer->date_access_expired;
				$oEmployer->date_access_expired =  date("Y-m-d",strtotime($str));

				$rs= $this->oModel->UpdateResumeDBSubscription($oEmployer);
			 	header("location:".$_CONF['AdminURL']."index.php?stage=employer&mode=EmployerAccountsResumeDatabase&msg=1&search_field=$_REQUEST[search_field]&search_text=$_REQUEST[search_text]");
			}
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
		/*
		**************************************************************************************
		*function header
		*function name  : PriceEdit
		*function type  : call by value	
		*functionality  : display the details of employer to edit
		*input			: member id
		*output			: display the details of employer to edit.
		*return value   : nothing
		*note			: nothing
		***************************************************************************************
		*/
		function PriceEdit($err="")
		{
			if(isset($_REQUEST['id']))
			{
				$price_id = $_REQUEST['id'];
				$oEmployer = $this->oModel->getPriceDetails($price_id);
				$oEmployer  = $oEmployer[0];
			}
			$this->oView->oEmployer = $oEmployer;
			
			$this->oView->sErrorMsg=$err;
			$this->oView->PriceEdit();
		}//ef
		/*
		**************************************************************************************
		*function header
		*function name  : UpdatePrice
		*function type  : call by value	
		*functionality  : display the details of employer to edit
		*input			: member id
		*output			: display the details of employer to edit.
		*return value   : nothing
		*note			: nothing
		***************************************************************************************
		*/
		function UpdatePrice($err="")
		{
			global $_CONF;
			if(isset($_REQUEST['id']))
			{
				$oEmployer->price_id = $_REQUEST['id'];
				$oEmployer->price_text = $_REQUEST['price_text'];
				
				if($_REQUEST['price'] != "") {
					if(is_numeric($_REQUEST['price'])) {
						$oEmployer->price = $_REQUEST['price'];
					} else {
						$err = "Subscription price should be numeric.";
					}
				} else {
					$err = "Please enter subscription price.";
				}
			}
			if($err == "") {
				$this->oModel->updatePriceDetails($oEmployer);
			 	header("location:".$_CONF['AdminURL']."index.php?stage=employer&mode=ListPrice&msg=1");
			} else {
				$this->oView->sErrorMsg=$err;
				$this->oView->OEmployer	= &$oEmployer;
				$this->oView->PriceEdit();
			}
		}//ef
		
	}//ec
?>