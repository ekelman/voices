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
	require_once($_CONF['ModulesPath'].'electedrepresentative/classes/ElectedrepresentativeModel.php');
	require_once($_CONF['ModulesPath'].'accession/classes/AccessionModel.php');
										
	//contains constants that are used in this module
	require_once($_CONF['ModulesPath'].'system/classes/Validation.php');
										
	//contains validation functions
	require_once($_CONF['ModulesPath'].'system/functions.php');	
										    								    
	//contains some common functions 
	require_once($_CONF['ModulesPath'].'system/classes/extra/class.phpmailer.php');								    
	
	//contains some common data classes 
	require_once($_CONF['ModulesPath'].'system/classes/dataclasses.php');								    
	
	/***************************************************************
	*Class Header
	*Class Name    : SubscriberController
	*Functionality : This class controls SubscriberModel and SubscriberView
					 to handle Subscribers on the site.
	*Note          : SubscriberController inherits UserController that 
 	                contains functions for the user site.
	***************************************************************/

	class ElectedrepresentativeController extends UserController
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
		
		function ElectedrepresentativeController()
		{
			parent::UserController();
			$this->oModel	= new ElectedrepresentativeModel();			
			$this->aModel	= new AccessionModel();
			
			// $this->aModel->checkAccessPermission();			
			/*
				echo "<pre>";
				print_r($_SESSION);
			*/
			
			$this->oView	= new ElectedrepresentativeView();
			$oMember = new Member();						
		}

		
		/*
		**********************************************************************************
		*Function Header
		*Function Name  : SubscriberJoin
		*Function Type  : Call by value	
		*Functionality  : Displays the page for new signup of subscriber.
		*Input			: nothing
		*Output			: Signup page for subscriber through SubscriberView.
		*Return Value   : nothing
		*Note			: nothing		
		*************************************************************************************
		*/
		function ElectedrepresentativeList()
		{
			//$this->ERAuthenticate();
			
			$oElectedOfficials	 = $this->oModel->getElectedOfficials();
			//echo "<pre>";

			foreach($oElectedOfficials as $oElectedOfficial) {
				
				if($oElectedOfficial->OfficerProfileImage == "") {
					$oElectedOfficial->OfficerProfileImage = "images/no-image.jpg";
				} else {
					$oElectedOfficial->OfficerProfileImage = "UserFiles/er_pics/thumb/".$oElectedOfficial->OfficerProfileImage;				
				}
				//print_r($oElectedOfficial);
			}
							
			//print_r($oElectedOfficials);
			//die();

			$this->oView->oMember = $oElectedOfficials;		
			$this->oView->ElectedrepresentativeList();
		}//ef
		
		
		/*
		*************************************************************************************
		*function header
		*function name  : ElectedrepresentativeDashboard
		*function type  : call by value	
		*functionality  : 
		*input			: 
		*output			: 
		*return value   : nothing
		*note			: nothing
		***************************************************************************************
		*/
		function ElectedrepresentativeDashboard()
		{
			$this->ERAuthenticate();
			//echo "ElectedrepresentativeDashboard controller";
			//die();
			
		    global $_CONF;
			
			$loggedInER	= $_SESSION['username'];
			$oMember	= $this->oModel->getElectedRepresentativeID($loggedInER);
			$oMember 	= $oMember[0];
			$erID 		= $oMember->ElectedOfficialID;
			
			$oElectoralDistrict = $this->oModel->getElectedRepresentativeDetails($erID);
			
			if($oElectoralDistrict[0]->OfficerProfileImage == "") {
				
				$oElectoralDistrict[0]->OfficerProfileImage = "images/no-image.jpg";
			} else {
				
				$oElectoralDistrict[0]->OfficerProfileImage = $_CONF['profile_image_front_end'].$oElectoralDistrict[0]->OfficerProfileImage;				
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
			
			// Artilces of ERs 
			// 3 is number of articles
			$oElectoralDistrictComments = $this->oModel->getElectedRepresentativeComments($erID,3);
			$this->oView->oElectoralDistrictComments 	= $oElectoralDistrictComments;
			
			$oElectoralDistrictPolls = $this->oModel->getElectedRepresentativePolls($erID,3);
			$this->oView->oElectoralDistrictPolls 	= $oElectoralDistrictPolls;
			
			if(isset($_REQUEST['msg'])) {
				
				if(trim($_REQUEST['msg']) != '' && $_REQUEST['msg'] == 'profile_updated') {
					
					$this->oView->vMsg = "Profile updated sucessfully.";
				} else if(trim($_REQUEST['msg']) != '') {
					$this->oView->vMsg = $_REQUEST['msg'];				
					// $this->oView->vMsg = "Content submitted sucessfully.";				
				}
				 						
			} else {
				$this->oView->vMsg = ""; 						
			}
			
			/* permissions */
			
			$this->oView->er_content_poll_view 		= false; 							
			$this->oView->er_content_poll_add 		= false; 							
			$this->oView->er_content_poll_delete 	= false; 							
			
			$this->oView->er_content_article_view 	= false; 							
			$this->oView->er_content_article_add	= false; 							
			$this->oView->er_content_article_delete	= false; 							
			$this->oView->er_content_article_modify_own_content = false; 							
			
			$this->oView->er_content_report_card_view = false;
			
			if( $this->aModel->checkSpecificAccessPermission("ER Content","Poll","View") )
				$this->oView->er_content_poll_view = true; 													
			
			if( $this->aModel->checkSpecificAccessPermission("ER Content","Poll","Add") )
				$this->oView->er_content_poll_add = true; 							
				
			if( $this->aModel->checkSpecificAccessPermission("ER Content","Poll","Delete") )
				$this->oView->er_content_poll_delete = true; 							
				
				
			if( $this->aModel->checkSpecificAccessPermission("ER Content","Articles","View") )
				$this->oView->er_content_article_view = true; 													
			
			if( $this->aModel->checkSpecificAccessPermission("ER Content","Articles","Add") )
				$this->oView->er_content_article_add = true; 							
			
			if( $this->aModel->checkSpecificAccessPermission("ER Content","Articles","Modify Own Content") )
				$this->oView->er_content_article_modify_own_content = true; 							
			
			if( $this->aModel->checkSpecificAccessPermission("ER Content","Articles","Delete") )
				$this->oView->er_content_article_delete = true; 							
			
			if( $this->aModel->checkSpecificAccessPermission("ER Content","Report Card","View") )
				$this->oView->er_content_report_card_view = true; 							
			
			/** permissions **/
			
			$reportCardArticles = $this->getReportCardDashBoard($oMember);

			//echo "<pre>";
			//print_r($reportCardArticles);
			//die();
			$this->oView->affiliateVoteAlerts	= $reportCardArticles;			 
			$this->oView->ElectedrepresentativeDashboard();			
		}//ef

		
		/*		
		 *************************************************************************************
		*function header
		*function name  : SubmitNewContent
		*function type  : call by value	
		*functionality  : 
		*input			: 
		*output			: 
		*return value   : nothing
		*note			: nothing
		***************************************************************************************
		*/
		
		function SubmitNewContent() {
			
		    global $_CONF;
			$this->ERAuthenticate();
			
			$permission = $this->aModel->checkSpecificAccessPermission("ER Content","Articles","Add");			
			
			if( $permission )
				$this->oView->SubmitNewContent();	
			else
				header("location:".$_CONF['SiteUrl']."/index.php?stage=electedrepresentative&mode=electedrepresentativedashboard&msg=Not Authorized");						
			
		} //ef	
		

		
		

		
		/*		
		 *************************************************************************************
		*function header
		*function name  : addNewArticle 
		*function type  : call by value	
		*functionality  : 
		*input			: 
		*output			: 
		*return value   : nothing
		*note			: nothing
		***************************************************************************************
		*/
		function addNewComment()
		{
			$this->ERAuthenticate();
		    global $_CONF;
			
			$loggedInER	= $_SESSION['username'];
			$oMember	= $this->oModel->getElectedRepresentativeID($loggedInER);
			$oMember 	= $oMember[0];
			
			//print_r($oMember);
			$oElectoralDistrictComments->elected_officer_id =	$oMember->ElectedOfficialID;
			$oElectoralDistrictComments->comment =	htmlentities(trim($_POST['comment']), ENT_QUOTES);
			//die();
			
			//print_r($oElectoralDistrictComments);
			//die();
			$this->oModel->addERArticle($oElectoralDistrictComments);		
			echo "<script>location='index.php?stage=electedrepresentative&mode=electedrepresentativedashboard&msg=Article submitted.'</script>";
			die();
		}//ef	
		
		
		/*		
		 *************************************************************************************
		*function header
		*function name  : EditContent
		*function type  : call by value	
		*functionality  : 
		*input			: 
		*output			: 
		*return value   : nothing
		*note			: nothing
		***************************************************************************************
		*/
		
		function EditArticle() {

		    global $_CONF;
			$this->ERAuthenticate();
			
			$permission = $this->aModel->checkSpecificAccessPermission("ER Content","Articles","Modify Own Content");						
			
			if($permission)
			{
				if(isset($_POST["updateERArticle"]))
				{
					// Update article data
					$this->ERAuthenticate();
					global $_CONF;
					
					$loggedInER	= $_SESSION['username'];
					$oMember	= $this->oModel->getElectedRepresentativeID($loggedInER);
					$oMember 	= $oMember[0];
					
					//print_r($oMember);
					$oElectoralDistrictComments->elected_officer_id =	$oMember->ElectedOfficialID;
					
					if($_POST["electedrepresentativeID"] != $oElectoralDistrictComments->elected_officer_id )
					{
						header("location:".$_CONF['SiteUrl']."/index.php?stage=electedrepresentative&mode=electedrepresentativedashboard&msg=Article does not exist.");												
					}
					
					$oElectoralDistrictComments->article_id =	$_POST["articleID"];
					$oElectoralDistrictComments->comment =	htmlentities(trim($_POST['comment']), ENT_QUOTES);
					$this->oModel->updateERArticle($oElectoralDistrictComments);			
					
					echo "<script>location='index.php?stage=electedrepresentative&mode=electedrepresentativedashboard&msg=Article updated.'</script>";
					die();					
				}
				else
				{
					if(isset($_GET["articleID"]) && !empty($_GET["articleID"]))	{				
						$articleID = $_GET["articleID"];				
						$username  = $_SESSION['username'];
						$oArticle  = $this->oModel->getERArticleDetails($username, $articleID);			
						$oArticle  = $oArticle[0];
						$this->oView->oArticle	=	$oArticle;									
						$this->oView->EditArticle();			
					}
					else {
						header("location:".$_CONF['SiteUrl']."/index.php?stage=electedrepresentative&mode=electedrepresentativedashboard&msg=Article does not exist.");						
					}
				}	
			}	
			else
				header("location:".$_CONF['SiteUrl']."/index.php?stage=electedrepresentative&mode=electedrepresentativedashboard&msg=Not Authorized");									
		} //ef	
		
		
		
		/*		
		 *************************************************************************************
		*function header
		*function name  : DeleteArticle
		*function type  : call by value	
		*functionality  : 
		*input			: 
		*output			: 
		*return value   : nothing
		*note			: nothing
		***************************************************************************************
		*/
		
		function DeleteArticle() {

		    global $_CONF;
			$this->ERAuthenticate();
			
			$permission = $this->aModel->checkSpecificAccessPermission("ER Content","Articles","Delete");						
			
			if($permission)
			{
				// Update article data
				$this->ERAuthenticate();
				global $_CONF;
				
				$loggedInER	= $_SESSION['username'];
				$oMember	= $this->oModel->getElectedRepresentativeID($loggedInER);
				$oMember 	= $oMember[0];
				
				//print_r($oMember);
				$oElectoralDistrictComments->elected_officer_id =	$oMember->ElectedOfficialID;
				$oElectoralDistrictComments->article_id =	$_REQUEST["articleID"];				
				if($this->oModel->deleteERArticle($oElectoralDistrictComments))							
				{					
					header("location:".$_CONF['SiteUrl']."/index.php?stage=electedrepresentative&mode=electedrepresentativedashboard&msg=Article deleted.");					
					die();					
				}
				else{					
					header("location:".$_CONF['SiteUrl']."/index.php?stage=electedrepresentative&mode=electedrepresentativedashboard&msg=Article can not deleted.");					
					die();					
				}
			}	
			else
				header("location:".$_CONF['SiteUrl']."/index.php?stage=electedrepresentative&mode=electedrepresentativedashboard&msg=Not Authorized");									
		} //ef	
		
		
		
		
		/*		
		 *************************************************************************************
		*function header
		*function name  : DeleteArticleComment
		*function type  : call by value	
		*functionality  : to delete comment on an article
		*input			: 
		*output			: 
		*return value   : nothing
		*note			: nothing
		***************************************************************************************
		*/
		
		function DeleteArticleComment() {

		    global $_CONF;
			$this->ERAuthenticate();
			
			$permission = $this->aModel->checkSpecificAccessPermission("ER Content","Articles","Delete");						
			
			if($permission)
			{
				// Update article data
				$this->ERAuthenticate();
				global $_CONF;
				
				$loggedInER	= $_SESSION['username'];
				$oMember	= $this->oModel->getElectedRepresentativeID($loggedInER);
				$oMember 	= $oMember[0];
				
				//print_r($oMember);
				$oElectoralDistrictComments->elected_officer_id =	$oMember->ElectedOfficialID;
				$oElectoralDistrictComments->article_id =	$_REQUEST["articleID"];	
				$comment_id  =	$_REQUEST["commentID"];	
				if($this->oModel->deleteERArticleComment($oElectoralDistrictComments,$comment_id))			
				{
					header("location:".$_CONF['SiteUrl']."/index.php?stage=electedrepresentative&mode=ArticleDetail&id=".$oElectoralDistrictComments->article_id."&msg=Comment deleted.");
					die();
				}
				else{					
					header("location:".$_CONF['SiteUrl']."/index.php?stage=electedrepresentative&mode=ArticleDetail&id=".$oElectoralDistrictComments->article_id."&msg=Comment can not deleted.");
					die();					
				}
			}	
			else
				header("location:".$_CONF['SiteUrl']."/index.php?stage=electedrepresentative&mode=electedrepresentativedashboard&msg=Not Authorized");									
		} //ef	
		
		

		
		/*		
		 *************************************************************************************
		*function header
		*function name  : SubmitNewPoll
		*function type  : call by value	
		*functionality  : 
		*input			: 
		*output			: 
		*return value   : nothing
		*note			: nothing
		***************************************************************************************
		*/
		function SubmitNewPoll() {
			
		    global $_CONF;			
			$this->ERAuthenticate();			
			
			$permission = $this->aModel->checkSpecificAccessPermission("ER Content","Poll","Add");			

			if($permission)
				$this->oView->SubmitNewPoll();			
			else
				header("location:".$_CONF['SiteUrl']."/index.php?stage=electedrepresentative&mode=electedrepresentativedashboard&msg=Not Authorized to add poll");									
		}//ef	
		
		
		/*		
		 *************************************************************************************
		*function header
		*function name  : addNewComment
		*function type  : call by value	
		*functionality  : 
		*input			: 
		*output			: 
		*return value   : nothing
		*note			: nothing
		***************************************************************************************
		*/
		function addNewPolls()
		{
			$this->ERAuthenticate();
		    global $_CONF;
			
			$permission = $this->aModel->checkSpecificAccessPermission("ER Content","Poll","Add");			
			if( $permission )
			{							
				$loggedInER	= $_SESSION['username'];
				$oMember	= $this->oModel->getElectedRepresentativeID($loggedInER);
				$oMember 	= $oMember[0];
			
				// print_r($oMember);
				$oElectoralDistrictComments->elected_officer_id = $oMember->ElectedOfficialID;
				$oElectoralDistrictComments->comment =	htmlentities(trim($_POST['comment']), ENT_QUOTES);
				// die();
				
				// print_r($oElectoralDistrictComments);
				// die();
				$this->oModel->addERPoll($oElectoralDistrictComments);		
				
				echo "<script>location='index.php?stage=electedrepresentative&mode=electedrepresentativedashboard&msg=Poll submitted.'</script>";
				die();
			}
			else {
				header("location:".$_CONF['SiteUrl']."/index.php?stage=electedrepresentative&mode=electedrepresentativedashboard&msg=Not Authorized to add poll");						
			}
		}//ef	
		
		
		
		
		/*		
		 *************************************************************************************
		*function header
		*function name  : DeletePoll
		*function type  : call by value	
		*functionality  : 
		*input			: 
		*output			: 
		*return value   : nothing
		*note			: nothing
		***************************************************************************************
		*/
		
		function DeletePoll() {

		    global $_CONF;
			$this->ERAuthenticate();
			
			$permission = $this->aModel->checkSpecificAccessPermission("ER Content","Poll","Delete");						
			
			if($permission)
			{
				// Update article data
				$this->ERAuthenticate();
				global $_CONF;
				
				$loggedInER	= $_SESSION['username'];
				$oMember	= $this->oModel->getElectedRepresentativeID($loggedInER);
				$oMember 	= $oMember[0];
				
				//print_r($oMember);
				$oElectoralDistrictComments->elected_officer_id =	$oMember->ElectedOfficialID;
				$oElectoralDistrictComments->article_id = $_REQUEST["pollID"];				
				if($this->oModel->deleteERPoll($oElectoralDistrictComments))			
				{
					echo "<script>location='index.php?stage=electedrepresentative&mode=electedrepresentativedashboard&msg=Poll deleted.'</script>";
					die();					
				}
				else{
					echo "<script>location='index.php?stage=electedrepresentative&mode=electedrepresentativedashboard&msg=Poll can not deleted.'</script>";
					die();					
				}
			}	
			else
				header("location:".$_CONF['SiteUrl']."/index.php?stage=electedrepresentative&mode=electedrepresentativedashboard&msg=Not Authorized");									
		} //ef	
		
		/*
		 *************************************************************************************
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
		function EditProfile($oMember)
		{
			//die("edit");
		    global $_CONF;
			$msg = "";
			
		    $this->ERAuthenticate();
		    
			$username = $_SESSION['username'];
			$oMember = $this->oModel->getElectedRepresentativeID($username);
			$oMember = $oMember[0];
			
			$this->oView->vMsg = $msg; 
			$this->oView->oMember = $oMember;
			$this->oView->EditProfile();			
		}//ef


		
		
		/*		
		 ***************************************************************************************
		*function header
		*function name  : UpdateEmployer
		*function type  : call by value	
		*functionality  : update the account of employer
		*input			: oEmployer array
		*output			: update the account of employer
		*return value   : nothing
		*note			: nothing		
		****************************************************************************************
		*/
		function UpdateElectedrepresentative()
		{
			global $_CONF;
			
			$username = $_SESSION['username'];
			$oMember = $this->oModel->getElectedRepresentativeID($username);
			$oMember = $oMember[0];
		  			   
		  	$oMember->member_id			=	$_POST['member_id'];
			$oMember->email				=	trim($_POST['email']);
			$oMember->password			=	trim($_POST['password']);
						
			//echo "<pre>";
			//print_r($oElectoralDistrict);
			//print_r($_POST);
			//die();	

			$isDuplicate	=	$this->oModel->checkDuplicationUpdate($oMember);

			if($isDuplicate) {
								
				$this->oView->vMsg = "E-mail Id already exists.";
				$this->oView->oMember = $oMember;
				$this->oView->EditProfile();							
			} else {

				$rs= $this->oModel->updateElectedrepresentative($oMember);								
				header("location:".$_CONF['SiteUrl']."/index.php?stage=electedrepresentative&mode=electedrepresentativedashboard&msg=profile_updated");
			}
		}//ef
		
		
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
		function ERAuthenticate() {
		
			if(!$_SESSION['username'])
			{
				echo "<script>location.href=\"index.php?stage=member&mode=login&sErrorMessage=You have been logged out of the system due to inactivity.\"</script>";
				die();
			} else {
			
				if(($_SESSION['member_type'] != "elected_official")) {
				
					$this->EmailMessage("invalidaccess");
					die();
				}
			}
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
			
			$this->ERAuthenticate();
			$msg = "";
			if(isset($_GET['msg'])) {

				$msg = $_GET['msg'];				
			}
			
			$this->oView->msg	=	$msg;
			
			if(isset($_GET['id'])) {
				$article_id = $_GET['id'];			
			}
			
			
			/* permissions */	
			
			$permission = $this->aModel->checkSpecificAccessPermission("ER Content","Articles","View");			
			if(!$permission)
			{	
				header("location:".$_CONF['SiteUrl']."/index.php?stage=electedrepresentative&mode=electedrepresentativedashboard&msg=Not Authorized to view articles");							
			}
	
			$this->oView->er_content_article_delete	= false; 							
			$this->oView->er_content_article_modify_own_content = false; 
		
			if( $this->aModel->checkSpecificAccessPermission("ER Content","Articles","Delete") )
				$this->oView->er_content_article_delete = true; 										
			
			if( $this->aModel->checkSpecificAccessPermission("ER Content","Articles","Modify Own Content") )
				$this->oView->er_content_article_modify_own_content = true; 				
				
			/** permissions **/
			
			
			$username = $_SESSION['username'];
			$oArticle = $this->oModel->getERArticleDetails($username, $article_id);			
			$oArticle = $oArticle[0];
			
			// comments on that article
			$oSubscribersComment = $this->oModel->getERArticleComment($article_id);		
			$this->oView->oSubscribersComment = $oSubscribersComment;
			
			$this->oView->oArticle	=	$oArticle;
			$this->oView->ArticleDetail();
		}
		
		
		/*
		 * **********************************************************************************************
		*Function Header
		*Function Name  : ListERArticles
		*Function Type  : call by value
		*Functionality  : Authenticates user access to this controller
		*Input			: NIL
		*Output			: authenicates the user
		*Return Value   : NIL
		*Note			: NIL		
		******************************************************************************************/
		function ListERArticles() {
			
			$this->ERAuthenticate();
			$msg = "";
			if(isset($_GET['mgs'])) {
				
				if($_GET['mgs'] == "comment_added") {
				
					$msg = "Comment added.";
				}
			}
			
			$this->oView->msg	=	$msg;
			
			if(isset($_GET['id'])) {
				$article_id = $_GET['id'];
			}
			$username = $_SESSION['username'];
			$oArticle = $this->oModel->getERArticleDetails($username, $article_id);
			
			$oArticle = $oArticle[0];
			$this->oView->oArticle	=	$oArticle;
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
			
			$this->ERAuthenticate();
			
			$msg = "";
			if(isset($_GET['msg'])) {
				
				if($_GET['msg'] == "comment_added") {
				
					$msg = "Comment added.";
				}
			}
			
			
			/* permissions */
			
			$permission = $this->aModel->checkSpecificAccessPermission("ER Content","Poll","View");			
			if(!$permission)
			{	
				header("location:".$_CONF['SiteUrl']."/index.php?stage=electedrepresentative&mode=electedrepresentativedashboard&msg=Not Authorized to view polls");							
			}
	
			$this->oView->er_content_poll_delete	= false; 							
			$this->oView->er_content_poll_modify_own_content = false; 			
			
			if( $this->aModel->checkSpecificAccessPermission("ER Content","Poll","Delete") )
				$this->oView->er_content_poll_delete = true; 										

			/** permissions **/
			
			$this->oView->msg	=	$msg;
			
			if(isset($_GET['id'])) {
				$articleID = $_GET['id'];
			}
			
			/* Get voting Status */
			$support = $total = 0; 			
			##View Alerts Added Affiliate Articles 	
			
			$this->oView->articleStatus 	= $this->oModel->getPollVotingStatus($articleID, $support ,$total );			 			
			
			
			$supportPercentage = (int)(($support / $total ) * 100); 
			if($supportPercentage)
				$opposePercentage  = 100 - $supportPercentage;
			else
				$opposePercentage  = 0;
			$this->oView->supportPercentage = $supportPercentage;
			$this->oView->opposePercentage  = $opposePercentage;			
			
			$signs_count = $total;
			$this->oView->signs_count = $signs_count;			 
			/* Get voting Status */
			
			
			$username = $_SESSION['username'];
			$oArticle = $this->oModel->getERPollDetails($username, $articleID);				
			$oArticle = $oArticle[0];				
			$this->oView->oArticle	=	$oArticle;
			$this->oView->PollsDetail();
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
			$this->ERAuthenticate();
			
			/* permissions */
			
			$permission = $this->aModel->checkSpecificAccessPermission("ER Content","Articles","View");			
			if(!$permission)
			{	
				header("location:".$_CONF['SiteUrl']."/index.php?stage=electedrepresentative&mode=electedrepresentativedashboard&msg=Not Authorized to view articles");							
			}
	
			$this->oView->er_content_article_delete	= false; 							
			$this->oView->er_content_article_modify_own_content = false; 			
			
			if( $this->aModel->checkSpecificAccessPermission("ER Content","Articles","Delete") )
				$this->oView->er_content_article_delete = true; 										

			if( $this->aModel->checkSpecificAccessPermission("ER Content","Articles","Modify Own Content") )
				$this->oView->er_content_article_modify_own_content = true; 
			
			/** permissions **/
			
			
			
	
			$loggedInER	= $_SESSION['username'];
			$oMember	= $this->oModel->getElectedRepresentativeID($loggedInER);
			$oMember 	= $oMember[0];
			$erID 		= $oMember->ElectedOfficialID;
			
			$oElectoralDistrictComments = $this->oModel->getElectedRepresentativeComments($erID);
			$this->oView->oElectoralDistrictComments 	= $oElectoralDistrictComments;
			
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
			$this->ERAuthenticate();			
			
			/* permissions */
			
			$permission = $this->aModel->checkSpecificAccessPermission("ER Content","Poll","View");			
			if(!$permission)
			{	
				header("location:".$_CONF['SiteUrl']."/index.php?stage=electedrepresentative&mode=electedrepresentativedashboard&msg=Not Authorized to view polls");							
			}
	
			$this->oView->er_content_poll_delete	= false; 							
			$this->oView->er_content_poll_modify_own_content = false; 			
			
			if( $this->aModel->checkSpecificAccessPermission("ER Content","Poll","Delete") )
				$this->oView->er_content_poll_delete = true; 										

			/** permissions **/
			
			$loggedInER	= $_SESSION['username'];
			$oMember	= $this->oModel->getElectedRepresentativeID($loggedInER);
			$oMember 	= $oMember[0];
			$erID 		= $oMember->ElectedOfficialID;
			
			$oElectoralDistrictComments = $this->oModel->getElectedRepresentativePolls($erID);
			$this->oView->oElectoralDistrictComments 	= $oElectoralDistrictComments;
			
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
			$this->ERAuthenticate();
			
			$loggedInER	= $_SESSION['username'];
			$oMember	= $this->oModel->getElectedRepresentativeID($loggedInER);
			$oMember 	= $oMember[0];
			//$erID 		= $oMember->ElectedOfficialID;
			
			//$oElectoralDistrictComments = $this->oModel->getElectedRepresentativeComments($erID);
			$reportCardArticles = $this->getReportCardList($oMember);
			
			$this->oView->oElectoralDistrictComments 	= $reportCardArticles;
			
			$this->oView->ERReportCard();			
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
		function getReportCardDashBoard($oMember)
		{
		    global $_CONF;
			$this->ERAuthenticate();
			
			$erID 		= $oMember->ElectedOfficialID;
			//echo $erID;
			$mySubscribers = $this->oModel->getMySubscribers($erID);
			$mySubscribersAffiliates 			=	$this->oModel->getMySubscribersAffiliates($mySubscribers);
			$mySubscribersAffiliatesArticles	=	$this->oModel->getAffiliateArticleDetailER($mySubscribersAffiliates, "yes");
			
			
			//echo "<pre>";
			/*
			 * echo "mySubscribers";
			print_r($mySubscribers);
			
			echo "mySubscribersAffiliates";
			print_r($mySubscribersAffiliates);
			*/
		
			//print_r($mySubscribersAffiliatesArticles);
			//die();
			
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
		function getReportCardList($oMember)
		{
		    global $_CONF;
			$this->ERAuthenticate();
			
			$erID 		= $oMember->ElectedOfficialID;
			//echo $erID;
			$mySubscribers = $this->oModel->getMySubscribers($erID);
			$mySubscribersAffiliates 			=	$this->oModel->getMySubscribersAffiliates($mySubscribers);
			$mySubscribersAffiliatesArticles	=	$this->oModel->getAffiliateArticleDetailER($mySubscribersAffiliates);
			
			//echo "<pre>";
			//print_r($mySubscribersAffiliatesArticles);
			//die();
			
			return $mySubscribersAffiliatesArticles;			
		}//ef				
	};//ec
?>