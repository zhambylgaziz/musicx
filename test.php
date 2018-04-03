<html>
<head>
	<title>Test</title>
	<meta charset="utf-8">
</head>
<body>
	<?php
	if(isset($_POST['submitt']))
		if(isset($_COOKIE['login']))
		{	
			setcookie('login', $_POST['namee'] , 1);
		}

	if(isset($_COOKIE['login']))
	{
		echo "
		<form action='test.php' method='post'>
			<input type='submit' name='submitt'  value='logout'>
		</form>";	
	}
	else
	{
		echo
			"<form action='test.php' method='post'>
				<input type='text' name='namee' placeholder='name' >
				<input type='password' name='passwordd'  placeholder='password' >
				<input type='submit'  value='Submit' name='test'>
			</form>";
	}

	if(isset($_POST['test']))
		if($_POST['namee']=="aldi" && $_POST['passwordd']=="123")
		{	
			echo "welcome aldi";
			setcookie('login', $_POST['namee'] , time() + 600);
		}
?>


<div class='controls'>
	<div id="File button">
		<div style="position:absolute;">
			<label for="fileButton"><img src="images/add-512.png"></label>
		</div>
		<input id="fileButton" type="file" name="file" />
		<?php //echo form_error('file');   ?> <br /><br />
	</div>
</div>

</body>
</html>