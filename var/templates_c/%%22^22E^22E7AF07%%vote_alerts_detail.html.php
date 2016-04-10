<?php /* Smarty version 2.6.10, created on 2012-07-20 15:24:08
         compiled from subscriber/ihtml/vote_alerts_detail.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'html_entity_decode', 'subscriber/ihtml/vote_alerts_detail.html', 62, false),array('modifier', 'date_format', 'subscriber/ihtml/vote_alerts_detail.html', 97, false),)), $this); ?>
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
					<tr>
						<td valign="top" align="left" height="37" class="Trebuchet_27_c60000" colspan="2">
							<?php echo $this->_tpl_vars['ProfileInfo'][0]->first_name; ?>
 <?php echo $this->_tpl_vars['ProfileInfo'][0]->last_name; ?>
's Profile</td>
					</tr>
					<tr>
						<td width="34%" valign="middle" style="padding-left: 14px;" class="topsublink_bg arial_15_000_bold">Vote Alerts</td>
						<td width="66%" valign="middle" style="padding: 6px 14px;" class="topsublink_bg">
						<table cellspacing="0" cellpadding="0" border="0" align="right">
						<tbody>
						<tr>
							<td width="106" align="right" valign="top">
							<a class="button" href="index.php?stage=subscriber&mode=VoteAlerts"><span>Vote Alerts</span></a>
							</td>
							<td width="100" align="right" valign="top">
							<a href="index.php?stage=subscriber&mode=MyProfile" class="button"><span>My Profile</span></a>
							</td>
							<td width="202" align="right" valign="top">
							<a href="index.php?stage=subscriber&mode=ElectedRepresentatives" class="button"><span>Elected Representatives</span></a>
							</td>
							<td width="117" align="right" valign="top">
							<a href="index.php?stage=subscriber&mode=MyAffiliates" class="button"><span>My Affiliates</span></a>
							</td>
						</tr>
						</tbody>
						</table>
						</td>
					</tr>
					<tr>
						<td valign="top" align="left" style="padding: 16px 5px 11px 15px;" class="votealert_bg_new" colspan="2">
						<table width="100%" cellspacing="0" cellpadding="0" border="0">
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
						<tr>
							<td align="left" valign="top">
							<table width="100%" border="0" cellspacing="0" cellpadding="0">
							<tr>
								<td width="47" align="center" valign="top">
								<img src="images/icon_doc.gif" width="27" height="36" alt="" style="margin-top: 20px" /></td>
								<td width="847" align="left" valign="top" class="bg_f7f6ee">
								<table width="100%" border="0" cellspacing="0" cellpadding="0">
								<tr>
									<td height="22" align="left" valign="top">
									<span class="arialB13000000" style="text-decoration:none;">
										<?php echo ((is_array($_tmp=$this->_tpl_vars['MyAffiliateArticles'][$this->_sections['i']['index']]['article_title'])) ? $this->_run_mod_handler('html_entity_decode', true, $_tmp) : html_entity_decode($_tmp)); ?>
 
									</span>
									&nbsp;&nbsp;
									 	<?php if ($this->_tpl_vars['MyAffiliateArticles'][$this->_sections['i']['index']]['support_file'] != ''): ?>
										[<a href="./UserFiles/affiliates_doc/<?php echo $this->_tpl_vars['MyAffiliateArticles'][$this->_sections['i']['index']]['support_file']; ?>
"
											target="_blank" class="arial12Ba60000">
												Read Attachment 
											</a>]	 
										<?php endif; ?>
										&nbsp;&nbsp;
										[<a href="index.php?stage=billresources&mode=billCompleteDetails&billNo=<?php echo $this->_tpl_vars['MyAffiliateArticles'][$this->_sections['i']['index']]['bill_number']; ?>
"
											target="_blank" class="arial12Ba60000">
												Bill Resource 
											</a>] 
									</td>
								</tr>
								<tr>
									<td align="left" valign="top"><?php echo ((is_array($_tmp=$this->_tpl_vars['MyAffiliateArticles'][$this->_sections['i']['index']]['affiliate_comment'])) ? $this->_run_mod_handler('html_entity_decode', true, $_tmp) : html_entity_decode($_tmp)); ?>
</td>
								</tr>
								<tr>
									<td align="left" valign="top">&nbsp;</td>
								</tr>
								<tr>
									<td height="26" align="right" valign="bottom">
									<span class="arial12Ba60000" style="float: left">Dated:<span class="arial11Na60000"><?php echo $this->_tpl_vars['MyAffiliateArticles'][$this->_sections['i']['index']]['created']; ?>
</span></span> 																						
														<?php if ($this->_tpl_vars['voting_details'] == 'oppose'): ?>
								You have voted <strong>against</strong> this bill.
							<?php elseif ($this->_tpl_vars['voting_details'] == 'support'): ?>	
								You have voted <strong>in favor of</strong> this bill.							
							<?php else: ?>							
															<?php if ($this->_tpl_vars['affiliateContentBillsVoteOnContent']): ?>																			
																	
									<?php if ($this->_tpl_vars['MyAffiliateArticles'][$this->_sections['i']['index']]['current_disposition'] == 'Pending'): ?>
										<?php if (( $this->_tpl_vars['MyAffiliateArticles'][$this->_sections['i']['index']]['voting_start'] <= ((is_array($_tmp=time())) ? $this->_run_mod_handler('date_format', true, $_tmp, '%Y-%m-%d') : smarty_modifier_date_format($_tmp, '%Y-%m-%d')) )): ?>
											<a href='index.php?stage=member&mode=castYourVote&articleID=<?php echo $this->_tpl_vars['MyAffiliateArticles'][$this->_sections['i']['index']]['article_id']; ?>
&status=support' style="cursor: pointer">
												<img src="images/btn_i_support_this_bill.gif" alt="" style="border:none;"/></a>&nbsp;&nbsp;&nbsp;
											<a href='index.php?stage=member&mode=castYourVote&articleID=<?php echo $this->_tpl_vars['MyAffiliateArticles'][$this->_sections['i']['index']]['article_id']; ?>
&status=oppose' style="cursor: pointer"> 
												<img src="images/btn_i_oppose_this_bill.gif" alt="" style="border:none;"/>
											</a>
										<?php else: ?>
											Voting on alerts will start on <b><?php echo $this->_tpl_vars['MyAffiliateArticles'][$this->_sections['i']['index']]['voting_start']; ?>
</b>
										<?php endif; ?>
									<?php elseif ($this->_tpl_vars['MyAffiliateArticles'][$this->_sections['i']['index']]['current_disposition'] != 'Pending'): ?>																										
										Current state of bill is <?php echo $this->_tpl_vars['MyAffiliateArticles'][$this->_sections['i']['index']]['current_disposition']; ?>
 state	
									<?php endif; ?>
								<?php endif; ?>
							<?php endif; ?>
							
									</td>
								</tr>
								</table>
								</td>
							</tr>
							</table>
							</td>
						</tr>
						<?php endfor; else: ?>
						<tr>
							<td align="center" width="847" valign="top" class="bg_f7f6ee error-message">Invalid access</td>
						</tr>
						<?php endif; ?>
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
		</td>
	</tr>
	</tbody>
	</table>
	</td>
</tr>	