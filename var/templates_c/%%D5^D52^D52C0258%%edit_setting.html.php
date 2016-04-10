<?php /* Smarty version 2.6.10, created on 2014-03-02 15:10:23
         compiled from setting/ihtml/edit_setting.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'html_entity_decode', 'setting/ihtml/edit_setting.html', 48, false),array('modifier', 'stripslashes', 'setting/ihtml/edit_setting.html', 48, false),)), $this); ?>
<?php echo '
<script>
function checkconfirm(form)
{
/*
    if(document.forms[0].field_name.value=="")
	{
		alert("Please enter Setting name.");
		document.forms[0].field_name.focus();
		return false;
	}
*/	
	if(document.forms[0].field_value.value=="")
	{
		alert("Please enter Setting value.");
		document.forms[0].field_value.focus();
		return false;
	}
}
</script>
'; ?>


<table bgcolor="#f4f8fb" cellspacing='1' border="0" cellpadding='3' width='100%' align='center'>
<tbody bgcolor="#f4f8fb">
<tr bgcolor="#005388"><td align="center" colspan="2" class="widget-head">Edit Setting</td></tr>
<tr>
	<td align="right" colspan="2" valign="top"><span class="error-message">* <?php echo $this->_tpl_vars['MandatoryMessage']; ?>
</span></td>
</tr>
<?php if ($this->_tpl_vars['sErrorMsg'] != ''): ?>
<tr>
<td align="center" class="error" valign="top"><?php echo $this->_tpl_vars['sErrorMsg']; ?>
</td>
</tr>

<?php endif; ?>

<tr>
	<td align="center">
		<form method="post" action="index.php" onSubmit="return checkconfirm(this);">
			<table border="0" cellpadding="0" cellspacing="2" width="80%"  bgcolor="#f4f8fb">
				<tbody>
					<tr>
						<td align="right" colspan="2" valign="top"></td>
					</tr>
					
					<tr>
						<td class="form-label" valign="middle"><span class="error-message">*</span>&nbsp;Setting Name </td>
						<td>
							<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['oSetting']->field_name)) ? $this->_run_mod_handler('html_entity_decode', true, $_tmp) : html_entity_decode($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>

						</td>
					</tr>
					<tr>
						<td class="form-label" valign="middle"><span class="error-message">*</span>&nbsp;Value </td>
						<td>$<input type="text" name="field_value" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['oSetting']->field_value)) ? $this->_run_mod_handler('html_entity_decode', true, $_tmp) : html_entity_decode($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
"  maxlength="100" size="20">
						</td>
					</tr>
					<tr>
						<td class="form-label" valign="middle"><span class="error-message"></span>&nbsp;Additional details</td>
						<td>
							<textarea name="field_details" rows="4" cols="20"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['oSetting']->field_details)) ? $this->_run_mod_handler('html_entity_decode', true, $_tmp) : html_entity_decode($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
</textarea>
						</td>
					</tr>
					
					<tr>
						<td colspan="2" align="center" height="60">
						<input type="submit" value="Submit" />
						<input type="hidden" name="stage" value="setting">	
						<input type="hidden" name="id" value="<?php echo $this->_tpl_vars['oSetting']->id; ?>
">	
						<input type="hidden" name="mode" value="update_setting">
						</td>
					</tr>	
				</tbody>
			</table>
		</form>
	</td>
	</tr>
</table>