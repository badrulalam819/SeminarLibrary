<?php
require('dbconn.php');
?>
<?php
if($_SESSION['RollNo']){
	?>
	<!DOCTYPE html>
	<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>add admin</title>
	</head>
	<body>
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
	<?php
	if(isset($_POST['submit'])){
		$id = $_POST['id'];
		
		$sql = "delete from LMS.admin where admin_id = '$id'";
		if($conn->query($sql) === TRUE){
			echo "<script type = 'text/javascript'>alert('success')</script>";
		}else{
			echo "<script type = 'text/javascript'>alert('error')</script>";
		}
	}
	?>
		<h1>I am going to deldete another admin</h1>
		<form action = "delete_admin.php" method = "post">
			<div>
				<label for = "id">Admin Id</label>
				<input type ="int" name = "id" placeholder = "Enter admin id"><br>
				<input type = "submit" name = "submit" value = "Delete Admin">
			</div>
		</form>
	</body>
	</html>
	
	<?php }
else {
    echo "<script type='text/javascript'>alert('Access Denied!!!')</script>";
} ?>