<?php
	require '../config/config.php';
	require 'classes/Post.php';
	require 'classes/User.php';
	require '../functions/timeframe_function.php';
	require '../functions/text_functions.php';

	const LIMIT = 10;

	$user = new User($conn, $_REQUEST['user_logged_in']);
	$post = new Post($conn, $_REQUEST['user_logged_in']);
	$post_like = new PostLike($conn, $_REQUEST['user_logged_in'])
	$data_query = $post->loadAllPosts($_REQUEST['last_post_id'], LIMIT);
	
	$str = "";
	if (mysqli_num_rows($data_query) == 0) {
		$str .= "<input type='hidden' class='noMorePosts' value='true'><p class='text-muted'> No more posts to show! </p>";
	} else {
		while ($row = mysqli_fetch_array($data_query)) {
			if ($row['user_from'] == $user->getUsername() || $row['user_to'] == $user->getUsername || $user->isFriend($row['user_from'])) {

				$post_id = $row['post_id'];
				$body = replaceURLToLink($row['body']);
				if ($row['image'] == none)
					$imagePath = '';
				else
					$imagePath = "<img src='$row['image']' style='width:100%' class='margin-bottom'>";
				$posted_time = $row['posted_time'];

				$user_from_obj = new User($conn, $row['user_from']);
				$user_from_details = $user_from_obj->getPostUserInfo();
				$user_from_fullname = $user_from_details['first_name'] . " " . $user_from_details['last_name'];
				$user_from_profile_pic = $user_from_details['profile_pic'];

				// if user_to is none. then user_to_name = '' 
				if ($row['user_to'] == 'None') {
					$user_to_name = '';
				} else {
					$user_to_obj = new User($conn, $row['user_to']);
					$user_to_fullname = ' to ' . $user_to_obj->getFirstAndLastName();
				}
				
				$now_date = date("Y-m-d H:i:s");
				$post_datetime = new DateTime($posted_time);
				$now_datetime = new DateTime($now_date);
				$message = getTimeFrame($now_datetime->diff($post_datetime));


				$str .= "
				<div class='post container card white round margin' id='".$post_id."'><br>
					<a href='profile.php?profile_username=".$user_from_obj->getUsername()"' target='_blank'>
  					<img src='".$user_from_details['profile_pic']."' alt='Avatar' class='left circle margin-right' style='width:60px'>
  				</a>
  				<h4>
  					<a href='profile.php?profile_username=".$user_from_obj->getUsername()"' target='_blank'>
  					".$user_from_fullname ."
  					</a>
  				</h4>
  				<h4>
  					<a href='profile.php?profile_username=".$user_to_obj->getUsername()"' target='_blank'>
  					".$user_to_fullname ."
  					</a>
  				</h4>
  				<br>
  				<span class='right opacity'>".$message."</span>
  				<hr class='clear'>
  				<p>".$body."</p>
  				".$imagePath."
  				<button type='button' class='button theme-d1 margin-bottom' id='".$post_id."'><i class='fa fa-thumbs-up'></i> &nbsp;Like</button> 
  				<button type='button' class='button theme-d2 margin-bottom' id='".$post_id."'><i class='fa fa-comment'></i> &nbsp;Comment</button> 
				</div>"; //here that html code. which need to be displayed
			}
		}
		$str .= "<input type='hidden' class='noMorePosts' value='false'>";
	}
	echo $str;
?>