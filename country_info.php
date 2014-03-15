<?php 
session_start();
require('new_connection_oop.php');
$emily = new Database("world");
//var_dump($_SESSION['country_info']); //this was just to see if we pulled the info onto the index page correctly.
 ?>
 <!doctype html>
<html>
	<head>
		<meta charset = "UTF-8">
		<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css"> <!--bootstrap-->
		<link rel = "stylesheet" type = "text/css" href = "country.css"> <!-- connects stylesheet for css --> 
		<title>Countries</title>
	</head>
		<body>
			<div>
				<p><b>Select Country:</b></p><br>
			</div>
			<form action = "process_country.php" method = "post">
				<input type = "hidden" name = "action" value = "find_country">  <!-- user won't see but sends a verification to process page -->
			<div class = "col-xs-3">

			<select class = "form-control" name = 'countries'>
			<?php
				foreach ($_SESSION['countries'] as $key => $value) //we are saying take this remembered set of info and go deeper since we have an array of associative arrays.
				{
					echo "<option>" . $value['name'] . "</option>"; //insert the specific value 'name' into the html.
				}

			 ?>
			</select>
			</div>
			<div>
			 	<label class = "btn btn-primary">Check Info
					<input type = "submit" class = "hidden"> <!--when you click the button, it will submit and change pages.-->
				</label> <!--this sets up your button-->
			 </form>
			</div>
			<div id = 'info'>
				<h4><u>Country Information</u></h4>
				<?php
					//var_dump($_SESSION['country_info']); //this grabs the info for the country chosen. (but in an array style)
					foreach ($_SESSION['country_info'] as $key => $value) 
					{
						echo "Country: " . $value['name'] . "<br>";
						echo "Continent: " . $value['continent'] . "<br>";
						echo "Region: " . $value['region'] . "<br>";
						echo "Population: " . $value['population'] . "<br>";
						echo "Life Expectancy: " . $value['life_expectancy'] . "<br>";
						echo "Government Form: " . $value['government_form'] . "<br>";
					}
				?>
				
			</div>	
		</body>
</html>