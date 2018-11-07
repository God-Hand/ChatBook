<?php
  if(isset($_POST['username']) and isset($_POST['password']) and isset($_POST['newpassword'])){
		require '../config/config.php';
	  require 'classes/User.php';

  	$user = new User($conn, $_POST['username']);
  	echo $user->changePassword($_POST['password'], $_POST['newpassword']);
  }
?>