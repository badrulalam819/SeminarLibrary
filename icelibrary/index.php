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
				background: black;
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
				<h2>Sign In</h2><br>
				<form action="index.php" method="post">
					<input type="text" Name="RollNo" placeholder="RollNo" required=""><br><br>
					<input type="password" Name="Password" placeholder="Password" required=""><br><br>
					<select name = "userType" id = "user">
						<option value = "admin">admin</option>
						<option value = "user">user</option>
					</select><br><br>
					<input type="submit" name="signin"; value="Sign In">
				</form>
				<p>If you are not registered<a href = "signup.php">Sign up Now</a></p>
		</center>
	</div>
	<div id = "footer">
		<i>Noakhali Science and Technology University</i>
	</div>
<?php
if(isset($_POST['signin']))
{
 error_reporting(0);
 $u=$_POST['RollNo'];
 $p=$_POST['Password'];
 $c=$_POST['Batch'];
 $ut = $_POST['userType'];
 
 if($ut == 'admin')
 {
	$sql="select * from LMS.admin where rollNo='$u'";

	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	$x=$row['password'];
	$y=$row['type'];
	if(strcasecmp($x,$p)==0 && !empty($u) && !empty($p))
	  {//echo "Login Successful";
	   $_SESSION['RollNo']=$u;
	   

	  if($y=='one')
	   header('location:admin1/index.php');
	  else
		header('location:admin2/index.php');	
	  }
	else 
	 { echo "<script type='text/javascript'>alert('Failed to Login! Incorrect RollNo or Password')</script>";
	}
 }
 else{
	$sql="select * from LMS.user where RollNo='$u'";

	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	$x=$row['Password'];
	$y=$row['Type'];
	if(strcasecmp($x,$p)==0 && !empty($u) && !empty($p))
	  {//echo "Login Successful";
	   $_SESSION['RollNo']=$u;
	   

	  if($y=='Student')
	   header('location:student/index.php');
	  else
		echo 'something is wrong';
			
	  }
	else 
	 { echo "<script type='text/javascript'>alert('Failed to Login! Incorrect RollNo or Password')</script>";
	} 
 }
}
?>

</body>
<!-- //Body -->
</html>
