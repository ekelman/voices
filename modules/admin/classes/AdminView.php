<?php
	/********************************************************************************************************
		* Author Name		: Anil Nautiyal
		* Creation Date 	: 27th May-2011
		* FileName 			: AdminView.php
		* Called From 		: included in (index.php ) admin controller files of the modules
		* Description 		: controls the display emails module by parsing the required html file templates
		* Components Used 	: none
		* Tables Accessed 	: none
		* Program Specs 	:
		* UTP doc 			:
		* Tested By 		:
	****************************************************************************************************/

	/****************************************************************************************************
		View.php file is used to inherit the view class
	****************************************************************************************************/

	require_once($_CONF['ModulesPath'].'system/classes/View.php');
	require_once($_CONF['ModulesPath'].'system/classes/Grid.php');	
	/**************************************************************************************************
	*Class Header
	*Class Name: AdminView
	*Functionality: functions to display the admin related forms for login/change password/ parse and left navigation parsing
	*Note         : none
	*************************************************************************************************/

	class AdminView extends View{
		var $sErrorMsg;
		var $isAdminLogin;
		var $SNavigation;

		/*************************************************************************************************
		*Function Header
		*Function Name  : AdminView
		*Function Type  : constructor
		*Functionality  : initializes parent class object,sets the leftnavigation and asigns the valie to variable is adminlogin used to edit the registration details of the member
		*Input			: nothing
		*Output			: nothing
		*Return Value   : nothing
		*Note			: nothing
		*********************************************************************************************/

		function AdminView(){
			parent::View();
			$this->setLeftNavigation();
			$isAdminLogin = $_SESSION['isAdminLogin'];
			$this->obTemplate->assign('isAdminLogin', $isAdminLogin);
		}

		/*************************************************************************************************
		*Function Header
		*Function Name  : setLeftNavigation
		*Function Type  : call by value
		*Functionality  : manages the left navigation on the basis of file included menu.php
		*Input			: nothing
		*Output			: nothing
		*Return Value   : nothing
		*Note			: nothing
		*********************************************************************************************/

		function setLeftNavigation(){
			global $_CONF;
			require_once($_CONF['ModulesPath'].'admin/menu.php');
			$this->obTemplate->assign('Menu', $sAdminMenu);
		}

		/*************************************************************************************************
		*Function Header
		*Function Name  : m_default
		*Function Type  : call by value
		*Functionality  : sets the default welcome apge
		*Input			: nothing
		*Output			: nothing
		*Return Value   : nothing
		*Note			: nothing
		*********************************************************************************************/

		function m_default(){
			$this->obTemplate->assign('Content', $this->obTemplate->fetch('admin/ihtml/admin_welcome.html'));
			$this->parse();
		}

		/*************************************************************************************************
		*Function Header
		*Function Name  : parse
		*Function Type  : call by value
		*Functionality  : parses the html files
		*Input			: nothing
		*Output			: nothing
		*Return Value   : nothing
		*Note			: nothing
		*********************************************************************************************/

		function parse(){
			$this->obTemplate->assign('Message', $this->sErrorMsg);
			$this->obTemplate->assign('Username', $this->Username);
			$this->obTemplate->assign('leftClick', $_SESSION['LeftClick']);
			$this->obTemplate->assign('SNavigation', $this->SNavigation);
			$this->obTemplate->display('admin/ihtml/skeleton.html');
		}

		/*************************************************************************************************
		*Function Header
		*Function Name  : popupParse
		*Function Type  : call by value
		*Functionality  : functions to display popup
		*Input			: nothing
		*Output			: nothing
		*Return Value   : nothing
		*Note			: nothing
		*********************************************************************************************/

		function popupParse(){
			$oAdminController	=	new AdminController();
			htmlspecialchars($this->sErrorMsg);
			$this->obTemplate->assign('Message', $this->sErrorMsg);
			$this->obTemplate->display('admin/ihtml/popupskeleton.html');
		}

		/*************************************************************************************************
		*Function Header
		*Function Name  : showLoginScreen
		*Function Type  : call by value
		*Functionality  : functions to display login screen
		*Input			: nothing
		*Output			: nothing
		*Return Value   : nothing
		*Note			: nothing
		*********************************************************************************************/
		function showLoginScreen(){
			if($_REQUEST['sErrorMsg']!="")
			{
				$this->obTemplate->assign('sErrorMsg', $_REQUEST['sErrorMsg']);
			}
			else
			{
				$this->obTemplate->assign('sErrorMsg', $this->sErrorMsg);
			}
			$this->parse();
		}

		/*************************************************************************************************
		*Function Header
		*Function Name  : changePass
		*Function Type  : call by value
		*Functionality  : functions to display change password screen
		*Input			: nothing
		*Output			: nothing
		*Return Value   : nothing
		*Note			: nothing
		*********************************************************************************************/

		function changePass(){
		$this->obTemplate->assign('sErrorMsg', $this->sErrorMsg);
			$this->obTemplate->assign('Content', $this->obTemplate->fetch('admin/ihtml/change_pass.html'));
			$this->parse();
		}

	

		function config(){
			$this->obTemplate->assign('Content', $this->obTemplate->fetch('admin/ihtml/config.html'));
			$this->parse();
		}

		function viewCountryCodes($codes)
		{
			$this->obTemplate->assign('codes', $codes);
			$this->obTemplate->assign('popupContent', $this->obTemplate->fetch('admin/ihtml/country_codes.html'));
			$this->popupParse();
			//$this->obTemplate->assign('Content', $this->obTemplate->fetch('admin/ihtml/country_codes.html'));
			//$this->parse();
		}

		function EditConfig($oConfig,$msg){
			//echo"<pre>";print_r($oConfig);
			$this->obTemplate->assign('Config',  $oConfig[0]);
			$this->obTemplate->assign('Config1', $oConfig[1]);
			$this->obTemplate->assign('Config2', $oConfig[2]);
			$this->obTemplate->assign('Config3', $oConfig[8]);
			$this->obTemplate->assign('Config4', $oConfig[9]);
			$this->obTemplate->assign('Config5', $oConfig[10]);
			$this->obTemplate->assign('Config6', $oConfig[11]);
			$this->obTemplate->assign('Config7', $oConfig[12]);
			$this->obTemplate->assign('Config8', $oConfig[13]);
			$this->obTemplate->assign('SubmitCaption', 'Update');
			$this->obTemplate->assign('Message', $msg);
			$this->obTemplate->assign('Content', $this->obTemplate->fetch('admin/ihtml/config.html'));
			$this->parse();
		}
		
		//changes
		function petitionDetails()
		{
			
			global $_CONF;
			$i	=	-1;
			// create headings for the data grid
			$OHeadCell = array();

			$OHeadCell[++$i]					= new gCell();
			$OHeadCell[$i]->iType				= GRID_ELE_TEXT;
			$OHeadCell[$i]->vProperty['Text']	= 'Name';
			$OHeadCell[$i]->vProperty['Sort']	= false;
			
			
			$OHeadCell[++$i]					= new gCell();
			$OHeadCell[$i]->iType				= GRID_ELE_TEXT;
			$OHeadCell[$i]->vProperty['Text']	= 'Email';
			$OHeadCell[$i]->vProperty['Sort']	= false;
			
			$OHeadCell[++$i]					= new gCell();
			$OHeadCell[$i]->iType				= GRID_ELE_TEXT;
			$OHeadCell[$i]->vProperty['Text']	= 'Petition Title';
			$OHeadCell[$i]->vProperty['Sort']	= false;
					
			$OHeadCell[++$i]					= new gCell();
			$OHeadCell[$i]->iType				= GRID_ELE_TEXT;
			$OHeadCell[$i]->vProperty['Text']	= 'Type';
			$OHeadCell[$i]->vProperty['Sort']	= false;
			
			$OHeadCell[++$i]					= new gCell();
			$OHeadCell[$i]->iType				= GRID_ELE_TEXT;
			$OHeadCell[$i]->vProperty['Text']	= 'Date';
			$OHeadCell[$i]->vProperty['Sort']	= false;		
			
			/**/
			//data details
			$i	=	-1;
			
			$ODataCell[++$i] 					= new gCell();
			$ODataCell[$i]->iType 				= GRID_ELE_COL;
			$ODataCell[$i]->vProperty['Col'] 	= 'name';
			
			$ODataCell[++$i] 					= new gCell();
			$ODataCell[$i]->iType 				= GRID_ELE_COL;
			$ODataCell[$i]->vProperty['Col'] 	= 'email';
			
			$ODataCell[++$i] 					= 	new gCell();
			$ODataCell[$i]->iType 				= 	GRID_ELE_COL;
			$ODataCell[$i]->vProperty['Col']	= 	'article_title';
		
			$ODataCell[++$i] 					= 	new gCell();
			$ODataCell[$i]->iType 				= 	GRID_ELE_COL;
			$ODataCell[$i]->vProperty['Col']	= 	'member_type';

		
			$ODataCell[++$i] 					= 	new gCell();
			$ODataCell[$i]->iType 				= 	GRID_ELE_COL;
			$ODataCell[$i]->vProperty['Col']	= 	'date_sent';
			
			$oGrid = new Grid();
			$oGrid->sTitle 			=	"List of petition notifications";
			$oGrid->sDescription 	= 	"&nbsp;";
			$oGrid->sStage 			= 	"admin";
			$oGrid->oHeadRow 		= 	$OHeadCell;
			$oGrid->oDataRow		= 	$ODataCell;
			$oGrid->sIdentifier 	= 	'id';
			$oGrid->oTemplate		= 	&$this->obTemplate;

			$oGrid->oData			= &$this->Petition;
			$oGrid->vPage = &$this->vPage;
			
			$this->obTemplate->assign('VPage', $this->vPage['TotalPages']);
			$this->obTemplate->assign('search_field', $this->search_field);
			$this->obTemplate->assign('search_text', $this->search_text);			
			$this->obTemplate->assign('Content', $oGrid->build());
			$this->parse();	
	
		} //ef
		
		
		

	}//ec AdminView
?>