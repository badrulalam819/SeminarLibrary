<?php
require('dbconn.php');
?>

<?php 
if ($_SESSION['RollNo']) {
    ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Book Details</title>
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
			<a href="#">About Libray</a>
			<a href="logout.php">Log out</a>
		</div>
        <!-- /navbar -->
		<div class="row">
			<div class="content">

				<div class="module">
					<div class="module-head">
						<h3>Book Details</h3>
					</div>
					<div class="module-body">
					<?php
					$x=$_GET['id'];
					$sql="select * from LMS.book where BookId='$x'";
					$result=$conn->query($sql);
					$row=$result->fetch_assoc();    
					
						$bookid=$row['BookId'];
						$name=$row['Title'];
						$publisher=$row['Publisher'];
						$year=$row['Year'];
						$avail=$row['Availability'];
						echo "<b>Book ID:</b> ".$bookid."<br><br>";
						echo "<b>Title:</b> ".$name."<br><br>";
						$sql1="select * from LMS.author where BookId='$bookid'";
						$result=$conn->query($sql1);
						
						echo "<b>Author:</b> ";
						while($row1=$result->fetch_assoc())
						{
							echo $row1['Author']."&nbsp;";
						}
						echo "<br><br>";
						echo "<b>Publisher:</b> ".$publisher."<br><br>";
						echo "<b>Year:</b> ".$year."<br><br>";
						echo "<b>Availability:</b> ".$avail."<br><br>";

						
				
				   
					?>
					
					<a href="book.php" class="btn btn-primary">Go Back</a>                             
					</div>
				</div>
			</div>
		</div>
    
    </body>

</html>

<?php }
else {
    echo "<script type='text/javascript'>alert('Access Denied!!!')</script>";
} ?>