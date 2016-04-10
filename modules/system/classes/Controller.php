<?
	/***********************************************************************************************************
		* Author Name 		: Sandeep singla 
		* Creation Date 	: 14th may 2007
		* FileName 			: Controller.php	
		* Called From		: All the controller file.
		* Description 		: Sets mode and stage for all the files.
		* Components Used 	: none
		* Tables Accessed 	: none
		* Program Specs 	:  
		* UTP doc 			:
		* Tested By 		:
	************************************************************************************************************/

	/***************************************************************
	*Class Header
	*Class Name		: Controller
	*Functionality	: This clss sets stage and mode variables to 
					  control whole flow on the site.
	*Note         	: All other classes are inherited by controlle 
					  class.
	***************************************************************/

	class Controller{
		var $stage;
		var $mode;
		
	/***************************************************************************************
	*Function Header
	*Function Name  : Controller
	*Function Type  : Constructor	
	*Functionality  : Initializes objects of different classes 
	*Input			: nothing
	*Output			: Class objects
	*Return Value   : nothing
	*Note			: nothing
	****************************************************************************************/
		
		function Controller(){
			$this->stage=$GLOBALS['stage'];
			$this->mode=$GLOBALS['mode'];
			
		}
	}
?>