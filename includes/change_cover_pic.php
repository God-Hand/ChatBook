<?php
  if(isset($_POST['uploadedCoverPic'])) {
		require '../config/config.php';
	  require 'classes/User.php';
	  
    $user = new User($conn, $_SESSION['username']);
    $user->uploadCoverPic($_POST['uploadedCoverPic']);
  }
?>