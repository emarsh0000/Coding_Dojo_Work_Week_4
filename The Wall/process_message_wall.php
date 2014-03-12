<?php
require('new-connection.php');
session_start();

if (isset($_POST['action']) && $_POST['action'] == 'message') 
{
	log_message($_POST);
}
elseif (isset($_POST['action']) && $_POST['action'] == 'comment') 
{
	log_comment($_POST);
}
else
{
	session_destroy();
	header('Location: success.wall.php');
	die();
}

function log_message($post)
{
	   if (strlen($_POST['message']) > 0)
        {
            $message = escape_this_string($_POST['message']);
            $query = "INSERT INTO messages(users_id, message, created_at, updated_at)
            VALUES ({$_SESSION['user_id']}, '" . $message . "', NOW(), NOW())";
            run_mysql_query($query);
            header("location: success.wall.php");
            exit();
        }
        else
        {
            header("location: wall.php");
            exit();
        }
}

function log_comment($post)
{
	   if (strlen($_POST['comment']) > 0)
        {
        	// var_dump($_POST);
            $comment = escape_this_string($_POST['comment']);
            $query = "INSERT INTO comments(messages_id, users_id, comment, created_at, updated_at)
            VALUES ({$_POST['messages_id']}, {$_SESSION['user_id']}, '" . $comment . "', NOW(), NOW())";
            run_mysql_query($query);
            header("location: success.wall.php");
            exit();
        }
        else
        {
            header("location: success.wall.php");
            exit();
        }

}
