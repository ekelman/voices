<?php /* Smarty version 2.6.10, created on 2014-03-03 11:44:39
         compiled from subscriber/ihtml/membership_upgrade.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_options', 'subscriber/ihtml/membership_upgrade.html', 156, false),array('function', 'html_checkboxes', 'subscriber/ihtml/membership_upgrade.html', 187, false),array('modifier', 'default', 'subscriber/ihtml/membership_upgrade.html', 165, false),)), $this); ?>
<?php echo '
	<script language="javascript" src="scripts/gen_validatorv4.js"></script>
	<script type=\'text/javascript\' src=\'scripts/jquery-1.3.2.min.js\'></script>
	<link rel="stylesheet" href="css/tipsy.css" type="text/css" />
	
	<script type="text/javascript" src="scripts/jquery.tipsy.js"></script>	
	<script type="text/javascript" src="../scripts/jquery.livequery.min.js"></script>

	<script type=\'text/javascript\'>
		function popup(url) 
		{
			params  = \'scrollbars=yes, width=\'+screen.width;
			params += \', height=\'+screen.height;
			params += \', top=0, left=0\';
			params += \', fullscreen=yes\';
		
			newwin = window.open(url,\'preview\', params);
			if (window.focus) {
				newwin.focus()
			}
			return false;
		}
		
		var codeexist = false;
		$(function() {
			$(\'#south\').tipsy({gravity: \'s\'});
			$(\'#south_2\').tipsy({gravity: \'s1\'});
		});
		
		$(\'#primary_affiliates\').livequery(\'change\', function(event) {
			if($(\'#primary_affiliates\').val() !=\'\') {
				$(\'#primary_affiliate_code_div\').hide();		
				//$(\'#primary_affiliate_code_detail\').html(\'Not required\');		
			}	
			else	{
				$(\'#primary_affiliate_code_div\').show();					
				//$(\'#primary_affiliate_code_detail\').html(\'\');		
			}
		}); 
		
	   
	   $(document).ready(function() {
	   
						
			$(\'#agree\').click(function(){
				$(\'#agree\').is(\':checked\') ? $(\'#is_agree\').attr(\'value\',\'1\') : $(\'#is_agree\').attr(\'value\',\'0\');
			});
			
			$(\'#agree\').change(function(){
				$(\'#agree\').is(\':checked\') ? $(\'#is_agree\').attr(\'value\',\'1\') : $(\'#is_agree\').attr(\'value\',\'0\');
			});		

			
			$(\'#primary_affiliate_code\').change(function(){
				$.ajax({					
				//this is the php file that processes the data and send mail
				url: "index.php?stage=subscriber&mode=CheckAffiliateCode",							 
				type: "GET",				 
				data: \'primary_affiliate_code=\' + $(this).val(),    							 
				cache: false,							 
				success: function(html) {            			
						if(html == 0) {
							$("#codeinfo").html("<span style=\'color:red\'>Affiliate code <strong>" + $("#primary_affiliate_code").val() + "</strong> does not exist.</span>");
							codeexist = false;
							$("#primary_affiliate_code").val(\'\');
						}
						else 
						{
							$("#codeinfo").html("<span style=\'color:green\'>Affiliate code <strong>" + $("#primary_affiliate_code").val() + "</strong> Exist.</span>");
							codeexist = true;
						}								
					}     
				});						
			});
		});
	</script>
'; ?>

<form name="membershipUpgrade" method="post" action="index.php?stage=subscriber&mode=membershipUpgrade">
	<table width="100%" cellspacing="0" cellpadding="0" border="0">
	<tbody>
	<tr>
		<td valign="top" align="left"  class="bg_f7f6f2">
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
						<td valign="top" align="left" height="37" class="Trebuchet_27_c60000" colspan="2">
						Membership Upgrade  
						</td>
					</tr>
					<tr>
						<td width="34%" valign="middle" align="left" style="padding-left: 14px;" class="topsublink_bg arial_15_000_bold">Upgrade to subscriber</td>
						<td width="73%" valign="middle" align="right" style="padding: 6px 14px;" class="topsublink_bg">
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
						</table>
						</td>
					</tr>
						
					<tr>
						<td valign="top" bgcolor="#b1b0ac" align="left"
							class="arial_20_c40306" colspan="2"><img
							width="1" height="1" alt=""
							src="images/trans.gif">
						</td>
					</tr>
					<?php if ($this->_tpl_vars['sErrorMsg'] != ''): ?>
					<tr>
						<td valign="middle" align="center" colspan="2" class="error-message" style="padding-top:10px;padding-bottom:10px;"><?php echo $this->_tpl_vars['sErrorMsg']; ?>
</td>
					</tr>
					<?php endif; ?>																					
					
					
					<tr>
						<td colspan="3">
					
					<table width="58%">																			
						<tr>
							<td valign="top" align="left" colspan="3"
								height="10">
							</td>
						</tr>
						
						
						
						<tr>						
							<td align="left" valign="top" >
								<table width="100%" border="0" cellspacing="0" cellpadding="0">
									<tr>
										<td width="397" height="55" align="left" valign="middle" class="arial_12_3b393a">
											
											<span class="arial_11_000"><strong><span class="error-message">*</span>Primary Affiliates:</strong></span><br />
											<select name="primary_affiliates" id="primary_affiliates" style="width:373px;" tabIndex="1" >
											<option value=''>---Select Primary Affiliate--</option>
											<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['oAffiliates'],'selected' => $this->_tpl_vars['oSubscriber']->primary_affiliates), $this);?>

											</select>
											<img src="images/img_icon.gif" style="cursor:pointer;" id='south' title='A prime affiliate is an organization of which you might be a member or an organization whose opinions you wish to follow. This organization may have asked you to join VOICES. The organization that you select will receive a referral fee. For more information on referral fees, please read our disclosure statement regarding referral fees.'/><br />
										
											<br />
										
											<div id="primary_affiliate_code_div">
											
												<span class="arial_11_000"><strong><span class="error-message">*</span>Primary affiliate Code:</strong></span><br />
													<input type="text" name="primary_affiliate_code" id="primary_affiliate_code" style="width:373px;" value="<?php echo ((is_array($_tmp=@$this->_tpl_vars['oSubscriber']->primary_affiliate_code)) ? $this->_run_mod_handler('default', true, $_tmp, '') : smarty_modifier_default($_tmp, '')); ?>
" />
													<span id="primary_affiliate_code_detail" class="arial_11_676767">									
													</span>
												<br />
												
												<span class="arial_11_676767">
													<span id="codeinfo">
													Select from the dropdown or type the affiliate code provided by your<br />
													 organization in the box above.<br />
													</span>
												<br /><br />
												</span>
											</div>
										
										</td>
									</tr>						  
									
									<tr>
										<td height="50" align="left" valign="middle" class="arial_12_3b393a"><table width="100%" border="0" cellspacing="0" cellpadding="0">
										  <tr>
											<td width="379" height="130" align="left" valign="top" class="arial_12_3b393a"><span class="arial_11_000"><strong>Additional Affiliates:</strong></span><br />
											  <div class='textbox'>		  
												<?php echo smarty_function_html_checkboxes(array('class' => 'test','name' => 'secondary_affiliates','id' => 'secondary_affiliates','options' => $this->_tpl_vars['oAffiliates'],'selected' => $this->_tpl_vars['oSubscriber']->secondary_affiliates,'separator' => "<br />",'tabIndex' => '2'), $this);?>
				
												</div>
											  <br /></td>
											<td width="22" align="left" valign="top" style="padding-top:14px;">
											<table width="100%" border="0" cellspacing="0" cellpadding="0">
											  <tr>
												<td><img id='south_2' style="cursor:pointer;" title='An affiliate is an organization of which you might be a member or an organization whose opinions you are interested in following. By selecting them as an affiliate, you will be able to view content they produce and weigh in on their ideas and opinions.' src="images/img_icon.gif" /></td>
											  </tr>
											</table></td>
										  </tr>
										</table></td>
									</tr>
								</table>						
							</td>
						
							<td width="86" align="left" valign="top">&nbsp;</td>
						
							<td align="left" valign="top" style="padding:27px 5px 15px 0px;">
							
							
							</td>
						</tr>
						
						<tr>
							<td colspan="3">
								<table width="100%" border="0" cellspacing="0" cellpadding="0">
									<tr>
										<td height="30" width="3%" align="left" valign="middle"><input type="checkbox" name="agree" id="agree" />
										<input type="hidden" name="is_agree" id="is_agree" value="0" />													
										</td>
										<td width="97%" align="left" valign="middle" class="arial_11_000" style="font-weight:normal;">
										<span class="error-message">*</span>&nbsp;I agree to pay subscription amount ($<strong><?php echo $this->_tpl_vars['subscriberMembershipFee']; ?>
</strong> annually / $<strong><?php echo $this->_tpl_vars['subscriberMembershipFeePromocode']; ?>
</strong> annually with promocode). 
										</td>
											<input type="hidden" name="subscriptionfee" id="subscriptionfee" value="<?php echo $this->_tpl_vars['subscriberMembershipFee']; ?>
" />
										
									</tr>												
								</table>
							</td>
						</tr>	
						
					</table>
					
					
						</td>
					</tr>	
					
					<tr>
						<td valign="top" align="left" height="37" class="Trebuchet_27_c60000" colspan="2">
							<table>
								<tr>
									<td height="50" align="left" valign="middle" class="arial_12_3b393a">
										<span class="arial_11_000">
										<strong>
										Promo Code:</strong></span><br />
										
										<input type="text" name="promo_code" id="promo_code" style="width:373px;" value="<?php echo $this->_tpl_vars['oSubscriber']->promo_code; ?>
" />
								
										<br />
										<span class="arial_11_676767">
											<span id="codeinfo">
												Enter promocode provided by your organization in the box above to pay only $<strong><?php echo $this->_tpl_vars['subscriberMembershipFeePromocode']; ?>
</strong> annually.
												
												
												<br />
											</span>
											<br /><br />
										</span>
									</td>
								</tr>									
							</table>
						</td>
					</tr>					

					</tbody>
					</table>
					</td>
				</tr>
				<tr>
					<td valign="top" align="left">&nbsp;</td>
				</tr>
				<tr>
					<td valign="top" bgcolor="#b1b0ac" align="left"><img
						width="1" height="1" alt="" src="images/trans.gif">
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
		<tr>
			<td valign="top" align="left" style="padding: 34px 365px 5px;">
			<table width="100%" cellspacing="0" cellpadding="0" border="0">
			<tbody>
			<tr>
				<td valign="middle" align="left">
				<input type="hidden" name="stage" value="subscriber" />
				<input type="hidden" name="mode" value="MembershipUpgradeSave" />
				<input type="hidden" name="member_id" value="<?php echo $this->_tpl_vars['oSubscriber']->member_id; ?>
" />
				<input type="submit" tabIndex="17"	name="submit" value=""
					style="background: url('images/img_submit_.gif') no-repeat; border: none; width: 78px; height: 27px; cursor: pointer;" />
				
				</td>
				<td valign="middle" align="right">
					<a href="index.php?stage=subscriber&mode=MyProfile">
						<img width="78" border="0" height="27" alt="" tabIndex="18" src="images/img_cancel.gif">
					</a>
				
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
	
	</form>
</td>
</tr>				  
<?php echo '
<script language=\'javascript\' type=\'text/javascript\'>
var form = document.forms["membershipUpgrade"];
	var frmvalidator	=	new Validator("membershipUpgrade");
	
	frmvalidator.setAddnlValidationFunction(DoCustomValidation);
	
    function DoCustomValidation()
	{
		var form = document.forms["membershipUpgrade"];
		
		if(document.forms[0].primary_affiliates.selectedIndex == \'0\')
		{
			
			if((document.getElementById("primary_affiliate_code").value == "") || (document.getElementById("primary_affiliate_code").value == undefined)){
				alert("Please select a primary affiliate or enter primary affiliate code.");
				// document.forms[0].primary_affiliate_code.focus();
				return false;
			} 			
			else if( isNaN(document.forms[0].primary_affiliates.value) && (codeexist == false) )
			{
				alert("Please enter correct affiliate code.");
				document.forms[0].primary_affiliate_code.focus();
				return false;
			}
			
		}		
	
		
		if(!form.agree.checked) {
		
			var subscriptionfee = form.subscriptionfee.value;
			alert("You need to agree to pay $"+subscriptionfee+" per month to create a subscriber account.");
			form.agree.focus();
			return false;
		}		

		return true;
	}
	
	function trim(str)
	{ 
		while(str.charAt(0) == (" ") )
		{ 
			str = str.substring(1);
		}		
		
		while(str.charAt(str.length-1) == " ")
		{ 
			str = str.substring(0,str.length-1);
		}
		return str;
	}
</script>
'; ?>
