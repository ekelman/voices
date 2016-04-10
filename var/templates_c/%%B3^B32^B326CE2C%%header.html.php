<?php /* Smarty version 2.6.10, created on 2014-03-09 22:57:22
         compiled from admin/ihtml/header.html */ ?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <th height="110" align="left" scope="row"><a href="/admin"><img src="../admin/images/img_logo.gif" width="266" height="80" alt="Home" border="0" /></a></th>
  </tr>
  <tr>
    <th scope="row" style="padding-right:20px;" align="right" valign="middle"><?php if ($_SESSION['admin_user'] != ""): ?><a href="index.php?stage=admin&mode=logout" style="color:#ffffff;">Logout</a><?php endif; ?></th>
  </tr>
</table>