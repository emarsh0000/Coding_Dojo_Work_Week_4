<?php

if(count($_SESSION['errors']) > 0)




$first_name = escape_this_string($_POST['first_name']);
//repeat for each aspect

$query = "INSERT INTO users (first_name, etc.)
		  VALUES ('{first_name}', '{email}, etc, "

run_mysql_query($query);

//this above is for registration.

function login() 
$query = "SELECT * FROM users WHERE email = '{$email}'"
$user = fetch_all($query);
var_dump($user);
if(count($user) > 0))
{	
	 if ($user[0]['password'] == $_POST['password'])
	{
		echo
	}
}
//echo "welcome" . $_SESSION['first_name'];  This does Welcome Emily!
?>