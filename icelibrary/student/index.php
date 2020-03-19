<?php
require('dbconn.php');
?>


<!DOCTYPE html>
<html lang="en">

    <head>
		<style>
		</style>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Students Home Page</title>
		<link href="style.css" rel="stylesheet">
       
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
		
		<div class="home_images">
		  <img class="mySlides" src="image/facultymembers.jpg" style="width:100%; height:580px;">
		  <img class="mySlides" src="image/libraryimage.jpg" style="width:100%; height:580px;">
		  <img class="mySlides" src="image/exam.jpg" style="width:100%; height:580px;">
		  <img class="mySlides" src="image/nstu.jpg" style="width:100%; height:580px;">
		  <img class="mySlides" src="image/books.jpg" style="width:100%; height:580px;">
		  <img class="mySlides" src="image/iceall.jpg" style="width:100%; height:580px;">
		  <img class="mySlides" src="image/carrybook.jpeg" style="width:100%; height:580px;">
		  <img class="mySlides" src="image/book.jpg" style="width:100%; height:580px;">
		</div>

		<script>
			var myIndex = 0;
			carousel();

			function carousel() {
			  var i;
			  var x = document.getElementsByClassName("mySlides");
			  for (i = 0; i < x.length; i++) {
				x[i].style.display = "none";  
			  }
			  myIndex++;
			  if (myIndex > x.length) {myIndex = 1}    
			  x[myIndex-1].style.display = "block";  
			  setTimeout(carousel, 2000); // Change image every 2 seconds
			}
		</script>
		
    </body>

</html>