<?php /* Smarty version 2.6.10, created on 2014-03-09 22:57:22
         compiled from system/ihtml/grid_admin.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'getfixquery', 'system/ihtml/grid_admin.html', 127, false),array('function', 'pager', 'system/ihtml/grid_admin.html', 143, false),array('function', 'math', 'system/ihtml/grid_admin.html', 180, false),array('function', 'cycle', 'system/ihtml/grid_admin.html', 201, false),array('function', 'getfloatquery', 'system/ihtml/grid_admin.html', 236, false),array('modifier', 'default', 'system/ihtml/grid_admin.html', 143, false),array('modifier', 'truncate', 'system/ihtml/grid_admin.html', 218, false),array('modifier', 'html_entity_decode', 'system/ihtml/grid_admin.html', 218, false),array('modifier', 'stripslashes', 'system/ihtml/grid_admin.html', 218, false),array('modifier', 'date_format', 'system/ihtml/grid_admin.html', 229, false),array('modifier', 'wordwrap', 'system/ihtml/grid_admin.html', 291, false),)), $this); ?>
<script language="javascript">
	bConfirm = new Array();
<?php unset($this->_sections['vopr']);
$this->_sections['vopr']['loop'] = is_array($_loop=$this->_tpl_vars['Grid']->SVerticalOperation['Text']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['vopr']['name'] = 'vopr';
$this->_sections['vopr']['show'] = true;
$this->_sections['vopr']['max'] = $this->_sections['vopr']['loop'];
$this->_sections['vopr']['step'] = 1;
$this->_sections['vopr']['start'] = $this->_sections['vopr']['step'] > 0 ? 0 : $this->_sections['vopr']['loop']-1;
if ($this->_sections['vopr']['show']) {
    $this->_sections['vopr']['total'] = $this->_sections['vopr']['loop'];
    if ($this->_sections['vopr']['total'] == 0)
        $this->_sections['vopr']['show'] = false;
} else
    $this->_sections['vopr']['total'] = 0;
if ($this->_sections['vopr']['show']):

            for ($this->_sections['vopr']['index'] = $this->_sections['vopr']['start'], $this->_sections['vopr']['iteration'] = 1;
                 $this->_sections['vopr']['iteration'] <= $this->_sections['vopr']['total'];
                 $this->_sections['vopr']['index'] += $this->_sections['vopr']['step'], $this->_sections['vopr']['iteration']++):
$this->_sections['vopr']['rownum'] = $this->_sections['vopr']['iteration'];
$this->_sections['vopr']['index_prev'] = $this->_sections['vopr']['index'] - $this->_sections['vopr']['step'];
$this->_sections['vopr']['index_next'] = $this->_sections['vopr']['index'] + $this->_sections['vopr']['step'];
$this->_sections['vopr']['first']      = ($this->_sections['vopr']['iteration'] == 1);
$this->_sections['vopr']['last']       = ($this->_sections['vopr']['iteration'] == $this->_sections['vopr']['total']);
?>
	bConfirm["<?php echo $this->_tpl_vars['Grid']->SVerticalOperation['Operation'][$this->_sections['vopr']['index']]; ?>
"] = <?php echo $this->_tpl_vars['Grid']->SVerticalOperation['Confirm'][$this->_sections['vopr']['index']]; ?>
;
<?php endfor; endif;  echo '
 	function validateGridForm(frm){
		flag =false;
		if("" == frm.op_mode.value)
		{
			alert("Please select an option to proceed.");
//			frm.mode.focus();
			return false;
		}

		for(i=0;i<frm.elements.length;i++)
		{
			if(frm.elements[i].type=="checkbox" && frm.elements[i].name=="identity[]" && true == frm.elements[i].checked){
				flag = true;
				break;
			}
		}

		if(false == flag){
			//alert("Please check at least one record to proceed.");

			if(frm.op_mode.options[frm.op_mode.selectedIndex].text == "Move To Trash"){
				alert("Please select at least one record to delete.");
			}
			else{
				alert("Please select at least one record to " + frm.op_mode.options[frm.op_mode.selectedIndex].text + ".");
			}
			return false;
		}

		if(bConfirm[frm.mode.value] == true){
			return ConfirmOperation(frm);
		}
		return true;
	}

	function validateVerticalOperation(){
		//document.FGrid.firstpreviousmode.value=document.FGrid.previousmode.value;
		document.FGrid.mode.value=document.FGrid.op_mode.value;
		
		
		if(validateGridForm(document.FGrid))
		{

			document.FGrid.submit();
		}
		else
		return false;
	}

	function Sort(sortby, sortdirection){
		document.FGrid.sort.value = sortby;
		document.FGrid.direction.value = sortdirection;
		document.FGrid.submit();
	}

	function toggleSelect(){
		for(i=0;i<document.FGrid.elements.length;i++){
			if(document.FGrid.elements[i].type=="checkbox" && document.FGrid.elements[i].name=="identity[]"){
				document.FGrid.elements[i].checked=document.FGrid._select_all.checked;
			}
		}
	}
	function ConfirmOperation(frm){
		//document.guideform.guidelinks.options[document.guideform.guidelinks.selectedIndex].value
		if(true == frm._select_all.checked){
			return confirm("You are about to "+frm.op_mode.options[frm.op_mode.selectedIndex].text + " all selected records?");
		}
		flag =false;
		for(i=0;i<frm.elements.length;i++)
		{
			if(frm.elements[i].type=="checkbox" && frm.elements[i].name=="identity[]" && true == frm.elements[i].checked)
			{
				flag = true;
				break;
			}
		}

		if(true == flag){
			if(frm.op_mode.options[frm.op_mode.selectedIndex].text == "Move To Trash"){
				return confirm("Are you sure you want to delete the item(s)?");
			}
			else{
				return confirm("Are you sure you want to " + frm.op_mode.options[frm.op_mode.selectedIndex].text + " the item(s)?");
			}
		}

		return false;
	}	
	function checkSubscription(id)
	{
		ans1 = confirm("Are you sure to enable life time subscription for the member?");
		if(ans1)
		{
			for(cnt=0;cnt<document.links.length;cnt++)
			{
				if(document.links[cnt].innerText == "Subscribe")
				{
					document.links[cnt].href = "index.php?stage=member&mode=lifeTimeSubscribe&id="+id;
					//break;
				}
			}
		}
	}
'; ?>

</script>
<table width="100%" border=0 >
<?php if (isset ( $this->_tpl_vars['CustomForm'] ) && $this->_tpl_vars['CustomForm'] == ""): ?>
	<!-- <tr><th colspan="2"   class="arial11r000000"><b><?php echo $this->_tpl_vars['Grid']->sTitle; ?>
</b></th></tr>
	<tr><td colspan="2" class="arial11r000000"><?php echo $this->_tpl_vars['Grid']->sDescription; ?>
</td></tr> -->
<?php endif; ?>
<tr><th colspan="2"   class="arial11r000000"><b><?php echo $this->_tpl_vars['Grid']->sTitle; ?>
</b></th></tr>
	<tr><td colspan="2" class="arial11r000000"><?php echo $this->_tpl_vars['Grid']->sDescription; ?>
</td></tr>
	<tr><td colspan="2"  class="arial11r000000"><?php echo $this->_tpl_vars['CustomForm']; ?>
</td></tr>
	<!-- Top Operation -->
	<tr>
		<!-- Custom Operation -->
		<td id="mainmenu">
			<table cellpadding="0" border="0" width='100%' align='center'>
			<tr>
			<?php unset($this->_sections['i']);
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['Grid']->OCustomOperation) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
				<td align="left"><a href="<?php echo $this->_tpl_vars['Grid']->OCustomOperation[$this->_sections['i']['index']]->vProperty['Link']; ?>
?<?php echo smarty_function_getfixquery(array('input' => $this->_tpl_vars['Grid']->OCustomOperation[$this->_sections['i']['index']]->vProperty['FixedQueryString']), $this);?>
pages_for=<?php echo $this->_tpl_vars['Grid']->OCustomOperation[$this->_sections['i']['index']]->vProperty['pages_for']; ?>
&emails_for=<?php echo $this->_tpl_vars['Grid']->OCustomOperation[$this->_sections['i']['index']]->vProperty['emails_for']; ?>
&moduleshelp_column=<?php echo $this->_tpl_vars['Grid']->OCustomOperation[$this->_sections['i']['index']]->vProperty['moduleshelp_column']; ?>
&action=<?php echo $this->_tpl_vars['Grid']->OCustomOperation[$this->_sections['i']['index']]->vProperty['action']; ?>
&serviceId=<?php echo $this->_tpl_vars['Grid']->OCustomOperation[$this->_sections['i']['index']]->vProperty['serviceId']; ?>
">
				
				<?php if ($this->_tpl_vars['Grid']->OCustomOperation[$this->_sections['i']['index']]->iType & 64): ?>
					<img class="tool" alt='add' src="<?php echo $this->_tpl_vars['Grid']->OCustomOperation[$this->_sections['i']['index']]->vProperty['Image']; ?>
" border="0" title="<?php echo $this->_tpl_vars['Grid']->OCustomOperation[$this->_sections['i']['index']]->vProperty['Text']; ?>
" align="right">
				<?php endif; ?>
				<?php if ($this->_tpl_vars['Grid']->OCustomOperation[$this->_sections['i']['index']]->iType & 8): ?>
					<?php echo $this->_tpl_vars['Grid']->OCustomOperation[$this->_sections['i']['index']]->vProperty['Text']; ?>

				<?php endif; ?>
				</a></td>
			<?php endfor; endif; ?>
			</tr>
			</table>
		</td>
		<!-- /Custom Operation -->
		<!-- Pager -->
		<td align="right" class="arial11r000000">
			<?php echo smarty_function_pager(array('rowcount' => ((is_array($_tmp=@$this->_tpl_vars['Grid']->vPage['TotalPages'])) ? $this->_run_mod_handler('default', true, $_tmp, 1) : smarty_modifier_default($_tmp, 1)),'txt_first' => $this->_tpl_vars['L_MORE'],'limit' => 1,'forwardvars' => "stage,mode,member_id,id,sort,direction,folder,payment_method_id,from_date,to_date,status_id,search_text,search_field",'searchvars' => ($this->_tpl_vars['oSearchstr'])), $this);?>

			</td>
		<!-- /Pager -->
	</tr>
	<!-- /Top Operation -->
	
	<form name="FGrid" method="post" action="index.php?" onSubmit="return validateVerticalOperation()" style='margin:0'>
	<?php if (isset ( $this->_tpl_vars['searchArray'] )): ?>
		<?php $_from = $this->_tpl_vars['searchArray']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['searchitem']):
?>
					<input type="hidden" name="<?php echo $this->_tpl_vars['key']; ?>
" value="<?php echo $this->_tpl_vars['searchitem']; ?>
">
		<?php endforeach; endif; unset($_from); ?>			
	<?php endif; ?>
	<tr>
		<!-- Grid Code -->
		<?php if ($this->_tpl_vars['Grid']->sStage == 'mail' && $this->_tpl_vars['displayLeftLinks'] == 'yes'): ?>
			<td valign=top width=100>

				<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "mail/ihtml/left_links.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
			</td>
			<td valign=top>
		<?php else: ?>
			<td colspan="2">
		<?php endif; ?>
			<table bgcolor="#FFFFFF" cellpadding="5" cellspacing="1" width="100%" align='center'>
				<tbody style="background-color:#FFFFFF">
				<!-- Header -->
				<tr bgcolor="#ccc" style="font-weight:bold">
				<?php if ($this->_tpl_vars['Grid']->bShowCheckBoxes == true): ?> 					<th width="60" bgcolor="#ccc" align="center"><input type="checkbox" name="_select_all" onClick="toggleSelect()" style="border:none;"></th>
				<?php endif; ?>
				<?php if ($this->_tpl_vars['bShowSNo'] == true): ?>
					<th width="80" bgcolor="#ccc" align="center" class="arial11rFFFFFF">S.No</th>
				<?php endif; ?>
				<?php unset($this->_sections['i']);
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['Grid']->oHeadRow) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
				
					<th align="left" class="arial11bFFFFFF" >
					<?php if ($this->_tpl_vars['Grid']->oHeadRow[$this->_sections['i']['index']]->vProperty['Sort'] == true): ?>
						<a class="arial11buFFFFFF" href="javascript:Sort('<?php echo $this->_tpl_vars['Grid']->oDataRow[$this->_sections['i']['index']]->vProperty['Col']; ?>
',<?php echo smarty_function_math(array('equation' => '(x+1)%2','x' => ((is_array($_tmp=@$_REQUEST['direction'])) ? $this->_run_mod_handler('default', true, $_tmp, 0) : smarty_modifier_default($_tmp, 0))), $this);?>
)">
					<?php endif; ?>
					<?php if ($this->_tpl_vars['Grid']->oHeadRow[$this->_sections['i']['index']]->iType & 4): ?>
						<?php echo $this->_tpl_vars['Grid']->oHeadRow[$this->_sections['i']['index']]->vProperty['Text']; ?>

					<?php endif; ?>
					<?php if ($this->_tpl_vars['Grid']->oHeadRow[$this->_sections['i']['index']]->iType & 8192): ?>
						<?php echo $this->_tpl_vars['Grid']->oHeadRow[$this->_sections['i']['index']]->vProperty['Text']; ?>

					<?php endif; ?>
					<?php if ($this->_tpl_vars['Grid']->oHeadRow[$this->_sections['i']['index']]->vProperty['Sort'] == true): ?>
						</a>
						<?php if ($_REQUEST['sort'] == $this->_tpl_vars['Grid']->oDataRow[$this->_sections['i']['index']]->vProperty['Col']): ?>
							<img src="<?php echo $this->_tpl_vars['_CONF']['ImageUrl']; ?>
icons/<?php echo $_REQUEST['direction']; ?>
.png">
						<?php endif; ?>
					<?php endif; ?>
					</th>
				<?php endfor; endif; ?>
				</tr>
				<!-- /Header -->
				<!-- Data-->
				<?php $this->assign('row_id', $this->_tpl_vars['Grid']->sIdentifier); ?>
				<?php unset($this->_sections['j']);
$this->_sections['j']['loop'] = is_array($_loop=$this->_tpl_vars['Grid']->oData) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['j']['name'] = 'j';
$this->_sections['j']['show'] = true;
$this->_sections['j']['max'] = $this->_sections['j']['loop'];
$this->_sections['j']['step'] = 1;
$this->_sections['j']['start'] = $this->_sections['j']['step'] > 0 ? 0 : $this->_sections['j']['loop']-1;
if ($this->_sections['j']['show']) {
    $this->_sections['j']['total'] = $this->_sections['j']['loop'];
    if ($this->_sections['j']['total'] == 0)
        $this->_sections['j']['show'] = false;
} else
    $this->_sections['j']['total'] = 0;
if ($this->_sections['j']['show']):

            for ($this->_sections['j']['index'] = $this->_sections['j']['start'], $this->_sections['j']['iteration'] = 1;
                 $this->_sections['j']['iteration'] <= $this->_sections['j']['total'];
                 $this->_sections['j']['index'] += $this->_sections['j']['step'], $this->_sections['j']['iteration']++):
$this->_sections['j']['rownum'] = $this->_sections['j']['iteration'];
$this->_sections['j']['index_prev'] = $this->_sections['j']['index'] - $this->_sections['j']['step'];
$this->_sections['j']['index_next'] = $this->_sections['j']['index'] + $this->_sections['j']['step'];
$this->_sections['j']['first']      = ($this->_sections['j']['iteration'] == 1);
$this->_sections['j']['last']       = ($this->_sections['j']['iteration'] == $this->_sections['j']['total']);
?>
					<tr class="<?php echo smarty_function_cycle(array('values' => 'even,odd'), $this);?>
">
					<?php if ($this->_tpl_vars['Grid']->bShowCheckBoxes == true): ?> 						<td align="center"><input type="checkbox" name="identity[]" value="<?php echo $this->_tpl_vars['Grid']->oData[$this->_sections['j']['index']]->{(($_var=$this->_tpl_vars['row_id']) && substr($_var,0,2)!='__') ? $_var : $this->trigger_error("cannot access property \"$_var\"")}; ?>
" style="border:none;"></td>
					<?php endif; ?>
					<?php if ($this->_tpl_vars['bShowSNo'] == true): ?>
						<td align="center"  class="verdana0ru000000"><?php echo $this->_sections['j']['iteration']; ?>
</td>
					<?php endif; ?>
					<?php unset($this->_sections['k']);
$this->_sections['k']['loop'] = is_array($_loop=$this->_tpl_vars['Grid']->oDataRow) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['k']['name'] = 'k';
$this->_sections['k']['show'] = true;
$this->_sections['k']['max'] = $this->_sections['k']['loop'];
$this->_sections['k']['step'] = 1;
$this->_sections['k']['start'] = $this->_sections['k']['step'] > 0 ? 0 : $this->_sections['k']['loop']-1;
if ($this->_sections['k']['show']) {
    $this->_sections['k']['total'] = $this->_sections['k']['loop'];
    if ($this->_sections['k']['total'] == 0)
        $this->_sections['k']['show'] = false;
} else
    $this->_sections['k']['total'] = 0;
if ($this->_sections['k']['show']):

            for ($this->_sections['k']['index'] = $this->_sections['k']['start'], $this->_sections['k']['iteration'] = 1;
                 $this->_sections['k']['iteration'] <= $this->_sections['k']['total'];
                 $this->_sections['k']['index'] += $this->_sections['k']['step'], $this->_sections['k']['iteration']++):
$this->_sections['k']['rownum'] = $this->_sections['k']['iteration'];
$this->_sections['k']['index_prev'] = $this->_sections['k']['index'] - $this->_sections['k']['step'];
$this->_sections['k']['index_next'] = $this->_sections['k']['index'] + $this->_sections['k']['step'];
$this->_sections['k']['first']      = ($this->_sections['k']['iteration'] == 1);
$this->_sections['k']['last']       = ($this->_sections['k']['iteration'] == $this->_sections['k']['total']);
?>
						<?php $this->assign('col', $this->_tpl_vars['Grid']->oDataRow[$this->_sections['k']['index']]->vProperty['Col']); ?>
						<?php if ($this->_tpl_vars['Grid']->oDataRow[$this->_sections['k']['index']]->iType & 1): ?>
						<?php if ($this->_tpl_vars['Grid']->oData[$this->_sections['j']['index']]->{(($_var=$this->_tpl_vars['col']) && substr($_var,0,2)!='__') ? $_var : $this->trigger_error("cannot access property \"$_var\"")} == 'y'): ?>
						<td>Active</td>
						<?php elseif ($this->_tpl_vars['Grid']->oData[$this->_sections['j']['index']]->{(($_var=$this->_tpl_vars['col']) && substr($_var,0,2)!='__') ? $_var : $this->trigger_error("cannot access property \"$_var\"")} == 'n'): ?>
						<td>Deactive</td>
						<?php elseif ($this->_tpl_vars['Grid']->oData[$this->_sections['j']['index']]->{(($_var=$this->_tpl_vars['col']) && substr($_var,0,2)!='__') ? $_var : $this->trigger_error("cannot access property \"$_var\"")} == 'd'): ?>
						<td>Deleted</td>
						<?php else: ?>
							<td><?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['Grid']->oData[$this->_sections['j']['index']]->{(($_var=$this->_tpl_vars['col']) && substr($_var,0,2)!='__') ? $_var : $this->trigger_error("cannot access property \"$_var\"")})) ? $this->_run_mod_handler('truncate', true, $_tmp, 100, "...", true) : smarty_modifier_truncate($_tmp, 100, "...", true)))) ? $this->_run_mod_handler('html_entity_decode', true, $_tmp) : html_entity_decode($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
</td>
						<?php endif; ?>
						<?php endif; ?>
						
						<?php if ($this->_tpl_vars['Grid']->oDataRow[$this->_sections['k']['index']]->iType & 262144): ?>
						<td>$&nbsp;<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['Grid']->oData[$this->_sections['j']['index']]->{(($_var=$this->_tpl_vars['col']) && substr($_var,0,2)!='__') ? $_var : $this->trigger_error("cannot access property \"$_var\"")})) ? $this->_run_mod_handler('truncate', true, $_tmp, 100, "...", true) : smarty_modifier_truncate($_tmp, 100, "...", true)))) ? $this->_run_mod_handler('html_entity_decode', true, $_tmp) : html_entity_decode($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
</td>
						<?php endif; ?>
						
						
						
						<?php if ($this->_tpl_vars['Grid']->oDataRow[$this->_sections['k']['index']]->iType & 4096): ?>
							<td  class="verdana0ru000000"><?php echo ((is_array($_tmp=$this->_tpl_vars['Grid']->oData[$this->_sections['j']['index']]->{(($_var=$this->_tpl_vars['col']) && substr($_var,0,2)!='__') ? $_var : $this->trigger_error("cannot access property \"$_var\"")})) ? $this->_run_mod_handler('date_format', true, $_tmp, $this->_tpl_vars['DATE_FORMAT']) : smarty_modifier_date_format($_tmp, $this->_tpl_vars['DATE_FORMAT'])); ?>
</td>
						<?php endif; ?>
						<?php if ($this->_tpl_vars['Grid']->oDataRow[$this->_sections['k']['index']]->iType & 131072): ?>
							<td  class="verdana0ru000000"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['Grid']->oData[$this->_sections['j']['index']]->{(($_var=$this->_tpl_vars['col']) && substr($_var,0,2)!='__') ? $_var : $this->trigger_error("cannot access property \"$_var\"")})) ? $this->_run_mod_handler('date_format', true, $_tmp, '%Y/%m/%e') : smarty_modifier_date_format($_tmp, '%Y/%m/%e')))) ? $this->_run_mod_handler('default', true, $_tmp, '') : smarty_modifier_default($_tmp, '')); ?>
</td>
						<?php endif; ?>

						<?php if ($this->_tpl_vars['Grid']->oDataRow[$this->_sections['k']['index']]->iType & 8): ?>
							<td align="left"  class="verdana0ru000000"><a href="<?php echo $this->_tpl_vars['Grid']->oDataRow[$this->_sections['k']['index']]->vProperty['Link']; ?>
?<?php echo smarty_function_getfixquery(array('input' => $this->_tpl_vars['Grid']->oDataRow[$this->_sections['k']['index']]->vProperty['FixedQueryString']), $this); echo smarty_function_getfloatquery(array('input' => $this->_tpl_vars['Grid']->oDataRow[$this->_sections['k']['index']]->vProperty['FloatingQueryString'],'data' => $this->_tpl_vars['Grid']->oData[$this->_sections['j']['index']]), $this);?>
"><?php echo $this->_tpl_vars['Grid']->oDataRow[$this->_sections['k']['index']]->vProperty['Text']; ?>
</a></td>
						<?php endif; ?>
						<?php if ($this->_tpl_vars['Grid']->oDataRow[$this->_sections['k']['index']]->iType & 64): ?>
							<td align="left" title="<?php echo $this->_tpl_vars['Grid']->oDataRow[$this->_sections['k']['index']]->vProperty['Text']; ?>
" class="verdana0ru000000"><a href="<?php echo $this->_tpl_vars['Grid']->oDataRow[$this->_sections['k']['index']]->vProperty['Link']; ?>
?<?php echo smarty_function_getfixquery(array('input' => $this->_tpl_vars['Grid']->oDataRow[$this->_sections['k']['index']]->vProperty['FixedQueryString']), $this); echo smarty_function_getfloatquery(array('input' => $this->_tpl_vars['Grid']->oDataRow[$this->_sections['k']['index']]->vProperty['FloatingQueryString'],'data' => $this->_tpl_vars['Grid']->oData[$this->_sections['j']['index']]), $this);?>
"  <?php if ($this->_tpl_vars['Grid']->oDataRow[$this->_sections['k']['index']]->vProperty['bNewWindow']): ?> target='_blank'<?php endif; ?>><img class="tool" src="<?php echo $this->_tpl_vars['Grid']->oDataRow[$this->_sections['k']['index']]->vProperty['Image']; ?>
" border="0" title="<?php echo $this->_tpl_vars['Grid']->oDataRow[$this->_sections['k']['index']]->vProperty['Text']; ?>
"></a></td>
						<?php endif; ?>
						
						<?php if ($this->_tpl_vars['Grid']->oDataRow[$this->_sections['k']['index']]->iType & 256): ?>
							<td align="left"  class="verdana0ru000000">
							<?php if ($this->_tpl_vars['Grid']->oData[$this->_sections['j']['index']]->{(($_var=$this->_tpl_vars['col']) && substr($_var,0,2)!='__') ? $_var : $this->trigger_error("cannot access property \"$_var\"")} & 4): ?>
								<img src='<?php echo $this->_tpl_vars['_CONF']['ImageUrl']; ?>
icons/img_male_replied.gif' alt='Message Replied'>
								<!--replied-->
							<?php elseif ($this->_tpl_vars['Grid']->oData[$this->_sections['j']['index']]->{(($_var=$this->_tpl_vars['col']) && substr($_var,0,2)!='__') ? $_var : $this->trigger_error("cannot access property \"$_var\"")} & 1): ?>
								<img src='<?php echo $this->_tpl_vars['_CONF']['ImageUrl'];  echo $this->_tpl_vars['_CONF']['ImageUrl']; ?>
icons/img_male_read.gif' alt='Read Message'>
								<!--Read-->
							<?php elseif ($this->_tpl_vars['Grid']->oData[$this->_sections['j']['index']]->{(($_var=$this->_tpl_vars['col']) && substr($_var,0,2)!='__') ? $_var : $this->trigger_error("cannot access property \"$_var\"")} & 2): ?>
								<img src='<?php echo $this->_tpl_vars['_CONF']['ImageUrl']; ?>
icons/img_male_forward.gif' alt='Sent Message'>
								<!--Sent-->
							<?php else: ?>
								<img src='<?php echo $this->_tpl_vars['_CONF']['ImageUrl']; ?>
icons/img_mail.gif' alt='New Message'>
								<!--Unread-->
							<?php endif; ?>
							</td>
						<?php endif; ?>
						
						<?php if ($this->_tpl_vars['Grid']->oDataRow[$this->_sections['k']['index']]->iType & 8192): ?>
							<td align="left"  class="verdana0ru000000">
							<?php if ($this->_tpl_vars['Grid']->oData[$this->_sections['j']['index']]->{(($_var=$this->_tpl_vars['col']) && substr($_var,0,2)!='__') ? $_var : $this->trigger_error("cannot access property \"$_var\"")} == 'n'): ?>
								<font color=red>Inactive</font> 
								<!--pending-->
							<?php elseif ($this->_tpl_vars['Grid']->oData[$this->_sections['j']['index']]->{(($_var=$this->_tpl_vars['col']) && substr($_var,0,2)!='__') ? $_var : $this->trigger_error("cannot access property \"$_var\"")} == 'y'): ?>
								Active
								<!--approved-->
							<?php endif; ?>
							
							<?php if ($this->_tpl_vars['Grid']->oData[$this->_sections['j']['index']]->{(($_var=$this->_tpl_vars['col']) && substr($_var,0,2)!='__') ? $_var : $this->trigger_error("cannot access property \"$_var\"")} == '1'): ?>
								<img src="/lexis/<?php echo $this->_tpl_vars['_CONF']['ImageUrl']; ?>
icons/flag.png">
							<?php elseif ($this->_tpl_vars['Grid']->oData[$this->_sections['j']['index']]->{(($_var=$this->_tpl_vars['col']) && substr($_var,0,2)!='__') ? $_var : $this->trigger_error("cannot access property \"$_var\"")} == '0'): ?>
							<?php endif; ?>
							</td>
						<?php endif; ?>
						<?php if ($this->_tpl_vars['Grid']->oDataRow[$this->_sections['k']['index']]->iType & 16384): ?>
						<?php $this->assign('col1', $this->_tpl_vars['Grid']->oDataRow[$this->_sections['k']['index']]->vProperty['Col1']); ?>
							<td align="left"  class="verdana0ru000000">
							<?php if ($this->_tpl_vars['Grid']->oData[$this->_sections['j']['index']]->{(($_var=$this->_tpl_vars['col']) && substr($_var,0,2)!='__') ? $_var : $this->trigger_error("cannot access property \"$_var\"")} == 1): ?>
								<a href=# onClick='checkSubscription(<?php echo $this->_tpl_vars['Grid']->oData[$this->_sections['j']['index']]->{(($_var=$this->_tpl_vars['row_id']) && substr($_var,0,2)!='__') ? $_var : $this->trigger_error("cannot access property \"$_var\"")}; ?>
);' title="Life Time Subscription">Subscribe</a>
								<!--pending-->
							<?php elseif ($this->_tpl_vars['Grid']->oData[$this->_sections['j']['index']]->{(($_var=$this->_tpl_vars['col']) && substr($_var,0,2)!='__') ? $_var : $this->trigger_error("cannot access property \"$_var\"")} == 2 && $this->_tpl_vars['Grid']->oData[$this->_sections['j']['index']]->{(($_var=$this->_tpl_vars['col1']) && substr($_var,0,2)!='__') ? $_var : $this->trigger_error("cannot access property \"$_var\"")} == 9): ?>
								Life Time							
							<?php else: ?>
								Paid
							<?php endif; ?>

							</td>
						<?php endif; ?>
						<?php if ($this->_tpl_vars['Grid']->oDataRow[$this->_sections['k']['index']]->iType & 512): ?>
							<td align="left" width=100  class="verdana0ru000000"><a  class="arial11ru231F20" href="<?php echo $this->_tpl_vars['Grid']->oDataRow[$this->_sections['k']['index']]->vProperty['Link']; ?>
?<?php echo smarty_function_getfixquery(array('input' => $this->_tpl_vars['Grid']->oDataRow[$this->_sections['k']['index']]->vProperty['FixedQueryString']), $this); echo smarty_function_getfloatquery(array('input' => $this->_tpl_vars['Grid']->oDataRow[$this->_sections['k']['index']]->vProperty['FloatingQueryString'],'data' => $this->_tpl_vars['Grid']->oData[$this->_sections['j']['index']]), $this);?>
" <?php if ($this->_tpl_vars['Grid']->oDataRow[$this->_sections['k']['index']]->vProperty['bNewWindow']): ?> target='_blank'<?php endif; ?>><?php echo ((is_array($_tmp=$this->_tpl_vars['Grid']->oData[$this->_sections['j']['index']]->{(($_var=$this->_tpl_vars['col']) && substr($_var,0,2)!='__') ? $_var : $this->trigger_error("cannot access property \"$_var\"")})) ? $this->_run_mod_handler('wordwrap', true, $_tmp, 20, "\n", true) : smarty_modifier_wordwrap($_tmp, 20, "\n", true)); ?>
</a></td>
						<?php endif; ?>
						<!-- displaying Data Images-->						
						<?php if ($this->_tpl_vars['Grid']->oDataRow[$this->_sections['k']['index']]->iType & 2048): ?>
						 <?php if ($this->_tpl_vars['Grid']->oData[$this->_sections['j']['index']]->{(($_var=$this->_tpl_vars['col']) && substr($_var,0,2)!='__') ? $_var : $this->trigger_error("cannot access property \"$_var\"")} == ""): ?>
							<td align="left"  class="verdana0ru000000"><img class="tool" src="var/member_photos/myhome_small/photo_not_available.gif" border="0" width=51 height=55></td>
						<?php else: ?>
							<td align="left"  class="verdana0ru000000"><img src='myhome_small.php?sImgName=<?php echo $this->_tpl_vars['Grid']->oData[$this->_sections['j']['index']]->{(($_var=$this->_tpl_vars['col']) && substr($_var,0,2)!='__') ? $_var : $this->trigger_error("cannot access property \"$_var\"")}; ?>
.jpg' border=0>
							</td>
						<?php endif; ?>
						<?php endif; ?>
						<!-- displaying Data Images-->						
						<?php if ($this->_tpl_vars['Grid']->oDataRow[$this->_sections['k']['index']]->iType & 1024): ?>
							<td align="left"  class="verdana0ru000000">
								
							<?php if ($this->_tpl_vars['Grid']->oData[$this->_sections['j']['index']]->{(($_var=$this->_tpl_vars['col']) && substr($_var,0,2)!='__') ? $_var : $this->trigger_error("cannot access property \"$_var\"")} & 1): ?>
								Activated
							<?php else: ?>
								Deactivated
							<?php endif; ?>
							</td>
						<?php endif; ?>
						<?php if ($this->_tpl_vars['Grid']->oDataRow[$this->_sections['k']['index']]->iType & 65536): ?>
							<td align="left"  class="verdana0ru000000">
							
							<?php if ($this->_tpl_vars['Grid']->oData[$this->_sections['j']['index']]->{(($_var=$this->_tpl_vars['col']) && substr($_var,0,2)!='__') ? $_var : $this->trigger_error("cannot access property \"$_var\"")} == 0): ?>
								
								In Process
							<?php elseif ($this->_tpl_vars['Grid']->oData[$this->_sections['j']['index']]->{(($_var=$this->_tpl_vars['col']) && substr($_var,0,2)!='__') ? $_var : $this->trigger_error("cannot access property \"$_var\"")} == 1): ?>
							
								Approved
							<?php else: ?>
								Cancelled
							<?php endif; ?>
							</td>
						<?php endif; ?>
						
					<?php endfor; endif; ?>
					</tr>
				<?php endfor; else: ?>
					<td colspan="15"  class="verdana0ru000000" align="center"> No record found.</td>
				<?php endif; ?>
				<!-- /Data-->
				</tbody>
			</table>
		</td>
		<!-- /Grid Code -->
	</tr>

		<input type="hidden" name="previousmode" value="<?php echo $_REQUEST['mode']; ?>
">
		<input type="hidden" name="sFolder" value="<?php echo $this->_tpl_vars['sFolder']; ?>
">
		<input type="hidden" name="folder" value="<?php echo $this->_tpl_vars['sFolder']; ?>
">
		<input type="hidden" name="stage" value="<?php echo $this->_tpl_vars['Grid']->sStage; ?>
">
		<input type="hidden" name="mode" value="<?php echo $_REQUEST['mode']; ?>
">
		<input type="hidden" name="pos" value="<?php echo ((is_array($_tmp=@$_REQUEST['pos'])) ? $this->_run_mod_handler('default', true, $_tmp, 0) : smarty_modifier_default($_tmp, 0)); ?>
">
		<input type="hidden" name="sort" value="<?php echo $_REQUEST['sort']; ?>
">
		<input type="hidden" name="from_date" value="<?php echo $_REQUEST['from_date']; ?>
">
		<input type="hidden" name="to_date" value="<?php echo $_REQUEST['to_date']; ?>
">
		<input type="hidden" name="payment_method_id" value="<?php echo $_REQUEST['payment_method_id']; ?>
">
		<input type="hidden" name="cat_parent_id" value="<?php echo $this->_tpl_vars['Grid']->OCustomOperation[0]->vProperty['cat_parent_id']; ?>
">
		<input type="hidden" name="direction" value="<?php echo $_REQUEST['direction']; ?>
">
		<input type="hidden" name="status_id" value="<?php echo $_REQUEST['status_id']; ?>
">
		<input type="hidden" name="search_field" value="<?php echo $_REQUEST['search_field']; ?>
">
		<input type="hidden" name="search_text" value="<?php echo $_REQUEST['search_text']; ?>
">
	<tr>
		<?php if ($this->_tpl_vars['Grid']->sStage == 'mail'): ?>
			<td></td>
		<?php endif; ?>
		<td colspan="10" height=25 align=left valign=center>
		<table border=0 cellpadding=5 width='100%' align='center'><tr><td width='80px'>
		<?php unset($this->_sections['vopr']);
$this->_sections['vopr']['loop'] = is_array($_loop=$this->_tpl_vars['Grid']->SVerticalOperation['Text']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['vopr']['name'] = 'vopr';
$this->_sections['vopr']['show'] = true;
$this->_sections['vopr']['max'] = $this->_sections['vopr']['loop'];
$this->_sections['vopr']['step'] = 1;
$this->_sections['vopr']['start'] = $this->_sections['vopr']['step'] > 0 ? 0 : $this->_sections['vopr']['loop']-1;
if ($this->_sections['vopr']['show']) {
    $this->_sections['vopr']['total'] = $this->_sections['vopr']['loop'];
    if ($this->_sections['vopr']['total'] == 0)
        $this->_sections['vopr']['show'] = false;
} else
    $this->_sections['vopr']['total'] = 0;
if ($this->_sections['vopr']['show']):

            for ($this->_sections['vopr']['index'] = $this->_sections['vopr']['start'], $this->_sections['vopr']['iteration'] = 1;
                 $this->_sections['vopr']['iteration'] <= $this->_sections['vopr']['total'];
                 $this->_sections['vopr']['index'] += $this->_sections['vopr']['step'], $this->_sections['vopr']['iteration']++):
$this->_sections['vopr']['rownum'] = $this->_sections['vopr']['iteration'];
$this->_sections['vopr']['index_prev'] = $this->_sections['vopr']['index'] - $this->_sections['vopr']['step'];
$this->_sections['vopr']['index_next'] = $this->_sections['vopr']['index'] + $this->_sections['vopr']['step'];
$this->_sections['vopr']['first']      = ($this->_sections['vopr']['iteration'] == 1);
$this->_sections['vopr']['last']       = ($this->_sections['vopr']['iteration'] == $this->_sections['vopr']['total']);
?>
			<?php if ($this->_sections['vopr']['first']): ?>
			<select name="op_mode">
				<option value="">--Select--</option>
			<?php endif; ?>
				<option value="<?php echo $this->_tpl_vars['Grid']->SVerticalOperation['Operation'][$this->_sections['vopr']['index']]; ?>
"><?php echo $this->_tpl_vars['Grid']->SVerticalOperation['Text'][$this->_sections['vopr']['index']]; ?>
</option>
			<?php if ($this->_sections['vopr']['last']): ?>	
			</select></td><td align='left'>
				<?php if ($this->_tpl_vars['ADMIN'] == 'YES'): ?>
					<input type="submit" name="operation" value="Submit">
				<?php else: ?>
				<input type='submit' name='operation' value='Submit' style='background-color:#005388; border-width:1px; border-color:#f7f7f7;font-size:10px; font-family:Verdana, Arial, Helvetica, sans-serif; font-weight:bold; color:#ffffff; height:21px'>
				<?php endif; ?>
			<?php endif; ?>
		<?php endfor; endif; ?>
		</td></tr>
		
		</table>
		</td>
	</tr>
	</form>
	<tr><td colspan="2"  class="arial11r000000" align='center'>
		<?php if (isset ( $this->_tpl_vars['CustomForm1'] )): ?>
			<?php echo $this->_tpl_vars['CustomForm1']; ?>

		<?php endif; ?>
	</td></tr>
</table>