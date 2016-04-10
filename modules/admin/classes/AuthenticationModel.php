<?php

	/***********************************************************************************************************
		* Author Name		: Anil Nautiyal
		* Creation Date 	: 27th May-2011
		* FileName 				: AuthenticationModel.php
		* Called From 			: AdminController.php
		* Description 			: This file contains different functions to authenticate and validate admin 		users.
		* Components Used		: none
		* Tables Accessed 		: tbl_admin
		* Program Specs 		:
		* UTP doc 				:
		* Tested By 			:
	*************************************************************************************************************/
	//contains some common data classes 
	require_once($_CONF['ModulesPath'].'system/classes/dataclasses.php');								    
	
	
	/***********************************************************************************************************
	*Class Header
	*Class Name		: AdminUser
	*Functionality  : this class declare the variables requried to fetch variables from database.
	*Note        	: none
	**********************************************************************************************************/
	class AdminUser {
		var $id;
		var $username;
		var $password;
		var $email;
	}//End Class AdminUser


	/***************************************************************
	*Class Header
	*Class Name		: AuthenticationModel
	*Functionality  : this class contains functions to validate
					  users.
	*Note        	: Extending class Model to interact with database
	***************************************************************/
	

	class AuthenticationModel extends Model {


		/***************************************************************************************
		*Function Header
		*Function Name  : AuthenticationModel
		*Function Type  : constructor
		*Functionality  : this function initializes an instance of AuthenticationModel class
						  and calls te constructor of Parent class (Model class).
		*Input			: nothing
		*Output			: initialized objects
		*Return Value   : all the initialized values.
		*Note			: NA
		****************************************************************************************/


		function AuthenticationModel() {
			parent::Model();
		}// end of constructor functions Authentication model


		/***************************************************************************************
		*Function Header
		*Function Name  : checkCredentials
		*Function Type  : call by value
		*Functionality  : this function checks the validity of the credentials provided by the admin user.
		*Input			: User entered Username and Password using admin login form
		*Output			: true or false value depending on correctness of passed username and
						  password.
		*Return Value   : Bool.
		*Note			: NA
		****************************************************************************************/
		function checkCredentials($sUsername, $sPassword) {
			$sSQL = "select * from tbl_admin where `username` = '".$sUsername."' and password = '".md5($sPassword)."' 
			and user_type = 'admin'";
			$rs = $this->Execute($sSQL);
			if($rs && $rs->RecordCount() > 0) {
							return true;
			}
			else{
				return false;
			}
		}//End Function checkCredentials

		/***************************************************************************************
		*Function Header
		*Function Name  : check password
		*Function Type  : call by value
		*Functionality  : this function cheks admin old password in the database.
		*Input			: UUsername and Password for admin user
		*Output			: NIL.
		*Return Value   : NIL.
		*Note			: NIL
		****************************************************************************************/


		function checkOldPassword($sUsername, $sPassword) {
			$sSQL = "select * from tbl_admin where `username` = '".$sUsername."' 
			and password = '".md5($sPassword)."' and user_type = 'admin'";
			$rs = $this->Execute($sSQL);
			if($rs && $rs->RecordCount() > 0) {
				return true;
			}
			else{
				return false;
			}
		}//End Function changePassword

		/***************************************************************************************
		*Function Header
		*Function Name  : change password
		*Function Type  : call by value
		*Functionality  : this function updates admin  password in the database.
		*Input			: UUsername and Password for admin user
		*Output			: NIL.
		*Return Value   : NIL.
		*Note			: NIL
		****************************************************************************************/


		function changePassword($sUsername, $sPassword) {
			$sSQL = "UPDATE tbl_admin SET password='".md5($sPassword)."' 
			where `username` = '".$sUsername."' and user_type = 'admin'";
			
			$rs = $this->Execute($sSQL);
		}//End Function changePassword


		/*
		**********************************************************************************
		*Function Header
		*Function Name  : getPetitionDetails
		*Function Type  : Call by value	
		*Functionality  : 
		*Input			: 
		*Output			: 
		*Return Value   : 
		*Note			: nothing
		*********************************************************************************
		*/
		function getPetitionDetails($search_field="",$search_text="")
		{
			$query 	= "SELECT * FROM tbl_petition_notification_detail ";	
			$rs 	= $this->Execute($query);
			return $this->_getPageArray($rs,'Petition');
		}
		
		
	}//End Class AuthenticationModel
?>