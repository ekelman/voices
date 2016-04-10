<?php /* Smarty version 2.6.10, created on 2014-03-03 12:22:28
         compiled from subscriber/ihtml/affiliate_details.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'html_entity_decode', 'subscriber/ihtml/affiliate_details.html', 241, false),)), $this); ?>
<?php echo '
<script language="javascript" src="scripts/gen_validatorv4.js"></script>
<script language="javascript" src="scripts/jquery-1.3.2.min.js"></script>

<!-- page specific scripts -->
<script type="text/javascript" charset="utf-8">	
'; ?>

	var headerTitle = "<?php echo $this->_tpl_vars['vAffiliate']->organisation_name; ?>
";
	var bgImage 	= "<?php echo $this->_tpl_vars['vAffiliate']->banner; ?>
";
<?php echo '	
$(function()
{
	$(\'.headerTitle\').html(headerTitle );	
	if(bgImage != "")		
	{
		$(".img_top_banner_inner").attr("style","background-image:url(\'\')");
		$(".img_top_banner_inner").attr("style","background-image:url(\'../UserFiles/affiliates_logo/" + bgImage + "\')");
	}
});
</script>
<!-- page specific styles -->
'; ?>

<tr>
	<td class="arial_16_c40306">
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
			<tr>
				<td align="left" valign="top" class="arial_16_c40306">
					<table width="100%" border="0" cellspacing="0" cellpadding="0">
						<tr>						
							<td align="center" valign="top" style="padding: 16px 13px 13px 13px" class="bg_f7f6f2">
								<table width="100%" border="0" cellspacing="0" cellpadding="0">
									<tr>
										<td class="bg_f7f6f2">
											<table width="100%" border="0" cellspacing="0"
												cellpadding="0">
												<tr>
													<td align="left" valign="top" class="arial_16_c40306">
														<table width="100%" border="0" cellspacing="0"
															cellpadding="0">
															<!-- HEADER SECTION -->
															<tr>
																<td align="center">
																	<table width="100%">
																		<tr>
																			<td align="left" valign="top" class="Trebuchet_27_c60000">
																					<?php echo $this->_tpl_vars['vAffiliate']->organisation_name; ?>
's Detail																				
																			</td>
																			
																			<td align="right" valign="middle" >
																			<?php if ($_SESSION['member_type'] != 'affiliate'): ?> 
																				<?php if ($this->_tpl_vars['AddNewAffiliate'] == false): ?>
																					<a class="arial12BUa60000" href="/index.php?stage=subscriber&mode=ProfileEdit">
																						<b>Add Affiliate</b>
																					</a> 																				
																				<?php endif; ?>
																				<?php else: ?>
																				<?php if ($this->_tpl_vars['AddNewAffiliate'] == false): ?>
																				
																				<a class="arial12BUa60000" href="/index.php?stage=affiliates&mode=AssociateAffiliate&id=<?php echo $this->_tpl_vars['vAffiliate']->affiliate_id; ?>
">
																						<b>Send Association Request</b>
																					</a>
																					<?php else: ?>
																					
																					<?php if ($this->_tpl_vars['ViewStatus'] == 'pending'): ?>
																					<b>Request Sent</b>
																					
																					<?php elseif ($this->_tpl_vars['ViewReqStatus'] == 'pending'): ?>
																					<a class="arial12BUa60000" href="/index.php?stage=affiliates&mode=AssociateReqAffiliate&id=<?php echo $this->_tpl_vars['vAffiliate']->affiliate_id; ?>
">
																						<b>Confirm Association Request</b>
																					</a>&nbsp;&nbsp;&nbsp;&nbsp;
																					<a class="arial12BUa60000" href="/index.php?stage=affiliates&mode=CancelReqAffiliate&id=<?php echo $this->_tpl_vars['vAffiliate']->affiliate_id; ?>
">
																						<b>Not Confirm</b>
																					</a>
																					
																					<?php else: ?>
																					<b>Associated</b>
																					
																					<?php endif; ?>
																					
																					<?php endif; ?>
																				<?php endif; ?>
																				
																			</td>
																		</tr>
																	</table>
																</td>
															</tr>
															<tr>
																<td valign="top" align="left">
																	<table width="100%" cellspacing="0" cellpadding="0"	border="0">
																		<tbody>
																			<tr>
																				<td valign="top" align="center" class="bg_f7f6f2">
																					<?php if ($this->_tpl_vars['AffiliateContentPageHeaderView']): ?>
																					<table width="100%" cellspacing="0" cellpadding="0"
																						border="0">
																						<tbody>
																							<tr>
																								<td valign="top" align="left"
																									style="padding-top: 7px;">

																									<table width="100%" cellspacing="0"
																										cellpadding="0" border="0">
																										<tbody>
																											<tr>
																												<td style="border: 2px solid #893E43;"
																													valign="top" align="left">

																													<table width="100%" cellspacing="0"
																														cellpadding="0" border="0">
																														<tbody>
																															<tr>
																																<td width="100%" valign="top"
																																	align="left"
																																	class="img_top_banner_inner"><span
																																	class="headerTitle">VoicesForChange</span>
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
																					</table> <?php endif; ?></td>
																			</tr>
																		</tbody>
																	</table>
																</td>
															</tr>
															<tr>
																<td class="bg_f7f6f2" valign="top" align="center">
																	<table width="100%">
																		<tr>
																			<td align="left"><span class="arial_15_000_bold">
																					<h2 class="billFormHeadingabout">About Us</h2> </span>
																			</td>
																		</tr>
																		<tr>
																			<td align="left"><span class="arial_12_000"><?php echo $this->_tpl_vars['vAffiliate']->description; ?>
</span>
																			</td>
																		</tr>
																	</table>
																</td>
															</tr>
															<tr>
																<td align="center" valign="top"
																	style="padding-top: 13px" class="bg_f7f6f2">
																	<table width="100%" border="0" cellspacing="0"
																		cellpadding="0">
																		<tr>
																			<td colspan="2" align="left" valign="top">
																				<table width="100%" border="0" cellspacing="0"
																					cellpadding="0">
																					<?php if ($this->_tpl_vars['vMsg'] != ''): ?>
																					<tr>
																						<td align="center" class="error-message"><?php echo $this->_tpl_vars['vMsg']; ?>
</td>
																					</tr>
																					<?php endif; ?>
																					
																					<?php if ($this->_tpl_vars['vAffiliate']->donation_url != ''): ?>
																					<tr>
																						<td align="right" class="button">
																						<span align="right">	
																							<a href="<?php echo $this->_tpl_vars['vAffiliate']->donation_url; ?>
" target="_blank">Donate</a>
																						</span>	
																							
																						</td>
																					</tr>
																					<?php endif; ?>
					
																					
																					<tr>
																						<td colspan="2" align="left" valign="top">
																							
																							
																									<!-- Start  -->
<tr>
	<td align="center" valign="top"
		style="padding-top: 13px" class="bg_f7f6f2">
		<table width="100%" border="0" cellspacing="0"
			cellpadding="0">
			<tr>
				<td align="left" valign="top" width="49%">
					<!-- first column -->	
					<table width="100%" border="0" cellspacing="0"
						cellpadding="0">
						<tr>
							<td colspan="2" align="left" valign="top">
								<table width="100%" border="0" cellspacing="0"
									cellpadding="0">
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
																<td width="100%" align="left"	valign="top">
																<!-- News   -->		
																<tr>
																	<td width="100%" align="left" valign="top">
																		<table width="100%" border="0" cellspacing="0" cellpadding="0">
																			<tr>
																				<td width="100%" height="32" align="left" valign="middle" class="tophead_grad">
																					News
																				</td>
																			</tr>
																			<tr>
																				<td align="left" valign="top" class="votealert_bg">
																					<table width="100%" border="0" cellspacing="0" cellpadding="0">
																						<?php if ($this->_tpl_vars['AffiliateContentNewsView']): ?>
																							<?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['affiliateNews']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
																								<table width="100%" border="0"
																									cellspacing="0" cellpadding="0">
																									<tr>
																										<td width="47" align="center"
																											valign="top"><img
																											src="images/icon_doc.gif"
																											width="27" height="36" alt=""
																											style="margin-top: 20px" /></td>
																										<td width="367" align="left"
																											valign="top" class="bg_f7f6ee">
																											
																											<table width="100%" border="0"
																												cellspacing="0"
																												cellpadding="0">
																												<tr>
																													<td height="22" align="left"
																															valign="top">
																															<a href="index.php?stage=subscriber&mode=NewsDetail&affID=<?php echo $this->_tpl_vars['vAffiliate']->member_id; ?>
&id=<?php echo $this->_tpl_vars['affiliateNews'][$this->_sections['i']['index']]['article_id']; ?>
"
																															class="arialB13000000">
																															<?php echo ((is_array($_tmp=$this->_tpl_vars['affiliateNews'][$this->_sections['i']['index']]['article_title'])) ? $this->_run_mod_handler('html_entity_decode', true, $_tmp) : html_entity_decode($_tmp)); ?>

																														</a>

																														
																														</td>
																													</tr>
																													<tr>
																														<td align="left" valign="top">
																															<?php echo ((is_array($_tmp=$this->_tpl_vars['affiliateNews'][$this->_sections['i']['index']]['affiliate_comment'])) ? $this->_run_mod_handler('html_entity_decode', true, $_tmp) : html_entity_decode($_tmp)); ?>
																															

																														</td>
																													</tr>
																													<tr>
																														<td height="26" align="right"
																															valign="bottom">
																															<span class="arial12Ba60000" style="float: left">Dated:
																															<span	class="arial11Na60000">
																																	<?php echo $this->_tpl_vars['affiliateNews'][$this->_sections['i']['index']]['created']; ?>

																															</span> 
																															</span>																																				
																															<a	href="index.php?stage=subscriber&mode=NewsDetail&affID=<?php echo $this->_tpl_vars['vAffiliate']->member_id; ?>
&id=<?php echo $this->_tpl_vars['affiliateNews'][$this->_sections['i']['index']]['article_id']; ?>
"
																																class="arial12Ba60000">
																															[read more]
																															</a>
																															</td>
																													</tr>
																												
																											</table>
																										
																										</td>
																									</tr>
																								</table></td>
																						</tr>
																						<tr>
																							<td align="left" valign="top"
																								class="border_dashed"></td>
																						</tr>
																						<?php endfor; else: ?>
																						<tr>
																							<td align="left" valign="top"
																								class="border_dashed" width="100%">
																								<table width="100%">
																									<tr>
																										<td valign="top"
																											class="bg_f7f6ee"
																											align="center">No News.</td>
																									</tr>
																								</table></td>
																						</tr>
																						<?php endif; ?>																						
																						<tr>
																							<td height="40" align="center"
																								valign="middle"><a
																								href="index.php?stage=subscriber&mode=AffiliateNews&affID=<?php echo $this->_tpl_vars['vAffiliate']->member_id; ?>
"
																								class="arial12BUa60000">view
																									more...</a>
																							</td>
																						</tr>

																						<?php else: ?>
																						<tr>
																							<td valign="top" class="bg_f7f6ee"
																								align="center">Not authorized
																								to view news.</td>
																						</tr>

																						<?php endif; ?>
																					</table></td>
																			</tr>
																		</table></td>
																</tr>
																	
																<!-- News   -->		
																</td>
															</tr>
														</table></td>
												</tr>
											</table></td>
									</tr>
								</table>
							</td>
						</tr>
						<tr>
							<td align="left" valign="top">&nbsp;</td>
						</tr>
						<tr>
							<td colspan="2" align="left" valign="top">
								<table width="100%" border="0" cellspacing="0"
									cellpadding="0">
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
																<!-- Bulletins -->
																<tr>
																		<td width="100%" align="left" valign="top">
																			<table width="100%" border="0" cellspacing="0" cellpadding="0">
																				<tr>
																					<td width="100%" height="32" align="left" valign="middle" class="tophead_grad">
																						Bulletins
																					</td>
																				</tr>
																				<tr>
																					<td align="left" valign="top" class="votealert_bg">
																						<table width="100%" border="0" cellspacing="0" cellpadding="0">
																							<?php if ($this->_tpl_vars['AffiliateContentBulletinsView']): ?>	
																								<?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['affiliateBulletin']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
																									<table width="100%" border="0"
																										cellspacing="0" cellpadding="0">
																										<tr>
																											<td width="47" align="center"
																												valign="top"><img
																												src="images/icon_doc.gif"
																												width="27" height="36" alt=""
																												style="margin-top: 20px" /></td>
																											<td width="367" align="left"
																												valign="top" class="bg_f7f6ee">										
																												
																												<table width="100%" border="0" cellspacing="0" cellpadding="0">
																													<tr>
																														<td height="22" align="left"
																															valign="top">
																															<a href="index.php?stage=subscriber&mode=BulletinsDetail&id=<?php echo $this->_tpl_vars['affiliateBulletin'][$this->_sections['i']['index']]['article_id']; ?>
&affID=<?php echo $this->_tpl_vars['vAffiliate']->member_id; ?>
" class="arialB13000000">
																																<?php echo ((is_array($_tmp=$this->_tpl_vars['affiliateBulletin'][$this->_sections['i']['index']]['article_title'])) ? $this->_run_mod_handler('html_entity_decode', true, $_tmp) : html_entity_decode($_tmp)); ?>

															</a>															
																														</td>
																													</tr>
																													<tr>
																														<td align="left" valign="top">
																															<?php echo ((is_array($_tmp=$this->_tpl_vars['affiliateBulletin'][$this->_sections['i']['index']]['affiliate_comment'])) ? $this->_run_mod_handler('html_entity_decode', true, $_tmp) : html_entity_decode($_tmp)); ?>

																														</td>
																													</tr>
																													<tr>
																														<td height="26" align="right"
																															valign="bottom"><span
																															class="arial12Ba60000"
																															style="float: left">Dated:<span
																																class="arial11Na60000">
																																	<?php echo $this->_tpl_vars['affiliateBulletin'][$this->_sections['i']['index']]['created']; ?>

																															</span> </span>
																																																																											
																															<a href="index.php?stage=subscriber&mode=BulletinsDetail&id=<?php echo $this->_tpl_vars['affiliateBulletin'][$this->_sections['i']['index']]['article_id']; ?>
&affID=<?php echo $this->_tpl_vars['vAffiliate']->member_id; ?>
"
																																class="arial12Ba60000">
																																[read more]</a>
																														
																														</td>
																													</tr>
																												</table>


																											
																											</td>
																										</tr>
																									</table></td>
																							</tr>
																							<tr>
																								<td align="left" valign="top"
																									class="border_dashed"></td>
																							</tr>
																							<?php endfor; else: ?>
																							<tr>
																								<td align="left" valign="top"
																									class="border_dashed" width="100%">
																									<table width="100%">
																										<tr>
																											<td valign="top"
																												class="bg_f7f6ee"
																												align="center">No Bulletins.</td>
																										</tr>
																									</table></td>
																							</tr>
																							<?php endif; ?>																							
																							<tr>
																									<td height="40" align="center"
																										valign="middle"><a
																										href="index.php?stage=subscriber&mode=AffiliateBulletin&affID=<?php echo $this->_tpl_vars['vAffiliate']->member_id; ?>
"
																										class="arial12BUa60000">view
																											more...</a>
																									</td>
																							</tr>
																																				

																							<?php else: ?>
																							<tr>
																								<td valign="top" class="bg_f7f6ee"
																									align="center">Not authorized
																									to view bulletins.
																								</td>
																							</tr>

																							<?php endif; ?>
																						</table>
																					</td>
																				</tr>
																			</table></td>
																	</tr>
																	
																<!-- Bulletins -->																
																</td>
															</tr>
														</table></td>
												</tr>
											</table></td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
					<!-- first column -->	
				</td>
				
				<td align="left" valign="top" width="2%"><img
					src="images/trans.gif" height="1" width="10px" />
				</td>
				
				<td align="left" valign="top" width="49%">
					<!-- second column -->	
					<table width="100%" border="0" cellspacing="0"
						cellpadding="0">
						<tr>
							<td align="center" valign="top">
								<table style="width: 100%" border="0"
									cellspacing="0" cellpadding="0">
									<tr>
										<td style="width: 100%" align="left"
											valign="top">
											<table width="100%" border="0" cellspacing="0"
												cellpadding="0">
												<tr>
													<td width="100%" align="left" valign="top">
														
													<!--- Bills and Petitions  ---->	
													
															<table width="100%" border="0" cellspacing="0" cellpadding="0">
																<tr>
																	<td width="100%" height="32" align="left" valign="middle" class="tophead_grad">
																		Bills & Petitions
																	</td>
																</tr>
																<tr>
																	<td align="left" valign="top" class="votealert_bg">
																		<table width="100%" border="0" cellspacing="0" cellpadding="0">
																			
																			<?php if ($this->_tpl_vars['AffiliateContentBillsView']): ?>
																				<?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['affiliateVoteAlert']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
																					<table width="100%" border="0"
																						cellspacing="0" cellpadding="0">									
																						
																						<tr>
																							<td width="47" align="center"
																								valign="top"><img
																								src="images/icon_doc.gif"
																								width="27" height="36" alt=""
																								style="margin-top: 20px" /></td>
																							<td width="367" align="left"
																								valign="top" class="bg_f7f6ee">										
																								
																								<table width="100%" border="0" cellspacing="0" 	cellpadding="0">
																																																<?php if ($this->_tpl_vars['affiliateVoteAlert'][$this->_sections['i']['index']]['article_type'] == 'bill'): ?>
																									<tr>
																										<td height="22" align="left"
																											valign="top">
																											
																											 
																											<?php if ($_SESSION['member_type'] == 'observer'): ?> 
																												<a	href="index.php?stage=subscriber&mode=VoteAlertsDetail&id=<?php echo $this->_tpl_vars['affiliateVoteAlert'][$this->_sections['i']['index']]['article_id']; ?>
"
																													class="arialB13000000">
																												<?php echo ((is_array($_tmp=$this->_tpl_vars['affiliateVoteAlert'][$this->_sections['i']['index']]['article_title'])) ? $this->_run_mod_handler('html_entity_decode', true, $_tmp) : html_entity_decode($_tmp)); ?>

																												</a> 
																											<?php else: ?> 
																												<a	href="index.php?stage=subscriber&mode=AffiliateVoteAlertsDetail&affID=<?php echo $this->_tpl_vars['vAffiliate']->member_id; ?>
&id=<?php echo $this->_tpl_vars['affiliateVoteAlert'][$this->_sections['i']['index']]['article_id']; ?>
"
																														class="arialB13000000">
																												<?php echo ((is_array($_tmp=$this->_tpl_vars['affiliateVoteAlert'][$this->_sections['i']['index']]['article_title'])) ? $this->_run_mod_handler('html_entity_decode', true, $_tmp) : html_entity_decode($_tmp)); ?>

																													</a> 
																											<?php endif; ?>	
																										
																										</td>
																									</tr>																									
																									<tr>
																										<td align="left" valign="top">

																																																						<?php echo ((is_array($_tmp=$this->_tpl_vars['affiliateVoteAlert'][$this->_sections['i']['index']]['affiliate_comment'])) ? $this->_run_mod_handler('html_entity_decode', true, $_tmp) : html_entity_decode($_tmp)); ?>


																										</td>
																									</tr>
																									<tr>
																										<td height="26" align="right"
																											valign="bottom"><span
																											class="arial12Ba60000"
																											style="float: left">Dated:<span
																												class="arial11Na60000">
																													<?php echo $this->_tpl_vars['affiliateVoteAlert'][$this->_sections['i']['index']]['created']; ?>


																											</span> </span>
																											
																											 
																											<?php if ($_SESSION['member_type'] == 'observer'): ?> 
																												<a	href="index.php?stage=subscriber&mode=VoteAlertsDetail&id=<?php echo $this->_tpl_vars['affiliateVoteAlert'][$this->_sections['i']['index']]['article_id']; ?>
"
																													class="arial12Ba60000">
																												[read more]
																												</a> 
																											<?php else: ?> 
																												<a	href="index.php?stage=subscriber&mode=AffiliateVoteAlertsDetail&affID=<?php echo $this->_tpl_vars['vAffiliate']->member_id; ?>
&id=<?php echo $this->_tpl_vars['affiliateVoteAlert'][$this->_sections['i']['index']]['article_id']; ?>
"
																														class="arial12Ba60000">
																														[read more]
																													</a> 
																											<?php endif; ?>	
																											
																											</td>
																									</tr>
																									
																									<?php else: ?>
																									
																									<tr>
																										<td height="22" align="left"
																											valign="top">
																										
																									 
																									<?php if ($_SESSION['member_type'] == 'observer'): ?> 
																									<a href="index.php?stage=subscriber&mode=petitionsDetail&affID=<?php echo $this->_tpl_vars['vAffiliate']->member_id; ?>
&id=&id=<?php echo $this->_tpl_vars['affiliateVoteAlert'][$this->_sections['i']['index']]['article_id']; ?>
"
																										class="arialB13000000">
																										<?php echo ((is_array($_tmp=$this->_tpl_vars['affiliateVoteAlert'][$this->_sections['i']['index']]['article_title'])) ? $this->_run_mod_handler('html_entity_decode', true, $_tmp) : html_entity_decode($_tmp)); ?>

																									</a>
																									<?php else: ?> 
																									<a href="index.php?stage=subscriber&mode=AffiliatePetitionsDetailAffiliate&affID=<?php echo $this->_tpl_vars['vAffiliate']->member_id; ?>
&id=<?php echo $this->_tpl_vars['affiliateVoteAlert'][$this->_sections['i']['index']]['article_id']; ?>
"
																										class="arialB13000000">
																											<?php echo ((is_array($_tmp=$this->_tpl_vars['affiliateVoteAlert'][$this->_sections['i']['index']]['article_title'])) ? $this->_run_mod_handler('html_entity_decode', true, $_tmp) : html_entity_decode($_tmp)); ?>

																									</a> 
																									<?php endif; ?> 
																									
																									<?php if ($this->_tpl_vars['affiliateVoteAlert'][$this->_sections['i']['index']]['vote_status'] == 'NA'): ?>
																										 
																										<?php if ($_SESSION['member_type'] == 'observer'): ?> 
																											<a href="index.php?stage=subscriber&mode=petitionsDetail&affID=<?php echo $this->_tpl_vars['vAffiliate']->member_id; ?>
&id=&id=<?php echo $this->_tpl_vars['affiliateVoteAlert'][$this->_sections['i']['index']]['article_id']; ?>
"
																												class="arialB13000000"> 
																												<img border="0" width="24" height="14" alt="" src="images/btn_new.gif"
																													style="border: none;"> 
																											</a>
																										<?php else: ?> 
																											<a href="index.php?stage=subscriber&mode=AffiliatePetitionsDetailAffiliate&affID=<?php echo $this->_tpl_vars['vAffiliate']->member_id; ?>
&id=<?php echo $this->_tpl_vars['affiliateVoteAlert'][$this->_sections['i']['index']]['article_id']; ?>
"
																												class="arialB13000000"> 
																												<img border="0" width="24" height="14" alt="" src="images/btn_new.gif" style="border: none;"> </a>
																										<?php endif; ?> 
																									<?php endif; ?>
																																					
																																				
																									
																										</td>
																									</tr>
																									<tr>
																										<td align="left" valign="top">
																											<?php echo ((is_array($_tmp=$this->_tpl_vars['affiliateVoteAlert'][$this->_sections['i']['index']]['affiliate_comment'])) ? $this->_run_mod_handler('html_entity_decode', true, $_tmp) : html_entity_decode($_tmp)); ?>

																										</td>
																									</tr>
																									<tr>
																										<td height="26" align="right"
																											valign="bottom"><span
																											class="arial12Ba60000"
																											style="float: left">Dated:<span
																												class="arial11Na60000">
																													<?php echo $this->_tpl_vars['affiliateVoteAlert'][$this->_sections['i']['index']]['created']; ?>

																											</span> </span>
																																																		
																											 
																											<?php if ($_SESSION['member_type'] == 'observer'): ?> 
																											<a href="index.php?stage=subscriber&mode=petitionsDetail&affID=<?php echo $this->_tpl_vars['vAffiliate']->member_id; ?>
&id=&id=<?php echo $this->_tpl_vars['affiliateVoteAlert'][$this->_sections['i']['index']]['article_id']; ?>
"
																												class="arialB13000000">
																												[read more]
																											</a> 
																											<?php else: ?> 
																											<a href="index.php?stage=subscriber&mode=AffiliatePetitionsDetailAffiliate&affID=<?php echo $this->_tpl_vars['vAffiliate']->member_id; ?>
&id=<?php echo $this->_tpl_vars['affiliateVoteAlert'][$this->_sections['i']['index']]['article_id']; ?>
"
																												class="arial12Ba60000">
																												[read more]
																											</a> 
																											<?php endif; ?>																													
																											</td>
																									</tr>
																									<?php endif; ?>
																								</table>
																								
																							</td>
																						</tr>
																					</table>
																				</td>
																			</tr>
																			<tr>
																				<td align="left" valign="top"
																					class="border_dashed"></td>
																			</tr>
																			<?php endfor; else: ?>
																			<tr>
																				<td align="left" valign="top"
																					class="border_dashed" width="100%">
																					<table width="100%">
																						<tr>
																							<td valign="top"
																								class="bg_f7f6ee"
																								align="center">No Bills and Petitions.</td>
																						</tr>
																					</table></td>
																			</tr>
																			<?php endif; ?>
																			<tr>
																				<td height="40" align="center"
																					valign="middle">
																					<!--
																					<a
																						href="index.php?stage=affiliates&mode=VoteAlerts"
																						class="arial12BUa60000">view 
																							more bills...</a>
																					<br/>		
																					-->

																					<a 	href="index.php?stage=subscriber&mode=AffiliateVoteAlerts&affID=<?php echo $this->_tpl_vars['vAffiliate']->member_id; ?>
"
																						class="arial12BUa60000">
																						view more...</a>		
																							
																							
																				</td>
																			</tr>
																			
																			
																			
																			
																			<!--
																			<tr>
																				<td height="40" align="center"
																					valign="middle"><a
																					href="index.php?stage=affiliates&mode=Petitions"
																					class="arial12BUa60000">view
																						more...</a></td>
																			</tr>
																			-->

																			<?php else: ?>
																			<tr>
																				<td valign="top" class="bg_f7f6ee"
																					align="center">Not authorized
																					to view Bills & Petitions.</td>
																			</tr>
																			<?php endif; ?>
																		</table></td>
																</tr>
															</table>									
																										
														
														
													<!---- Bills and Petitions  ----->	
														
													</td>
												</tr>
											</table></td>
									</tr>
								</table>
							</td>
						</tr>
						<tr>
							<td align="left" valign="top">&nbsp;</td>
						</tr>
						<tr>
							<td colspan="2" align="left" valign="top">
								<table width="100%" border="0" cellspacing="0"
									cellpadding="0">
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
																<!-- Sponsors -->
																	<table width="100%" border="0" cellspacing="0" cellpadding="0">
																				<tr>
																					<td width="100%" height="32" align="left" valign="middle" class="tophead_grad">
																						Sponsorship
																					</td>
																				</tr>
																				<tr>
																					<td align="left" valign="top" class="votealert_bg">
																						
																						<table width="100%" border="0" cellspacing="0" cellpadding="0">
																							
																							<?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['affiliateSponsor']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
																									<table width="100%" border="0"
																										cellspacing="0" cellpadding="0">
																										<tr>
																											<td width="47" align="center"
																												valign="top"><img
																												src="images/icon_doc.gif"
																												width="27" height="36" alt=""
																												style="margin-top: 20px" /></td>
																											<td width="367" align="left"
																												valign="top" class="bg_f7f6ee">										
																												
																												<table width="100%" border="0" cellspacing="0" cellpadding="0">
																													<tr>
																														<td height="22" align="left"
																															valign="top">
																														<?php if ($this->_tpl_vars['affiliateSponsor'][$this->_sections['i']['index']]['sponsor_url'] != ''): ?>
																															<a href="<?php echo $this->_tpl_vars['affiliateSponsor'][$this->_sections['i']['index']]['sponsor_url']; ?>
"
																																class="arialB13000000">
																														<?php else: ?>		
																															<a href="javascript:void(0);"
																																class="arialB13000000">
																														<?php endif; ?>		
																																<?php echo $this->_tpl_vars['affiliateSponsor'][$this->_sections['i']['index']]['sponsor_name']; ?>

																														</a>
																															
																														</td>
																													</tr>
																													<tr>
																														<td align="left" valign="top">

																															<?php echo $this->_tpl_vars['affiliateSponsor'][$this->_sections['i']['index']]['sponsor_description']; ?>


																														</td>
																													</tr>
																													<tr>
																														<td height="26" align="right"
																															valign="bottom">
																															<!--
																															<a
																															href="index.php?stage=affiliates&mode=BulletinsDetail&id=<?php echo $this->_tpl_vars['affiliateBulletin'][$this->_sections['i']['index']]['article_id']; ?>
"
																															class="arial12Ba60000">
																																[read more]</a>
																															-->	
																															</td>
																													</tr>
																												</table>


																											
																											</td>
																										</tr>
																									</table></td>
																							</tr>
																							<tr>
																								<td align="left" valign="top"
																									class="border_dashed"></td>
																							</tr>
																							<?php endfor; else: ?>
																							<tr>
																								<td align="left" valign="top"
																									class="border_dashed" width="100%">
																									<table width="100%">
																										<tr>
																											<td valign="top"
																												class="bg_f7f6ee"
																												align="center">No Sponsors.</td>
																										</tr>
																									</table></td>
																							</tr>
																							<?php endif; ?>
																							
																							<tr>																																																			<tr>
																								<td height="40" align="center" valign="middle">																								
																									<!--
																									<a
																									href="index.php?stage=affiliates&mode=AffiliateBulletin"
																									class="arial12BUa60000">view
																										more...</a>
																									-->	
																								</td>
																							</tr>
																						</table>
																						
																						
																			</td>
																		</tr>
																	</table>
																			
																	
																<!-- Sponsors -->																
																</td>
															</tr>
														</table></td>
												</tr>
											</table></td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
					
					
					
					
					
					<!-- second column -->	
					
					
					
					</td>
			</tr>
			<tr>
				<td align="left" valign="top" colspan="3">&nbsp;</td>
			</tr>
		</table>
	</td>
	</tr>														
														
														
														<!-- End ----------- -->		
																							
																							
																							
																							
																						</td>
																					</tr>
																				</table>
																			</td>
																		</tr>
																		<tr>
																			<td align="left" valign="top">&nbsp;</td>
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
			</tr>
		</table>
	</td>
</tr>