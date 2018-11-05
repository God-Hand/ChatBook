<?php
	require 'config/config.php';
  require 'includes/classes/User.php';

  if (isset($_SESSION['user_logged_in'])){
    $user = new User($conn, $_SESSION['user_logged_in']);
  	$user->setLogOutTime();
		session_start();
		session_destroy();
		header("Location: registration.php");
  } else {
    header("Location: registration.php");
  }
?>