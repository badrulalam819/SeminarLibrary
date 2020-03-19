<?php
require('dbconn.php');
?>


<!DOCTYPE html>
<html lang="en">

    <head>
		<style>
		body{
			background-color:lightblue;
		}
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
        <!-- /navbar -->
        <div class="wrapper">

			<?php
			$rollno = $_SESSION['RollNo'];
			$sql="select * from LMS.user where RollNo='$rollno'";
			$result=$conn->query($sql);
			$row=$result->fetch_assoc();

			$name=$row['Name'];
			$batch=$row['Batch'];
			$email=$row['EmailId'];
			$mobno=$row['MobNo'];
			?>			
			<center>
				<i>
				<h1 class="card-title"><?php echo $name ?></h1>
				<br>
				<p><b>Email ID: </b><?php echo $email ?></p>
				<br>
				<p><b>Roll No: </B><?php echo $rollno ?></p>
				<br>
				<p><b>Batch: </b><?php echo $batch ?></p>
				<br>
				<p><b>Mobile number: </b><?php echo $mobno ?></p>
				</b>
				</i>
				<br>
				<a href="edit_student_details.php" class="btn btn-primary">Edit Details</a><br><br><br>
			</center>
        </div>
				
		<footer>
            <center>
                <b></b>
            </center>
        </footer>
        
        <!--/.wrapper-->
       
      
    </body>

</html>