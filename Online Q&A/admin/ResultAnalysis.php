<!DOCTYPE html>
<html>
	<head>
		<title>Online Examination</title>
		<link href="../style/main.css" rel="stylesheet">
	</head>
    
	<body>
		<?php
			//session_start();
			//if(!isset($_SESSION['ID']))
				//echo "<script>alert(' Not Logged in! ');location='AdminLogin.html';</script>";
			//$Id=$_SESSION['ID'];
			$host = 'localhost';
			$user = 'root';
			$pass = '';
			$db = '16co63';
			
			$conn = new mysqli($host,$user,$pass,$db);//3306,socket
			
			$sql = "SELECT `user_id` FROM `user` where '1'" ;
			$result = $conn->query($sql)or die($conn->error);
			$NoOfUsers = mysqli_num_rows($result);
			
			$sql = "SELECT DISTINCT `user_id` FROM `userq&a` where '1'" ;
			$result = $conn->query($sql)or die($conn->error);
			$Attempted = mysqli_num_rows($result);
			
			$sql = "SELECT `user_id`,COUNT(`is_right`) FROM `userq&a` WHERE `is_right`='1' GROUP BY (`user_id`) HAVING COUNT(`is_right`)>='6' ";
			$result = $conn->query($sql)or die($conn->error);
			$Passes = mysqli_num_rows($result);
			
			$sql = "SELECT `user_id`,COUNT(`is_right`) FROM `userq&a` WHERE `is_right`='1' GROUP BY (`user_id`) HAVING COUNT(`is_right`)<='6' ";
			$result = $conn->query($sql)or die($conn->error);
			$Failures = mysqli_num_rows($result);
			
		?>		
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
			
			<div id="site_content">
               
                <div id="sidebar_container" ></div>
                <div id="content" >
				<h1 style="color:white;text-align: center;">Score</h1>
					<p>.</p>
					<p>.</p></br>
					<span style="color:white;font-size: x-large;">Passes(60% and above) : <?php echo "$Passes";?></span>
					<span id="Correct">.</span><br/>
					<span style="color:white;font-size: x-large;">Failures(59% and below) : <?php echo "$Failures";?></span>
					<span id="InCorrect">.</span><br/>
					<span style="color:white;font-size: x-large;">Total Users attempted Test : <?php echo "$Attempted";?></span>
					<span id="Attempted">.</span><br/>
					<span style="color:white;font-size: x-large;">Total Users  : <?php echo "$NoOfUsers";?></span>
					<span id="Answered">.</span><br/>
					<br/>
					<button type="button" style="width: 80px;" onclick="location.href = 'AdminHome.html';"> Back</button>
                </div>
                
			</div>
			
			<div id="content_footer">
			</div>
			
			<div id="footer">
				<p>
					<a href="index.html">Home</a> | 
					<a href="Register.html">Register</a> | 
					<a href="Test.html">Test</a> | 
					<a href="Score.html">Score</a> | 
					<a href="Help.html">Help</a>
				</p>
			</div>
		</div>
	</body>  
<html>
