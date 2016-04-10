<?php /* Smarty version 2.6.10, created on 2012-05-22 15:37:55
         compiled from pages/ihtml/page_edit.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'stripslashes', 'pages/ihtml/page_edit.html', 14, false),)), $this); ?>
<?php echo '
	<script language=javascript src="../scripts/gen_validatorv4.js"></script>
'; ?>



<table id="form_table"  cellspacing="1" cellpadding="3" border="0" width='100%'>
	<form name="page_edit" method="post" action="index.php?">
	<tr><td valign="middle" align="center" class="widget-head" colspan="2">Edit Page</td></tr>
	<tbody bgcolor="#FFFFFF">
	<tr>
		<td align="right"  colspan="2" valign="top"><span class="error-message">* <?php echo $this->_tpl_vars['MandatoryMessage']; ?>
</span></td>
	</tr>
	<tr><td><span class="error-message">*</span>&nbsp;Title</td>
	<td><input type="text"  alt="blank"  name="title" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
" maxlength="100" size="50"></td></tr>
	<tr><td>&nbsp;&nbsp;Meta-Keyword</td>
	<td><input type="text" name="metakeyword" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['metakeyword'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
" maxlength="200" size="50" ></td></tr>
	<tr><td>&nbsp;&nbsp;Meta-Description</td>
	<td><input type="text" name="metadescription" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['metadescription'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
" maxlength="100" size="50"></td></tr>
	<tr><td><span class="error-message">*</span>&nbsp;Content</td>
	<td><?php echo $this->_tpl_vars['TextArea']; ?>
</td></tr>
	<input type="hidden" name="stage" value="pages">
	<input type="hidden" name="mode" value="save">
	<input type="hidden" name="id" value="<?php echo $this->_tpl_vars['PageId']; ?>
">
	<tr><td colspan="2" align="center"><input type="submit" value="Save" name="Save" />&nbsp;&nbsp;<input type="submit" value="Cancel" name="Cancel"/></td></tr>
	</tbody>
	</form>
</table>
<?php echo '
<script language=\'javascript\' type=\'text/javascript\'>

	var frmvalidator	=	new Validator("page_edit");
	frmvalidator.addValidation("title","req","Please enter Title");
	frmvalidator.setAddnlValidationFunction(check_image);//custom function runs at last
 	function check_image()
	{
		if(validateForm(document.page_edit,false,false,false,false))
		{
			var oEditor = FCKeditorAPI.GetInstance(\'content\') ;
			//alert(oEditor.GetXHTML( false ).length);	
			// Get the editor contents in XHTML.
			if (oEditor.GetXHTML( false ).length == 0 )
			{
				alert( \'Please enter Value.\' ) ;
				return false ;
			} else {
				return true;
			}
		}
	}
</script>
'; ?>

	