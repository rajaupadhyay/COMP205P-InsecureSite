<?php 
	define('DB_NAME', '');
	define('DB_USER', '');
	define('DB_PASSWORD', '');
	define('DB_HOST', '');

	$link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD);
	if(!$link){
		die('Could not connect to database: ' . mysql_error());
	}
	$db_selected = mysqli_select_db($link, DB_NAME);
	if(!$db_selected){
		die('Could not select database: ' . mysql_error());
	}
?>
