<?php /* Smarty version 2.6.10, created on 2014-03-04 19:34:12
         compiled from visitor/ihtml/message.html */ ?>
<tr>
    <td align="left" valign="top"  style="padding-top:10px;">
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
    <td align="left" valign="top" class="bg_f7f6f2"  style="padding:24px 15px 51px 12px;">
	<table cellspacing='0' cellpadding='0' border='0' align='center' height='250'>
	<tr>
	<td>
	<table cellspacing='0' cellpadding='0' border='0' align='center'>
		<?php if ($this->_tpl_vars['message'] == 'registration'): ?>
		<tr><td align='center' class="arial_12_000">Thank you for your interest. Your VOICES member account has been created. Thank You.</td></tr>
		<tr><td height='20'></td></tr>
		<tr><td align='center'><A HREF="<?php echo $this->_tpl_vars['_CONF']['SiteUrl']; ?>
/index.php" class='arial_12_a60000_bold'>Go to Home Page</A></td></tr>
		<?php elseif ($this->_tpl_vars['message'] == 'commingsoon'): ?>
		<tr><td align='center' class="arial_12_000">Comming soon...</td></tr>
		<tr><td height='20'></td></tr>
		<tr><td align='center'><A HREF="<?php echo $this->_tpl_vars['_CONF']['SiteUrl']; ?>
/index.php" class='arial_12_a60000_bold'>Go to Home Page</A></td></tr>
		<?php elseif ($this->_tpl_vars['message'] == 'invalidaccess'): ?>
		<tr><td align='center' class="arial_12_000">Invalid access, sorry you don't have right to access this area of the website.</td></tr>
		<tr><td height='20'></td></tr>
		<tr><td align='center'><A HREF="<?php echo $this->_tpl_vars['_CONF']['SiteUrl']; ?>
/index.php" class='arial_12_a60000_bold'>Go to Home Page</A></td></tr>
		<?php elseif ($this->_tpl_vars['message'] == 'alreadysignedpetition'): ?>
		<tr><td align='center' class="arial_12_000">You have already signed this petition.</td></tr>
		<tr><td height='20'></td></tr>
		<tr><td align='center'><A HREF="<?php echo $this->_tpl_vars['_CONF']['SiteUrl']; ?>
/index.php" class='arial_12_a60000_bold'>Go to Home Page</A></td></tr>
		<?php elseif ($this->_tpl_vars['message'] == 'petitionsignedsuccessfully'): ?>
		<tr><td align='center' class="arial_12_000">You have sucessfully signed the petition.</td></tr>
		<tr><td height='20'></td></tr>
		<tr><td align='center'><A HREF="<?php echo $this->_tpl_vars['_CONF']['SiteUrl']; ?>
/index.php" class='arial_12_a60000_bold'>Go to Home Page</A></td></tr>
		<?php elseif ($this->_tpl_vars['message'] == 'invalidaddressonetime'): ?>
		<tr><td align='center' class="arial_12_000">Your address is not verified, so you cann't signed the petition.</td></tr>
		<tr><td height='20'></td></tr>
		<tr><td align='center'><A HREF="<?php echo $this->_tpl_vars['_CONF']['SiteUrl']; ?>
/index.php" class='arial_12_a60000_bold'>Go to Home Page</A></td></tr>
		<?php elseif ($this->_tpl_vars['message'] == 'petitionpaymentcancel'): ?>
		<tr><td align='center' class="arial_12_000">You have canceled to sign the petition.</td></tr>
		<tr><td height='20'></td></tr>
		<tr><td align='center'><A HREF="<?php echo $this->_tpl_vars['_CONF']['SiteUrl']; ?>
/index.php" class='arial_12_a60000_bold'>Go to Home Page</A></td></tr>
		<?php elseif ($this->_tpl_vars['message'] == 'logouttoview'): ?>
		<tr><td align='center' class="arial_12_000">Invalid access, you need to logout to view this page.</td></tr>
		<tr><td height='20'></td></tr>
		<tr><td align='center'><A HREF="<?php echo $this->_tpl_vars['_CONF']['SiteUrl']; ?>
/index.php" class='arial_12_a60000_bold'>Go to Home Page</A></td></tr>
		<?php elseif ($this->_tpl_vars['message'] == 'signingperiodclosed'): ?>
		<tr><td align='center' class="arial_12_000">Signing period for this petition has been expired.</td></tr>
		<tr><td height='20'></td></tr>
		<tr><td align='center'><A HREF="<?php echo $this->_tpl_vars['_CONF']['SiteUrl']; ?>
/index.php" class='arial_12_a60000_bold'>Go to Home Page</A></td></tr>
		<?php endif; ?>
		</table>
	</td>
	</tr>
	</table>
	</td>
    </tr>
    </table>
	</td>
</tr>		