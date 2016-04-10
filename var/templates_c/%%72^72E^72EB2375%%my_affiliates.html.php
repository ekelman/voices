<?php /* Smarty version 2.6.10, created on 2013-01-28 11:00:21
         compiled from subscriber/ihtml/my_affiliates.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'html_entity_decode', 'subscriber/ihtml/my_affiliates.html', 83, false),)), $this); ?>
<tr>
<td valign="top" align="left" style="padding-top: 10px;">
<table width="100%" cellspacing="0" cellpadding="0" border="0">
	<tbody>
	<tr>
	<td valign="top" align="left" style="padding: 24px 15px 51px 12px;" class="bg_f7f6f2">
	<table width="100%" cellspacing="0" cellpadding="0" border="0">
		<tbody>
		<tr>
		<td class="arial_16_c40306">
		<table width="100%" cellspacing="0" cellpadding="0" border="0">
			<tbody>
			<tr>			
			<td valign="top" align="left" class="arial_16_c40306">
			<table width="100%" cellspacing="0" cellpadding="0" border="0">
				<tbody>
				<tr>				
				<td valign="top" align="left">
				<table width="100%" cellspacing="0" cellpadding="0" border="0">
					<tbody>
					<tr>
						<td valign="top" align="left" height="37" class="Trebuchet_27_c60000" colspan="2"><?php echo $this->_tpl_vars['Name']; ?>
's Profile
						<span style="float:right;padding:15px 0px 0px 0px;">
								<a style="color: #C30100;font-family: Arial,Helvetica,sans-serif;font-size: 14px;font-weight: bold;" href="index.php?stage=subscriber&mode=ProfileEdit">Edit</a>
						</span>
						</td>	
						
					</tr>


										
																
																<tr>
																	<td width="34%" valign="middle" align="left" style="padding-left: 14px;" class="topsublink_bg arial_15_000_bold"></td>
																	<td width="66%" valign="middle" align="right" style="padding: 6px 14px;" class="topsublink_bg">
																	<table cellspacing="0" cellpadding="0" border="0">
																		<tbody>
																			<tr>
																												
																				<?php if ($_SESSION['member_type'] == 'subscriber'): ?>													
																					<td width="117" align="right" valign="top"><a href="index.php?stage=subscriber&mode=MyAffiliates" class="Activebutton"><span>My Affiliates</span></a></td>
																					<td width="106" align="right" valign="top"><a href="index.php?stage=subscriber&mode=VoteAlerts" class="button"><span>Vote Alerts</span></a></td>																		
																					<td width="100" align="right" valign="top"><a href="index.php?stage=subscriber&mode=MyProfile" class="button"><span> My Profile</span></a></td>																										
																				<?php endif; ?>							
																					
																					<td width="202" align="right" valign="top"><a href="index.php?stage=subscriber&mode=ElectedRepresentatives" class="button"><span>Elected Representatives</span></a></td>
																					
																			</tr>									
																		</tbody>
																	</table>
																	</td>
																</tr>
																<tr>
																	<td valign="bottom" align="left" height="37" style="padding-bottom: 5px;" class="arial_14_c30100" colspan="2">&nbsp;</td>
																</tr>
															
		<!--<tr>
			<td valign="top" align="left" style="padding: 16px 5px 11px 15px;" class="votealert_bg_new" colspan="2">			
				<table width="100%" cellspacing="0" cellpadding="0" border="0">
					<tbody>-->
					<?php if (isset ( $this->_tpl_vars['affiliate_content_page_header_view'] ) && $this->_tpl_vars['affiliate_content_page_header_view'] == 'Y'): ?>
					<?php unset($this->_sections['i']);
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['MyAffiliates']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
						<td valign="top" align="left" colspan="2" class="votealert_bg_new" style="padding: 16px 5px 11px 15px;">
						<table width="100%" cellspacing="0" cellpadding="0" border="0">
						<tbody>
						<tr>						
							<td width="125" valign="top" align="left">
							<?php if ($this->_tpl_vars['MyAffiliates'][$this->_sections['i']['index']]['banner'] != ""): ?>
							<img width="125" height="99" alt="" src="./UserFiles/affiliates_logo/<?php echo $this->_tpl_vars['MyAffiliates'][$this->_sections['i']['index']]['banner']; ?>
" />
							<?php else: ?>
							<img width="125" height="99" alt="" src="./images/no-image.jpg" />
							<?php endif; ?>
							</td>
							<td width="20" valign="top" align="left">&nbsp;</td>
							<td width="732" valign="top" align="left">
								<table width="100%" cellspacing="0" cellpadding="0" border="0">
									<tbody>
										<tr>
											<td valign="top" align="left" height="22">
												<a href="index.php?stage=subscriber&mode=AffiliateDetails&id=<?php echo $this->_tpl_vars['MyAffiliates'][$this->_sections['i']['index']]['member_id']; ?>
"
													class="arial12Ba60000">
													<?php echo ((is_array($_tmp=$this->_tpl_vars['MyAffiliates'][$this->_sections['i']['index']]['organisation_name'])) ? $this->_run_mod_handler('html_entity_decode', true, $_tmp) : html_entity_decode($_tmp)); ?>

												</a>	
											</td>
										</tr>
										<tr>
											<td valign="top" align="left" class="arial_12_000">
											<?php echo ((is_array($_tmp=$this->_tpl_vars['MyAffiliates'][$this->_sections['i']['index']]['description'])) ? $this->_run_mod_handler('html_entity_decode', true, $_tmp) : html_entity_decode($_tmp)); ?>
</td>
										</tr>
										<tr>
											<td valign="bottom" align="left" height="26"><div style="float:left;with:300px">
											<!--<span class="arial12Ba60000">Dated: 
												<span class="arial11Na60000"> <?php echo $this->_tpl_vars['MyAffiliates'][$this->_sections['i']['index']]['reg_date']; ?>
 </span>
											</span>--></div><div style="float:right;with:300px;padding-right:20px;"><?php if ($this->_tpl_vars['MyAffiliates'][$this->_sections['i']['index']]['donation_url'] != ''): ?><a href="<?php echo $this->_tpl_vars['MyAffiliates'][$this->_sections['i']['index']]['donation_url']; ?>
" style="color: #C30100;font-family: Arial,Helvetica,sans-serif;font-size: 14px;font-weight: bold;" target="_blank">Make Donation</a><?php endif; ?></div></td>
										</tr>
									</tbody>
								</table>
							</td>
						</tr>
						</tbody>
						</table>
						</td>
						</tr>
						<?php endfor; endif; ?>
						<?php else: ?>
						<?php unset($this->_sections['i']);
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['MyAffiliates']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
						<td valign="top" align="left" colspan="2" class="votealert_bg_new" style="padding: 16px 5px 11px 15px;">
								<table width="100%" cellspacing="0" cellpadding="0" border="0">
									<tbody>
										<tr>
											<td valign="top" align="left" height="22">
												<a href="index.php?stage=subscriber&mode=AffiliateDetails&id=<?php echo $this->_tpl_vars['MyAffiliates'][$this->_sections['i']['index']]['member_id']; ?>
"
													class="arial12Ba60000">
													<?php echo $this->_tpl_vars['MyAffiliates'][$this->_sections['i']['index']]['organisation_name']; ?>

												</a>
											 </td>
										</tr>
										<tr>
											<td valign="top" align="left" class="arial_12_000">
											<?php echo $this->_tpl_vars['MyAffiliates'][$this->_sections['i']['index']]['description']; ?>
</td>
										</tr>
										<tr>
											<td valign="bottom" align="left" height="26"><div style="float:left;with:300px"><div style="float:left;with:300px">
											<!--<span class="arial12Ba60000">Dated: 
												<span class="arial11Na60000"> <?php echo $this->_tpl_vars['MyAffiliates'][$this->_sections['i']['index']]['reg_date']; ?>
 </span>
											</span>--></div><div style="float:right;with:300px;padding-right:20px;"><?php if ($this->_tpl_vars['MyAffiliates'][$this->_sections['i']['index']]['donation_url'] != ''): ?><a href="<?php echo $this->_tpl_vars['MyAffiliates'][$this->_sections['i']['index']]['donation_url']; ?>
" style="color: #C30100;font-family: Arial,Helvetica,sans-serif;font-size: 14px;font-weight: bold;" target="_blank">Make Donation</a><?php endif; ?></div></td>
										</tr>
									</tbody>
								</table>
							</td>
						</tr>
						<?php endfor; endif; ?>						
						<?php endif; ?>
						
							
					<!--</tbody>
				</table>
				
			</td>
		</tr>-->
																
																
																<tr>
																	<td valign="top" align="left" class="border_dashed" colspan="2"></td>
																</tr>
																<!--<tr>
																	<td valign="bottom" align="left" height="66" style="padding-bottom: 5px;" class="arial_14_c30100" colspan="2">Latest Comments</td>
																</tr>
																<tr>
																	<td valign="top" bgcolor="#b1b0ac" align="left" class="arial_20_c40306" colspan="2"><img width="1" height="1" alt="" src="images/trans.gif"></td>
																</tr>-->
																<!--<tr>
																	<td valign="top" align="left" colspan="2"><table width="100%" cellspacing="0" cellpadding="0" border="0">
																			<tbody>
																				<tr>
																					<td valign="top" align="left" class="votealert_bg"><table width="100%" cellspacing="0" cellpadding="0" border="0">
																							<tbody>
																								<tr>
																									<td width="47" valign="top" align="center"><img width="27" height="36" style="margin-top: 20px;" alt="" src="images/icon_doc.gif"></td>
																									<td width="847" valign="top" align="left" class="bg_f7f6ee"><table width="100%" cellspacing="0" cellpadding="0" border="0">
																											<tbody>
																												<tr>
																													<td valign="top" align="left" height="22"><a class="arialB13000000" href="#">Dummy text is text that is used in the publishing</a></td>
																												</tr>
																												<tr>
																													<td valign="top" align="left" class="arial_12_000">Dummy text is text that is used in the publishing industry or by web. Its function as a filler or as a tool for comparing the visual impression of different typefaces. Dummy text is text that is used in the publishing industry or by web. Dummy text is text that is used in the publishing industry or by web. </td>
																												</tr>
																												<tr>
																													<td valign="bottom" align="left" height="26"><span class="arial12Ba60000">Dated:<span class="arial11Na60000"> 04/04/2011</span></span></td>
																												</tr>
																											</tbody>
																										</table></td>
																								</tr>
																							</tbody>
																						</table></td>
																				</tr>
																				<tr>
																					<td valign="top" align="left" class="border_dashed"></td>
																				</tr>
																				<tr>
																					<td valign="top" align="left"><table width="100%" cellspacing="0" cellpadding="0" border="0">
																							<tbody>
																								<tr>
																									<td width="47" valign="top" align="center"><img width="27" height="36" style="margin-top: 20px;" alt="" src="images/icon_doc.gif"></td>
																									<td width="847" valign="top" align="left" class="bg_f7f6ee"><table width="100%" cellspacing="0" cellpadding="0" border="0">
																											<tbody>
																												<tr>
																													<td valign="top" align="left" height="22"><a class="arialB13000000" href="#">Dummy text is text that is used in the publishing</a></td>
																												</tr>
																												<tr>
																													<td valign="top" align="left" class="arial_12_000">Dummy text is text that is used in the publishing industry or by web. Its function as a filler or as a tool for comparing the visual impression of different typefaces. Dummy text is text that is used in the publishing industry or by web. Dummy text is text that is used in the publishing industry or by web. </td>
																												</tr>
																												<tr>
																													<td valign="bottom" align="left" height="26"><span class="arial12Ba60000">Dated:<span class="arial11Na60000"> 04/04/2011</span></span></td>
																												</tr>
																											</tbody>
																										</table></td>
																								</tr>
																							</tbody>
																						</table></td>
																				</tr>
																				<tr>
																					<td valign="top" align="left" class="border_dashed"></td>
																				</tr>
																				<tr>
																					<td valign="top" align="left"><table width="100%" cellspacing="0" cellpadding="0" border="0">
																							<tbody>
																								<tr>
																									<td width="47" valign="top" align="center"><img width="27" height="36" style="margin-top: 20px;" alt="" src="images/icon_doc.gif"></td>
																									<td width="847" valign="top" align="left" class="bg_f7f6ee"><table width="100%" cellspacing="0" cellpadding="0" border="0">
																											<tbody>
																												<tr>
																													<td valign="top" align="left" height="22"><a class="arialB13000000" href="#">Dummy text is text that is used in the publishing</a></td>
																												</tr>
																												<tr>
																													<td valign="top" align="left" class="arial_12_000">Dummy text is text that is used in the publishing industry or by web. Its function as a filler or as a tool for comparing the visual impression of different typefaces. Dummy text is text that is used in the publishing industry or by web. Dummy text is text that is used in the publishing industry or by web. </td>
																												</tr>
																												<tr>
																													<td valign="bottom" align="left" height="26"><span class="arial12Ba60000">Dated:<span class="arial11Na60000"> 04/04/2011</span></span></td>
																												</tr>
																											</tbody>
																										</table></td>
																								</tr>
																							</tbody>
																						</table></td>
																				</tr>
																				<tr>
																					<td valign="top" align="left" class="border_dashed"></td>
																				</tr>
																				<tr>
																					<td valign="top" align="left"><table width="100%" cellspacing="0" cellpadding="0" border="0">
																							<tbody>
																								<tr>
																									<td width="47" valign="top" align="center"><img width="27" height="36" style="margin-top: 20px;" alt="" src="images/icon_doc.gif"></td>
																									<td width="847" valign="top" align="left" class="bg_f7f6ee"><table width="100%" cellspacing="0" cellpadding="0" border="0">
																											<tbody>
																												<tr>
																													<td valign="top" align="left" height="22"><a class="arialB13000000" href="#">Dummy text is text that is used in the publishing</a></td>
																												</tr>
																												<tr>
																													<td valign="top" align="left" class="arial_12_000">Dummy text is text that is used in the publishing industry or by web. Its function as a filler or as a tool for comparing the visual impression of different typefaces. Dummy text is text that is used in the publishing industry or by web. Dummy text is text that is used in the publishing industry or by web. </td>
																												</tr>
																												<tr>
																													<td valign="bottom" align="left" height="26"><span class="arial12Ba60000">Dated:<span class="arial11Na60000"> 04/04/2011</span></span></td>
																												</tr>
																											</tbody>
																										</table></td>
																								</tr>
																							</tbody>
																						</table></td>
																				</tr>
																				<tr>
																					<td valign="top" align="left" class="border_dashed"></td>
																				</tr>
																				<tr>
																					<td valign="top" align="left"><table width="100%" cellspacing="0" cellpadding="0" border="0">
																							<tbody>
																								<tr>
																									<td width="47" valign="top" align="center"><img width="27" height="36" style="margin-top: 20px;" alt="" src="images/icon_doc.gif"></td>
																									<td width="847" valign="top" align="left" class="bg_f7f6ee"><table width="100%" cellspacing="0" cellpadding="0" border="0">
																											<tbody>
																												<tr>
																													<td valign="top" align="left" height="22"><a class="arialB13000000" href="#">Dummy text is text that is used in the publishing</a></td>
																												</tr>
																												<tr>
																													<td valign="top" align="left" class="arial_12_000">Dummy text is text that is used in the publishing industry or by web. Its function as a filler or as a tool for comparing the visual impression of different typefaces. Dummy text is text that is used in the publishing industry or by web. Dummy text is text that is used in the publishing industry or by web. </td>
																												</tr>
																												<tr>
																													<td valign="bottom" align="left" height="26"><span class="arial12Ba60000">Dated:<span class="arial11Na60000"> 04/04/2011</span></span></td>
																												</tr>
																											</tbody>
																										</table></td>
																								</tr>
																							</tbody>
																						</table></td>
																				</tr>
																				<tr>
																					<td valign="top" align="left" class="border_dashed"></td>
																				</tr>
																				<tr>
																					<td valign="top" align="left">
																					
																						<table width="100%" cellspacing="0" cellpadding="0" border="0">
						
																			
	<tr>
		<td width="47" valign="top" align="center"><img width="27" height="36" style="margin-top: 20px;" alt="" src="images/icon_doc.gif"></td>
		<td width="847" valign="top" align="left" class="bg_f7f6ee"><table width="100%" cellspacing="0" cellpadding="0" border="0">
				<tbody>
					<tr>
						<td valign="top" align="left" height="22"><a class="arialB13000000" href="#">Dummy text is text that is used in the publishing</a></td>
					</tr>
					<tr>
						<td valign="top" align="left" class="arial_12_000">Dummy text is text that is used in the publishing industry or by web. Its function as a filler or as a tool for comparing the visual impression of different typefaces. Dummy text is text that is used in the publishing industry or by web. Dummy text is text that is used in the publishing industry or by web. </td>
					</tr>
					<tr>
						<td valign="bottom" align="left" height="26"><span class="arial12Ba60000">Dated:<span class="arial11Na60000"> 04/04/2011</span></span></td>
					</tr>
				</tbody>
			</table></td>
	</tr>
	
																								
																							</tbody>
																						</table></td>
																				</tr>
																				<tr>
																					<td valign="top" align="left" class="border_dashed"></td>
																				</tr>
																				<tr>
																					<td valign="top" align="center" height="65" class="bg_f7f6ee"><a class="arial12BUa60000" href="#">view more...</a></td>
																				</tr>
																			</tbody>
																		</table></td>
																</tr>-->
															</tbody>
														</table></td>
												</tr>
											</tbody>
										</table></td>
								</tr>
							</tbody>
						</table></td>
				</tr>
			</tbody>
		</table></td>
</tr>