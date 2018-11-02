<?php
	require '../config/config.php';
	require 'classes/Post.php';
	require 'classes/Comment.php';

	$post = new Post($conn, $_REQUEST['username']);
	$comment = new Comment($conn, $_REQUEST['username']);
	$post->deletePost($_REQUEST['post_id']);
	$comment->deleteComments($_REQUEST['post_id']);
?>