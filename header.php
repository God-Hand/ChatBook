<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.2/croppie.css">
<link href="https://cdn.jsdelivr.net/npm/gijgo@1.9.10/css/gijgo.min.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="assets/css/header.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.2/croppie.js"></script>
<script src="https://cdn.jsdelivr.net/npm/gijgo@1.9.10/js/gijgo.min.js" type="text/javascript"></script>

<?php
  require('includes/classes/User.php');
  require('includes/classes/Post.php');
  require('includes/classes/PostLike.php');
  require('includes/classes/Comment.php');
  require('includes/classes/FriendRequest.php');
  require('includes/classes/Notification.php');
  require('functions/text_filter.php');
  require('config/config.php');
  if (isset($_SESSION['username'])){
    $user_logged_in = $_SESSION['username'];
    $user = new User($conn, $_SESSION['username']);
  } else {
    header("Location: registration.php");
  }
  $user = new User($conn, $user->getUsername());
  $post = new Post($conn, $user->getUsername());
  $post_like = new PostLike($conn, $user->getUsername());
  $comment = new Comment($conn, $user->getUsername());
  $request = new FriendRequest($conn, $user->getUsername());
  $notification = new Notification($conn, $user->getUsername());
?>
<nav class="mb-4 navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
  <a class="navbar-brand" href="index.php">ChatBook</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-3" aria-controls="navbarSupportedContent-3" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent-3">
    <div class="form-inline searchform">
      <div class="input-group" style="width:100%;">
        <input type="text" class="form-control dropdown" onkeyup="SearchUser(this)" name="q" placeholder="Search..." autocomplete="off" id="searchuser" value="" style="width: auto;">
        <div class="input-group-postpend">
          <button id='searchUserBtn' class="btn btn-primary float-right" type="submit"><i class="fa fa-search"></i></button>
        </div>
      </div>
      <div class="searchresult dropdown-menu"></div>
    </div>
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="#"><i class="fa fa-bell"></i>&nbsp;Notifications
          <span id='newNotificationCount' class="badge badge-pill badge-danger"></span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="friend_request.php"><i class="fa fa-users"></i>&nbsp;Friend Request
          <span id='friendRequestsCount' class="badge badge-pill badge-danger"></span>
        </a>
      </li>
    </ul>
    <ul class="navbar-nav nav-flex-icons">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fa fa-user-circle-o"></i>&nbsp;<?php echo $user->getFirstName(); ?>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="index.php"><i class="fa fa-home"></i>&nbsp;Home</a>
          <a class="dropdown-item" href="settings.php"><i class="fa fa-cog"></i>&nbsp;Settings</a>
          <a class="dropdown-item" href="sign_out.php"><i class="fa fa-sign-out"></i>&nbsp;Sign-out</a>
        </div>
      </li>
    </ul>
  </div>
</nav>
<div class="empty-70-height"></div>

<script>

  $(document).ready(function(){
    $("#newNotificationCount").load("includes/load_new_notifications_count.php");
    setInterval(function(){$("#newNotificationCount").load('includes/load_new_notifications_count.php')}, 15000);
    $("#friendRequestsCount").load("includes/load_friend_request_count.php");
    setInterval(function(){$("#friendRequestsCount").load('includes/load_friend_request_count.php')}, 15000);
  });
  $(document).on('click', '.addfriend', function (e) {
    e.preventDefault();
    e.stopPropagation();
  });
  $(document).on("click", function(event){
    $('.searchresult').hide();
  });
  function friend(obj){
    if (obj.value == '0'){
      obj.classList.remove('btn-danger');
      obj.classList.add('btn-success');
      obj.innerHTML = 'Add Friend';
      obj.value = 3;
    } else if (obj.value == '1'){
      obj.classList.remove('btn-success');
      obj.classList.add('btn-danger');
      obj.innerHTML = 'Remove Friend';
      obj.value = 0;
    } else if(obj.value == '2'){
      obj.classList.remove('btn-warning');
      obj.classList.add('btn-success');
      obj.innerHTML = 'Add Friend';
      obj.value = 3;
    } else if(obj.value == '3'){
      obj.classList.remove('btn-success');
      obj.classList.add('btn-warning');
      obj.innerHTML = 'Cancel Request';
      obj.value = 2;
    }
  }
  function friendAction(obj){
   $.post("includes/friend_request_response.php", {action:obj.value, name:obj.id, username:'<?php echo $user->getUsername(); ?>'}, function(data) {
   })
  }
  function SearchUser(obj){
    var username = '<?php echo $user->getUsername(); ?>';
    $.post("includes/search.php", {name:obj.value, username: username, limit:5, requestby:1}, function(data) {
      $('.searchresult').empty();
      if(data != ''){
        $('.searchresult').html(data);
        $('.searchresult').show();
      } else {
        $('.searchresult').hide();
      }
    });
  }
  $('#searchUserBtn').click(function(){
    location.href = 'search.php?name=' + $('#searchuser').val();
  });

  // action in post
  function openCommentFrame(obj) {
    var commentframeid = "commentframe";
    var element = document.getElementById(commentframeid.concat(obj.id));
    if(element.style.display == "block") {
      element.style.display = "none";
    } else {
      element.style.display = "block";
      document.getElementById(commentframeid.concat(obj.id)).height = document.getElementById(commentframeid.concat(obj.id)).contentWindow.document.body.scrollHeight;
    }
  }
  function likePost(obj) {
    if(obj.value == "0") {
      obj.innerHTML = "<i class='fa fa-thumbs-down'></i>&nbspUnLike";
      obj.value = '1';
      var likecountid = "likecount";
      document.getElementById(likecountid.concat(obj.id)).innerHTML = parseInt(document.getElementById(likecountid.concat(obj.id)).innerHTML)+1;
    } else {
      obj.innerHTML = "<i class='fa fa-thumbs-up'></i>&nbspLike";
      obj.value = '0';
      var likecountid = "likecount";
      document.getElementById(likecountid.concat(obj.id)).innerHTML = parseInt(document.getElementById(likecountid.concat(obj.id)).innerHTML)-1;
    }
    $.post("includes/like_post.php", {post_id : obj.id, user_action : obj.value}, function(data){
    });
  }
  function sendComment(obj){
    var comment = "comment";
    var body = document.getElementById(comment.concat(obj.id)).value;
    $.post("includes/save_comment.php", {post_id : obj.id, comment_body : body}, function(data){
      document.getElementById(comment.concat(obj.id)).value = '';
      var commentcountid = "commentcountid";
      document.getElementById(commentcountid.concat(obj.id)).innerHTML = data;
      var commentframeid = "commentframe";
      document.getElementById(commentframeid.concat(obj.id)).contentWindow.location.reload();
    });
  }
  function deletePost(obj){
    bootbox.confirm({
      message: "Delete the post .Are you Sure?",
      buttons: {
        confirm: { label: 'Yes', className: 'btn-success' },
        cancel: { label: 'No', className: 'btn-danger' }
      },
      callback: function (result) {
        if(result){
          $.post("includes/delete_post.php", {post_id : obj.id}, function(data){
            var element = '.post#';
            $(element.concat(obj.id)).fadeOut();
            $('#totalpostsCounts').html(parseInt($('#totalpostsCounts').text())-1);
          });
        }
      }
    });
  }
  function deleteComment(obj){
    bootbox.confirm({
      message: "Delete the comment .Are you Sure?",
      buttons: {
        confirm: { label: 'Yes', className: 'btn-success' },
        cancel: { label: 'No', className: 'btn-danger' }
      },
      callback: function (result) {
        if(result){
          $.post("includes/delete_comment.php", {comment_id : obj.id}, function(data){
            var commentframeid = "#commentframe";
            var comment = '.comment#';
            $(commentframeid.concat(result)).contents().find(comment.concat(obj.id)).fadeOut();
            var commentcountid = "commentcountid";
            document.getElementById(commentcountid.concat(result)).innerHTML = parseInt(document.getElementById(commentcountid.concat(result)).innerHTML) - 1;
          });
        }
      }
    });
  }

  //resize-text inside resize-box
  $(document).ready(function(){
    $(window).resize(function() {
        resizeContent();
    });
  });

  function resizeContent() {
    $('.resize-box').css({
      "maxWidth": $('.resize-box').parent().width() - 50 + "px"
    });
  }
</script>