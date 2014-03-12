<?php  
session_start(); //starts to save entered info.
?>
<!doctype html>
<html>
	<head>
		<meta charset = "UTF-8">
		<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css"> <!--bootstrap-->
		<link rel = "stylesheet" type = "text/css" href = "wall.css"> <!-- connects stylesheet for css --> 
		<title>Login and Registration</title>
	</head>
		<body>
			<div class = 'row'>
				<span>*  Emily  Book  *</span>
				<input type = 'search' placeholder = 'search' class = 'search_bar'> 
				<button type = "button" class = 'search_bar'>
  					<span class = "glyphicon glyphicon-search"></span> <!--this is the bootstrap mag. glass-->
				</button>
			</div>
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
			<h1>Welcome!</h1>
			<h3>Please Register here or Login Below</h3>
			<h5>Enter your information below:<h5>
				<form action = "process.wall.php" method = "post">
				<input type = "hidden" name = "action" value = "register">  <!-- user won't see but sends a verification to process page -->
				First Name: <input type = "text" name = "first_name"><br>
				Last Name: <input type = "text" name = "last_name"><br>
				Email: <input type = "text" name = "email"><br>
				Password: <input type = "password" name = "password"><br>
				Confirm Password: <input type = "password" name = "confirm_password"><br>
				<label class = "btn btn-warning">Register!
					<input type = "submit" class = "hidden"> 
				</label> <!--this sets up your button-->
			</form>
			<h2>Login</h2>
			<form action = "process.wall.php" method = "post">  <!-- These are two separate forms that can be submitted separately -->
				<input type = "hidden" name = "action" value = "login">  <!-- user won't see but sends a verification to process page -->
				Email Address: <input type = "text" name = "email"><br>
				Password: <input type = "password" name = "password"><br>
				<label class = "btn btn-danger">Login!
					<input type = "submit" class = "hidden"> 
				</label>  
			</form>




		</body>
</html>