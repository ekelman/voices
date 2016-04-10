<?php /* Smarty version 2.6.10, created on 2014-03-03 12:02:14
         compiled from affiliates/ihtml/admin_affiliate_details.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'html_entity_decode', 'affiliates/ihtml/admin_affiliate_details.html', 8, false),array('modifier', 'stripslashes', 'affiliates/ihtml/admin_affiliate_details.html', 8, false),array('modifier', 'default', 'affiliates/ihtml/admin_affiliate_details.html', 13, false),)), $this); ?>
<table cellspacing='0' width='96%' cellpadding='0' border='0' bordercolor='#ffffff'>
<tr><td height="10px"></td></tr>
<tr height='28'><td bgcolor="#005388" align="center" style="padding-left:3px"><font color="#FFFFFF"><b>Affiliate Details</b></font></td></tr>
<tr>
	<td>
	
		<table align="center" width='70%'cellspacing='1' cellpadding='3' border='0'  bordercolor='#f7f7f7'>
			<tr><td class="arial11b000000" width="35%"><B>Name</B></td><td><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['oAffiliate']->first_name)) ? $this->_run_mod_handler('html_entity_decode', true, $_tmp) : html_entity_decode($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
&nbsp;<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['oAffiliate']->last_name)) ? $this->_run_mod_handler('html_entity_decode', true, $_tmp) : html_entity_decode($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
</td></tr>
			<tr><td class="arial11b000000"><B>User Name</B></td><td><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['oAffiliate']->user_name)) ? $this->_run_mod_handler('html_entity_decode', true, $_tmp) : html_entity_decode($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
</td></tr>
			<tr><td class="arial11b000000"><B>Email</B></td><td><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['oAffiliate']->email)) ? $this->_run_mod_handler('html_entity_decode', true, $_tmp) : html_entity_decode($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
</td></tr>
			<tr><td class="arial11b000000"><B>Address</B></td><td><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['oAffiliate']->street_address)) ? $this->_run_mod_handler('html_entity_decode', true, $_tmp) : html_entity_decode($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
</td></tr>
			<tr><td class="arial11b000000"><B>City</B></td><td><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['oAffiliate']->city)) ? $this->_run_mod_handler('html_entity_decode', true, $_tmp) : html_entity_decode($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
</td></tr>
			<tr><td class="arial11b000000"><B>State</B></td><td><?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=@$this->_tpl_vars['oAffiliate']->state)) ? $this->_run_mod_handler('default', true, $_tmp, "") : smarty_modifier_default($_tmp, "")))) ? $this->_run_mod_handler('html_entity_decode', true, $_tmp) : html_entity_decode($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
</td></tr>
			<tr><td class="arial11b000000"><B>Zip Code</B></td><td><?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=@$this->_tpl_vars['oAffiliate']->zip_code)) ? $this->_run_mod_handler('default', true, $_tmp, "") : smarty_modifier_default($_tmp, "")))) ? $this->_run_mod_handler('html_entity_decode', true, $_tmp) : html_entity_decode($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
</td></tr>
			<tr><td class="arial11b000000"><B>Country</B></td><td><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['oAffiliate']->country)) ? $this->_run_mod_handler('html_entity_decode', true, $_tmp) : html_entity_decode($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
</td></tr>
			
			<tr><td class="arial11b000000"><B>Organisation </B></td><td><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['oAffiliate']->organisation_name)) ? $this->_run_mod_handler('html_entity_decode', true, $_tmp) : html_entity_decode($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
</td></tr>
			<tr><td class="arial11b000000"><B>Organisation Website</B></td><td>
			<a href="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['oAffiliate']->organisation_website)) ? $this->_run_mod_handler('html_entity_decode', true, $_tmp) : html_entity_decode($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
" target="_blank">
				<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['oAffiliate']->organisation_website)) ? $this->_run_mod_handler('html_entity_decode', true, $_tmp) : html_entity_decode($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>

			</a></td></tr>			
			<tr><td class="arial11b000000"><B>Description </B></td><td><?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=@$this->_tpl_vars['oAffiliate']->description)) ? $this->_run_mod_handler('default', true, $_tmp, "") : smarty_modifier_default($_tmp, "")))) ? $this->_run_mod_handler('html_entity_decode', true, $_tmp) : html_entity_decode($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
</td></tr>
			<tr><td class="arial11b000000"><B>Affiliate Code</B></td><td><?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=@$this->_tpl_vars['oAffiliate']->affiliate_code)) ? $this->_run_mod_handler('default', true, $_tmp, "") : smarty_modifier_default($_tmp, "")))) ? $this->_run_mod_handler('html_entity_decode', true, $_tmp) : html_entity_decode($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
</td></tr>
			<tr><td class="arial11b000000"><B>Promo Code</B></td><td><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['oAffiliate']->promo_code)) ? $this->_run_mod_handler('html_entity_decode', true, $_tmp) : html_entity_decode($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
</td></tr>
			<tr><td class="arial11b000000"><B>Donation URL</B></td><td><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['oAffiliate']->donation_url)) ? $this->_run_mod_handler('html_entity_decode', true, $_tmp) : html_entity_decode($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
</td></tr>
			
			<tr><td colspan='2' align='center'><a class="arial11b000000" href="index.php?stage=affiliates&mode=ListAffiliates" style='cursor:hand'>&lt;&lt;Back</A></tr>
		</table>
	</td>
</tr>
</table>