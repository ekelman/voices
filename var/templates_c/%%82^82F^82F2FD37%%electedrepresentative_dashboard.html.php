<?php /* Smarty version 2.6.10, created on 2012-05-25 15:54:47
         compiled from subscriber/ihtml/electedrepresentative_dashboard.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'subscriber/ihtml/electedrepresentative_dashboard.html', 56, false),array('modifier', 'html_entity_decode', 'subscriber/ihtml/electedrepresentative_dashboard.html', 148, false),array('modifier', 'truncate', 'subscriber/ihtml/electedrepresentative_dashboard.html', 148, false),)), $this); ?>
<tr>
	<td class="arial_16_c40306">
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td align="left" valign="top" class="arial_16_c40306">
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
		<tr>
			<td align="center" valign="top"	style="padding: 16px 13px 13px 13px" class="bg_f7f6f2">
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
			<tr>
				<td class="bg_f7f6f2">
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
				<tr>
					<td align="left" valign="top" class="arial_16_c40306">
					<table width="100%" border="0" cellspacing="0" cellpadding="0">
					<tr>
						<td colspan="2" align="center">
						<table width="100%">
						<tr>
							<td align="left" valign="top" class="Trebuchet_27_c60000">
							<?php echo $this->_tpl_vars['oElectoralDistrict']->First_Name; ?>
 <?php echo $this->_tpl_vars['oElectoralDistrict']->Middle_Name; ?>
 <?php echo $this->_tpl_vars['oElectoralDistrict']->Last_Name; ?>
's Details</td>
							<td align="right" valign="middle">&nbsp;</td>
						</tr>
						</table></td>
					</tr>
					<tr>
						<td class="bg_f7f6f2" valign="top" align="center">
						<table width="100%" cellspacing="0" cellpadding="0" border="0">
						<tr>
							<td valign="top" bgcolor="#b1b0ac" align="left" colspan="2" class="arial_20_c40306">
							<img width="1" height="1" src="images/trans.gif" alt=""></td><tr>
						</table></td>
					</tr>
					<tr>
						<td valign="top" align="left" style="padding: 16px 5px 11px 15px;">
						<table width="100%" cellspacing="0" cellpadding="0" border="0">
                        <tbody>
                        <tr>                        	
                            <td width="732" valign="top" align="left">
                            <table width="100%" cellspacing="0" cellpadding="0" border="0">
                           	<tbody>
                           	<tr>
                            	<td width="125" valign="top" align="left">
                            	<?php if ($this->_tpl_vars['oElectoralDistrict']->OfficerProfileImage != ''): ?>
								<img width="113" height="87" class="pic_border" alt="" src="<?php echo $this->_tpl_vars['oElectoralDistrict']->OfficerProfileImage; ?>
">
								<?php else: ?>
								<img width="113" height="87" class="pic_border" alt="" src="images/no-image.jpg">
								<?php endif; ?>
                            	</td>
                             	<td width="20" valign="top" align="left">&nbsp;</td>
                             	<td width="732" valign="top" align="left">
                               	<table width="100%" cellspacing="0" cellpadding="0" border="0">
                               	<tbody>
                               	<tr>
                               		<td valign="top" align="left" height="22" width="75%"><span class="arial12Ba60000"><?php echo $this->_tpl_vars['oElectoralDistrict']->First_Name; ?>
 <?php echo $this->_tpl_vars['oElectoralDistrict']->Last_Name; ?>
 - <?php echo $this->_tpl_vars['oElectoralDistrict']->Title; ?>
</span><br /><span class="arial11Na60000"> <?php echo $this->_tpl_vars['oElectoralDistrict']->Party; ?>
</span></td>
									<td valign="top" align="left" height="22" width="25%"><span class="arial12B000000">Current Term:</span> <span class="arial11N000000"><?php echo ((is_array($_tmp=$this->_tpl_vars['oElectoralDistrict']->Term_Start)) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y") : smarty_modifier_date_format($_tmp, "%Y")); ?>
 - <?php echo ((is_array($_tmp=$this->_tpl_vars['oElectoralDistrict']->Term_End)) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y") : smarty_modifier_date_format($_tmp, "%Y")); ?>
</span></td>
                                </tr>
								<tr>
                                	<td valign="top" align="left" height="22" colspan="2"></td>
                                </tr>
                               	<tr>
                               		<td valign="top" align="left" height="22" colspan="2">
                               		<table width="100%" cellspacing="0" cellpadding="0" border="0">
                               		<tr>
	                                 	<td valign="top" align="left" class="arial_12_000" width="50%"><span class="arial12B000000">Address:</span><br /><span class="arial11N000000"><?php echo $this->_tpl_vars['oElectoralDistrict']->address; ?>
</span></td>
	                                 	<td valign="top" align="left" class="arial_12_000"  width="50%">
										<?php if ($this->_tpl_vars['oElectoralDistrict']->PrimaryPhone1 != ''): ?>
	                               		<span class="arial12B000000">Phone:</span><span class="arial11N000000"> <?php echo $this->_tpl_vars['oElectoralDistrict']->PrimaryPhone1; ?>
</span>
										<?php endif; ?>
										<?php if ($this->_tpl_vars['oElectoralDistrict']->PrimaryFax1 != ''): ?>
										<br />
	                                	<span class="arial12B000000">Fax:</span><span class="arial11N000000"> <?php echo $this->_tpl_vars['oElectoralDistrict']->PrimaryFax1; ?>
</span>
										<?php endif; ?>
										<?php if ($this->_tpl_vars['oElectoralDistrict']->EMail1 != ''): ?>
	                                	<br />
	                                	<span class="arial12B000000">Email:</span>&nbsp;&nbsp;<span class="arial11N000000"><a title="" href="mailto:<?php echo $this->_tpl_vars['oElectoralDistrict']->EMail1; ?>
"><?php echo $this->_tpl_vars['oElectoralDistrict']->EMail1; ?>
</a></span>
										<?php endif; ?>
										<?php if ($this->_tpl_vars['oElectoralDistrict']->Url1 != ''): ?>
			                            <br />
	                                	<span class="arial12B000000">Web Site:</span><span class="arial11N000000"><a title="" href="<?php echo $this->_tpl_vars['oElectoralDistrict']->Url1; ?>
" target="_blank"><?php echo $this->_tpl_vars['oElectoralDistrict']->Url1; ?>
</a></span>
										<?php endif; ?>
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
						<tr>
						<td width="69%"  align="center" valign="top" style="padding-top: 13px" class="bg_f7f6f2">
						<table width="100%" border="0" cellspacing="0" cellpadding="0">
						<tr>
							<td align="left" valign="top" width="59%">
							<table width="100%" border="0" cellspacing="0" cellpadding="0">
							<?php if ($this->_tpl_vars['vMsg'] != ""): ?>
							<tr>
							<td align="center" class="error-message">
							<?php echo $this->_tpl_vars['vMsg']; ?>
</td>
							</tr>
							<?php endif; ?>
							<tr>
								<td colspan="2" align="left" valign="top" width="100%">
								<table width="100%" border="0" cellspacing="0" cellpadding="0">
								<tr>
									<td align="center" valign="top" width="59%">
									<table style="width: 100%" border="0" 
								cellspacing="0" cellpadding="0">
									<tr>
										<td style="width:100%" align="left"
								valign="top">
										<table width="100%" border="0"
								cellspacing="0" cellpadding="0">
										<tr>
											<td width="100%" align="left" valign="top">
											<table width="100%" border="0" cellspacing="0"
								cellpadding="0">
											<tr>
												<td width="100%" height="32" align="left" valign="middle" class="tophead_grad">Articles</td>
											</tr>
											<tr>
												<td align="left" valign="top"
								class="votealert_bg">
												<table width="100%" border="0" cellspacing="0" cellpadding="0">
											<?php if ($this->_tpl_vars['ERContentArticleView']): ?>	
												<?php unset($this->_sections['index']);
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
													<table width="100%" border="0" cellspacing="0" cellpadding="0">
													<tr>
														<td width="47" align="center"
														valign="top">
														<img src="images/icon_doc.gif" width="27" height="36" alt="" style="margin-top: 20px" />
														</td>
														<td width="100%" align="left" valign="top" class="bg_f7f6ee">
														<table width="100%" border="0" cellspacing="0" cellpadding="0">
														<tr>
															<td align="left" valign="top">
															<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['oElectoralDistrictComments'][$this->_sections['index']['index']]->comment)) ? $this->_run_mod_handler('html_entity_decode', true, $_tmp) : html_entity_decode($_tmp)))) ? $this->_run_mod_handler('truncate', true, $_tmp, 80) : smarty_modifier_truncate($_tmp, 80)); ?>
...
															</td>
														</tr>
														<tr>
														<td height="26" align="right" valign="bottom">
														<span
															class="arial12Ba60000"
															style="float: left">Dated:&nbsp;<span
																class="arial11Na60000"><?php echo ((is_array($_tmp=$this->_tpl_vars['oElectoralDistrictComments'][$this->_sections['index']['index']]->comment_date)) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y-%m-%d") : smarty_modifier_date_format($_tmp, "%Y-%m-%d")); ?>
</span></span>
																<a href="index.php?stage=subscriber&mode=ArticleDetail&id=<?php echo $this->_tpl_vars['oElectoralDistrictComments'][$this->_sections['index']['index']]->article_id; ?>
&er_id=<?php echo $this->_tpl_vars['ElectedOfficialID']; ?>
"
															class="arial12Ba60000">
															[read more]</a>
														</td>
														</tr>
														</table>
														</td>
													</tr>
													</table>
													</td>
												</tr>
												<tr>
													<td align="left" valign="top" class="border_dashed"></td>
												</tr>
												<?php endfor; else: ?>
												<tr>
													<td align="left" valign="top" class="border_dashed" width="100%">
													<table width="100%">
													<tr>
														<td valign="top" class="bg_f7f6ee" align="center">
													No Articles.</td>
													</tr>
													</table>
													</td>
												</tr>
												<?php endif; ?>
												<tr>
													<td height="40" align="center"
														valign="middle"><a href="index.php?stage=subscriber&mode=ERArticles&er_id=<?php echo $this->_tpl_vars['ElectedOfficialID']; ?>
"
														class="arial12BUa60000">view more...</a>
													</td>
												</tr>
											<?php else: ?>
											<tr>
													<td height="40" align="center"  class="bg_f7f6ee"
														valign="middle">
														Not authorised to view ER articles.
													</td>
												</tr>
											<?php endif; ?>											
												
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
								</td>
							</tr>
							<tr>
								<td align="left" valign="top">&nbsp;</td>
							</tr>										
							<tr>
								<td colspan="2" align="left" valign="top">
								<table width="100%" border="0" cellspacing="0" cellpadding="0">
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
											<td width="100%" align="left" valign="top">
											<table width="100%" border="0" cellspacing="0"
								cellpadding="0">
											<tr>
												<td width="100%" height="32" align="left" valign="middle" class="tophead_grad">Polls</td>
											</tr>
											<tr>
												<td align="left" valign="top"
								class="votealert_bg">
												<table width="100%" border="0"
								cellspacing="0" cellpadding="0">
								<?php if ($this->_tpl_vars['ERContentPollView']): ?>
									<?php unset($this->_sections['index']);
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
													<table width="100%" border="0" cellspacing="0" cellpadding="0">
													<tr>
														<td width="47" align="center"
														valign="top">
														<img src="images/icon_doc.gif" width="27" height="36" alt="" style="margin-top: 20px" />
														</td>
														<td width="100%" align="left" valign="top" class="bg_f7f6ee">
														<table width="100%" border="0" cellspacing="0" cellpadding="0">
														<tr>
															<td align="left" valign="top">															
															<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['oElectoralDistrictPolls'][$this->_sections['index']['index']]->comment)) ? $this->_run_mod_handler('html_entity_decode', true, $_tmp) : html_entity_decode($_tmp)))) ? $this->_run_mod_handler('truncate', true, $_tmp, 80) : smarty_modifier_truncate($_tmp, 80)); ?>
...
															</td>
														</tr>
														<tr>
														<td height="26" align="right" valign="bottom">
														<span class="arial12Ba60000" style="float: left">Dated:&nbsp;
														<span class="arial11Na60000"><?php echo ((is_array($_tmp=$this->_tpl_vars['oElectoralDistrictPolls'][$this->_sections['index']['index']]->comment_date)) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y-%m-%d") : smarty_modifier_date_format($_tmp, "%Y-%m-%d")); ?>
</span></span>
																<a href="index.php?stage=subscriber&mode=PollsDetail&id=<?php echo $this->_tpl_vars['oElectoralDistrictPolls'][$this->_sections['index']['index']]->article_id; ?>
&er_id=<?php echo $this->_tpl_vars['ElectedOfficialID']; ?>
"
															class="arial12Ba60000">
															[read more]</a>														
														</td>
														</tr>
														</table>
														</td>
													</tr>
													</table>
													</td>
												</tr>
												<tr>
													<td align="left" valign="top" class="border_dashed"></td>
												</tr>
												<?php endfor; else: ?>
												<tr>
													<td align="left" valign="top" class="border_dashed" width="100%">
														<table width="100%">
															<tr>
																<td valign="top" class="bg_f7f6ee" align="center">
																	No Comments.
																</td>
															</tr>
														</table>
													</td>
												</tr>
												<?php endif; ?>
												<tr>
													<td height="40" align="center"
														valign="middle"><a href="index.php?stage=subscriber&mode=ERPolls&er_id=<?php echo $this->_tpl_vars['ElectedOfficialID']; ?>
"
														class="arial12BUa60000">view more...</a>
													</td>
												</tr>
											<?php else: ?>
												<tr>
													<td height="40" align="center"  class="bg_f7f6ee"
														valign="middle">
														Not authorised to view ER polls.
													</td>
												</tr>
											<?php endif; ?>											
																
												
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
								</td>
							</tr>
							</table>
							</td>
							<td align="left" valign="top" width="2%"><img src="images/trans.gif" height="1" width="10px"/></td>
							<td align="left" valign="top" width="39%">
							<table width="100%" border="0" cellspacing="0" cellpadding="0">
							<tr>
								<td align="center" valign="top" width="30%">
								<table style="width: 100%" border="0"
							cellspaci
							ng="0" cellpadding="0">
								<tr>
									<td style="width: 100%" align="left"
							valign="top">
									<table width="100%" border="0"
							cellspacing="0" cellpadding="0">
									<tr>
										<td width="100%" align="left" valign="top">
										<table width="100%" border="0" cellspacing="0"
							cellpadding="0">
										<tr>
											<td width="100%" height="32" align="left" valign="middle" class="tophead_grad">Report Card</td>
										</tr>
										<tr>
											<td align="left" valign="top" class="votealert_bg">
											<table width="100%" border="0" cellspacing="0" cellpadding="0">
										<?php if ($this->_tpl_vars['ERContentReportCardView']): ?>	
											<?php unset($this->_sections['index']);
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
												<table width="100%" border="0" cellspacing="0" cellpadding="0">
												<tr>
													<td width="100%" align="left" valign="top" class="bg_f7f6ee">
													<table width="100%" border="0" cellspacing="0" cellpadding="0">
													<tr>
														<td align="left" valign="top"><a href="index.php?stage=billresources&mode=billCompleteDetails&billNo=<?php echo $this->_tpl_vars['affiliateVoteAlerts'][$this->_sections['index']['index']]['bill_number']; ?>
" class="arialB1100%0000" style="font-weight: normal;"><?php echo $this->_tpl_vars['affiliateVoteAlerts'][$this->_sections['index']['index']]['article_title']; ?>
</a></td>
													</tr>
													<tr>
													<td height="26" align="left" valign="bottom">
													<span class="arial12B000000">Support:</span>&nbsp;<span	class="arial12N000000"><?php echo $this->_tpl_vars['affiliateVoteAlerts'][$this->_sections['index']['index']]['supportPercentage']; ?>
%</span>
													&nbsp;&nbsp;<span class="arial12B000000">Oppose:</span>&nbsp;<span	class="arial12N000000"><?php echo $this->_tpl_vars['affiliateVoteAlerts'][$this->_sections['index']['index']]['opposePercentage']; ?>
%</span></td>
													</tr>
													</table>
													</td>
												</tr>
												</table>
												</td>
											</tr>
											<tr>
												<td align="left" valign="top" class="border_dashed"></td>
											</tr>
											<?php endfor; else: ?>
											<tr>
												<td align="left" valign="top" class="border_dashed" width="100%">
												<table width="100%">
												<tr>
													<td valign="top" class="bg_f7f6ee" align="center">
												No Record Found.</td>
												</tr>
												</table>
												</td>
											</tr>
											<?php endif; ?>
											<tr>
												<td height="40" align="center"
													valign="middle"><a href="index.php?stage=subscriber&mode=ERReportCard&er_id=<?php echo $this->_tpl_vars['ElectedOfficialID']; ?>
"
													class="arial12BUa60000">view more...</a>
												</td>
											</tr>
										<?php else: ?>
											<tr>
												<td height="40" align="center"  class="bg_f7f6ee"
														valign="middle">
													Not authorised to view ER report cards.
												</td>
											</tr>
											<?php endif; ?>											
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
							</td>
						</tr>
						<tr>
							<td align="left" valign="top" colspan="3">&nbsp;</td>
						</tr>
						</table></td>
					</tr>
					</table>
					</td>
</tr>