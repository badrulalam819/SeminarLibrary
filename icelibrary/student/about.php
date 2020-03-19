<?php
require('dbconn.php');
?>

<!DOCTYPE html>
<html = "en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>About Library</title>
	<link href="style.css" rel="stylesheet">
	<style>
		/* Create three equal columns that floats next to each other */
		.column {
		  float: left;
		  width: 33.33%;
		  padding: 15px;
		}

		/* Clear floats after the columns */
		.row:after {
		  content: "";
		  display: table;
		  clear: both;
		}
	</style>
</head>

<body>
	<div class="header">
		<h1 style="color:red; text-align: center">SEMINAR LIBRARY ICE-NSTU</h1>
	</div>
        <!-- /navbar -->
	<div class="topnav">
		<a href="profile.php">Profile</a>
		<a href="index.php">Home</a>
		<a href="book.php">Book List</a>
		<a href="current.php">Currently Issued Books</a>
		<a href="about.php">About Libray</a>
		<a href="logout.php">Log out</a>
	</div>
	<div class = "row">
		<div class = "column">
			<h1>Teachers</h1>
			<p>This is a seminar library of the department of the Information and Communication Engineering. 
			All books are accessible only for all students of ICE department. Any student of this department can take book for 15 days. </p>
		</div>
		<div class = "column">
			<h1>Librarian</h1>
			<p>This is a seminar library of the department of the Information and Communication Engineering. 
			All books are accessible only for all students of ICE department. Any student of this department can take book for 15 days. </p>
		</div>
		<div class = "column">
			<h1>Students</h1>
			<p>This is a seminar library of the department of the Information and Communication Engineering. 
			All books are accessible only for all students of ICE department. Any student of this department can take book for 15 days. </p>
		</div>
	</div>
		
</body>
</html>


