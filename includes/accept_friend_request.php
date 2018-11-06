<?php
	require '../config/config.php';
	require 'classes/User.php';
	require 'classes/FriendRequest.php';
	if(isset($_POST['username']) and isset($_POST['request_id']) and isset($_POST['user_from'])) {
		echo $_POST['username'] . "<br>";
		echo $_POST['request_id'] . "<br>";
		echo $_POST['user_from'] . "<br>";
	}
?>