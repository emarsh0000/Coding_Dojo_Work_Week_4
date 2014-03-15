<?php
require('new_connection_oop.php');
session_start();
// if (isset($_POST['action']) && $_POST['action'] == 'find_country') 
// {
	
// }
// else
// {
// 	session_destroy();
// 	header('Location: country_info.php');
// 	die();
// }

Class Country extends Database 
//this is grabing all the functions from new_connection_oop
{
	function grab_countries() //this will house the query since 'Class' has to have methods
	{ 
		$query = "SELECT countries.name FROM countries ORDER BY countries.name"; //select what you need from the database
		$_SESSION['countries'] = $this->fetch_all($query); //new variable that will store this grabbed info.
		// var_dump($countries); this showed us that we had correctly grabbed the countries.
		//return $countries; this will allow the info to be accessed outside the function. But is no longer needed b/c we have $_SESSION['countries'].
	}
	function grab_info_for_a_country()  //second step to grab all info for set country.
	{
		$query = "SELECT name, continent, region, population, life_expectancy, government_form FROM countries 
		          WHERE name = '{$_POST['countries']}'";
		$_SESSION['country_info'] = $this->fetch_all($query); //renamed new saving place for THIS info.
		header('Location: country_info.php');
		die();
	}
}

$single_country = new Country(); //made a new class.
$single_country->grab_countries(); //the new class is calling the function.
$single_country->grab_info_for_a_country(); //calling the 2nd function.





?>