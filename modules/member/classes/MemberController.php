<?php
	/****************************************************************************************
		* Author Name 		: Gagandeep Kaur
		* Creation Date		: 2nd Aug-2007
		* FileName 			: MemberController.php	
		* Called From 		: Admin index page

		* Description 		: MemberController file is used to control the MemberModel and MemberView files,it passes control according to the operation required.

		* Components Used	: Validation for server side validations
		* Tables Accessed	: none
		* Program Specs		: nothing 
		* UTP doc			: nothing
		* Tested By			: nothing
	*********************************************************************************************/
	//this class contains all the queries related to Category class 
	require_once($_CONF['ModulesPath'].'member/classes/MemberModel.php');
	
	//this class contains fucntions to create server side validations
	require_once($_CONF['ModulesPath'].'system/classes/Validation.php');
	
	//this class contains all the queries related to search categories
	require_once($_CONF['ModulesPath'].'system/functions.php');						   	 								

	/******************************************************************
	*Class Header
	*Class Name		: MemberController
	*Functionality	: This class controls MemberModel and MemberView to 
					  handle Member related function on the site.
	*Note        	: MemberController inherits AdminController that 
 	                  contains functions for the admin site.
	*******************************************************************/
	class MemberController extends AdminController{
		
		/***************************************************************************************
		*Function Header
		*Function Name  : MemberController
		*Function Type  : Constructor	
		*Functionality  : Initializes objects of different classes 
		*Input			: nothing
		*Output			: Class objects
		*Return Value   : nothing
		*Note			: nothing
		****************************************************************************************/			
		function MemberController(){
			global $_CONF;
			parent::AdminController();
			$this->oView = new MemberView();
			$this->oModel = new MemberModel();
		}//ef

		
		/*
		**************************************************************************************
		*Function Header
		*Function Name  : ListEmails
		*Function Type  : call by value	
		*Functionality  : List all the emails
		*Input			: nothing
		*Output			: List of all the emails
		*Return Value   : nothing
		*Note			: nothing
		***************************************************************************************
		*/		
		function ListEmails()
		{
			$this->oModel->bPagingApplied 	= true;
			if($_REQUEST['msg']==1)
			{
				$this->oView->sErrorMsg="Changes Updated Sucessfully";
			}
			
			if(!empty($_REQUEST['sort']))
			{					    							
				// defining sort field 
				$this->oModel->bSortingApplied 		= true;
				$this->oModel->vSort['Field']		= $_REQUEST['sort'];
				$this->oModel->vSort['Direction'] 	= $_REQUEST['direction'];
			}
			
			$this->oModel->vPage['CurrentPage'] 	= (empty($_REQUEST['pos']) ? 0 : $_REQUEST['pos']);
			$oEmails=$this->oModel->GetEmails();
			$_REQUEST['pos'] 						= $this->oModel->vPage['CurrentPage'];
			$this->oView->vPage 					= $this->oModel->vPage;	
			$this->oView->ListEmails($oEmails);
		}//ef
		
		
		/******************************************************************************************
		*Function Header
		*Function Name  : ShowEmailDetail
		*Function Type  : Call by value	
		*Functionality  : displays the details of the email.
		*Input			: email id.
		*Output			: displays the details of the email.
		*Return Value   : nothing
		*Note			: nothing
		*******************************************************************************************/	
		function ShowEmailDetail()
		{
			$oEmails=$this->oModel->GetEmail($_REQUEST['id']);
			$this->oView->ShowEmailDetail($oEmails[0]);
		}//ef
		
		
		/******************************************************************************************
		*Function Header
		*Function Name  : SaveEmail
		*Function Type  : Call by value	
		*Functionality  : saves the details of the email in database.
		*Input			: email id.
		*Output			: saves the details of the email in database.
		*Return Value   : nothing
		*Note			: nothing
		*******************************************************************************************/			
		function SaveEmail()
		{
			global $_CONF;
			 $oEmails->email_id=$_POST['id'];
			if(isset($_POST['Save']))
			{
				$oEmails->subject=$_POST['subject'];
				$oEmails->restore_content=$_POST['content'];
				$rs=$this->oModel->UpdateEmail($oEmails);
				if($rs)	{
					header("location:".$_CONF['AdminURL']."index.php?stage=member&mode=ListEmails&msg=1");
				}
			}
			elseif(isset($_POST['Restore']))
			{
				$OEmails=$this->oModel->GetEmail($oEmails->email_id);
				$rs=$this->oModel->UpdateEmail($OEmails[0]);
				if($rs) {
					header("location:".$_CONF['AdminURL']."index.php?stage=member&mode=ShowEmailDetail&id=".$oEmails->email_id);
				}
			} 
			else 
			{
				header("location:".$_CONF['AdminURL']."index.php?stage=member&mode=ListEmails");
			}
		}//ef
	};
?>