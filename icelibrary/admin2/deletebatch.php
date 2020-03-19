<?php
//require() function takes all the text in a specified file and copies it into the file here dbconn.php is a file taht creates connection with database
require('dbconn.php');
?>

<!DOCTYPE html>
<html>
<head>
	<title>Delete Batch</title>
</head>

<body>
	<div>
		<h2>Enter batch name to delete</h2>
		<form action="deletebatch.php" method="post">
			<input type="text" Name="BatchName" placeholder="BatchName" required=""><br>
			<input type="submit" name="submit"; value="Submit">
		</form>
	</div>
	
	<?php
		
	?>

</body>
</html>