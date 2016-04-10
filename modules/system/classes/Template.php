<?php
	/***********************************************************************************************************
		* Author Name 			: Sandeep Singla 
		* Creation Date			: 14 May-2007
		* FileName 				: Template.php	
		* Called From 			: View.php
		* Description 			: this class initializes smarty and declares different variables
		* Components Used		: Smarty.class.php for using smarty templates
		* Tables Accessed 		: none
		* Program Specs 		:  
		* UTP doc 				:
		* Tested By 			:
	********************************************************************************************/

require($_CONF['LibPath'].'Smarty-2.6.10/Smarty.class.php');												 //this is smarty class that is used to parse smarty templates
	
	/***************************************************************
	*Class Header
	*Class Name: Template
	*Functionality: This class initializes all the smarty 
					variables
	*Note         : none
	***************************************************************/

class Template extends Smarty {
		
	/***************************************************************************************
	*Function Header
	*Function Name  : Template
	*Function Type  : constructor
	*Functionality  : this function initializes different variables.
	*Input			: nothing
	*Output			: initialized objects
	*Return Value   : all the initialized values.
	*Note			: nothing
	****************************************************************************************/
			
   function Template(){ 
		global $_CONF;
        $this->Smarty(); 
		$this->template_dir = $_CONF['ModulesPath']; 
        $this->compile_dir  = $_CONF['VarPath'].'templates_c/'; 
        $this->config_dir   = $_CONF['ModulesPath']; 
        $this->cache_dir    = $_CONF['VarPath'].'cache/'; 
        $this->caching = 0;
		$this->force_compile = true;
		$this->debugging = DEBUG;
		$this->assign('_CONF', $_CONF);
   } 
} 
?>