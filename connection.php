<?php 
	define('DB_NAME', 'vulnerable site');
	define('DB_USER', 'root');
	define('DB_PASSWORD', 'sidharth12468');
	define('DB_HOST', 'localhost');

	$link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD);
	if(!$link){
		die('Could not connect to database: ' . mysql_error());
	}
	$db_selected = mysqli_select_db($link, DB_NAME);
	if(!$db_selected){
		die('Could not select database: ' . mysql_error());
	}
?>