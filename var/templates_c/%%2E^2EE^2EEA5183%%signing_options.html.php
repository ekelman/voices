<?php /* Smarty version 2.6.10, created on 2012-07-16 11:06:50
         compiled from visitor/ihtml/signing_options.html */ ?>
<?php echo '
<script>
	$(function() {
			$(\'#validate\').tipsy({gravity: \'n\'});			
	});
</script>
'; ?>

<tr>
<td align="left" valign="top"  style="padding-top:10px;">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
	<td align="left" valign="top" class="bg_f7f6f2"  style="padding:24px 15px 51px 12px;height:375px;">
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
	  <tr>
		<td class="arial_16_c40306"><table width="100%" border="0" cellspacing="0" cellpadding="0">
		  <tr>
			<td align="left" valign="top" class="arial_16_c40306"><table width="100%" border="0" cellspacing="0" cellpadding="0">
			  <tr>
				<td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
					<td height="37" align="left" valign="top" class="Trebuchet_18_c50115">Please select any one of the below options to sign the petition</td>
				  </tr>
				  <tr>
					<td align="left" valign="top" bgcolor="#b1b0ac" class="arial_20_c40306"><img src="images/trans.gif" width="1" height="1" alt="" /></td>
				  </tr>
				  <tr>
					<td align="center" valign="top" style="padding:27px 5px 15px 0px;">
					<table width="100%" border="0" cellspacing="0" cellpadding="0">
					<tr>
					<td width="32%" align="right">
					<table width="206" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                    	<td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                        	<td align="left" valign="top"><img src="images/img_right_colum_corner1.gif" width="206" height="7" alt="" /></td>
                        </tr>
                        <tr>
                        	<td align="center" valign="middle" class="e6e6e6">
                        	<a id="my_dashboard_link" href="index.php?stage=member&mode=login&article_id=<?php echo $this->_tpl_vars['articleID']; ?>
" title="Sign in to my account">
							<div id="my_dashboard_login" style="margin: 0;padding: 0;"><span class="arial_14_c30100_dashboard_login">Sign in to my</span><br /><span class="arial_14_000000_dashboard_login">existing account</span></div></a>								
							</td>
                        </tr>
						<tr>
                       	<td align="left" valign="top"><img src="images/img_right_colum_corner2.gif" width="206" height="7" alt="" /></td></tr>
                       	</table></td>
                    </tr>
                   	</table></td>
		<!--			
                   	<td valign="middle" width="8%" align="center"  class="arial_14_000000_dashboard_login">OR</td>
					<td width="20%" align="right">
					<table width="206" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                    	<td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                        	<td align="left" valign="top"><img src="images/img_right_colum_corner1.gif" width="206" height="7" alt="" /></td>
                        </tr>
                        <tr>
                        	<td align="center" valign="middle" class="e6e6e6">
                        	<a id="my_dashboard_link" href="index.php?stage=subscriber&amp;mode=SubscriberJoinDirect&article_id=<?php echo $this->_tpl_vars['articleID']; ?>
" title="Create a new Subscriber account">
							<div id="my_dashboard_login" style="margin: 0;padding: 0;"><span class="arial_14_c30100_dashboard_login">Create a new</span><br /><span class="arial_14_000000_dashboard_login">Subscriber account</span></div></a>								
							</td>
                        </tr>
						<tr>
                       	<td align="left" valign="top"><img src="images/img_right_colum_corner2.gif" width="206" height="7" alt="" /></td></tr>
                       	</table></td>
                    </tr>
                   	</table></td>
				-->					
					<td valign="middle" width="8%" align="center"  class="arial_14_000000_dashboard_login">OR</td>
					<td width="32%" align="left">
					<table width="206" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                    	<td align="left" valign="top">
                    	<table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                        	<td align="left" valign="top"><img src="images/img_right_colum_corner1.gif" width="206" height="7" alt="" /></td>
                       	</tr>
                        <tr>
                        	<td align="center" valign="middle" class="e6e6e6">
							<!--	
								<a id="my_dashboard_link" href="index.php?stage=visitor&mode=oneTimePaymentStepOne&article_id=<?php echo $this->_tpl_vars['articleID']; ?>
" title="Pay a one time fee">
									<div id="my_dashboard_login" style="margin: 0;padding: 0;">
										<span class="arial_14_c30100_dashboard_login">Pay a</span>
										<br />
										<span class="arial_14_000000_dashboard_login">one time fee</span>
									</div>
								</a>								
							-->	
								<a id="my_dashboard_link" href="index.php?stage=visitor&mode=oneTimePaymentStepOne&article_id=<?php echo $this->_tpl_vars['articleID']; ?>
" title="">
									<div id="my_dashboard_login" style="margin: 0;padding: 0;">
										<span class="arial_14_c30100_dashboard_login">Validate</span>
										<br />
										<span class="arial_14_000000_dashboard_login">my signature</span>
										<img src="images/question_blue.png" style="cursor:pointer;" id='validate' title='It is important that we verify your signature so that we can prove to your elected representative that you are his/her constituent. To do so we charge a fee of $<?php echo $this->_tpl_vars['oneTimePetitionSignFee']; ?>
.You will be taken to PAYPAL, we would not save your CREDIT CARD INFO. Paypal then sends us an email verifying that your account exists at your address. Therefore, we can prove that all signatures on the petition are valid. When you sign a petition we make you a VOICES member/observer and will email you a password. You can then view any actions that your elected rep takes as to the petition you signed. We also provide you the opportunity to see how many people signed the petition, provide the petition to the elected representatives of every signor of the petition .  You also will be provided with the names, addresses, phone numbers and email addresses of all of you state and federal representatives
.'/>
										<a href="index.php?stage=pages&mode=FAQ#7" title="Validate my signature FAQs" class="arial_11_967947">
											FAQs
										</a>										
									</div>
								</a>								
							</td>
                        </tr>
						<tr>                        	
							<td align="left" valign="top">
								<img src="images/img_right_colum_corner2.gif" width="206" height="15" alt="" />
							</td>
						</tr>
                        </table></td>
                    </tr>
                    </table></td>
					</tr>
					</table>
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
</table>
</td>
</tr>