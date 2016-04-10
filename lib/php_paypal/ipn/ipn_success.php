<?php
/*
 * ipn_success.php
 *
 * PHP Toolkit for PayPal v0.50
 * http://www.paypal.com/pdn
 *
 * Copyright (c) 2004 PayPal Inc
 *
 * Released under Common Public License 1.0
 * http://opensource.org/licenses/cpl.php
 *
*/

//log successful transaction to file or database
include_once('../includes/global_config.inc.php'); 

create_csv_file("logs/ipn_success.txt",$_POST);

?> 