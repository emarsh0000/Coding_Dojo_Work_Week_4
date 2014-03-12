<?php  
session_start(); //starts to save entered info.
?>
<!doctype html>
<html>
	<head>
		<meta charset = "UTF-8">
		<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css"> <!--bootstrap-->
		<link rel = "stylesheet" type = "text/css" href = "wall.css"> <!-- connects stylesheet for css --> 
		<title>Login and Registration</title>
	</head>
		<body>
			<div class = 'row'>
				<span>*  Quotes Wall  *</span>
				<input type = 'search' placeholder = 'search' class = 'search_bar'> 
				<button type = "button" class = 'search_bar'>
  					<span class = "glyphicon glyphicon-search"></span> <!--this is the bootstrap mag. glass-->
				</button>
			</div>
			<h3>Want to add a Quote to your Quote Wall?</h3><br>
			<form class = "form-horizontal" role = "form">
			  <div class = "form-group">
			    <label class = "col-sm-2 control-label">Name</label>
			  <div class = "col-md-10">
			      <input type = "text" class = "form-control" placeholder="name">
			  </div>
			  </div>
			  <div class = "form-group">
			    <label class = "col-md-2 control-label">Your Quote</label>
			    <div class = "col-md-10">
			      <input type = 'text' name = 'quote' class = "form-control" placeholder = "What inspires you?">
			    </div>
			  </div>
			  <div class = "form-group">
			    <div class = "col-md-offset-2 col-md-10">
			    </div>
			  </div>
			  <div class = "form-group">
			    <div id = 'quote_green' class = "col-md-offset-2 col-md-10">
			      <button type = "submit" class = "btn btn-success">Add my Quote!</button>
			    </div>
			  <div class = "form-group">
			    <div id 'wall_green' class = "col-md-offset-2 col-md-10">
			      <button type = "submit" class = "btn btn-success">Go straight to my Wall</button>
			    </div>
			  </div>
			  </div>
			</form>