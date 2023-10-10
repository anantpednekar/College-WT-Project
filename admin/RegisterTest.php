<html>	
	<body>
	<?php
		session_start();
		if(!isset($_SESSION['ID']))
			echo "<script>alert(' Not Logged in! ');location='AdminLogin.html';</script>";
		$Name = $_POST['name'];
		$Email = $_POST['email'];
		$Phone = $_POST['phone'];
		$Password = $_POST['userpassword'];
		$Input_DOB = $_POST['dob'];

		$Dob=date("Y-m-d ",strtotime($Input_DOB));
		
		$host = 'localhost';
		$user = 'root';
		$pass = '';
		$db = '16co63';
		$conn1 = mysqli_connect($host,$user,$pass,$db);//3306,socket
		
		$sql="SELECT `user_name` FROM `user` WHERE `user_name` =  '$Name'";
		
		$result = $conn1->query($sql) or die($conn1->error);
		$data = $result->fetch_assoc();
		
		if($Name == $data["user_name"] ){
			
			echo "<script>alert(' Name Already Registered!! ');location='AdminHome.html';</script>";
		}else{
			$sql="INSERT INTO `user` 
			( `user_name`, `user_email`, `user_phone`, `user_pass`, `user_dob`) 
			VALUES 
			( '$Name', '$Email', '$Phone', '$Password', '$Dob')";
	
			$query=mysqli_query($conn1,$sql) or die(mysqli_error($conn1));
			echo "<script>alert('Registered!!');location='AdminHome.html';</script>";
		}
	?>
	</body>
</html>