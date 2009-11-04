<?php

/**
* @desc List all of the databases we're tracking
*/
class W_Login extends Widget
{
	protected $template = "login.tpl";
	
	function __construct()
	{
		parent::__construct();
		if ( addslashes($_GET['action']) == "logout" ) {
			session_unset("uasb_password");
			session_unset("uasb_username");
			session_unset("databases");
			session_unset("projects");
		}
		if($_POST) {

    		// Initialize some variables for storing errors or the success of the registration.
    		$error = ''; 

		    // Make sure the user filled in all of the fields
		    if($_POST['username'] == '' || $_POST['password'] == '')
		    {
		        $error .= "<li>A required field was not filled in.</li>";
		    }
		
			if($_POST['username'] == 'unitysrv' || $_POST['username'] == 'admin') {
				$error .= "<li>You cannot login as reserved names.</li>";
			}
		    
		    // I wanted to use the standard search by password but just couldnt find it
		    // TODO: FInd out how to do this with just a password check.
			$test = @pg_connect("host=localhost port=10733 dbname=postgres user=" . $_POST['username'] . " password=" . $_POST['password']);
			
			if ( $test && empty($error)) { 
				$_SESSION['uasb_username'] = $_POST['username'];
				$_SESSION['uasb_password'] = $_POST['password'];
				header("Location:" . HTTPROOT . $_SESSION['last']);
			} else {
				$error .= "<li>No credentials found.</li>";	
				session_unset("uasb_password");
				session_unset("uasb_username");
				session_unset("databases");
				session_unset("projects");
			}
			
   			$this->smarty->assign("error", $error);
		}
	}
}