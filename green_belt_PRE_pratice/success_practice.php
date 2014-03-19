<?php
require('new-connection.php');
session_start();
echo "You Registered Successfully! Hey {$_SESSION['first_name']}!";
echo "<a href = 'practice/index_practice.php'> LOG OFF </a>";
 ?>

?>