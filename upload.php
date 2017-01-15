<?php
	include 'connection.php';
	session_start();
	$target_dir = "uploads/";
	$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
	$uploadOk = 1;
	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
	if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
		$sql = "INSERT INTO files (fileURL, userID) VALUES ('http://192.168.0.3/SW4/". $target_file ."', ". $_SESSION['id'] .");";
		mysqli_query($link,$sql);
        header('Location: http://192.168.0.3/SW4/uploadPage.php?link=http://192.168.0.3/SW4/' . $target_file .'');
    } else {
        header('Location: http://192.168.0.3/SW4/snips.php?tempId='. $_SESSION["id"] .'');
    }
?>