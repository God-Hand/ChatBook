<?php
	if(isset($_POST['last_post_id'])){
		require '../config/config.php';
		require 'classes/Post.php';
		require 'classes/User.php';
		require 'classes/Comment.php';
		require 'classes/PostLike.php';
		require '../functions/timeframe_function.php';
		require '../functions/text_filter.php';
		if (isset($_POST['last_post_id'])){

			define('LIMIT', 10);
			$user = new User($conn, $_SESSION['username']);
			$post = new Post($conn, $_SESSION['username']);
			$comment = new Comment($conn, $_SESSION['username']);
			$post_like = new PostLike($conn, $_SESSION['username']);
			if( $user->getUsername() != $_POST['name']){
				$data_query = $post->loadProfilePosts($_POST['last_post_id'], $_POST['name'], LIMIT);
			} else {
				$data_query = $post->loadUserProfilePosts($_POST['last_post_id'],LIMIT);
			}
			$str = "";
			$last_post_id = $_POST['last_post_id'];
			if (mysqli_num_rows($data_query) == 0 and $_POST['last_post_id'] == 0) {
				$str .= "<input type='hidden' id='noMorePosts' value='true'>
									<div class='p-3 mb-2 bg-light text-muted' style='margin:10px'>
										No Posts
									</div>";
			} elseif (mysqli_num_rows($data_query) == 0) {
				$str .= "<input type='hidden' class='noMorePosts' value='true'><p class='text-muted px-3 bg-light'> No more posts to show! </p>";
			} else {
				while ($row = mysqli_fetch_array($data_query)) {
					$post_id = $row['post_id'];
					$last_post_id = $post_id;
					$post_body = replaceURLToLink($row['body']);
					if ($row['image'] == '')
						$imagePath = '';
					else
						$imagePath = "<img src='" . $row['image'] . "' alt='post image' style='width: 100%; height: 100%;'>";
					$posted_time = $row['posted_time'];

					$user_from_obj = new User($conn, $row['user_from']);
					$user_from_details = $user_from_obj->getUserLessInfo();
					$user_from_fullname = "<a href='profile.php?profile_username=" . $user_from_obj->getUsername() . "' class='text-primary'>" . $user_from_details['first_name'] . " " . $user_from_details['last_name'] . "</a>";
					$user_from_profile_pic = "<a href='profile.php?profile_username=" . $user_from_obj->getUsername() . "' class='text-primary'> <img src='" . $user_from_details['profile_pic'] . "' alt='user_pic' class='align-self-start rounded-circle' style='width:40px;'> </a>";

					// if user_to is none. then user_to_fullname = '' 
					if ($row['user_to'] == '') {
						$user_to_fullname = '';
					} else {
						$user_to_obj = new User($conn, $row['user_to']);
						$user_to_fullname = " to " . "<a href='profile.php?profile_username=" . $user_to_obj->getUsername() . "' class='text-primary'>" . $user_to_obj->getFirstAndLastName() . "</a>";
					}

					if($user_from_obj->getUsername() == $user->getUsername()){
						$delete = "<button id='" . $post_id . "' class='btn btn-danger btn-sm py-0 px-1 m-0 float-right' onclick='deletePost(this)'><i class='fa fa-trash'></i></button>";
					} else {
						$delete = "";
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
						$like = "<i class='fa fa-thumbs-down'></i>&nbsp;UnLike";
						$like_value = 1;
					} else {
						$like = "<i class='fa fa-thumbs-up'></i>&nbsp;Like";
						$like_value = 0;
					}


					$str .= "
					<div class='card shadow p-3 mb-2 bg-white rounded post' id='" . $post_id . "'>
					  <div class='media'>
					    " . $user_from_profile_pic . "
					    <div class='media-body pl-1'>
					      <h6>" .$user_from_fullname . $user_to_fullname . $delete . "<br><small class='text-muted'><em>" . $posted_time_in_text . "</em></small></h6>
					    </div>
					  </div>
					  " . $imagePath . "
					  <div class='px-1'>
					  	<p>" . $post_body . "</p>
					  </div>
					  <div class='form-row' style='margin:-15px -5px;'>
					    <div class='col'>
					      <p class='text-muted float-left'>Like(<span id='likecount" . $post_id . "'>" . $post_like_count . "</span>)</p>
					      <p class='text-muted float-right'>Comments(<span id='commentcountid" . $post_id . "'>" . $comment_count . "</span>)</p>
					    </div>
					  </div>
					  <div class='form-row'>
					    <div class='col'>
					      <button id='" . $post_id . "' class='btn btn-primary btn-sm float-left' style='margin-right:2px;' onclick='likePost(this)' value='" . $like_value . "'>" . $like . "</button>
					      <button id='" . $post_id . "' class='btn btn-primary btn-sm float-left' onclick='openCommentFrame(this)'><i class='fa fa-comment-o'></i>&nbsp;Comment</button>
					    </div>
					  </div>
					  <iframe class='commentframe' id='commentframe" . $post_id . "' src='" . $comment_frame_url . "'></iframe>
					  <div class='input-group mb-3' style='margin:5px 0px;'>
					    <input id='comment" . $post_id . "' type='text' class='form-control border border-primary' placeholder='Comment...'>
					    <div class='input-group-append' maxlength='250'>
					      <button id='" . $post_id . "' class='btn btn-primary sendComment" . $post_id . "' type='button' onclick='sendComment(this)'><i class='fa fa-paper-plane' aria-hidden='true'></i></button>
					    </div>
					  </div>
					</div>"; //here that html code. which need to be displayed
				}
				if ($last_post_id == $_POST['last_post_id']){
					$str .= "<input type='hidden' class='noMorePosts' value='true'><p class='text-muted px-3 bg-light'> No more posts to show! </p>";
				} else {
					$str .= "<input type='hidden' class='noMorePosts' value='false'>";
				}
			}
			echo $str;
		} else {
			echo "<input type='hidden' id='noMorePosts' value='true'>
									<div class='p-3 mb-2 bg-light text-muted' style='margin:10px'>
										No Posts
									</div>";
		}
	}
?>