<?php /* Smarty version 2.6.10, created on 2014-03-01 11:36:34
         compiled from admin/ihtml/change_pass.html */ ?>
<?php echo '
<script>
function checkconfirm(form)
{
    if(document.forms[0].OldPassword.value=="")
	{
		alert("Please enter the Old Password.");
		document.forms[0].OldPassword.focus();
		return false;
	}
	if(document.forms[0].Password.value=="")
	{
		alert("Please enter New Password.");
		document.forms[0].Password.focus();
		return false;
	}
	else if(document.forms[0].Password.value.length <6)
	{
	alert("Password should be atleast of 6 characters.");
		document.forms[0].Password.focus();
		return false;
	}
	
	else if(document.forms[0].Re_Password.value=="")
	{
		alert("Please enter Confirm Password.");
		document.forms[0].Re_Password.focus();
		return false;
	}
	else
	{
		 if(validateForm(form,false,false,false,false))
			 return true;
		 else
		 {
 			 document.forms[0].Re_Password.value="";
			 document.forms[0].Re_Password.focus();
			 document.forms[0].Re_Password.select();
			 return false;
		}
	}
}
</script>
'; ?>

<br>
<center>
<table id="form_table" width="400" cellspacing="1" cellpadding="3">
	<tbody bgcolor="#F4F8FB">
	<tr><td colspan="3" class="widget-head" valign="middle" align="center">Change Password</td></tr>
	<tr><td style="padding-bottom: 20px;padding-top:10px;padding-right:10px;padding-left:10px;" class="widget-body" align="center" valign="top" colspan="3">
	<form method="post" action="index.php" onSubmit="return checkconfirm(this);">
	<table border="0" cellpadding="0" cellspacing="2" width="100%">
	<tbody>
	<tr>
		<td align="right" colspan="2" valign="top"><span class="error-message">* <?php echo $this->_tpl_vars['MandatoryMessage']; ?>
</span></td>
	</tr>
	<tr>
		<td align="right" colspan="2" valign="top"></td>
	</tr>
	<tr><td class="form-label" valign="middle"><span class="error-message">*</span>&nbsp;Old Password </td><td><input type="Password" name="OldPassword" value="" maxlength="16" size="20"></td></tr>
	<tr><td class="form-label" valign="middle"><span class="error-message">*</span>&nbsp;New Password </td><td><input type="Password" name="Password" value=""  maxlength="16" size="20"></td></tr>
	<tr><td class="form-label" valign="middle"><span class="error-message">*</span>&nbsp;Confirm Password </td>
	<td><input type="password" name="Re_Password" alt="equalto|Password" emsg="Passwords do not match." value="" maxlength="16" size="20"></td></tr>
	<tr><td colspan="3" align="center" height="60">
	<input type="submit" value="Submit" class="btn" background="../images/img_nsap.gif" style="height:28px;width:81px;">
	<input type="hidden" name="stage" value="admin">
	<input type="hidden" name="mode" value="request_change_pass">
	</tbody>
	</table>
	</form>
	</td>
	</tr>
</table>
</center>