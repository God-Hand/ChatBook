<?php
	require '../config/config.php';
	require 'classes/FriendRequest.php';
	if(!isset($_SESSION['username'])){
		echo "<script>window.location = 'index.php';</script>";
		return 0;
	}
	$request = new FriendRequest($conn, $_SESSION['username']);
	$count = $request->getFriendRequestsCount();
	if($count > 99){
		echo "99+";
	}elseif($count != 0){
		echo $count;
	}
?>