<?php /* Smarty version 2.6.10, created on 2014-03-09 22:16:50
         compiled from billresources/ihtml/bills.html */ ?>
<td valign="top" align="left" style="padding: 24px 15px 51px 12px;" class="bg_f7f6f2">
<table width="100%" cellspacing="0" cellpadding="0" border="0">
<tbody>
<tr>
	<td class="arial_16_c40306">
	<table width="100%" cellspacing="0" cellpadding="0" border="0">
	<tbody>
	<tr>
		<td class="arial_16_c40306">
		<table width="100%" cellspacing="0"	cellpadding="0" border="0">
		<tbody>
		<tr>
			<td valign="top" align="left" class="arial_16_c40306">
			<table width="100%" cellspacing="0" cellpadding="0" border="0">
			<tbody>
	        <tr>
	        	<td valign="top" align="left" height="37" class="Trebuchet_27_c60000" >Bill Resources
				</td>
				<td valign="bottom" align="right" height="37">
					<a class="arial12Ba60000" target="_blank" href="http://www.lexisnexis.com/terms/general.aspx">State Net's Terms and conditions</a>
				</td>
			</tr>
			<tr>
	            <td valign="top" bgcolor="#b1b0ac" align="left" class="arial_20_c40306" colspan="2"><img width="1" height="1" alt="" src="images/trans.gif"></td>
            </tr>
			<tr>
				<td valign="bottom" align="left" height="37" style="padding-bottom: 5px;" class="arial_14_c30100" colspan="2">&nbsp;</td>
			</tr>
			<tr>
				<td valign="top" align="left" style="padding: 16px 5px 11px 15px;" class="votealert_bg_new" colspan="2">
				<table width="100%" cellspacing="0" cellpadding="0" border="0">																
				<?php if ($this->_tpl_vars['ViewPage']): ?>
								<?php unset($this->_sections['i']);
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['Bills']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
							<?php if ($this->_tpl_vars['BillResourcesBillDetailView']): ?>
								<a href="index.php?stage=billresources&mode=billCompleteDetails&billNo=<?php echo $this->_tpl_vars['Bills'][$this->_sections['i']['index']]['bill_number']; ?>
" class="arialB13000000">
									<?php echo $this->_tpl_vars['Bills'][$this->_sections['i']['index']]['bill_title']; ?>

								</a>&nbsp;-&nbsp;
								<a href="index.php?stage=billresources&mode=billCompleteDetails&billNo=<?php echo $this->_tpl_vars['Bills'][$this->_sections['i']['index']]['bill_number']; ?>
" class="arialB13000000">
									<?php echo $this->_tpl_vars['Bills'][$this->_sections['i']['index']]['legtype'];  echo $this->_tpl_vars['Bills'][$this->_sections['i']['index']]['bill_number']; ?>

								</a>
							<?php else: ?>
								<span class="arialB13000000">
								<?php echo $this->_tpl_vars['Bills'][$this->_sections['i']['index']]['bill_title']; ?>

									&nbsp;-&nbsp;
								<?php echo $this->_tpl_vars['Bills'][$this->_sections['i']['index']]['legtype'];  echo $this->_tpl_vars['Bills'][$this->_sections['i']['index']]['bill_number']; ?>

								</span>
							<?php endif; ?>		
							</td>
						</tr>
						<tr>
							<td align="left" valign="top">
								<?php echo $this->_tpl_vars['Bills'][$this->_sections['i']['index']]['bill_summary']; ?>
...
							</td>
						</tr>
						<tr>
							<td height="26" align="right" valign="bottom">
							<span class="arial12Ba60000" style="float: left">Dated:<span class="arial11Na60000"> <?php echo $this->_tpl_vars['Bills'][$this->_sections['i']['index']]['intro_date']; ?>
</span></span> 
								<?php if ($this->_tpl_vars['BillResourcesBillDetailView']): ?>
								<a href="index.php?stage=billresources&mode=billCompleteDetails&billNo=<?php echo $this->_tpl_vars['Bills'][$this->_sections['i']['index']]['bill_number']; ?>
" class="arial12Ba60000"> 
									[read more] 
								</a>
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
		           	<td valign="top" align="center" colspan="2">No Bill Resources.</td>
				</tr>
				<?php endif; ?>
				<?php else: ?>
				<tr>
					<td valign="top" align="center"  class="bg_f7f6ee">You are not authorized to view bill summary.</td>
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