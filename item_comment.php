<?php
	$con = mysqli_connect("localhost", "root", "", "music");
	$sid = $_GET['item'];
	if(isset($_POST['com'])){
		$com = $_POST['comment'];
		$username = $_COOKIE['login'];
		$item_comment3 = "SELECT * FROM login WHERE username = '$username';";
		$c3_result = mysqli_query($con, $item_comment3);
		$c3_row = mysqli_fetch_array($c3_result, MYSQLI_ASSOC);
		$us = $c3_row['id'];
		$query = "INSERT INTO item_comment (sid, uid, time, comment) VALUES ('$sid', '$us', CURRENT_TIMESTAMP, '$com');";
		if(mysqli_query($con, $query)){
			echo '<script>
					alert("Thank you for comment");
				  </script>';
		}else{
			echo '<script>
					alert("Error occured!");
				  </script>';
		}
	}	
	mysqli_close($con); 	
	header("Location: item.php?item=".$sid);
?>	