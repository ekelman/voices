<?php
/*
	**********************************************************************************************************
		* Author Name 			: Sandeep Singla 
		* Creation Date			: 16 May-2007
		* FileName 				: ReferrerModel.php	
		* Called From 			: ReferrerController classes.
		* Description 			: ReferrerModel class is inhertited from model class and is used to                               execute queries on the site.
		* Components Used		: none
		* Tables Accessed 		: none
		* Program Specs 		:  
		* UTP doc 				:
		* Tested By 			:
******************************************************************************/

	require_once($_CONF['ModulesPath'].'system/classes/Model.php');										
	
	/*
	**************************************************************
	*Class Header
	*Class Name    : home
	*Functionality : This clss declares all the variables used to 
					 fetch data fom the database.
	*Note          : database will return only those values for 
					 which the variables are declared in this 
					 class.
	**************************************************************
	*/
	

	class home{
		var $comp_id;		
		var $comp_name;
	}
	/*
		This class handles database interaction
	*/
	/*
	**************************************************************
	*Class Header
	*Class Name    : User
	*Functionality : This clss declares all the variables used to 
					 fetch data fom the database.
	*Note          : database will return only those values for 
					 which the variables are declared in this 
					 class.
	**************************************************************
	*/
	class User extends Model{
		function User(){
			parent::Model();
		}
		/*
		**************************************************************************************
		*Function Header
		*Function Name  : homePage
		*Function Type  : Call by value	
		*Functionality  : get company details  from the database
		*Input			: link id
		*Output			: object containing company details
		*Return Value   : object containing company details
		*Note			: nothing
		***************************************************************************************
		*/
		function homePage(){
		$sSQL = "select * from company";
		$rs = $this->Execute($sSQL);
		return $this->_getPageArray($rs, 'home');
		}	
		/*
		**************************************************************************************
		*Function Header
		*Function Name  : getBreadCrumbs
		*Function Type  : Call by value	
		*Functionality  : get bradcrums to be displayed  from the database
		*Input			: link id
		*Output			: object containing bradcrums details
		*Return Value   : object containing bradcrums details
		*Note			: nothing
		***************************************************************************************
		*/
		function getBreadCrumbs($link)
		{
		$sSQL = "select * from tbl_bread_crumbs where page_link='".$link."'";
		$rs = $this->Execute($sSQL);
		return $this->_getPageArray($rs, 'home');
		}
		/*
		**************************************************************************************
		*Function Header
		*Function Name  : getFromParent
		*Function Type  : Call by value	
		*Functionality  : get bradcrums from parent id to be displayed  from the database
		*Input			: link id
		*Output			: object containing bradcrums details
		*Return Value   : object containing bradcrums details
		*Note			: nothing
		***************************************************************************************
		*/
		function getFromParent($id)
		{
		$sSQL = "select * from tbl_bread_crumbs where id=".$id;
		$rs = $this->Execute($sSQL);
		return $this->_getPageArray($rs, 'home');
		}
		/*
		**************************************************************************************
		*Function Header
		*Function Name  : getMsg
		*Function Type  : Call by value	
		*Functionality  : get messages to be displayed  from the database
		*Input			: message id
		*Output			: message object
		*Return Value   : message object 
		*Note			: nothing
		***************************************************************************************
		*/
		function getMsg($msg_id)
	   {
		  $sSQL  = "select *  from tbl_languages where lang_id=$msg_id";
		  $response = $this->Execute($sSQL);
		  return ($this->_getPageArray($response, 'home'));
	  }//ef

	  /*
		**************************************************************************************
		*Function Header
		*Function Name  : gerReferrersAvaliable
		*Function Type  : Call by value	
		*Functionality  : to get the number of referrers
		*Input			: nothing .
		*Output			: number of referrers.
		*Return Value   : number of referrers.
		*Note			: nothing
		***************************************************************************************/
	 function gerReferrersAvaliable()
	 {
		$query = "select count(*) as number from tbl_member where isActive!='d' and member_type='r'";
		$rs = $this->Execute($query);
		if($row=$rs->FetchRow())
		{
			$numberReferrers = $row['number'];
		}
		return $numberReferrers;
	 }

	 /*
		**************************************************************************************
		*Function Header
		*Function Name  : rewardAvailable
		*Function Type  : Call by value	
		*Functionality  : to get the total available reward
		*Input			: nothing .
		*Output			: total reward available.
		*Return Value   : total reward available.
		*Note			: nothing
		***************************************************************************************/
		function gerRewardAvaliable()
		{
			$query = "select sum(referral_reward) as rewardAvailable from tbl_job where isActive=1 and isPost=1 and isOpen=1";
			$rs = $this->Execute($query);
			if($row=$rs->FetchRow())
			{
				$rewardAvailable = $row['rewardAvailable'];
			}//if
			return $rewardAvailable;
		}//ef
		/*
		*************************************************************************************
		*Function Header
		*Function Name  : getAccessDetails
		*Function Type  : Call by value	
		*Functionality  : check whether the employer has resumedatabase Access or not
		*Input			: None
		*Output			: true or false value
		*Return Value   : nothing
		*Note			: nothing
		***************************************************************************************
		*/
		function getAccessDetails()
		{
			$query = "select member.member_id,resumedb.* from tbl_member member 
			left join tbl_member_resume_database resumedb 
			on member.member_id = resumedb.member_id 
			where member.member_id ='".$_SESSION[member_id]."' 
			and resumedb.date_access_expired is not null and resumedb.isApproved='y'";
			$rs		=	$this->Execute($query);
			if(is_object($rs))
			{
				if($rs->RecordCount())
				{
					$dt = date("Y-m-d");
					$row		=	$rs->FetchRow();
					$date_access_expired	=	$row['date_access_expired'];
					
					if($date_access_expired > $dt) {
						return 1;
					} else {
						return 2;
					}//if
				} else {
					return 3;
				}//if
			}//if 
			return 0;
		}//ef
		/*
		**************************************************************************************
		*Function Header
		*Function Name  : getCandidateDetailsResume
		*Function Type  : Call by value	
		*Functionality  : get all the country from database	
		*Input			: nothing
		*Output			: province array
		*Return Value   : province array
		*Note			: nothing
		***************************************************************************************
		*/
		function getCandidateDetailsResume($candidate_id) {
			$query = "select candidate_id from tbl_candidate_resume_posted where candidate_id='".$candidate_id."'";
			$rs = $this->Execute($query);
			if($row = $rs->FetchRow())
			{
				$candidate_id_retrun = $row['candidate_id'];
			} else {
				$candidate_id_retrun = 0;
			}
			return $candidate_id_retrun;
		}//ef
	}//ec
?>