<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.2/croppie.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.2/croppie.js"></script>
<style type="text/css">
  div {
    word-wrap: break-word;
  }
  .form-group, .table{
    margin-bottom: 0px;
  }
  .scrollClass {
    height:200px;
    overflow-y: scroll;
  }
  .button {
    padding: 0px 4px;
    margin-left: 5px;
  }
  .searchresult{
    max-width: 360px;
    max-height: 300px;
    width: 100%;
    padding: 0px;
  }
  .searcheduser{
    line-height: 0px;
    word-wrap: break-word;
    padding: 10px;
  }
  .searcheduser:hover{
    background-color:#e0e0e0;
  }
  .empty-70-height{
    min-height: 70px;
  }
  .padding-5-circle{
     background-color: #fff;
     padding: 5px;
     border-radius: 50%;
  }
  a:hover{
    text-decoration: none;
  }
  .new-container{
    padding: 0px 10px 0px 10px;
    width: 100%;
  }
  .cover-img{
    height: 100%;
    width: 100%;"
  }
  .noMorePosts{
    padding-left:10px;
  }
  .media-body{
    margin-left: 5px;
  }
  .post-body{
    margin:0px 2px;
  }
  .commentframe{
    border:none;
    max-height:200px;
    margin:5px 0px;
    display: none;
  }
</style>

<?php
  include('config/config.php');
  if (isset($_SESSION['user_logged_in'])){
    $user_logged_in = $_SESSION['user_logged_in'];
  } else {
    header("Location: registration.php");
  }
  include('includes/classes/User.php');
  include('includes/classes/Post.php');
  include('includes/classes/PostLike.php');
  include('includes/classes/Comment.php');
  include('includes/classes/FriendRequest.php');
  include('includes/classes/Notification.php');
  include('functions/text_filter.php');
  $user = new User($conn, $user_logged_in);
  $post = new Post($conn, $user_logged_in);
  $post_like = new PostLike($conn, $user_logged_in);
  $comment = new Comment($conn, $user_logged_in);
  $request = new FriendRequest($conn, $user_logged_in);
  $notification = new Notification($conn, $user_logged_in);
?>
<nav class="mb-4 navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
  <a class="navbar-brand" href="index.php">ChatBook</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-3" aria-controls="navbarSupportedContent-3" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent-3">
    <form class="form-inline searchform">
      <div class="input-group" style="width:100%;">
        <input type="text" class="form-control dropdown" onkeyup="SearchUsers(this)" name="q" placeholder="Search..." autocomplete="off" id="searchusers" value="" style="width: auto;">
        <div class="input-group-postpend">
          <button class="btn btn-primary float-right" type="submit"><i class="fa fa-search"></i></button>
        </div>
      </div>
      <div class="searchresult dropdown-menu"></div>
    </form>
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="#"><i class="fa fa-envelope"></i>&nbsp;Messages</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"><i class="fa fa-bell"></i>&nbsp;Notifications</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"><i class="fa fa-users"></i>&nbsp;Friend Request</a>
      </li>
    </ul>
    <ul class="navbar-nav nav-flex-icons">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fa fa-user-circle-o"></i>&nbsp;Username
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="settings.php"><i class="fa fa-cog"></i>&nbsp;Settings</a>
          <a class="dropdown-item" href="sign_out.php"><i class="fa fa-sign-out"></i>&nbsp;Sign-out</a>
        </div>
      </li>
    </ul>
  </div>
</nav>
<div class="empty-70-height"></div>

<script>
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
      obj.value = 1;
    } else if (obj.value == '1'){
      obj.classList.remove('btn-success');
      obj.classList.add('btn-warning');
      obj.innerHTML = 'Cancel Request';
      obj.value = 2;
    } else if(obj.value == '2'){
      obj.classList.remove('btn-warning');
      obj.classList.add('btn-success');
      obj.innerHTML = 'Add Friend';
      obj.value = 1;
    }
  }
  function friendAction(obj){
   $.post("includes/add_friend.php", {action:obj.value, name:obj.id, username:'<?php echo $user_logged_in; ?>'}, function(data) {
    console.log('hi');
   })
  }
  function SearchUsers(obj){
    var username = '<?php echo $user_logged_in; ?>';
    $.post("includes/search.php", {name:obj.value, username: username}, function(data) {
      $('.searchresult').empty();
      if(data != ''){
        $('.searchresult').html(data);
        $('.searchresult').show();
      } else {
        $('.searchresult').hide();
      }
    });
  }
</script>