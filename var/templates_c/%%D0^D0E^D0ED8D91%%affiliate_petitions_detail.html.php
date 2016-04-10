<?php /* Smarty version 2.6.10, created on 2012-07-24 15:09:33
         compiled from visitor/ihtml/affiliate_petitions_detail.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'visitor/ihtml/affiliate_petitions_detail.html', 116, false),)), $this); ?>
<?php echo '
<script>	
	jQuery.noConflict();
	jQuery(function() {
		
		jQuery("#sign_petition").mouseover(function(){
			jQuery(\'#petitionHelp\').slideDown(1000);
		});
		
		jQuery("#petitionClose").click(function(){
			jQuery(\'#petitionHelp\').slideUp(1000);
			
		});
	});
	
</script>
'; ?>


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
											<td>											
												<?php if ($this->_tpl_vars['vMsg'] != ''): ?>
													<tr>						
														<td valign="bottom" align="center"  class="error-message">
															<?php echo $this->_tpl_vars['vMsg']; ?>

														</td>
													</tr>
												<?php endif; ?>
											</td>
										</tr>
										<tr>
											<td valign="top" align="left">
											
												<table width="100%" cellspacing="0" cellpadding="0"	border="0">													
													<tr>
														<td width="34%" valign="middle"
															style="padding-left: 14px;"
															class="topsublink_bg arial_15_000_bold">Petition Details</td>
														<td width="66%" valign="middle" style="padding: 6px 14px;"
															class="topsublink_bg"><table cellspacing="0"
																cellpadding="0" border="0" align="right">
																<tbody>
																	<tr>
																		<td width="106" align="right" valign="top">&nbsp;</td>
																	</tr>
																</tbody>
															</table>
														</td>
													</tr>
													<tr>
														<td valign="top" align="left" style="padding: 16px 5px 11px 15px;"
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
																					alt="" style="margin-top: 20px" /></td>
																				<td width="847" align="left" valign="top"
																					class="bg_f7f6ee">
																					<table width="100%" border="0" cellspacing="0"
																						cellpadding="0" id="sign_petition">
																						<tr>
																							<td height="22" align="left" valign="top">
																							<span class="arialB13000000" style="text-decoration:none;">
																								<?php echo $this->_tpl_vars['affiliatePetitions'][$this->_sections['i']['index']]['article_title']; ?>
 
																							</span><?php if ($this->_tpl_vars['signs_count'] > 0): ?>(<?php echo $this->_tpl_vars['signs_count']; ?>
)<?php endif; ?>
																							&nbsp;&nbsp;
																							 	<?php if ($this->_tpl_vars['affiliatePetitions'][$this->_sections['i']['index']]['support_file'] != ''): ?>
																								[
																									<a href="./UserFiles/affiliates_doc/<?php echo $this->_tpl_vars['affiliatePetitions'][$this->_sections['i']['index']]['support_file']; ?>
"
																									target="_blank" class="arial12Ba60000">
																										Read the Petition
																									</a>
																								]	 
																								<?php endif; ?> 
																								
																								<!-- AddThis Button BEGIN -->
																								<span class="addthis_toolbox addthis_default_style" style="float:right;width:auto;" >
																									<a class="addthis_button_preferred_1"></a>
																									<a class="addthis_button_preferred_2"></a>
																									<a class="addthis_button_preferred_3"></a>
																									<a class="addthis_button_preferred_4"></a>
																									<a class="addthis_button_compact"></a>
																									<a class="addthis_counter addthis_bubble_style"></a>
																								</span>
																								
																								<script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=xa-4edeee26461e5e25">
																								</script>
																								<!-- AddThis Button END -->
																								
																							</td>
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
</span>
																								</span> 																								
																									<?php if (( $this->_tpl_vars['affiliatePetitions'][$this->_sections['i']['index']]['voting_start'] <= ((is_array($_tmp=time())) ? $this->_run_mod_handler('date_format', true, $_tmp, '%Y-%m-%d') : smarty_modifier_date_format($_tmp, '%Y-%m-%d')) ) && ( $this->_tpl_vars['affiliatePetitions'][$this->_sections['i']['index']]['voting_end'] >= ((is_array($_tmp=time())) ? $this->_run_mod_handler('date_format', true, $_tmp, '%Y-%m-%d') : smarty_modifier_date_format($_tmp, '%Y-%m-%d')) )): ?> 
																											<a href='index.php?stage=visitor&mode=signingOptions&articleID=<?php echo $this->_tpl_vars['affiliatePetitions'][$this->_sections['i']['index']]['article_id']; ?>
' style="cursor: pointer;text-decoration: none;" class="arial12Ba60000" >
																												I want to sign this petition</a> 
																									<?php elseif ($this->_tpl_vars['affiliatePetitions'][$this->_sections['i']['index']]['voting_start'] > ((is_array($_tmp=time())) ? $this->_run_mod_handler('date_format', true, $_tmp, '%Y-%m-%d') : smarty_modifier_date_format($_tmp, '%Y-%m-%d'))): ?>
																										Signing of petition will start on <?php echo $this->_tpl_vars['affiliatePetitions'][$this->_sections['i']['index']]['voting_start']; ?>

																									<?php elseif ($this->_tpl_vars['affiliatePetitions'][$this->_sections['i']['index']]['voting_end'] < ((is_array($_tmp=time())) ? $this->_run_mod_handler('date_format', true, $_tmp, '%Y-%m-%d') : smarty_modifier_date_format($_tmp, '%Y-%m-%d'))): ?>
																										Signing of petition has been closed.																																	
																									<?php endif; ?>
																							</td>
																						</tr>																
																					</table>
																				</td>
																			</tr>
																		</table>
																		
																		<br/>
																		
																		<?php if (( $this->_tpl_vars['affiliatePetitions'][$this->_sections['i']['index']]['voting_start'] <= ((is_array($_tmp=time())) ? $this->_run_mod_handler('date_format', true, $_tmp, '%Y-%m-%d') : smarty_modifier_date_format($_tmp, '%Y-%m-%d')) ) && ( $this->_tpl_vars['affiliatePetitions'][$this->_sections['i']['index']]['voting_end'] >= ((is_array($_tmp=time())) ? $this->_run_mod_handler('date_format', true, $_tmp, '%Y-%m-%d') : smarty_modifier_date_format($_tmp, '%Y-%m-%d')) )): ?> 																																											
																		<table width="100%" border="0" cellspacing="0" id="petitionHelp" style="display:none"	cellpadding="0">
																			<tr>
																				<td width="47" align="center" valign="top"></td>
																				<td width="847" align="left" valign="top"
																					class="bg_f7f6ee">
																					<table width="100%" border="0" cellspacing="0"
																						cellpadding="0">
																						<tr>
																							<td height="22" align="left" valign="top">
																							<p>																							
																							Politicians ignore electronic petitions because they claim that there is no way to 
																			know that the signors are legitimate, we change that. You may pay <strong>$<?php echo $this->_tpl_vars['oneTimePetitionSignFee']; ?>
</strong> to
																			<strong>'validate'</strong> your signature. When you go to <strong>'I want to sign this petition'</strong> you will be taken to a 
																			page that asks you to <strong>'Sign in to my account'</strong> or <strong>'Validate your signature'</strong>. 
																							</p>
																							<p>	If you do not have an account click <strong>Validate</strong>. You then will be taken to a form that will allow VOICES 
																			to identify who your elected representatives are. Your home address allows us to inform your elected representative 
																			as to your opinion on the petition. VOICES then creates a free account for you where you can see the views of Affiliates, 
																			and sign petitions, if you choose to do so.
																							</p>
																							<p>	If you choose to validate your signature on the petition, we take you to Paypal, 
																			where you can pay <strong>$<?php echo $this->_tpl_vars['oneTimePetitionSignFee']; ?>
</strong>, and Paypal then sends us an email verifying that your account exists at your address. 
																			We then can prove that every signature on the petition is valid.	
																							</p>
																							
																							<br/>
																							
																							<span style="float:right">
																								<a href="javascript:void(0);" id="petitionClose" class="arial12Ba60000"  valign="bottom" >Hide</a>
																							</span>	
																						
																							</td>
																						</tr>																																						
																					</table>
																				</td>
																			</tr>
																			
																		</table>
																		<?php endif; ?>
																	</td>
																</tr>
																<?php endfor; endif; ?>
															</table>
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