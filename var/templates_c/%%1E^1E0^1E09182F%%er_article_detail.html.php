<?php /* Smarty version 2.6.10, created on 2012-05-01 17:48:36
         compiled from electedrepresentative/ihtml/er_article_detail.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'electedrepresentative/ihtml/er_article_detail.html', 72, false),array('modifier', 'html_entity_decode', 'electedrepresentative/ihtml/er_article_detail.html', 116, false),)), $this); ?>
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
															class="topsublink_bg arial_15_000_bold">Article Details</td>
														<td width="66%" valign="middle" style="padding: 6px 14px;"
															class="topsublink_bg"><table cellspacing="0"
																cellpadding="0" border="0" align="right">
																<tbody>
																<tr>
																	<td width="106" align="right" valign="top"><a
																		class="button"
																		href="index.php?stage=electedrepresentative&mode=ERArticles"><span>My Articles</span>
																	</a>
																	</td>
																</tr>
																</tbody>
															</table>
														</td>
													</tr>

													<tr>
														<td valign="top" align="left"
															style="padding: 16px 5px 11px 15px;"
															class="votealert_bg_new" colspan="2">
															
															<table width="100%">
																			
																<?php if ($this->_tpl_vars['msg'] != ""): ?>
																<tr>
																	<td align="center" class="error-message" style="padding-top:0px;padding-bottom:10px;">
																	<?php echo $this->_tpl_vars['msg']; ?>

																	</td>
																</tr>
																<?php endif; ?>	

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
																							<td align="left" valign="top">
																								<?php echo $this->_tpl_vars['oArticle']->comment; ?>
																								
																																										
																							</td>
																						</tr>
																						<tr>
																							<td height="26" align="right" valign="bottom">
																								<span class="arial12Ba60000" style="float: left">Dated:
																									<span class="arial11Na60000"><?php echo ((is_array($_tmp=$this->_tpl_vars['oArticle']->comment_date)) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y-%m-%d") : smarty_modifier_date_format($_tmp, "%Y-%m-%d")); ?>
</span>																									
																								</span> 
																								
																								&nbsp;&nbsp;
																								<?php if ($this->_tpl_vars['ERContentArticleModifyOwnContent']): ?>																	
																									<a href = "index.php?stage=electedrepresentative&mode=EditArticle&articleID=<?php echo $this->_tpl_vars['oArticle']->article_id; ?>
"
																										class = "arial12Ba60000">
																										<img src="images/icon_edit.png"  border="0" alt="Edit" title="Edit" /> 
																									</a>
																								<?php endif; ?>
																							
																								<?php if ($this->_tpl_vars['ERContentArticleDelete']): ?>																		
																									<a href = "index.php?stage=electedrepresentative&mode=DeleteArticle&articleID=<?php echo $this->_tpl_vars['oArticle']->article_id; ?>
"
																										class = "arial12Ba60000" onClick="if(!confirm('Are you sure to delete this article?')) return false;">
																										<img src="images/icon_delete.png"  border="0" alt="Delete" title="Delete" /> 
																									</a>
																								<?php endif; ?>
																							</td>
																						</tr>
																					</table></td>
																			</tr>
																		</table></td>
																
																
																
																</tr>
															</table>
															
															<table width="100%" border="0" cellspacing="0" cellpadding="0" style="padding-top: 20px;">
																<tr>
																	<td align="left" valign="top" width="15%"><img src="images/trans.gif" width="100" height="1" /></td>
																	<td align="left" valign="top" width="85%">
																		
																		<table width="100%" cellspacing="0" cellpadding="0" border="0">
																		<tbody>
																		<tr>
																			<td valign="top" height="20" align="left"><span class="arial12Ba60000" style="float: left">Comments:</span></td>
																		</tr>
																		<tr>
																			<td valign="top" height="8" align="left"></td>
																		</tr>
																		<?php unset($this->_sections['index']);
$this->_sections['index']['loop'] = is_array($_loop=$this->_tpl_vars['oSubscribersComment']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['index']['name'] = 'index';
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
																			<td valign="top" align="left" class="bg_f7f6f2_2">
																			<div><?php echo ((is_array($_tmp=$this->_tpl_vars['oSubscribersComment'][$this->_sections['index']['index']]->subscriber_comment)) ? $this->_run_mod_handler('html_entity_decode', true, $_tmp) : html_entity_decode($_tmp)); ?>

																				<?php if ($this->_tpl_vars['ERContentArticleDelete']): ?>																		
																				<a href = "index.php?stage=electedrepresentative&mode=DeleteArticleComment&articleID=<?php echo $this->_tpl_vars['oArticle']->article_id; ?>
&commentID=<?php echo $this->_tpl_vars['oSubscribersComment'][$this->_sections['index']['index']]->id; ?>
"
																					class = "arial12Ba60000" onClick="if(!confirm('Are you sure to delete this comment?')) return false;">
																					<img src="images/icon_delete.png"  border="0" alt="Delete" title="Delete" /> 
																				</a>
																				<?php endif; ?>
																			<br /><br />
																			</div>
																			

																			<div align="right" float="left">
																			
																				<span style="color: #000000;font-family: Arial,Helvetica,sans-serif;font-size: 11px;font-weight: bold;">By:</span>
																				&nbsp;<?php echo $this->_tpl_vars['oSubscribersComment'][$this->_sections['index']['index']]->subscriber_name; ?>

																			</div>
																			</td>
																		</tr>
																		<tr>
																			<td valign="top" height="8" align="left">&nbsp;</td>
																		</tr>
																		<?php endfor; else: ?>
																		<tr>
																			<td valign="top" align="center" class="bg_f7f6f2_2"><div>No Comments added yet.</div></td>
																		</tr>
																		<?php endif; ?>
																		<tr>
																			<td valign="top" height="8" align="left"><img src="images/trans.gif" width="100" height="20" /></td>
																		</tr>
																		</tbody>
																		</table>
																		
																	</td>
																</tr>
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
