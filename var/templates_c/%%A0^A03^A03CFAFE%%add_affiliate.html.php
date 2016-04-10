<?php /* Smarty version 2.6.10, created on 2014-03-02 16:56:26
         compiled from affiliates/ihtml/add_affiliate.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'default', 'affiliates/ihtml/add_affiliate.html', 32, false),array('modifier', 'html_entity_decode', 'affiliates/ihtml/add_affiliate.html', 100, false),)), $this); ?>
<?php echo '
<script language=javascript src="../scripts/gen_validatorv4.js"></script>
<script type=\'text/javascript\'>
	function countcharacters(postal_code) {
		if (postal_code.value.length == 3) {
			document.addAffiliate.postal_code1.focus();
		}
	}
</script>
'; ?>

<form name='addAffiliate' method='post' enctype="multipart/form-data">
	<table bgcolor="#f4f8fb" cellspacing='1' border="0" cellpadding='3'
		width='100%' align='center'>
		<tbody bgcolor="#f4f8fb">
			<tr bgcolor="#005388">
				<td align="center" colspan="2" class="widget-head">Add
					Affiliate</td>
			</tr>
			<tr>
				<td align="right" colspan="2" valign="top"><span
					class="error-message">* <?php echo $this->_tpl_vars['MandatoryMessage']; ?>
</span>
				</td>
			</tr>
			<tr>
				<td width='70%' class="arial11b000000">
					<table cellspacing='1' cellpadding='3' width='80%' border="0"
						align='center' class="arial11b000000">
						<tr>
							<td width="40%" class="arial11b000000"><span
								class="error-message">*</span>&nbsp;Contact First Name:</td>
							<td width="60%"><input type="text" name='first_name'
								value="<?php echo ((is_array($_tmp=@$this->_tpl_vars['oAffiliate']->first_name)) ? $this->_run_mod_handler('default', true, $_tmp, '') : smarty_modifier_default($_tmp, '')); ?>
" maxlength='40' class="add_aff_input" /></td>
						</tr>

						<tr>
							<td><span class="error-message">*</span>&nbsp;Contact Last
								Name:</td>
							<td><input type="text" name='last_name'
								value="<?php echo ((is_array($_tmp=@$this->_tpl_vars['oAffiliate']->last_name)) ? $this->_run_mod_handler('default', true, $_tmp, '') : smarty_modifier_default($_tmp, '')); ?>
" maxlength='40' class="add_aff_input" /></td>
						</tr>
						<tr>
							<td><span class="error-message">*</span>&nbsp;Username:</td>
							<td><input type="text" name='username'
								value="<?php echo ((is_array($_tmp=@$this->_tpl_vars['oAffiliate']->username)) ? $this->_run_mod_handler('default', true, $_tmp, '') : smarty_modifier_default($_tmp, '')); ?>
" maxlength='40' class="add_aff_input" /></td>
						</tr>
						<tr>
							<td><span class="error-message">*</span>&nbsp;Email:</td>
							<td><input type="text" name='email'
								value="<?php echo ((is_array($_tmp=@$this->_tpl_vars['oAffiliate']->email)) ? $this->_run_mod_handler('default', true, $_tmp, '') : smarty_modifier_default($_tmp, '')); ?>
" maxlength='80' class="add_aff_input" />
							</td>
						</tr>
						<tr>
							<td><span class="error-message">*</span>&nbsp;Password:</td>
							<td><input type="password" name='password' value=""
								maxlength='40' class="add_aff_input" />
							</td>
						</tr>
						<tr>
							<td><span class="error-message">*</span>&nbsp;Confirm
								Password:</td>
							<td><input type="password" name='re_password' value=""
								maxlength='40' class="add_aff_input" />
							</td>
						</tr>

						<tr>
							<td><span class="error-message">*</span>&nbsp;Organization
								Name:</td>
							<td><input type="text" name='organisation_name'
								value="<?php echo ((is_array($_tmp=@$this->_tpl_vars['oAffiliate']->organisation_name)) ? $this->_run_mod_handler('default', true, $_tmp, '') : smarty_modifier_default($_tmp, '')); ?>
"
								maxlength='80' class="add_aff_input" />
							</td>
						</tr>

						<tr>
							<td><span class="error-message">&nbsp;</span>&nbsp;Organization
								website:</td>
							<td><input type="text" name='organisation_website'
								value="<?php echo ((is_array($_tmp=@$this->_tpl_vars['oAffiliate']->organisation_website)) ? $this->_run_mod_handler('default', true, $_tmp, '') : smarty_modifier_default($_tmp, '')); ?>
"
								maxlength='80' class="add_aff_input" />
							</td>
						</tr>

						<tr>
							<td>&nbsp;&nbsp;Organization Banner:</td>
							<td><input type="file" name='organisation_banner' size="19" />
							</td>
						</tr>
						<tr>
							<td>&nbsp;</td>
							<td><span style="color: #888888;">Upload a
									banner(jpg/gif/jpeg) containing organization logo up to 900px
									wide and 250px high, max size 5MB.</span>
							</td>
						</tr>

						<tr>
							<td><span class="error-message">*</span>&nbsp;Address:</td>
							<td><input type="text" name='address'
								value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['oAffiliate']->address)) ? $this->_run_mod_handler('html_entity_decode', true, $_tmp) : html_entity_decode($_tmp)))) ? $this->_run_mod_handler('default', true, $_tmp, '') : smarty_modifier_default($_tmp, '')); ?>
"
								maxlength='255' class="add_aff_input" />
							</td>
						</tr>

						<tr>
							<td><span class="error-message">*</span>&nbsp;City:</td>
							<td><input type="text" name='city'
								value="<?php echo ((is_array($_tmp=@$this->_tpl_vars['oAffiliate']->city)) ? $this->_run_mod_handler('default', true, $_tmp, '') : smarty_modifier_default($_tmp, '')); ?>
" maxlength='15' class="add_aff_input" />
							</td>
						</tr>

						<tr>
							<td><span class="error-message">*</span>&nbsp;State:</td>
							<td><input type="text" name='state'
								value="<?php echo ((is_array($_tmp=@$this->_tpl_vars['oAffiliate']->state)) ? $this->_run_mod_handler('default', true, $_tmp, '') : smarty_modifier_default($_tmp, '')); ?>
" maxlength='15' class="add_aff_input" />
							</td>
						</tr>

						<tr>
							<td><span class="error-message">*</span>&nbsp;Country:</td>
							<td><input type="text" name='country'
								value="<?php echo ((is_array($_tmp=@$this->_tpl_vars['oAffiliate']->country)) ? $this->_run_mod_handler('default', true, $_tmp, '') : smarty_modifier_default($_tmp, '')); ?>
" maxlength='15' class="add_aff_input" />
							</td>
						</tr>

						<tr>
							<td><span class="error-message">*</span>&nbsp;Postal Code:</td>
							<td><input type="text" name='postal_code'
								value="<?php echo ((is_array($_tmp=@$this->_tpl_vars['oAffiliate']->postal_code)) ? $this->_run_mod_handler('default', true, $_tmp, '') : smarty_modifier_default($_tmp, '')); ?>
" maxlength="6" class="add_aff_input" />
							</td>
						</tr>
						<tr>
							<td><span class="error-message">*</span>&nbsp;Organization
								Profile:</td>
							<td><textarea style="width: 436px; height: 50px;"
									name="description"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['oAffiliate']->description)) ? $this->_run_mod_handler('html_entity_decode', true, $_tmp) : html_entity_decode($_tmp)))) ? $this->_run_mod_handler('default', true, $_tmp, '') : smarty_modifier_default($_tmp, '')); ?>
</textarea>
							</td>
						</tr>
						
						<tr>
							<td><span class="error-message">*</span>&nbsp;Promo Code:
							</td>
							<td><input type="text" name='promo_code'
								value="<?php echo ((is_array($_tmp=@$this->_tpl_vars['oAffiliate']->promo_code)) ? $this->_run_mod_handler('default', true, $_tmp, '') : smarty_modifier_default($_tmp, '')); ?>
" maxlength="10" class="add_aff_input" />
							</td>
						</tr>
						
						<tr>
							<td colspan='2' align="center"><input type="hidden"
								name="stage" value='affiliates' /> <input type="hidden"
								name="mode" value='SaveAffiliate' /> <input type="submit"
								name="submit" value='Submit' />&nbsp;&nbsp;<input type="button"
								value="Cancel" name="Cancel"
								onclick="window.location='index.php?stage=affiliates&mode=ListAffiliates'" />
							</td>
						</tr>
					</table>
				</td>
			</tr>
		</tbody>
	</table>
</form>
<?php echo '
<script language=\'javascript\' type=\'text/javascript\'>
	var frmvalidator = new Validator("addAffiliate");

	frmvalidator.addValidation("first_name", "req",
			"Please enter your first name.");
	frmvalidator.addValidation("first_name", "alphabetic_space",
			"Only alphabets are allowed in first name.");

	frmvalidator.addValidation("last_name", "req",
			"Please enter your last name.");
	frmvalidator.addValidation("last_name", "alphabetic_space",
			"Only alphabets are allowed in last name.");

	frmvalidator.addValidation("username", "req", "Please enter Username.");
	frmvalidator.addValidation("username", "alphanumeric",
			"Only alphabets and numbers are allowed in Username.");
	frmvalidator.addValidation("username", "minlen=6",
			"Username should be between 6 to 20 characters.");
	frmvalidator.addValidation("username", "maxlen=20",
			"Username should be between 6 to 20 characters.");

	frmvalidator.addValidation("email", "req", "Please enter Email.");
	frmvalidator.addValidation("email", "email", "Please enter a valid Email.");

	frmvalidator.addValidation("password", "req", "Please enter Password.");
	frmvalidator.addValidation("password", "minlen=6",
			"Password should be between 6 to 20 characters.");
	frmvalidator.addValidation("password", "maxlen=20",
			"Password should be between 6 to 20 characters.");

	frmvalidator.addValidation("re_password", "req",
			"Please enter Confirm Password.");

	frmvalidator.addValidation("organisation_name", "req",
			"Please select Organization Name.");
	frmvalidator.addValidation("organisation_name", "alphabeticspace",
			"Only alphabets are allowed in Organization Name.");

	frmvalidator.addValidation("organisation_name", "maxlen=50",
			"Organization Name should not be more then 50 characters.");

	/*frmvalidator.addValidation("organisation_website", "req",
			"Please select Organization Website.");
	frmvalidator.addValidation("organisation_website", "url",
			"Please enter proper format of Organization Website.");
*/
	frmvalidator.addValidation("address", "req",
			"Please enter Organization Address.");

	frmvalidator.addValidation("state", "req", "Please enter State.");
	frmvalidator.addValidation("state", "alphabetic_space",
			"Only alphabets are allowed in State.");

	frmvalidator.addValidation("city", "req", "Please enter City.");
	frmvalidator.addValidation("city", "alphabetic_space",
			"Only alphabets are allowed in City.");

	frmvalidator.addValidation("country", "req", "Please enter Country.");
	frmvalidator.addValidation("country", "alphabetic_space",
			"Only alphabets are allowed in Country.");

	frmvalidator
			.addValidation("postal_code", "req", "Please enter Postal Code");
	frmvalidator.addValidation("postal_code", "alphanumeric",
			"Please input a valid Postal Code");
	frmvalidator.addValidation("postal_code", "maxlen=6",
			"Please input a valid Postal Code");

	frmvalidator.addValidation("description", "req",
			"Please enter Organization Profile.");
			
	frmvalidator.addValidation("promo_code", "req", "Please enter promocode.");
	frmvalidator.addValidation("promo_code", "alphanumeric",
			"Only alphabets and numbers are allowed in promocode.");
	frmvalidator.addValidation("promo_code", "minlen=3",
			"Promocode should be between 6 to 20 characters.");
	frmvalidator.addValidation("promo_code", "maxlen=20",
			"Promocode should be between 6 to 20 characters.");		
			

	frmvalidator.setAddnlValidationFunction(DoCustomValidation);
	
	function DoCustomValidation() {

		var form = document.forms["addAffiliate"];

		//passwords matching
		if (Trim(form.password.value) != Trim(form.re_password.value)) {
			alert("The Password and Confirm password does not match");
			form.password.focus();
			return false;
		}
		return true;
	}
</script>
'; ?>
