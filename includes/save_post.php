<?php
  require '../config/config.php';
  require 'classes/Post.php';
  require 'classes/User.php';
  require '../functions/timeframe_function.php';
  require '../functions/text_filter.php';
  require '../functions/upload.php';

  $post = new Post($conn, $_POST['username']);
  $alert_message = "";
  $upload_message = "";
  $post_body = removeSpaces($_POST['post_body']);
  $post_body = secureText($conn, $post_body);
  echo $_FILES['post_img']['name'];
  if(!empty($_FILES['post_img'])){
    $target_file = uploadImage($_FILES['post_img'], $_POST['username'], "../assets/images/post_pics/");
    if (strpos($target_file, 'Sorry') !== false){
      if(!empty($post_body)) {
        $post->addPost('', $post_body);
      }
      $upload_message = $target_file;
      $alert_message = "<div class='alert alert-warning alert-dismissible'>
                          <button type='button' class='close' data-dismiss='alert'>&times;</button>
                          ". $upload_message ."
                        </div>";
    } else {
      $upload_message = $post->addPost('', $post_body, $target_file, $_FILES['post_img']);
      $alert_message = "<div class='alert alert-success alert-dismissible'>
                          <button type='button' class='close' data-dismiss='alert'>&times;</button>
                          ". $upload_message ."
                        </div>";
    }
  } elseif(!empty($post_body)) {
    $post->addPost('', $post_body);
    $upload_message = "Post Successfully Submitted.";
    $alert_message = "<div class='alert alert-success alert-dismissible'>
                          <button type='button' class='close' data-dismiss='alert'>&times;</button>
                          ". $upload_message ."
                        </div>";
  }
  echo $alert_message;
?>