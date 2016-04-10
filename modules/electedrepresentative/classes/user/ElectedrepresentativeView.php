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
	class ElectedrepresentativeView extends UserView
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
		function ElectedrepresentativeView()
		{
			parent::UserView();
		}// end of fu
		
		/***************************************************************************************
		*Function Header
		*Function Name  : SubscriberJoin
		*Function Type  : Call by value	
		*Functionality  : Displays new signup page for employer.
		*Input			: arrays-location,category,hear mode and security question
		*Output			: signup page.
		*Return Value   : nothing
		*Note			: nothing
		****************************************************************************************/
		function ElectedrepresentativeList()
		{
			global $_CONF;
			$this->obTemplate->clear_cache('electedrepresentative/ihtml/elected_representatives.html');
			$this->obTemplate->assign('oMember', $this->oMember);			
			$this->obTemplate->assign('Content',$this->obTemplate->fetch('electedrepresentative/ihtml/elected_representatives.html'));
			$this->parse();
		}//ef
		
		
		/*
		**************************************************************************************
		*function header
		*function name  : ElectedrepresentativeDashboard
		*function type  : call by value	
		*functionality  : 
		*input			: 
		*output			: 
		*return value   : nothing
		*note			: nothing
		***************************************************************************************
		*/
		function ElectedrepresentativeDashboard()
		{
			//echo "ElectedrepresentativeDashboard  view";
			//die();
			
			$this->obTemplate->clear_cache('electedrepresentative/ihtml/electedrepresentative_dashboard.html');			
			$this->obTemplate->assign('vMsg', $this->vMsg);
			$this->obTemplate->assign('oElectoralDistrict', $this->oElectoralDistrict);	
			$this->obTemplate->assign('oElectoralDistrictComments', $this->oElectoralDistrictComments);				
			$this->obTemplate->assign('oElectoralDistrictPolls', $this->oElectoralDistrictPolls);				
			/* permissions */
			$this->obTemplate->assign('ERContentPollView', $this->er_content_poll_view);					
			$this->obTemplate->assign('ERContentPollAdd', $this->er_content_poll_add);				
			$this->obTemplate->assign('ERContentPollDelete', $this->er_content_poll_delete);				
			
			$this->obTemplate->assign('ERContentArticleView', $this->er_content_article_view);							
			$this->obTemplate->assign('ERContentArticleAdd', $this->er_content_article_add);							
			$this->obTemplate->assign('ERContentArticleModifyOwnContent', $this->er_content_article_modify_own_content);							
			$this->obTemplate->assign('ERContentArticleDelete', $this->er_content_article_delete);							
			
			$this->obTemplate->assign('ERContentReportCardView', $this->er_content_report_card_view);							
			/* permissions */			
						

			/*ER report card*/			
			$this->obTemplate->assign('affiliateVoteAlerts',$this->affiliateVoteAlerts );						
			
			$this->obTemplate->assign('Content',$this->obTemplate->fetch('electedrepresentative/ihtml/electedrepresentative_dashboard.html'));
			$this->parse();
		}//ef
		/*
		**************************************************************************************
		*function header
		*function name  : EditProfile
		*function type  : call by value	
		*functionality  : 
		*input			: 
		*output			: 
		*return value   : nothing
		*note			: nothing
		***************************************************************************************
		*/
		function EditProfile()
		{
			$this->obTemplate->clear_cache('electedrepresentative/ihtml/edit_elected_representatives_profile.html');
			$this->obTemplate->assign('oMember', $this->oMember);
			$this->obTemplate->assign('vMsg', $this->vMsg);
			
			$this->obTemplate->assign('Content',$this->obTemplate->fetch('electedrepresentative/ihtml/edit_elected_representatives_profile.html'));			
			$this->parse();
		}//ef

		
		/*		
		 *************************************************************************************
		*function header
		*function name  : SubmitNewContent
		*function type  : call by value	
		*functionality  : 
		*input			: 
		*output			: 
		*return value   : nothing
		*note			: nothing
		***************************************************************************************
		*/
		function SubmitNewContent()
		{
		    global $_CONF;
			$this->obTemplate->clear_cache('electedrepresentative/ihtml/submit_new_content.html');		    			
			$this->obTemplate->assign('Content',$this->obTemplate->fetch('electedrepresentative/ihtml/submit_new_content.html'));			
			$this->parse();
		}//ef	

		
		/*		
		 *************************************************************************************
		*function header
		*function name  : SubmitNewPoll
		*function type  : call by value	
		*functionality  : 
		*input			: 
		*output			: 
		*return value   : nothing
		*note			: nothing
		***************************************************************************************
		*/
		function SubmitNewPoll()
		{
		    global $_CONF;
			$this->obTemplate->clear_cache('electedrepresentative/ihtml/submit_new_poll.html');		    			
			$this->obTemplate->assign('Content',$this->obTemplate->fetch('electedrepresentative/ihtml/submit_new_poll.html'));			
			$this->parse();
		}//ef	
		
		
		/*
		**************************************************************************************
		*Function Header
		*Function Name  : EmailMessage
		*Function Type  : Call by value	
		*Functionality  : Used to display messages
		*Input			: message id and extravar1 and extravar2 from referrer conroller email message function
		*Output			: display messages
		*Return Value   : nothing
		*Note			: nothing
		***************************************************************************************
		*/
		function EmailMessage()
		{
			$this->obTemplate->clear_cache('electedrepresentative/ihtml/message.html');
			$this->obTemplate->assign('message', $this->message);
			$this->obTemplate->assign('extraVar1', $this->extraVar1);
			$this->obTemplate->assign('Content',$this->obTemplate->fetch('electedrepresentative/ihtml/message.html'));
			$this->parse();
		}//ef
		
		
		/*
		 * **********************************************************************************************
		*Function Header
		*Function Name  : AffiliateAuthenticate
		*Function Type  : call by value
		*Functionality  : Authenticates user access to this controller
		*Input			: NIL
		*Output			: authenicates the user
		*Return Value   : NIL
		*Note			: NIL		
		******************************************************************************************/
		function ArticleDetail() {
			
			$this->obTemplate->clear_cache('electedrepresentative/ihtml/er_article_detail.html');
			$this->obTemplate->assign('oArticle', $this->oArticle);
			$this->obTemplate->assign('oSubscribersComment', $this->oSubscribersComment);
			
			/* permissions */			
			$this->obTemplate->assign('ERContentArticleModifyOwnContent', $this->er_content_article_modify_own_content);							
			$this->obTemplate->assign('ERContentArticleDelete', $this->er_content_article_delete);							
			/* permissions */
			
			$this->obTemplate->assign('msg', $this->msg);
			$this->obTemplate->assign('Content',$this->obTemplate->fetch('electedrepresentative/ihtml/er_article_detail.html'));
			$this->parse();
		}//ef
		
		
		/*
		 * **********************************************************************************************
		*Function Header
		*Function Name  : EditArticle
		*Function Type  : call by value
		*Functionality  : Authenticates user access to this controller
		*Input			: NIL
		*Output			: authenicates the user
		*Return Value   : NIL
		*Note			: NIL		
		******************************************************************************************/
		function EditArticle() {			
			$this->obTemplate->clear_cache('electedrepresentative/ihtml/edit_article.html');
			$this->obTemplate->assign('oArticle', $this->oArticle);

			
			$this->obTemplate->assign('msg', $this->msg);
			$this->obTemplate->assign('Content',$this->obTemplate->fetch('electedrepresentative/ihtml/edit_article.html'));
			$this->parse();
		}//ef
		
		
		
		
		
		/*
		 * **********************************************************************************************
		*Function Header
		*Function Name  : PollsDetail
		*Function Type  : call by value
		*Functionality  : Authenticates user access to this controller
		*Input			: NIL
		*Output			: authenicates the user
		*Return Value   : NIL
		*Note			: NIL		
		*****************************************************************************************
		**/
		function PollsDetail() {
			
			$this->obTemplate->clear_cache('electedrepresentative/ihtml/er_polls_detail.html');
			$this->obTemplate->assign('oArticle', $this->oArticle);
			
			/* permissions */						
			$this->obTemplate->assign('ERContentPollDelete', $this->er_content_poll_delete);							
			/* permissions */			
			
			
			$this->obTemplate->assign('msg', $this->msg);
			
			$this->obTemplate->assign('supportPercentage', $this->supportPercentage);
			$this->obTemplate->assign('opposePercentage', $this->opposePercentage);
			$this->obTemplate->assign('signsCount', $this->signs_count);
			
			$this->obTemplate->assign('Content',$this->obTemplate->fetch('electedrepresentative/ihtml/er_polls_detail.html'));
			$this->parse();
		}//ef
		

		/*
		**************************************************************************************
		*function header
		*function name  : ERArticles
		*function type  : call by value	
		*functionality  : 
		*input			: 
		*output			: 
		*return value   : nothing
		*note			: nothing
		***************************************************************************************
		*/
		function ERArticles()
		{
			$this->obTemplate->clear_cache('electedrepresentative/ihtml/er_article.html');
			$this->obTemplate->assign('oArticle', $this->oElectoralDistrictComments);

			/* permissions */			
			$this->obTemplate->assign('ERContentArticleModifyOwnContent', $this->er_content_article_modify_own_content);							
			$this->obTemplate->assign('ERContentArticleDelete', $this->er_content_article_delete);							
			/* permissions */			
			
			
			$this->obTemplate->assign('msg', $this->msg);			
			$this->obTemplate->assign('ERContentArticleModifyOwnContent', $this->er_content_article_modify_own_content);							
			$this->obTemplate->assign('Content',$this->obTemplate->fetch('electedrepresentative/ihtml/er_article.html'));
			$this->parse();
		}//ef

	
		/*
		**************************************************************************************
		*function header
		*function name  : ERPolls
		*function type  : call by value	
		*functionality  : 
		*input			: 
		*output			: 
		*return value   : nothing
		*note			: nothing
		***************************************************************************************
		*/
		function ERPolls()
		{
			$this->obTemplate->clear_cache('electedrepresentative/ihtml/er_polls.html');
			
			/* permissions */						
			$this->obTemplate->assign('ERContentPollDelete', $this->er_content_poll_delete);							
			/* permissions */			
			
			
			$this->obTemplate->assign('oArticle', $this->oElectoralDistrictComments);
			$this->obTemplate->assign('msg', $this->msg);
			$this->obTemplate->assign('Content',$this->obTemplate->fetch('electedrepresentative/ihtml/er_polls.html'));
			$this->parse();
		}//ef
		
		
		/*
		**************************************************************************************
		*function header
		*function name  : ERReportCard
		*function type  : call by value	
		*functionality  : 
		*input			: 
		*output			: 
		*return value   : nothing
		*note			: nothing
		***************************************************************************************
		*/
		function ERReportCard()
		{
			$this->obTemplate->clear_cache('electedrepresentative/ihtml/er_report_card.html');
			$this->obTemplate->assign('oElectoralDistrictComments', $this->oElectoralDistrictComments);
			$this->obTemplate->assign('Content',$this->obTemplate->fetch('electedrepresentative/ihtml/er_report_card.html'));
			$this->parse();
		}//ef
	};//ec
?>