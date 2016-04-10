<?php
	/******************************************************************************************************
	* Author Name : Sandeep Singla
	* Creation Date : 14 May-2007
	* FileName : menu.php
	* Called From : modules/admin/classes/AdminView/ function name:setleftNavigation
	* Description : menu.php file provides theleft side navigation in admin Panel to manage various modules.
					$sAdminMenu, adouble dimensional array is used tostore the titles, links and targets of the links.
	* Components Used : NA
	* Tables Accessed : NA : Controls display of menu items only
	* Program Specs :
	* UTP doc :
	* Tested By :
	******************************************************************************************************/
	$iCount = 0;
	
	//Manage User
	$sAdminMenu[++$iCount]['Title'] = "Manage Members";
	$sAdminMenu[$iCount]['Link'] = array('List Members');
	$sAdminMenu[$iCount]['Target'] = array('index.php?stage=subscriber&mode=ListSubscriber');
	
	
	//Manage Elatoral
	$sAdminMenu[++$iCount]['Title'] = "Manage Elected Representatives";
	$sAdminMenu[$iCount]['Link'] = array('List Elected Representatives','List Elected Representative Accounts');
	$sAdminMenu[$iCount]['Target'] = array('index.php?stage=electedrepresentative&mode=listelectedrepresentative','index.php?stage=electedrepresentative&mode=listelectedrepresentativeaccounts');
	
	//Manage Affiliates
	$sAdminMenu[++$iCount]['Title'] = "Manage Affiliates";
	$sAdminMenu[$iCount]['Link'] = array('List Affiliates','Add Affiliates');
	$sAdminMenu[$iCount]['Target'] = array('index.php?stage=affiliates&mode=ListAffiliates','index.php?stage=affiliates&mode=AddAffiliates');
	
	//Manage CMS
    $sAdminMenu[++$iCount]['Title'] = "Manage CMS";
	$sAdminMenu[$iCount]['Link'] = array('List Pages');
	$sAdminMenu[$iCount]['Target'] = array('index.php?stage=pages&mode=enlist');

	$sAdminMenu[++$iCount]['Title'] = "Manage Permissions";
	
	/*	
	$sAdminMenu[$iCount]['Link'] = array('View Permissions','Add New Subscriber Group','List User Groups');
	$sAdminMenu[$iCount]['Target'] = array('index.php?stage=accession&mode=manage_permissions',
	'index.php?stage=accession&mode=addNewSubscriberGroup',
	'index.php?stage=accession&mode=listUserGroups');
	
	
	*/
	
	$sAdminMenu[$iCount]['Link'] = array('View Permissions');
	$sAdminMenu[$iCount]['Target'] = array('index.php?stage=accession&mode=manage_permissions'
	);


	
	//////
	$sAdminMenu[++$iCount]['Title'] = "Others";
	
	$sAdminMenu[$iCount]['Link'] = array('Petition Notification Statistics');
	$sAdminMenu[$iCount]['Target'] = array('index.php?stage=admin&mode=petition_details');
	///////
	
	
	$sAdminMenu[++$iCount]['Title'] = "Preferences";
	$sAdminMenu[$iCount]['Link'] = array('Change Password','Settings');
	$sAdminMenu[$iCount]['Target'] = array('index.php?stage=admin&mode=change_pass',
	'index.php?stage=setting&mode=list_settings');
	
?>