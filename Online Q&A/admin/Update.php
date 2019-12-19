<!DOCTYPE html>


<script>
    function submitForm(){
        var x = document.forms["login_form"]["name"].value;
        if (x == "") {
            alert(" Name cannot be Empty ");
            document.getElementsByName("name").focus();
            return false;
        }
        
        x = document.forms["login_form"]["email"].value;
        if (x == "") {
            alert(" Email cannot be Empty ");
            return false;
        }
        var atposition=x.indexOf("@");  
        var dotposition=x.lastIndexOf(".");  
        if (atposition<1 || dotposition<atposition+2 || dotposition+2>=x.length){
            alert(" Invalid Email ");
            return false;
        }
        
        x = document.forms["login_form"]["phone"].value;
        if (x == "") {
            alert(" Phone cannot be Empty ");
            document.getElementsByName("phone").focus();
            return false;
        }
        if (x.length <10) {
            alert(" Incorect Phone number ");
            document.getElementsByName("phone").focus();
            return false;
        }
        
        var passw=  /^[A-Za-z0-9]\w{7,14}$/;
        x = document.forms["login_form"]["userpassword"].value;
        if (x == "") {
            alert(" Password cannot be Empty ");
            document.getElementsByName("userpassword").focus();
            return false;
        }
        if (!x.match(passw)) {
            alert(" Password must be between 7 to 16 characters or numbers ");
            document.getElementsByName("userpassword").focus();
            return false;
        }
        
        
        x = document.forms["login_form"]["dob"].value;
        if (x == "") {
            alert(" Birth Date cannot be Empty ");
            document.getElementsByName("dob").focus();
            return false;
        }
        x = document.forms["login_form"]["stream"].value;
        if (x == "") {
            alert(" Stream cannot be Empty ");
            document.getElementsByName("stream").focus();
            return false;
        }
        return true;
    }
    
</script>


<html>
	<head>
		
		<title>Online Examination</title>
		<link href="../style/main.css" rel="stylesheet">
	</head>
    
	<body>
		<?php
			session_start();
			if(!isset($_SESSION['ID']))
				echo "<script>alert(' Not Logged in! ');location='AdminLogin.html';</script>";
			$Id=$_GET['id'];
			$host = 'localhost';
			$user = 'root';
			$pass = '';
			$db = '16co63';
			$conn1 = mysqli_connect($host,$user,$pass,$db);//3306,socket
			
			$sql="SELECT * FROM `user` WHERE `user_id` =  '$Id'";
			
			$result = $conn1->query($sql)or die($conn1->error);
			$data = $result->fetch_assoc();
			
			$Name = $data['user_name'];
			$Email = $data['user_email'];
			$Phone = $data['user_phone'];
			$Password = $data['user_pass'];
			$Dob = $data['user_dob'];
			
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
               
                <div id="content" >
                    <div id="login" >
                        <form id="login_form"  action="UpdateTest.php?id=<?php echo $Id; ?>" onsubmit="return submitForm()" method="post">
                            <table id="login_table" style="width:244px;height:300px;padding-top:0px;padding-bottom:0px;" >
                                <h5 style="color: #FFF; font-size: medium ;text-align: center"> New Student </h5>
                                <tr> 
                                    <td><input class="ip" type="text" name="name" value='<?php echo $Name; ?>'></td> 
                                </tr>
                                <tr> 
                                    <td ><input class="ip" type="email" name="email" value='<?php echo $Email; ?>'></td> 
                                </tr>
								<tr> 
                                    <td><input class="ip" type="text" name="phone" value='<?php echo $Phone; ?>'></td> 
                                </tr>
                                <tr>
                                    <td><input class="ip" type="password" name="userpassword" value='<?php echo $Password; ?>'></td>  
                                </tr>
								<tr>
                                    <td><input class="ip" type="date" name="dob" value='<?php echo $Dob; ?>'></td>  
                                </tr>
                                
                                <tr>
                                    <td><input type="submit" value=" Update "></td>
                                </tr>
                            </table>
                    </form>
                    </div>
                </div>
                
			</div>
			
			<div id="content_footer">
			</div>
			
			<div id="footer">
				<p>
					ADMIN
				</p>
			</div>
		</div>
	</body>  
<html>
