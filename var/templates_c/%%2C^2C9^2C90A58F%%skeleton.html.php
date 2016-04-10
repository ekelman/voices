<?php /* Smarty version 2.6.10, created on 2014-03-09 22:57:22
         compiled from admin/ihtml/skeleton.html */ ?>
<?php echo '
<noscript>Your Browser Does not Supports javascript. Please use javascript Enabled Browser.</noscript>
'; ?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title><?php echo $this->_tpl_vars['SiteName']; ?>
 - Administration</title>
<?php echo '
<style type="text/css">
<!--
body,td,th {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 11px;
	color: #000000;
}
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	background-image: url(images/main_bg.gif);
	background-repeat: repeat-x;
}
-->
</style>
<script type="text/JavaScript">
<!--
function setfocus()
{
	if(document.forms[0])
	{
		if(document.forms[0].elements[0])
		{
			if(document.forms[0].elements[0].type == "text")
			{
				document.forms[0].elements[0].focus();
			}
		}
	}
}
function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}

function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
//-->
</script>
'; ?>

<link href="css/admin.css" rel="styleSheet" type="text/css">
</head>

<body>
<table border="0" cellpadding="0" cellspacing="0" width="100%" height="100%">
	<tbody>
	<tr>
	<td align="left" valign="top" height="90" colspan="2"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/ihtml/header.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></td>
	</tr>
	<?php ob_start(); ?>
	<tr>
		<!-- Left -->
		<td width="25%" valign="top"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/ihtml/left.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></td>
		<!-- /Left -->
		<!-- Right -->
		<td valign="top">
			<table width="100%" border="0" cellspacing='0' cellpadding='0'>	
				<tr><td height="19px"></td></tr>			
				<tr><td align="center" class="error-message"><?php echo $this->_tpl_vars['Message']; ?>
</td></tr>
				<!-- /Message -->
				<!-- Content -->
				<tr><td><?php echo $this->_tpl_vars['Content']; ?>
</td></tr>
				<!-- /Content -->
			</table>
		</td>
		<!-- /Right -->
	</tr>
	<?php $this->_smarty_vars['capture']['AdminArea'] = ob_get_contents(); ob_end_clean(); ?>
 
	<?php ob_start(); ?> 
	<tr>	
    <td align="center" valign="top" colspan="2">
	<table border="0" cellpadding="0" cellspacing="0" width="100%">
    <tbody>
	<tr>
		<td class="middle" style="padding: 50px 0pt 160px;" align="left" valign="top">
		
		<table class="login" align="center" border="0" cellpadding="0" cellspacing="0" width="500">
        <tbody>
		<tr>
		<td class="widget-head" align="left" valign="top">Login</td>
		</tr>
        <tr>
		<td style="padding: 20px 10px;" align="left" valign="top">
		<form name="loginForm" method="post" action="index.php" onsubmit="return CheckAuthentication(loginForm);">
		<table border="0" cellpadding="0" cellspacing="3" width="100%">
        <tbody>
		<?php if (( isset ( $_REQUEST['sErrorMsg'] ) && ( $_REQUEST['sErrorMsg'] != "" ) ) || $this->_tpl_vars['sErrorMsg'] != ""): ?>
		<tr>
		<td colspan="2" class="error-message" align="center" valign=middle">
			<?php if ($_REQUEST['sErrorMsg'] != ""): ?>
				<?php echo $_REQUEST['sErrorMsg']; ?>

			<?php else: ?>
				<?php echo $this->_tpl_vars['sErrorMsg']; ?>

			<?php endif; ?>
		</td>
		</tr>
        <tr><td style="height:5px;" colspan="2">&nbsp;</td></tr>
		<?php endif; ?>		
		<tr>
		<td class="form-label" align="right" valign="middle" width="160">User Name:</td>
		<td><input type="text" name="Username" alt="blank"  id='username' class="form-inbox" maxlength="16" style='width:155px' value='<?php echo $this->_tpl_vars['Username']; ?>
'></td>
        </tr>
		<tr>
		<td class="form-label" align="right" valign="middle">Password:</td>
		<td><input type="password" name="Password" class="form-inbox" alt="blank"  value="" maxlength="16" style='width:155px'>
		</td>
		</tr>
		<tr>
		<td height="60" colspan="2" align="center" valign="middle">
		<input type="hidden" name="stage" value="admin">
		<input type="hidden" name="mode" value="login">
		<input type=image src="images/img_login.jpg" alt="Sign In" border="0" title="Login"/>
		</td>
		</tr>
		</tbody>
		</table>
		</form>
		</td>
    </tr>
	</tbody>
	</table>
	</td>
	</tr>
    </tbody>
	</table></td>
	</tr>
	<?php $this->_smarty_vars['capture']['LoginArea'] = ob_get_contents(); ob_end_clean(); ?>

	<?php if ($_SESSION['admin_user'] == ""): ?>
	<?php echo $this->_smarty_vars['capture']['LoginArea']; ?>

	<?php echo '
	<script type=\'text/javascript\'>
		function CheckAuthentication (f) 
		{	
			if(f.Username.value == "" || trim(f.Username.value)=="")
			{
				alert("Please enter User Name.");
				f.Username.focus();
				return false;
			}
		
			if(f.Password.value == "" || trim(f.Password.value)=="")
			{
				alert("Please enter Password.");
				f.Password.focus();
				return false;
			}
			return true;
		}
	
		function trim(str)
		{ 
			while(str.charAt(0) == (" "))
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
			
	<?php else: ?>
		<?php echo $this->_smarty_vars['capture']['AdminArea']; ?>

	<?php endif; ?>
	<tr><td colspan="2" align=center><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/ihtml/footer.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></td></tr>
	<!-- /Footer -->
	</tbody>
	</table>
	<!-- /Main Table -->	  
</body>
</html>