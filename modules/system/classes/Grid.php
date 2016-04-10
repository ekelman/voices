<?php

	/********************************************************************************************************
		* Author Name : Sandeep Singla
		* Creation Date : 14 May-2007
		* FileName : Grid.php
		* Called From : Grid.php is included in the view files of modules where grid needs to be displayed.
		* Description : This file is used to create grids on user and admin site
		* Components Used : none
		* Tables Accessed : none
		* Program Specs :
		* UTP doc :
		* Tested By :
	*******************************************************************************************************/
	//constant to display the column in grid
	define('GRID_ELE_COL',1);

	define('GRID_ELE_COMPOSITE_COL',2);
	//constant to display the text in grid
	define('GRID_ELE_TEXT',4);
	//constant to display the links in grid
	define('GRID_ELE_TEXT_LINK',8);
	//constant to display the mail link in grid
	define('GRID_ELE_MAIL_LINK',16);
	//constant to display the static image in grid
	
	define('GRID_ELE_IMAGE',32);
	//constant to display the image links in grid
	define('GRID_ELE_IMAGE_LINK',64);
	define('GRID_ELE_IMAGE_ENUM',128);
	//constant to display the status(activate/deactivate) in grid
	define('GRID_ELE_STATUS',256);
	//constant to display the formatted date type data fields in grid
	define('GRID_ELE_DESCRIPTION',512);
	//for filter type text box
	define('POPUP_BOX',1024);
	define('SELECT',2048);
	define('GRID_ELE_DATE',4096);
	define('GRID_ELE_DATE_RSDB',11223);
	define('SUBMIT',8192);
	define('GRID_ELE_UPLOADED_IMAGE',16384);
	define('GRID_ELE_DYNAMIC_TEXT_LINK', 32768);
	define('GRID_ELE_DYNAMIC_TEXT_LINK_NW', 65536);
	define('GRID_DATE', 131072);
	define('GRID_ELE_AMOUNT',262144);
	//constant to display the image links in grid

	/*********************************************************************************************************
	*Class Header
	*Class Name		: gCell
	*Functionality	: This class declare variables used to display the grid cells on the basis of type 						  specified as text,link or image link etc
	*Note         	: nothing
	********************************************************************************************************/
//echo "<pre>";
//print_r($_REQUEST);
		class gCell{
		//Title of the Grid.
		var $sTitle;
		//Description that is display regdrding the list displayed.
		var $sDescription;
		//as defined above GRID_ELE_*
		var $iType;

		/*
			vProperty will contain values based upon the type defined
			Text - if type text, link
			Link - if type link, imagelink
			Image - When image shown
			bNewWindow - true/false check when clicked on the link, to show in new window?
			FixedQueryString - Which will be fixed array of key to values
			FloatingQueryString - Which will change with every row, mainly useful for data rows, array of key to columns
			Col - The database column name From where to fetch data,
				array if Composite Col, image_enum - Array where key: col value, value: name of the image representation
			Sort - true/false, decided if this field sorts or not

			sFunctionName - function name if type, GRID_ELE_DESCRIPTION (+)
			sJSFunctionName - function name if type, GRID_ELE_DESCRIPTION (+)
			sJSFunctionParameters
			sTextDetails - text to be displayed
			sHTMLDetails - Array that needs to be displayed
		*/
		var $vProperty;
	}//end of class gClass

	/*********************************************************************************************************
	*Class Header
	*Class Name		: Grid
	*Functionality	: This class manages the grids behaviour regarding the vertical functions to be provided,  				or display the check boxes in grid rows to perform multiple operations, displaying S.No for 				rows, Heading and data row objects
	*Note         	: nothing
	********************************************************************************************************/

	class Grid{
		//boolean variable to check whether to display checkboxes in grid or not
		var $bShowCheckBoxes;
		//boolean variable to check whether to display S No of variables or not
		var $bShowSNo;
		//gCell Defining Head Row
		var $bShowPlus;
		//gCell Defining Head Row
		var $bShowFilter;
		//gCell Defining Head Row
		var $oHeadRow;
		//gCell Defining Data Row
		var $oDataRow;
		/*	Array Text which will be shown in the Select,
			Array Operation which will be passwd as mode
			Array Confirm which will be used to tell whether to confirm the operation or not
			For example:
			SVerticalOperation['Text'] = array('Activate', 'Deactivate', 'Delete');
			SVerticalOperation['Operation'] = array('mod_activate', 'mod_deactivate', 'mod_zap');
			SVerticalOperation['Confirm'] = array(0, 0, 1);
		*/
		var $SVerticalOperation;
		//The Data Object from where the rows are to be displayed
		var $oData;
//		print_r($oData);
		//The template object
		var $oTemplate;
		//Custom Operations that are shown on the top-left of grid. This will be a gCell Array
		var $OCustomOperation;
		//Name of the identifier column in the $oData
		var $sIdentifier;
		/*
			Array stores paging factors
			PageSize - No of Records Fetched at one time
			CurrentPage - Records are fetched based on the this variable
			TotalPages - No of Pages that will be build if query is run in Paging mode
		*/
		var $isMain; // true or false on the basis of list
		var $sRedirectURL;
		var $vPage;
		var $sStage;
		//variable to display grid message
		var $sMessage;
		//var $bShowFilter;
		var $OFilter;
		/***************************************************************************************************
		*Function Header
		*Function Name  : Grid
		*Function Type  : call by value
		*Functionality  : Initializes bShowCheckBoxes object to default value to false
		*Input			: NIL
		*Output			: bShowCheckBoxes property is set to false
		*Return Value   : NIL
		*Note			: NIL
		***************************************************************************************************/

		function Grid() {
			$this->bShowCheckBoxes = false;
			$this->bShowFilter = false;
		}

		/***************************************************************************************************
		*Function Header
		*Function Name  : build
		*Function Type  : call by reference
		*Functionality  : this function passes the grid information to grid.html template
		*Input			: nothing
		*Output			: grid display
		*Return Value   : Grid using template grid.html
		*Note			: nothing
		***************************************************************************************************/

		function &build(){

			$this->oTemplate->assign('Grid', $this);
			return $this->oTemplate->fetch('system/ihtml/grid_admin.html');
		}

		/***************************************************************************************************
		*Function Header
		*Function Name  : user_build
		*Function Type  : call by reference
		*Functionality  : this function passes the grid information to grid.html template
		*Input			: nothing
		*Output			: grid display
		*Return Value   : Grid using template grid.html
		*Note			: nothing
		***************************************************************************************************/

		function &user_build(){
			$this->oTemplate->assign('Grid', $this);
			return $this->oTemplate->fetch('system/ihtml/grid.html');
		}
	}
?>