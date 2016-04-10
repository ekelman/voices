<?php /* Smarty version 2.6.10, created on 2014-03-09 22:16:52
         compiled from member/ihtml/login.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'default', 'member/ihtml/login.html', 57, false),)), $this); ?>
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
					<td height="37" align="left" valign="top" class="Trebuchet_27_c60000">Login</td>
				  </tr>
				  <tr>
					<td align="left" valign="top" bgcolor="#b1b0ac" class="arial_20_c40306"><img src="images/trans.gif" width="1" height="1" alt="" /></td>
				  </tr>
				  <tr>
					<td align="center" valign="top" style="padding:27px 5px 15px 0px;">
					<table width="356" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                <td align="left" valign="top"><img src="images/img_right_colum_corner1.gif" width="356" height="7" alt="" /></td>
                              </tr>
                              <tr>
                                <td align="left" valign="top" class="e6e6e6" style="padding:12px 41px 15px 34px;">
								<?php if (( ! isset ( $this->_tpl_vars['user_registration_register_view'] ) || ( isset ( $this->_tpl_vars['user_registration_register_view'] ) && ( $this->_tpl_vars['user_registration_register_view'] == 'Y' ) ) )): ?>  
								<form id="signin" name="signin" method="post" action="" style="padding:0;margin:0;">
								<table width="100%" border="0" cellspacing="0" cellpadding="0">
								 <?php if (isset ( $this->_tpl_vars['sErrorMessage'] ) && $this->_tpl_vars['sErrorMessage'] != ""): ?>
								  <tr>
									<td height="10" align="center" valign="middle" class="error-message"><?php echo $this->_tpl_vars['sErrorMessage']; ?>
</td>
								  </tr>
								  <tr>
									<td width="189"><img src="images/trans.gif" alt="" width="1" height="1" /></td>
								  </tr>
								  <?php else: ?>
								  <tr>
									<td width="189"><img src="images/trans.gif" alt="" width="1" height="3" /></td>
								  </tr>
								  <?php endif; ?>
                                  <tr>
                                    <td align="left" valign="top" class="Trebuchet_18_c50115">Login </td>
                                  </tr>
                                  <tr>
                                    <td align="left" valign="top" style="padding:10px 0px 17px 0px;">
									<table width="100%" border="0" cellspacing="0" cellpadding="0">
                                      <tr>
                                        <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                          <tr>
                                            <td width="33%" align="center" valign="middle" class="arial_12_000"><span class="error-message">*</span><strong>Username:</strong></td>
                                            <td width="67%" align="left" valign="top"><input type="username" name="username" id="textfield" style="width:208px;" value="<?php echo ((is_array($_tmp=@$_COOKIE['username'])) ? $this->_run_mod_handler('default', true, $_tmp, '') : smarty_modifier_default($_tmp, '')); ?>
"/></td>
                                          </tr>
                                        </table></td>
                                      </tr>
                                      <tr>
                                        <td align="left" valign="top"><img src="images/trans.gif" width="1" height="9" alt="" /></td>
                                      </tr>
                                      <tr>
                                        <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                          <tr>
                                            <td width="33%" align="center" valign="middle" class="arial_12_000"><span class="error-message">*</span><strong>Password:</strong></td>
                                            <td width="67%" align="left" valign="top"><input type="password" name="password" id="password" style="width:208px;" /></td>
                                          </tr>
                                        </table></td>
                                      </tr>
                                    </table></td>
                                  </tr>
                                  <tr>
                                    <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                      <tr>
                                        <td width="71" align="left" valign="middle">&nbsp;</td>
                                        <td width="24" align="left" valign="middle">
											<input type="checkbox"  										
											 name="remember" id="remember" value="1"  <?php if (isset ( $_COOKIE['remember'] ) && $_COOKIE['remember'] == 1): ?> checked="checked" <?php endif; ?>
											/>
										</td>
										<td width="85" align="left" valign="middle" class="arial_12_000">Remember Me
										</td>
                                        <td   align="right" valign="middle" class="arial_11_967947_bold">
										<a href="index.php?stage=member&mode=forgotpassword" class="arial_11_967947">Forgot Password?</a></td>
                                      </tr>
                                    </table></td>
                                  </tr>
                                  <tr>
                                    <td height="55" align="left" valign="left"  style="padding-left:71px;">
                                    <input type='hidden' name='article_id' value='<?php echo $this->_tpl_vars['article_id']; ?>
'/>
									<input type='hidden' name='stage' value='member'/>
									<input type='hidden' name='mode' value='getInside'/>
									<input type="image" src="images/img_login.jpg" style="border:none" alt="Login" title="Login" width="81" height="28" border="0" /></td>
                                  </tr>
                                </table>
								</form>
								<?php endif; ?>								
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

	var frmvalidator	=	new Validator("signin");
	frmvalidator.addValidation("username","req","Please enter Username.");
	frmvalidator.addValidation("password","req","Please enter your Password.");	
</script>
'; ?>
			
	  