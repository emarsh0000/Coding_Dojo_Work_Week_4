<?php
require('new-connection.php');
session_start();
echo "<br>" .  "Hey {$_SESSION['first_name']}!";
echo "<br>" . "<a href = '/practice/index_expense.php'> LOG OFF </a>";

//echo "You have " . $_SESSION['amount'] . " dollars in your savings!"
 ?>

<!doctype html>
 <html>
	 <head>
	 	<meta charset = "UTF-8">
		<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css"> <!--bootstrap-->
		<link rel = "stylesheet" type = "text/css" href = "green_belt.css"> <!-- connects stylesheet for css --> 
		<title>Green Belt Test! Expenses Success Page</title>
	 </head>
		 <body>
		 	<h2>Welcome!</h2>
				<table class = "table table-bordered">
  

				<thead>
					<tr>
						<th>Date</th>
						<th>Expense Description</th>
						<th>Amount Spent ($)</th>
						<th>Action</th>
					</tr>
				</thead>
					<tbody>
						<?php
						for ($i = 1; $i < 10; $i++) 
							{ 	
								echo "<tr>"; 
								for ($x = 1; $x < count($_POST); $x++) 
								{ 
									echo "<td>" . "<a href = '/practice/success.expense.php'> Delete </a>" . "</td>"; 
								}
							}
							echo "</tr>"; //this closes the row.
							
						?>
						
					</tbody>
			</table>

			<h4>Add Expenses</h4>
			<div>
			<form action = "/practice/success_process.php" method = "post">
		 		<input type = "hidden" name = "action" value = "register"> <!-- user won't see but sends info to process -->
		 		Description: <input type = "text" name = "description"><br>
		 		Amount: <input type = "text" name = "amount"><br>
		 		Date: <input type = "text" name = "amount"><br>
		 		<br><label class = "btn btn-primary">ADD!
		 			<input type = "submit" class = "hidden">
		 		</label>
		 	</form>	
		 </div>
		 </body>
 </html>