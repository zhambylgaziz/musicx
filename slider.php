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
							header("Location: index.php");
?>