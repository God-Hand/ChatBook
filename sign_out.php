<?php
	require 'config/config.php';
	require 'includes/classes/User.php';

	$user = new User($conn, $_SESSION['username']);
	$user->setOffline();
	session_start();
	session_destroy();
	header("Location: registration.php");
?>