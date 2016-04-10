<?php /* Smarty version 2.6.10, created on 2013-01-25 10:48:19
         compiled from affiliates/ihtml/edit_affiliate_profile.html */ ?>
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
						<td valign="bottom" align="left" height="37" style="padding-bottom: 5px;" class="Trebuchet_27_c60000" colspan="2">Affiliate's Profile</td>
					  </tr>
					  <tr>
						<td valign="top" bgcolor="#b1b0ac" align="left" class="arial_20_c40306" colspan="2"><img width="1" height="1" alt="" src="images/trans.gif"></td>
					  </tr>
					   <tr>
						<td valign="top" align="left" style="padding: 0px 5px 34px 0px;" class="arial_12_000" colspan="2"><p><?php echo $this->_tpl_vars['vAffiliate']->description; ?>
</p></td>
					  </tr>
					   <tr>
						<td valign="bottom" align="left" style="padding-bottom: 5px;" class="arial_14_c30100" colspan="2">
							Personal Information 
						</td>
					  </tr>
					  
					  <tr>
						<td valign="top" bgcolor="#b1b0ac" align="left" class="arial_20_c40306" colspan="2"><img width="1" height="1" alt="" src="images/trans.gif"></td>
					  </tr>
					  <?php if ($this->_tpl_vars['vMsg'] != ''): ?>
						<tr>
						<td valign="bottom" align="center"  class="error-message" colspan="2">
							<?php echo $this->_tpl_vars['vMsg']; ?>

						</td>
					  </tr>
					  <?php endif; ?>
						<tr>
						<td valign="top" align="left" style="padding-top: 19px;" colspan="2">
						<form name="editAffiliateProfile"  method="post" action="index.php?stage=affiliates&mode=UpdateAffiliate" enctype="multipart/form-data">
						<table width="100%" cellspacing="0" cellpadding="0" border="0">
						  <tbody>
						  <!-- -->
							<tr>
								<td width="400" valign="top" align="left"><span class="error-message">*</span>&nbsp;<span class="arial_12_000"><strong>Contact First Name:</strong></span>
									<strong><br>
									  <input type="text" style="width: 373px;" id="firstName" name="firstName" value="<?php echo $this->_tpl_vars['vAffiliate']->first_name; ?>
"  />
									  <br><br>
									</strong>
								</td>
								<td width="86" valign="top" align="left">&nbsp;</td>
								<td valign="top" align="left"><span class="error-message">*</span>&nbsp;
								<span class="arial_12_000"><strong>Contact Last Name:</strong></span>
									<strong><br>
									  <input type="text" style="width: 373px;" id="lastName" name="lastName" value="<?php echo $this->_tpl_vars['vAffiliate']->last_name; ?>
"  />
									  <br><br>
									</strong>
								</td>
							</tr>
							
							<tr>
								<td width="400" valign="top" align="left">
								<span class="error-message">*</span>&nbsp;
								<span class="arial_12_000"><strong>User Name:</strong></span>
									<strong><br />
									  <input type="text" style="width: 373px;" class id="user_name" name="user_name" value="<?php echo $this->_tpl_vars['vAffiliate']->user_name; ?>
" READONLY />
									  <br><br>
									</strong>
								</td>
								<td width="86" valign="top" align="left">&nbsp;</td>
								<td valign="top" align="left">
								<span class="error-message">*</span>&nbsp;
								<span class="arial_12_000"><strong>Email:</strong></span>
									<strong><br>
									  <input type="text" style="width: 373px;" id="email" name="email" value="<?php echo $this->_tpl_vars['vAffiliate']->email; ?>
"  />
									  <br><br>
									</strong>
								</td>
							</tr>
							
							<tr>
								<td width="400" valign="top" align="left">
								<span class="error-message">*</span>&nbsp;
								<span class="arial_12_000"><strong>New Password:</strong>(otherwise leave it blank)</span>
									<strong><br>
									  <input type="password" style="width: 373px;" id="password" name="password" />
									  <br><br>
									</strong>
								</td>
								<td width="86" valign="top" align="left">&nbsp;</td>
								<td valign="top" align="left">
									<span class="arial_12_000"><strong>Confirm New Password:</strong></span>
									<strong><br>
									  <input type="password" style="width: 373px;" id="re_password" name="re_password" value=""  />
									  <br><br>
									</strong>
								</td>
							</tr>
							
							<tr>
								<td width="400" valign="top" align="left">
								<span class="error-message">*</span>&nbsp;
								<span class="arial_12_000"><strong>Organization Name:</strong></span>
									<strong><br>
									  <input type="text" style="width: 373px;" id="org_name" name="org_name" value="<?php echo $this->_tpl_vars['vAffiliate']->organisation_name; ?>
" maxlength="80"/>
									  <br><br>
									</strong>
								</td>
								<td width="86" valign="top" align="left">&nbsp;</td>
								<td valign="top" align="left">
								<span class="error-message">*</span>&nbsp;
								<span class="arial_12_000"><strong>Organization Website:</strong></span>
									<strong><br>
									  <input type="text" style="width: 373px;" id="org_address" name="org_address" value="<?php echo $this->_tpl_vars['vAffiliate']->organisation_website; ?>
"  />
									  <br><br>
									</strong>
								</td>
							</tr>
							
							<tr>
								<td colspan="3" valign="top" align="left">
								<span class="error-message">*</span>&nbsp;
								<span class="arial_12_000"><strong> Organization Profile:</strong></span>
									<strong><br>
									  <textarea style="width: 95%;height:90px;" id="description" name="description"><?php echo $this->_tpl_vars['vAffiliate']->description; ?>
</textarea>
									  <br><br>
								</strong>
								</td>
							</tr>

							<tr>
								<td colspan="3" valign="top" align="left">
								<span class="error-message">*</span>&nbsp;
								<span class="arial_12_000"><strong>Address:</strong></span>
									<strong><br>
									  <textarea style="width: 95%;height:90px;" id="street_address" name="street_address"><?php echo $this->_tpl_vars['vAffiliate']->street_address; ?>
</textarea>
									  <br><br>
									</strong>
								</td>								
							</tr>
							
							<tr>
								<td width="400" valign="top" align="left">
								<span class="error-message">*</span>&nbsp;
								<span class="arial_12_000"><strong>City:</strong></span>
									<strong><br>
									  <input type="text" style="width: 373px;" id="city" name="city" value="<?php echo $this->_tpl_vars['vAffiliate']->city; ?>
"  />
									  <br><br>
									</strong>
								</td>
								<td width="86" valign="top" align="left">&nbsp;</td>
								<td valign="top" align="left">
								<span class="error-message">*</span>&nbsp;
								<span class="arial_12_000"><strong>State:</strong></span>
									<strong><br>
									  <input type="text" style="width: 373px;" id="state" name="state" value="<?php echo $this->_tpl_vars['vAffiliate']->state; ?>
"  />
									  <br><br>
									</strong>
								</td>
							</tr>
							
							<tr>
								<td width="400" valign="top" align="left">
								<span class="error-message">*</span>&nbsp;
								
								<span class="arial_12_000"><strong>Country:</strong></span>
									<br>
										<?php echo $this->_tpl_vars['vAffiliate']->country; ?>

									  <input type="hidden" style="width: 373px;" id="country" name="country" value="<?php echo $this->_tpl_vars['vAffiliate']->country; ?>
"  />
									  
									  <br><br>
									
								</td>
								<td width="86" valign="top" align="left">&nbsp;</td>
								<td valign="top" align="left">
								<span class="error-message">*</span>&nbsp;
								<span class="arial_12_000"><strong>Postal Code:</strong></span>
									<strong><br>
									  <input type="text" style="width: 373px;" id="zip_code" name="zip_code" value="<?php echo $this->_tpl_vars['vAffiliate']->zip_code; ?>
"  />
									  <br><br>
									</strong>
								</td>
							</tr>
							<tr>
								<td width="400" valign="top" align="left">
									<span class="arial_12_000"><strong>Affiliate Code:</strong></span>
									<br /><?php echo $this->_tpl_vars['vAffiliate']->affiliate_code; ?>

									
									<br /><br />
									
									<span class="arial_12_000"><strong>Donation URL:</strong></span><br>
									  <input type="text" style="width: 373px;" id="donation_url" name="donation_url" value="<?php echo $this->_tpl_vars['vAffiliate']->donation_url; ?>
" />
									
								</td>
								<td width="86" valign="top" align="left">&nbsp;</td>
								<td valign="top" align="left">								
									<span class="arial_12_000"><strong>Promo Code:</strong></span>
									<br />
										<?php echo $this->_tpl_vars['vAffiliate']->promo_code; ?>
									
									<br /><br />
									
								
								<?php if ($this->_tpl_vars['AffiliateContentPageHeaderView']): ?>
									<span class="arial_12_000"><strong>Banner:</strong></span>									
									<br />
									<?php if ($this->_tpl_vars['AffiliateContentPageHeaderModifyOwnContent']): ?>
										<input type="file" name="organisation_banner" id="organisation_banner" />&nbsp;&nbsp;
									<?php endif; ?>
									
									
									<?php if ($this->_tpl_vars['vAffiliate']->banner != ''): ?>
										<a href="<?php echo $this->_tpl_vars['siteurl']; ?>
/UserFiles/affiliates_logo/<?php echo $this->_tpl_vars['vAffiliate']->banner; ?>
" target="_blank">view banner</a>
									<?php else: ?>
										No Banner uploaded.
									<?php endif; ?>
								<?php endif; ?>
								</td>
							</tr>
							 <tr>
                                <td colspan="3" valign="top" align="center" style="padding:20px 0px 0px 0px;">
								<table cellspacing="0" cellpadding="10" border="0">
                                  <tbody>
								  <tr>
                                    <td valign="middle" align="left">
									<input type="hidden" name="member_id" value="<?php echo $this->_tpl_vars['vAffiliate']->member_id; ?>
" />
									<input type="hidden" name="old_banner_name" value="<?php echo $this->_tpl_vars['vAffiliate']->banner; ?>
" />
                                    <input type="submit" name="affEditSubmit" value="" style="background:url('images/img_submit_.gif') no-repeat; border:none;width:78px;height:27px;cursor:pointer;" />
                                    </td>
                                    <td valign="middle" align="right">
                                    <a href="index.php?stage=affiliates&mode=AffiliateProfile">
                                    <img width="78" border="0" height="27" alt="" src="images/img_cancel.gif"></a>
                                    </td>
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
	var frmvalidator	=	new Validator("editAffiliateProfile");
	frmvalidator.addValidation("firstName","req","Please enter your First Name.");
	frmvalidator.addValidation("firstName","alphabetic_space","Only alphabets are allowed in First Name.");
	frmvalidator.addValidation("lastName","req","Please enter your Last Name.");
	frmvalidator.addValidation("lastName","alphabetic_space","Only alphabets are allowed in Last Name.");
	
	frmvalidator.addValidation("email","req","Please enter your Email.");
	frmvalidator.addValidation("email","email","Please enter a valid Email.");
	
	frmvalidator.addValidation("org_name","req","Please enter your Organization Name.");
	frmvalidator.addValidation("org_name","maxlen=50","Organization Name should not be more then 50 characters.");
	
	frmvalidator.addValidation("org_address","req","Please enter your Organization Website.");
	frmvalidator.addValidation("org_address","url","Please enter a valid Organization Website.");
	
	frmvalidator.addValidation("state","req","Please enter your state.");
	frmvalidator.addValidation("state","alphabetic_space","Only alphabets are allowed in State.");
	
	frmvalidator.addValidation("city","req","Please enter your city.");
	frmvalidator.addValidation("city","alphabetic_space","Only alphabets are allowed in City.");
	
	frmvalidator.addValidation("zip_code","req","Please enter your postal code.");
	frmvalidator.addValidation("zip_code","alphanumeric","Only alphanumeric are allowed in Postal Code.");
	
	frmvalidator.addValidation("country","req","Please enter your country.");
	frmvalidator.addValidation("country","alphabetic_space","Only alphabets are allowed in country.");
	
	frmvalidator.addValidation("street_address","req","Please enter your address.");
	frmvalidator.addValidation("description","req","Please enter your description.");
	
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
					 document.forms[0].re_password.select();
					 return false;
				}
			}
		}

			
		return true
	}
</script>
'; ?>
	