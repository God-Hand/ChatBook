<?php
	require '../config/config.php';
	require 'classes/Post.php';
	require 'classes/Comment.php';

	if (isset($_POST['username']})) {
		$post = new Post($conn, $_POST['username']);
		$comment = new Comment($conn, $_POST['username']);
		$post->deletePost($_POST['post_id']);
		$comment->deleteComments($_POST['post_id']);
	}
?>