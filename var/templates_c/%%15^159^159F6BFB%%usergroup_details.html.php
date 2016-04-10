<?php /* Smarty version 2.6.10, created on 2012-01-13 01:22:26
         compiled from accession/ihtml/usergroup_details.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'html_entity_decode', 'accession/ihtml/usergroup_details.html', 10, false),array('modifier', 'stripslashes', 'accession/ihtml/usergroup_details.html', 10, false),)), $this); ?>
<table cellspacing='0' width='96%' cellpadding='0' border='0' bordercolor='#ffffff'>
<tr><td height="10px"></td></tr>
<tr bgcolor="#888888" height='28'><td align="center" style="padding-left:3px"><font color="#FFFFFF"><b>User Group Details</b></font></td></tr>
<tr>
	<td>
		<br/>
		<table align="center" width='70%'cellspacing='1' cellpadding='3' border='0'  bordercolor='#f7f7f7'>
			<tr>
				<td class="arial11b000000" width="30%"><B>User Group Name</B></td>
				<td width="70%"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['oMember']->name)) ? $this->_run_mod_handler('html_entity_decode', true, $_tmp) : html_entity_decode($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
</td></tr>
			<tr>
			<tr>
				<td class="arial11b000000" width="30%"><B>User Group Name</B></td>
				<td width="70%"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['oMember']->name)) ? $this->_run_mod_handler('html_entity_decode', true, $_tmp) : html_entity_decode($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
</td></tr>
			<tr>
				<td width="30%" class="arial11b000000"><B>Promo Code</B></td>
				<td width="70%"><?php echo $this->_tpl_vars['oMember']->promo_code; ?>
</td></tr>
			<tr>
				<td width="30%" class="arial11b000000"><B>Subscription Price</B></td>
				<td width="70%">$&nbsp;<?php echo $this->_tpl_vars['oMember']->subscription_price; ?>
</td>
			</tr>
			<!--<tr><td class="arial11b000000"><B>Company Bio</B></td><td><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['oEmployer']->company_bio)) ? $this->_run_mod_handler('html_entity_decode', true, $_tmp) : html_entity_decode($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
</td></tr>-->
			<tr>
				<td colspan='2' align='center'>
					<input type="button" value="Back" name="Back" onclick="window.location='index.php?stage=accession&mode=listUserGroups&pos=<?php echo $_REQUEST['pos']; ?>
'"/></td></tr>					
				</td>	
			</tr>
		</table>
	</td>
</tr>
</table>