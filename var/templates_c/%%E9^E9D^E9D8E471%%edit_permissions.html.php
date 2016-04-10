<?php /* Smarty version 2.6.10, created on 2012-05-02 17:38:27
         compiled from accession/ihtml/edit_permissions.html */ ?>
<?php echo '

<script type="text/javascript" src="../scripts/jquery-1.3.2.min.js">
</script>
<script type="text/javascript" src="../scripts/jquery.livequery.min.js">
</script>


<script type="text/javascript">
	function changeUser(val)
	{			
		if(val!=\'\')
			window.location.href = "./index.php?stage=accession&mode=edit_permissions&userID="+val;
	}
	
	var htmlValue =\'\';
	
	$(document).ready(function() {
	
		$(\'.combo\').click(function() {
		
			id = this.id;			
			/* alert(this.id + " "+$(this).attr("id")); */
			
			/* don\'t do anything */
			if($(\'#\' + id + \' select\').size())
				return;
							
			value = id.split("-");
			
			content_id 	= value[1];
			category_id = value[2];
			user_id     = $("#user").val();
			
			if ( user_id == \'\') {
				alert("Select a user");
				return false;
			}
			
			// htmlValue = $("#" + id + " span").html().trim();			
			htmlValue = $("#" + id + " span").html();
			//alert(htmlValue)
			htmlValue = $.trim(htmlValue);
			
			//alert(htmlValue);
			if(htmlValue == \'Y\')
			{
				html = 	"<select id=\'select-"+ value[1] +\'-\'+ value[2] +"\' class=\'permission\'   style=\'width:50px;font-family: Arial,Helvetica,sans-serif;font-size: 11px;\'>" +
								"<option value=\'\'>--Select--</option>" +
								"<option value=\'Y\' selected=\'selected\'>Y</option>" + 
								"<option value=\'N\'>N</option>"	 +							
								"<option value=\'N/A\'>N/A</option>" + 	
								"</select>";
			}
			else if(htmlValue == \'N\')
			{
				html = 	"<select id=\'select-"+ value[1] +\'-\'+ value[2] +"\'  class=\'permission\'   style=\'width:50px;font-family: Arial,Helvetica,sans-serif;font-size: 11px;\'>" +
								"<option value=\'\'>--Select--</option>" +
								"<option value=\'Y\'>Y</option>" + 
								"<option value=\'N\'  selected=\'selected\'>N</option>"	 +							
								"<option value=\'N/A\'>N/A</option>" + 	
								"</select>";
			}
			else
			{
				html = 	"<select id=\'select-"+ value[1] +\'-\'+ value[2] +"\'  class=\'permission\'  style=\'width:50px;font-family: Arial,Helvetica,sans-serif;font-size: 11px;\'>" +
								"<option value=\'\'>--Select--</option>" +
								"<option value=\'Y\'>Y</option>" + 
								"<option value=\'N\'>N</option>"	 +							
								"<option value=\'N/A\' selected=\'selected\'>N/A</option>" +  
								"</select>";
			}

			$("#" + id + " span").html(html);
			
		});
		
		$(\'.permission\').livequery(\'change\', function() {
			// Live handler called.
			id = this.id;
			value = id.split("-");
		
			content_id 	= value[1];
			category_id = value[2];
			user_id     = $("#user").val(); 
			valueSend   = $(this).val();
			
			if($(this).val() == \'\')
			{
				alert("Please select a value.");
				return false;
			}	
			
			// ajax call
			$.ajax({					
						//this is the php file that processes the data and send mail
						url: "index.php?stage=accession&mode=save_permissions",							 
						type: "GET",				 
						data: \'usertype=\'+ user_id + \'&contenttype=\' + content_id + "&capabilitytype=" + category_id + \'&permission=\' + valueSend,    							 
						cache: false,							 
						success: function(html) {								
									
								if(html == 1) {
										// show data after ajaxcall
										if(valueSend == \'N/A\' )
											$("#div-" + content_id + \'-\' + category_id + " span").html(\'\');
										else
											$("#div-" + content_id + \'-\' + category_id + " span").html( valueSend );										
								}
								else {
									// alert(\'Error occurred. Please try again.\');
									window.location.reload();
								}								
							}									
						});		
			return false;		/// change function call itself againg this line is just to stop that 									
		});
	});
	
	
</script>
'; ?>


<table border=0  align="center" cellspacing="0" cellpadding="0" width="100%">
	<tr class="odd">
		<td align="center" >
			USER TYPE 
		</td>
		<td align="left">
			<select id="user" name="op_mode"  onchange="changeUser(this.value);">
				<option value="">--Select--</option>
					<?php $_from = $this->_tpl_vars['UserType']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
						<option value="<?php echo $this->_tpl_vars['key']; ?>
" <?php if ($this->_tpl_vars['key'] == $this->_tpl_vars['UserID']): ?> selected='selected' <?php endif; ?>>
							<?php echo $this->_tpl_vars['item']; ?>

						</option>
					<?php endforeach; endif; unset($_from); ?>		
			</select>					
		</td>
	</tr>
</table>

<br/>
<br/>
<?php echo '
<style type="text/css">
.permission td{
	border:solid 1px;
	align:left;
	margin:5px;
	padding:5px;
	min-width:80px;
	height:35px;
	
}

.scrollDiv {
	overflow:scroll;
	width:auto;
	padding-top:20px;
}

/*	.scrollDiv tr:hover{
	background:#f00;	} */
	
.heading{
	background:#aaa;		
} 	


.even {
	background:#eee;	
}
.odd {
	background:#ddd;	
}
.NA {
	background:#edd;	
}

</style>
'; ?>


<table border=0  align="left" cellspacing="0" cellpadding="0" style="border:none"  class="permission" >
	<tr > 
		<td style="width:180px;border:none">
			<table border=0  align="left" cellspacing="0" cellpadding="0" style="width:auto" >
					<tr class="heading">
						<td>
							RESOURCES
						</td>						
					</tr>				
				
				<?php unset($this->_sections['i']);
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['ContentData']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
					<td class="<?php if ($this->_sections['i']['iteration']%2 == 0): ?>heading<?php else: ?>odd<?php endif; ?>" >
						<span style="width:100px;">	
							<b>			
							<?php echo $this->_tpl_vars['ContentData'][$this->_sections['i']['index']]['section_name']; ?>
</b> 
							&nbsp;<?php echo $this->_tpl_vars['ContentData'][$this->_sections['i']['index']]['category_name']; ?>

						</span>	
					</td>					
				</tr>
				<?php endfor; endif; ?>				
			</table>
		
		</td>		
		
		<td style="border:none">
						<div>
				<table border=0  align="center" cellspacing="0" cellpadding="0" style="width:auto" >
					<tr class="heading">												
						<?php $_from = $this->_tpl_vars['CapabilityType']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
							<td>								
								<?php echo $this->_tpl_vars['item']; ?>

							</td>
						<?php endforeach; endif; unset($_from); ?>
					</tr>				

					<?php unset($this->_sections['i']);
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['ContentData']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
						<?php $_from = $this->_tpl_vars['CapabilityType']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>						
							<?php $this->assign('contentID', $this->_tpl_vars['ContentData'][$this->_sections['i']['index']]['id']); ?>																								
							
							
							<!--
							<?php if (( isset ( $this->_tpl_vars['PermissionData'][$this->_tpl_vars['contentID']][$this->_tpl_vars['key']] ) )): ?>		
							<td class="<?php if ($this->_sections['i']['iteration']%2 == 0): ?>odd<?php else: ?>even<?php endif; ?> combo"
								id="div-<?php echo $this->_tpl_vars['contentID']; ?>
-<?php echo $this->_tpl_vars['key']; ?>
">
																							
																							
									<span id="span-<?php echo $this->_tpl_vars['contentID']; ?>
-<?php echo $this->_tpl_vars['key']; ?>
" title="<?php echo $this->_tpl_vars['item']; ?>
">									
										<?php echo $this->_tpl_vars['PermissionData'][$this->_tpl_vars['contentID']][$this->_tpl_vars['key']]; ?>

									</span>											
							</td>
							<?php else: ?>
							<td class="NA combo">
								<span>
								</span>
							</td>
							<?php endif; ?>
								-->
							
							
							
							<td class="<?php if ($this->_sections['i']['iteration']%2 == 0): ?>odd<?php else: ?>even<?php endif; ?> combo"
								id="div-<?php echo $this->_tpl_vars['contentID']; ?>
-<?php echo $this->_tpl_vars['key']; ?>
">
								
																							
																							
								
								<span id="span-<?php echo $this->_tpl_vars['contentID']; ?>
-<?php echo $this->_tpl_vars['key']; ?>
" title="<?php echo $this->_tpl_vars['item']; ?>
">									
									<?php if (( isset ( $this->_tpl_vars['PermissionData'][$this->_tpl_vars['contentID']][$this->_tpl_vars['key']] ) )): ?>		
										<?php echo $this->_tpl_vars['PermissionData'][$this->_tpl_vars['contentID']][$this->_tpl_vars['key']]; ?>

									<?php endif; ?>		
								</span>											
							</td>
						
						<?php endforeach; endif; unset($_from); ?>
					</tr>
					<?php endfor; endif; ?>
				</table>
			</div>
					
		</td>		
	</tr>
</table>


