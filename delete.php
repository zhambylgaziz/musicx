<?php
	$con = mysqli_connect("localhost", "root", "", "music");
	$id = $_GET['item'];
	$add = "DELETE FROM uploads WHERE sid='$id'";
	if(mysqli_query($con, $add)){
		echo '<script>window.alert("Item deleted")</script>';
	}else{
		'<script>window.alert("Item wtf")</script>';
	}
	mysqli_close($con); 	
	header("Location: main.php");
?>	