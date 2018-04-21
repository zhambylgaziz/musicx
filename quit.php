<?php
	if(isset($_COOKIE['login']))
	{
		if(isset($_POST["quit"]))
		{
			setcookie('login', '', -1);
		}
	}
	header('Location: login.php');
?>