<?php
	/*
	 * ***************************************************************************************
	 * Author Name 		: Anil Nautiyal
	 * Creation Date	: 19 Dec-2011
	 * FileName 		: ElectedrepresentativeController.php	
	 * Called From 		: Admin index page
	 * Description 		: ElectedrepresentativeController file is used to control the ElectedrepresentativeModel and ElectedrepresentativeView files, 
	 * 					  it passes control according to the operation required.
	 * Components Used	: Validation for server side validations
	 * Tables Accessed	: none
	 * Program Specs	: nothing 
	 * UTP doc			: nothing
	 * Tested By		: nothing
	*********************************************************************************************/
	
	require_once($_CONF['ModulesPath'].'electedrepresentative/classes/ElectedrepresentativeModel.php');	//this class contains all the queries related to Category class 
	require_once($_CONF['ModulesPath'].'system/classes/Validation.php');	//this class contains fucntions to create server side validations
	require_once($_CONF['ModulesPath'].'system/functions.php');				//this class contains all the queries related to search categories

	require_once($_CONF['ModulesPath'].'system/classes/extra/upload_class.php');	
	
	//contains some common data classes 
	require_once($_CONF['ModulesPath'].'system/classes/dataclasses.php');								    
	
	/******************************************************************
	*Class Header
	*Class Name		: ElectedrepresentativeController
	*Functionality	: This class controls ElectedrepresentativeModel and ElectedrepresentativeView to 
					  handle Electedrepresentative related function on the site.
	*Note        	: ElectedrepresentativeController inherits AdminController that 
 	                  contains functions for the admin site.
	*******************************************************************/

	class ElectedrepresentativeController extends AdminController{
				
	/***************************************************************************************
	*Function Header
	*Function Name  : ElectedrepresentativeController
	*Function Type  : Constructor	
	*Functionality  : Initializes objects of different classes 
	*Input			: nothing
	*Output			: Class objects
	*Return Value   : nothing
	*Note			: nothing
	****************************************************************************************/
			
		function ElectedrepresentativeController(){
			
			global $_CONF;
			parent::AdminController();
			$this->oView = new ElectedrepresentativeView();
			$this->oModel = new ElectedrepresentativeModel();
		}//ef
		
		
		/*
		***********************************************************************************
		*Function Header
		*Function Name  : ListElectedrepresentative
		*Function Type  : call by value	
		*Functionality  : List all the Electedrepresentative
		*Input			: nothing
		*Output			: List of all the ListElectedrepresentative
		*Return Value   : nothing
		*Note			: nothing		
		**************************************************************************************/
		function ListElectedrepresentative($err="")
		{
			
			$search_field = '';
			$search_text = ''; 
			
			if(isset($_REQUEST['search_field']))
			{
				$search_field	=	$_REQUEST['search_field'];
				$search_text	=	$_REQUEST['search_text'];
			}
			
			if($_REQUEST['msg']==1){
			
				$err="Account created successfully.";
			} elseif($_REQUEST['msg']=='7') {

				$err="Account updated successfully.";
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
			
			$this->oModel->bPagingApplied 		=	true;
			$this->oModel->vPage['PageSize']	=	50;
		
			if(!empty($_REQUEST['sort'])) {					    							
				// defining sort field 
				$this->oModel->bSortingApplied 		= true;
				$this->oModel->vSort['Field']		= $_REQUEST['sort'];
				$this->oModel->vSort['Direction'] 	= $_REQUEST['direction'];
			} else {
			
				$this->oModel->bSortingApplied 		= true;
				$this->oModel->vSort['Field']		= 'Elected_Officer_ID';
				$this->oModel->vSort['Direction'] 	= 0;
			}
			
			$this->oModel->vPage['CurrentPage'] 	=	(empty($_REQUEST['pos']) ? 0 : $_REQUEST['pos']);
			$oMember	=	$this->oModel->getElectedOfficialsAdmin($search_field,$search_text);
			
			/*
			echo "<pre>";
			print_r($oMember);
			die("here");
			
			foreach ($oMember as $key => $value) {
				$oMember[$key]->status = false;
				//echo $oMember[$key]->ElectedOfficialID;
				
				$this->oModel->bSortingApplied 		= false;				
				$is_account = $this->oModel->getElectedRepresentativeEmailMember($oMember[$key]->ElectedOfficialID);
				if($email != "") {
				$oMember[$key]->status = $is_account;
				}
				
			}
			*/
			
			$_REQUEST['pos'] 						=	$this->oModel->vPage['CurrentPage'];
			
			$this->oView->oMember					= &$oMember;
			$this->oView->vPage 					= $this->oModel->vPage;	
			$this->oView->sErrorMsg					= $err;
			
			$this->oView->search_field 				= $search_field;
			$this->oView->search_text 				= $search_text;
			
			$this->oView->ListElectedrepresentative();
		}//ef

		
		/*
		***********************************************************************************
		*Function Header
		*Function Name  : ListElectedrepresentativeAccounts
		*Function Type  : call by value	
		*Functionality  : List all the ListElectedrepresentativeAccounts
		*Input			: nothing
		*Output			: List of all the ListElectedrepresentativeAccounts
		*Return Value   : nothing
		*Note			: nothing		
		**************************************************************************************/
		function ListElectedrepresentativeAccounts($err="")
		{
			
			$search_field = '';
			$search_text = ''; 
			
			if(isset($_REQUEST['search_field']))
			{
				$search_field	=	$_REQUEST['search_field'];
				$search_text	=	$_REQUEST['search_text'];
			}
			
			if($_REQUEST['msg']==1){
			
				$err="Account created successfully.";
			} elseif($_REQUEST['msg']=='7') {

				$err="Account updated successfully.";
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
			
			$this->oModel->bPagingApplied 		=	true;
			$this->oModel->vPage['PageSize']	=	50;
		
			if(!empty($_REQUEST['sort'])) {					    							
				// defining sort field 
				$this->oModel->bSortingApplied 		= true;
				$this->oModel->vSort['Field']		= $_REQUEST['sort'];
				$this->oModel->vSort['Direction'] 	= $_REQUEST['direction'];
			} else {
			
				$this->oModel->bSortingApplied 		= true;
				$this->oModel->vSort['Field']		= 'member_id';
				$this->oModel->vSort['Direction'] 	= 0;
			}
			
			$this->oModel->vPage['CurrentPage'] 	=	(empty($_REQUEST['pos']) ? 0 : $_REQUEST['pos']);
			$oMember	=	$this->oModel->getElectedOfficialsAccountsAdmin($search_field,$search_text);
			
			/*
			echo "<pre>";
			print_r($oMember);
			die("here");
			
			foreach ($oMember as $key => $value) {
				$oMember[$key]->status = false;
				//echo $oMember[$key]->ElectedOfficialID;
				
				$this->oModel->bSortingApplied 		= false;				
				$is_account = $this->oModel->getElectedRepresentativeEmailMember($oMember[$key]->ElectedOfficialID);
				if($email != "") {
				$oMember[$key]->status = $is_account;
				}
				
			}
			*/
			
			$_REQUEST['pos'] 				=	$this->oModel->vPage['CurrentPage'];
			
			$this->oView->oMember			= &$oMember;
			$this->oView->vPage 			= $this->oModel->vPage;	
			$this->oView->sErrorMsg			= $err;
			
			$this->oView->search_field 		= $search_field;
			$this->oView->search_text 		= $search_text;
			
			$this->oView->ListElectedrepresentativeAccounts();
		}//ef
		
		
		/*
		************************************************************************************
		*function header
		*function name  : EditElectedrepresentative
		*function type  : call by value	
		*functionality  : Display the details of Electedrepresentative to edit
		*input			: member id
		*output			: Display the details of Electedrepresentative to edit.
		*return value   : nothing
		*note			: nothing		
		*************************************************************************************
		*/
		function EditElectedrepresentative($oElectoralDistrict = "",$sErrorMsg="")
		{	
			
			if(isset($_REQUEST['msg'])) {
				if($_REQUEST['msg'] == "account_alreadycreadted") {
					$sErrorMsg	= "Account already created, edit details below.";
				}
			}
			
			if(isset($_REQUEST['id']))
			{
				$er_id = $_REQUEST['id'];
				
				$oElectoralDistrict = $this->oModel->getElectedMemberDetailsAdmin($er_id);
				$oElectoralDistrict  = $oElectoralDistrict[0];
				
				//echo "<pre>";
				//print_r($oElectoralDistrict);
				//die("--//--");				
			} elseif(!empty($oElectoralDistrict)) {
			
				$oElectoralDistrict  = $oElectoralDistrict;
			} else {
			
				$this->ListElectedrepresentative();
			   	die();
			}
			
			$this->oView->oElectoralDistrict = $oElectoralDistrict;
			$this->oView->sErrorMsg = $sErrorMsg;
			
			$this->oView->EditElectedrepresentative();						
		}//ef	
		
		
		/*		
		 ***************************************************************************************
		*function header
		*function name  : UpdateEmployer
		*function type  : call by value	
		*functionality  : update the account of employer
		*input			: oEmployer array
		*output			: update the account of employer
		*return value   : nothing
		*note			: nothing		
		****************************************************************************************
		*/
		function UpdateElectedrepresentative()
		{
			global $_CONF;
			
			if ($_POST['Cancel']=='Cancel') {    
				$this->ListElectedrepresentative();
			   	die();
		  	}
			
		    $oElectoralDistrict->ElectedOfficialID	=	$_POST['ElectedOfficialID'];
		  	$oElectoralDistrict->member_id			=	$_POST['id'];
			$oElectoralDistrict->email				=	trim($_POST['email']);
			$oElectoralDistrict->password			=	$_POST['password'];			
			
			//print_r($oElectoralDistrict);
			//print_r($_POST);
			//die();	

			$isDuplicate	=	$this->oModel->checkDuplicationUpdate($oElectoralDistrict);

			if($isDuplicate)
			{					
				$sErrorMsg	= "E-mail Id already exists.";
				$this->EditElectedrepresentative($oElectoralDistrict, $sErrorMsg);
				die();			
			}

			$sErrorMsg = "";
			
			if($_FILES['profile_image']['name'] != "")
			{
				if($_FILES['profile_image']['type'] != '')
				{
				
					$prfile_image 	=	explode(".",$_FILES['profile_image']['name']);
					$Ext	=	$prfile_image[count($prfile_image)-1];
								
					$maxsize	=	20971520;
					$thumbname	=	$oElectoralDistrict->ElectedOfficialID.".".$Ext;
					
					$oElectoralDistrict->OfficerProfileImage = $thumbname;
					
					$newwidth 	=	113;
					$newheight	=	87;
					
					$ext_allowed = array('image/gif','image/pjpeg','image/jpeg','image/x-png');
					
					$thumbnail=true;
					if($thumbnail)
					{
						$thumb_dimensions = array(0 => array($newwidth, $newheight));
					} else {
						
						$thumb_dimensions = ' ';
					}
				
					//echo $_CONF['profile_image'].$thumbname;
					//die();	
					@unlink($_CONF['profile_image'].$thumbname);
					@unlink($_CONF['profile_image']."thumb/".$thumbname);
				
					$fileupdownload = new fileUpDownload('profile_image', $ext_allowed, $thumbnail);
					
					$res = $fileupdownload->fileUpload($_CONF['profile_image'], $maxsize, $_CONF['profile_image']."thumb/", $thumb_dimensions, $newwidth, $thumbname);
					//echo $res;
					//die("==");
					if(($res==104) || ($res==108)) {
					
						//do nothing
					} else {
						if($res == 102)
						{
							$sErrorMsg	= "Profile Image is not uploading due to size limits(5MB) or other factors.";
						}
						if($res == 101)
						{
							$sErrorMsg	= "Only jpeg, png, and gif files can be uploaded.";
						}
					}
				} else {
				
					$sErrorMsg	= "Invalid profile image type.";
				}
			}
			
			if($sErrorMsg != "") {
				$this->EditElectedrepresentative($oElectoralDistrict, $sErrorMsg);
				die();
			}			
		
			$rs= $this->oModel->updateAdminElectedrepresentative($oElectoralDistrict);
			$msg = 7;			
			
			header("location:".$_CONF['AdminURL']."index.php?stage=electedrepresentative&mode=listelectedrepresentativeaccounts&msg=".$msg."&search_field=$_REQUEST[search_field]&search_text=$_REQUEST[search_text]");
		}//ef
		
		
		/*
		************************************************************************************
		*function header
		*function name  : CreateElectedrepresentativeAccount
		*function type  : call by value	
		*functionality  : Display the details of Electedrepresentative to create Account
		*input			: id
		*output			: Display the details of Electedrepresentative to create Account
		*return value   : nothing
		*note			: nothing		
		*************************************************************************************
		*/
		function CreateElectedrepresentativeAccount($oElectoralDistrict = "",$sErrorMsg="")
		{	
			if(!empty($oElectoralDistrict)) {
				
				$oElectoralDistrict  = $oElectoralDistrict;
			} elseif(isset($_REQUEST['id'])) {
				
				$er_id = $_REQUEST['id'];
				$isExists	=	$this->oModel->isERExists($er_id);
				
				if($isExists) {
					
					echo "<script>location='index.php?stage=electedrepresentative&mode=EditElectedrepresentative&id=$er_id&msg=account_alreadycreadted'</script>";
					die();				
				}
				
				$last_name = "";
				$oElectoralDistrict = $this->oModel->getElectedRepresentativeDetails($er_id);
				
				$oElectoralDistrict  = $oElectoralDistrict[0];
				if($oElectoralDistrict->Middle_Name  != "") {
					$last_name = $oElectoralDistrict->Middle_Name ." ";
				}
				
				if($oElectoralDistrict->Last_Name  != "") {
					$last_name = $last_name . $oElectoralDistrict->Last_Name;
				}
				$oElectoralDistrict->Last_Name = $last_name;				
			} else {
			
				$this->ListElectedrepresentative();
			   	die();
			}
			
			$this->oView->oElectoralDistrict = $oElectoralDistrict;
			$this->oView->sErrorMsg = $sErrorMsg;
			
			$this->oView->CreateElectedrepresentativeAccount();						
		}//ef	
		
		
		/*		
		***************************************************************************************
		*function header
		*function name  : saveElectedrepresentative
		*function type  : call by value	
		*functionality  : save the account of Electedrepresentative
		*input			: oEmployer array
		*output			: save the account of Electedrepresentative
		*return value   : nothing
		*note			: nothing		
		****************************************************************************************
		*/
		function saveElectedrepresentative()
		{
			global $_CONF;
			
			if ($_POST['Cancel']=='Cancel') {    
				$this->ListElectedrepresentative();
			   	die();
		  	}
			
	        $oElectoralDistrict->user_name			=	trim($_POST['username']);
		    $oElectoralDistrict->ElectedOfficialID	=	$_POST['ElectedOfficialID'];
	        $oElectoralDistrict->First_Name			=	trim($_POST['First_Name']);
			$oElectoralDistrict->Last_Name			=	trim($_POST['Last_Name']);
			$oElectoralDistrict->EMail1				=	trim($_POST['EMail1']);
			$oElectoralDistrict->password			=	$_POST['password'];
			
			
			//print_r($oElectoralDistrict);
			//print_r($_POST);
			//die();
			

			$isDuplicate	=	$this->oModel->checkDuplication($oElectoralDistrict);

			if($isDuplicate == "username") {
			
				$sErrorMsg	= "User Name already exists.";
				$this->CreateElectedrepresentativeAccount($oElectoralDistrict, $sErrorMsg);
				die();			
			} else if($isDuplicate == "email") {	
								
				$sErrorMsg	= "E-mail Id already exists.";
				$this->CreateElectedrepresentativeAccount($oElectoralDistrict, $sErrorMsg);
				die();			
			}  
			
			/*			
			$isDuplicate	=	$this->oModel->checkDuplicationUpdate($oElectoralDistrict);

			if($isDuplicate)
			{					
				$sErrorMsg	= "E-mail Id already exists.";
				$this->EditElectedrepresentative($oElectoralDistrict, $sErrorMsg);
				die();			
			}
			*/
			
			$sErrorMsg = "";
				
			if($_FILES['profile_image']['name'] != "")
			{
				if($_FILES['profile_image']['type'] != '')
				{
				
					$prfile_image 	=	explode(".",$_FILES['profile_image']['name']);
					$Ext	=	$prfile_image[count($prfile_image)-1];
				
				
					$maxsize	=	20971520;
					$thumbname	=	$oElectoralDistrict->ElectedOfficialID.".".$Ext;
					
					$oElectoralDistrict->OfficerProfileImage = $thumbname;
					
					$newwidth 	=	113;
					$newheight	=	87;
					
					$ext_allowed = array('image/gif','image/pjpeg','image/jpeg','image/x-png');
					
					$thumbnail=true;
					if($thumbnail)
					{
						$thumb_dimensions = array(0 => array($newwidth, $newheight));
					} else {
						$thumb_dimensions = ' ';
					}
				
					@unlink($_CONF['profile_image'].$thumbname);
					@unlink($_CONF['profile_image']."thumb/".$thumbname);

				
					$fileupdownload = new fileUpDownload('profile_image', $ext_allowed, $thumbnail);
					
					$res = $fileupdownload->fileUpload($_CONF['profile_image'], $maxsize, $_CONF['profile_image']."thumb/", $thumb_dimensions, $newwidth, $thumbname);
					
					if(($res==104) || ($res==108)) {
					
						//do nothing
					} else {
						if($res == 102) {
							
							$sErrorMsg	= "Profile Image is not uploading due to size limits(5MB) or other factors.";
						}
						if($res == 101)
						{
							$sErrorMsg	= "Only jpeg, png, and gif files can be uploaded.";
						}
					}
				} else {
				
					$sErrorMsg	= "Invalid profile image type.";
				}
			}
				
			if($sErrorMsg != "") {
				
				$this->CreateElectedrepresentativeAccount($oElectoralDistrict, $sErrorMsg);
				die();
			} else {
				
				/*			
				$rs= $this->oModel->updateAdminElectedrepresentative($oElectoralDistrict);
				$msg = 7;
				*/
				$rs		=	$this->oModel->addAdminElectedrepresentative($oElectoralDistrict);
				$msg 	=	1;				
				
				header("location:".$_CONF['AdminURL']."index.php?stage=electedrepresentative&mode=listelectedrepresentativeaccounts&msg=".$msg);
			}
		}//ef
	}//ec
?>