<?php
	require '../config/config.php';
	require 'classes/Comment.php';

	if (isset($_POST['username'])) {
		$comment = new Comment($conn, $_POST['username']);
		$comment->deleteComment($_POST['comment_id']);
		echo $comment->getCommentPostId($_POST['comment_id']);
	}
?>