<?php
   session_start();
	/***********************************************************************************************************
		* Author Name		: Anil Nautiyal
		* Creation Date 	: 27th May-2011
		* FileName			: VisitorController.php	[Front -end]
		* Called From 		: index.php file.
		* Description		: SubscriberController file is used to control the SubscriberModel and SubscriberView                          files,it passes control according to the operation required.
		* Components Used 	: Validation for server side validations
		* Tables Accessed 	: none
		* Program Specs 	:     
		* UTP doc 			:
		* Tested By 		:  
	************************************************************************************************************/
	require_once($_CONF['ModulesPath'].'visitor/classes/VisitorModel.php');
	require_once($_CONF['ModulesPath'].'accession/classes/AccessionModel.php');
	require_once($_CONF['ModulesPath'].'setting/classes/SettingModel.php');
	require_once($_CONF['ModulesPath'].'affiliates/classes/AffiliatesModel.php');	
	require_once($_CONF['ModulesPath'].'member/classes/MemberModel.php');
	require_once($_CONF['ModulesPath'].'electedrepresentative/classes/ElectedrepresentativeModel.php');	
	
										
	//contains constants that are used in this module
	require_once($_CONF['ModulesPath'].'system/classes/Validation.php');
										
	//contains validation functions
	require_once($_CONF['ModulesPath'].'system/functions.php');	
										    								    
	//contains some common functions 
	require_once($_CONF['ModulesPath'].'system/classes/extra/class.phpmailer.php');								    

	//contains paypal code
	require_once($_CONF['ModulesPath'].'system/classes/paypalclass.php');
	
	//contains some common data classes 
	require_once($_CONF['ModulesPath'].'system/classes/dataclasses.php');								    
	
	//getting nusoap lib  file
	require_once($_CONF['SitePath']."webservices/nusoap.php");
	
	/***************************************************************
	*Class Header
	*Class Name    : VisitorController
	*Functionality : This class controls SubscriberModel and SubscriberView
					 to handle Subscribers on the site.
	*Note          : SubscriberController inherits UserController that 
 	                contains functions for the user site.
	***************************************************************/

	class VisitorController extends UserController
	{
		var $oModel;
		var $LogoFile;
		
		var $last_error = "";            // last error message set by this class
		var $last_time = 0;              // last function execution time (debug info)
		
		
		/***************************************************************************************
		*Function Header
		*Function Name  : VisitorController
		*Function Type  : Constructor	
		*Functionality  : Initializes objects of different classes 
		*Input			: nothing
		*Output			: Class objects
		*Return Value   : nothing
		*Note			: nothing
		****************************************************************************************/
		
		function VisitorController()
		{
			parent::UserController();
			$this->oModel	= new VisitorModel();
			
			$this->aModel	= new AccessionModel();			
			$this->sModel	= new SettingModel();			
			
			$this->aModel->checkAccessPermission();
			
			$this->affModel	= new AffiliatesModel();
			
			$this->memberModel	= new MemberModel();			
			
			$this->eModel	= new ElectedrepresentativeModel();
			
			$this->oView	= new VisitorView();
			$oVisitor = new Visitor();			
			
		}

		
		/******************************************************************************************
		*Function Header
		*Function Name  : SubscriberJoin
		*Function Type  : Call by value	
		*Functionality  : Displays the page for new signup of subscriber.
		*Input			: nothing
		*Output			: Signup page for subscriber through SubscriberView.
		*Return Value   : nothing
		*Note			: nothing
		*******************************************************************************************/
		function SubscriberJoin($oSubscriber,$sErrorMsg="")
		{
			$this->oView->sErrorMsg = $sErrorMsg;
			$this->oView->oSubscriber = $oSubscriber;
			$this->oView->oAffiliates = $this->oModel->getAffiliates();			
			$this->oView->SubscriberJoin();
		}//ef
		
		
		/******************************************************************************************
		*Function Header
		*Function Name  : CheckAffiliateCode 
		*Function Type  : Call by value	
		*Functionality  : Displays the page for new signup of subscriber.
		*Input			: nothing
		*Output			: Signup page for subscriber through SubscriberView.
		*Return Value   : nothing
		*Note			: nothing
		*******************************************************************************************/
		function CheckAffiliateCode()
		{	
			if(isset($_REQUEST['primary_afflliate_code']))
			{	
				$primary_afflliate_code = $_REQUEST['primary_afflliate_code'];
			
				$affID  = $this->oModel->getPrimaryAffIDfromCode($primary_afflliate_code);  
				echo $affID;
				exit();
			}			
		}//ef
		
		
		/******************************************************************************************
		*Function Header
		*Function Name  : CheckPromoCode 
		*Function Type  : Call by value	
		*Functionality  : .
		*Input			: nothing
		*Output			: .
		*Return Value   : nothing
		*Note			: nothing
		*******************************************************************************************/
		function CheckPromoCode()
		{	
			if(isset($_REQUEST['promo_code']))
			{	
				$promo_code = trim($_REQUEST['promo_code']);
				if($promo_code == "") {
					
					echo "invalidSpLiT0";
					exit();	
				} else {
				
					$promo_code_amount  = $this->oModel->getPromoCode($promo_code);
					if($promo_code_amount > 0) {

						echo "validSpLiT".$promo_code_amount;
						exit();
					} else {
						
						echo "invalidSpLiT0";
						exit();	
					}
				}
			}			
		}//ef
		
		
		
		/*******************************************************************************
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
		*function name  : MemberDashboard
		*function type  : call by value	
		*functionality  : 
		*input			: 
		*output			: 
		*return value   : nothing
		*note			: nothing
		***************************************************************************************
		*/
		function MemberDashboard()
		{	
			//authnticate login
			$this->SubscriberAuthenticate();
			
			## View Alert - Added Affiliate Articles 	
			$profile_info = $this->oModel->getProfileInfo($_SESSION['username']);
			$uID = $profile_info[0]->member_id;			
			$this->oView->uProfile = $profile_info;	
			
			##  Get affiliate details 		
			$this->oView->secondary_affiliates = $this->oModel->getMyAffiliates($uID);
			
			$affiliateNews = array();
			
			## get comments / news  data			
			if(count($this->oView->secondary_affiliates))
			{				
				$affID = $this->oView->secondary_affiliates[0]['member_id'];				
				$affiliateNews = $this->affModel->getAffiliateNews( $affID );				
			}
			
			$this->oView->affiliateNews = $affiliateNews;
			
			
			$this->oView->affiliateArticles = $this->oModel->getAffiliateArticles($uID,1);		

			if(isset($_SESSION['Bill Resources']['Bill Summary']['View']))			 
				$this->oView->bill_resource_bill_summary_view = $_SESSION['Bill Resources']['Bill Summary']['View'];
			
			if(isset($_SESSION['Bill Resources']['Bill Detail']['View'])) 
				$this->oView->bill_resource_bill_detail_view = $_SESSION['Bill Resources']['Bill Detail']['View'];
			
			if(isset($_SESSION['ER Content']['Comments']['View'])) 
				$this->oView->er_content_comments_view = $_SESSION['ER Content']['Comments']['View'] ;
						
			if(isset($_SESSION['Affiliate Content']['Bills / Petitions']['View'])) 
				$this->oView->affiliate_content_bills_view = $_SESSION['Affiliate Content']['Bills / Petitions']['View'];
					
			
			$this->oView->oMember = $this->eModel->getElectedOfficials();			
		
			$this->oView->MemberDashboard();
			
		}//ef
		
		function getMoreViewAlerts()
		{
			//authnticate login
			$this->SubscriberAuthenticate();
		
			if(isset($_REQUEST['page']))
			{
				$page = $_REQUEST['page'];
			}
			
			## View Alert - Added Affiliate Articles 	
			$profile_info = $this->oModel->getProfileInfo($_SESSION['username']);
			$uID = $profile_info[0]->member_id;			
			$this->oView->uProfile = $profile_info;	
			$this->oView->affiliateArticles = $this->oModel->getAffiliateArticles($uID,$page);		
		}
		
		
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
			//authnticate login
			$this->SubscriberAuthenticate();

			## View Alert - Added Affiliate Articles 	
			$profile_info = $this->oModel->getProfileInfo($_SESSION['username']);
			$uID = $profile_info[0]->member_id;			
			$this->oView->uProfile = $profile_info;	
			$this->oView->affiliateArticles = $this->oModel->getAffiliateArticles($uID,0);			
			
			if(isset($_SESSION['Bill Resources']['Bill Summary']['View']) and ($_SESSION['Bill Resources']['Bill Summary']['View'] == 'Y'))			 
				$this->oView->bill_resource_bill_summary_view = $_SESSION['Bill Resources']['Bill Summary']['View'];
			else	
				header("location:index.php?stage=pages&mode=accessDenied");			
				
			if(isset($_SESSION['Bill Resources']['Bill Detail']['View'])) 			
				$this->oView->bill_resource_bill_detail_view = $_SESSION['Bill Resources']['Bill Detail']['View'];

			$this->oView->VoteAlerts();
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

			//authnticate login
			$this->SubscriberAuthenticate();
		
			if(isset($_REQUEST["id"]))
				$articleID = $_REQUEST["id"];
			
			## View Alert - Added Affiliate Articles 	
			$profile_info = $this->oModel->getProfileInfo($_SESSION['username']);
			
			## Get voting Details 
			$votingDetails = $this->memberModel->getVoteStatus($_SESSION['username'],$articleID);
			$this->oView->voting_details = $votingDetails ;
			
			## http://voices4change.netsmartz.us/index.php?stage=subscriber&mode=VoteAlertsDetail&id=1
			
			$uID = $profile_info[0]->member_id;			
			$this->oView->uProfile = $profile_info;	
			
			
			if(isset($_SESSION['Bill Resources']['Bill Summary']['View']) and ($_SESSION['Bill Resources']['Bill Summary']['View'] == 'Y'))			 
				$this->oView->bill_resource_bill_summary_view = $_SESSION['Bill Resources']['Bill Summary']['View'];
			else 
				header("location:index.php?stage=pages&mode=accessDenied");			
			
			if(isset($_SESSION['Bill Resources']['Bill Detail']['View']) &&  ($_SESSION['Bill Resources']['Bill Detail']['View'] == 'Y')) 
				$this->oView->bill_resource_bill_detail_view = $_SESSION['Bill Resources']['Bill Detail']['View'];
			else 
				header("location:index.php?stage=pages&mode=accessDenied");			
			
			
			if(isset($_SESSION['Affiliate Content']['Bills / Petitions']['Vote on Content']))			 
				$this->oView->affiliate_content_bills_vote_on_content = $_SESSION['Affiliate Content']['Bills / Petitions']['Vote on Content'];
												
			$this->oView->affiliateArticles = $this->oModel->getAffiliateArticleDetail($articleID);			 
			
			
			
			$this->oView->VoteAlertsDetail();
			
		}//ef
		
		
		/*
		**************************************************************************************
		*function header
		*function name  : paymentipn
		*function type  : call by value	
		*functionality  : 
		*input			: 
		*output			: 
		*return value   : nothing
		*note		    	: nothing
		***************************************************************************************
		*/
		function paymentipn()
		{
			if(isset($_REQUEST)) {
				print_r($_REQUEST);
			}
			die();						
		}//ef	

		
		/*
		**************************************************************************************
		*function header
		*function name  : paymentSuccess
		*function type  : call by value	
		*functionality  : 
		*input			: 
		*output			: 
		*return value   : nothing
		*note		    	: nothing
		***************************************************************************************
		*/
		function paymentSuccess()
		{
			
			if( isset($_REQUEST["stage"]) && isset($_REQUEST["mode"]) && ($_REQUEST["mode"]== "paymentSuccess") )
			{
				// Update payment status table 
				/*					
				Array
				(
					[stage] => subscriber
					[txn_id] => 8JP020656Y949612D
					[payment_type] => instant
					[item_name] => membersubscription
					[mc_currency] => USD
					[residence_country] => US
					[test_ipn] => 1
					[transaction_subject] => membersubscription
					[handling_amount] => 0.00
					[payment_gross] => 100.00
					[shipping] => 0.00
					[form_charset] => UTF-8
					[username] => observer
					[remember] => 1
					[PHPSESSID] => 3ojlvg00chq31s2n1nroki82a6
				)
					
				*/
					
				## Update database 			
				$user_name = $this->oModel->setUserType($_SESSION['username'],'subscriber');
				
				## update session 
				$_SESSION['member_type'] = 'subscriber';		
				header("location:index.php?stage=subscriber&mode=MyProfile");
			}
		}
		
		function paymentCancel()
		{
			/*  Array ( [stage] => subscriber [mode] => paymentCancel [username] => observer [remember] => 1 [PHPSESSID] => r90hof02d1ko1mkeg4i5av65a7 ) */					
			header("location:index.php?stage=subscriber&mode=MyProfile");
		}
		
		/*
		**************************************************************************************
		*function header
		*function name  : MyProfile
		*function type  : call by value	
		*functionality  : 
		*input			: 
		*output			: 
		*return value   : nothing
		*note			: nothing
		***************************************************************************************
		*/
		function MyProfile()
		{
		
			//authnticate login
			$this->SubscriberAuthenticate();
		
			global $_CONF;
			/*
			$oPaypal = new Paypal();
			
			$oPaypal->url 		= $_CONF['payment_url'];
			$oPaypal->return 	= $_CONF['return'];
			$oPaypal->cancel_return = $_CONF['cancel_return'];
			$oPaypal->notify_url 	= $_CONF['notify_url'];
			$oPaypal->business 		= $_CONF['business'];
			$oPaypal->amount 		= $_CONF['amount'];
			$oPaypal->currency_code = $_CONF['currency_code'];
			$oPaypal->item_name 	= $_CONF['item_name'];
			$this->oView->oPaypal = $oPaypal;
			*/
			//print_r($oPaypal);
			//die();
			if(isset($_REQUEST['msg']))
			{
				$msg =	"Data is Saved.";
				$this->oView->message = $msg;
			}
			
			$profile_info = $this->oModel->getProfileInfo($_SESSION['username']);
			$uID = $profile_info[0]->member_id;
			$this->oView->uProfile = $profile_info;
			
			$profile_info1 = $this->oModel->getProfileInfo1($uID);
			$profile_info1[0]->mailAddress = "";
			
			if($profile_info1[0]->mail_street_address != "") {
				$profile_info1[0]->mailAddress .= $profile_info1[0]->mail_street_address.', '.$profile_info1[0]->mail_city. '<br/>' . $profile_info1[0]->mail_state. ' - '.$profile_info1[0]->mail_zip_code;
			}
			
			$profile_info1[0]->billAddress = "";
			
			if($profile_info1[0]->bill_street_address != "") {
				$profile_info1[0]->billAddress .= $profile_info1[0]->bill_street_address.', '.$profile_info1[0]->bill_city. '<br/>' . $profile_info1[0]->bill_state. ' - '.$profile_info1[0]->bill_zip_code;
			}


			$this->oView->uProfile[1] = $profile_info1;
			
			
			
			
		
			$secondary_affiliates = $this->oModel->getMySecondaryAffiliates($uID);
			$i = 1;
			foreach($secondary_affiliates as $id => $affName){
				$affiliates .= '
					<tr>
						<td valign="top" align="left">'.$affName.'</td>
					</tr>
				';
				$i++;
			} 

			if(!count($secondary_affiliates ))
			{
				$affiliates .= '
					<tr>
						<td valign="top" align="left">No data found.</td>
					</tr>';
			}
			
			$this->oView->myAffiliate = $affiliates; 
			
			if($this->oView->uProfile[1][0]->is_billing == 1)
			{
				$this->oView->is_billing = "checked='checked' disabled='disabled'";
			}
			else
			{
				$this->oView->is_billing = "disabled='disabled'";
			}
			
			$this->oView->MyProfile();
		}//ef
		
		/*
		**************************************************************************************
		*function header
		*function name  : ProfileEdit
		*function type  : call by value	
		*functionality  : 
		*input			: 
		*output			: 
		*return value   : nothing
		*note			: nothing
		***************************************************************************************
		*/
		function ProfileEdit()
		{
		
			//authnticate login
			$this->SubscriberAuthenticate();
		
			$profile_info = $this->oModel->getProfileInfo($_SESSION['username']);
			$uID = $profile_info[0]->member_id;
			
			if(isset($_POST['submit'])){
	
				$this->oModel->updProfile['firstName'] 	= trim($_POST['firstName']);
				$this->oModel->updProfile['lastName'] 	= trim($_POST['lastName']);				
				$this->oModel->updProfile['UserName'] 	= trim($_POST['UserName']);
				
				$this->oModel->updProfile['email'] 		= trim($_POST['email']);
				$this->oModel->updProfile['streetAddress'] = mysql_escape_string(trim($_POST['streetAddress']));

				$oMember = $this->oModel->getStreetAddress($uID);
				$oMemberSingle = $oMember[0];
				
				if($this->oModel->updProfile['streetAddress'] == trim($oMemberSingle->mail_street_address)) 
				{
					if($oMemberSingle->is_address_changed == 'yes') {
						
						$this->oModel->updProfile['is_address_changed'] = "no";
					} else {
						
						$this->oModel->updProfile['is_address_changed'] = 'yes';
					}	
				} else {
					
					$this->oModel->updProfile['is_address_changed'] = 'yes';
				}
				
				$this->oModel->updProfile['City'] 		= trim($_POST['City']);
				$this->oModel->updProfile['state'] 		= trim($_POST['state']);
				$this->oModel->updProfile['zipCode'] 	= trim($_POST['zipCode']);
				/*
				$this->oModel->updProfile['country'] 	= trim($_POST['country']);
				*/
				$secondary_afflliates					=	$_POST['secondary_afflliates'];
				
				$index = -1;
				if(!empty($secondary_afflliates)) {	
					$pr_aff	 = $_POST['pr_aff'];

					foreach($secondary_afflliates as $key => $val)  {
						if($val == $pr_aff) {
							$index = $key;
						}
					}
					if($index >= 0) {
						array_splice($secondary_afflliates, $index, 1);
					}
					
					$this->oModel->updProfile['secondary_afflliates'] =  implode(",",$secondary_afflliates);
				}
				
				$this->oModel->updProfile['billingAddress'] = mysql_escape_string(trim($_POST['billingAddress']));
				$this->oModel->updProfile['billCity'] 		= trim($_POST['billCity']);
				$this->oModel->updProfile['billState'] 		= trim($_POST['billState']);
				$this->oModel->updProfile['billZipCode'] 	= trim($_POST['billZipCode']);
				/*
				$this->oModel->updProfile['billCountry'] 	= trim($_POST['billCountry']);
				*/
				
				if(strlen(trim($_POST['password'])) > 0){
					$this->oModel->updProfile['password'] = md5(trim($_POST['password']));
				}
				
				$this->oModel->updProfile['ID'] = $uID;
			/*	
				echo "<pre>";
				print_r($_POST);
				print_r($this->oModel->updProfile);
				die();				
			*/
				$updState = $this->oModel->updateProfile();
				header("location: index.php?stage=subscriber&mode=MyProfile&msg=DataisSaved");
			} 
			
			
			$this->oView->oAffiliates = $this->oModel->getAffiliates();	
			$this->oView->secondary_affiliates = $this->oModel->getMySecondaryAffiliates($uID);
			
			
			$this->oView->myAffiliate = $affiliates; 
			
			$profile_info1 = $this->oModel->getProfileInfo1($uID);
			$this->oView->uProfile = $profile_info;
			$this->oView->uProfile[1] = $profile_info1;
			
			if($this->oView->uProfile[1][0]->is_billing == 1)
			{
				$this->oView->is_billing = "checked='checked'";
			}
			else
			{
				$this->oView->is_billing = " ";
			}
			
			//$this->oView->uProfile[1][0]->is_billing;
			$this->oView->ProfileEdit();
		}//ef

		
		/*		************************************************************************************
		*function header
		*function name  : ElectedRepresentatives
		*function type  : call by value	
		*functionality  : 
		*input			: 
		*output			: 
		*return value   : nothing
		*note			: nothing		************************************************************************************
		*/
		function ElectedRepresentatives()
		{	
			//authnticate login
			$this->SubscriberAuthenticate();
		
			$profile_info = $this->oModel->getProfileInfo($_SESSION['username']);
			
			//print_r($profile_info);
			$member_id = $profile_info[0]->member_id;
			$electedOfficials = $this->oModel->getElectedOfficials($member_id);
			
			foreach($electedOfficials as $Officer) {
				//echo '<pre>';
				//print_r($Officer);
				//echo "<br />";
				$Officer->address = "";
				if($Officer->PrimaryAddress1 != "") {
					
					$Officer->address .= $Officer->PrimaryAddress1."<br />";
				}
				
				if($Officer->PrimaryAddress2 != "") {
					
					$Officer->address .= $Officer->PrimaryAddress2."<br />";
				}				
				if($Officer->PrimaryAddress3 != "") {
					
					$Officer->address .= $Officer->PrimaryAddress3."<br />";
				}
				
				if($Officer->PrimaryCity != "") {
					
					$Officer->address .= $Officer->PrimaryCity." ";
				}
				
				if($Officer->PrimaryState != "") {
					
					$Officer->address .= $Officer->PrimaryState." ";
				}
				
				if($Officer->PrimaryPostalCode != "") {
					
					$Officer->address .= $Officer->PrimaryPostalCode;
				}
				
			}
			
			//print_r($electedOfficials);
			//die();
			$this->oView->electedOfficials = $electedOfficials;
			
			$this->oView->ElectedRepresentatives($profile_info);
		}//ef

		
		/*
		***********************************************************************************
		*function header
		*function name  : MyAffiliates
		*function type  : call by value	
		*functionality  : 
		*input			: 
		*output			: 
		*return value   : nothing
		*note			: nothing
		************************************************************************************
		*/
		function MyAffiliates()
		{
			//authnticate login
			$this->SubscriberAuthenticate();
		
			$profile_info = $this->oModel->getProfileInfo($_SESSION['username']);

			$uID = $profile_info[0]->member_id;			
			$this->oView->uProfile = $profile_info;	
			$this->oView->secondary_affiliates = $this->oModel->getMyAffiliates($uID);

			if(isset($_SESSION['Affiliate Content']['Page Header']['View'])) 
				$this->oView->affiliate_content_page_header_view = $_SESSION['Affiliate Content']['Page Header']['View'];

			$this->oView->MyAffiliates($profile_info );
		}//ef	

		/************************************************************************************
		*function header
		*function name  : AffiliateDetails
		*function type  : call by value	
		*functionality  : 
		*input			: 
		*output			: 
		*return value   : nothing
		*note			: nothing
		************************************************************************************
		*/
		function AffiliateDetails($affID)
		{
			//authnticate login
			$this->SubscriberAuthenticate();
			$profile_info = $this->oModel->getProfileInfo($_SESSION['username']);

			$uID = $profile_info[0]->member_id;			
			$this->oView->uProfile = $profile_info;	
			
			
			if(isset($_REQUEST["id"]))
				$affID = $_REQUEST["id"];
			
			$oAffiliate = $this->affModel->getAffiliate($affID);
			
			$this->oView->vAffiliate = $oAffiliate;		
						
			//get Affiliates votealert
			$this->oView->affiliateVoteAlerts = $this->affModel->getAffiliateVoteAlerts( $affID );
			//get Affiliates votealert
			$this->oView->affiliatePetitions = $this->affModel->getAffiliatePetitions( $affID );			
			$this->oView->affiliateNews = $this->affModel->getAffiliateNews( $affID );
			$this->oView->affiliateBulletin = $this->affModel->getAffiliateBulletin( $affID );
						
			$this->oView->vMsg = $msg; 			
			$this->oView->AffiliateDetails($profile_info);
			
			/*
			$this->oView->secondary_affiliates = $this->oModel->getAffiliateDetail($affID);
			
			if(isset($_SESSION['Affiliate Content']['Page Header']['View'])) 
				$this->oView->affiliate_content_page_header_view = $_SESSION['Affiliate Content']['Page Header']['View'];
				
			$this->oView->MyAffiliates( $affID );
			*/
			
		}//ef	

		
		/*
		 * ***********************************************************************************
		*function header
		*function name  : getUserElectedOfficials
		*function type  : call by value	
		*functionality  : 
		*input			: 
		*output			: 
		*return value   : nothing
		*note			: nothing
		************************************************************************************
		*/
		function updateUserElectedOfficials($memberId = "")
		{
			$this->oModel->updateElectedOfficials($member_id);
		}//ef
		
		
		/*
		 * **********************************************************************************************
		*Function Header
		*Function Name  : SubscriberAuthenticate
		*Function Type  : call by value
		*Functionality  : Authenticates user access to this controller
		*Input			: NIL
		*Output			: authenicates the user
		*Return Value   : NIL
		*Note			: NIL		
		*****************************************************************************************
		**/
		function SubscriberAuthenticate() {
		//die($_SESSION['member_type']);
		//subscriber
		
			if(!$_SESSION['username'])
			{
				echo "<script>location.href=\"index.php?stage=member&mode=login\"</script>";
				die();
			} else {
			
				if(($_SESSION['member_type'] != "observer") and ($_SESSION['member_type'] != "subscriber")) {
				
					$this->EmailMessage("invalidaccess");
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
		function AffiliateVoteAlerts()
		{
			
			//authnticate login
			$this->SubscriberAuthenticate();
			
			if(isset($_REQUEST["affID"]))
				$affID = $_REQUEST["affID"];
			
			## affiliate ID required
			$oAffiliate = $this->affModel->getAffiliate($affID);			
			$this->oView->vAffiliate = $oAffiliate;				
			
			//View Alerts Added Affiliate Articles 	
			$this->oView->affiliateVoteAlerts = $this->affModel->getAffiliateVoteAlerts( $affID );
			$this->oView->AffiliateVoteAlerts();			
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
		function AffiliatePetitions()
		{
			
			//authnticate login
			$this->SubscriberAuthenticate();
			
			if(isset($_REQUEST["affID"]))
				$affID = $_REQUEST["affID"];
			
			## affiliate ID required
			$oAffiliate = $this->affModel->getAffiliate($affID);			
			$this->oView->vAffiliate = $oAffiliate;				
			
			//View Alerts Added Affiliate Articles 	
			$this->oView->affiliatePetitions = $this->affModel->getAffiliatePetitions( $affID );
			$this->oView->AffiliatePetitions();			
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
			//authnticate login
			$this->SubscriberAuthenticate();			
			
			if(isset($_REQUEST["affID"]))
				$affID = $_REQUEST["affID"];
			
			## affiliate ID required
			$oAffiliate = $this->affModel->getAffiliate($affID);			
			$this->oView->vAffiliate = $oAffiliate;				
			
			
			//View Alerts Added Affiliate Articles 				
			$this->oView->affiliateVoteAlerts = $this->affModel->getAffiliateNews( $affID );
			$this->oView->AffiliateNews($profile_info);
			
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
			//authnticate login
			$this->SubscriberAuthenticate();
			
			if(isset($_REQUEST["affID"]))
				$affID = $_REQUEST["affID"];

			
			## affiliate ID required
			$oAffiliate = $this->affModel->getAffiliate($affID);			
			$this->oView->vAffiliate = $oAffiliate;				
						
			//View Alerts Added Affiliate Articles 	
			$this->oView->affiliateVoteAlerts = $this->affModel->getAffiliateBulletin( $affID );
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
		function AffiliateVoteAlertsDetail($articleID = NULL)	{
			//authnticate login
			$this->SubscriberAuthenticate();			
			
			global $_CONF;
			if(isset($_REQUEST["id"]))
				$articleID = $_REQUEST["id"];
			
			$support = $total = 0; 
			
			if(isset($_REQUEST["affID"]))
				$affID = $_REQUEST["affID"];	
			
			## affiliate ID required
			$oAffiliate = $this->affModel->getAffiliate($affID);			
			$this->oView->vAffiliate = $oAffiliate;				
			
			$this->oView->affiliateArticle = $this->affModel->getAffiliateArticleDetail($affID ,$articleID);			 
			$this->oView->articleStatus    = $this->affModel->getVotingStatus($articleID, $support ,$total );			 
			
			$supportPercentage = (int)(($support / $total ) * 100); 
			$opposePercentage  = 100 - $supportPercentage;
			
			$this->oView->supportPercentage = $supportPercentage;
			$this->oView->opposePercentage  = $opposePercentage;
			
			$this->oView->AffiliateVoteAlertsDetail();
		}//ef

		
		/*
		**************************************************************************************
		*function header
		*function name  : PetitionsDetail
		*function type  : call by value	
		*functionality  : 
		*input			: article ID 
		*output			: article Details
		*return value   : nothing
		*note			: nothing
		***************************************************************************************
		*/
		function AffiliatePetitionsDetail($articleID = NULL,$affID = NULL) {
			
			//is user login
			global $_CONF;
			
			/* system settings */													
			$one_time_petition_sign_fee = 0; 										
			$one_time_petition_sign_fee = $this->sModel->getSettingDetailFromName("One Time Petition Sign Fee");			
			$this->oView->oneTimePetitionSignFee = $one_time_petition_sign_fee;				
			/** system settings **/
			
			
			$support = $total = 0; 			
			if(isset($_REQUEST["id"]))
				$articleID = $_REQUEST["id"];
			
			if(isset($_REQUEST["affID"]))
				$affID = $_REQUEST["affID"];	
			
			if(isset($_REQUEST["new"]) && $_REQUEST["new"]!='')
			{
				$new = $_REQUEST["new"];	
				$this->oModel->deleteArticleNewNotification($new);	
			}
			
			if($articleID == "" || $affID == "") {
				
				echo "<script>location='index.php?stage=visitor&mode=EmailMessage&message=invalidaccess'</script>";
				die();				
			}
			
			$this->isLoginUser($articleID, $affID);			
			
			if(isset($_REQUEST["msg"]))
			{
				$message = $_REQUEST["msg"];					
				$this->oView->vMsg = $message;	
			}
			
			## affiliate ID required
			$oAffiliate = $this->affModel->getAffiliate($affID);			
			$this->oView->vAffiliate = $oAffiliate;				
			
			$this->oView->affiliateArticle = $this->affModel->getAffiliateArticleDetail($affID ,$articleID);			 
			
			if($this->oView->affiliateArticle[0]['voting_end'] < date("Y-m-d")) {
				echo "<script>location='index.php?stage=visitor&mode=EmailMessage&message=signingperiodclosed'</script>";
				die();				
			}
			
			$this->oView->articleStatus    = $this->affModel->getVotingStatus($articleID, $support ,$total );			 
			
			## Get voting Details 
			$votingDetails = $this->memberModel->getVoteStatus($_SESSION['username'],$articleID);
			$this->oView->voting_details = $votingDetails;
			
			
			$supportPercentage = (int)(($support / $total ) * 100); 
			$opposePercentage  = 100 - $supportPercentage;
			
			$this->oView->supportPercentage = $supportPercentage;
			$this->oView->opposePercentage  = $opposePercentage;
			
			$signs_count = $this->oModel->getTotalSignsCount($articleID);
			$this->oView->signs_count = $signs_count;			 
			
			$this->oView->AffiliatePetitionsDetail();
		}//ef
		
		
		/*
		**************************************************************************************
		*function header
		*function name  : signingOptions
		*function type  : call by value	
		*functionality  : 
		*input			: article ID 
		*output			: article Details
		*return value   : nothing
		*note			: nothing
		***************************************************************************************
		*/
		function signingOptions() {
			
			global $_CONF;
			
			//login authenticate
			//$this->SubscriberAuthenticate();	
			
			 /* system settings */													
				$one_time_petition_sign_fee = 0; 										
				$one_time_petition_sign_fee = $this->sModel->getSettingDetailFromName("One Time Petition Sign Fee");			
				$this->oView->oneTimePetitionSignFee = $one_time_petition_sign_fee;				
			/** system settings **/
			
			$articleID = "";
			if(isset($_REQUEST["articleID"])) {
				$articleID = trim($_REQUEST["articleID"]);
			} 
			
			if($articleID == "") {
				
				echo "<script>location='index.php?stage=visitor&mode=EmailMessage&message=invalidaccess'</script>";
				die();				
			}
			
			$this->oView->articleID  = $articleID;
			
			$this->oView->signingOptions();
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
		function NewsDetail($articleID = NULL) {
			//authnticate login
			$this->SubscriberAuthenticate();			
			$profile_info = $this->oModel->getProfileInfo($_SESSION['username']);
			$subscriberID = $profile_info[0]->member_id;		
			
			if(isset($_REQUEST["id"]))
				$articleID = $_REQUEST["id"];
			
			if(isset($_REQUEST["affID"]))
				$affID = $_REQUEST["affID"];	
			
			if(isset($_REQUEST["new"]) && $_REQUEST["new"]!='')
			{
				$new = $_REQUEST["new"];	
				$this->oModel->deleteArticleNewNotification($new);	
			}
			
			if(isset($_POST["subscriber_comment"])) {
				$alreadyHaveSubscriberComment = $this->oModel->getSubscriberCommentForAffArticle($articleID,$subscriberID);			
				
				if($alreadyHaveSubscriberComment)				
					$msg =	"You already  have commented to this news.";
				else	
				{
					$subscriberComment = mysql_real_escape_string($_POST["subscriber_comment"]);
					if($this->oModel->addSubscriberCommentToAffArticle($subscriberID,$articleID,$subscriberComment))
						$msg =	"Data is Saved.";
					else	
						$msg =	"Error in saving data.";		
				}		
				$this->oView->vMsg = $msg;		
			}
			
			$support = $total = 0; 
			## affiliate ID required
			$oAffiliate = $this->affModel->getAffiliate($affID);			
			$this->oView->vAffiliate = $oAffiliate;				
			
			## get comment by subscriber on Affiliate article - name date and comment
			$subscribersComment = $this->oModel->getSubscriberCommentForAffArticle($articleID);						
			$this->oView->subscribersComment = $subscribersComment;							
			
			## View Alerts Added Affiliate Articles 				
			$this->oView->affiliateArticle = $this->affModel->getAffiliateNewsDetail($affID ,$articleID);			 								
			$this->oView->NewsDetail();			
		}//ef

		
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
			//authnticate login
			$this->SubscriberAuthenticate();			
			
			
			if(isset($_REQUEST["id"]))
				$articleID = $_REQUEST["id"];
				
			if(isset($_REQUEST["affID"]))
				$affID = $_REQUEST["affID"];
			
			if(isset($_REQUEST["new"]) && $_REQUEST["new"]!='')
			{
				$new = $_REQUEST["new"];	
				$this->oModel->deleteArticleNewNotification($new);	
			}	
			
			$support = $total = 0; 
			## affiliate ID required
			$oAffiliate = $this->affModel->getAffiliate($affID);			
			$this->oView->vAffiliate = $oAffiliate;				
			
			
			## View Alerts Added Affiliate Articles 				
			$this->oView->affiliateArticle = $this->affModel->getAffiliateNewsDetail($affID ,$articleID);			 
			
			$this->oView->BulletinsDetail();
		}//ef
		
			
		/*		
		**************************************************************************************
		*function header
		*function name  : ElectedrepresentativeProfile
		*function type  : call by value	
		*functionality  : 
		*input			: 
		*output			: 
		*return value   : nothing
		*note			: nothing
		***************************************************************************************
		*/
		function ElectedrepresentativeProfile()
		{
			$this->SubscriberAuthenticate();
			//echo "ElectedrepresentativeDashboard controller";
			//die();
			
		    global $_CONF;
			
			$erID	= $_GET['er_id'];
			/*
			$oMember	= $this->oModel->getElectedRepresentativeID($er_id);
			$oMember 	= $oMember[0];
			$erID 		= $oMember->ElectedOfficialID;
			*/
			$this->oView->ElectedOfficialID 	= $erID;
			
			$oElectoralDistrict = $this->oModel->getElectedRepresentativeDetails($erID);
			
			if($oElectoralDistrict[0]->OfficerProfileImage == "") {
				
				$oElectoralDistrict[0]->OfficerProfileImage = "images/no-image.jpg";
			} else {
				
				$oElectoralDistrict[0]->OfficerProfileImage = "UserFiles/er_pics/thumb/".$oElectoralDistrict[0]->OfficerProfileImage;				
			}
			
			$oElectoralDistrict[0]->address = "";
			if($oElectoralDistrict[0]->PrimaryAddress1 != "") {
				
				$oElectoralDistrict[0]->address .= $oElectoralDistrict[0]->PrimaryAddress1."<br />";
			}
			
			if($oElectoralDistrict[0]->PrimaryAddress2 != "") {
				
				$oElectoralDistrict[0]->address .= $oElectoralDistrict[0]->PrimaryAddress2."<br />";
			}				
			if($oElectoralDistrict[0]->PrimaryAddress3 != "") {
				
				$oElectoralDistrict[0]->address .= $oElectoralDistrict[0]->PrimaryAddress3."<br />";
			}
			
			if($oElectoralDistrict[0]->PrimaryCity != "") {
				
				$oElectoralDistrict[0]->address .= $oElectoralDistrict[0]->PrimaryCity." ";
			}
			
			if($oElectoralDistrict[0]->PrimaryState != "") {
				
				$oElectoralDistrict[0]->address .= $oElectoralDistrict[0]->PrimaryState." ";
			}
			
			if($oElectoralDistrict[0]->PrimaryPostalCode != "") {
				
				$oElectoralDistrict[0]->address .= $oElectoralDistrict[0]->PrimaryPostalCode;
			}			
			
			$this->oView->oElectoralDistrict 	= $oElectoralDistrict[0];
			
			$oElectoralDistrictComments = $this->oModel->getElectedRepresentativeComments($erID,3);
			$this->oView->oElectoralDistrictComments 	= $oElectoralDistrictComments;
			
			$oElectoralDistrictPolls = $this->oModel->getElectedRepresentativePolls($erID,3);
			$this->oView->oElectoralDistrictPolls 	= $oElectoralDistrictPolls;
			
			
			
			if(isset($_REQUEST['msg'])) {
				$this->oView->vMsg = "Content submitted sucessfully."; 						
			} else {
				$this->oView->vMsg = ""; 						
			}
			
			$this->oView->ElectedrepresentativeProfile();			
		}//ef		

		
		/*
		**************************************************************************************
		*function header
		*function name  : ERArticles
		*function type  : call by value	
		*functionality  : 
		*input			: 
		*output			: 
		*return value   : nothing
		*note			: nothing
		***************************************************************************************
		*/
		function ERArticles()
		{
		    global $_CONF;
			$this->SubscriberAuthenticate();
		    			
			$erID	= $_GET['er_id'];
			/*
			$oMember	= $this->oModel->getElectedRepresentativeID($loggedInER);
			$oMember 	= $oMember[0];
			$erID 		= $oMember->ElectedOfficialID;
			*/
			$oElectoralDistrictComments = $this->oModel->getElectedRepresentativeComments($erID);
			$this->oView->oElectoralDistrictComments 	= $oElectoralDistrictComments;
			$this->oView->er_id		=	$erID;
			
			$this->oView->ERArticles();			
		}//ef
				
		
		/*
		**************************************************************************************
		*function header
		*function name  : ERPolls
		*function type  : call by value	
		*functionality  : 
		*input			: 
		*output			: 
		*return value   : nothing
		*note			: nothing
		***************************************************************************************
		*/
		function ERPolls()
		{
		    global $_CONF;
			$this->SubscriberAuthenticate();
			$erID	= $_GET['er_id'];
			
			/*			
			$loggedInER	= $_SESSION['username'];
			$oMember	= $this->oModel->getElectedRepresentativeID($loggedInER);
			$oMember 	= $oMember[0];
			$erID 		= $oMember->ElectedOfficialID;
			*/
			
			$oElectoralDistrictComments = $this->oModel->getElectedRepresentativePolls($erID);
			$this->oView->oElectoralDistrictComments 	= $oElectoralDistrictComments;
			$this->oView->er_id		=	$erID;
			
			$this->oView->ERPolls();			
		}//ef

		
		/*
		**************************************************************************************
		*function header
		*function name  : ERReportCard
		*function type  : call by value	
		*functionality  : 
		*input			: 
		*output			: 
		*return value   : nothing
		*note			: nothing
		***************************************************************************************
		*/
		function ERReportCard()
		{
		    global $_CONF;
			$this->SubscriberAuthenticate();
		    			
			$erID	= $_GET['er_id'];
			
			/*			
			$loggedInER	= $_SESSION['username'];
			$oMember	= $this->oModel->getElectedRepresentativeID($loggedInER);
			$oMember 	= $oMember[0];
			$erID 		= $oMember->ElectedOfficialID;
			*/
			$oElectoralDistrictComments = $this->oModel->getElectedRepresentativeComments($erID);
			$this->oView->oElectoralDistrictComments 	= $oElectoralDistrictComments;
			
			$this->oView->ERReportCard();			
		}//ef		
		
		
		/*
		 * **********************************************************************************************
		*Function Header
		*Function Name  : AffiliateAuthenticate
		*Function Type  : call by value
		*Functionality  : Authenticates user access to this controller
		*Input			: NIL
		*Output			: authenicates the user
		*Return Value   : NIL
		*Note			: NIL		
		******************************************************************************************/
		function ArticleDetail() {
			
			$this->SubscriberAuthenticate();
			$msg = "";
			if(isset($_GET['mgs'])) {
				
				if($_GET['mgs'] == "comment_added") {
				
					$msg = "comment_added";
				}
			}
			
			$this->oView->msg	=	$msg;
			
			if(isset($_GET['id'])) {
				$article_id = $_GET['id'];
				$erID	= $_GET['er_id'];
			}
			$oArticle = $this->oModel->getERArticleDetails($article_id);
			
			$oArticle = $oArticle[0];
			$this->oView->oArticle	=	$oArticle;
			$this->oView->er_id		=	$erID;
			$this->oView->ArticleDetail();
		}
		

		/*
		 * **********************************************************************************************
		*Function Header
		*Function Name  : PollsDetail
		*Function Type  : call by value
		*Functionality  : Authenticates user access to this controller
		*Input			: NIL
		*Output			: authenicates the user
		*Return Value   : NIL
		*Note			: NIL		
		******************************************************************************************/
		function PollsDetail() {
			
			$this->SubscriberAuthenticate();
						
			$msg = "";
			if(isset($_GET['mgs'])) {
				
				if($_GET['mgs'] == "comment_added") {
				
					$msg = "comment_added";
				}
			}
			
			$this->oView->msg	=	$msg;
			
			if(isset($_GET['id'])) {
				$article_id = $_GET['id'];
				$erID		= $_GET['er_id'];				
			}
			$oArticle = $this->oModel->getERPollDetails($article_id);
			
			$oArticle = $oArticle[0];
			$this->oView->oArticle	=	$oArticle;
			$this->oView->er_id		=	$erID;
			$this->oView->PollsDetail();
		}//ef
		
		
		/*
		************************************************************************************
		*function header
		*function name  : AddNewNews
		*function type  : call by value	
		*functionality  : 
		*input			: 
		*output			: 
		*return value   : nothing
		*note			: nothing		
		************************************************************************************
		*/
		function AddSubscriberCommentNews()
		{
		    global $_CONF;
			$this->AffiliateAuthenticate();
			
			$loggedInAffiliate = $_SESSION['username'];
			$affID = $this->oModel->getAffiliateID($loggedInAffiliate);
			
			//die("AddNewContent");
			//$oArticle	= new Article();

			$this->oModel->mBillContent->article_title 			=  	trim($_REQUEST['title']);
			$this->oModel->mBillContent->article_type			=	trim($_REQUEST['article_type']);
			
				
			$this->oModel->mBillContent->affiliate_comment		=	trim($_REQUEST['affiliate_comment']);
			$this->oModel->mBillContent->created				=	date('Y-m-d');
			
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
							
							$msg = "Article added successfully.";
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
		}//ef
		
		
		/*
		 * **************************************************************************************
		*Function Header
		*Function Name  : isLoginUser
		*Function Type  : call by value
		*Functionality  : Authenticates user access to this controller
		*Input			: NIL
		*Output			: authenicates the user
		*Return Value   : NIL
		*Note			: NIL		
		*****************************************************************************************
		**/
		function isLoginUser($articleID = "", $affID = "") {
		//die($_SESSION['member_type']);
		//subscriber
		
			if(isset($_SESSION['username']) && isset($_SESSION['member_type']))
			{
				//echo "<script>location='index.php?stage=subscriber&mode=affiliatePetitionsDetail&affID=$affID&id=$articleID'</script>";
				echo "<script>location='index.php?stage=subscriber&mode=petitionsDetail&affID=$affID&id=$articleID'</script>";
				die();				
			}
		}//ef		
		
		
		
		/******************************************************************************************
		/******************************************************************************************
		*Function Header
		*Function Name  : oneTimePaymentStepOne
		*Function Type  : Call by value	
		*Functionality  : Displays the page for new signup of visitor to sign a petition. 
		*Input			: nothing
		*Output			: Signup page for subscriber through SubscriberView. 
		*Form action 	: SaveOneTimeSubscriber
		*Return Value   : nothing
		*Note			: nothing
		*******************************************************************************************/
		function oneTimePaymentStepOne($oVisitor,$sErrorMsg="")
		{
			$articleID = "";
			if(isset($_REQUEST["article_id"])) {
				
				$articleID = trim($_REQUEST["article_id"]);
			} else if(isset($oVisitor)) {
				
				$articleID = trim($oVisitor->article_id);
			}			
			
			/* system settings */												
			$one_time_petition_sign_fee = 0; 										
			$one_time_petition_sign_fee = $this->sModel->getSettingDetailFromName("One Time Petition Sign Fee");			
			$this->oView->one_time_petition_sign_fee  = $one_time_petition_sign_fee ;										
			/** system settings **/		
			
			if($articleID == "") {
				header("location:./index.php?stage=visitor&mode=EmailMessage&message=invalidaccess");
				exit();
			}
			
			$isValidPetition = $this->oModel->isValidPetition($articleID);
			if(!$isValidPetition) {
				header("location:./index.php?stage=visitor&mode=EmailMessage&message=invalidaccess");
				exit();
			}			
			//die("oneTimePaymentStepOne");

			$this->oView->sErrorMsg = $sErrorMsg;
			$this->oView->articleID = $articleID;			
			$this->oView->oVisitor = $oVisitor;			
			$this->oView->oneTimePaymentStepOne();
		}//ef		
		
		
		
		/*
		*****************************************************************************************
		*Function Header
		*Function Name  : SaveOneTimeSubscriber
		*Function Type  : Call by value	
		*Functionality  : Stores the signup information of visitor 
		  and display terms and conditions to agree before saving to db.
		  on success call oneTimePaymentStepTwo
		*Input			: nothing
		*Output			: nothing.
		*Return Value   : nothing
		*Note			: nothing
		******************************************************************************************
		*/
		function SaveOneTimeSubscriber()
		{
		    global $_CONF;
			$oSubscriber->article_id 	= $_POST['article_id'];		

			
			/* system settings */											
			
				$one_time_petition_sign_fee = 0; 										
				$one_time_petition_sign_fee = $this->sModel->getSettingDetailFromName("One Time Petition Sign Fee");			
				$oSubscriber->onetimefee  = $one_time_petition_sign_fee ;										
				// $oSubscriber->onetimefee 	= $_POST['onetimefee'];
				
			/** system settings **/		
			
			if($oSubscriber->article_id == "") {				
				header("location:./index.php?stage=visitor&mode=EmailMessage&message=invalidaccess");
				exit();
			}

			// getarticle details 
			$articleDetails 			=  	$this->affModel->getArticleDetailOneTime($oSubscriber->article_id);
			
			$petitionLevel = $articleDetails[0]["petition_level"];
			$petitionState = $articleDetails[0]["petition_state"]; 
						
			
		    $oSubscriber->first_name				=	$_POST['first_name'];
			$oSubscriber->last_name					=	$_POST['last_name'];
			$oSubscriber->user_name					=	htmlentities($_POST['user_name'],ENT_QUOTES);
			$oSubscriber->email						=	trim($_POST['email']);
			$oSubscriber->password					=	trim($_POST['password']);
			$oSubscriber->r_password				=	trim($_POST['r_password']);
			
			$oSubscriber->mail_address				=	htmlentities($_POST['address'],ENT_QUOTES);
			$oSubscriber->mail_state	        	=	htmlentities($_POST['state'],ENT_QUOTES);
			$oSubscriber->mail_city             	=	htmlentities($_POST['city'],ENT_QUOTES);
			$oSubscriber->mail_postal_code			=	htmlentities($_POST['zip_code'],ENT_QUOTES);
			/*
			$oSubscriber->mail_country				=	htmlentities($_POST['country'],ENT_QUOTES);
			*/
			// check cicero data 
			$wsdl	=	"http://cicero.azavea.com/Azavea.Cicero.WebService.v2/AuthenticationService.asmx?wsdl";
			$client	=	new nusoap_client($wsdl, 'wsdl');
		
			$wsdl_EOQueryService	=	"http://cicero.azavea.com/Azavea.Cicero.WebService.v2/ElectedOfficialQueryService.asmx?wsdl";	
			$client_EOQueryService	=	new nusoap_client($wsdl_EOQueryService, 'wsdl');
			
			$cicero_username = $_CONF['cicero_username'];
			$cicero_password = $_CONF['cicero_password'];
		
			$params	=	array('userName'=>$cicero_username,'password'=>$cicero_password); 
			
			$token_result	=	$client->call('GetToken',$params);
			$token 			= $token_result['GetTokenResult'];
						
			$address		= $oSubscriber->mail_address;
			$state			= $oSubscriber->mail_state;			
			$city			= $oSubscriber->mail_city;
			$postalCode		= $oSubscriber->mail_postal_code;
	
			$country		= "US";
			$districtType 	= "All";
			$includeAtLarge = false;
			
			$param_validate	=	array('authToken'=>$token,'address'=>$address,'city'=>$city,'state'=>$state,'postalCode'=>$postalCode,'country'=>$country,'districtType'=>$districtType,'includeAtLarge'=>$includeAtLarge); 
			
			$result_OfficialsByAddress	=	$client_EOQueryService->call('GetOfficialsByAddress',$param_validate);
			
			
			$officials = $result_OfficialsByAddress['GetOfficialsByAddressResult']['ElectedOfficialInfo'];
			
			## print_r($officials);
			
			$isValidCicero = count($officials);
			
			if(!$isValidCicero) {	
				$sErrorMsg	= "Please enter a valid address.";				
				$this->oneTimePaymentStepOne($oSubscriber,$sErrorMsg);
				die();								
			}
			
			$stateAbbreviation 		=	$officials[0]["RepresentingState"];  
			/*
			print_R(	$officials[0]["RepresentingState"]);
			print_r( $stateAbbreviation );			
			print_r($petitionLevel);
			print_r($petitionState);
			die();*/
			
			if(($petitionLevel=="State")&&( $petitionState != $stateAbbreviation ))
			{
				$sErrorMsg	= "You are not a ". $petitionState . " State resident, and may not sign this petition.";				
				$this->oneTimePaymentStepOne($oSubscriber,$sErrorMsg);
				die();											
			}
			
			
			$oSubscriber->isBillingInfo				=   trim($_POST['isBillingInfo']);
			
			/*
			$oSubscriber->billingCountry			=	htmlentities($_POST['billingCountry'],ENT_QUOTES);
			*/
			if($oSubscriber->isBillingInfo == 0){
				
				$oSubscriber->billingAddress		=	$oSubscriber->mail_address;
				$oSubscriber->billingState			=	$oSubscriber->mail_state;	
				$oSubscriber->billingCity			=	$oSubscriber->mail_city;
				$oSubscriber->billingZipCode		=	$oSubscriber->mail_postal_code;
				/*
				$oSubscriber->billingCountry 			= 	$oSubscriber->mail_country; 	
				*/
			}
			else 
			{
				// verify billing address 
				$oSubscriber->billingAddress			=	htmlentities($_POST['billingAddress'],ENT_QUOTES);
				$oSubscriber->billingState				=	htmlentities($_POST['billingState'],ENT_QUOTES);
				$oSubscriber->billingCity				=	htmlentities($_POST['billingCity'],ENT_QUOTES);
				$oSubscriber->billingZipCode			=	htmlentities($_POST['billingZipCode'],ENT_QUOTES);
				
		
				$address		= $oSubscriber->billingAddress;
				$state			= $oSubscriber->billingState;
				$city			= $oSubscriber->billingCity;
				$postalCode		= $oSubscriber->billingZipCode;			
				
				$param_validate	=	array('authToken'=>$token,'address'=>$address,'city'=>$city,'state'=>$state,'postalCode'=>$postalCode,'country'=>$country,'districtType'=>$districtType,'includeAtLarge'=>$includeAtLarge); 
				$result_OfficialsByAddress	=	$client_EOQueryService->call('GetOfficialsByAddress',$param_validate);
				$officials = $result_OfficialsByAddress['GetOfficialsByAddressResult']['ElectedOfficialInfo'];
				//print_r($officials);				
				$isValidCicero = count($officials);
				
				if($isValidCicero) {
					$i_test_but_do_nothing = "i_test_but_do_nothing";				
				} else {				
					$sErrorMsg	= "Please enter a valid billing address.";				
					$this->oneTimePaymentStepOne($oSubscriber,$sErrorMsg);
					die();								
				}
			}
			
			
			$isDuplicate	=	$this->oModel->checkDuplication($oSubscriber);
			
			
			if($isDuplicate == "username") {			
				$sErrorMsg	= "User Name already exists.";				
				$this->oneTimePaymentStepOne($oSubscriber,$sErrorMsg);
				die();			
			} else if($isDuplicate == "email") {									
				$sErrorMsg	= "E-mail Id already exists.";
				$this->oneTimePaymentStepOne($oSubscriber,$sErrorMsg);
				die();			
			}			
			/*
			echo "<pre>";
			print_r($oSubscriber);
			*/
			
			////////////////////////////////////////////////////////////////
		
			
			$oSubscriber->member_type = 'observer';
			$id = $this->oModel->addOneTimeObserver($oSubscriber);
			
			if($id) {			
				$oSubscriber->id	=	$id;
				
				
				// send mail to user regarding registration
				
				//sending email to user
				$oEmail		=	$this->oModel->GetEmail(1);				
				$email		=	$oSubscriber->email;				
				$sName		=	$oSubscriber->first_name." ". $oSubscriber->last_name;
				$sUserName	=	$oSubscriber->user_name;
				$sPassword	=	$oSubscriber->password;				
				$dynamicInfo	=	array(stripslashes(html_entity_decode($sName)),$sUserName,$sPassword,$_CONF['SiteUrl']);
				$staticInfo		=	array('(sName)', '(sUserName)', '(sPassword)', '(slink)');
				$body			=	$oEmail[0]->content;
				$newbody		=	str_replace($staticInfo, $dynamicInfo, $body);
				$text			=	CreateMailMessage($newbody);
				$subject		=	stripslashes(html_entity_decode($oEmail[0]->subject));
				$result			=	SendMail(stripslashes(html_entity_decode($text['body'])), $subject, array($email), $_CONF['adminEmail']);
				
				$this->oneTimePaymentStepTwo($oSubscriber);
				die();				
			} else {
				
				$sErrorMsg	=	"Server error.<br>Please try again later.";
				$this->oneTimePaymentStepOne($oSubscriber,$sErrorMsg);
				die();
			}
		}//ef
		
		/******************************************************************************************
		*Function Header
		*Function Name  : oneTimePaymentStepTwo
		*Function Type  : Call by value	
		*Functionality  : Sending to paypal to payment after saving data of observer 
		*Input			: nothing
		*Output			: .
		*Return Value   : nothing
		*Note			: nothing
		*******************************************************************************************/
		function oneTimePaymentStepTwo($oVisitor = "")
		{
			global $_CONF;
			$articleID = "";
			
			if(isset($oVisitor)) 
			{				
				$articleID = trim($oVisitor->article_id);
			}
			
			if($articleID == "") 
			{							
				header("location:./index.php?stage=visitor&mode=EmailMessage&message=invalidaccess");
				exit();
			}			
			
			$oPaypal = new Paypal();
			
			$oPaypal->url 		= $_CONF['payment_url'];
			$oPaypal->business 		= $_CONF['business'];

			$oPaypal->return 		= $_CONF['SiteUrl']."/index.php?stage=visitor&mode=petitionPaymentSuccess&article_id=".$oVisitor->article_id."&visitor_id=" . base64_encode($oVisitor->id);			
			$oPaypal->cancel_return = $_CONF['SiteUrl']."/index.php?stage=visitor&mode=petitionPaymentCancel&article_id=".$oVisitor->article_id."&visitor_id=" . base64_encode($oVisitor->id);
			$oPaypal->notify_url	= $_CONF['SiteUrl']."/index.php?stage=visitor&mode=petitionpaymentipn&article_id=".$oVisitor->article_id."&visitor_id=" . base64_encode($oVisitor->id);
			$oPaypal->amount 		= $oVisitor->onetimefee;
			$oPaypal->currency_code = $_CONF['currency_code'];
			$oPaypal->item_name 	= "one time petition signing fee";
			
			$p = new paypal_class;             
			$p->paypal_url = $oPaypal->url;
				   	
			$amount = number_format($oPaypal->amount, 2, '.', '');
					 
			/*******************************************************
			Just replace the below 6 lines with the Creditials of Client.
			*********************************************************/
			//email business id(test account buyer email id)
			$p->add_field('business', $oPaypal->business);
			$p->add_field('return', $oPaypal->return);
			$p->add_field('cancel_return', $oPaypal->cancel_return);
			$p->add_field('notify_url',  $oPaypal->notify_url);
			$p->add_field('item_name', $oPaypal->item_name);
			$p->add_field('amount', $oPaypal->amount);
			$p->add_field("currency_code",$oPaypal->currency_code);
			$p->add_field("button_subtype","services");
			$p->add_field("cmd","_xclick");
			$p->add_field("bn","PP-BuyNowBF:btn_buynowCC_LG.gif:NonHosted");
			$p->add_field("lc","US");
			
			//submit the fields to paypal
			$p->submit_paypal_post();		
		}//ef


		/*
		**************************************************************************************
		*function header
		*function name  : petitionPaymentCancel
		*function type  : call by value	
		*functionality  : 
		*input			: 
		*output			: 
		*return value   : nothing
		*note		    : nothing
		***************************************************************************************
		*/
		function petitionPaymentCancel()
		{								
			global $_CONF;			
			$article_id = trim($_REQUEST["article_id"]);
			$visitor_id = base64_decode(trim($_REQUEST["visitor_id"]));			
			$rs = $this->oModel->setUserTypeOneTimeSubscriber($visitor_id);			
			header("location:./index.php?stage=visitor&mode=EmailMessage&message=Sign up completed but error in petition payment.");			
			die();				
		}//ef
		
	
		/*
		**************************************************************************************
		*function header
		*function name  : petitionPaymentSuccess
		*function type  : call by value	
		*functionality  : save article details for this user so that can sign later using login too 
		*input			: 
		*output			: 
		*return value   : nothing
		*note		    : nothing
		***************************************************************************************
		*/
		function petitionPaymentSuccess()
		{
			global $_CONF;
			
			$transaction_id = $_POST["txn_id"];			
			$payer_email   = $_POST["payer_email"];
			$amount 	   = $_POST["mc_gross"];
			$currency 	   = $_POST["mc_currency"];
			$payment_date  = $_POST["payment_date"];	
			
			$article_id = trim($_REQUEST["article_id"]);
			$visitor_id = base64_decode(trim($_REQUEST["visitor_id"]));
			
			## save payment details 
			$this->oModel->saveOneTimePetitionPaymentDetails($visitor_id,$article_id,$transaction_id,$amount,$currency,$payment_date );			
			
			// get affiliate ID and save data in to database 	
			$affiliateArticleDetail = $this->affModel->getArticleDetailOneTime($article_id);			 
			if($affiliateArticleDetail)
			{
				$affiliate_id = $affiliateArticleDetail[0]['affiliate_id'];
						
				$oMember = $this->oModel->getVisitorVerify($visitor_id);			
				$oMember = $oMember[0];				
				if(is_object($oMember)) {	
				
					##Already signed petition 			
					$isAlreadySignedPetition = $this->oModel->getVisitorPetitionSignStatus($article_id, $visitor_id);
				
					if($isAlreadySignedPetition) {
						header("location:./index.php?stage=visitor&mode=EmailMessage&message=You have already signed this petition");								
						die();						
					}
					else
					{					
						## save article detail for observer
						$this->oModel->saveOneTimePetitionArticleDetails($visitor_id,$article_id,$affiliate_id);			
						$this->AffiliatePetitionsDetailSucess($article_id, $visitor_id);					
										}
				}	
				else {
						header("location:./index.php?stage=visitor&mode=EmailMessage&message=invalidaccess");												
						die();
				}//if				
			}
			else
			{
				header("location:./index.php?stage=visitor&mode=EmailMessage&message=invalidaccess");												
			}							
			
		}//ef
		
		
		
		/*
		**************************************************************************************
		*function header
		*function name  : AffiliatePetitionsDetailSucess [will be shown to usr only once]
		*function type  : call by value	
		*functionality  : 
		*input			: article ID 
		*output			: article Details
		*return value   : nothing
		*note			: nothing
		***************************************************************************************
		*/
		function AffiliatePetitionsDetailSucess($article_id, $visitor_id) {
		
			//authenticate login
			//$this->LoginUser();			
			global $_CONF;			
			
			if($article_id == "" and $visitor_id == "") {				
				header("location:./index.php?stage=visitor&mode=EmailMessage&message=invalidaccess");												
				die();				
			}
			
			// get affiliate ID and save data in to database 	
			$affiliateArticleDetail = $this->affModel->getArticleDetailOneTime($article_id);			 
			if($affiliateArticleDetail)
			{			
				$affiliate_id = $affiliateArticleDetail[0]['affiliate_id'];
								
				## check whether visitor has paid for this article or not 
				$permission = $this->oModel->getPetitionInformation($affiliate_id ,$article_id, $visitor_id);		
				
				if(	$permission) {
				
					$this->oView->visitor_id = $visitor_id;			 
					$this->oView->affiliateArticle = $affiliateArticleDetail;					
					$signs_count = $this->oModel->getTotalSignsCount($article_id);
					$this->oView->signs_count = $signs_count;						
					$this->oView->AffiliatePetitionsDetailSucess();			
				}
				else 
				{
					header("location:./index.php?stage=visitor&mode=EmailMessage&message=invalidaccess");												
					die();
				}
			}
			else
			{
				header("location:./index.php?stage=visitor&mode=EmailMessage&message=invalidaccess");												
			}			
		}//ef
		
		
		/*
		**************************************************************************************
		*Function Header
		*Function Name  : signPetitionOneTime
		*Function Type  : Call by value	
		*Functionality  : sign a petition by a user after completing payment
		*Input			: nothing
		*Output			: nothing.
		*Return Value   : nothing
		*Note			: nothing
		***************************************************************************************
		*/
		function signPetitionOneTime() 
		{
			global $_CONF;
			
			if( isset($_REQUEST['articleID']) && isset($_REQUEST['visitor_id']))
			{
				$articleID 	= $_REQUEST['articleID'];
				$visitor_id = $_REQUEST['visitor_id'];
				$affiliate_id = $_REQUEST['affiliate_id'];				
				$status		= "support";
											
				$isAlreadySignedPetition = $this->oModel->getVisitorPetitionSignStatus($article_id, $visitor_id);
				if($isAlreadySignedPetition) {
					
					##Already signed petition 			
					echo "<script>location='index.php?stage=visitor&mode=EmailMessage&message=alreadysignedpetition'</script>";
					die();						
				}//if			

				//echo $sSQL;
				$oVisitor = $this->oModel->getVisitorVerify($visitor_id);
				$oVisitor = $oVisitor[0];
						
				if(is_object($oVisitor)) {
				
					if($this->oModel->memberVoteOneTime($visitor_id, $articleID, $status))
					{

						//sending email to affiliate
						$oEmail	=	$this->oModel->GetEmail(56);
						
						//affiliate information
						$oMember	=	$this->oModel->getSubscriberDetails($visitor_id);
						$oMember	=	$oMember[0];						
						$email		=	$oMember->email;						
						$sName		=	$oMember->first_name." ". $oMember->last_name;
						$sZip		=	$oMember->mail_zip_code;
						
						$member_type	=	$oMember->member_type;
						
						$adminEmail 	=  $_CONF['adminEmail'];
						
						//affiliate information
						
						/*
						not to be used here 
						// $oMemberUser	=	$this->oModel->getPromoCode("", $member_type);
						// $oMemberUser 	=	$oMemberUser[0];
						$promo_code 	=	$oMemberUser->promo_code;
						$price 			=	$oMemberUser->subscription_price;
						
						$dynamicInfo	=	array(stripslashes(html_entity_decode($sName)), $sZip, $promo_code, $price);
						
						$staticInfo		=	array('(subscriberName)', '(subscriberZip)', '(sPromoCode)', '(sPrice)');
						$body			=	$oEmail[0]->content;
						$newbody		=	str_replace($staticInfo, $dynamicInfo, $body);
						$text			=	CreateMailMessage($newbody);
						$subject		=	stripslashes(html_entity_decode($oEmail[0]->subject));
						
						// $result	=	SendMail(stripslashes(html_entity_decode($text[body])), $subject, array($adminEmail), $adminEmail);
						*/
						
						// $rs = $this->oModel->setUserTypeOneTimeSubscriber($visitor_id);	

						//echo $text[body];
						//echo "<br /><br />";
						//echo $subject;
						//echo "<br /><br />";
						//echo $adminEmail;
						//echo "<br /><br />";
						//echo $adminEmail;
						//die();
						$message = 'petitionsignedsuccessfully'; 										
					} else {
						
						$message = 'invalidaccess'; 										
					} 
				} else {
					
					$message = 'invalidaccess'; 										
				}
			}
		
			echo "<script>location='index.php?stage=visitor&mode=EmailMessage&message=".$message."'</script>";
			die();					
		}//ef

	};//ec
?>