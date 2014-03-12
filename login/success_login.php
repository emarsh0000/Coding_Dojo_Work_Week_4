<?php 
	session_start();
	echo "Hey {$_SESSION['first_name']}!";
	echo "<a href = 'process_login.php'> LOG OFF </a>";

 ?>