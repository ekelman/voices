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
	//Manage Category
	$sAdminMenu[++$iCount]['Title'] = "Manage Category";
	$sAdminMenu[$iCount]['Link'] = array('Add Category','Edit Category','Delete Category');
	$sAdminMenu[$iCount]['Target'] = array('index.php?stage=category&mode=AddCategory','index.php?stage=category&mode=EditCategory','index.php?stage=category&mode=DeleteCategory');

	//Manage Location
	$sAdminMenu[++$iCount]['Title'] = "Manage Location";
	$sAdminMenu[$iCount]['Link'] = array('Add Location','Edit Location','Delete Location');
	$sAdminMenu[$iCount]['Target'] = array('index.php?stage=location&mode=AddLocation','index.php?stage=location&mode=EditLocation','index.php?stage=location&mode=DeleteLocation');

	//Manage Provinve
	$sAdminMenu[++$iCount]['Title'] = "Manage Province";
	$sAdminMenu[$iCount]['Link'] = array('Add Province','Edit Province','Delete Province');
	$sAdminMenu[$iCount]['Target'] = array('index.php?stage=province&mode=AddProvince','index.php?stage=province&mode=EditProvince','index.php?stage=province&mode=DeleteProvince');

	//Manage Benefits/Perks
	$sAdminMenu[++$iCount]['Title'] = "Manage Benefits/Perks";
	$sAdminMenu[$iCount]['Link'] = array('Add Benefits/Perks','Edit Benefits/Perks','Delete Benefits/Perks');
	$sAdminMenu[$iCount]['Target'] = array('index.php?stage=benefits&mode=AddBenefits','index.php?stage=benefits&mode=EditBenefits','index.php?stage=benefits&mode=DeleteBenefits');

	

	//Manage Referrer
	$sAdminMenu[++$iCount]['Title'] = "Manage Referrer";
	$sAdminMenu[$iCount]['Link'] = array('List Referrers');
	$sAdminMenu[$iCount]['Target'] = array('index.php?stage=referrer&mode=ListReferrers');
	
	//Manage Employer
	$sAdminMenu[++$iCount]['Title'] = "Manage Employer";
	$sAdminMenu[$iCount]['Link'] = array('List Employers');
	$sAdminMenu[$iCount]['Target'] = array('index.php?stage=employer&mode=ListEmployers');

	//Manage Accounts
	$sAdminMenu[++$iCount]['Title'] = "Manage Accounts";
	$sAdminMenu[$iCount]['Link'] = array('Employers Accounts','Referrer Accounts');
	$sAdminMenu[$iCount]['Target'] = array('index.php?stage=employer&mode=EmployerAccounts','index.php?stage=referrer&mode=ReferrerAccounts');

	$sAdminMenu[++$iCount]['Title'] = "Manage HotPosts";
	$sAdminMenu[$iCount]['Link'] = array('Add Hot Posts','List Hot Posts');
	$sAdminMenu[$iCount]['Target'] = array('index.php?stage=job&mode=ListJobs','index.php?stage=job&mode=ListHotPosts');


    $sAdminMenu[++$iCount]['Title'] = "Manage Content";
	$sAdminMenu[$iCount]['Link'] = array('List Pages');
	$sAdminMenu[$iCount]['Target'] = array('index.php?stage=pages&mode=enlist');
	
	$sAdminMenu[++$iCount]['Title'] = "Manage Languages";
	$sAdminMenu[$iCount]['Link'] = array('Add Language','Edit Language','Delete Language','Manage Messages','Manage Images');
	$sAdminMenu[$iCount]['Target'] = array('index.php?stage=languages&mode=AddLanguage','index.php?stage=languages&mode=EditLanguage','index.php?stage=languages&mode=DeleteLanguage','index.php?stage=languages&mode=ListMessages','index.php?stage=languages&mode=ListImages');



	$sAdminMenu[++$iCount]['Title'] = "Manage Press";
	$sAdminMenu[$iCount]['Link'] = array('List Press Articles','Add Press Article');
	$sAdminMenu[$iCount]['Target'] = array('index.php?stage=press&mode=ListPressArticles','index.php?stage=press&mode=AddPressArticle');
	
	$sAdminMenu[++$iCount]['Title'] = "Manage Work For Us";
	$sAdminMenu[$iCount]['Link'] = array('View Contents');
	$sAdminMenu[$iCount]['Target'] = array('index.php?stage=work&mode=ListWorks');
	
	$sAdminMenu[++$iCount]['Title'] = "Manage News";
	$sAdminMenu[$iCount]['Link'] = array('List News','Add News');
	$sAdminMenu[$iCount]['Target'] = array('index.php?stage=news&mode=ListNews','index.php?stage=news&mode=AddNews');

	//Manage Accounts
	$sAdminMenu[++$iCount]['Title'] = "Manage Newsletter";
	$sAdminMenu[$iCount]['Link'] = array('Download Employer Accounts','Download Referrer Accounts');
	$sAdminMenu[$iCount]['Target'] = array('index.php?stage=employer&mode=DownloadEmployerAccounts','index.php?stage=referrer&mode=DownloadReferrerAccounts');

	$sAdminMenu[++$iCount]['Title'] = "Manage Article";
	$sAdminMenu[$iCount]['Link'] = array('Manage Article');
	$sAdminMenu[$iCount]['Target'] = array('index.php?stage=article&mode=AddArticleInfo');
	
	$sAdminMenu[++$iCount]['Title'] = "Manage Payments";
	$sAdminMenu[$iCount]['Link'] = array('Payment Details');
	$sAdminMenu[$iCount]['Target'] = array('index.php?stage=employer&mode=PaymentDetails');
	
	$sAdminMenu[++$iCount]['Title'] = "Manage Emails";
	$sAdminMenu[$iCount]['Link'] = array('Emails For Referrer and Employers');
	$sAdminMenu[$iCount]['Target'] = array('index.php?stage=member&mode=ListEmails');

	//code added nidhi pasricha 04 july 2008
	$sAdminMenu[++$iCount]['Title'] = "Manage Seminars";
	$sAdminMenu[$iCount]['Link'] = array('Create Seminar','List Seminars');
	$sAdminMenu[$iCount]['Target'] = array('index.php?stage=referrer&mode=CreateSeminar','index.php?stage=referrer&mode=ListSeminars');

	
	$sAdminMenu[++$iCount]['Title'] = "Employer Pipeline Reports";
	$sAdminMenu[$iCount]['Link'] = array('Pipeline by Status of Candidate','Pipeline by Location: OPEN POSTINGS ONLY','Pipeline by Job Category: OPEN POSTINGS ONLY','Pipeline by Job Type: OPEN POSTINGS ONLY','Top Companies by Location','Top Companies by Job Category');
	$sAdminMenu[$iCount]['Target'] = array('index.php?stage=employer&mode=StatusCandidateReport','index.php?stage=employer&mode=StatusOpenPostingsReport','index.php?stage=employer&mode=OpenPostingsCategoryReport','index.php?stage=employer&mode=OpenJobTypeReport','index.php?stage=employer&mode=TopCompaniesLocation','index.php?stage=employer&mode=TopCompaniesCategory');

	$sAdminMenu[++$iCount]['Title'] = "Referrer Pipeline Reports";
	$sAdminMenu[$iCount]['Link'] = array('Pipeline by Target Salary Range','Pipeline by Job Category','Pipeline by Job Type','Pipeline by Province','Pipeline by Education','Pipeline by I have known this Candidate for','Pipeline by I know this Candidate','Top Referrers by Province','Top Referrers by Job Category');
	$sAdminMenu[$iCount]['Target'] = array('index.php?stage=referrer&mode=StatusSalaryRange','index.php?stage=referrer&mode=StatusJobCategory','index.php?stage=referrer&mode=StatusJobType','index.php?stage=referrer&mode=StatusJobProvince','index.php?stage=referrer&mode=StatusJobEducation','index.php?stage=referrer&mode=StatusJobKnown','index.php?stage=referrer&mode=StatusJobByIKnow','index.php?stage=referrer&mode=StatusJobTopReferrersByProvince','index.php?stage=referrer&mode=StatusJobTopReferrersByCategory');

	$sAdminMenu[++$iCount]['Title'] = "Operation Reports";
	$sAdminMenu[$iCount]['Link'] = array('Billing A/R','Referrer Payments, A/P','New postings','30 Day Guarantee');
	$sAdminMenu[$iCount]['Target'] = array('index.php?stage=employer&mode=BillingAR','index.php?stage=referrer&mode=ReferrerPaymentsAP','index.php?stage=job&mode=NewPostings','index.php?stage=employer&mode=Guarantee');


	$sAdminMenu[++$iCount]['Title'] = "Preferences";
	$sAdminMenu[$iCount]['Link'] = array('Change Password', 'Logout');
	$sAdminMenu[$iCount]['Target'] = array('index.php?stage=admin&mode=change_pass', '#');
	
	$sAdminMenu[$iCount]['Script'] = array('','logout();');
?>