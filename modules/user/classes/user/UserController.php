<?php
	/*******************************************************************************************************
		* Author Name	: Anil Nautiyal
		* Creation Date : 27th May-2011
		* FileName 				: UserController.php
		* Called From 			: index.php and class inherited in all the user controller files of modules
		* Description 			: controls the front end display of the site and provide the basic skelton
								structure to the site
		* Components Used		: none
		* Tables Accessed 		: none
		* Program Specs 		:
		* UTP doc 				:
		* Tested By 			:
	*******************************************************************************************************/

	/*****************************************************************************************************
	mail/htmlMimeMail file is used to send mails
	*****************************************************************************************************/
	require_once $_CONF['LibPath']."mail/htmlMimeMail.php";
	
	/*****************************************************************************************************
	mail/htmlMimeMail file is used to send mails
	*****************************************************************************************************/
	require_once $_CONF['LibPath']."mail/SendEmail.php";
	
	/*****************************************************************************************************
	mail/htmlMimeMail file is used to include common functions required
	*****************************************************************************************************/
	require_once $_CONF['ModulesPath']."system/functions.php";

	
	/*****************************************************************************************************
	members/classes/MembersModel.php file is used to check if authentication is required for the link to access or not
	*****************************************************************************************************/
	require_once($_CONF['ModulesPath'].'user/classes/UserModel.php');
	require_once($_CONF['ModulesPath'].'accession/classes/AccessionModel.php');
	
	
	/*****************************************************************************************************
		members/classes/EmailsModel.php file is used to check if authentication is required for the link to access or not
	*****************************************************************************************************/
  	require_once($_CONF['ModulesPath'].'user/classes/user/UserView.php');
	
	class Collection{
	
	}
	/*****************************************************************************************************
	*Class Header
	*Class Name    : UserController
	*Functionality : This class controls how the module functions will be invoked on the basis of stage and mode provided
					 variables used
	*Note          : UserController inherits Controller which uses the stage and mode variables
	*****************************************************************************************************/
	class UserController extends Controller{
	
		var $breadcrumbs;
		
		function UserController(){
			global $_CONF;
			session_start();
			parent::Controller();
			$oCollection= new Collection;
			$this->UModel= new User();
			$this->obUserView 			= 	new UserView();	
			
			$this->aModel	= new AccessionModel();			
			$this->aModel->checkAccessPermission();
			
		}

		/***********************************************************************************************
		*Function Header
		*Function Name  : RunApplication
		*Function Type  : call by value
		*Functionality  : calls the method on the object(class instance). if methoddoes not exists displays the appropriate message
		*Input			: NIL
		*Output			: calls the required function
		*Return Value   : NIL
		*Note			: NIL
		***********************************************************************************************/

		function RunApplication(){
			//check required authentication
			
			//echo "<pre>";
			//print_r($_REQUEST);
			
			if($_REQUEST[n_id])
			{
				$isAuthenticationRequired = $oNavigationModel->isAuthenticationRequired(array($_REQUEST[n_id]));
				if($isAuthenticationRequired && !isset($_SESSION[member_id]))
					$this->UserAuthenticate();
			}
			 $method = $this->mode;
			if(method_exists($this,$method)) $this->$method();
			else
				die("Invalid Method Invoked");
		}




		/***********************************************************************************************
		*Function Header
		*Function Name  : breadcrumbs
		*Function Type  : call by value
		*Functionality  : used to display breadcrums
		*Input			: NIL
		*Output			: display breadcrums
		*Return Value   : NIL
		*Note			: NIL
		***********************************************************************************************/

		function breadcrumbs(){
			global $_CONF;
			if(isset($_REQUEST['pid']))
			{
		    $link="index.php?stage=".$_REQUEST['stage']."&mode=".$_REQUEST['mode']."&pid=".$_REQUEST['pid'];
			}
			else{
		    $link="index.php?stage=".$_REQUEST['stage']."&mode=".$_REQUEST['mode'];
			}
			$this->UModel= new User();
			if($link !='')
			{
			$rs=$this->UModel->getBreadCrumbs($link);

			$parent_id=$rs[0]->parent_id;
			$current_page=$rs[0]->page_title;
			while($parent_id > 1)
			{
			$rs=$this->UModel->getFromParent($parent_id);
			
			if($_REQUEST['mode'] == "ViewJobPostings" || $_REQUEST['mode'] == "ListJobs" || $_REQUEST['mode'] == "JobDetails")
			{
				if($_SESSION['member_id'] == "")
				{
					if($rs[0]->page_title == "My Bohire")
					{
						$rs[0]->page_title = "Home";
						$rs[0]->page_link = "index.php";
						$rs[0]->parent_id = "";
					}
				}
			}
			if($_REQUEST['mode'] == "signup" &&  $_REQUEST['stage'] == "jobseeker")
			{
				if($_SESSION['member_id'] == "")
				{
					if($rs[0]->page_title == "My Bohire")
					{
						$rs[0]->page_title = "Home";
						$rs[0]->page_link = "index.php";
						$rs[0]->parent_id = "";
					}
				}
			}
			if($_REQUEST['mode'] == "ViewJobPostings" )
			{
				if($_SESSION['member_id'] == "")
				{
					if($rs[0]->page_title == "Home")
					{
						$rs[0]->page_title = "Home";
						$rs[0]->page_link = "index.php";
						$rs[0]->parent_id = "";
					}
				}
			}
			if($_REQUEST['mode1'] == "jobseeker")
			{
				if($_SESSION['member_id'] != "")
				{
					if($rs[0]->page_title == "My Bohire")
					{
						$rs[0]->page_title = "My Bohire";
						$rs[0]->page_link = "index.php?stage=jobseeker&mode=MyBohire";
					}
				}
			}
			if($_SESSION['member_type']=='js')
			{
				if($rs[0]->page_title == "My Bohire")
					{
						$rs[0]->page_title = "My Bohire";
						$rs[0]->page_link = "index.php?stage=jobseeker&mode=MyBohire";
					}
			}
			if($_SESSION['member_id'] != "")
			{
				if($rs[0]->page_title == "Select Your Account" && $_SESSION['bothAccounts'] != 1)
				{
					$rs[0]->page_title = "Home";
					$rs[0]->page_link = "index.php";
					$rs[0]->parent_id = "";
				}
			}
			
			if($_SESSION['member_id'] != "")
			{
				if($rs[0]->page_title == "My Bohire" && $_SESSION['bothAccounts'] != 1)
				{
					$rs[0]->parent_id = "";
				}
			}
			
			if($_REQUEST['mode1'] == "jobseeker")
			{
				if($_SESSION['member_id'] != "")
				{
					if($rs[0]->page_title == "Job Postings")
					{
						$rs[0]->page_title = "Job Postings";
						$rs[0]->page_link = "index.php?stage=referrer&mode=ViewJobPostings&mode1=jobseeker";
					}
				}
			}
			$breadcrumbArray[]= $rs[0]->page_title;
			$breadcrumbLink[] =$rs[0]->page_link;
			$parent_id= $rs[0]->parent_id;
			}
			
		    for( $i= (count($breadcrumbArray)-1); $i>=0; $i--)
			{
			 $breadcrumbs.= "<span class='arial12NB000000'><a class='arial11b000000_b' href='".$breadcrumbLink[$i]."'>".$breadcrumbArray[$i]."</a></span> <span class='arrow'>&raquo;</span> ";
			}
			
			// $_SESSION['Session_Previous_Page']	=	$_SERVER['PHP_SELF'] . "?" . $_SERVER['QUERY_STRING'];
			
			$backUrl =  $_SERVER[HTTP_REFERER];
			$strArr = explode("&",$backUrl);
			$strArr1 = explode("=",$strArr[1]);
		

			$currentUrlMode = explode("&",$_SERVER['QUERY_STRING']);
			$currentUrlMode1 = explode("=",$currentUrlMode[1]);
			
			if(in_array("HotPost",$strArr1) && in_array("login",$currentUrlMode1))
			{
				$breadcrumbs.= "<span class='arial12NB000000'><a class='arial11b000000_b' href='".$backUrl."'>Job Details</a></span> <span class='arrow'>&raquo;</span> ";
			}

		   $breadcrumbs.= "<span class='arial12NBF26722'>".$current_page."</span>" ;
		   }else
		   {
		   $breadcrumbs="Home";
		   }
		  
		   return $breadcrumbs;
		}
				function html2txt($document){
		$search = array('@<script[^>]*?>.*?</script>@si',  // Strip out javascript
					   '@<style[^>]*?>.*?</style>@siU',    // Strip style tags properly
					   '@<[\/\!]*?[^<>]*?>@si',            // Strip out HTML tags
					   '@<![\s\S]*?--[ \t\n\r]*>@'        // Strip multi-line comments including CDATA
		
		);
		
		$search = array('@<[\/\!]*?[^<>]*?>@si');
		$text = preg_replace($search, '', $document);
		return $text;
		}
		/***************************************************************************************
		*Function Header
		*Function Name  : homePage
		*Function Type  : call by value	
		*Functionality  : creates a home page view
		*Input			: nothing
		*Output			: home page generation
		*Return Value   : nothing
		*Note			: nothing
		****************************************************************************************/

		function homePage($sErrorMessage="")
		{ 
			global $_CONF;
			if($sErrorMessage != "")
			{	
				$this->obUserView->sErrorMessage	=	$sErrorMessage;
			}
			
			if(isset($_SESSION['User Registration']['Register']['View'])) 
			{			
				$this->obUserView->user_registration_register_view = $_SESSION['User Registration']['Register']['View'];
			}
			
		
			$this->obUserView->homePage($sErrorMessage);
		}
				
		/***********************************************************************************************
		*Function Header
		*Function Name  : EmailAuthenticate
		*Function Type  : call by value
		*Functionality  : aauthenticates user and checks whether the user exists in database and not deleted by the user. also captures the previous url if login is required and redirects to that page after login
		*Input			: NIL
		*Output			: authenicates the user
		*Return Value   : NIL
		*Note			: NIL
		*****************************************************************************************/

		function EmailAuthenticate(){
			if(!$_SESSION['email'])
			{
				//$_SESSION['Session_Previous_Page']	=	$_SERVER['PHP_SELF'] . "?" . $_SERVER['QUERY_STRING'];
				echo "<script>location.href=\"index.php?stage=member&mode=login&i=1\"</script>";
				die();
			}
			
		}
		
		
		/***********************************************************************************************
		*Function Header
		*Function Name  : UserAuthenticate
		*Function Type  : call by value
		*Functionality  : aauthenticates user and checks whether the user exists in database and not deleted by the user. also captures the previous url if login is required and redirects to that page after login
		*Input			: NIL
		*Output			: authenicates the user
		*Return Value   : NIL
		*Note			: NIL
		*****************************************************************************************/

		function UserAuthenticate($job_id=""){
			if(!$_SESSION['member_id'])
			{
				//$_SESSION['Session_Previous_Page']	=	$_SERVER['PHP_SELF'] . "?" . $_SERVER['QUERY_STRING'];
				if($job_id != "") {
					echo "<script>location.href=\"index.php?stage=member&mode=login&id=$job_id\"</script>";
				} else {
					echo "<script>location.href=\"index.php?stage=member&mode=login&i=1\"</script>";
				}
				die();
			}
		}
		/***********************************************************************************************
		*Function Header
		*Function Name  : JobSeekerAuthenticate
		*Function Type  : call by value
		*Functionality  : aauthenticates user and checks whether the user exists in database and not deleted by the user. also captures the previous url if login is required and redirects to that page after login
		*Input			: NIL
		*Output			: authenicates the user
		*Return Value   : NIL
		*Note			: NIL
		*****************************************************************************************/

		function JobSeekerAuthenticate(){
	
			if(!$_SESSION['jobseeker_id'])
			{
				//$_SESSION['Session_Previous_Page']	=	$_SERVER['PHP_SELF'] . "?" . $_SERVER['QUERY_STRING'];
				echo "<script>location.href=\"index.php?stage=jobseeker&mode=login&i=1\"</script>";
				die();
			}
			
		}
		
		
		/***********************************************************************************************
		*Function Header
		*Function Name  : EmployerAuthenticate
		*Function Type  : call by value
		*Functionality  : Checks whether employer is login or not. also captures the previous url if login is required and redirects to that page after login
		*Input			: NIL
		*Output			: authenicates the user
		*Return Value   : NIL
		*Note			: NIL
		*****************************************************************************************/

		function EmployerAuthenticate(){
			
			if($_SESSION['member_id'] =='')
			{
			//	echo "<pre>";
				//print_r($_SERVER);exit;
				//$_SESSION['Session_Previous_Page']	=	$_SERVER['PHP_SELF'] . "?" . $_SERVER['QUERY_STRING'];
				//added nidhi pasricha on 9th march 2009
				$_SESSION['Session_New_Page'] 	=	$_SERVER['PHP_SELF'] . "?" . $_SERVER['QUERY_STRING'];
				echo "<script>location.href=\"index.php?stage=member&mode=login\"</script>";
				die();
			}
			
		}
		/***********************************************************************************************
		*Function Header
		*Function Name  : UserAuthenticate1
		*Function Type  : call by value
		*Functionality  : Checks whether user is login or not. Also captures the previous url if login is required and redirects to that page after login
		*Input			: NIL
		*Output			: authenicates the user
		*Return Value   : NIL
		*Note			: NIL
		*****************************************************************************************/
		function UserAuthenticate1($return_path=''){
			$flag=0;
			
			if(strlen(trim($return_path))>0)
			{
				$return_path_array = explode("&", $return_path);
				if(strtolower($return_path_array[1]) == "mode=jobdetails") 
				{
					$_SESSION['Session_Previous_Page']=$return_path;
					$_SESSION['check_employer']='yes';
					$flag=1;
				}
				//hotpost
				
				if(strtolower($return_path_array[1]) == "mode=hotpost") 
				{
					$_SESSION['Session_Previous_Page']=$return_path;
					$_SESSION['check_employer']='yes';
					$flag=1;
				}
			}
			if(!$_SESSION['member_id'])
			{
				if($flag==0)
				{
					$_SESSION['Session_Previous_Page']	=	$_SERVER['PHP_SELF'] . "?" . $_SERVER['QUERY_STRING'];
				}
				echo "<script>location.href=\"index.php?stage=member&mode=login\"</script>";
				die();
			}
			
		}
		/***********************************************************************************************
		*Function Header
		*Function Name  : UserAuthentication
		*Function Type  : call by value
		*Functionality  : Checks whether user is login or not. Also captures the previous url if login is required and redirects to that page after login
		*Input			: NIL
		*Output			: authenicates the user
		*Return Value   : NIL
		*Note			: NIL
		*****************************************************************************************/
		function UserAuthentication()
			{
			
			if(!$_SESSION['member_id'])
			{
				$_SESSION['isRedirect'] = "yes";
				$_SESSION['Session_Previous_Page']	=	$_SERVER['PHP_SELF'] . "?" . $_SERVER['QUERY_STRING'];
				echo "<script>location.href=\"index.php?stage=member&mode=login\"</script>";
				die();
			}
			
		}

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
			$cnt=0;
			foreach($_REQUEST as $key=>$value)
			{
				if($key != "stage" && $key != "mode"  && $key != "PHPSESSID" && $key != "bShowFilter" && $key != "pos" && $key != "direction" && $key != "sort"  && $key != "id" && $key != "x"  && $key != "y")
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
			//replace email contents
			$pattern = 
			
			array('/%email%/','/%siteurl%/','/%firstname%/');
		

			$replace = 
			array($dynamicInfo["email"],$dynamicInfo["siteurl"],ucfirst($dynamicInfo["user_firstname"]));

			$dynamicInfo['text'] = preg_replace($pattern,$replace,$dynamicInfo["text"]);
			$mailInfo['subject'] = $mailInfo['subject'];
			$mailInfo['body']	=	$dynamicInfo['text'];
			$mailInfo['email'] = $dynamicInfo['email'];

			$_CONF['AdminMailFrom'];
			return SendMail($mailInfo['body'], $mailInfo['subject'], array($mailInfo['email']),$_CONF['AdminMailFrom']);
		}

		/*********************************************************************************************
		*Function Header
		*Function Name  : displayContactUs
		*Function Type  : call by value
		*Functionality  : displays the contact us form
		*Input			: member details if clicked on edit
		*Output			: nothing
		*Return Value   : nothing
		*Note			: nothing
		**********************************************************************************************/

		function contact($oMember)
		{
			global $_CONF;
			$obUserView = new UserView();
			
			$this->obUserView->SNavigation = "Contact Us";
			$this->obUserView->setLeftPanel = true;
			$this->obUserView->setRightPanel = true;
			$this->obUserView->showNavigation = true;
			$this->obUserView->showHomePageBanner = false;
			$this->obUserView->showAdditionalFooterLinks = false;
			$this->obUserView->leftPlain = true;
			$this->obUserView->displayGeneralLinks = true;
			$this->obUserView->displayBuyerGuide = true;
			$this->obUserView->displayBuyerGuideCategories = true;
			$this->obUserView->displayPurchasingAdvice = true;
			$this->obUserView->displayRequestFreeQuote = true;
			
			$this->obUserView->oMember = $oBuyer;
			$this->obUserView->showContactScreen();
		}

		/*************************************************************************************************
		*Function Header
		*Function Name  : sendContactMail
		*Function Type  : call by value	
		*Functionality  : send the contact mail to admin and the copies to self if selected
		*Input			: nothing
		*Output			: send the contact mail to admin and the copies to self if selected
		*Return Value   : nothing
		*Note			: nothing
		*********************************************************************************************/

		function sendContactMail()
		{
			global $_CONF;
			$obUserView = new UserView();
			if(isset($_REQUEST['posText']))
			{
				//send email
				$subject = 'Buyguide online Contact Mail: '.$this->cleanPosUrl($_POST['posRegard']);
				$message = $this->cleanPosUrl($_POST['posText']);

				$dynamicInfo['email']	=	$_CONF[AdminMailFrom];
				$dynamicInfo['user_lastname']=	$_POST['posName'];
				$dynamicInfo['siteurl']=	$_CONF[SiteUrl];

				$dynamicInfo['text'] = $message;
				$mailInfo['subject'] = $subject;
				$mailInfo['body']	=	$dynamicInfo['text'];
				$mailit		=	$this->sendSystemMail($dynamicInfo,$mailInfo);
				
				
				//end sending mail
				if ($mailit )
				{ $posStatus = true; $posConfirmation = 'Your Email has been sent.'; }
					else
					{ $posStatus = false; $posConfirmation = 'Your Email could not be sent. Please try after some time.'; }
					
					if ( $_POST['selfCC'] == 'send' )
					{
						$ccEmail = $this->cleanPosUrl($_POST['posEmail']);
						$dynamicInfo['email']	=	$ccEmail;
						$result		=	$this->sendSystemMail($dynamicInfo,$mailInfo);
					}

					//thanks mail to contacting person
					$dynamicInfo['email']	= $_POST['posEmail'];
					$dynamicInfo['siteurl']=	$_CONF[SiteUrl];
					$oMailMsg = new EmailsModel();
					$OEmail = $oMailMsg->getEmailsList(array(THANKS_FOR_CONTACTING));
					if($OEmail[0]->active)
					{
						$dynamicInfo['text'] = stripslashes($OEmail[0]->email_contents);
						$mailInfo['subject'] = $OEmail[0]->email_subject;
						$mailInfo['body']	=	$dynamicInfo['text'];
						$result		=	$this->sendSystemMail($dynamicInfo,$mailInfo);
					}
					//end sending thankyou mail to contacting person
			}
			$this->obUserView->SNavigation = "Contact Us";
			$this->obUserView->setLeftPanel = true;
			$this->obUserView->setRightPanel = false;
			$this->obUserView->showNavigation = true;
			$this->obUserView->showHomePageBanner = false;
			$this->obUserView->showAdditionalFooterLinks = false;
			$this->obUserView->leftPlain = true;
			$this->obUserView->displayGeneralLinks = true;
			$this->obUserView->displayBuyerGuide = false;
			$this->obUserView->displayBuyerGuideCategories = false;
			$this->obUserView->displayPurchasingAdvice = false;
			$this->obUserView->displayRequestFreeQuote = false;
			if($posStatus)
				$this->obUserView->SErrorMsg = "Email sent successfully.";
			else
				$this->obUserView->SErrorMsg = "Error sending mail. Please try later.";
				$this->obUserView->showContactScreen();
		}
		/*************************************************************************************************
		*Function Header
		*Function Name  : cleanPosUrl
		*Function Type  : call by value	
		*Functionality  : filters the mail contents
		*Input			: nothing
		*Output			: filters the mail contents
		*Return Value   : nothing
		*Note			: nothing
		*********************************************************************************************/
		function cleanPosUrl($str) 
		{
			$nStr = $str;
			$nStr = str_replace("**am**","&",$nStr);
			$nStr = str_replace("**pl**","+",$nStr);
			$nStr = str_replace("**eq**","=",$nStr);
			return stripslashes($nStr);
		}



	}//ec
?>