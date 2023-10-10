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
			$_SESSION['counter'] = $_SESSION['counter'] + 1;
			$host = 'localhost';
			$user = 'root';
			$pass = '';
			$db = '16co63';
			$conn = new mysqli($host,$user,$pass,$db);//3306,socket
			$C = $_SESSION['counter'];
			$sql = "SELECT * FROM question where question_id = '$C'" ;
			
			$result = $conn->query($sql)or die($conn->error);
			$row=mysqli_fetch_assoc($result);
			
			if(mysqli_num_rows($result)== 0){
				echo "<script>alert(' Test Over ');location='Score.php?id = $Id';</script>";
			}
			$Question = $row['question'];
			$QuestionID = $row['question_id'];
			
			$sql = "SELECT * FROM questionchoices where question_id = '$QuestionID'" ;
			
			$result = $conn->query($sql)or die($conn->error);
			$row1=mysqli_fetch_assoc($result);
			$row2=mysqli_fetch_assoc($result);
			$row3=mysqli_fetch_assoc($result);
			$row4=mysqli_fetch_assoc($result);
			
			$Choice1 = $row1['choice'];
			$Choice2 = $row2['choice'];
			$Choice3 = $row3['choice'];
			$Choice4 = $row4['choice'];
			$Cid1 = $row1['choice_id'];
			$Cid2 = $row2['choice_id'];
			$Cid3 = $row3['choice_id'];
			$Cid4 = $row4['choice_id'];
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
					  <li  class="selected"><a>Test</a></li>
					  <li><a href="">Score</a></li>
					  <li><a href="">Help</a></li>
					</ul>
				</div>
			</div>
			
			<div id="content_header">
			</div>
			
			<div id="site_content">
               
                <div id="sidebar_container" ></div>
                <div id="content" >
                    <p id="question" style="color:white;font-size:30px;"><?php echo "$Question";?></p>
					<form style="color:white;" action="TestTest.php" method="post">
					<table style="font-size: 20px;">
						<tr><td><input type="radio" name="C" value="<?php echo "$Cid1";?>" required/></td><td><p><?php echo "$Choice1";?></p></td></tr>
						<tr><td><input type="radio" name="C" value="<?php echo "$Cid2";?>"/></td><td><p><?php echo "$Choice2";?></p></td></tr>
						<tr><td><input type="radio" name="C" value="<?php echo "$Cid3";?>"/></td><td><p><?php echo "$Choice3";?></p></td></tr>
						<tr><td><input type="radio" name="C" value="<?php echo "$Cid4";?>"/></td><td><p><?php echo "$Choice4";?></p></td></tr>
					</table/>
					<br/>
					<input type="submit" value="Next" style="width: 50px;"/>
					<button type="button" style="width: 50px;" onclick="location.href = 'Score.php';"> Submit</button>
					</form>
                </div>
                
			</div>
			
			<div id="content_footer">
			</div>
			
			<div id="footer">
				<p>
					<a href="">Home</a> | 
					<a href="">Register</a> | 
					<a href="Test.php">Test</a> | 
					<a href="">Score</a> | 
					<a href="">Help</a>
				</p>
			</div>
		</div>
	</body>  
<html>
