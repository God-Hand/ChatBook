<?php
	require '../config/config.php';
  require 'classes/User.php';
  require 'classes/Post.php';
  require 'classes/Comment.php';
  require 'classes/PostLike.php';
  require 'classes/CommentLike.php';
  require 'classes/FriendRequest.php';
  require 'classes/Message.php';
	$user = new User($conn, $_SESSION['username']);
	echo $user->closeAccount();
	$post = new Post($conn, $user->getUsername());
	$post->deleteAllPosts();
	$comment = new Comment($conn, $user->getUsername());
	$comment->deleteAllComments();
	$postLike = new PostLike($conn, $user->getUsername());
	$postLike->deleteAllLikes();
	$commentLike = new CommentLike($conn, $user->getUsername());
	$commentLike->deleteAllLikes();
	$user_message = new Message($conn, $user->getUsername());
	$user_message->deleteAllMessages();
	$request = new FriendRequest($conn, $user->getUsername());
	$request->deleteAllRequests();
?>