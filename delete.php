<?php
	$con = mysqli_connect("localhost", "root", "", "music");
	if($id = $_GET['item']){
		$add = "DELETE FROM uploads WHERE sid='$id'";
		if(mysqli_query($con, $add)){
			echo '<script>window.alert("Item deleted")</script>';
			header("Location: main.php");
		}else{
			'<script>window.alert("Error")</script>';
			header("Location: main.php");
		}
	}
	if($com = $_GET['com']){
		$com = "DELETE FROM comment WHERE id='$com'";
		if(mysqli_query($con, $com)){
			echo '<script>window.alert("Item deleted")</script>';
			header("Location: contact.php");
		}else{
			'<script>window.alert("Error")</script>';
			header("Location: contact.php");
		}
	}
	if($cid = $_GET['cid']){
		$it = $_GET['it'];
		$del = "DELETE FROM item_comment WHERE id='$cid'";
		if(mysqli_query($con, $del)){
			echo '<script>window.alert("Item deleted")</script>';
			header("Location: item.php?item=".$it);
		}else{
			'<script>window.alert("Error")</script>';
			header("Location: item.php?item=".$it);
		}
	}

?>	