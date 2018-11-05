<?php
	if(isset($_POST["image"]) and isset($_POST['username']) and isset($_POST['targetDir'])) {
	 $data = $_POST["image"];
	 $image_array_1 = explode(";", $data);
	 $image_array_2 = explode(",", $image_array_1[1]);
	 $data = base64_decode($image_array_2[1]);
	 $imageName = $_POST['targetDir'] . $_POST['username'] . round(time()) . '.png';
	 file_put_contents($imageName, $data);
	 echo $imageName;
	}
?>