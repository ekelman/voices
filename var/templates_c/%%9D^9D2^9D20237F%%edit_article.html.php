<?php /* Smarty version 2.6.10, created on 2012-01-27 16:53:25
         compiled from electedrepresentative/ihtml/edit_article.html */ ?>
<?php echo '
<script language="javascript" src="scripts/gen_validatorv4.js"></script>
'; ?>


<table width="100%" cellspacing="0" cellpadding="0" border="0">
	<tbody>
		<tr>
			<td class="arial_16_c40306">
				<table width="100%" cellspacing="0" cellpadding="0" border="0">
				<tbody>
					<tr>
						<td valign="top" align="left" class="arial_16_c40306">
							<table width="100%" cellspacing="0" cellpadding="0" border="0">
							<tbody>
								<tr>
									<td valign="top" align="left">
										<table width="100%" cellspacing="0" cellpadding="0" border="0">
										<tbody>
											<tr>
												<td valign="bottom" align="left" height="37" style="padding-bottom: 5px;" class="Trebuchet_27_c60000" colspan="2">Edit Article</td>
											</tr>

											<tr>
												<td valign="top" bgcolor="#b1b0ac" align="left" class="arial_20_c40306" colspan="2"><img width="1" height="1" alt="" src="images/trans.gif"></td>
											</tr>

											<tr>
												<td valign="top" bgcolor="#b1b0ac" align="left" class="arial_20_c40306" colspan="2"><img width="1" height="1" alt="" src="images/trans.gif"></td>
											</tr>

											<tr>
												<td valign="top" align="left" style="padding-top: 19px;" colspan="2">
													<table width="100%" border="0" cellspacing="0" cellpadding="0">
														<tr>
															<td>
																<form name="ercomments" id="ercomments"	method="post">
																	<table width="100%" cellspacing="0" cellpadding="0">
																		<tr>
																			<td colspan="3"><h3 class="formtitles">Comment:</h3></td>
																		</tr>
																		<tr>																			
																			<td colspan="3">
																			<textarea name="comment" class="borderBlack" maxlength="290" style="width: 99.5%;height:150px;"><?php echo $this->_tpl_vars['oArticle']->comment; ?>
</textarea>																			
																		</td>
																		</tr>
																		<tr>
																			<td class="tdReqPadd20" colspan="3" align="center">
																			<input type="hidden" name = 'articleID' value ="<?php echo $this->_tpl_vars['oArticle']->article_id; ?>
" />
																			<input type="hidden" name = 'electedrepresentativeID' value ="<?php echo $this->_tpl_vars['oArticle']->elected_officer_id; ?>
" />
																			
																			<input type="hidden" name="stage" value='electedrepresentative' />
																			<input type="hidden" name="mode" value='EditArticle' />
																			<input name="updateERArticle" class="btnBillSubmit" type="submit" value="" style="cursor:pointer;"/></td>
																		</tr>
																	</table>						
																</form>
															</td>
														</tr>
													</table>	
												</td>
											</tr>
										</tbody>
										</table>
									</td>
								</tr>
							</tbody>
							</table>
						</td>
					</tr>
				</tbody>
				</table>
			</td>
		</tr>
	</tbody>
</table>
<?php echo '
<script language=\'javascript\' type=\'text/javascript\'>
	var frmvalidator	=	new Validator("ercomments");
	frmvalidator.addValidation("comment","req","Please enter comments.");
	frmvalidator.addValidation("comment","maxlen=300","Comment should not be more then 300 characters.");
</script>
'; ?>