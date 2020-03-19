<?php
//require() function takes all the text in a specified file and copies it into the file here dbconn.php is a file taht creates connection with database
require('dbconn.php');
?>


<!DOCTYPE html>
<html>
<!-- Head -->
<head>
	<title>Seminar Library ICE</title>
	<!-- Meta-Tags -->
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta name="keywords" content="Academy Library Member Login System, Login Form Web Application" />		
		<link rel="stylesheet" type="text/css" href="mystyle.css">
		
		<style>
			.row{ 
				color: white;
			}
			#footer {
				position: fixed;
				bottom: 0;
				width: 100%;
				height: 5%;
				font-size: 35px;
				background: #696969;
				text-align: center;
				color: red;
				word-spacing: 30px;
			}
		</style>
	<!-- //Meta-Tags -->
</head>
<!-- //Head -->
<!-- Body -->
<body>
	<div class = "header">
		<b><h1>SEMINAR LIBRARY OF ICE-NSTU</h1></b>
	</div>
	<div class = "row">
		<center>
			<h2>Sign Up</h2><br>
			<form action="signup.php" method="post">
				<input type="text" Name="Name" placeholder="Name" required><br><br>
				<input type="text" Name="Email" placeholder="Email" required><br><br>
				<input type="password" Name="Password" placeholder="Password" required><br><br>
				<input type="text" Name="PhoneNumber" placeholder="Phone Number" required><br><br>
				<input type="text" Name="RollNo" placeholder="Roll Number" required=""><br><br>
				
				<select name="Batch" id="Batch">
				<?php
				$sql="select * from LMS.batch";
				 $result = $conn->query($sql);
				 if($result){
					 while($row=$result->fetch_assoc()){
						 
				?>
					<option value="<?php echo $row['BatchId']; ?>"><?php echo $row['BatchName']; ?></option>
				 <?php }}?>
				</select>
				<br><br>
				<input type="submit" name="signup" value="Sign Up">
			</form>
		</center>
	</div>
	<div id = "footer">
		<i>Noakhali Science and Technology University</i>
	</div>
<?php
if(isset($_POST['signup']))
{
	$name=$_POST['Name'];
	$email=$_POST['Email'];
	$password=$_POST['Password'];
	$mobno=$_POST['PhoneNumber'];
	$rollno=$_POST['RollNo'];
	$batch=$_POST['Batch'];
	$type='Student';

	$sql="insert into LMS.user (Name,Type,Batch,RollNo,EmailId,MobNo,Password) values ('$name','$type','$batch','$rollno','$email','$mobno','$password')";

	if ($conn->query($sql) === TRUE) {
	echo "<script type='text/javascript'>alert('Registration Successful')</script>";
	header("Location: index.php");
} else {
    //echo "Error: " . $sql . "<br>" . $conn->error;
echo "<script type='text/javascript'>alert('User Exists')</script>";
}
}

?>

</body>
<!-- //Body -->
</html>
