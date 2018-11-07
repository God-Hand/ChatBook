<?php
	if(isset($_POST['username'])){
		require '../config/config.php';
		require 'classes/CommentLike.php';
		$username = $_POST['username'];
		$comment_id = $_POST['comment_id'];
		$user_action  = $_POST['user_action'];
		if($user_action != 2){
			$comment_like = new CommentLike($conn, $username);
			$comment_like->likeTheComment($comment_id, $user_action);
		}
	}
?>