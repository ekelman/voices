<?php
	/*******************************************************************************************
		* Author Name	: Sandeep Singla      
		* Creation Date : 21 May-2007
		* FileName		: MemberView.php	     
		* Called From	: User MemberController and where the member details are required.
		* Description	: MemberView file is used to interact with the front end that displays forms,pages etc 
						  using html template files. 
		* Components Used : none
		* Tables Accessed : none
		* Program Specs :  
		* UTP doc :
		* Tested By :
	*****************************************************************************************/

	/***************************************************************
	*Class Header
	*Class Name		: MemberView
	*Functionality	: This clss controls how the data is displayed 
					  on the front end using the HTML templates.
	*Note			: MemberView inherits UserView containts the 
					  display functionality for the user site.
	***************************************************************/
	class MemberView extends UserView
	{		

		/***************************************************************************************
		*Function Header
		*Function Name  : MemberView
		*Function Type  : Constructor	
		*Functionality  : Initializes objects of different classes 
		*Input			: nothing
		*Output			: Class objects
		*Return Value   : nothing
		*Note			: nothing
		****************************************************************************************/
		function MemberView()
		{
			parent::UserView();
		}// end of fu
	

		/***************************************************************************************
		*Function Header
		*Function Name  : registeredSuccessfully
		*Function Type  : Call by value	
		*Functionality  : Displays  login form or member welcome page depending on whether 
						  user is logged in or not.
		*Input			: member object and error message object
		*Output			: welcome page or login page depending on the condition
		*Return Value   : nothing
		*Note			: nothing
		****************************************************************************************/		
		function loginform($oMember,$sErrorMessage)
		{
			$catPage = 1;
			global $_CONF;
			$this->obTemplate->clear_cache('member/ihtml/login.html');
			$this->obTemplate->assign('oMember', $oMember);		
			$this->obTemplate->assign('errorMessage', $this->SErrorMsg);
			$this->obTemplate->assign('Content',$this->obTemplate->fetch('member/ihtml/login.html'));
			$this->parse();
		}
		
		
		/******************************************************************************************
		*Function Header
		*Function Name  : login
		*Function Type  : Call by value	
		*Functionality  : provides login functionality to the user
		*Input			: member object
		*Output			: generates login page
		*Return Value   : nothing
		*Note			: $sErrorMessage will contaion the error message.
		*******************************************************************************************/
		function login($oMember, $sErrorMessage)
		{
			$catPage = 1;
			global $_CONF;
			$_SESSION['member_id']	=	"";
			$this->obTemplate->clear_cache('member/ihtml/login.html'); 
			$this->obTemplate->assign('oMember', $oMember);	
			$this->obTemplate->assign('sErrorMessage',$sErrorMessage);
			$this->obTemplate->assign('article_id', $this->article_id);	
						
			$this->obTemplate->assign('Content', $this->obTemplate->fetch('member/ihtml/login.html'));
			$this->parse();
			
		}
		
		
		/******************************************************************************************
		*Function Header
		*Function Name  : contactAdmin
		*Function Type  : Call by value	
		*Functionality  : Asked a member to contact admin if the user account is suspended by admin
		*Input			: nothing
		*Output			: contact admin page for the user.
		*Return Value   : nothing
		*Note			: 
		*******************************************************************************************/
		function contactAdmin()
		{
			$this->obTemplate->clear_cache('member/ihtml/contact-admin.html');
			$this->obTemplate->assign('Content', $this->obTemplate->fetch('member/ihtml/contact-admin.html'));
			$this->parse();
		}
		
		
		/*
		*****************************************************************************************
		*Function Header
		*Function Name  : forgotPassword
		*Function Type  : Call by value	
		*Functionality  : Asked a member to contact admin if the user account is suspended by admin
		*Input			: nothing
		*Output			: nothing.
		*Return Value   : nothing
		*Note			: 
		******************************************************************************************\
		*/
		function forgotPassword()
		{
			$this->obTemplate->clear_cache('member/ihtml/forgot_password.html'); 
			$this->obTemplate->assign('sErrorMessage',$this->SErrorMsg);
			$this->obTemplate->assign('Content', $this->obTemplate->fetch('member/ihtml/forgot_password.html'));
			$this->parse();
		}
	}//ec
?>