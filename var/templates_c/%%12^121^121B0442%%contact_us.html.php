<?php /* Smarty version 2.6.10, created on 2014-03-09 22:16:52
         compiled from pages/ihtml/contact_us.html */ ?>
<?php echo '
<script language="javascript" src="scripts/gen_validatorv4.js"></script>

<script>
jQuery(document).ready(function() { 

	 jQuery(\'#Send\').click(function() {  
	 	
			// name validation
			
			var nameVal = $("#name").val();
			if(nameVal == \'\') {
				
				$("#name_error").html(\'\');
				$("#name").after(\'<label class="error" id="name_error">Please enter your name.</label>\');
				return false
			}
			else
			{
				$("#name_error").html(\'\');
			}
			
			/// email validation
			
			var emailReg = /^([\\w-\\.]+@([\\w-]+\\.)+[\\w-]{2,4})?$/;
			var emailaddressVal = $("#email").val();
			
			if(emailaddressVal == \'\') {
				$("#email_error").html(\'\');
				$("#email").after(\'<label class="error" id="email_error">Please enter your email address.</label>\');
				return false
			}
			else if(!emailReg.test(emailaddressVal)) {
				$("#email_error").html(\'\');
				$("#email").after(\'<label class="error" id="email_error">Enter a valid email address.</label>\');
				return false
			 
			}
			else
			{
				$("#email_error").html(\'\');
			}
		
			$.post("post.php?"+$("#MYFORM").serialize(), {
		
			}, function(response){
			
			if(response==1)
			{
				$("#after_submit").html(\'\');
				$("#Send").after(\'<label class="success" id="after_submit">Your message has been submitted.</label>\');
				change_captcha();
				clear_form();
			}
			else
			{
				$("#after_submit").html(\'\');
				$("#Send").after(\'<label class="error" id="after_submit">Error ! invalid captcha code .</label>\');
			}
			
			
		});
				
		return false;
	 });
	 
	 // refresh captcha
	 jQuery(\'#refresh\').click(function() {  			
			change_captcha();
	 });
	 
	 function change_captcha()
	 {
	 	document.getElementById(\'captcha\').src="get_captcha.php?rnd=" + Math.random();
	 }
	 
	 function clear_form()
	 {
	 	jQuery("#name").val(\'\');
		jQuery("#email").val(\'\');
		jQuery("#message").val(\'\');
	 }
});
 
 
 	
</script>		


<style type="text/css">
	#wrap{
		border:solid #CCCCCC 1px;
		width:203px; bgcolor:#fff;		
		-webkit-border-radius: 10px;
		float:left;
		-moz-border-radius: 10px;
		border-radius: 10px;
		padding:3px;
		margin-top:3px;
		margin-left:0px;
	}
</style>
'; ?>


<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td class="arial_16_c40306"><table width="100%" border="0"
				cellspacing="0" cellpadding="0">
				<tr>
					<td align="left" valign="top" class="arial_16_c40306"><table
							width="100%" border="0" cellspacing="0" cellpadding="0">
							<tr>
								<td align="left" valign="top"><table width="100%" border="0"
										cellspacing="0" cellpadding="0">
										<tr>
											<td height="37" align="left" valign="top"
												class="Trebuchet_27_c60000">Contact Us</td>
										</tr>
										<tr>
											<td align="left" valign="top" bgcolor="#b1b0ac"
												class="arial_20_c40306"><img src="images/trans.gif"
												width="1" height="1" alt="" /></td>
										</tr>
										<tr>
											<td align="center" valign="top"
												style="padding: 27px 5px 15px 0px;">
												<table width="356" border="0" cellspacing="0"
													cellpadding="0">
													<tr>
														<td align="left" valign="top"><table width="100%"
																border="0" cellspacing="0" cellpadding="0">
																<tr>
																	<td align="left" valign="top"><img
																		src="images/img_right_colum_corner1.gif" width="356"
																		height="7" alt="" /></td>
																</tr>
																<tr>
																	<td align="left" valign="top" class="e6e6e6"
																		style="padding: 12px 41px 15px 34px;">

																		<form id="contactus" name="contactus" method="post"
																			action="" style="padding: 0; margin: 0;">
																			<!-- Start of form -->

																			<table width="100%" border="0" cellspacing="0"
																				cellpadding="0">
																				<?php if (isset ( $this->_tpl_vars['sErrorMessage'] ) && $this->_tpl_vars['sErrorMessage'] != ""): ?>
																				<tr>
																					<td height="10" align="center" valign="middle"
																						class="error-message"><?php echo $this->_tpl_vars['sErrorMessage']; ?>
</td>
																				</tr>
																				<tr>
																					<td width="189"><img src="images/trans.gif" alt=""
																						width="1" height="1" /></td>
																				</tr>
																				<?php else: ?>
																				<tr>
																					<td width="189"><img src="images/trans.gif" alt=""
																						width="1" height="3" /></td>
																				</tr>
																				<?php endif; ?>
																				<tr>
																					<td align="left" valign="top"
																						class="Trebuchet_18_c50115">Contact Us</td>
																				</tr>
																				<tr>
																					<td align="left" valign="top"
																						style="padding: 10px 0px 17px 0px;">
																						<table width="100%" border="0" cellspacing="0"
																							cellpadding="0">
																							<tr>
																								<td align="left" valign="top">
																								<table width="100%" border="0" cellspacing="0"	cellpadding="0">
																										<tr>
																											<td width="33%" align="center"
																												valign="middle" class="arial_12_000">
																												<span class="error-message">*</span>
																												<strong>Name:</strong>
																											</td>
																											<td width="67%" align="left" valign="top">
																											
																											<input
																												type="name" name="name"
																												id="textfield" style="width: 208px;"
																												value="" />
																												
																											</td>
																										</tr>
																								</table>
																								</td>
																							</tr>
																							<tr>
																								<td align="left" valign="top"><img
																									src="images/trans.gif" width="1" height="9"
																									alt="" /></td>
																							</tr>
																							<tr>
																								<td align="left" valign="top">
																									<table width="100%" border="0" cellspacing="0" cellpadding="0">
																										<tr>
																											<td width="33%" align="center"
																												valign="middle" class="arial_12_000">
																												<span class="error-message">*</span>
																												<strong>Email:</strong>
																											</td>
																											<td width="67%" align="left" valign="top"><input
																												type="text" name="email"
																												id="email" style="width: 208px;" /></td>
																										</tr>
																									</table></td>
																							</tr>
																							<tr>
																								<td align="left" valign="top"><img
																									src="images/trans.gif" width="1" height="9"
																									alt="" /></td>
																							</tr>
																							
																							<tr>
																								<td align="left" valign="top">
																									<table	width="100%" border="0" cellspacing="0"	cellpadding="0">
																										<tr>
																											<td width="33%" align="center"
																												valign="middle" class="arial_12_000">
																												<span class="error-message">*</span>
																												<strong>Message:</strong>
																											</td>
																											<td width="67%" align="left" valign="top">
																												<textarea id="message" name="message" style="width:208px;"></textarea>																												
																											</td>
																										</tr>
																									</table>
																								</td>
																							</tr>
																							
																							<tr>
																								<td align="left" valign="top"><img
																									src="images/trans.gif" width="1" height="9"
																									alt="" /></td>
																							</tr>
																							
																							
																							<tr>
																								<td align="left" valign="top">
																								
																									<table width="100%" border="0" cellspacing="0" cellpadding="0">
																										<tr>
																											<td width="33%" align="center"
																												valign="middle" class="arial_12_000">
																												<span class="error-message">*</span>
																												<strong>Captcha:</strong>
																											</td>
																											<td width="67%" align="left" valign="top">
																												<div id="wrap" align="center">
																													<img src="./get_captcha.php" alt="" id="captcha" />																							
																													<br clear="all" />
																													<input name="code" type="text" id="code">
																												</div>
																											</td>
																										</tr>
																									</table>
																									
																								</td>
																							</tr>
																							
																						</table></td>
																				</tr>																				

																				
																				
																				<tr>
																					<td height="55" align="left" valign="left"
																						style="padding-left: 71px;">																						

																						<a href="javascript:void(0);" class="arial_12_a60000_bold" id="refresh">Refresh</a>																																													
																						<br clear="all" /><br clear="all" />
																						
																						<input type='hidden' name='stage' value='pages'/>
																						<input type='hidden' name='mode' value='SubmitContact'/>
																						
																						
																						
																						<input type="image" src="images/img_submit_.gif"
																						 alt="Send" title="Send"
																						 border="0" /></td>
																				</tr>
																			</table>

																			<!-- End of form -->
																		</form>
																	</td>
																</tr>
																<tr>
																	<td align="left" valign="top"><img
																		src="images/img_right_colum_corner2.gif" width="356"
																		height="7" alt="" /></td>
																</tr>
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
</table>
</td>

<?php echo '
<script language=\'javascript\' type=\'text/javascript\'>

	var frmvalidator	=	new Validator("contactus");
	frmvalidator.addValidation("name","req","Please enter name.");
	frmvalidator.addValidation("email","req","Please enter email.");		
	frmvalidator.addValidation("email","email","Format of Email provided is incorrect.");
	frmvalidator.addValidation("message","req","Please enter message.");	
	frmvalidator.addValidation("code","req","Please enter code as shown in box.");	
	
</script>
'; ?>
