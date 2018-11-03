<?php
	require '../config/config.php';
	require 'classes/User.php';
	require 'classes/FriendRequest.php';

	$user = new User($conn, $_REQUEST['username']);
	$request = new FriendRequest($conn, $_REQUEST['username']);
	$name = $_REQUEST['name'];
	$action = $_REQUEST['action'];
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
?>