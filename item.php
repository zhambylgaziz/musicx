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
			<!-- <div class="col-sm-12">
					
			</div>
			<div class="col-sm-3">
				<h2 style="font-family: 'Black Han Sans', sans-serif; "> Contact </h2></br>
				<p style="font-family: 'Titillium Web', sans-serif;"><span class="glyphicon glyphicon-map-marker"></span> Kazakhstan, Almaty</p>
				<p style="font-family: 'Titillium Web', sans-serif;"><span class="glyphicon glyphicon-earphone"></span> 8 (700) 088 1551</p>
				<p style="font-family: 'Titillium Web', sans-serif;"><span class="glyphicon glyphicon-envelope"></span> zhambylgaziz@gmail.com</p>
			</div> -->
			<div class="col-sm-8">
				<?php
					$sid = $_GET['item'];
					$con = mysqli_connect("localhost", "root", "", "music");
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
					$query = "SELECT * FROM uploads WHERE sid = '$sid'";
					$result = mysqli_query($con, $query);
					$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
					echo '
							<div class="col-sm-7">
								<img src = "images/' . $row['img'] . '" style = "max_width: 400px; height: 400px;">
							</div>
							<div class="col-sm-3">
								<h3>' . $row['name'] . '</h3>
								<p> ' . $row['title'] . '</p>
								<audio controls>
									<source src= "audio/' . $row['audio'] . '" type="audio/mpeg">
								</audio>
							</div>
						';
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
					$item_comment = "SELECT * FROM item_comment WHERE sid = '$sid';";
					if($c1_result = mysqli_query($con, $item_comment)){	
						if(isset($_COOKIE['login']) && $_COOKIE['login'] == 'admin') 
						{	
							while($c1_row = mysqli_fetch_array($c1_result, MYSQLI_ASSOC)){
								$uid = $c1_row['uid'];
								$item_comment2 = "SELECT * FROM reg WHERE uid = '$uid';";
								$c2_result = mysqli_query($con, $item_comment2);
								$c2_row = mysqli_fetch_array($c2_result, MYSQLI_ASSOC);
								echo '
								<div class="col-sm-6">
									<h4 class = "namee">' . $c2_row['firstname'] .' ' . $c2_row['lastname'] .'</h4>
									<h6 class = "time">' . $c1_row['time'] . '<a href = "delete.php?cid='.$c1_row['id'].'&it='.$sid.'"><span class="glyphicon glyphicon-remove"></span></a></h6>
									<p class = "comment">' . $c1_row['comment'] . ' </p>
								</div>
							';
							}
						}else{
							while($c1_row = mysqli_fetch_array($c1_result, MYSQLI_ASSOC)){
								$uid = $c1_row['uid'];
								$item_comment2 = "SELECT * FROM reg WHERE uid = '$uid';";
								$c2_result = mysqli_query($con, $item_comment2);
								$c2_row = mysqli_fetch_array($c2_result, MYSQLI_ASSOC);
								echo '
								<div class="col-sm-6">
									<h4 class = "namee">' . $c2_row['firstname'] .' ' . $c2_row['lastname'] .'</h4>
									<h6 class = "time">' . $c1_row['time'] . '</h6>
									<p class = "comment">' . $c1_row['comment'] . ' </p>
								</div>
							';
							}
						}

					}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
					if(isset($_COOKIE['login'])) 
					{
						$username = $_COOKIE['login'];
						$item_comment3 = "SELECT * FROM login WHERE username = '$username';";
						$c3_result = mysqli_query($con, $item_comment3);
						$c3_row = mysqli_fetch_array($c3_result, MYSQLI_ASSOC);
						$us = $c3_row['id'];
						$item_comment4 = "SELECT * FROM reg WHERE uid = '$us';";
						$c4_result = mysqli_query($con, $item_comment4);
						$c4_row = mysqli_fetch_array($c4_result, MYSQLI_ASSOC);
						echo ' 
							<div class="col-sm-12">
								<form action = "item_comment.php?item='.$sid.'" method = "post">
									<h3>'. $c4_row['firstname'] .' ' . $c4_row['lastname'] .'</h3>
									<p><textarea name="comment" id="comment" rows="6"  style="width: 80%;" required></textarea></p>
									<input type="submit" name="com" value = "Comment">
								</form> 
							</div>
						';
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