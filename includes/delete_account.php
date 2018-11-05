<?php
	require '../config/config.php';
  require 'classes/User.php';

  if(isset($_POST['username'])){
  	$user = new User($conn, $_POST['username']);
  	echo $user->closeAccount();
  }
?>