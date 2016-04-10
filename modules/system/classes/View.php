<?php
	/***********************************************************************************************************
	* Author Name	: Anil Nautiyal
	* Creation Date : 27th May-2011
		* FileName 				: View.php	
		* Called From 			: userView and adminView classes
		* Description 			: this class initialize the variables to  be used by the user and admin 
								  controllers
		* Components Used		: none
		* Tables Accessed 		: none
		* Program Specs 		:  
		* UTP doc 				:
		* Tested By 			:
	************************************************************************************************************/

	require_once(dirname(__FILE__).'/Template.php');														//this is file contains smarty class that is used to parse smarty templates
	
	/***************************************************************
	*Class Header
	*Class Name		: View
	*Functionality  : This class initializes all the variables 
					  used by sub classes.
	*Note        	: none
	***************************************************************/

	class View{
		var $obTemplate;
		
	/***************************************************************************************
	*Function Header
	*Function Name  : View
	*Function Type  : constructor
	*Functionality  : this function initializes an instance of smarty template.
	*Input			: nothing
	*Output			: initialized objects
	*Return Value   : all the initialized values.
	*Note			: nothing
	****************************************************************************************/
			
		function View(){
			$this->obTemplate = new Template();
			$this->setGlobalVars();
		}
		
	/***************************************************************************************
	*Function Header
	*Function Name  : View
	*Function Type  : pass by value
	*Functionality  : this function assigns the variables to smarty class
	*Input			: nothing
	*Output			: values assigned to smarty class.
	*Return Value   : nothing
	*Note			: nothing
	****************************************************************************************/
			
		function setGlobalVars(){
			global $_CONF;
			foreach($_CONF as $key => $value)
			$this->obTemplate->assign($key, $value);
		}
	} // end of class View
?>