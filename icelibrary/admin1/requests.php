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
        <title>Request</title>
        
    </head>
    <body>
        <!-- /navbar -->
		<div class="row">
			<div class="">
				<div class="sidebar">
					<ul class="widget widget-menu unstyled">
						<li class="active"><a href="index.php"><i class="menu-icon icon-home"></i>Home
						</a></li>
						<li><a href="add_admin.php"><i class="menu-icon icon-book"></i>Add Admin</a></li>
						<li><a href="delete_admin.php"><i class="menu-icon icon-book"></i>Delete Admin</a></li>
						<li><a href="book.php"><i class="menu-icon icon-book"></i>Book List</a></li>
						<li><a href="addbook.php"><i class="menu-icon icon-edit"></i>Add Books </a></li>
						<li><a href="addbatch.php"><i class="menu-icon icon-edit"></i>Add Batch</a></li>
						<li><a href="deletebatch.php"><i class="menu-icon icon-edit"></i>Delete Batch</a></li>
						<li><a href="requests.php"><i class="menu-icon icon-tasks"></i>Issue/Return Requests </a></li>
						<li><a href="current.php"><i class="menu-icon icon-list"></i>Currently Issued Books </a></li>
					</ul>
					<ul class="widget widget-menu unstyled">
						<li><a href="logout.php"><i class="menu-icon icon-signout"></i>Logout </a></li>
					</ul>
				</div>
			</div>
			<br>
			<br>
			<div class="span3">
				<center>
					<a href="issue_requests.php" class="btn btn-info" ><image width="100px" src="images/book2.png"></image><p>Issue Requests</p></a>
				</center>
			</div>
			<div class="span3">
				<center>
					<a href="renew_requests.php" class="btn btn-info"><image width="100px" src="images/book3.png"></image><p>Renew Request</p></a>
				</center>
			</div> 
			<div class="span3">
				<center>
					<a href="return_requests.php" class="btn btn-info"><image width="100px" src="images/book4.png"></image><p>Return Requests</p></a>
				</center>
			</div>
		</div>
    </body>

</html>


<?php }
else {
    echo "<script type='text/javascript'>alert('Access Denied!!!')</script>";
} ?>