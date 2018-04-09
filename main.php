<html>
<head>
	<title>Music</title>
	<link rel = "stylesheet" type="text/css" href = "style.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script>
		$("a[href='#top']").click(function() {
			$("html, body").animate({ scrollTop: 0 }, "slow");
			return false;
		});	
	</script>
	<script>
		$(document).ready(function(){
			$("h3").mouseover(function(){
				$("h3").css("background-color", "AliceBlue");
			});
			$("h3").mouseout(function(){
				$("h3").css("background-color", "White");
			});
		});
	</script>
</head>


<body>
	<?php
		include 'header.php';
	?>	
	<script type="text/javascript">
		var d = document.getElementById("main");
		d.className = "active";
	</script>
	<div class="container">	
		<div class="row">
			<?php
				$con = mysqli_connect("localhost", "root", "", "music");
				$query = "SELECT * FROM uploads";
				$result = mysqli_query($con, $query);

				while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
					echo '<div class="col-sm-6">
							<h3>' . $row['name'] . '</h3>
							<p> ' . $row['title'] . '</p>
							<img src = "images/' . $row['img'] . '">
							<audio controls>
								<source src= "audio/' . $row['audio'] . '" type="audio/mpeg">
							</audio>
						  </div>';

						  //GHOSTEMANE - Andromeda.mp3
						  //<source src= "audio/' . $row['audio'] . '" type="audio/mpeg">
				}
				if (isset($_POST['enter']))
				{
					$username = $_POST['user'];
					$password = md5($_POST['pass']);
					$con = mysqli_connect("localhost", "root", "", "music");
					// Check connection
					if (mysqli_connect_errno())
					{
						echo "Failed to connect to MySQL: " . mysqli_connect_error();
					}
					$result = mysqli_query($con, "SELECT * FROM login WHERE username = '$username' AND passwd = '$password';");
					if(mysqli_num_rows($result) == 1)
					{	
						setcookie('login', $_POST['user'] , time() + 3600);
					}else{
						echo "Error";
					}
				}
				if(isset($_COOKIE['login']) && $_COOKIE['login'] == 'admin') 
				{
					echo ' 
						<div class="col-sm-6">
							<form action = "main.php" method = "post" enctype = "multipart/form-data">
								<h3><input type="text" id="actor" placeholder="Actor name" name="actor" class="form-control" style="width: 72%;" required></h3>
								<p><input type="text" id="song"placeholder="Song title" name="song"  class="form-control" style="width: 72%; height: 28px;" required></p>
								<label for="myfile"><img src = "images/add-512.png" style="max-width: 90%; height: auto;"></label>
								<input type="file" id="myfile" name="myfile" style = "display: none;" required><br>
								<input type="file" id="audio" name="audio" required></br>
								<input type="submit" id="upl" name="upl" value = "Upload">
							</form> 
						</div>
					';
					if(isset($_POST['upl']) && isset($_FILES['myfile']) && isset($_FILES['audio'])){
						$mus = "audio/";
						$dir = "images/";
						$max_size = 2097152;
						$audio_max_size = 10485760;
						$actor = $_POST['actor'];
						$title = $_POST['song'];

						$name = $_FILES['myfile']['name'];
						$size = $_FILES['myfile']['size'];
						$type = $_FILES['myfile']['type'];
						$tmp_name = $_FILES['myfile']['tmp_name'];
						$img_extension = strtolower(substr($name, strpos($name, '.') + 1));
						
						echo $audio_name = $_FILES['audio']['name'] . '</br>';
						echo $path = $mus.basename($_FILES['audio']['name']);
						//echo $audio_size = $_FILES['audio']['size'] . '</br>';
						//echo $audio_type = $_FILES['audio']['type'] . '</br>';
						echo $audio_tmp_name = $_FILES['audio']['tmp_name'] .'</br>';
						//echo $audio_tmp_name = $_FILES['audio']['tmp_name'] . '</br>';
						//echo $audio_extension = strtolower(substr($audio_name, strpos($audio_name, '.') + 1)) . '</br>';
						$t = 0;
						$k = 0;
						if(!empty($name))
						{
							if(($img_extension == 'jpg' || $img_extension == 'jpeg' || $img_extension == 'png') && $type == 'image/jpeg')
							{
								if($size < $max_size)
								{
									if(move_uploaded_file($tmp_name, $dir.$name))
										{
											echo 'Image uploaded';
											$k = 1;
										}
									
								}else{
									echo 'File size is too big.</br>';
									}
								
							}else{	
									echo 'Upload only images (jpg, jpeg, png).';
								}
						}else{
							echo 'Choose a file</br>';
						}
						if(!empty($audio_name))
						{
							//if($audio_extension == 'mp3' && ($audio_type == 'audio/mp3' || $audio_type == "audio/mpeg"))
							//{
							//	if($audio_size < $audio_max_size)
							//	{
								echo $_FILES['audio']['error'];
								echo 'audio tmp ' . $_FILES['audio']['tmp_name'] .'</br>';
								echo 'path ' . $path . '</br>';
									if(move_uploaded_file($audio_tmp_name, $path))
										{
											$t = 1;
											echo 'Song uploaded</br>';
										}
									
								//}else{
									//echo 'File size is too big.</br>';
								//	}
								
							//}else{	
								//	echo 'Upload only audio (mp3).</br>';
							//	}
						}else{
							echo 'Choose a file</br>';
						}

						if($k == 1 && $t == 1){
							$con = mysqli_connect("localhost", "root", "", "music");
							if (mysqli_connect_errno())
								{
									echo "Failed to connect to MySQL: " . mysqli_connect_error();
								}
							mysqli_query($con, "INSERT INTO uploads (name, title, img, audio) VALUES('$actor', '$title', '$name', '$audio_name');");
							echo 'Success';
						}
					}



				}
			?>
			
		</div>
		<a href="#top" class="gotop"><span class="glyphicon glyphicon-chevron-up"></span></a>
	</div>
	<?php
		include 'footer.php';
	?>
</body>
</html>