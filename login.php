<?php
	include 'constants.php';
	define('DB_TABLE', 'users');

	$username = $_GET['logUsername'];
	$password = $_GET['logPassword'];
	$sql = "SELECT * FROM " . DB_TABLE . " where Username = '" . $username . "' AND Password = '" . $password . "';";
	$result = mysqli_fetch_assoc(mysqli_query($link,$sql));
	if(!$result){
		header('Location: http://192.168.0.3/SW4/index.php');
		die();
	}
	if(isset($_GET["remember"])){
		setcookie('remember', $result["ID"], time() + (86400 * 30), "/");
	}
	session_start();
	$_SESSION["loggedOn"] = true;
	$sql = "SELECT ID, Admin, snippetAccess FROM users WHERE Username = '". $username . "';";
	$result = mysqli_fetch_assoc(mysqli_query($link, $sql));
	$_SESSION["id"] = $result["ID"];
	$_SESSION["admin"] = $result["Admin"];
	$_SESSION["snippet"] = $result["snippetAccess"];
	header('Location: http://192.168.0.3/SW4/index.php');
	mysqli_close($link);
?>