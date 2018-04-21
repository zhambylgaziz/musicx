<?php
	if (isset($_POST['enter']))
	{
		$username = $_POST['user'];
		$password = md5($_POST['pass']);
		$con = mysqli_connect("localhost", "root", "", "music");
		if (mysqli_connect_errno())
			{
				echo "Failed to connect to MySQL: " . mysqli_connect_error();
			}
		$result = mysqli_query($con, "SELECT * FROM login WHERE username = '$username' AND passwd = '$password';");
		if(mysqli_num_rows($result) == 1)
		{	
			setcookie('login', $_POST['user'] , time() + 3600);
			
		}else{
			echo "Error";
		}
	}
	header('Location: login.php');	
?>