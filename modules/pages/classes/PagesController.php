<?php
	/*
	 * **********************************************************************************************************
		* Author Name 		: Anil Nautiyyal
		* Creation Date 	: 16-August-2011
		* FileName 			: PagesController.php	
		* Called From 		: Admin's index.php file.
		* Description 		: PagesController file is used to control the PagesModel and PagesView files,it
							  passes control according to the operation required.
		* Components Used 	: Validation for server side validations
		* Tables Accessed 	: none
		* Program Specs 	: 
		* UTP doc 			:
		* Tested By 		:
	***********************************************************************************************************
	*/	
	require_once($_CONF['ModulesPath'].'system/classes/dataclasses.php');	//contains some common data classes 
	require_once($_CONF['ModulesPath'].'pages/classes/PagesModel.php');
	require_once($_CONF['ModulesPath'].'pages/classes/PagesView.php');
	require_once($_CONF['ModulesPath'].'system/classes/Grid.php');		//this class creates a data grid to show all the records
	require_once($_CONF['ModulesPath'].'system/functions.php');								
	/******************************************************************
	*Class Header
	*Class Name		: PagesController
	*Functionality	: This class controls PagesModel and PagesView to 
					  handle Pages related function on the site.
	*Note        	: PagesController inherits AdminController that 
 	                  contains functions for the admin site.
	*******************************************************************/

	class PagesController extends AdminController{
	var $sErrorMsg;
	
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
			global $_CONF;
			parent::AdminController();
			$this->obPagesView = new PagesView();
			$this->obPagesModel = new PagesModel();
			$this->error_msg =  parse_ini_file ( $_CONF['ModulesPath'].'pages/ihtml/error_msg.conf', true);
		}
		
		
		/*
		**************************************************************************************
		*function header
		*function name  : enlist
		*function type  : call by value	
		*functionality  : List all admin managed pages.
		*input			: nothing
		*output			: List all admin managed pages
		*return value   : nothing
		*note			: nothing
		***************************************************************************************
		*/
	   function enlist(){
	   
			$_REQUEST['mode'] = "enlist";
			$this->obPagesModel->bPagingApplied = true;
			if(!empty($_REQUEST['sort'])){
				$this->obPagesModel->bSortingApplied = true;
				$this->obPagesModel->vSort['Field'] = $_REQUEST['sort'];
				$this->obPagesModel->vSort['Direction'] = $_REQUEST['direction'];
			}
			
			//$this->obPagesModel->vPage['PageSize'] = 4;
			$this->obPagesModel->vPage['CurrentPage'] = (empty($_REQUEST['pos']) ? 0 : $_REQUEST['pos']);
 			$obPage = $this->obPagesModel->GetPage();
			$_REQUEST['pos'] = $this->obPagesModel->vPage['CurrentPage'];
			$this->obPagesView->obPage = &$obPage;
			$this->obPagesView->vPage = $this->obPagesModel->vPage;
			$this->obPagesView->enlist();
		}
    /*
		**************************************************************************************
		*function header
		*function name  : edit
		*function type  : call by value	
		*functionality  : display the page to edit through fckeditor
		*input			: Page object
		*output			: display the page to edit through fckeditor
		*return value   : nothing
		*note			: nothing
		***************************************************************************************
		*/  
	  	function edit($obPage=''){
			if(empty($obPage))
				$obPage = $this->obPagesModel->GetPage(array($_REQUEST['id']));
			$this->obPagesView->obPage = &$obPage[0];
			if($this->sErrorMsg !='')
			{
				$this->obPagesView->sErrorMsg=$this->sErrorMsg;
			}
			$this->obPagesView->edit();
		}//ef
		/*
		**************************************************************************************
		*function header
		*function name  : save
		*function type  : call by value	
		*functionality  : update the page record.
		*input			: page object
		*output			: update the page record
		*return value   : nothing
		*note			: nothing
		***************************************************************************************
		*/
		function save(){
			//Do Server Side Test
			if($_POST['Cancel']=='Cancel')
			{
			$this->enlist();
			}
			
			if($_POST['Save']=='Save')
			{
				$obPage = new Page();
				$obPage->id = $_POST['id'];
				$obPage->title = htmlentities($_POST['title']);
				$obPage->metakeyword = htmlentities($_POST['metakeyword']);
				$obPage->metadescription = htmlentities($_POST['metadescription']);
				$obPage->content = htmlentities($_POST['content'], ENT_QUOTES);
			
				if(empty($_POST['title'])){
					$this->sErrorMsg ='Please enter Title.';
				    $this->edit(array(&$obPage));
					die();
				}
				if(empty($_POST['content'])){
					$this->sErrorMsg  ='Please enter Content.';
					 $this->edit(array(&$obPage));
					 die();
				}
			
				if(!($response = $this->obPagesModel->update($obPage))){
					 $this->sErrorMsg = "Data saving is Failed";
					 $this->edit(array(&$obPage));
					die();
				}else{
					$this->obPagesView->sErrorMsg = "Data Saved Successfully.";
					$this->enlist();
				}
			}
		}//ef save
    }//ec
?>