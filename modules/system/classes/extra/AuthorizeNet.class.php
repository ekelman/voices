<?php
class AuthorizeNet{
	var $Login;     // Your authorize.net login
	var $Password="";          // Your authorize.net password (if Password-Required Mode is enabled)
	var $TxnKey;
	var $Version="3.1";
	var $DelimData="TRUE";    // Delimited response from the gateway (or set in the Setting Menu)
	var $RelayResponse;		  //flase for aim
	var $DelimChar=",";       // Character that will be used to separate fields
	var $EncapChar="";        // Character that will be used to encapsulate fields
	var $CurrencyCode="USD";
	var $Amount="10.00";

	var $FpSequence;
	var $FpTimeStamp;
	var $FpHash;

	var $InvoiceNumber;//Invoice Number of the Transaction
	var $Description;//Transaction Description stored here.

	var $Type="AUTH_CAPTURE";  // Default transaction type
	var $TestRequest="TRUE";  // Make this a test transaction

	#
	# Customer Information
	#
	var $Method="CC";
	var $FirstName;
	var $LastName;
	var $CardNum;// For testing purpose "5424000000000015"
	var $CardCode;//CC Security Code
	var $ExpDate;

	var $PostUrl;
	var $RelayUrl;

	function AuthorizeNet (){
		$this->PostUrl = "https://secure.authorize.net/gateway/transact.dll";
	}
}#/class AuthorizeNet

class AuthoriseNetAIM extends AuthorizeNet{

	function AuthorizeNetAIM(){
		parent::AuthorizeNet();
		$this->DelimData = "True";
		$this->RelayResponse = "True";
		$this->DelimChar = ",";
	}

	function generateRequest(){
		$fields ="x_Version=".$this->Version.
				 "&x_Login=".$this->Login.
				 "&x_tran_key=".$this->TxnKey.
				 "&x_Delim_Data=".$this->DelimData.
				 "&x_Delim_Char=".$this->DelimChar.
				 "&x_relay_response=False".
				 "&x_Encap_Char=".$this->EncapChar.
				 "&x_Type=".$this->Type.
				 "&x_Test_Request=".$this->TestRequest.
				 //"&x_Method=".$this->Method.
				 "&x_Amount=".$this->Amount.
		 		 "&x_Card_Num=".$this->CardNum.
				 "&x_Card_Code=".$this->CardCode.
				 "&x_Exp_Date=".$this->ExpDate;
		if($this->Password!=''){
			$fields.="&x_Password=".$this->Password;
		}
		#
		# Start CURL session
		#
		$ch=curl_init($this->PostUrl);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);  // set the fields to post
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);    // make sure we get the response back

		$buffer = curl_exec($ch);                       // execute the post

		curl_close($ch);                                // close our session

		$details=explode($this->DelimChar,$buffer);        // create an array of the response values
		/*print "<pre>";
		print_r($details);
		print "</pre>";*/
		return $details;
	}
}

class AuthorizeNetSIM extends AuthorizeNet{
	//An Array of User defined fields which can be posted with the authorize for getting back after the
	//respose. Basically assign as name value pair and these will be sent as hidden name and its values
	// e.g. $arrCustomFields['session_id'] = "aaa" will be sent as hidden under name session_id value "aaa"
	var $arrCustomFields;
	function AuthorizeNetSIM(){
		parent::AuthorizeNet();
	}

	function generateRequest(){
		$this->FpTimeStamp = time();
		$this->FpSequence = rand(1, 1000);
		$this->FpHash = $this->hmac (trim($this->TxnKey), trim($this->Login) . "^" . $this->FpSequence . "^" . $this->FpTimeStamp . "^" . trim($this->Amount) . "^" . $this->CurrencyCode);

		$html  = '<form method="post" action="'.$this->PostUrl.'" name="form1">'."\n";
		$html .= '<input type="hidden" name="x_Relay_URL" value="'.$this->RelayUrl.'">'."\n";
		$html .= '<input type="hidden" name="x_ADC_URL" value="'.$this->RelayUrl.'">'."\n";
		$html .= '<input type="hidden" name="x_test_request" value="'.$this->TestRequest.'">'."\n";
		//$html .= '<input type="hidden" name="x_Relay_Response" value="'.$this->RelayResponse.'">'."\n";
		//$html .= '<input type="hidden" name="x_card_num" value="'.$this->CardNum.'">'."\n";
		//$html .= '<input type="hidden" name="x_card_code" value="'.$this->CardCode.'">'."\n";
		//$html .= '<input type="hidden" name="x_Exp_Date" value="'.$this->ExpDate.'">'."\n";
		//$html .= '<input type="hidden" name="x_type" value="'.$this->Type.'">'."\n";
		$html .= '<input type="hidden" name="x_login" value="'.$this->Login.'">'."\n";
		$html .= '<input type="hidden" name="x_fp_sequence" value="'.$this->FpSequence.'">'."\n";
		$html .= '<input type="hidden" name="x_fp_timestamp" value="'.$this->FpTimeStamp.'">'."\n";
		$html .= '<input type="hidden" name="x_fp_hash" value="'.$this->FpHash.'">'."\n";
		$html .= '<input type="hidden" name="x_amount" value="'.$this->Amount.'">'."\n";
		$html .= '<input type="hidden" name="x_show_form" value="PAYMENT_FORM">'."\n";
		$html .= '<input type="hidden" name="x_currency_code" value="'.$this->CurrencyCode.'">'."\n";
		//Add Custom Fields
		foreach($this->arrCustomFields as $key => $value)
			$html .= '<input type="hidden" name="'.$key.'" value="'.$value.'">'."\n";
		$html .= "</form>\n";
		$html .= "<script>document.form1.submit();</script>\n";
		return $html;
	}

    function hmac ($key, $data){
        // RFC 2104 HMAC implementation for php.
        // Creates an md5 HMAC.
        // Eliminates the need to install mhash to compute a HMAC
        // Hacked by Lance Rushing
        $b = 64; // byte length for md5
        if (strlen($key) > $b) {
            $key = pack("H*",md5($key));
        }
        $key  = str_pad($key, $b, chr(0x00));
        $ipad = str_pad('', $b, chr(0x36));
        $opad = str_pad('', $b, chr(0x5c));
        $k_ipad = $key ^ $ipad ;
        $k_opad = $key ^ $opad;
        return md5($k_opad  . pack("H*",md5($k_ipad . $data)));
    }
}#/class AuthorizeNetSIM

/*
One Base class AuthorizeNet
	- All varibales common to Both
	- Result Handling Methods, Response returned will be commonly handled here
	- Encoding and Data conversion
AuthorizeNetSIM extends AuthorizeNet
	- Generates Code to Post SIM request
	- Data is Interpreted and returned by it
AuthoriseNetAIM extends AuthorizeNet
	- Generates Code to Handle AIM request
	- Data is interpreted and returned by it
*/
?>