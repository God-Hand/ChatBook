<?php
	require '../config/config.php';
	require 'classes/Comment.php';
	require '../functions/text_filter.php';
	$username = $_REQUEST['username'];
	$post_id = $_REQUEST['post_id'];
	$comment_body  = removeSpaces($_REQUEST['comment_body']);
	$comment_body = secureText($conn , $comment_body);
	$comment = new Comment($conn, $username);
	if ($comment_body != '') {
		$comment->addComment($comment_body, $post_id);
	}
	echo $comment->getNumOfComments($post_id);
	//echo $comment_body . "<br>" . $post_id . "<br>" . $username;
?>