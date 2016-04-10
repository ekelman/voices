<?php /* Smarty version 2.6.10, created on 2013-02-22 10:43:59
         compiled from subscriber/ihtml/member_dashboard.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'html_entity_decode', 'subscriber/ihtml/member_dashboard.html', 96, false),array('modifier', 'substr', 'subscriber/ihtml/member_dashboard.html', 127, false),array('modifier', 'date_format', 'subscriber/ihtml/member_dashboard.html', 284, false),)), $this); ?>
<?php echo '
<!-- page specific scripts -->
<script type="text/javascript">
	$(function()
	{
		$("#secondaryAffiliate").change(function(){
			var value = $("#secondaryAffiliate").val();			
			if(parseInt(value) > 0)
			{				
				window.location.href = "/index.php?stage=subscriber&mode=AffiliateDetails&id="+value;
			}			
		});
	});
</script>
'; ?>

<tr>
	<td class="arial_16_c40306">
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
			<tr>
				<td align="left" valign="top" class="arial_16_c40306">
					<table width="100%" border="0" cellspacing="0" cellpadding="0">
						<tr>
							<td height="7" align="center" valign="top"></td>
						</tr>
						<tr>
							<td align="center" valign="top"
								style="padding: 16px 13px 13px 13px" class="bg_f7f6f2">
								<table width="100%" border="0" cellspacing="0" cellpadding="0">
									<tr>
										<td colspan="2" align="left" valign="top"
											class="Trebuchet_27_c60000">My Dashboard</td>
									</tr>
									<tr>
										<td width="34%" height="44" align="left" valign="middle"
											class="topsublink_bg arial_15_000_bold"
											style="padding-left: 14px"><span>Dashboard</span>
										</td>
										<td width="66%" align="right" valign="middle"
											class="topsublink_bg" style="padding-right: 12px;">
											<table border="0" cellspacing="0" cellpadding="0">
											<tr>
																				
												<?php if ($_SESSION['member_type'] == 'subscriber'): ?>													
											
												<td width="117" align="right" valign="top"><a href="index.php?stage=subscriber&mode=MyAffiliates" class="button"><span>My Affiliates</span></a></td>
												<td width="106" align="right" valign="top"><a class="button" href="index.php?stage=subscriber&mode=VoteAlerts"><span>Vote Alerts</span></a></td>								
																							
												<?php endif; ?>							
												<td width="202" align="right" valign="top"><a href="index.php?stage=subscriber&mode=ElectedRepresentatives" class="button"><span>Elected Representatives</span></a></td>
												<td width="100" align="right" valign="top"><a class="button" href="index.php?stage=subscriber&mode=MyProfile" class="button"><span> My Profile</span></a></td>																
											</tr>														
											</table>
										</td>
									</tr>
								</table> <br />
								
																
																
								<table width="100%" border="0" cellspacing="0" cellpadding="0">
									<tr>
										<td width="832" height="32" align="left" valign="middle"
											class="tophead_grad">Primary Affiliates</td>
									</tr>
									<tr>
										<td align="left" valign="top" class="votealert_bg"
											style="padding: 16px 5px 11px 15px;">
											
											
											<table width="100%" cellspacing="0" cellpadding="0"
												border="0">
												<tbody>
													<tr>
														<?php if ($this->_tpl_vars['AffiliateContentPageHeaderView']): ?>
														<td width="125" valign="top" align="left"><?php if ($this->_tpl_vars['MyAffiliates'][0]['banner'] != ""): ?> <img width="125"
															height="99" alt=""
															src="./UserFiles/affiliates_logo/<?php echo $this->_tpl_vars['MyAffiliates'][0]['banner']; ?>
" />
															<?php else: ?> <img width="125" height="99" alt=""
															src="./images/no-image.jpg" /> <?php endif; ?></td>
														<td width="20" valign="top" align="left">&nbsp;</td>
														<td width="732" valign="top" align="left"><?php else: ?>
														
														<td width="877" valign="top" align="left"><?php endif; ?>
															<table width="100%" cellspacing="0" cellpadding="0"
																border="0">
																<tbody>
																	<tr>
																		<td valign="top" align="left" height="22"><a
																			href="index.php?stage=subscriber&mode=AffiliateDetails&id=<?php echo $this->_tpl_vars['MyAffiliates'][0]['member_id']; ?>
"
																			class="arial12Ba60000"><?php echo $this->_tpl_vars['MyAffiliates'][0]['organisation_name']; ?>
</a>
																		</td>
																	</tr>
																	<tr>
																		<td valign="top" align="left" class="arial_12_000"><br />
																			<?php echo ((is_array($_tmp=$this->_tpl_vars['MyAffiliates'][0]['description'])) ? $this->_run_mod_handler('html_entity_decode', true, $_tmp) : html_entity_decode($_tmp)); ?>
</td>
																	</tr>
																</tbody>
															</table>
														</td>
													</tr>
													<tr>
														<?php if ($this->_tpl_vars['AffiliateContentPageHeaderView']): ?>
																												<td width="125" valign="top" align="left">&nbsp;</td>
														<td width="20" valign="top" align="left">&nbsp;</td>
														<td width="732" valign="top" align="left"><?php else: ?>
														
														<td width="877" valign="top" align="left"><?php endif; ?> <br /> 
														<?php if ($this->_tpl_vars['AffiliateContentNewsView']): ?> <span class="arial12Ba60000">
																Latest News </span> <br />
															<table width="100%" cellspacing="0" cellpadding="0"
																border="0">
																<tbody>
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
																		<td valign="top" height="8" align="left"></td>
																	</tr>
																	<tr>
																		<td valign="top" height="20" align="left"
																			class="bg_f7f6f2">
																			<a href="index.php?stage=subscriber&mode=NewsDetail&affID=<?php echo $this->_tpl_vars['affiliateNews'][$this->_sections['i']['index']]['affiliate_id']; ?>
&id=<?php echo $this->_tpl_vars['affiliateNews'][$this->_sections['i']['index']]['article_id']; ?>
"
																			class="arial_12_000"> 
																				<b><?php echo ((is_array($_tmp=$this->_tpl_vars['affiliateNews'][$this->_sections['i']['index']]['article_title'])) ? $this->_run_mod_handler('html_entity_decode', true, $_tmp) : html_entity_decode($_tmp)); ?>
</b>
																			</a> <br/> 
																			<span class="arial_12_000">
																			<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['affiliateNews'][$this->_sections['i']['index']]['affiliate_comment'])) ? $this->_run_mod_handler('html_entity_decode', true, $_tmp) : html_entity_decode($_tmp)))) ? $this->_run_mod_handler('substr', true, $_tmp, 0, 150) : substr($_tmp, 0, 150)); ?>
...
																				<span style="float:right;padding-right:5px;">																			
																					<a href="index.php?stage=subscriber&mode=NewsDetail&affID=<?php echo $this->_tpl_vars['affiliateNews'][$this->_sections['i']['index']]['affiliate_id']; ?>
&id=<?php echo $this->_tpl_vars['affiliateNews'][$this->_sections['i']['index']]['article_id']; ?>
"
																							class="arial12Ba60000"> 
																						[read more] 
																					</a>	
																				</span>

																			</span>
																			
																		</td>
																	</tr>
																	<?php endfor; else: ?>
																	<tr>
																		<td valign="top" height="8" align="left"></td>
																	</tr>
																	<tr>
																		<td valign="top" align="left" class="bg_f7f6f2"><span
																			class="arial_12_000"> No news found. </span>
																		</td>
																	</tr>
																	<?php endif; ?>

																</tbody>
															</table> <?php endif; ?> <br />
														</td>
													</tr>
												</tbody>
											</table>
								
										</td>
									</tr>
								</table> <br />
								
								<table width="100%" border="0" cellspacing="0" cellpadding="0">
									<tr>
										<td width="832" height="32" align="left" valign="middle"
											class="tophead_grad">Secondary Affiliates</td>
									</tr>
									<tr>
										<td align="left" valign="top" class="votealert_bg">
											<table width="100%" border="0" cellspacing="0"
												cellpadding="0">
												<?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['OtherAffiliates']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
													<td>
														<table width="100%" cellspacing="0" cellpadding="0"
															border="0">
															<tbody>
																<tr>
																	<td width="95%" valign="top" align="center">
																		<table width="95%" cellspacing="5" cellpadding="5"
																			border="0">
																			<tbody>
																				<tr>
																					<td valign="top" align="left" height="22"><a
																						href="index.php?stage=subscriber&mode=AffiliateDetails&id=<?php echo $this->_tpl_vars['OtherAffiliates'][$this->_sections['i']['index']]['member_id']; ?>
"
																						class="arial12Ba60000"><?php echo $this->_tpl_vars['OtherAffiliates'][$this->_sections['i']['index']]['organisation_name']; ?>
</a>
																					</td>
																				</tr>
																				<tr>
																					<td valign="top" align="left" class="arial_12_000">
																						<?php echo ((is_array($_tmp=$this->_tpl_vars['OtherAffiliates'][$this->_sections['i']['index']]['description'])) ? $this->_run_mod_handler('html_entity_decode', true, $_tmp) : html_entity_decode($_tmp)); ?>
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
												<tr>
													<td align="left" valign="top" class="border_dashed"></td>
												</tr>
												<?php endfor; else: ?>
												<tr>
													<td align="left" valign="top" class="border_dashed">
														<table width="100%">
															<tr>
																<td valign="top" class="bg_f7f6ee" align="center">No
																	secondary affiliates.</td>
															</tr>
														</table>
													</td>
												</tr>
												<?php endif; ?>
											</table>
										</td>
									</tr>
								</table>
								
																
								<table width="100%" border="0" cellspacing="0" cellpadding="0">
									<tr>
										<td align="left" valign="top">
											<table width="100%" border="0" cellspacing="0"	cellpadding="0">
												<tr>
													<td align="left" valign="top">&nbsp;</td>
												</tr>
												<tr>
													<td align="center" valign="top">
														<table style="width: 100%" border="0" cellspacing="0"	cellpadding="0">
															<tr>
																<td style="width:49%;" align="left" valign="top">
																	<table width="100%" border="0" cellspacing="0"	cellpadding="0">
																		<tr>
																			<td width="100%" align="left" valign="top">
																				<table width="100%" border="0" cellspacing="0"
																					cellpadding="0">
																					<tr>
																						<td width="100%" height="32" align="left"
																							valign="middle" class="tophead_grad">Alerts</td>
																					</tr>
																					<tr>
																						<td align="left" valign="top" class="votealert_bg">
																							<!-- all Petitions and bills both while viewed by observer / subscriber -->
																							<table width="100%" border="0" cellspacing="0" cellpadding="0">																							
																							<?php if ($this->_tpl_vars['AffiliateContentBillsView']): ?>																						
																								<?php unset($this->_sections['i']);
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['MyAffiliateArticles']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
																									<?php if ($this->_tpl_vars['MyAffiliateArticles'][$this->_sections['i']['index']]['article_type'] == 'bill'): ?>
																									<tr>
																										<td align="left" valign="top">
																										<table width="100%" border="0" cellspacing="0">
																										<tr>
																											<td width="47" align="center" valign="top">
																											<img src="images/icon_doc.gif" width="27" height="36" alt="" style="margin-top: 20px" />
																													</td>
																													<td width="367" align="left" valign="top"
																														class="bg_f7f6ee">
																														<table width="100%" border="0"
																															cellspacing="0" cellpadding="0">
																															<tr>
																																<td height="22" align="left" valign="top">
																																	<a	href="index.php?stage=subscriber&mode=VoteAlertsDetail&id=<?php echo $this->_tpl_vars['MyAffiliateArticles'][$this->_sections['i']['index']]['article_id']; ?>
&new=<?php echo $this->_tpl_vars['MyAffiliateArticles'][$this->_sections['i']['index']]['id']; ?>
"
																																	class="arialB13000000">
																																		<?php echo ((is_array($_tmp=$this->_tpl_vars['MyAffiliateArticles'][$this->_sections['i']['index']]['article_title'])) ? $this->_run_mod_handler('html_entity_decode', true, $_tmp) : html_entity_decode($_tmp)); ?>

																																	</a>
																																	<?php if ($this->_tpl_vars['MyAffiliateArticles'][$this->_sections['i']['index']]['is_new'] == 1): ?> 
																																	<a href="index.php?stage=subscriber&mode=VoteAlertsDetail&id=<?php echo $this->_tpl_vars['MyAffiliateArticles'][$this->_sections['i']['index']]['article_id']; ?>
&new=<?php echo $this->_tpl_vars['MyAffiliateArticles'][$this->_sections['i']['index']]['id']; ?>
"
																																	class="arialB13000000"> <img border="0"
																																		width="28" height="18" alt=""
																																		src="images/btn_new.gif"
																																		style="border: none;"> </a> 
																																	<?php endif; ?>
																																</td>
																															</tr>
																															<tr>
																																<td align="left" valign="top"><?php echo ((is_array($_tmp=$this->_tpl_vars['MyAffiliateArticles'][$this->_sections['i']['index']]['affiliate_comment'])) ? $this->_run_mod_handler('html_entity_decode', true, $_tmp) : html_entity_decode($_tmp)); ?>
</td>
																															</tr>
																															<tr>
																																<td height="26" align="right"
																																	valign="bottom"><span
																																	class="arial12Ba60000"
																																	style="float: left">Dated:<span
																																		class="arial11Na60000">
																																			<?php echo ((is_array($_tmp=$this->_tpl_vars['MyAffiliateArticles'][$this->_sections['i']['index']]['created'])) ? $this->_run_mod_handler('date_format', true, $_tmp, '%Y-%m-%d') : smarty_modifier_date_format($_tmp, '%Y-%m-%d')); ?>
</span>
																																</span><a
																																	href="index.php?stage=subscriber&mode=VoteAlertsDetail&id=<?php echo $this->_tpl_vars['MyAffiliateArticles'][$this->_sections['i']['index']]['article_id']; ?>
&new=<?php echo $this->_tpl_vars['MyAffiliateArticles'][$this->_sections['i']['index']]['id']; ?>
"
																																	class="arial12Ba60000"> [read more] </a>
																																</td>
																															</tr>
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
																									
<?php elseif ($this->_tpl_vars['MyAffiliateArticles'][$this->_sections['i']['index']]['article_type'] == 'news'): ?>
																									<tr>
																										<td align="left" valign="top">
																										<table width="100%" border="0" cellspacing="0">
																										<tr>
																											<td width="47" align="center" valign="top">
																											<img src="images/icon_doc.gif" width="27" height="36" alt="" style="margin-top: 20px" />
																													</td>
																													<td width="367" align="left" valign="top"
																														class="bg_f7f6ee">
																														<table width="100%" border="0"
																															cellspacing="0" cellpadding="0">
																															<tr>
																																<td height="22" align="left" valign="top">
																																	<a	href="index.php?stage=subscriber&mode=NewsDetail&affID=<?php echo $this->_tpl_vars['MyAffiliateArticles'][$this->_sections['i']['index']]['affiliate_id']; ?>
&id=<?php echo $this->_tpl_vars['MyAffiliateArticles'][$this->_sections['i']['index']]['article_id']; ?>
&new=<?php echo $this->_tpl_vars['MyAffiliateArticles'][$this->_sections['i']['index']]['id']; ?>
"
																																	class="arialB13000000">
																																		<?php echo ((is_array($_tmp=$this->_tpl_vars['MyAffiliateArticles'][$this->_sections['i']['index']]['article_title'])) ? $this->_run_mod_handler('html_entity_decode', true, $_tmp) : html_entity_decode($_tmp)); ?>

																																	</a>
																																	<?php if ($this->_tpl_vars['MyAffiliateArticles'][$this->_sections['i']['index']]['is_new'] == 1): ?> 
																																	<a href="index.php?stage=subscriber&mode=NewsDetail&affID=<?php echo $this->_tpl_vars['MyAffiliateArticles'][$this->_sections['i']['index']]['affiliate_id']; ?>
&id=<?php echo $this->_tpl_vars['MyAffiliateArticles'][$this->_sections['i']['index']]['article_id']; ?>
&new=<?php echo $this->_tpl_vars['MyAffiliateArticles'][$this->_sections['i']['index']]['id']; ?>
"
																																	class="arialB13000000"> <img border="0"
																																		width="28" height="18" alt=""
																																		src="images/btn_new.gif"
																																		style="border: none;"> </a> 
																																	<?php endif; ?>
																																</td>
																															</tr>
																															<tr>
																																<td align="left" valign="top"><?php echo ((is_array($_tmp=$this->_tpl_vars['MyAffiliateArticles'][$this->_sections['i']['index']]['affiliate_comment'])) ? $this->_run_mod_handler('html_entity_decode', true, $_tmp) : html_entity_decode($_tmp)); ?>
</td>
																															</tr>
																															<tr>
																																<td height="26" align="right"
																																	valign="bottom"><span
																																	class="arial12Ba60000"
																																	style="float: left">Dated:<span
																																		class="arial11Na60000">
																																			<?php echo ((is_array($_tmp=$this->_tpl_vars['MyAffiliateArticles'][$this->_sections['i']['index']]['created'])) ? $this->_run_mod_handler('date_format', true, $_tmp, '%Y-%m-%d') : smarty_modifier_date_format($_tmp, '%Y-%m-%d')); ?>
</span>
																																</span><a
																																	href="index.php?stage=subscriber&mode=NewsDetail&affID=<?php echo $this->_tpl_vars['MyAffiliateArticles'][$this->_sections['i']['index']]['affiliate_id']; ?>
&id=<?php echo $this->_tpl_vars['MyAffiliateArticles'][$this->_sections['i']['index']]['article_id']; ?>
&new=<?php echo $this->_tpl_vars['MyAffiliateArticles'][$this->_sections['i']['index']]['id']; ?>
"
																																	class="arial12Ba60000"> [read more] </a>
																																</td>
																															</tr>
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
																									
																									<?php elseif ($this->_tpl_vars['MyAffiliateArticles'][$this->_sections['i']['index']]['article_type'] == 'petition'): ?> 
																											<?php if (( $this->_tpl_vars['MyAffiliateArticles'][$this->_sections['i']['index']]['voting_end'] >= ((is_array($_tmp=time())) ? $this->_run_mod_handler('date_format', true, $_tmp, '%Y-%m-%d') : smarty_modifier_date_format($_tmp, '%Y-%m-%d')) )): ?>
																									<tr>
																										<td align="left" valign="top">
																											<table width="100%" border="0" cellspacing="0"
																												cellpadding="0">
																												<tr>
																													<td width="47" align="center" valign="top">
																														<img src="images/icon_doc.gif" width="27"
																														height="36" alt="" style="margin-top: 20px" />
																													</td>
																													<td width="367" align="left" valign="top"
																														class="bg_f7f6ee">
																														<table width="100%" border="0"
																															cellspacing="0" cellpadding="0">
																															<tr>
																																<td height="22" align="left" valign="top">
																																	<a
																																	href="index.php?stage=subscriber&mode=petitionsDetail&affID=<?php echo $this->_tpl_vars['MyAffiliateArticles'][$this->_sections['i']['index']]['affiliate_id']; ?>
&id=<?php echo $this->_tpl_vars['MyAffiliateArticles'][$this->_sections['i']['index']]['article_id']; ?>
&new=<?php echo $this->_tpl_vars['MyAffiliateArticles'][$this->_sections['i']['index']]['id']; ?>
"
																																	class="arialB13000000">
																																		<?php echo ((is_array($_tmp=$this->_tpl_vars['MyAffiliateArticles'][$this->_sections['i']['index']]['article_title'])) ? $this->_run_mod_handler('html_entity_decode', true, $_tmp) : html_entity_decode($_tmp)); ?>

																																</a>  
<?php if ($this->_tpl_vars['MyAffiliateArticles'][$this->_sections['i']['index']]['is_new'] == 1): ?> 																																
																																<a
																																	href="index.php?stage=subscriber&mode=petitionsDetail&affID=<?php echo $this->_tpl_vars['MyAffiliateArticles'][$this->_sections['i']['index']]['affiliate_id']; ?>
&id=<?php echo $this->_tpl_vars['MyAffiliateArticles'][$this->_sections['i']['index']]['article_id']; ?>
&new=<?php echo $this->_tpl_vars['MyAffiliateArticles'][$this->_sections['i']['index']]['id']; ?>
"
																																	class="arialB13000000"> <img border="0"
																																		width="28" height="18" alt=""
																																		src="images/btn_new.gif"
																																		style="border: none;"> </a> 
	<?php endif; ?>																																</td>
																															</tr>
																															<tr>
																																<td align="left" valign="top">
																																	<?php echo ((is_array($_tmp=$this->_tpl_vars['MyAffiliateArticles'][$this->_sections['i']['index']]['affiliate_comment'])) ? $this->_run_mod_handler('html_entity_decode', true, $_tmp) : html_entity_decode($_tmp)); ?>

																																</td>
																															</tr>
																															<tr>
																																<td height="26" align="right"
																																	valign="bottom"><span
																																	class="arial12Ba60000"
																																	style="float: left">Dated:<span
																																		class="arial11Na60000">
																																			<?php echo ((is_array($_tmp=$this->_tpl_vars['MyAffiliateArticles'][$this->_sections['i']['index']]['created'])) ? $this->_run_mod_handler('date_format', true, $_tmp, '%Y-%m-%d') : smarty_modifier_date_format($_tmp, '%Y-%m-%d')); ?>
</span>
																																</span> <a
																																	href="index.php?stage=subscriber&mode=petitionsDetail&affID=<?php echo $this->_tpl_vars['MyAffiliateArticles'][$this->_sections['i']['index']]['affiliate_id']; ?>
&id=<?php echo $this->_tpl_vars['MyAffiliateArticles'][$this->_sections['i']['index']]['article_id']; ?>
&new=<?php echo $this->_tpl_vars['MyAffiliateArticles'][$this->_sections['i']['index']]['id']; ?>
"
																																	class="arial12Ba60000"> [read more] </a>
																																</td>
																															</tr>
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
																											<?php endif; ?> 
																										<?php endif; ?> 
																										
																								<?php endfor; else: ?>
																								
																								<tr>
																										<td align="center" valign="top" class="bg_f7f6ee">
																											No Alerts.
																										</td>
																								</tr>
																								<?php endif; ?>
																								
																								<tr>
																									<td height="40" align="center" valign="middle">
																										<a
																										href="index.php?stage=subscriber&mode=VoteAlerts"
																										id="alert_view_more" class="arial12BUa60000">view
																											more...</a> <span style="display: none"
																										id="alertloader"> <img
																											src="images/ajax-loader.gif" /> </span></td>
																								</tr>

																							<?php else: ?>
																								<tr>
																									<td align="center" valign="top" class="bg_f7f6ee">
																										Not Authorized to view alerts.</td>
																								</tr>
																							<?php endif; ?>	
																							</table>
																							<!-- Petitions and bills both whle viewed by observer / subscriber -->
																							
																						</td>
																					</tr>
																				</table> 
																				<!-- Vote alerts -->
																				
																			</td>
																		</tr>

																		<tr>
																			<td height="35" align="left" valign="top">&nbsp;</td>
																		</tr>
																	</table>
																</td>

																<td style="width:2%" align="left" valign="top">&nbsp;</td>

																<td style="width:49%" align="left" valign="top">
																	<table width="100%" border="0" cellspacing="0" cellpadding="0">
																		<tr>
																			<td width="100%" align="left" valign="top">
																				<table width="100%" border="0" cellspacing="0" cellpadding="0">
																					<tr>
																						<td width="100%" height="32" align="left" valign="middle" class="tophead_grad">
																							Elected Representatives
																						</td>
																					</tr>

																					<tr>
																						<td align="left" valign="top" class="votealert_bg">
																							<table width="100%" border="0" cellspacing="0"
																								cellpadding="0">
																								<tr>
																									<td align="left" valign="top"
																										style="padding: 9px 11px;"><table width="100%"
																											border="0" cellspacing="0" cellpadding="0">

																											<?php unset($this->_sections['index']);
$this->_sections['index']['name'] = 'index';
$this->_sections['index']['loop'] = is_array($_loop=$this->_tpl_vars['oMember']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
?> <?php if ($this->_sections['index']['iteration'] <= 5): ?>
																											<tr>
																												<td align="left" valign="top"><table
																														width="100%" border="0" cellspacing="0"
																														cellpadding="0">
																														<tr>
																															<td width="102" align="left" valign="top">
																																<?php if ($this->_tpl_vars['oMember'][$this->_sections['index']['index']]->OfficerProfileImage != ''): ?> <img width="113" height="87"
																																class="pic_border" alt=""
																																src="<?php echo $this->_tpl_vars['profile_image_root']; ?>
/<?php echo $this->_tpl_vars['oMember'][$this->_sections['index']['index']]->OfficerProfileImage; ?>
">
																																<?php else: ?> <img width="113" height="87"
																																class="pic_border" alt=""
																																src="images/no-image.jpg"> <?php endif; ?></td>
																															<td width="10"><img
																																src="images/trans.gif" height="1"
																																width="1" /></td>
																															<td width="274" align="left" valign="top">
																																<a 
																																href="index.php?stage=subscriber&mode=ElectedrepresentativeProfile&er_id=<?php echo $this->_tpl_vars['oMember'][$this->_sections['index']['index']]->ElectedOfficialID; ?>
"
																																class="arialB13000000 lineheight">
																																	<?php echo $this->_tpl_vars['oMember'][$this->_sections['index']['index']]->First_Name; ?>

																																	<?php echo $this->_tpl_vars['oMember'][$this->_sections['index']['index']]->Last_Name; ?>
 -
																																	<?php echo $this->_tpl_vars['oMember'][$this->_sections['index']['index']]->Title; ?>
 <br />
																																	<?php echo $this->_tpl_vars['oMember'][$this->_sections['index']['index']]->Party; ?>
 </a><br />

																																<div class="arial_12_000">
																																	<table width="100%" border="0"
																																		cellpadding="0" cellspacing="2">
																																		<tr>
																																			<td>Current Term:</td>
																																			<td>
																																				<?php echo ((is_array($_tmp=$this->_tpl_vars['oMember'][$this->_sections['index']['index']]->Term_Start)) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y") : smarty_modifier_date_format($_tmp, "%Y")); ?>

																																				-
																																				<?php echo ((is_array($_tmp=$this->_tpl_vars['oMember'][$this->_sections['index']['index']]->Term_End)) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y") : smarty_modifier_date_format($_tmp, "%Y")); ?>

																																			</td>
																																		</tr>

																																		<tr>
																																			<td valign="top">Address:</td>
																																			<td valign="top"><?php if ($this->_tpl_vars['oMember'][$this->_sections['index']['index']]->PrimaryAddress2 != ''):  echo $this->_tpl_vars['oMember'][$this->_sections['index']['index']]->PrimaryAddress2; ?>
<br /><?php endif; ?>
																																				<?php echo $this->_tpl_vars['oMember'][$this->_sections['index']['index']]->PrimaryCity; ?>
,
																																				<?php echo $this->_tpl_vars['oMember'][$this->_sections['index']['index']]->PrimaryState; ?>

																																				<?php echo $this->_tpl_vars['oMember'][$this->_sections['index']['index']]->PrimaryPostalCode; ?>

																																			</td>
																																		</tr>

																																		<tr>
																																		
																																		
																																		<tr>
																																			<td>Last Updated:</td>
																																			<td>
																																				<?php echo ((is_array($_tmp=$this->_tpl_vars['oMember'][$this->_sections['index']['index']]->LastUpdateDate)) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y-%m-%d") : smarty_modifier_date_format($_tmp, "%Y-%m-%d")); ?>

																																			</td>
																																		</tr>
																																	</table>
																																	<br />
																																</div> <br />
																															</td>
																														</tr>
																													</table>
																												</td>
																											</tr>
																											<tr>
																												<td height="8" align="left" valign="top"></td>
																											</tr>
																											<?php endif; ?> <?php endfor; else: ?>

																											<tr class="bg_f7f6ee_new">
																												<td align="center" valign="middle"
																													class="bg_f7f6ee"><br /> No Elected
																													Representative data available. <br />
																												</td>
																											</tr>
																											<?php endif; ?>
																										</table>
																									</td>
																								</tr>
																								<tr>
																									<td align="left" valign="top"
																										class="border_dashed"></td>
																								</tr>

																								<tr align="center" valign="middle">
																									<td height="40"><a
																										href="index.php?stage=subscriber&mode=ElectedRepresentatives"
																										class="arial12BUa60000">view more...</a>
																									</td>
																								</tr>
																							</table>
																						</td>
																					</tr>
																				</table>
																			</td>
																		</tr>
																		<tr>
																			<td height="35" align="left" valign="top">&nbsp;</td>
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
						<tr>
							<td align="left" valign="top">&nbsp;</td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
	</td>
</tr>