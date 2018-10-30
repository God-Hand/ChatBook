<?php
	require '../config/config.php';
	require 'classes/Post.php';
	require 'classes/User.php';
	require 'classes/Comment.php';
	require 'classes/PostLike.php';
	require '../functions/timeframe_function.php';
	require '../functions/text_filter.php';

	define('LIMIT', 10);
	$user = new User($conn, $_REQUEST['user_logged_in']);
	$post = new Post($conn, $_REQUEST['user_logged_in']);
	$comment = new Comment($conn, $_REQUEST['user_logged_in']);
	$post_like = new PostLike($conn, $_REQUEST['user_logged_in']);
	$data_query = $post->loadAllPosts($_REQUEST['last_post_id'], LIMIT);
	$str = "";
	if (mysqli_num_rows($data_query) == 0) {
		$str .= "<input type='hidden' class='noMorePosts' value='true'><p class='text-muted'> No more posts to show! </p>";
	} else {
		while ($row = mysqli_fetch_array($data_query)) {
			if ($row['user_from'] == $user->getUsername() || $row['user_to'] == $user->getUsername() || $user->isFriend($row['user_from'])) {

				$post_id = $row['post_id'];
				$post_body = replaceURLToLink($row['body']);
				if ($row['image'] == '')
					$imagePath = '';
				else
					$imagePath = "<img src='" . $row['image'] . "' alt='username' style='width: 100%; height: 100%;'>";
				$posted_time = $row['posted_time'];

				$user_from_obj = new User($conn, $row['user_from']);
				$user_from_details = $user_from_obj->getUserLessInfo();
				$user_from_fullname = "<a href='profile.php?profile_username=" . $user_from_obj->getUsername() . "' style='text-decoration: none;' class='text-primary'>" . $user_from_details['first_name'] . " " . $user_from_details['last_name'] . "</a>";
				$user_from_profile_pic = "<a href='profile.php?profile_username=" . $user_from_obj->getUsername() . "' style='text-decoration: none;' class='text-primary'> <img src='" . $user_from_details['profile_pic'] . "' alt='user_pic' class='align-self-start mr-3 rounded-circle' style='width:60px;'> </a>";

				// if user_to is none. then user_to_fullname = '' 
				if ($row['user_to'] == '') {
					$user_to_fullname = '';
				} else {
					$user_to_obj = new User($conn, $row['user_to']);
					$user_to_fullname = " to " . "<a href='profile.php?profile_username=" . $user_to_obj->getUsername() . "' style='text-decoration: none;' class='text-primary'>" . $user_to_obj->getFirstAndLastName() . "</a>";
				}
				
				$now_date = date("Y-m-d H:i:s");
				$post_datetime = new DateTime($posted_time);
				$now_datetime = new DateTime($now_date);
				$posted_time_in_text = getTimeFrame($now_datetime->diff($post_datetime));

				$comment_frame_url = "infinite_comment_loading.php?username=" . $user_from_obj->getUsername() . "&post_id=" . $post_id;
				$comment_count = $comment->getNumOfComments($post_id);
				$post_like_count = $post_like->postLikesCount($post_id);
				$is_user_like_post = $post_like->isUserLikePost($post_id);
				if($is_user_like_post == 1){
					$like = "UnLike";
					$like_value = 1;
				} else {
					$like = "Like";
					$like_value = 0;
				}


				$str .= "
				<div class='card shadow p-3 mb-2 bg-white rounded post' id='" . $post_id . "'>
				  <div class='media p-3'>
				    " . $user_from_profile_pic . "
				    <div class='media-body'>
				      <h5>" .$user_from_fullname . $user_to_fullname . "<br><small class='text-muted'><i class='fa fa-clock-o'></i><em>" . $posted_time_in_text . "</em></small></h5>
				    </div>
				  </div>
				  <p>" . $post_body . "</p>
				  " . $imagePath . "
				  <div class='form-row' style='margin:-15px 0px;'>
				    <div class='col'>
				      <p class='text-muted float-left'>Like(<span id='likecount" . $post_id . "'>" . $post_like_count . "</span>)</p>
				      <p class='text-muted float-right'>Comments(<span id='commentcountid" . $post_id . "'>" . $comment_count . "</span>)</p>
				    </div>
				  </div>
				  <div class='form-row'>
				    <div class='col'>
				      <button id='" . $post_id . "' class='btn btn-primary float-left' style='margin-right:2px;' onclick='likePost(this)' onmouseleave='saveAction(this)' value='" . $like_value . "'>" . $like . "</button>
				      <button id='" . $post_id . "' class='btn btn-primary float-left' onclick='openCommentFrame(this)'><i class='fa fa-comment-o'></i>&nbsp;Comment</button>
				    </div>
				  </div>
				  <iframe id='commentframe" . $post_id . "' src='" . $comment_frame_url . "' style='border:none;height:200px;margin:5px 0px;display: none;'></iframe>
				  <div class='input-group mb-3' style='margin:5px 0px;'>
				    <input id='comment" . $post_id . "' type='text' class='form-control border border-primary' placeholder='Comment...' aria-label='Recipient's username' aria-describedby='button-addon2'>
				    <div class='input-group-append'>
				      <button id='" . $post_id . "' class='btn btn-primary' type='button' onclick='sendComment(this)'><i class='fa fa-paper-plane' aria-hidden='true'></i></button>
				    </div>
				  </div>
				</div>"; //here that html code. which need to be displayed
			}
		}
		$str .= "<input type='hidden' class='noMorePosts' value='false'>";
	}
	echo $str;
?>