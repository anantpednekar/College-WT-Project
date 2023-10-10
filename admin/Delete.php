<!DOCTYPE html>
<html>
	<head>
	</head>
	<body>
	<?php
		session_start();
		if(!isset($_SESSION['ID']))
			echo "<script>alert(' Not Logged in! ');location='AdminLogin.html';</script>";
		$host = 'localhost';
		$user = 'root';
		$pass = '';
		$db = '16co63';
		$conn = new mysqli($host,$user,$pass,$db);
		$Id=$_GET['id'];
		
		$sql = "DELETE FROM user WHERE user_id=$Id" ;
		$result = $conn->query($sql)or die($conn->error);
		echo "<script>alert('DELETED USER')</script>"
		header("Location: CRUD.php");
		
	?>
	</body>
</html>
