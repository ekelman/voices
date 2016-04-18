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
		*Output			: Class objectsP
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
		
		/******************************************************************************************
		*Function Header
		*Function Name  : SubscriberJoin
		*Function Type  : Call by value	
		*Functionality  : Displays the page for new signup of subscriber.
		*Input			: nothing
		*Output			: Signup page for subscriber through SubscriberView.
		*Return Value   : nothing
		*Note			: nothing
		*******************************************************************************************/
		function SubscriberJoin($oSubscriber, $sErrorMsg="")
		{
			$this->oView->sErrorMsg = $sErrorMsg;
			$this->oView->oSubscriber = $oSubscriber;
			$this->oView->states=$this->oModel->getStates();
			$this->oView->oAffiliates = $this->oModel->getAffiliatesSubscriberJoin();			
			$this->oView->SubscriberJoin();
		}//ef
		
		/*
		*****************************************************************************************
		*Function Header
		*Function Name  : SaveSubscriberJoin
		*Function Type  : Call by value	
		*Functionality  : Stores the signup information of employer and display terms and conditions to agree before saving to db.
		*Input			: nothing
		*Output			: nothing.
		*Return Value   : nothing
		*Note			: nothing
		******************************************************************************************
		*/
		function SaveSubscriberJoin()
		{
		    global $_CONF;
			/*
			print_R($_POST);
			die();*/
			$oSubscriber->first_name				=	$_POST['first_name'];
			$oSubscriber->last_name					=	$_POST['last_name'];
			$oSubscriber->user_name					=	htmlentities($_POST['user_name'],ENT_QUOTES);
			$oSubscriber->email						=	trim($_POST['email']);
			$oSubscriber->password					=	trim($_POST['password']);
			$oSubscriber->r_password				=	trim($_POST['r_password']);
			
			$oSubscriber->mail_address				=	htmlentities($_POST['address'],ENT_QUOTES);
			$oSubscriber->mail_state	        	=	trim($_POST['state']);//htmlentities($_POST['state'],ENT_QUOTES);
			$oSubscriber->mail_city             	=	htmlentities($_POST['city'],ENT_QUOTES);
			$oSubscriber->mail_postal_code			=	htmlentities($_POST['zip_code'],ENT_QUOTES);
			/*
			$oSubscriber->mail_country				=	htmlentities($_POST['country'],ENT_QUOTES);						
			*/
			$oSubscriber->primary_afflliates		=	htmlentities($_POST['primary_afflliates'],ENT_QUOTES);
			/*
			$oSubscriber->primary_afflliate_code	=	htmlentities($_POST['primary_afflliate_code'],ENT_QUOTES);
			$secondary_afflliates					=	$_POST['secondary_afflliates'];
			$oSubscriber->secondary_afflliates		=	$secondary_afflliates;
			*/						
			$oSubscriber->isBillingInfo				=   trim($_POST['isBillingInfo']);
			
			$oSubscriber->billingAddress			=	htmlentities($_POST['billingAddress'],ENT_QUOTES);
			$oSubscriber->billingState				=	htmlentities($_POST['billingState'],ENT_QUOTES);
			$oSubscriber->billingZipCode			=	htmlentities($_POST['billingZipCode'],ENT_QUOTES);
			$oSubscriber->billingCity				=	htmlentities($_POST['billingCity'],ENT_QUOTES);
			/*
			$oSubscriber->billingCountry			=	htmlentities($_POST['billingCountry'],ENT_QUOTES);
			*/
			if($oSubscriber->isBillingInfo == 0){
				
				$oSubscriber->billingAddress			=	$oSubscriber->mail_address;
				$oSubscriber->billingCity				=	$oSubscriber->mail_city;
				$oSubscriber->billingState				=	$oSubscriber->mail_state;	
				$oSubscriber->billingZipCode			=	$oSubscriber->mail_postal_code;
				/*
				$oSubscriber->billingCountry 			= 	$oSubscriber->mail_country; 	
				*/
			}
			
			$isDuplicate	=	$this->oModel->checkDuplication($oSubscriber);

			if($isDuplicate == "username") {
			
				$sErrorMsg	= "User Name already exists.";
				$this->SubscriberJoin($oSubscriber, $sErrorMsg);
				die();			
			} else if($isDuplicate == "email") {
									
				$sErrorMsg	= "E-mail Id already exists.";
				$this->SubscriberJoin($oSubscriber, $sErrorMsg);
				die();			
			} 			

			##get primary affiliate id from affiliate code 			
			
			if(!empty($oSubscriber->primary_afflliate_code))
			{	
				
				$affID  = $this->oModel->getPrimaryAffIDfromCode($oSubscriber->primary_afflliate_code);  
				
				if($affID) {
					
					$oSubscriber->primary_afflliates = $affID;
				} else {
					
					$sErrorMsg	= "Invalid affiliate code.";
					$this->SubscriberJoin($oSubscriber, $sErrorMsg);
					die();								
				} 
			}
				
			
			$wsdl	=	"http://cicero.azavea.com/Azavea.Cicero.WebService.v2/AuthenticationService.asmx?wsdl";
			$client	=	new nusoap_client($wsdl, 'wsdl');
		
			$wsdl_EOQueryService	=	"http://cicero.azavea.com/Azavea.Cicero.WebService.v2/ElectedOfficialQueryService.asmx?wsdl";	
			$client_EOQueryService	=	new nusoap_client($wsdl_EOQueryService, 'wsdl');
			
			$cicero_username = $_CONF['cicero_username'];
			$cicero_password = $_CONF['cicero_password'];
		
			$params	=	array('userName'=>$cicero_username,'password'=>$cicero_password); 
			
			$token_result	= $client->call('GetToken',$params);
			$token 			= $token_result['GetTokenResult'];
						
			$address		= $oSubscriber->mail_address;
			$state			= $oSubscriber->mail_state;			
			$city			= $oSubscriber->mail_city;
			$postalCode		= $oSubscriber->mail_postal_code;
	
			$country		= "US";
			$districtType 	= "All";
			$includeAtLarge = false;
			
			$param_validate	=	array('authToken'=>$token,'address'=>$address,'city'=>$city,'state'=>$state,'postalCode'=>$postalCode,'country'=>$country,'districtType'=>$districtType,'includeAtLarge'=>$includeAtLarge); 
			
			//$result_OfficialsByAddress	=	$client_EOQueryService->call('GetOfficialsByAddress',$param_validate);
			
			//$officials = $result_OfficialsByAddress['GetOfficialsByAddressResult']['ElectedOfficialInfo'];
			
			//print_r($officials);
			
			//$isValidCicero = count($officials);
			$isValidCicero = true;
      
			if($isValidCicero) {
				
				//do nothing;
				$i_test_but_do_nothing = "i_test_but_do_nothing";				
			} else {
				$sErrorMsg	= "Please enter a valid address.";
                $this->SubscriberJoin($oSubscriber, $sErrorMsg);
                die();
			}			
			/*
			if(!empty($secondary_afflliates)) {			
				foreach($secondary_afflliates as $key => $val)  {
					if($val == $oSubscriber->primary_afflliates) {
						$index = $key;
					}
				}
				if($index >= 0) {
					array_splice($secondary_afflliates, $index, 1);
				}
			
				$oSubscriber->secondary_afflliates	=	implode(",",$secondary_afflliates);
				
				//$oSubscriber->category_id_exploded	=	explode(",",$oSubscriber->secondary_afflliates);
			}
			*/
			/*$oSubscriber->primary_afflliates = 0;*/
			$oSubscriber->secondary_afflliates = 0;
			
			$id = $this->oModel->addSubscriberAdmin($oSubscriber);
			if($id) {
			
				//sending email to user
				$oEmail	=	$this->oModel->GetEmail(1);
				
				$email	=	$oSubscriber->email;
				
				$sName	=	$oSubscriber->first_name." ". $oSubscriber->last_name;
				$sUserName	=	$oSubscriber->user_name;
				$sPassword	=	$oSubscriber->password;
				
				$dynamicInfo	=	array(stripslashes(html_entity_decode($sName)),$sUserName,$sPassword,$_CONF['SiteUrl']);
				
				$staticInfo		=	array('(sName)', '(sUserName)', '(sPassword)', '(slink)');
				$body			=	$oEmail[0]->content;
				$newbody		=	str_replace($staticInfo, $dynamicInfo, $body);
				$text			=	CreateMailMessage($newbody);
				$subject		=	stripslashes(html_entity_decode($oEmail[0]->subject));
				$result			=	SendMail(stripslashes(html_entity_decode($text['body'])), $subject, array($email), $_CONF['adminEmail']);
				$err = "Record added successfully.";
			    $this->ListSubscriber($err);

				#die();								
			} else {
				
				$sErrorMsg		=	"Server error.<br>Please try again later.";
				$this->SubscriberJoin($oSubscriber,$sErrorMsg);
				die();
			}
		}//ef
		
		/*
		 * ******************************************************************************
		*function header
		*function name  : EmailMessage
		*function type  : call by value	
		*functionality  : Display the confirmation page of registeration.
		*input			: message to display,extra variable
		*output			: Display the confirmation page of registeration.
		*return value   : nothing
		*note			: nothing
		***************************************************************************************
		*/
		function EmailMessage($message,$extraVar1='')
		{
			if($_GET['message'])
			{
				$message = $_GET['message'];
			}
			$this->oView->message	=	$message;
			$this->oView->extraVar1 =	$extraVar1;
			$this->oView->EmailMessage();
		}//ef
		
	}//ec
?>