<?php /* Smarty version 2.6.10, created on 2014-03-10 08:20:00
         compiled from pages/ihtml/basicpage.html */ ?>
<?php if (isset ( $this->_tpl_vars['ViewPage'] ) && ( $this->_tpl_vars['ViewPage'] != '' )): ?>
	<table width="100%">
		<tr>	
			<td align="left" valign="top" colspan="2" class="votealert_bg_new" style="padding: 16px 5px 11px 15px;">
				<table cellspacing="0" cellpadding="0" border="0" width="100%" >																
					<tr>
						<td align="center" valign="top">
						
						<div class="bg_f7f6ee"  >
							<?php echo $this->_tpl_vars['ViewPage']; ?>

						</div>
						
						</td>
					</tr>			
				</table>
			</td>
	
		</tr>
	</table>	
<?php else: ?>	
	<?php echo $this->_tpl_vars['Content1']; ?>

<?php endif; ?>	