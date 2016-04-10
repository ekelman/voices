<?php /* Smarty version 2.6.10, created on 2012-01-27 18:38:57
         compiled from subscriber/ihtml/er_polls_detail.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'html_entity_decode', 'subscriber/ihtml/er_polls_detail.html', 64, false),array('modifier', 'date_format', 'subscriber/ihtml/er_polls_detail.html', 72, false),)), $this); ?>
<table width="100%" cellspacing="0" cellpadding="0" border="0">
	<tbody>
		<tr>
			<td class="arial_16_c40306"><table width="100%" cellspacing="0"
					cellpadding="0" border="0">
					<tbody>
						<tr>
							<td valign="top" align="left" class="arial_16_c40306">
								<table width="100%" cellspacing="0" cellpadding="0" border="0">
									<tbody>
										<tr>
											<td valign="top" align="left">
												<table width="100%" cellspacing="0" cellpadding="0" border="0">
	
													<?php if ($this->_tpl_vars['msg'] != ""): ?>
													<tr>
														<td align="center" class="error-message" style="padding-top:0px;padding-bottom:10px;">
															<?php echo $this->_tpl_vars['msg']; ?>

														</td>
													</tr>
													<?php endif; ?>	
																											
													
													<tr>
														<td width="34%" valign="middle"
															style="padding-left: 14px;"
															class="topsublink_bg arial_15_000_bold">Poll Details</td>
														<td width="66%" valign="middle" style="padding: 6px 14px;"
															class="topsublink_bg"><table cellspacing="0"
																cellpadding="0" border="0" align="right">
																<tbody>
																<tr>
																	<td width="auto" align="right" valign="top">
																		<a class="button" href="index.php?stage=subscriber&mode=ERPolls&er_id=<?php echo $this->_tpl_vars['er_id']; ?>
"><span>
																		<?php echo $this->_tpl_vars['oElectoralDistrict']->First_Name; ?>
 <?php echo $this->_tpl_vars['oElectoralDistrict']->Middle_Name; ?>
 <?php echo $this->_tpl_vars['oElectoralDistrict']->Last_Name; ?>
's Polls
																		</span>
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
																								<?php echo ((is_array($_tmp=$this->_tpl_vars['oArticle']->comment)) ? $this->_run_mod_handler('html_entity_decode', true, $_tmp) : html_entity_decode($_tmp)); ?>

																								<br/>
																								<br/>
																								</td>
																						</tr>
																						<tr>
																							<td height="26" align="right" valign="bottom">
																								<span class="arial12Ba60000" style="float: left">Dated:
																									<span class="arial11Na60000"><?php echo ((is_array($_tmp=$this->_tpl_vars['oArticle']->comment_date)) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y-%m-%d") : smarty_modifier_date_format($_tmp, "%Y-%m-%d")); ?>
</span>
																								</span> 
																								
																																																<?php if ($this->_tpl_vars['voting_details'] == 'oppose'): ?>
																									You have voted <strong>against</strong> this poll.
																								<?php elseif ($this->_tpl_vars['voting_details'] == 'support'): ?>	
																									You have voted <strong>in favor of</strong> this poll.							
																								<?php else: ?>							
																																																	<?php if ($this->_tpl_vars['ERContentPollVoteOnContent']): ?>																			
																																																																																																												
																									<a href='index.php?stage=member&mode=castYourVoteOnPoll&articleID=<?php echo $this->_tpl_vars['oArticle']->article_id; ?>
&er_id=<?php echo $this->_tpl_vars['er_id']; ?>
&status=support' style="cursor: pointer">
																										<img src="images/btn_i_support_this_petition.gif" alt="" style="border:none;"/></a>&nbsp;&nbsp;&nbsp;
																									<a href='index.php?stage=member&mode=castYourVoteOnPoll&articleID=<?php echo $this->_tpl_vars['oArticle']->article_id; ?>
&er_id=<?php echo $this->_tpl_vars['er_id']; ?>
&status=oppose' style="cursor: pointer"> 
																										<img src="images/btn_i_oppose_this_bill.gif" alt="" style="border:none;"/>
																									</a>																																																			
																									<?php else: ?>																										
																										Not authorised to vote on poll.
																									<?php endif; ?>
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
