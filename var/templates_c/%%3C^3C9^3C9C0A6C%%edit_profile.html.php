<?php /* Smarty version 2.6.10, created on 2013-01-28 10:56:21
         compiled from subscriber/ihtml/edit_profile.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_checkboxes', 'subscriber/ihtml/edit_profile.html', 227, false),)), $this); ?>
<?php echo '
<script language="javascript" src="scripts/gen_validatorv4.js"></script>
<script type=\'text/javascript\' src=\'scripts/jquery-1.3.2.min.js\'></script>
<script type="text/javascript">
	$(document).ready(
	function() {

		if ($(\'#billingInfoStatus\').attr(\'checked\')) {
			$("#billingSection").show();
			$(\'#isBillingInfo\').attr(\'value\', \'1\');
		} else {
			$("#billingSection").hide();
		}

			$(\'#billingInfoStatus\').click(
			function() {
				$(\'#billingInfoStatus\').is(\':checked\') ? $(
						"#billingSection").show() : $(
						"#billingSection").hide();
				$(\'#billingInfoStatus\').is(\':checked\') ? $(
						\'#isBillingInfo\').attr(\'value\', \'1\') : $(
						\'#isBillingInfo\').attr(\'value\', \'0\');
			});

			$(\'#billingInfoStatus\').change(
			function() {
				$(\'#billingInfoStatus\').is(\':checked\') ? $(
						"#billingSection").show() : $(
						"#billingSection").hide();
				$(\'#billingInfoStatus\').is(\':checked\') ? $(
						\'#isBillingInfo\').attr(\'value\', \'1\') : $(
						\'#isBillingInfo\').attr(\'value\', \'0\');
			});
	});
</script>
'; ?>

<form name="profileEdit" method="post" action="index.php?stage=subscriber&mode=ProfileEdit">
<tr>
	<td valign="top" align="left" style="padding-top: 10px;">
	<table width="100%" cellspacing="0" cellpadding="0" border="0">
	<tbody>
	<tr>
		<td valign="top" align="left" style="padding: 24px 15px 51px 12px;" class="bg_f7f6f2">
		<table width="100%" cellspacing="0" cellpadding="0" border="0">
		<tbody>
		<tr>
			<td class="arial_16_c40306">
			<table width="100%" cellspacing="0" cellpadding="0" border="0">
			<tbody>
			<tr>
				<td valign="top" align="left" class="arial_16_c40306">
				<table width="100%" cellspacing="0" cellpadding="0" border="0">
				<tbody>
				<tr>
					<td valign="top" align="left">
					<table width="100%" cellspacing="0" cellpadding="0" border="0">
					<tbody>
					<tr>
						<td valign="top" align="left" height="37" class="Trebuchet_27_c60000" colspan="2">
						<?php echo $this->_tpl_vars['oSubscriber']->first_name; ?>
 <?php echo $this->_tpl_vars['oSubscriber']->last_name; ?>
's Profile
						</td>
					</tr>
					<tr>
						<td width="34%" valign="middle" align="left" style="padding-left: 14px;" class="topsublink_bg arial_15_000_bold"></td>
						<td width="66%" valign="middle" align="right" style="padding: 6px 14px;" class="topsublink_bg">
						<table cellspacing="0" cellpadding="0" border="0">
							<tbody>
								<tr>
																	
									<?php if ($_SESSION['member_type'] == 'subscriber'): ?>													
										<td width="117" align="right" valign="top"><a href="index.php?stage=subscriber&mode=MyAffiliates" class="button"><span>My Affiliates</span></a></td>
										<td width="106" align="right" valign="top"><a class="button" href="index.php?stage=subscriber&mode=VoteAlerts"><span>Vote Alerts</span></a></td>																		
										<td width="100" align="right" valign="top"><a class="Activebutton" href="index.php?stage=subscriber&mode=MyProfile" class="button"><span> My Profile</span></a></td>																										
									<?php endif; ?>							
										
										<td width="202" align="right" valign="top"><a href="index.php?stage=subscriber&mode=ElectedRepresentatives" class="button"><span>Elected Representatives</span></a></td>
										
								</tr>									
							</tbody>
						</table>
						</td>
					</tr>
					<tr>
						<td valign="bottom" height="37" align="left"
							colspan="2" class="arial_14_c30100"
							style="padding-bottom: 5px;">
								Personal Information
						</td>							
					</tr>
					<tr>
						<td valign="top" bgcolor="#b1b0ac" align="left"
							class="arial_20_c40306" colspan="2"><img
							width="1" height="1" alt=""
							src="images/trans.gif">
						</td>
					</tr>
					<?php if ($this->_tpl_vars['sErrorMsg'] != ''): ?>
					<tr>
						<td valign="middle" align="center" colspan="2" class="error-message" style="padding-top:10px;padding-bottom:10px;"><?php echo $this->_tpl_vars['sErrorMsg']; ?>
</td>
					</tr>
					<?php endif; ?>																					
					<tr>
						<td valign="top" align="left" style="padding-top: 19px;" colspan="2">
						<table width="100%" cellspacing="0" cellpadding="0" border="0">
						<tbody>
						<tr>
							<td width="400" valign="top" align="left">
							<table width="100%" cellspacing="0" cellpadding="0" border="0">
							<tbody>
							<tr>
								<td width="397" valign="middle" align="left" height="50" class="arial_12_3b393a">
								<span class="arial_11_000">
								<strong>User Name:</strong></span><br />
								<input class="inactive_ele" type="text" style="width: 373px;" id="UserName" name="UserName" value="<?php echo $this->_tpl_vars['oSubscriber']->user_name; ?>
" READONLY tabIndex="1"><br>
								<br />
								</td>
							</tr>
							
							<tr>
								<td width="397" valign="middle" align="left" height="50" class="arial_12_3b393a">
								<span class="arial_12_000"><strong><span class="error-message">*</span>First Name:</strong>
								</span><br />
								<input type="text" style="width: 373px;" id="firstName" name="firstName" value="<?php echo $this->_tpl_vars['oSubscriber']->first_name; ?>
" tabIndex="3" />
								<br /><br /></td>
							</tr>
						
							<tr>
								<td width="397" valign="middle" align="left" height="55" class="arial_12_3b393a">
								<span class="arial_11_000"><strong>New Password:</strong></span>																														
								<br />
								<input type="password" style="width: 373px;" id="password" name="password" tabIndex="5" /></td>
							</tr>
							
							</tbody>
							</table>
							</td>
							<td width="86" valign="top" align="left">&nbsp;</td>
							<td valign="top" align="left">
							<table width="100%" cellspacing="0" cellpadding="0" border="0">
							<tbody>
							<tr>
								<td width="397" valign="middle" align="left" height="50" class="arial_12_3b393a">
								<span class="arial_11_000"><strong><span class="error-message">*</span>Email:</strong>
								</span><br />
								<input type="text" style="width: 373px;" id="email" name="email" value="<?php echo $this->_tpl_vars['oSubscriber']->email; ?>
" tabIndex="2" /> <br />
									<br />
								</td>
							</tr>
							
							<tr>
								<td width="397" valign="middle" align="left" height="50" class="arial_12_3b393a">
								<span class="arial_12_000"><strong>
								<span class="error-message">*</span>Last Name:</strong></span><br />
								<input type="text" style="width: 373px;" id="lastName" name="lastName" value="<?php echo $this->_tpl_vars['oSubscriber']->last_name; ?>
" tabIndex="4" />
								<br /><br />
								</td>
							</tr>
							
							</tr>
								<td width="397" valign="middle" align="left" height="55" class="arial_12_3b393a">
								<span class="arial_11_000"><strong>Confirm New Password:</strong></span><br>
								<input type="password" style="width: 373px;" id="re_password" name="re_password" tabIndex="6" />
								</td>
							</tr>						
						
							</tbody>
							</table>
							</td>
						</tr>
						</tbody>
						</table>
						</td>
					</tr>
					
													
					<?php if ($_SESSION['member_type'] == 'subscriber'): ?>																				
					<tr>
						<td colspan="3">
						<table width="99%">												
							
						<tr>
							<td valign="top" align="left" colspan="3"
								height="10"></td>
						</tr>
						
						<tr>
							<td valign="bottom" align="left"
								class="arial_12_3b393a" colspan="3"><span
								class="arial_11_000"><strong>Affiliate Details:</strong>
							</td>
						</tr>
						
						<tr>
							<td valign="top" align="left" colspan="3"
								class="arial_20_c40306"><hr
									style="color: #cccccc; width: 98%; height: 1px; padding: 0; margin: 0; margin-bottom: 5px;" />
							</td>
						</tr>
						
						<tr>
							<td valign="top" align="left" class="arial_12_3b393a">
							
							<table width="100%" cellspacing="0" cellpadding="0" border="0">
								<tbody>							
									<tr>
										<td width="397" valign="middle" align="left" height="50" class="arial_12_3b393a">
										<span class="arial_11_000"><strong>Prime Afflliate:</strong>
										</span><br />
										<input class="inactive_ele" type="text" style="width: 373px;" id="prim_affiliate" name="prim_affiliate" value="<?php echo $this->_tpl_vars['oSubscriber']->affiliate_name; ?>
" READONLY tabIndex="7" ><br /><br />
										</td>
									</tr>
								</tbody>
							</table>			
							
							</td>
							
							<td valign="middle" align="left" class="arial_12_3b393a" width="100px">&nbsp;</td>
							
							<td valign="top" align="left" class="arial_12_3b393a" width="400px">
							
								<table width="100%" cellspacing="0" cellpadding="0" border="0">
									<tbody>
									<tr>
										<td width="379" valign="top" align="left" height="130" class="arial_12_3b393a">
										<span class="arial_11_000"><strong>Additional Affiliates:</strong>
										</span><br /><br />
										<div class='textbox'><?php echo smarty_function_html_checkboxes(array('class' => 'test','name' => 'secondary_afflliates','id' => 'secondary_afflliates','options' => $this->_tpl_vars['oAffiliates'],'selected' => $this->_tpl_vars['selectedAffiliate'],'separator' => "<br />",'tabIndex' => '8'), $this);?>
</div></td>
									</tr>
									</tbody>
								</table>
							
							
							</td>
						</tr>
						
						</table>
						</td>
					</tr>	
					<?php endif; ?>
					
					<tr>
						<td colspan="3">
						<table width="99%">
						
							
						<tr>
							<td valign="bottom" align="left"
								class="arial_12_3b393a" colspan="3"><span
								class="arial_11_000"><strong>Home Address:</strong>
							</td>
						</tr>
						
						<tr>
							<td valign="top" align="left" colspan="3"
								class="arial_20_c40306"><hr
									style="color: #cccccc; width: 98%; height: 1px; padding: 0; margin: 0; margin-bottom: 5px;" />
							</td>
						</tr>
						
						<tr>
							<td valign="middle" align="left" class="arial_12_3b393a">
							<span class="arial_11_000"><strong><span class="error-message">*</span>Street Address:</strong>
							</span><br /><input type="text" style="width: 373px;" id="streetAddress" name="streetAddress" value="<?php echo $this->_tpl_vars['oSubscriber']->mail_street_address; ?>
" tabIndex="9" /><br />
							<br /></td>
							<td valign="middle" align="left" class="arial_12_3b393a" width="100px">&nbsp;</td>
							<td valign="top" align="left" class="arial_12_3b393a" width="400px">
							<span class="arial_11_000"><strong><span class="error-message">*</span>City:</strong>
							</span><br />
							<input type="text" style="width: 373px;" id="City" name="City" tabIndex="10" value="<?php echo $this->_tpl_vars['oSubscriber']->mail_city; ?>
" /><br />
							<br />
							</td>
						</tr>
						
						
						<tr>
							<td valign="middle" align="left"
								class="arial_12_3b393a"><span
								class="arial_11_000"><strong><span
										class="error-message">*</span>State:</strong>
							</span><br>
							<!--<input type="text" style="width: 373px;"
								id="state" name="state"
								value="<?php echo $this->_tpl_vars['oSubscriber']->mail_state; ?>
" tabIndex="11" />-->
								<select style="width: 373px;" id="state" name="state">
								<?php $_from = $this->_tpl_vars['States']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['state']):
?>
								<?php if ($this->_tpl_vars['state'] == $this->_tpl_vars['oSubscriber']->mail_state): ?>
								<option value="<?php echo $this->_tpl_vars['state']; ?>
" selected="selected"><?php echo $this->_tpl_vars['state']; ?>
</option>
								<?php else: ?>
								<option value="<?php echo $this->_tpl_vars['state']; ?>
"><?php echo $this->_tpl_vars['state']; ?>
</option>
								<?php endif; ?>
								<?php endforeach; endif; unset($_from); ?>
								</select>
								
								
								<br />
							<br />
							</td>
							<td valign="middle" align="left"
								class="arial_12_3b393a" width="100px">&nbsp;</td>
							<td valign="top" align="left"
								class="arial_12_3b393a" width="400px"><span
								class="arial_11_000"><strong><span
										class="error-message">*</span>Zip Code:</strong>
							</span><br />
							<input type="text" style="width: 373px;"
								id="zipCode" name="zipCode"
								value="<?php echo $this->_tpl_vars['oSubscriber']->mail_zip_code; ?>
" tabIndex="12" /> 
							</td>
						</tr>
						</table>
						</td>
					</tr>
					<!-- Form Billing Section Starts Here -->
					<tr>
						<td colspan="3">
						<table width="99%">
						<tr>
							<td valign="top" align="left" colspan="3"
								height="10"></td>
						</tr>
						<tr>
							<td valign="bottom" align="left"
								class="arial_12_3b393a" colspan="3"><span
								class="arial_11_000"><strong>Billing
										Address:</strong>
							</td>
						</tr>
						<tr>
							<td valign="top" align="left" colspan="3"
								class="arial_20_c40306"><hr
									style="color: #cccccc; width: 98%; height: 1px; padding: 0; margin: 0; margin-bottom: 5px;" />
							</td>
						</tr>
						<tr>
							<td valign="middle" align="left"
								class="arial_12_3b393a"><span
								class="arial_11_000"><strong><span
										class="error-message">*</span>Street
										Address:</strong>
							</span><br> <input type="text"
								style="width: 373px;" id="billingAddress"
								name="billingAddress"
								value="<?php echo $this->_tpl_vars['oSubscriber']->bill_street_address; ?>
" tabIndex="13" /><br />
							<br />
							</td>
							<td valign="middle" align="left"
								class="arial_12_3b393a" width="100px">&nbsp;</td>
							<td valign="top" align="left"
								class="arial_12_3b393a" width="400px"><span
								class="arial_11_000"><strong><span
										class="error-message">*</span>Billing City:</strong>
							</span><br />
							<input type="text" style="width: 373px;"
								id="billCity" name="billCity"
								value="<?php echo $this->_tpl_vars['oSubscriber']->bill_city; ?>
" tabIndex="14" /><br />
							<br />
							</td>
						</tr>

						<tr>
							<td valign="middle" align="left"
								class="arial_12_3b393a"><span
								class="arial_11_000"><strong><span
										class="error-message">*</span>Billing State:</strong>
							</span><br> <input type="text"
								style="width: 373px;" id="billState"
								name="billState" tabIndex="15"
								value="<?php echo $this->_tpl_vars['oSubscriber']->bill_state; ?>
" /><br />
							<br />
							</td>
							<td valign="middle" align="left"
								class="arial_12_3b393a" width="100px">&nbsp;</td>
							<td valign="top" align="left"
								class="arial_12_3b393a" width="400px"><span
								class="arial_11_000"><strong><span
										class="error-message">*</span>Billing Zip
										Code:</strong>
							</span><br> <input type="text"
								style="width: 373px;" id="billZipCode"
								name="billZipCode" tabIndex="16"
								value="<?php echo $this->_tpl_vars['oSubscriber']->bill_zip_code; ?>
" />
							</td>
						</tr>
						</table>
						</td>
					</tr>
					<!-- Form Billing Section Ends Here -->
					</tbody>
					</table>
					</td>
				</tr>
				<tr>
					<td valign="top" align="left">&nbsp;</td>
				</tr>
				<tr>
					<td valign="top" bgcolor="#b1b0ac" align="left"><img
						width="1" height="1" alt="" src="images/trans.gif">
					</td>
				</tr>
				</tbody>
				</table>
				</td>
			</tr>
			</tbody>
			</table>
			</td>
		</tr>
		<tr>
			<td valign="top" align="left" style="padding: 34px 365px 5px;">
			<table width="100%" cellspacing="0" cellpadding="0" border="0">
			<tbody>
			<tr>
				<td valign="middle" align="left">
				<input type="hidden" name="member_id"
					value="<?php echo $this->_tpl_vars['oSubscriber']->member_id; ?>
" />
				<input type="submit" tabIndex="17"
					name="submit" value=""
					style="background: url('images/img_submit_.gif') no-repeat; border: none; width: 78px; height: 27px; cursor: pointer;" />
				</td>
				<td valign="middle" align="right"><a
					href="index.php?stage=subscriber&mode=MyProfile"><img
						width="78" border="0" height="27" alt="" tabIndex="18"
						src="images/img_cancel.gif">
				</a><input type="hidden" name="pr_aff"
					value="<?php echo $this->_tpl_vars['oSubscriber']->prim_affiliate_id; ?>
" /></td>
			</tr>
			</tbody>
			</table>
			</td>
		</tr>
		</tbody>
		</table>
		</td>
	</tr>
	</tbody>
	</table>
	</td>
</tr>
</form>
<?php echo '
<script language=\'javascript\' type=\'text/javascript\'>

	var frmvalidator	=	new Validator("profileEdit");
	frmvalidator.addValidation("firstName","req","Please enter your First Name.");
	frmvalidator.addValidation("firstName","alphabetic_space","Only alphabets are allowed in First Name.");
	frmvalidator.addValidation("lastName","req","Please enter your Last Name.");
	frmvalidator.addValidation("lastName","alphabetic_space","Only alphabets are allowed in Last Name.");
	frmvalidator.addValidation("streetAddress","req","Please enter your street address.");
	frmvalidator.addValidation("state","req","Please enter your state.");
	frmvalidator.addValidation("state","alphabetic_space","Only alphabets are allowed in state.");
	frmvalidator.addValidation("zipCode","req","Please enter your zip code.");
	frmvalidator.addValidation("zipCode","alnum","Only alphabets are allowed in zip code.");
	
	frmvalidator.addValidation("City","req","Please enter your city.");
	frmvalidator.addValidation("City","alphabetic_space","Only alphabets are allowed in city.");
	
	frmvalidator.addValidation("email","req","Please enter your email.");
	frmvalidator.addValidation("email","email","Please enter a valid email.");
	
	frmvalidator.setAddnlValidationFunction(DoCustomValidation);
	
    function DoCustomValidation()
	{
		//Determine whether password field is empty or filled.
		if(document.forms[0].password.value != "")
		{
			
			if(document.forms[0].password.value.length <6)
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
				 if(document.forms[0].password.value == document.forms[0].re_password.value){
					 return true;
				}
				 else
				 {
					alert("Confirm password does not matched.");
					 document.forms[0].re_password.value="";
					 document.forms[0].re_password.focus();
					 document.forms[0].re_password.select();
					 return false;
				}
			}
		}

		if(document.forms[0].billingInfoStatus.checked){
			
			if(document.forms[0].billingAddress.value == ""){
				alert("Please Enter Billing Address.");
				document.forms[0].billingAddress.focus();
				return false;
			} 
			if(document.forms[0].billState.value == ""){
				alert("Please Enter Billing State.");
				document.forms[0].billState.focus();
				return false;
			} 
			else{
				var charpos = document.forms[0].billState.value.search("[^A-Za-z\\\\s]");
				if (document.forms[0].billState.value.length > 0 && charpos >= 0)
				{
					alert("Billing State : Only alphabets are allowed.");
					document.forms[0].billState.focus();
					return false;
				} 
			}
			
			if(document.forms[0].billZipCode.value == ""){
				alert("Please Enter Billing Zip Code.");
				document.forms[0].billZipCode.focus();
				return false;
			}
			else{
				var charpos = document.forms[0].billZipCode.value.search("[^A-Za-z0-9]");
				if (document.forms[0].billZipCode.value.length > 0 && charpos >= 0)
				{
					alert("Billing Zip Code : Only alphanumeric values are allowed.");
					document.forms[0].billZipCode.focus();
					return false;
				} 
			}
			
			if(document.forms[0].billCity.value == ""){
				alert("Please Enter Billing City.");
				document.forms[0].billCity.focus();
				return false;
			}
			else{
				var charpos = document.forms[0].billCity.value.search("[^A-Za-z\\\\s]");
				if (document.forms[0].billCity.value.length > 0 && charpos >= 0)
				{
					alert("Billing City : Only alphabets are allowed.");
					document.forms[0].billCity.focus();
					return false;
				} 
			}
		}		
		return true
	}
</script>
'; ?>
