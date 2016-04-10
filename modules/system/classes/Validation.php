<?php
	class ValidationElement{
		/*
		This is an Array with a single element key and value, the keyname will be used in the error messages. Validations will be checked against value.
		eg 'First_Name'=> "Test": value of First_Name will be checked against the rule and Error(if any) will contain ref to 
		Key ie First_Name, The underscores will be replaced by spaces while displaying the error.
		*/
		var $VData;
		/*
		This array will contain Rules info against which the data value is checked. The format is as here
		foreach rule 
		'RuleName|Parameter1|Parameter2', 'RuleName2|Parameter1|Parameter2'
		*/
		var $SRule;

		/*
		if more than one rule specified in the SRule array, How to group all
		Valid options are AND, OR
		*/
		var $sGroupRule;

		function ValidationElement($VData, $SRule, $sGroupRule='AND'){
			$this->VData = $VData;
			$this->SRule = $SRule;
			$this->sGroupRule = $sGroupRule;
		}
	}//ec

	class ValidationCheck{
		var $OValidationElement;
		var $SErrorMsg;
		var $bGroupMessage;

		function ValidationCheck($OValidationElement, $bGroupMessage =  true){
			$this->OValidationElement = &$OValidationElement;
			$this->bGroupMessage = $bGroupMessage;
		}
		
		/*
		Returns true/false for validation test passed or not
		*/

		function Check(){
			$bSingularResponse = true;
			$bResponse = true;
			foreach($this->OValidationElement as $oValidationElement){
				$bSingularResponse = $this->testValidation($oValidationElement);
				if( (false == $this->bGroupMessage) && (false == $bSingularResponse) ){
					return $bSingularResponse;
				}
				$bResponse &= $bSingularResponse;
			}
			return $bResponse;
		}

		function testValidation($oValidationElement){
			$bResponse = true;
			foreach($oValidationElement->SRule as $sRule){
				$SRuleEle = explode("|", $sRule);
				$sMethod = array_shift($SRuleEle);
				$bResponse &= $this->{$sMethod}(each($oValidationElement->VData), $SRuleEle);
			}
			return $bResponse;
		}

		function Blank($VData, $VParameters){
			if(empty($VData['value']) || "" == trim($VData['value'])){
				$this->SErrorMsg[] = "Please provide ".str_replace("_"," ", $VData['key']);
				return false;
			 }else{
				return true;
			 }
		}

		function Alpha($VData, $VParameters){
			if (ctype_alpha(trim($VData['value']))) {
				return true;
			 } else {
				$this->SErrorMsg[] = "Only alphabets are allowed for ".str_replace("_"," ", $VData['key']).".";
				return false;
			 }
		}



		/*function Email($VData, $VParameters){
			if(!preg_match("/^[-_a-z0-9]+(\.[-_a-z0-9]+)*@[-a-z0-9]+(\.[-a-z0-9]+)*\.[a-z]{2,6}$/", $VData['value'])){
				$this->SErrorMsg[] = "Please provide a valid email format for ".str_replace("_"," ", $VData['key']);
				return false;
			}else{
				return true;
			}
		}*/
		function Email($VData, $VParameters){
			if(!preg_match("/^[-_a-z0-9A-Z]+(\.[-_a-z0-9A-Z]+)*@[-a-z0-9A-Z]+(\.[-a-z0-9A-Z]+)*\.[a-zA-Z]{2,6}$/", $VData['value'])){
				$this->SErrorMsg[] = "Please provide a valid email format for ".str_replace("_"," ", $VData['key']).".";
				return false;
			}else{
				return true;
			}
		}
		//Numeric Strings test
		//Parameter 0 - Min length
		function Number($VData, $VParameters){
			if( !is_numeric($VData['value']) /* && (strlen($VData['value']) > $VParameters[0]) */ ){
				$this->SErrorMsg[] = "Please provide a numbers only for ".str_replace("_"," ", $VData['key']);
				return false;
			}else{
				return true;
			}
		}
		//0 - Min Value, 1 - Max Value
		function Numeric($VData, $VParameters){
			$data = floatval($VData['value']);
			if(NULL == $VParameters){//no range specified
				if( !is_float($data) &&  $data > 0){
					$this->SErrorMsg[] = "Please provide a numeric value for ".str_replace("_"," ", $VData['key']);
					return false;
				}else{
					return true;
				}
			}else{
				$fMin = $VParameters[0];
				$fMax = $VParameters[1];
				if( is_float($data) && ($data > $fMin) && ($data < $fMax) ){
					return true;
				}else{
					$this->SErrorMsg[] = "Please provide a numeric value for ".str_replace("_"," ", $VData['key']).
										 " between ".$VParameters[0]." and ".$VParameters[1];
					return false;
				}
			}
		}

		function Length($VData, $VParameters){
			if(strlen($VData['value']) < $VParameters[0]){
				$this->SErrorMsg[] = str_replace("_"," ", $VData['key']) . " must be at least " . $VParameters[0] . " characters long.";
				return false;
			}else{
				return true;
			}
		}

	}//ec ValidationCheck
?>