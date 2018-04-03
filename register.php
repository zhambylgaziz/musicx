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
        <form action="register.php"  method="post">
			<input type="text" name ="firstname" id="first" class="form-control" placeholder="First name" style="margin-top: 5px;"  required>
			<input type="text" name = "last" id="last" class="form-control" placeholder="Last name" style="margin-top: 5px;" required>
			<input type="email" name = "mail" id="mail" class="form-control" placeholder="E-mail" style="margin-top: 5px;"  required><br>
			<p></p>
			<input type="text" name = "login" id="user" class="form-control" placeholder="Username"  required>
            <input type="password" name = "passwd" id="pass" class="form-control" placeholder="Password" style="margin-top: 5px;"  required>
            <input type="password" name = "passwd2" id="confirm" class="form-control" placeholder="Confirm Password" style="margin-top: 5px;" required><br>
            <button type="submit" name = "reg" class="btn btn-lg btn-primary btn-block btn-signin" onclick="check()" ><span class="glyphicon glyphicon-ok" ></span> Sign up</button>
		</form>
		<a href="login.php" class="forgot-password">Already have an account?</a>
		<?php
			$conn = mysqli_connect("localhost", "root", "", "music");
			if($_POST["reg"]){
				$firstname = $_POST['firstname'];
				$lastname = $_POST['last'];
				$mail = $_POST['mail'];
				$login = $_POST['login'];
				$password1 = $_POST['passwd'];
				$password2 = $_POST['passwd2'];

				if($password1 == $password2){
					$pass = md5($password);
					$query = "INSERT INTO login (username, passwd) VALUES ('$login', '$pass')";
					$result = mysqli_query($query);
					if($result){
						echo 'Success';
					}else{
						echo 'Fail';
					}
					// $query2 = mysql_query("INSERT INTO login VALUES ('', '$login', '$pass')") or die(mysql_error());
				}
			}
		?>
    </div>
	<?php
		include 'footer.php';
	?>
</body>
</html>