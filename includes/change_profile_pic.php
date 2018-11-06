<?php
	require '../config/config.php';
  require 'classes/User.php';
  if(isset($_POST['username']) and isset($_POST['uploadedProfilePic'])) {
    $user = new User($conn, $_POST['username']);
    $user->uploadProfilePic($_POST['uploadedProfilePic']);
  }
?>