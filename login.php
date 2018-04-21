<html>
<head>
	<title>Music</title>
	<link rel = "stylesheet" type="text/css" href = "style.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src = "logscript.js"></script>
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
		if(isset($_COOKIE['login'])){
			header('Location: main.php');
		}
	?>		
	<script type="text/javascript">
		var d = document.getElementById("login");
		d.className = "active";
		var m = document.getElementById("main");
		m.className = "inactive";
	</script>
	<div class="container">
        <form action='signin.php' method='post'>
			<input type="text" id="user" class="form-control" placeholder="Username" name='user' >
            <input type="password" id="pass" class="form-control" placeholder="Password" style="margin-top: 5px;" name='pass'>
            <div id="remember" class="checkbox">
				<label>
					<input type="checkbox" value="remember-me"> Remember me
				</label>
            </div>
                <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit" name='enter' ><span class="glyphicon glyphicon-ok"></span> Sign in</button> <!--onclick="check()"-->
		</form>
        <a href="#" class="forgot-password">Forgot the password?</a><br>
    </div>
	<?php
		include 'footer.php';
	?>
</body>
</html>