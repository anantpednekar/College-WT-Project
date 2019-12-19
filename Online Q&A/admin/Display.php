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
			
                <div id="content" style="color:white;font-size:20px;" >
				<table>
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
					$sql="SELECT * FROM `user` WHERE `user_id` = '$Id'";
					
					$result = $conn->query($sql)or die($conn->error);	
					$e = $result->fetch_assoc();
					
					echo "<tr>";	
					echo "<td>Id :</td>";
					echo "<td>".$e['user_id']."</td>";
					echo "</tr>";	
					echo "<tr>";
					echo "<td>Name : </td>";
					echo "<td>".$e['user_name']."</td>";
					echo "</tr>";	
					echo "<tr>";
					echo "<td>Email :</td>";
					echo "<td>".$e['user_email']."</td>";
					echo "</tr>";
					echo "<td>Phone :</td>";
					echo "<td>".$e['user_phone']."</td>";
					echo "</tr>";	
					echo "<tr>";
					echo "<tr>";
					echo "<td>Password :</td>";
					echo "<td>".$e['user_pass']."</td>";
					echo "</tr>";	
					echo "<tr>";	
					echo "<td>Dob :</td>";
					echo "<td>".$e['user_dob']."</td>";
					echo "</tr>";
					
					echo "<tr><td><a href='CRUD.php'> BACK </a></td></tr>";
					echo "<tr><td><a href='Update.php?id=".$e['user_id']."'> UPDATE </a></td></tr>";
					echo "<tr><td><a href='Delete.php?id=".$e['user_id']."'> DELETE </a></td></tr>";
					?>
				</table>
				<table>
				
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
