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
									if(isset($_SESSION["loggedOn"]) && $_SESSION["id"] == $_GET["tempId"]){
										$temp = "SELECT Username FROM users where ID = ". $_SESSION['id'];	
										$user = mysqli_fetch_assoc(mysqli_query($link,$temp))['Username'];
										if(isset($_SESSION["snippet"]) && $_SESSION["snippet"] == 1)
		                                	echo '<li id="li6" class="menuLogin">New Snippet</li>';
				                        echo '<li id="li3" class="menuLogin">Settings</li>
											<li id="li4" class="menuLogin">Upload</li>
											<li id="li7" class="menuLogin">Logout</li>';
									}
									else if(isset($_SESSION["loggedOn"])){
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
								<label><b>Upload Image</b></label>
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
                        <?php
                        	echo '<input type="hidden" name="userID" id="userID" value="'. $_GET["tempId"] .'">';
                        ?>
                        <input class="logbutton" type="submit" id="submit8" name="submit8" value="Update Snippet">
                    </div>

                    <div class="container" style="background-color:#f1f1f1">
                        <button type="button" onclick="document.getElementById('id08').style.display='none'" class="logcancelbtn">Cancel</button>
                    </div>
                </form>
            </div>

            <div id="id11" class="modal">
						<form id="settingsForm1" class="modal-content animate" action="settings.php" method="GET">
    						<div class="imgcontainer">
      							<span onclick="document.getElementById('id11').style.display='none'" class="close" title="Close Modal">&times;</span>
								<div class = "avatarImage">
									<img src="" alt="Avatar" class="avatar" id="profilePic1">
								</div>
    						</div>

    						<div class="logcontainer">
								<label><b>Username</b></label>
      							<input type="text" placeholder="Current Username" name="newUsername" id="newUsername1" value="">
								<label><b>Old Password</b></label>
      							<input type="password" placeholder="Enter Current Password" name="oldPassword" id="oldPassword1" value="">
      							<label><b>New Password</b></label>
      							<input type="password" placeholder="Enter New Password" name="newPassword" id="newPassword1" value="">
								<label><b>Confirm New Password</b></label>
      							<input type="password" placeholder="Confirm New Password" name="confirmNewPassword" id="confirmNewPassword1" value="">
								<label><b>Homepage</b></label>
								<input type="text" placeholder="Homepage URL" name="homepage" id="homepage1" value="">
								<label><b>Image URL</b></label>
								<input type="text" placeholder="Image URL" name="imageURL" id="imageURL1" value="">
								<label><b>Profile Colour</b></label>
								<input type="text" placeholder="Profile Colour" name="profileColour" id="profileColour1" value="">
								<label><b>Private Snippet</b></label>
								<textarea id="privateSnippet1" name="privateSnippet" rows="4" style="resize: vertical" placeholder="Enter Snippet"></textarea>
								<?php
									echo '<input type="hidden" id="userId1" name="userId1" value="'. $_GET["tempId"] .'">';
								?>
      							<input class="logbutton" type="submit" id="submit4" name="submit4" value="Save">

    						</div>
    						<div class="container" style="background-color:#f1f1f1">
      							<button type="button" onclick="document.getElementById('id11').style.display='none'" class="logcancelbtn">Cancel</button>
    						</div>
  						</form>
					</div>
            <?php
            	$sql = "SELECT Username, color, imageURL, URL FROM users where ID=". $_GET["tempId"];
            	$result = mysqli_fetch_assoc(mysqli_query($link,$sql));
            	$name = $result["Username"];
            	$col = $result["color"];
            	$image = $result["imageURL"];
            	$url = $result["URL"];
            	echo '<div style="margin-left:20px;">';
            	if(isset($_SESSION["loggedOn"]) && $_GET["tempId"] != $_SESSION["id"] && isset($_SESSION["admin"]) && $_SESSION["admin"] == 1){
            		echo '<p id="li11"><b><i>Edit this profile...</i></b></p>';
            	}
            	echo '<img src="'. $image .'" alt="User Image" width = "100px">';
            	echo '<h2 style="color:'. $col .'">'. $name .'</h2>';
            	echo '<a href="'. $url .'">'. $name .'\'s Site</a>';
            	echo '<br><br>';
            	if(isset($_SESSION["loggedOn"]) && $_GET["tempId"] == $_SESSION["id"]){
					$sql = "SELECT privateSnippet FROM users WHERE ID = ". $_GET["tempId"] .";";
					$ps = mysqli_fetch_assoc(mysqli_query($link,$sql))["privateSnippet"];
					echo '<h5>Private Snippet:</h5>';
					echo '<p>'. $ps .'</p>';
				}
				echo '</div>';
            ?>
            <div class="content table-responsive table-full-width">
                    	<?php
							define('DB_TABLE', 'snippets');
							$sql = "SELECT * FROM ". DB_TABLE ." WHERE userID = ". $_GET["tempId"] .";";
							$result = mysqli_query($link,$sql);
							if(mysqli_num_rows($result) != 0){
								echo '<table class="table table-hover table-striped my-table" style="text-align: center">
                    <thead>
                        <th><center>ID</center></th>

                        <th><center>Snippet</center></th>

                        <th><center>Date Created</center></th>

                        <th><center>Edit/Delete</center></th>

                    </thead>
                    <tbody>';
								while($val = mysqli_fetch_assoc($result)){
								echo "<tr>";
								echo "<td>". $val["ID"] ."</td>";
								echo "<td id = ". $val["ID"] .">". $val["Text"] ."</td>";
								echo "<td>". $val["Date"] ."</td>";
								if((isset($_SESSION["loggedOn"]) && $_SESSION["id"] == $_GET["tempId"]) || isset($_SESSION["admin"]) && $_SESSION["admin"] == 1){
									echo '<td class="td-actions text-right">
	                                		<button type="button" id="edits" rel="tooltip" title="Edit Citation" class="btn btn-info btn-simple btn-xs" data-toggle="modal" data-target="#id08" data-id="'. $val["ID"] .'">
	                                        <i class="fa fa-edit"></i>
	                                    </button>
	                                    <form action="deleteSnippet.php" method="GET" style="display: inline-block;">
		                                    <input type="hidden" id="snipsId" name="snipsId" value="'. $val["ID"].'">
		                                    <input type="hidden" id="userId" name="userId" value="'. $_GET["tempId"] .'">
		                                    <button type="submit" id="rowDelete" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-xs">
		                                        <i class="fa fa-times"></i>
		                                    </button>
	                                    </form>
	                                	</td>';
	                                }
								}
								echo '</tbody></table>';
							}
							else{
								echo '<p><i>This user has no snippets...</i></p>';
							}
                    	?>

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
				$sql = "SELECT URL, imageURL FROM users where ID = ". $_GET["tempId"] .";";
				$result = mysqli_fetch_assoc(mysqli_query($link, $sql));
				$url = $result['URL'];
				$pp = $result['imageURL'];
				echo '<script>document.getElementById("site").setAttribute("href","'. $url .'");
				document.getElementById("profilePic").setAttribute("src","'. $pp .'");
				</script>';
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
				$("#submit4").click(function(){
					$('#settingsForm1').validate({
						rules: {
							newUsername1: {
								minlength: 2,
								required: true
							},
							confirmNewPassword1: {
								equalTo: "#newPassword1"
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
					document.getElementById('id11').style.display='none';
					document.getElementById('privateSnippet').innerHTML ='". $pText ."';
					document.getElementById('newUsername').setAttribute('value','". $user ."');
					document.getElementById('homepage').setAttribute('value','". $home ."');
					document.getElementById('imageURL').setAttribute('value','". $url ."');
					document.getElementById('profileColour').setAttribute('value','". $col ."');
					document.getElementById('profilePic').setAttribute('src','". $url ."');
					});
					$('#li4').click(function(){
						document.getElementById('id11').style.display='none';
						document.getElementById('id03').style.display='none';
						document.getElementById('id06').style.display='none';
						document.getElementById('id04').style.display='block';
						document.getElementById('id08').style.display='none';
					});
					$('#li6').click(function(){
						document.getElementById('id11').style.display='none';
						document.getElementById('id03').style.display='none';
						document.getElementById('id04').style.display='none';
						document.getElementById('id06').style.display='block';
						document.getElementById('id08').style.display='none';
					});
					$('#edits').click(function(){
						document.getElementById('id11').style.display='none';
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

 			<?php
				$sql = 'SELECT privateSnippet, Username, URL, imageURL, color FROM users WHERE ID='. $_GET["tempId"];
				$result = mysqli_fetch_assoc(mysqli_query($link, $sql));
				$pText = $result['privateSnippet'];
				$user = $result['Username'];
				$home = $result['URL'];
				$url = $result['imageURL'];
				$col = $result['color'];
				echo "<script>
					$('#li11').click(function(){
					document.getElementById('id04').style.display='none';
					document.getElementById('id06').style.display='none';
					document.getElementById('id11').style.display='block';
					document.getElementById('id03').style.display='none';
					document.getElementById('id08').style.display='none';
					document.getElementById('privateSnippet1').innerHTML ='". $pText ."';
					document.getElementById('newUsername1').setAttribute('value','". $user ."');
					document.getElementById('homepage1').setAttribute('value','". $home ."');
					document.getElementById('imageURL1').setAttribute('value','". $url ."');
					document.getElementById('profileColour1').setAttribute('value','". $col ."');
					document.getElementById('profilePic1').setAttribute('src','". $url ."');
					});
					</script>";
			?>


	</body>
</html>