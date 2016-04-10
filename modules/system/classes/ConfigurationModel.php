<?php
	class Configuration{
		var $name;
		var $group_name;
		var $value;
		var $description;
	}
	class ConfigurationModel extends Model{
		function MemberDebtModel(){
			parent::Model();
		}

		function &getValue($sName, $sGroupName){
			$sSQL = "SELECT * FROM config_values WHERE name='$sName' AND group_name='$sGroupName'";
			$rs = $this->Execute($sSQL);
			return $this->_getPageArray($rs, 'Configuration');
		}//ef
		
		function &getAllValue(){
			$sSQL = "SELECT * FROM config_values";
			$rs = $this->Execute($sSQL);
			return $this->_getPageArray($rs, 'Configuration');
		}//ef
		
		function &changeConfig($val1,$val2,$val3,$val4,$val5,$val6,$val7,$val8,$val9){
			//exit();
			$sSQL = "UPDATE config_values set value='".$val1."' where name='Queue_Counter' and group_name='Listing_Settings'";
			$this->Execute($sSQL);
			$sSQL = "UPDATE config_values set value='".$val2."' where name='Max_Lead_Size' and group_name='join_category'";
			$this->Execute($sSQL);
			$sSQL = "UPDATE config_values set value='".$val3."' where name='Max_Lead_Set' and group_name='join_category'";
			$this->Execute($sSQL);
			$sSQL = "UPDATE config_values set value='".$val4."' where name='Billing_Lead_Count' and group_name='Number_of_Lead'";
			$this->Execute($sSQL);
			$sSQL = "UPDATE config_values set value='".$val5."' where name='Click_Time' and group_name='Click_tracking'";
			$this->Execute($sSQL);		
			$sSQL = "UPDATE config_values set value='".$val6."' where name='Excluded_Countries' and group_name='Click_tracking'";
			$this->Execute($sSQL);	
			$sSQL = "UPDATE config_values set value='".$val7."' where name='Bad_Click_Discount' and group_name='Click_tracking'";
			$this->Execute($sSQL);	
			$sSQL = "UPDATE config_values set value='".$val8."' where name='lead_notification' and group_name='Lead_Received_Notification'";
			$this->Execute($sSQL);
			$sSQL = "UPDATE config_values set value='".$val9."' where name='vat_value' and group_name='VAT_Value_set'";
			return $this->Execute($sSQL);
			}//ef
	}//ec
?>