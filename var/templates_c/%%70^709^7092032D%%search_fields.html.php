<?php /* Smarty version 2.6.10, created on 2014-03-09 22:57:22
         compiled from subscriber/ihtml/search_fields.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'cycle', 'subscriber/ihtml/search_fields.html', 7, false),)), $this); ?>
<?php echo '
<SCRIPT language=JavaScript src="../scripts/gen_validatorv4.js"></SCRIPT>
'; ?>

<form name='searchFields' action="index.php" method='get'>
<table border=0  align="center" cellspacing="0" cellpadding="0" width="100%">
	<tbody bgcolor="#FFFFFF">
		<tr class="<?php echo smarty_function_cycle(array('values' => "even,odd"), $this);?>
">
			<td width="20%" align="right" valign="middle"><b>Select Search Field:&nbsp;</b></td>
			<td width="20%"><select name="search_field" id="search_field"  style="width:165px;">
					<option value="">-- Select Search Field --</option>
					<option value="fname" <?php if ($this->_tpl_vars['search_field'] == fname): ?>selected<?php endif; ?>>First Name</option>
					<option value="lname" <?php if ($this->_tpl_vars['search_field'] == lname): ?>selected<?php endif; ?>>Last Name</option>
					<option value="email" <?php if ($this->_tpl_vars['search_field'] == email): ?>selected<?php endif; ?>>Email</option>
				</select>
			</td>
			<td align="left" width="5%"></td>		
			<td align="right" width="20%" valign="middle"><b>Search Text:&nbsp;</b></td>
			<td width="20%"><input name="search_text" type="text" id="search_text" maxlength="50" value="<?php echo $this->_tpl_vars['search_text']; ?>
">
			</td>
			<td width="15%"><input type='hidden' name='stage' value='subscriber'/>
		<input type='hidden' name='mode'  value='ListSubscriber'/><input type="submit" name="submit" value="submit" ></td>
		</tr>
		<tr>
		<td colspan="6">&nbsp;</td></tr>
	</tbody>	
</table>
</form>
<?php echo '
<SCRIPT language=JavaScript type=\'text/javascript\'>
var frmvalidator  = new Validator("searchFields");
 frmvalidator.addValidation("search_field","req","Please select Search Field");
 frmvalidator.addValidation("search_text","req","Enter the Search Text.");

</SCRIPT>
'; ?>