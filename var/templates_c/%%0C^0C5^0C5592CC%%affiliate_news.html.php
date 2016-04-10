<?php /* Smarty version 2.6.10, created on 2013-01-28 09:44:58
         compiled from affiliates/ihtml/affiliate_news.html */ ?>
<?php echo '
<script>
function delete_article(id,type)
{
	
	if (confirm("Are you sure to delete this article ?"))
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
											<td valign="top" align="left">

												<table width="100%" cellspacing="0" cellpadding="0"
													border="0">
													

													<tr>
														<td width="34%" valign="middle"
															style="padding-left: 14px;"
															class="topsublink_bg arial_15_000_bold">News</td>
														<td width="66%" valign="middle" style="padding: 6px 14px;height:30px"
															class="topsublink_bg"><img src="images/trans.gif" height="30px" /></td>
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
															class="votealert_bg_new" colspan="2">
															<table width="100%" cellspacing="0" cellpadding="0"
																border="0">
															<?php if ($this->_tpl_vars['AffiliateContentNewsView']): ?>	
																<?php unset($this->_sections['i']);
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['affiliateVoteAlert']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
																							<td height="22" align="left" valign="top">
																								
																								<a
																								href="index.php?stage=affiliates&mode=NewsDetail&id=<?php echo $this->_tpl_vars['affiliateVoteAlert'][$this->_sections['i']['index']]['article_id']; ?>
"
																								class="arialB13000000"> 
																										<?php echo $this->_tpl_vars['affiliateVoteAlert'][$this->_sections['i']['index']]['article_title']; ?>
 </a>
																								<span style="padding-left:10px;">
																							<?php if ($this->_tpl_vars['AffiliateContentNewsEdit']): ?>																								
																								<a	href="index.php?stage=affiliates&mode=NewsEdit&id=<?php echo $this->_tpl_vars['affiliateVoteAlert'][$this->_sections['i']['index']]['article_id']; ?>
"
																									class="arial12Ba60000">	<img src="images/icon_edit.png"  border="0" alt="Edit" title="Edit" /> </a>
<?php endif; ?>																									
<?php if ($this->_tpl_vars['AffiliateContentNewsDelete']): ?>
<a onclick="return delete_article(<?php echo $this->_tpl_vars['affiliateVoteAlert'][$this->_sections['i']['index']]['article_id']; ?>
,'<?php echo $this->_tpl_vars['affiliateVoteAlert'][$this->_sections['i']['index']]['article_type']; ?>
')"
																														href="javascript:"
																														class="arial12Ba60000">
																															<img src="images/icon_delete.png"  border="0" alt="Delete" title="Delete" /></a>
																															<?php endif; ?>
																																	</span>			
																							</td>
																						</tr>
																						<tr>
																							<td align="left" valign="top">
																								<?php echo $this->_tpl_vars['affiliateVoteAlert'][$this->_sections['i']['index']]['affiliate_comment']; ?>
</td>
																						</tr>
																						<tr>
																							<td height="26" align="right" valign="bottom">
																								<span class="arial12Ba60000" style="float: left">Dated:
																									<span class="arial11Na60000"><?php echo $this->_tpl_vars['affiliateVoteAlert'][$this->_sections['i']['index']]['created']; ?>
</span>
																							</span> 
																																																
																							<a
																								href="index.php?stage=affiliates&mode=NewsDetail&id=<?php echo $this->_tpl_vars['affiliateVoteAlert'][$this->_sections['i']['index']]['article_id']; ?>
"
																								class="arial12Ba60000"> [read more] </a> 
																								
																							</td>
																						</tr>
																					</table></td>
																			</tr>
																		</table></td>
																</tr>
																
																<?php endfor; else: ?>
																<tr>
																	<td align="left" valign="top"
																		class="border_dashed">
																		<table width="100%">
																			<tr>
																				<td valign="top"
																					class="bg_f7f6ee"
																					align="center">There are no news.</td>
																			</tr>
																		</table></td>
																</tr>
																<?php endif; ?>																
															<?php else: ?>															
																<tr>
																	<td height="40" align="center" valign="middle"  	class="bg_f7f6ee">
																		Not authorized to view news.	
																	</td>
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
