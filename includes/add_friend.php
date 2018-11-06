<?php
	require '../config/config.php';
	require 'classes/User.php';
	require 'classes/FriendRequest.php';
	if(isset($_POST['username']) and isset($_POST['action']) and isset($_POST['name'])) {
		$user = new User($conn, $_POST['username']);
		$request = new FriendRequest($conn, $_POST['username']);
		$name = $_POST['name'];
		$action = $_POST['action'];
		if ($action == '2') {
			$request->sendRequest($name);
		} elseif ($action == '1') {
			if ($user->isFriend($name)){
				$user->removeFriend($name);
			} else {
				$request->cancelRequest($name);
			}
		} elseif($action == '0'){
			echo "do nothing";
		}
	}
?>