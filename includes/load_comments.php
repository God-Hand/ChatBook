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
	if (mysqli_num_rows($data_query) == 0) {
		$str .= "<input type='hidden' class='noMoreComments' value='true'><p class='text-muted'> No more comments to show! </p>";
	} else {
		while ($row = mysqli_fetch_array($data_query)) {
			$comment_id = $row['comment_id'];
			$commented_by_user_obj = new User($conn, $row['commented_by']);
			$user_details = $commented_by_user_obj->getUserLessInfo();
			$user_fullname = "<a href='profile.php?profile_username=" . $commented_by_user_obj->getUsername() . "' style='text-decoration: none;' class='text-primary' target='_blank'>" . $user_details['first_name'] . " " . $user_details['last_name'] . "</a>";
			$user_profile_pic = "<a href='profile.php?profile_username=" . $commented_by_user_obj->getUsername() . "' style='text-decoration: none;' class='text-primary' target='_blank'> <img src='" . $user_details['profile_pic'] . "' alt='" . $commented_by_user_obj->getUsername() . "' class='image-size align-self-start rounded-circle'> </a>";
			$body = $row['body'];
			$commented_time = $row['commented_time'];

			if($commented_by_user_obj->getUsername() == $user->getUsername()){
				$delete = "<button class='btn btn-danger delete-button'><i class='fa fa-trash'></i></button>";
			} else {
				$delete = "";
			}

			$now_date = date("Y-m-d H:i:s");
			$comment_datetime = new DateTime($commented_time);
			$now_datetime = new DateTime($now_date);
			$commented_time_in_text = getTimeFrame($now_datetime->diff($comment_datetime));

			$str .= "<div class='alert alert-dark comment' style='width:80%;margin:10px;' id='" . $comment_id . "'>
								<div class='media '>
							    " . $user_profile_pic . "
							    <div class='media-body'>
							      <h6 class='comment_body'>" . $user_fullname . "<small class='time float-right text-muted'><i class='fa fa-clock-o'></i><em>" . $commented_time_in_text . "</em>" . $delete . "</small></h6>
							    </div>
							  </div>
							  <p class='comment_body'><em>" . $body . "</em></p>
							  <div class='form-row'>
							    <div class='col'>
							      <button class='btn btn-primary btn-sm'>Like</button>
							    </div>
							  </div>
							</div>";
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