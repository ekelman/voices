<?php /* Smarty version 2.6.10, created on 2014-03-10 09:12:58
         compiled from user/ihtml/skeleton.html */ ?>
	<?php if (empty ( $_REQUEST['mode'] )): ?>
			<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "user/ihtml/home.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	<?php elseif ($_REQUEST['mode'] == 'homepage'): ?>
			<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "user/ihtml/home.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	<?php elseif (( ( $_REQUEST['stage'] == 'visitor' && $_REQUEST['mode'] == 'signingOptions' ) || ( $_REQUEST['stage'] == 'visitor' && $_REQUEST['mode'] == 'EmailMessage' ) || ( $_REQUEST['stage'] == 'visitor' && $_REQUEST['mode'] == 'oneTimePaymentStepOne' ) || ( $_REQUEST['stage'] == 'subscriber' && $_REQUEST['mode'] == 'SaveSubscriberJoinDirect' ) || ( $_REQUEST['stage'] == 'subscriber' && $_REQUEST['mode'] == 'SubscriberJoinDirect' ) || ( $_REQUEST['stage'] == 'subscriber' && $_REQUEST['mode'] == 'SubscriberJoin' ) || ( $_REQUEST['stage'] == 'subscriber' && $_REQUEST['mode'] == 'EmailMessage' ) || ( $_REQUEST['stage'] == 'subscriber' && $_REQUEST['mode'] == 'MemberDashboard' ) || ( $_REQUEST['stage'] == 'subscriber' && $_REQUEST['mode'] == 'MyProfile' ) || ( $_REQUEST['stage'] == 'subscriber' && $_REQUEST['mode'] == 'ProfileEdit' ) || ( $_REQUEST['stage'] == 'subscriber' && $_REQUEST['mode'] == 'VoteAlerts' ) || ( $_REQUEST['stage'] == 'subscriber' && $_REQUEST['mode'] == 'VoteAlertsDetail' ) || ( $_REQUEST['stage'] == 'subscriber' && $_REQUEST['mode'] == 'ElectedRepresentatives' ) || ( $_REQUEST['stage'] == 'subscriber' && $_REQUEST['mode'] == 'MyAffiliates' ) || ( $_REQUEST['stage'] == 'subscriber' && $_REQUEST['mode'] == 'AffiliateDetails' ) || ( $_REQUEST['stage'] == 'subscriber' && $_REQUEST['mode'] == 'ElectedrepresentativeProfile' ) || ( $_REQUEST['stage'] == 'subscriber' && $_REQUEST['mode'] == 'SaveSubscriberJoin' ) || ( $_REQUEST['stage'] == 'member' && $_REQUEST['mode'] == 'login' ) || ( $_REQUEST['stage'] == 'member' && $_REQUEST['mode'] == 'forgotpassword' ) || ( $_REQUEST['stage'] == 'member' && $_REQUEST['mode'] == 'sendPassword' ) || ( $_REQUEST['stage'] == 'affiliates' && $_REQUEST['mode'] == 'AffiliateDashboard' ) || ( $_REQUEST['stage'] == 'affiliates' && $_REQUEST['mode'] == 'SubmitNewContent' ) || ( $_REQUEST['stage'] == 'affiliates' && $_REQUEST['mode'] == 'EditProfile' ) || ( $_REQUEST['stage'] == 'affiliates' && $_REQUEST['mode'] == 'AffiliateProfile' ) || ( $_REQUEST['stage'] == 'affiliates' && $_REQUEST['mode'] == 'listaffiliates' ) || ( $_REQUEST['stage'] == 'affiliates' && $_REQUEST['mode'] == 'UpdateAffiliate' ) || ( $_REQUEST['stage'] == 'billresources' && $_REQUEST['mode'] == 'billDetail' ) || ( $_REQUEST['stage'] == 'electedrepresentative' && $_REQUEST['mode'] == 'electedrepresentativelist' ) || ( $_REQUEST['stage'] == 'electedrepresentative' && $_REQUEST['mode'] == 'SubmitNewPoll' ) || ( $_REQUEST['stage'] == 'electedrepresentative' && $_REQUEST['mode'] == 'SubmitNewContent' ) || ( $_REQUEST['stage'] == 'electedrepresentative' && $_REQUEST['mode'] == 'electedrepresentativedashboard' ) || ( $_REQUEST['stage'] == 'electedrepresentative' && $_REQUEST['mode'] == 'editprofile' ) || ( $_REQUEST['stage'] == 'electedrepresentative' && $_REQUEST['mode'] == 'UpdateElectedrepresentative' ) )): ?>
		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "user/ihtml/header.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "user/ihtml/innerpage.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "user/ihtml/footer.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	<?php else: ?>
	  <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "user/ihtml/inner.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	<?php endif; ?>