<?php
	class Information{
		var $name;
		var $group_name;
		var $value;
		var $description;
	}
	class InformationModel extends Model{
		function InformationModel(){
			parent::Model();
		}

		function &getValue($sName, $sGroupName){
			$sSQL = "SELECT * FROM tbl_info_links WHERE name='$sName' AND group_name='$sGroupName'";
			$rs = $this->Execute($sSQL);
			return $this->_getPageArray($rs, 'Information');
		}//ef
		
		function &getAllValue(){
			$sSQL = "SELECT * FROM tbl_info_links";
			$rs = $this->Execute($sSQL);
			return $this->_getPageArray($rs, 'Information');
		}//ef
		
		function &changeInfo($val1,$val2,$val3,$val4){
			$sSQL = "UPDATE tbl_info_links set value='".$val1."' where name='Queue_Counter' and group_name='Listing_Settings'";
			$this->Execute($sSQL);
			$sSQL = "UPDATE tbl_info_links set value='".$val2."' where name='Max_Lead_Size' and group_name='join_category'";
			$this->Execute($sSQL);
			$sSQL = "UPDATE tbl_info_links set value='".$val3."' where name='Max_Lead_Set' and group_name='join_category'";
			$this->Execute($sSQL);
			$sSQL = "UPDATE tbl_info_links set value='".$val4."' where name='Billing_Lead_Count' and group_name='Number_of_Lead'";
			return $this->Execute($sSQL);
		}//ef
	}//ec
?>