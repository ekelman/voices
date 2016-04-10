<?php
   session_start();
	/***********************************************************************************************************
		* Author Name		: Anil Nautiyal
		* Creation Date 	: 27th May-2011
		* FileName			: SubscriberController.php	
		* Called From 		: index.php file.
		* Description		: SubscriberController file is used to control the SubscriberModel and SubscriberView                          files,it passes control according to the operation required.
		* Components Used 	: Validation for server side validations
		* Tables Accessed 	: none
		* Program Specs 	:     
		* UTP doc 			:
		* Tested By 		:  
	************************************************************************************************************/
	require_once($_CONF['ModulesPath'].'visitor/classes/VisitorModel.php');
   	require_once($_CONF['ModulesPath'].'subscriber/classes/SubscriberModel.php');
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
	
	//contains some common data classes 
	require_once($_CONF['ModulesPath'].'system/classes/dataclasses.php');								    
	
	//contains paypal code
	require_once($_CONF['ModulesPath'].'system/classes/paypalclass.php');
	
	//getting nusoap lib file
	require_once($_CONF['SitePath']."webservices/nusoap.php");	
	/***************************************************************
	*Class Header
	*Class Name    : SubscriberController
	*Functionality : This class controls SubscriberModel and SubscriberView
					 to handle Subscribers on the site.
	*Note          : SubscriberController inherits UserController that 
 	                contains functions for the user site.
	***************************************************************/

	class SubscriberController extends UserController
	{
		var $oModel;
		var $LogoFile;
		
		var $last_error = "";            // last error message set by this class
		var $last_time = 0;              // last function execution time (debug info)
				
		/***************************************************************************************
		*Function Header
		*Function Name  : SubscriberController
		*Function Type  : Constructor	
		*Functionality  : Initializes objects of different classes 
		*Input			: nothing
		*Output			: Class objects
		*Return Value   : nothing
		*Note			: nothing
		****************************************************************************************/
		
		function SubscriberController()
		{
			parent::UserController();
			$this->oModel			= new SubscriberModel();			
			$this->oVisitorModel	= new VisitorModel();
			$this->aModel			= new AccessionModel();			
			$this->sModel			= new SettingModel();			
			
			// $this->aModel->checkAccessPermission();			
			/*
				echo "<pre>";
				print_r($_SESSION);			
			*/
			
			$this->affModel		= new AffiliatesModel();			
			$this->memberModel	= new MemberModel();						
			$this->eModel		= new ElectedrepresentativeModel();			
			$this->oView		= new SubscriberView();
			$oSubscriber 		= new Subscriber();						
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
		function SubscriberJoin($oSubscriber, $sErrorMsg="")
		{
			$this->oView->sErrorMsg = $sErrorMsg;
			$this->oView->oSubscriber = $oSubscriber;
			$this->oView->oAffiliates = $this->oModel->getAffiliatesSubscriberJoin();			
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
			if(isset($_REQUEST['primary_affiliate_code']))
			{	
				$primary_affiliate_code = $_REQUEST['primary_affiliate_code'];
			
				$affID  = $this->oModel->getPrimaryAffIDfromCode($primary_affiliate_code);  
				echo $affID;
				exit();
			}			
		}//ef
		
		
		/*
		*****************************************************************************************
		*Function Header
		*Function Name  : SaveSubscriberJoin
		*Function Type  : Call by value	
		*Functionality  : Stores the signup information of employer and display terms and conditions to agree before saving to db.
		*Input			: nothing
		*Output			: nothing.
		*Return Value   : nothing
		*Note			: nothing
		******************************************************************************************
		*/
		function SaveSubscriberJoin()
		{
		    global $_CONF;
			/*
			print_R($_POST);
			die();*/
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
			$oSubscriber->primary_afflliates		=	htmlentities($_POST['primary_afflliates'],ENT_QUOTES);
			$oSubscriber->primary_afflliate_code	=	htmlentities($_POST['primary_afflliate_code'],ENT_QUOTES);
			$secondary_afflliates					=	$_POST['secondary_afflliates'];
			$oSubscriber->secondary_afflliates		=	$secondary_afflliates;
			*/						
			$oSubscriber->isBillingInfo				=   trim($_POST['isBillingInfo']);
			
			$oSubscriber->billingAddress			=	htmlentities($_POST['billingAddress'],ENT_QUOTES);
			$oSubscriber->billingState				=	htmlentities($_POST['billingState'],ENT_QUOTES);
			$oSubscriber->billingZipCode			=	htmlentities($_POST['billingZipCode'],ENT_QUOTES);
			$oSubscriber->billingCity				=	htmlentities($_POST['billingCity'],ENT_QUOTES);
			/*
			$oSubscriber->billingCountry			=	htmlentities($_POST['billingCountry'],ENT_QUOTES);
			*/
			if($oSubscriber->isBillingInfo == 0){
				
				$oSubscriber->billingAddress			=	$oSubscriber->mail_address;
				$oSubscriber->billingCity				=	$oSubscriber->mail_city;
				$oSubscriber->billingState				=	$oSubscriber->mail_state;	
				$oSubscriber->billingZipCode			=	$oSubscriber->mail_postal_code;
				/*
				$oSubscriber->billingCountry 			= 	$oSubscriber->mail_country; 	
				*/
			}
			
			$isDuplicate	=	$this->oModel->checkDuplication($oSubscriber);

			if($isDuplicate == "username") {
			
				$sErrorMsg	= "User Name already exists.";
				$this->SubscriberJoin($oSubscriber, $sErrorMsg);
				die();			
			} else if($isDuplicate == "email") {
									
				$sErrorMsg	= "E-mail Id already exists.";
				$this->SubscriberJoin($oSubscriber, $sErrorMsg);
				die();			
			} 			

			##get primary affiliate id from affiliate code 			
			/*
			if(!empty($oSubscriber->primary_afflliate_code))
			{	
				
				$affID  = $this->oModel->getPrimaryAffIDfromCode($oSubscriber->primary_afflliate_code);  
				
				if($affID) {
					
					$oSubscriber->primary_afflliates = $affID;
				} else {
					
					$sErrorMsg	= "Invalid affiliate code.";
					$this->SubscriberJoin($oSubscriber, $sErrorMsg);
					die();								
				} 
			}
			*/	
			
			$wsdl	=	"http://cicero.azavea.com/Azavea.Cicero.WebService.v2/AuthenticationService.asmx?wsdl";
			$client	=	new nusoap_client($wsdl, 'wsdl');
		
			$wsdl_EOQueryService	=	"http://cicero.azavea.com/Azavea.Cicero.WebService.v2/ElectedOfficialQueryService.asmx?wsdl";	
			$client_EOQueryService	=	new nusoap_client($wsdl_EOQueryService, 'wsdl');
			
			$cicero_username = $_CONF['cicero_username'];
			$cicero_password = $_CONF['cicero_password'];
		
			$params	=	array('userName'=>$cicero_username,'password'=>$cicero_password); 
			
			$token_result	= $client->call('GetToken',$params);
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
			
			//print_r($officials);
			
			$isValidCicero = count($officials);
			
			if($isValidCicero) {
				
				//do nothing;
				$i_test_but_do_nothing = "i_test_but_do_nothing";				
			} else {
				
				$sErrorMsg	= "Please enter a valid address.";
				$this->SubscriberJoin($oSubscriber, $sErrorMsg);
				die();								
			}			
			/*
			if(!empty($secondary_afflliates)) {			
				foreach($secondary_afflliates as $key => $val)  {
					if($val == $oSubscriber->primary_afflliates) {
						$index = $key;
					}
				}
				if($index >= 0) {
					array_splice($secondary_afflliates, $index, 1);
				}
			
				$oSubscriber->secondary_afflliates	=	implode(",",$secondary_afflliates);
				
				//$oSubscriber->category_id_exploded	=	explode(",",$oSubscriber->secondary_afflliates);
			}
			*/
			$oSubscriber->primary_afflliates = 0;
			$oSubscriber->secondary_afflliates = 0;
			
			$id = $this->oModel->addSubscriber($oSubscriber);
			if($id) {
			
				//sending email to user
				$oEmail	=	$this->oModel->GetEmail(1);
				
				$email	=	$oSubscriber->email;
				
				$sName	=	$oSubscriber->first_name." ". $oSubscriber->last_name;
				$sUserName	=	$oSubscriber->user_name;
				$sPassword	=	$oSubscriber->password;
				
				$dynamicInfo	=	array(stripslashes(html_entity_decode($sName)),$sUserName,$sPassword,$_CONF['SiteUrl']);
				
				$staticInfo		=	array('(sName)', '(sUserName)', '(sPassword)', '(slink)');
				$body			=	$oEmail[0]->content;
				$newbody		=	str_replace($staticInfo, $dynamicInfo, $body);
				$text			=	CreateMailMessage($newbody);
				$subject		=	stripslashes(html_entity_decode($oEmail[0]->subject));
				$result			=	SendMail(stripslashes(html_entity_decode($text['body'])), $subject, array($email), $_CONF['adminEmail']);
				echo "<script>location='index.php?stage=subscriber&mode=EmailMessage&message=registration'</script>";
				die();								
			} else {
				
				$sErrorMsg		=	"Server error.<br>Please try again later.";
				$this->SubscriberJoin($oSubscriber,$sErrorMsg);
				die();
			}
		}//ef
		
		
		/*
		 * ******************************************************************************
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
					
			/* permissions */				
			
			$this->oView->affiliate_content_news_view 	= false; 			
			$this->oView->affiliate_content_bills_view 	= false;  // vote alerts
			//$this->oView->affiliate_content_bulletins_view 	= false; 
			$this->oView->affiliate_content_page_header_view 	= false; 			
			
			if( $this->aModel->checkSpecificAccessPermission("Affiliate Content","News","View") )
				$this->oView->affiliate_content_news_view = true; 								
			if( $this->aModel->checkSpecificAccessPermission("Affiliate Content","Bills","View") )
				$this->oView->affiliate_content_bills_view = true; 								
			if( $this->aModel->checkSpecificAccessPermission("Affiliate Content","Page Header","View") )
				$this->oView->affiliate_content_page_header_view = true; 											

			/** permissions **/			 
			 
			## View Alert - Added Affiliate Articles 	
			$profile_info = $this->oModel->getProfileInfo($_SESSION['username']);
			$uID = $profile_info[0]->member_id;			
			$this->oView->uProfile = $profile_info;	
			
			## Get affiliate details
			// echo "<pre>";// print_r($this->oModel->getMyAffiliates($uID));// die();
			$this->oView->secondary_affiliates = $this->oModel->getMyAffiliates($uID);			
			
			$affiliateNews = array();
			
			##get comments/news data

			
			if(count($this->oView->secondary_affiliates))
			{				
				$affID = $this->oView->secondary_affiliates[0]['member_id'];				
				$affiliateNews = $this->affModel->getAffiliateNews( $affID );				
			}
			
			$this->oView->affiliateNews = $affiliateNews;			
			
			$affiliateArticles = $this->oModel->getAffiliateArticlesMain($uID, 0);

			$final_alert_array = array();
			$today = date('Y-m-d');
			$ctr = 0; 
			
			foreach($affiliateArticles as $key=>$value) {
				if($ctr == 5) 
					break;
					
				$voteStatus = $this->oModel->getVoteStatus($uID, $affiliateArticles[$key]["article_id"]);
				$affiliateArticles[$key]["vote_status"] = $voteStatus;
				
				
				if($affiliateArticles[$key]["article_type"] == "bill") {					
						
						array_push($final_alert_array, $affiliateArticles[$key]);
						$ctr = $ctr + 1;
				} elseif($affiliateArticles[$key]["article_type"] == "petition")  {
					
					if($today <= $affiliateArticles[$key]["voting_end"] && $today >= $affiliateArticles[$key]["voting_start"]) {  
						array_push($final_alert_array, $affiliateArticles[$key]);
						$ctr = $ctr + 1;
					}
				}
			}
 
			// echo "---".$ctr."---<br />--".count($final_alert_array);
			//echo "<pre>";
			//print_r($final_alert_array);
			//die();
			
			$this->oView->affiliateArticles = $final_alert_array;
			
			if(isset($_SESSION['Bill Resources']['Bill Summary']['View']))			 
				$this->oView->bill_resource_bill_summary_view = $_SESSION['Bill Resources']['Bill Summary']['View'];
			
			if(isset($_SESSION['Bill Resources']['Bill Detail']['View'])) 
				$this->oView->bill_resource_bill_detail_view = $_SESSION['Bill Resources']['Bill Detail']['View'];
			
			if(isset($_SESSION['ER Content']['Comments']['View'])) 
				$this->oView->er_content_comments_view = $_SESSION['ER Content']['Comments']['View'] ;
						
			if(isset($_SESSION['Affiliate Content']['Bills / Petitions']['View'])) 
				$this->oView->affiliate_content_bills_view = $_SESSION['Affiliate Content']['Bills / Petitions']['View'];

			//echo "<pre>";
			//$asas = $this->eModel->getElectedOfficials();
			//print_r($asas);
			//$this->oView->oMember = $this->eModel->getElectedOfficials();
						
			$this->oView->oMember  = $this->oModel->getElectedOfficials($uID);
			// print_r($electedOfficials);			
			$this->oView->MemberDashboard();
			
		}//ef

		
		/*
		**************************************************************************************
		*function header
		*function name  : getMoreViewAlerts
		*function type  : call by value	
		*functionality  : 
		*input			: 
		*output			: 
		*return value   : nothing
		*note			: nothing
		***************************************************************************************
		*/
		function getMoreViewAlerts()
		{
			//authnticate login
			$this->SubscriberAuthenticate();
		
			if(isset($_REQUEST['page']))
			{
				$page = $_REQUEST['page'];
			}
			
			##View Alert - Added Affiliate Articles 	
			$profile_info = $this->oModel->getProfileInfo($_SESSION['username']);
			$uID = $profile_info[0]->member_id;			
			$this->oView->uProfile = $profile_info;	
			$this->oView->affiliateArticles = $this->oModel->getAffiliateArticles($uID,$page);		
		}
		
		
	
		
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
		*functionality  : on membership upgrade to subscriber
		*input			: 
		*output			: 
		*return value   : nothing
		*note		    	: nothing
		***************************************************************************************
		*/
		function paymentSuccess()
		{
		
			if( isset($_REQUEST["member_id"]) && isset($_REQUEST["referrerID"]) && ($_REQUEST["mode"]== "paymentSuccess"))
			{
				// Update payment status table 					
			
				/*
					Array
					(
						[txn_type] => subscr_signup
						[subscr_id] => I-4NJEX1FFX8PF
						[last_name] => User
						[residence_country] => US
						[mc_currency] => USD
						[item_name] => membersubscription
						[business] => mukesh_1268302053_biz@sebiz.net
						[amount3] => 325.00
						[recurring] => 1
						[verify_sign] => AQU0e5vuZCvSg-XJploSa.sGUDlpAvSLaInckviR9s9JBTHopGaq7LU0
						[payer_status] => verified
						[test_ipn] => 1
						[payer_email] => anil.c_1314280911_per@netsmartz.net
						[first_name] => Test
						[receiver_email] => mukesh_1268302053_biz@sebiz.net
						[payer_id] => STP2JU8879MYC
						[reattempt] => 1
						[subscr_date] => 21:30:24 Jan 22, 2012 PST
						[charset] => windows-1252
						[notify_version] => 3.4
						[period3] => 1 M
						[mc_amount3] => 325.00
						[auth] => Pd6_MqDO_dz6rmLKARn0lytaJ2Rc5P39eJR6TGuaeZz3eLfJsRfh_MIOc6JM9w4rdLEe6RDDPmMepynm2GIUWmmC19IteRWnOfzMU9C6VQQ6N46HuzLWVNT0vJMCjzF0vWAwgTQ-8DRmbWjiUG_1EaXcL9GYRa9Wl4gRbvlXRnmX01UH09LX4ArhbwhnnI-L3kLo45eIkMowOM9nAOj5yCeoncncDOl6G_pJiK5OwBfLIIDxjUkJegfYLi0
						[form_charset] => UTF-8
					)				
				*/

				$paymentType 	= $_REQUEST["item_name"]; 
				// $amount 		= $_REQUEST["payment_gross"];	
				$amount 		= $_REQUEST["amount3"];					
				$memberID 		= base64_decode($_REQUEST["member_id"]);								
				$referrerID		= 0;				
				if(!empty($_REQUEST["referrerID"]))
				{
					$referrerID		= base64_decode($_REQUEST["referrerID"]);				
				}
				
				
				$transactionID	= $_REQUEST["subscr_id"];	// subscription id			
				$payment_date 	= date("Y-m-d");//	[subscr_date] => 21:30:24 Jan 22, 2012 PST
				
				
				if($this->oModel->savePaymentStatus( $paymentType, $amount , $transactionID,$payment_date,$referrerID))
				{
					
					if($_REQUEST["item_name"] = "membersubscription")
					{	
						## update session 
						$_SESSION['member_type'] = 'subscriber';					
						## Update database 			
						$user_name = $this->oModel->setUserType($_SESSION['username'],'subscriber');
						$message = "Membership has been upgraded to subscriber";												
						header("location:index.php?stage=subscriber&mode=MyProfile&sErrorMessage=".$message);
						exit();
					}								
					
					// ?? 	
					if( isset($_REQUEST["affID"]) && isset($_REQUEST["id"]) )  
					{
						$affiliateID	= $_REQUEST["affID"];				
						$articleID  	= $_REQUEST["id"];					
					//	header("location:index.php?stage=subscriber&mode=affiliatePetitionsDetail&affID=".$affiliateID."&id=".$articleID."");					
					}		
					
					$message = "Payment Completed";
					header("location:index.php?stage=subscriber&mode=MyProfile&sErrorMessage=".$message);
					exit();					
				}
				
			}
		}
		
		
		function paymentCancel()
		{
			/*  Array ( [stage] => subscriber [mode] => paymentCancel [username] => observer [remember] => 1 [PHPSESSID] => r90hof02d1ko1mkeg4i5av65a7 ) */					
			$message = "Payment not done.";
			header("location:index.php?stage=subscriber&mode=MyProfile&sErrorMessage=".$message);
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
			
			/* system settings */														
			
			$subscriber_membership_fee = 0; 	
			$subscriber_membership_fee_promocode = 0; 	
			
			$subscriber_membership_fee 			 = $this->sModel->getSettingDetailFromName("Subscriber Membership Fee");			
			$subscriber_membership_fee_promocode = $this->sModel->getSettingDetailFromName("Subscriber Membership Fee Promocode");			
				
			$this->oView->subscriberMembershipFee  =$subscriber_membership_fee  ;										
			$this->oView->subscriberMembershipFeePromocode  =$subscriber_membership_fee_promocode;										
			
			/** system settings **/		

			
			/*
			$oPaypal 		= new Paypal();			
			$oPaypal->url 	= $_CONF['payment_url'];			
			
			if( isset($_REQUEST["articleID"]) && isset($_REQUEST["affiliateID"]) ) 
			{
				$articleID 	 = $_REQUEST["articleID"];
				$affiliateID = $_REQUEST["affiliateID"];				
				$oPaypal->return 	=  $_CONF['return']."&affID=".$affiliateID."&id=".$articleID;								
			}
			else
				$oPaypal->return 	= $_CONF['return'];
			
			$oPaypal->cancel_return = $_CONF['cancel_return'];
			$oPaypal->notify_url 	= $_CONF['notify_url'];
			$oPaypal->business 		= $_CONF['business'];
			$oPaypal->amount 		= $_CONF['amount'];
			$oPaypal->currency_code = $_CONF['currency_code'];
			$oPaypal->item_name 	= $_CONF['item_name'];
			
			//print_r($oPaypal);
			//die();
			*/
			
			if(isset($_REQUEST['sErrorMessage']))
			{
				$this->oView->message = $_REQUEST['sErrorMessage'];
			}
			
			if(isset($_REQUEST['msg']))
			{
				if(trim($_REQUEST['msg']) != '') {
					$msg =	"Profile updated successfully.";
					$this->oView->message = $msg;
				}
			}
			
			$profile_info = $this->oModel->getProfileInfo($_SESSION['username']);
			$uID = $profile_info[0]->member_id;
			$this->oView->uProfile = $profile_info;
			
			$profile_info1 = $this->oModel->getProfileInfo1SubscriberEdit($uID);
			$profile_info1[0]->mailAddress = "";
			
			if($profile_info1[0]->mail_street_address != "") {
				$profile_info1[0]->mailAddress .= $profile_info1[0]->mail_street_address.', '.$profile_info1[0]->mail_city. '<br/>' . $profile_info1[0]->mail_state. ' - '.$profile_info1[0]->mail_zip_code;
			}
			
			$profile_info1[0]->billAddress = "";
			
			if($profile_info1[0]->bill_street_address != "") {
				$profile_info1[0]->billAddress .= $profile_info1[0]->bill_street_address.', '.$profile_info1[0]->bill_city. '<br/>' . $profile_info1[0]->bill_state. ' - '.$profile_info1[0]->bill_zip_code;
			}

			// $this->oView->subscription_amount = $this->oModel->getSubscriptionAmount();
			
			$this->oView->uProfile[1] = $profile_info1;			
			
			// $this->oView->oPaypal = $oPaypal;
			
		
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
			$affiliateID = array();
			$sErrorMsg = "";
					
			if(isset($_POST['submit'])){
	
				$oSubscriber->member_id = $_POST['member_id'];
				$oSubscriber->first_name = trim($_POST['firstName']);
				$oSubscriber->last_name 	= trim($_POST['lastName']);				
				$oSubscriber->user_name 	= trim($_POST['UserName']);
				
				$oSubscriber->email 				= trim($_POST['email']);
				$oSubscriber->mail_street_address 	= mysql_escape_string(trim($_POST['streetAddress']));
				$oSubscriber->mail_city 	= trim($_POST['City']);
				$oSubscriber->mail_state 	= trim($_POST['state']);
				$oSubscriber->mail_zip_code = trim($_POST['zipCode']);				
				
				$oSubscriber->bill_street_address 	= mysql_escape_string(trim($_POST['billingAddress']));
				$oSubscriber->bill_city			= trim($_POST['billCity']);
				$oSubscriber->bill_state 		= trim($_POST['billState']);
				$oSubscriber->bill_zip_code 	= trim($_POST['billZipCode']);
				$primary_affiliate_id	 		= $_POST['pr_aff'];
				$oSubscriber->secondary_afflliates	=	$_POST['secondary_afflliates'];
				$password 							=	$_POST['password'];
				
				$oSubscriber->affiliate_name	=	$_POST['prim_affiliate'];
				$oSubscriber->prim_affiliate_id	=	$_POST['pr_aff'];
				
				if(strlen(trim($password)) > 0){
					$oSubscriber->password = md5(trim($password));
				} else {
					$oSubscriber->password = "";
				}
								
				$oMember = $this->oModel->getStreetAddress($oSubscriber->member_id);
				$oMember = $oMember[0];
				
				$isAddressChanged = false;
				
				if($oSubscriber->mail_street_address != trim($oMember->mail_street_address)) 
				{
					$isAddressChanged = true;				
				}
				else if($oSubscriber->mail_city != trim($oMember->mail_city)) 
				{
					$isAddressChanged = true;				
				}
				else if($oSubscriber->mail_state != trim($oMember->mail_state)) 
				{
					$isAddressChanged = true;				
				}
				else if($oSubscriber->mail_zip_code != trim($oMember->mail_zip_code)) 
				{
					$isAddressChanged = true;				
				}
				
				if($isAddressChanged) {
					
					$oSubscriber->is_address_changed = 'yes';
				} else {
					
					$oSubscriber->is_address_changed = $oMember->is_address_changed;
				}
								
				
				$isDuplicateEmail	=	$this->oModel->checkDuplicationEdit($oSubscriber);
				
				
				//echo "<pre>";
				//print_r($_POST);
				//print_r($oSubscriber);
				//print_r($oSubscriber->secondary_afflliates);											
				//die();
				
				if($isDuplicateEmail) {			
					
					$this->oView->oSubscriber = $oSubscriber;
					$this->oView->oAffiliates = $this->oModel->getAffiliatesSubscriberJoin();						
					
					foreach($oSubscriber->secondary_afflliates as $affID=>$val)
					{
						array_push($affiliateID,$val);		
					}	
											
					$this->oView->selectedAffiliate = $affiliateID;	
					$this->oView->sErrorMsg = "Email already used by some other member.";
						
					$this->oView->ProfileEdit();											
				} else {
								
					$index = -1;

					//echo count($oSubscriber->secondary_afflliates);
					foreach($oSubscriber->secondary_afflliates as $key => $val)  {						
						if($val == $primary_affiliate_id) {							
							$index = $key;
						}
					}
					if($index >= 0) {
						array_splice($oSubscriber->secondary_afflliates, $index, 1);
					}
					//echo "<br>".count($oSubscriber->secondary_afflliates);
					$oSubscriber->secondary_afflliates =  implode(",",$oSubscriber->secondary_afflliates);
					
					/*
					echo "<pre>";
					print_r($oSubscriber);
					die();
				 	*/
					
					$updState = $this->oModel->updateProfile($oSubscriber);
					header("location: index.php?stage=subscriber&mode=MyProfile&msg=DataisSaved");
				}
			} else {			
				
				$oSubscriber	= $this->oModel->getProfileInfo1SubscriberEditUpdated($_SESSION['username']);
				$oSubscriber 	= $oSubscriber[0];
				$uID 			= $oSubscriber->member_id;
				
				$this->oView->oSubscriber = $oSubscriber;
				$this->oView->oAffiliates = $this->oModel->getAffiliatesSubscriberJoin();
					
				$secondary_affiliates = $this->oModel->getMySecondaryAffiliates($uID);			
				foreach($secondary_affiliates as $affID=>$val)
				{
					array_push($affiliateID,$affID);		
				}	
				
				$this->oView->selectedAffiliate = $affiliateID;
				//echo "<pre>";
				//print_r($this->oView->secondary_affiliates);				
				//die();				
				
				$this->oView->sErrorMsg = $sErrorMsg;
				$this->oView->ProfileEdit();
			}
		}//ef

		
		
		/*
		**************************************************************************************
		*function header
		*function name  : MembershipUpgrade
		*function type  : call by value	
		*functionality  : 
		*input			: 
		*output			: 
		*return value   : nothing
		*note			: nothing
		***************************************************************************************
		*/
		function MembershipUpgrade($oSubscriber="", $sErrorMsg="")
		{
			//authnticate login
			$this->SubscriberAuthenticate();

			/* system settings */														
			
			$subscriber_membership_fee = 0; 	
			$subscriber_membership_fee_promocode = 0; 	
			
			$subscriber_membership_fee 			 = $this->sModel->getSettingDetailFromName("Subscriber Membership Fee");			
			$subscriber_membership_fee_promocode = $this->sModel->getSettingDetailFromName("Subscriber Membership Fee Promocode");			
				
			$this->oView->subscriberMembershipFee  =$subscriber_membership_fee  ;										
			$this->oView->subscriberMembershipFeePromocode  =$subscriber_membership_fee_promocode;										
			
			/** system settings **/		
				
			
			if($oSubscriber!="") {
				$this->oView->sErrorMsg = $sErrorMsg;
				$this->oView->oSubscriber = $oSubscriber;
				$uID 			= $oSubscriber->member_id;
			}else
			{
				$oSubscriber	= $this->oModel->getProfileInfo1SubscriberEditUpdated($_SESSION['username']);
				$oSubscriber 	= $oSubscriber[0];
				$uID 			= $oSubscriber->member_id;
			}		
			
			$this->oView->oSubscriber = $oSubscriber;
			$this->oView->oAffiliates = $this->oModel->getAffiliatesSubscriberJoin();
				
			$secondary_affiliates = $this->oModel->getMySecondaryAffiliates($uID);			
			foreach($secondary_affiliates as $affID=>$val)
			{
				array_push($affiliateID,$affID);		
			}	
			
			$this->oView->selectedAffiliate = $affiliateID;
			$this->oView->sErrorMsg = $sErrorMsg;
			$this->oView->MembershipUpgrade();

		}//ef

		
		
		/*
		**************************************************************************************
		*function header
		*function name  : MembershipUpgradeSave
		*function type  : call by value	
		*functionality  : 
		*input			: save affiliate data
		*output			: 
		*return value   : nothing
		*note			: nothing
		***************************************************************************************
		*/
		function MembershipUpgradeSave()		
		{
		    global $_CONF;
			
			/* system settings */						
			$subscriber_membership_fee = 0; 	
			$subscriber_membership_fee_promocode = 0; 				
			$subscriber_membership_fee 			 = $this->sModel->getSettingDetailFromName("Subscriber Membership Fee");			
			$subscriber_membership_fee_promocode = $this->sModel->getSettingDetailFromName("Subscriber Membership Fee Promocode");			
			
			/** system settings **/		
			
			$oSubscriber->member_id					=	htmlentities($_POST['member_id'],ENT_QUOTES);
			$oSubscriber->primary_affiliates		=	htmlentities($_POST['primary_affiliates'],ENT_QUOTES);
			$oSubscriber->primary_affiliate_code	=	htmlentities($_POST['primary_affiliate_code'],ENT_QUOTES);
			$oSubscriber->promo_code 				= 	htmlentities($_POST['promo_code'],ENT_QUOTES);
			$secondary_affiliates					=	$_POST['secondary_affiliates'];

			$oSubscriber->secondary_affiliates		= $secondary_affiliates;
			
			##get primary affiliate id from affiliate code 			
			if(!empty($oSubscriber->primary_affiliate_code))
			{	
				
				$affID  = $this->oModel->getPrimaryAffIDfromCode($oSubscriber->primary_affiliate_code);  
				
				if($affID) {
					
					$oSubscriber->primary_affiliates = $affID;
				} else {
					
					$sErrorMsg	= "Invalid affiliate code.";
					$this->MembershipUpgrade($oSubscriber, $sErrorMsg);
					die();								
				} 
			}			
			
			
			if(!empty($secondary_affiliates)) {			
				foreach($secondary_affiliates as $key => $val)  {
					if($val == $oSubscriber->primary_affiliates) {
						$index = $key;
					}
				}
				if($index >= 0) {
					// removing one element form array
					array_splice($secondary_affiliates, $index, 1);
				}
			
				$oSubscriber->secondary_affiliates	=	implode(",",$secondary_affiliates);
			}
			
			$id = $this->oModel->upgradeSubscriber($oSubscriber);

			if($id)	{
				
				// upgrade subscriber
				$affID  = $this->oModel->checkPromocodeAffiliateID($oSubscriber->promo_code);  
				
				if($affID) {					
					$amount = $subscriber_membership_fee_promocode;					
				} else {					
					$amount = $subscriber_membership_fee;
				}  
				
				$oSubscriber->subscriptionfee = $amount;					
				$oSubscriber->referralAffiliateID = $affID;
				
				$this->memberUpgradationPayment($oSubscriber,$amount,$affID );
				// die("payment done");					
			} 
			else {				
				$sErrorMsg		=	"Server error.<br>Please try again later.";
				$this-> MembershipUpgrade($oSubscriber,$sErrorMsg);
				die();
			}
		}//ef
	
	
	/******************************************************************************************
		*Function Header
		*Function Name  : memberUpgradationPayment
		*Function Type  : Call by value	
		*Functionality  : monthly payment 
		*Input			: nothing
		*Output			: .
		*Return Value   : nothing
		*Note			: nothing
		*******************************************************************************************/
		function memberUpgradationPayment($oSubscriber)
		{
			global $_CONF;
			
			$oPaypal = new Paypal();
			/*			
				echo "<pre>";
				print_r($oSubscriber);			
				die();
			*/

			$oPaypal->url 			= $_CONF['payment_url'];
			$oPaypal->business 		= $_CONF['business_subscribe'];			
			$oPaypal->return 		= 	$_CONF['SiteUrl']."/index.php?stage=subscriber&mode=paymentSuccess&member_id=" . base64_encode($oSubscriber->member_id)."&referrerID=".base64_encode($oSubscriber->referralAffiliateID);			
			$oPaypal->cancel_return =   $_CONF['SiteUrl']."/index.php?stage=subscriber&mode=paymentCancel&member_id=" . base64_encode($oSubscriber->member_id)."&referrerID=".base64_encode($oSubscriber->referralAffiliateID);			
			$oPaypal->notify_url	=   $_CONF['SiteUrl']."/index.php?stage=subscriber&mode=paymentipn&member_id=" . base64_encode($oSubscriber->member_id)."&referrerID=".base64_encode($oSubscriber->referralAffiliateID);			
			$oPaypal->amount 		= 	$oSubscriber->subscriptionfee;
			$oPaypal->currency_code = 	$_CONF['currency_code'];
			$oPaypal->item_name 	= 	"membersubscription";
			
			//create paypal form
			$p = new paypal_class;             
			$p->paypal_url = $oPaypal->url;
				   	
			$amount = number_format($oPaypal->amount, 2, '.', '');
					 
			/************************************************/
			//email business id(test account buyer email id)
			/*
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
			*/
			
			$p->add_field('business', $oPaypal->business);
			$p->add_field('return', $oPaypal->return);
			$p->add_field('cancel_return', $oPaypal->cancel_return);
			$p->add_field('notify_url',  $oPaypal->notify_url);			
			$p->add_field('item_name', $oPaypal->item_name);			
			$p->add_field('a3', $oPaypal->amount);
			$p->add_field("cmd","_xclick-subscriptions");
			$p->add_field("lc","US");	
			$p->add_field("no_note","1");	
			$p->add_field("src","1");	
			$p->add_field("p3","1");	
			$p->add_field("t3","Y");
			$p->add_field("currency_code",$oPaypal->currency_code);
			$p->add_field("bn","PPP-SubscriptionsBF:btn_subscribeCC_LG.gif:NonHostedGuest");
			//submit the fields to paypal

			
			
			//submit the fields to paypal
			$p->submit_paypal_post();		
		}//ef

		
		
		
		
		/*
		 *************************************************************************************
		*function header
		*function name  : ElectedRepresentatives
		*function type  : call by value	
		*functionality  : 
		*input			: 
		*output			: 
		*return value   : nothing
		*note			: nothing		
		*************************************************************************************
		*/
		function ElectedRepresentatives()
		{	
			global $_CONF;
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

			$this->oView->MyAffiliates($profile_info);
		}//ef	

		
		/*
		 * ***********************************************************************************
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
			//authenticate login
			$this->SubscriberAuthenticate();
			
			if(isset($_REQUEST["id"]))
				$affID = $_REQUEST["id"];
				
			## get subscriber affiliate list 			 			
			$profile_info = $this->oModel->getProfileInfo($_SESSION['username']);
			$uID = $profile_info[0]->member_id;					
			
			## Get all affiliate details			
			$affiliatesID = $this->oModel->getMyAffiliatesID($uID);	
			
			if(in_array($affID, $affiliatesID))	{
				$this->oView->add_affiliate = true; 	
			} else {
				$this->oView->add_affiliate = false; 	
			}
			
							
			/* permissions */										
			$this->oView->affiliate_content_news_view 	= false; 			
			$this->oView->affiliate_content_bills_view 	= false;  // vote alerts and petitions
			$this->oView->affiliate_content_bulletins_view 	= false; 
			$this->oView->affiliate_content_page_header_view = false; 			
			
			if( $this->aModel->checkSpecificAccessPermission("Affiliate Content","News","View") )
				$this->oView->affiliate_content_news_view = true; 								
			if( $this->aModel->checkSpecificAccessPermission("Affiliate Content","Bills","View") )
				$this->oView->affiliate_content_bills_view = true; 								
			if( $this->aModel->checkSpecificAccessPermission("Affiliate Content","Bulletins","View") )
				$this->oView->affiliate_content_bulletins_view = true; 										
			if( $this->aModel->checkSpecificAccessPermission("Affiliate Content","Page Header","View") )
 				$this->oView->affiliate_content_page_header_view = true; 											

			/** permissions **/
			
			$profile_info = $this->oModel->getProfileInfo($_SESSION['username']);

			$uID = $profile_info[0]->member_id;			
			$this->oView->uProfile = $profile_info;	
			

			
			$oAffiliate = $this->affModel->getAffiliate($affID);
			
			$this->oView->vAffiliate = $oAffiliate;		
						
			//get Affiliates votealert
			//$alerts = $this->affModel->getAffiliateVoteAlerts( $affID );
			//$alerts = $this->affModel->getAffiliateAlertsMain( $affID );
			$alerts = $this->oModel->getAffiliateVotePetitionAlerts( $affID, 0, 0 );
			
			
			//echo count($alerts);
			//echo "<br>==================<br>";
			$final_alert_array = array();
			$today = date('Y-m-d');
			$ctr = 0; 
			
			foreach($alerts as $key=>$value) {
				if($ctr == 5) 
					break;
					
				$voteStatus = $this->oModel->getVoteStatus($uID, $alerts[$key]["article_id"]);
				$alerts[$key]["vote_status"] = $voteStatus;
				
				
				if($alerts[$key]["article_type"] == "bill") {
					
					//echo "bill";
					//do nothing
					/*
					 * ($MyAffiliateArticles[i].current_disposition eq 'Pending')
					 * */
					//if($today >= $alerts[$key]["voting_start"] && ) {
						
						array_push($final_alert_array, $alerts[$key]);
						$ctr = $ctr + 1;
					//}
				} elseif($alerts[$key]["article_type"] == "petition")  {
					
					//echo "Pending";					
					if($today <= $alerts[$key]["voting_end"] && $today >= $alerts[$key]["voting_start"]) {  
						array_push($final_alert_array, $alerts[$key]);
						$ctr = $ctr + 1;
					}
				}
			}
			
			//echo "---".$ctr."---<br />--".count($final_alert_array);
			//echo "<pre>";
			//print_r($final_alert_array);
			//die();
						
			$this->oView->affiliateVoteAlerts = $final_alert_array;			
			
			//get Affiliates votealert
			$this->oView->affiliatePetitions = $this->affModel->getAffiliatePetitions( $affID );			
			$this->oView->affiliateNews = $this->affModel->getAffiliateNews( $affID );
			$this->oView->affiliateBulletin = $this->affModel->getAffiliateBulletin( $affID );
			$this->oView->affiliateSponsor = $this->oModel->getAffiliateSponsor( $affID );
						

			
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
		******************************************************************************************/
		function SubscriberAuthenticate() {
		//die($_SESSION['member_type']);
		//subscriber
		
			if(!$_SESSION['username'])
			{
				echo "<script>location.href=\"index.php?stage=member&mode=login&sErrorMessage=You have been logged out of the system due to inactivity.\"</script>";
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
		*function name  : VoteAlerts [List of Bills ( in pending state ) and Petitions ]
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
			
			/* permissions */			
			$permission = $this->aModel->checkSpecificAccessPermission("Affiliate Content","Bills","View");			

			if(!$permission)
			{	
				header("location:".$_CONF['SiteUrl']."/index.php?stage=subscriber&mode=MemberDashboard");							
			}
			/** permissions **/
	
			## View Alert - Added Affiliate Articles 	
			$profile_info = $this->oModel->getProfileInfo($_SESSION['username']);
			$uID = $profile_info[0]->member_id;			
			$this->oView->uProfile = $profile_info;
			
			//$this->oView->affiliateArticles = $this->oModel->getAffiliateArticles($uID,0);
			$affiliateArticles = $this->oModel->getAffiliateArticlesMain($uID, 0,100);
			
			
			$final_alert_array = array();
			
			//echo "<pre>";
			$today = date('Y-m-d');
			//print_r($affiliateArticles);
			//die();
			foreach($affiliateArticles as $key=>$value) {
					
				$voteStatus = $this->oModel->getVoteStatus($uID, $affiliateArticles[$key]["article_id"]);
				$affiliateArticles[$key]["vote_status"] = $voteStatus;
				
				if($affiliateArticles[$key]["article_type"] == "bill") {
						
						array_push($final_alert_array, $affiliateArticles[$key]);
				} elseif($affiliateArticles[$key]["article_type"] == "petition")  {
					
					if($today <= $affiliateArticles[$key]["voting_end"] && $today >= $affiliateArticles[$key]["voting_start"]) {  
						array_push($final_alert_array, $affiliateArticles[$key]);
					}
				}
			}
 
			//echo "---".$ctr."---<br />--".count($final_alert_array);
			//echo "<pre>";
			//print_r($final_alert_array);
			//die();
			
			$this->oView->affiliateArticles = $final_alert_array;
			
			
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
			
			/* permissions */			
			$permission = $this->aModel->checkSpecificAccessPermission("Affiliate Content","Bills","View");			

			if(!$permission)
			{	
				header("location:".$_CONF['SiteUrl']."/index.php?stage=subscriber&mode=MemberDashboard");							
			}

	
			$this->oView->affiliate_content_bills_vote_on_content 	= false; 			
			
			if($_SESSION["member_type"] == "subscriber") {			
				if( $this->aModel->checkSpecificAccessPermission("Affiliate Content","Bills","Vote on Content") )
					$this->oView->affiliate_content_bills_vote_on_content = true; 											
			}	
			/** permissions **/
		
			if(isset($_REQUEST["id"]))
				$articleID = $_REQUEST["id"];
			
						
			##View Alert - Added Affiliate Articles 	
			$profile_info = $this->oModel->getProfileInfo($_SESSION['username']);
			$uID = $profile_info[0]->member_id;		
			
			
			## Get voting Details 
			$votingDetails = $this->memberModel->getVoteStatus($uID,$articleID);
			$this->oView->voting_details = $votingDetails ;
			
			## http://voices4change.netsmartz.us/index.php?stage=subscriber&mode=VoteAlertsDetail&id=1
			
			$uID = $profile_info[0]->member_id;		
			
			$this->oView->uProfile = $profile_info;								
			$this->oView->affiliateArticles = $this->oModel->getAffiliateArticleDetail($articleID);			 			
			$this->oView->VoteAlertsDetail();			
		}//ef
		
		
		/*
		**************************************************************************************
		*function header
		*function name  : Petitions 
		*function type  : call by value { not in use }	 as list of Bills / Petitions are currently showing in VoteAlerts
		*functionality  : 
		*input			: 
		*output			: 
		*return value   : nothing
		*note			: nothing
		***************************************************************************************
		*/
		// function AffiliatePetitions()
		function Petitions()
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
			
			$this->oView->Petitions();			
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
		// function AffiliatePetitionsDetail($articleID = NULL) {
		function PetitionsDetail($articleID = NULL) {
		
			//authnticate login
			$this->SubscriberAuthenticate();
			
			$userName       = $_SESSION["username"];
			$userObjectArray = $this->oModel->getProfileInfo($userName);							
			$userID 	= $userObjectArray[0]->member_id; 			
			
			$subscriberState = $this->oModel->getSubscriberStateAbbreviation($userID);
						
			global $_CONF;
			if(isset($_REQUEST["id"]))
				$articleID = $_REQUEST["id"];
			
			$support = $total = 0; 
			
			if(isset($_REQUEST["affID"]))
				$affID = $_REQUEST["affID"];	
			
			
			if(isset($_REQUEST["msg"]))
			{
				$message = $_REQUEST["msg"];					
				$this->oView->vMsg = $message;	
			}
			
			## for one time payment process 
			if( isset($_REQUEST["hashKey"]) && isset($_REQUEST["userID"])  && isset($_REQUEST["status"]) )
			{
				$hashKey 	= $_REQUEST["hashKey"];					
				$userIDURL 	= $_REQUEST["userID"];					
				$status 	= $_REQUEST["status"];					
				
				if($status == 'success')
				{
					if($userIDURL == $userID) {
						$value = $this->oModel->updatePetitionInformation($hashKey);					
					}
					header("location:index.php?stage=subscriber&mode=petitionsDetail&affID=".$affID."&id=".$articleID);
				}
				else {
					header("location:index.php?stage=subscriber&mode=petitionsDetail&affID=".$affID."&id=".$articleID."&msg=Error in payment process");
				}	
			}
			
			
			/* permissions */			
			$permission = $this->aModel->checkSpecificAccessPermission("Affiliate Content","Bills","View");			

			if(!$permission)
			{	
				header("location:".$_CONF['SiteUrl']."/index.php?stage=subscriber&mode=MemberDashboard");							
			}
			
			$this->oView->affiliate_content_bills_vote_on_content 	= false; 						
			$this->oView->payment_done 	= false; 						
			
			if( $this->aModel->checkSpecificAccessPermission("Affiliate Content","Bills","Vote on Content") )
			{			
				$this->oView->affiliate_content_bills_vote_on_content = true;
				
				if($_SESSION["member_type"] == "subscriber") {				
					$this->oView->payment_done = true;					
				}
				else{
					$value = $this->oModel->getPetitionInformation( $affID, $articleID, $userID);
					if($value == 1){
						$this->oView->payment_done = true;
					}
				}
			}
			/** permissions **/			
			
			## affiliate ID required
			$oAffiliate = $this->affModel->getAffiliate($affID);			
			$this->oView->vAffiliate = $oAffiliate;				
			
			$this->oView->affiliateArticle = $this->affModel->getAffiliateArticleDetail($affID ,$articleID);			 

			
			// if voting ended
			if($this->oView->affiliateArticle[0]['voting_end'] < date("Y-m-d"))
				header("location:index.php?stage=subscriber&mode=MemberDashboard");		
			
			$this->oView->articleStatus    = $this->affModel->getVotingStatus($articleID, $support ,$total );			 
			
			## Get voting Details 
			$votingDetails = $this->memberModel->getVoteStatus($_SESSION['username'],$articleID);
			$this->oView->voting_details = $votingDetails;
			
			
			$supportPercentage = (int)(($support / $total ) * 100); 
			$opposePercentage  = 100 - $supportPercentage;
			
			$this->oView->supportPercentage = $supportPercentage;
			$this->oView->opposePercentage  = $opposePercentage;
			
			$signs_count = $this->oModel->getTotalSignsCount($articleID);

			$this->oView->subscriber_state = $subscriberState;
			$this->oView->signs_count = $signs_count;		

			
			$this->oView->PetitionsDetail();
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
			
			/* permissions */			
			$permission = $this->aModel->checkSpecificAccessPermission("Affiliate Content","News","View");			

			if(!$permission)
			{	
				header("location:".$_CONF['SiteUrl']."/index.php?stage=subscriber&mode=AffiliateDetails&id=".$affID);							
			}
			/** permissions **/
	
			
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

			/* permissions */			
			$permission = $this->aModel->checkSpecificAccessPermission("Affiliate Content","Bulletins","View");			

			if(!$permission)
			{	
				header("location:".$_CONF['SiteUrl']."/index.php?stage=subscriber&mode=AffiliateDetails&id=".$affID);							
			}
			/** permissions **/
	
				
			
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
		*function name  : VoteAlerts
		*function type  : call by value	
		*functionality  : vote alerts [ bills /petitions ] list from affiliate page 
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
			$profile_info = $this->oModel->getProfileInfo($_SESSION['username']);
			$uID = $profile_info[0]->member_id;			
			
			if(isset($_REQUEST["affID"]))
				$affID = $_REQUEST["affID"];
			
			/* permissions */			
			$permission = $this->aModel->checkSpecificAccessPermission("Affiliate Content","Bills","View");			

			if(!$permission)
			{	
				header("location:".$_CONF['SiteUrl']."/index.php?stage=subscriber&mode=AffiliateDetails&id=".$affID);							
			}
			/** permissions **/
			
			## affiliate ID required
			$oAffiliate = $this->affModel->getAffiliate($affID);			
			$this->oView->vAffiliate = $oAffiliate;				
			
			//View Alerts Added Affiliate Articles 	
			$final_alert_array = array();
			$today = date('Y-m-d');			 
			
			$affiliateArticles	 =	$this->oModel->getAffiliateVotePetitionAlerts( $affID,0,0 );
			foreach($affiliateArticles as $key=>$value) {
				if($ctr == 5) 
					break;

				//print_r($affiliateArticles);
				$voteStatus = $this->oModel->getVoteStatus($uID, $affiliateArticles[$key]["article_id"]);
				$affiliateArticles[$key]["vote_status"] = $voteStatus;
				
				
				if($affiliateArticles[$key]["article_type"] == "bill") {					
						
						array_push($final_alert_array, $affiliateArticles[$key]);
						$ctr = $ctr + 1;
				} elseif($affiliateArticles[$key]["article_type"] == "petition")  {
					
					if($today <= $affiliateArticles[$key]["voting_end"] && $today >= $affiliateArticles[$key]["voting_start"]) {  
						array_push($final_alert_array, $affiliateArticles[$key]);
						$ctr = $ctr + 1;
					}
				}
			}
			
			//echo "<pre>";
			//print_r($final_alert_array);
			//die();
			$this->oView->affiliateVoteAlerts = $final_alert_array;
			
			
			$this->oView->AffiliateVoteAlerts();			
		}//ef

		/*
		**************************************************************************************
		*function header
		*function name  : VoteAlertsDetail
		*function type  : call by value	
		*functionality  : 
		*input			: article ID 
		*output			: vote alerts [bills ] Details from affiliate detail page
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
				
			/* permissions */			
			$permission = $this->aModel->checkSpecificAccessPermission("Affiliate Content","Bills","View");			

			if(!$permission)
			{	
				header("location:".$_CONF['SiteUrl']."/index.php?stage=subscriber&mode=AffiliateDetails&id=".$affID);							
			}
			/** permissions **/
	
				
			
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
		*function name  : AffiliatePetitionsDetailAffiliate
		// as per client's is new module that displays alerts details which are petitions and bills 
		// [AffiliatePetition and Affiliatepetitiondetails were already there ]
		*function type  : call by value	
		*functionality  :  vote alerts [petitions ] Details from affiliate detail page
		*input			: article ID 
		*output			: article Details
		*return value   : nothing
		*note			: nothing
		***************************************************************************************
		*/
		function AffiliatePetitionsDetailAffiliate($articleID = NULL)	{
			//authenticate login
			
			$this->SubscriberAuthenticate();
			
			$userName        = $_SESSION["username"];
			$userObjectArray = $this->oModel->getProfileInfo($userName);							
			$userID 		 = $userObjectArray[0]->member_id; 			
			
			global $_CONF;
			if(isset($_REQUEST["id"]))
				$articleID = $_REQUEST["id"];
			
			$support = $total = 0; 
			
			if(isset($_REQUEST["affID"]))
				$affID = $_REQUEST["affID"];	
			
			if(isset($_REQUEST["msg"]))
			{
				$message = $_REQUEST["msg"];					
				$this->oView->vMsg = $message;	
			}			
			
			if( isset($_REQUEST["hashKey"]) && isset($_REQUEST["userID"])  && isset($_REQUEST["status"]) )
			{
				$hashKey 	= $_REQUEST["hashKey"];					
				$userIDURL 	= $_REQUEST["userID"];					
				$status 	= $_REQUEST["status"];					
				
				if($userIDURL == $userID)	
				{
					$value = $this->oModel->updatePetitionInformation($hashKey);					
				}
				header("location:index.php?stage=subscriber&mode=affiliatePetitionsDetail&affID=".$affID."&id=".$articleID);
			}
			
			$value = $this->oModel->getPetitionInformation( $affID, $articleID, $userID);
			$paymentDone = false;			
			if($value == 1){
				$paymentDone = true;
			}
			
			## affiliate ID required
			$oAffiliate = $this->affModel->getAffiliate($affID);			
			$this->oView->vAffiliate = $oAffiliate;				
			
			$this->oView->affiliateArticle = $this->affModel->getAffiliateArticleDetail($affID ,$articleID);			 
			
			
			if($this->oView->affiliateArticle[0]['voting_end'] < date("Y-m-d"))
				header("location:index.php?stage=subscriber&mode=MemberDashboard");		
			
			/* get vote status */
			$this->oView->articleStatus    = $this->affModel->getVotingStatus($articleID, $support ,$total );			 

			
			$supportPercentage = (int)(($support / $total ) * 100); 
			$opposePercentage  = 100 - $supportPercentage;
			
			$this->oView->supportPercentage = $supportPercentage;
			$this->oView->opposePercentage  = $opposePercentage;			

			$signs_count =  $total;			
			$this->oView->signs_count = $signs_count;		

			/* get vote status */

			## Get voting Details of login user
			$votingDetails = $this->memberModel->getVoteStatus($_SESSION['username'],$articleID);
			$this->oView->voting_details = $votingDetails;
			
			
			/* permissions */			

			$this->oView->affiliate_content_bills_view 			= false;
			$this->oView->affiliate_content_bills_vote_on_content 	= false;
			
			if( $this->aModel->checkSpecificAccessPermission("Affiliate Content","Bills","View") )
				$this->oView->affiliate_content_bills_view 			= true;
			
			if( $this->aModel->checkSpecificAccessPermission("Affiliate Content","Bills","Vote on Content") )
			{
				if($paymentDone)
				$this->oView->affiliate_content_bills_vote_on_content = true;
			}	
			
			
						
			/** permissions **/
			
			$this->oView->AffiliatePetitionsDetailAffiliate();
			
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
			
			/* permissions */			
			$permission = $this->aModel->checkSpecificAccessPermission("Affiliate Content","News","View");			

			if(!$permission)
			{	
				header("location:".$_CONF['SiteUrl']."/index.php?stage=subscriber&mode=MemberDashboard");							
			}
			
			$this->oView->affiliate_content_news_comment 	= false; 						
			if( $this->aModel->checkSpecificAccessPermission("Affiliate Content","News","Comment") )
				$this->oView->affiliate_content_news_comment = true;	
			/** permissions **/
	
			
			$profile_info = $this->oModel->getProfileInfo($_SESSION['username']);
			$subscriberID = $profile_info[0]->member_id;		
			
			if(isset($_REQUEST["id"]))
				$articleID = $_REQUEST["id"];
			
			if(isset($_REQUEST["affID"]))
				$affID = $_REQUEST["affID"];	
			
			if(isset($_POST["subscriber_comment"])) {
				$alreadyHaveSubscriberComment = $this->oModel->getSubscriberCommentForAffArticle($articleID,$subscriberID);			
				
				if($alreadyHaveSubscriberComment)				
					$msg =	"You already have commented to this news.";
				else	
				{
					$subscriberComment = htmlentities($_POST["subscriber_comment"], ENT_QUOTES);
					if($this->oModel->addSubscriberCommentToAffArticle($subscriberID,$articleID,$subscriberComment))
						$msg =	"Data is Saved.";
					else	
						$msg =	"Error in saving data.";		
				}		
				$this->oView->vMsg = $msg;		
			}
			
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
			
			/* permissions */			
			$permission = $this->aModel->checkSpecificAccessPermission("Affiliate Content","Bulletins","View");			
			if(!$permission)
			{	
				header("location:".$_CONF['SiteUrl']."/index.php?stage=subscriber&mode=AffiliateDetails&id=".$affID);							
			}
			
			$this->oView->affiliate_content_bulletins_comment 	= false; 						
			if( $this->aModel->checkSpecificAccessPermission("Affiliate Content","Bulletins","Comment") )
				$this->oView->affiliate_content_bulletins_comment = true;	
			
			/** permissions **/
			
			
			$profile_info = $this->oModel->getProfileInfo($_SESSION['username']);
			$subscriberID = $profile_info[0]->member_id;		
			
			
			
			if(isset($_POST["subscriber_comment"])) 
			{		
				$alreadyHaveSubscriberComment = $this->oModel->getSubscriberCommentForAffArticle($articleID,$subscriberID);			
				
				if($alreadyHaveSubscriberComment)				
					$msg =	"You already have commented to this bulletin.";
				else	
				{
					$subscriberComment = htmlentities($_POST["subscriber_comment"], ENT_QUOTES);
					if($this->oModel->addSubscriberCommentToAffArticle($subscriberID,$articleID,$subscriberComment))
						$msg =	"Data is saved.";
					else	
						$msg =	"Error in saving data.";		
				}		
				$this->oView->vMsg = $msg;		
			}
			
					
				
			
			## affiliate ID required
			$oAffiliate = $this->affModel->getAffiliate($affID);			
			$this->oView->vAffiliate = $oAffiliate;				
			
			## get comment by subscriber on Affiliate article - name date and comment
			$subscribersComment = $this->oModel->getSubscriberCommentForAffArticle($articleID);						
			$this->oView->subscribersComment = $subscribersComment;							
			
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
			
				
			/* permissions */
			
			$this->oView->er_content_poll_view 		= false; 										
			$this->oView->er_content_article_view 	= false; 							
			$this->oView->er_content_report_card_view = false;
			
			if( $this->aModel->checkSpecificAccessPermission("ER Content","Poll","View") )
				$this->oView->er_content_poll_view = true; 																	
				
			if( $this->aModel->checkSpecificAccessPermission("ER Content","Articles","View") )
				$this->oView->er_content_article_view = true; 													
				
			if( $this->aModel->checkSpecificAccessPermission("ER Content","Report Card","View") )
				$this->oView->er_content_report_card_view = true; 							
			
			/** permissions **/
						
			
			
		    global $_CONF;
			
			$erID	= $_GET['er_id'];
			/*
			$oMember	= $this->eModel->getElectedRepresentativeID($erID);
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
			
			$reportCardArticles = $this->getReportCardDashBoard($erID);

			//echo "<pre>";
			//print_r($reportCardArticles);
			//die();
			$this->oView->affiliateVoteAlerts	= $reportCardArticles;			 
			
			
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
			$erID = $_GET['er_id'];

			/* permissions */	
			$permission = $this->aModel->checkSpecificAccessPermission("ER Content","Articles","View");			
			if(!$permission)
			{	
				header("location:".$_CONF['SiteUrl']."/index.php?stage=subscriber&mode=ElectedrepresentativeProfile&er_id=" . $erID );																				   
			}
			/* permissions */	

			/*
			$oMember	= $this->oModel->getElectedRepresentativeID($loggedInER);
			$oMember 	= $oMember[0];
			$erID 		= $oMember->ElectedOfficialID;
			*/
			$this->oView->ElectedOfficialID 	= $erID;			
			$oElectoralDistrict = $this->oModel->getElectedRepresentativeDetails($erID);
			$this->oView->oElectoralDistrict 	= $oElectoralDistrict[0];
			
			
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
			
			/* permissions */	
			$permission = $this->aModel->checkSpecificAccessPermission("ER Content","Poll","View");			
			if(!$permission)
			{	
				header("location:".$_CONF['SiteUrl']."/index.php?stage=subscriber&mode=ElectedrepresentativeProfile&er_id=" . $erID );																				   
			}
			/* permissions */	
			
			/*			
			$loggedInER	= $_SESSION['username'];
			$oMember	= $this->oModel->getElectedRepresentativeID($loggedInER);
			$oMember 	= $oMember[0];
			$erID 		= $oMember->ElectedOfficialID;
			*/
			$this->oView->ElectedOfficialID 	= $erID;			
			$oElectoralDistrict = $this->oModel->getElectedRepresentativeDetails($erID);
			$this->oView->oElectoralDistrict 	= $oElectoralDistrict[0];
			
			
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

			/* permissions */	
			$permission = $this->aModel->checkSpecificAccessPermission("ER Content","Report Card","View");			
			if(!$permission)
			{	
				header("location:".$_CONF['SiteUrl']."/index.php?stage=subscriber&mode=ElectedrepresentativeProfile&er_id=" . $erID );																				   
			}
			/* permissions */	
			
			/*			
			$loggedInER	= $_SESSION['username'];
			$oMember	= $this->oModel->getElectedRepresentativeID($loggedInER);
			$oMember 	= $oMember[0];
			$erID 		= $oMember->ElectedOfficialID;
			*/
			//$oElectoralDistrictComments = $this->oModel->getElectedRepresentativeComments($erID);
			$this->oView->ElectedOfficialID 	= $erID;			
			$oElectoralDistrict = $this->oModel->getElectedRepresentativeDetails($erID);
			$this->oView->oElectoralDistrict 	= $oElectoralDistrict[0];
			
			
			$reportCardArticles = $this->getReportCardList($erID);
			$this->oView->oElectoralDistrictComments 	= $reportCardArticles;			
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
		function ArticleDetail($oMember = null,$msg = "") {
			
			
			$this->SubscriberAuthenticate();
			$msg = "";
			if(trim($msg) != "") {
				
				if(trim($msg) == "comment_added") {
				
					$msg = "Your comment added successfully.";
				}
			}
			
			$this->oView->msg	=	$msg;
			
			if(isset($_GET['id'])) {
				
				$article_id = $_GET['id'];
				$erID	= $_GET['er_id'];
			} else if($oMember) {

				$article_id = $oMember->article_id;
				$erID	= $oMember->er_id;				
			}
			
			/* permissions */	
			$permission = $this->aModel->checkSpecificAccessPermission("ER Content","Articles","View");			
			if(!$permission)
			{	
				header("location:".$_CONF['SiteUrl']."/index.php?stage=subscriber&mode=ElectedrepresentativeProfile&er_id=" . $erID );																				   
			}
						  
			$this->oView->er_content_article_comment = false;
			
			if( $this->aModel->checkSpecificAccessPermission("ER Content","Articles","Comment") )
				$this->oView->er_content_article_comment = true; 													
			
			/* permissions */	

			$this->oView->ElectedOfficialID 	= $erID;			
			$oElectoralDistrict = $this->oModel->getElectedRepresentativeDetails($erID);
			$this->oView->oElectoralDistrict 	= $oElectoralDistrict[0];
			
			
			$oArticle = $this->oModel->getERArticleDetails($article_id);
			$oArticle = $oArticle[0];
			
			$oSubscribersComment = $this->oModel->getERArticleComment($article_id);
			/*
			echo "<pre>";
			print_r($oSubscribersComment);
			die();
			*/
			$this->oView->oSubscribersComment = $oSubscribersComment;
			
			$this->oView->oArticle	=	$oArticle;
			$this->oView->er_id		=	$erID;
			$this->oView->ArticleDetail();
		}

		
		/*
		*****************************************************************************************
		*Function Header
		*Function Name  : SaveSubscriberERComment
		*Function Type  : Call by value	
		*Functionality  : Save subscriber comment on ER Article
		*Input			: nothing
		*Output			: nothing.
		*Return Value   : nothing
		*Note			: nothing
		******************************************************************************************
		*/
		function SaveSubscriberERComment()
		{
		    global $_CONF;
			$this->SubscriberAuthenticate();
		    
			$oMember->comment		=	htmlentities($_POST['subscriber_comment'], ENT_QUOTES);
			$oMember->article_id	=	$_POST['id'];
			$oMember->er_id			=	$_POST['er_id'];
			
			$oSubscriber = $this->oModel->getProfileInfo($_SESSION['username']);
			$oMember->member_id	=	$oSubscriber[0]->member_id;

			/*
			echo "<pre>";
			print_r($_POST);
			print_r($oMember);
			die();
			*/
			$this->oModel->addSubscriberERComment($oMember);
			
			$msg = "comment_added";			
			$this->ArticleDetail($oMember,$msg);
			die();	
		}//ef		
		

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
			if(isset($_GET['msg'])) {
				
				if($_GET['msg'] == "comment_added") {
				
					$msg = "comment_added";
				}
			}
			
			$this->oView->msg	=	$msg;
			
			if(isset($_GET['id'])) {
				$article_id = $_GET['id'];
				$erID		= $_GET['er_id'];				
			}
			
						
			/* permissions */			
			$permission = $this->aModel->checkSpecificAccessPermission("ER Content","Poll","View");			
			if(!$permission)
			{	
				header("location:".$_CONF['SiteUrl']."/index.php?stage=subscriber&mode=MemberDashboard");							
			}
	
			$this->oView->er_content_poll_vote_on_content 	= false; 			
			
			if($_SESSION["member_type"] == "subscriber") {			
				if( $this->aModel->checkSpecificAccessPermission("ER Content","Poll","Vote on Content") )
					$this->oView->er_content_poll_vote_on_content = true; 														}	
			/** permissions **/
			
			$oArticle = $this->oModel->getERPollDetails($article_id);						
			$oArticle = $oArticle[0];
			
			##View Alert - Added Affiliate Articles 	
			$profile_info = $this->oModel->getProfileInfo($_SESSION['username']);
			$uID = $profile_info[0]->member_id;		
			
			## Get voting Details 			
			$votingDetails = $this->oModel->getVoteStatusOnPoll($uID,$article_id);
			$this->oView->voting_details = $votingDetails ;
			
			## Electoral district 
			$this->oView->ElectedOfficialID 	= $erID;			
			$oElectoralDistrict = $this->oModel->getElectedRepresentativeDetails($erID);
			$this->oView->oElectoralDistrict 	= $oElectoralDistrict[0];			
	
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
		
		
		/******************************************************************************************
		*Function Header
		*Function Name  : SubscriberJoinDirect
		*Function Type  : Call by value	
		*Functionality  : Displays the page for new signup of subscriber.
		*Input			: nothing
		*Output			: Signup page for subscriber through SubscriberView.
		*Return Value   : nothing
		*Note			: nothing
		*******************************************************************************************/
		function SubscriberJoinDirect($oSubscriber,$sErrorMsg="")
		{
			$articleID = "";
			if(isset($_REQUEST["article_id"])) {
				
				$articleID = trim($_REQUEST["article_id"]);
			} else if(isset($oSubscriber)) {
				
				$articleID = trim($oSubscriber->article_id);
			}
			
			if($articleID == "") {
				
				echo "<script>location='index.php?stage=subscriber&mode=EmailMessage&message=invalidaccess'</script>";
				die();				
			}
			
			$this->oView->sErrorMsg = $sErrorMsg;
			$this->oView->oSubscriber = $oSubscriber;
			$this->oView->articleID = $articleID;
			$this->oView->subscription_amount = $this->oModel->getSubscriptionAmount();			
			$this->oView->oAffiliates = $this->oModel->getAffiliatesSubscriberJoin();			
			$this->oView->SubscriberJoinDirect();
		}//ef
		
		
		/*
		*****************************************************************************************
		*Function Header
		*Function Name  : SaveSubscriberJoinDirect ??  not using 
		*Function Type  : Call by value	
		*Functionality  : Stores the signup information of employer and display terms and conditions to agree before saving to db.
		*Input			: nothing
		*Output			: nothing.
		*Return Value   : nothing
		*Note			: nothing
		******************************************************************************************
		*/
		function SaveSubscriberJoinDirect()
		{
		    global $_CONF;
			echo "??";
			/*
			print_R($_POST);
			die();*/
			$oSubscriber->article_id 		= $_POST['article_id'];
			$oSubscriber->subscriptionfee 	= $_POST['subscriptionfee'];
			if($oSubscriber->article_id == "") {
				
				echo "<script>location='index.php?stage=subscriber&mode=EmailMessage&message=invalidaccess'</script>";
				die();				
			}			
		    
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
			$oSubscriber->primary_afflliates		=	htmlentities($_POST['primary_afflliates'],ENT_QUOTES);
			$oSubscriber->primary_afflliate_code	=	htmlentities($_POST['primary_afflliate_code'],ENT_QUOTES);
			$secondary_afflliates					=	$_POST['secondary_afflliates'];
			$oSubscriber->secondary_afflliates		= $secondary_afflliates;
			
			$oSubscriber->isBillingInfo				=   trim($_POST['isBillingInfo']);
			
			$oSubscriber->billingAddress			=	htmlentities($_POST['billingAddress'],ENT_QUOTES);
			$oSubscriber->billingState				=	htmlentities($_POST['billingState'],ENT_QUOTES);
			$oSubscriber->billingZipCode			=	htmlentities($_POST['billingZipCode'],ENT_QUOTES);
			$oSubscriber->billingCity				=	htmlentities($_POST['billingCity'],ENT_QUOTES);
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
			$isDuplicate	=	$this->oModel->checkDuplication($oSubscriber);
			
			if($isDuplicate == "username") {
			
				$sErrorMsg	= "User Name already exists.";
				$this->SubscriberJoinDirect($oSubscriber, $sErrorMsg);
				die();			
			} else if($isDuplicate == "email") {
									
				$sErrorMsg	= "E-mail Id already exists.";
				$this->SubscriberJoinDirect($oSubscriber, $sErrorMsg);
				die();			
			}
			
			##get primary affiliate id from affiliate code 			
			if(!empty($oSubscriber->primary_afflliate_code))
			{	
				
				$affID  = $this->oModel->getPrimaryAffIDfromCode($oSubscriber->primary_afflliate_code);  
				
				if($affID) {
					
					$oSubscriber->primary_afflliates = $affID;
				} else {
					
					$sErrorMsg	= "Invalid affiliate code.";
					$this->SubscriberJoinDirect($oSubscriber, $sErrorMsg);
					die();								
				} 
			}
									
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
			
			//print_r($officials);
			
			$isValidCicero = count($officials);
			
			if($isValidCicero) {
				
				//do nothing;
				$i_test_but_do_nothing = "i_test_but_do_nothing";				
			} else {
				
				$sErrorMsg	= "Please enter a valid address.";
				$this->SubscriberJoinDirect($oSubscriber, $sErrorMsg);
				die();								
			}

			//echo "<pre>";
			//print_r($oSubscriber);
			//die();			
			
			if(!empty($secondary_afflliates)) {			
				foreach($secondary_afflliates as $key => $val) {
					if($val == $oSubscriber->primary_afflliates) {
						$index = $key;
					}
				}
				if($index >= 0) {
					array_splice($secondary_afflliates, $index, 1);
				}
			
				$oSubscriber->secondary_afflliates	=	implode(",",$secondary_afflliates);				
				//$oSubscriber->category_id_exploded	=	explode(",",$oSubscriber->secondary_afflliates);
			}
			
			$id = $this->oModel->addSubscriber($oSubscriber);
			if($id) {
				
				$oSubscriber->member_id = $id;
				$this->payForSubscription($oSubscriber,$sErrorMsg);
				die();
			} else {
				
				$sErrorMsg	=	"Server error.<br>Please try again later.";
				$this->SubscriberJoinDirect($oSubscriber,$sErrorMsg);
				die();
			}
		}//ef
		
		
		/******************************************************************************************
		*Function Header
		*Function Name  : payForSubscription ?????????? not using 
		*Function Type  : Call by value	
		*Functionality  : .
		*Input			: nothing
		*Output			: .
		*Return Value   : nothing
		*Note			: nothing
		*******************************************************************************************/
		function payForSubscription($oSubscriber)
		{
			global $_CONF;
			echo "??";
			$oPaypal = new Paypal();
			
			/*			
			print_r($oSubscriber);
			die();
			
			die($oSubscriber->subscriptionfee);
			*/
			$oPaypal->url 			= $_CONF['payment_url'];
			$oPaypal->business 		= $_CONF['business'];

			$oPaypal->return 		= 	$_CONF['SiteUrl']."/index.php?stage=subscriber&mode=subscriptionPaymentSuccess&article_id=".$oSubscriber->article_id."&visitor_id=" . base64_encode($oSubscriber->member_id);			
			$oPaypal->cancel_return =   $_CONF['SiteUrl']."/index.php?stage=subscriber&mode=subscriptionPaymentCancel&article_id=".$oSubscriber->article_id."&visitor_id=" . base64_encode($oSubscriber->member_id);
			$oPaypal->notify_url	=   $_CONF['SiteUrl']."/index.php?stage=subscriber&mode=subscriptionpaymentipn&article_id=".$oSubscriber->article_id."&visitor_id=" . base64_encode($oSubscriber->member_id);
			$oPaypal->amount 		= 	$oSubscriber->subscriptionfee;
			$oPaypal->currency_code = 	$_CONF['currency_code'];
			$oPaypal->item_name 	= 	"membersubscription";
			
			
			//create paypal form
			$p = new paypal_class;             
			$p->paypal_url = $oPaypal->url;
				   	
			$amount = number_format($oPaypal->amount, 2, '.', '');
					 
			/************************************************/
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
		*function name  : subscriptionPaymentSuccess ??
		*function type  : call by value	
		*functionality  : 
		*input			: 
		*output			: 
		*return value   : nothing
		*note		    : nothing
		***************************************************************************************
		*/
		
		function subscriptionPaymentSuccess()
		{
			global $_CONF;
			echo "??";
			$article_id = trim($_REQUEST["article_id"]);
			$visitor_id = base64_decode(trim($_REQUEST["visitor_id"]));
			//visitor_id
			
						
			$wsdl	=	"http://cicero.azavea.com/Azavea.Cicero.WebService.v2/AuthenticationService.asmx?wsdl";
			$client	=	new nusoap_client($wsdl, 'wsdl');
		
			$wsdl_EOQueryService	=	"http://cicero.azavea.com/Azavea.Cicero.WebService.v2/ElectedOfficialQueryService.asmx?wsdl";	
			$client_EOQueryService	=	new nusoap_client($wsdl_EOQueryService, 'wsdl');
			
			$cicero_username = $_CONF['cicero_username'];
			$cicero_password = $_CONF['cicero_password'];
		
			$params	=	array('userName'=>$cicero_username,'password'=>$cicero_password); 
			
			$token_result	=	$client->call('GetToken',$params);
			$token = $token_result['GetTokenResult'];	
			
			$isAlreadySignedPetition = $this->oVisitorModel->getVisitorPetitionSignStatus($article_id, $visitor_id);
			if($isAlreadySignedPetition) {

				##Already signed petition 
				echo "<script>location='index.php?stage=subscriber&mode=EmailMessage&message=alreadysignedpetition'</script>";
				die();
			}//if			
			
			//echo $sSQL;
			$oMember = $this->oModel->getSubscriberAddressDetails($visitor_id);
			$oMember = $oMember[0];
			
			//echo "<pre>";
			//print_r($oMember);	
			//die();		
			if(is_object($oMember)) {

				//die("==is_object==");
				$subscriber_id	= $oMember->subscriber_id;
				$address		= $oMember->mail_street_address;
				$city			= $oMember->mail_city;
				$state			= $oMember->mail_state;
				$postalCode		= $oMember->mail_zip_code;
		
				$country		= "US";
				$districtType 	= "All";
				$includeAtLarge = false;
				
				$param_validate	=	array('authToken'=>$token,'address'=>$address,'city'=>$city,'state'=>$state,'postalCode'=>$postalCode,'country'=>$country,'districtType'=>$districtType,'includeAtLarge'=>$includeAtLarge); 
				
				$result_OfficialsByAddress	=	$client_EOQueryService->call('GetOfficialsByAddress',$param_validate);
				
				$officials = $result_OfficialsByAddress['GetOfficialsByAddressResult']['ElectedOfficialInfo'];
				
				$isValidCicero = count($officials);
				if($isValidCicero) {
					
					//die("==$isValidCicero==");
					##Update database 			
					$rs = $this->oModel->setUserTypeSubscriber($visitor_id);
					$affiliate_id =  $this->oModel->getArticleAffiliateId($article_id);
					
					$oSubscriber = $this->oModel->getProfileUserName($visitor_id);
					$oSubscriber = $oSubscriber[0];					
					$_SESSION['username']		=	$oSubscriber->user_name;					
					$_SESSION['member_type']	=	"observer";					
					
					echo "<script>location='index.php?stage=subscriber&mode=affiliatePetitionsDetail&affID=$affiliate_id&id=$article_id'</script>";
					die();						
				} else {				
					// die("==!$isValidCicero==");
					##Update database 			
					$rs = $this->oModel->setUserTypeSubscriber($visitor_id);
					echo "<script>location='index.php?stage=subscriber&mode=EmailMessage&message=invalidaddress'</script>";
					die();						
				}//if
			} else {				
				// die("==!is_object==".$visitor_id);
				echo "<script>location='index.php?stage=subscriber&mode=EmailMessage&message=invalidaccess'</script>";
				die();				
			}//if
		}//ef
	
		
		/*
		**************************************************************************************
		*function header
		*function name  : oncePetitionPayment
		*function type  : call by value	
		*functionality  : pay to sign petition one time only by observer 
		*input			: 
		*output			: 
		*return value   : nothing
		*note		    : nothing 
		***************************************************************************************
		*/	
	
		function oncePetitionPayment( $affiliateID = NULL, $articleID = NULL)
		{
		
			global $_CONF;	
			
			
			if(!empty($_REQUEST))
			{
				/* system settings */									
				
				$one_time_petition_sign_fee = 0; 										
				$one_time_petition_sign_fee = $this->sModel->getSettingDetailFromName("One Time Petition Sign Fee");			
				
				/** system settings **/	

				$affiliateID	= $_REQUEST["affiliateID"];
				$articleID 		= $_REQUEST["articleID"];				
				
				$userName       	= $_SESSION["username"];
				$userObjectArray 	= $this->oModel->getProfileInfo($userName);							
				$userID 			= $userObjectArray[0]->member_id; 
				
				$hashKey = 	base64_encode("$affiliateID" . "$articleID" . "$userID");
				
				## save value in to database 
				$value = $this->oModel->savePetitionInformation( $affiliateID,$articleID,$userID);
				
				## payment 				
				$oPaypal = new Paypal();			
				$oPaypal->url 			= $_CONF['payment_url'];
				$oPaypal->business 		= $_CONF['business'];
				$oPaypal->return 		= $_CONF['SiteUrl'] . "/index.php?stage=subscriber&mode=petitionsDetail&affID=" . $affiliateID . "&id=" . $articleID . "&userID=" . $userID."&hashKey=" . $hashKey."&status=success";
				$oPaypal->cancel_return = $_CONF['SiteUrl'] . "/index.php?stage=subscriber&mode=petitionsDetail&affID=" . $affiliateID . "&id=" . $articleID . "&userID=" . $userID."&hashKey=" . $hashKey."&status=failure";
				$oPaypal->notify_url	= $_CONF['SiteUrl'] . "/index.php?stage=subscriber&mode=petitionsDetail&affID=" . $affiliateID . "&id=" . $articleID . "&userID=" . $userID."&hashKey=" . $hashKey."&status=ipn";
				$oPaypal->amount 		= $one_time_petition_sign_fee;
				$oPaypal->currency_code = $_CONF['currency_code'];
				$oPaypal->item_name 	= "Payment for one petition signing";
			
				$p = new paypal_class;             
				$p->paypal_url	= $oPaypal->url;				   	
				$amount 		= number_format($oPaypal->amount, 2, '.', '');

				/*******************************************************
				Just replace the below 6 lines with the Creditials of Client.
				*********************************************************/
				// email business id(test account buyer email id)
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
			}
			else
			{
				echo "error";
			}			
		}//ef
		
		
		/*
		**************************************************************************************
		*function header
		*function name  : getReportCardDashBoard
		*function type  : call by value	
		*functionality  : 
		*input			: 
		*output			: 
		*return value   : nothing
		*note			: nothing
		***************************************************************************************
		*/
		function getReportCardDashBoard($erID = "")
		{
		    global $_CONF;
			
			if($erID == "") {
				echo "<script>location='index.php?stage=subscriber&mode=EmailMessage&message=invalidaccess'</script>";
				die();	
			}
			//$erID 		= $oMember->ElectedOfficialID;
			//echo $erID;
			$mySubscribers = $this->eModel->getMySubscribers($erID);
			$mySubscribersAffiliates 			=	$this->eModel->getMySubscribersAffiliates($mySubscribers);
			$mySubscribersAffiliatesArticles	=	$this->eModel->getAffiliateArticleDetailER($mySubscribersAffiliates, "yes");
			
			/*
			echo $erID;
			echo "<pre>";			
			print_r($mySubscribersAffiliatesArticles);
			die();
			*/
			return $mySubscribersAffiliatesArticles;			
		}//ef
		
		/*
		**************************************************************************************
		*function header
		*function name  : getReportCardList
		*function type  : call by value	
		*functionality  : 
		*input			: 
		*output			: 
		*return value   : nothing
		*note			: nothing
		***************************************************************************************
		*/
		function getReportCardList($erID = "")
		{
		    global $_CONF;
			
			if($erID == "") {
				echo "<script>location='index.php?stage=subscriber&mode=EmailMessage&message=invalidaccess'</script>";
				die();	
			}
			//echo $erID;
			$mySubscribers = $this->eModel->getMySubscribers($erID);
			$mySubscribersAffiliates 			=	$this->eModel->getMySubscribersAffiliates($mySubscribers);
			$mySubscribersAffiliatesArticles	=	$this->eModel->getAffiliateArticleDetailER($mySubscribersAffiliates);
			
			//echo "<pre>";
			//print_r($mySubscribersAffiliatesArticles);
			//die();
			
			return $mySubscribersAffiliatesArticles;			
		}//ef
	};//ec
?>