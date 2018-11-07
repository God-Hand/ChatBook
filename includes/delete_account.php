<?php
  if(isset($_POST['username'])){
		require '../config/config.php';
	  require 'classes/User.php';

  	$user = new User($conn, $_POST['username']);
  	echo $user->closeAccount();
  }
?>