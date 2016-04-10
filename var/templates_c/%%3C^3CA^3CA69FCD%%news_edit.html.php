<?php /* Smarty version 2.6.10, created on 2013-01-28 09:45:28
         compiled from affiliates/ihtml/news_edit.html */ ?>
<?php echo '
<script language="javascript" src="scripts/gen_validatorv4.js"></script>

<style>
.bg_f7f6f2{padding: 12px 15px 0px 12px !important;}
</style>

<!-- page specific scripts -->
<script type="text/javascript">
	var billexist = false;
	var articleCreated = false;
	

	function validateMe() {
		
		var form = document.forms["affiliateBills"];
		var err = "";
		
		if(form.title.value == "") {
		
			err = "Please enter Title.";
		}//if
	
		if(form.affiliate_comment.value == "") {
		
			err = err + "\\nPlease enter Comment.";
		}//if
		
				
		
		
		if(err != "") {			
			alert(err);
			return false;
		} else {
			
			$("#overlay_div").show();
			return true;
		}//ef
		
	}//function

	
</script>

<!-- datePicker required styles -->
<link rel="stylesheet" type="text/css" href="/css/datePicker.css" />

'; ?>

<tr>
	<td valign="top" align="left" >
	<table width="100%" cellspacing="0" cellpadding="0" border="0">
	<tbody>
	<tr>
		<td valign="top" align="left"  class="bg_f7f6f2">						
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
						<td valign="bottom" align="left" height="37" style="padding-bottom: 5px;" class="Trebuchet_27_c60000" colspan="2">Edit Article</td>
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
								<td valign="top">
														
								<input	class="borderBlack widthinput" type="text" name="title" value="<?php echo $this->_tpl_vars['affiliateArticle']['article_title']; ?>
" /></td>
								<td height="30px">&nbsp;</td>
								<td valign="top">&nbsp;</td>
							</tr>
							<tr>
								<td colspan="3">
								<h3 class="formtitles"><span class="error-message">*</span> Summary comments:</h3>
								</td>
							</tr>
							<tr>
								<td colspan="3"><textarea name="affiliate_comment" class="borderBlack" style="width: 99.5%; height: 90px;"><?php echo $this->_tpl_vars['affiliateArticle']['affiliate_comment']; ?>
</textarea></td>
							</tr>
							<tr>
								<td colspan="3"><img src="images/trans.gif" height="10px" /></td>
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
									name="bill_name" id="bill_name" />
									<?php echo $this->_tpl_vars['affiliateArticle']['support_file']; ?>

									</td>
							</tr>
							<tr>
								<td class="tdReqPadd20" colspan="3"
									align="center">
								<table width="20%">
								<tr>
									<td>
										<input type="hidden" name="affiliate_id" id="affiliate_id" value='<?php echo $this->_tpl_vars['affiliateArticle']['affiliate_id']; ?>
' />
										<input type="hidden" name="article_id" id="article_id" value='<?php echo $this->_tpl_vars['affiliateArticle']['article_id']; ?>
' />
										<input type="hidden" name="article_type" id="article_type" value='<?php echo $this->_tpl_vars['affiliateArticle']['article_type']; ?>
' />
										<input type="hidden" name="stage" value='affiliates' />
										<input type="hidden" name="mode" value='UpdateNews' />
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