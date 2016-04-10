<?php /* Smarty version 2.6.10, created on 2014-03-09 22:16:51
         compiled from electedrepresentative/ihtml/elected_representatives.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'electedrepresentative/ihtml/elected_representatives.html', 45, false),)), $this); ?>
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
	        	<td valign="top" align="left" height="37" class="Trebuchet_27_c60000" colspan="2">Elected Representatives</td>
			</tr>
			<tr>
	            <td valign="top" bgcolor="#b1b0ac" align="left" class="arial_20_c40306" colspan="2"><img width="1" height="1" alt="" src="images/trans.gif"></td>
            </tr>
			<tr>
				<td valign="bottom" align="left" height="37" style="padding-bottom: 5px;" class="arial_14_c30100" colspan="2">&nbsp;</td>
			</tr>
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
?>
            <tr>
            	<td valign="top" align="left" style="padding: 16px 5px 11px 15px;" class="votealert_bg_new" colspan="2">
				<table width="100%" cellspacing="0" cellpadding="0" border="0">
                <tbody>
                <tr>
                	<td width="125" valign="top" align="left">
						<?php if ($this->_tpl_vars['oMember'][$this->_sections['index']['index']]->OfficerProfileImage != ''): ?>
						<img width="113" height="87" class="pic_border" alt="" src="<?php echo $this->_tpl_vars['oMember'][$this->_sections['index']['index']]->OfficerProfileImage; ?>
">
						<?php else: ?>
						<img width="113" height="87" class="pic_border" alt="" src="images/no-image.jpg">
						<?php endif; ?>

					</td>
                    <td width="20" valign="top" align="left">&nbsp;</td>
                    <td width="732" valign="top" align="left">
                    <table width="100%" cellspacing="0" cellpadding="0" border="0">
                    <tbody>
                    <tr>
                    	<td valign="top" align="left" height="22" width="75%"><span class="arial12Ba60000"><?php echo $this->_tpl_vars['oMember'][$this->_sections['index']['index']]->First_Name; ?>
 <?php echo $this->_tpl_vars['oMember'][$this->_sections['index']['index']]->Last_Name; ?>
 - <?php echo $this->_tpl_vars['oMember'][$this->_sections['index']['index']]->Title; ?>
</span><br /><span class="arial11Na60000"> <?php echo $this->_tpl_vars['oMember'][$this->_sections['index']['index']]->Party; ?>
</span></td>
						<td valign="top" align="left" height="22" width="25%"><span class="arial12B000000">Current Term:</span> <span class="arial11N000000"><?php echo ((is_array($_tmp=$this->_tpl_vars['oMember'][$this->_sections['index']['index']]->Term_Start)) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y") : smarty_modifier_date_format($_tmp, "%Y")); ?>
 - <?php echo ((is_array($_tmp=$this->_tpl_vars['oMember'][$this->_sections['index']['index']]->Term_End)) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y") : smarty_modifier_date_format($_tmp, "%Y")); ?>
</span></td>
                    </tr>
					<tr>
						<td valign="top" align="left" height="22" colspan="2"></td>
					</tr>
					<tr>
						<td valign="top" align="left" class="arial_12_000" colspan="2"><span class="arial12B000000">Address:</span><span class="arial11N000000"> <?php echo $this->_tpl_vars['oMember'][$this->_sections['index']['index']]->PrimaryAddress2; ?>
<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $this->_tpl_vars['oMember'][$this->_sections['index']['index']]->PrimaryCity; ?>
, <?php echo $this->_tpl_vars['oMember'][$this->_sections['index']['index']]->PrimaryState; ?>
 <?php echo $this->_tpl_vars['oMember'][$this->_sections['index']['index']]->PrimaryPostalCode; ?>
</span></td>
					</tr>
					<tr>
						<td valign="bottom" align="left" height="26"colspan="2"><span class="arial12B000000">Last Updated:</span><span class="arial11N000000"> <?php echo ((is_array($_tmp=$this->_tpl_vars['oMember'][$this->_sections['index']['index']]->LastUpdateDate)) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y-%m-%d") : smarty_modifier_date_format($_tmp, "%Y-%m-%d")); ?>
</span></td>
					</tr>
					</tbody>
					</table>
					</td>
				</tr>
				</tbody>
				</table>
				</td>
			</tr>
			<?php endfor; else: ?>
			<tr>
	           	<td valign="top" align="center" style="padding: 16px 5px 11px 15px;" class="votealert_bg_new" colspan="2">No Elected official.</td>
			</tr>
			<?php endif; ?>
			<tr>
	           	<td valign="top" align="left" class="border_dashed" colspan="2"></td>
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