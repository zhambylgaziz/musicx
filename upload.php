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
						
						$audio_name = $_FILES['audio']['name'];
						$path = $mus.basename($_FILES['audio']['name']);
						$audio_size = $_FILES['audio']['size'];
						$audio_type = $_FILES['audio']['type'];
						$audio_tmp_name = $_FILES['audio']['tmp_name'];
						$audio_extension = strtolower(substr($audio_name, strpos($audio_name, '.') + 1));

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
											$k = 1;
										}
									
								}else{
									echo '<script> alert("File size is too big.");</script>';
									}
								
							}else{	
									echo '<script> alert("Upload only images (jpg, jpeg, png).");</script>';
								}
						}else{
							echo '<script> alert("Choose a file</br>");</script>';
						}
						if(!empty($audio_name))
						{
							// if($audio_extension == 'mp3' && $audio_type == 'audio/mp3')
							// {
								if($audio_size < $audio_max_size)
								{
									if(move_uploaded_file($audio_tmp_name, $path))
										{
											$t = 1;
										}
									
								}else{
									echo '<script> alert("File size is too big.");</script>';
									}
								
							// }else{	
							// 		echo 'Upload only audio (mp3).</br>';
							// 	}
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
							echo '<script> alert("Item added.");</script>';
						}else{

						}
					}
					header("Location: main.php");

?>