
	<?php
		session_start();
		if(!isset($_SESSION['ID']))
			echo "<script>alert(' Not Logged in! ');location='index.html';</script>";
		
		unset($_SESSION['ID']);
		session_destroy();
		echo "<script>alert(' Logged Out! ');location='index.html';</script>";		
	?>
