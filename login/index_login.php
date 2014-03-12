<?php  
session_start(); //starts to save entered info.
?>
<!doctype html>
<html>
	<head>
		<meta charset = "UTF-8">
		<link rel = "stylesheet" type = "text/css" href = "login.css"> <!-- connects stylesheet for css -->
		<title>Login and Registration</title>
	</head>
		<body>
			<?php
				if (isset($_SESSION['errors'])) 
				{
					foreach ($_SESSION['errors'] as $error) 
					{
						echo "<p class = 'error'> {$error} </p>";
					}
					unset($_SESSION['errors']);
				}
				if (isset($_SESSION['success_message'])) 
				{
					echo "<p class = 'success'> {$_SESSION['success_message']} </p>";
					unset($_SESSION['success_message']);
				}

			?>
			<h2>Register</h2>
			<h5>Please enter your information below:<h5>
				<form action = "process_login.php" method = "post">
				<input type = "hidden" name = "action" value = "register">  <!-- user won't see but sends a verification to process page -->
				First Name: <input type = "text" name = "first_name"><br>
				Last Name: <input type = "text" name = "last_name"><br>
				Email: <input type = "text" name = "email"><br>
				Password: <input type = "password" name = "password"><br>
				Confirm Password: <input type = "password" name = "confirm_password"><br>
				<input type = "submit" value = "register"> <!-- This sends the info when done -->
			</form>
			<h2>Login</h2>
			<form action = 'process_login.php' method = "post">  <!-- These are two separate forms that can be submitted separately -->
				<input type = "hidden" name = "action" value = "login">  <!-- user won't see but sends a verification to process page -->
				Email Address: <input type = "text" name = "email"><br>
				Password: <input type = "password" name = "password"><br>
				<input type = "submit" value = "register"> <!-- This sends the info when done -->
			</form>




		</body>
</html>