<?php 
	session_start();
	require('new-connection.php');
	echo "Hey {$_SESSION['first_name']}!";
	echo "<a href = 'index.wall.php'> LOG OFF </a>";
 ?>
<!doctype html>
<html>
	<head>
		<meta charset = "UTF-8">
		<link rel = "stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">  <!--bootstrap-->
		<link rel = "stylesheet" type = "text/css" href = "wall.css"> <!-- connects stylesheet for css -->
		<title>Login and Registration</title>
	</head>
		<body>
			<div class = 'row'>
				<span>*  Emily  Book  *</span>
				<input type = 'search' placeholder = 'search' class = 'search_bar'> 
				<button type = "button" class = 'search_bar'>
  					<span class = "glyphicon glyphicon-search"></span> <!--this is the bootstrap mag. glass-->
				</button>
			</div>
			<div id = 'status'>
				<h4><u>Update Status</u></h4>
			</div>
			<form id = "messages" action = "process_message_wall.php" method = "post">
				<textarea class = "form-control" rows = "3" name = 'message' placeholder = "What's on your mind?"></textarea><br>
				<label class = "btn btn-danger">Post!
					<input type = "submit" class = "hidden"> 
				</label> 
				<input type = "hidden" name = "action" value = "message">  <!-- user won't see but sends a verification to process page -->	
				</form><br>
				<?php

					$query = "SELECT * FROM messages";
					$grab_messages = fetch_all($query);

					// echo ($grab_messages[0]['message']); //this is the testing to see if we can grab the message inside the array.
					for ($i = 0; $i < count($grab_messages); $i++) 
					{ 
						echo "{$grab_messages[$i]['message']}<br><br>"; //actually grabbing it.
						//query database to get all comments for this message.

						$query = "SELECT * FROM comments WHERE messages_id = {$grab_messages[$i]['id']}";
						$grab_comments = fetch_all($query);
						echo "<div class = 'commentary'>";
						for ($j = 0; $j < count($grab_comments); $j++) 
							{ 
								echo "<div class = 'single_comment'>{$grab_comments[$j]['comment']}</div>"; //actually grabbing it. //display all comments for this message.
							}
						echo "</div>";	

					?>
						<form class = "comments" action = "process_message_wall.php" method = "post">
							<h5><u>Comment</u></h5>
							<input type = "text" class = "form-control" name = 'comment' placeholder = "Write a comment..."><br>
							<label class = "btn btn-warning">Comment!
								<input type = "submit" class = "hidden"> 
							</label>
							<input type = "hidden" name = "action" value = "comment">  <!-- user won't see but sends a verification to process page -->
							<input type = "hidden" name = 'messages_id' value = '<?php echo $grab_messages[$i]['id'] ?>'>
						</form>
					<?php
					}
					?>
		</body>
</html>