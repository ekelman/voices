<?php /* Smarty version 2.6.10, created on 2012-01-27 18:38:42
         compiled from electedrepresentative/ihtml/er_polls_detail.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'electedrepresentative/ihtml/er_polls_detail.html', 65, false),)), $this); ?>
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
															class="topsublink_bg arial_15_000_bold">Poll Details</td>
														<td width="66%" valign="middle" style="padding: 6px 14px;"
															class="topsublink_bg"><table cellspacing="0"
																cellpadding="0" border="0" align="right">
																<tbody>
																<tr>
																	<td width="106" align="right" valign="top"><a
																		class="button"
																		href="index.php?stage=electedrepresentative&mode=ERPolls"><span>My Polls</span>
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

																								<br/>
																								<br/>
																							
																							</td>
																						</tr>
																						<tr>
																							<td height="26" align="right" valign="bottom">
																							<div style="float:left">	
																								<span class="arial12Ba60000" style="float: left">
																									Dated:
																									<span class="arial11Na60000">
																										<?php echo ((is_array($_tmp=$this->_tpl_vars['oArticle']->comment_date)) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y-%m-%d") : smarty_modifier_date_format($_tmp, "%Y-%m-%d")); ?>
																																																			
																									</span>																									
																								</span>																								
																							</div>
																							<div style="clear:both"></div>
																							<div style="float:left">
																									<span class="arial12Ba60000" style="float: left">
																									Voting results  
																									</span> 
																									&nbsp;&nbsp;																										
																									[ Support - <?php echo $this->_tpl_vars['supportPercentage']; ?>
%]  [ Oppose - <?php echo $this->_tpl_vars['opposePercentage']; ?>
%] 
																								</span>
																							</div>	
																							</td>
																						</tr>	
																								
																						<tr>
																							<td height="26" align="right" valign="bottom">
																								
																								<?php if ($this->_tpl_vars['ERContentPollDelete']): ?>																																			
																									<a href = "index.php?stage=electedrepresentative&mode=DeletePoll&pollID=<?php echo $this->_tpl_vars['oArticle']->article_id; ?>
"
																										class = "arial12Ba60000" onClick="if(!confirm('Are you sure to delete this poll?')) return false;">
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
