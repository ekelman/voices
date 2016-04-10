<?php
	/***********************************************************************************************************
		* Author Name 			: Gaurav Nanda 
		* Creation Date			: 5 Mar-2006
		* FileName 				: ConnectDB.php	
		* Called From 			: admin index file
		* Description 			: this class is used to setup connection with the database
		* Components Used		: none
		* Tables Accessed 		: none
		* Program Specs 		:  
		* UTP doc 				:
		* Tested By 			:
	************************************************************************************************************/
	
    class ConnectDB{

        var $db_host;
		var $db_password;
		var $db_username;
		var $db_name;
		
	/***************************************************************************************
	*Function Header
	*Function Name  : ConnectDB
	*Function Type  : constructor
	*Functionality  : this function initializes an instance of different variables.
	*Input			: nothing
	*Output			: initialized objects
	*Return Value   : all the initialized values.
	*Note			: nothing
	****************************************************************************************/

        function ConnectDB(){
			$this->db_host = DB_HOST;
			$this->db_password = DB_PASS;
			$this->db_username = DB_USER;
			$this->db_name = DB_NAME;
		}

	/***************************************************************************************
	*Function Header
	*Function Name  : connectionOpen
	*Function Type  : call by value
	*Functionality  : this function opens a connection to Db
	*Input			: nothing
	*Output			: opens connection to DB
	*Return Value   : return 1 if connection is opened successfully
	*Note			: nothing
	****************************************************************************************/

        function connectionOpen(){
			if(mysql_pconnect($this->db_host,$this->db_username,$this->db_password)){
					if(!mysql_select_db($this->db_name)){
					$this->dbError("Error : Unable to Establish connection with given Database ");
					}
			}else{
				$this->dbError("Error : Unable to connect Database with given Host/Username/Password");
			}
			return 1;
		}

	/***************************************************************************************
	*Function Header
	*Function Name  : dbError
	*Function Type  : call by value
	*Functionality  : this function returns the error messageif there is some problem in 
					  coneecting to database.
	*Input			: $erMsg with a default blank value
	*Output			: returns error message if any
	*Return Value   : nothing
	*Note			: nothing
	****************************************************************************************/

		function dbError($erMsg=""){
			if(empty($erMsg))
				die("<b>Error :</b>".mysql_error());
			else
				die("<b>".$erMsg.":</b> ".mysql_error());
		}
 	}
?>
