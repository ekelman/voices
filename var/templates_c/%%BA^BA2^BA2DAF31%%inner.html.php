<?php /* Smarty version 2.6.10, created on 2014-03-10 08:20:00
         compiled from user/ihtml/inner.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'capitalize', 'user/ihtml/inner.html', 5, false),)), $this); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $this->_tpl_vars['SiteName']; ?>
 : <?php echo ((is_array($_tmp=$_REQUEST['stage'])) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
 : <?php echo ((is_array($_tmp=$_REQUEST['mode'])) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="scripts/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="scripts/jquery.tipsy.js"></script>	
<link rel="stylesheet" href="css/tipsy.css" type="text/css" />

</head>
<?php echo '
<script>
	$inner=jQuery.noConflict();
	$inner(function() {
			$inner(\'#bill_inner\').tipsy({gravity: \'n\'});
			$inner(\'#aff_inner\').tipsy({gravity: \'n\'});
			$inner(\'#elected_inner\').tipsy({gravity: \'n\'});
	});
</script>

'; ?>


<body>
<table width="1000" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="left" valign="top" class="bg_474141" style="padding:25px;">
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr></tr>
      <tr>
        <td align="left" valign="top" class="bg_feffff" style="padding:13px;">
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                <td width="427" align="left" valign="top"><img src="images/img_voiceforchange.gif" width="427" height="138" alt="" /></td>
                                <td align="left" valign="top" class="img_banner_bg">
								<?php if (isset ( $_SESSION['member_type'] )): ?>
									<?php if ($_SESSION['member_type'] == 'observer'): ?>
									<a title="My Profile" href="index.php?stage=subscriber&mode=MyProfile" id="my_dashboard_link">
										<div id="my_dashboard" style="cursor: pointer;">
										<span class="arial_14_000000_dashboard">My</span>
										<span class="arial_14_c30100_dashboard"> Profile</span>
										</div>									
									</a>									
									<?php else: ?>									
										<?php if ($_SESSION['member_type'] == 'subscriber'): ?>
										<a title="My Dashboard" href="index.php?stage=subscriber&mode=MemberDashboard" id="my_dashboard_link">
										<?php elseif ($_SESSION['member_type'] == 'affiliate'): ?>
										<a title="My Dashboard" href="index.php?stage=affiliates&mode=AffiliateDashboard" id="my_dashboard_link">
										<?php elseif ($_SESSION['member_type'] == 'elected_official'): ?>
										<a title="My Dashboard" href="index.php?stage=electedrepresentative&mode=electedrepresentativedashboard" id="my_dashboard_link">
										<?php endif; ?>
										<div id="my_dashboard" style="cursor: pointer;">
										<span class="arial_14_000000_dashboard">My</span>
										<span class="arial_14_c30100_dashboard"> Dashboard</span>
										</div>
										</a>
									<?php endif; ?>	
								<?php else: ?>
								&nbsp;
								<?php endif; ?></td>
                                </tr>
                              </table></td>
                            </tr>
                          <tr>
                            <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                <td width="6" align="left" valign="top"><img src="images/img_nav_cor_1.jpg" width="6" height="28" alt="" /></td>
                                <td align="left" valign="top" class="img_nav_rp" style="padding:0px 15px 0 15px;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                  <tr class="Verdana_11_fff_bold">
                                    <td width="85" height="28" align="center" valign="middle" class="Verdana_11_fff_bold">
																			<a href="/" class="Verdana_11_fff_bold">Home</a>
									</td>
                                    <td width="125" align="center" valign="middle" class="Verdana_11_fff_bold"><a href="index.php?stage=billresources&mode=billDetail" class="Verdana_11_fff_bold question">Bill Resources</a><img src="images/question_blue.png" style="cursor:pointer;" class="icon-ques" id='bill_inner' title='Each time an Affiliate posts a comment on a Bill, we create a "Bill Resource
page" for you. We list all comments supporting or opposing the bill. You can view all of the
comments when considering whether you wish to support or oppose the bill. We also provide
you with pertinent information about the bill, such as the Bill number, title, sponsor(s) and a
summary of the bill, you can read the full text of the bill from here if you wish.
'/></td>
                                    <td width="102" align="center" valign="middle" class="Verdana_11_fff_bold"><a href="index.php?stage=affiliates&mode=listaffiliates" class="Verdana_11_fff_bold question">Affiliates</a><img src="images/question_blue.png" style="cursor:pointer;" class="icon-ques" id='aff_inner' title='Affiliates are organizations that advocate a position on issues that are important to
our society. Those that you choose are listed here for you. The "Primary Affiliate" that you
select will appear on your dashboard when you join VOICES, you may choose as many
"secondary affiliates" as you wish, they are listed here in order that you can easily access their
pages. Whenever an Affiliate that you identified posts a new comment on their "Affiliate&#146;s
page" we notify you by highlighting their name in this section, so that you can simply click on
the name and go to their page to view the comment
'/></td>
                                    <td width="175" align="center" valign="middle" class="Verdana_11_fff_bold"><a href="index.php?stage=electedrepresentative&mode=electedrepresentativelist" class="Verdana_11_fff_bold question">Elected Representatives</a><img src="images/question_blue.png" class="icon-ques" style="cursor:pointer;" id='elected_inner' title='We provide you with a list of your elected representatives here,
both state and federal. We provide you with their contact information, including; mailing
address, phone number, a map of their district and a link to their website
.'/></td>
									<td width="95" align="center" valign="middle" class="Verdana_11_fff_bold"><a href="index.php?stage=pages&mode=AboutUs" class="Verdana_11_fff_bold">About Us</a></td>
                                    <td width="75" align="center" valign="middle" class="Verdana_11_fff_bold"><a href="index.php?stage=pages&mode=Faq" class="Verdana_11_fff_bold">FAQs</a></td>
                                    <td width="100" align="center" valign="middle" class="Verdana_11_fff_bold"><a href="index.php?stage=pages&mode=ContactUs" class="Verdana_11_fff_bold">Contact Us</a></td>
                                    
                                    <td width="100" align="center" valign="middle" class="Verdana_11_fff_bold">
									<?php if (isset ( $_SESSION['username'] ) && ( $_SESSION['username'] != '' )): ?>
									<a title="Logout" class="arial11NRC0DDEF" href="index.php?stage=member&amp;mode=memberLogout">
										<img src="images/btn_logout.gif" alt="" width="66" height="23" border="0" onclick="" title="Logout" />
									</a>
									<?php else: ?>
									<a title="Login" class="arial11NRC0DDEF" href="index.php?stage=member&amp;mode=login">
										<img src="images/img_login_nav.gif" alt="login" width="66" height="23" border="0" title="Login" />
									</a>
									<?php endif; ?></td>
                                  </tr>
                                </table></td>
                                <td width="6" align="left" valign="top"><img src="images/img_nav_cor_2.jpg" width="6" height="28" alt="" /></td>
                                </tr>
                              </table></td>
                            </tr>
                          </table></td>
                      </tr>
                      </table></td>
                  </tr>
                </table></td>
              </tr>
              <tr>
                <td align="left" valign="top"  style="padding-top:10px;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td align="left" valign="top" class="bg_f7f6f2"  style="padding:24px 15px 51px 12px;"><?php echo $this->_tpl_vars['Content']; ?>
</td>
                  </tr>
                </table></td>
              </tr>
              <tr>
                <td align="left" valign="top" style="padding:7px 150px 0px 150px"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td align="center" valign="top" class="arial_12_5f5645"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td align="center" valign="top" class="arial_12_655e4e"><span class="arial_12_655e4e">Copyright &copy; 2011 OurVoicesForChange.com</span> | <a href="index.php?stage=pages&mode=privacyPolicy" class="arial_12_655e4e">Privacy Policy</a> | <a href="index.php?stage=pages&mode=TermsAndConditions" class="arial_12_655e4e">Terms &amp; Conditions</a> | <a href="index.php?stage=pages&mode=ContactUs" class="arial_12_655e4e">Contact Us</a></td>
                      </tr>
                    </table></td>
                  </tr>
                </table></td>
              </tr>
            </table></td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
</table>
</body>
</html>