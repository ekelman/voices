<?php /* Smarty version 2.6.10, created on 2012-11-09 16:33:12
         compiled from electedrepresentative/ihtml/edit_profile.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'default', 'electedrepresentative/ihtml/edit_profile.html', 16, false),)), $this); ?>
<?php echo '
	<script language=javascript src="../scripts/gen_validatorv4.js"></script>
'; ?>

<form name='editElectoralDistrict' method='post' enctype="multipart/form-data">
<table bgcolor="#F4F8FB" cellspacing='1' border="0" cellpadding='3' width='100%' align='center'>
<tr>
	<td align="center" colspan="2" class="widget-head">Edit Account</td></tr>
<tr>
	<td align="right" colspan="2" valign="top"><span class="error-message">* <?php echo $this->_tpl_vars['MandatoryMessage']; ?>
</span></td>
</tr>
<tr>
	<td width='100%' colspan="2" class="arial11b000000" valign="top">
	<table cellspacing='1' cellpadding='3' width='80%' border="0" align='center' class="arial11b000000">
	<tr>
		<td width="30%" class="arial11b000000">&nbsp;&nbsp;User Name:</td>
		<td width="70%"><input type="text" name='username' value="<?php echo ((is_array($_tmp=@$this->_tpl_vars['oElectoralDistrict']->user_name)) ? $this->_run_mod_handler('default', true, $_tmp, '') : smarty_modifier_default($_tmp, '')); ?>
" maxlength='100' size="30" readonly="readonly" style="background:#cccccc;"/></td>
	</tr>		
	<tr>
		<td width="30%" class="arial11b000000">&nbsp;&nbsp;First Name:</td>
		<td width="70%"><input type="text" name='first_name' value="<?php echo ((is_array($_tmp=@$this->_tpl_vars['oElectoralDistrict']->first_name)) ? $this->_run_mod_handler('default', true, $_tmp, '') : smarty_modifier_default($_tmp, '')); ?>
" maxlength='100' size="30" readonly="readonly" style="background:#cccccc;"/></td>
	</tr>
	<tr>
		<td width="30%" class="arial11b000000">&nbsp;&nbsp;Last Name:</td>
		<td width="70%"><input type="text" name='last_name' value="<?php echo ((is_array($_tmp=@$this->_tpl_vars['oElectoralDistrict']->last_name)) ? $this->_run_mod_handler('default', true, $_tmp, '') : smarty_modifier_default($_tmp, '')); ?>
" maxlength='100' size="30" readonly="readonly" style="background:#cccccc;"/></td>		
	</tr>
	<tr>
		<td width="30%" class="arial11b000000"><span class="error-message">*</span>&nbsp;Email:</td>
		<td width="70%"><input type="text" name='email' value="<?php echo ((is_array($_tmp=@$this->_tpl_vars['oElectoralDistrict']->email)) ? $this->_run_mod_handler('default', true, $_tmp, '') : smarty_modifier_default($_tmp, '')); ?>
" maxlength='100' size="30"/></td>
	</tr>
	<tr>
		<td width="30%" class="arial11b000000">&nbsp;Profile Image:</td>
		<td width="70%"><input type="file" name='profile_image' value="" maxlength='100' size="30"/>&nbsp;&nbsp;<?php if ($this->_tpl_vars['oElectoralDistrict']->OfficerProfileImage != ''): ?><a href="<?php echo $this->_tpl_vars['profileimageurl'];  echo $this->_tpl_vars['oElectoralDistrict']->OfficerProfileImage; ?>
" target="_blank">view</a><?php else: ?>No image added<?php endif; ?></td>
	</tr>
	<tr>
		<td width="30%" class="arial11b000000">&nbsp;&nbsp;Password:</td>
		<td width="70%"><input type="password" name='password' value="" maxlength='40' size="30"/></td>
	</tr>
	<tr>
		<td width="30%" class="arial11b000000">&nbsp;&nbsp;Confirm Password:</td>
		<td width="70%"><input type="password" name='re_password' value="" maxlength='40' size="30"/></td>
	</tr>
	<tr>
  		<td colspan='2'>&nbsp;</td>
	</tr>
	<tr>
		<td colspan='2' align="center">
		<input type="hidden" name='search_field' value='<?php echo $this->_tpl_vars['search_field']; ?>
'/>
		<input type="hidden" name='search_text'  value='<?php echo $this->_tpl_vars['search_text']; ?>
'/>
		<input type="hidden" name='id' value='<?php echo $this->_tpl_vars['oElectoralDistrict']->member_id; ?>
'/>
		<input type="hidden" name='ElectedOfficialID' value='<?php echo $this->_tpl_vars['oElectoralDistrict']->ElectedOfficialID; ?>
'/>
		<input type="hidden" name="stage" value='electedrepresentative' />
		<input type="hidden" name="mode" value='UpdateElectedrepresentative' />
		<input type="submit" name="submit" value='Save Changes' />&nbsp;&nbsp;<input type="button" value="Cancel" name="Cancel" onclick="window.location='index.php?stage=electedrepresentative&mode=listelectedrepresentativeaccounts'"/></td>
	</tr>
	</table>
	</td>
</tr>
<tr>
  <td colspan='2'>&nbsp;</td>
</tr>
</table>
</form>
<?php echo '
<script language=\'javascript\' type=\'text/javascript\'>

	var frmvalidator	=	new Validator("editElectoralDistrict");	
	
	frmvalidator.addValidation("username","req","Please enter User Name.");
	frmvalidator.addValidation("username","alphanumeric","Only alphabets and numbers are allowed in User Name.");
	frmvalidator.addValidation("username","minlen=6","User Name should be between 6 to 20 characters.");
	frmvalidator.addValidation("username","maxlen=20","User Name should be between 6 to 20 characters.");
		
	frmvalidator.addValidation("email","req","Please enter Email.");
	frmvalidator.addValidation("email","email","Please enter a valid Email.");
	
	frmvalidator.setAddnlValidationFunction(DoCustomValidation);
    function DoCustomValidation()
	{		
	
		var form = document.forms["editElectoralDistrict"];
		
		if(Trim(form.password.value) != "") {
			
			if(Trim(form.password.value).length < 6) {
				
				alert("Password should be between 6 to 20 characters.");
				return false;
			} else if(Trim(form.password.value).length > 20) {
				
				alert("Password should be between 6 to 20 characters.");
				return false;
			} else if(Trim(form.password.value) != Trim(form.re_password.value)) {
				
			  alert("The Password and Confirm password does not match.");
			  form.password.focus();
			  return false;
			}
		}
		
		return true;
	}
</script>
'; ?>