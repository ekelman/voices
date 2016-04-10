<?php /* Smarty version 2.6.10, created on 2014-03-03 11:46:02
         compiled from affiliates/ihtml/affiliate_profile.html */ ?>
<tr>
	<td valign="top" align="left" style="padding-top: 10px;"><table width="100%" cellspacing="0" cellpadding="0" border="0">
	  <tbody><tr>
		<td valign="top" align="left" style="padding: 24px 15px 51px 12px;" class="bg_f7f6f2"><table width="100%" cellspacing="0" cellpadding="0" border="0">
		  <tbody><tr>
			<td class="arial_16_c40306"><table width="100%" cellspacing="0" cellpadding="0" border="0">
			  <tbody><tr>
				<td valign="top" align="left" class="arial_16_c40306"><table width="100%" cellspacing="0" cellpadding="0" border="0">
				  <tbody><tr>
					<td valign="top" align="left"><table width="100%" cellspacing="0" cellpadding="0" border="0">
					  <tbody>
					 <tr>
						<td valign="bottom" align="left" height="37" style="padding-bottom: 5px;" class="Trebuchet_27_c60000" colspan="2">Affiliate's Profile
							<div style="float:right; padding:10px 35px 0px 0px;">
								<a style="color: #C30100;font-family: Arial,Helvetica,sans-serif;font-size: 14px;font-weight: bold;" href="index.php?stage=affiliates&mode=EditProfile">Edit</a>
							</div>						
						
						</td>
					  </tr>
					  <tr>
						<td valign="top" bgcolor="#b1b0ac" align="left" class="arial_20_c40306" colspan="2"><img width="1" height="1" alt="" src="images/trans.gif">
						</td>
					</tr>
					
					<tr>
						<td valign="top" align="left" style="padding: 0px 5px 20px 0px;" class="arial_12_000" colspan="2"><p><?php echo $this->_tpl_vars['vAffiliate']->description; ?>
</p></td>
					</tr>
					<?php if ($this->_tpl_vars['vMsg'] != ''): ?>
					<tr>
						<td valign="middle" align="center" style="padding: 10px 0px 10px 0px;" class="arial_12_000 error-message" colspan="2"><?php echo $this->_tpl_vars['vMsg']; ?>
</td>
					</tr>
					<?php endif; ?>  
					<tr>
						<td valign="bottom" align="left" style="padding-bottom: 5px;" class="arial_14_c30100" colspan="2">
							Personal Information						
						</td>
					</tr>
					
					<tr>
						<td valign="top" bgcolor="#b1b0ac" align="left" class="arial_20_c40306" colspan="2"><img width="1" height="1" alt="" src="images/trans.gif"></td>
					</tr>
					
					<tr>
						<td valign="top" align="left" style="padding-top: 19px;" colspan="2">
						<table width="100%" cellspacing="0" cellpadding="0" border="0">
							<tbody>
								<!-- -->
								<tr>
									<td width="400" valign="top" align="left">
										<span class="arial_12_000"><strong>Contact First Name:</strong></span>
										<br>
										<?php echo $this->_tpl_vars['vAffiliate']->first_name; ?>

										<br><br>
									</td>
									
									<td width="86" valign="top" align="left">&nbsp;</td>
									<td valign="top" align="left">
										<span class="arial_12_000"><strong>Contact Last Name:</strong></span>
										<br>
										<?php echo $this->_tpl_vars['vAffiliate']->last_name; ?>

										<br><br>									
									</td>
								</tr>
							
							<tr>
								<td width="400" valign="top" align="left">
									<span class="arial_12_000"><strong>User Name:</strong></span>
									<br>
									 <?php echo $this->_tpl_vars['vAffiliate']->user_name; ?>

									  <br><br>
									
								</td>
								<td width="86" valign="top" align="left">&nbsp;</td>
								<td valign="top" align="left">
										<span class="arial_12_000"><strong>Email:</strong></span>
								<br>
									<?php echo $this->_tpl_vars['vAffiliate']->email; ?>

									  <br><br>								
								</td>
							</tr>
														
							<tr>
								<td width="400" valign="top" align="left">
									<span class="arial_12_000"><strong>Organization Name:</strong></span>
								<br>
									  <?php echo $this->_tpl_vars['vAffiliate']->organisation_name; ?>

									  <br><br>								
								</td>
								<td width="86" valign="top" align="left">&nbsp;</td>
								<td valign="top" align="left">
										<span class="arial_12_000"><strong>Organization Website:</strong></span>
									<br>
									<a href="<?php echo $this->_tpl_vars['vAffiliate']->organisation_website; ?>
" >
									  <?php echo $this->_tpl_vars['vAffiliate']->organisation_website; ?>

									</a> 
									
									<br><br>
									
								</td>
							</tr>
							
							<tr>
								<td colspan="3" valign="top" align="left">
									<span class="arial_12_000"><strong> Organization Profile:</strong></span>
									<br>
										<?php echo $this->_tpl_vars['vAffiliate']->description; ?>

									<br><br>									
								</td>
							</tr>


							<tr>
								<td colspan="3" valign="top" align="left">
									<span class="arial_12_000"><strong>Address:</strong></span>
									<br>
									<?php echo $this->_tpl_vars['vAffiliate']->street_address; ?>

									<br><br>									
								</td>
							</tr>	
								
							
							<tr>
								<td width="400" valign="top" align="left">								
									<span class="arial_12_000">
										<strong>City:</strong>
									</span>
									<br>
									<?php echo $this->_tpl_vars['vAffiliate']->city; ?>

									  <br><br>
									
								</td>
								<td width="86" valign="top" align="left">&nbsp;</td>
								<td valign="top" align="left">
									<span class="arial_12_000"><strong>State:</strong></span>
									<br>
										<?php echo $this->_tpl_vars['vAffiliate']->state; ?>

									<br><br>									
								</td>
							</tr>
							
							<tr>
								<td width="400" valign="top" align="left">
									<span class="arial_12_000">
									<strong>Country:</strong></span>
									<br>
									 <?php echo $this->_tpl_vars['vAffiliate']->country; ?>

									  <br><br>
																
									
								</td>
								<td width="86" valign="top" align="left">&nbsp;</td>
								<td valign="top" align="left">
									<span class="arial_12_000"><strong>Postal Code:</strong> </span>
									<br>
									<?php echo $this->_tpl_vars['vAffiliate']->zip_code; ?>

									 <br><br>									
									
								</td>
							</tr>
							<tr>
								<td width="400" valign="top" align="left">
									<span class="arial_12_000"><strong>Affiliate Code :</strong></span>
									<br>
									<?php echo $this->_tpl_vars['vAffiliate']->affiliate_code; ?>

									
									<br><br>								
								</td>
								<td width="86" valign="top" align="left">&nbsp;</td>
								<td valign="top" align="left">
								
									<span class="arial_12_000"><strong>Promo Code :</strong></span>
									<br>
									<?php echo $this->_tpl_vars['vAffiliate']->promo_code; ?>

									<br><br>
									
								
								</td>
							</tr>
							<?php if ($this->_tpl_vars['AffiliateContentPageHeaderView']): ?>								
							<tr>
								<td  valign="top" align="left" colspan="4"> 									
								
									<span class="arial_12_000"><strong>Banner:</strong></span>
									<br />
									<?php if ($this->_tpl_vars['vAffiliate']->banner != ''): ?>
									<span style="float:left;"><a href="<?php echo $this->_tpl_vars['siteurl']; ?>
/UserFiles/affiliates_logo/<?php echo $this->_tpl_vars['vAffiliate']->banner; ?>
" target="_blank">view banner</a>	
									</span>
									<?php else: ?>
									<span>No Banner uploaded.</span>
									<?php endif; ?>
								
								</td>
							</tr>
							<?php endif; ?>
						<!-- -->
						</tbody></table></td>
					  </tr>
					  
					</tbody></table></td>
				  </tr>
				 
				 
				</tbody></table></td>
				</tr>
			  </tbody></table></td>
			</tr>
		  </tbody></table></td>
	  </tr>
	</tbody></table></td>
  </tr>
  