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
			
			$sql="SELECT `user_id`,`user_pass` FROM `user` WHERE `user_id` = '$Name' OR `user_name` = '$Name'";
			//this query can redurn more the one record if name is not unique 
			//Need to handle that
			$result = $conn1->query($sql)or die($conn1->error);
			$data = $result->fetch_assoc();
			
			if($Password == $data["user_pass"] ){
				$_SESSION['ID']=$data['user_id'];
				$_SESSION['counter']=0;
				header("Location: Test.php?id=".$data['user_id']."");
			}
			else{
				echo "<script>alert('Incorrect Password or Name');location='./Index.html';</script>";
			}	
		?>
	</body>
</html>