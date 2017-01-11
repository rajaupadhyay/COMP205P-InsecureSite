<?php
	include 'constants.php';
	define('DB_TABLE', 'snippets');

	$id = $_GET['snipsId'];
	$userid = $_GET['userId'];

	$sql = "DELETE FROM ". DB_TABLE ." WHERE ID =". $id .";";
	$result = mysqli_query($link,$sql);
	if(!$result){
		die("Could not perform the query: " . mysql_error());
	}
	header('Location: http://localhost/SW4/snips.php?tempId='. $userid);
	mysqli_close($link);
?>