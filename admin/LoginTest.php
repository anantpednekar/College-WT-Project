<html>	
	<body>
		<?php
			session_start();
			$Name=$_POST['username'];
			$Password=$_POST['userpassword'];
			//code to check name and password
			
			$host = 'localhost';
			$user = 'root';
			$pass = '';
			$db = '16co63';
			$conn1 = new mysqli($host,$user,$pass,$db);//3306,socket
			
			$sql="SELECT `admin_id`,`password` FROM `admin` WHERE `admin_id` = '$Name'";
			
			$result = $conn1->query($sql)or die($conn1->error);
			$data = $result->fetch_assoc();
			
			if($Password == $data["password"] ){
				$_SESSION['ID']=$data['admin_id'];
				header("Location: AdminHome.html");
			}
			else{
				echo "<script>alert('Incorrect Password or Name');location='./Index.html';</script>";
			}	
			//session_destroy();
		?>
	</body>
</html>