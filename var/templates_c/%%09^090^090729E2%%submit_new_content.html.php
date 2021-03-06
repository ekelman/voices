<?php /* Smarty version 2.6.10, created on 2014-03-02 17:17:19
         compiled from affiliates/ihtml/submit_new_content.html */ ?>
<?php echo '
<script language="javascript" src="scripts/gen_validatorv4.js"></script>

<!-- required plugins -->
<script type="text/javascript" src="scripts/date.js"></script>

<!-- jquery.datePicker.js -->
<script type="text/javascript" src="scripts/jquery.datePicker.js"></script>

<!-- page specific scripts -->
<script type="text/javascript">
	var billexist = false;
	var articleCreated = false;
	
	function changeDispVoting(currvalue) {
		if(currvalue == "bill") {
			$(\'#voting_row\').show();
			$(\'#voting_petition_row\').hide();
			$("input[name=\'mode\']").val("AddNewContent");			
		}
		else if(currvalue == "petition") {
			$(\'#voting_petition_row\').show();
			$(\'#voting_row\').hide();
			$("input[name=\'mode\']").val("AddNewContent");			
		}
		else {		
			$(\'#voting_row\').hide();
			$(\'#voting_petition_row\').hide();
			$("input[name=\'mode\']").val("AddNewNews");
		}
	}
	
	function validateMe() {
		
		var form = document.forms["affiliateBills"];
		var err = "";
		
		if(form.title.value == "") {
		
			err = "Please enter Title.";
		}//if
	
		if(form.affiliate_comment.value == "") {
		
			err = err + "\\nPlease enter Comment.";
		}//if
		
		if(form.article_type.value == "bill")
		{			
			if(form.bill_no.value != "")
			{
				if(!form.bill_no.value.match(/^[a-zA-Z0-9]+$/)) {
					
					err = err+ "\\nEnter Bill Number";
					form.bill_no.focus();
					//return false;
				}//if
				
				if(!billexist) {
					err = err+ "\\nBill Number not exist.";
					form.bill_no.focus();
					//return false;
				}//if
				
				if(articleCreated) {
					err = err+ "\\nAlready created an article for this Bill number.";
					form.bill_no.focus();
					//return false;
				}//if

				
			}//if
			else{
				err = err+ "\\nEnter Bill Number";
				form.bill_no.focus();
				//return false;				
			}
			
			if((!document.getElementById("indication_of_position1").checked)
					&&(!document.getElementById("indication_of_position2").checked))
			{
				err = err+ "\\nSelect indication of position.";
			}//if
			
			if((!document.getElementById("allow_voting1").checked)
					&&(!document.getElementById("allow_voting2").checked))
			{
				err = err+ "\\nSelect allow voting.";
			} else if( document.getElementById("allow_voting1").checked ) {
			
				if(form.voting_period_from.value == "")	
				{
					err = err+ "\\nSelect voting period.";
				}//if
			}
		}		
		else if(form.article_type.value == "petition") 
		{
			if(form.petition_level.value == "") {			
				err = err + "\\nPlease select Petition Level.";
				form.petition_level.focus();
			}//if
			
			if((form.petition_level.value == "State")&&(form.petition_state.value == "")){			
				err = err + "\\nPlease select a state.";
				form.petition_state.focus();
			}
			
			if(form.petition_voting_period_from.value == "")	
			{
				err = err+ "\\nSelect petition voting period start date.";
			}//if

			if(form.petition_voting_period_to.value == "")	
			{
				err = err+ "\\nSelect petition voting period end date.";
			}//if
			
			if((form.petition_voting_period_from.value != "") && (form.petition_voting_period_to.value != ""))
			{
				date1 = form.petition_voting_period_from.value;
				date2 = form.petition_voting_period_to.value;
				
				dateArr1 = date1.split("-");
				dateArr2 = date2.split("-");
				
				if((dateArr1.length ==3)&&(dateArr2.length ==3))
				{
					// var d = new Date(year, month, day, hours, minutes, seconds, milliseconds);	
					var jDate1 = new Date(dateArr1[0],dateArr1[1],dateArr1[2],0,0,0,0).getTime();
					var jDate2 = new Date(dateArr2[0],dateArr2[1],dateArr2[2],0,0,0,0).getTime();
					if(jDate1 >jDate2)
					{
						err = err+ "\\nPlease select start date lesser than end date.";						
					}	
						
				}
				else{
					err = err+ "\\nError in date format.";					
				}
			}	
			
		}
		
		if(err != "") {			
			alert(err);
			return false;
		} else {
			
			$("#overlay_div").show();
			return true;
		}//ef
		
	}//function

	$(function()
	{
		var overlay = jQuery(\'<div id="overlay_div"> </div>\');
		overlay.appendTo(document.body);
		var image_text = \'<img height="19" width="220" border="0" onclick="" alt="" src="images/ajax-loader_file.gif" style="align:center;vertical-align: middle;padding-top:30%;padding-left:40%;z-index: 10000;">\';
		$("#overlay_div").html(image_text);
		$("#overlay_div").hide();
		
		
		$(\'.date-pick\').datePicker({clickInput:true});						

		$("#bill_no").change(function(){

			var value = $("#bill_no").val();		
		
			if((value.length>1) && (value.match(/^[A-Za-z0-9]+$/)))
			{				
				billexist = true;
				articleCreated =false;
				$.ajax({					
					//this is the php file that processes the data and send mail
					url: "index.php?stage=affiliates&mode=ProcessBillNumber",							 
					type: "GET",				 
					data: \'val=\'+value,    							 
					cache: false,							 
					success: function(html) { 
						html = jQuery.trim(html);
						//alert(\'--\'+html+\'--\');
						$("#billinfo").removeClass("bill_not_exist");
						$("#billinfo").removeClass("bill_exist");
						
						if(html == \'\') {
							
							$("#billinfo").addClass("bill_not_exist");
							$("#billinfo").html("Bill does not exist");
							billexist = false;
							//alert("Bill number does not exist");
						}
						else if(html == \'0\') {									
							$("#billinfo").addClass("bill_not_exist");
							$("#billinfo").html("Bill already processed.");
							billexist = false;
							//alert("Bill number does not exist");
						}
						else if(html == \'02\') {									
							$("#billinfo").addClass("bill_not_exist");
							$("#billinfo").html("You have already created article on this bill.");
							articleCreated = true;
							// billexist = false;
							//alert("Bill number does not exist");
						} else {
							$("#billinfo").addClass("bill_exist");									
							$("#billinfo").html("Bill exist.");
							billexist = true;
							//alert("Bill exist.");
						}								
					}      
				});						
			} else {
			
				$("#billinfo").removeClass("bill_not_exist");
				$("#billinfo").removeClass("bill_exist");
			
				$("#billinfo").addClass("bill_not_exist");
				$("#billinfo").html("Bill number can only contain numbers and alphabets.");
				billexist = false;			
			}
		});
		
		$("#petition_level").change(function(){
			if($("#petition_level").val()=="State")
			{
				$("#petition_state").show();
				$("#petition_state_text").show();
			}
			else	{
				$("#petition_state").hide();
				$("#petition_state_text").hide();
			}
		});
	});
</script>

<!-- datePicker required styles -->
<link rel="stylesheet" type="text/css" href="/css/datePicker.css" />

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
			<table width="100%"	cellspacing="0" cellpadding="0" border="0">
			<tbody>
			<tr>
				<td valign="top" align="left" class="arial_16_c40306">
				<table width="100%" cellspacing="0" cellpadding="0" border="0">
				<tbody>
				<tr>
					<td valign="top" align="left">
					<table width="100%"	cellspacing="0" cellpadding="0" border="0">
					<tbody>
					<tr>
						<td valign="bottom" align="left" height="37" style="padding-bottom: 5px;" class="Trebuchet_27_c60000" colspan="2">Submit New Content</td>
					</tr>
					<tr>
						<td valign="top" bgcolor="#b1b0ac" align="left"	class="arial_20_c40306" colspan="2">
							<img width="1" height="1" alt="" src="images/trans.gif">
						</td>
					</tr>
					<tr>
						<td valign="top" bgcolor="#b1b0ac" align="left" class="arial_20_c40306" colspan="2">
							<img width="1" height="1" alt="" src="images/trans.gif">
						</td>
					</tr>
					<?php if ($this->_tpl_vars['vMsg'] != ''): ?>
					<tr>
						<td valign="bottom" align="center" class="error-message" colspan="2" height="25"><?php echo $this->_tpl_vars['vMsg']; ?>
</td>
					</tr>
					<?php endif; ?>
					<tr>
						<td valign="top" align="left" style="padding-top: 19px;" colspan="2">
						<table width="100%" border="0" cellspacing="0" cellpadding="0">
						<tr>
							<td>
							
							<form name="affiliateBills" id="affiliateBills" method="post" method='post' enctype="multipart/form-data" onsubmit="return validateMe();">
							<table width="100%" cellspacing="0" cellpadding="0">
							<tr>
								<td>
								<h3 class="formtitles"><span class="error-message">*</span> Title:</h3></td>
								<td width="155px">&nbsp;</td>
								<td>&nbsp;</td>
							</tr>
							<tr>
								<td valign="top"><input	class="borderBlack widthinput" type="text" name="title" /></td>
								<td height="30px">&nbsp;</td>
								<td valign="top">&nbsp;</td>
							</tr>
							<tr>
								<td colspan="3">
								<h3 class="formtitles"><span class="error-message">*</span> Summary comments:</h3>
								</td>
							</tr>
							<tr>
								<td colspan="3"><textarea name="affiliate_comment" class="borderBlack" style="width: 99.5%; height: 90px;"></textarea></td>
							</tr>
							<tr>
								<td colspan="3"><img src="images/trans.gif" height="10px" /></td>
							</tr>
							<tr>
								<td><h3 class="formtitles"><span class="error-message">*</span> Publish	To Section:</h3></td>
								<td width="155px">&nbsp;</td>
								<td>&nbsp;</td>
							</tr>
							<tr>
								<td valign="top">
								<select name="article_type" id="article_type" onchange="changeDispVoting(this.value)">								
									<option value="petition" selected="selected">Petition</option>									
									<?php if ($this->_tpl_vars['AffiliateContentBillsAdd']): ?>
										<option value="bill" >Bills</option>
									<?php endif; ?>
									<?php if ($this->_tpl_vars['AffiliateContentNewsAdd']): ?>
										<option value="news">News</option>
									<?php endif; ?>																
									<?php if ($this->_tpl_vars['AffiliateContentBulletinsAdd']): ?>
									<option value="bulletin">Bulletins</option>
									<?php endif; ?>										
									
								</select>
								
								
								
								</td>
								<td height="30px">&nbsp;</td>
								<td valign="top">&nbsp;</td>
							</tr>
							<?php if ($this->_tpl_vars['AffiliateContentBillsAdd']): ?>
							<tr id="voting_row"  style="display: none">
								<td colspan="3" style="border: 1px solid #C7C7C7; padding: 2px; margin-top: 10px;">
								<table width="100%" cellpadding="0" cellspacing="0">
								<tr>
									<td><h3 class="formtitles"><span class="error-message">*</span> Bill No:</h3></td>
									<td>&nbsp;</td>
									<td><h3 class="formtitles"><span class="error-message">*</span>Indication of Position:</h3></td>
								</tr>
								<tr>
									<td height="40px" valign="top">
									<input name="bill_no" class="borderBlack widthinput" type="text" id="bill_no" /><br />
									<span id="billinfo"> </span>
									</td>
									<td height="40px">&nbsp;</td>
									<td valign="top" width="350px">
									<table cellspacing="0" cellpadding="0" class="width350">
									<tr>
										<td>
										<input type="radio" name="indication_of_position" id="indication_of_position1" value="support" checked="checked"/>
										<span class="label" style="vertical-align: text-top;">I Support This Bill</span>
										</td>
										<td>
										<input type="radio" name="indication_of_position" id="indication_of_position2" value="oppose" />
										<span class="label" style="vertical-align: text-top;">I Oppose This Bill</span>
										</td>
									</tr>
									</table>
									</td>
								</tr>
								<tr>
									<td><h3 class="formtitles">
									<span class="error-message">*</span>
									Allow Voting:</h3>
									</td>
									<td>&nbsp;</td>
									<td><h3 class="formtitles"
											id="votingTitle">
										<span class="error-message">*</span>	
											Voting Period:</h3>
									</td>
								</tr>
								<tr>
									<td height="40px" valign="top">
									<table cellspacing="0" cellpadding="0" class="tblRadioBtns width350">
									<tr>
										<td width="100px">
										<input checked="checked" type="radio" name="allow_voting" id="allow_voting1" value="yes" onclick="document.getElementById('votingDiv').style.display='block';document.getElementById('votingTitle').style.display='block';" />
										<span class="label" style="vertical-align: text-top;">Yes</span>
										</td>
										<td>
										<input type="radio" name="allow_voting" value="no" id="allow_voting2" onclick="document.getElementById('votingDiv').style.display='none';document.getElementById('votingTitle').style.display='none';" />
										<span class="label" style="vertical-align: text-top;">No</span>
										</td>
									</tr>
									</table>
									</td>
									<td height="30px">&nbsp;</td>
									<td valign="top">
									<div id="votingDiv">
										<table class="width350">
										<tr>
											<td width="5%">
											<span class="label">From:</span>
											</td>
											<td width="10%">
											<input style="width: 145px;" class="borderBlack date-pick" type="text" name="voting_period_from" />
											</td>
										</tr>
										</table>
									</div>
									</td>
								</tr>
								</table>
								</td>
							</tr>
							<?php endif; ?>
							<tr id="voting_petition_row">
								<td colspan="3" style="border: 1px solid #C7C7C7; padding: 2px; margin-top: 10px;">
								<div id="votingDiv">
								<table class="" width="100%">
								<tr>
									<td colspan="4">
										<h3 class="formtitles" id="votingTitle">
										<span class="error-message">*</span>
										Signing
											Period:</h3></td>
									<td >
										<h3 class="formtitles" id="votingTitle">
										<span class="error-message">*</span>
										Petition Level:</h3></td>
									<td>
										<h3 class="formtitles" id="petition_state_text" style="display:none">										
										<span class="error-message">*</span>
										Petition State:</h3></td>
								</tr>
																															
								<tr>
									<td width="5%"><span class="label">From:</span>
									</td>
									<td width="20%"><input
										style="width: 145px;"
										class="borderBlack date-pick"
										type="text"
										name="petition_voting_period_from" />
									</td>
									<td width="5%"><span class="label">To:</span>
									</td>
									<td width="20%"><input
										style="width: 145px;"
										class="borderBlack date-pick"
										type="text"
										name="petition_voting_period_to" />
									</td>
									<td width="30%" aligh="left" >
										<select name="petition_level"
										id="petition_level">
											<option value="" selected="selected">Select</option>
											<option value="State">State</option>
											<option value="Federal">Federal</option>
										</select>
									</td>
									<td width="30%" aligh="left" >										
										<select name="petition_state" id="petition_state" style="display:none">
											<option value="" selected="selected">Select</option>											
											<?php unset($this->_sections['index']);
$this->_sections['index']['name'] = 'index';
$this->_sections['index']['loop'] = is_array($_loop=$this->_tpl_vars['StateList']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['index']['show'] = true;
$this->_sections['index']['max'] = $this->_sections['index']['loop'];
$this->_sections['index']['step'] = 1;
$this->_sections['index']['start'] = $this->_sections['index']['step'] > 0 ? 0 : $this->_sections['index']['loop']-1;
if ($this->_sections['index']['show']) {
    $this->_sections['index']['total'] = $this->_sections['index']['loop'];
    if ($this->_sections['index']['total'] == 0)
        $this->_sections['index']['show'] = false;
} else
    $this->_sections['index']['total'] = 0;
if ($this->_sections['index']['show']):

            for ($this->_sections['index']['index'] = $this->_sections['index']['start'], $this->_sections['index']['iteration'] = 1;
                 $this->_sections['index']['iteration'] <= $this->_sections['index']['total'];
                 $this->_sections['index']['index'] += $this->_sections['index']['step'], $this->_sections['index']['iteration']++):
$this->_sections['index']['rownum'] = $this->_sections['index']['iteration'];
$this->_sections['index']['index_prev'] = $this->_sections['index']['index'] - $this->_sections['index']['step'];
$this->_sections['index']['index_next'] = $this->_sections['index']['index'] + $this->_sections['index']['step'];
$this->_sections['index']['first']      = ($this->_sections['index']['iteration'] == 1);
$this->_sections['index']['last']       = ($this->_sections['index']['iteration'] == $this->_sections['index']['total']);
?>
												<option value="<?php echo $this->_tpl_vars['StateList'][$this->_sections['index']['index']]['abbr']; ?>
"><?php echo $this->_tpl_vars['StateList'][$this->_sections['index']['index']]['name']; ?>
</option>
											<?php endfor; endif; ?>
										</select>
									</td>
								</tr>
								</table>
								</div>
								</td>
							</tr>
							
							
							
							<tr>							
								<td colspan="3"><img
									src="images/trans.gif" height="10px" />
								</td>
							</tr>
							<tr>
								<td colspan="3" height="20px" valign="top">
									<h3 class="formtitles">
										Optional: <span class="smalltxt">
											(Upload a PDF to go with your article.)
											Max size - 5MB. </span>
									</h3></td>
							</tr>
							<tr>
								<td height="40px" valign="top" colspan="3">
									<input class="fileUpload" type="file"
									name="bill_name" id="bill_name" /></td>
							</tr>
							<tr>
								<td class="tdReqPadd20" colspan="3"
									align="center">
								<table width="20%">
								<tr>
									<td>
										<input type="hidden" name="affiliate_id" id="affiliate_id" value='<?php echo $this->_tpl_vars['affiliate_id']; ?>
' />
										<input type="hidden" name="stage" value='affiliates' />
										<input type="hidden" name="mode" value='AddNewContent' />
										<input name="submitNewBill" id="submitNewBill" class="btnBillSubmit" type="submit" title="submit" value="" style="cursor: pointer;" />
									</td>
									<td>
										<input name="cancelBill" class="btnBillCancel" type="cancel" title="cancel" onclick="javascript:window.location.href='index.php?stage=affiliates&mode=AffiliateDashboard'" value="" style="cursor: pointer;" />
									</td>
								</tr>
								</table>
								</td>
							</tr>
							</table>
							</form>
							
							</td>
						</tr>
						<!-- Bill Form Sec  END -->
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
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
</td>
</tr>