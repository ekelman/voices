<?php
/**************************************************************************************************
		* Author Name 		: Gagandeep Kaur
		* Creation Date 	: 18 May-2007
		* FileName		: PagesView.php	     
		* Called From	: PagesController and where the Pages details are required.
		* Description	: PagesView file is used to interact with the front end that displays                           forms,pages etc using html template files. 
		* Components Used : none
		* Tables Accessed : none
		* Program Specs :  
		* UTP doc :
		* Tested By :
	*************************************************************************************************/
/***************************************************************
	*Class Header
	*Class Name		: PagesView
	*Functionality	: This clss controls how the data is displayed 
					  on the front end using the HTML templates.
	*Note			: PagesView inherits UserView contains the 
					  display functionality for the user site.
	***************************************************************/
	class PagesView extends UserView{
		var $request_id;
		var $sErrorMsg;
		var $buyer_id;
		var $info_id;
		
		/*
		************************************************************************************
		*Function Header
		*Function Name  : PagesView
		*Function Type  : Constructor	
		*Functionality  : Initializes objects of different classes 
		*Input			: nothing
		*Output			: Class objects
		*Return Value   : nothing
		*Note			: nothing		*************************************************************************************/
		function PagesView(){
			parent::UserView();
		}
		//to display dynamic pages
		
		/************************************************************************************
		*Function Header
		*Function Name  : showPage
		*Function Type  : Call by value	
		*Functionality  : display the admin managed page according to the page id.
		*Input			: Metakeyword,metadescription,title,content1 is content put by admin.
		*Output			: display the admin managed page according to the page id.
		*Return Value   : nothing
		*Note			: nothing		*************************************************************************************/
		function showPage($oPage) {
			
			/* permissions*/
			## page access allowed false , gen its true
			
			if(!$this->page_access_allowed)	{						
				$this->obTemplate->assign('ViewPage', $this->page_access_allowed_message);							
			}
			
			/* permissions */				
			$this->obTemplate->clear_cache('pages/ihtml/basicpage.html'); 
			$this->obTemplate->assign("MetaKeyword", $oPage->metakeyword);
			$this->obTemplate->assign("MetaDescription", $oPage->metadescription);
			$this->obTemplate->assign("Title", $oPage->title);
			
			if($oPage->page_id == 7)
			{
				$oPage->last_updated = date("F d, Y",strtotime($oPage->last_updated));
				$dynamicInformationi = array($oPage->last_updated);
				$staticInfoi =array('(last_updated)');
				$oPage->content = str_replace($staticInfoi,$dynamicInformationi,$oPage->content);
				$this->obTemplate->assign("last_updated", $oPage->last_updated);
			}			
			$this->obTemplate->assign("Content1", html_entity_decode($oPage->content, ENT_QUOTES));
			
			$this->obTemplate->assign('Content', $this->obTemplate->fetch('pages/ihtml/basicpage.html'));
			$this->parse();
		}//ef
		
		/***************************************************************************************
		*Function Header
		*Function Name  : ContactUs
		*Function Type  : Call by value	
		*Functionality  : display the contact us page.
		*Input			: oLanguage object.
		*Output			: display the contact us page.
		*Return Value   : nothing
		*Note			: nothing
		****************************************************************************************/
		function ContactUs($oLanguage)
		{
			$this->obTemplate->assign('sErrorMessage', $this->sErrorMsg);	 
			$this->obTemplate->assign("oLanguage", $oLanguage);
			$this->obTemplate->assign('Content', $this->obTemplate->fetch('pages/ihtml/contact_us.html'));
			$this->parse();
		}//ef


	/***************************************************************************************
		*Function Header
		*Function Name  : Help
		*Function Type  : Call by value	
		*Functionality  : display the contact us page.
		*Input			: oLanguage object.
		*Output			: display the contact us page.
		*Return Value   : nothing
		*Note			: nothing
		****************************************************************************************/
		function Help($oLanguage)
		{
			$this->obTemplate->assign('sErrorMsg', $this->sErrorMsg);	 
			$this->obTemplate->assign("oLanguage", $oLanguage);
			$this->obTemplate->assign('Content', $this->obTemplate->fetch('pages/ihtml/help.html'));
			$this->parse();
		}//ef

		/*
		***********************************************************************************
		*Function Header
		*Function Name  : AccessDenied
		*Function Type  : Call by value	
		*Functionality  : display the contact us page.
		*Input			: oLanguage object.
		*Output			: display the contact us page.
		*Return Value   : nothing
		*Note			: nothing		*************************************************************************************/
		function AccessDenied()
		{
			$this->obTemplate->assign('sErrorMsg', $this->sErrorMsg); 		
			$this->obTemplate->assign('Content', $this->obTemplate->fetch('pages/ihtml/accessDenied.html'));
			$this->parse();
		}//ef

		
		
		
		/***************************************************************************************
		*Function Header
		*Function Name  : ShowReferrerMsg
		*Function Type  : Call by value	
		*Functionality  : display the referrer section content in detail.
		*Input			: oLanguage object.
		*Output			: display the referrer section content in detail.
		*Return Value   : nothing
		*Note			: nothing
		****************************************************************************************/
	   function ShowReferrerMsg($oLanguage)
		{
		$this->obTemplate->assign('sErrorMsg', $this->sErrorMsg);	 
		$this->obTemplate->assign("oLanguage", $oLanguage);
		$this->obTemplate->assign('Content', $this->obTemplate->fetch('pages/ihtml/find_out_more_referrer.html'));
		$this->parse();
		}//ef
		/***************************************************************************************
		*Function Header
		*Function Name  : ContactUs
		*Function Type  : Call by value	
		*Functionality  : display the employer section content in detail.
		*Input			: oLanguage object.
		*Output			: display the employer section content in detail.
		*Return Value   : nothing
		*Note			: nothing
		****************************************************************************************/
		function ShowEmployerMsg($oLanguage)
		{
			$this->obTemplate->assign('sErrorMsg', $this->sErrorMsg);	 
			$this->obTemplate->assign("oLanguage", $oLanguage);
			$this->obTemplate->assign('Content', $this->obTemplate->fetch('pages/ihtml/find_out_more_employer.html'));
			$this->parse();
		}//ef
		
		/***************************************************************************************
		*Function Header
		*Function Name  : ContactUs
		*Function Type  : Call by value	
		*Functionality  : display the employer section content in detail.
		*Input			: oLanguage object.
		*Output			: display the employer section content in detail.
		*Return Value   : nothing
		*Note			: nothing
		****************************************************************************************/
			function FAQ()
			{				
				$this->obTemplate->assign('Content', $this->obTemplate->fetch('pages/ihtml/faq.html'));
				
				/* permissions*/
					$this->obTemplate->assign('FAQsView', $this->faqs_view);							
				/* permissions*/			
				
				$this->parse();
			}//ef
		}//ec
?>
