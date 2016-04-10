<?php
	/*
	 * **********************************************************************************************************
		* Author Name 		: Anil Nautiyyal
		* Creation Date 	: 14-May-2007
		* FileName 			: PagesView.php	
		* Called From 		: Admin PagesController and where the Bid details are required.
		* Description 		: PagesView file is used to interact with the front end that displays forms,pages etc 
								using html template files. 
		* Components Used 	: none
		* Tables Accessed 	: none
		* Program Specs 	:  
		* UTP doc 			:
		* Tested By :
	***********************************************************************************************************
	*/
	require_once($_CONF['SitePath'].'fckeditor/fckeditor.php');
	
	/***************************************************************
	*Class Header
	*Class Name    : PagesView
	*Functionality : This class controls how the data is displayed 
					 on the front end using the HTML templates.
	*Note          : PagesView inherits AdminView which containts
				 	 the display functionality for the admin site.
	***************************************************************/
	class PagesView extends AdminView{
		//Pages Array used for population
		var $obPage;
	    var $sErrorMsg;
		
		/***************************************************************************************
		*Function Header
		*Function Name  : PagesView
		*Function Type  : Constructor	
		*Functionality  : Initializes objects of different classes 
		*Input			: nothing
		*Output			: Class objects
		*Return Value   : nothing
		*Note			: nothing
		****************************************************************************************/
		function PagesView(){
			parent::AdminView();
		}
		
		
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
		function enlist(){
			global $_CONF;
			$i=-1;
			$OHeadCell = array();
			$OHeadCell[++$i] = new gCell();
			$OHeadCell[$i]->iType = GRID_ELE_TEXT;
			$OHeadCell[$i]->vProperty['Text']= 'Title';
			$OHeadCell[$i]->vProperty['Sort']= true;
			
			$OHeadCell[++$i] = new gCell();
			$OHeadCell[$i]->iType = GRID_ELE_TEXT;
			$OHeadCell[$i]->vProperty['Text']= 'Meta Keyword';

			$OHeadCell[++$i] = new gCell();
			$OHeadCell[$i]->iType = GRID_ELE_TEXT;
			$OHeadCell[$i]->vProperty['Text']= 'Meta Description';

			$OHeadCell[++$i] = new gCell();
			$OHeadCell[$i]->iType = GRID_ELE_TEXT;
			$OHeadCell[$i]->vProperty['Text']= 'Edit';

			$i=-1;
			$ODataCell[++$i] = new gCell();
			$ODataCell[$i]->iType = GRID_ELE_COL;
			$ODataCell[$i]->vProperty['Col'] = 'title';

			$ODataCell[++$i] = new gCell();
			$ODataCell[$i]->iType = GRID_ELE_COL;
			$ODataCell[$i]->vProperty['Col'] = 'metakeyword';

			$ODataCell[++$i] = new gCell();
			$ODataCell[$i]->iType = GRID_ELE_COL;
			$ODataCell[$i]->vProperty['Col'] = 'metadescription';

			$ODataCell[++$i] = new gCell();
			$ODataCell[$i]->iType = GRID_ELE_IMAGE_LINK;
			$ODataCell[$i]->vProperty['Text']= 'Edit';
			$ODataCell[$i]->vProperty['Image']= $_CONF['ImageUrl'].'/icons/edit.gif';
			$ODataCell[$i]->vProperty['Link']= 'index.php';
			$ODataCell[$i]->vProperty['FixedQueryString']= array('stage'=>'pages','mode'=>'edit');
			$ODataCell[$i]->vProperty['FloatingQueryString']= array('id'=>'page_id');
			$ODataCell[$i]->vProperty['bNewWindow']= false;
			
			$oGrid = new Grid();
			$oGrid->sTitle = "Pages List";
			$oGrid->sDescription = "This list shows the pages that will appear as static content in the main users area of the site. You can change the content using the edit option with the record.";
			$oGrid->bShowSNo = false;
			$oGrid->bShowCheckBoxes = false;
			$oGrid->oHeadRow = $OHeadCell;
			$oGrid->sStage = "pages";
			$oGrid->oDataRow = $ODataCell;
			$oGrid->sIdentifier = 'page_id';
			$oGrid->oTemplate = &$this->obTemplate;
			$oGrid->oData = &$this->obPage;
			$oGrid->vPage = &$this->vPage;
			$this->obTemplate->assign('Content', $oGrid->build());
			$this->parse();
		}
		/*
		**************************************************************************************
		*Function Header
		*Function Name  : edit
		*Function Type  : Call by value	
		*Functionality  : display the deatils of page to edit in fckeditor.
		*Input			: page object
		*Output			: display the deatils of page to edit.
		*Return Value   : nothing
		*Note			: nothing
		***************************************************************************************
		*/
		function edit(){
		
			global $_CONF;
			$this->obTemplate->clear_cache('pages/ihtml/page_edit.html'); 
			$this->obTemplate->assign('PageId', $this->obPage->page_id);
			$this->obTemplate->assign('sErrorMsg', $this->sErrorMsg);
			$this->obTemplate->assign('title', $this->obPage->title);
			$this->obTemplate->assign('metakeyword', $this->obPage->metakeyword);
			$this->obTemplate->assign('metadescription', $this->obPage->metadescription);
			$oFCKeditor = new FCKeditor('content');
			$oFCKeditor->BasePath	= $_CONF['SiteUrl'].'/fckeditor/';
			$oFCKeditor->Value = html_entity_decode($this->obPage->content, ENT_QUOTES);
			$oFCKeditor->Width  = '100%';
			$oFCKeditor->Height = '400';
			$this->obTemplate->assign('TextArea', $oFCKeditor->CreateHtml());
			//echo $oFCKeditor->CreateHtml();
			//die("--");
			$this->obTemplate->assign('Content', $this->obTemplate->fetch('pages/ihtml/page_edit.html'));
			$this->parse();
		}
}//ec
?>