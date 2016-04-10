<?php /* Smarty version 2.6.10, created on 2012-04-19 11:57:57
         compiled from visitor/ihtml/affiliate_petitions_detail_sucess.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'visitor/ihtml/affiliate_petitions_detail_sucess.html', 74, false),)), $this); ?>
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
											<td valign="bottom" align="center" class="error-message">Your membership was successful and now you can sign the petition below.</td>
										</tr>
										<tr>
											<td valign="top" align="left">

												<table width="100%" cellspacing="0" cellpadding="0"
													border="0">
													<tr>
														<td width="34%" valign="middle"
															style="padding-left: 14px;"
															class="topsublink_bg arial_15_000_bold">Petition
															Details</td>
														<td width="66%" valign="middle" style="padding: 6px 14px;"
															class="topsublink_bg"><table cellspacing="0"
																cellpadding="0" border="0" align="right">
																<tbody>
																	<tr>
																		<td width="106" align="right" valign="top">&nbsp;</td>

																	</tr>
																</tbody>
															</table></td>
													</tr>

													<tr>
														<td valign="top" align="left"
															style="padding: 16px 5px 11px 15px;"
															class="votealert_bg_new" colspan="2">
															<table width="100%">
																<?php unset($this->_sections['i']);
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['affiliatePetitions']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
																					alt="" style="margin-top: 20px" />
																				</td>
																				<td width="847" align="left" valign="top"
																					class="bg_f7f6ee">
																					<table width="100%" border="0" cellspacing="0"
																						cellpadding="0">
																						<tr>
																							<td height="22" align="left" valign="top"><span
																								class="arialB13000000"
																								style="text-decoration: none;">
																									<?php echo $this->_tpl_vars['affiliatePetitions'][$this->_sections['i']['index']]['article_title']; ?>
 </span><?php if ($this->_tpl_vars['signs_count'] > 0): ?>(<?php echo $this->_tpl_vars['signs_count']; ?>
)<?php endif; ?>
																								&nbsp;&nbsp; <?php if ($this->_tpl_vars['affiliatePetitions'][$this->_sections['i']['index']]['support_file'] != ''): ?> [ <a
																								href="./UserFiles/affiliates_doc/<?php echo $this->_tpl_vars['affiliatePetitions'][$this->_sections['i']['index']]['support_file']; ?>
"
																								target="_blank" class="arial12Ba60000">
																									Supported File </a> ] <?php endif; ?></td>
																						</tr>
																						<tr>
																							<td align="left" valign="top">
																								<?php echo $this->_tpl_vars['affiliatePetitions'][$this->_sections['i']['index']]['affiliate_comment']; ?>
</td>
																						</tr>
																						<tr>
																							<td height="35" align="right" valign="bottom">
																								<span class="arial12Ba60000" style="float: left">Dated:
																									<span class="arial11Na60000"><?php echo $this->_tpl_vars['affiliatePetitions'][$this->_sections['i']['index']]['created']; ?>
</span></span> 
																									<?php if (( $this->_tpl_vars['affiliatePetitions'][$this->_sections['i']['index']]['voting_start'] <= ((is_array($_tmp=time())) ? $this->_run_mod_handler('date_format', true, $_tmp, '%Y-%m-%d') : smarty_modifier_date_format($_tmp, '%Y-%m-%d')) ) && ( $this->_tpl_vars['affiliatePetitions'][$this->_sections['i']['index']]['voting_end'] >= ((is_array($_tmp=time())) ? $this->_run_mod_handler('date_format', true, $_tmp, '%Y-%m-%d') : smarty_modifier_date_format($_tmp, '%Y-%m-%d')) )): ?><a
																								href='index.php?stage=visitor&mode=signPetitionOneTime&articleID=<?php echo $this->_tpl_vars['affiliatePetitions'][$this->_sections['i']['index']]['article_id']; ?>
&visitor_id=<?php echo $this->_tpl_vars['visitor_id']; ?>
&affiliate_id=<?php echo $this->_tpl_vars['affiliatePetitions'][$this->_sections['i']['index']]['affiliate_id']; ?>
'
																								style="cursor: pointer; text-decoration: none;">
																									<img src="images/btn_i_support_this_petition.gif"
																									alt="" style="border: none;" /></a>&nbsp;&nbsp;<?php elseif ($this->_tpl_vars['affiliatePetitions'][$this->_sections['i']['index']]['voting_start'] > ((is_array($_tmp=time())) ? $this->_run_mod_handler('date_format', true, $_tmp, '%Y-%m-%d') : smarty_modifier_date_format($_tmp, '%Y-%m-%d'))): ?> Signing of
																								petition will start on
																								<?php echo $this->_tpl_vars['affiliatePetitions'][$this->_sections['i']['index']]['voting_start'];  endif; ?>
																								</td>
																						</tr>

																					</table></td>
																			</tr>
																		</table></td>
																</tr>
																<?php endfor; endif; ?>
															</table></td>
													</tr>
												</table></td>
										</tr>
									</tbody>
								</table></td>
						</tr>
					</tbody>
				</table></td>
		</tr>
	</tbody>
</table>