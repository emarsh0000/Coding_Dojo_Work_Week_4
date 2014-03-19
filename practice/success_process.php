<?php
require('new-connection.php');
session_start();

if (isset($_POST['action']) && $_POST['action'] == 'register') 
{
	grab_expenses($_POST);
}
else
{
	header('Location: /practice/success_expense.php');
	die();
}

log_expense($post);


function log_expense($post)
{
	   if(!empty($post['amount']))
        {
            $expenses = escape_this_string($_POST['amount']);
            $query = "INSERT INTO expenses(user_id, amount, description, created_at, updated_at, date_occurred)
                      VALUES ({$_SESSION['user_id']}, '" . $expenses . "', NOW(), NOW())";
            run_mysql_query($query);
            grab_expenses();
            header("location: success_expense.php");
            exit();
        }
        else
        {
        	$_SESSION['errors'][] = "Please completely fill out the form.";
            header("location: success_expense.php");
            exit();
        }
}

function grab_expenses($post)  //second step to grab all info.
{
	$query = "SELECT name, description, amount FROM expenses 
		      WHERE email = '{$_POST['email']}'";
	$grab_history = fetch_all($query); //renamed new saving place for THIS info.
	header('Location: success_expense.php');
	die();
}

// header("location: success_expense.php");



?>