<?php
	include 'connection.php';
	define('DB_TABLE', 'snippets');

	$text = $_GET['snippet1'];
	$id = $_GET['snippetId'];
	session_start();

	$sql = "UPDATE ". DB_TABLE ." SET Text='". $text ."' WHERE ID = ". $id .";";
	$result = mysqli_query($link,$sql);
	if(!$result){
		die("Could not perform the query: " . mysql_error());
	}
	header('Location: http://192.168.0.3/SW4/snips.php?tempId='. $_GET["userID"]);
	mysqli_close($link);
?>