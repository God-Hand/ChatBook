<?php
	require '../config/config.php';
  require 'classes/User.php';

	$user = new User($conn, $_SESSION['username']);
	echo $user->closeAccount();
?>