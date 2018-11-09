<?php
	require '../config/config.php';
	require 'classes/User.php';
	require 'classes/Comment.php';
	require 'classes/CommentLike.php';
	require '../functions/timeframe_function.php';
	require '../functions/text_filter.php';
	
	define('LIMIT', 5);
	$user = new User($conn, $_SESSION['username']);
	$comment = new Comment($conn, $_SESSION['username']);
	$comment_like = new CommentLike($conn, $_SESSION['username']);
	$data_query = $comment->loadAllComments($_POST['post_id'], $_POST['last_comment_id'], LIMIT);
	$str = "";
	$last_comment_id = $_POST['last_comment_id'];
	if (mysqli_num_rows($data_query) == 0 and $_POST['last_comment_id'] == 0) {
			$str .= "<input type='hidden' id='noMoreComments' value='true'>
								<div class='p-3 mb-2 bg-light text-muted' style='margin:10px'>
									No Comments
								</div>";
	} elseif (mysqli_num_rows($data_query) == 0) {
		$str .= "<input type='hidden' class='noMoreComments' value='true'><p class='text-muted' style='padding-left:10px;'> No more comments to show! </p>";
	} else {
		while ($row = mysqli_fetch_array($data_query)) {
			$comment_id = $row['comment_id'];
			$last_comment_id = $comment_id;
			$commented_by_user_obj = new User($conn, $row['commented_by']);
			$user_details = $commented_by_user_obj->getUserLessInfo();
			$user_fullname = "<a href='profile.php?profile_username=" . $commented_by_user_obj->getUsername() . "' style='text-decoration: none;' class='text-primary'>" . $user_details['first_name'] . " " . $user_details['last_name'] . "</a>";
			$user_profile_pic = "<a href='profile.php?profile_username=" . $commented_by_user_obj->getUsername() . "' style='text-decoration: none;' class='text-primary'> <img src='" . $user_details['profile_pic'] . "' alt='user_pic' class='align-self-start rounded-circle' style='width:40px;'> </a>";
			
			$body = replaceURLToLink($row['body']);
			$commented_time = $row['commented_time'];

			if($commented_by_user_obj->getUsername() == $user->getUsername()){
				$delete = "<button id='" . $comment_id . "' class='btn btn-danger btn-sm button float-right' onclick='parent.deleteComment(this);'><i class='fa fa-trash'></i></button>";
			} else {
				$delete = "";
			}

			$now_date = date("Y-m-d H:i:s");
			$comment_datetime = new DateTime($commented_time);
			$now_datetime = new DateTime($now_date);
			$commented_time_in_text = getTimeFrame($now_datetime->diff($comment_datetime));
			$comment_like_count = $comment_like->commentLikesCount($comment_id);
			$is_user_like_comment = $comment_like->isUserLikeComment($comment_id);
			if($is_user_like_comment == 1){
				$like = "<i class='fa fa-thumbs-down'></i>&nbsp;UnLike";
				$like_value = 1;
			} else {
				$like = "<i class='fa fa-thumbs-up'></i>&nbsp;Like";
				$like_value = 0;
			}

			$str .= "<div class='alert alert-dark comment' style='width:80%;margin:10px;' id='" . $comment_id . "'>
								<div class='media'>
							    " . $user_profile_pic . "
							    <div class='media-body' style='margin-left:5px;'>
							      <h6>" .$user_fullname . $delete . "<br><small class='text-muted'><em>" . $commented_time_in_text . "</em></small></h6>
							    </div>
							  </div>
							  <p class='comment_body'><em>" . $body . "</em></p>
							  <div class='form-row'>
							    <div class='col'>
							    	<p class='text-muted float-left'>Like(<span id='commentlikecount" . $comment_id . "'>" . $comment_like_count . "</span>)</p>
							     	<button class='btn btn-primary btn-sm float-right button' id='" . $comment_id . "' value='" . $like_value ."'onclick='likeComment(this)'>" . $like . "</button>
							    </div>
							  </div>
							</div>";
		}
		if ($last_comment_id == $_POST['last_comment_id']){
			$str .= "<input type='hidden' class='noMoreComments' value='true'><p class='text-muted' style='padding-left:10px;'> No more comments to show! </p>";
		} else {
			$str .= "<input type='hidden' class='noMoreComments' value='false'>";
		}
	}
	echo $str;
?>