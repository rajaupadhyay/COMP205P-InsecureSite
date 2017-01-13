<?php
	session_start();
	$_SESSION = array();
	session_destroy();
	unset($_COOKIE['remember']);
	setcookie('remember', null, -1, '/');
	header('Location: http://192.168.0.3/SW4/index.php');
?>