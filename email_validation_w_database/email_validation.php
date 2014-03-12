<?php  
require('new-connection.php'); //this is the file needed to run a lot of stuff from mysql. Make sure its on each page.
session_start(); //must also be on each page.
?>
<!doctype html>
<html>
	<head>
		<meta charset = "UTF-8">
		<link rel = "stylesheet" type = "text/css" href = "email_validation.css">
		<title>Email Validation with DB and saved entries</title>
	</head>
		<body>
			<h1>Please enter your email address:<h1>
			<?php  
			if (isset($_SESSION['error']))
			{
				foreach ($_SESSION['error'] as $name => $message) 
				{
					echo $message;
				}
				unset($_SESSION['error']);
			}
			elseif(isset($_SESSION['success_message']))
			{
				echo $_SESSION['success_message'];
				unset($_SESSION['success_message']);
			}

			?>
			<form action = "email_validation_process.php" method = "post" >
				<input type = "hidden" name = "action" value = "register">
				<input type = "text" name = "email" placeholder = "email address">
				<input type = "submit" value = "Submit">
			</form>
					 
		</body>
</html>
