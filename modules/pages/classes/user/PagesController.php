<?
	/*
	**********************************************************************************************************
		* Author Name	: Anil Nautiyal
		* Creation Date : 27th May-2011
		* FileName			: PagesController.php	
		* Called From 		: index.php file.
		* Description		: PagesController file is used to control the PagesModel and PagesView                          files,it passes control according to the operation required.
		* Components Used 	: Validation for server side validations
		* Tables Accessed 	: none
		* Program Specs 	:     
		* UTP doc 			:
		* Tested By 		:  
	***********************************************************************************************************
	*/
	require_once($_CONF['ModulesPath'].'system/classes/dataclasses.php');	//contains some common data classes 
	require_once($_CONF['ModulesPath']."pages/classes/PagesModel.php");
	require_once($_CONF['ModulesPath']."accession/classes/AccessionModel.php");	
	require_once($_CONF['ModulesPath'].'system/functions.php');		//contains some common functions 
	
	/***************************************************************
	*Class Header
	*Class Name    : PagesController
	*Functionality : This class controls PagesModel and PagesView
					 to handle Pagess on the site.
	*Note          : PagesController inherits UserController that 
 	                contains functions for the user site.
	***************************************************************/
	class PagesController extends UserController{
		var $oPagesModel;
		var $oPagesView;
		/***************************************************************************************
		*Function Header
		*Function Name  : PagesController
		*Function Type  : Constructor	
		*Functionality  : Initializes objects of different classes 
		*Input			: nothing
		*Output			: Class objects
		*Return Value   : nothing
		*Note			: nothing
		****************************************************************************************/
		function PagesController(){
			parent::UserController();
			$this->oPagesModel = new PagesModel();
			$this->oPagesView  = new PagesView();
			$this->aModel	   = new AccessionModel();			
		} //ef
		
		/******************************************************************************************
		*Function Header
		*Function Name  : showpage
		*Function Type  : Call by value	
		*Functionality  : Displays the page corresponding to page id.
		*Input			: page id.
		*Output			: Displays the page corresponding to page id.
		*Return Value   : nothing
		*Note			: nothing
		*******************************************************************************************/
		function showpage($id=1)
		{	
			
			if(isset($_REQUEST['pid']))
			{
				$id = $_REQUEST['pid'];
			}
			 else
			 {
			 	if (isset($_SESSION['pid']))
				 {
					 $id = $_SESSION["pid"];
				}
			}
			if(1 == $id){
				define('HOME_PAGE', 1);
			}
			//navigation images
			switch($id)
			{
				case 21:
					$this->oPagesView->SNavigationImage = "img_aboutus.gif";
					break;
				case 31:
					$this->oPagesView->SNavigationImage = "img_confidential.gif";
					break;
			}
			$OPage = $this->oPagesModel->getPage(array($id));
			$this->oPagesView->showPage(&$OPage[0]);
		}//ef
		/******************************************************************************************
		*Function Header
		*Function Name  : ContactUs
		*Function Type  : Call by value	
		*Functionality  : Displays the contact us page.
		*Input			: page id.
		*Output			: Displays the contact us page.
		*Return Value   : nothing
		*Note			: nothing
		*******************************************************************************************/
		function ContactUs() {
			if($_REQUEST['msg'] !='')
			{
				$this->oPagesView->sErrorMsg =$_REQUEST['msg'];
			}
			//$oLanguage=$this->oPagesModel->GetWorkMsg(5);
			//$this->oPagesView->ContactUs($oLanguage);
			$this->oPagesView->ContactUs();
		}//ef

		
		/******************************************************************************************
		*Function Header
		*Function Name  : AboutUs
		*Function Type  : Call by value	
		*Functionality  : Displays the contact us page.
		*Input			: page id.
		*Output			: Displays the contact us page.
		*Return Value   : nothing
		*Note			: nothing
		*******************************************************************************************/
		function AboutUs() {
		
			/* permissions */						
			$this->oPagesView->about_us_overview_view = false; 							
			
			$this->oPagesView->page_access_allowed = true; 										
			// requirement by client:: if session exist than check permission otherwise create a visitor user						
			
			if(!empty($_SESSION["member_type"]))
			{
				if( !$this->aModel->checkSpecificAccessPermission("About Us","Overview","View") )
				{	
					$this->oPagesView->page_access_allowed = false; 													
					$this->oPagesView->page_access_allowed_message = "Not Authorized to view About us page."; 					
				}
			}	
			/** permissions **/
		
			$_PAGE = $this->oPagesModel->getPageContent(1);
			$this->oPagesView->showPage($_PAGE[0]);
		}//ef

		
		/******************************************************************************************
		*Function Header
		*Function Name  : PrivacyPolicy
		*******************************************************************************************/
		function PrivacyPolicy() {
			$_PAGE = $this->oPagesModel->getPageContent(2);//Privacy Policy Page ID here...(2)
			$this->oPagesView->showPage($_PAGE[0]);
		}//ef

		
		/******************************************************************************************
		*Function Header
		*Function Name  : EndUserAgreement
		*******************************************************************************************/
		function EndUserAgreement() {
			
			$_PAGE = $this->oPagesModel->getPageContent(22);
			$this->oPagesView->showPage($_PAGE[0]);
		}//ef
		
		/******************************************************************************************
		*Function Header
		*Function Name  : StatenetAgreement
		*******************************************************************************************/
		function StatenetAgreement() {
			
			$_PAGE = $this->oPagesModel->getPageContent(23);
			$this->oPagesView->showPage($_PAGE[0]);
		}//ef
		
	
	
		/******************************************************************************************
		*Function Header
		*Function Name  : BillResources
		*******************************************************************************************/
		function Faq() {
				
				/* permissions */						
				$this->oView->faqs_view = false; 							
				
				$this->oPagesView->page_access_allowed = true; 										
				
				// requirement by client:: if session exist than check permission otherwise create a visitor user						
				if(!empty($_SESSION["member_type"]))
				{							
					if(!$this->aModel->checkSpecificAccessPermission("FAQs",'',"View") )
					{
					
						$this->oPagesView->page_access_allowed = false; 	
						$this->oPagesView->page_access_allowed_message = "Not Authorized to view FAQs page."; 	
					}
				}	
				/** permissions **/

			$_PAGE = $this->oPagesModel->getPageContent(19);//BillResources Page ID here...(2)
			$this->oPagesView->showPage($_PAGE[0]);
		}//ef
		/******************************************************************************************
		*Function Header
		*Function Name  : BillResources
		*******************************************************************************************/
		function ContactUs_new() {
			$_PAGE = $this->oPagesModel->getPageContent(20);//BillResources Page ID here...(2)
			$this->oPagesView->showPage($_PAGE[0]);
		}//ef
		
		
		/******************************************************************************************
		*Function Header
		*Function Name  : BillResources
		*******************************************************************************************/
		function TermsAndConditions() {
			$_PAGE = $this->oPagesModel->getPageContent(21);//BillResources Page ID here...(2)
			$this->oPagesView->showPage($_PAGE[0]);
		}//ef
	/*	****************************************************************************************
	*Function Header
	*Function Name  : Help
	*Function Type  : Call by value	
	*Functionality  : Displays the contact us page.
	*Input			: page id.
	*Output			: Displays the contact us page.
	*Return Value   : nothing
	*Note			: nothing	*****************************************************************************************/
	function Help()
	{
		if($_REQUEST['msg'] !='')
		{
			$this->oPagesView->sErrorMsg =$_REQUEST['msg'];
		}
		$oLanguage=$this->oPagesModel->GetWorkMsg(32);
		$this->oPagesView->Help($oLanguage);
	}//ef
	
	/*	****************************************************************************************
	*Function Header
	*Function Name  : Access Denied
	*Function Type  : Call by value	
	*Functionality  : Displays this page when a certain page request can not be full filled.
	*Input			: page id.
	*Output			: Displays the access denied page.
	*Return Value   : nothing
	*Note			: nothing	*****************************************************************************************/
	function AccessDenied()
	{
		if($_REQUEST['msg'] !='')
		{
			$this->oPagesView->sErrorMsg =$_REQUEST['msg'];
		}
		$this->oPagesView->AccessDenied();
	}//ef

	/*	****************************************************************************************
	*Function Header
	*Function Name  : SubmitContact
	*Function Type  : Call by value	
	*Functionality  : Submit the contact from contact us page.
	*Input			: contact details.
	*Output			: Submit teh contact in database.
	*Return Value   : nothing
	*Note			: nothing	*****************************************************************************************/  
	function SubmitContact()
	{
		global $_CONF;
		$oEmail=$this->oPagesModel->GetEmail(6);
		
		$oContact->name=htmlentities(trim($_POST['name']));
		$oContact->email=htmlentities(trim($_POST['email']));
		$oContact->phone_no='';//htmlentities(trim($_POST['phone_no']));
		$oContact->message=htmlentities(trim($_POST['message']));
		
		//$rs= $this->oPagesModel->SubmitContact($oContact);
		if(@$_REQUEST['code'] && @strtolower($_REQUEST['code']) == strtolower($_SESSION['random_number']))
		{
			$email	=	$_CONF['VinceEmailId'];
			$sName  =	$oContact->name;
			$sEmail	=	$oContact->email;
			$sphone	=	$oContact->phone_no;
			$smessage  =	$oContact->message;
			$dynamicInfo = array($sName,$sEmail,$sphone,$smessage);
								 $staticInfo =array('(sName)','(sEmail)','(sphone)','(smessage)');
								 $body=$oEmail[0]->content;
								 $newbody = str_replace($staticInfo,$dynamicInfo,$body);
								 $text		=	CreateMailMessage($newbody);
			$subject= $oEmail[0]->subject;
			$result	=	SendMail($text[body], $subject, array($email),"admin@bohire.com");
			if(!$result){
				$err = "There is some technical problem in sending registration email";
			}
			$err="Your Contact information has been submitted successfully.";
		}
		else
		{
			$err="Wrong captch code entered.";
		}
		
		header("Location:".$_CONF['SiteUrl']."/index.php?stage=pages&mode=ContactUs&msg=$err");
	}//ef
	
	
	   /******************************************************************************************
		*Function Header
		*Function Name  : ShowReferrerMsg
		*Function Type  : Call by value	
		*Functionality  : To get  admin managed content detail,that is shown by limited content on home page.
		*Input			: nothing.
		*Output			: admin managed content detail,that is shown by limited content on home page in the referrer section.
		*Return Value   : nothing
		*Note			: nothing
		*******************************************************************************************/  
		 function ShowReferrerMsg()
		 {
		 $oLanguage=$this->oPagesModel->GetHomeMsg(9);
		 $this->oPagesView->ShowReferrerMsg($oLanguage);
		 }//ef
	  /******************************************************************************************
		*Function Header
		*Function Name  : ShowEmployerMsg
		*Function Type  : Call by value	
		*Functionality  : To get  admin managed content detail,that is shown by limited content on home page.
		*Input			: contact details.
		*Output			: admin managed content detail,that is shown by limited content on home page in the employer section.
		*Return Value   : nothing
		*Note			: nothing
		*******************************************************************************************/  
		  function ShowEmployerMsg()
		 {
		 $oLanguage=$this->oPagesModel->GetHomeMsg(10);
		 $this->oPagesView->ShowEmployerMsg($oLanguage);
		 }//ef
	   /******************************************************************************************
		*Function Header
		*Function Name  : FAQ
		*Function Type  : Call by value	
		*Functionality  : Displays the FAQ page.
		*Input			: nothing.
		*Output			: Displays the FAQ page.
		*Return Value   : nothing
		*Note			: nothing
		*******************************************************************************************/  
		 function FAQ_old()
		 {
		 		 $this->oPagesView->FAQ();
		 }//ef
}//ec
?>