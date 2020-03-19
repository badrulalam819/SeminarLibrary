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
        <title>Book List</title>
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
        <!--vavBar-->
		<div class="row">
			<center>
				<form class="form-horizontal row-fluid" action="book.php" method="post">
					<div class="control-group">
						<label class="control-label" for="Search"><b>Search:</b></label>
						<div class="controls">
							<input type="text" id="title" name="title" placeholder="Enter Name/ID of Book/Book_category_id" class="span8" required>
							<button type="submit" name="submit"class="btn">Search</button>
						</div>
					</div>
				</form>
			</center>
			<br>
			<?php
			if(isset($_POST['submit']))
				{
					$s=$_POST['title'];
					$sql="select * from LMS.book where BookId='$s' or Title like '%$s%' or Book_category_id = '$s'";
				}
			else
				$sql="select * from LMS.book order by Availability DESC";

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
				  <th>Availability</th>
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
					$avail=$row['Availability'];
				?>
						<tr>
						  <td><?php echo $bookid ?></td>
						  <td><?php echo $name ?></td>
						  <td><b><?php 
							   if($avail > 0)
								  echo "<font color=\"green\">AVAILABLE</font>";
								else
									echo "<font color=\"red\">NOT AVAILABLE</font>";

									 ?>
										
									 </b></td>
						  <td><center><a href="bookdetails.php?id=<?php echo $bookid; ?>" class="btn btn-primary">Details</a>
							<?php
							if($avail > 0)
								echo "<a href=\"issue_request.php?id=".$bookid."\" class=\"btn btn-success\">Issue</a>";
							?>
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