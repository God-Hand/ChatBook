<?php
	require 'config/config.php';
	require 'includes/classes/User.php';
	session_start();
	$user = new User($conn, $_SESSION['username']);
	$user->setOffline();
	session_destroy();
	header("Location: registration.php");
?>