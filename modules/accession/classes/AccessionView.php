<?php
	/**************************************************************************************************
	* Author Name	: Anil Nautiyal
	* Creation Date : 27th May-2011
	* FileName		: AccessionView.php	     
	* Called From	: AccessionController and where the Accession details are required.
	* Description	: AccessionView file is used to interact with the front end that displays                           forms,pages etc using html template files. 
	* Components Used : none
	* Tables Accessed : none
	* Program Specs :  
	* UTP doc :
	* Tested By :
	*************************************************************************************************/
	require_once($_CONF['ModulesPath'].'system/classes/Grid.php');	// this class creates a grid ot display data
	/***************************************************************
	*Class Header
	*Class Name		: AccessionView
	*Functionality	: This clss controls how the data is displayed 
					  on the front end using the HTML templates.
	*Note			: EmployerView inherits UserView contains the 
					  display functionality for the user site.
	***************************************************************/
	class AccessionView extends AdminView
	{		
		var $sErrMsg;
		var $sErrorMsg;
		var $uProfile;

		/***************************************************************************************
		*Function Header
		*Function Name  : AccessionView
		*Function Type  : Constructor	
		*Functionality  : Initializes objects of different classes 
		*Input			: nothing
		*Output			: Class objects
		*Return Value   : nothing
		*Note			: nothing
		****************************************************************************************/
		function AccessionView()
		{
			parent::AdminView();
		}// end of fu
		
		/*************************************************************************************************
		*Function Header
		*Function Name  : managePermissions 
		*Function Type  : call by value
		*Functionality  : functions to assign permissions to different users
		*Input			: nothing
		*Output			: nothing
		*Return Value   : nothing
		*Note			: nothing
		*********************************************************************************************/

		function manage_permissions() {
			/*
			echo "<pre>";
			print_r($this->contentData);
			*/
			//print_r($this->userType);
			$this->obTemplate->assign('sErrorMsg', $this->sErrorMsg);			
			$this->obTemplate->assign('UserType', 		$this->userType);
			$this->obTemplate->assign('UserID', 		$this->userID);
			$this->obTemplate->assign('CapabilityType', $this->capabilityType);
			
			$this->obTemplate->assign('ContentData', 	$this->contentData);
			$this->obTemplate->assign('PermissionData', $this->permissionData);
			
			$this->obTemplate->clear_cache('accession/ihtml/manage_permissions.html');	
			$this->obTemplate->assign('Content', $this->obTemplate->fetch('accession/ihtml/manage_permissions.html'));
			$this->parse();
		}
		
			/*************************************************************************************************
		*Function Header
		*Function Name  : editPermissions 
		*Function Type  : call by value
		*Functionality  : functions to assign permissions to different users
		*Input			: nothing
		*Output			: nothing
		*Return Value   : nothing
		*Note			: nothing
		*********************************************************************************************/

		function edit_permissions() {
			/*
			echo "<pre>";
			print_r($this->contentData);
			*/
			//print_r($this->userType);
			$this->obTemplate->assign('sErrorMsg', $this->sErrorMsg);			
			$this->obTemplate->assign('UserType', 		$this->userType);
			$this->obTemplate->assign('UserID', 		$this->userID);
			$this->obTemplate->assign('CapabilityType', $this->capabilityType);
			
			$this->obTemplate->assign('ContentData', 	$this->contentData);
			$this->obTemplate->assign('PermissionData', $this->permissionData);
			
			$this->obTemplate->clear_cache('accession/ihtml/edit_permissions.html');	
			$this->obTemplate->assign('Content', $this->obTemplate->fetch('accession/ihtml/edit_permissions.html'));
			$this->parse();
		}
		
		
		/*************************************************************************************************
		*Function Header		
		*Function Name  : addNewSubscriberGroup
		*Function Type  : call by value
		*Functionality  : displays the form to change password
		*Input			: nothing
		*Output			: displays the form to change password
		*Return Value   : Boolean
		*Note			: nothing
		*********************************************************************************************/
		function addNewSubscriberGroup()
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
		*Function Name  : enlist
		*Function Type  : Call by value	
		*Functionality  : List all the pages in grid
		*Input			: page object
		*Output			: List all the pages in grid
		*Return Value   : nothing
		*Note			: this function uses grid class to generate a list of all the Employers.
		***************************************************************************************
		*/
		function listUserGroups(){
			
			/*die("--//\\--");*/
			global $_CONF;
			$i=-1;
			$OHeadCell = array();
			$OHeadCell[++$i] = new gCell();
			$OHeadCell[$i]->iType = GRID_ELE_TEXT;
			$OHeadCell[$i]->vProperty['Text']= 'User Group Name';
			$OHeadCell[$i]->vProperty['Sort']= true;
			
			$OHeadCell[++$i] = new gCell();
			$OHeadCell[$i]->iType = GRID_ELE_TEXT;
			$OHeadCell[$i]->vProperty['Text']= 'Promo Code';

			$OHeadCell[++$i] = new gCell();
			$OHeadCell[$i]->iType = GRID_ELE_TEXT;
			$OHeadCell[$i]->vProperty['Text']= 'Subscription Price';

			$OHeadCell[++$i] = new gCell();
			$OHeadCell[$i]->iType = GRID_ELE_TEXT;
			$OHeadCell[$i]->vProperty['Text']= 'View Details';
			
			$OHeadCell[++$i] = new gCell();
			$OHeadCell[$i]->iType = GRID_ELE_TEXT;
			$OHeadCell[$i]->vProperty['Text']= 'Edit';

			//data details
			$i	=	-1;

			$ODataCell[++$i] = new gCell();
			$ODataCell[$i]->iType = GRID_ELE_COL;
			$ODataCell[$i]->vProperty['Col'] = 'name';

			$ODataCell[++$i] = new gCell();
			$ODataCell[$i]->iType = GRID_ELE_COL;
			$ODataCell[$i]->vProperty['Col'] = 'promo_code';

			$ODataCell[++$i] = new gCell();
			$ODataCell[$i]->iType = GRID_ELE_AMOUNT;
			$ODataCell[$i]->vProperty['Col'] = 'subscription_price';

			$ODataCell[++$i] 					= 	new gCell();
			$ODataCell[$i]->iType 				= 	GRID_ELE_IMAGE_LINK;
			$ODataCell[$i]->vProperty['Text']	= 	'View Details';
			$ODataCell[$i]->vProperty['Image']	= 	$_CONF[ImageUrl].'icons/details.gif';
			$ODataCell[$i]->vProperty['Link']	= 	'index.php';
			$ODataCell[$i]->vProperty['FixedQueryString']		= 	array('stage'=>'accession','mode'=>'UserGroupDetails');
			$ODataCell[$i]->vProperty['FloatingQueryString']	= 	array('id'=>'id');
			$ODataCell[$i]->vProperty['bNewWindow']				= 	false;

			$ODataCell[++$i] 					= 	new gCell();
			$ODataCell[$i]->iType 				= 	GRID_ELE_IMAGE_LINK;
			$ODataCell[$i]->vProperty['Text']	= 	"Edit";
			$ODataCell[$i]->vProperty['Image']	= 	$_CONF[ImageUrl].'icons/edit.gif';
			$ODataCell[$i]->vProperty['Link']	= 	'index.php';
			$ODataCell[$i]->vProperty['FixedQueryString']		= 	array('stage'=>'accession','mode'=>'editUserGroup');
			$ODataCell[$i]->vProperty['FloatingQueryString']	= 	array('id'=>'id');
			$ODataCell[$i]->vProperty['bNewWindow']				= 	false;
			
			$oGrid = new Grid();
			$oGrid->sTitle = "User Groups List";
			$oGrid->sDescription = "This list shows the User Groups.";
			$oGrid->bShowSNo = false;
			$oGrid->bShowCheckBoxes = false;
			$oGrid->oHeadRow = $OHeadCell;
			$oGrid->sStage = "accession";
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
		*Function Name  : UserGroupDetails
		*Function Type  : Call by value	
		*Functionality  : Display the details of  User Group.
		*Input			: Loaction,employer array.
		*Output			: Display the details of  User Group.
		*Return Value   : nothing
		*Note			: nothing.
		***************************************************************************************
		*/
		function UserGroupDetails()
		{
			global $_CONF;
			
			$this->obTemplate->assign('oMember',$this->oMember);
			
			//$this->obTemplate->assign('oAffiliate', $this->oAffiliate);
			$this->obTemplate->clear_cache('accession/ihtml/usergroup_details.html');		 
			$this->obTemplate->assign('Content',$this->obTemplate->fetch('accession/ihtml/usergroup_details.html'));
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