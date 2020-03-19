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
        <title>Current issued books</title>
		<link href="style.css" rel="stylesheet">
		
		<style>
			table {
				font-family: arial, sans-serif;
				border-collapse: collapse;
				width: 100%;
				}

			td, th {
				border: 1px solid #dddddd;
				text-align: left;
				padding: 8px;
				}

			tr:nth-child(even) {
				background-color: #dddddd;
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
        <!-- /navbar -->
		<div class="row">
			<center>
				<form class="form-horizontal row-fluid" action="current.php" method="post">
					<div class="control-group">
						<label class="control-label" for="Search"><b>Search:</b></label>
						<div class="controls">
							<input type="text" id="title" name="title" placeholder="Enter Book Name/Book Id." class="span8" required>
							<button type="submit" name="submit"class="btn">Search</button>
						</div>
					</div>
				</form>
			</center>
			<br>
			<?php
			$rollno = $_SESSION['RollNo'];
			if(isset($_POST['submit']))
				{$s=$_POST['title'];
					$sql="select * from LMS.record,LMS.book where RollNo = '$rollno' and Date_of_Issue is NOT NULL and Date_of_Return is NULL and book.Bookid = record.BookId and (record.BookId='$s' or Title like '%$s%')";

				}
			else
				$sql="select * from LMS.record,LMS.book where RollNo = '$rollno' and Date_of_Issue is NOT NULL and Date_of_Return is NULL and book.Bookid = record.BookId";

			$result=$conn->query($sql);
			$rowcount=mysqli_num_rows($result);

			if(!($rowcount))
				echo "<br><center><h2><b><i>No Results</i></b></h2></center>";
			else
			{

		
			?>
			<table class="table" id = "tables">
			  <thead>
				<tr>
				  <th>Book id</th>
				  <th>Book name</th>
				  <th>Issue Date</th>
				  <th>Due date</th>
				  <th></th>
				</tr>
			  </thead>
				<tbody>

				<?php

		
				//$result=$conn->query($sql);
				while($row=$result->fetch_assoc())
				{
					$bookid=$row['BookId'];
					$name=$row['Title'];
					$issuedate=$row['Date_of_Issue'];
					$duedate=$row['Due_Date'];
					$renewals=$row['Renewals_left'];
				
					?>

				<tr>
				  <td><?php echo $bookid ?></td>
				  <td><?php echo $name ?></td>
				  <td><?php echo $issuedate ?></td>
				  <td><?php echo $duedate ?></td>
					<td><center>
					<?php 
					 if($renewals)
						echo "<a href=\"renew_request.php?id=".$bookid."\" class=\"btn btn-success\">Renew</a>";
					?>
					<a href="return_request.php?id=<?php echo $bookid; ?>" class="btn btn-primary">Return</a>
					</center></td>
				</tr>
				<?php }} ?>
				</tbody>
			</table>
		</div>
    </body>

</html>

<?php }
else {
    echo "<script type='text/javascript'>alert('Access Denied!!!')</script>";
} ?>