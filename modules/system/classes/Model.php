<?php
	/***********************************************************************************************************
		* Author Name 			: Sandeep Singla 
		* Creation Date			: 21 may-2007
		* FileName 				: Model.php	
		* Called From 			: usercontroller and admin controller classes.
		* Description 			: Model class is used to execute database queries.
		* Components Used		: adodb.inc for database connectivity
		* Tables Accessed 		: none
		* Program Specs 		:  
		* UTP doc 				:
		* Tested By 			:
	************************************************************************************************************/

	require_once($_CONF['LibPath'].'adodb/adodb.inc.php');														// this class contain functions for database interaction
	
	/***************************************************************
	*Class Header
	*Class Name: Model
	*Functionality: This class contains all the functions for 
					database interaction.
	*Note         : none
	***************************************************************/

	class Model{
		var $obADO;
		var $sErrorMsg;
		var $iErrorNo;

		/*	Array stores paging factors 
			PageSize - No of Records Fetched at one time
			CurrentPage - Records are fetched based on the this variable
			TotalPages - No of Pages that will be build if query is run in Paging mode
		*/
		var $vPage = array();
		//factor which decides if paged sql is done/not
		var $bPagingApplied;
		//factor to decide sorting;
		var $bSortingApplied;
		/*
			Array stores the sorting factors
			Field: field name
			Direction: direction
		*/
		var $vSort;
		
	/***************************************************************************************
	*Function Header
	*Function Name  : Model
	*Function Type  : constructor
	*Functionality  : this function establishes a connection with database and initializes 
					  different variables.
	*Input			: nothing
	*Output			: initialized objects
	*Return Value   : all the initialized values.
	*Note			: nothing
	****************************************************************************************/
			
		function Model(){
			global $_CONF;
			$this->obADO = &NewADOConnection(DB_TYPE);
			
			$this->obADO->Connect(DB_HOST, DB_USER, DB_PASS, DB_NAME) || $this->sErrorMsg = mysql_error();	
		
			$this->obADO->SetFetchMode(ADODB_FETCH_ASSOC);
			$this->bPagingApplied 		= false;
			$this->bSortingApplied 		= false;
			
			if(($_REQUEST['stage']=='employer' && $_REQUEST['mode']=='EmployerResources') || ($_REQUEST['stage']=='referrer'  && $_REQUEST['mode']=='MyResources'))
			{
			$this->vPage['PageSize'] 	= 3;
			}else{
			$this->vPage['PageSize'] 	= $_CONF['PageSize'];
			}
			$this->obADO->debug 		= DEBUG;
		}
		
	/***************************************************************************************
	*Function Header
	*Function Name  : setPaging
	*Function Type  : call by value
	*Functionality  : this function sets the paging to on or off depending on the flag 
					  passed to it.
	*Input			: bFlag that contains 
	*Output			: initialized objects
	*Return Value   : all the initialized values.
	*Note			: nothing
	****************************************************************************************/
			
		function setPaging($bFlag){
			 $this->bPagingApplied = $bFlag;
		}
		
	/***************************************************************************************
	*Function Header
	*Function Name  : Execute
	*Function Type  : call by value
	*Functionality  : this function executes a sql query and returns back the result set 
					  obtained.
	*Input			: Sql string
	*Output			: record set of the values obtained 
	*Return Value   : $rs variable containing record set of the values
	*Note			: nothing
	****************************************************************************************/
			
		function Execute($sSQL)
		{
			$stime = microtime();
			if($this->bSortingApplied)
			{
				$sSQL 	= $this->getSortedSQL($sSQL);
			}
			
			//echo "=========".$sSQL."==========";
			if($this->bPagingApplied) 
			{
				$sSQL 	= $this->getPagedSQL($sSQL);
			}	
			
			//echo "=========".$sSQL."==========";
			$rs =  $this->obADO->Execute($sSQL);
			if(!$rs)
			{				
				$this->iErrorNo	= 	$this->obADO->ErrorNo();
				$this->sErrorMsg= 	$this->iErrorNo.":".$this->obADO->ErrorMsg();
				return false;
			}
			
			$ptime = microtime();
			//echo "=====timetaken==".$ptime-$stime."==========";
			//echo "<br><br>";
			return $rs;
		}
		
	/***************************************************************************************
	*Function Header
	*Function Name  : getSortedSQL
	*Function Type  : call by value
	*Functionality  : this function generates Sql in sorted manner, ascending or descending 
					  depending in the direction provided.
	*Input			: Sql string
	*Output			: sql sorted by the function
	*Return Value   : $sSQL variable containing the sorted sql query string
	*Note			: nothing
	****************************************************************************************/
			
		function getSortedSQL($sSQL)
		{
			if("SELECT" == strtoupper(substr($sSQL,0,6))){
				
			$sSQL .= " ORDER BY ".$this->vSort['Field']." ".(($this->vSort['Direction'])?'DESC':'ASC');
			if($this->vSort['Field1'])
			{
				$sSQL .= ",".$this->vSort['Field1'];
			}
			}
			//$sSQL .= " limit 10";
			//echo $sSQL;
			return $sSQL;
		}
		
	/***************************************************************************************
	*Function Header
	*Function Name  : getPagedSQL
	*Function Type  : call by value
	*Functionality  : this function modifies the sql statements to generate query string 
					  with limits which is used to implement paging.
	*Input			: Sql string
	*Output			: sql with limit keyword attached
	*Return Value   : $sSQL variable containing the limit keyword attached
	*Note			: nothing
	****************************************************************************************/
			
		function getPagedSQL($sSQL){
		
			//echo $sSQL;
			//die();
			$rs = $this->obADO->Execute($sSQL);
			//echo $sSQL;
			//die();
			$this->vPage['TotalRecords'] = $rs->RecordCount();
			//die();
			//echo $this->vPage['TotalRecords'];
			//echo $this->vPage['PageSize'];
			$this->vPage['TotalPages'] = $rs->RecordCount() / $this->vPage['PageSize'];
			if( ($this->vPage['CurrentPage'] > $this->vPage['TotalPages']) || ($this->vPage['CurrentPage'] < 0)){
				$this->vPage['CurrentPage'] = 0;
			}
			if("SELECT" == strtoupper(substr($sSQL,0,6))){
				$sSQL .= " Limit ".($this->vPage['CurrentPage'] * $this->vPage['PageSize']).",".$this->vPage['PageSize'];
			}
			//echo "<br>".$sSQL;
			return $sSQL;
		}
		
	/***************************************************************************************
	*Function Header
	*Function Name  : _getPageArray
	*Function Type  : call by value
	*Functionality  : this function generates result of sql quwey in format of an array
	*Input			: $rs containing the record set and dataobject name which contains all
					  the field names that need to be displayed 
	*Output			: array containing all the values fetched using  the sql query.
	*Return Value   : $obUser containing all the fields that are passed through 
					  $sDataObjectName.
	*Note			: nothing
	****************************************************************************************/
			
		function &_getPageArray($rs, $sDataObjectName)
		{
			global $_CONF;
			if(!$rs)
				return false;
			for($iFieldCount=0; $iFieldCount < $rs->FieldCount(); $iFieldCount++){
				 $fld = $rs->FetchField($iFieldCount);
				$sType[$fld->name] = $rs->MetaType($fld->type);
			}
			$obUser = false;
			$i=-1;
			while(!$rs->EOF){
				$obUser[++$i] = new $sDataObjectName();
				foreach($rs->fields as $key => $value){
					switch($sType[$key]){
						case 'T':
						case 'D':
						{
							if($_CONF['DEFAULT_DATE']!="") { 			
							
								$dt  = date('Y-m-d',strtotime($value));
																
								$hour = (int)(date('G',strtotime($value))); 
								$min_sec = date('i:s',strtotime($value));
								$am_pm= date('A',strtotime($value));

								if($hour < 13) {	 	
									$obUser[$i]->{$key}	= $dt.' '.$hour.':'.$min_sec." ".$am_pm;													   								} else {
									$newHour = $hour - 12; 
									$obUser[$i]->{$key}	= $dt.' '.$newHour.':'.$min_sec." ".$am_pm;
								}
								//$obUser[$i]->{$key} = $value;
							} else {
								$obUser[$i]->{$key} =  $rs->UserDate($value, $_CONF['DateFormat']);
							//$obUser[$i]->{$key} = $rs->UserDate($value, $_CONF['DateFormat']);
							//$obUser[$i]->{$key} = $value;
							}
						}
						break;
						case 'C':
							$obUser[$i]->{$key} = htmlentities($value);
						break;
						default:
							$obUser[$i]->{$key} = $value;
					}
				}//eforeach
				$rs->MoveNext();
			}//wend
			return $obUser;
		}
		/*
		**************************************************************************************
		*Function Header
		*Function Name  : GetEmail
		*Function Type  : Call by value	
		*Functionality  : used to get email adresses from the database
		*Input			: id
		*Output			: referrer object containing emails 
		*Return Value   : referrer object containing emails 
		*Note			: nothing
		***************************************************************************************
		*/
		function GetEmail($id)
		{
			$query = "SELECT * FROM tbl_emails where email_id=$id";
			$rs		=	$this->Execute($query);
			return $this->_getPageArray($rs, 'Email');
		}//ef				
	}//ec Model
?>
