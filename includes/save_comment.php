<?php
	require '../config/config.php';
	require 'classes/Comment.php';
	require '../functions/text_filter.php';

	$username = $_SESSION['username'];
	$post_id = $_POST['post_id'];
	$comment_body  = removeSpaces($_POST['comment_body']);
	$comment_body = secureText($conn , $comment_body);
	$comment = new Comment($conn, $username);
	if ($comment_body != '') {
		$comment->addComment($comment_body, $post_id);
	}
	echo $comment->getNumOfComments($post_id);
?>