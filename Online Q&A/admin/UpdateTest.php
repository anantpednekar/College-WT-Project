<?php
	session_start();
	if(!isset($_SESSION['ID']))
		echo "<script>alert(' Not Logged in! ');location='AdminLogin.html';</script>";
	$Id=$_GET['id'];
	$Name = $_POST['name'];
	$Email = $_POST['email'];
	$Phone = $_POST['phone'];
	$Password = $_POST['userpassword'];
	$Dob = $_POST['dob'];
	
	$host = 'localhost';
	$user = 'root';
	$pass = '';
	$db = '16co63';
	$conn = mysqli_connect($host,$user,$pass,$db);//3306,socket
	
	$sql="UPDATE user SET 
	user_name = '$Name',
	user_email = '$Email',
	user_phone = '$Phone',
	user_pass = '$Password',
	user_dob = '$Dob' 
	WHERE user_id=$Id";
	$query=mysqli_query($conn,$sql) or die(mysqli_error($conn));
	echo "<script>alert('Updated!!');location='AdminHome.html';</script>";
?>