<?php
	require '../config/config.php';
	require 'classes/FriendRequest.php';
	include 'session_isalive.php';
	try{
		$request = new FriendRequest($conn, $_SESSION['username']);
		$count = $request->getFriendRequestsCount();
		if($count > 99){
			echo "99+";
		}elseif($count != 0){
			echo $count;
		}
	}catch(Exception $e){
		// do nothing on session out
	}
?>