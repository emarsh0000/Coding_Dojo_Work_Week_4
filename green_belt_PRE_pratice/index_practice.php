<?php
require('new-connection.php');
session_start();
?>
<!doctype html>
<html>
	<head>
		<meta charset = "UTF-8">
		<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css"> <!--bootstrap-->
		<link rel = "stylesheet" type = "text/css" href = "green_belt.css"> <!-- connects stylesheet for css --> 
		<title>Green Belt Test! Dream Journal</title>
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
		 <div class = 'Header'>
		 	<h1>What Are Your Dreams?</h1>
		 	<h3>(First! Let's Login or Register)</h3>
		 	<h2>Register</h2>
		 	<form action = "/practice_process.php" method = "post">
		 		<input type = "hidden" name = "action" value = "register"> <!-- user won't see but sends info to process -->
		 		First Name: <input type = "text" name = "first_name"><br>
		 		Last Name: <input type = "text" name = "last_name"><br>
		 		Email: <input type = "text" name = "email"><br>
		 		Password: <input type = "password" name = "password"><br>
		 		Confirm Password: <input type = "password" name = "confirm_password"><br>
		 		<label class = "btn btn-warning">REGISTER BOO-YA!
		 			<input type = "submit" class = "hidden">
		 		</label>
		 	</form>	
		 </div>
		 <div id = "login">
		 	<h2>Login</h2>
			<form action = "/practice_process.php" method = "post">  <!-- These are two separate forms that can be submitted separately -->
				<input type = "hidden" name = "action" value = "login">  <!-- user won't see but sends a verification to process page -->
				Email Address: <input type = "text" name = "email"><br>
				Password: <input type = "password" name = "password"><br>
				<label class = "btn btn-danger">Login!
					<input type = "submit" class = "hidden"> 
				</label>  
			</form>
		</div>
		</body>
</html>