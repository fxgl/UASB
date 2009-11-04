<?php

// the login/password (should be asset server admin info)
define("PG_USER", "[USER]");
define("PG_PASSWORD", "[PASSWORD]");

// server-specific stuff
define("ROOT", "[PATH]");
define("HTTPROOT", "[WEBADDRESS]");

//create array to temporarily grab variables
$input_arr = array();
//grabs the $_POST variables and adds slashes
foreach ($_POST as $key => $input_arr) {
    $_POST[$key] = addslashes($input_arr);
}

session_start();


if ( (empty($_SESSION['uasb_username']) || empty($_SESSION['uasb_password'])) &&  !stristr($_SERVER['REQUEST_URI'], "login.php")) {
	if ( $_SERVER['REQUEST_URI'] == "/" ) {
		$_SESSION['last'] = "";
	} else {
		$_SESSION['last'] = $_SERVER['REQUEST_URI'];
	}
	header("Location:" . HTTPROOT . "login.php");
	die();
}


// autoload our classes (whew!)
function __autoload($class)
{
	if(substr($class, 0, 2) == "W_")
		require_once(ROOT . "_php_widgets/" . substr($class, 2) . ".php");
	else
		require_once(ROOT . "_php/" . $class . ".class.php");
}	
?>
