<?php
	require '../config/config.php';
	require 'classes/User.php';
	require 'classes/Comment.php';
	require 'classes/CommentLike.php';
	require '../functions/timeframe_function.php';
	require '../functions/text_filter.php';

	define('LIMIT', 10);
	$user = new User($conn, $_REQUEST['username']);
	$comment = new Comment($conn, $_REQUEST['username']);
	$comment_like = new CommentLike($conn, $_REQUEST['username']);
	$data_query = $comment->loadAllComments($_REQUEST['post_id'], $_REQUEST['last_comment_id'], LIMIT);
	$str = "";
?>