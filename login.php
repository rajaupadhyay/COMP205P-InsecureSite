<?php
	include 'constants.php';
	define('DB_TABLE', 'users');

	$username = $_GET['logUsername'];
	$password = $_GET['logPassword'];
	$sql = "SELECT * FROM " . DB_TABLE . " where Username = '" . $username . "' AND Password = '" . $password . "';";
	$result = mysqli_fetch_assoc(mysqli_query($link,$sql));
	if(!$result){
		header('Location: http://localhost/SW4/index.php');
		die();
	}
	session_start();
	$_SESSION["loggedOn"] = true;
	$_SESSION["id"] = mysqli_fetch_assoc(mysqli_query($link, "SELECT ID FROM users WHERE Username = '". $username . "';"))["ID"];
	header('Location: http://localhost/SW4/index.php');
	mysqli_close($link);
?>