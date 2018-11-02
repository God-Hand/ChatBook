<?php
	require '../config/config.php';
	require 'classes/CommentLike.php';
	$username = $_REQUEST['username'];
	$comment_id = $_REQUEST['comment_id'];
	$user_action  = $_REQUEST['user_action'];
	if($user_action != 2){
		$comment_like = new CommentLike($conn, $username);
		$comment_like->likeTheComment($comment_id, $user_action);
		//echo $user_action;
	}
?>