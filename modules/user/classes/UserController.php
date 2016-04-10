<?php
	class UserController extends Controller{
		function UserController(){
			global $_CONF;
			session_start();
			parent::Controller();
		}

		function RunApplication(){
		exit();
			$method = $this->mode;
			if(method_exists($this,$method)) $this->$method();
			else
				die("Invalid Method Invoked");
		}
		
		function m_default(){
			$obUserView = new UserView();
			$obUserView->{$this->mode}();
		}
		
		function homePage()
		{
			
		}
	}
?>