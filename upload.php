<?php
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
						
						// echo $audio_name = $_FILES['audio']['name'] . '</br>';
						// echo $path = $mus.basename($_FILES['audio']['name']);
						// //echo $audio_size = $_FILES['audio']['size'] . '</br>';
						// //echo $audio_type = $_FILES['audio']['type'] . '</br>';
						// echo $audio_tmp_name = $_FILES['audio']['tmp_name'] .'</br>';
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
						// if(!empty($audio_name))
						// {
						// 	//if($audio_extension == 'mp3' && ($audio_type == 'audio/mp3' || $audio_type == "audio/mpeg"))
						// 	//{
						// 	//	if($audio_size < $audio_max_size)
						// 	//	{
						// 		echo $_FILES['audio']['error'];
						// 		echo 'audio tmp ' . $_FILES['audio']['tmp_name'] .'</br>';
						// 		echo 'path ' . $path . '</br>';
						// 			if(move_uploaded_file($audio_tmp_name, $path))
						// 				{
						// 					$t = 1;
						// 					echo 'Song uploaded</br>';
						// 				}
									
						// 		//}else{
						// 			//echo 'File size is too big.</br>';
						// 		//	}
								
						// 	//}else{	
						// 		//	echo 'Upload only audio (mp3).</br>';
						// 	//	}
						// }else{
						// 	echo 'Choose a file</br>';
						// }

						if($k == 1){ //&& $t == 1){
							$con = mysqli_connect("localhost", "root", "", "music");
							if (mysqli_connect_errno())
								{
									echo "Failed to connect to MySQL: " . mysqli_connect_error();
								}
							//mysqli_query($con, "INSERT INTO uploads (name, title, img, audio) VALUES('$actor', '$title', '$name', '$audio_name');");
							mysqli_query($con, "INSERT INTO uploads (name, title, img, audio) VALUES('$actor', '$title', '$name', 'Bebe Rexha - F.F.F. (feat. G-Eazy).mp3');");
							echo 'Success';
						}
					}
					header("Location: main.php");

?>