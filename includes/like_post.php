<?php
	if(isset($_POST['post_id']) and isset($_POST['user_action'])){
		require '../config/config.php';
		require 'classes/PostLike.php';
		if($_POST['user_action'] != 2){
			$post_like = new PostLike($conn, $_SESSION['username']);
			$post_like->likeThePost($_POST['post_id'], $_POST['user_action']);
		}
	}
?>