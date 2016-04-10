<?php /* Smarty version 2.6.10, created on 2012-11-09 16:32:40
         compiled from electedrepresentative/ihtml/electedrepresentative_dashboard.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'electedrepresentative/ihtml/electedrepresentative_dashboard.html', 109, false),array('modifier', 'truncate', 'electedrepresentative/ihtml/electedrepresentative_dashboard.html', 226, false),)), $this); ?>
<tr>
	<td class="arial_16_c40306">
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
			<tr>
				<td align="left" valign="top" class="arial_16_c40306">
					<table width="100%" border="0" cellspacing="0" cellpadding="0">
						<tr>
							<td align="center" valign="top"
								style="padding: 16px 13px 13px 13px" class="bg_f7f6f2">
								<table width="100%" border="0" cellspacing="0" cellpadding="0">
									<tr>
										<td class="bg_f7f6f2">
											<table width="100%" border="0" cellspacing="0"
												cellpadding="0">
												<tr>
													<td align="left" valign="top" class="arial_16_c40306">
														<table width="100%" border="0" cellspacing="0"
															cellpadding="0">
															<tr>
																<td colspan="2" align="center">
																	<table width="100%">
																		<tr>
																			<td align="left" valign="top"
																				class="Trebuchet_27_c60000">
																				<?php echo $this->_tpl_vars['oElectoralDistrict']->First_Name; ?>

																				<?php echo $this->_tpl_vars['oElectoralDistrict']->Middle_Name; ?>

																				<?php echo $this->_tpl_vars['oElectoralDistrict']->Last_Name; ?>
's Dashboard</td>
																			<td align="right" valign="middle">
																				<table border="0" cellspacing="0" cellpadding="0"
																					width="470">
																					<tr>
																						<td width="180" align="right" valign="top">
																							<?php if ($this->_tpl_vars['ERContentPollAdd']): ?> <a
																							href="index.php?stage=electedrepresentative&mode=SubmitNewPoll"
																							class="button"><span>Submit New Poll</span>
																						</a>
																						</td> <?php endif; ?>
																						<td width="180" align="right" valign="top">
																							<?php if ($this->_tpl_vars['ERContentArticleAdd']): ?> <a
																							href="index.php?stage=electedrepresentative&mode=SubmitNewContent"
																							class="button"><span>Submit New
																									Article</span>
																						</a>
																						</td> <?php endif; ?>
																						<td width="120" align="right" valign="top"><a
																							href="index.php?stage=electedrepresentative&mode=editprofile"
																							class="button"><span>Edit Profile</span>
																						</a></td>
																					</tr>
																				</table></td>
																		</tr>
																	</table>
																</td>
															</tr>
															<tr>
																<td class="bg_f7f6f2" valign="top" align="center">
																	<table width="100%" cellspacing="0" cellpadding="0"
																		border="0">
																		<tr>
																			<td valign="top" bgcolor="#b1b0ac" align="left"
																				colspan="2" class="arial_20_c40306"><img
																				width="1" height="1" src="images/trans.gif" alt="">
																			</td>
																		<tr>
																	</table>
																</td>
															</tr>
															<?php if ($this->_tpl_vars['vMsg'] != ""): ?>
															<tr>
																<td align="center" class="error-message"
																	style="padding-top: 20px; padding-bottom: 20px;">
																	<?php echo $this->_tpl_vars['vMsg']; ?>
</td>
															</tr>
															<?php endif; ?>
															<tr>
																<td valign="top" align="left"
																	style="padding: 16px 5px 11px 15px;">
																	<table width="100%" cellspacing="0" cellpadding="0"
																		border="0">
																		<tbody>
																			<tr>
																				<td width="732" valign="top" align="left">
																					<table width="100%" cellspacing="0" cellpadding="0"
																						border="0">
																						<tbody>
																							<tr>
																								<td width="125" valign="top" align="left"><img
																									width="113" height="87" class="pic_border"
																									alt=""
																									src="<?php echo $this->_tpl_vars['oElectoralDistrict']->OfficerProfileImage; ?>
">
																								</td>
																								<td width="20" valign="top" align="left">&nbsp;</td>
																								<td width="732" valign="top" align="left">
																									<table width="100%" cellspacing="0"
																										cellpadding="0" border="0">
																										<tbody>
																											<tr>
																												<td valign="top" align="left" height="22"
																													width="75%"><span
																													class="arial12Ba60000"><?php echo $this->_tpl_vars['oElectoralDistrict']->First_Name; ?>

																														<?php echo $this->_tpl_vars['oElectoralDistrict']->Last_Name; ?>
 -
																														<?php echo $this->_tpl_vars['oElectoralDistrict']->Title; ?>
</span><br />
																												<span class="arial11Na60000">
																														<?php echo $this->_tpl_vars['oElectoralDistrict']->Party; ?>
</span>
																												</td>
																												<td valign="top" align="left" height="22"
																													width="25%"><span
																													class="arial12B000000">Current Term:</span>
																													<span class="arial11N000000"><?php echo ((is_array($_tmp=$this->_tpl_vars['oElectoralDistrict']->Term_Start)) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y") : smarty_modifier_date_format($_tmp, "%Y")); ?>

																														-
																														<?php echo ((is_array($_tmp=$this->_tpl_vars['oElectoralDistrict']->Term_End)) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y") : smarty_modifier_date_format($_tmp, "%Y")); ?>
</span>
																												</td>
																											</tr>
																											<tr>
																												<td valign="top" align="left" height="22"
																													colspan="2"></td>
																											</tr>
																											<tr>
																												<td valign="top" align="left" height="22"
																													colspan="2">
																													<table width="100%" cellspacing="0"
																														cellpadding="0" border="0">
																														<tr>
																															<td>
																															<td valign="top" align="left"
																																class="arial_12_000" width="50%"><span
																																class="arial12B000000">Address:</span><br />
																															<span class="arial11N000000"><?php echo $this->_tpl_vars['oElectoralDistrict']->address; ?>
</span>
																															</td>
																															<td valign="top" align="left"
																																class="arial_12_000" width="50%">
																																<?php if ($this->_tpl_vars['oElectoralDistrict']->PrimaryPhone1 != ''): ?> <span class="arial12B000000">Phone:</span><span
																																class="arial11N000000">
																																	<?php echo $this->_tpl_vars['oElectoralDistrict']->PrimaryPhone1; ?>
</span>
																																<?php endif; ?> <?php if ($this->_tpl_vars['oElectoralDistrict']->PrimaryFax1 != ''): ?>
																																<br /> <span class="arial12B000000">Fax:</span><span
																																class="arial11N000000">
																																	<?php echo $this->_tpl_vars['oElectoralDistrict']->PrimaryFax1; ?>
</span>
																																<?php endif; ?> <?php if ($this->_tpl_vars['oElectoralDistrict']->EMail1 != ''): ?> <br /> <span
																																class="arial12B000000">Email:</span><span
																																class="arial11N000000"> <a
																																	title=""
																																	href="mailto:<?php echo $this->_tpl_vars['oElectoralDistrict']->EMail1; ?>
"><?php echo $this->_tpl_vars['oElectoralDistrict']->EMail1; ?>
</a>
																															</span> <?php endif; ?> <?php if ($this->_tpl_vars['oElectoralDistrict']->Url1 != ''): ?> <br /> <span class="arial12B000000">Web
																																	Site:</span><span class="arial11N000000">
																																	<a title=""
																																	href="<?php echo $this->_tpl_vars['oElectoralDistrict']->Url1; ?>
"
																																	target="_blank"><?php echo $this->_tpl_vars['oElectoralDistrict']->Url1; ?>
</a>
																															</span> <?php endif; ?></td>
																														</tr>
																													</table></td>
																											</tr>
																										</tbody>
																									</table>
																								</td>
																							</tr>
																						</tbody>
																					</table></td>
																			</tr>
																		</tbody>
																	</table>
																</td>
															</tr>
															<tr>
																<td align="center" valign="top"
																	style="padding-top: 13px" class="bg_f7f6f2">
																	<table width="100%" border="0" cellspacing="0"
																		cellpadding="0">
																		<tr>
																			<td align="left" valign="top" width="59%">
																				<table width="100%" border="0" cellspacing="0"
																					cellpadding="0">
																					<tr>
																						<td colspan="2" align="left" valign="top">
																							<table width="100%" border="0" cellspacing="0"
																								cellpadding="0">
																								<tr>
																									<td align="center" valign="top">
																										<table style="width: 100%" border="0"
																											cellspacing="0" cellpadding="0">
																											<tr>
																												<td style="width: 100%" align="left"
																													valign="top">
																													<table width="100%" border="0"
																														cellspacing="0" cellpadding="0">
																														<tr>
																															<td width="100%" align="left"
																																valign="top">

																																<table width="100%" border="0"
																																	cellspacing="0" cellpadding="0">
																																	<tr>
																																		<td width="100%" height="32"
																																			align="left" valign="middle"
																																			class="tophead_grad">My Articles</td>
																																	</tr>
																																	<tr>
																																		<td align="left" valign="top"
																																			class="votealert_bg">
																																			<table width="100%" border="0"
																																				cellspacing="0" cellpadding="0">
																																				<?php if ($this->_tpl_vars['ERContentArticleView']): ?> <?php unset($this->_sections['index']);
$this->_sections['index']['name'] = 'index';
$this->_sections['index']['loop'] = is_array($_loop=$this->_tpl_vars['oElectoralDistrictComments']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['index']['show'] = true;
$this->_sections['index']['max'] = $this->_sections['index']['loop'];
$this->_sections['index']['step'] = 1;
$this->_sections['index']['start'] = $this->_sections['index']['step'] > 0 ? 0 : $this->_sections['index']['loop']-1;
if ($this->_sections['index']['show']) {
    $this->_sections['index']['total'] = $this->_sections['index']['loop'];
    if ($this->_sections['index']['total'] == 0)
        $this->_sections['index']['show'] = false;
} else
    $this->_sections['index']['total'] = 0;
if ($this->_sections['index']['show']):

            for ($this->_sections['index']['index'] = $this->_sections['index']['start'], $this->_sections['index']['iteration'] = 1;
                 $this->_sections['index']['iteration'] <= $this->_sections['index']['total'];
                 $this->_sections['index']['index'] += $this->_sections['index']['step'], $this->_sections['index']['iteration']++):
$this->_sections['index']['rownum'] = $this->_sections['index']['iteration'];
$this->_sections['index']['index_prev'] = $this->_sections['index']['index'] - $this->_sections['index']['step'];
$this->_sections['index']['index_next'] = $this->_sections['index']['index'] + $this->_sections['index']['step'];
$this->_sections['index']['first']      = ($this->_sections['index']['iteration'] == 1);
$this->_sections['index']['last']       = ($this->_sections['index']['iteration'] == $this->_sections['index']['total']);
?>
																																				<tr>
																																					<td align="left" valign="top">
																																						<table width="100%" border="0"
																																							cellspacing="0" cellpadding="0">
																																							<tr>
																																								<td width="47" align="center"
																																									valign="top"><img
																																									src="images/icon_doc.gif"
																																									width="27" height="36" alt=""
																																									style="margin-top: 20px" /></td>
																																								<td width="367" align="left"
																																									valign="top" class="bg_f7f6ee">
																																									<table width="100%" border="0"
																																										cellspacing="0"
																																										cellpadding="0">
																																										<tr>
																																											<td align="left" valign="top">
																																												<?php echo ((is_array($_tmp=$this->_tpl_vars['oElectoralDistrictComments'][$this->_sections['index']['index']]->comment)) ? $this->_run_mod_handler('truncate', true, $_tmp, 60) : smarty_modifier_truncate($_tmp, 60)); ?>

																																												&nbsp;&nbsp; <?php if ($this->_tpl_vars['ERContentArticleModifyOwnContent']): ?>
																																												<a
																																												href="index.php?stage=electedrepresentative&mode=EditArticle&articleID=<?php echo $this->_tpl_vars['oElectoralDistrictComments'][$this->_sections['index']['index']]->article_id; ?>
"
																																												class="arial12Ba60000">
																																													<img
																																													src="images/icon_edit.png"
																																													border="0" alt="Edit"
																																													title="Edit" /> </a> <?php endif; ?> <?php if ($this->_tpl_vars['ERContentArticleDelete']): ?> <a
																																												href="index.php?stage=electedrepresentative&mode=DeleteArticle&articleID=<?php echo $this->_tpl_vars['oElectoralDistrictComments'][$this->_sections['index']['index']]->article_id; ?>
"
																																												class="arial12Ba60000"
																																												onClick="if(!confirm('Are you sure to delete this article?')) return false;">
																																													<img
																																													src="images/icon_delete.png"
																																													border="0" alt="Delete"
																																													title="Delete" /> </a> <?php endif; ?></td>
																																										</tr>
																																										<tr>
																																											<td height="26" align="right"
																																												valign="bottom"><span
																																												class="arial12Ba60000"
																																												style="float: left">Dated:&nbsp;<span
																																													class="arial11Na60000"><?php echo ((is_array($_tmp=$this->_tpl_vars['oElectoralDistrictComments'][$this->_sections['index']['index']]->comment_date)) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y-%m-%d") : smarty_modifier_date_format($_tmp, "%Y-%m-%d")); ?>
</span>
																																											</span> <a
																																												href="index.php?stage=electedrepresentative&mode=ArticleDetail&id=<?php echo $this->_tpl_vars['oElectoralDistrictComments'][$this->_sections['index']['index']]->article_id; ?>
"
																																												class="arial12Ba60000">
																																													[read more]</a></td>
																																										</tr>
																																									</table></td>
																																							</tr>
																																						</table></td>
																																				</tr>
																																				<tr>
																																					<td align="left" valign="top"
																																						class="border_dashed"></td>
																																				</tr>
																																				<?php endfor; else: ?>
																																				<tr>
																																					<td align="left" valign="top"
																																						class="border_dashed" width="100%">
																																						<table width="100%">
																																							<tr>
																																								<td valign="top"
																																									class="bg_f7f6ee"
																																									align="center">No
																																									Articles.</td>
																																							</tr>
																																						</table></td>
																																				</tr>
																																				<?php endif; ?>
																																				<tr>
																																					<td height="40" align="center"
																																						valign="middle"><a
																																						href="index.php?stage=electedrepresentative&mode=ERArticles"
																																						class="arial12BUa60000">view
																																							more...</a></td>
																																				</tr>

																																				<?php else: ?>
																																				<tr>
																																					<td valign="top" class="bg_f7f6ee"
																																						align="center">Not authorized
																																						to view articles.</td>
																																				</tr>

																																				<?php endif; ?>
																																			</table></td>
																																	</tr>
																																</table></td>
																														</tr>
																													</table></td>
																											</tr>
																										</table></td>
																								</tr>
																							</table></td>
																					</tr>
																					<tr>
																						<td align="left" valign="top">&nbsp;</td>
																					</tr>
																					<tr>
																						<td colspan="2" align="left" valign="top">
																							<table width="100%" border="0" cellspacing="0"
																								cellpadding="0">
																								<tr>
																									<td align="center" valign="top">
																										<table style="width: 100%" border="0"
																											cellspacing="0" cellpadding="0">
																											<tr>
																												<td style="width: 100%" align="left"
																													valign="top">
																													<table width="100%" border="0"
																														cellspacing="0" cellpadding="0">
																														<tr>
																															<td width="100%" align="left"
																																valign="top">
																																<table width="100%" border="0"
																																	cellspacing="0" cellpadding="0">
																																	<tr>
																																		<td width="100%" height="32"
																																			align="left" valign="middle"
																																			class="tophead_grad">My Polls</td>
																																	</tr>
																																	<tr>
																																		<td align="left" valign="top"
																																			class="votealert_bg">
																																			<table width="100%" border="0"
																																				cellspacing="0" cellpadding="0">
																																				<?php if ($this->_tpl_vars['ERContentPollView']): ?> <?php unset($this->_sections['index']);
$this->_sections['index']['name'] = 'index';
$this->_sections['index']['loop'] = is_array($_loop=$this->_tpl_vars['oElectoralDistrictPolls']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['index']['show'] = true;
$this->_sections['index']['max'] = $this->_sections['index']['loop'];
$this->_sections['index']['step'] = 1;
$this->_sections['index']['start'] = $this->_sections['index']['step'] > 0 ? 0 : $this->_sections['index']['loop']-1;
if ($this->_sections['index']['show']) {
    $this->_sections['index']['total'] = $this->_sections['index']['loop'];
    if ($this->_sections['index']['total'] == 0)
        $this->_sections['index']['show'] = false;
} else
    $this->_sections['index']['total'] = 0;
if ($this->_sections['index']['show']):

            for ($this->_sections['index']['index'] = $this->_sections['index']['start'], $this->_sections['index']['iteration'] = 1;
                 $this->_sections['index']['iteration'] <= $this->_sections['index']['total'];
                 $this->_sections['index']['index'] += $this->_sections['index']['step'], $this->_sections['index']['iteration']++):
$this->_sections['index']['rownum'] = $this->_sections['index']['iteration'];
$this->_sections['index']['index_prev'] = $this->_sections['index']['index'] - $this->_sections['index']['step'];
$this->_sections['index']['index_next'] = $this->_sections['index']['index'] + $this->_sections['index']['step'];
$this->_sections['index']['first']      = ($this->_sections['index']['iteration'] == 1);
$this->_sections['index']['last']       = ($this->_sections['index']['iteration'] == $this->_sections['index']['total']);
?>
																																				<tr>
																																					<td align="left" valign="top">
																																						<table width="100%" border="0"
																																							cellspacing="0" cellpadding="0">
																																							<tr>
																																								<td width="47" align="center"
																																									valign="top"><img
																																									src="images/icon_doc.gif"
																																									width="27" height="36" alt=""
																																									style="margin-top: 20px" /></td>
																																								<td width="367" align="left"
																																									valign="top" class="bg_f7f6ee">
																																									<table width="100%" border="0"
																																										cellspacing="0"
																																										cellpadding="0">
																																										<tr>
																																											<td align="left" valign="top">
																																												<?php echo ((is_array($_tmp=$this->_tpl_vars['oElectoralDistrictPolls'][$this->_sections['index']['index']]->comment)) ? $this->_run_mod_handler('truncate', true, $_tmp, 60) : smarty_modifier_truncate($_tmp, 60)); ?>
...
																																												&nbsp;&nbsp; <?php if ($this->_tpl_vars['ERContentPollDelete']): ?> <a
																																												href="index.php?stage=electedrepresentative&mode=DeletePoll&pollID=<?php echo $this->_tpl_vars['oElectoralDistrictPolls'][$this->_sections['index']['index']]->article_id; ?>
"
																																												class="arial12Ba60000"
																																												onClick="if(!confirm('Are you sure to delete this poll?')) return false;">
																																													<img
																																													src="images/icon_delete.png"
																																													border="0" alt="Delete"
																																													title="Delete" /> </a> <?php endif; ?></td>
																																										</tr>
																																										<tr>
																																											<td height="26" align="right"
																																												valign="bottom"><span
																																												class="arial12Ba60000"
																																												style="float: left">Dated:<span
																																													class="arial11Na60000"><?php echo ((is_array($_tmp=$this->_tpl_vars['oElectoralDistrictPolls'][$this->_sections['index']['index']]->comment_date)) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y-%m-%d") : smarty_modifier_date_format($_tmp, "%Y-%m-%d")); ?>
</span>
																																											</span> <a
																																												href="index.php?stage=electedrepresentative&mode=PollsDetail&id=<?php echo $this->_tpl_vars['oElectoralDistrictPolls'][$this->_sections['index']['index']]->article_id; ?>
"
																																												class="arial12Ba60000">
																																													[read more]</a></td>
																																											</td>
																																										</tr>
																																									</table></td>
																																							</tr>
																																						</table></td>
																																				</tr>
																																				<tr>
																																					<td align="left" valign="top"
																																						class="border_dashed"></td>
																																				</tr>
																																				<?php endfor; else: ?>
																																				<tr>
																																					<td align="left" valign="top"
																																						class="border_dashed" width="100%">
																																						<table width="100%">
																																							<tr>
																																								<td valign="top"
																																									class="bg_f7f6ee"
																																									align="center">No
																																									Comments.</td>
																																							</tr>
																																						</table></td>
																																				</tr>
																																				<?php endif; ?>
																																				<tr>
																																					<td height="40" align="center"
																																						valign="middle"><a
																																						href="index.php?stage=electedrepresentative&mode=ERPolls"
																																						class="arial12BUa60000">view
																																							more...</a></td>
																																				</tr>
																																				<?php else: ?>

																																				<tr>
																																					<td align="left" valign="top"
																																						class="border_dashed" width="100%">
																																						<table width="100%">
																																							<tr>
																																								<td valign="top"
																																									class="bg_f7f6ee"
																																									align="center">Not
																																									authorized to view polls.</td>
																																							</tr>
																																						</table></td>
																																				</tr>

																																				<?php endif; ?>
																																			</table></td>
																																	</tr>
																																</table></td>
																														</tr>
																													</table></td>
																											</tr>
																										</table></td>
																								</tr>
																							</table></td>
																					</tr>
																				</table></td>
																			<td align="left" valign="top" width="2%"><img
																				src="images/trans.gif" height="1" width="10px" />
																			</td>
																			<td align="left" valign="top" width="39%">
																				<table width="100%" border="0" cellspacing="0"
																					cellpadding="0">
																					<tr>
																						<td align="center" valign="top">
																							<table style="width: 100%" border="0"
																								cellspacing="0" cellpadding="0">
																								<tr>
																									<td style="width: 100%" align="left"
																										valign="top">
																										<table width="100%" border="0" cellspacing="0"
																											cellpadding="0">
																											<tr>
																												<td width="100%" align="left" valign="top">
																													<table width="100%" border="0"
																														cellspacing="0" cellpadding="0">
																														<tr>
																															<td width="100%" height="32" align="left"
																																valign="middle" class="tophead_grad">Report
																																Card</td>
																														</tr>
																														<tr>
																															<td align="left" valign="top"
																																class="votealert_bg">
																																<table width="100%" border="0"
																																	cellspacing="0" cellpadding="0">
																																	<?php if ($this->_tpl_vars['ERContentReportCardView']): ?> <?php unset($this->_sections['index']);
$this->_sections['index']['name'] = 'index';
$this->_sections['index']['loop'] = is_array($_loop=$this->_tpl_vars['affiliateVoteAlerts']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['index']['show'] = true;
$this->_sections['index']['max'] = $this->_sections['index']['loop'];
$this->_sections['index']['step'] = 1;
$this->_sections['index']['start'] = $this->_sections['index']['step'] > 0 ? 0 : $this->_sections['index']['loop']-1;
if ($this->_sections['index']['show']) {
    $this->_sections['index']['total'] = $this->_sections['index']['loop'];
    if ($this->_sections['index']['total'] == 0)
        $this->_sections['index']['show'] = false;
} else
    $this->_sections['index']['total'] = 0;
if ($this->_sections['index']['show']):

            for ($this->_sections['index']['index'] = $this->_sections['index']['start'], $this->_sections['index']['iteration'] = 1;
                 $this->_sections['index']['iteration'] <= $this->_sections['index']['total'];
                 $this->_sections['index']['index'] += $this->_sections['index']['step'], $this->_sections['index']['iteration']++):
$this->_sections['index']['rownum'] = $this->_sections['index']['iteration'];
$this->_sections['index']['index_prev'] = $this->_sections['index']['index'] - $this->_sections['index']['step'];
$this->_sections['index']['index_next'] = $this->_sections['index']['index'] + $this->_sections['index']['step'];
$this->_sections['index']['first']      = ($this->_sections['index']['iteration'] == 1);
$this->_sections['index']['last']       = ($this->_sections['index']['iteration'] == $this->_sections['index']['total']);
?>
																																	<tr>
																																		<td align="left" valign="top">
																																			<table width="100%" border="0"
																																				cellspacing="0" cellpadding="0">
																																				<tr>
																																					<td width="100%" align="left"
																																						valign="top" class="bg_f7f6ee">
																																						<table width="100%" border="0"
																																							cellspacing="0" cellpadding="0">
																																							<tr>
																																								<td align="left" valign="top">
																																									<a
																																									href="index.php?stage=billresources&mode=billCompleteDetails&billNo=<?php echo $this->_tpl_vars['affiliateVoteAlerts'][$this->_sections['index']['index']]['bill_number']; ?>
"
																																									class="arialB13000000"
																																									style="font-weight: normal;">
																																										<?php echo $this->_tpl_vars['affiliateVoteAlerts'][$this->_sections['index']['index']]['article_title']; ?>

																																								</a></td>
																																							</tr>
																																							<tr>
																																								<td height="26" align="left"
																																									valign="bottom"><span
																																									class="arial12B000000">Support:</span>&nbsp;<span
																																									class="arial12N000000"><?php echo $this->_tpl_vars['affiliateVoteAlerts'][$this->_sections['index']['index']]['supportPercentage']; ?>
%</span>
																																									&nbsp;&nbsp;<span
																																									class="arial12B000000">Oppose:</span>&nbsp;<span
																																									class="arial12N000000"><?php echo $this->_tpl_vars['affiliateVoteAlerts'][$this->_sections['index']['index']]['opposePercentage']; ?>
%</span>
																																								</td>
																																							</tr>
																																						</table></td>
																																				</tr>
																																			</table></td>
																																	</tr>
																																	<tr>
																																		<td align="left" valign="top"
																																			class="border_dashed"></td>
																																	</tr>
																																	<?php endfor; else: ?>
																																	<tr>
																																		<td align="left" valign="top"
																																			class="border_dashed" width="100%">
																																			<table width="100%">
																																				<tr>
																																					<td valign="top" class="bg_f7f6ee"
																																						align="center">No Record
																																						Found.</td>
																																				</tr>
																																			</table></td>
																																	</tr>
																																	<?php endif; ?>
																																	<tr>
																																		<td height="40" align="center"
																																			valign="middle"><a
																																			href="index.php?stage=electedrepresentative&mode=ERReportCard"
																																			class="arial12BUa60000">view
																																				more...</a></td>
																																	</tr>
																																	<?php else: ?>
																																	<tr>
																																		<td valign="top" class="bg_f7f6ee"
																																			align="center">Not authorized to
																																			view report card.</td>
																																	</tr>

																																	<?php endif; ?>
																																</table></td>
																														</tr>
																													</table></td>
																											</tr>
																										</table></td>
																								</tr>
																							</table></td>
																					</tr>
																				</table></td>
																		</tr>
																		<tr>
																			<td align="left" valign="top" colspan="3">&nbsp;</td>
																		</tr>
																	</table>
																</td>
															</tr>
														</table></td>
												</tr>