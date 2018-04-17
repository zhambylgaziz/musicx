<html>
<head>
	<title>Music</title>
	<link rel = "stylesheet" type="text/css" href = "style.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 	<?php
		$dir = "slider/";
		$array = array();
		if (is_dir($dir))
		{
		  	if (($dh = opendir($dir)))
		  	{
		    	while (($file = readdir($dh)) !== false){
		    		if($file !== '.' && $file !== '..')
		    		{
		    			array_push($array, $dir . '/' . $file);	
			    	}  	  		
		    	}
		    	closedir($dh);
		  	}
		}
	?> 
 	<script>
 	var images = <?php echo json_encode($array); ?>;
 	var  time = 1000;
 	var i = 0;
		var slideInterval = setInterval(changeImg, time);
		function changeImg(){
			document.slide.src = images[i];
				
				if(i < images.length -1){
					i++;
				} else {
					i = 0;
				}
		}
		window.onload = changeImg;

		function next(){
			clearInterval(slideInterval);
			if(i < images.length - 1){
				i++;
			}
			else {
				i = 0;
			}
			document.slide.src = images[i];
		}

		function prev(){
			clearInterval(slideInterval);
			if(i == images.length - 1){
				i--;
			}
			else {
				i = images.length - 1;
			}
			document.slide.src = images[i];
		}
		function sliderStop() {
		    clearInterval(slideInterval);
		}
		function sliderAuto(){
			slideInterval = setInterval(changeImg, time);
		}
 	</script> 
	<script>
		$("a[href='#top']").click(function() {
			$("html, body").animate({ scrollTop: 0 }, "slow");
			return false;
		});
	</script>
</head>
<body>
	<?php
		include 'header.php';
	?>		
	<script type="text/javascript">
			var d = document.getElementById("home");
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
			<div class="col-sm-4">
				<h3>New Albums</h3>
				<p>Khalid - American dream</p>
				<p>Ed Sheeran - Divide</p>
				<p>G-Eazy - Beautiful and Damned</p>
				<p>MØ - When I was young</p>
				<p>Bebe Rexha - All your fault</p>
				<h6>2017</h6>
				
			</div>
			<div class="col-sm-8">
				<img name = "slide" id = "slider" name = "slide">
				<button type="button" class="btn right" onclick="next()" style="position:absolute; top:30%; left: 95%;">
					<span class="glyphicon glyphicon-chevron-right" ></span>
				</button>
				<button type="button" class="btn left" onclick="prev()" style="position:absolute; top:30%; left: 0%;">
					<span class="glyphicon glyphicon-chevron-left"></span>
				</button>
				<button type="button" class="btn stop" onclick="sliderStop()" style="left: 50%; position: absolute; transform: translate(0%, -100%);">
					<span class="glyphicon glyphicon-pause"></span>
				</button>
				<button type="button" class="btn play" onclick="sliderAuto()" style="left: 44%; position: absolute;  transform: translate(0%, -100%);">
					<span class="glyphicon glyphicon-play"></span>
				</button>

				<div>
					<form action = "index.php" method = "post" enctype = "multipart/form-data">
						<h4>Add image</h4>	
						<input type="file" id="img" name="img"></br>
						<input type="submit" name="upload" value="Upload image" id ="upload">
					</form>
					<?php
						$location = "slider/";
						$max_size = 2097152;

						// $image_info = getimagesize($_FILES['img']['tmp_name']);
						// $image_width = $image_info[0];
						// $image_height = $image_info[1];
						// if($image_width != 800 && $image_height != 600)
						// {
						// 	if(move_uploaded_file($tmp_name, $location.$name))
						// 		{
						// 			echo 'moved';
						// 		}
						// }else{
						// 		echo 'Image width and height are not appropariate size(800x600).';
						// 	}

						if(isset($_POST['upload']))
						{						
							$name = $_FILES['img']['name'];
							$size = $_FILES['img']['size'];
							$type = $_FILES['img']['type'];
							$extension = strtolower(substr($name, strpos($name, '.') + 1));
							$tmp_name = $_FILES['img']['tmp_name'];
							if(!empty($name))
							{
								if(($extension == 'jpg' || $extension == 'jpeg' || $extension == 'png') && $type = 'image/jpeg')
								{
									if($size < $max_size)
									{
										if(move_uploaded_file($tmp_name, $location.$name))
											{
												echo 'moved';
											}
										
									}else{
										echo 'File size is too big.';
										}
									
								}else{	
										echo 'Upload only images (jpg, jpeg, png).';
									}
							}
									
						}else{
								echo 'Choose a file';
							}
					?>


				</div>
				<h3>News</h3>
				<h4>Drake's 'God's Plan' Hits No. 1 on Multiple Airplay Charts in Record Time</h4>
				<p>Drake’s “God's Plan” completes a coup of hitting No. 1 on four R&B/hip-hop-leaning airplay charts in record time, becoming the first song ever to hit No. 1 on Rhythmic Songs, R&B/Hip-Hop Airplay, Mainstream R&B/Hip-Hop and Rap Airplay in five weeks or less.

The track hikes 2-1 on both the Rhythmic Songs and R&B/Hip-Hop Airplay charts (dated March 3), with gains of 18 percent in plays and 19 percent in radio audience, respectively, in the week ending Feb. 25, according to Nielsen Music.

In addition to its new dual coronation, “Plan” wins a second week atop the plays-based Mainstream R&B/Hip-Hop chart and audience-driven Rap Airplay chart, improving 18 percent on each.</p>
				<h4>Tay-K, Rich The Kid & More Artists Heard on Season Two Premiere of 'Atlanta'</h4>
				<p>Thursday (March 1) kicked off Robbin Season of the FX hit, Atlanta. The season premiere literally opened with a bang thanks to Tay-K’s murky, but addicting jam “The Race.” The credit intro was even more enticing with Jay Critch and Rich The Kid’s “Did It Again (Remix).

But the music on the series has always been particular and well thought out. Speaking with The Fader, music supervisor Jen Malone and music consultant Fam Udeorji explained the team’s organic process.

“I think this first season, we were all spread apart, but you still feel like [the show’s sound] is super cohesive. There are certain songs that people were connected to that they shared, and those songs landed on the show,” he said to the outlet in Sept. 2016.</p>
			<a href="#top" class="gotop"><span class="glyphicon glyphicon-chevron-up"></span></a>
			</div>
		</div>
		
	</div>
	
	<?php
		include 'footer.php';
	?>
</body>
</html>