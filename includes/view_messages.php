<?php
	if(isset($_POST['name'])){
		require '../config/config.php';
		require 'classes/User.php';
		require 'classes/Message.php';

		$user = new User($conn, $_SESSION['username']);
		$name = $_POST['name'];
		$fullname = $_POST['fullname'];
		$message = new Message($conn, $user->getUsername());
?>