<html>
<head>
	<title>Music</title>
	<link rel = "stylesheet" type="text/css" href = "style.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link href="https://fonts.googleapis.com/css?family=Berkshire+Swash|Bitter|Black+Han+Sans|Rajdhani|Titillium+Web" rel="stylesheet">
	<style>
		.name{
			font-family: 'Bitter', serif;
		}
		.time{
			font-family: 'Rajdhani' sans-serif;
		}
		.comment{
			font-family: 'Berkshire Swash', cursive;
			font-size: 15pt;
		}
	</style>
</head>
<body>
	<?php
		include 'header.php';
	?>		
	<script type="text/javascript">
			var d = document.getElementById("contact");
			d.className = "active";
			
	</script>

	<?php
		if(!isset($_COOKIE['login'])) {
			echo'
				<script>
					var m = document.getElementById("main");
					m.className = "inactive";
				</script>
			';
		}
	?>

	<div class="container">
		<div class="row">
			<div class="col-sm-12">
					
			</div>
			<div class="col-sm-3">
				<h2 style="font-family: 'Black Han Sans', sans-serif; "> Contact </h2>
				<p style="font-family: 'Titillium Web', sans-serif;"><span class="glyphicon glyphicon-map-marker"></span> Kazakhstan, Almaty</p>
				<p style="font-family: 'Titillium Web', sans-serif;"><span class="glyphicon glyphicon-earphone"></span> 8 (700) 088 1551</p>
				<p style="font-family: 'Titillium Web', sans-serif;"><span class="glyphicon glyphicon-envelope"></span> zhambylgaziz@gmail.com</p>
				
				
			
			</div>
			<div class="col-sm-8">
				<h2 class="text-center" style="font-family: 'Black Han Sans', sans-serif; "> Feedback </h2>
				<?php
					$con = mysqli_connect("localhost", "root", "", "music");
					$query = "SELECT * FROM comment";
					$result = mysqli_query($con, $query);
					while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
						echo '
							<div class="col-sm-5">
								<h4 class = "namee">' . $row['name'] . '</h4>
								<h6 class = "time">' . $row['time'] . '</h6>
								<p class = "comment">' . $row['comment'] . ' </p>

							</div>
						';
					}
					if(isset($_COOKIE['login'])) 
					{
						echo ' 
							<div class="col-sm-5">
								<form action = "contact.php" method = "post">
									<h3><input type="text" placeholder="Name" name="name" class="form-control" style="width: 80%;" required></h3>
									<p><textarea name="comment" id="comment" rows="6"  style="width: 80%;" required></textarea></p>
									<input type="submit" name="add" value = "Comment">
								</form> 
							</div>
						';
					}
					if(isset($_POST['add'])){
						$name = $_POST['name'];
						$comment = $_POST['comment'];
						$add = "INSERT INTO comment(name, time, comment) VALUES ('$name', CURRENT_TIMESTAMP, '$comment');";
						if(mysqli_query($con, $add)){
							echo '<script>window.alert("Thank you for comment")</script>';
						}
					}
				?>
			</div>
		</div>
		
	</div>
	
	<?php
		include 'footer.php';
	?>
</body>
</html>