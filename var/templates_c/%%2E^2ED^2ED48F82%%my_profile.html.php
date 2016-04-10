<?php /* Smarty version 2.6.10, created on 2014-03-03 12:39:55
         compiled from subscriber/ihtml/my_profile.html */ ?>
<?php echo '
<script language="javascript" src="scripts/gen_validatorv4.js"></script>
<script type=\'text/javascript\' src=\'scripts/jquery-1.3.2.min.js\'></script>
<script type="text/javascript">
		$(document).ready(function(){
		
		if ($(\'#billingInfoStatus\').attr(\'checked\')) {
			$("#billingSection").show();
		}
		else
		{
			$("#billingSection").hide();
		}


			$(\'#billingInfoStatus\').click(function(){
				$(\'#billingInfoStatus\').is(\':checked\') ? $("#billingSection").show() : $("#billingSection").hide();
			});
			
			$(\'#billingInfoStatus\').change(function(){
				$(\'#billingInfoStatus\').is(\':checked\') ? $("#billingSection").show() : $("#billingSection").hide();
			});
			
		});
	</script>
'; ?>

<tr>
<td valign="top" align="left" style="padding-top: 10px;">
<table width="100%" cellspacing="0" cellpadding="0" border="0">
	<tbody>
	<tr>
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
						<td valign="top" align="left" height="37" class="Trebuchet_27_c60000" colspan="2"><?php echo $this->_tpl_vars['ProfileInfo'][0]->first_name; ?>
 <?php echo $this->_tpl_vars['ProfileInfo'][0]->last_name; ?>
's Profile
						<span style="float:right;padding:15px 0px 0px 0px;">
								<a style="color: #C30100;font-family: Arial,Helvetica,sans-serif;font-size: 14px;font-weight: bold;" href="index.php?stage=subscriber&mode=ProfileEdit">Edit</a>
						</span>
						</td>	
						
					</tr>
					<tr>
						<td width="34%" valign="middle" align="left" style="padding-left: 14px;" class="topsublink_bg arial_15_000_bold">
						
						</td>
						<td width="66%" valign="middle" align="right" style="padding: 6px 14px;" class="topsublink_bg">
						<table cellspacing="0" cellpadding="0" border="0">
						<tbody>
							<tr>
																
								<?php if ($_SESSION['member_type'] == 'subscriber'): ?>													
								<td width="117" align="right" valign="top"><a href="index.php?stage=subscriber&mode=MyAffiliates" class="button"><span>My Affiliates</span></a></td>
								<td width="106" align="right" valign="top"><a class="button" href="index.php?stage=subscriber&mode=VoteAlerts"><span>Vote Alerts</span></a></td>																
								<td width="100" align="right" valign="top"><a class="Activebutton" href="index.php?stage=subscriber&mode=MyProfile" class="button"><span> My Profile</span></a></td>																								
								<?php endif; ?>															
								<td width="202" align="right" valign="top"><a href="index.php?stage=subscriber&mode=ElectedRepresentatives" class="button"><span>Elected Representatives</span></a></td>
								
							</tr>															
						</tbody>
						</table></td>
					</tr>
									
					<?php if ($this->_tpl_vars['ProfileInfo'][0]->member_type == 'observer'): ?>
					<tr>
						<td valign="bottom" align="left" height="37" style="padding-bottom: 5px;" class="arial_14_c30100" colspan="2">Upgrade your account</td>
						</tr>
					<tr>
						<td valign="top" bgcolor="#b1b0ac" align="left" class="arial_20_c40306" colspan="2">
							<img width="1" height="1" alt="" src="images/trans.gif">
						</td>
					</tr>
					<tr>
						<td valign="middle" align="left" style="padding-bottom:5px 5px 5px 5px;" class="arial_14_c30100" colspan="2">
						
						
						<div style="width:500px;float:left;padding:15px 0px 0px 0px;" class="arial_12_000">
							Upgrade your account by paying $<strong><?php echo $this->_tpl_vars['subscriberMembershipFee']; ?>
</strong> annually to have full access of the site.<br/>
							( Enter promocode to pay only $<strong><?php echo $this->_tpl_vars['subscriberMembershipFeePromocode']; ?>
</strong> annually.)
						</div>
						<div style="width:150px;float:right;padding:15px 35px 15px 5px;">

						
						<a class="Activebutton" href="index.php?stage=subscriber&mode=MembershipUpgrade"><span>Upgrade</span></a>															
						<!--
						<form action="<?php echo $this->_tpl_vars['oPaypal']->url; ?>
" method="post">
							<input type="hidden" name="cmd" value="_xclick">
							<input type="hidden" name="business" value="<?php echo $this->_tpl_vars['oPaypal']->business; ?>
">
							<input type="hidden" name="lc" value="US">
							<input type="hidden" name="item_name" value="<?php echo $this->_tpl_vars['oPaypal']->item_name; ?>
">
							<input type="hidden" name="amount" value="<?php echo $this->_tpl_vars['subscription_amount']; ?>
">
							<input type="hidden" name="currency_code" value="<?php echo $this->_tpl_vars['oPaypal']->currency_code; ?>
">
							<input type="hidden" name="button_subtype" value="services">
							<input type="hidden" name="bn" value="PP-BuyNowBF:btn_buynowCC_LG.gif:NonHosted">
							<input type="hidden" name="return" value="<?php echo $this->_tpl_vars['oPaypal']->return; ?>
">
							<input type="hidden" name="cancel_return" value="<?php echo $this->_tpl_vars['oPaypal']->cancel_return; ?>
">
							<input type="hidden" name="notify_url" value="<?php echo $this->_tpl_vars['oPaypal']->notify_url; ?>
">
							<input type="image" src="images/paypal.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
						</form>
						-->	
						</div>
						</td>
					</tr>					
					<?php endif; ?>
								
				
					<?php if ($this->_tpl_vars['message'] != ''): ?>
					<tr>
					<td valign="middle" align="center" style="padding: 10px 0 10px 0;" class="error-message" colspan="2">
						<?php echo $this->_tpl_vars['message']; ?>

					</td>
					</tr>
					<?php endif; ?>					
					
					<tr>
						<td valign="bottom" align="left" height="37" style="padding-bottom: 5px;" class="arial_14_c30100" colspan="2">Personal Infomation
							
						</td>
					</tr>
					<tr>
						<td valign="top" bgcolor="#b1b0ac" align="left" class="arial_20_c40306" colspan="2"><img width="1" height="1" alt="" src="images/trans.gif"></td>
					</tr>
					<tr>
					<td valign="top" align="left" style="padding-top: 19px;" colspan="2">
					<table width="100%" cellspacing="0" cellpadding="0" border="0">
						<tbody>
							<tr>						
								<td width="400" valign="top" align="left">
									<table width="100%" cellspacing="0" cellpadding="0" border="0">
										<tbody>
											<tr>
												<td width="397" valign="middle" align="left" height="50" class="arial_12_3b393a">
												<span class="arial_12_000"><strong>First Name:</strong></span><br />
												<?php echo $this->_tpl_vars['ProfileInfo'][0]->first_name; ?>

													<br /><br /></td>
											</tr>
										
											<tr>
												<td width="397" valign="middle" align="left" height="50" class="arial_12_3b393a">
												<span class="arial_11_000"><strong>User Name:</strong></span><br>
												<?php echo $this->_tpl_vars['ProfileInfo'][0]->user_name; ?>

													<br /><br /></td>
											</tr>
											
											
											<tr>
												<td width="397" valign="middle" align="left" height="50" class="arial_12_3b393a">
													<span class="arial_11_000"><strong>Address:</strong></span><br /><?php echo $this->_tpl_vars['ProfileInfo'][1][0]->mailAddress; ?>
<br /><br /></td>
											</tr>
											
																			
											<?php if ($_SESSION['member_type'] == 'subscriber'): ?>																								
										
											<tr>
												<td width="397" valign="middle" align="left" height="50" class="arial_12_3b393a">
												<span class="arial_11_000"><strong>Prime Afflliate:</strong></span><br />
														<?php echo $this->_tpl_vars['ProfileInfo'][1][0]->affiliate_name; ?>

													<br />
													<br /></td>
											</tr>
											<?php endif; ?>	
											
										</tbody>
									</table>
								</td>
						
								<td width="86" valign="top" align="left">&nbsp;</td>
								<td valign="top" align="left">
									<table width="100%" cellspacing="0" cellpadding="0" border="0">
										<tbody>
										<tr>
												<td width="397" valign="middle" align="left" height="50" class="arial_12_3b393a">
												<span class="arial_12_000"><strong>Last Name:</strong></span>
												<br />
												<?php echo $this->_tpl_vars['ProfileInfo'][0]->last_name; ?>

												<br /><br />
												</td>
										</tr>
										
										
										<tr>
											<td width="397" valign="middle" align="left" height="50" class="arial_12_3b393a">
												<span class="arial_12_000"><strong>Email:</strong></span><br />
												<?php echo $this->_tpl_vars['ProfileInfo'][0]->email; ?>

												<br /><br />
											</td>
										</tr>
										
										<tr>
												<td width="397" valign="middle" align="left" height="50" class="arial_12_3b393a">												
												<span class="arial_11_000"><strong>Billing Address:</strong></span><br /><?php echo $this->_tpl_vars['ProfileInfo'][1][0]->billAddress; ?>
<br /><br/></td>
										</tr>

																		
										<?php if ($_SESSION['member_type'] == 'subscriber'): ?>																								
										
										<tr>
											<td valign="middle" align="left" height="50" class="arial_12_3b393a">
											<table width="100%" cellspacing="0" cellpadding="0" border="0">
											<tbody>
											<tr>
												<td width="379" valign="top" align="left" class="arial_12_3b393a"><span class="arial_11_000"><strong>Additional Affiliates:</strong></span></td>
											</tr>
											<!--tr>
												<td width="379" valign="top" align="left" height="130" class="arial_12_3b393a"><?php echo $this->_tpl_vars['MyAffiliates']; ?>
</td-->
											<!--</tr>-->
											<?php echo $this->_tpl_vars['MyAffiliates']; ?>

											</tbody>
											</table></td>
										</tr>
										
										<?php endif; ?>
										
										<tr>
											<td>&nbsp;</td>
										</tr>
										</tbody>
									</table>
								</td>
								</tr>
								</tbody>							
							</table>
							</td>
							</tr>
							</table></td>
							</tr>
							<!-- Form Billing Section Ends Here -->
							</tbody>
						</table>
						</td>
						</tr>
						<tr>
							<td valign="top" colspan="3" bgcolor="#b1b0ac" align="left"><img width="1" height="1" alt="" src="images/trans.gif">
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
	</tr>
	</tbody>
</table>
</td>
</tr>