<?php
  if(isset($_POST['username']) and isset($_POST['uploadedProfilePic'])) {
		require '../config/config.php';
	  require 'classes/User.php';
	  
    $user = new User($conn, $_POST['username']);
    $user->uploadProfilePic($_POST['uploadedProfilePic']);
  }
?>