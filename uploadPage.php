<?php 
	include 'connection.php';
	session_start();
?>

<html>
	<head>
		<title>hacKSeRVer</title>
		<meta charset="utf-8" />
		<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
	<body>

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Header -->
					<header id="header">
						<h1><a href="index.php">hacKSeRVer</a></h1>
						<nav class="links">
							<ul>
								<li class="menuLogin"></li>
								<?php
									if(isset($_SESSION["admin"]) && $_SESSION["admin"] == 1){
										echo "<li class='menuLogin'><a href='admin.php'><font size='2'>Admin</font></a></li>";
									}
									if(isset($_SESSION["loggedOn"])){
										$temp = "SELECT Username FROM users where ID = ". $_SESSION['id'];	
										$user = mysqli_fetch_assoc(mysqli_query($link,$temp))['Username'];
										echo "<li class='menuLogin'><a href='snips.php?tempId=". $_SESSION["id"] ."'><font size='2'>". $user ."</font></a></li>";
										echo "<li id='li7' class='menuLogin'>Logout</li>";
									}
									else{
										echo '<li id="li1" class="menuLogin">login</li>';
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
      							<input type="checkbox" name="remember" value="yeah" checked> Remember me
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

					<div id="id03" class="modal">
						<form id="settingsForm" class="modal-content animate" action="settings.php" method="GET">
    						<div class="imgcontainer">
      							<span onclick="document.getElementById('id03').style.display='none'" class="close" title="Close Modal">&times;</span>
								<div class = "avatarImage">
									<img src="" alt="Avatar" class="avatar" id="profilePic">
								</div>
    						</div>

    						<div class="logcontainer">
								<label><b>Username</b></label>
      							<input type="text" placeholder="Current Username" name="newUsername" id="newUsername" value="">
								<label><b>Old Password</b></label>
      							<input type="password" placeholder="Enter Current Password" name="oldPassword" id="oldPassword" value="">
      							<label><b>New Password</b></label>
      							<input type="password" placeholder="Enter New Password" name="newPassword" id="newPassword" value="">
								<label><b>Confirm New Password</b></label>
      							<input type="password" placeholder="Confirm New Password" name="confirmNewPassword" id="confirmNewPassword" value="">
								<label><b>Homepage</b></label>
								<input type="text" placeholder="Homepage URL" name="homepage" id="homepage" value="">
								<label><b>Image URL</b></label>
								<input type="text" placeholder="Image URL" name="imageURL" id="imageURL" value="">
								<label><b>Profile Colour</b></label>
								<input type="text" placeholder="Profile Colour" name="profileColour" id="profileColour" value="">
								<label><b>Private Snippet</b></label>
								<textarea id="privateSnippet" name="privateSnippet" rows="4" style="resize: vertical" placeholder="Enter Snippet"></textarea>
      							<input class="logbutton" type="submit" id="submit3" name="submit3" value="Save">

    						</div>

    						<div class="container" style="background-color:#f1f1f1">
      							<button type="button" onclick="document.getElementById('id03').style.display='none'" class="logcancelbtn">Cancel</button>
    						</div>
  						</form>
					</div>


					<div id="id04" class="modal">
						<form class="modal-content animate" action="upload.php" method="post" enctype="multipart/form-data">
    						<div class="imgcontainer">
      							<span onclick="document.getElementById('id04').style.display='none'" class="close" title="Close Modal">&times;</span>
    						</div>

    						<div class="logcontainer">
								<label><b>Upload File</b></label>
								<input type="file" name="fileToUpload" id="fileToUpload">
      							<input class="logbutton" type="submit" value="Submit">
    						</div>

    						<div class="container" style="background-color:#f1f1f1">
      							<button type="button" onclick="document.getElementById('id04').style.display='none'" class="logcancelbtn">Cancel</button>
    						</div>
  						</form>
					</div>

			</div>


            <div id="id06" class="modal">
                <form id="newSnippet" class="modal-content animate" action="addSnippet.php" method="GET">
                    <div class="imgcontainer">
                        <span onclick="document.getElementById('id06').style.display='none'" class="close" title="Close Modal">&times;</span>
                    </div>

                    <div class="logcontainer">
                        <label><b>Snippet</b></label>
                        <textarea id="snippet" name="snippet" rows="4" style="resize: vertical" placeholder="Enter Snippet"></textarea>
                        <!-- <input class="resizable" type="text" placeholder="Snippet" name="snippet" id="snippet" required> -->
                        <input class="logbutton" type="submit" id="submit6" name="submit6" value="Add Snippet">
                    </div>

                    <div class="container" style="background-color:#f1f1f1">
                        <button type="button" onclick="document.getElementById('id06').style.display='none'" class="logcancelbtn">Cancel</button>
                    </div>
                </form>
            </div>

            <div id="id08" class="modal">
                <form id="updateSnippet" class="modal-content animate" action="editSnippet.php" method="GET">
                    <div class="imgcontainer">
                        <span onclick="document.getElementById('id08').style.display='none'" class="close" title="Close Modal">&times;</span>
                    </div>

                    <div class="logcontainer">
                        <label><b>Snippet</b></label>
                        <textarea id="snippet1" name="snippet1" rows="4" style="resize: vertical"></textarea>
                        <!-- <input class="resizable" type="text" placeholder="Snippet" name="snippet" id="snippet" required> -->
                        <input type="hidden" name="snippetId" id="snippetId" value="">
                        <input class="logbutton" type="submit" id="submit8" name="submit8" value="Update Snippet">
                    </div>

                    <div class="container" style="background-color:#f1f1f1">
                        <button type="button" onclick="document.getElementById('id08').style.display='none'" class="logcancelbtn">Cancel</button>
                    </div>
                </form>
            </div>




				<!-- Main -->
					<div id="main">

						<!-- Post -->
							<article class="post">
								<header>
									<div class="title">
										<h2>UPLOAD SUCCESSFUL</h2>
										<?php
											echo '<p><a href="'. $_GET["link"] .'" target="_blank">Click here to see your upload</a></p>'
										?>
									</div>

								</header>

							</article>

					</div>




						<!-- About -->


						<!-- Footer -->


					</section>

			</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>
			<script src="assets/js/jquery-validation-1.15.0/dist/jquery.validate.min.js"></script>

			<?php
				$sql = "SELECT URL, imageURL FROM users where ID = ". $_SESSION["id"] .";";
				$result = mysqli_fetch_assoc(mysqli_query($link, $sql));
				$url = $result['URL'];
				$pp = $result['imageURL'];
				echo '<script>document.getElementById("site").setAttribute("href","'. $url .'");
				document.getElementById("profilePic").setAttribute("src","'. $pp .'");
				</script>';
			?>

			<script>
			$(function() {
				$("#submit3").click(function(){
					$('#settingsForm').validate({
						rules: {
							newUsername: {
								minlength: 2,
								required: true
							},
							confirmNewPassword: {
								equalTo: "#newPassword"
							},
						},
					});
				});
			});
			</script>

            <script>
			$(function() {
				$("#submit6").click(function(){
					$('#newSnippet').validate({
						rules: {
							snippet: {
								required: true
							},
						},
					});
				});
			});
			</script>

			 <script>
			$(function() {
				$("#submit8").click(function(){
					$('#updateSnippet').validate({
						rules: {
							snippet1: {
								required: true
							},
						},
					});
				});
			});
			</script>

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
			</script>



			<?php
			if(isset($_SESSION["id"])){
				$sql = 'SELECT privateSnippet, Username, URL, imageURL, color FROM users WHERE ID='. $_SESSION["id"];
				$result = mysqli_fetch_assoc(mysqli_query($link, $sql));
				$pText = $result['privateSnippet'];
				$user = $result['Username'];
				$home = $result['URL'];
				$url = $result['imageURL'];
				$col = $result['color'];
				echo "<script>
				$('#li3').click(function(){
					document.getElementById('id04').style.display='none';
					document.getElementById('id06').style.display='none';
					document.getElementById('id03').style.display='block';
					document.getElementById('id08').style.display='none';
					document.getElementById('privateSnippet').innerHTML ='". $pText ."';
					document.getElementById('newUsername').setAttribute('value','". $user ."');
					document.getElementById('homepage').setAttribute('value','". $home ."');
					document.getElementById('imageURL').setAttribute('value','". $url ."');
					document.getElementById('profileColour').setAttribute('value','". $col ."');
					});
					$('#li4').click(function(){
						document.getElementById('id03').style.display='none';
						document.getElementById('id06').style.display='none';
						document.getElementById('id04').style.display='block';
						document.getElementById('id08').style.display='none';
					});
					$('#li6').click(function(){
						document.getElementById('id03').style.display='none';
						document.getElementById('id04').style.display='none';
						document.getElementById('id06').style.display='block';
						document.getElementById('id08').style.display='none';
					});
					$('#edits').click(function(){
						document.getElementById('id03').style.display='none';
						document.getElementById('id04').style.display='none';
						document.getElementById('id06').style.display='none';
						document.getElementById('id08').style.display='block';
					});
					$('#li7').click(function(){
						location.href = 'logout.php';
					});
				</script>";
			}
			?>

	</body>
</html>
