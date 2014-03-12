<?php  
session_start();
?>
<!doctype html>
<html>
	<head>
		<meta charset = "UTF-8">
		<title>Email Validation with DB</title>
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
			}
			elseif(isset($_SESSION['success_message']))
			{
				echo $_SESSION['success_message'];
			}

			?>
			<form action = "process.php" method = "post" >
				<input type = "hidden" name = "action" value = "register">
				<input type = "text" name = "email" placeholder = "email address">
				<input type = "submit" value = "Submit">

			</form>
		</body>
</html>
<?php
session_destroy();
?>