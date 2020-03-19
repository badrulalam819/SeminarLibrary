<?php
ob_start();
require('dbconn.php');
?>


<!DOCTYPE html>
<html lang="en">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>student profile</title>
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
			<!--/.span3-->
			<div class="span9">
				<div class="module">
					<div class="module-head">
						<h3>Update Details</h3>
					</div>
					<div class="module-body">


						<?php
						$rollno = $_SESSION['RollNo'];
						$sql="select * from LMS.user where RollNo='$rollno'";
						$result=$conn->query($sql);
						$row=$result->fetch_assoc();

						$name=$row['Name'];
						$batch=$row['Batch'];
						$email=$row['EmailId'];
						$mobno=$row['MobNo'];
						$pswd=$row['Password'];
						?>    
						
						<form class="form-horizontal row-fluid" action="edit_student_details.php?id=<?php echo $rollno ?>" method="post">

							<div class="control-group">
								<label class="control-label" for="Name"><b>Name:</b></label>
								<div class="controls">
									<input type="text" id="Name" name="Name" value= "<?php echo $name?>" class="span8" required>
								</div>
							</div>

							<div class="control-group">
									<label class="control-label" for="Category"><b>Category:</b></label>
									<div class="controls">
										<select name = "Batch" tabindex="1" value="4thBatch" data-placeholder="Select Category" class="span6">
											<option value="<?php echo $batch?>"><?php echo $batch ?> </option>
											<option value="1stBatch">1stBatch</option>
											<option value="2ndBatch">2ndBatch</option>
											<option value="3rdBatch">3rdBatch</option>
											<option value="4thBatch">4thBatch</option>
											<option value="5thBatch">5thBatch</option>
											<option value="6thBatch">6thBatch</option>
										</select>
									</div>
							</div>


							<div class="control-group">
								<label class="control-label" for="EmailId"><b>Email Id:</b></label>
								<div class="controls">
									<input type="text" id="EmailId" name="EmailId" value= "<?php echo $email?>" class="span8" required>
								</div>
							</div>

							<div class="control-group">
								<label class="control-label" for="MobNo"><b>Mobile Number:</b></label>
								<div class="controls">
									<input type="text" id="MobNo" name="MobNo" value= "<?php echo $mobno?>" class="span8" required>
								</div>
							</div>

							<div class="control-group">
								<label class="control-label" for="Password"><b>New Password:</b></label>
								<div class="controls">
									<input type="password" id="Password" name="Password"  value= "<?php echo $pswd?>" class="span8" required>
								</div>
							</div>   

							<div class="control-group">
									<div class="controls">
										<button type="submit" name="submit"class="btn-primary"><center>Update Details</center></button>
									</div>
								</div>                                                                     

						</form>
							   
				</div>
				</div> 	
			</div>
			
			<!--/.span9-->
		</div>
        

<?php
if(isset($_POST['submit']))
{
    $rollno = $_GET['id'];
    $name=$_POST['Name'];
    $category=$_POST['Category'];
    $email=$_POST['EmailId'];
    $mobno=$_POST['MobNo'];
    $pswd=$_POST['Password'];

$sql1="update LMS.user set Name='$name', Category='$category', EmailId='$email', MobNo='$mobno', Password='$pswd' where RollNo='$rollno'";



if($conn->query($sql1) === TRUE){
echo "<script type='text/javascript'>alert('Success')</script>";
header( "Refresh:0.01; url=index.php", true, 303);
}
else
{//echo $conn->error;
echo "<script type='text/javascript'>alert('Error')</script>";
}
}
?>
      
    </body>

</html>