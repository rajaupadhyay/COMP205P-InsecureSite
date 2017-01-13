<?php
	include 'constants.php';
	session_start();
	$sql = "SELECT ID FROM users";
	if($result = mysqli_query($link,$sql)){
		while($val = mysqli_fetch_assoc($result)){
			if(isset($_GET[$val["ID"] . "a"])){
				$sql = "UPDATE users SET Admin = 1 WHERE ID = ". $val["ID"];
				mysqli_query($link,$sql);
				if($val["ID"] == $_SESSION["id"])
					$_SESSION["admin"] = 1;
			}
			else{
				$sql = "UPDATE users SET Admin = 0 WHERE ID = ". $val["ID"];
				mysqli_query($link,$sql);
				if($val["ID"] == $_SESSION["id"])
					$_SESSION["admin"] = 0;
			}
			if(isset($_GET[$val["ID"]. "s"])){
				$sql = "UPDATE users SET snippetAccess = 1 WHERE ID = ". $val["ID"];
				mysqli_query($link,$sql);
				if($val["ID"] == $_SESSION["id"])
					$_SESSION["snippet"] = 1;
			}
			else{	
				$sql = "UPDATE users SET snippetAccess = 0 WHERE ID = ". $val["ID"];
				mysqli_query($link,$sql);
				if($val["ID"] == $_SESSION["id"])
					$_SESSION["snippet"] = 0;
			}
		}
	}
	header('Location: http://192.168.0.3/SW4/index.php');
?>