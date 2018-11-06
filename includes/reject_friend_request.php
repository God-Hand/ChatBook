<?php
	require '../config/config.php';
	require 'classes/User.php';
	require 'classes/FriendRequest.php';
	if(isset($_POST['username']) and isset($_POST['user_from'])) {
		$user = new User($conn, $_POST['username']);
		$request = new FriendRequest($conn, $_POST['username']);
		$request->rejectRequest($_POST['user_from']);
	}
?>