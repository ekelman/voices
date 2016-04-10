<?php /* Smarty version 2.6.10, created on 2014-03-03 12:02:04
         compiled from affiliates/ihtml/search_fields.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'cycle', 'affiliates/ihtml/search_fields.html', 7, false),)), $this); ?>
<?php echo '
<SCRIPT language=JavaScript src="../scripts/gen_validatorv4.js"></SCRIPT>
'; ?>

<table border=0  align="center" cellspacing="0" cellpadding="0" width="100%">
	<form name='searchFields' action="index.php" method='get' enctype="multipart/form-data" >
	<tbody bgcolor="#FFFFFF">
		<tr class="<?php echo smarty_function_cycle(array('values' => "even,odd"), $this);?>
">
			<td align="right" valign="middle"><b>Select Search Field :</b>&nbsp;</td>
			<td><select name="search_field" id="search_field" style="width:165px;">
					<option value="">-- Select Search Field --</option>
					<option value="name" <?php if ($this->_tpl_vars['search_field'] == name): ?>selected<?php endif; ?>>Organization Name</option>
					<option value="email" <?php if ($this->_tpl_vars['search_field'] == email): ?>selected<?php endif; ?>>Email</option>
				</select>
			</td>
			<td align="left"></td>		
			<td align="right" valign="middle"><b>Search Text:</b>&nbsp;</td>
			<td><input name="search_text" type="text" id="search_text" maxlength="50" value="<?php echo $this->_tpl_vars['search_text']; ?>
">
			</td>
			<td><input type="submit" name="submit" value="submit" ></td>
		</tr>
		<tr><td>
		<input type='hidden' name='stage' value='affiliates'/>
		<input type='hidden' name='mode'  value='ListAffiliates'/>
		</td></tr>
	</tbody>
	</form>
</table>
<?php echo '
<SCRIPT language=JavaScript type=\'text/javascript\'>
var frmvalidator  = new Validator("searchFields");
 frmvalidator.addValidation("search_field","req","Please select Search Field");
 frmvalidator.addValidation("search_text","req","Enter the Search Text.");

</SCRIPT>
'; ?>