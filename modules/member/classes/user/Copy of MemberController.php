<?php
	/*****************************************************************************************
		* Author Name 		: Sandeep Singla
		* Creation Date		: 21 May-2007
		* FileName			: MemberController.php	
		* Called From 		: index.php file.
		* Description		: MemberController file is used to control the MemberModel and MemberView files,
							  it passes control according to the operation required.
		* Components Used 	: Validation for server side validations
		* Tables Accessed 	: none
		* Program Specs 	:     
		* UTP doc 			:
		* Tested By 		:  
	********************************************************************************************/
	
	require_once($_CONF['ModulesPath'].'member/classes/MemberModel.php');	//contains constants that are used in this module
	
	require_once($_CONF['ModulesPath'].'subscriber/classes/SubscriberModel.php');	
	require_once($_CONF['ModulesPath'].'affiliates/classes/AffiliatesModel.php');	
	
	require_once($_CONF['ModulesPath'].'system/classes/Validation.php');	//contains validation functions
	
	require_once($_CONF['ModulesPath'].'system/functions.php');											    

	//contains some common data classes 
	require_once($_CONF['ModulesPath'].'system/classes/dataclasses.php');								    
	
	/***************************************************************
	*Class Header
	*Class Name    : MemberController
	*Functionality : This class controls MemberModel and MemberView
					 to handle members on the site.
	*Note          : memberController inherits UserController that 
 	                contains functions for the user site.
	***************************************************************/

	class MemberController extends UserController
	{
		var $oModel;
		
		/***************************************************************************************
		*Function Header
		*Function Name  : MemberController
		*Function Type  : Constructor	
		*Functionality  : Initializes objects of different classes 
		*Input			: nothing
		*Output			: Class objects
		*Return Value   : nothing
		*Note			: nothing
		****************************************************************************************/
		function MemberController()
		{
			parent::UserController();
			$this->oModel	= new MemberModel();
			$this->sModel	= new SubscriberModel();
			$this->affModel	= new AffiliatesModel();
			
			$this->oView	= new MemberView();	
		}

			
		/******************************************************************************************
			*Function Header
			*Function Name  : loginform
			*Function Type  : Call by value	
			*Functionality  : Creates a new login form using MemberView class
			*Input			: member object with default value blank or if filled will automatically 
							  fill the form with values.Other parameter is error message object which
							  has default value of blank.
			*Output			: passes member object to loginform function in memberview class that 
							  generates form.
			*Return Value   : nothing
			*Note			: $sErrorMessage will contaion the error message.
		*******************************************************************************************/
		
		function loginform($oMember = "", $sErrorMessage = "")
		{
		
			if(!empty($sErrorMessage))
			{
				$this->oView->SErrorMsg = $sErrorMessage;
			}
			
			if(is_object($oMember))
			{
				$this->oView->loginform($oMember);
			}
			else
			{
				$oMember	=	new Member();				
				$this->oView->loginform($oMember);
			}
		}
		/******************************************************************************************
			*Function Header
			*Function Name  : login
			*Function Type  : Call by value	
			*Functionality  : provides login functionality to the user
			*Input			: member object
			*Output			: passes member object to loginform function in memberview class that 
							  generates form.
			*Return Value   : nothing
			*Note			: $sErrorMessage will contaion the error message.
		*******************************************************************************************/
		function login($oMember = "", $sErrorMessage = "")
		{	
			//echo "<pre>";
			//print_r($_REQUEST);
			//die();
			
			if(isset($_REQUEST['article_id']))
			{	
				$this->oView->article_id 	=  trim($_REQUEST['article_id']);
			} else {
				$this->oView->article_id 	=  "";
			}
			
			//exit;
			if(!empty($sErrorMessage)) {
				
				$sErrorMessage = $sErrorMessage;
			} elseif(isset($_REQUEST['sErrorMessage'])) {
				
				if(trim($_REQUEST['sErrorMessage']) != "") {
					
					$sErrorMessage = trim($_REQUEST['sErrorMessage']);
				}				
			}
			
			if(is_object($oMember)) {
			
				$this->oView->login($oMember,$sErrorMessage);
			} else {
			
				$oMember	=	new Member();	
				$this->oView->login($oMember,$sErrorMessage);
			}
		} //end of function 


		
		/*
		**************************************************************************************
		*Function Header
		*Function Name  : memberlogout
		*Function Type  : call by value
		*Functionality  : called when user clicks on 'logout' link, it cleares session variables
					  and redirect the user to home page.
		*Input			: nothing
		*Output			: logs out the user and shows login form again
		*Return Value   : nothing
		*Note			: nothing
		***************************************************************************************
		*/
		function memberlogout()
		{			
			$current_time	=	time();			
			foreach($_SESSION as $key=>$value)
			{
				unset($_SESSION['$key']);
			}

			// If it's desired to kill the session, also delete the session cookie.
			// Note: This will destroy the session, and not just the session data!
			if (isset($_COOKIE[session_name()])) {
				setcookie(session_name(), '', time()-42000, '/');
			}
			
			session_destroy();
			$oMember		=	"";
			$sErrorMessage	=	"You have successfully logged out.";		
			echo "<script>location.href='index.php?stage=member&mode=login&sErrorMessage=".$sErrorMessage."'</script>";
			//$this->loginform($oMember, $sErrorMessage);
			///index.php?stage=member&mode=login
		}		
		
		
		/***************************************************************************************
		*Function Header
		*Function Name  : GetInside
		*Function Type  : call by value
		*Functionality  : authenticate user for login
		*Input			: nothing
		*Output			: logs in user if valid email id and password is provided
		*Return Value   : nothing
		*Note			: nothing
		****************************************************************************************/
		function GetInside()
		{
			//logged out admin if it is already loggedin
		
			if($_POST['remember'] == 1)
			{
				unset($_COOKIE['username']);
				unset($_COOKIE['remember']);
				
				setcookie("username",$_POST['username'],time()+60*60*24*15);
				setcookie("remember",$_POST['remember'],time()+60*60*24*15);
				
				$_COOKIE['username'] = $_POST['username'];
				$_COOKIE['remember'] = $_POST['remember'];
				
			} else {
				setcookie("username","",time()+0);
				setcookie("remember"," ",time()+0);
				
				$_COOKIE['username'] = "";
				$_COOKIE['remember'] = "";
			}
			
			$oMember			=	new Member();					
			$oMember->username	=	trim($_POST['username']);			
			$oMember->password	=	trim($_POST['password']);

			
			if($oMember->username == "")
			{
				$sErrorMessage	=	"Please enter Username.";
				$_REQUEST['mode']	=	'homepage';
				$this->homePage($sErrorMessage);
				die();
			}
			
			if($oMember->password=="")
			{
				$sErrorMessage	=	"Please enter Password.";
				$_REQUEST['mode']	=	'homepage';
				$this->homePage($sErrorMessage);
				die();
			}
			
			$oMember->password	=	md5($oMember->password);
			
			//print_r($oMember);
			//echo "<br>";
			$oMember	=	$this->oModel->isValidUser($oMember);
			//print_r($oMember);
			//die();
			//$oMember	= $oMember[0]; 
				
			if($oMember->member_type != "")
			{
				if($oMember->status == 1) {
					if($oMember->member_type	==	"observer")
					{
						$_SESSION['username']		=	$oMember->user_name;
						$_SESSION['member_type']	=	"observer";
						
						if(isset($_POST['article_id'])) {
							
							if(trim($_POST['article_id']) != "") {
							
								$myAffiliateArticles = array();
								$article_id = trim($_POST['article_id']);
								$myAffiliateArticles = $this->affModel->getArticleDetailOneTime($article_id);
								if(isset($myAffiliateArticles[0]['article_id']) && isset($myAffiliateArticles[0]['affiliate_id'])) {
									 
									$article_id = $myAffiliateArticles[0]['article_id'];
									$affiliate_id = $myAffiliateArticles[0]['affiliate_id'];
								
									echo "<script>location.href=\"index.php?stage=subscriber&mode=petitionsDetail&affID=$affiliate_id&id=$article_id\"</script>";
								} else {
									
									//echo "<script>location.href=\"index.php?stage=subscriber&mode=MemberDashboard\"</script>";
									echo "<script>location.href=\"index.php?stage=affiliates&mode=listaffiliates\"</script>";
									
								} 
							} else {
								//echo "<script>location.href=\"index.php?stage=subscriber&mode=MemberDashboard\"</script>";
								echo "<script>location.href=\"index.php?stage=affiliates&mode=listaffiliates\"</script>";
								
							}
						} else {
							// echo "<script>location.href=\"index.php?stage=subscriber&mode=MemberDashboard\"</script>";							
							echo "<script>location.href=\"index.php?stage=affiliates&mode=listaffiliates\"</script>";							
						}
												
						die();
					} else if($oMember->member_type	==	"subscriber") {
						
						//die($oMember->username);
						$_SESSION['username']		=	$oMember->user_name;
						$_SESSION['member_type']	=	"subscriber";
				
						
						if(isset($_POST['article_id'])) {
							
							if(trim($_POST['article_id']) != "") {
							
								$myAffiliateArticles = array();
								$article_id = trim($_POST['article_id']);
								$myAffiliateArticles = $this->affModel->getArticleDetailOneTime($article_id);
								if(isset($myAffiliateArticles[0]['article_id']) && isset($myAffiliateArticles[0]['affiliate_id'])) {
									 
									$article_id = $myAffiliateArticles[0]['article_id'];
									$affiliate_id = $myAffiliateArticles[0]['affiliate_id'];
								
									echo "<script>location.href=\"index.php?stage=subscriber&mode=petitionsDetail&affID=$affiliate_id&id=$article_id\"</script>";
								} else {
									
									echo "<script>location.href=\"index.php?stage=subscriber&mode=MemberDashboard\"</script>";
								} 
							} else {
							
								echo "<script>location.href=\"index.php?stage=subscriber&mode=MemberDashboard\"</script>";
							}
						} else {
							echo "<script>location.href=\"index.php?stage=subscriber&mode=MemberDashboard\"</script>";							
						}
						die();					
					} else if($oMember->member_type	==	"affiliate") {
						
						//die($oMember->username);
						$_SESSION['username']	 	=	$oMember->user_name;
						$_SESSION['member_type']	=	"affiliate";
						echo "<script>location.href=\"index.php?stage=affiliates&mode=AffiliateDashboard\"</script>";
						die();					
					} else if($oMember->member_type	==	"elected_official") {
						
						//die($oMember->username);
						$_SESSION['username']	 	=	$oMember->user_name;
						$_SESSION['member_type']	=	"elected_official";
						echo "<script>location.href=\"index.php?stage=electedrepresentative&mode=electedrepresentativedashboard\"</script>";
						die();					
					} else {
					
						die("In progress");
					}
				} elseif($oMember->status != 2) {
				
					$sErrorMessage	=	"Your Account is deactivated by admin.";
					$_REQUEST['mode']	=	'homepage';
					$this->homePage($sErrorMessage);
					die();
				} elseif ($oMember->status != 3) {
					
					$sErrorMessage	=	"Your account has been deleted by admin.";
					$_REQUEST['mode']	=	'homepage';
					$this->homePage($sErrorMessage);
					die();
				}					
			} else {
				
				$sErrorMessage	=	"Invalid Username / Password.";
				$_REQUEST['mode']	=	'homepage';
				$this->homePage($sErrorMessage);
				die();
			}
		}
		
		
		/******************************************************************************************
			*Function Header
			*Function Name  : contactAdmin
			*Function Type  : Call by value	
			*Functionality  : Asked a member to contact admin if the user account is suspended by admin
			*Input			: nothing
			*Output			: nothing.
			*Return Value   : nothing
			*Note			: 
		*******************************************************************************************/
		function contactAdmin()
		{
			$this->oView->contactAdmin();
		}

		/*
		*****************************************************************************************
		*Function Header
		*Function Name  : forgotPassword
		*Function Type  : Call by value	
		*Functionality  : Asked a member to contact admin if the user account is suspended by admin
		*Input			: nothing
		*Output			: nothing.
		*Return Value   : nothing
		*Note			: 
		******************************************************************************************\
		*/
		function forgotPassword()
		{
			$this->oView->forgotPassword();
		}


		/*
		*****************************************************************************************
		*Function Header
		*Function Name  : sendPassword
		*Function Type  : Call by value	
		*Functionality  : Asked a member to contact admin if the user account is suspended by admin
		*Input			: nothing
		*Output			: nothing.
		*Return Value   : nothing
		*Note			: 
		******************************************************************************************\
		*/
		function sendPassword()
		{
			global $_CONF;
			
			$sendInMail		=	generateRandStr();
			$sendInDatabase	=	md5($sendInMail);		
			$email			=	$_POST['email'];
			
			if($_POST['email']=='')
			{
				$this->oView->SErrorMsg	= "Please Enter the Email.";
				$this->oView->forgotPassword();
				exit;
			}
			if(!($member=$this->oModel->checkUserExists($email)))
			{
				$this->oView->SErrorMsg	= "Email \"$email\" does not exist.";
				$this->oView->forgotPassword();
				exit;
			} 
			else
			{
				if($this->oModel->UpdatePassword($sendInDatabase,$email))
				{
					
					$username	=	$this->oModel->getUserName($email);
					$loginname	=	$this->oModel->getLoginName($email);
					
					$sUserName	=	$username;
					$sLoginName	=	$loginname;
					
					$email		=	$email;
					$sPassword 	=	$sendInMail;
					
					$link	=	"<a href='".$_CONF['SiteUrl']."/index.php'>login</a>";
					$oEmail	=	$this->oModel->GetEmail(2);
					
					$dynamicInfo	=	array($sUserName,$sLoginName,$sPassword,$link);
					$staticInfo 	=	array('(sUserName)','(sLoginName)','(sPassword)','(sLink)');
					
					$body		=	stripslashes(html_entity_decode($oEmail[0]->content));
					$newbody 	=	str_replace($staticInfo,$dynamicInfo,$body);
					$text		=	CreateMailMessage($newbody);
					$subject	=	stripslashes(html_entity_decode($oEmail[0]->subject));
					$result		=	SendMail($text[body], $subject, array($email),$_CONF['adminEmail']);
				}

				if($result)
				{
					$this->oView->SErrorMsg	= "Your Password has been sent to your email " . $email." <a href='index.php'>click here</a>&nbsp;&nbsp;to go home page.";
					$this->forgotPassword();
				}
				else
				{
					$this->oView->SErrorMsg	= "There is some technical problem in sending password email.<br>Please try later.";
					$this->forgotPassword();
				}
			}
		}
		

		/*
		**************************************************************************************
		*Function Header
		*Function Name  : RedirectLogin
		*Function Type  : Call by value	
		*Functionality  : Fecilitate the user to redirect and displays the message
		*Input			: nothing
		*Output			: nothing.
		*Return Value   : nothing
		*Note			: nothing
		***************************************************************************************
		*/
		function RedirectLogin()
		{
			if(isset($_REQUEST['msg']))
			{
				if($_REQUEST['msg']==1)
				{
					$sErrorMessage="Your account is already active.";
				} elseif($_REQUEST['msg']==2)
				{
					$sErrorMessage="Your account has been successfully activated.";
				} else{
				}
				$this->login($oMember = "", $sErrorMessage);
			}
		}//ef
		
		
		 /*
		**************************************************************************************
		*Function Header
		*Function Name  : castYourVote
		*Function Type  : Call by value	
		*Functionality  : cast user vote  
		*Input			: nothing
		*Output			: nothing.
		*Return Value   : nothing
		*Note			: nothing
		***************************************************************************************
		*/
		function castYourVote()
		{		
			$message = 'Error in casting vote.';
			
			if( isset($_REQUEST['articleID']) && isset($_REQUEST['status']) )
			{
				$articleID 	= $_REQUEST['articleID'];
				$status		= $_REQUEST['status'];
				 					 					
				
				$vote_status	=	$this->oModel->getVoteStatus( $_SESSION['username'], $articleID);
				## article Detail
				## affiliate Detail
				
				## No vote is already casted
				if($vote_status == 'NA')
				{
					$message = 'Vote casted successfully'; 										
						## send mail to elected official 
						
						
					if($this->oModel->memberVote( $_SESSION['username'], $articleID, $status))
					{
						$message = 'Vote casted successfully'; 										
						## send mail to elected official 
						$member_id 	 = $this->oModel->getMemberID();												
						$senatorData = $this->oModel->getElectedSenator($member_id);						
						
						## get Article Details
						$billName  		= $this->oModel->getArticleDetails($articleID); 
						$subscriberName	= $this->oModel->getNameLoginUser();
						
						foreach($senatorData as $senator) 
						{
							
							$senatorName 	= $senator["First_Name"] . " " . $senator["Last_Name"] ;
							$email			= $senator["EMail1"];							
							
							if( $status == "support" )
								$opinion = "in favor of";
							else
								$opinion = "against";							
							
							$oEmail			=	$this->oModel->GetEmail(55);							
							$dynamicInfo	=	array($senatorName,$subscriberName,$opinion,$billName);
							$staticInfo 	=	array('(senatorName)','(subscriberName)','(opinion)','(billName)');
							
							$body		=	stripslashes(html_entity_decode($oEmail[0]->content));
							$newbody 	=	str_replace($staticInfo,$dynamicInfo,$body);
							$text		=	CreateMailMessage($newbody);
							$subject	=	stripslashes(html_entity_decode($oEmail[0]->subject));
							
							$result		=	SendMail($text[body], $subject, array($email),$_CONF['adminEmail']);
						}						
					}	
				}				
			}
			
			header("location:index.php?stage=subscriber&mode=VoteAlertsDetail&id=".$articleID);		
						
		}//ef
		
		 /*
		**************************************************************************************
		*Function Header
		*Function Name  : signPetition
		*Function Type  : Call by value	
		*Functionality  : sign a petition by a user 
		*Input			: nothing
		*Output			: nothing.
		*Return Value   : nothing
		*Note			: nothing
		***************************************************************************************
		*/

		function signPetition() 
		{
			$message = "Error in casting vote.";
			
			if( isset($_REQUEST['articleID']) && isset($_REQUEST['status']) )
			{
				$articleID 	 = $_REQUEST['articleID'];
				$status		 = $_REQUEST['status'];
				$affiliateID = $_REQUEST['affID'];				
				
				$vote_status	=	$this->oModel->getVoteStatus( $_SESSION['username'], $articleID);
								
				// No vote is already casted
				if($vote_status == 'NA')
				{						
					if($this->oModel->memberVote( $_SESSION['username'], $articleID, $status))
					{
						$message = 'Petition signed successfully'; 										
					}	
				}				
			}
		
			header("location:index.php?stage=subscriber&mode=petitionsDetail&id=".$articleID."&affID=".$affiliateID."&msg=".$message);
		
		}//ef

	
		 /*
		**************************************************************************************
		*Function Header
		*Function Name  : castYourVote
		*Function Type  : Call by value	
		*Functionality  : cast user vote  
		*Input			: nothing
		*Output			: nothing.
		*Return Value   : nothing
		*Note			: nothing
		***************************************************************************************
		*/
		function castYourVoteOnPoll()
		{		
			$message = 'Error in casting vote.';
			
			if( isset($_REQUEST['articleID']) && isset($_REQUEST['status']) )
			{
				$articleID 	= $_REQUEST['articleID'];
				$status		= $_REQUEST['status'];
				$er_id		= $_REQUEST['er_id'];	
				$vote_status	=	$this->oModel->getVoteStatusOnPoll( $_SESSION['username'], $articleID);
				
				
				## article Detail
				## affiliate Detail
				
				## No vote is already casted
				if($vote_status == 'NA')
				{
					$message = 'Error in casting vote on poll'; 															
					if($this->oModel->memberVoteOnPoll( $_SESSION['username'], $articleID, $status))
					{
						$message = 'Vote casted successfully'; 											
					}	
				}								
			}			
			header("location:".$_CONF['SiteUrl']."/index.php?stage=subscriber&mode=PollsDetail&id=".$articleID."&er_id=".$er_id."&msg=".$message);														
			die();				
		}//ef
				
		 
	};//ec
?>