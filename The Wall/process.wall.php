<?php
require('new-connection.php');
session_start();

if (isset($_POST['action']) && $_POST['action'] == 'register') 
{
	register_user($_POST);
}
elseif (isset($_POST['action']) && $_POST['action'] == 'login') 
{
	login_user($_POST);
}
else
{
	session_destroy();
	header('Location: index.wall.php');
	die();
}

function register_user($post)  //this is just a variable not the actual info. ($post) 
{     //Below are the validation error checks.
	$_SESSION['errors'] = array();

	if(empty($post['first_name'])) 
	{
		$_SESSION['errors'][] = "First Name cannot be blank.";
	}
	if(empty($post['last_name'])) 
	{
		$_SESSION['errors'][] = "Last Name cannot be blank.";
	}
	if(empty($post['password'])) 
	{
		$_SESSION['errors'][] = "Password field is required.";
	}
	if(strlen($post['password']) < 5)
	{
		$_SESSION['errors'][] = "Password must be greater than 5 characters";
	}
	if($post['password'] !== $post['confirm_password'])
	{
		$_SESSION['errors'][] = "Passwords must match.";
	}
	if(!filter_var($post['email'], FILTER_VALIDATE_EMAIL))
	{
		$_SESSION['errors'][] = "Please use a valid email address";
	}
//end of validations---------------------------
	if(count($_SESSION['errors']) > 0) //if there are any errors...
	{
		header('Location: index.wall.php');
		die();
	}
	else //now you need to insert the data into the database.
	{
		$query = "INSERT INTO users (first_name, last_name, password, email, created_at, updated_at)
				  VALUES ('{$post['first_name']}', '{$post['last_name']}', '{$post['password']}', '{$post['email']}', 
				  NOW(), NOW())";
		run_mysql_query($query);
		login_user($post);
		$_SESSION['success_message'] = "User successfully Registered!";
		header('Location: success.wall.php');
		die();
	}
}
function login_user($post)
{
	$query = "SELECT * FROM users WHERE users.password = '{$post['password']}' AND users.email = '{$post['email']}'";
	$user = fetch_all($query); //go and attempt to grab user with above credentials.

	if (count($user) > 0) 
	{
		$_SESSION['user_id'] = $user[0]['id'];
		$_SESSION['first_name'] = $user[0]['first_name'];
		$_SESSION['logged_in'] = TRUE;	
		header('Location: success.wall.php');
		die;
	}
	else
	{
		$_SESSION['errors'][] = "User does not exist or cannot be found.";
		header('Location: index.wall.php');
		die();
	}
}








?>