<?php /* Smarty version 2.6.10, created on 2014-03-03 18:08:06
         compiled from affiliates/ihtml/affiliate_dashboard.html */ ?>
<?php echo '
<script language="javascript" src="scripts/gen_validatorv4.js"></script>

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

function delete_article(id,type)
{
	
	if (confirm("Are you sure to delete this "+ type+"?"))
	  {
		location.href=\'index.php?stage=affiliates&mode=NewsDelete&id=\'+id+\'&type=\'+type;
	  }
	
}

function delete_sponsor(id)
{
	
	if (confirm("Are you sure to delete this sponsor?"))
	  {
		location.href=\'index.php?stage=affiliates&mode=SponsorDelete&id=\'+id;
	  }
	
}
</script>

<!-- page specific styles -->
<!-- <link rel="stylesheet" type="text/css" href="/css/demo.css" /> -->
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
	
									<!-- -->

									<tr>
										<td class="bg_f7f6f2"><table width="100%" border="0"
												cellspacing="0" cellpadding="0">
												<tr>
													<td align="left" valign="top" class="arial_16_c40306">
														<table width="100%" border="0" cellspacing="0"
															cellpadding="0">

															<!-- HEADER SECTION -->
															<tr>
																<td colspan="2" align="center">
																	<table width="100%">
																		<tr>
																			<td align="left" valign="top"
																				class="Trebuchet_27_c60000">Affiliate's
																				Dashboard</td>
																			<td align="right" valign="middle">
																				<table border="0" cellspacing="0" cellpadding="0"
																					width="560">
																						<tr>
																							<td valign="top">
																								<a href="index.php?stage=affiliates&mode=MyAffiliates"
																									class="button">
																									<span>
																										My Affiliates
																									</span>
																								</a>
																							</td>
																							<td valign="top">
																								<a href="index.php?stage=affiliates&mode=AddNewSponsors"
																									class="button">
																									<span>
																										Add a sponsor
																									</span>
																								</a>
																							</td>
																			
																							<td valign="top"><a
																								href="index.php?stage=affiliates&mode=SubmitNewContent"
																								class="button"><span>Submit New
																										Content</span>
																								</a>
																							</td>

																							<td valign="top"><a
																							href="index.php?stage=affiliates&mode=AffiliateProfile">
																								<img src="images/btn_view_profile.gif"
																								 border="0" width="130" height="32"
																								 title="View Profile" />
																								</a>
																							</td>
																						
																						</tr>
																				</table>
																			</td>
																		</tr>
																	</table>
																</td>
															</tr>
															<tr>
																<td valign="top" align="left"><table width="100%"
																		cellspacing="0" cellpadding="0" border="0">
																		<tbody>
																			<tr>
																				<td valign="top" align="center" class="bg_f7f6f2"><table
																						width="100%" cellspacing="0" cellpadding="0"
																						border="0">
																						<tbody>
																							<tr>
																								<td valign="top" align="left"
																									style="padding-top: 7px;"><table
																										width="100%" cellspacing="0" cellpadding="0"
																										border="0">
																										<tbody>
																											<tr>
																												<td style="border: 2px solid #893E43;"
																													valign="top" align="left">
																													<?php if ($this->_tpl_vars['AffiliateContentPageHeaderView']): ?>
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
																													<?php endif; ?>
																												</td>
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
															<tr>
																<td class="bg_f7f6f2" valign="top" align="center">
																	<table width="100%">
																		<tr>
																			<td align="left"><span class="arial_15_000_bold"><h2
																						class="billFormHeadingabout">About Us</h2> </span></td>
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
																<td align="center" valign="top" style="padding-top: 13px" class="bg_f7f6f2">
																	<table width="100%" border="0" cellspacing="0"
																		cellpadding="0">
																		<tr>
																			<td align="center" class="error-message">
																				<?php echo $this->_tpl_vars['vMsg']; ?>

																			</td>
																		</tr>
																	</table>
																</td>
															</tr>	
																
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
																															valign="top"><a
																															href="index.php?stage=affiliates&mode=NewsDetail&id=<?php echo $this->_tpl_vars['affiliateNews'][$this->_sections['i']['index']]['article_id']; ?>
"
																															class="arialB13000000">
																																<?php echo $this->_tpl_vars['affiliateNews'][$this->_sections['i']['index']]['article_title']; ?>

																														</a>
																														<span style="padding-left:10px;">
																														<?php if ($this->_tpl_vars['AffiliateContentNewsEdit']): ?>	
																														<a
																															href="index.php?stage=affiliates&mode=NewsEdit&id=<?php echo $this->_tpl_vars['affiliateNews'][$this->_sections['i']['index']]['article_id']; ?>
"
																															class="arial12Ba60000">
																															<img src="images/icon_edit.png"  border="0" alt="Edit" title="Edit" /> </a>
																														<?php endif; ?>							
																														<?php if ($this->_tpl_vars['AffiliateContentNewsDelete']): ?>															
																																<a onclick="return delete_article(<?php echo $this->_tpl_vars['affiliateNews'][$this->_sections['i']['index']]['article_id']; ?>
,'<?php echo $this->_tpl_vars['affiliateNews'][$this->_sections['i']['index']]['article_type']; ?>
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

																															<?php echo $this->_tpl_vars['affiliateNews'][$this->_sections['i']['index']]['affiliate_comment']; ?>


																														</td>
																													</tr>
																													<tr>
																														<td height="26" align="right"
																															valign="bottom"><span
																															class="arial12Ba60000"
																															style="float: left">Dated:<span
																																class="arial11Na60000">
																																	<?php echo $this->_tpl_vars['affiliateNews'][$this->_sections['i']['index']]['created']; ?>


																															</span> </span>
																																				<a
																															href="index.php?stage=affiliates&mode=NewsDetail&id=<?php echo $this->_tpl_vars['affiliateNews'][$this->_sections['i']['index']]['article_id']; ?>
"
																															class="arial12Ba60000">
																																[read more]</a></td>
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
																								href="index.php?stage=affiliates&mode=AffiliateNews"
																								class="arial12BUa60000">view more...</a></td>
																						</tr>

																						<?php else: ?>
																						<tr>
																							<td valign="top" class="bg_f7f6ee"
																								align="center">Not authorized
																								to view articles.</td>
																						</tr>

																						<?php endif; ?>
																					</table></td>
																			</tr>
																		</table></td>
																</tr>
																	
																<!-- News   -->		
																
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
																															<a href="index.php?stage=affiliates&mode=BulletinsDetail&id=<?php echo $this->_tpl_vars['affiliateBulletin'][$this->_sections['i']['index']]['article_id']; ?>
"
																																class="arialB13000000">
																																<?php echo $this->_tpl_vars['affiliateBulletin'][$this->_sections['i']['index']]['article_title']; ?>

																															</a>
																															<span style="padding-left:10px">
																															<?php if ($this->_tpl_vars['AffiliateContentBulletinsEdit']): ?>	
																															
																																<a
																															href="index.php?stage=affiliates&mode=NewsEdit&id=<?php echo $this->_tpl_vars['affiliateBulletin'][$this->_sections['i']['index']]['article_id']; ?>
"
																															class="arial12Ba60000">
																																<img src="images/icon_edit.png"  border="0" alt="Edit" title="Edit" /> </a>	
																															<?php endif; ?>	
																															<?php if ($this->_tpl_vars['AffiliateContentBulletinsDelete']): ?>		
																																<a onclick="return delete_article(<?php echo $this->_tpl_vars['affiliateBulletin'][$this->_sections['i']['index']]['article_id']; ?>
,'<?php echo $this->_tpl_vars['affiliateBulletin'][$this->_sections['i']['index']]['article_type']; ?>
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

																															<?php echo $this->_tpl_vars['affiliateBulletin'][$this->_sections['i']['index']]['affiliate_comment']; ?>


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
																																																																											
																															
																															<a
																															href="index.php?stage=affiliates&mode=BulletinsDetail&id=<?php echo $this->_tpl_vars['affiliateBulletin'][$this->_sections['i']['index']]['article_id']; ?>
"
																															class="arial12Ba60000">
																																[read more]</a></td>
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
																							<tr>																																																			<tr>
																								<td height="40" align="center"
																									valign="middle"><a
																									href="index.php?stage=affiliates&mode=AffiliateBulletin"
																									class="arial12BUa60000">view
																										more...</a></td>
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
																
														</table></td>
												</tr>
											</table></td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
					<!-- forst column -->
				</td>
				
				<td align="left" valign="top" width="2%"><img
					src="images/trans.gif" height="1" width="10px" />
				</td>
				
				<td align="left" valign="top" width="49%">
				
					<!-- Second columns-->
					
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
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['affiliatePetitions']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
																									<?php if ($this->_tpl_vars['affiliatePetitions'][$this->_sections['i']['index']]['article_type'] == 'bill'): ?>
																										<tr>
																											<td height="22" align="left"
																												valign="top"><a
																												href="index.php?stage=affiliates&mode=VoteAlertsDetail&id=<?php echo $this->_tpl_vars['affiliatePetitions'][$this->_sections['i']['index']]['article_id']; ?>
"
																												class="arialB13000000">
																													<?php echo $this->_tpl_vars['affiliatePetitions'][$this->_sections['i']['index']]['article_title']; ?>

																													
																											</a>
																											<span style="padding-left:10px;">
																												<?php if ($this->_tpl_vars['AffiliateContentBillsEdit']): ?>
																													<a
																												href="index.php?stage=affiliates&mode=NewsEdit&id=<?php echo $this->_tpl_vars['affiliatePetitions'][$this->_sections['i']['index']]['article_id']; ?>
"
																												class="arial12Ba60000">
																													<img src="images/icon_edit.png"  border="0" alt="Edit" title="Edit" /> </a>	
																												<?php endif; ?>
																												<?php if ($this->_tpl_vars['AffiliateContentBillsDelete']): ?>
																												<a onclick="return delete_article(<?php echo $this->_tpl_vars['affiliatePetitions'][$this->_sections['i']['index']]['article_id']; ?>
)"
																												href="javascript:"
																												class="arial12Ba60000">
																													<img src="images/icon_delete.png"  border="0" alt="Delete" title="Delete" /> </a>
																												<?php endif; ?>	
																											</span>
																											
																											</td>
																										</tr>																									
																										<tr>
																											<td align="left" valign="top">

																												<?php echo $this->_tpl_vars['affiliatePetitions'][$this->_sections['i']['index']]['affiliate_comment']; ?>


																											</td>
																										</tr>
																										<tr>
																											<td height="26" align="right"
																												valign="bottom"><span
																												class="arial12Ba60000"
																												style="float: left">Dated:<span
																													class="arial11Na60000">
																														<?php echo $this->_tpl_vars['affiliatePetitions'][$this->_sections['i']['index']]['created']; ?>


																												</span> </span>
																												
																												<a
																												href="index.php?stage=affiliates&mode=VoteAlertsDetail&id=<?php echo $this->_tpl_vars['affiliatePetitions'][$this->_sections['i']['index']]['article_id']; ?>
"
																												class="arial12Ba60000">
																													[read more]</a></td>
																										</tr>
																										
																										<?php else: ?>
																										
																										<tr>
																											<td height="22" align="left"
																												valign="top"><a
																												href="index.php?stage=affiliates&mode=PetitionsDetail&id=<?php echo $this->_tpl_vars['affiliatePetitions'][$this->_sections['i']['index']]['article_id']; ?>
"
																												class="arialB13000000">
																													<?php echo $this->_tpl_vars['affiliatePetitions'][$this->_sections['i']['index']]['article_title']; ?>

																											</a>
																											<span style="padding-left:10px;">
																											<?php if ($this->_tpl_vars['AffiliateContentPetitionsEdit']): ?>
																											<a
																												href="index.php?stage=affiliates&mode=NewsEdit&id=<?php echo $this->_tpl_vars['affiliatePetitions'][$this->_sections['i']['index']]['article_id']; ?>
"
																												class="arial12Ba60000">
																													<img src="images/icon_edit.png"  border="0" alt="Edit" title="Edit" /> </a>		
																											<?php endif; ?>	
																											<?php if ($this->_tpl_vars['AffiliateContentPetitionsDelete']): ?>				
																											<a onclick="return delete_article(<?php echo $this->_tpl_vars['affiliatePetitions'][$this->_sections['i']['index']]['article_id']; ?>
,'<?php echo $this->_tpl_vars['affiliatePetitions'][$this->_sections['i']['index']]['article_type']; ?>
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

																												<?php echo $this->_tpl_vars['affiliatePetitions'][$this->_sections['i']['index']]['affiliate_comment']; ?>


																											</td>
																										</tr>
																										<tr>
																											<td height="26" align="right"
																												valign="bottom"><span
																												class="arial12Ba60000"
																												style="float: left">Dated:<span
																													class="arial11Na60000">
																														<?php echo $this->_tpl_vars['affiliatePetitions'][$this->_sections['i']['index']]['created']; ?>


																												</span> </span>
																																																			
																												<a
																												href="index.php?stage=affiliates&mode=PetitionsDetail&id=<?php echo $this->_tpl_vars['affiliatePetitions'][$this->_sections['i']['index']]['article_id']; ?>
"
																												class="arial12Ba60000">
																													[read more]</a></td>
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
	<a
																						href="index.php?stage=affiliates&mode=Petitions"
																						class="arial12BUa60000">view
																							more petitions...</a>																					
																								
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
																															<span style="padding-left:10px">
																																<a
																															href="index.php?stage=affiliates&mode=SponsorEdit&id=<?php echo $this->_tpl_vars['affiliateSponsor'][$this->_sections['i']['index']]['id']; ?>
"
																															class="arial12Ba60000">
																																<img src="images/icon_edit.png"  border="0" alt="Edit" title="Edit" /> </a>	
																															
																																<a onclick="return delete_sponsor(<?php echo $this->_tpl_vars['affiliateSponsor'][$this->_sections['i']['index']]['id']; ?>
)"
																															href="javascript:"
																															class="arial12Ba60000">
																																<img src="images/icon_delete.png"  border="0" alt="Delete" title="Delete" /></a>	
																															
																																</span>
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
																								<td height="40" align="center"
																									valign="middle">
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
					
					
					<!-- Second column -->
				</td>
			</tr>
			<tr>
				<td align="left" valign="top" colspan="3">&nbsp;</td>
			</tr>
		</table>
	</td>
</tr>														
														
														
														<!-- End ----------- -->
														
															
														</table></td>
												</tr>