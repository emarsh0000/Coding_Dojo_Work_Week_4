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
	header('Location: /practice/index_expense.php');
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
	if(empty($post['budget'])) 
	{
		$_SESSION['errors'][] = "Starting budget amount is required.";
	}
//end of validations---------------------------
	if(count($_SESSION['errors']) > 0) //if there are any errors...
	{
		header('Location: /practice/index_expense.php');
		die();
	}
	else //now you need to insert the data into the database.
	{
		$query = "INSERT INTO users (first_name, last_name, password, email, created_at, updated_at, budget)
				  VALUES ('{$post['first_name']}', '{$post['last_name']}', '{$post['password']}', '{$post['email']}', 
				  NOW(), NOW(), '{$post['budget']}')";
		run_mysql_query($query);

		login_user($post); //this is calling the login function. So after the person is inserted, it will then log them in.
		grab_expenses($post);
		$_SESSION['success_message'] = "User successfully Registered!";
		header('Location: success_expense.php');
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
		header('Location: success_expense.php');
		die;
	}
	else
	{
		$_SESSION['errors'][] = "User does not exist or cannot be found.";
		header('Location: /practice/index_expense.php');
		die();
	}
}

function grab_expenses()  //second step to grab all info.
{
	$query = "SELECT name, description, amount FROM expenses 
		      WHERE email = '{$_POST['email']}'";
	$grab_history = fetch_all($query); //renamed new saving place for THIS info.
	header('Location: success_expense.php');
	die();
}

?>