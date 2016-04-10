<?php
	/*	**********************************************************************************************************
	* Author Name			: Paras Shah
	* Creation Date 		: 17th Jan 2012
	* FileName 				: SettingModel.php	
	* Called From 			: SettingController classes.
	* Description 			: SettingModel class is inhertited from model class and is used to                               execute queries on the site.
	* Components Used		: none
	* Tables Accessed 		: none
	* Program Specs 		:  
	* UTP doc 				:
	* Tested By 			:
	*****************************************************************************************************
	*/
	
	
	/***************************************************************
	*Class Header
	*Class Name: Setting
	*Functionality: This class inherits model class which contains 
					all the database related functions.
	*Note         : none
	***************************************************************/
	

	class SettingModel extends Model
	{
			
		/*
		**************************************************************************************
		*Function Header
		*Function Name  : SettingModel
		*Function Type  : constructor
		*Functionality  : this fumction intializes Setting class and inherits model class
		*Input			: nothing
		*Output			: initialized objects
		*Return Value   : all the initialized values.
		*Note			: nothing
		***************************************************************************************
		*/
			
		function SettingModel()
		{
			parent::Model();
		}
		
		/*
		**************************************************************************************
		*Function Header
		*Function Name  : getSettingsList
		*Function Type  : Call by reference
		*Functionality  : get record of the page corresponding to page id.	
		*Input			: page id
		*Output			: Page object
		*Return Value   : object
		*Note			: nothing
		***************************************************************************************
		*/
		function getSettingList(){
			$sSQL = "SELECT * FROM tbl_settings";
			$rs = $this->Execute($sSQL);
			return $this->_getPageArray($rs, 'Setting');
		}//ef
		
		
		/*
		**************************************************************************************
		*Function Header
		*Function Name  : getSettingDetail
		*Function Type  : Call by reference
		*Functionality  : get record of the .	
		*Input			: page id
		*Output			: Page object
		*Return Value   : object
		*Note			: nothing
		***************************************************************************************
		*/
		function getSettingDetail($setting_id){
			$sSQL = "SELECT * FROM tbl_settings where id='".$setting_id."'";
			$rs = $this->Execute($sSQL);
			return $this->_getPageArray($rs, 'Setting');
		} //ef
		
		
		
		
		/*
		**************************************************************************************
		*Function Header
		*Function Name  : getSettingDetailFromName
		*Function Type  : Call by reference
		*Functionality  : get record of the .	
		*Input			: page id
		*Output			: Page object
		*Return Value   : object
		*Note			: nothing
		***************************************************************************************
		*/
		function getSettingDetailFromName($setting_name){
			$sSQL = "SELECT * FROM tbl_settings where field_name ='".$setting_name."'";
			$rs = $this->Execute($sSQL);
			$setting = $this->_getPageArray($rs, 'Setting');
			return $setting['0']->field_value;
		} //ef
		
		/************************		***************************************************************
		*Function Header
		*Function Name  : updateSettingGroup 
		*Function Type  : call by value
		*Functionality  : this function fetches permissions for a user   
		* [ Section , category , content ] 
		*Output			: NIL.
		*Return Value   : NIL.
		*Note			: NIL
		****************************************************************************************/
		function updateSetting($oSetting)
		{	
			$query_usergroups = "Update tbl_settings set 
			field_value ='".$oSetting->field_value."',			
			field_details ='".$oSetting->field_details."'			
			where id='".$oSetting->id."'";	
			
			$rs_usergroups 	= $this->Execute($query_usergroups);			
			
			
			return $rs_usergroups;
		}	

/***************************************************************************************
		*Function Header
		*Function Name  : getSystemSettingValue for a content for a user  
		*Function Type  : get value of a sttings 
		*Functionality  : get value of a settings 
		* [ Section , category , content ] 
		*Output			: NIL.
		*Return Value   : NIL.
		*Note			: NIL
		****************************************************************************************/
		
		function getSystemSettingValue($SystemSetting='') {
			
			$value = ''; 
			$sSQL  = "SELECT * FROM tbl_settings where field_name = '".$SystemSetting."'";
			
			$rs = $this->Execute($sSQL);			
			while($row = $rs->FetchRow())
			{
				$value	= $row['field_value'];									
			}
			
			return $value;								
		}//End Function		
	};//ec
?>