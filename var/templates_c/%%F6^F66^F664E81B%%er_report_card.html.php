<?php /* Smarty version 2.6.10, created on 2012-08-29 10:57:10
         compiled from electedrepresentative/ihtml/er_report_card.html */ ?>
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
				<td width="34%" valign="middle" style="padding-left: 14px;" class="topsublink_bg arial_15_000_bold">Report Card</td>
				<td width="66%" valign="middle" style="padding: 6px 14px;height:30px" class="topsublink_bg"><img src="images/trans.gif" height="30px" /></td>
			</tr>
			<tr>
				<td valign="top" align="left" style="padding: 16px 5px 11px 15px;" class="votealert_bg_new" colspan="2">
				<table width="100%" cellspacing="0" cellpadding="0" border="0">
				<?php unset($this->_sections['index']);
$this->_sections['index']['loop'] = is_array($_loop=$this->_tpl_vars['oElectoralDistrictComments']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['index']['name'] = 'index';
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
							<td align="left" valign="top"><a href="index.php?stage=billresources&mode=billCompleteDetails&billNo=<?php echo $this->_tpl_vars['oElectoralDistrictComments'][$this->_sections['index']['index']]['bill_number']; ?>
" class="arialB13000000" style="font-weight: normal;"><?php echo $this->_tpl_vars['oElectoralDistrictComments'][$this->_sections['index']['index']]['article_title']; ?>
</a></td>
						</tr>
						<tr>
							<td height="26" align="right" valign="bottom">
								<span class="arial12B000000">Support:</span>&nbsp;<span class="arial12N000000"><?php echo $this->_tpl_vars['oElectoralDistrictComments'][$this->_sections['index']['index']]['supportPercentage']; ?>
%</span>&nbsp;&nbsp;
								<span class="arial12B000000">Oppose:</span>&nbsp;<span	class="arial12N000000"><?php echo $this->_tpl_vars['oElectoralDistrictComments'][$this->_sections['index']['index']]['opposePercentage']; ?>
%</span>
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
					<td align="left" valign="top">No Record Found.</td>
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