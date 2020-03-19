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
        <title>Add Admin</title>
        
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
			
			<div class="module">
				<div class="module-head">
					<h3>Add Admin</h3>
				</div>
				<div class="module-body">
					<?php
					if(isset($_POST['submit']))
					{
						$name=$_POST['name'];
						$email=$_POST['email'];
						$password=$_POST['password'];
						$rollNo=$_POST['rollNo'];
						$type=$_POST['type'];
					$sql1="insert into LMS.admin (name,email,password,rollNo,type) values ('$name','$email','$password','$rollNo','$type')";

					if($conn->query($sql1) === TRUE){
						echo "<script type='text/javascript'>alert('Success')</script>";
					}
					else
					{//echo $conn->error;
					echo "<script type='text/javascript'>alert('Error')</script>";
					}
						
					}
					?>
					<form class="form-horizontal row-fluid" action="add_admin.php" method="post">
						<div class="control-group">
							<label class="control-label" for="Name"><b>Admin Name</b></label>
							<div class="controls">
								<input type="text" id="name" name="name" placeholder="Name" class="span8" required>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="Email"><b>Admin Email</b></label>
							<div class="controls">
								<input type="text" id="email" name="email" placeholder="Email" class="span8" required>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="Password"><b>Password</b></label>
							<div class="controls">
								<input type="text" id="password" name="password" placeholder="Password" class="span8" required>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="RollNo"><b>RollNo</b></label>
							<div class="controls">
								<input type="text" id="rollNo" name="rollNo" placeholder="RollNo" class="span8" required>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="Type"><b>Type</b></label>
							<div class="controls">
								<select name="type" id="type">
									<option value="one">one</option>
									<option value="two">two</option>
								</select>
							</div>
						</div>

						<div class="control-group">
							<div class="controls">
								<button type="submit" name="submit"class="btn">Add Admin</button>
							</div>
						</div>
					</form>
				</div>
			</div>

        </div>
    </body>

</html>


<?php }
else {
    echo "<script type='text/javascript'>alert('Access Denied!!!')</script>";
} ?>