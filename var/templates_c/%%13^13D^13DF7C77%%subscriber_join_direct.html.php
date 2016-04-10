<?php /* Smarty version 2.6.10, created on 2012-01-12 17:56:57
         compiled from subscriber/ihtml/subscriber_join_direct.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'default', 'subscriber/ihtml/subscriber_join_direct.html', 132, false),array('function', 'html_options', 'subscriber/ihtml/subscriber_join_direct.html', 162, false),array('function', 'html_checkboxes', 'subscriber/ihtml/subscriber_join_direct.html', 185, false),)), $this); ?>
<?php echo '
	<script language="javascript" src="scripts/gen_validatorv4.js"></script>
	<script type=\'text/javascript\' src=\'scripts/jquery-1.3.2.min.js\'></script>
	<link rel="stylesheet" href="css/tipsy.css" type="text/css" />
	<script type="text/javascript" src="scripts/jquery.tipsy.js"></script>	
	<script type="text/javascript" src="../scripts/jquery.livequery.min.js"></script>	
	<script type=\'text/javascript\'>
		function popup(url) 
		{
			params  = \'scrollbars=yes, width=\'+screen.width;
			params += \', height=\'+screen.height;
			params += \', top=0, left=0\';
			params += \', fullscreen=yes\';
		
			newwin = window.open(url,\'preview\', params);
			if (window.focus) {
				newwin.focus()
			}
			return false;
		}
		
		var codeexist = false;
		$(function() {
			$(\'#south\').tipsy({gravity: \'s\'});
			$(\'#south_2\').tipsy({gravity: \'s1\'});
		});
	   
	   $(document).ready(function() {
	   
			if($(\'#primary_afflliates\').val() !=\'\') {
				$(\'#primary_afflliate_code\').hide();		
				$(\'#primary_afflliate_code_detail\').html(\'Not required\');		
			}	
			else	{
				$(\'#primary_afflliate_code\').show();					
				$(\'#primary_afflliate_code_detail\').html(\'\');		
			}
	   
		
			if ($(\'#billingInfoStatus\').attr(\'checked\')) 
			{
				$("#billingSection").show();
				$(\'#isBillingInfo\').attr(\'value\',\'1\');
			}
			else
			{
				$("#billingSection").hide();
			}

			$(\'#billingInfoStatus\').click(function(){
				$(\'#billingInfoStatus\').is(\':checked\') ? $("#billingSection").show() : $("#billingSection").hide();
				$(\'#billingInfoStatus\').is(\':checked\') ? $(\'#isBillingInfo\').attr(\'value\',\'1\') : $(\'#isBillingInfo\').attr(\'value\',\'0\');
			});
			
			$(\'#billingInfoStatus\').change(function(){
				$(\'#billingInfoStatus\').is(\':checked\') ? $("#billingSection").show() : $("#billingSection").hide();
				$(\'#billingInfoStatus\').is(\':checked\') ? $(\'#isBillingInfo\').attr(\'value\',\'1\') : $(\'#isBillingInfo\').attr(\'value\',\'0\');
			});		
		
						
			$(\'#agree\').click(function(){
				$(\'#agree\').is(\':checked\') ? $(\'#is_agree\').attr(\'value\',\'1\') : $(\'#is_agree\').attr(\'value\',\'0\');
			});
			
			$(\'#agree\').change(function(){
				$(\'#agree\').is(\':checked\') ? $(\'#is_agree\').attr(\'value\',\'1\') : $(\'#is_agree\').attr(\'value\',\'0\');
			});		

			$(\'#i_agree_chk\').click(function(){
				$(\'#i_agree_chk\').is(\':checked\') ? $(\'#i_agree\').attr(\'value\',\'1\') : $(\'#i_agree\').attr(\'value\',\'0\');
			});
			
			$(\'#i_agree_chk\').change(function(){
				$(\'#i_agree_chk\').is(\':checked\') ? $(\'#i_agree\').attr(\'value\',\'1\') : $(\'#i_agree\').attr(\'value\',\'0\');
			});
			
			
			$(\'#primary_afflliate_code\').change(function(){
				$.ajax({					
				//this is the php file that processes the data and send mail
				url: "index.php?stage=subscriber&mode=CheckAffiliateCode",							 
				type: "GET",				 
				data: \'primary_afflliate_code=\' + $(this).val(),    							 
				cache: false,							 
				success: function(html) {            			
						if(html == 0) {
							$("#codeinfo").html("<span style=\'color:red\'>Affiliate code <strong>" + $("#primary_afflliate_code").val() + "</strong> does not exist.</span>");
							codeexist = false;
							$("#primary_afflliate_code").val(\'\');
						}
						else 
						{
							$("#codeinfo").html("<span style=\'color:green\'>Affiliate code <strong>" + $("#primary_afflliate_code").val() + "</strong> Exist.</span>");
							codeexist = true;
						}								
					}     
				});						
			});
		});
	</script>
'; ?>

<tr>
<td align="left" valign="top"  style="padding-top:10px;">
<form name='subscriberJoin' method='post' enctype="multipart/form-data" >
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
	<td align="left" valign="top" class="bg_f7f6f2"  style="padding:24px 15px 51px 12px;">
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
	  <tr>
		<td class="arial_16_c40306"><table width="100%" border="0" cellspacing="0" cellpadding="0">
		  <tr>
			<td align="left" valign="top" class="arial_16_c40306"><table width="100%" border="0" cellspacing="0" cellpadding="0">
			  <tr>
				<td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
					<td height="37" align="left" valign="top" class="Trebuchet_27_c60000">Member Registration</td>
				  </tr>
				  <tr>
					<td align="left" valign="top" bgcolor="#b1b0ac" class="arial_20_c40306"><img src="images/trans.gif" width="1" height="1" alt="" /></td>
				  </tr>
				  <?php if ($this->_tpl_vars['sErrorMsg'] != ''): ?>
				  <tr>
					<td valign="bottom" align="center"  class="error-message" style="padding-top:10px;padding-bottom:10px;"><?php echo $this->_tpl_vars['sErrorMsg']; ?>
</td>
				  </tr>
				  <?php endif; ?>
				  <tr>
					<td align="left" valign="top" style="padding:27px 5px 15px 0px;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
					  <tr>
						<td width="400" align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
						  <tr>
							<td width="397" height="50" align="left" valign="middle" class="arial_12_3b393a"><span class="error-message">*</span>&nbsp;<span class="arial_11_000"><strong>User Name:</strong></span>
							<br /><input type="text" name="user_name" id="user_name" value="<?php echo ((is_array($_tmp=@$this->_tpl_vars['oSubscriber']->user_name)) ? $this->_run_mod_handler('default', true, $_tmp, '') : smarty_modifier_default($_tmp, '')); ?>
"style="width:373px;" /><br /><br /></td></tr>
						  <tr>
							<td width="397" height="50" align="left" valign="middle" class="arial_12_3b393a"><span class="error-message">*</span>&nbsp;<span class="arial_12_000">
							<strong>First Name:</strong></span><strong><br />
							  <input type="text" name="first_name" id="first_name" value="<?php echo ((is_array($_tmp=@$this->_tpl_vars['oSubscriber']->first_name)) ? $this->_run_mod_handler('default', true, $_tmp, '') : smarty_modifier_default($_tmp, '')); ?>
" style="width:373px;" /><br /><br /></td></tr>
						<tr>
							<td width="397" height="50" align="left" valign="middle" class="arial_12_3b393a"><span class="error-message">*</span>&nbsp;<span class="arial_12_000">
							<strong>Last  Name:</strong></span><br />
							  <input type="text" name="last_name" id="last_name" style="width:373px;" value="<?php echo ((is_array($_tmp=@$this->_tpl_vars['oSubscriber']->last_name)) ? $this->_run_mod_handler('default', true, $_tmp, '') : smarty_modifier_default($_tmp, '')); ?>
" />
							  <br /><br /></td>
						</tr>
						<tr>
							<td width="397" height="50" align="left" valign="middle" class="arial_12_3b393a"><span class="error-message">*</span>&nbsp;<span class="arial_11_000"><strong>Email:</strong></span><br />
							  <input type="text" name="email" id="email" style="width:373px;" value="<?php echo ((is_array($_tmp=@$this->_tpl_vars['oSubscriber']->email)) ? $this->_run_mod_handler('default', true, $_tmp, '') : smarty_modifier_default($_tmp, '')); ?>
" /><br /><br /></strong></td></tr>
						<tr>
							<td width="397" height="50" align="left" valign="middle" class="arial_12_3b393a"><span class="error-message">*</span>&nbsp;<span class="arial_11_000">
							<strong>Password:</strong></span><br />
							  <input type="password" name="password" id="password" style="width:373px;" />
							  <br /><br /></td></tr>
						 <tr>
							<td width="397" height="50" align="left" valign="middle" class="arial_12_3b393a"><span class="error-message">*</span>&nbsp;<span class="arial_11_000"><strong>Confirm Password:</strong></span><br />
							  <input type="password" name="re_password" id="re_password" style="width:373px;" />
							  <br /><br /></td></tr>
						</table></td>
						<td width="86" align="left" valign="top">&nbsp;</td>
						<td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
						<tr>
							<td width="397" height="55" align="left" valign="middle" class="arial_12_3b393a"><span class="error-message">*</span>&nbsp;<span class="arial_11_000"><strong>Prime Affiliates:</strong></span><br />
								<select name="primary_afflliates" id="primary_afflliates" style="width:373px;">
								<option value=''>---Select Prime Affiliate--</option>
								<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['oAffiliates'],'selected' => $this->_tpl_vars['oSubscriber']->primary_afflliates), $this);?>

								</select>
								<img src="images/img_icon.gif" style="cursor:pointer;" id='south' title='A prime affiliate is an organization of which you might be a member or an organization whose opinions you wish to follow. This organization may have asked you to join VOICES. The organization that you select will receive a referral fee. For more information on referral fees, please read our disclosure statement regarding referral fees.'/><br />
							  <br /></td></tr>
						  <tr>
							<td height="50" align="left" valign="middle" class="arial_12_3b393a"><span class="error-message">*</span>&nbsp;<span class="arial_11_000"><strong>Prime Affiliate Code:</strong></span><br />
								<input type="text" name="primary_afflliate_code" id="primary_afflliate_code" style="width:373px;" value="<?php echo ((is_array($_tmp=@$this->_tpl_vars['oSubscriber']->primary_afflliate_code)) ? $this->_run_mod_handler('default', true, $_tmp, '') : smarty_modifier_default($_tmp, '')); ?>
" />
									<span id="primary_afflliate_code_detail" class="arial_11_676767">									
									</span>
								<br />
								
								<span class="arial_11_676767">
									<span id="codeinfo">
									Select from the dropdown or type the affiliate code provided by your<br />
									 organization in the box above <br />
									</span>
								<br /><br />
							</span></td></tr>						  
						   <tr>
							<td height="50" align="left" valign="middle" class="arial_12_3b393a"><table width="100%" border="0" cellspacing="0" cellpadding="0">
							  <tr>
								<td width="379" height="130" align="left" valign="top" class="arial_12_3b393a"><span class="arial_11_000"><strong>Additional Affiliates:</strong></span><br />
								  <div class='textbox'>		  
									<?php echo smarty_function_html_checkboxes(array('class' => 'test','name' => 'secondary_afflliates','id' => 'secondary_afflliates','options' => $this->_tpl_vars['oAffiliates'],'selected' => $this->_tpl_vars['oSubscriber']->secondary_afflliates,'separator' => "<br />"), $this);?>
				
									</div>
								  <br /></td>
								<td width="22" align="left" valign="top" style="padding-top:14px;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
								  <tr>
									<td><img id='south_2' style="cursor:pointer;" title='An affiliate is an organization of which you might be a member or an organization whose opinions you are interested in following. By selecting them as an affiliate, you will be able to view content they produce and weigh in on their ideas and opinions.' src="images/img_icon.gif" /></td>
								  </tr>
								</table></td>
							  </tr>
							</table></td>
						  </tr>
						  </table></td></tr>
						<tr><td colspan="3">
					  	<table width="100%">
						<tr>
						<td><span class="error-message">*</span>&nbsp;<span class="arial_11_000"><strong>Street Address:</strong></span><br />
							  <input type="text" name="address" id="address" style="width:373px;" value="<?php echo ((is_array($_tmp=@$this->_tpl_vars['oSubscriber']->mail_address)) ? $this->_run_mod_handler('default', true, $_tmp, '') : smarty_modifier_default($_tmp, '')); ?>
" />
							  <br /><br /></td>
						<td></td>
						<td><span class="error-message">*</span>&nbsp;<span class="arial_11_000"><strong>City:</strong></span><br />
							  <input type="text" name="city" id="city" style="width:373px;" value="<?php echo ((is_array($_tmp=@$this->_tpl_vars['oSubscriber']->mail_city)) ? $this->_run_mod_handler('default', true, $_tmp, '') : smarty_modifier_default($_tmp, '')); ?>
" />
							  <br /><br /></td></tr>
						<tr>
						<td width="397" align="left" valign="middle" class="arial_12_3b393a"><span class="error-message">*</span>&nbsp;<span class="arial_11_000"><strong>State:</strong></span><br />
							  <input type="text" name="state" id="state" style="width:373px;" value="<?php echo ((is_array($_tmp=@$this->_tpl_vars['oSubscriber']->mail_state)) ? $this->_run_mod_handler('default', true, $_tmp, '') : smarty_modifier_default($_tmp, '')); ?>
" />
							  <br /><br /></td>
						<td></td>
						<td width="397" align="left" valign="middle" class="arial_12_3b393a"><span class="error-message">*</span>&nbsp;<span class="arial_11_000"><strong>Zip Code:</strong></span><br />
							  <input type="text" name="zip_code" id="zip_code" style="width:373px;" value="<?php echo ((is_array($_tmp=@$this->_tpl_vars['oSubscriber']->mail_postal_code)) ? $this->_run_mod_handler('default', true, $_tmp, '') : smarty_modifier_default($_tmp, '')); ?>
"/>
							  <br /><br /></td></tr>
						<tr>
						<td></td>
						<td></td>
						<td width="397" align="left" valign="middle" class="arial_12_3b393a"></td>
						</tr>
						</table>
						</td></tr>
						  <tr>
						  <td colspan="3" height="50">
						  <table width="100%" border="0" cellspacing="0" cellpadding="0">
							  <tr>
								<td width="3%" align="left" valign="middle">
								<?php if (isset ( $this->_tpl_vars['oSubscriber']->isBillingInfo )): ?>
									<?php if ($this->_tpl_vars['oSubscriber']->isBillingInfo == 1): ?>
									<input type="checkbox" name="billingInfoStatus" id="billingInfoStatus" checked="checked" />
									<?php else: ?>
									<input type="checkbox" name="billingInfoStatus" id="billingInfoStatus"/>
									<?php endif; ?>
								<?php else: ?>
								<input type="checkbox" name="billingInfoStatus" id="billingInfoStatus" checked="checked" />
								<?php endif; ?>
								<input type="hidden" id="isBillingInfo" name="isBillingInfo" value="" />
								</td>
								<td width="97%" align="left" valign="middle" class="arial_11_000" style="font-weight:normal;">If billing address is different?</td>
							  </tr>
							</table></td></tr>
							<tr><td colspan="3">
					  <!-- Billing Info table starts here -->
						<table id="billingSection" width="100%">
						<tr>
						<td><span class="error-message">*</span>&nbsp;<span class="arial_11_000"><strong>Street Address:</strong></span><br />
							  <input type="text" name="billingAddress" id="billingAddress"/ style="width:373px;" value="<?php echo ((is_array($_tmp=@$this->_tpl_vars['oSubscriber']->billingAddress)) ? $this->_run_mod_handler('default', true, $_tmp, '') : smarty_modifier_default($_tmp, '')); ?>
" />
							  <br /><br /></td>
						<td></td>
						<td><span class="error-message">*</span>&nbsp;<span class="arial_11_000"><strong>City:</strong></span><br />
							  <input type="text" name="billingCity" id="billingCity" style="width:373px;" value="<?php echo ((is_array($_tmp=@$this->_tpl_vars['oSubscriber']->billingCity)) ? $this->_run_mod_handler('default', true, $_tmp, '') : smarty_modifier_default($_tmp, '')); ?>
" />
							  <br /><br /></td></tr>
						<tr>
						<td width="397" align="left" valign="middle" class="arial_12_3b393a"><span class="error-message">*</span>&nbsp;<span class="arial_11_000"><strong>State:</strong></span><br />
							  <input type="text" name="billingState" id="billingState"/ style="width:373px;" value="<?php echo ((is_array($_tmp=@$this->_tpl_vars['oSubscriber']->billingState)) ? $this->_run_mod_handler('default', true, $_tmp, '') : smarty_modifier_default($_tmp, '')); ?>
" />
							  <br /><br /></td>
						<td></td>
						<td width="397" align="left" valign="middle" class="arial_12_3b393a"><span class="error-message">*</span>&nbsp;<span class="arial_11_000"><strong>Zip Code:</strong></span><br />
							  <input type="text" name="billingZipCode" id="billingZipCode"/ style="width:373px;" value="<?php echo ((is_array($_tmp=@$this->_tpl_vars['oSubscriber']->billingZipCode)) ? $this->_run_mod_handler('default', true, $_tmp, '') : smarty_modifier_default($_tmp, '')); ?>
" />
							  <br /><br /></td></tr>
						<tr>
						<td></td>
						<td></td>
						<td width="397" align="left" valign="middle" class="arial_12_3b393a"></td>
						</tr>
						</table>
						<!-- Billing Info table ends here -->
						</td></tr>
						<tr>
							<td colspan="3">
						  	<table width="100%" border="0" cellspacing="0" cellpadding="0">
							<tr>
								<td height="30" width="3%" align="left" valign="middle"><input type="checkbox" name="agree" id="agree" />
								<input type="hidden" name="is_agree" id="is_agree" value="0" />
								<input type="hidden" name="subscriptionfee" id="subscriptionfee" value="<?php echo $this->_tpl_vars['subscription_amount']; ?>
" />
								</td>
								<td width="97%" align="left" valign="middle" class="arial_11_000" style="font-weight:normal;">
								<span class="error-message">*</span>&nbsp;I agree to pay <strong>$<?php echo $this->_tpl_vars['subscription_amount']; ?>
</strong> to create a subscriber account.</td>
							</tr>
							<tr>
								<td  height="30" width="3%" align="left" valign="middle">
								<input type="checkbox" name="i_agree_chk" id="i_agree_chk" />					
								</td>
								<td width="97%" align="left" valign="middle" class="arial_11_000" style="font-weight:normal;"><span class="error-message">*</span>&nbsp;I agree to the <span onclick="popup('index.php?stage=pages&mode=EndUserAgreement')" class="enduseragree" style="background-color:none;cursor: pointer;">end user agreement</span>.</td>
							</tr>
							</table>
							</td>
							</tr>						
					</table></td>
				  </tr>
				</table></td>
			  </tr>
			  <tr>
				<td align="left" valign="top" bgcolor="#b1b0ac"><img src="images/trans.gif" width="1" height="1" alt="" /></td>
			  </tr>
			  <tr>
				<td align="left" valign="top" style="padding:34px 365px 5px 365px;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
					<td align="left" valign="middle">
					<input type="hidden" name="article_id" value="<?php echo $this->_tpl_vars['articleID']; ?>
" />
					<input type="hidden" name="stage" value="subscriber" />
					<input type="hidden" name="mode" value="SaveSubscriberJoinDirect" />
					<input type="image" src="images/img_submit_.gif" alt="" width="78" height="27" border="0" name="submit" /></td>
					<td align="right" valign="middle"><img src="images/img_cancel.gif" alt="" width="78" height="27" border="0" onclick="window.location='index.php'" style="cursor:pointer;" /></td>
				  </tr>
				</table></td>
			  </tr>
			</table></td>
			</tr>
		  </table></td>
		</tr>
	  </table></td>
  </tr>
</table>
</form>
</td>
</tr>				  
<?php echo '
<script language=\'javascript\' type=\'text/javascript\'>
var form = document.forms["subscriberJoin"];
	var frmvalidator	=	new Validator("subscriberJoin");
	frmvalidator.addValidation("first_name","req","Please enter your First Name.");
	frmvalidator.addValidation("first_name","alphabetic_space","Only alphabets are allowed in First Name.");
	frmvalidator.addValidation("last_name","req","Please enter your Last Name.");
	frmvalidator.addValidation("last_name","alphabetic_space","Only alphabets are allowed in Last Name.");
	frmvalidator.addValidation("user_name","req","Please enter User Name");
	frmvalidator.addValidation("password","req","Please enter password");
	frmvalidator.addValidation("password","alphanumeric","Please enter alpha numeric characters");
	frmvalidator.addValidation("email","req","Please enter Email");
	frmvalidator.addValidation("email","email","Please enter a valid Email");
	frmvalidator.addValidation("address","req","Please enter Address");
	frmvalidator.addValidation("city","req","Please enter City");
	frmvalidator.addValidation("state","req","Please enter state");
	frmvalidator.setAddnlValidationFunction(DoCustomValidation);
	
    function DoCustomValidation()
	{
		var form = document.forms["subscriberJoin"];
		
		if( isNaN(document.forms[0].primary_afflliates.value) && (codeexist == false) )
		{
			alert("Please enter correct affiliate code.");
			document.forms[0].primary_afflliate_code.focus();
			return false;
		}
		if(document.forms[0].password.value=="")
		{
			alert("Please enter the Password.");
			document.forms[0].password.focus();
			return false;
		}
		else if(document.forms[0].password.value.length <6)
		{
		    alert("Password should be atleast of 6 characters.");
			document.forms[0].password.focus();
			return false;
		}
		else if(document.forms[0].re_password.value=="")
		{
			alert("Please enter Confirm Password.");
			document.forms[0].re_password.focus();
			return false;
		}
		else
		{
			 if(document.forms[0].password.value != document.forms[0].re_password.value){
				 alert("Confirm password does not matched.");
				 document.forms[0].re_password.value="";
				 document.forms[0].re_password.focus();
				 document.forms[0].re_password.select();
				 return false;
			}			 
		}
		
		
		if(document.forms[0].primary_afflliates.selectedIndex == \'0\'){
			if(document.forms[0].primary_afflliate_code.value == ""){
				alert("Please select a primery affiliate or enter primary affiliate code.");
				document.forms[0].primary_afflliate_code.focus();
				return false;
			} 
		}		
	
		if(document.forms[0].billingInfoStatus.checked){
			if(document.forms[0].billingAddress.value == ""){
				alert("Please Enter Billing Address.");
				document.forms[0].billingAddress.focus();
				return false;
			} 
			
			if(document.forms[0].billingState.value == ""){
				alert("Please Enter Billing State.");
				document.forms[0].billingState.focus();
				return false;
			} 
			else{
				var charpos = document.forms[0].billingState.value.search("[^A-Za-z\\\\s]");
				if (document.forms[0].billingState.value.length > 0 && charpos >= 0)
				{
					alert("Billing State : Only alphabets are allowed.");
					document.forms[0].billingState.focus();
					return false;
				} 
			}
			
			if(document.forms[0].billingZipCode.value == ""){
				alert("Please Enter Billing Zip Code.");
				document.forms[0].billingZipCode.focus();
				return false;
			}
			else{
				var charpos = document.forms[0].billingZipCode.value.search("[^A-Za-z0-9]");
				if (document.forms[0].billingZipCode.value.length > 0 && charpos >= 0)
				{
					alert("Billing Zip Code : Only alphanumeric values are allowed.");
					document.forms[0].billingZipCode.focus();
					return false;
				} 
			}
			
			if(document.forms[0].billingCity.value == ""){
				alert("Please Enter Billing City.");
				document.forms[0].billingCity.focus();
				return false;
			}
			else 
			{
				var charpos = document.forms[0].billingCity.value.search("[^A-Za-z\\\\s]");
				if (document.forms[0].billingCity.value.length > 0 && charpos >= 0)
				{
					alert("Billing City : Only alphabets are allowed.");
					document.forms[0].billingCity.focus();
					return false;
				} 
			}
		}
		
		if(!form.agree.checked) {

			var subscriptionfee = form.subscriptionfee.value;

			alert("You need to agree to pay $"+subscriptionfee+" to create a subscriber account.");
			form.agree.focus();
			return false;
		}
		
		if(!form.i_agree_chk.checked) {

			alert("You need to agree to end user agreement.");
			form.i_agree_chk.focus();
			return false;
		}

		return true;
	}
	
	function trim(str)
	{ 
		while(str.charAt(0) == (" ") )
		{ 
			str = str.substring(1);
		}		
		
		while(str.charAt(str.length-1) == " ")
		{ 
			str = str.substring(0,str.length-1);
		}
		return str;
	}
</script>
'; ?>