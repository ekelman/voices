<?php
	/**************************************************************************************************
	* Author Name	: Paras Shah
	* Creation Date : 17th Jan 2012
	* FileName		: SettingView.php	     
	* Called From	: SettingController and where the Setting details are required.
	* Description	: SettingView file is used to interact with the front end that displays                           forms,pages etc using html template files. 
	* Components Used : none
	* Tables Accessed : none
	* Program Specs :  
	* UTP doc :
	* Tested By :
	*************************************************************************************************/
	require_once($_CONF['ModulesPath'].'system/classes/Grid.php');	// this class creates a grid ot display data
	/***************************************************************
	*Class Header
	*Class Name		: SettingView
	*Functionality	: This clss controls how the data is displayed 
					  on the front end using the HTML templates.
	*Note			: EmployerView inherits UserView contains the 
					  display functionality for the user site.
	***************************************************************/
	class SettingView extends AdminView
	{		
		var $sErrMsg;
		var $sErrorMsg;
		var $uProfile;

		/***************************************************************************************
		*Function Header
		*Function Name  : SettingView
		*Function Type  : Constructor	
		*Functionality  : Initializes objects of different classes 
		*Input			: nothing
		*Output			: Class objects
		*Return Value   : nothing
		*Note			: nothing
		****************************************************************************************/
		function SettingView()
		{
			parent::AdminView();			
		}// end of fu
		
			
		/*
		**************************************************************************************
		*Function Header
		*Function Name  : enlist
		*Function Type  : Call by value	
		*Functionality  : List all the pages in grid
		*Input			: page object
		*Output			: List all the pages in grid
		*Return Value   : nothing
		*Note			: this function uses grid class to generate a list of all the Employers.
		***************************************************************************************
		*/
		function listSettings(){
			
			global $_CONF;
			$i=-1;
			$OHeadCell = array();
			$OHeadCell[++$i] = new gCell();
			$OHeadCell[$i]->iType = GRID_ELE_TEXT;
			$OHeadCell[$i]->vProperty['Text']= 'Setting Name';
			$OHeadCell[$i]->vProperty['Sort']= true;
			
			$OHeadCell[++$i] = new gCell();
			$OHeadCell[$i]->iType = GRID_ELE_TEXT;
			$OHeadCell[$i]->vProperty['Text']= 'Setting  Value [in $]';
			$OHeadCell[$i]->vProperty['Sort']= false;

			$OHeadCell[++$i] = new gCell();
			$OHeadCell[$i]->iType = GRID_ELE_TEXT;			
			$OHeadCell[$i]->vProperty['Text']= 'View Details';
			$OHeadCell[$i]->vProperty['Sort']= false;
			
			$OHeadCell[++$i] = new gCell();
			$OHeadCell[$i]->iType = GRID_ELE_TEXT;
			$OHeadCell[$i]->vProperty['Text']= 'Edit';
			$OHeadCell[$i]->vProperty['Sort']= false;
			
			//data details
			$i	=	-1;

			$ODataCell[++$i] = new gCell();
			$ODataCell[$i]->iType = GRID_ELE_COL;
			$ODataCell[$i]->vProperty['Col'] = 'field_name';

			$ODataCell[++$i] = new gCell();
			$ODataCell[$i]->iType = GRID_ELE_COL;
			$ODataCell[$i]->vProperty['Col'] = 'field_value';

			$ODataCell[++$i] 					= 	new gCell();
			$ODataCell[$i]->iType 				= 	GRID_ELE_IMAGE_LINK;
			$ODataCell[$i]->vProperty['Text']	= 	'View Details';
			$ODataCell[$i]->vProperty['Image']	= 	$_CONF[ImageUrl].'icons/details.gif';
			$ODataCell[$i]->vProperty['Link']	= 	'index.php';
			$ODataCell[$i]->vProperty['FixedQueryString']		= 	array('stage'=>'setting','mode'=>'setting_detail');
			$ODataCell[$i]->vProperty['FloatingQueryString']	= 	array('id'=>'id');
			$ODataCell[$i]->vProperty['bNewWindow']				= 	false;

			$ODataCell[++$i] 					= 	new gCell();
			$ODataCell[$i]->iType 				= 	GRID_ELE_IMAGE_LINK;
			$ODataCell[$i]->vProperty['Text']	= 	"Edit";
			$ODataCell[$i]->vProperty['Image']	= 	$_CONF[ImageUrl].'icons/edit.gif';
			$ODataCell[$i]->vProperty['Link']	= 	'index.php';
			$ODataCell[$i]->vProperty['FixedQueryString']		= 	array('stage'=>'setting','mode'=>'edit_setting');
			$ODataCell[$i]->vProperty['FloatingQueryString']	= 	array('id'=>'id');
			$ODataCell[$i]->vProperty['bNewWindow']				= 	false;
			
			$oGrid = new Grid();
			$oGrid->sTitle = "System Settings List";
			$oGrid->sDescription = "This list shows the System settings.";
			$oGrid->bShowSNo = false;
			$oGrid->bShowCheckBoxes = false;
			$oGrid->oHeadRow = $OHeadCell;
			$oGrid->sStage = "Setting";
			$oGrid->oDataRow = $ODataCell;
			$oGrid->sIdentifier = 'id';
			$oGrid->oTemplate = &$this->obTemplate;
			$oGrid->oData = &$this->obPage;
			$oGrid->vPage = &$this->vPage;
			$this->obTemplate->assign('Content', $oGrid->build());
			$this->parse();
			
		}//ef


				/*
		**************************************************************************************
		*Function Header
		*Function Name  : SettingDetail
		*Function Type  : Call by value	
		*Functionality  : Display the details of  User Group.
		*Input			: Loaction,employer array.
		*Output			: Display the details of  User Group.
		*Return Value   : nothing
		*Note			: nothing.
		***************************************************************************************
		*/
		function settingDetail()
		{
			global $_CONF;			
			$this->obTemplate->assign('oSetting',$this->oSetting);
			$this->obTemplate->clear_cache('setting/ihtml/setting_detail.html');		 
			$this->obTemplate->assign('Content',$this->obTemplate->fetch('setting/ihtml/setting_detail.html'));
			$this->parse();
		}//ef	
		

	/*************************************************************************************************
		*Function Header
		*Function Name  : edit_settings
		*Function Type  : call by value
		*Functionality  : functions to assign permissions to different users
		*Input			: nothing
		*Output			: nothing
		*Return Value   : nothing
		*Note			: nothing
		*********************************************************************************************/

		function editSetting() {
			$this->obTemplate->assign('sErrorMsg', $this->sErrorMsg);						
			$this->obTemplate->assign('oSetting', 	$this->oSetting);
			
			$this->obTemplate->clear_cache('setting/ihtml/edit_setting.html');				
			$this->obTemplate->assign('Content', $this->obTemplate->fetch('setting/ihtml/edit_setting.html'));
			$this->parse();
		}
		
		
		/*************************************************************************************************
		*Function Header		
		*Function Name  : add_new_setting
		*Function Type  : call by value
		*Functionality  : displays the form to change password
		*Input			: nothing
		*Output			: displays the form to change password
		*Return Value   : Boolean
		*Note			: nothing
		*********************************************************************************************/
		function add_new_setting()
		{
			global $_CONF;
			$this->obTemplate->clear_cache('accession/ihtml/add_usergroup.html');		 
			
			$this->obTemplate->assign('sErrorMsg', $this->sErrorMsg);	
			$this->obTemplate->assign('oMember', $this->oMember);				
			
			$this->obTemplate->assign('Content', $this->obTemplate->fetch('accession/ihtml/add_usergroup.html'));
			$this->parse();
		}//ef
		
	
	


		/*
		**************************************************************************************
		*Function Header
		*Function Name  : editUserGroup
		*Function Type  : Call by value	
		*Functionality  : Display the employer details to edit.
		*Input			: category,location,hear mode,security question,employer array.
		*Output			: Display the employer details to edit.
		*Return Value   : nothing
		*Note			: nothing.
		***************************************************************************************
		*/
		function editUserGroup()
	   	{
	      	global $_CONF;
		 
			$this->obTemplate->clear_cache('accession/ihtml/edit_usergroup.html');
			
			//print_r($this->oMember);
			//die();
			
			$this->obTemplate->assign('oMember',$this->oMember);			
			$this->obTemplate->assign('sErrorMsg', $this->sErrorMsg);	
			$this->obTemplate->assign('Content',$this->obTemplate->fetch('accession/ihtml/edit_usergroup.html'));
			$this->parse();
		}//ef		
	};//ec
?>