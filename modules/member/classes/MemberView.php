<?php
 	/*************************************************************************************
		* Author Name 			: Gagandeep Kaur
		* Creation Date			: 2nd Aug-2007
		* FileName 				: MemberView.php	
		* Called From 			: Admin MemberController and where the Member details are required.
		* Description 			: MemberView file is used to interact with the front end that displays forms,pages etc 
								  using html template files. 
		* Components Used 		: none
		* Tables Accessed 		: none
		* Program Specs 		:  
		* UTP doc 				:
		* Tested By 			:
	*********************************************************************************************/
	

	require_once($_CONF['ModulesPath'].'system/classes/Grid.php');								          // this class creates a grid ot display data
	require_once($_CONF['SitePath'].'fckeditor/fckeditor.php');

	
	/***************************************************************
	*Class Header
	*Class Name    : MemberView
	*Functionality : This class controls how the data is displayed 
					 on the front end using the HTML templates.
	*Note          : MemberView inherits AdminView which containts
				 	 the display functionality for the admin site.
	***************************************************************/

	class MemberView extends AdminView
	{
		//Categories Array used for population
		var $OCategory;
		var $category_for;
		var $OCategoriesSearch;
		var $vPage;
		var $sErrorMsg;
		
	
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
		
		function MemberView(){
			parent::AdminView();
		}//ef
		/***************************************************************************************
		*Function Header
		*Function Name  : ListEmails
		*Function Type  : Call by value	
		*Functionality  : Lists all the emails
		*Input			: nothing
		*Output			: List of all the emails
		*Return Value   : nothing
		*Note			: this function uses grid class to generate a list of all the emails
		****************************************************************************************/

		function ListEmails($oEmails)
		{
			global $_CONF;
			$i	=	-1;
			// create headings for the data grid
			$OHeadCell = array();

			$OHeadCell[++$i]					= new gCell();
			$OHeadCell[$i]->iType				= GRID_ELE_TEXT;
			$OHeadCell[$i]->vProperty['Text']	= 'Subject';
			$OHeadCell[$i]->vProperty['Sort']	= true;

			$OHeadCell[++$i]					= new gCell();
			$OHeadCell[$i]->iType				= GRID_ELE_TEXT;
			$OHeadCell[$i]->vProperty['Text']	= 'Edit Email Contents';

				
			//data details
			$i	=	-1;
			
			$ODataCell[++$i] 					= new gCell();
			$ODataCell[$i]->iType 				= GRID_ELE_COL;
			$ODataCell[$i]->vProperty['Col'] 	= 'subject';
			
			
			$ODataCell[++$i] 					= 	new gCell();
			$ODataCell[$i]->iType 				= 	GRID_ELE_IMAGE_LINK;
			$ODataCell[$i]->vProperty['Text']	= 	'Edit';
			$ODataCell[$i]->vProperty['Image']	= 	$_CONF[ImageUrl].'icons/edit.gif';
			$ODataCell[$i]->vProperty['Link']	= 	'index.php';
			$ODataCell[$i]->vProperty['FixedQueryString']		= 	array('stage'=>'member','mode'=>'ShowEmailDetail');
			$ODataCell[$i]->vProperty['FloatingQueryString']	= 	array('id'=>'email_id');
			$ODataCell[$i]->vProperty['bNewWindow']				= 	false;

			
			$oGrid = new Grid();
			$oGrid->sTitle 			=	"Emails List";
			$oGrid->sDescription 	= 	"List of all Emails";
			$oGrid->sStage 			= 	"member";
			$oGrid->oHeadRow 		= 	$OHeadCell;
			$oGrid->oDataRow		= 	$ODataCell;
			$oGrid->sIdentifier 	= 	'email_id';
			$oGrid->oTemplate		= 	&$this->obTemplate;

			
			$oGrid->oData						= $oEmails;
			$oGrid->bShowCheckBoxes = false;				
			$oGrid->SVerticalOperation	= $SVerticalOperation;
			$oGrid->vPage = &$this->vPage;
			$this->obTemplate->assign('VPage', $this->vPage['TotalPages']);
			$this->obTemplate->assign('Content', $oGrid->build());
			$this->parse();			
		}//ef
		/**************************************************************************************
		*Function Header
		*Function Name  : ShowEmailDetail
		*Function Type  : Call by value	
		*Functionality  : Display the email details.
		*Input			: oEmails array.
		*Output			: Passed the email details to the form
		*Return Value   : nothing
		*Note			: nothing
		***************************************************************************************
		*/
		function ShowEmailDetail($oEmails)
		{
			$this->obTemplate->assign('oEmails',$oEmails);
			$oFCKeditor = new FCKeditor('content');
			 
			$oFCKeditor->BasePath	= '../fckeditor/';
			$oFCKeditor->Value = stripslashes($oEmails->content);
			$oFCKeditor->Width  = '100%' ;
			$oFCKeditor->Height = '400' ;
			$this->obTemplate->assign('TextArea', $oFCKeditor->CreateHtml());
			
			 $this->obTemplate->assign('Content',$this->obTemplate->fetch('member/ihtml/email_detail.html'));
			 $this->parse();
		}//ef
};
?>