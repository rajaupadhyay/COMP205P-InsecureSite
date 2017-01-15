<?php
	include 'connection.php';
	define('DB_TABLE', 'snippets');

	$text = $_GET['snippet'];
	session_start();
	$sql = "INSERT INTO ". DB_TABLE ." (Text,userID) VALUES ('". $text ."', ". $_SESSION["id"] .");";
	$result = mysqli_query($link,$sql);
	if(!$result){
		die("Could not perform the query: " . mysql_error());
	}
	header('Location: http://192.168.0.3/SW4/snips.php?tempId='. $_SESSION["id"] .'');
	mysqli_close($link);
?>