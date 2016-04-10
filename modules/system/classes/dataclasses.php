<?php
	/*	**********************************************************************************************************
		* Author Name	: Anil Nautiyal
		* Creation Date : 27th May-2011
		* FileName 				: dataclasses.php	
		* Called From 			: files where these data classes required
		* Description 			: contain dtaa classes
		* Components Used		: none
		* Tables Accessed 		: none
		* Program Specs 		:  
		* UTP doc 				:
		* Tested By 			:
	***********************************************************************************************************
	*/

	/*
	**************************************************************
	*Class Header
	*Class Name    : Subscriber
	*Functionality : This clss declares all the variables used to 
					 fetch data fom the database.
	*Note          : database will return only those values for which the variables are declared in this class.
	**************************************************************
	*/
	class Subscriber
	{
		
	}
	
	

	/*
	**************************************************************
	*Class Header
	*Class Name    : Visitor
	*Functionality : This clss declares all the variables used to 
					 fetch data fom the database.
	*Note          : database will return only those values for which the variables are declared in this class.
	**************************************************************
	*/
	class Visitor
	{
		
	}
	
	/*
	**************************************************************
	*Class Header
	*Class Name    : Affiliate
	*Functionality : This clss declares all the variables used to 
					 fetch data fom the database.
	*Note          : database will return only those values for which the variables are declared in this class.
	**************************************************************
	*/
	class Affiliate
	{
		
	}

		
	/*
	**************************************************************
	*Class Header
	*Class Name    : Page
	*Functionality : This clss declares all the variables used to fetch data fom the database.
	*Note          : database will return only those values for which the variables are declared in this class.
	**************************************************************
	*/
	class Page{
		var $page_id;
		var $title;
		var $metakeyword;
		var $metadescription;
		var $content;		
    }

	
	/*
	**************************************************************
	*Class Header
	*Class Name    : Member
	*Functionality : This clss declares all the variables used to fetch data fom the database.
	*Note          : database will return only those values for which the variables are declared in this class.
	**************************************************************
	*/
	class Member
	{
		var $member_id;
		var $first_name;
		var $last_name;
		var $password;
	}

	/*
	**************************************************************
	*Class Header
	*Class Name    : Setting
	*Functionality : This clss declares all the variables used to fetch data fom the database.
	*Note          : database will return only those values for which the variables are declared in this class.
	**************************************************************
	*/
	class Setting
	{
		var $field_name;
		var $field_value;
	}	
	
	/*
	**************************************************************
	*Class Header
	*Class Name    : ElectoralDistrict
	*Functionality : This clss declares all the variables used to fetch data fom the database.
	*Note          : database will return only those values for which the variables are declared in this class.
	**************************************************************
	*/
	class ElectoralDistrict 
	{
		var $member_id;
		var $first_name;
		var $last_name;
	}
		
	/*
	**************************************************************
	*Class Header
	*Class Name    : ElectoralDistrictComments
	*Functionality : This clss declares all the variables used to fetch data fom the database.
	*Note          : database will return only those values for which the variables are declared in this class.
	**************************************************************
	*/
	class ElectoralDistrictComments 
	{
		var $member_id;
	}
	
	/*
	**************************************************************
	*Class Header
	*Class Name    : ElectoralDistrictComments
	*Functionality : This clss declares all the variables used to fetch data fom the database.
	*Note          : database will return only those values for which the variables are declared in this class.
	**************************************************************
	*/
	class Paypal 
	{
	}
	
	/*
	**************************************************************
	*Class Header
	*Class Name    : Article
	*Functionality : This clss declares all the variables used to 
					 fetch data fom the database.
	*Note          : database will return only those values for which the variables are declared in this class.
	**************************************************************
	*/
	class Article
	{
		
	}	
	
		/*
	**************************************************************
	*Class Header
	*Class Name    : Article
	*Functionality : This clss declares all the variables used to 
					 fetch data fom the database.
	*Note          : database will return only those values for which the variables are declared in this class.
	**************************************************************
	*/
	class Petition
	{
		
	}
?>