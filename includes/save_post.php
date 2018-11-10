<?php
  require '../config/config.php';
  require 'classes/Post.php';
  require 'classes/User.php';
  require 'classes/Notification.php';
  require '../functions/timeframe_function.php';
  require '../functions/text_filter.php';
  
  if((isset($_POST['imageLocation']) or isset($_POST['postBody']))){
    $post = new Post($conn, $_SESSION['username']);
    $notification = new Notification($conn, $_SESSION['username']);
    $user = new User($conn, $_SESSION['username']);
    $friends = $user->getFriendArray();
    if (isset($_POST['imageLocation']) and isset($_POST['postBody'])){ 
      $post_body = removeSpaces($_POST['postBody']);
      $post_body = secureText($conn, $post_body);
      if (isset($_POST['userTo'])){
        $post->addPost($_POST['userTo'], $post_body, $_POST['imageLocation']);
      } else {
        $post->addPost('', $post_body, $_POST['imageLocation']);
      }
    } elseif (isset($_POST['postBody'])) {
      $post_body = removeSpaces($_POST['postBody']);
      $post_body = secureText($conn, $post_body);
      $post->addPost('', $post_body);
    } elseif (isset($_POST['imageLocation'])) {
      $post->addPost('', '', $_POST['imageLocation']);
    }
  }
?>