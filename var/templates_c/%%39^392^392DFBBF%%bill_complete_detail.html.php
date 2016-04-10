<?php /* Smarty version 2.6.10, created on 2013-06-26 05:47:47
         compiled from billresources/ihtml/bill_complete_detail.html */ ?>

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
											<td valign="top" align="left"><?php if ($this->_tpl_vars['BillResourcesBillDetailView']): ?> <?php unset($this->_sections['i']);
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['Bills']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['show'] = true;
$this->_sections['i']['max'] = $this->_sections['i']['loop'];
$this->_sections['i']['step'] = 1;
$this->_sections['i']['start'] = $this->_sections['i']['step'] > 0 ? 0 : $this->_sections['i']['loop']-1;
if ($this->_sections['i']['show']) {
    $this->_sections['i']['total'] = $this->_sections['i']['loop'];
    if ($this->_sections['i']['total'] == 0)
        $this->_sections['i']['show'] = false;
} else
    $this->_sections['i']['total'] = 0;
if ($this->_sections['i']['show']):

            for ($this->_sections['i']['index'] = $this->_sections['i']['start'], $this->_sections['i']['iteration'] = 1;
                 $this->_sections['i']['iteration'] <= $this->_sections['i']['total'];
                 $this->_sections['i']['index'] += $this->_sections['i']['step'], $this->_sections['i']['iteration']++):
$this->_sections['i']['rownum'] = $this->_sections['i']['iteration'];
$this->_sections['i']['index_prev'] = $this->_sections['i']['index'] - $this->_sections['i']['step'];
$this->_sections['i']['index_next'] = $this->_sections['i']['index'] + $this->_sections['i']['step'];
$this->_sections['i']['first']      = ($this->_sections['i']['iteration'] == 1);
$this->_sections['i']['last']       = ($this->_sections['i']['iteration'] == $this->_sections['i']['total']);
?>
												<table width="100%" cellspacing="0" cellpadding="0"
													border="0">
													<tr>
														<td valign="top" align="left" height="37"
															class="Trebuchet_27_c60000" ><a
															href="<?php echo $this->_tpl_vars['Bills'][$this->_sections['i']['index']]['public_text_link']; ?>
"
															class="Trebuchet_27_c60000" target="_blank">
																<?php echo $this->_tpl_vars['Bills'][$this->_sections['i']['index']]['bill_title']; ?>
</a>&nbsp;-&nbsp;<a
															href="<?php echo $this->_tpl_vars['Bills'][$this->_sections['i']['index']]['public_text_link']; ?>
"
															class="Trebuchet_27_c60000"><?php echo $this->_tpl_vars['Bills'][$this->_sections['i']['index']]['legtype'];  echo $this->_tpl_vars['Bills'][$this->_sections['i']['index']]['bill_number']; ?>
</a>
														</td>
														
														<td valign="bottom" align="left" height="37">
																<a class="arial12Ba60000" target="_blank" href="http://www.lexisnexis.com/terms/general.aspx">State Net's Terms and conditions</a>	
														</td>
													</tr>


													<tr>
														<td valign="top" align="left"
															style="padding: 16px 5px 11px 15px;"
															class="votealert_bg_new" colspan="2">

															<table width="100%" cellspacing="0" cellpadding="0"
																border="0">

																<tr>
																	<td align="left" valign="top">
																		<table width="100%" border="0" cellspacing="0"
																			cellpadding="0">
																			<tr>
																				<td align="left" valign="top" class="bg_f7f6ee">
																					<table width="100%" border="0" cellspacing="0"
																						cellpadding="0">
																						<tr>
																							<td align="left" valign="top">
																							<span
																								class="arialB13000000"
																								style="text-decoration: none;">
																									<?php echo $this->_tpl_vars['Bills'][$this->_sections['i']['index']]['bill_title']; ?>
 
																							</span>																						
																							
																							</td>
																						</tr>
																						<tr>
																							<td align="left" valign="top"><br />
																								<?php echo $this->_tpl_vars['Bills'][$this->_sections['i']['index']]['bill_summary']; ?>
</td>
																						</tr>
																					</table>
																				</td>
																			</tr>
																		</table>
																	</td>
																</tr>

																<tr>
																	<td>


																		<table width="100%" border="0" cellspacing="0"
																			cellpadding="0">
																			<tr>
																				<td align="left" valign="top">&nbsp;</td>
																			</tr>
																			<tr>
																				<td align="center" valign="top">
																					<table style="width: 872px" border="0"
																						cellspacing="0" cellpadding="0">
																						<tr>
																							<td style="width: 416px" align="left"
																								valign="top">

																								<table width="416" border="0" cellspacing="0"
																									cellpadding="0">
																									<tr>
																										<td width="416" align="left" valign="top">

																											<table width="416" border="0" cellspacing="0"
																												cellpadding="0">
																												<tr>
																													<td width="416" height="32" align="left"
																														valign="middle" class="tophead_grad">In
																														favor of</td>
																												</tr>

																												<tr>
																													<td align="left" valign="top"
																														class="votealert_bg">
																														<table width="100%" border="0"
																															cellspacing="0" cellpadding="0">
																															<?php unset($this->_sections['i']);
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['AffiliateDetailsInSupport']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['show'] = true;
$this->_sections['i']['max'] = $this->_sections['i']['loop'];
$this->_sections['i']['step'] = 1;
$this->_sections['i']['start'] = $this->_sections['i']['step'] > 0 ? 0 : $this->_sections['i']['loop']-1;
if ($this->_sections['i']['show']) {
    $this->_sections['i']['total'] = $this->_sections['i']['loop'];
    if ($this->_sections['i']['total'] == 0)
        $this->_sections['i']['show'] = false;
} else
    $this->_sections['i']['total'] = 0;
if ($this->_sections['i']['show']):

            for ($this->_sections['i']['index'] = $this->_sections['i']['start'], $this->_sections['i']['iteration'] = 1;
                 $this->_sections['i']['iteration'] <= $this->_sections['i']['total'];
                 $this->_sections['i']['index'] += $this->_sections['i']['step'], $this->_sections['i']['iteration']++):
$this->_sections['i']['rownum'] = $this->_sections['i']['iteration'];
$this->_sections['i']['index_prev'] = $this->_sections['i']['index'] - $this->_sections['i']['step'];
$this->_sections['i']['index_next'] = $this->_sections['i']['index'] + $this->_sections['i']['step'];
$this->_sections['i']['first']      = ($this->_sections['i']['iteration'] == 1);
$this->_sections['i']['last']       = ($this->_sections['i']['iteration'] == $this->_sections['i']['total']);
?>
																															<tr>
																																<td align="left" valign="top">
																																	<table width="100%" border="0"
																																		cellspacing="0" cellpadding="0">
																																		<tr>
																																			<td width="47" align="center"
																																				valign="top"><img
																																				src="images/icon_doc.gif" width="27"
																																				height="36" alt=""
																																				style="margin-top: 20px" />
																																			</td>
																																			<td width="367" align="left"
																																				valign="top" class="bg_f7f6ee">
																																				<table width="100%" border="0"
																																					cellspacing="0" cellpadding="0">
																																					<tr>
																																						<td height="22" align="left"
																																							valign="top"><a
																																							href="index.php?stage=affiliates&mode=listaffiliates"
																																							class="arialB13000000"
																																							style="text-decoration: none"><?php echo $this->_tpl_vars['AffiliateDetailsInSupport'][$this->_sections['i']['index']]['organisation_name']; ?>
</a>
																																							<br/>																																							
																																								<a class="arial12Ba60000" href="index.php?stage=subscriber&mode=VoteAlertsDetail&id=<?php echo $this->_tpl_vars['AffiliateDetailsInSupport'][$this->_sections['i']['index']]['article_id']; ?>
">Cast your vote</a>
																																						</td>
																																					</tr>
																																					<tr>
																																						<td align="left" valign="top">
																																							<?php echo $this->_tpl_vars['AffiliateDetailsInSupport'][$this->_sections['i']['index']]['affiliate_comment']; ?>

																																							
																																							

																																						</td>
																																					</tr>
																																				</table></td>
																																		</tr>
																																	</table>
																																</td>
																															</tr>

																															<tr>
																																<td align="left" valign="top"
																																	class="border_dashed"></td>
																															</tr>
																															<?php endfor; else: ?>
																															<tr>
																																<td align="left" valign="top"
																																	class="bg_f7f6ee">No Record Found</td>
																															</tr>
																															<?php endif; ?>
																														</table>
																													</td>
																												</tr>


																											</table>
																										</td>
																									</tr>

																									<tr>
																										<td height="35" align="left" valign="top">&nbsp;</td>
																									</tr>

																								</table>
																							</td>

																							<td style="width: 40px" align="left" valign="top">&nbsp;</td>

																							<td style="width: 416px" align="left"
																								valign="top">
																								<table width="416" border="0" cellspacing="0"
																									cellpadding="0">
																									<tr>
																										<td width="416" align="left" valign="top">



																											<table width="416" border="0" cellspacing="0"
																												cellpadding="0">
																												<tr>
																													<td width="416" height="32" align="left"
																														valign="middle" class="tophead_grad">We
																														oppose</td>
																												</tr>

																												<tr>
																													<td align="left" valign="top"
																														class="votealert_bg">
																														<table width="100%" border="0"
																															cellspacing="0" cellpadding="0">
																															<?php unset($this->_sections['i']);
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['AffiliateDetailsAgainst']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['show'] = true;
$this->_sections['i']['max'] = $this->_sections['i']['loop'];
$this->_sections['i']['step'] = 1;
$this->_sections['i']['start'] = $this->_sections['i']['step'] > 0 ? 0 : $this->_sections['i']['loop']-1;
if ($this->_sections['i']['show']) {
    $this->_sections['i']['total'] = $this->_sections['i']['loop'];
    if ($this->_sections['i']['total'] == 0)
        $this->_sections['i']['show'] = false;
} else
    $this->_sections['i']['total'] = 0;
if ($this->_sections['i']['show']):

            for ($this->_sections['i']['index'] = $this->_sections['i']['start'], $this->_sections['i']['iteration'] = 1;
                 $this->_sections['i']['iteration'] <= $this->_sections['i']['total'];
                 $this->_sections['i']['index'] += $this->_sections['i']['step'], $this->_sections['i']['iteration']++):
$this->_sections['i']['rownum'] = $this->_sections['i']['iteration'];
$this->_sections['i']['index_prev'] = $this->_sections['i']['index'] - $this->_sections['i']['step'];
$this->_sections['i']['index_next'] = $this->_sections['i']['index'] + $this->_sections['i']['step'];
$this->_sections['i']['first']      = ($this->_sections['i']['iteration'] == 1);
$this->_sections['i']['last']       = ($this->_sections['i']['iteration'] == $this->_sections['i']['total']);
?>
																															<tr>
																																<td align="left" valign="top">
																																	<table width="100%" border="0"
																																		cellspacing="0" cellpadding="0">
																																		<tr>
																																			<td width="47" align="center"
																																				valign="top"><img
																																				src="images/icon_doc.gif" width="27"
																																				height="36" alt=""
																																				style="margin-top: 20px" />
																																			</td>
																																			<td width="367" align="left"
																																				valign="top" class="bg_f7f6ee">
																																				<table width="100%" border="0"
																																					cellspacing="0" cellpadding="0">
																																					<tr>
																																						<td height="22" align="left"
																																							valign="top"><a
																																							href="index.php?stage=affiliates&mode=listaffiliates"
																																							class="arialB13000000"
																																							style="text-decoration: none">
																																								<?php echo $this->_tpl_vars['AffiliateDetailsAgainst'][$this->_sections['i']['index']]['organisation_name']; ?>
																																								
																																							</a>
																																								<br/>
																																							<a class="arial12Ba60000" href="index.php?stage=subscriber&mode=VoteAlertsDetail&id=<?php echo $this->_tpl_vars['AffiliateDetailsAgainst'][$this->_sections['i']['index']]['article_id']; ?>
">Cast your vote</a>
																																						</td>
																																					</tr>
																																					<tr>
																																						<td align="left" valign="top">
																																							<?php echo $this->_tpl_vars['AffiliateDetailsAgainst'][$this->_sections['i']['index']]['affiliate_comment']; ?>


																																						</td>
																																					</tr>
																																				</table></td>
																																		</tr>
																																	</table>
																																</td>
																															</tr>

																															<tr>
																																<td align="left" valign="top"
																																	class="border_dashed"></td>
																															</tr>

																															<?php endfor; else: ?>
																															<tr>
																																<td align="left" valign="top"
																																	class="bg_f7f6ee">No Record Found</td>
																															</tr>
																															<?php endif; ?>
																														</table>
																													</td>
																												</tr>


																											</table>
																										</td>
																									</tr>
																									<tr>
																										<td height="35" align="left" valign="top">&nbsp;</td>
																									</tr>
																								</table></td>
																						</tr>
																					</table></td>
																			</tr>
																		</table>
																	</td>
																</tr>

																<!--<tr>
																	<td align="left" valign="top">
																		<table width="100%" border="0" cellspacing="0"
																			cellpadding="0">
																			<tr>
																				<td align="left" valign="top" class="bg_f7f6ee">
																					<table width="100%" border="0" cellspacing="0" cellpadding="0">
																						<tr>
																							<td align="left" valign="top">
																								Petition
																								
																							</td>
																						</tr>
																					</table>
																				</td>
																			</tr>
																		</table>
																	</td>
																</tr>-->


															</table></td>
													</tr>
												</table> <?php endfor; endif; ?> <?php else: ?>
										
										
										<tr>
											<td valign="top" align="center">
												<div class="arial12Ba60000"
													style="margin: 50px; height: 100px">You are not authorized
													to view bill details.</div>
											</td>
										</tr>
										<?php endif; ?>

										</td>
										</tr>
									</tbody>
								</table></td>
						</tr>
					</tbody>
				</table></td>
		</tr>
	</tbody>
</table>
