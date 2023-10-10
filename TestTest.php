<!DOCTYPE html>
<html>
	<head>
	</head>
	<body>
	<?php
		session_start();
		if(!isset($_SESSION['ID']))
			echo "<script>alert(' Not Logged in! ');location='index.html';</script>";
		$host = 'localhost';
		$user = 'root';
		$pass = '';
		$db = '16co63';
		$conn = new mysqli($host,$user,$pass,$db);
		
		$Id=$_SESSION['ID'];
		$C = $_SESSION['counter'];
		$CID = $_POST['C'];
		
		$sql="SELECT `is_right_choice` FROM `questionchoices` WHERE `choice_id` = '$CID'";
		$result = $conn->query($sql)or die($conn->error);
		$data = $result->fetch_assoc();
		$IsRight = $data['is_right_choice'] ;
		
		$sql="INSERT INTO `userq&a` 
		( `user_id`, `question_id`, `choice_id`, `is_right`)
		VALUES 
		( '$Id', '$C', '$CID', '$IsRight')";

		$query=mysqli_query($conn,$sql) or die(mysqli_error($conn));
		
		header("Location: Test.php");
		
	?>
	</body>
</html>
