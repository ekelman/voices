<?php

	/*****************************************************************************************************
	* Author Name		: Anil Nautiyal
	* Creation Date 	: 27th May-2011
	* FileName 			: AdminController.php
	* Called From 		: index.php[on the basis of stage variable set]
	* Description 		: admin panel functions
	* Components Used 	: none
	* Tables Accessed 	: none
	* Program Specs 	:
	* UTP doc 			:
	* Tested By 		:
	****************************************************************************************************/

	/***************************************************************************************************
	Controller.php file is used to control the functions in modules to interact on the basis of stage and mode defined
	****************************************************************************************************/
	require($_CONF['ModulesPath'].'system/classes/Controller.php');

	/***************************************************************************************************
	Model.php file is used to interact with database
	****************************************************************************************************/
	require($_CONF['ModulesPath'].'system/classes/Model.php');

	/***************************************************************************************************
	AuthenticationModel.php file is used to authenticate the admin users
	****************************************************************************************************/
	require_once($_CONF['ModulesPath'].'admin/classes/AuthenticationModel.php');
	require_once($_CONF['ModulesPath'].'system/classes/ConfigurationModel.php');

	/***************************************************************************************************
	htmlMimeMail.php file and sendmail.php is used to send mails
	****************************************************************************************************/
	require_once $_CONF['LibPath']."mail/htmlMimeMail.php";
	require_once $_CONF['LibPath']."mail/SendEmail.php";

	/***************************************************************************************************
	upload_class.php file is used to upload the files
	****************************************************************************************************/
	require_once $_CONF['LibPath']."file_upload/upload_class.php";

	/***************************************************************************************************
	functions.php file is used to include the common functions
	****************************************************************************************************/
	require_once $_CONF['ModulesPath']."system/functions.php";

	
	/**************************************************************************************************
	*Class Header
	*Class Name: AdminController
	*Functionality: provides the functions to manage the admin panel and it inherits the Controller
	*Note         : none
	*************************************************************************************************/
	class AdminController extends Controller{

		/*************************************************************************************************
		*Function Header
		*Function Name  : AdminController
		*Function Type  : constructor
		*Functionality  : initializes parent class object and starts session
		*Input			: nothing
		*Output			: nothing
		*Return Value   : nothing
		*Note			: nothing
		*********************************************************************************************/
		function AdminController(){		
			global $_CONF;
			session_start();			
			parent::Controller();
		}

		/*************************************************************************************************
		*Function Header
		*Function Name  : RunApplication
		*Function Type  : call by value
		*Functionality  : invokes the method
		*Input			: nothing
		*Output			: nothing
		*Return Value   : returns the mail contents
		*Note			: nothing
		*********************************************************************************************/
		function RunApplication(){
			
			if(false == $this->checkAuthorization() && ("login" != $this->mode)){
				$this->askCredentials();
				return;
			}
			$method = $this->mode;
			
			if(method_exists($this,$method))
				$this->$method();
			else
				die("Invalid Method Invoked");
		}

		/*************************************************************************************************
		*Function Header
		*Function Name  : m_default
		*Function Type  : call by value
		*Functionality  : invokes the default method
		*Input			: nothing
		*Output			: nothing
		*Return Value   : returns the default method
		*Note			: nothing
		*********************************************************************************************/
		function m_default(){
			$_SESSION['LeftClick'] = "Home";
			
			$obAdminView = new AdminView();
			$obAdminView->{$this->mode}();
		}

		/*************************************************************************************************
		*Function Header
		*Function Name  : checkAuthorization
		*Function Type  : call by value
		*Functionality  : checks if user is authunticated or not
		*Input			: nothing
		*Output			: nothing
		*Return Value   : Boolean
		*Note			: nothing
		*********************************************************************************************/
		function checkAuthorization(){
			//echo $_SESSION['admin_user']."dddddddd";
		
			if(empty($_SESSION['admin_user']) || !isset($_SESSION['admin_user']))
				return false;
			else
				return true;
		}

		/*************************************************************************************************
		*Function Header
		*Function Name  : login
		*Function Type  : call by value
		*Functionality  : displays the login screen
		*Input			: nothing
		*Output			: nothing
		*Return Value   : Boolean
		*Note			: nothing
		*********************************************************************************************/
		function login(){
			global $_CONF;
			$bError = false;
			$sMsg = "";
		
			if(empty($_POST['Username'])){
				$bError = true;
				$sMsg .= "Please enter User Name.";
			}
			if(empty($_POST['Password'])){
				$bError = true;
				$sMsg .= "<br>Please enter Password.";
			}
			
			if($bError == false){
				$oAM = new AuthenticationModel();
				if(!$oAM->checkCredentials($_POST['Username'], $_POST['Password'])){
					$this->askCredentials("Invalid User Name or Password.");
				} else {
					$_SESSION['admin_user'] = $_POST['Username'];
					$_SESSION['username'] = $_POST['Username'];
					$_SESSION['password'] = $_POST['Password'];
					$_SESSION['isAdminLogin'] = "1";
					
					$this->mode = "m_default";
					$this->m_default();
				}
			} else {
			
				$this->askCredentials($sMsg);
			}
		}

		/*************************************************************************************************
		*Function Header
		*Function Name  : logout
		*Function Type  : call by value
		*Functionality  : logs out of the secured area
		*Input			: nothing
		*Output			: nothing
		*Return Value   : Boolean
		*Note			: nothing
		*********************************************************************************************/
		function logout(){
		
			//$_SESSION['isAdminLogin'] = "";
			unset($_SESSION['admin_user']);
			unset($_SESSION['username']);
			unset($_SESSION['password']);
			unset($_SESSION['isAdminLogin']);
			
			//session_destroy();
			// If it's desired to kill the session, also delete the session cookie.
			// Note: This will destroy the session, and not just the session data!
			if (isset($_COOKIE[session_name()])) {
				setcookie(session_name(), '', time()-42000, '/');
			}

			// Finally, destroy the session.
			session_destroy();
			
			$sMessage	=	"You are successfully logged out.";
			echo "<script>window.location=\"index.php?sErrorMsg=" . $sMessage . "\"</script>";
		}

		/*************************************************************************************************
		*Function Header
		*Function Name  : askCredentials
		*Function Type  : call by value
		*Functionality  : displays the login screen
		*Input			: nothing
		*Output			: nothing
		*Return Value   : Boolean
		*Note			: nothing
		*********************************************************************************************/
		function askCredentials($sMsg=""){
			$obAdminView = new AdminView();
			if(empty($_SESSION['admin_user']) || !isset($_SESSION['admin_user'])) {
				$_SESSION['admin_user'] = "";
			}
			$obAdminView->sErrorMsg = $sMsg;
			$obAdminView->showLoginScreen();
		}
		
		/*************************************************************************************************
		*Function Header
		*Function Name  : change_pass
		*Function Type  : call by value
		*Functionality  : displays the form to change password
		*Input			: nothing
		*Output			: displays the form to change password
		*Return Value   : Boolean
		*Note			: nothing
		*********************************************************************************************/
		function change_pass($sMsg=""){
			$_SESSION['LeftClick'] = "Change Password";
			$obAdminView = new AdminView();
			$obAdminView->sErrorMsg = $sMsg;
			$obAdminView->changePass();
		}
		
		/*************************************************************************************************
		*Function Header
		*Function Name  : settings
		*Function Type  : call by value
		*Functionality  : displays the list of settings 
		*Input			: nothing
		*Output			: displays the list of settings 
		*Return Value   : Boolean
		*Note			: nothing
		*********************************************************************************************/
		function settings($sMsg=""){
			
			$obAdminView = new AdminView();
			$obAdminView->sErrorMsg = $sMsg;
			$obAdminView->settings();
		}
		
			
	

	
		/*************************************************************************************************
		 * //not required in this project
		*Function Header
		*Function Name  : config
		*Function Type  : call by value
		*Functionality  : change config value if configuration table is used
		*Input			: nothing
		*Output			: changes the password
		*Return Value   : Boolean
		*Note			: nothing
		*********************************************************************************************/
		function config($sMsg="",$oConfig=NULL){
			$_SESSION['LeftClick'] = "Configuration";
			$obAdminView = new AdminView();
			$this->oConfigModel = new ConfigurationModel();
			if(NULL==$oConfig){
				$OConfig = $this->oConfigModel->getAllValue();
				//echo "<pre>";print_r($OConfig);
				//$oConfig = $OConfig[0];
			}
			$obAdminView->EditConfig($OConfig,$sMsg);
		}
	
		/*************************************************************************************************
		*Function Header
		*Function Name  : request_config
		*Function Type  : call by value
		*Functionality  : 
		*Input			: nothing
		*Output			: 
		*Return Value   : Boolean
		*Note			: nothing
		*********************************************************************************************/
		function request_config(){
			$sMsg = "";
			$bError = false;
			if(empty($_POST['Queue_Counter/Listing_Settings']) || ("" == trim($_POST['Queue_Counter/Listing_Settings']) ) ){
				$bError = true;
				$sMsg = "Please provide Queue size";
			}
			if(empty($_POST['Max_Lead_Size/join_category']) || ("" == trim($_POST['Max_Lead_Size/join_category']) ) ){
				$bError = true;
				$sMsg = "Please provide Max Lead size";
			}
			if(empty($_POST['Max_Lead_Set/join_category']) || ("" == trim($_POST['Max_Lead_Set/join_category']) ) ){
				$bError = true;
				$sMsg = "Please provide Max Lead set size";
			}

			if(empty($_POST['Bill_Counter/Lead_Numbers']) || ("" == trim($_POST['Bill_Counter/Lead_Numbers']) ) ){
				$bError = true;
				$sMsg = "Please provide Number of Billable Leads";
			}

			if(empty($_POST['Click_Time/Click_tracking']) || ("" == trim($_POST['Click_Time/Click_tracking']) ) ){
				$bError = true;
				$sMsg = "Please Select time for click";
			}

			if(empty($_POST['VAT_Value_set/vat_value']) || ("" == trim($_POST['VAT_Value_set/vat_value']) ) ){
				$bError = true;
				$sMsg = "Please Enter value for VAT";
			}
			if($bError){
				$this->config($sMsg);
			}else{
				$oCM = new ConfigurationModel();
				$oCM->changeConfig($_POST['Queue_Counter/Listing_Settings'],$_POST['Max_Lead_Size/join_category'],$_POST['Max_Lead_Set/join_category'],$_POST['Bill_Counter/Lead_Numbers'],$_POST['Click_Time/Click_tracking'],$_POST['Excluded_Countries/Click_tracking'],$_POST['Bad_Click_Discount/Click_tracking'],$_POST['lead_notification/Lead_Received_Notification'],$_POST['VAT_Value_set/vat_value']);
				$sMsg="Configuration information changed sucessfully.";
				$this->config($sMsg);
			}
		}

		/*************************************************************************************************
		*Function Header
		*Function Name  : request_change_pass
		*Function Type  : call by value
		*Functionality  : changes the password after validate
		*Input			: nothing
		*Output			: changes the password
		*Return Value   : Boolean
		*Note			: nothing
		*********************************************************************************************/
		function request_change_pass(){
		
			$sMsg = "";
			$bError = false;
			if(empty($_POST['Password']) || ("" == trim($_POST['Password']) ) ){
				$bError = true;
				$sMsg = "Please provide password.";
			}
			if($_POST['Re_Password'] != $_POST['Password']){
				$bError = true;
				$sMsg .= "<br>New Password and confirm password should be same.";
			}
			if($bError){
				$this->change_pass($sMsg);
			}else{
				$oAM = new AuthenticationModel();
				if($oAM->checkOldPassword($_SESSION['admin_user'], $_POST['OldPassword']))
				{
					$oAM->changePassword($_SESSION['admin_user'], $_POST['Password']);
					$sMsg="Password changed successfully.";
				}
				else
				{
					$sMsg="Old Password is incorrect. Please try again.";
				}
				$this->change_pass($sMsg);
			}
		}//ef request_change_pass
	
		/***********************************************************************************************
		*Function Header
		*Function Name  : getFilterObject
		*Function Type  : call by value
		*Functionality  : get filter object to apply filter 
		*Input			: NIL
		*Output			: filters records as per criteria
		*Return Value   : NIL
		*Note			: NIL
		*****************************************************************************************/
		function getFilterObject()
		{
			$cnt = 0;
			foreach($_REQUEST as $key=>$value)
			{
				if($key != "stage" && $key != "mode"  && $key != "PHPSESSID" && $key != "bShowFilter" && $key != "pos" && $key != "direction" && $key != "sort"  && $key != "id"  && $key != "x"  && $key != "y")
				{
					$varname=explode("|",$key);
					$oFilter[$cnt][tablename] = $varname[0];
					$oFilter[$cnt][fieldname] = $varname[1];
					$oFilter[$cnt][fieldtype] = $varname[2];
					$oFilter[$cnt][value] = $value;
					$cnt++;
				}
			}
			return $oFilter;
		}

		/***********************************************************************************************
		*Function Header
		*Function Name  : viewCountryCodes
		*Function Type  : call by value
		*Functionality  : displays the list of country codes
		*Input			: NIL
		*Output			: displays the list of country codes
		*Return Value   : NIL
		*Note			: NIL
		*****************************************************************************************/
		function viewCountryCodes()
		{
			global $_CONF;
			$obAdminView = new AdminView();
			require_once $_CONF['LibPath']."maxmind/geoip.inc";
			$codes = new GeoIP();
			$obAdminView->viewCountryCodes($codes);
		}
		
		/***********************************************************************************************
		*Function Header
		*Function Name  : sendSystemEmail
		*Function Type  : call by value
		*Functionality  : get filter object to apply filter 
		*Input			: NIL
		*Output			: filters records as per criteria
		*Return Value   : NIL
		*Note			: NIL
		*****************************************************************************************/
		function sendSystemMail($dynamicInfo=array(),$mailInfo=array())
		{
			global $_CONF;
			$pattern = 	array('/%siteurl%/','/%firstname%/','/%lastname%/','/%emailaddress%/','/%username%/','/%password%/','/%newregions%/','/%newcategories%/','/%category%/','/%subcategory%/','/%buyername%/','/%buyercompany%/','/%buyerphone%/','/%buyeremail%/','/%buyeraddress1%/','/%buyeraddress2%/','/%buyertown%/','/%buyerpostalcode%/','/%buyercountry%/','/%buyertimeframe%/','/%buyerbudget%/','/%projectdetails%/','/%attachment%/','/%leadsreceived%/','/%maxleadsreceived%/','/%remainingleads%/','/%leadscredited%/','/%linktomultiplequotes%/','/%linktosavetime%/','/%linktoadvise%/','/%linktopurchasetoolscentre%/','/%promotionname%/','/%buyerfirstname%/','/%buyerlastname%/','/%frname%/','/%fremail%/','/%urcontents%/','/%urname%/','/%uremail%/','/%emailaddress%/','/%ques1%/','/%ques2%/','/%ques3%/','/%ques4%/','/%ques5%/','/%ques6%/','/%ans1%/','/%ans2%/','/%ans3%/','/%ans4%/','/%ans5%/','/%ans6%/');

			$replace = 	array($dynamicInfo["siteurl"],$dynamicInfo["user_firstname"],$dynamicInfo["user_lastname"],$dynamicInfo["email"],$dynamicInfo["email"],$dynamicInfo["password"],$dynamicInfo["newregions"],$dynamicInfo["newcategories"],$dynamicInfo["category"],$dynamicInfo["subcategory"],$dynamicInfo["buyername"],$dynamicInfo["buyercompany"],$dynamicInfo["buyerphone"],$dynamicInfo["buyeremail"],$dynamicInfo["buyeraddress1"],$dynamicInfo["buyeraddress2"],$dynamicInfo["buyertown"],$dynamicInfo["buyerpostalcode"],$dynamicInfo["buyercountry"],$dynamicInfo["buyertimeframe"],$dynamicInfo["buyerbudget"],$dynamicInfo["projectdetails"],$dynamicInfo["attachment"],$dynamicInfo["leadsreceived"],$dynamicInfo["maxleadsreceived"],$dynamicInfo["remainingleads"],$dynamicInfo["leadscredited"],$dynamicInfo["linktomultiplequotes"],$dynamicInfo["linktosavetime"],$dynamicInfo["linktoadvise"],$dynamicInfo["linktopurchasetoolscentre"],$dynamicInfo["promotionname"],$dynamicInfo["buyerfirstname"],$dynamicInfo["buyerlastname"],$dynamicInfo["fname"],$dynamicInfo["femail"],$dynamicInfo["urcontents"],$dynamicInfo["urname"],$dynamicInfo["uremail"],$dynamicInfo["emailaddress"],$dynamicInfo["ques1"],$dynamicInfo[ques2],$dynamicInfo[ques3],$dynamicInfo[ques4],$dynamicInfo[ques5],$dynamicInfo[ques6],$dynamicInfo[ans1],$dynamicInfo[ans2],$dynamicInfo[ans3],$dynamicInfo[ans4],$dynamicInfo[ans5],$dynamicInfo[ans6]);

			//create pattern
			$dynamicInfo['text'] = preg_replace($pattern,$replace,$dynamicInfo["text"]);
			
			//get mail subject
			$mailInfo['subject'] = $mailInfo['subject'];
			
			//get mail body
			$mailInfo['body']	=	$dynamicInfo['text'];
			$mailInfo['email'] = $dynamicInfo['email'];
			
			if(is_array($dynamicInfo['email']))
				return	SendMail($mailInfo['body'], $mailInfo['subject'], $dynamicInfo['email'],$_CONF['AdminMailFrom']);
			else
				return	SendMail($mailInfo['body'], $mailInfo['subject'], array($mailInfo['email']),$_CONF['AdminMailFrom']);
		}
		
		
		//changes
		/*************************************************************************************************
		*Function Header
		*Function Name  : petition_details
		*Function Type  : call by value
		*Functionality  : get petition notifivation details
		*Input			: nothing
		*Output			: changes the password
		*Return Value   : Boolean
		*Note			: nothing
		*********************************************************************************************/
		function petition_details($err="") {
			
			
			$search_field = '';
			$search_text = ''; 
			
			if(isset($_REQUEST['search_field']))
			{
				$search_field	=	$_REQUEST['search_field'];
				$search_text	=	$_REQUEST['search_text'];
			}
			
			if($_REQUEST['msg']==1){			
				$err="Account created successfully.";
			} 
			$oAM = new AuthenticationModel();
			$oAM->bPagingApplied 		=	true;
			$oAM->vPage['PageSize']	=	10;
		
			if(!empty($_REQUEST['sort'])) {					    							
				// defining sort field 
				$oAM->bSortingApplied 		= true;
				$oAM->vSort['Field']		= $_REQUEST['sort'];
				$oAM->vSort['Direction'] 	= $_REQUEST['direction'];
			} else {
			
				$oAM->bSortingApplied 		= true;
				$oAM->vSort['Field']		= 'id';
				$oAM->vSort['Direction'] 	= 1;
			}
			
			$oAM->vPage['CurrentPage'] 	=	(empty($_REQUEST['pos']) ? 0 : $_REQUEST['pos']);
			$petitions	=	$oAM->getPetitionDetails($search_field,$search_text);
			
			$_REQUEST['pos'] 			=	$oAM->vPage['CurrentPage'];
			
			$this->oView = new AdminView();			
			
			$this->oView->Petition		= &$petitions;
			$this->oView->vPage 		= $oAM->vPage;	
			$this->oView->sErrorMsg		= $err;
			$this->oView->petitionDetails();
		}//ef
	
	/////////////////////////
	}
?>