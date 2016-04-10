<?php /* Smarty version 2.6.10, created on 2014-03-09 22:57:22
         compiled from admin/ihtml/left.html */ ?>
<br>
<table class="adminleft" width="100%" cellpadding="4" cellspacing="0" border="0">
	<?php $_from = $this->_tpl_vars['Menu']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['left_menu'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['left_menu']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['count'] => $this->_tpl_vars['admin_menu']):
        $this->_foreach['left_menu']['iteration']++;
?>
		<tr class="lefhead">
			<td width="20" align="right"><?php echo $this->_foreach['left_menu']['iteration']; ?>
</td>
			<td align=left><?php echo $this->_tpl_vars['admin_menu']['Title']; ?>
</td>
		</tr>
		<?php unset($this->_sections['left_link']);
$this->_sections['left_link']['name'] = 'left_link';
$this->_sections['left_link']['loop'] = is_array($_loop=$this->_tpl_vars['admin_menu']['Link']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['left_link']['show'] = true;
$this->_sections['left_link']['max'] = $this->_sections['left_link']['loop'];
$this->_sections['left_link']['step'] = 1;
$this->_sections['left_link']['start'] = $this->_sections['left_link']['step'] > 0 ? 0 : $this->_sections['left_link']['loop']-1;
if ($this->_sections['left_link']['show']) {
    $this->_sections['left_link']['total'] = $this->_sections['left_link']['loop'];
    if ($this->_sections['left_link']['total'] == 0)
        $this->_sections['left_link']['show'] = false;
} else
    $this->_sections['left_link']['total'] = 0;
if ($this->_sections['left_link']['show']):

            for ($this->_sections['left_link']['index'] = $this->_sections['left_link']['start'], $this->_sections['left_link']['iteration'] = 1;
                 $this->_sections['left_link']['iteration'] <= $this->_sections['left_link']['total'];
                 $this->_sections['left_link']['index'] += $this->_sections['left_link']['step'], $this->_sections['left_link']['iteration']++):
$this->_sections['left_link']['rownum'] = $this->_sections['left_link']['iteration'];
$this->_sections['left_link']['index_prev'] = $this->_sections['left_link']['index'] - $this->_sections['left_link']['step'];
$this->_sections['left_link']['index_next'] = $this->_sections['left_link']['index'] + $this->_sections['left_link']['step'];
$this->_sections['left_link']['first']      = ($this->_sections['left_link']['iteration'] == 1);
$this->_sections['left_link']['last']       = ($this->_sections['left_link']['iteration'] == $this->_sections['left_link']['total']);
?>
			<tr>
				<td align="right"><?php echo $this->_foreach['left_menu']['iteration']; ?>
.<?php echo $this->_sections['left_link']['iteration']; ?>
</td>
				<td class="leftext" align='left'><a class="arial13n000000" href="<?php echo $this->_tpl_vars['admin_menu']['Target'][$this->_sections['left_link']['index']]; ?>
" onClick="<?php echo $this->_tpl_vars['admin_menu']['Script'][$this->_sections['left_link']['index']]; ?>
" ><?php echo $this->_tpl_vars['admin_menu']['Link'][$this->_sections['left_link']['index']]; ?>
</a></td>
			</tr>
		<?php endfor; endif; ?>
	<?php endforeach; endif; unset($_from); ?>
</table>