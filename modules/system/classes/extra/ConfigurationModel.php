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
		
		function &changeConfig($val1,$val2,$val3){
			$sSQL = "UPDATE config_values set value='".$val1."' where name='payment_threshold' and group_name='Debt_Payment'";
			$this->Execute($sSQL);
			$sSQL = "UPDATE config_values set value='".$val2."' where name='investment_rate' and group_name='Debt_Payment'";
			$this->Execute($sSQL);
			$sSQL = "UPDATE config_values set value='".$val3."' where name='product_cost' and group_name='Debt_Free_Advantage'";
			return $this->Execute($sSQL);
		}//ef
	}//ec
?>