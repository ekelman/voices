<?php /* Smarty version 2.6.10, created on 2014-03-09 22:16:52
         compiled from member/ihtml/forgot_password.html */ ?>
<?php echo '
<script language="javascript" src="scripts/gen_validatorv4.js"></script>
'; ?>

<tr>
<td align="left" valign="top"  style="padding-top:10px;">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
	<td align="left" valign="top" class="bg_f7f6f2"  style="padding:24px 15px 51px 12px;">
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
	  <tr>
		<td class="arial_16_c40306"><table width="100%" border="0" cellspacing="0" cellpadding="0">
		  <tr>
			<td align="left" valign="top" class="arial_16_c40306"><table width="100%" border="0" cellspacing="0" cellpadding="0">
			  <tr>
				<td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
					<td height="37" align="left" valign="top" class="Trebuchet_27_c60000">Forgot Password</td>
				  </tr>
				  <tr>
					<td align="left" valign="top" bgcolor="#b1b0ac" class="arial_20_c40306"><img src="images/trans.gif" width="1" height="1" alt="" /></td>
				  </tr>
					<?php if ($this->_tpl_vars['sErrorMessage'] != ""): ?>
					<tr>
						<td height="10" align="left" valign="middle" class="error-message" style="padding:20px 100px 0px 200px;"><?php echo $this->_tpl_vars['sErrorMessage']; ?>
</td>
					</tr>
					<?php endif; ?>
				  <tr>
					<td align="center" valign="top" style="padding:27px 5px 15px 0px;">
					<table width="356" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td align="left" valign="top"><table width="356" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td align="left" valign="top">
							<table width="100%" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                <td align="left" valign="top"><img src="images/img_right_colum_corner1.gif" width="356" height="7" alt="" /></td>
                              </tr>
                              <tr>
                                <td align="left" valign="top" class="e6e6e6" style="padding:12px 41px 15px 34px;">
								<form id="fForgotPassword" name="fForgotPassword" method="post" action="">
								<table width="100%" border="0" cellspacing="0" cellpadding="0">
                                  <tr>
                                    <td align="left" valign="top" class="Trebuchet_18_c50115">Forgot Password </td>
                                  </tr>
                                  <tr>
                                    <td align="left" valign="top" style="padding:20px 0px 5px 0px;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                      <tr>
                                        <td align="left" valign="top">
										<table width="100%" border="0" cellspacing="0" cellpadding="0">
										  <tr>
											<td align="left" valign="top" colspan="2" class="arial_12_000">Enter your email address below to have your password sent to you.</td>
										  </tr>
										  <tr>
											<td align="left" valign="top" colspan="2"><img src="images/trans.gif" width="1" height="9" alt="" /></td>
										  </tr>
                                          <tr>
                                            <td width="33%" align="center" valign="middle" class="arial_12_000"><strong><span class="error-message">*</span>Email</strong><strong>:</strong></td>
                                            <td width="67%" align="left" valign="top"><input type="email" name="email" id="textfield" style="width:208px;" /></td>
                                          </tr>
                                        </table></td>
                                      </tr>
									  
                                      <tr>
                                        <td align="left" valign="top"><img src="images/trans.gif" width="1" height="9" alt="" /></td>
                                      </tr>
                                    </table></td>
                                  </tr>

                                  <tr>
                                    <td height="55" align="center" valign="left">
									<input type='hidden' name='stage' value='member'/>
									<input type='hidden' name='mode' value='sendPassword'/>
									
									<input type="image" src="images/img_submit_.gif" style="border:none" alt="Submit" title="Submit" width="78" height="27" border="0" /></td>
                                  </tr>
                                </table>
								</form>
								</td>
                              </tr>
							  <tr>
                            <td align="left" valign="top"><img src="images/img_right_colum_corner2.gif" width="356" height="7" alt="" /></td></tr>
                            </table></td>
                          </tr>
                        </table>
					</td>
				  </tr>
				</table></td>
			  </tr>
			</table></td>
			</tr>
		  </table></td>
		</tr>
	  </table></td>
  </tr>
</table>
</td>
</tr>
<?php echo '
<script language=\'javascript\' type=\'text/javascript\'>

	var frmvalidator	=	new Validator("fForgotPassword");	
	frmvalidator.addValidation("email","req","Please enter Email.");
	frmvalidator.addValidation("email","email","Format of Email provided is incorrect.");
</script>
'; ?>