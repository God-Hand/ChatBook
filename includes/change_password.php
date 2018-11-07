<?php
  if(isset($_POST['password']) and isset($_POST['newpassword'])){
		require '../config/config.php';
	  require 'classes/User.php';

  	$user = new User($conn, $_SESSION['username']);
  	echo $user->changePassword($_POST['password'], $_POST['newpassword']);
  }
?>