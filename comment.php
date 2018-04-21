<?php
	$con = mysqli_connect("localhost", "root", "", "music");
	if(isset($_POST['add']))
	{
		$name = $_POST['name'];
		$comment = $_POST['comment'];
		$add = "INSERT INTO comment(name, time, comment) VALUES ('$name', CURRENT_TIMESTAMP, '$comment');";
		if(mysqli_query($con, $add)){
			echo '<script>window.alert("Thank you for comment")</script>';
		}
	}
	mysqli_close($con); 	
	header("Location: contact.php");
?>	