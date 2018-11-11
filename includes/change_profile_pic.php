<?php
  if(isset($_POST['uploadedProfilePic'])) {
		require '../config/config.php';
	  require 'classes/User.php';
    $user = new User($conn, $_SESSION['username']);
    $user->uploadProfilePic($_POST['uploadedProfilePic']);
  }
?>