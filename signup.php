<?php
	include 'constants.php';
	define('DB_TABLE', 'users');

	$username = $_GET['username'];
	$email = $_GET['email'];
	$password = $_GET['password'];

	$sql = "INSERT INTO users (Username, Email, Password) VALUES ('". $username . "', '". $email ."', '". $password ."');";
	$result = mysqli_query($link,$sql);
	header('Location: http://192.168.0.3/SW4/index.php');
	mysqli_close($link);
?>