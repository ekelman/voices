<?php /* Smarty version 2.6.10, created on 2014-03-10 09:12:58
         compiled from user/ihtml/home.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'capitalize', 'user/ihtml/home.html', 5, false),array('modifier', 'default', 'user/ihtml/home.html', 237, false),)), $this); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
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
	
	$(function() {
			$(\'#bill\').tipsy({gravity: \'n\'});
			$(\'#aff\').tipsy({gravity: \'n\'});
			$(\'#elected\').tipsy({gravity: \'n\'});
	});
</script>

'; ?>

<body>
<table width="1000" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="left" valign="top" class="bg_474141" style="padding:25px;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr></tr>
      <tr>
        <td align="left" valign="top" class="bg_feffff" style="padding:13px;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
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
										<span class="arial_14_c30100_dashboard">Profile</span>
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
                                    <td width="85" height="28" align="center" valign="middle" class="Verdana_11_fff_bold"><a href="/" class="Verdana_11_fff_bold">Home</a></td>
                                    <td width="125" align="center" valign="middle" class="Verdana_11_fff_bold"><a href="index.php?stage=billresources&mode=billDetail" class="Verdana_11_fff_bold question">Bill Resources</a><img src="images/question_blue.png" style="cursor:pointer;" class="icon-ques" id='bill' title='Each time an Affiliate posts a comment on a Bill, we create a "Bill Resource
page" for you. We list all comments supporting or opposing the bill. You can view all of the
comments when considering whether you wish to support or oppose the bill. We also provide
you with pertinent information about the bill, such as the Bill number, title, sponsor(s) and a
summary of the bill, you can read the full text of the bill from here if you wish.
'/></td>
                                    <td width="102" align="center" valign="middle" class="Verdana_11_fff_bold"><a href="index.php?stage=affiliates&mode=listaffiliates" class="Verdana_11_fff_bold question">Affiliates</a><img src="images/question_blue.png" style="cursor:pointer;" class="icon-ques" id='aff' title='Affiliates are organizations that advocate a position on issues that are important to
our society. Those that you choose are listed here for you. The "Primary Affiliate" that you
select will appear on your dashboard when you join VOICES, you may choose as many
"secondary affiliates" as you wish, they are listed here in order that you can easily access their
pages. Whenever an Affiliate that you identified posts a new comment on their "Affiliate&#146;s
page" we notify you by highlighting their name in this section, so that you can simply click on
the name and go to their page to view the comment
'/></td>
                                    <td width="175" align="center" valign="middle" class="Verdana_11_fff_bold"><a href="index.php?stage=electedrepresentative&mode=electedrepresentativelist" class="Verdana_11_fff_bold question">Elected Representatives</a><img src="images/question_blue.png" class="icon-ques" style="cursor:pointer;" id='elected' title='We provide you with a list of your elected representatives here,
both state and federal. We provide you with their contact information, including; mailing
address, phone number, a map of their district and a link to their website
.'/></td>
									<td width="95" align="center" valign="middle" class="Verdana_11_fff_bold"><a href="index.php?stage=pages&mode=AboutUs" class="Verdana_11_fff_bold">About Us</a></td>
                                    <td width="75" align="center" valign="middle" class="Verdana_11_fff_bold"><a href="index.php?stage=pages&mode=Faq" class="Verdana_11_fff_bold">FAQs</a></td>
                                    <td width="100" align="center" valign="middle" class="Verdana_11_fff_bold"><a href="index.php?stage=pages&mode=ContactUs" class="Verdana_11_fff_bold">Contact Us</a></td>
                                    
									<td width="100" align="center" valign="middle">		
										<?php if (isset ( $_SESSION['username'] ) && $_SESSION['username'] != ''): ?>
																				<a title="Logout" class="Verdana_11_fff_bold" href="index.php?stage=member&amp;mode=memberLogout">
											<img src="images/btn_logout.gif" alt="" width="66" height="23" border="0" onclick="" title="Logout" /></a>
										<?php else: ?>
										<a title="Login" class="Verdana_11_fff_bold" href="index.php?stage=member&amp;mode=login">									
											<img src="images/img_login_nav.gif" alt="" width="66" height="23" border="0" title="Login"/>
										</a>
										<?php endif; ?>
									</td>
                                  </tr>
                                </table></td>
                                <td width="6" align="left" valign="top"><img src="images/img_nav_cor_2.jpg" width="6" height="28" alt="" /></td>
                              </tr>
                            </table></td>
                          </tr>
                        </table></td>
                      </tr>
                      <tr>
                        <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td align="left" valign="top" class="bg_f7f6f2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                <td align="left" valign="top" style="padding-top:7px;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                  <tr>
                                    <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                      <tr>
                                        <td width="488" align="left" valign="top" class="img_top_banner">&nbsp;</td>
                                        <td align="left" valign="top" style="padding:21px 65px 32px 23px;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                          <tr>
                                            <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                              <tr>
                                                <td align="left" valign="top"><img src="images/img_beheard.jpg" width="284" height="65" alt="" /></td>
                                              </tr>
                                              <tr>
                                                <td align="left" valign="top" style="padding:18px 0px 24px 0px;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                  <tr>
                                                    <td class="arial_17_3b393a"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                      <tr>
                                                        <td class="arial_17_3b393a">All too often Congress simply ignores you. VOICES provides its members with tools that will change that. VOICES is the lobbyist of THE PEOPLE.</td>
                                                      </tr>
                                                    </table></td>
                                                  </tr>
                                                </table></td>
                                              </tr>
                                              <tr>
                                                <td align="left" valign="top" style="padding:0px 44px 0px 3px;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                  <tr>
                                                    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                      <tr>
                                                        <td width="158" align="left" valign="top"><a href="index.php?stage=pages&mode=AboutUs"><img src="images/img_button_knowmore.jpg" alt="" width="142" height="34" border="0" /></a></td>
                                                        <td align="left" valign="top">
														<?php if (( ! isset ( $this->_tpl_vars['user_registration_register_view'] ) || ( isset ( $this->_tpl_vars['user_registration_register_view'] ) && ( $this->_tpl_vars['user_registration_register_view'] == 'Y' ) ) )): ?>  
															<a href="index.php?stage=subscriber&mode=SubscriberJoin">
																<img src="images/img_button_joinus.jpg" alt="" width="143" height="34" border="0" />
															</a>
														<?php endif; ?>
														</td>
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
                                </table></td>
                              </tr>
                            </table></td>
                          </tr>
                          <tr>
                            <td align="left" valign="top" style="padding-top:10px;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                <td align="left" valign="top" class="bg_c40306"><img src="images/trans.gif" width="1" height="5" alt="" /></td>
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
                <td align="left" valign="top"  style="padding-top:24px;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td align="left" valign="top" class="arial_12_3b393a" style="padding:0px 10px 0px 15px;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td align="left" valign="top"><span class="arial_12_000">VOICES provides the most advanced advocacy tools for government accountability and brings the democratic process into the 21st century. We provide the platform, YOU provide YOUR viewpoint. VOICES is non-partisan and completely neutral. </span><br /><br />
                              <span class="arial_14_c30100">Individuals:</span><br />
                              <span class="arial_12_000">YOU play a significant role in the governance process. After all, you elect your of?cials to of?ce with the expectation and hope that they will represent your viewpoints and interests. What VOICES does is to magnify your voice by combining it with the voices of others to register an opinion and to convey that opinion to your elected representatives. </span><a href="index.php?stage=pages&mode=AboutUs" class="arial_12_000_link">Read More</a>...<br /><br />
							  <span class="arial_14_c30100">Organizations:</span><br />
                              <span class="arial_12_000">YOUR organization is an important driver of content and process on VOICES. We provide the tools to connect your thought leadership with individuals and present a collective VOICE to legislators. </span><a href="index.php?stage=pages&mode=AboutUs" class="arial_12_000_link">Read More</a>...<br />
                              <br />
                              <span class="arial_14_c30100">Elected Officials:</span><br />
                              <span class="arial_12_000">VOICES provides the accountability that the political process lacks. When YOUR CONSTITUENTS weigh in on viewpoints expressed, their consolidated viewpoints are presented to you prior to voting on a new bill. In turn, a "report card"; is generated to show how well you are representing the people in your district. <a href="index.php?stage=pages&mode=AboutUs" class="arial_12_000_link">Read More</a>...</span></td>
                          </tr>
                        </table></td>
                        <td width="356" align="left" valign="top" style="padding-top:12px;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                <td align="left" valign="top"><img src="images/img_right_colum_corner1.gif" width="356" height="7" alt="" /></td>
                              </tr>
                              <tr>
                                <td align="left" valign="top" class="e6e6e6" style="padding:12px 41px 15px 34px;">
								
								<?php if (! isset ( $_SESSION['member_type'] )): ?>  
									<form id="signin" name="signin" method="post" action="">
									<table width="100%" border="0" cellspacing="0" cellpadding="0">
									 <?php if ($this->_tpl_vars['sErrorMessage'] != ""): ?>
									  <tr>
										<td height="10" align="left" valign="middle" class="error-message"><?php echo $this->_tpl_vars['sErrorMessage']; ?>
</td>
									  </tr>
									  <tr>
										<td width="189"><img src="images/trans.gif" alt="" width="1" height="1" /></td>
									  </tr>
									  <?php else: ?>
									  <tr>
										<td width="189"><img src="images/trans.gif" alt="" width="1" height="3" /></td>
									  </tr>
									  <?php endif; ?>
									  <tr>
										<td align="left" valign="top" class="Trebuchet_18_c50115">Login </td>
									  </tr>
									  <tr>
										<td align="left" valign="top" style="padding:10px 0px 17px 0px;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
										  <tr>
											<td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
											  <tr>
												<td width="33%" align="center" valign="middle" class="arial_12_000"><strong>Username</strong><strong>:</strong></td>
												<td width="67%" align="left" valign="top"><input type="username" name="username" id="textfield" style="width:208px;" value="<?php echo ((is_array($_tmp=@$_COOKIE['username'])) ? $this->_run_mod_handler('default', true, $_tmp, '') : smarty_modifier_default($_tmp, '')); ?>
" /></td>
											  </tr>
											</table></td>
										  </tr>
										  <tr>
											<td align="left" valign="top"><img src="images/trans.gif" width="1" height="9" alt="" /></td>
										  </tr>
										  <tr>
											<td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
											  <tr>
												<td width="33%" align="center" valign="middle" class="arial_12_000"><strong>Password:</strong></td>
												<td width="67%" align="left" valign="top"><input type="password" name="password" id="password" style="width:208px;" /></td>
											  </tr>
											</table></td>
										  </tr>
										</table></td>
									  </tr>
									  <tr>
										<td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
										  <tr>
											<td width="71" align="left" valign="middle">&nbsp;</td>
											<td width="24" align="left" valign="middle"><input type="checkbox" name="remember" id="remember" value="1"  <?php if (isset ( $_COOKIE['remember'] ) && $_COOKIE['remember'] == 1): ?> checked="checked" <?php endif; ?>/></td>
											<td width="85" align="left" valign="middle" class="arial_12_000">Remember Me</td>
											<td   align="right" valign="middle" class="arial_11_967947_bold"><a href="index.php?stage=member&mode=forgotpassword" class="arial_11_967947">Forgot Password?</a></td>
										  </tr>
										</table></td>
									  </tr>
									  <tr>
										<td height="55" align="left" valign="left"  style="padding-left:71px;">
										<input type='hidden' name='stage' value='member'/>
										<input type='hidden' name='mode' value='getInside'/>
										<input type="image" src="images/img_login.jpg" style="border:none" alt="Login" title="Login" width="81" height="28" border="0" /></td>
									  </tr>
									</table>
									</form>
								<?php else: ?>
									<?php if ($_SESSION['member_type'] == 'observer'): ?>
									<a title="My Profile" href="index.php?stage=subscriber&mode=MyProfile" id="my_dashboard_link">
										<div id="my_dashboard_login">
											<span class="arial_14_c30100_dashboard_login">Go</span>
											<span class="arial_14_000000_dashboard_login"> to</span><br />
											<span class="arial_14_000000_dashboard_login">My</span>
											<span class="arial_14_c30100_dashboard_login"> Profile</span>
										</div>
									</a>
									<?php else: ?>
										<?php if ($_SESSION['member_type'] == 'subscriber'): ?>
										<a title="My Dashboard" href="index.php?stage=subscriber&mode=MemberDashboard" id="my_dashboard_link">
										<?php elseif ($_SESSION['member_type'] == 'affiliate'): ?>
										<a title="My Dashboard" href="index.php?stage=affiliates&mode=AffiliateDashboard" id="my_dashboard_link">
										<?php else: ?>
										<a title="My Dashboard" href="index.php?stage=electedrepresentative&mode=electedrepresentativedashboard" id="my_dashboard_link">
										<?php endif; ?>
											<div id="my_dashboard_login">
											<span class="arial_14_c30100_dashboard_login">Go</span>
											<span class="arial_14_000000_dashboard_login"> to</span><br />
											<span class="arial_14_000000_dashboard_login">My</span>
											<span class="arial_14_c30100_dashboard_login"> Dashboard</span>
											</div>
										</a>
									<?php endif; ?>								
								<?php endif; ?>
								</td>
                              </tr>
                            </table></td>
                          </tr>
                        </table>
                          <img src="images/img_right_colum_corner2.gif" width="356" height="7" alt="" /></td>
                      </tr>
                    </table></td>
                  </tr>
                  <tr>
                    <td align="left" valign="top" style="padding-top:12px; padding-bottom:9px;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td align="left" valign="top" class="bg_c40306"><img src="images/trans.gif" width="1" height="2" alt="" /></td>
                      </tr>
                    </table></td>
                  </tr>
                  <tr>
                    <td align="left" valign="top" class="bg_f7f6f2"  style="padding:30px 8px 30px 8px;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td class="arial_16_c40306"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td align="left" valign="top" class="arial_16_c40306"><span class="Trebuchet_23_c40306">From the founder</span><br />
                              <br />
                              <span class="arial_12_000">I founded VOICES because I, like so many of you, feel that our elected representatives no longer listen to us. I believe that "of the people, by the people and for the people", means that we are the government; you and I, our neighbors and friends, and people that live in our community. We then elect
                                someone to represent our wishes in a forum such as the House of Representatives, or our state legislature.</span><span class="arial_12_3b393a"><br />
                                  <br />
                                  </span><span class="arial_12_000">Too many of these people promise to represent us, the government of the people, but once elected they think that they are the government. They then represent others; such as "special interest" groups; big business, big labor, and their party bosses. This has occurred because as individuals our voices are not loud enough. VOICES changes that by making our voices collective. When our elected representatives hear us speaking as a group, they will listen.
                                    Please take the time to read "<a href="index.php?stage=pages&mode=AboutUs" class="arial_12_a60000_bold">About VOICES</a>", and our <a href="index.php?stage=pages&mode=Faq" class="arial_12_a60000_bold">FAQ</a> section. I hope that you will agree that VOICES can you make you heard, again. If so, we will once again be the government; you and I, our neighbors and friends, and people that live in our community. I promise you that VOICES will remain true unto itself; it will not change, it will not be corrupted, it will make you heard as the people. </span></td>
                          </tr>
                        </table></td>
                      </tr>
                    </table></td>
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