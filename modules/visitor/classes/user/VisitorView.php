<?php
	/**************************************************************************************************
	* Author Name	: Anil Nautiyal
	* Creation Date : 27th May-2011
	* FileName		: VisitorView.php	     
	* Called From	: VisitorController and where the Subscriber details are required.
	* Description	: VisitorView file is used to interact with the front end that displays                           forms,pages etc using html template files. 
	* Components Used : none
	* Tables Accessed : none
	* Program Specs :  
	* UTP doc :
	* Tested By :
	*************************************************************************************************/
	require_once($_CONF['ModulesPath'].'system/classes/Grid.php');	// this class creates a grid ot display data
	/***************************************************************
	*Class Header
	*Class Name		: VisitorView
	*Functionality	: This clss controls how the data is displayed 
					  on the front end using the HTML templates.
	*Note			: EmployerView inherits UserView contains the 
					  display functionality for the user site.
	***************************************************************/
	class VisitorView extends UserView
	{		
		var $sErrMsg;
		var $sErrorMsg;
		var $uProfile;

		/***************************************************************************************
		*Function Header
		*Function Name  : VisitorView
		*Function Type  : Constructor	
		*Functionality  : Initializes objects of different classes 
		*Input			: nothing
		*Output			: Class objects
		*Return Value   : nothing
		*Note			: nothing
		****************************************************************************************/
		function VisitorView()
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
		function SubscriberJoin()
		{
			global $_CONF;
			$this->obTemplate->clear_cache('subscriber/ihtml/subscriber_join.html');
			$this->obTemplate->assign('sErrorMsg', $this->sErrorMsg);	
			$this->obTemplate->assign('oAffiliates', $this->oAffiliates);			
			$this->obTemplate->assign('oSubscriber', $this->oSubscriber);	
			$this->obTemplate->assign('Content',$this->obTemplate->fetch('subscriber/ihtml/subscriber_join.html'));
			$this->parse();
		}//ef
	
		/*
		**************************************************************************************
		*Function Header
		*Function Name  : ListEmployer
		*Function Type  : Call by value	
		*Functionality  : Display the employer details to edit.
		*Input			: category,location,hear mode,security question,employer array.
		*Output			: Display the employer details to edit.
		*Return Value   : nothing
		*Note			: nothing.
		***************************************************************************************
		*/
		function EditEmployer()
		{
	     
	      global $_CONF;
		  $this->obTemplate->clear_cache('employer/ihtml/edit_profile.html');
			$this->member_arrays =  parse_ini_file($_CONF['ModulesPath'].'referrer/ihtml/member-arrays.conf', true);			
			$hear_mode		=	$this->member_arrays[hear_mode];
			$security_question		=	$this->member_arrays[security_ques];
			
			$this->obTemplate->assign('sErrorMsg', $this->sErrorMsg);
			$this->obTemplate->assign('oCategory', $this->oCategory);
			$this->obTemplate->assign('oProvince', $this->oProvince);
			$this->obTemplate->assign('oEmployer',$this->oEmployer);
			$this->obTemplate->assign('hear_mode', $hear_mode);	
			$this->obTemplate->assign('security_question', $security_question);		
			$this->obTemplate->assign('Content',$this->obTemplate->fetch('employer/ihtml/edit_employer.html'));
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
			$this->obTemplate->clear_cache('visitor/ihtml/message.html');
			$this->obTemplate->assign('message', $this->message);
			$this->obTemplate->assign('extraVar1', $this->extraVar1);
			$this->obTemplate->assign('Content',$this->obTemplate->fetch('visitor/ihtml/message.html'));
			$this->parse();
		}//ef
		/*
		**************************************************************************************
		*function header
		*function name  : MemberDashboard
		*function type  : call by value	
		*functionality  : 
		*input			: 
		*output			: 
		*return value   : nothing
		*note			: nothing
		***************************************************************************************
		*/
		function MemberDashboard()
		{
			
			$this->obTemplate->clear_cache('subscriber/ihtml/member_dashboard.html');
			$this->obTemplate->assign('ProfileInfo', $this->uProfile);			
			$this->obTemplate->assign('MyAffiliateArticles', $this->affiliateArticles);
			
			if(isset($this->bill_resource_bill_summary_view))
				$this->obTemplate->assign('bill_resource_bill_summary_view', $this->bill_resource_bill_summary_view);
						
			if(isset($this->bill_resource_bill_detail_view))
				$this->obTemplate->assign('bill_resource_bill_detail_view', $this->bill_resource_bill_detail_view);
			
			if(isset($this->er_content_comments_view))
				$this->obTemplate->assign('er_content_comments_view', $this->er_content_comments_view);
			
			if(isset($this->affiliate_content_bills_view))
				$this->obTemplate->assign('affiliate_content_bills_view', $this->affiliate_content_bills_view);			
			
			$this->obTemplate->assign('oMember', $this->oMember);						
			$this->obTemplate->assign('MyAffiliates', $this->secondary_affiliates);			
			$this->obTemplate->assign('affiliateNews',$this->affiliateNews );			

			//die($this->obTemplate->fetch('subscriber/ihtml/member_dashboard.html'));
			$this->obTemplate->assign('Content',$this->obTemplate->fetch('subscriber/ihtml/member_dashboard.html'));
			$this->parse();			
		}//ef
		
		
		/*
		**************************************************************************************
		*function header
		*function name  : VoteAlerts
		*function type  : call by value	
		*functionality  : 
		*input			: 
		*output			: 
		*return value   : nothing
		*note			: nothing
		***************************************************************************************
		*/
		function VoteAlerts()
		{

			$this->obTemplate->assign('ProfileInfo', $this->uProfile);			
			$this->obTemplate->assign('MyAffiliateArticles', $this->affiliateArticles);			
			
			$this->obTemplate->clear_cache('subscriber/ihtml/vote_alerts.html');			
			
			
			if(isset($this->bill_resource_bill_summary_view))
				$this->obTemplate->assign('bill_resource_bill_summary_view', $this->bill_resource_bill_summary_view);
				
			if(isset($this->bill_resource_bill_detail_view))
				$this->obTemplate->assign('bill_resource_bill_detail_view', $this->bill_resource_bill_detail_view);
			
			$this->obTemplate->assign('Content',$this->obTemplate->fetch('subscriber/ihtml/vote_alerts.html'));		
			
			$this->parse();
		}//ef
		
		
		
		/*
		**************************************************************************************
		*function header
		*function name  : VoteAlerts
		*function type  : call by value	
		*functionality  : 
		*input			: 
		*output			: 
		*return value   : nothing
		*note			: nothing
		***************************************************************************************
		*/
		function VoteAlertsDetail()
		{
			$this->obTemplate->assign('ProfileInfo', $this->uProfile);			
			$this->obTemplate->assign('MyAffiliateArticles', $this->affiliateArticles);			
			$this->obTemplate->clear_cache('subscriber/ihtml/vote_alerts_detail.html');			
			
			if(isset($this->bill_resource_bill_detail_view))
				$this->obTemplate->assign('bill_resource_bill_detail_view', $this->bill_resource_bill_detail_view);
			
			if(isset($this->affiliate_content_bills_vote_on_content))
				$this->obTemplate->assign('affiliate_content_bills_vote_on_content', $this->affiliate_content_bills_vote_on_content);
			
			if(isset($this->voting_details))
				$this->obTemplate->assign('voting_details', $this->voting_details);
				
			
			$this->obTemplate->assign('Content',$this->obTemplate->fetch('subscriber/ihtml/vote_alerts_detail.html'));		
			
			$this->parse();
		}//ef	

		
		
		
		
		/*
		**************************************************************************************
		*function header
		*function name  : MyProfile
		*function type  : call by value	
		*functionality  : 
		*input			: 
		*output			: 
		*return value   : nothing
		*note			: nothing
		***************************************************************************************
		*/
		function MyProfile()
		{		
			if(isset($this->msg))
			{
				$this->obTemplate->assign('message', $this->msg);
			}
			
			$this->obTemplate->clear_cache('subscriber/ihtml/my_profile.html');			
			$this->obTemplate->assign('ProfileInfo', $this->uProfile);
			$this->obTemplate->assign('is_billing', $this->is_billing);
			$this->obTemplate->assign('MyAffiliates', $this->myAffiliate);
			$this->obTemplate->assign('oPaypal', $this->oPaypal);
			
			$this->obTemplate->assign('Content',$this->obTemplate->fetch('subscriber/ihtml/my_profile.html'));
			$this->parse();
		}//ef
		
		/*
		**************************************************************************************
		*function header
		*function name  : ProfileEdit
		*function type  : call by value	
		*functionality  : 
		*input			: 
		*output			: 
		*return value   : nothing
		*note			: nothing
		***************************************************************************************
		*/
		function ProfileEdit()
		{
			
			$affiliateID =array();
			foreach($this->secondary_affiliates as $affID=>$val)
			{
				array_push($affiliateID,$affID);		
			}
			
			
			$this->obTemplate->assign('oAffiliates', $this->oAffiliates);
			$this->obTemplate->assign('selectedAffiliate', $affiliateID);
			
			
			$this->obTemplate->assign('ProfileInfo', $this->uProfile);
			$this->obTemplate->assign('is_billing', $this->is_billing);
			$this->obTemplate->assign('MyAffiliates', $this->myAffiliate);
			
			$this->obTemplate->clear_cache('subscriber/ihtml/edit_profile.html');
			$this->obTemplate->assign('Content',$this->obTemplate->fetch('subscriber/ihtml/edit_profile.html'));
			$this->parse();
		}//ef
		
		/*
		**************************************************************************************
		*function header
		*function name  : ElectedRepresentatives
		*function type  : call by value	
		*functionality  : 
		*input			: 
		*output			: 
		*return value   : nothing
		*note			: nothing
		***************************************************************************************
		*/
		function ElectedRepresentatives($profile_info)
		{
			$this->obTemplate->clear_cache('subscriber/ihtml/elected_Representatives.html');
			
			$memberName =  $profile_info[0]->first_name." ".$profile_info[0]->last_name;
			
			$this->obTemplate->assign('Name',$memberName);
			$this->obTemplate->assign('oMember',$this->electedOfficials);
			
			$this->obTemplate->assign('Content',$this->obTemplate->fetch('subscriber/ihtml/elected_Representatives.html'));
			$this->parse();
		}//ef
		
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
		function MyAffiliates($profile_info)
		{
			$this->obTemplate->clear_cache('subscriber/ihtml/my_affiliates.html');			
			$memberName =  $profile_info[0]->first_name." ".$profile_info[0]->last_name;

			$this->obTemplate->assign('Name',$memberName);		
			$this->obTemplate->assign('MyAffiliates', $this->secondary_affiliates);			
			
			if(isset($this->affiliate_content_page_header_view))
				$this->obTemplate->assign('affiliate_content_page_header_view', $this->affiliate_content_page_header_view);
			
			$this->obTemplate->assign('Content',$this->obTemplate->fetch('subscriber/ihtml/my_affiliates.html'));
			$this->parse();
		}//ef
		
		
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
		function AffiliateDetails($profile_info)
		{
			$this->obTemplate->clear_cache('subscriber/ihtml/affiliate_details.html');			
			$memberName =  $profile_info[0]->first_name." ".$profile_info[0]->last_name;

			$this->obTemplate->assign('Name',$memberName);		
			$this->obTemplate->assign('vMsg', $this->vMsg);			
			$this->obTemplate->assign('vAffiliate', $this->vAffiliate);				
			
			$this->obTemplate->assign('affiliateVoteAlert',$this->affiliateVoteAlerts );
			$this->obTemplate->assign('affiliatePetitions',$this->affiliatePetitions );
			$this->obTemplate->assign('affiliateNews',$this->affiliateNews );
			$this->obTemplate->assign('affiliateBulletin',$this->affiliateBulletin );
			
			$this->obTemplate->assign('Content',$this->obTemplate->fetch('subscriber/ihtml/affiliate_details.html'));
			$this->parse();
			
		}//ef
		
		/*
		**************************************************************************************
		*function header
		*function name  : VoteAlerts;
		*function type  : call by value	
		*functionality  : 
		*input			: 
		*output			: 
		*return value   : nothing
		*note			: nothing
		***************************************************************************************
		*/
		
		function AffiliateVoteAlerts()
		{
			$this->obTemplate->clear_cache('subscriber/ihtml/affiliate_vote_alerts.html');						
			$this->obTemplate->assign('vMsg', $this->vMsg);			
			$this->obTemplate->assign('vAffiliate', $this->vAffiliate);			
			$this->obTemplate->assign('affiliateVoteAlert',$this->affiliateVoteAlerts );
			$this->obTemplate->assign('Content',$this->obTemplate->fetch('subscriber/ihtml/affiliate_vote_alerts.html'));
			$this->parse();
		}

		
				/*
		**************************************************************************************
		*function header
		*function name  : AffiliatePetitions;
		*function type  : call by value	
		*functionality  : 
		*input			: 
		*output			: 
		*return value   : nothing
		*note			: nothing
		***************************************************************************************
		*/
		
		function AffiliatePetitions()
		{
			$this->obTemplate->clear_cache('subscriber/ihtml/affiliate_petitions.html');						
			$this->obTemplate->assign('vMsg', $this->vMsg);			
			$this->obTemplate->assign('vAffiliate', $this->vAffiliate);			
			$this->obTemplate->assign('affiliatePetitions',$this->affiliatePetitions );
			$this->obTemplate->assign('Content',$this->obTemplate->fetch('subscriber/ihtml/affiliate_petitions.html'));
			$this->parse();
		}
		
		/*
		**************************************************************************************
		*function header
		*function name  : AffiliateNews;
		*function type  : call by value	
		*functionality  : 
		*input			: 
		*output			: 
		*return value   : nothing
		*note			: nothing
		***************************************************************************************
		*/
		
		function AffiliateNews()
		{
			$this->obTemplate->clear_cache('subscriber/ihtml/affiliate_news.html');			
			$this->obTemplate->assign('vMsg', $this->vMsg);
			$this->obTemplate->assign('vAffiliate', $this->vAffiliate);			
			$this->obTemplate->assign('affiliateVoteAlert',$this->affiliateVoteAlerts );
			$this->obTemplate->assign('Content',$this->obTemplate->fetch('subscriber/ihtml/affiliate_news.html'));
			$this->parse();
		}

		
		/*
		**************************************************************************************
		*function header
		*function name  : AffiliateBulletin;
		*function type  : call by value	
		*functionality  : 
		*input			: 
		*output			: 
		*return value   : nothing
		*note			: nothing
		***************************************************************************************
		*/
		
		function AffiliateBulletin()
		{
			$this->obTemplate->clear_cache('subscriber/ihtml/affiliate_bulletin.html');			
			$this->obTemplate->assign('vMsg', $this->vMsg);
			$this->obTemplate->assign('vAffiliate', $this->vAffiliate);				
			$this->obTemplate->assign('affiliateVoteAlert',$this->affiliateVoteAlerts );
			$this->obTemplate->assign('Content',$this->obTemplate->fetch('subscriber/ihtml/affiliate_bulletin.html'));
			$this->parse();
		}
		
		
		/*
		**************************************************************************************
		*function header
		*function name  : VoteAlerts Detail;
		*function type  : call by value	
		*functionality  : 
		*input			: 
		*output			: 
		*return value   : nothing
		*note			: nothing
		***************************************************************************************
		*/
		function AffiliateVoteAlertsDetail()
		{	
			global $_CONF;
			$this->obTemplate->clear_cache('subscriber/ihtml/affiliate_vote_alerts_detail.html');			
			$this->obTemplate->assign('vMsg', $this->vMsg);
			$this->obTemplate->assign('vAffiliate', $this->vAffiliate);							
			$this->obTemplate->assign('affiliateVoteAlerts',$this->affiliateArticle );
			
			
			$this->obTemplate->assign( 'supportPercentage', $this->supportPercentage);
			$this->obTemplate->assign( 'opposePercentage', $this->opposePercentage);
		
			$this->obTemplate->assign('Content',$this->obTemplate->fetch('subscriber/ihtml/affiliate_vote_alerts_detail.html'));		
			$this->parse();	
		}//ef	
		
				
		/*
		**************************************************************************************
		*function header
		*function name  : VoteAlerts Detail;
		*function type  : call by value	
		*functionality  : 
		*input			: 
		*output			: 
		*return value   : nothing
		*note			: nothing
		***************************************************************************************
		*/
		function AffiliatePetitionsDetail()
		{	
			global $_CONF;
			$this->obTemplate->clear_cache('visitor/ihtml/affiliate_petitions_detail.html');			
			$this->obTemplate->assign('vMsg', $this->vMsg);			
			$this->obTemplate->assign('vAffiliate', $this->vAffiliate);							
			$this->obTemplate->assign('affiliatePetitions',$this->affiliateArticle );
			
			$this->obTemplate->assign( 'oneTimePetitionSignFee', $this->oneTimePetitionSignFee);
			
			$this->obTemplate->assign('voting_details',$this->voting_details );			
			$this->obTemplate->assign( 'supportPercentage', $this->supportPercentage);
			$this->obTemplate->assign( 'opposePercentage', $this->opposePercentage);
			
			$this->obTemplate->assign('signs_count', $this->signs_count);
		
			$this->obTemplate->assign('Content',$this->obTemplate->fetch('visitor/ihtml/affiliate_petitions_detail.html'));		
			$this->parse();	
		}//ef	
		
				
		/*
		**************************************************************************************
		*function header
		*function name  : AffiliatePetitionsDetailSucess;
		*function type  : call by value	
		*functionality  : 
		*input			: 
		*output			: 
		*return value   : nothing
		*note			: nothing
		***************************************************************************************
		*/
		function AffiliatePetitionsDetailSucess()
		{	
			global $_CONF;
			$this->obTemplate->clear_cache('visitor/ihtml/affiliate_petitions_detail_sucess.html');			
			$this->obTemplate->assign('affiliatePetitions',$this->affiliateArticle);
			$this->obTemplate->assign('visitor_id',$this->visitor_id);
			
			$this->obTemplate->assign('signs_count', $this->signs_count);
		
			$this->obTemplate->assign('Content',$this->obTemplate->fetch('visitor/ihtml/affiliate_petitions_detail_sucess.html'));		
			$this->parse();	
		}//ef	
		
		
		/*
		**************************************************************************************
		*function header
		*function name  : signingOptions
		*function type  : call by value	
		*functionality  : 
		*input			: article ID 
		*output			: article Details
		*return value   : nothing
		*note			: nothing
		***************************************************************************************
		*/
		function signingOptions() {
			
			global $_CONF;
			
			
			$this->obTemplate->clear_cache('visitor/ihtml/affiliate_petitions_detail.html');			
			$this->obTemplate->assign( 'articleID', $this->articleID);
			$this->obTemplate->assign( 'oneTimePetitionSignFee', $this->oneTimePetitionSignFee);
			$this->obTemplate->assign('Content',$this->obTemplate->fetch('visitor/ihtml/signing_options.html'));		
			$this->parse();	
		}//ef

		
		/***************************************************************************************
		*Function Header
		*Function Name  : oneTimePaymentStepOne
		*Function Type  : Call by value	
		*Functionality  : .
		*Input			: 
		*Output			: signup page.
		*Return Value   : nothing
		*Note			: nothing
		****************************************************************************************/
		function oneTimePaymentStepOne()
		{
			global $_CONF;
			$this->obTemplate->clear_cache('visitor/ihtml/onetimepayment_information.html');
			
			$this->obTemplate->assign('oneTimePetitionSignFee', $this->one_time_petition_sign_fee);	
			
			$this->obTemplate->assign('sErrorMsg', $this->sErrorMsg);	
			$this->obTemplate->assign('articleID', $this->articleID);			
			$this->obTemplate->assign('oVisitor', $this->oVisitor);	
			$this->obTemplate->assign('Content',$this->obTemplate->fetch('visitor/ihtml/onetimepayment_information.html'));
			$this->parse();
		}//ef

		
		/***************************************************************************************
		*Function Header
		*Function Name  : oneTimePaymentStepTwo
		*Function Type  : Call by value	
		*Functionality  : .
		*Input			: 
		*Output			: signup page.
		*Return Value   : nothing
		*Note			: nothing
		****************************************************************************************/
		function oneTimePaymentStepTwo()
		{
			global $_CONF;
			$this->obTemplate->clear_cache('visitor/ihtml/onetimepayment_paypal.html');
			$this->obTemplate->assign('oVisitor', $this->oVisitor);	
			$this->obTemplate->assign('Content',$this->obTemplate->fetch('visitor/ihtml/onetimepayment_paypal.html'));
			$this->parse();
		}//ef
		
		
		/*
		**************************************************************************************
		*function header
		*function name  : VoteAlerts Detail;
		*function type  : call by value	
		*functionality  : 
		*input			: 
		*output			: 
		*return value   : nothing
		*note			: nothing
		***************************************************************************************
		*/
		function NewsDetail()
		{	
			global $_CONF;	
			$this->obTemplate->clear_cache('subscriber/ihtml/news_detail.html');			
			
			$this->obTemplate->assign('subscribersComment', $this->subscribersComment);						
			$this->obTemplate->assign('vMsg', $this->vMsg);			
			$this->obTemplate->assign('vAffiliate', $this->vAffiliate);										
			$this->obTemplate->assign('affiliateVoteAlerts',$this->affiliateArticle );		
			$this->obTemplate->assign('Content',$this->obTemplate->fetch('subscriber/ihtml/news_detail.html'));		
			$this->parse();	
		}//ef	
				
		
		/*
		**************************************************************************************
		*function header
		*function name  : BulletinsDetail;
		*function type  : call by value	
		*functionality  : 
		*input			: 
		*output			: 
		*return value   : nothing
		*note			: nothing
		***************************************************************************************
		*/
		function BulletinsDetail()
		{	
			$this->obTemplate->clear_cache('subscriber/ihtml/bulletins_detail.html');			
			$this->obTemplate->assign('vMsg', $this->vMsg);
			$this->obTemplate->assign('vAffiliate', $this->vAffiliate);										
			$this->obTemplate->assign('affiliateVoteAlerts',$this->affiliateArticle );
			
			$this->obTemplate->assign('Content',$this->obTemplate->fetch('subscriber/ihtml/bulletins_detail.html'));		
			$this->parse();	
		}//ef	
		
		
		/*
		**************************************************************************************
		*function header
		*function name  : ElectedrepresentativeProfile
		*function type  : call by value	
		*functionality  : 
		*input			: 
		*output			: 
		*return value   : nothing
		*note			: nothing
		***************************************************************************************
		*/
		function ElectedrepresentativeProfile()
		{
			
			$this->obTemplate->clear_cache('subscriber/ihtml/electedrepresentative_dashboard.html');			
			$this->obTemplate->assign('vMsg', $this->vMsg);
			
			$this->obTemplate->assign('ElectedOfficialID', $this->ElectedOfficialID);	

			$this->obTemplate->assign('oElectoralDistrict', $this->oElectoralDistrict);	
			$this->obTemplate->assign('oElectoralDistrictComments', $this->oElectoralDistrictComments);				
			$this->obTemplate->assign('oElectoralDistrictPolls', $this->oElectoralDistrictPolls);				
			
			$this->obTemplate->assign('Content',$this->obTemplate->fetch('subscriber/ihtml/electedrepresentative_dashboard.html'));
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
			$this->obTemplate->clear_cache('subscriber/ihtml/er_article.html');
			$this->obTemplate->assign('oArticle', $this->oElectoralDistrictComments);
			$this->obTemplate->assign('er_id', $this->er_id);
			$this->obTemplate->assign('msg', $this->msg);
			$this->obTemplate->assign('Content',$this->obTemplate->fetch('subscriber/ihtml/er_article.html'));
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
			$this->obTemplate->clear_cache('subscriber/ihtml/er_polls.html');
			$this->obTemplate->assign('oArticle', $this->oElectoralDistrictComments);
			$this->obTemplate->assign('er_id', $this->er_id);
			$this->obTemplate->assign('msg', $this->msg);
			$this->obTemplate->assign('Content',$this->obTemplate->fetch('subscriber/ihtml/er_polls.html'));
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
			$this->obTemplate->clear_cache('subscriber/ihtml/er_report_card.html');
			$this->obTemplate->assign('oArticle', $this->oElectoralDistrictComments);
			$this->obTemplate->assign('Content',$this->obTemplate->fetch('subscriber/ihtml/er_report_card.html'));
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
			
			$this->obTemplate->clear_cache('subscriber/ihtml/er_article_detail.html');
			$this->obTemplate->assign('oArticle', $this->oArticle);
			$this->obTemplate->assign('er_id',$this->er_id);
			
			$this->obTemplate->assign('msg', $this->msg);
			$this->obTemplate->assign('Content',$this->obTemplate->fetch('subscriber/ihtml/er_article_detail.html'));
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
			
			$this->obTemplate->clear_cache('subscriber/ihtml/er_polls_detail.html');
			$this->obTemplate->assign('oArticle', $this->oArticle);
			$this->obTemplate->assign('er_id',$this->er_id);
						
			$this->obTemplate->assign('msg', $this->msg);
			$this->obTemplate->assign('Content',$this->obTemplate->fetch('subscriber/ihtml/er_polls_detail.html'));
			$this->parse();
		}//ef
		
	};//ec
?>