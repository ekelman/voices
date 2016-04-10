<?php /* Smarty version 2.6.10, created on 2014-03-03 18:07:58
         compiled from affiliates/ihtml/news_detail.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'html_entity_decode', 'affiliates/ihtml/news_detail.html', 144, false),)), $this); ?>
<?php echo '
<script type="text/javascript" >
function delete_article(id,type)
{
	if (confirm("Are you sure to delete this news?"))
	{
		location.href=\'index.php?stage=affiliates&mode=NewsDelete&id=\'+id+\'&type=\'+type;
	}
	
}
</script>
'; ?>


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
											<td valign="top" align="left" class="votealert_bg_new">
												
												<table width="100%" cellspacing="0" cellpadding="0" border="0">
													<tr>
														<td width="34%" valign="middle"
															style="padding-left: 14px;"
															class="topsublink_bg arial_15_000_bold">News Details</td>
														<td width="66%" valign="middle" style="padding: 6px 14px;"
															class="topsublink_bg"><table cellspacing="0"
																cellpadding="0" border="0" align="right">
																<tbody>
																	<tr>
																		<td width="106" align="right" valign="top"><a
																			class="button"
																			href="index.php?stage=affiliates&mode=AffiliateNews"><span>News</span>
																		</a>
																		</td>
																		
																	</tr>
																</tbody>
															</table>
														</td>
													</tr>
													
													<?php if ($this->_tpl_vars['vMsg'] != ''): ?>
													<tr>
														<td valign="bottom" align="center" class="error-message" colspan="2" height="25"><?php echo $this->_tpl_vars['vMsg']; ?>
</td>
													</tr>
													<?php endif; ?>
													
													<tr>
														<td valign="top" align="left"
															style="padding: 16px 5px 11px 15px;"
															 colspan="2">
															<table width="100%">
																<?php unset($this->_sections['i']);
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['affiliateVoteAlerts']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
																		<table width="100%" border="0" cellspacing="0" cellpadding="0">
																			<tr>
																				<td width="47" align="center" valign="top"><img
																					src="images/icon_doc.gif" width="27" height="36"
																					alt="" style="margin-top: 20px" /></td>
																				<td width="847" align="left" valign="top"
																					class="bg_f7f6ee">
																					<table width="100%" border="0" cellspacing="0"
																						cellpadding="0">
																						<tr>
																							<td height="22" align="left" valign="top">
																							<span class="arialB13000000" style="text-decoration:none;">
																								<?php echo $this->_tpl_vars['affiliateVoteAlerts'][$this->_sections['i']['index']]['article_title']; ?>
 
																							</span>
																								
																							&nbsp;&nbsp;
																							
																							 	<?php if ($this->_tpl_vars['affiliateVoteAlerts'][$this->_sections['i']['index']]['support_file'] != ''): ?>
																								[
																									<a href="<?php echo $this->_tpl_vars['_CONF']['SiteUrl']; ?>
/UserFiles/affiliates_doc/<?php echo $this->_tpl_vars['affiliateVoteAlerts'][$this->_sections['i']['index']]['support_file']; ?>
"
																									target="_blank" class="arial12Ba60000">
																										Supported File 
																									</a>
																								]	 
																								<?php endif; ?> 
																							
																							</td>
																						</tr>
																						<tr>
																							<td align="left" valign="top">
																								<?php echo $this->_tpl_vars['affiliateVoteAlerts'][$this->_sections['i']['index']]['affiliate_comment']; ?>
</td>
																						</tr>
																						<tr>
																							<td height="26" align="right" valign="bottom">
																								<span class="arial12Ba60000" style="float: left">Dated:
																									<span class="arial11Na60000"> <?php echo $this->_tpl_vars['affiliateVoteAlerts'][$this->_sections['i']['index']]['created']; ?>
</span>
																								</span> 
																								
																								<?php if ($this->_tpl_vars['AffiliateContentNewsEdit']): ?>	
																								<a
																									href="index.php?stage=affiliates&mode=NewsEdit&id=<?php echo $this->_tpl_vars['affiliateVoteAlerts'][$this->_sections['i']['index']]['article_id']; ?>
"
																									class="arial12Ba60000">
																									<img src="images/icon_edit.png"  border="0" alt="Edit" title="Edit" /> </a>
																								<?php endif; ?>							
																								<?php if ($this->_tpl_vars['AffiliateContentNewsDelete']): ?>															
																										<a onclick="return delete_article(<?php echo $this->_tpl_vars['affiliateVoteAlerts'][$this->_sections['i']['index']]['article_id']; ?>
,'<?php echo $this->_tpl_vars['affiliateVoteAlerts'][$this->_sections['i']['index']]['article_type']; ?>
')"
																									href="javascript:"
																									class="arial12Ba60000">
																										<img src="images/icon_delete.png"  border="0" alt="Delete" title="Delete" /></a>
																								<?php endif; ?>		
																							
																							</td>
																						</tr>
																					</table>
																				</td>
																			</tr>
																		</table></td>
																</tr>
																<?php endfor; endif; ?>
															</table>
														</td>
													</tr>
												</table>
												
												<table width="100%" border="0" cellspacing="0" cellpadding="0" style="padding-top: 20px;">
														<tr>
															<td align="left" valign="top" width="15%"><img src="images/trans.gif" width="100" height="1" /></td>

															<td align="left" valign="top" width="85%">																	
																<table width="99%" cellspacing="0" cellpadding="0" border="0">
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
																			<div><?php echo ((is_array($_tmp=$this->_tpl_vars['oSubscribersComment'][$this->_sections['index']['index']]['subscriber_comment'])) ? $this->_run_mod_handler('html_entity_decode', true, $_tmp) : html_entity_decode($_tmp)); ?>

																				<?php if ($this->_tpl_vars['AffiliateContentNewsDelete']): ?>																		
																				<a href = "index.php?stage=affiliates&mode=DeleteArticleComment&articleID=<?php echo $this->_tpl_vars['oSubscribersComment'][$this->_sections['index']['index']]['article_id']; ?>
&commentID=<?php echo $this->_tpl_vars['oSubscribersComment'][$this->_sections['index']['index']]['id']; ?>
&articleType=<?php echo $this->_tpl_vars['affiliateVoteAlerts'][0]['article_type']; ?>
"																						
																					class = "arial12Ba60000" onClick="if(!confirm('Are you sure to delete this comment?')) return false;">
																					<img src="images/icon_delete.png"  border="0" alt="Delete" title="Delete" /> 
																				</a>
																				<?php endif; ?>
																			<br /><br />
																			</div>
																			

																			<div align="right" float="left">
																			
																				<span style="color: #000000;font-family: Arial,Helvetica,sans-serif;font-size: 11px;font-weight: bold;">By:</span>
																				&nbsp;<?php echo $this->_tpl_vars['oSubscribersComment'][$this->_sections['index']['index']]['first_name']; ?>
&nbsp;<?php echo $this->_tpl_vars['oSubscribersComment'][$this->_sections['index']['index']]['last_name']; ?>

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