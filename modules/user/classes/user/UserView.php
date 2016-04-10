<?php

	/*
	******************************************************************************************************
	* Author Name	: Anil Nautiyal
	* Creation Date : 27th May-2011
	* FileName 				: UserView.php
	* Called From 			: UserController.php
	* Description 			: controls the front end display of the site and provide the basic skelton
	structure to the site
	* Components Used		: none
	* Tables Accessed 		: none
	* Program Specs 		:
	* UTP doc 				:
	* Tested By 			:
	******************************************************************************************************
	*/

	/*
	****************************************************************************************************
	*Class Header
	*Class Name    : UserView
	*Functionality : This class controls how the data is displayed
	on the front end using the HTML templates.
	variables used
	*Note          : UserView inherits View which containts
	the display functionality for the user site using smarty templates.
	*****************************************************************************************************
	*/

class UserView extends View {

	//to display the error message on user panel
	var $SErrorMsg;
	
	//to display the navigation images in common
	var $innerFoot;
	var $innerTab;
	var $topPanel;
	var $setLeftPanel;
	var $topMenu;
	
	//variable defined to check the login
	var $isMemberLogin;
	var $isAdminLogin;
	var $dtCurrent;
	var $isHeaderInner;
	
	/***********************************************************************************************
	*Function Header
	*Function Name  : UserView
	*Function Type  : Constructor
	*Functionality  : Initializes objects of parent class :view
	*Input			: NIL
	*Output			: Class objects
	*Return Value   : NIL
	*Note			: NIL
	************************************************************************************************/
	function UserView(){
		parent::View();
		//SaaS 
		$this->innerFoot = true;
		$this->innerTab = true;	
		$this->topPanel = true;	
		$this->topMenu = false;
		$this->setLeftPanel = false;
		$this->isHeaderInner=true;		
	}

	/***********************************************************************************************
	*Function Header
	*Function Name  : parse
	*Function Type  : call by value
	*Functionality  : uses skeleton.html file to display results, parses the templates according to
	the templates provided in the module and displayes the html results as output
	*Input			: nothing
	*Output			: Class objects
	*Return Value   : nothing
	*Note			: nothing
	*********************************************************************************************/
	function parse()
	{
			global $_CONF;
			$oUserController	=	new UserController();		
			$breadcrumbs	=	$oUserController->breadcrumbs();
			$this->obTemplate->assign('breadcrumbs', $breadcrumbs);
			htmlspecialchars($this->SErrorMsg);		
			$this->obTemplate->assign('SError', $this->SErrorMsg);	
			$this->obTemplate->display('user/ihtml/skeleton.html');			
	}
	
	/***************************************************************************************
	*Function Header
	*Function Name  : wmlparse
	*Function Type  : call by value
	*Functionality  : uses wmlskeleton.html file to display results
	*Input			: nothing
	*Output			: Class objects
	*Return Value   : nothing
	*Note			: nothing
	****************************************************************************************/
	function homePage($sErrorMessage)
	{
		global $_CONF;
		$this->obTemplate->assign('SiteName', $_CONF['SiteName']);
		$this->obTemplate->assign('sErrorMessage', $sErrorMessage);	
		
		
					
		if(isset($this->user_registration_register_view))
		{
			$this->obTemplate->assign('user_registration_register_view',$this->user_registration_register_view);				
		}	
			
		$this->parse();
	}	
	
	/******************************************************************************************
	*Function Header
	*Function Name  : setLeftNavigation
	*Function Type  : call by value
	*Functionality  : set the left navigation details on the pages and highlights the left menu links
	on the basis of condition provided.
	*Input			: nothing
	*Output			: assign template variables for left navigation and to highlight the menu item
	*Return Value   : nothing
	*Note			: nothing
	*******************************************************************************************/
	function setLeftNavigation(){
		global $_CONF;
		//if client is login, then left side menu is displayed
		include($_CONF['ModulesPath'].'members/classes/menu.php');
		include($_CONF['ModulesPath'].'navigation/classes/NavigationConstants.php');
		$this->obTemplate->assign('sMenu', $sMenu);
		$this->leftClick = $_REQUEST[navigation_title];
		$this->obTemplate->assign('leftClick', $this->leftClick);
	}

	/*******************************************************************************************
	*Function Header
	*Function Name  : createGeneralNavigation
	*Function Type  : call by value
	*Functionality  : creates general navigation object dynamically with three fixed links and other links
	based on the dynamic navigation created by the admin
	*Input			: nothing
	*Output			: assign template variable sGeneralNavigationMenu to display the general navigation
	*Return Value   : nothing
	*Note			: nothing
	********************************************************************************************/
	function createGeneralNavigation()
	{
		global $_CONF;
		require_once($_CONF['ModulesPath'].'navigation/classes/NavigationModel.php');
		require_once($_CONF['ModulesPath'].'navigation/classes/NavigationConstants.php');
		$oNavigationModel		=   new NavigationModel();
		if($this->displayBuyerGuide || $this->displayAlternateLinks)
			$IGeneralNavigation		=	$oNavigationModel->getActiveNavigationLinks(NAV_BUYGUIDE_LEFT);
		else
			$IGeneralNavigation		=	$oNavigationModel->getActiveNavigationLinks(NAV_GENERAL);

		if(count($IGeneralNavigation))
		$OGeneralLinks = $oNavigationModel->getNavigationLinksList($IGeneralNavigation);
		$iCount = 0;
		$sGeneralNavigationMenu[$iCount]['Title'] = "Navigation";

		foreach($OGeneralLinks as $oGeneralLinks)
		{
			$sGeneralNavigationMenu[$iCount]['Link'][] = $oGeneralLinks->navigation_link;
			$sGeneralNavigationMenu[$iCount]['Target'][] = $oGeneralLinks->navigation_link_target."&id=".$oGeneralLinks->navigation_link_for."&n_id=".$oGeneralLinks->navigation_link_id."&navigation_title=".trim($oGeneralLinks->navigation_link);
			$icount++;
		}
		
		$this->obTemplate->assign('sGeneralNavigationMenu', $sGeneralNavigationMenu);
	}

	/******************************************************************************************
	*Function Header
	*Function Name  : createFooterNavigation
	*Function Type  : call by value
	*Functionality  : creates footer navigation object dynamically with three fixed links and other links
	based on the dynamic navigation created by the admin
	*Input			: nothing
	*Output			: assign template variable sGeneralNavigationMenu to display the general navigation
	*Return Value   : nothing
	*Note			: nothing
	*******************************************************************************************/
	function createFooterNavigation()
	{
		global $_CONF;
		require_once($_CONF['ModulesPath'].'navigation/classes/NavigationModel.php');
		require_once($_CONF['ModulesPath'].'navigation/classes/NavigationConstants.php');
		$oNavigationModel		=   new NavigationModel();
		$IFooterNavigation		=	$oNavigationModel->getActiveNavigationLinks(NAV_FOOTER);
		
		if(count($IFooterNavigation))
		$OFooterLinks = $oNavigationModel->getNavigationLinksList($IFooterNavigation);
		$iCount = 0;
		$sFooterNavigationMenu[$iCount]['Title'] = "Footer";

		foreach($OFooterLinks as $oFooterLinks)
		{
			$sFooterNavigationMenu[$iCount]['Link'][] = $oFooterLinks->navigation_link;
			$sFooterNavigationMenu[$iCount]['Target'][] = $oFooterLinks->navigation_link_target."&id=".$oFooterLinks->navigation_link_for."&n_id=".$oFooterLinks->navigation_link_id."&navigation_title=".trim($oFooterLinks->navigation_link);
			$icount++;
		}
		
		$this->obTemplate->assign('sFooterNavigationMenu', $sFooterNavigationMenu);
	}
}//ec UserView
?>