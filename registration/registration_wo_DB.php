<?php  
session_start(); //starts to save entered info.
?>
<!doctype html>
<html>
	<head>
		<meta charset = "UTF-8">
		<link rel = "stylesheet" type = "text/css" href = "registration_wo_DB.css"> <!-- connects stylesheet for css -->
		<title>Registration without DB</title>
	</head>
		<body>
			<h5>Please enter your information below:<h5>

			<?php  
			if (isset($_SESSION['error'])) //if there are errors...(This will be the go-to for ANYTHING that has an error.)
			{
				foreach ($_SESSION['error'] as $name => $message) //each time there is ANY error, play message to user.
				{
					echo $message;
				}
			}
			elseif(isset($_SESSION['success_message'])) //if no errors, send 'yay' message.
			{
				echo $_SESSION['success_message'];
			}

			?>
			
			<form action = "registration_wo_DB_process.php" method = "post" enctype = "multipart/form-data"> <!-- This will send the info to the processing page. the enctype is only needed for uploading files. -->
				<input type = "hidden" name = "action" value = "register">  <!-- user won't see but sends a verification to process page -->
				<input type = "text" name = "first_name" placeholder = "Enter First Name">
				<input type = "text" name = "last_name" placeholder = "Enter Last">
				<input type = "text" name = "email" placeholder = "Enter Email">
				<input type = "password" name = "password" placeholder = "Password">
				<input type = "text" name = "birthday" placeholder = "Birthday MM/DD/YYYY">
				<label id = 'form1'><input type = "file" name = "file" placeholder = "Profile Pic Upload"> <!-- PAY ATTENTION TO THE INPUT TYPE! SOME NEED SPECIFIC FORMS! -->
				</label> <!-- this is so we can space the items apart in css later -->
				<input type = "submit" value = "Submit"> <!-- This sends the info when done -->
			</form>
		</body>
</html>

<?php
session_destroy(); //once page is finished running, info won't be saved.
?>