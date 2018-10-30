<?php
	require '../config/config.php';
	require 'classes/PostLike.php';
	$username = $_REQUEST['username'];
	$post_id = $_REQUEST['post_id'];
	$user_action  = $_REQUEST['user_action'];
	if($user_action != 2){
		$post_like = new PostLike($conn, $username);
		$post_like->likeThePost($post_id, $user_action);
		//echo $user_action;
	}
?>