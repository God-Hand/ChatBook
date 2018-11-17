<?php
	require '../config/config.php';
	require 'classes/User.php';
	if(isset($_POST['name'])){
		$user = new User($conn, $_POST['name']);
		echo $user->isOnline();
	}
?>