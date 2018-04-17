<?php
	if(!isset($_COOKIE['login'])) {
    	echo '
    	<div class = "nav">
			<ul id = "myList">
				<li><a href = "index.php" id="home">Home</a></li>
				<li><a href = "contact.php" id="contact">Contact</a></li>
				<li><a href = "#">About</a></li>
				<li><a href = "register.php" id="reg"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
				<li><a href = "login.php" id="login"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
				<li><a href = "main.php" id="main">Main</a></li>
			</ul>
		</div>

    	';
	} else {
		echo '
    	<div class = "nav">
			<ul id = "myList">
				<li><a href = "index.php" id="home">Home</a></li>
				<li><a href = "contact.php">Contact</a></li>
				<li><a href = "#">About</a></li>
				<li><a href = "main.php" id="main">Main</a></li>	
				<li style = "height: 0;">
					<form action = "login.php" method = "post">
						<button type="submit" name="quit" value="quit" class="bt">
							Log out <span class="glyphicon glyphicon-log-in"></span>
						</button>								
					</form>
				</li>

			</ul>
		</div>

    	';
	}


	
?>	
