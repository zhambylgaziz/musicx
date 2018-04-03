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
			<div class="col-sm-6">
				<h3>Khalid</h3>
				<p>American dream</p>
				<img src = "images/american.jpg">
				
			</div>
			<div class="col-sm-6">
				<h3>Ed Sheeran</h3>
				<p>Divide</p>
				<img src = "images/divide.jpg">
			</div>
			<div class="col-sm-6">
				<h3>G-Eazy</h3>
				<p>Beautiful and Damned</p>
				<img src = "images/beautiful.png">
			</div>
			<div class="col-sm-6">
				<h3>MØ</h3>
				<p>When I was young</p>
				<img src = "images/when.jpg">
			</div>
			<div class="col-sm-6">
				<h3>Bebe Rexha</h3>
				<p>All your fault</p>
				<img src = "images/allyour.jpg">
			</div>

			<?php
				if (isset($_POST['enter']))
				{
					if($_POST['user']=="admin" && $_POST['pass']=="12345")
					{	
						setcookie('login', $_POST['user'] , time() + 600);
					}
				}
				if(isset($_COOKIE['login'])) 
				{
					echo ' 
						<div class="col-sm-6">
							<form>
								<h3><input type="text" id="actor" placeholder="Actor name" name="actor" class="form-control" style="width: 72%;"></h3>
								<p><input type="text" id="song"placeholder="Song title" name="song"  class="form-control" style="width: 72%; height: 28px;"></p>
							
								<label for="myfile"><img src = "images/add-512.png"></label>
								<input type="file" id="myfile" name="myfile" style = "display: none;">
							</form>
						</div>
					';
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