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
	
	require_once($_CONF['ModulesPath'].'affiliates/classes/AffiliatesModel.php');	//this class contains all the queries related to Category class 
	
	require_once($_CONF['ModulesPath'].'system/classes/Validation.php');	//this class contains fucntions to create server side validations
	
	require_once($_CONF['ModulesPath'].'system/functions.php');		//this class contains all the queries related to search categories
											    								    
	//contains some common functions 
	require_once($_CONF['ModulesPath'].'system/classes/extra/class.phpmailer.php');								    

	
	require_once($_CONF['ModulesPath'].'system/classes/extra/upload_class.php');	

	//contains some common data classes 
	require_once($_CONF['ModulesPath'].'system/classes/dataclasses.php');								    
	
	/******************************************************************
	*Class Header
	*Class Name		: AffiliatesController
	*Functionality	: This class controls EmployerModel and EmployerView to 
					  handle employer related function on the site.
	*Note        	: EmployerController inherits AdminController that 
 	                  contains functions for the admin site.
	*******************************************************************/

	class AffiliatesController extends AdminController{

		
		/***************************************************************************************
		*Function Header
		*Function Name  : AffiliatesController
		*Function Type  : Constructor	
		*Functionality  : Initializes objects of different classes 
		*Input			: nothing
		*Output			: Class objects
		*Return Value   : nothing
		*Note			: nothing
		****************************************************************************************/
		function AffiliatesController(){
		
			global $_CONF;
			parent::AdminController();
			$this->oView = new AffiliatesView();
			$this->oModel = new AffiliatesModel();
		} //ef
		
		
		/************************************************************************************
		*function header
		*function name  : AffiliateDetails
		*function type  : call by value	
		*functionality  : 
		*input			: 
		*output			: 
		*return value   : nothing
		*note			: nothing
		************************************************************************************
		*/
		function AffiliateDetails($affID)
		{

			$this->oView->secondary_affiliates = $this->oModel->getAffiliateDetail($affID);
			
			if(isset($_SESSION['Affiliate Content']['Page Header']['View'])) 
				$this->oView->affiliate_content_page_header_view = $_SESSION['Affiliate Content']['Page Header']['View'];				
				
			$this->oView->MyAffiliates( $affID );			
		}//ef


		
		
		/************************************************************************************
		*function header
		*function name  : AdminAffiliateDetails
		*function type  : call by value	
		*functionality  : 
		*input			: 
		*output			: 
		*return value   : nothing
		*note			: nothing
		************************************************************************************
		*/
		function AdminAffiliateDetails($affID)
		{
			if(isset($_REQUEST['id']))
			{
				$affID = $_REQUEST['id'];
				$oAffiliate = $this->oModel->getAffiliateDetails($affID);
			}
			
			$this->oView->oAffiliate = $oAffiliate[0];			
			$this->oView->AdminAffiliateDetails();	
		}//ef

		
		
		/*
		*************************************************************************************
		*Function Header
		*Function Name  : ListAffiliates
		*Function Type  : call by value	
		*Functionality  : List all the employers
		*Input			: nothing
		*Output			: List of all the employers
		*Return Value   : nothing
		*Note			: nothing		
		*************************************************************************************
		*/		
		function ListAffiliates($err = "")
		{
			$search_field	=	$_REQUEST['search_field'];
			$search_text	=	$_REQUEST['search_text'];
			
			if($_REQUEST['msg']==1)	{
				$err="Affiliate has been added successfully.";
			} 
			elseif($_REQUEST['msg']=='2') {				
				$err= "Affiliate(s) account has been already Activated.";
			}
			elseif($_REQUEST['msg']=='3') {
				$err= "This Affiliate(s) account has been Successfully Activated.";
			}
			elseif($_REQUEST['msg']=='4') {
				$err= "This Employer has been already Approved.";
			}
			elseif($_REQUEST['msg']=='5') {
				$err= "There is some technical problem in sending approving email.<br>Please try later.";
			} 
			elseif($_REQUEST['msg']=='6') {
				$err= "This Employer has been successfully Approved.";
			} 
			
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
			//die("----");
			$this->oModel->vPage['CurrentPage'] 	= (empty($_REQUEST['pos']) ? 0 : $_REQUEST['pos']);
			$oSubscriber							= $this->oModel->getAllAffiliates($search_field,$search_text);
			$_REQUEST['pos'] 						= $this->oModel->vPage['CurrentPage'];
			$this->oView->oSubscriber				= &$oSubscriber;
			$this->oView->vPage 					= $this->oModel->vPage;	
			$this->oView->sErrorMsg					= $err;
			$this->oView->search_field 				= $search_field;
			$this->oView->search_text 				= $search_text;
			$this->oView->ListAffiliates();
		}//ef
			
		
		/*
		***********************************************************************************
		*function header
		*function name  : ListAffiliatePayment
		*function type  : call by value	
		*functionality  : 
		*input			: 
		*output			: 
		*return value   : nothing
		*note			: nothing
		************************************************************************************
		*/
		function ListAffiliatePayment()
		{		
			
			$search_field	=	$_REQUEST['search_field'];
			$search_text	=	$_REQUEST['search_text'];		
			$affiliateID	=	$_REQUEST['id'];	 			
			
			$this->oModel->bPagingApplied 	= false;
			$this->oModel->vPage['PageSize']=50;
		
			if(!empty($_REQUEST['sort']))
			{					    							
				// defining sort field 
				$this->oModel->bSortingApplied 		= false;
				$this->oModel->vSort['Field']		= $_REQUEST['sort'];
				$this->oModel->vSort['Direction'] 	= $_REQUEST['direction'];
			} else {
				
				$this->oModel->bSortingApplied 		= false;
				$this->oModel->vSort['Field']		= 'member_id';
				$this->oModel->vSort['Direction'] 	= 0;
			}
			
			$this->oModel->vPage['CurrentPage'] 	= (empty($_REQUEST['pos']) ? 0 : $_REQUEST['pos']);
			
			$oSubscriber							= $this->oModel->getAllAffiliatePayment( $affiliateID ,$search_field,$search_text);			
			$amount									= $this->oModel->getAffiliatePaymentAmount( $affiliateID);			
			
			$_REQUEST['pos'] 						= $this->oModel->vPage['CurrentPage'];
			$this->oView->oSubscriber				= &$oSubscriber;
			$this->oView->amount					= $amount;
			$this->oView->vPage 					= $this->oModel->vPage;	
			$this->oView->sErrorMsg					= $err;
			$this->oView->search_field 				= $search_field;
			$this->oView->search_text 				= $search_text;
			
			$this->oView->ListAffiliatePayment();			
		}//ef	

		
		/*
		**************************************************************************************
		*function header
		*function name  : AddAffiliates
		*function type  : call by value	
		*functionality  : display the details of Affiliate
		*input			: member id
		*output			: display the details of Affiliate
		*return value   : nothing
		*note			: nothing
		***************************************************************************************
		*/
		function AddAffiliates($oAffiliate,$sErrorMsg="")
		{
			$this->oView->sErrorMsg = $sErrorMsg;
			$this->oView->oAffiliate = $oAffiliate;			
			$this->oView->AddAffiliates();
		}//ef

		
		/*
		**************************************************************************************
		*function header
		*function name  : SaveAffiliate
		*function type  : call by value	
		*functionality  : update the account of employer
		*input			: oEmployer array
		*output			: update the account of employer
		*return value   : nothing
		*note			: nothing
		***************************************************************************************
		*/
		
		function SaveAffiliate()
		{  
			global $_CONF;
	        $oAffiliate->first_name			=	trim($_POST['first_name']);
			$oAffiliate->last_name			=	trim($_POST['last_name']);
			$oAffiliate->username			=	trim($_POST['username']);
			$oAffiliate->email				=	trim($_POST['email']);
			$oAffiliate->password			=	trim($_POST['password']);
			$oAffiliate->re_password		=	trim($_POST['re_password']);
			
			$oAffiliate->organisation_name		=	trim($_POST['organisation_name']);			
			$oAffiliate->organisation_website	=	trim($_POST['organisation_website']);						
			$oAffiliate->description			=	htmlentities($_POST['description'],ENT_QUOTES);									
			
			$oAffiliate->address			=	htmlentities($_POST['address'],ENT_QUOTES);	;
			$oAffiliate->state	        	=	trim($_POST['state']);
			$oAffiliate->city	            =	trim($_POST['city']);
			$oAffiliate->country	        =	trim($_POST['country']);
			
			$oAffiliate->logo				=	trim($_POST['logo']);
			$oAffiliate->postal_code		=	trim($_POST['postal_code']);
			$oAffiliate->promo_code			=	trim($_POST['promo_code']);//"PRM" . generateRandStr();
			
			
			$isDuplicate	=	$this->oModel->checkDuplication($oAffiliate);

			if($isDuplicate == "email") {
									
				$sErrorMsg	= "E-mail Id already exists.";
				$this->AddAffiliates($oAffiliate, $sErrorMsg);
				die();			
			} else if($isDuplicate == "username") {
			
				$sErrorMsg	= "Username already exists.";
				$this->AddAffiliates($oAffiliate, $sErrorMsg);
				die();			
			} else if($isDuplicate == "promo_code") {
			
				$sErrorMsg	= "Promo code already exists.";
				$this->AddAffiliates($oAffiliate, $sErrorMsg);
				die();			
			}
			
			
			$oAffiliate->affiliate_code	=	generateRandStr();
			
			$tmp_file_name				= 	$_FILES['organisation_banner']['tmp_name'];			
			$banner_name				= 	$_FILES['organisation_banner']['name'];
			
			if($banner_name != "") {
			
				$uploadpath	= $_CONF['UploadLogo'];
				$max_size	= 5242880; //in bytes = 5 MB
				$max_width	= 900;
				$max_height	= 250;
				
				$file_type 		=	$_FILES['organisation_banner']['type'];
				$ext_allowed	=	array('image/gif','image/pjpeg','image/jpeg');
				
				$sErrorMsg		= "";
				
				$isValidFileType = $this->checkFileType($ext_allowed, $file_type);
				$isValidFileSize = $this->checkFileSize($max_size, $tmp_file_name, $max_width, $max_height,&$sErrorMsg);				
				
				if($isValidFileType && $isValidFileSize) {


					$temp		= session_id();			
					$LogoName 	= explode(".",$_FILES['organisation_banner']['name']);
					$LogoExt	= $LogoName[count($LogoName)-1];
					$file_name_path	= $uploadpath.$temp.'.'.$LogoExt;
				
					$result = move_uploaded_file($tmp_file_name, $file_name_path);
					if($result) {
						
						$rs = $this->oModel->addAffiliate($oAffiliate);
						
						if($rs) {
									
							$newBannerName	=  $_CONF['UploadLogo'].$rs."_organisation_banner.".$LogoExt;
							$oldLogoName	=	$_CONF['UploadLogo'].$temp.".".$LogoExt;
							rename($oldLogoName, $newBannerName);
							
							$oAffiliate->organisation_banner	=  $rs."_organisation_banner.".$LogoExt;
							$oAffiliate->affiliate_id = $rs;
							$rs_banner = $this->oModel->updateAffiliateBanner($oAffiliate);
						
							header("location:".$_CONF['AdminURL']."index.php?stage=affiliates&mode=ListAffiliates&msg=1");
							die();												
						} else {
						
							$sErrorMsg	= "SQL error, Please try again.";
							$this->AddAffiliates($oAffiliate,$sErrorMsg);
							die();
						}
					} else {
					
						$sErrorMsg	= "Logo uploading failed due to some technical reason. Please try later.";
						$this->AddAffiliates($oAffiliate,$sErrorMsg);
						die();						
					}
				}
				
				if(!$isValidFileType) {
					$sErrorMsg	= "Only jpg/gif/jpeg images up to 900px wide and 250px high, max size 5MB can be uploaded.";
					$this->AddAffiliates($oAffiliate,$sErrorMsg);
					die();						
				}
				
				if(!$isValidFileSize) {
					$sErrorMsg	= "Only jpg/gif/jpeg images up to 900px wide and 250px high, max size 5MB can be uploaded.";													
					$this->AddAffiliates($oAffiliate,$sErrorMsg);
					die();						
				}				
			} else {
			
				$rs = $this->oModel->addAffiliate($oAffiliate);			
				
				if($rs) {	
					header("location:" . $_CONF['AdminURL']."index.php?stage=affiliates&mode=ListAffiliates&msg=1");
					die();												
				} else {
					$sErrorMsg	= "SQL error, Please try again.";
					$this->AddAffiliates($oAffiliate,$sErrorMsg);
					die();
				}			
			}
		}//ef

		
		/*
		***********************
		This function checks the availability of the type of the file in the allowed array
		***************************************************************************************
		*/	
		private function checkFileType($ext_allowed, $file_type = null)
		{
			if(in_array($file_type,$ext_allowed))
			{
				return true;
			}
			else
			{
				return false;
			}
		}//ef

		
		/*
		*****************************************************
		This function checks the size of the file to be uploaded. It shouldn't exceed the maximum size specified.
		******************************************************
		*/				
		private function checkFileSize($max_size, $filepath, $max_width, $max_height, $sErrorMsg = NULL)
		{
			$file_size	= filesize($filepath);			

			if($file_size < $max_size) {
				
				$thumbsize	=	getimagesize($filepath);				
				$w	=	$thumbsize[0];				
				$h	=	$thumbsize[1];
				
				if($h < $max_height && $w < $max_width) {
					
					return true;
				} else {
					
					$sErrorMsg	= "Only jpeg and gif files of dimension 900*250  or lesser can be uploaded.";	
					return false;					
				}	
			} else {
				
				$sErrorMsg	= "Only jpeg and gif files of upto 5Mb can be uploaded.";
				return false;			
			}			
		}


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
		function ActivateAffiliate()
		{
			$_REQUEST['mode'] 		= "ActivateAffiliate";
			$this->oModel->ActivateAffiliate($_REQUEST['identity']);
			//$this->oModel->ActivateEmployerJobs($_REQUEST['identity']);
			$err="Affiliate has been activated Successfully.";
			$this->ListAffiliates($err);
			die();			
		}

		
		/*
		**************************************************************************************
		*Function Header
		*Function Name  : DeactivateAffiliate
		*Function Type  : Call by value	
		*Functionality  : Deactivates employer or list of employers
		*Input			: member id or id
		*Output			: Deactivates employer or list of employers
		*Return Value   : nothing
		*Note			: nothing
		***************************************************************************************
		*/		
		function DeactivateAffiliate()
		{								
			$_REQUEST['mode'] 		= "DeactivateEmployer";
			
			$this->oModel->DeactivateAffiliate($_REQUEST['identity']);
			//$this->oModel->DeactivateEmployerJobs($_REQUEST['identity']);
			$err="Affiliate has been deactivated Successfully.";
			$this->ListAffiliates($err);
		}
		
		
		/*
		**************************************************************************************
		*Function Header
		*Function Name  : DeleteAffiliate
		*Function Type  : Call by value	
		*Functionality  : Deletes Affiliate or list of Affiliate
		*Input			: member id or ids
		*Output			: Deletes Affiliate or list of Affiliate
		*Return Value   : nothing
		*Note			: nothing
		***************************************************************************************
		*/
		function DeleteAffiliate()
		{							
			$_REQUEST['mode'] 		= "DeleteAffiliate";			
			$this->oModel->DeleteAffiliate($_REQUEST['identity']);
			$err = "Affiliate(s) has been deleted successfully.";
			$this->ListAffiliates($err);
		}//ef
	}//ec
?>