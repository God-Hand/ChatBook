<?php
	function uploadImage($file, $username, $target_dir) {
		$temp = explode(".", $file["name"]);
	  $newfilename = $username . round(microtime(true)) . '.' . end($temp);
	  $target_file = $target_dir . basename($newfilename);
	  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	  echo $target_file;

	  if ($file["size"] > 200000) {
	    return "Sorry, your file is too large.";
	  }
	  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
	    return "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
	  }
	  // if everything is ok, try to upload file
	  if (move_uploaded_file($file["tmp_name"], $target_file)) {
	  	return $target_file;
	  }
	  return "Sorry, there was an error while uploading your file.";
	}
?>