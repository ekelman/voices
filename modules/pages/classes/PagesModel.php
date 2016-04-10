<?php
/***********************************************************************************************************
		* Author Name : Gagandeep Kaur
		* Creation Date : 14-May-2007
		* FileName 		  : PagesModel.php	
		* Called From 	  : Admin and User PagesController and where the Pages details are required.
		* Description 	  : PagesModel file is used to interact with the database table to add,
		                    edit,delete,activate,deactivate. 
		* Components Used : ADODB for database interaction
		* Tables Accessed : tbl_pages
		* Program Specs   :  
		* UTP doc         :
		* Tested By       :
	************************************************************************************************************/
/*
	**************************************************************
	*Class Header
	*Class Name    : Page
	*Functionality : This clss declares all the variables used to 
					 fetch data fom the database.
	*Note          : database will return only those values for 
					 which the variables are declared in this 
					 class.
	**************************************************************
	
	class Page{
		var $page_id;
		var $title;
		var $metakeyword;
		var $metadescription;
		var $content;
	}*/
	/*
 		This class handles database interaction
	*/
	/*
	**************************************************************
	*Class Header
	*Class Name    : PagesModel
	*Functionality : This clss declares all the variables used to 
					 fetch data fom the database.
	*Note          : database will return only those values for 
					 which the variables are declared in this 
					 class.
	**************************************************************
	*/
	class PagesModel extends Model{
		function PagesModel(){
			parent::Model();
		}
	
	/*
		**************************************************************************************
		*Function Header
		*Function Name  : GetPage
		*Function Type  : Call by reference
		*Functionality  : get record of the page corresponding to page id.	
		*Input			: page id
		*Output			: Page object
		*Return Value   : object
		*Note			: nothing
		***************************************************************************************
		*/
	function &GetPage($iPageId = array()){
			$sSQL = "SELECT * FROM tbl_pages ";
			if(count($iPageId) > 0)
				$sSQL .= "WHERE page_id in ('".implode("','",$iPageId)."')";
			$rs = $this->Execute($sSQL);
			return $this->_getPageArray($rs, 'Page');
		}//ef
	
	  /*
		**************************************************************************************
		*Function Header
		*Function Name  : update
		*Function Type  : Call by value	
		*Functionality  : update the record of the page.
		*Input			: nothing
		*Output			: update the record of the page.
		*Return Value   : nothing.
		*Note			: nothing
		***************************************************************************************
		*/
	      function update($obPage){
			$sSQL  = "UPDATE tbl_pages SET ";
			$sSQL .= "title='".html_entity_decode(mysql_escape_string($obPage->title))."', ";
			$sSQL .= "metakeyword='".html_entity_decode(mysql_escape_string($obPage->metakeyword))."', ";
			$sSQL .= "metadescription='".html_entity_decode(mysql_escape_string($obPage->metadescription))."', ";
			$sSQL .= "content='".$obPage->content."' ";	
			$sSQL .= ",last_updated=CURRENT_DATE ";
			$sSQL .= "WHERE page_id='".$obPage->id."'";
			//echo $sSQL;
			return $this->Execute($sSQL);
		}//ef
	  /***************************************************************************************
	*Function Header
	*Function Name  : GetWorkMsg
	*Function Type  : Call by value	
	*Functionality  : fetches admin managed message.
	*Input			: nothing.
	*Output			: fetches admin managed message.
	*Return Value   : Page array
	*Note			: nothing
	****************************************************************************************/
	 function GetWorkMsg($page)
	 {
	 $sSQL  = "select *  from tbl_languages where lang_id=$page";
     $response = $this->Execute($sSQL);
	 return ($this->_getPageArray($response, 'Page'));
	 }//ef
	  /***************************************************************************************
	*Function Header
	*Function Name  : SubmitContact
	*Function Type  : Call by value	
	*Functionality  : submit the contact us information in database.	
	*Input			: Work object.
	*Output			: submit the contact us information in database.
	*Return Value   : boolean response from database class which tells whether query is 
					  executed or not.
	*Note			: nothing
	****************************************************************************************/ 
	function SubmitContact($oContact)
	{
	$sSQL  = "insert into tbl_contact_us set
	              name='".$oContact->name."' 
				 , email='".$oContact->email."'
				  ,phone_no='".$oContact->phone_no."'
				  , message='".$oContact->message."'";
     $response = $this->Execute($sSQL);
	 return $response;
	}//ef
	 /***************************************************************************************
	*Function Header
	*Function Name  : GetEmail
	*Function Type  : Call by value	
	*Functionality  : fetches email record from database.
	*Input			: email id
	*Output			: email record corresponding to email id.
	*Return Value   : Email information in form of Page array
	*Note			: nothing
	****************************************************************************************/
	 function GetEmail($id)
	  {
	  $query = "SELECT * FROM tbl_emails where email_id=$id";
					$rs		=	$this->Execute($query);
					return $this->_getPageArray($rs, 'Page');
	  }//ef
	    /***************************************************************************************
	*Function Header
	*Function Name  : getHomeMsg
	*Function Type  : Call by value	
	*Functionality  : fetches admin managed message.
	*Input			: nothing.
	*Output			: fetches admin managed message.
	*Return Value   : Page array  containing the message dispayed on the home page
	*Note			: nothing
	****************************************************************************************/
	  function getHomeMsg($msg_id)
	   {
		  $sSQL  = "select *  from tbl_languages where lang_id=$msg_id";
		  $response = $this->Execute($sSQL);
		  return ($this->_getPageArray($response, 'Page'));
	  }//ef
	  
	  function getPageContent($pg_id)
	   {
		  $sSQL  = "SELECT * FROM tbl_pages WHERE page_id = $pg_id";
		  $response = $this->Execute($sSQL);
		  return ($this->_getPageArray($response, 'Page'));
	  }
}//ec
?>