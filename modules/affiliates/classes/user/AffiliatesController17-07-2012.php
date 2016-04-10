<?php
   session_start();
	/***********************************************************************************************************
		* Author Name		: Anil Nautiyal
		* Creation Date 	: 27th May-2011
		* FileName			: AffiliateController.php	[Front end]
		* Called From 		: index.php file.
		* Description		: SubscriberController file is used to control the SubscriberModel and SubscriberView                          files,it passes control according to the operation required.
		* Components Used 	: Validation for server side validations
		* Tables Accessed 	: none
		* Program Specs 	:     
		* UTP doc 			:
		* Tested By 		:  
	************************************************************************************************************/
	require_once($_CONF['ModulesPath'].'affiliates/classes/AffiliatesModel.php');
	require_once($_CONF['ModulesPath'].'accession/classes/AccessionModel.php');
										
	//contains constants that are used in this module
	require_once($_CONF['ModulesPath'].'system/classes/Validation.php');
										
	//contains validation functions
	require_once($_CONF['ModulesPath'].'system/functions.php');	
										    								    
	//contains some common functions 
	require_once($_CONF['ModulesPath'].'system/classes/extra/class.phpmailer.php');								    
	
	//contains some common data classes 
	require_once($_CONF['ModulesPath'].'system/classes/dataclasses.php');								    
	require_once($_CONF['ModulesPath'].'system/classes/extra/upload_class.php');	

	
	/***************************************************************
	*Class Header
	*Class Name    : AffiliatesController
	*Functionality : This class controls SubscriberModel and SubscriberView
					 to handle Subscribers on the site.
	*Note          : SubscriberController inherits UserController that 
 	                contains functions for the user site.
	***************************************************************/

	class AffiliatesController extends UserController
	{
		var $oModel;
		var $LogoFile;
		
		var $last_error = "";            // last error message set by this class
		var $last_time = 0;              // last function execution time (debug info)
		
		/***************************************************************************************
		*Function Header
		*Function Name  : AffiliatesController
		*Function Type  : Constructor	
		*Functionality  : Initializes objects of different classes 
		*Input			: nothing
		*Output			: Class objects
		*Return Value   : nothing
		*Note			: nothing
		****************************************************************************************/
		
		function AffiliatesController()
		{

			parent::UserController();
			$this->oModel	= new AffiliatesModel();
			
			$this->aModel	= new AccessionModel();			
			$this->aModel->checkAccessPermission();
			
			$this->oView	= new AffiliatesView();
			$oAffiliate 	= new Affiliate();
			
		}
		
		
		/*
		**************************************************************************************
		*function header
		*function name  : EmailMessage
		*function type  : call by value	
		*functionality  : Display the confirmation page of registeration.
		*input			: message to display,extra variable
		*output			: Display the confirmation page of registeration.
		*return value   : nothing
		*note			: nothing
		***************************************************************************************
		*/
		function EmailMessage($message,$extraVar1='')
		{
			if($_GET['message'])
			{
				$message = $_GET['message'];
			}
			$this->oView->message	=	$message;
			$this->oView->extraVar1 =	$extraVar1;
			$this->oView->EmailMessage();
		}//ef
		
		/*
		**************************************************************************************
		*function header
		*function name  : AffiliateDashboard
		*function type  : call by value	
		*functionality  : 
		*input			: 
		*output			: 
		*return value   : nothing
		*note			: nothing
		***************************************************************************************
		*/
		function AffiliateDashboard()
		{		
			$this->AffiliateAuthenticate();
			
			if(isset($_REQUEST["msg"]))
			{
				$msg = $_REQUEST["msg"];
			}
			
		    global $_CONF;
			
			/* permissions */
			
			$this->oView->affiliate_content_news_view 	= false; 			
			$this->oView->affiliate_content_news_add 	= false; 
			$this->oView->affiliate_content_news_edit 	= false; 
			$this->oView->affiliate_content_news_delete 	= false; 
			
			
			$this->oView->affiliate_content_bills_view 	= false; 
			$this->oView->affiliate_content_bills_add 	= false; 
			$this->oView->affiliate_content_bills_edit 	= false; 
			$this->oView->affiliate_content_bills_delete 	= false; 
			
			$this->oView->affiliate_content_bulletins_view 	= false; 
			$this->oView->affiliate_content_bulletins_add 	= false; 
			$this->oView->affiliate_content_bulletins_edit 	= false; 
			$this->oView->affiliate_content_bulletins_delete 	= false; 
			
			$this->oView->affiliate_content_petitions_view 	= false; 
			$this->oView->affiliate_content_petitions_add 	= false; 
			$this->oView->affiliate_content_petitions_edit 	= false; 
			$this->oView->affiliate_content_petitions_delete 	= false; 
			
			$this->oView->affiliate_content_page_header_view 				= false; 			
			$this->oView->affiliate_content_page_header_modify_own_content 	= false; 			
			
			if( $this->aModel->checkSpecificAccessPermission("Affiliate Content","News","View") )
				$this->oView->affiliate_content_news_view = true; 								
			if( $this->aModel->checkSpecificAccessPermission("Affiliate Content","News","Add") )
				$this->oView->affiliate_content_news_add = true; 													
			if( $this->aModel->checkSpecificAccessPermission("Affiliate Content","News","Modify Own Content") )
				$this->oView->affiliate_content_news_edit = true; 													
			if( $this->aModel->checkSpecificAccessPermission("Affiliate Content","News","Delete") )
			$this->oView->affiliate_content_news_delete = true; 													
			
			
			if( $this->aModel->checkSpecificAccessPermission("Affiliate Content","Bills","View") )
				$this->oView->affiliate_content_bills_view = true; 								
			if( $this->aModel->checkSpecificAccessPermission("Affiliate Content","Bills","Add") )
				$this->oView->affiliate_content_bills_add = true; 	
			if( $this->aModel->checkSpecificAccessPermission("Affiliate Content","Bills","Modify Own Content") )
				$this->oView->affiliate_content_bills_edit = true; 	
			if( $this->aModel->checkSpecificAccessPermission("Affiliate Content","Bills","Delete") )
				$this->oView->affiliate_content_bills_delete = true; 			
			
			if( $this->aModel->checkSpecificAccessPermission("Affiliate Content","Bulletins","View") )
				$this->oView->affiliate_content_bulletins_view = true; 								
			if( $this->aModel->checkSpecificAccessPermission("Affiliate Content","Bulletins","Add") )
				$this->oView->affiliate_content_bulletins_add = true; 													
			if( $this->aModel->checkSpecificAccessPermission("Affiliate Content","Bulletins","Modify Own Content") )
				$this->oView->affiliate_content_bulletins_edit = true; 	
			if( $this->aModel->checkSpecificAccessPermission("Affiliate Content","Bulletins","Delete") )
				$this->oView->affiliate_content_bulletins_delete = true; 

			if( $this->aModel->checkSpecificAccessPermission("Affiliate Content","Petitions","View") )
				$this->oView->affiliate_content_petitions_view = true; 								
			if( $this->aModel->checkSpecificAccessPermission("Affiliate Content","Petitions","Add") )
				$this->oView->affiliate_content_petitions_add = true; 													
			if( $this->aModel->checkSpecificAccessPermission("Affiliate Content","Petitions","Modify Own Content") )
				$this->oView->affiliate_content_petitions_edit = true; 	
			if( $this->aModel->checkSpecificAccessPermission("Affiliate Content","Petitions","Delete") )
				$this->oView->affiliate_content_petitions_delete = true; 				
				
			if( $this->aModel->checkSpecificAccessPermission("Affiliate Content","Page Header","View") )
				$this->oView->affiliate_content_page_header_view = true; 								
			if( $this->aModel->checkSpecificAccessPermission("Affiliate Content","Page Header","Modify Own Content") )
				$this->oView->affiliate_content_page_header_modify_own_content = true; 													
			
			/** permissions **/
			
			
			$loggedInAffiliate = $_SESSION['username'];
			$affID = $this->oModel->getAffiliateID($loggedInAffiliate);
			$oAffiliate = $this->oModel->getAffiliate($affID);
			$this->oView->vAffiliate = $oAffiliate;			
			
			
			//get Affiliates votealert	
			// not required		
			$this->oView->affiliateVoteAlerts = $this->oModel->getAffiliateVoteAlerts( $affID );			
			//get Affiliates votealert
			$this->oView->affiliatePetitions = $this->oModel->getAffiliatePetitions( $affID );			
			$this->oView->affiliateNews = $this->oModel->getAffiliateNews( $affID );
			$this->oView->affiliateBulletin = $this->oModel->getAffiliateBulletin( $affID );
			
			$this->oView->affiliateSponsor = $this->oModel->getAffiliateSponsor( $affID );
			
			
			$this->oView->vMsg = $msg; 			
			$this->oView->AffiliateDashboard();
		}//ef	


		/*
		************************************************************************************
		*function header
		*function name  : SubmitNewContent
		*function type  : call by value	
		*functionality  : 
		*input			: 
		*output			: 
		*return value   : nothing
		*note			: nothing		
		************************************************************************************
		*/
		function SubmitNewContent()
		{
		    global $_CONF;		    
			$this->AffiliateAuthenticate();
			
			/* permissions */
			
			$this->oView->affiliate_content_news_add 	= false; 
			$this->oView->affiliate_content_bills_add 	= false; 			
			$this->oView->affiliate_content_bulletins_add 	= false; 
			
			if( $this->aModel->checkSpecificAccessPermission("Affiliate Content","News","Add") )
				$this->oView->affiliate_content_news_add = true; 																
			if( $this->aModel->checkSpecificAccessPermission("Affiliate Content","Bills","Add") )
				$this->oView->affiliate_content_bills_add = true; 													
			if( $this->aModel->checkSpecificAccessPermission("Affiliate Content","Bulletins","Add") )
				$this->oView->affiliate_content_bulletins_add = true; 																
			/** permissions **/
			
			$msg = "";
			if(isset($_REQUEST["msg"]))
			{
				$msg = $_REQUEST["msg"];
			}
			$this->oView->vMsg = $msg; 		

			/** States **/	
			$stateList = $this->oModel->getStatesList();
			
		
			
			//$filename = $_CONF['UploadDoc'].'115_article_attachement.pdf';
			//$file_size			= 	filesize($filename);
			///$max_size			=	5242880; //in bytes = 5 MB
			//$rem = $file_size - $max_size;
			//echo "size: ".$file_size."<br>";
			//echo "size: ".$max_size."<br>";
			//echo $rem."<br>";
			//if($file_size < $max_size)
			//	echo "true";
			//else 
			//	echo "flase";
			//$filename = $_CONF['UploadDoc'].'article_document_11321632382.pdf';
			//echo filesize($filename);
			//echo "<br>";
			//echo filetype($filename);
			//echo "<br>";
			//$finfo = finfo_open(FILEINFO_MIME); // return mime type ala mimetype extension
		    // echo finfo_file($finfo, $filename) . "\n";
			//echo "<br>";
			//echo getimagesize($filename);		    
			//die("here");
						
			$loggedInAffiliate = $_SESSION['username'];
			$affID = $this->oModel->getAffiliateID($loggedInAffiliate);
			
			$this->oView->affiliate_id = $affID;	
			$this->oView->stateList = $stateList;			
			
			$this->oView->SubmitNewContent();
		}//ef	


		/*
		************************************************************************************
		*function header
		*function name  : AddNewContent
		*function type  : call by value - to add Articles and Petitions 	
		*functionality  : 
		*input			: 
		*output			: 
		*return value   : nothing
		*note			: nothing		
		************************************************************************************
		*/
		function AddNewContent()
		{
		    global $_CONF;
			$this->AffiliateAuthenticate();

			$loggedInAffiliate = $_SESSION['username'];
			$affID = $this->oModel->getAffiliateID($loggedInAffiliate);
			
			//die("AddNewContent");
			//$oArticle	= new Article();
			
			$string	 = trim($_REQUEST['bill_no']);
			$number  = ereg_replace("[^0-9]", "", $string); 				
			$legtype = strtoupper(ereg_replace("[^a-zA-Z]", "", $string)); 

		/*	
			print_r($_REQUEST);
			die();
			print_R($number);
			print_R($legtype);
			die();
			*/
			$this->oModel->mBillContent->article_title 			=  	htmlentities(trim($_REQUEST['title']), ENT_QUOTES);
			$this->oModel->mBillContent->affiliate_comment		=	htmlentities(trim($_REQUEST['affiliate_comment']), ENT_QUOTES);
			$this->oModel->mBillContent->created				=	date('Y-m-d');
			$this->oModel->mBillContent->article_type			=	trim($_REQUEST['article_type']);
			
			if(isset($_REQUEST['petition_level'])) {
			
				$this->oModel->mBillContent->petition_level		=	trim($_REQUEST['petition_level']);			
			} else {
			
				$this->oModel->mBillContent->petition_level		=	"";						
			}
			
			if(isset($_REQUEST['petition_state'])) {
			
				$this->oModel->mBillContent->petition_state		=	trim($_REQUEST['petition_state']);			
			} else {
			
				$this->oModel->mBillContent->petition_state		=	"";						
			}
			
			
			$this->oModel->mBillContent->article_type			=	trim($_REQUEST['article_type']);
			
			if(isset($_REQUEST['petition_voting_period_from']) && !empty($_REQUEST['petition_voting_period_from']))
			{
				$this->oModel->mBillContent->voting_start		=	trim($_REQUEST['petition_voting_period_from']);
				$this->oModel->mBillContent->voting_end			=	trim($_REQUEST['petition_voting_period_to']);
				$this->oModel->mBillContent->allow_voting		=	"yes";
			}
			else 
			{
			
				$this->oModel->mBillContent->bill_number			=	$number;
				$this->oModel->mBillContent->legtype				=	$legtype;					
				$this->oModel->mBillContent->indication_position	=	trim($_REQUEST['indication_of_position']);
				$this->oModel->mBillContent->allow_voting			=	trim($_REQUEST['allow_voting']);
				
				if(isset( $_REQUEST['voting_period_from'] ))
					$this->oModel->mBillContent->voting_start		=	trim($_REQUEST['voting_period_from']);
				else
					$this->oModel->mBillContent->voting_start		=	'';
				
				$this->oModel->mBillContent->voting_end		=	'';			
			}	
			
			
			// Apply Validations Here 
			$this->oView->article = $this->oModel->mBillContent;
			
			if(isset($_FILES) && !empty($_FILES['bill_name']['name'])){
				
				//FILE UPLOAD 									
				$tmp_file_name		= 	$_FILES['bill_name']['tmp_name'];						
				$uploadpath			=	$_CONF['UploadDoc'];					
				$max_size			=	5242880; //in bytes = 5 MB										
				$file_type 			=	$_FILES['bill_name']['type'];					
				$ext_allowed		=	array('application/pdf');	
											
				$isValidFileType 	=	$this->checkFileType($ext_allowed, $file_type);						
				$file_size			= 	$_FILES['bill_name']['size'];			
						
				if($isValidFileType &&  ($file_size < $max_size) ) 
				{			
					$temp		= session_id();			
					$LogoName 	= explode(".",$_FILES['bill_name']['name']);
					$LogoExt	= $LogoName[count($LogoName)-1];
					$file_name_path	= $uploadpath.$temp.'.'.$LogoExt;
				
					$result = move_uploaded_file($tmp_file_name, $file_name_path);
													
					if($result) 
					{	
						//$subscribers=$this->oModel->getSubscribers($affID);
						//$aff_info=$this->oModel->getAffiliateBanner($affID);

						$art_id = $this->oModel->addAffiliateBill($affID);
						
						if($art_id) 
						{
							// Add notificartion data in table
								// get subscribers id
						
							$newBannerName	=   $_CONF['UploadDoc'].$art_id."_article_attachement.".$LogoExt;
							$oldLogoName	=	$_CONF['UploadDoc'].$temp.".".$LogoExt;
							
							$this->oModel->mBillContent->support_file 	=	$art_id."_article_attachement.".$LogoExt;
							$this->oModel->mBillContent->id 			=	$art_id;	
												
							$rs_banner = $this->oModel->updateAffiliateArticle($this->oModel->mBillContent);
							
							if(rename($oldLogoName, $newBannerName)) {
								unlink($oldLogoName);
							}
							
							//sending email to subscribers
						if($_REQUEST['article_type']=='petition')
						$article_type='Petition';
						else
						$article_type='Bill';

						/*foreach($subscribers as $row)
						{
						$email	=	$row['email'];
						$body='<pre><font face="Arial">Dear '.ucwords($row['first_name'].' '.$row['last_name']);
												
						$body.=': Below '.$article_type.' has been created by affiliate named '.ucwords($aff_info['first_name'].''.$aff_info['last_name']).', click on '.$article_type.' title to view the '.$article_type.' detail.</pre><br />';
						$body.='<table width="100%" cellspacing="0" cellpadding="0"	border="0">	<tr><td width="34%" valign="middle" style="padding-left: 14px;background-color: #E2DCBB;border-top: 1px solid #B1B0AC;color: #000000;font-family:Arial,Helvetica,sans-serif;font-size: 15px; font-weight: bold; text-decoration: none;">'.$article_type.' Details</td><td width="66%" valign="middle" style="padding: 6px 14px;background-color: #E2DCBB;border-top: 1px solid #B1B0AC;"><table cellspacing="0" cellpadding="0" border="0" align="right"><tbody><tr><td width="106" align="right" valign="top">&nbsp;</td></tr></tbody></table></td></tr><tr><td valign="top" align="left" style="padding: 16px 5px 11px 15px;background-color: #EFEDE3;border-top: 1px solid #CDCCC5;" colspan="2"><table width="100%"><tr><td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0"><tr><td width="47" align="center" valign="top"></td><td width="847" align="left" valign="top" class="bg_f7f6ee"><table width="100%" border="0" cellspacing="0" cellpadding="0" id="sign_petition"><tr><td height="22" align="left" valign="top"><a href="'.$_CONF['SiteUrl'].
						'/index.php?stage=visitor&mode=affiliatePetitionsDetail&affID=$affID&id='.$art_id.'" style="color: #A60000; font-family: Arial,Helvetica,sans-serif; font-size: 12px;font-weight: bold;text-decoration: none;">'.htmlentities(trim($_REQUEST['title']), ENT_QUOTES).'</a></td></tr><tr><td align="left" valign="top">'.htmlentities(trim($_REQUEST['affiliate_comment']), ENT_QUOTES).'</td></tr><tr><td height="35" align="right" valign="bottom"><span style="float: left;color: #A60000;font-family: Arial,Helvetica,sans-serif;font-size: 12px;font-weight: bold;">Dated:&nbsp;&nbsp;<span style="color: #A60000;font-family: Arial,Helvetica,sans-serif;font-size: 11px;font-weight: normal;">'.date('Y-m-d').'</span></td></tr></table></td></tr></table><br /><table width="100%" cellspacing="0" cellpadding="0" border="0">	<tr><td><img alt=""	src="'.$_CONF['UploadLogo'].$aff_info['banner'].'" /></td></tr></table>';
							
					
						$aff_banner=$_CONF['UploadLogo'].$banner;
						
						$subject		=	$article_type.' Alert Notification';
						$result			=	SendMail(stripslashes($body), $subject, array($email), $_CONF['adminEmail'],$isHtml=1,$file=$aff_banner);
						
						}
*/
							$msg = "Article added successfully.";
							
							if($this->oModel->mBillContent->article_type == 'petition')	{
								$msg = "Petition added successfully.";
							} else if($this->oModel->mBillContent->article_type == 'bill')	{
								$msg = "Bill added successfully.";
							}  
							echo "<script>location='index.php?stage=affiliates&mode=AffiliateDashboard&msg=".$msg."'</script>";
							die();								
						} else {
								
							//$msg = "Server error, please try again.";
							$msg = "server_error.";						
							echo "<script>location='index.php?stage=affiliates&mode=SubmitNewContent&msg=".$msg."'</script>";
							die();
						}				
					} else {						
							
							$msg = "File uploading failed due to some technical reason. Please try later.";
							echo "<script>location='index.php?stage=affiliates&mode=SubmitNewContent&msg=".$msg."'</script>";
							die();
					}
				} else {
					$msg = "Only pdf files(max size 5MB) can be uploaded.";		
					echo "<script>location='index.php?stage=affiliates&mode=SubmitNewContent&msg=".$msg."'</script>";
					die();
				}
			} else {
				
				//$subscribers=$this->oModel->getSubscribers($affID);
				//$aff_info=$this->oModel->getAffiliateBanner($affID);


				$art_id = $this->oModel->addAffiliateBill($affID);
								
				if($art_id) {
				
						//sending email to subscribers
						if($_REQUEST['article_type']=='petition')
						$article_type='Petition';
						else
						$article_type='Bill';

						/*foreach($subscribers as $row)
						{
						$email	=	$row['email'];
						$body='<pre><font face="Arial">Dear '.ucwords($row['first_name'].' '.$row['last_name']);
												
						$body.=': Below '.$article_type.' has been created by affiliate named '.ucwords($aff_info['first_name'].''.$aff_info['last_name']).', click on '.$article_type.' title to view the '.$article_type.' detail.</pre><br />';
						$body.='<table width="100%" cellspacing="0" cellpadding="0"	border="0">	<tr><td width="34%" valign="middle" style="padding-left: 14px;background-color: #E2DCBB;border-top: 1px solid #B1B0AC;color: #000000;font-family:Arial,Helvetica,sans-serif;font-size: 15px; font-weight: bold; text-decoration: none;">'.$article_type.' Details</td><td width="66%" valign="middle" style="padding: 6px 14px;background-color: #E2DCBB;border-top: 1px solid #B1B0AC;"><table cellspacing="0" cellpadding="0" border="0" align="right"><tbody><tr><td width="106" align="right" valign="top">&nbsp;</td></tr></tbody></table></td></tr><tr><td valign="top" align="left" style="padding: 16px 5px 11px 15px;background-color: #EFEDE3;border-top: 1px solid #CDCCC5;" colspan="2"><table width="100%"><tr><td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0"><tr><td width="47" align="center" valign="top"></td><td width="847" align="left" valign="top" class="bg_f7f6ee"><table width="100%" border="0" cellspacing="0" cellpadding="0" id="sign_petition"><tr><td height="22" align="left" valign="top"><a href="'.$_CONF['SiteUrl'].
						'/index.php?stage=visitor&mode=affiliatePetitionsDetail&affID=$affID&id='.$art_id.'" style="color: #A60000; font-family: Arial,Helvetica,sans-serif; font-size: 12px;font-weight: bold;text-decoration: none;">'.htmlentities(trim($_REQUEST['title']), ENT_QUOTES).'</a></td></tr><tr><td align="left" valign="top">'.htmlentities(trim($_REQUEST['affiliate_comment']), ENT_QUOTES).'</td></tr><tr><td height="35" align="right" valign="bottom"><span style="float: left;color: #A60000;font-family: Arial,Helvetica,sans-serif;font-size: 12px;font-weight: bold;">Dated:&nbsp;&nbsp;<span style="color: #A60000;font-family: Arial,Helvetica,sans-serif;font-size: 11px;font-weight: normal;">'.date('Y-m-d').'</span></td></tr></table></td></tr></table><br /><table width="100%" cellspacing="0" cellpadding="0" border="0">	<tr><td><img alt=""	src="'.$_CONF['UploadLogo'].$aff_info['banner'].'" /></td></tr></table>';

					
						$aff_banner=$_CONF['UploadLogo'].$banner;
						
						$subject		=	$article_type.' Alert Notification';
						$result			=	SendMail(stripslashes($body), $subject, array($email), $_CONF['adminEmail'],$isHtml=1,$file=$aff_banner);
						
						}*/

					// Add notificartion data in table
						// get subscribers id
				
					$msg = "Article added successfully.";
					
					if($this->oModel->mBillContent->article_type == 'petition')	{
						$msg = "Petition added successfully.";
					} else if($this->oModel->mBillContent->article_type == 'bill')	{
						$msg = "Bill added successfully.";
					}  
					echo "<script>location='index.php?stage=affiliates&mode=AffiliateDashboard&msg=".$msg."'</script>";
					die();
				} else {
					
					//$msg = "Server error, please try again.";
					$msg = "server_error.";	
					echo "<script>location='index.php?stage=affiliates&mode=SubmitNewContent&msg=".$msg."'</script>";
					die($msg);
				}				
			}			
		}//ef		
		
		
		/************************************************************************************
		*function header
		*author			: Paras Shah
		*function name  : AddNewSponsors
		*function type  : call by value - 
		*functionality  : to update News and Bulletin
		*input			: 
		*output			: 
		*return value   : nothing
		*note			: nothing		
		************************************************************************************
		*/
		
		function AddNewSponsors() {
			global $_CONF;		    
			$this->AffiliateAuthenticate();
						
			$msg = "";
			if(isset($_REQUEST["msg"]))
			{
				$msg = $_REQUEST["msg"];
			}
			$this->oView->vMsg = $msg; 			
						
			$loggedInAffiliate = $_SESSION['username'];
			$affID = $this->oModel->getAffiliateID($loggedInAffiliate);			
			$this->oView->affiliate_id = $affID;						
			$this->oView->AddNewSponsors();		
		}
		
		
		/************************************************************************************
		*function header
		*author			: Paras Shah
		*function name  : SaveNewSponsors
		*function type  : call by value - 
		*functionality  : to update News and Bulletin
		*input			: 
		*output			: 
		*return value   : nothing
		*note			: nothing		
		************************************************************************************
		*/
		
		function SaveNewSponsors() {
		
			global $_CONF;
			$this->AffiliateAuthenticate();
			
			$loggedInAffiliate = $_SESSION['username'];
			$affID = $this->oModel->getAffiliateID($loggedInAffiliate);
			
			$this->oModel->Sponsor->sponsor_url			=   '';
			$this->oModel->Sponsor->sponsor_name			=  	htmlentities(trim($_REQUEST['sponsor_name']), ENT_QUOTES);
			$this->oModel->Sponsor->sponsor_description 	=	htmlentities(trim($_REQUEST['sponsor_description']), ENT_QUOTES);
			$this->oModel->Sponsor->sponsor_url			=	trim($_REQUEST['sponsor_url']);
			$this->oModel->Sponsor->affiliate_id			=   $affID;
			
			
			$art_id = $this->oModel->addSponsor($affID);
			
			if($art_id) {			
				$msg = "Sponsor added successfully.";				
				echo "<script>location='index.php?stage=affiliates&mode=AffiliateDashboard&msg=".$msg."'</script>";
				die();
			} else {								
				$msg = "server_error.";	
				echo "<script>location='index.php?stage=affiliates&mode=AddNewSponsors&msg=".$msg."'</script>";
				die($msg);
			}				
		
		}
		
		
/*
		**************************************************************************************
		*function header
		*author			: Paras Shah
		*function name  : SponsorEdit
		*function type  : call by value	
		*functionality  : Edit Sponsorship details 
		*input			: article ID 
		*output			: article Details
		*return value   : nothing
		*note			: nothing
		**************************************************************************************
		*/
		function SponsorEdit($id = NULL)
		{
			if(isset($_REQUEST["id"]))
				$sponsorID = $_REQUEST["id"];
			
			## View Alerts Added Affiliate Articles 	
			$loggedInAffiliate = $_SESSION['username'];
			$affID = $this->oModel->getAffiliateID($loggedInAffiliate);
			
			$this->oView->sponsorDetail = $this->oModel->getAffiliateSponsorDetail($affID ,$sponsorID);			 
			$this->oView->SponsorEdit();
		}//ef
		
		
		
		/************************************************************************************
		*function header
		*author			: Paras Shah
		*function name  : UpdateSponsor
		*function type  : call by value - 
		*functionality  : to update News and Bulletin
		*input			: 
		*output			: 
		*return value   : nothing
		*note			: nothing		
		************************************************************************************
		*/
		function UpdateSponsor()
		{
			global $_CONF;
			$this->AffiliateAuthenticate();
			
			$loggedInAffiliate = $_SESSION['username'];
			$affID = $this->oModel->getAffiliateID($loggedInAffiliate);
			
			$this->oModel->Sponsor->id					=   $_POST['id'];
			$this->oModel->Sponsor->sponsor_url			=   $_POST['sponsor_url'];
			$this->oModel->Sponsor->sponsor_name			=  	htmlentities(trim($_REQUEST['sponsor_name']), ENT_QUOTES);
			$this->oModel->Sponsor->sponsor_description 	=	htmlentities(trim($_REQUEST['sponsor_description']), ENT_QUOTES);
			$this->oModel->Sponsor->sponsor_url			=	trim($_REQUEST['sponsor_url']);
			
			$art_id = $this->oModel->updateSponsor($affID);
			
			if($art_id) {			
				$msg = "Sponsor updated successfully.";				
				echo "<script>location='index.php?stage=affiliates&mode=AffiliateDashboard&msg=".$msg."'</script>";
				die();
			} else {								
				$msg = "server_error.";	
				echo "<script>location='index.php?stage=affiliates&mode=AddNewSponsors&msg=".$msg."'</script>";
				die($msg);
			}			
	
	
	
		}//ef	
		
		
		
	/*
		**************************************************************************************
		*function header
		*author			: Paras Shah
		*function name  : SponsorDelete
		*function type  : call by value	
		*functionality  : Used to delete sposnor  based on id
		*input			: article ID 
		*output			: nothing
		*return value   : nothing
		*note			: nothing
		**************************************************************************************
		*/
		function SponsorDelete()
		{
			$res = $this->oModel->deleteSponsor($_REQUEST['id']);
			$msg = "Sponsor deleted successfully.";
			$mode='AffiliateDashboard';			
			echo "<script>location='index.php?stage=affiliates&mode=".$mode."&msg=".$msg."'</script>";
			die();
		}//ef
		
		
		
		/************************************************************************************
		*function header
		*author			: Vikas Rana
		*function name  : UpdateNews
		*function type  : call by value - 
		*functionality  : to update News and Bulletin
		*input			: 
		*output			: 
		*return value   : nothing
		*note			: nothing		
		************************************************************************************
		*/
		function UpdateNews()
		{
		
		    global $_CONF;
			
	        $this->oModel->mBillContent->affiliate_id		=	$_POST['affiliate_id'];
			$this->oModel->mBillContent->article_id			=	$_POST['article_id'];
			$this->oModel->mBillContent->article_title 		=  	htmlentities(trim($_REQUEST['title']), ENT_QUOTES);
			$this->oModel->mBillContent->affiliate_comment	=	htmlentities(trim($_REQUEST['affiliate_comment']), ENT_QUOTES);								
			$this->oModel->mBillContent->article_type		=	htmlentities(trim($_REQUEST['article_type']), ENT_QUOTES);								
			
			if($this->oModel->mBillContent->article_type=='news')
			{
				$mode='AffiliateNews';
				$msg = "News updated successfully.";
			}	
			else if($this->oModel->mBillContent->article_type=='bill')
			{
				$mode='VoteAlerts';
				$msg = "Bill updated successfully.";
			}
			else if($this->oModel->mBillContent->article_type=='petition')
			{
				$mode='Petitions';
				$msg = "Petition updated successfully.";
			}
			else if($this->oModel->mBillContent->article_type=='bulletin')
			{
				$mode='AffiliateBulletin';
				$msg = "Bulletin updated successfully.";
			}
			if(isset($_FILES) && !empty($_FILES['bill_name']['name'])){
				
				//FILE UPLOAD 									
				$tmp_file_name		= 	$_FILES['bill_name']['tmp_name'];						
				$uploadpath			=	$_CONF['UploadDoc'];					
				$max_size			=	5242880; //in bytes = 5 MB										
				$file_type 			=	$_FILES['bill_name']['type'];					
				$ext_allowed		=	array('application/pdf');	
											
				$isValidFileType 	=	$this->checkFileType($ext_allowed, $file_type);						
				$file_size			= 	$_FILES['bill_name']['size'];			
						
					if($isValidFileType &&  ($file_size < $max_size) ) 
					{			
						$temp		= $_POST['article_id']."_article_attachement";		
						$LogoName 	= explode(".",$_FILES['bill_name']['name']);
						$LogoExt	= $LogoName[count($LogoName)-1];
						$file_name_path	= $uploadpath.$temp.'.'.$LogoExt;
					
						$result = move_uploaded_file($tmp_file_name, $file_name_path);
						$file_name=$temp.'.'.$LogoExt;
						$res = $this->oModel->editNews($file_name);
							
						
						echo "<script>location='index.php?stage=affiliates&mode=".$mode."&msg=".$msg."&id=".$_POST['article_id']."'</script>";
						die();
						
					}
					else 
					{
						$msg = "Only pdf files(max size 5MB) can be uploaded.";		
						echo "<script>location='index.php?stage=affiliates&mode=".$mode."&msg=".$msg."&id=".$_POST['article_id']."'</script>";
						die();
					}
				}
				else
				{
					$res = $this->oModel->editNews();
						
					
					echo "<script>location='index.php?stage=affiliates&mode=".$mode."&msg=".$msg."&id=".$_POST['article_id']."'</script>";
					die();
				}	
			 		
		}//ef	
		/*
		************************************************************************************
		*function header
		*function name  : AddNewNews  - to add News and Bulletins
		*function type  : call by value	
		*functionality  : 
		*input		: 
		*output		: 
		*return value   : nothing
		*note		: nothing		
		************************************************************************************
		*/

		function AddNewNews()
		{
		    global $_CONF;
			$this->AffiliateAuthenticate();
			
			$loggedInAffiliate = $_SESSION['username'];
			$affID = $this->oModel->getAffiliateID($loggedInAffiliate);
			
			//die("AddNewContent");
			//$oArticle	= new Article();

			$this->oModel->mBillContent->article_title 			=  	htmlentities(trim($_REQUEST['title']), ENT_QUOTES);
			$this->oModel->mBillContent->article_type			=	trim($_REQUEST['article_type']);
			
				
			$this->oModel->mBillContent->affiliate_comment		=	htmlentities(trim($_REQUEST['affiliate_comment']), ENT_QUOTES);
			$this->oModel->mBillContent->created				=	date('Y-m-d');
		
			
			// Apply Validations Here 
			$this->oView->article = $this->oModel->mBillContent;	
			
			/*	
			if(!empty($_REQUEST['pdf_name'])){
				
				//FILE UPLOAD 							
				$uploadpath		=	$_CONF['UploadDoc'];
				$tmp_file_name 	= 	 $uploadpath.$_REQUEST['pdf_name'];									
						
				if(file_exists($tmp_file_name))
				{			
							
					$pdf_name 	= explode(".",$_REQUEST['pdf_name']);
					$pdf_name_ext	= $pdf_name[count($pdf_name)-1];
					
					$art_id = $this->oModel->addAffiliateNews($affID);
						
					if($art_id) 
					{		
						$new_pdf_name	=   $_CONF['UploadDoc'].$art_id."_article_attachement.".$pdf_name_ext;
						$old_pdf_name	=	$tmp_file_name;
						
						$this->oModel->mBillContent->support_file 	=  $art_id."_article_attachement.".$pdf_name_ext;
						$this->oModel->mBillContent->id 			= 	$art_id;						
						$rs_banner = $this->oModel->updateAffiliateArticle($this->oModel->mBillContent);
						
						@rename($old_pdf_name, $new_pdf_name);
						
						$msg = "Article added successfully.";

						if($this->oModel->mBillContent->article_type == 'news')	{
							$msg = "News added successfully.";
						}  else if($this->oModel->mBillContent->article_type == 'bulletin')	{
							$msg = "Bulletin added successfully.";
						} 

						echo "<script>location='index.php?stage=affiliates&mode=AffiliateDashboard&msg=".$msg."'</script>";
						die();								
					} else {
							
						//$msg = "Server error, please try again.";
						$msg = "server_error.";						
						echo "<script>location='index.php?stage=affiliates&mode=SubmitNewContent&msg=".$msg."'</script>";
						die();
					}				
				} else {
					$msg = "Only pdf files(max size 5MB) can be uploaded.";		
					echo "<script>location='index.php?stage=affiliates&mode=SubmitNewContent&msg=".$msg."'</script>";
					die();
				}
			} else {
				
				$art_id = $this->oModel->addAffiliateNews($affID);
				if($art_id) {
				
					$msg = "Article added successfully.";
					echo "<script>location='index.php?stage=affiliates&mode=AffiliateDashboard&msg=".$msg."'</script>";
					die();
				} else {
					
					//$msg = "Server error, please try again.";
					$msg = "server_error.";						
					echo "<script>location='index.php?stage=affiliates&mode=SubmitNewContent&msg=".$msg."'</script>";
					die();
				}				
			}
			*/
			
			if(isset($_FILES) && !empty($_FILES['bill_name']['name'])){
				
				//FILE UPLOAD 									
				$tmp_file_name		= 	$_FILES['bill_name']['tmp_name'];						
				$uploadpath			=	$_CONF['UploadDoc'];					
				$max_size			=	5242880; //in bytes = 5 MB
				$file_type 			=	$_FILES['bill_name']['type'];					
				$ext_allowed		=	array('application/pdf');	
											
				$isValidFileType 	=	$this->checkFileType($ext_allowed, $file_type);						
				$file_size			= 	filesize($filepath);			
						
				if($isValidFileType &&  ($file_size < $max_size) ) 
				{			
					$temp		= session_id();			
					$LogoName 	= explode(".",$_FILES['bill_name']['name']);
					$LogoExt	= $LogoName[count($LogoName)-1];
					$file_name_path	= $uploadpath.$temp.'.'.$LogoExt;
				
					$result = move_uploaded_file($tmp_file_name, $file_name_path);
													
					if($result) 
					{
						//$subscribers=$this->oModel->getSubscribers($affID);
						//$aff_info=$this->oModel->getAffiliateBanner($affID);
	
						$art_id = $this->oModel->addAffiliateNews($affID);
						
						if($art_id) 
						{	
							
							$newBannerName	=   $_CONF['UploadDoc'].$art_id."_article_attachement.".$LogoExt;
							$oldLogoName	=	$_CONF['UploadDoc'].$temp.".".$LogoExt;
							
							$this->oModel->mBillContent->support_file 	=  $art_id."_article_attachement.".$LogoExt;
							$this->oModel->mBillContent->id 			= 	$art_id;						
							$rs_banner = $this->oModel->updateAffiliateArticle($this->oModel->mBillContent);
							
							if(rename($oldLogoName, $newBannerName)) {
								unlink($oldLogoName);
							}
							
							/*foreach($subscribers as $row)
				{
				$email	=	$row['email'];
				$body='<pre><font face="Arial">Dear '.ucwords($row['first_name'].' '.$row['last_name']).':Below News has been created by affiliate named '.ucwords($aff_info['first_name'].''.$aff_info['last_name']).', click on News title to view the News detail.</pre><br />';
				$body.='<table width="100%" cellspacing="0" cellpadding="0"	border="0">	<tr><td width="34%" valign="middle" style="padding-left: 14px;background-color: #E2DCBB;border-top: 1px solid #B1B0AC;color: #000000;font-family:Arial,Helvetica,sans-serif;font-size: 15px; font-weight: bold; text-decoration: none;">News Details</td><td width="66%" valign="middle" style="padding: 6px 14px;background-color: #E2DCBB;border-top: 1px solid #B1B0AC;"><table cellspacing="0" cellpadding="0" border="0" align="right"><tbody><tr><td width="106" align="right" valign="top">&nbsp;</td></tr></tbody></table></td></tr><tr><td valign="top" align="left" style="padding: 16px 5px 11px 15px;background-color: #EFEDE3;border-top: 1px solid #CDCCC5;" colspan="2"><table width="100%"><tr><td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0"><tr><td width="47" align="center" valign="top"></td><td width="847" align="left" valign="top" class="bg_f7f6ee"><table width="100%" border="0" cellspacing="0" cellpadding="0" id="sign_petition"><tr><td height="22" align="left" valign="top"><a href="'.$_CONF['SiteUrl'].
				'/index.php?stage=visitor&mode=NewsDetail&affID=$affID&id='.$art_id.'" style="color: #A60000; font-family: Arial,Helvetica,sans-serif; font-size: 12px;font-weight: bold;text-decoration: none;">'.htmlentities(trim($_REQUEST['title']), ENT_QUOTES).'</a></td></tr><tr><td align="left" valign="top">'.htmlentities(trim($_REQUEST['affiliate_comment']), ENT_QUOTES).'</td></tr><tr><td height="35" align="right" valign="bottom"><span style="float: left;color: #A60000;font-family: Arial,Helvetica,sans-serif;font-size: 12px;font-weight: bold;">Dated:&nbsp;&nbsp;<span style="color: #A60000;font-family: Arial,Helvetica,sans-serif;font-size: 11px;font-weight: normal;">'.date('Y-m-d').'</span></td></tr></table></td></tr></table><br /><table width="100%" cellspacing="0" cellpadding="0" border="0">	<tr><td><img alt=""	src="'.$_CONF['UploadLogo'].$aff_info['banner'].'" /></td></tr></table>';
					
			
				$aff_banner=$_CONF['UploadLogo'].$banner;
				
				$subject		=	'News Alert Notification';
				$result			=	SendMail(stripslashes($body), $subject, array($email), $_CONF['adminEmail'],$isHtml=1,$file=$aff_banner);
				
				}*/

							
							$msg = "Article added successfully.";

							if($this->oModel->mBillContent->article_type == 'news')	{
								$msg = "News added successfully.";
							}  else if($this->oModel->mBillContent->article_type == 'bulletin')	{
								$msg = "Bulletin added successfully.";
							} 
							echo "<script>location='index.php?stage=affiliates&mode=AffiliateDashboard&msg=".$msg."'</script>";
							die();								
						} else {
								
							//$msg = "Server error, please try again.";
							$msg = "server_error.";						
							echo "<script>location='index.php?stage=affiliates&mode=SubmitNewContent&msg=".$msg."'</script>";
							die();
						}				
					} else {						
							
							$msg = "File uploading failed due to some technical reason. Please try later.";
							echo "<script>location='index.php?stage=affiliates&mode=SubmitNewContent&msg=".$msg."'</script>";
							die();
					}
				} else {
					$msg = "Only pdf files(max size 5MB) can be uploaded.";		
					echo "<script>location='index.php?stage=affiliates&mode=SubmitNewContent&msg=".$msg."'</script>";
					die();
				}
			} else {
			
				$subscribers=$this->oModel->getSubscribers($affID);
				$aff_info=$this->oModel->getAffiliateBanner($affID);
								
				$art_id = $this->oModel->addAffiliateNews($affID);
				if($art_id) {
				
					//sending email to subscribers
				/*	foreach($subscribers as $row)
				{
				$email	=	$row['email'];
				$body='<pre><font face="Arial">Dear '.ucwords($row['first_name'].' '.$row['last_name']).':Below News has been created by affiliate named '.ucwords($aff_info['first_name'].''.$aff_info['last_name']).', click on News title to view the News detail.</pre><br />';
				$body.='<table width="100%" cellspacing="0" cellpadding="0"	border="0">	<tr><td width="34%" valign="middle" style="padding-left: 14px;background-color: #E2DCBB;border-top: 1px solid #B1B0AC;color: #000000;font-family:Arial,Helvetica,sans-serif;font-size: 15px; font-weight: bold; text-decoration: none;">News Details</td><td width="66%" valign="middle" style="padding: 6px 14px;background-color: #E2DCBB;border-top: 1px solid #B1B0AC;"><table cellspacing="0" cellpadding="0" border="0" align="right"><tbody><tr><td width="106" align="right" valign="top">&nbsp;</td></tr></tbody></table></td></tr><tr><td valign="top" align="left" style="padding: 16px 5px 11px 15px;background-color: #EFEDE3;border-top: 1px solid #CDCCC5;" colspan="2"><table width="100%"><tr><td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0"><tr><td width="47" align="center" valign="top"></td><td width="847" align="left" valign="top" class="bg_f7f6ee"><table width="100%" border="0" cellspacing="0" cellpadding="0" id="sign_petition"><tr><td height="22" align="left" valign="top"><a href="'.$_CONF['SiteUrl'].
				'/index.php?stage=visitor&mode=NewsDetail&affID=$affID&id='.$art_id.'" style="color: #A60000; font-family: Arial,Helvetica,sans-serif; font-size: 12px;font-weight: bold;text-decoration: none;">'.htmlentities(trim($_REQUEST['title']), ENT_QUOTES).'</a></td></tr><tr><td align="left" valign="top">'.htmlentities(trim($_REQUEST['affiliate_comment']), ENT_QUOTES).'</td></tr><tr><td height="35" align="right" valign="bottom"><span style="float: left;color: #A60000;font-family: Arial,Helvetica,sans-serif;font-size: 12px;font-weight: bold;">Dated:&nbsp;&nbsp;<span style="color: #A60000;font-family: Arial,Helvetica,sans-serif;font-size: 11px;font-weight: normal;">'.date('Y-m-d').'</span></td></tr></table></td></tr></table><br /><table width="100%" cellspacing="0" cellpadding="0" border="0">	<tr><td><img alt=""	src="'.$_CONF['UploadLogo'].$aff_info['banner'].'" /></td></tr></table>';
					
			
				$aff_banner=$_CONF['UploadLogo'].$banner;
				
				$subject		=	'News Alert Notification';
				$result			=	SendMail(stripslashes($body), $subject, array($email), $_CONF['adminEmail'],$isHtml=1,$file=$aff_banner);
				
				}
*/
			
					$msg = "Article added successfully.";

					if($this->oModel->mBillContent->article_type == 'news')	{
						$msg = "News added successfully.";
					}  else if($this->oModel->mBillContent->article_type == 'bulletin')	{
						$msg = "Bulletin added successfully.";
					} 


					echo "<script>location='index.php?stage=affiliates&mode=AffiliateDashboard&msg=".$msg."'</script>";
					die();
				} else {
					
					//$msg = "Server error, please try again.";
					$msg = "server_error.";						
					echo "<script>location='index.php?stage=affiliates&mode=SubmitNewContent&msg=".$msg."'</script>";
					die();
				}				
			}			
		}//ef		

		
		/*
		**************************************************************************************
		*function header
		*function name  : VoteAlerts
		*function type  : call by value	
		*functionality  : 
		*input			: 
		*output			: 
		*return value   : nothing
		*note			: nothing
		***************************************************************************************
		*/
		function VoteAlerts()
		{
			$this->AffiliateAuthenticate();

						
			/* permissions */					
			
			$this->oView->affiliate_content_bills_view 	= false; 			
			$this->oView->affiliate_content_bills_edit 	= false; 			
			$this->oView->affiliate_content_bills_delete 	= false; 			
			
			if( $this->aModel->checkSpecificAccessPermission("Affiliate Content","Bills","View") )
				$this->oView->affiliate_content_bills_view = true; 
			if( $this->aModel->checkSpecificAccessPermission("Affiliate Content","Bills","Modify Own Content") )
				$this->oView->affiliate_content_bills_edit = true; 
			if( $this->aModel->checkSpecificAccessPermission("Affiliate Content","Bills","Delete") )
				$this->oView->affiliate_content_bills_delete = true; 	
					
			
			/** permissions **/
			
			
			//View Alerts Added Affiliate Articles 	
			$loggedInAffiliate = $_SESSION['username'];
			$affID = $this->oModel->getAffiliateID($loggedInAffiliate);

			$this->oView->affiliateVoteAlerts = $this->oModel->getAffiliateVoteAlerts($affID, "", "");
			$this->oView->VoteAlerts();
			
		}//ef
		
		
		/*
		**************************************************************************************
		*function header
		*function name  : Petitions
		*function type  : call by value	
		*functionality  : 
		*input			: 
		*output			: 
		*return value   : nothing
		*note			: nothing
		***************************************************************************************
		*/
		function Petitions()
		{
			$this->AffiliateAuthenticate();
		
			/* permissions */			
			
			$this->oView->affiliate_content_petitions_view 	= false; 			
			$this->oView->affiliate_content_petitions_edit 	= false; 			
			$this->oView->affiliate_content_petitions_delete 	= false; 			
			
			if( $this->aModel->checkSpecificAccessPermission("Affiliate Content","Petitions","View") )
				$this->oView->affiliate_content_petitions_view = true;				
			if( $this->aModel->checkSpecificAccessPermission("Affiliate Content","Petitions","Modify Own Content") )
				$this->oView->affiliate_content_petitions_edit = true;				
			if( $this->aModel->checkSpecificAccessPermission("Affiliate Content","Petitions","Delete") )
				$this->oView->affiliate_content_petitions_delete = true;					
			
			/** permissions **/	
			//View Alerts Added Affiliate Articles 	
			$loggedInAffiliate = $_SESSION['username'];
			$affID = $this->oModel->getAffiliateID($loggedInAffiliate);

			$this->oView->affiliateArticle = $this->oModel->getAffiliatePetitions($affID, "", "");			
			$this->oView->Petitions();
			
		}//ef
				
		
		/*
		**************************************************************************************
		*function header
		*function name  : AffiliateNews
		*function type  : call by value	
		*functionality  : 
		*input			: 
		*output			: 
		*return value   : nothing
		*note			: nothing
		***************************************************************************************
		*/
		function AffiliateNews()
		{
			$this->AffiliateAuthenticate();
			
			/* permissions */			
			
			$this->oView->affiliate_content_news_view 	= false; 			
			$this->oView->affiliate_content_news_edit 	= false; 			
			$this->oView->affiliate_content_news_delete 	= false; 			
			
			if( $this->aModel->checkSpecificAccessPermission("Affiliate Content","News","View") )
				$this->oView->affiliate_content_news_view = true;				
			if( $this->aModel->checkSpecificAccessPermission("Affiliate Content","News","Modify Own Content") )
				$this->oView->affiliate_content_news_edit = true;				
			if( $this->aModel->checkSpecificAccessPermission("Affiliate Content","News","Delete") )
				$this->oView->affiliate_content_news_delete = true;					
			
			/** permissions **/
			

			//View Alerts Added Affiliate Articles 	
			$loggedInAffiliate = $_SESSION['username'];
			$affID = $this->oModel->getAffiliateID($loggedInAffiliate);

			$this->oView->affiliateVoteAlerts = $this->oModel->getAffiliateNews($affID, "", "");
			$this->oView->AffiliateNews();
			
		}//ef

		
		/*
		**************************************************************************************
		*function header
		*function name  : AffiliateBulletin
		*function type  : call by value	
		*functionality  : 
		*input			: 
		*output			: 
		*return value   : nothing
		*note			: nothing
		***************************************************************************************
		*/
		function AffiliateBulletin()
		{
			$this->AffiliateAuthenticate();
			
			
			/* permissions */					
			
			$this->oView->affiliate_content_bulletins_view 	= false; 			
			$this->oView->affiliate_content_bulletins_edit 	= false; 			
			$this->oView->affiliate_content_bulletins_delete 	= false; 			
			
			if( $this->aModel->checkSpecificAccessPermission("Affiliate Content","Bulletins","View") )
				$this->oView->affiliate_content_bulletins_view = true; 								
			if( $this->aModel->checkSpecificAccessPermission("Affiliate Content","Bulletins","Modify Own Content") )
				$this->oView->affiliate_content_bulletins_edit = true; 								
			if( $this->aModel->checkSpecificAccessPermission("Affiliate Content","Bulletins","Delete") )
				$this->oView->affiliate_content_bulletins_delete = true; 										
			
			/** permissions **/
			

			//View Alerts Added Affiliate Articles 	
			$loggedInAffiliate = $_SESSION['username'];
			$affID = $this->oModel->getAffiliateID($loggedInAffiliate);

			$this->oView->affiliateVoteAlerts = $this->oModel->getAffiliateBulletin( $affID, "", "" );
			$this->oView->AffiliateBulletin();
			
		}//ef

		
		/*
		**************************************************************************************
		*function header
		*function name  : VoteAlertsDetail
		*function type  : call by value	
		*functionality  : 
		*input			: article ID 
		*output			: article Details
		*return value   : nothing
		*note			: nothing
		***************************************************************************************
		*/
		function VoteAlertsDetail($articleID = NULL)
		{
			global $_CONF;
			
			if(!$this->aModel->checkSpecificAccessPermission("Affiliate Content","Bills","View") )
			{				
				header("location: index.php?stage=affiliates&mode=VoteAlerts");
			}
			
			
			if(isset($_REQUEST["id"]))
				$articleID = $_REQUEST["id"];
			
			$support = $total = 0; 
			
			## View Alerts Added Affiliate Articles 	
			$loggedInAffiliate = $_SESSION['username'];
			$affID = $this->oModel->getAffiliateID($loggedInAffiliate);
			
			$this->oView->affiliateArticle	= $this->oModel->getAffiliateArticleDetail($affID ,$articleID);			 
			$this->oView->articleStatus		= $this->oModel->getVotingStatus($articleID, $support ,$total );			 
			
			$supportPercentage = (int)(($support / $total ) * 100); 
			$opposePercentage  = 100 - $supportPercentage;
			
			$this->oView->supportPercentage = $supportPercentage;
			$this->oView->opposePercentage  = $opposePercentage;
			
			$this->oView->VoteAlertsDetail();
		}//ef

		
		/*
		**************************************************************************************
		*function header
		*function name  : VoteAlertsDetail
		*function type  : call by value	
		*functionality  : 
		*input			: article ID 
		*output			: article Details
		*return value   : nothing
		*note			: nothing
		***************************************************************************************
		*/
		function PetitionsDetail($articleID = NULL)
		{
			global $_CONF;
			if(isset($_REQUEST["id"]))
				$articleID = $_REQUEST["id"];
			
			$support = $total = 0; 
			
			##View Alerts Added Affiliate Articles 	
			$loggedInAffiliate = $_SESSION['username'];
			$affID = $this->oModel->getAffiliateID($loggedInAffiliate);
			
			$this->oView->affiliateArticle  = $this->oModel->getAffiliateArticleDetail($affID ,$articleID);			 
			$this->oView->articleStatus 	= $this->oModel->getVotingStatus($articleID, $support ,$total );			 
			
			
			$supportPercentage = (int)(($support / $total ) * 100); 
			$opposePercentage  = 100 - $supportPercentage;
			
			$this->oView->supportPercentage = $supportPercentage;
			$this->oView->opposePercentage  = $opposePercentage;
			
			$signs_count = $this->oModel->getTotalSignsCount($articleID);
			
			$this->oView->signs_count = $signs_count;			 
			//print_r($this->oView->affiliateArticle);
			//die();			
			
			$this->oView->PetitionsDetail();
		}//ef

		
		/*
		**************************************************************************************
		*function header
		*function name  : NewsDetail
		*function type  : call by value	
		*functionality  : 
		*input			: article ID 
		*output			: article Details
		*return value   : nothing
		*note			: nothing
		**************************************************************************************
		*/
		function NewsDetail($articleID = NULL)
		{
		
			if(!$this->aModel->checkSpecificAccessPermission("Affiliate Content","News","View") )
			{				
				header("location: index.php?stage=affiliates&mode=AffiliateNews");
			}
			
			/* permissions */
			
			$this->oView->affiliate_content_news_view 	= false; 						
			$this->oView->affiliate_content_news_edit 	= false; 
			$this->oView->affiliate_content_news_delete 	= false; 			
			
			if( $this->aModel->checkSpecificAccessPermission("Affiliate Content","News","View") )
				$this->oView->affiliate_content_news_view = true; 								
			if( $this->aModel->checkSpecificAccessPermission("Affiliate Content","News","Modify Own Content") )
				$this->oView->affiliate_content_news_edit = true; 													
			if( $this->aModel->checkSpecificAccessPermission("Affiliate Content","News","Delete") )
				$this->oView->affiliate_content_news_delete = true; 													
			
			/* permissions */
			
			
			if(isset($_REQUEST["id"]))
				$articleID = $_REQUEST["id"];
			
						
			if(isset($_REQUEST['msg'])) {
				if(trim($_REQUEST['msg'])) {
					$this->oView->vMsg = trim($_REQUEST['msg']);
				}
			}
			
			## View Alerts Added Affiliate Articles 	
			$loggedInAffiliate = $_SESSION['username'];
			$affID = $this->oModel->getAffiliateID($loggedInAffiliate);
			
			
			$this->oView->affiliateArticle = $this->oModel->getAffiliateNewsDetail($affID ,$articleID);			 

			## get comment by subscriber on Affiliate article - name date and comment
			$subscribersComment = $this->oModel->getSubscriberCommentForAffArticle($articleID);						
			$this->oView->oSubscribersComment = $subscribersComment;							
			
			
			
			
			$this->oView->NewsDetail();
		}//ef

		/*
		**************************************************************************************
		*function header
		*author			: Vikas Rana
		*function name  : NewsEdit
		*function type  : call by value	
		*functionality  : Used to retrieve article details based on article ID
		*input			: article ID 
		*output			: article Details
		*return value   : nothing
		*note			: nothing
		**************************************************************************************
		*/
		function NewsEdit($articleID = NULL)
		{
		/*				
			if(!$this->aModel->checkSpecificAccessPermission("Affiliate Content","News","View") )
			{				
				header("location: index.php?stage=affiliates&mode=AffiliateNews");
			}
		*/	
			
			if(isset($_REQUEST["id"]))
				$articleID = $_REQUEST["id"];
			
			$support = $total = 0; 
			
			## View Alerts Added Affiliate Articles 	
			$loggedInAffiliate = $_SESSION['username'];
			$affID = $this->oModel->getAffiliateID($loggedInAffiliate);
			
			$this->oView->affiliateArticle = $this->oModel->getAffiliateNewsDetail($affID ,$articleID);			 
			$this->oView->NewsEdit();
		}//ef
		
		/*
		**************************************************************************************
		*function header
		*author			: Vikas Rana
		*function name  : NewsDelete
		*function type  : call by value	
		*functionality  : Used to delete article based on article id
		*input			: article ID 
		*output			: nothing
		*return value   : nothing
		*note			: nothing
		**************************************************************************************
		*/
		function NewsDelete()
		{
			$res = $this->oModel->deleteAffiliateContent($_REQUEST['id']);
			$msg = "Article deleted successfully.";
			$mode='AffiliateDashboard';
			
			if($_REQUEST['type']=='news')
			{
				$mode='AffiliateNews';
				$msg = "News deleted successfully.";
			}	
			else if($_REQUEST['type']=='bill')
			{
			//	$mode='';
			//	$msg = "News deleted successfully.";
			}
			else if($_REQUEST['type']=='petition')
			{
				//$mode='Petitions';
			}
			else if($_REQUEST['type']=='bulletin')
			{
				$mode='AffiliateBulletin';
				$msg = "Bulletin deleted successfully.";
			}
			
			echo "<script>location='index.php?stage=affiliates&mode=".$mode."&msg=".$msg."'</script>";
			die();
		}//ef
		
		
		/*
		**************************************************************************************
		*function header
		*author			: Paras Shah
		*function name  : DeleteArticleComment
		*function type  : call by value	
		*functionality  : Used to delete article'comment based on article id
		*input			: article ID 
		*output			: nothing
		*return value   : nothing
		*note			: nothing
		**************************************************************************************
		*/		
		function DeleteArticleComment() {
		    global $_CONF;			
			$permission = $this->aModel->checkSpecificAccessPermission("Affiliate Content","Bulletins","Delete");									
			
			if($permission)
			{				
				// Update article data
				$loggedInER	= $_SESSION['username'];
				
				/*
					we can add additional valiadtion of whether user 
					article belongs to same affiliate 
				*/	
				
				$article_id   =	$_REQUEST["articleID"];	
				$comment_id   =	$_REQUEST["commentID"];	
				$article_type =	$_REQUEST["articleType"];	
				
				
				if($this->oModel->deleteAffiliateArticleComment($article_id,$comment_id))			
				{
					$message = "Comment deleted.";
					if($article_type == 'news')
					{
						$mode    = "NewsDetail";					
					}
					else {
						$mode    = "BulletinsDetail";						
					}
					
					header("location:".$_CONF['SiteUrl']."/index.php?stage=affiliates&mode=".$mode."&id=".$article_id."&msg=Comment deleted.");
					die();
				}
				else {					
					$message = "Comment can not be deleted.";					
					if($article_type == 'news')	{
						$mode    = "NewsDetail";					
					}
					else{
						$mode    = "BulletinsDetail";						
					}
					
					header("location:".$_CONF['SiteUrl']."/index.php?stage=affiliates&mode=".$mode."&id=".$article_id."&msg=".$message);
					die();											
				}
			}	
			else
				header("location:".$_CONF['SiteUrl']."/index.php?stage=affiliates&mode=AffiliateDashboard&msg=Not Authorized");									
		} //ef	
		
		
		

		
		/*
		**************************************************************************************
		*function header
		*function name  : BulletinsDetail
		*function type  : call by value	
		*functionality  : 
		*input			: article ID 
		*output			: article Details
		*return value   : nothing
		*note			: nothing
		**************************************************************************************
		*/
		function BulletinsDetail($articleID = NULL)
		{
								
			if(!$this->aModel->checkSpecificAccessPermission("Affiliate Content","Bulletins","View") )
			{				
				header("location: index.php?stage=affiliates&mode=AffiliateBulletin");
			}
		
			/* permissions */
			
			$this->oView->affiliate_content_bulletins_view 	= false; 			
			$this->oView->affiliate_content_bulletins_edit 	= false; 
			$this->oView->affiliate_content_bulletins_delete 	= false; 
			
			if( $this->aModel->checkSpecificAccessPermission("Affiliate Content","Bulletins","View") )
				$this->oView->affiliate_content_bulletins_view = true; 								
			if( $this->aModel->checkSpecificAccessPermission("Affiliate Content","Bulletins","Modify Own Content") )
				$this->oView->affiliate_content_bulletins_edit = true; 	
			if( $this->aModel->checkSpecificAccessPermission("Affiliate Content","Bulletins","Delete") )
				$this->oView->affiliate_content_bulletins_delete = true; 		
			
			/* permissions */		
		
			if(isset($_REQUEST["id"]))
				$articleID = $_REQUEST["id"];
			
			if(isset($_REQUEST['msg'])) {
				if(trim($_REQUEST['msg'])) {
					$this->oView->vMsg = trim($_REQUEST['msg']);
				}
			}
			
			$support = $total = 0; 
			
			## View Alerts Added Affiliate Articles 	
			$loggedInAffiliate = $_SESSION['username'];
			$affID = $this->oModel->getAffiliateID($loggedInAffiliate);
			
			$this->oView->affiliateArticle = $this->oModel->getAffiliateNewsDetail($affID ,$articleID);			 
			
			## get comment by subscriber on Affiliate article - name date and comment
			$subscribersComment = $this->oModel->getSubscriberCommentForAffArticle($articleID);						
			$this->oView->oSubscribersComment = $subscribersComment;							
			
			$this->oView->BulletinsDetail();
		}//ef
		
				
		/*
		**************************************************************************************
		*function header
		*function name  : AffiliateDetail 
		*function type  : call by value	
		*functionality  : 
		*input			: 
		*output			: 
		*return value   : nothing
		*note			: nothing
		***************************************************************************************
		*/
		function AffiliateDetail($affID='')
		{
		    global $_CONF;
			
			$this->AffiliateAuthenticate();
			
		    if(isset($_REQUEST['affiliateID']))		    
		    {
		    	$affID = $_REQUEST['affiliateID'];		    		
		    }
			
			$oAffiliate = $this->oModel->getAffiliate($affID);
			$this->oView->vAffiliate = $oAffiliate;			
			$this->oView->AffiliateDetail();
		}//ef	
		
		
		
		/*
		**************************************************************************************
		*function header
		*function name  : AffiliateProfile
		*function type  : call by value	
		*functionality  : 
		*input			: 
		*output			: 
		*return value   : nothing
		*note			: nothing
		***************************************************************************************
		*/
		function AffiliateProfile()
		{
			$this->AffiliateAuthenticate();
			
			/* permissions */			
			$this->oView->affiliate_content_page_header_view = false; 			
						
			if( $this->aModel->checkSpecificAccessPermission("Affiliate Content","Page Header","View") )
				$this->oView->affiliate_content_page_header_view = true; 								
			
			/** permissions **/
			
		    			
			
			if(isset($_REQUEST['msg'])) {
				if(trim($_REQUEST['msg'])) {
					$this->oView->vMsg = trim($_REQUEST['msg']);
				}
			}
			$loggedInAffiliate = $_SESSION['username'];
			$affID = $this->oModel->getAffiliateID($loggedInAffiliate);
			$oAffiliate = $this->oModel->getAffiliate($affID);
			$this->oView->vAffiliate = $oAffiliate;
			$this->oView->AffiliateProfile();
		}//ef			
		
		
		/*
		**************************************************************************************
		*function header
		*function name  : ProcessBillNumber
		*function type  : call by value	
		*functionality  : 
		*input			: 
		*output			: 
		*return value   : nothing
		*note			: nothing
		***************************************************************************************
		*/
		function ProcessBillNumber()
		{
			if(isset($_REQUEST["val"]))			
			{
				$string = $_REQUEST["val"];
				$number = ereg_replace("[^0-9]", "", $string); 				
				$legtype = strtoupper(ereg_replace("[^A-Z]", "", $string));				 
				
				$return = $this->oModel->checkBillNumber($legtype, $number);
				//echo $return;
				die($return);
			}
		}

		
		/*
		************************************************************************************
		*function header
		*function name  : EditProfile
		*function type  : call by value	
		*functionality  : 
		*input			: 
		*output			: 
		*return value   : nothing
		*note			: nothing		
		*************************************************************************************
		*/
		function EditProfile($oAffiliate = null,$sErrorMsg = null)
		{
			$this->AffiliateAuthenticate();

			/* permissions */
			
			$this->oView->affiliate_content_page_header_view 				= false; 			
			$this->oView->affiliate_content_page_header_modify_own_content 	= false; 			
			
			if( $this->aModel->checkSpecificAccessPermission("Affiliate Content","Page Header","View") )
				$this->oView->affiliate_content_page_header_view = true; 								
			if( $this->aModel->checkSpecificAccessPermission("Affiliate Content","Page Header","Modify Own Content") )
				$this->oView->affiliate_content_page_header_modify_own_content = true; 													
			
			/** permissions **/
			
		    global $_CONF;
			$msg = "";
			if(isset($oAffiliate)) {
				
				$this->oView->vMsg = $sErrorMsg;
				$this->oView->vAffiliate = $oAffiliate;				
			} else { 
				
				$loggedInAffiliate = $_SESSION['username'];
				$affID = $this->oModel->getAffiliateID($loggedInAffiliate);
				$oAffiliate = $this->oModel->getAffiliate($affID);
				
				//echo "<pre>";
				//print_r($oAffiliate);
				//die();
				
				$this->oView->vAffiliate = $oAffiliate;
				$this->oView->vMsg = $msg; 				
			}
			$this->oView->EditProfile();
		}//ef			

		
		/*
		**************************************************************************************
		*function header
		*function name  : UpdateAffiliate
		*function type  : call by value	
		*functionality  : update the account of employer
		*input			: oEmployer array
		*output			: update the account of employer
		*return value   : nothing
		*note			: nothing
		***************************************************************************************
		*/
		function UpdateAffiliate()
		{  
			global $_CONF;
			
	        $oAffiliate->member_id			=	$_POST['member_id'];
			$oAffiliate->first_name			=	$_POST['firstName'];
			$oAffiliate->last_name			=	$_POST['lastName'];
			$oAffiliate->user_name			=	$_POST['user_name'];
			$oAffiliate->email				=	$_POST['email'];
			$oAffiliate->password			=	$_POST['password'];
			
			$oAffiliate->organisation_name		=	$_POST['org_name'];			
			$oAffiliate->organisation_website	=	$_POST['org_address'];						
			$oAffiliate->description			=	htmlentities($_POST['description'],ENT_QUOTES);									
			$oAffiliate->donation_url 			= trim($_POST['donation_url']);
			
			$oAffiliate->street_address			=	htmlentities($_POST['street_address'],ENT_QUOTES);
			$oAffiliate->state	        	=	$_POST['state'];
			$oAffiliate->city	            =	$_POST['city'];
			$oAffiliate->country	        =	$_POST['country'];
			
			//$oAffiliate->logo				=	$_POST['organisation_banner'];
			$oAffiliate->zip_code		=	$_POST['zip_code'];
			$oAffiliate->banner				= 	$_POST['old_banner_name'];
			
			$isDuplicate	=	$this->oModel->checkDuplicationEdit($oAffiliate);

			if($isDuplicate == "email") {
									
				$sErrorMsg	= "E-mail Id already exists.";
				$this->EditProfile($oAffiliate, $sErrorMsg);
				die();			
			}
						
			$tmp_file_name					= 	$_FILES['organisation_banner']['tmp_name'];			
			$banner_name					= 	$_FILES['organisation_banner']['name'];
			
			if($banner_name != "") {
			
				$uploadpath	= $_CONF['UploadLogo'];
				$max_size	= 5242880; //in bytes = 5 MB
				$max_width	= 900;
				$max_height	= 250;
				
				$file_type 		=	$_FILES['organisation_banner']['type'];
				$ext_allowed	=	array('image/gif','image/pjpeg','image/jpeg');
				
				$sErrorMsg		= "";
				
				$isValidFileType = $this->checkFileType($ext_allowed, $file_type);
				$isValidFileSize = $this->checkFileSize($max_size, $tmp_file_name, $max_width, $max_height,&$sErrorMsg);				
				
				if($isValidFileType && $isValidFileSize) {

					$LogoName 	= explode(".",$_FILES['organisation_banner']['name']);
					$LogoExt	= $LogoName[count($LogoName)-1];
					$newBannerName	=  $_CONF['UploadLogo'].$oAffiliate->member_id."_organisation_banner.".$LogoExt;
					
					if(trim($oAffiliate->old_banner_name) != "") {
						unlink($_CONF['UploadLogo'].trim($oAffiliate->banner));
					}
									
					$result = move_uploaded_file($tmp_file_name, $newBannerName);
					//die("-2-");
					if($result) {

						$oAffiliate->organisation_banner =  $oAffiliate->member_id."_organisation_banner.".$LogoExt;;						
						$rs_banner = $this->oModel->updateAffiliateBannerFrontEnd($oAffiliate);	
						
						if($this->oModel->UpdateProfileFrontEnd($oAffiliate)) {
							
							$sErrorMsg = "Profile updated successfully.";
							header("location:index.php?stage=affiliates&mode=AffiliateProfile&msg=$sErrorMsg");
							die();																			
						} else {
							
							$sErrorMsg	= "SQL error, Please try again.";						
							$this->EditProfile($oAffiliate,$sErrorMsg);
							die();
						}														
					} else {
						//die("-1-");						
						$sErrorMsg = "Banner uploading failed due to some technical reason. Please try later.";													
						$this->EditProfile($oAffiliate,$sErrorMsg);
						die();						
					}					
				}
				
				if(!$isValidFileType) {
					$sErrorMsg	= "Only jpg/gif/jpeg images can be uploaded.";
					$this->EditProfile($oAffiliate,$sErrorMsg);
					die();						
				}
				
				if(!$isValidFileSize) {
					// $sErrorMsg	= "Only images up to 900px wide and 250px high, max size 5MB can be uploaded.";													
					$this->EditProfile($oAffiliate,$sErrorMsg);
					die();						
				}				
			} else {
			
				$rs = $this->oModel->UpdateProfileFrontEnd($oAffiliate);			
				
				if($rs) {					
					$sErrorMsg = "Profile updated successfully.";
					header("location:index.php?stage=affiliates&mode=AffiliateProfile&msg=$sErrorMsg");
					die();												
				} else {
					$sErrorMsg	= "SQL error, Please try again.";
					$this->EditProfile($oAffiliate,$sErrorMsg);
					die();
				}			
			}
		}//ef
		
		

		/*
		***********************************************************************************
		*function header
		*function name  : ListAffiliates
		*function type  : call by value	
		*functionality  : 
		*input			: 
		*output			: 
		*return value   : nothing
		*note			: nothing
		************************************************************************************
		*/
		function ListAffiliates()
		{
			/* permissions */						
			
			$this->oView->affiliate_content_page_header_view = true; 										
				
			// requirement by client:: if session exist than check permission otherwise create a visitor user						
			if(!empty($_SESSION["member_type"]))
			{					
				$this->oView->affiliate_content_page_header_view = $this->aModel->checkSpecificAccessPermission("Affiliate Content",'Page Header',"View");
			}	
			/** permissions **/
			
			$oAffiliate = $this->oModel->getAffiliatesList($_SESSION["member_id"]);

			//print_r($oAffiliate);
			//die("--");
			$this->oView->oAffiliate = $oAffiliate;
			$this->oView->ListAffiliates();
		}//ef	
		
	

		
		/*
		***********************
		This function checks the availability of the type of the file in the allowed array
		***************************************************************************************
		*/	
		private function checkFileType($ext_allowed, $file_type = null)
		{
			
			if(in_array($file_type,$ext_allowed))
			{
				return true;
			}
			else
			{
				return false;
			}
		}//ef

			/*
		*****************************************************
		This function checks the size of the file to be uploaded. It shouldn't exceed the maximum size specified.
		******************************************************
		*/				
		private function checkFileSize($max_size, $filepath, $max_width, $max_height, $sErrorMsg = NULL)
		{
			$file_size	= filesize($filepath);			

			if($file_size < $max_size)
			{
				$thumbsize	=	getimagesize($filepath);				
				$w	=	$thumbsize[0];				
				$h	=	$thumbsize[1];
				
				if($h <= $max_height && $w <= $max_width)				
				{
					return true;
				}
				else
				{
					$sErrorMsg	= "Only jpeg and gif files of dimension 900*250  or lesser can be uploaded.";	
					return false;					
				}	
			}
			else{
				
				$sErrorMsg	= "Only jpeg and gif files of upto 5Mb can be uploaded.";
				return false;			
			}			
			
		
		}


		
		/*
		 * *************************************************************************************
		*Function Header
		*Function Name  : AffiliateAuthenticate
		*Function Type  : call by value
		*Functionality  : Authenticates user access to this controller
		*Input			: NIL
		*Output			: authenicates the user
		*Return Value   : NIL
		*Note			: NIL		
		*****************************************************************************************
		**/
		function AffiliateAuthenticate() {
		
			if(!isset($_SESSION['username']))
			{
				echo "<script>location.href=\"index.php?stage=member&mode=login&sErrorMessage=You have been logged out of the system due to inactivity.\"</script>";
				die();
			} else {
			
				if(($_SESSION['member_type'] != "affiliate")) {
				
					$this->EmailMessage("invalidaccess");
					die();
				}
			}
		}//ef
		
		
		/*
		 * *************************************************************************************
		*Function Header
		*Function Name  : ViewSignaturesDetails
		*Function Type  : call by value
		*Functionality  : Authenticates user access to this controller
		*Input			: NIL
		*Output			: authenicates the user
		*Return Value   : NIL
		*Note			: NIL		
		*****************************************************************************************
		**/
		function ViewSignaturesDetails() {
		
			global $_CONF;
			
			$this->AffiliateAuthenticate();

			$PetitionFiles = $_CONF['PetitionFiles'];
			$user_name = $_SESSION['username'];
			
			if(!isset($_REQUEST['article_id']))
			{
				$this->EmailMessage("invalidaccess");
				die();
			}
			
			$article_id = $_REQUEST['article_id'];
			
			//unlink($file_name);
			$file_name = $PetitionFiles.'petition_'.$user_name.'_'.$article_id.'.csv';
			//die();
		    if (!$handle = fopen($file_name, 'w+')) {
		    	
				$this->EmailMessage("invalidaccess");
				die();
		    }
			
			
			
			$fileHeader = array ('S.No.', 'First Name', 'Last Name', 'Zip Code');
			//"S.No.\t\tName\t\t\tZip Code\n\n";
		    //Write $somecontent to our opened file.
		    if (fputcsv($handle, $fileHeader) === FALSE) {
		    	
				$this->EmailMessage("invalidaccess");
				die();
		    }
		    
		   	// die("sadas");
			$oAffiliates = $this->oModel->getTotalSigns($article_id);
			//print_r($oAffiliates);
			
			if($oAffiliates) {
				$ctr = 1;
				foreach ($oAffiliates as $oAffiliate) {
				
					$fileContent = array ($ctr, $oAffiliate->first_name, $oAffiliate->last_name, $oAffiliate->mail_zip_code);
					//$name = $oAffiliate->first_name.' '.$oAffiliate->last_name;
					//$zip_code = $oAffiliate->mail_zip_code;
					//$fileContent = $ctr."\t\t".$name."\t\t\t".$zip_code."\n";					
					//fwrite($handle, $fileContent);
					fputcsv($handle, $fileContent);
					$ctr++;
				}//foreach
			}//if
			
			fclose($handle);
						
			header("Expires: Mon, 26 Nov 1962 00:00:00 GMT");
			header("Last-Modified: " . gmdate("D,d M Y H:i:s") . " GMT");
			header("Cache-Control: no-cache, must-revalidate");
			header("Pragma: no-cache");
			header("Content-type: application/csv");
			header("Accept-Ranges: bytes");
			header("Content-Disposition: attachment;filename=".basename($file_name)."");
			readfile($file_name);			
			//die("--DONE--");
		}//ef		
	};//ec
?>