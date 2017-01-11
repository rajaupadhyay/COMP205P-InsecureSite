<?php
	include 'constants.php';
	session_start();
	$id = $_GET['newUsername'];
	if($_GET['oldPassword'] != "" && $_GET['newPassword'] != "" && $_GET['confirmNewPassword'] != ""){
		$sql = "SELECT Password FROM users WHERE Username = '". $id . "'";
		$result = mysqli_fetch_assoc(mysqli_query($link,$sql));
		if(!$result || $_GET['oldPassword'] != $result["Password"]){
			die("Could not perform the query: " . mysql_error());
		}
		$sql = "UPDATE users SET Password ='". $_GET['newPassword'] ."' WHERE Username = '". $id . "'";
		$result = mysqli_query($link,$sql);
		if(!$result){
			die("Could not perform the query: " . mysql_error());
		}
	}
	if($_GET['homepage'] != "" || $_GET['imageURL'] != "" || $_GET['profileColour'] != ""){
		if($_GET['homepage'] != ""){
			$sql = "UPDATE users SET URL ='". $_GET['homepage'] ."' WHERE Username = '". $id . "'";
			$result = mysqli_query($link,$sql);
			if(!$result){
				die("Could not perform the query: " . mysql_error());
			}
		}
		if($_GET['imageURL'] != ""){
			$sql = "UPDATE users SET imageURL ='". $_GET['imageURL'] ."' WHERE Username = '". $id . "'";
			$result = mysqli_query($link,$sql);
			if(!$result){
				die("Could not perform the query: " . mysql_error());
			}
		}
		if($_GET['profileColour'] != ""){
			$sql = "UPDATE users SET color ='". $_GET['profileColour'] ."' WHERE Username = '". $id . "'";
			$result = mysqli_query($link,$sql);
			if(!$result){
				die("Could not perform the query: " . mysql_error());
			}
		}
	}
	header('Location: http://localhost/SW4/snips.php?tempId='.$_SESSION["id"]);
	mysqli_close($link);
?>