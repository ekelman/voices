<?php /* Smarty version 2.6.10, created on 2012-11-09 16:32:31
         compiled from electedrepresentative/ihtml/edit_elected_representatives_profile.html */ ?>
<?php echo '
	<script language="javascript" src="scripts/gen_validatorv4.js"></script>
	<script type=\'text/javascript\' src=\'scripts/jquery-1.3.2.min.js\'></script>
	
'; ?>

<tr>
	<td valign="top" align="left" style="padding-top: 10px;"><table width="100%" cellspacing="0" cellpadding="0" border="0">
	  <tbody><tr>
		<td valign="top" align="left" style="padding: 24px 15px 51px 12px;" class="bg_f7f6f2"><table width="100%" cellspacing="0" cellpadding="0" border="0">
		  <tbody><tr>
			<td class="arial_16_c40306"><table width="100%" cellspacing="0" cellpadding="0" border="0">
			  <tbody><tr>
				<td valign="top" align="left" class="arial_16_c40306"><table width="100%" cellspacing="0" cellpadding="0" border="0">
				  <tbody><tr>
					<td valign="top" align="left"><table width="100%" cellspacing="0" cellpadding="0" border="0">
					  <tbody>
					 <tr>
						<td valign="bottom" align="left" height="37" style="padding-bottom: 5px;" class="Trebuchet_27_c60000" colspan="2">Edit Profile</td>
					  </tr>
					  
					  <tr>
						<td valign="top" bgcolor="#b1b0ac" align="left" class="arial_20_c40306" colspan="2"><img width="1" height="1" alt="" src="images/trans.gif"></td>
					  </tr>
						<tr>
						<td valign="bottom" align="center"  class="error-message" colspan="2" style="padding-top: 10px;padding-bottom: 10px;">
							<?php echo $this->_tpl_vars['vMsg']; ?>

						</td>
					  </tr>
						<tr>
						<td valign="top" align="left" style="padding-top: 19px;" colspan="2">
						<form name="editERProfile"  method="post" action="index.php?stage=electedrepresentative&mode=UpdateElectedrepresentative" enctype="multipart/form-data">
						<table width="100%" cellspacing="0" cellpadding="0" border="0">
						  <tbody>
						  <!-- -->
							<tr>
								<td width="400" valign="top" align="left">
									<span class="arial_12_000"><strong>First Name:</strong></span>
									<strong><br>
									  <input type="text" style="width: 373px;" id="firstName" name="firstName" value="<?php echo $this->_tpl_vars['oMember']->first_name; ?>
" readonly="readonly" class="inactive_ele"/>
									  <br><br>
									</strong>
								</td>
								<td width="86" valign="top" align="left">&nbsp;</td>
								<td valign="top" align="left">
										<span class="arial_12_000"><strong>Last Name:</strong></span>
									<strong><br>
									  <input type="text" style="width: 373px;" id="lastName" name="lastName" value="<?php echo $this->_tpl_vars['oMember']->last_name; ?>
" readonly="readonly" class="inactive_ele"/>
									  <br><br>
									</strong>
								</td>
							</tr>
							
							<tr>
								<td width="400" valign="top" align="left">
									<span class="arial_12_000"><strong>User Name:</strong></span>
									<strong><br>
									  <input type="text" style="width: 373px;" id="user_name" name="user_name" value="<?php echo $this->_tpl_vars['oMember']->user_name; ?>
" readonly="readonly" class="inactive_ele"/>
									  <br><br>
									</strong>
								</td>
								<td width="86" valign="top" align="left">&nbsp;</td>
								<td valign="top" align="left">
								<span class="error-message">*</span>&nbsp;
								<span class="arial_12_000"><strong>Email:</strong></span>
									<strong><br>
									  <input type="text" style="width: 373px;" id="email" name="email" value="<?php echo $this->_tpl_vars['oMember']->email; ?>
" />
									  <br><br>
									</strong>
								</td>
							</tr>							
							<tr>
								<td width="400" valign="top" align="left">
									<span class="arial_12_000"><strong>Password:</strong></span>
									<strong><br>
									  <input type="password" style="width: 373px;" id="password" name="password" />
									  <br><br>
									</strong>
								</td>
								<td width="86" valign="top" align="left">&nbsp;</td>
								<td valign="top" align="left">
										<span class="arial_12_000"><strong>Confirm Password:</strong></span>
									<strong><br>
									  <input type="password" style="width: 373px;" id="re_password" name="re_password" value=""  />
									  <br><br>
									</strong>
								</td>
							</tr>
							 <tr>
								
                                <td colspan="3" valign="top" align="center" style="padding:20px 0px 0px 0px;">
								<table cellspacing="0" cellpadding="10" border="0">
                                  <tbody>
								  <tr>
                                    <td valign="middle" align="left">
                                    <input type="hidden" name="member_id" value="<?php echo $this->_tpl_vars['oMember']->member_id; ?>
" />
                                    <input type="submit" name="affEditSubmit" value="" style="background:url('images/img_submit_.gif') no-repeat; border:none;width:78px;height:27px;cursor:pointer;" /></td>
                                    <td valign="middle" align="right"><a href="index.php?stage=electedrepresentative&mode=electedrepresentativedashboard"><img width="78" border="0" height="27" alt="" src="images/img_cancel.gif"></a></td>
                                  </tr>
                                </tbody></table>
								</td>
								</tr>
						<!-- -->
						</tbody></table>
						</form>
						</td>
					  </tr>
					  </tbody></table></td>
				  </tr>
				 </tbody></table></td>
				</tr>
			  </tbody></table></td>
			</tr>
		  </tbody></table></td>
	  </tr>
	</tbody></table></td>
  </tr>
  
<?php echo '
<script language=\'javascript\' type=\'text/javascript\'>
	var frmvalidator	=	new Validator("editERProfile");
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
					return false;
				}
			}
		}		
		return true
	}
</script>
'; ?>
	