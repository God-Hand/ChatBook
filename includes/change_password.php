<?php
	require '../config/config.php';
  require 'classes/User.php';

  if(isset($_POST['username']) and isset($_POST['password']) and isset($_POST['newpassword'])){
  	$user = new User($conn, $_POST['username']);
  	echo $user->changePassword($_POST['password'], $_POST['newpassword']);
  }
?>