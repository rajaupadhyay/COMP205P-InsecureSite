<?php
	include 'constants.php';
	session_start();
	$id = $_GET["newUsername"];
	if(isset($_GET["userId1"]) && $_GET["userId1"]!="")
		$sql = "SELECT Username FROM users WHERE ID = '". $_GET["userId1"] . "'";
	else
		$sql = "SELECT Username FROM users WHERE ID = '". $_SESSION["id"] . "'";
	$result = mysqli_fetch_assoc(mysqli_query($link,$sql))["Username"];
	if($id != $result){
		if(isset($_GET["userId1"]) && $_GET["userId1"]!="")
			$sql = "UPDATE users SET Username ='". $id ."' WHERE ID = '". $_GET["userId1"] . "'";
		else
			$sql = "UPDATE users SET Username ='". $id ."' WHERE ID = '". $_SESSION["id"] . "'";
		mysqli_query($link,$sql);
	}
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
	if((isset($_GET['homepage']) && $_GET['homepage'] != "") || (isset($_GET['imageURL']) && $_GET['imageURL'] != "") || (isset($_GET['profileColour']) && $_GET['profileColour'] != "") || (isset($_GET['privateSnippet']) && $_GET['privateSnippet'] != "")){
		if(isset($_GET['homepage']) && $_GET['homepage'] != ""){
			$sql = "UPDATE users SET URL ='". $_GET['homepage'] ."' WHERE Username = '". $id . "'";
			$result = mysqli_query($link,$sql);
			if(!$result){
				die("Could not perform the query: " . mysql_error());
			}
		}
		if(isset($_GET['imageURL']) && $_GET['imageURL'] != ""){
			$sql = "UPDATE users SET imageURL ='". $_GET['imageURL'] ."' WHERE Username = '". $id . "'";
			$result = mysqli_query($link,$sql);
			if(!$result){
				die("Could not perform the query: " . mysql_error());
			}
		}
		if(isset($_GET['profileColour']) && $_GET['profileColour'] != ""){
			$sql = "UPDATE users SET color ='". $_GET['profileColour'] ."' WHERE Username = '". $id . "'";
			$result = mysqli_query($link,$sql);
			if(!$result){
				die("Could not perform the query: " . mysql_error());
			}
		}
		if(isset($_GET['privateSnippet']) && $_GET['privateSnippet'] != ""){
			$sql = "UPDATE users SET privateSnippet ='". $_GET['privateSnippet'] ."' WHERE Username = '". $id . "'";
			$result = mysqli_query($link,$sql);
			if(!$result){
				die("Could not perform the query: " . mysql_error());
			}
		}
	}
	if(isset($_GET["userId1"]) && $_GET["userId1"]!="")
		header('Location: http://192.168.0.3/SW4/snips.php?tempId='. $_GET["userId1"]);
	else
		header('Location: http://192.168.0.3/SW4/snips.php?tempId='. $_SESSION["id"]);
	mysqli_close($link);
?>