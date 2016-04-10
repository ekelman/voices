<?php /* Smarty version 2.6.10, created on 2012-03-14 18:39:18
         compiled from affiliates/ihtml/sponsor_edit.html */ ?>
<?php echo '
<script language="javascript" src="scripts/gen_validatorv4.js"></script>
'; ?>

		<table width="100%" cellspacing="0" cellpadding="0" border="0">
			<tr>
				<td valign="top" align="left" style="padding:0px 15px 51px 12px;" class="bg_f7f6f2">
	
					<table width="100%" cellspacing="0" cellpadding="0" border="0">
						<tr>
							<td class="arial_16_c40306">

								<table width="100%" cellspacing="0" cellpadding="0" border="0">
									<tr>
										<td valign="top" align="left" class="arial_16_c40306">

											<table width="100%" cellspacing="0" cellpadding="0" border="0">
												<tr>
													<td valign="bottom" align="left" height="37"
														style="padding-bottom: 5px;"
														class="Trebuchet_27_c60000" colspan="2">Add New Sponsor</td>
												</tr>
												<tr>
													<td valign="top" bgcolor="#b1b0ac" align="left"
														class="arial_20_c40306" colspan="2"><img width="1"
														height="1" alt="" src="images/trans.gif">
													</td>
												</tr>
												<tr>
													<td valign="top" bgcolor="#b1b0ac" align="left"
														class="arial_20_c40306" colspan="2"><img width="1"
														height="1" alt="" src="images/trans.gif">
													</td>
												</tr>
												
												<?php if ($this->_tpl_vars['vMsg'] != ''): ?>
												<tr>
													<td valign="bottom" align="center" class="error-message"
														colspan="2" height="25"><?php echo $this->_tpl_vars['vMsg']; ?>
</td>
												</tr>
												<?php endif; ?>
												
												<tr>
													<td valign="top" align="left" style="padding-top: 19px;" colspan="2">
														
														<table width="100%" border="0" cellspacing="0" cellpadding="0">
															<tr>
																<td>

																	<form name="addSponsors" id="addSponsors"
																		method="post" >																		
																		
																		
																		<table width="100%" cellspacing="0" cellpadding="0">
																			<tr>
																				<td>
																					<h3 class="formtitles">
																						<span class="error-message">*</span> Sponsor Name:
																					</h3>
																				</td>
																				<td width="155px">&nbsp;</td>
																				<td>&nbsp;</td>
																			</tr>
																			
																			<tr>
																				<td valign="top"><input
																					class="borderBlack widthinput" type="text"  value="<?php echo $this->_tpl_vars['affiliateSponsor']['sponsor_name']; ?>
" 
																					name="sponsor_name" /></td>
																				<td height="30px">&nbsp;</td>
																				<td valign="top">&nbsp;</td>
																			</tr>
																			
																			<tr>
																				<td colspan="3">
																					<h3 class="formtitles">
																						<span class="error-message">*</span> Sponsor Details:
																					</h3>
																				</td>
																			</tr>
																			
																			<tr>
																				<td colspan="3"><textarea
																						name="sponsor_description" class="borderBlack"
																						style="width: 99.5%; height: 90px;"><?php echo $this->_tpl_vars['affiliateSponsor']['sponsor_description']; ?>
</textarea>
																				</td>
																			</tr>
																			
																			<tr>
																				<td>
																					<h3 class="formtitles">
																						 Sponsor's Website URL:
																					</h3>
																				</td>
																				<td width="155px">&nbsp;</td>
																				<td>&nbsp;</td>
																			</tr>
																			
																			<tr>
																				<td valign="top"><input
																					class="borderBlack widthinput" type="text"
																					name="sponsor_url" id="sponsor_url" value="<?php echo $this->_tpl_vars['affiliateSponsor']['sponsor_url']; ?>
" />
																					
																					<input	 type="hidden"		name="id" id="id" value="<?php echo $this->_tpl_vars['affiliateSponsor']['id']; ?>
" />
																					</td>
																				<td height="30px">&nbsp;</td>
																				<td valign="top">&nbsp;</td>
																			</tr>

																			
																			<tr>
																				<td class="tdReqPadd20" colspan="3"
																					align="center">
																					<table width="20%">
																						<tr>
																							<td><input type="hidden" name="affiliate_id" id="affiliate_id" value='<?php echo $this->_tpl_vars['affiliate_id']; ?>
' />
																								<input type="hidden" name="stage" value='affiliates' />
																								<input type="hidden" name="mode" value='UpdateSponsor' />
																								
																								<input name="submitNewBill" id="submitNewBill" class="btnBillSubmit" type="submit" title="submit" value="" style="cursor: pointer;" />
																							</td>
																							<td>
																								<input name="cancelBill" class="btnBillCancel" type="cancel"  title="cancel" 
																								onclick="javascript:window.location.href='index.php?stage=affiliates&mode=AffiliateDashboard'"
																								value="" style="cursor: pointer;" />
																							</td>
																						</tr>
																					</table>
																				</td>
																			</tr>
																		</table>
																	</form>
																</td>
															</tr>
														</table>
													
													</td>
												</tr>
											</table>																
													
											
										</td>
									</tr>
								</table>
								
							</td>
						</tr>
					</table>

				</td>
			</tr>
		</table>


<?php echo '
<script language=\'javascript\' type=\'text/javascript\'>
	var form = document.forms["addSponsors"];
	var frmvalidator	=	new Validator("addSponsors");
	frmvalidator.addValidation("sponsor_name","req","Please enter Sponsor Name.");
	frmvalidator.addValidation("sponsor_name","alphabetic_space","Only alphabets are allowed in Sponsor Name.");
	frmvalidator.addValidation("sponsor_description","req","Please enter Sponsor description.");
	
	frmvalidator.setAddnlValidationFunction(DoCustomValidation);
	
    function DoCustomValidation()
	{
		var form = document.forms["addSponsors"];
		
		if(form.sponsor_url.value!="")
		{
			
			if(!isUrl(form.sponsor_url.value))
			{
				alert("Please enter correct URL format (\'http://www.xyz.com\')");
				form.sponsor_url.focus();
				return false;
			}	
		}					
		return true;
	}			

	function isUrl(s) {
		var regexp = /(ftp|http|https):\\/\\/(\\w+:{0,1}\\w*@)?(\\S+)(:[0-9]+)?(\\/|\\/([\\w#!:.?+=&%@!\\-\\/]))?/
		return regexp.test(s);
	}

</script>
'; ?>
			