<?php /* Smarty version 2.6.10, created on 2012-01-26 19:30:37
         compiled from electedrepresentative/ihtml/er_polls.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'truncate', 'electedrepresentative/ihtml/er_polls.html', 42, false),array('modifier', 'date_format', 'electedrepresentative/ihtml/er_polls.html', 55, false),)), $this); ?>
<table width="100%" cellspacing="0" cellpadding="0" border="0">
	<tbody>
		<tr>
			<td class="arial_16_c40306"><table width="100%" cellspacing="0"
					cellpadding="0" border="0">
					<tbody>
						<tr>
							<td valign="top" align="left" class="arial_16_c40306"><table
									width="100%" cellspacing="0" cellpadding="0" border="0">
									<tbody>
										<tr>
											<td valign="top" align="left">
												<table width="100%" cellspacing="0" cellpadding="0" border="0">
													<tr>
														<td width="34%" valign="middle"
															style="padding-left: 14px;"
															class="topsublink_bg arial_15_000_bold">My Polls</td>
														<td width="66%" valign="middle" style="padding: 6px 14px;height:30px"
															class="topsublink_bg"><img src="images/trans.gif" height="30px" /></td>
													</tr>
													
													<tr>
														<td valign="top" align="left"
															style="padding: 16px 5px 11px 15px;"
															class="votealert_bg_new" colspan="2">
															<table width="100%" cellspacing="0" cellpadding="0"
																border="0">
																<?php unset($this->_sections['i']);
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['oArticle']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
																		<table width="100%" border="0" cellspacing="0"
																			cellpadding="0">
																			<tr>
																				<td width="47" align="center" valign="top"><img
																					src="images/icon_doc.gif" width="27" height="36"
																					alt="" style="margin-top: 20px" /></td>
																				<td width="847" align="left" valign="top"
																					class="bg_f7f6ee">
																					<table width="100%" border="0" cellspacing="0"
																						cellpadding="0">
																						<tr>
																							<td align="left" valign="top"><?php echo ((is_array($_tmp=$this->_tpl_vars['oArticle'][$this->_sections['i']['index']]->comment)) ? $this->_run_mod_handler('truncate', true, $_tmp, 130) : smarty_modifier_truncate($_tmp, 130)); ?>

																							&nbsp;&nbsp;																							
																							<?php if ($this->_tpl_vars['ERContentPollDelete']): ?>																		
																								<a href = "index.php?stage=electedrepresentative&mode=DeletePoll&pollID=<?php echo $this->_tpl_vars['oArticle'][$this->_sections['i']['index']]->article_id; ?>
"
																									class = "arial12Ba60000" onClick="if(!confirm('Are you sure to delete this poll?')) return false;">
																									<img src="images/icon_delete.png"  border="0" alt="Delete" title="Delete" /> 
																								</a>
																							<?php endif; ?>
																							</td>
																						</tr>
																						<tr>
																							<td height="26" align="right" valign="bottom">
																								<span class="arial12Ba60000" style="float: left">Dated:
																									<span class="arial11Na60000"><?php echo ((is_array($_tmp=$this->_tpl_vars['oArticle'][$this->_sections['i']['index']]->comment_date)) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y-%m-%d") : smarty_modifier_date_format($_tmp, "%Y-%m-%d")); ?>
</span>
																								</span>
																								
																								<a href="index.php?stage=electedrepresentative&mode=PollsDetail&id=<?php echo $this->_tpl_vars['oArticle'][$this->_sections['i']['index']]->article_id; ?>
"
																								 class = "arial12Ba60000"> [read more] </a></td>
																						</tr>
																					</table>
																				</td>
																			</tr>
																		</table></td>
																</tr>
																<?php endfor; else: ?>
																<tr>
																	<td align="center" valign="top" class="bg_f7f6ee">No poll found.</td>
																</tr>
																<?php endif; ?>
															</table>
														</td>
													</tr>
												</table></td>
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