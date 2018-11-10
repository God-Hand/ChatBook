<?php
	require '../config/config.php';
	require 'classes/Post.php';
	require 'classes/Comment.php';
  require 'classes/Notification.php';

	$post = new Post($conn, $_SESSION['username']);
	$comment = new Comment($conn, $_SESSION['username']);
  $notification = new Notification($conn, $_SESSION['username']);
	$post->deletePost($_POST['post_id']);
	$comment->deleteComments($_POST['post_id']);
	$notification->deleteNotifications($_POST['post_id']);
?>