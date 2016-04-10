<?php /* Smarty version 2.6.10, created on 2013-01-25 10:44:01
         compiled from affiliate/ihtml/affiliate_join.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'default', 'affiliate/ihtml/affiliate_join.html', 129, false),)), $this); ?>
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
		
		/*
		$(\'#primary_afflliates\').livequery(\'change\', function(event) {
			if($(\'#primary_afflliates\').val() !=\'\') {
				$(\'#primary_afflliate_code\').hide();		
				$(\'#primary_afflliate_code_detail\').html(\'Not required\');		
			}	
			else	{
				$(\'#primary_afflliate_code\').show();					
				$(\'#primary_afflliate_code_detail\').html(\'\');		
			}
		}); 
		
		*/
	   
	   	$(document).ready(function(){
		
			if ($(\'#billingInfoStatus\').attr(\'checked\')) {
				$("#billingSection").show();
				$(\'#isBillingInfo\').attr(\'value\',\'1\');
			}
			else
			{
				$("#billingSection").hide();
			}

			$(\'#billingInfoStatus\').click(function(){
				$(\'#billingInfoStatus\').is(\':checked\') ? $("#billingSection").show() : $("#billingSection").hide();
				$(\'#billingInfoStatus\').is(\':checked\') ? $(\'#isBillingInfo\').attr(\'value\',\'1\') : $(\'#isBillingInfo\').attr(\'value\',\'0\');
			});
			
			$(\'#billingInfoStatus\').change(function(){
				$(\'#billingInfoStatus\').is(\':checked\') ? $("#billingSection").show() : $("#billingSection").hide();
				$(\'#billingInfoStatus\').is(\':checked\') ? $(\'#isBillingInfo\').attr(\'value\',\'1\') : $(\'#isBillingInfo\').attr(\'value\',\'0\');
			});
		/*
			$(\'#primary_afflliate_code\').change(function(){
				$.ajax({					
				//this is the php file that processes the data and send mail
				url: "index.php?stage=subscriber&mode=CheckAffiliateCode",							 
				type: "GET",				 
				data: \'primary_afflliate_code=\' + $(this).val(),    							 
				cache: false,							 
				success: function(html) {             			
						if(html == 0) {
							$("#codeinfo").html("<span style=\'color:red\'>Affiliate code  " + $("#primary_afflliate_code").val() + " does not exist.</span>");
							codeexist = false;
							$("#primary_afflliate_code").val(\'\');
						}
						else {
							$("#codeinfo").html("Affiliate  " + $(this).val() + " Exist.");
							codeexist = true;
						}								
					}	     
				});						
			});
		
		*/
		});
	</script>	
'; ?>

<tr>
<td align="left" valign="top"  style="padding-top:10px;">
<form name='subscriberJoin' method='post' enctype="multipart/form-data" >
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
	<td align="left" valign="top" class="bg_f7f6f2"  style="padding:24px 15px 51px 12px;">
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
	  <tr>
		<td class="arial_16_c40306">
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
		<tr>
			<td align="left" valign="top" class="arial_16_c40306">
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
			<tr>
				<td align="left" valign="top">
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
				<tr>
					<td height="37" align="left" valign="top" class="Trebuchet_27_c60000">Affiliate Registration</td>
				</tr>
				<tr>
					<td align="left" valign="top" bgcolor="#b1b0ac" class="arial_20_c40306"><img src="images/trans.gif" width="1" height="1" alt="" /></td>
				</tr>
				<?php if ($this->_tpl_vars['sErrorMsg'] != ''): ?>
				<tr>
					<td valign="bottom" align="center"  class="error-message" style="padding-top:10px;padding-bottom:10px;"><?php echo $this->_tpl_vars['sErrorMsg']; ?>
</td>
				</tr>
				<?php endif; ?>				  
				  
				  <tr>
					<td align="left" valign="top" style="padding:27px 5px 15px 0px;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
					  <tr>
						<td width="400" align="left" valign="top">
						
						
						<table width="100%" border="0" cellspacing="0" cellpadding="0">
							<tr>
								<td width="397" height="50" align="left" valign="middle" class="arial_12_3b393a">
								<span class="arial_11_000"><strong><span class="error-message">*</span>User Name:</strong></span>
								<br /><input type="text" name="user_name" id="user_name" style="width:373px;" value="<?php echo ((is_array($_tmp=@$this->_tpl_vars['oSubscriber']->user_name)) ? $this->_run_mod_handler('default', true, $_tmp, '') : smarty_modifier_default($_tmp, '')); ?>
" tabIndex="1" /><br /><br /></td>
							</tr>
							
							<tr>
								<td width="397" height="50" align="left" valign="middle" class="arial_12_3b393a"><span class="arial_12_000">
								<strong><span class="error-message">*</span>First Name:</strong></span><strong><br />
								<input type="text" name="first_name" id="first_name" style="width:373px;" value="<?php echo ((is_array($_tmp=@$this->_tpl_vars['oSubscriber']->first_name)) ? $this->_run_mod_handler('default', true, $_tmp, '') : smarty_modifier_default($_tmp, '')); ?>
"  tabIndex="3" /><br /><br /></td>
							</tr>
							
							<tr>	
								<td width="397" height="50" align="left" valign="middle" class="arial_12_3b393a"><span class="arial_11_000">
								<strong><span class="error-message">*</span>Password:</strong></span><br />
								  <input type="password" name="password" id="password" style="width:373px;"  tabIndex="5" />
								  <br /><br /></td>
							</tr>
							
						</table>
						
						
						</td>
						<td width="86" align="left" valign="top">&nbsp;</td>
						<td align="left" valign="top">						
						
						<table width="100%" border="0" cellspacing="0" cellpadding="0">					
							
							<tr>
								<td width="397" height="50" align="left" valign="middle" class="arial_12_3b393a"><span class="arial_11_000"><strong><span class="error-message">*</span>Email:</strong></span><br />
								<input type="text" name="email" id="email" style="width:373px;" value="<?php echo ((is_array($_tmp=@$this->_tpl_vars['oSubscriber']->email)) ? $this->_run_mod_handler('default', true, $_tmp, '') : smarty_modifier_default($_tmp, '')); ?>
"  tabIndex="2" /><br /><br /></strong></td>
							</tr>
							
							<tr>
								<td width="397" height="50" align="left" valign="middle" class="arial_12_3b393a"><span class="arial_12_000">
								<strong><span class="error-message">*</span>Last  Name:</strong></span><br />
								<input type="text" name="last_name" id="last_name" style="width:373px;" value="<?php echo ((is_array($_tmp=@$this->_tpl_vars['oSubscriber']->last_name)) ? $this->_run_mod_handler('default', true, $_tmp, '') : smarty_modifier_default($_tmp, '')); ?>
"  tabIndex="4" />
								<br /><br /></td>
							</tr>
							
							
							<tr>
								<td width="397" height="50" align="left" valign="middle" class="arial_12_3b393a"><span class="arial_11_000"><strong><span class="error-message">*</span>Confirm Password:</strong></span><br />
								<input type="password" name="re_password" id="re_password" style="width:373px;"  tabIndex="6" />
								<br /><br /></td>
							</tr>
							<?php 							
							/*
							<tr>
								<td width="397" height="55" align="left" valign="middle" class="arial_12_3b393a">
								<span class="arial_11_000"><strong><span class="error-message">*</span>Primary Affiliates:</strong></span><br />
									<select name="primary_afflliates" id="primary_afflliates" style="width:373px;" >
									<option value=''>---Select Primary Affiliate--</option>
									{html_options options=$oAffiliates selected=$oSubscriber->primary_afflliates}
									</select>
									<img src="images/img_icon.gif" style="cursor:pointer;" id='south' title='A prime affiliate is an organization of which you might be a member or an organization whose opinions you wish to follow. This organization may have asked you to join VOICES. The organization that you select will receive a referral fee. For more information on referral fees, please read our disclosure statement regarding referral fees.'/><br />
								  <br /></td>
							</tr>
							
							<tr>
								<td height="50" align="left" valign="middle" class="arial_12_3b393a">
								<span class="arial_11_000"><strong><span class="error-message">*</span>Primary affiliate Code:</strong></span><br />
								<input type="text" name="primary_afflliate_code" id="primary_afflliate_code" style="width:373px;" value="{$oSubscriber->primary_afflliate_code|default:''}" />
									<span id="primary_afflliate_code_detail" class="arial_11_676767">									
									</span>
								<br />
								<span class="arial_11_676767">
									<span id="codeinfo">
									 Select from the dropdown or type the affiliate code provided by your<br />
									 organization in the box above.<br />
									</span>
									<br /><br />
								</span></td>
							</tr>
							
							
							<tr>
								<td height="50" align="left" valign="middle" class="arial_12_3b393a"><table width="100%" border="0" cellspacing="0" cellpadding="0">
								<tr>
								<td width="379" height="130" align="left" valign="top" class="arial_12_3b393a"><span class="arial_11_000"><strong>Additional Affiliates:</strong></span><br />
								  <div class='textbox'>		  
									{html_checkboxes class="test" name="secondary_afflliates" id="secondary_afflliates" options=$oAffiliates selected=$oSubscriber->secondary_afflliates separator="<br />"}				
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
							*/
							 ?>
						</table>
						  
						</td></tr>
						
						<tr><td colspan="3">
					  	<table width="100%">
						<tr>
						<td><span class="arial_11_000"><strong><span class="error-message">*</span>Street Address:</strong></span><br />
							  <input type="text" name="address" id="address" style="width:373px;" value="<?php echo ((is_array($_tmp=@$this->_tpl_vars['oSubscriber']->mail_address)) ? $this->_run_mod_handler('default', true, $_tmp, '') : smarty_modifier_default($_tmp, '')); ?>
"  tabIndex="7" />
							  <br /><br /></td>
						<td></td>
						<td><span class="arial_11_000"><strong><span class="error-message">*</span>City:</strong></span><br />
							  <input type="text" name="city" id="city" value="<?php echo ((is_array($_tmp=@$this->_tpl_vars['oSubscriber']->mail_city)) ? $this->_run_mod_handler('default', true, $_tmp, '') : smarty_modifier_default($_tmp, '')); ?>
" style="width:373px;"  tabIndex="8" />
							  <br /><br /></td></tr>
						<tr>
						<td width="397" align="left" valign="middle" class="arial_12_3b393a"><span class="arial_11_000"><strong><span class="error-message">*</span>State:</strong></span><br />
							  <!--input type="text" name="state" id="state" value="<?php echo ((is_array($_tmp=@$this->_tpl_vars['oSubscriber']->mail_state)) ? $this->_run_mod_handler('default', true, $_tmp, '') : smarty_modifier_default($_tmp, '')); ?>
" style="width:373px;"  tabIndex="9" /-->
							  <select style="width: 373px;" id="state" name="state">
								<?php $_from = $this->_tpl_vars['States']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['state']):
?>
								<?php if ($this->_tpl_vars['state'] == $this->_tpl_vars['oSubscriber']->mail_state): ?>
								<option value="<?php echo $this->_tpl_vars['state']; ?>
" selected="selected"><?php echo $this->_tpl_vars['state']; ?>
</option>
								<?php else: ?>
								<option value="<?php echo $this->_tpl_vars['state']; ?>
"><?php echo $this->_tpl_vars['state']; ?>
</option>
								<?php endif; ?>
								<?php endforeach; endif; unset($_from); ?>
								</select>
							  <br /><br /></td>
						<td></td>
						<td width="397" align="left" valign="middle" class="arial_12_3b393a"><span class="arial_11_000"><strong><span class="error-message">*</span>Zip Code:</strong></span><br />
							  <input type="text" name="zip_code" id="zip_code" value="<?php echo ((is_array($_tmp=@$this->_tpl_vars['oSubscriber']->mail_postal_code)) ? $this->_run_mod_handler('default', true, $_tmp, '') : smarty_modifier_default($_tmp, '')); ?>
" style="width:373px;"  tabIndex="10" />
							  <br /><br /></td></tr>
						<tr>
						<td></td>
						<td></td>
						<td width="397" align="left" valign="middle" class="arial_12_3b393a"></td>
						</tr>
						</table>
						</td></tr>
						  <tr>
						  <td colspan="3" height="50">
						  <table width="100%" border="0" cellspacing="0" cellpadding="0">
							  <tr>
								<td width="3%" align="left" valign="middle">
								<?php if (isset ( $this->_tpl_vars['oSubscriber']->isBillingInfo )): ?>
									<?php if ($this->_tpl_vars['oSubscriber']->isBillingInfo == 1): ?>
									<input type="checkbox" name="billingInfoStatus" id="billingInfoStatus" checked="checked"  tabIndex="11" />
									<?php else: ?>
									<input type="checkbox" name="billingInfoStatus" id="billingInfoStatus"  tabIndex="11"/>
									<?php endif; ?>
								<?php else: ?>
								<input type="checkbox" name="billingInfoStatus" id="billingInfoStatus" checked="checked"  tabIndex="11" />
								<?php endif; ?>
								<input type="hidden" id="isBillingInfo" name="isBillingInfo" value=""/>
								</td>
								<td width="97%" align="left" valign="middle" class="arial_11_000">If Billing address is different?</td>
							  </tr>
							</table></td></tr>
							<tr><td colspan="3">
					  <!-- Billing Info table starts here -->
						<table id="billingSection" width="100%">
						<tr>
						<td><span class="arial_11_000"><strong><span class="error-message">*</span>Street Address:</strong></span><br />
							  <input type="text" name="billingAddress" id="billingAddress" style="width:373px;" value="<?php echo ((is_array($_tmp=@$this->_tpl_vars['oSubscriber']->billingAddress)) ? $this->_run_mod_handler('default', true, $_tmp, '') : smarty_modifier_default($_tmp, '')); ?>
"  tabIndex="12" />
							  <br /><br /></td>
						<td></td>
						<td><span class="arial_11_000"><strong><span class="error-message">*</span>City:</strong></span><br />
							  <input type="text" name="billingCity" id="billingCity" style="width:373px;" value="<?php echo ((is_array($_tmp=@$this->_tpl_vars['oSubscriber']->billingCity)) ? $this->_run_mod_handler('default', true, $_tmp, '') : smarty_modifier_default($_tmp, '')); ?>
"  tabIndex="13" />
							  <br /><br /></td></tr>
						<tr>
						<td width="397" align="left" valign="middle" class="arial_12_3b393a"><span class="arial_11_000"><strong><span class="error-message">*</span>State:</strong></span><br />
							  <input type="text" name="billingState" id="billingState" style="width:373px;" value="<?php echo ((is_array($_tmp=@$this->_tpl_vars['oSubscriber']->billingState)) ? $this->_run_mod_handler('default', true, $_tmp, '') : smarty_modifier_default($_tmp, '')); ?>
"   tabIndex="14" />
							  <br /><br /></td>
						<td></td>
						<td width="397" align="left" valign="middle" class="arial_12_3b393a"><span class="arial_11_000"><strong><span class="error-message">*</span>Zip Code:</strong></span><br />
							  <input type="text" name="billingZipCode" id="billingZipCode" style="width:373px;" value="<?php echo ((is_array($_tmp=@$this->_tpl_vars['oSubscriber']->billingZipCode)) ? $this->_run_mod_handler('default', true, $_tmp, '') : smarty_modifier_default($_tmp, '')); ?>
"  tabIndex="15" />
							  <br /><br /></td></tr>
						<tr>
						<td></td>
						<td></td>
						<td width="397" align="left" valign="middle" class="arial_12_3b393a"></td>
						</tr>
						</table>
						<!-- Billing Info table ends here -->
						</td></tr>
					</table></td>
				  </tr>
				</table></td>
			  </tr>
			  <tr>
				<td align="left" valign="top">
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
				<tr>
					<td width="3%" align="left" valign="middle">
					<input type="checkbox" name="i_agree_chk" id="i_agree_chk"  tabIndex="16" />					
					</td>
					<td width="97%" align="left" valign="middle" class="arial_11_000">
						<span class="error-message">*</span>
							I agree to the 
							<span onclick="popup('index.php?stage=pages&mode=EndUserAgreement')" class="enduseragree" style="background-color:none;cursor: pointer;">end user agreement</span>
							and 
							<span onclick="popup('index.php?stage=pages&mode=StatenetAgreement')" class="enduseragree" style="background-color:none;cursor: pointer;">State Net's terms and conditions</span>.
					</td>
				</tr>
				</table>
				</td>
			  <tr>
				<td align="left" valign="top"></td>
			  </tr>
			  <tr>
				<td align="left" valign="top" bgcolor="#b1b0ac"><img src="images/trans.gif" width="1" height="1" alt="" /></td>
			  </tr>
			  
			  <tr>
				<td align="left" valign="top" style="padding:34px 365px 5px 365px;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
					<td align="left" valign="middle">
					<input type="hidden" name="stage" value="subscriber" />
					<input type="hidden" name="mode" value="SaveSubscriberJoin" />
					<input type="image" src="images/img_submit_.gif" alt="" width="78" height="27" border="0" name="submit"  tabIndex="17" /></td>
					<td align="right" valign="middle"><img src="images/img_cancel.gif" alt="" width="78" height="27" border="0" onclick="window.location='index.php'" style="cursor:pointer;"  tabIndex="18" /></td>
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
</form>
</td>
</tr>				  
<?php echo '
<script language=\'javascript\' type=\'text/javascript\'>
var form = document.forms["subscriberJoin"];
	var frmvalidator	=	new Validator("subscriberJoin");
	frmvalidator.addValidation("first_name","req","Please enter your First Name.");
	frmvalidator.addValidation("first_name","alphabetic_space","Only alphabets are allowed in First Name.");
	frmvalidator.addValidation("last_name","req","Please enter your Last Name.");
	frmvalidator.addValidation("last_name","alphabetic_space","Only alphabets are allowed in Last Name.");
	frmvalidator.addValidation("user_name","req","Please enter User Name.");
	frmvalidator.addValidation("password","req","Please enter password.");
	frmvalidator.addValidation("password","alphanumeric","Please enter alpha numeric characters  in password.");
	frmvalidator.addValidation("re_password","req","Please enter confirm password.");
	frmvalidator.addValidation("re_password","alphanumeric","Please enter alpha numeric characters in confirm password.");
	frmvalidator.addValidation("email","req","Please enter Email.");
	frmvalidator.addValidation("email","email","Please enter a valid Email.");
	frmvalidator.addValidation("address","req","Please enter Address.");
	frmvalidator.addValidation("city","req","Please enter City.");
	frmvalidator.addValidation("state","req","Please enter state.");
	frmvalidator.addValidation("zip_code","req","Please enter zipcode.");
	frmvalidator.setAddnlValidationFunction(DoCustomValidation);
	
    function DoCustomValidation()
	{
		var form = document.forms["subscriberJoin"];
		
		/*
		if( isNaN(form.primary_afflliates.value) && (codeexist == false) )
		{
			alert("Please enter correct affiliate code.");
			form.primary_afflliate_code.focus();
			return false;
		}
		*/
		if(form.password.value=="")
		{
			alert("Please enter the Password.");
			form.password.focus();
			return false;
		}
		else if(form.password.value.length <6)
		{
		    alert("Password should be atleast of 6 characters.");
		    form.password.focus();
			return false;
		}
		else if(form.re_password.value=="")
		{
			alert("Please enter Confirm Password.");
			form.re_password.focus();
			return false;
		}
		else
		{
			 if(form.password.value != form.re_password.value){
				 alert("Confirm password does not matched.");
				 form.re_password.value="";
				 form.re_password.focus();
				 return false;
			}
		}		
		/*
		if(form.primary_afflliates.selectedIndex == \'0\'){
			if(form.primary_afflliate_code.value == ""){
				alert("Please select a primary affiliate or enter primary affiliate code.");
				form.primary_afflliate_code.focus();
				return false;
			} 
		}
		*/
		if(form.billingInfoStatus.checked){
			if(form.billingAddress.value == ""){
				alert("Please Enter Billing Address.");
				form.billingAddress.focus();
				return false;
			} 
			
			if(form.billingState.value == ""){
				alert("Please Enter Billing State.");
				form.billingState.focus();
				return false;
			} else {
				var charpos = form.billingState.value.search("[^A-Za-z\\\\s]");
				if (form.billingState.value.length > 0 && charpos >= 0)
				{
					alert("Billing State : Only alphabets are allowed.");
					form.billingState.focus();
					return false;
				} 
			}
			
			if(form.billingCity.value == ""){
				alert("Please Enter Billing City.");
				form.billingCity.focus();
				return false;
			} else {
				var charpos = form.billingCity.value.search("[^A-Za-z\\\\s]");
				if (form.billingCity.value.length > 0 && charpos >= 0)
				{
					alert("Billing City : Only alphabets are allowed.");
					form.billingCity.focus();
					return false;
				} 
			}
			
			if(form.billingZipCode.value == ""){
				alert("Please Enter Billing Zip Code.");
				form.billingZipCode.focus();
				return false;
			} else {
				var charpos = form.billingZipCode.value.search("[^A-Za-z0-9]");
				if (form.billingZipCode.value.length > 0 && charpos >= 0)
				{
					alert("Billing Zip Code : Only alphanumeric values are allowed.");
					form.billingZipCode.focus();
					return false;
				} 
			}			
		}
		
		if(!form.i_agree_chk.checked) {

			alert("You need to agree to end user agreement.");
			form.i_agree_chk.focus();
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
	