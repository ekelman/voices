<?php
	error_reporting(E_ALL);
	ini_set('display_errors', 1);

	require_once("global.conf.php");
	
	//don't timeout!
	set_time_limit(5*60);

	require_once($_CONF['ModulesPath'].'system/functions.php');											    
	require_once($_CONF['ModulesPath'].'system/classes/Model.php');	
	
	//contains some common data classes 
	require_once($_CONF['ModulesPath'].'system/classes/dataclasses.php');								    

	//connection details
	
	
	
	
	$oModel 	= new Model();
			
	// Pull certain elements
	
	$r = mysql_query('select * from tbl_admin') ;
	 if (mysql_errno()) { 
	   echo "MySQL error ".mysql_errno().": ".mysql_error()."\n<br>When executing:<br>\n$query\n<br>"; 
  	} 

	echo 'test '.mysql_num_rows($r) ;
	 if (mysql_errno()) { 
	   echo "MySQL error ".mysql_errno().": ".mysql_error()."\n<br>When executing:<br>\n$query\n<br>"; 
  	} 
	//$rs_sel_member  =	$oModel->Execute($sql);

	//$oEmail = $oModel->GetEmail(41);
	
	//echo "<br>email sent to<br>".$oEmail.'<br>';
	
	while($row_sel_member = $rs_sel_member->FetchRow())
	{
		echo 'user'. $row_sel_member['username'];
	}

?>