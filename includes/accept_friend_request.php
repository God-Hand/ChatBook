<?php
	if(isset($_POST['user_from'])) {
		require '../config/config.php';
		require 'classes/User.php';
		require 'classes/FriendRequest.php';
		
		$user = new User($conn, $_SESSION['username']);
		$request = new FriendRequest($conn, $_SESSION['username']);
		if($request->acceptRequest($_POST['user_from'])){
			$user->addFriend($_POST['user_from']);
		}
	}
?>