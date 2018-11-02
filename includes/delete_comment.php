<?php
	require '../config/config.php';
	require 'classes/Comment.php';

	$comment = new Comment($conn, $_REQUEST['username']);
	$comment->deleteComment($_REQUEST['comment_id']);
	echo $comment->getCommentPostId($_REQUEST['comment_id']);
?>