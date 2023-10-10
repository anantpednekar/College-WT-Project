<!DOCTYPE html>
<html>
	<head>
		<title>Online Examination</title>
		<link href="../style/main.css" rel="stylesheet">
	</head>
    
	<body>
		<div id="main">
		
			<div id="header">
				<div id="logo">
					<div id="logo_text">
					  <h1>Online Examination</h1>
					</div>
				</div>
			</div>
			
			<div id="content_header">
			</div>
			
			<div id="site_content" >
			<div id="content" style="width: 850px" >
				 <table id="AdminTable" cellpadding="1" cellspacing="1" border="1" style="text-align:center;">
						<tr> 
							<th>USER ID</th>
							<th>USER NAME</th>
							<th>EMAIL</th>
							<th>PHONE</th>
							<th>PASSWORD</th>
							<th>DOB</th>
							<th>ACTION</th>
						</tr>
						<?php
							session_start();
							if(!isset($_SESSION['ID']))
								echo "<script>alert(' Not Logged in! ');location='AdminLogin.html';</script>";
							$host = 'localhost';
							$user = 'root';
							$pass = '';
							$db = '16co63';
							$conn = new mysqli($host,$user,$pass,$db);//3306,socket
							
							
							$sql = "SELECT * FROM user" ;
							
							$result = $conn->query($sql)or die($conn->error);

							while( $e = $result->fetch_assoc()){
								echo "<tr>";
								echo "<td>".$e['user_id']."</td>";
								echo "<td>".$e['user_name']."</td>";
								echo "<td>".$e['user_email']."</td>";
								echo "<td>".$e['user_phone']."</td>";
								echo "<td>".$e['user_pass']."</td>";
								echo "<td>".$e['user_dob']."</td>";
								echo "<td><a href='Display.php?id=".$e['user_id']."'> Open </a></td>";
								echo "/<tr>";						
							}
						?>
					</table>
					<table style="font-size:30px;">
					<tr><td><a href="AdminHome.html"> BACK </a></td></tr>
					</table>
					
				</div>
			</div>			
			<div id="content_footer">
			</div>
			
			<div id="footer">
				<p>
					Online Examination System by 16co63 @AP
				</p>
			</div>
		</div>
	</body>  
<html>
