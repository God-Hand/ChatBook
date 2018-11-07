<?php

	require '../config/config.php';
	require 'classes/PostLike.php';

	$username = $_SESSION['username'];
	$post_id = $_POST['post_id'];
	$user_action  = $_POST['user_action'];
	if($user_action != 2){
		$post_like = new PostLike($conn, $username);
		$post_like->likeThePost($post_id, $user_action);
	}
?>