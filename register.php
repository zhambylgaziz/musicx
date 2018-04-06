<html>
<head>
	<title>Music</title>
	<link rel = "stylesheet" type="text/css" href = "style.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src = "regscript.js"></script>
	<style>
	.container{
		margin-top: 50px;
		width: 100%;
		
		
	}
	@media only screen and (min-width: 650px) {
		.container{ 
			width: 25%;
		}
	}
	</style>
</head>


<body>
	<?php
		include 'header.php';
	?>		
	<script type="text/javascript">
		var d = document.getElementById("reg");
		d.className = "active";
		var m = document.getElementById("main");
		m.className = "inactive";
	</script>
	<div class="container">
        <form action = "register.php" method = "post">
			<input type="text" name = "first" id="first" class="form-control" placeholder="First name" style="margin-top: 5px;" required>
			<input type="text" name = "last" id="last" class="form-control" placeholder="Last name" style="margin-top: 5px;" required>
			<input type="email" name = "mail" id="mail" class="form-control" placeholder="E-mail" style="margin-top: 5px;" required><br>
			<p></p>
			<input type="text" name = "user" id="user" class="form-control" placeholder="Username" required>
            <input type="password" name = "pass" id="pass" class="form-control" placeholder="Password" style="margin-top: 5px;" required>
            <input type="password" name = "confirm" id="confirm" class="form-control" placeholder="Confirm Password" style="margin-top: 5px;" required><br>
            <button type="submit" name = "register" class="btn btn-lg btn-primary btn-block btn-signin"  onclick="check()"><span class="glyphicon glyphicon-ok"></span> Sign up</button>
		</form>
		<a href="login.html" class="forgot-password">Already have an account?</a>
		<?php
			if(isset($_POST['register']))
			{
				$first = $_POST['first'];
				$last = $_POST['last'];
				$mail = $_POST['mail'];
				$user = $_POST['user'];
				$pass = $_POST['pass'];
				$confirm = $_POST['confirm'];
				if($pass = $confirm){
					$password = md5($pass);
					$con = mysqli_connect("localhost", "root", "", "music");
					// Check connection
					if (mysqli_connect_errno())
					{
						echo "Failed to connect to MySQL: " . mysqli_connect_error();
					}
					$result = mysqli_query($con, "SELECT * FROM login WHERE username = '$user';");
					if(mysqli_num_rows($result) == 0)
						{
							mysqli_query($con, "INSERT INTO reg (firstname, lastname, email) VALUES('$first', '$last', '$mail');");
							mysqli_query($con, "INSERT INTO login (username, passwd) VALUES('$user', '$password');"); 
						}else
						{
							echo 'Username exists';
						}

					mysqli_close($con);
				}
				
			}
		
		
		?>
    </div>
	<?php
		include 'footer.php';
	?>
</body>
</html>