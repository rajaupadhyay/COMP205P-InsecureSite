<?php 
	include 'constants.php';
	session_start();
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
									if(isset($_SESSION["loggedOn"])){
		                                echo '<li id="li6" class="menuLogin">New Snippet</li>
				                                <li class="menuLogin"><a id="site" href="">My Site</a></li>
				                                <li id="li3" class="menuLogin">Settings</li>
												<li id="li4" class="menuLogin">Upload</li>
												<li id="li7" class="menuLogin">Sign Out</li>';
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
      							<label><b>Username</b></label>
      							<input type="text" placeholder="Enter Username" id="logUsername" name="logUsername">
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
									<img src="images/img_avatar2.png" alt="Avatar" class="avatar">
								</div>
    						</div>

    						<div class="logcontainer">
								<label><b>Username</b></label>
      							<input type="text" placeholder="Current Username" name="newUsername" id="newUsername" required>
								<label><b>Old Password</b></label>
      							<input type="text" placeholder="Enter Current Password" name="oldPassword">
      							<label><b>New Password</b></label>
      							<input type="password" placeholder="Enter New Password" name="newPassword" id="newPassword">
								<label><b>Confirm New Password</b></label>
      							<input type="password" placeholder="Confirm New Password" name="confirmNewPassword" id="confirmNewPassword">
								<label><b>Homepage</b></label>
								<input type="text" placeholder="Homepage URL" name="homepage">
								<label><b>Image URL</b></label>
								<input type="text" placeholder="Image URL" name="imageURL">
								<label><b>Profile Colour</b></label>
								<input type="text" placeholder="Profile Colour" name="profileColour">
								<label><b>Private Snippet</b></label>
								<textarea id="snippet" name="snippet" rows="4" style="resize: vertical" placeholder="Enter Snippet"></textarea>
      							<input class="logbutton" type="submit" id="submit3" name="submit3" value="Save">

    						</div>

    						<div class="container" style="background-color:#f1f1f1">
      							<button type="button" onclick="document.getElementById('id03').style.display='none'" class="logcancelbtn">Cancel</button>
    						</div>
  						</form>
					</div>


					<div id="id04" class="modal">
						<form class="modal-content animate" action="">
    						<div class="imgcontainer">
      							<span onclick="document.getElementById('id04').style.display='none'" class="close" title="Close Modal">&times;</span>
    						</div>

    						<div class="logcontainer">
								<label><b>Upload Image</b></label>
								<input type="file" name="pic" accept="image/*">
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


            <div class="content table-responsive table-full-width">
                <table class="table table-hover table-striped my-table">
                    <thead>
                        <th>ID</th>

                        <th>Snippet</th>

                        <th>Date Created</th>


                    </thead>
                    <tbody>
                    	<?php
							define('DB_TABLE', 'snippets');
							$sql = "SELECT * FROM ". DB_TABLE ." WHERE userID = ". $_GET["tempId"] .";";
							if($result = mysqli_query($link,$sql)){
								while($val = mysqli_fetch_assoc($result)){
								echo "<tr>";
								echo "<td>". $val["ID"] ."</td>";
								echo "<td id = ". $val["ID"] .">". $val["Text"] ."</td>";
								echo "<td>01/01/2016</td>";
								if(isset($_SESSION["loggedOn"]) && $_GET["tempId"] == $_SESSION["id"]){
									echo '<td class="td-actions text-right">
	                                		<button type="button" id="edits" rel="tooltip" title="Edit Citation" class="btn btn-info btn-simple btn-xs" data-toggle="modal" data-target="#id08" data-id="'. $val["ID"] .'">
	                                        <i class="fa fa-edit"></i>
	                                    </button>
	                                    <form action="deleteSnippet.php" method="GET" style="display: inline-block;">
		                                    <input type="hidden" id="snipsId" name="snipsId" value="'. $val["ID"].'">
		                                    <input type="hidden" id="userId" name="userId" value="'. $_SESSION["id"].'">
		                                    <button type="submit" id="rowDelete" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-xs">
		                                        <i class="fa fa-times"></i>
		                                    </button>
	                                    </form>
	                                	</td>';
	                                }
								}
							}
                    	?>
                    </tbody>
                </table>

            </div>


		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>
			<script src="assets/js/jquery-validation-1.15.0/dist/jquery.validate.min.js"></script>









            <script src="assets/js/bootstrap.min.js" type="text/javascript"></script>



            <script src="assets/js/my-style.js"></script>

            <?php
				$sql = "SELECT URL FROM users where ID = ". $_GET["tempId"] .";";
				$url = mysqli_fetch_assoc(mysqli_query($link, $sql))['URL'];
				echo '<script>document.getElementById("site").setAttribute("href","'. $url .'");</script>';
			?>

            <script>
            	 $(document).on("click", "#edits", function (e) {
				    e.preventDefault();
				    var _self = $(this);	
				    var Id = _self.data('id');
				    var text = document.getElementById(Id).innerHTML;
				    document.getElementById("snippet1").innerHTML = text;
				    document.getElementById("snippetId").setAttribute("value",Id);
				});
            </script>


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




			<script>
			$('#li3').click(function(){
				document.getElementById('id04').style.display='none';
                document.getElementById('id06').style.display='none';
				document.getElementById('id03').style.display='block';
				document.getElementById('id08').style.display='none';
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
			</script>


	</body>
</html>
