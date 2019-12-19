<!DOCTYPE html>
<html>
	<head>
		<title>Online Examination</title>
		<link href="style/main.css" rel="stylesheet">
	</head>
    
	<body>
		<?php
			session_start();
			if(!isset($_SESSION['ID']))
				echo "<script>alert(' Not Logged in! ');location='index.html';</script>";
			$Id=$_SESSION['ID'];
			$host = 'localhost';
			$user = 'root';
			$pass = '';
			$db = '16co63';
			
			$conn = new mysqli($host,$user,$pass,$db);//3306,socket
			$sql = "SELECT * FROM `userq&a` where user_id = '$Id' AND is_right = '0'" ;
			$result = $conn->query($sql)or die($conn->error);
			$InCorrect = mysqli_num_rows($result);
			
			$sql = "SELECT * FROM `userq&a` where user_id = '$Id' AND is_right = '1'" ;
			$result = $conn->query($sql)or die($conn->error);
			$Correct = mysqli_num_rows($result);
			
			$sql = "SELECT * FROM `userq&a` where user_id = '$Id'" ;
			$result = $conn->query($sql)or die($conn->error);
			$Total = mysqli_num_rows($result);
		?>		
		<div id="main">
		
			<div id="header">
				<div id="logo">
					<div id="logo_text">
					  <h1>Online Examination</h1>
					</div>
				</div>
				<div id="menubar">
					<ul id="menu">
					  <li><a href="">Home</a></li>
					  <li><a href="">Register</a></li>
					  <li ><a href="">Test</a></li>
					  <li class="selected"><a href="Score.php">Score</a></li>
					  <li><a href="Help.html">Help</a></li>
					</ul>
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
					<span style="color:white;font-size: x-large;">Correct    : <?php echo "$Correct";?></span>
					<span id="Correct">.</span><br/>
					<span style="color:white;font-size: x-large;">In-correct : <?php echo "$InCorrect";?></span>
					<span id="InCorrect">.</span><br/>
					<span style="color:white;font-size: x-large;">Answered  : <?php echo "$Total";?></span>
					<span id="Ansewered">.</span><br/>
					<br/>
					<button type="button" style="width: 80px;" onclick="location.href = 'Logout.php';"> Logout</button>
                </div>
                
			</div>
			
			<div id="content_footer">
			</div>
			
			<div id="footer">
				<p>
					<a href="">Home</a> | 
					<a href="">Register</a> | 
					<a href="">Test</a> | 
					<a href="Score.php">Score</a> | 
					<a href="Help.html">Help</a>
				</p>
			</div>
		</div>
	</body>  
<html>
