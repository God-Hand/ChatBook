<?php
	if(isset($_POST['username']) and isset($_POST['action']) and isset($_POST['name'])) {
		require '../config/config.php';
		require 'classes/User.php';
		require 'classes/FriendRequest.php';
		
		$user = new User($conn, $_POST['username']);
		$request = new FriendRequest($conn, $_POST['username']);
		$name = $_POST['name'];
		$action = $_POST['action'];
		$is_friend = $user->isFriend($name);
		if ($is_friend == true and ($action=='3' or $action=='2')) {
			$user->removeFriend($name);
			if ($action == '2') {
				$request->sendRequest($name);
			}
		} elseif ($request->didSendRequest($name) == 1) {
			if ($action == '3'){
				$request->cancelRequest($name);
			}
		} elseif ($request->didReceiveRequest($name) == 1) {
			$request->acceptRequest($name);
			if ($action == '0') {
				$user->addFriend($name);
			} elseif ($action == '2'){
				$request->sendRequest($name);
			}
		} elseif ($action == '2') {
			$request->sendRequest($name);
		}
	}
?>