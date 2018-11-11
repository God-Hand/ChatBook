<?php
  if((isset($_POST['imageLocation']) or isset($_POST['postBody']))){
    require '../config/config.php';
    require 'classes/Post.php';
    require 'classes/User.php';
    require 'classes/Notification.php';
    require '../functions/text_filter.php';
    $post = new Post($conn, $_SESSION['username']);
    $notification = new Notification($conn, $_SESSION['username']);
    $user = new User($conn, $_SESSION['username']);
    if (isset($_POST['imageLocation']) and isset($_POST['postBody'])){ 
      $post_body = removeSpaces($_POST['postBody']);
      $post_body = secureText($conn, $post_body);
      if (isset($_POST['userTo'])){
        $post_id = $post->addPost($_POST['userTo'], $post_body, $_POST['imageLocation']);
      } else {
        $post_id = $post->addPost('', $post_body, $_POST['imageLocation']);
      }
    } elseif (isset($_POST['postBody'])) {
      $post_body = removeSpaces($_POST['postBody']);
      $post_body = secureText($conn, $post_body);
      $post_id = $post->addPost('', $post_body);
    } elseif (isset($_POST['imageLocation'])) {
      $post_id = $post->addPost('', '', $_POST['imageLocation']);
    }

    $type = "post";
    if($post_id != 0){
      if (isset($_POST['userTo']) and !empty($_POST['userTo'])){
        $notification_body = "Share a post on your profile";
        $link = "profile.php?profile_username=" . $user->getUsername() . "&post_id=" . $post_id;
        $notification->sendNotification($_POST['userTo'], $notification_body, $type, $link);
      } else {
        $notification_body = "Share a post";
        $link = "index.php?post_id=" . $post_id;
        $friends = $user->getFriendArray();
        foreach ($friends as $friend) {
          if ($friend != ''){
            $notification->sendNotification($friend, $notification_body, $type, $link);
          }
        }
      }
    }
  }
?>