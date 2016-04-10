<?php /* Smarty version 2.6.10, created on 2014-03-02 17:15:13
         compiled from affiliates/ihtml/my_affiliates.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'count', 'affiliates/ihtml/my_affiliates.html', 87, false),array('modifier', 'html_entity_decode', 'affiliates/ihtml/my_affiliates.html', 110, false),)), $this); ?>
<?php echo '
<script language="javascript" src="scripts/jquery-1.3.2.min.js"></script>

<script type="text/javascript" charset="utf-8">	

$(document).ready(function(){
$(\'.bg_f7f6f2:first\').remove();
});
function delete_affiliate(id)
{
	
	if (confirm("Are you sure to delete this affiliate? "))
	  {
		location.href=\'index.php?stage=affiliates&mode=RemoveAffAssociation&id=\'+id;
	  }
	
}


</script>
'; ?>

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
						<td valign="top" align="left" height="37" class="Trebuchet_27_c60000" colspan="2"><?php echo $this->_tpl_vars['Name']; ?>
's Profile
						<span style="float:right;padding:15px 0px 0px 0px;">
								<a style="color: #C30100;font-family: Arial,Helvetica,sans-serif;font-size: 14px;font-weight: bold;" href="index.php?stage=affiliates&mode=EditProfile">Edit</a>
						</span>
						</td>	
						
					</tr>


										
																
																<tr>
																	<td width="34%" valign="middle" align="left" style="padding-left: 14px;" class="topsublink_bg arial_15_000_bold"></td>
																	<td width="66%" valign="middle" align="right" style="padding: 6px 14px;" class="topsublink_bg">
																	<table cellspacing="0" cellpadding="0" border="0">
																		<tbody>
																			<tr>
																												
																				<?php if ($_SESSION['member_type'] == 'affiliate'): ?>													
																					<td width="117" align="right" valign="top"><a href="index.php?stage=affiliates&mode=MyAffiliates" class="Activebutton"><span>My Affiliates</span></a></td>
																					<td width="126" align="right" valign="top"><a href="index.php?stage=affiliates&mode=AddNewSponsors"
																									class="button">
																									<span>
																										Add a sponsor
																									</span>
																								</a></td>																		
																					<td width="175" align="right" valign="top"><a
																								href="index.php?stage=affiliates&mode=SubmitNewContent"
																								class="button"><span>Submit New
																										Content</span>
																								</a></td>																										
																				<?php endif; ?>							
																					
																					<td width="115" align="right" valign="top"><a
																							href="index.php?stage=affiliates&mode=AffiliateProfile" class="button">
																								<span>View Profile</span>
																								</a></td>
																					
																			</tr>									
																		</tbody>
																	</table>
																	</td>
																</tr>
																<tr>
																	<td valign="bottom" align="left" height="37" style="padding-bottom: 5px;" class="arial_14_c30100" colspan="2">&nbsp;</td>
																</tr>
															
		<!--<tr>
			<td valign="top" align="left" style="padding: 16px 5px 11px 15px;" class="votealert_bg_new" colspan="2">			
				<table width="100%" cellspacing="0" cellpadding="0" border="0">
					<tbody>-->
					<?php if (isset ( $this->_tpl_vars['affiliate_content_page_header_view'] ) && $this->_tpl_vars['affiliate_content_page_header_view'] == 'Y'): ?>
					
					<?php if (((is_array($_tmp=$this->_tpl_vars['reqAffiliates'])) ? $this->_run_mod_handler('count', true, $_tmp) : count($_tmp)) != 0): ?>
					<tr><td valign="top" align="left" height="37" class="Trebuchet_27_c60000" colspan="2">New Association Requests</td></tr>
					<?php unset($this->_sections['i']);
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['reqAffiliates']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['show'] = true;
$this->_sections['i']['max'] = $this->_sections['i']['loop'];
$this->_sections['i']['step'] = 1;
$this->_sections['i']['start'] = $this->_sections['i']['step'] > 0 ? 0 : $this->_sections['i']['loop']-1;
if ($this->_sections['i']['show']) {
    $this->_sections['i']['total'] = $this->_sections['i']['loop'];
    if ($this->_sections['i']['total'] == 0)
        $this->_sections['i']['show'] = false;
} else
    $this->_sections['i']['total'] = 0;
if ($this->_sections['i']['show']):

            for ($this->_sections['i']['index'] = $this->_sections['i']['start'], $this->_sections['i']['iteration'] = 1;
                 $this->_sections['i']['iteration'] <= $this->_sections['i']['total'];
                 $this->_sections['i']['index'] += $this->_sections['i']['step'], $this->_sections['i']['iteration']++):
$this->_sections['i']['rownum'] = $this->_sections['i']['iteration'];
$this->_sections['i']['index_prev'] = $this->_sections['i']['index'] - $this->_sections['i']['step'];
$this->_sections['i']['index_next'] = $this->_sections['i']['index'] + $this->_sections['i']['step'];
$this->_sections['i']['first']      = ($this->_sections['i']['iteration'] == 1);
$this->_sections['i']['last']       = ($this->_sections['i']['iteration'] == $this->_sections['i']['total']);
?>								
						<tr>
						<td valign="top" align="left" colspan="2" class="votealert_bg_new" style="padding: 16px 5px 11px 15px;">
						<table width="100%" cellspacing="0" cellpadding="0" border="0">
						<tbody>
						<tr>						
							<td width="125" valign="top" align="left">
							<?php if ($this->_tpl_vars['reqAffiliates'][$this->_sections['i']['index']]['banner'] != ""): ?>
							<img width="125" height="99" alt="" src="./UserFiles/affiliates_logo/<?php echo $this->_tpl_vars['reqAffiliates'][$this->_sections['i']['index']]['banner']; ?>
" />
							<?php else: ?>
							<img width="125" height="99" alt="" src="./images/no-image.jpg" />
							<?php endif; ?>
							</td>
							<td width="20" valign="top" align="left">&nbsp;</td>
							<td width="732" valign="top" align="left">
								<table width="100%" cellspacing="0" cellpadding="0" border="0">
									<tbody>
										<tr>
											<td valign="top" align="left" height="22">
												<a href="index.php?stage=subscriber&mode=AffiliateDetails&id=<?php echo $this->_tpl_vars['reqAffiliates'][$this->_sections['i']['index']]['member_id']; ?>
"
													class="arial12Ba60000">
													<?php echo ((is_array($_tmp=$this->_tpl_vars['reqAffiliates'][$this->_sections['i']['index']]['organisation_name'])) ? $this->_run_mod_handler('html_entity_decode', true, $_tmp) : html_entity_decode($_tmp)); ?>

												</a>	
											</td>
										</tr>
										<tr>
											<td valign="top" align="left" class="arial_12_000">
											<?php echo ((is_array($_tmp=$this->_tpl_vars['reqAffiliates'][$this->_sections['i']['index']]['description'])) ? $this->_run_mod_handler('html_entity_decode', true, $_tmp) : html_entity_decode($_tmp)); ?>
</td>
										</tr>
										<tr>
											<td valign="bottom" align="left" height="26"><div style="float:left;with:300px">
											<!--<span class="arial12Ba60000">Dated: 
												<span class="arial11Na60000"> <?php echo $this->_tpl_vars['MyAffiliates'][$this->_sections['i']['index']]['reg_date']; ?>
 </span>
											</span>--></div><div style="float:right;with:300px;padding-right:20px;">
											<a href="index.php?stage=affiliates&mode=confirmAffAssociation&id=<?php echo $this->_tpl_vars['reqAffiliates'][$this->_sections['i']['index']]['member_id']; ?>
"	class="button"><span>Confirm Association</span></a><a href="index.php?stage=affiliates&mode=cancelAffAssociation&id=<?php echo $this->_tpl_vars['reqAffiliates'][$this->_sections['i']['index']]['member_id']; ?>
" class="button"><span>Not Confirm</span></a>
											</div></td>
										</tr>
									</tbody>
								</table>
							</td>
						</tr>
						</tbody>
						</table>
						</td>
						</tr>
						
						<?php endfor; endif; ?>
						
						<?php endif; ?>
						
						<tr><td valign="top" align="left" height="37" class="Trebuchet_27_c60000" colspan="2">My Associated Affiliates</td></tr>
						<?php if (((is_array($_tmp=$this->_tpl_vars['MyAffiliates'])) ? $this->_run_mod_handler('count', true, $_tmp) : count($_tmp)) != 0): ?>
					<?php unset($this->_sections['i']);
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['MyAffiliates']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['show'] = true;
$this->_sections['i']['max'] = $this->_sections['i']['loop'];
$this->_sections['i']['step'] = 1;
$this->_sections['i']['start'] = $this->_sections['i']['step'] > 0 ? 0 : $this->_sections['i']['loop']-1;
if ($this->_sections['i']['show']) {
    $this->_sections['i']['total'] = $this->_sections['i']['loop'];
    if ($this->_sections['i']['total'] == 0)
        $this->_sections['i']['show'] = false;
} else
    $this->_sections['i']['total'] = 0;
if ($this->_sections['i']['show']):

            for ($this->_sections['i']['index'] = $this->_sections['i']['start'], $this->_sections['i']['iteration'] = 1;
                 $this->_sections['i']['iteration'] <= $this->_sections['i']['total'];
                 $this->_sections['i']['index'] += $this->_sections['i']['step'], $this->_sections['i']['iteration']++):
$this->_sections['i']['rownum'] = $this->_sections['i']['iteration'];
$this->_sections['i']['index_prev'] = $this->_sections['i']['index'] - $this->_sections['i']['step'];
$this->_sections['i']['index_next'] = $this->_sections['i']['index'] + $this->_sections['i']['step'];
$this->_sections['i']['first']      = ($this->_sections['i']['iteration'] == 1);
$this->_sections['i']['last']       = ($this->_sections['i']['iteration'] == $this->_sections['i']['total']);
?>								
						<tr>
						<td valign="top" align="left" colspan="2" class="votealert_bg_new" style="padding: 16px 5px 11px 15px;">
						<table width="100%" cellspacing="0" cellpadding="0" border="0">
						<tbody>
						<tr>						
							<td width="125" valign="top" align="left">
							<?php if ($this->_tpl_vars['MyAffiliates'][$this->_sections['i']['index']]['banner'] != ""): ?>
							<img width="125" height="99" alt="" src="./UserFiles/affiliates_logo/<?php echo $this->_tpl_vars['MyAffiliates'][$this->_sections['i']['index']]['banner']; ?>
" />
							<?php else: ?>
							<img width="125" height="99" alt="" src="./images/no-image.jpg" />
							<?php endif; ?>
							</td>
							<td width="20" valign="top" align="left">&nbsp;</td>
							<td width="732" valign="top" align="left">
								<table width="100%" cellspacing="0" cellpadding="0" border="0">
									<tbody>
										<tr>
											<td valign="top" align="left" height="22">
												<a href="index.php?stage=subscriber&mode=AffiliateDetails&id=<?php echo $this->_tpl_vars['MyAffiliates'][$this->_sections['i']['index']]['member_id']; ?>
"
													class="arial12Ba60000">
													<?php echo ((is_array($_tmp=$this->_tpl_vars['MyAffiliates'][$this->_sections['i']['index']]['organisation_name'])) ? $this->_run_mod_handler('html_entity_decode', true, $_tmp) : html_entity_decode($_tmp)); ?>

												</a>	
											</td>
										</tr>
										<tr>
											<td valign="top" align="left" class="arial_12_000">
											<?php echo ((is_array($_tmp=$this->_tpl_vars['MyAffiliates'][$this->_sections['i']['index']]['description'])) ? $this->_run_mod_handler('html_entity_decode', true, $_tmp) : html_entity_decode($_tmp)); ?>
</td>
										</tr>
										<tr>
											<td valign="bottom" align="left" height="26"><div style="float:right;with:300px;padding-right:20px;">
											<a href="javascript:void(0);" onclick="delete_affiliate(<?php echo $this->_tpl_vars['MyAffiliates'][$this->_sections['i']['index']]['member_id']; ?>
)"	class="button"><span>Remove</span></a>
											</div></td>
										</tr>
									</tbody>
								</table>
							</td>
						</tr>
						</tbody>
						</table>
						</td>
						</tr>
						
						<?php endfor; endif; ?>
						<?php else: ?>
						<tr>
						<td valign="top" align="left" colspan="2" class="votealert_bg_new" style="padding: 16px 5px 11px 15px;">No Affiliates</td></tr>
						<?php endif; ?>
						
						<?php endif; ?>
						
							
												
																
																<tr>
																	<td valign="top" align="left" class="border_dashed" colspan="2"></td>
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
	
