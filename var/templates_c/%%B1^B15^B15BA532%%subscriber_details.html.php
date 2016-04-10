<?php /* Smarty version 2.6.10, created on 2014-03-09 22:19:38
         compiled from subscriber/ihtml/subscriber_details.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'html_entity_decode', 'subscriber/ihtml/subscriber_details.html', 8, false),array('modifier', 'stripslashes', 'subscriber/ihtml/subscriber_details.html', 8, false),array('modifier', 'default', 'subscriber/ihtml/subscriber_details.html', 12, false),)), $this); ?>
<table cellspacing='0' width='96%' cellpadding='0' border='0' bordercolor='#ffffff'>
<tr><td height="10px"></td></tr>
<tr height='28'><td bgcolor="#005388" align="center" style="padding-left:3px"><font color="#FFFFFF"><b>Subscriber Details</b></font></td></tr>

<tr>
	<td>
		<table align="center" width='70%'cellspacing='1' cellpadding='3' border='0'  bordercolor='#f7f7f7'>
			<tr><td class="arial11b000000"><B>Name</B></td><td><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['oSubscriber']->first_name)) ? $this->_run_mod_handler('html_entity_decode', true, $_tmp) : html_entity_decode($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
&nbsp;<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['oSubscriber']->last_name)) ? $this->_run_mod_handler('html_entity_decode', true, $_tmp) : html_entity_decode($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
</td></tr>
			<tr><td class="arial11b000000"><B>Email</B></td><td><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['oSubscriber']->email)) ? $this->_run_mod_handler('html_entity_decode', true, $_tmp) : html_entity_decode($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
</td></tr>
			<tr><td class="arial11b000000"><B>Address</B></td><td><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['oSubscriber']->mail_street_address)) ? $this->_run_mod_handler('html_entity_decode', true, $_tmp) : html_entity_decode($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
</td></tr>
			<tr><td class="arial11b000000"><B>City</B></td><td><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['oSubscriber']->mail_city)) ? $this->_run_mod_handler('html_entity_decode', true, $_tmp) : html_entity_decode($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
</td></tr>
			<tr><td class="arial11b000000"><B>State</B></td><td><?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=@$this->_tpl_vars['oSubscriber']->mail_state)) ? $this->_run_mod_handler('default', true, $_tmp, "") : smarty_modifier_default($_tmp, "")))) ? $this->_run_mod_handler('html_entity_decode', true, $_tmp) : html_entity_decode($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
</td></tr>
			<tr><td class="arial11b000000"><B>Zip Code</B></td><td><?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=@$this->_tpl_vars['oSubscriber']->mail_zip_code)) ? $this->_run_mod_handler('default', true, $_tmp, "") : smarty_modifier_default($_tmp, "")))) ? $this->_run_mod_handler('html_entity_decode', true, $_tmp) : html_entity_decode($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
</td></tr>
			<tr><td class="arial11b000000"><B>Country</B></td><td><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['oSubscriber']->mail_country)) ? $this->_run_mod_handler('html_entity_decode', true, $_tmp) : html_entity_decode($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
</td></tr>
			<tr><td class="arial11b000000"><B>Registered Date</B></td><td><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['oSubscriber']->reg_date)) ? $this->_run_mod_handler('html_entity_decode', true, $_tmp) : html_entity_decode($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
</td></tr>
			<tr><td colspan="2" align="center" class="arial11b000000"><B>Billing Details</B></td></tr>
			<tr><td class="arial11b000000"><B>Address</B></td><td><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['oSubscriber']->bill_street_address)) ? $this->_run_mod_handler('html_entity_decode', true, $_tmp) : html_entity_decode($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
</td></tr>
			<tr><td class="arial11b000000"><B>City</B></td><td><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['oSubscriber']->bill_city)) ? $this->_run_mod_handler('html_entity_decode', true, $_tmp) : html_entity_decode($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
</td></tr>
			<tr><td class="arial11b000000"><B>State</B></td><td><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['oSubscriber']->bill_state)) ? $this->_run_mod_handler('html_entity_decode', true, $_tmp) : html_entity_decode($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
</td></tr>
			<tr><td class="arial11b000000"><B>Zip Code</B></td><td><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['oSubscriber']->bill_zip_code)) ? $this->_run_mod_handler('html_entity_decode', true, $_tmp) : html_entity_decode($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
</td></tr>
			<tr><td class="arial11b000000"><B>Country</B></td><td><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['oSubscriber']->bill_country)) ? $this->_run_mod_handler('html_entity_decode', true, $_tmp) : html_entity_decode($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
</td></tr>
			<tr><td colspan='2' align='center'><a class="arial11b000000" href="index.php?stage=subscriber&mode=ListSubscriber" style='cursor:hand'>&lt;&lt;Back</A></tr>
		</table>
	</td>
</tr>
</table>