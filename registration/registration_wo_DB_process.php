<?php
session_start(); //MUST have this on BOTH index and processing page or no bueno!

if(isset($_POST['action']) && $_POST['action'] == 'register') //this says if the pages are connecting correctly, continue to process the info.
{
	foreach ($_POST as $name => $value) //for each piece of submitted info, FIRST CHECK...
	{
		if(empty($value)) //is there anything in it? if not, return error message.
		{
			$_SESSION['error'][$name] = "Sorry, " . $name . " cannot be blank.<br>";

		}
		else
		{
			switch ($name) {        //these are condensed if/then checks. 
				case 'first_name':
				case 'last_name':
					if(is_numeric($value)) //make sure name has no numbers in it.
					{
						$_SESSION['error'][$name] = $name . " cannot contain numbers.<br>";
					}
					break;
				case 'email':
					if (!filter_var($value, FILTER_VALIDATE_EMAIL))  //this is a function to validate emails.
					{
						$_SESSION['error'][$name] = $name . " is not a valid email.<br>";
					} 
					break;
					case 'password':
						if (strlen($value) < 6) //make sure password has a length of more than 5 characters.
						{
							$_SESSION['error'][$name] = $name . " must be more than 5 characters.<br>";
						}
						break;
						case 'birthdate':
							$birthdate = explode('/', $value);  //first takes the date and separates it to check validity.
							if(!checkdate($birthdate[0], $birthdate[1], $birthdate[2])) //the index places to check.
							{	
								$_SESSION['error'][$name] = $name . ' is not a valid date.<br>';
							}
							elseif (strlen($value) < 6) //a double check not only that the date exists but that it is enough numbers to be complete.
							{
								$_SESSION['error'][$name] = $name . " is not a valid date.<br>";
							}
							break;
			}
		}
	}
	if ($_FILES['file']['error'] > 0) //if there are file errors...
	{
		$_SESSION['error']['file'] = "Error on file upload Return Code: " . $_FILES['file']['error'];
	}
	// else
	// {
	// 	$directory = 'upload/';
	// 	$_FILES['file']['name'];
	// 	$file_path = $directory . $file_name;
	// 	if (file_exists($file_path)) 
	// 	{
	// 		$_SESSION['error']['file'] = $file_name . " already exists";
	// 	}
	// 	else
	// 	{
	// 		if (!move_uploaded_file($_FILES['file']['tmp_name'], $file_path)) 
	// 		{
	// 			$_SESSION['error']['file'] = $file_name . " could not be saved.";
	// 		}
	// 	}
	//}	


	if(!isset($_SESSION['error']))  //if there are NO errors and all is GRAVY...
	{
		$_SESSION['success_message'] = "Thank You for submitting your information!";
	}
}
header('Location: registration_wo_DB.php'); //sends them back to the initial page.

?>