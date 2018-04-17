<html>
<head>
	<title>Test</title>
	<meta charset="utf-8">
</head>
<body>
	<form action="test.php" method="post" enctype="multipart/form-data">
		<p>file1: <input type="file" name="file1"></p>
		<!-- <p>file2: <input type="file" name="file2"></p> -->
		<p><input type="submit" name="upload" value="submit">
	</form>
	<?php
		if (isset($_POST['upload'])) {
			if(isset($_FILES['file1'])){//} && isset($_FILES['file2'])){
				echo $file1 = $_FILES['file1']['name'] . '</br>';
				echo $file1_s = $_FILES['file1']['size'] . '</br>';
				echo $file1_t = $_FILES['file1']['type'] . '</br>';
				echo $file1_tmp = $_FILES['file1']['tmp_name'] . '</br>';
				// echo $file2 = $_FILES['file2']['name'] . '</br>';
				// echo $file2_s = $_FILES['file2']['size'] . '</br>';
				// echo $file2_t = $_FILES['file2']['type'] . '</br>';
				// echo $file2_tmp = $_FILES['file2']['tmp_name'] . '</br>';
				$dir = 'test/';
				$path = $dir.basename($_FILES['file1']['name']);
				if(move_uploaded_file($_FILES['file1']['tmp_name'], $path)){
					echo 'uploaded </br>';
				}
			}
		}
	?>

</body>
</html>