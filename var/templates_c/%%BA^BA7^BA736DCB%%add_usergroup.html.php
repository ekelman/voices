<?php /* Smarty version 2.6.10, created on 2012-01-16 18:55:41
         compiled from accession/ihtml/add_usergroup.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'default', 'accession/ihtml/add_usergroup.html', 22, false),)), $this); ?>
<?php echo '
<script language=javascript src="../scripts/gen_validatorv4.js"></script>
'; ?>

<form name='addSubscriberGroup' method='post'>
<table bgcolor="#f4f8fb" cellspacing='1' border="0" cellpadding='3' width='100%' align='center'>
<tbody bgcolor="#f4f8fb">
<tr bgcolor="#005388"><td align="center" colspan="2" class="widget-head">Add Subscriber Group</td></tr>
<tr>
	<td align="right" colspan="2" valign="top"><span class="error-message">* <?php echo $this->_tpl_vars['MandatoryMessage']; ?>
</span></td>
</tr>
<!--  tr>
<td align="center" class="error" valign="top"><?php echo $this->_tpl_vars['sErrorMsg']; ?>
</td>
</tr>
<tr><td style='height:10px'></td></tr-->

<tr>
<td width='70%' class="arial11b000000">
<table cellspacing='1' cellpadding='3' width='80%' border="0" align='center' class="arial11b000000">
<tr><td width="40%" class="arial11b000000"><span class="error-message">*</span>&nbsp;Subscriber Group Name:</td>
<td width="60%">&nbsp;&nbsp;&nbsp;<input type="text" name='groupname' value="<?php echo ((is_array($_tmp=@$this->_tpl_vars['oMember']->name)) ? $this->_run_mod_handler('default', true, $_tmp, '') : smarty_modifier_default($_tmp, '')); ?>
" maxlength='40' onkeyup="updatePromoCode(this.value)" onChange="updatePromoCode(this.value)"/></td></tr>
<tr><td width="40%"><span class="error-message">*</span>&nbsp;Promo Code:</td>
<td width="60%">&nbsp;&nbsp;&nbsp;<input type="text" name='promo_code' id='promo_code' value="<?php echo ((is_array($_tmp=@$this->_tpl_vars['oMember']->promo_code)) ? $this->_run_mod_handler('default', true, $_tmp, '') : smarty_modifier_default($_tmp, '')); ?>
" maxlength='40' readonly="readonly"/></td></tr>
<tr><td width="40%"><span class="error-message">*</span>&nbsp;Subscription Price:</td>
<td width="60%">$&nbsp;<input type="text" name='subscription_price' value="<?php echo ((is_array($_tmp=@$this->_tpl_vars['oMember']->subscription_price)) ? $this->_run_mod_handler('default', true, $_tmp, '') : smarty_modifier_default($_tmp, '')); ?>
" maxlength='10'/></td></tr>
<tr><td>&nbsp;&nbsp;Comments:</td>
<td style="padding: 0 0 0 12px;">
<textarea name="assigned_affiliates" style="width: 436px; height: 50px;"><?php echo ((is_array($_tmp=@$this->_tpl_vars['oMember']->assigned_affiliates)) ? $this->_run_mod_handler('default', true, $_tmp, '') : smarty_modifier_default($_tmp, '')); ?>
</textarea></td></tr>
<tr><td colspan='2' align="center">
<input type="hidden" name="stage" value='accession' />
<input type="hidden" name="minamount" value='1' />
<input type="hidden" name="mode" value='saveSubscriberGroup' />
<input type="submit" name="submit" value='Submit' />&nbsp;&nbsp;<input type="button" value="Cancel" name="Cancel" onclick="window.location='index.php?stage=accession&mode=manage_permissions'"/></td></tr>
</table></td>
</tr>
</tbody>
</table>
</form>
<?php echo '
<script language=\'javascript\' type=\'text/javascript\'>

	var frmvalidator	=	new Validator("addSubscriberGroup");	
	
	frmvalidator.addValidation("groupname","req","Please enter Subscriber Group Name.");
	frmvalidator.addValidation("groupname","alphabetic","Only alphabets are allowed in Subscriber Group Name.");
	frmvalidator.addValidation("groupname","minlen=6","Username should be between 6 to 20 Subscriber Group Name.");
	frmvalidator.addValidation("groupname","maxlen=20","Username should be between 6 to 20 Subscriber Group Name.");
	
	frmvalidator.addValidation("subscription_price","req","Please enter Subscription Price.");
	frmvalidator.addValidation("subscription_price","numeric","Only numbers are allowed in Subscription Price.");
	frmvalidator.addValidation("subscription_price","geelmnt=minamount","Subscription Price should be greater than or equal to 1.");		
	function updatePromoCode(groupname) {
		var d = new Date();
		var curr_year = d.getFullYear();
		var curr_month = d.getMonth();

		promo_code = groupname.toUpperCase();
		promo_code = promo_code + curr_month + curr_year;
		document.getElementById("promo_code").value = promo_code;
	}
</script>
'; ?>