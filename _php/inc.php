<?php

if ( file_exists('_php/config.php') ) {
	require_once('_php/config.php');
} else {
	$config_template = file_get_contents('_tpl/config.tpl');
	file_put_contents('_php/config.php', $config_template);
	if ( file_exists('_php/config.php') ) {
		die('Configuration file created, please edit it on your web server.');
	} else {
		die('Unable to create config.php, please make sure directory is writable.');
	}
}

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
function __autoload($class) {
	if(substr($class, 0, 2) == "W_")
		require_once(ROOT . "_php_widgets/" . substr($class, 2) . ".php");
	else
		require_once(ROOT . "_php/" . $class . ".class.php");
}
?>
