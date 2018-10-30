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
	if (mysqli_num_rows($data_query) == 0 and $_REQUEST['last_comment_id'] == 0) {
		$str .= "<input type='hidden' class='noMoreComments' value='true'><p class='text-muted'> No more comments to show! </p>";
	} else {
		while ($row = mysqli_fetch_array($data_query)) {
		}
		$str .= "<input type='hidden' class='noMoreComments' value='false'>";
	}
	echo $str;
?>
<!---
<div class="alert alert-dark" style="width:80%;margin:10px;">
	<div class="media ">
    <img src="https://randomuser.me/api/portraits/women/14.jpg" alt="username" class="align-self-start mr-3 rounded-circle" style="width:30px;">
    <div class="media-body">
      <h6>John Doe<small class="float-right text-muted"><i class="fa fa-clock-o"></i><em>Posted on February 19, 2016</em></small></h6>
    </div>
  </div>
  <p><em>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</em></p>
  <div class="form-row">
    <div class="col">
      <button class="btn btn-primary btn-sm">Like</button>
    </div>
  </div>
</div>
--->