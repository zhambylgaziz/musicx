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
				if(isset($_COOKIE['login']) && $_COOKIE['login'] == 'admin') {
					while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
						echo '<div class="col-sm-6">
								<h3>' . $row['name'] . '</h3>
								<p> ' . $row['title'] . ' <a href = "delete.php?item='.$row['sid'].'"><span class="glyphicon glyphicon-remove"></span></a></p>
								<img src = "images/' . $row['img'] . '" style = "max_width: 400px; height: 400px;">
								<audio controls>
									<source src= "audio/' . $row['audio'] . '" type="audio/mpeg">
								</audio>
							  </div>';
					}
				}
				else{
					while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
						echo '<div class="col-sm-6">
								<h3>' . $row['name'] . '</h3>
								<p> ' . $row['title'] . '</p>
								<img src = "images/' . $row['img'] . '" style = "max_width: 400px; height: 400px;">
								<audio controls>
									<source src= "audio/' . $row['audio'] . '" type="audio/mpeg">
								</audio>
							  </div>';
					}
				}
				if(isset($_COOKIE['login']) && $_COOKIE['login'] == 'admin') 
				{
					echo ' 
						<div class="col-sm-6">
							<form action = "upload.php" method = "post" enctype = "multipart/form-data">
								<h3><input type="text" id="actor" placeholder="Actor name" name="actor" class="form-control" style="width: 72%;" required></h3>
								<p><input type="text" id="song"placeholder="Song title" name="song"  class="form-control" style="width: 72%; height: 28px;" required></p>
								<label for="myfile"><img src = "images/add-512.png" style = "max_width: 400px; height: 400px;" id = "img"></label>
								<input type="file" id="myfile" name="myfile" style = "display: none;" required"><br>
								<input type="file" id="audio" name="audio" required></br>
								<input type="submit" id="upl" name="upl" value = "Upload">
							</form> 
						</div>
					';
				}
			?>
			<script>
			    $(function () {
			        $("#myfile").change(function () {
			            readURL(this);
			        });
			    });

			    function readURL(input) {
			        if (input.files && input.files[0]) {
			            var reader = new FileReader();
				        var str = input.files[0].name;
				        var pos = str.indexOf(".");
						var pos2 = str.length;
						var res = str.substring(pos+1, pos2)
						if(res == "jpg" || res == "jpeg" || res == "png"){
							reader.onload = function (e) {
				                $('#img').attr('src', e.target.result);
				            }
				            reader.readAsDataURL(input.files[0]);
						}else{
							alert("Choose only picture!");
						}
			            
			        }
			    }
			</script> 

		</div>
		<a href="#top" class="gotop"><span class="glyphicon glyphicon-chevron-up"></span></a>
	</div>
	<?php
		include 'footer.php';
	?>
</body>
</html>