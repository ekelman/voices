<?php /* Smarty version 2.6.10, created on 2012-11-01 12:28:34
         compiled from affiliates/ihtml/vote_alerts_detail.html */ ?>
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
				<td width="34%" valign="middle" style="padding-left: 14px;" class="topsublink_bg arial_15_000_bold">Bill Details</td>
				<td width="66%" valign="middle" style="padding: 6px 14px;" class="topsublink_bg">
				<table cellspacing="0" cellpadding="0" border="0" align="right">
				<tbody>
				<tr>
					<td width="106" align="right" valign="top">
					<a class="button" href="index.php?stage=affiliates&mode=VoteAlerts"><span>Bills List</span></a>
					</td>
				</tr>
				</tbody>
				</table>
				</td>
			</tr>
			<tr>
				<td valign="top" align="left" style="padding: 16px 5px 11px 15px;" class="votealert_bg_new" colspan="2">
				<table width="100%">
				<?php unset($this->_sections['i']);
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['affiliateVoteAlerts']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
							<img src="images/icon_doc.gif" width="27" height="36" alt="" style="margin-top: 20px" />
						</td>
						<td width="847" align="left" valign="top" class="bg_f7f6ee">
						<table width="100%" border="0" cellspacing="0" cellpadding="0">
						<tr>
							<td height="22" align="left" valign="top">
							<span class="arialB13000000" style="text-decoration:none;">
							<?php echo $this->_tpl_vars['affiliateVoteAlerts'][$this->_sections['i']['index']]['article_title']; ?>

							</span>
							&nbsp;&nbsp;
							<?php if ($this->_tpl_vars['affiliateVoteAlerts'][$this->_sections['i']['index']]['support_file'] != ''): ?>
							[<a href="./UserFiles/affiliates_doc/<?php echo $this->_tpl_vars['affiliateVoteAlerts'][$this->_sections['i']['index']]['support_file']; ?>
" target="_blank" class="arial12Ba60000">Read Attachment</a>]	 
							<?php endif; ?>
							</td>
						</tr>
						<tr>
							<td align="left" valign="top">
							<?php echo $this->_tpl_vars['affiliateVoteAlerts'][$this->_sections['i']['index']]['affiliate_comment']; ?>
</td>
						</tr>
						<tr>
							<td height="26" align="right" valign="bottom">
								<span class="arial12Ba60000" style="float: left">Dated:
									<span class="arial11Na60000"><?php echo $this->_tpl_vars['affiliateVoteAlerts'][$this->_sections['i']['index']]['created']; ?>
</span>
								</span> 
							</td>
						</tr>
						<tr>
							<td height="26" align="right" valign="bottom">
								<span  style="float: left">																									
									<?php if ($this->_tpl_vars['affiliateVoteAlerts'][$this->_sections['i']['index']]['indication_of_position'] == 'oppose'): ?>
										You have voted <b>against</b> this bill.
									<?php elseif ($this->_tpl_vars['affiliateVoteAlerts'][$this->_sections['i']['index']]['indication_of_position'] == 'support'): ?>	
										You have voted <b>in favor of</b> this bill.
									<?php endif; ?>								
								</span> 
							</td>
						</tr>
						<!-- <tr>
							<td height="26" align="left" valign="bottom">
							<?php if ($this->_tpl_vars['affiliateVoteAlerts'][$this->_sections['i']['index']]['allow_voting'] == 'yes'): ?>
							<span class="arialB13000000" style="text-decoration:none;">
								Voting Start Date:
							</span>
							&nbsp;&nbsp;	
								<?php echo $this->_tpl_vars['affiliateVoteAlerts'][$this->_sections['i']['index']]['voting_start']; ?>

							<?php endif; ?>							
							</td>
						</tr> -->
						<tr>
							<td height="26" align="left" valign="bottom">
							<?php if ($this->_tpl_vars['affiliateVoteAlerts'][$this->_sections['i']['index']]['allow_voting'] == 'yes'): ?>							
								<?php if ($this->_tpl_vars['affiliateVoteAlerts'][$this->_sections['i']['index']]['current_disposition'] != 'Pending'): ?>	
									<span class="arial12Ba60000" style="float: left">Voting results:</span>&nbsp;&nbsp;[Support - <?php echo $this->_tpl_vars['supportPercentage']; ?>
%]  [Oppose - <?php echo $this->_tpl_vars['opposePercentage']; ?>
%] 
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