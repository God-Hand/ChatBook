<?php
	require '../config/config.php';
	require 'classes/FriendRequest.php';
	if(isset($_POST['user_from'])) {
		
		$request = new FriendRequest($conn, $_SESSION['username']);
		$request->rejectRequest($_POST['user_from']);
	}
?>