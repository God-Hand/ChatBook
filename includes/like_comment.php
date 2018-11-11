<?php
	if(isset($_POST['comment_id']) and isset($_POST['user_action'])){
		require '../config/config.php';
		require 'classes/CommentLike.php';
		if($user_action != 2){
			$comment_like = new CommentLike($conn, $_SESSION['username']);
			$comment_like->likeTheComment($_POST['comment_id'], $_POST['user_action']);
		}
	}
?>