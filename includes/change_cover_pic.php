<?php
  if(isset($_POST['username']) and isset($_POST['uploadedCoverPic'])) {
		require '../config/config.php';
	  require 'classes/User.php';
    $user = new User($conn, $_POST['username']);
    $user->uploadCoverPic($_POST['uploadedCoverPic']);
  }
?>