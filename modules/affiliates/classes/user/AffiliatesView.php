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
	*Class Name		: AffiliatesView
	*Functionality	: This clss controls how the data is displayed 
					  on the front end using the HTML templates.
	*Note			: EmployerView inherits UserView contains the 
					  display functionality for the user site.
	***************************************************************/
	class AffiliatesView extends UserView
	{		
		var $sErrMsg;
		var $sErrorMsg;

		/***************************************************************************************
		*Function Header
		*Function Name  : AffiliatesView		
		*Function Type  : Constructor	
		*Functionality  : Initializes objects of different classes 
		*Input			: nothing
		*Output			: Class objects
		*Return Value   : nothing
		*Note			: nothing
		****************************************************************************************/
		function AffiliatesView()
		{
			parent::UserView();
			
		}// end of function
		
		
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
			$this->obTemplate->clear_cache('affiliates/ihtml/message.html');
			$this->obTemplate->assign('message', $this->message);
			$this->obTemplate->assign('extraVar1', $this->extraVar1);
			$this->obTemplate->assign('Content',$this->obTemplate->fetch('affiliates/ihtml/message.html'));
			$this->parse();
		}//ef
		
		
		/*
		**************************************************************************************
		*function header
		*function name  : AffiliateDashboard
		*function type  : call by value	
		*functionality  : 
		*input			: 
		*output			: 
		*return value   : nothing
		*note			: nothing
		***************************************************************************************
		*/
		function AffiliateDashboard()
		{		

			$this->obTemplate->clear_cache('affiliates/ihtml/affiliate_dashboard.html');			
			$this->obTemplate->assign('vMsg', $this->vMsg);
			$this->obTemplate->assign('vAffiliate', $this->vAffiliate);				
			
			/* Permissions */				
			$this->obTemplate->assign('AffiliateContentNewsView', $this->affiliate_content_news_view);
			$this->obTemplate->assign('AffiliateContentNewsAdd', $this->affiliate_content_news_add);
			$this->obTemplate->assign('AffiliateContentNewsEdit', $this->affiliate_content_news_edit);
			$this->obTemplate->assign('AffiliateContentNewsDelete', $this->affiliate_content_news_delete);
			
			$this->obTemplate->assign('AffiliateContentBillsView', $this->affiliate_content_bills_view);
			$this->obTemplate->assign('AffiliateContentBillsAdd', $this->affiliate_content_bills_add);
			$this->obTemplate->assign('AffiliateContentBillsEdit', $this->affiliate_content_bills_edit);
			$this->obTemplate->assign('AffiliateContentBillsDelete', $this->affiliate_content_bills_delete);
			
			$this->obTemplate->assign('AffiliateContentBulletinsView', $this->affiliate_content_bulletins_view);
			$this->obTemplate->assign('AffiliateContentBulletinsAdd', $this->affiliate_content_bulletins_add);
			$this->obTemplate->assign('AffiliateContentBulletinsEdit', $this->affiliate_content_bulletins_edit);
			$this->obTemplate->assign('AffiliateContentBulletinsDelete', $this->affiliate_content_bulletins_delete);
		
			$this->obTemplate->assign('AffiliateContentPetitionsView', $this->affiliate_content_petitions_view);
			$this->obTemplate->assign('AffiliateContentPetitionsAdd', $this->affiliate_content_petitions_add);
			$this->obTemplate->assign('AffiliateContentPetitionsEdit', $this->affiliate_content_petitions_edit);
			$this->obTemplate->assign('AffiliateContentPetitionsDelete', $this->affiliate_content_petitions_delete);
				
			$this->obTemplate->assign('AffiliateContentPageHeaderView', $this->affiliate_content_page_header_view);
			$this->obTemplate->assign('AffiliateContentPageHeaderModifyOwnContent', $this->affiliate_content_page_header_modify_own_content);
			/** Permissions **/	
				
			$this->obTemplate->assign('affiliateVoteAlert',$this->affiliateVoteAlerts );
			$this->obTemplate->assign('affiliatePetitions',$this->affiliatePetitions );
			
			$this->obTemplate->assign('affiliateNews',$this->affiliateNews );
			$this->obTemplate->assign('affiliateBulletin',$this->affiliateBulletin );
			
			$this->obTemplate->assign('affiliateSponsor',$this->affiliateSponsor );
			
			$this->obTemplate->assign('Content',$this->obTemplate->fetch('affiliates/ihtml/affiliate_dashboard.html'));
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
		
		function VoteAlerts()
		{
			$this->obTemplate->clear_cache('affiliates/ihtml/vote_alerts.html');
			if(empty($this->vMsg))
			{
				$this->vMsg=$_REQUEST['msg'];
			}				
			$this->obTemplate->assign('vMsg', $this->vMsg);
			
			$this->obTemplate->assign('affiliateVoteAlert',$this->affiliateVoteAlerts );
			/* permissions */			
			$this->obTemplate->assign('AffiliateContentBillsView',$this->affiliate_content_bills_view );
			$this->obTemplate->assign('AffiliateContentBillsEdit',$this->affiliate_content_bills_edit );
			$this->obTemplate->assign('AffiliateContentBillsDelete',$this->affiliate_content_bills_delete );			
			/** permissions **/
			
			
			
			$this->obTemplate->assign('Content',$this->obTemplate->fetch('affiliates/ihtml/vote_alerts.html'));
			$this->parse();
		}

		
		/*
		**************************************************************************************
		*function header
		*function name  : Petitions
		*function type  : call by value	
		*functionality  : 
		*input			: 
		*output			: 
		*return value   : nothing
		*note			: nothing
		***************************************************************************************
		*/
		
		function Petitions()
		{
			$this->obTemplate->clear_cache('affiliates/ihtml/petitions.html');
			if(empty($this->vMsg))
			{
				$this->vMsg=$_REQUEST['msg'];
			}	
			$this->obTemplate->assign('vMsg', $this->vMsg);
			
			/* permissions */			
			$this->obTemplate->assign('AffiliateContentPetitionsView',$this->affiliate_content_petitions_view );			
			$this->obTemplate->assign('AffiliateContentPetitionsEdit',$this->affiliate_content_petitions_edit );			
			$this->obTemplate->assign('AffiliateContentPetitionsDelete',$this->affiliate_content_petitions_delete );			
			/** permissions **/
			$this->obTemplate->assign('affiliatePetition',$this->affiliateArticle );
			$this->obTemplate->assign('Content',$this->obTemplate->fetch('affiliates/ihtml/petitions.html'));
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
			$this->obTemplate->clear_cache('affiliates/ihtml/affiliate_news.html');	
			if(empty($this->vMsg))
			{
				$this->vMsg=$_REQUEST['msg'];
			}			
			$this->obTemplate->assign('vMsg', $this->vMsg);
			
			/* permissions */			
			$this->obTemplate->assign('AffiliateContentNewsView',$this->affiliate_content_news_view );			
			$this->obTemplate->assign('AffiliateContentNewsEdit',$this->affiliate_content_news_edit );			
			$this->obTemplate->assign('AffiliateContentNewsDelete',$this->affiliate_content_news_delete );			
			/** permissions **/
			
			$this->obTemplate->assign('affiliateVoteAlert',$this->affiliateVoteAlerts );
			$this->obTemplate->assign('Content',$this->obTemplate->fetch('affiliates/ihtml/affiliate_news.html'));
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
			$this->obTemplate->assign('AffiliateContentBulletinsView',$this->affiliate_content_bulletins_view );
			$this->obTemplate->assign('AffiliateContentBulletinsEdit',$this->affiliate_content_bulletins_edit );
			$this->obTemplate->assign('AffiliateContentBulletinsDelete',$this->affiliate_content_bulletins_delete );
		
			$this->obTemplate->clear_cache('affiliates/ihtml/affiliate_bulletin.html');
			if(empty($this->vMsg))
			{
				$this->vMsg=$_REQUEST['msg'];
			}				
			$this->obTemplate->assign('vMsg', $this->vMsg);
			
			$this->obTemplate->assign('affiliateVoteAlert',$this->affiliateVoteAlerts );
			$this->obTemplate->assign('Content',$this->obTemplate->fetch('affiliates/ihtml/affiliate_bulletin.html'));
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
		function VoteAlertsDetail()
		{	
			global $_CONF;
			$this->obTemplate->clear_cache('affiliates/ihtml/vote_alerts_detail.html');			
			$this->obTemplate->assign('vMsg', $this->vMsg);
			
			$this->obTemplate->assign('affiliateVoteAlerts',$this->affiliateArticle );
			
			
			$this->obTemplate->assign( 'supportPercentage', $this->supportPercentage);
			$this->obTemplate->assign( 'opposePercentage', $this->opposePercentage);
		
			$this->obTemplate->assign('Content',$this->obTemplate->fetch('affiliates/ihtml/vote_alerts_detail.html'));		
			$this->parse();	
		}//ef	
		
		
		/*
		**************************************************************************************
		*function header
		*function name  : Petitions Detail;
		*function type  : call by value	
		*functionality  : 
		*input			: 
		*output			: 
		*return value   : nothing
		*note			: nothing
		***************************************************************************************
		*/
		function PetitionsDetail()
		{	
			global $_CONF;
			$this->obTemplate->clear_cache('affiliates/ihtml/petitions_detail.html');			
			$this->obTemplate->assign('vMsg', $this->vMsg);
			
			$this->obTemplate->assign('affiliatePetitions',$this->affiliateArticle );
			
			$this->obTemplate->assign('supportPercentage', $this->supportPercentage);
			$this->obTemplate->assign('opposePercentage', $this->opposePercentage);
			
			$this->obTemplate->assign('siteurl', $_CONF['SiteUrl']);
			$this->obTemplate->assign('signs_count', $this->signs_count);
			
			//die("sdsadasd");
			$this->obTemplate->assign('Content',$this->obTemplate->fetch('affiliates/ihtml/petitions_detail.html'));		
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
			$this->obTemplate->clear_cache('affiliates/ihtml/news_detail.html');			
			$this->obTemplate->assign('vMsg', $this->vMsg);
			$this->obTemplate->assign('affiliateVoteAlerts',$this->affiliateArticle );

			/* Permissions */				
			$this->obTemplate->assign('AffiliateContentNewsView', $this->affiliate_content_news_view);			
			$this->obTemplate->assign('AffiliateContentNewsEdit', $this->affiliate_content_news_edit);
			$this->obTemplate->assign('AffiliateContentNewsDelete', $this->affiliate_content_news_delete);
			/* Permissions */				
			

			$this->obTemplate->assign('oSubscribersComment', $this->oSubscribersComment);									   
			$this->obTemplate->assign('Content',$this->obTemplate->fetch('affiliates/ihtml/news_detail.html'));		
			$this->parse();	
		}//ef	
				
		/*
		**************************************************************************************
		*function header
		*author			: Vikas Rana
		*function name  : NewsEdit;
		*function type  : call by value	
		*functionality  : 
		*input			: 
		*output			: 
		*return value   : nothing
		*note			: nothing
		***************************************************************************************
		*/
		function NewsEdit()
		{	
			$this->obTemplate->clear_cache('affiliates/ihtml/news_edit.html');			
			$this->obTemplate->assign('vMsg', $this->vMsg);
			
			$this->obTemplate->assign('affiliateArticle',$this->affiliateArticle[0] );
			//echo "<pre>";print_r($this->affiliateArticle);
			$this->obTemplate->assign('Content',$this->obTemplate->fetch('affiliates/ihtml/news_edit.html'));		
			$this->parse();	
		}//ef


		/*
		**************************************************************************************
		*function header
		*author			: Paras Shah
		*function name  : SponsorEdit;
		*function type  : call by value	
		*functionality  : 
		*input			: 
		*output			: 
		*return value   : nothing
		*note			: nothing
		***************************************************************************************
		*/
		function SponsorEdit()
		{	
			$this->obTemplate->clear_cache('affiliates/ihtml/sponsor_edit.html');			
			$this->obTemplate->assign('vMsg', $this->vMsg);
			$this->obTemplate->assign('affiliateSponsor',$this->sponsorDetail[0] );
			$this->obTemplate->assign('Content',$this->obTemplate->fetch('affiliates/ihtml/sponsor_edit.html'));		
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
			$this->obTemplate->clear_cache('affiliates/ihtml/bulletins_detail.html');			
			$this->obTemplate->assign('vMsg', $this->vMsg);
			
			/* Permissions */				
			$this->obTemplate->assign('AffiliateContentBulletinsView', $this->affiliate_content_bulletins_view);
			$this->obTemplate->assign('AffiliateContentBulletinsEdit', $this->affiliate_content_bulletins_edit);
			$this->obTemplate->assign('AffiliateContentBulletinsDelete', $this->affiliate_content_bulletins_delete);
			/* Permissions */	
			
			$this->obTemplate->assign('affiliateVoteAlerts',$this->affiliateArticle );
			$this->obTemplate->assign('oSubscribersComment', $this->oSubscribersComment);									   			
			$this->obTemplate->assign('Content',$this->obTemplate->fetch('affiliates/ihtml/bulletins_detail.html'));		
			$this->parse();	
		}//ef	
		
		
		/*
		**************************************************************************************
		*function header
		*function name  : AffiliateDetail
		*function type  : call by value	
		*functionality  : 
		*input			: 
		*output			: 
		*return value   : nothing
		*note			: nothing
		***************************************************************************************
		*/
		function AffiliateDetail()
		{
			$this->obTemplate->clear_cache('affiliates/ihtml/affiliate_detail.html');			
			$this->obTemplate->assign('vMsg', $this->vMsg);
			$this->obTemplate->assign('vAffiliate', $this->vAffiliate);				
			
			
			if(isset($this->affiliate_content_bills_add))
				$this->obTemplate->assign('affiliate_content_bills_add', $this->affiliate_content_bills_add);
						
			if(isset($this->affiliate_content_bills_add))
				$this->obTemplate->assign('affiliate_content_bills_add', $this->affiliate_content_bills_add);
			
			if(isset($this->affiliate_content_page_header_view))
				$this->obTemplate->assign('affiliate_content_page_header_view', $this->affiliate_content_page_header_view);
				
			if(isset($this->affiliate_content_page_header_add))
				$this->obTemplate->assign('affiliate_content_page_header_add', $this->affiliate_content_page_header_add);

			if(isset($this->affiliate_content_page_header_modify_own_content))
				$this->obTemplate->assign('affiliate_content_page_header_modify_own_content', $this->affiliate_content_page_header_modify_own_content);
				
			$this->obTemplate->assign('Content',$this->obTemplate->fetch('affiliates/ihtml/affiliate_dashboard.html'));
				
			$this->parse();
		}//ef	
	
		
		
		/*
		**************************************************************************************
		*function header
		*function name  : AffiliateProfile
		*function type  : call by value	
		*functionality  : 
		*input			: 
		*output			: 
		*return value   : nothing
		*note			: nothing
		***************************************************************************************
		*/
		function AffiliateProfile()
		{
			global $_CONF;
			
			$this->obTemplate->clear_cache('affiliates/ihtml/affiliate_profile.html');
			
			$this->obTemplate->assign('siteurl', $_CONF['SiteUrl']);
			
			$this->obTemplate->assign('vAffiliate', $this->vAffiliate);
			$this->obTemplate->assign('vMsg', $this->vMsg);			
			
			$this->obTemplate->assign('AffiliateContentPageHeaderView', $this->affiliate_content_page_header_view);
			
			$this->obTemplate->assign('Content',$this->obTemplate->fetch('affiliates/ihtml/affiliate_profile.html'));			
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
			
			global $_CONF;
			
			$this->obTemplate->clear_cache('affiliates/ihtml/edit_affiliate_profile.html');
			$this->obTemplate->assign('vAffiliate', $this->vAffiliate);
			
			
			$this->obTemplate->assign('siteurl', $_CONF['SiteUrl']);
			
			$this->obTemplate->assign('vMsg', $this->vMsg);
			
			/* permission */			
			$this->obTemplate->assign('AffiliateContentPageHeaderView', $this->affiliate_content_page_header_view);
			$this->obTemplate->assign('AffiliateContentPageHeaderModifyOwnContent', $this->affiliate_content_page_header_modify_own_content);
			/* permission */
			
			if(isset($this->affiliate_content_bills_add))
				$this->obTemplate->assign('affiliate_content_bills_add', $this->affiliate_content_bills_add);
						
			if(isset($this->affiliate_content_bills_add))
				$this->obTemplate->assign('affiliate_content_bills_add', $this->affiliate_content_bills_add);
			
			if(isset($this->affiliate_content_page_header_view))
				$this->obTemplate->assign('affiliate_content_page_header_view', $this->affiliate_content_page_header_view);
				
				
			if(isset($this->affiliate_content_page_header_add))
				$this->obTemplate->assign('affiliate_content_page_header_add', $this->affiliate_content_page_header_add);

			if(isset($this->affiliate_content_page_header_modify_own_content))
				$this->obTemplate->assign('affiliate_content_page_header_modify_own_content', $this->affiliate_content_page_header_modify_own_content);
			
			
			$this->obTemplate->assign('Content',$this->obTemplate->fetch('affiliates/ihtml/edit_affiliate_profile.html'));			
			$this->parse();
		}//ef		


		/*
		**************************************************************************************
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
			//die("sadasd");
			$this->obTemplate->clear_cache('affiliates/ihtml/submit_new_content.html');
			$this->obTemplate->assign('vAffiliate', $this->vAffiliate);
			$this->obTemplate->assign('vMsg', $this->vMsg);
			$this->obTemplate->assign('affiliate_id', $this->affiliate_id);
			
			/* Permissions */				
			$this->obTemplate->assign('AffiliateContentNewsAdd', $this->affiliate_content_news_add);
			$this->obTemplate->assign('AffiliateContentBillsAdd', $this->affiliate_content_bills_add);
			$this->obTemplate->assign('AffiliateContentBulletinsAdd', $this->affiliate_content_bulletins_add);
			/** Permissions **/	

			$this->obTemplate->assign('StateList',$this->stateList);						
			$this->obTemplate->assign('Content',$this->obTemplate->fetch('affiliates/ihtml/submit_new_content.html'));			

			$this->parse();
		}//ef		

		

		/*
		**************************************************************************************
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
		function AddNewSponsors()
		{		
			$this->obTemplate->clear_cache('affiliates/ihtml/add_new_sponsors.html');
			$this->obTemplate->assign('vAffiliate', $this->vAffiliate);
			$this->obTemplate->assign('vMsg', $this->vMsg);
			$this->obTemplate->assign('affiliate_id', $this->affiliate_id);			
			$this->obTemplate->assign('Content',$this->obTemplate->fetch('affiliates/ihtml/add_new_sponsors.html'));			
			$this->parse();
		}//ef		

		
		/*	************************************************************************************
		*function header
		*function name  : ListAffiliates
		*function type  : call by value	
		*functionality  : 
		*input			: 
		*output			: 
		*return value   : nothing
		*note			: nothing		************************************************************************************
		*/
		function ListAffiliates()
		{
			$this->obTemplate->clear_cache('affiliates/ihtml/list_affiliates.html');			
			
			$this->obTemplate->assign('AffiliateContentPageHeaderView', $this->affiliate_content_page_header_view);			
			
			$this->obTemplate->assign('oAffiliate', $this->oAffiliate);			
			$this->obTemplate->assign('Content',$this->obTemplate->fetch('affiliates/ihtml/list_affiliates.html'));
			$this->parse();
		}//ef
		
		//function by Monika Bansal on 18-07-2012
		
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
			$this->obTemplate->clear_cache('affiliates/ihtml/my_affiliates.html');			
			$memberName =  $profile_info->first_name." ".$profile_info->last_name;
			$this->obTemplate->assign('Name',$memberName);		
			$this->obTemplate->assign('MyAffiliates', $this->myAffiliates);
			$this->obTemplate->assign('reqAffiliates', $this->reqAffiliates);			
			
			if(isset($this->affiliate_content_page_header_view))
				$this->obTemplate->assign('affiliate_content_page_header_view', $this->affiliate_content_page_header_view);
			
			$this->obTemplate->assign('Content',$this->obTemplate->fetch('affiliates/ihtml/my_affiliates.html'));
			$this->parse();
		}//ef

        /*
		**************************************************************************************
		*Function Header
		*Function Name  : AddAffiliates
		*Function Type  : Call by value	
		*Functionality  : Display the affiliate details to edit.
		*Input			: 
		*Output			: Display the affiliate details to edit.
		*Return Value   : nothing
		*Note			: nothing.
		***************************************************************************************
		*/
		function AddAffiliatesMain()
		{
			global $_CONF;
			$this->obTemplate->clear_cache('affiliates/ihtml/add_affiliate_main.html');		 
			
			$this->obTemplate->assign('sErrorMsg', $this->sErrorMsg);	
			$this->obTemplate->assign('oAffiliate', $this->oAffiliate);				
			
			$this->obTemplate->assign('Content',$this->obTemplate->fetch('affiliates/ihtml/add_affiliate_main.html'));
			$this->parse();
		}//ef
		
		/*
		**************************************************************************************
		*Function Header
		*Function Name  : AddAffiliates
		*Function Type  : Call by value	
		*Functionality  : Display the affiliate details to edit.
		*Input			: 
		*Output			: Display the affiliate details to edit.
		*Return Value   : nothing
		*Note			: nothing.
		***************************************************************************************
		*/
		function AddAffiliatesMainFinal()
		{
			global $_CONF;
			$this->obTemplate->clear_cache('affiliates/ihtml/add_affiliate_main_final.html');		 
			
			$this->obTemplate->assign('sErrorMsg', $this->sErrorMsg);
			$this->obTemplate->assign('oAffiliate', $this->oAffiliate);				
			
			$this->obTemplate->assign('Content',$this->obTemplate->fetch('affiliates/ihtml/add_affiliate_main_final.html'));
			$this->parse();
		}//ef
		
	};//ec
?>