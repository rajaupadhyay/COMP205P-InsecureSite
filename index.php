<?php
	include 'constants.php';
	session_start();
	if(isset($_COOKIE['remember'])){
		$_SESSION["loggedOn"] = true;
		$sql = "SELECT ID, Admin, snippetAccess FROM users WHERE ID = '". $_COOKIE["remember"] . "';";
		$result = mysqli_fetch_assoc(mysqli_query($link, $sql));
		$_SESSION["id"] = $result["ID"];
		$_SESSION["admin"] = $result["Admin"];
		$_SESSION["snippet"] = $result["snippetAccess"];
	}
?>
<html>
	<head>
		<title>COMP205P</title>
		<meta charset="utf-8" />
		<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />

		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
	</head>
	<body>

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Header -->
					<header id="header">
						<h1><a href="index.php">COMP205P</a></h1>
						<nav class="links">
							<ul>
							<li class="menuLogin"></li>
							<?php
								if(isset($_SESSION["admin"]) && $_SESSION["admin"] == 1){
									echo "<li class='menuLogin'><a href='admin.php'><font size='2'>Admin</font></a></li>";
								}
								if(isset($_SESSION["loggedOn"])){
									$temp = "SELECT Username FROM users where ID = ". $_SESSION["id"];	
									$user = mysqli_fetch_assoc(mysqli_query($link,$temp))['Username'];
									echo "<li class='menuLogin'><a href='snips.php?tempId=". $_SESSION["id"] ."'><font size='2'>". $user ."</font></a></li>";
									echo "<li id='li7' class='menuLogin'>Logout</li>";
								}
								else{
									echo '<li id="li1" class="menuLogin">Login</li>';
									echo '<li id="li2" class="menuLogin">Sign Up</li>';
								}
							?>
							</ul>
						</nav>
					</header>

					<div id="id01" class="modal">
						<form id="logForm" class="modal-content animate" action="login.php" method="GET">
    						<div class="imgcontainer">
      							<span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
      							<img src="images/img_avatar2.png" alt="Avatar" class="avatar">
    						</div>

    						<div class="logcontainer">
      							<label><b>Email</b></label>
      							<input type="text" placeholder="Enter Email" id="logEmail" name="logEmail">
      							<label><b>Password</b></label>
      							<input type="password" placeholder="Enter Password" id="logPassword" name="logPassword">

      							<input class="logbutton" type="submit" id="submit1" name="submit1" value="Login">
      							<input type="checkbox" name="remember" id="remember" value="yeah" checked> Remember me
    						</div>

    						<div class="container" style="background-color:#f1f1f1">
      							<button type="button" onclick="document.getElementById('id01').style.display='none'" class="logcancelbtn">Cancel</button>
      						<span class="psw" style="padding-right: 20px;"> <a href="#" id="forgotPassword">Forgot Password</a></span>
    						</div>
  						</form>
					</div>

					<div id="id02" class="modal">
						<form id="signUpForm" class="modal-content animate" action="signup.php" method="GET">
    						<div class="imgcontainer">
      							<span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
      							<img src="images/img_avatar2.png" alt="Avatar" class="avatar">
    						</div>

    						<div class="logcontainer">
      							<label><b>Username</b></label>
      							<input type="text" placeholder="Enter Username" id="username" name="username">
								<label><b>Email</b></label>
      							<input type="text" placeholder="Enter Email" id="email" name="email">
      							<label><b>Password</b></label>
      							<input type="password" placeholder="Enter Password" class="form-control" id="password" name="password">
								<label><b>Confirm Password</b></label>
      							<input type="password" placeholder="Re-Enter Password" class="form-control" id="confirmPassword" name="confirmPassword">

      							<input class="logbutton" type="submit" id="submit2" name="submit2" value="SignUp">

    						</div>

    						<div class="container" style="background-color:#f1f1f1">
      							<button type="button" onclick="document.getElementById('id02').style.display='none'" class="logcancelbtn">Cancel</button>
    						</div>
  						</form>
					</div>


					<div id="id05" class="modal">
						<form id="forgotPasswordForm" class="modal-content animate" action="">
    						<div class="imgcontainer">
      							<span onclick="document.getElementById('id05').style.display='none'" class="close" title="Close Modal">&times;</span>
    						</div>

    						<div class="logcontainer">
								<label><b>Enter email</b></label>
								<input type="text" placeholder="Email" name="passResetEmail" id="passResetEmail">
      							<input class="logbutton" type="submit" id="submit5" name="submit5" value="Send Password Reset Request">

    						</div>

    						<div class="container" style="background-color:#f1f1f1">
      							<button type="button" onclick="document.getElementById('id05').style.display='none'" class="logcancelbtn">Cancel</button>
    						</div>
  						</form>
					</div>


				<!-- Main -->
					<div id="main">
					<h1>Home</h1>
					<?php
						$sql = "SELECT * FROM users;";
						if($result = mysqli_query($link,$sql)){
								while($val = mysqli_fetch_assoc($result)){
									$temp = "SELECT MAX(ID) id FROM snippets WHERE userID = ". $val['ID'];
									$maxid = mysqli_fetch_assoc(mysqli_query($link,$temp))['id'];
									$temp = "SELECT URL, color, imageURL FROM users where ID = ". $val['ID'];	
									$result1 = mysqli_fetch_assoc(mysqli_query($link,$temp));
									$url = $result1['URL'];
									$col = $result1['color'];
									$image = $result1['imageURL'];
									if(isset($maxid)){
										$temp = "SELECT * FROM snippets WHERE ID = ". $maxid;
										$result2 = mysqli_fetch_assoc(mysqli_query($link,$temp));
										$text = $result2['Text'];
										$date = $result2['Date'];
										echo '<article class="post">
										<header>
											<div class="title" style="display:inline;">
												<img style="display:inline;" src="'. $image .'" width="30px">
												<h2 style="color:'. $col .';display:inline;margin-left:20px;"><a href="snips.php?tempId='. $val["ID"] .'">'. $val["Username"] .'</a></h2>
												<br>
												<p><a href="'. $url .'">'. $val["Username"] .'\'s Site</a></p>
											</div>
										</header>

										<h2>'. $text .'</h2>
										<p><i>@ '. $date  .'</i></p>

										</article>';
									}
									else{
										echo '<article class="post">
										<header>
											<div class="title">
												<img style="display:inline;" src="'. $image .'" width="30px">
												<h2 style="color:'. $col .';display:inline;margin-left:20px;"><a href="snips.php?tempId='. $val["ID"] .'">'. $val["Username"] .'</a></h2>
												<br>
												<p><a href="'. $url .'">'. $val["Username"] .'\'s Site</a></p>
											</div>

										</header>

										<h2></h2>
										<p><i></i></p>

										</article>';
									}
								}
							}
					?>
					</div>
					</section>

			</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>
			<script src="assets/js/jquery-validation-1.15.0/dist/jquery.validate.min.js"></script>

			<script>
			$(function() {
				$("#submit1").click(function(){
					$('#logForm').validate({
						rules: {
							logUsername: {
								required: true
							},
							logPassword: {
								required: true
							}
						},
					});
				});
			});
			</script>

			<script>
			$(function() {
				$("#submit2").click(function(){
					$('#signUpForm').validate({
						rules: {
							username: {
								minlength: 2,
								required: true
							},
							email: {
								required: true,
								email: true
							},
							password: {
								minlength: 2,
								required: true
							},
							confirmPassword: {
								required: true,
								equalTo: "#password"
							}
						},
					});
				});
			});
			</script>

			<script>
			$(function() {
				$("#submit5").click(function(){
					$('#forgotPasswordForm').validate({
						rules: {
							passResetEmail: {
								required: true,
								email: true
							}
						},
					});
				});
			});
			</script>

			<script>
			$('#li1').click(function(){
				document.getElementById('id02').style.display='none';
				document.getElementById('id01').style.display='block';
			});
			$('#li2').click(function(){
				document.getElementById('id01').style.display='none';
				document.getElementById('id02').style.display='block';
			});
			$('#forgotPassword').click(function(){
				document.getElementById('id05').style.display='block';
			});
			$('#li7').click(function(){
				location.href = 'logout.php';
			});
			</script>


	</body>
</html>
