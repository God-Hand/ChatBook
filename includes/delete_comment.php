<?php
	if (isset($_POST['username'])) {
		require '../config/config.php';
		require 'classes/Comment.php';

		$comment = new Comment($conn, $_POST['username']);
		$comment->deleteComment($_POST['comment_id']);
		echo $comment->getCommentPostId($_POST['comment_id']);
	}
?>