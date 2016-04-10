<?php /* Smarty version 2.6.10, created on 2012-04-19 17:44:07
         compiled from visitor/ihtml/onetimepayment_information.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'default', 'visitor/ihtml/onetimepayment_information.html', 167, false),)), $this); ?>
<?php echo '
<script
	language="javascript" src="scripts/gen_validatorv4.js"></script>
<script
	type=\'text/javascript\' src=\'scripts/jquery-1.3.2.min.js\'></script>
<link
	rel="stylesheet" href="css/tipsy.css" type="text/css" />

<script
	type="text/javascript" src="scripts/jquery.tipsy.js"></script>
<script
	type="text/javascript" src="../scripts/jquery.livequery.min.js"></script>


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
		
		/*
		$(\'#primary_afflliates\').livequery(\'change\', function(event) {
			if($(\'#primary_afflliates\').val() !=\'\') {
				$(\'#primary_afflliate_code\').hide();		
				$(\'#primary_afflliate_code_detail\').html(\'Not required\');		
			}	
			else	{
				$(\'#primary_afflliate_code\').show();					
				$(\'#primary_afflliate_code_detail\').html(\'\');		
			}
		}); 
		
		*/
	   
	   	$(document).ready(function(){
		
			if ($(\'#billingInfoStatus\').attr(\'checked\')) {
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
		
		/*
			$(\'#primary_afflliate_code\').change(function(){
				$.ajax({					
				//this is the php file that processes the data and send mail
				url: "index.php?stage=subscriber&mode=CheckAffiliateCode",							 
				type: "GET",				 
				data: \'primary_afflliate_code=\' + $(this).val(),    							 
				cache: false,							 
				success: function(html) {             			
						if(html == 0) {
							$("#codeinfo").html("<span style=\'color:red\'>Affiliate code  " + $("#primary_afflliate_code").val() + " does not exist.</span>");
							codeexist = false;
							$("#primary_afflliate_code").val(\'\');
						}
						else {
							$("#codeinfo").html("Affiliate  " + $(this).val() + " Exist.");
							codeexist = true;
						}								
					}	     
				});						
			});
		*/	
		});
	</script>
'; ?>

		<form name='oneTimePaymentInformation' method='post'
			enctype="multipart/form-data">
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
				<tr>
					<td align="left" valign="top" class="bg_f7f6f2"
						style="padding: 24px 15px 51px 12px;">
						<table width="100%" border="0" cellspacing="0" cellpadding="0">
							<tr>
								<td class="arial_16_c40306">
									<table width="100%" border="0" cellspacing="0" cellpadding="0">
										<tr>
											<td align="left" valign="top" class="arial_16_c40306">
												<table width="100%" border="0" cellspacing="0"
													cellpadding="0">
													<tr>
														<td align="left" valign="top">
															<table width="100%" border="0" cellspacing="0"
																cellpadding="0">
																<tr>
																	<td height="37" align="left" valign="top"
																		class="Trebuchet_27_c60000">Register your Information
																	</td>
																</tr>
																<tr>
																	<td align="left" valign="top" bgcolor="#b1b0ac"
																		class="arial_20_c40306"><img src="images/trans.gif"
																		width="1" height="1" alt="" /></td>
																</tr>
																<?php if ($this->_tpl_vars['sErrorMsg'] != ''): ?>
																<tr>
																	<td valign="bottom" align="center"
																		class="error-message"
																		style="padding-top: 10px; padding-bottom: 10px;"><?php echo $this->_tpl_vars['sErrorMsg']; ?>
</td>
																</tr>
																<?php endif; ?>

																<tr>
																	<td align="left" valign="top"
																		style="padding: 27px 5px 15px 0px;"><table
																			width="100%" border="0" cellspacing="0"
																			cellpadding="0">
																			<tr>
																				<td width="400" align="left" valign="top"><table
																						width="100%" border="0" cellspacing="0"
																						cellpadding="0">
																						
																						<tr>
																							<td width="397" height="50" align="left"
																								valign="middle" class="arial_12_3b393a"><span
																								class="arial_12_000"> <strong><span
																										class="error-message">*</span>First Name:</strong>
																							</span><strong><br /> <input type="text" tabIndex="1" 
																									name="first_name" id="first_name"
																									style="width: 373px;"
																									value="<?php echo ((is_array($_tmp=@$this->_tpl_vars['oVisitor']->first_name)) ? $this->_run_mod_handler('default', true, $_tmp, '') : smarty_modifier_default($_tmp, '')); ?>
" /><br />
																									<br />
																							
																							</td>
																						</tr>
																						
																						<tr>
																							<td width="397" height="50" align="left"
																								valign="middle" class="arial_12_3b393a"><span
																								class="arial_11_000"><strong><span
																										class="error-message">*</span>Email:</strong>
																							</span><br /> <input type="text" name="email"  tabIndex="3"  
																								id="email" style="width: 373px;"
																								value="<?php echo ((is_array($_tmp=@$this->_tpl_vars['oVisitor']->email)) ? $this->_run_mod_handler('default', true, $_tmp, '') : smarty_modifier_default($_tmp, '')); ?>
" /><br />
																								<br /> </strong></td>
																						</tr>
																						
																						<tr>
																							<td width="397" height="50" align="left"
																								valign="middle" class="arial_12_3b393a"><span
																								class="arial_11_000"> <strong><span
																										class="error-message">*</span>Password:</strong>
																							</span><br /> <input type="password"
																								name="password" id="password"  tabIndex="5" 
																								style="width: 373px;" /> <br /> <br /></td>
																						</tr>																						
																					</table>
																					
																				</td>
																				
																				
																				<td width="86" align="left" valign="top">&nbsp;</td>
																				
																				
																				<td align="left" valign="top">
																					<table
																						width="100%" border="0" cellspacing="0"
																						cellpadding="0">

																						<tr>
																							<td width="397" height="50" align="left"
																								valign="middle" class="arial_12_3b393a"><span
																								class="arial_12_000"> <strong><span
																										class="error-message">*</span>Last Name:</strong>
																							</span><br /> <input type="text" name="last_name"  tabIndex="2" 
																								id="last_name" style="width: 373px;"
																								value="<?php echo ((is_array($_tmp=@$this->_tpl_vars['oVisitor']->last_name)) ? $this->_run_mod_handler('default', true, $_tmp, '') : smarty_modifier_default($_tmp, '')); ?>
" />
																								<br /> <br /></td>
																						</tr>
																						<tr>
																							<td width="397" height="50" align="left"
																								valign="middle" class="arial_12_3b393a"><span
																								class="arial_11_000"><strong><span
																										class="error-message">*</span>User Name:</strong>
																							</span> <br /> <input type="text"
																								name="user_name" id="user_name"
																								style="width: 373px;"  tabIndex="4" 
																								value="<?php echo ((is_array($_tmp=@$this->_tpl_vars['oVisitor']->user_name)) ? $this->_run_mod_handler('default', true, $_tmp, '') : smarty_modifier_default($_tmp, '')); ?>
" /><br />
																								<br /></td>
																						</tr>																						
																						<tr>
																							<td width="397" height="50" align="left"
																								valign="middle" class="arial_12_3b393a"><span
																								class="arial_11_000"><strong><span
																										class="error-message">*</span>Confirm
																										Password:</strong> </span><br /> <input
																								type="password" name="re_password"  tabIndex="6" 
																								id="re_password" style="width: 373px;" /> <br />
																								<br /></td>
																						</tr>
																					</table>																					

																				</td>
																			</tr>


																			<tr>
																				<td colspan="3">
																					<table width="100%">
																						<tr>
																							<td><span class="arial_11_000"><strong><span
																										class="error-message">*</span>Street Address:</strong>
																							</span><br /> <input type="text" name="address"
																								id="address" style="width: 373px;"  tabIndex="7" 
																								value="<?php echo ((is_array($_tmp=@$this->_tpl_vars['oVisitor']->mail_address)) ? $this->_run_mod_handler('default', true, $_tmp, '') : smarty_modifier_default($_tmp, '')); ?>
" />
																								<br /> <br /></td>
																							<td></td>
																							<td><span class="arial_11_000"><strong><span
																										class="error-message">*</span>City:</strong> </span><br />
																								<input type="text" name="city" id="city"  tabIndex="8" 
																								value="<?php echo ((is_array($_tmp=@$this->_tpl_vars['oVisitor']->mail_city)) ? $this->_run_mod_handler('default', true, $_tmp, '') : smarty_modifier_default($_tmp, '')); ?>
"
																								style="width: 373px;" /> <br /> <br /></td>
																						</tr>
																						<tr>
																							<td width="397" align="left" valign="middle"
																								class="arial_12_3b393a"><span
																								class="arial_11_000"><strong><span
																										class="error-message">*</span>State:</strong>
																							</span><br /> <input type="text" name="state"
																								id="state"  tabIndex="9" 
																								value="<?php echo ((is_array($_tmp=@$this->_tpl_vars['oVisitor']->mail_state)) ? $this->_run_mod_handler('default', true, $_tmp, '') : smarty_modifier_default($_tmp, '')); ?>
"
																								style="width: 373px;" /> <br /> <br /></td>
																							<td></td>
																							<td width="397" align="left" valign="middle"
																								class="arial_12_3b393a"><span
																								class="arial_11_000"><strong><span
																										class="error-message">*</span>Zip Code:</strong>
																							</span><br /> <input type="text" name="zip_code"  tabIndex="10" 
																								id="zip_code"
																								value="<?php echo ((is_array($_tmp=@$this->_tpl_vars['oVisitor']->mail_postal_code)) ? $this->_run_mod_handler('default', true, $_tmp, '') : smarty_modifier_default($_tmp, '')); ?>
"
																								style="width: 373px;" /> <br /> <br /></td>
																						</tr>
																						<tr>
																							<td></td>
																							<td></td>
																							<td width="397" align="left" valign="middle"
																								class="arial_12_3b393a"></td>
																						</tr>
																					</table>
																				</td>
																			</tr>
																			<tr>
																				<td colspan="3" height="50">
																					<table width="100%" border="0" cellspacing="0"
																						cellpadding="0">
																						<tr>
																							<td width="3%" align="left" valign="middle">
																							<?php if ($this->_tpl_vars['oVisitor']->isBillingInfo == 1): ?> 
																							<input
																								type="checkbox" name="billingInfoStatus"  tabIndex="11" 
																								id="billingInfoStatus" checked="checked" />
																							<?php else: ?>
																										<input type="checkbox"
																								name="billingInfoStatus" id="billingInfoStatus"  tabIndex="11"  />
																							<?php endif; ?> 																							
																							<input type="hidden" id="isBillingInfo" name="isBillingInfo" value="" />
																							</td>
																							<td width="97%" align="left" valign="middle"
																								class="arial_11_000">If Billing address is
																								different?</td>
																						</tr>
																					</table></td>
																			</tr>
																			<tr>
																				<td colspan="3">
																					<!-- Billing Info table starts here -->
																					<table id="billingSection" width="100%">
																						<tr>
																							<td><span class="arial_11_000"><strong><span
																										class="error-message">*</span>Street Address:</strong>
																							</span><br /> <input type="text"
																								name="billingAddress" id="billingAddress"  tabIndex="12" 
																								style="width: 373px;"
																								value="<?php echo ((is_array($_tmp=@$this->_tpl_vars['oVisitor']->billingAddress)) ? $this->_run_mod_handler('default', true, $_tmp, '') : smarty_modifier_default($_tmp, '')); ?>
" />
																								<br /> <br /></td>
																							<td></td>
																							<td><span class="arial_11_000"><strong><span
																										class="error-message">*</span>City:</strong> </span><br />
																								<input type="text" name="billingCity"
																								id="billingCity" style="width: 373px;"  tabIndex="13" 
																								value="<?php echo ((is_array($_tmp=@$this->_tpl_vars['oVisitor']->billingCity)) ? $this->_run_mod_handler('default', true, $_tmp, '') : smarty_modifier_default($_tmp, '')); ?>
" />
																								<br /> <br /></td>
																						</tr>
																						<tr>
																							<td width="397" align="left" valign="middle"
																								class="arial_12_3b393a"><span
																								class="arial_11_000"><strong><span
																										class="error-message">*</span>State:</strong>
																							</span><br /> <input type="text"
																								name="billingState" id="billingState"  tabIndex="14" 
																								style="width: 373px;"
																								value="<?php echo ((is_array($_tmp=@$this->_tpl_vars['oVisitor']->billingState)) ? $this->_run_mod_handler('default', true, $_tmp, '') : smarty_modifier_default($_tmp, '')); ?>
" />
																								<br /> <br /></td>
																							<td></td>
																							<td width="397" align="left" valign="middle"
																								class="arial_12_3b393a"><span
																								class="arial_11_000"><strong><span
																										class="error-message">*</span>Zip Code:</strong>
																							</span><br /> <input type="text"  tabIndex="15" 
																								name="billingZipCode" id="billingZipCode"
																								style="width: 373px;"
																								value="<?php echo ((is_array($_tmp=@$this->_tpl_vars['oVisitor']->billingZipCode)) ? $this->_run_mod_handler('default', true, $_tmp, '') : smarty_modifier_default($_tmp, '')); ?>
" />
																								<br /> <br /></td>
																						</tr>
																						<tr>
																							<td></td>
																							<td></td>
																							<td width="397" align="left" valign="middle"
																								class="arial_12_3b393a"></td>
																						</tr>
																					</table> <!-- Billing Info table ends here -->
																				</td>
																			</tr>
																		</table></td>
																</tr>
															</table></td>
													</tr>
												
													<tr>
														<td colspan="3" height="50">
															<table width="100%" border="0" cellspacing="0" cellpadding="0">
																<tr>
																	<td width="3%" align="left" valign="middle"><input
																		type="checkbox" name="agree" id="agree" tabIndex="16" /> <input
																		type="hidden" name="is_agree" id="is_agree"  
																		value="0" /> <input type="hidden"
																		name="onetimefee" id="onetimefee" value="<?php echo $this->_tpl_vars['oneTimePetitionSignFee']; ?>
" />
																	</td>
																	<td width="97%" align="left" valign="middle"
																		class="arial_11_000"><span class="error-message">*</span>&nbsp;I
																		agree to pay $<span id="onetimefeespan"><?php echo $this->_tpl_vars['oneTimePetitionSignFee']; ?>
</span>
																		as one time fee to sign the petition.</td>
																</tr>
																<tr>
																	<td width="3%" align="left" valign="middle"><input
																		type="checkbox" name="i_agree_chk"  tabIndex="17" 
																		id="i_agree_chk" /> <input type="hidden"
																		name="i_agree" id="i_agree" value="0" />
																	</td>
																	<td width="97%" align="left" valign="middle"
																		class="arial_11_000"><span class="error-message">*</span>&nbsp;I
																		agree to the <span
																		onclick="popup('index.php?stage=pages&mode=EndUserAgreement')"
																		class="enduseragree"
																		style="background-color: none; cursor: pointer;">end
																			user agreement</span>.</td>
																</tr>
															</table>
														</td>
													</tr>													
													
													
													<tr>
														<td align="left" valign="top"></td>
													</tr>
													<tr>
														<td align="left" valign="top" bgcolor="#b1b0ac"><img
															src="images/trans.gif" width="1" height="1" alt="" /></td>
													</tr>

													<tr>
														<td align="left" valign="top"
															style="padding: 34px 365px 5px 365px;"><table
																width="100%" border="0" cellspacing="" cellpadding="">
																<tr>
																	<td align="left" valign="middle"><input type="hidden"
																		name="stage" value="visitor" /> <input type="hidden"
																		name="mode" value="SaveOneTimeSubscriber" /> <input
																		type="hidden" name="article_id" value="<?php echo $this->_tpl_vars['articleID']; ?>
" />
																		<input type="image" src="images/img_submit_.gif"
																		alt="" width="78" height="27" border="0" name="submit"  tabIndex="18"  />
																	
																	</td>
																	<td align="right" valign="middle">																		
																		<img
																		src="images/img_cancel.gif" alt="" width="78"  tabIndex="19" 
																		height="27" border="0"
																		onclick="window.location='index.php'"
																		style="cursor: pointer;" /></td>
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
	
<?php echo '
<script language=\'javascript\' type=\'text/javascript\'>
	var form = document.forms["oneTimePaymentInformation"];
	var frmvalidator	=	new Validator("oneTimePaymentInformation");
	frmvalidator.addValidation("first_name","req","Please enter your First Name.");
	frmvalidator.addValidation("first_name","alphabetic_space","Only alphabets are allowed in First Name.");
	frmvalidator.addValidation("last_name","req","Please enter your Last Name.");
	frmvalidator.addValidation("last_name","alphabetic_space","Only alphabets are allowed in Last Name.");
	frmvalidator.addValidation("user_name","req","Please enter User Name.");
	frmvalidator.addValidation("password","req","Please enter Password.");
	frmvalidator.addValidation("password","alphanumeric","Please enter alpha numeric characters in Password.");
	frmvalidator.addValidation("email","req","Please enter Email.");
	frmvalidator.addValidation("email","email","Please enter a valid Email.");
	frmvalidator.addValidation("address","req","Please enter Address.");
	frmvalidator.addValidation("city","req","Please enter City.");
	frmvalidator.addValidation("state","req","Please enter State.");
	frmvalidator.setAddnlValidationFunction(DoCustomValidation);
	
    function DoCustomValidation()
	{
		var form = document.forms["oneTimePaymentInformation"];
		/*
		if( isNaN(form.primary_afflliates.value) && (codeexist == false) )
		{
			alert("Please enter correct affiliate code.");
			form.primary_afflliate_code.focus();
			return false;
		}
		*/
		if(form.password.value=="")
		{
			alert("Please enter the Password.");
			form.password.focus();
			return false;
		}
		else if(form.password.value.length <6)
		{
		    alert("Password should be atleast of 6 characters.");
		    form.password.focus();
			return false;
		}
		else if(form.re_password.value=="")
		{
			alert("Please enter Confirm Password.");
			form.re_password.focus();
			return false;
		}
		else
		{
			if(form.password.value != form.re_password.value){
				alert("Confirm password does not matched.");
				form.re_password.value="";
				form.re_password.focus();
				return false;
			}
		}		
		/*
		if(form.primary_afflliates.selectedIndex == \'0\'){
			if(form.primary_afflliate_code.value == ""){
				alert("Please select a primary affiliate or enter primary affiliate code.");
				form.primary_afflliate_code.focus();
				return false;
			} 
		}
	*/
		if(form.billingInfoStatus.checked){
			if(form.billingAddress.value == ""){
				alert("Please Enter Billing Address.");
				form.billingAddress.focus();
				return false;
			} 
			
			if(form.billingState.value == ""){
				alert("Please Enter Billing State.");
				form.billingState.focus();
				return false;
			} else {
				var charpos = form.billingState.value.search("[^A-Za-z\\\\s]");
				if (form.billingState.value.length > 0 && charpos >= 0)
				{
					alert("Billing State : Only alphabets are allowed.");
					form.billingState.focus();
					return false;
				} 
			}
			
			if(form.billingCity.value == ""){
				alert("Please Enter Billing City.");
				form.billingCity.focus();
				return false;
			} else {
				var charpos = form.billingCity.value.search("[^A-Za-z\\\\s]");
				if (form.billingCity.value.length > 0 && charpos >= 0)
				{
					alert("Billing City : Only alphabets are allowed.");
					form.billingCity.focus();
					return false;
				} 
			}
			
			if(form.billingZipCode.value == ""){
				alert("Please Enter Billing Zip Code.");
				form.billingZipCode.focus();
				return false;
			} else {
				var charpos = form.billingZipCode.value.search("[^A-Za-z0-9]");
				if (form.billingZipCode.value.length > 0 && charpos >= 0)
				{
					alert("Billing Zip Code : Only alphanumeric values are allowed.");
					form.billingZipCode.focus();
					return false;
				} 
			}			
		}
		
		if(!form.agree.checked) {
			
			alert("You need to agree to pay a one time fee to sign the petition.");
			form.agree.focus();
			return false;
		}
		if(!form.i_agree_chk.checked) {
			
			alert("You need to the end user agreement.");
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
