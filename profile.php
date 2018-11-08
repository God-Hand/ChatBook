<!DOCTYPE html>
<html>
	<head>
		<?php 
			include("header.php");
			if ($user->isUser($_REQUEST['profile_username'])){
				$profile_user = new User($conn, $_REQUEST['profile_username']);
			} else {
				header('Location: index.php');
			}
		?>
	  <title><?php echo $profile_user->getFirstAndLastName(); ?> - Profile</title>
		<meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	</head>
	<style type="text/css">
		/*Profile card*/
		.profile-card .profile-card-img-block{
		    float:left;
		    width:100%;
		    height:150px;
		    overflow:hidden;
		}
		.profile-card .profile-card-body{
		    position:relative;
		}
		.profile-card .profile {
		    position: absolute;
		    top: -62px;
		    left: 50%;
		    width:100px;
		    margin-left: -50px;
		}
		.profile-card .profile-card-img-block{
		    position:relative;
		}
		.profile-card .profile-card-img-block .btn-over-img{
			position: relative;
			top: -140px;
	    right: 10px;
		}
		.profile-card .profile-card-img-block > .profile-info-box{
		    position:absolute;
		    width:100%;
		    height:100%;
		    color:#fff;
		    padding:20px;
		    text-align:center;
		    font-size:14px;
		   -webkit-transition: 1s ease;
		    transition: 1s ease;
		    opacity:0;
		}
		.profile-card .profile-card-img-block:hover > .profile-info-box{
				border-radius: .25rem!important;
		    opacity:1;
		    -webkit-transition: all 1s ease;
		    transition: all 1s ease;
		}
	</style>
<body>
	<div role="main" class="container">
		<div class="row">
			<div class="col-md-4">
				<div class="card profile-card shadow p-3 mb-4 bg-white rounded">
				  <div class="profile-card-img-block">
				    <div class="profile-info-box bg-primary">
				    	<?php echo $profile_user->getBio(); ?>
				    </div>
				    <img class='rounded cover-img' src='<?php echo $profile_user->getCoverPic(); ?>'>     
				    <?php
				    	if($profile_user->getUsername() == $user->getUsername()){
				    		echo "<a href='settings.php' class='btn-over-img btn btn-primary float-right'><i class='fa fa-pencil'></i>&nbsp;Edit</a>";
				    	} else {
				    		if ($user->isFriend($profile_user->getUsername())){
									$friend_button = "<button id='" . $profile_user->getUsername() . "' class='btn-over-img btn btn-sm btn-danger float-right addfriend' onclick='friend(this)' value='0' onmouseleave='friendAction(this)'>Remove Friend</button>";
								} elseif ($request->didReceiveRequest($profile_user->getUsername()) == 1) {
									$friend_button = "<button id='" . $profile_user->getUsername() . "' class='btn-over-img btn btn-sm btn-success float-right addfriend' onclick='friend(this)' value='1' onmouseleave='friendAction(this)'>Accept Request</button>";
								} elseif ($request->didSendRequest($profile_user->getUsername()) == 1) {
									$friend_button = "<button id='" . $profile_user->getUsername() . "' class='btn-over-img btn btn-sm btn-warning float-right addfriend' onclick='friend(this)' value='2' onmouseleave='friendAction(this)'>Cancel Request</button>";
								} else {
									$friend_button = "<button id='" . $profile_user->getUsername() . "' class='btn-over-img btn btn-sm btn-success float-right addfriend' onclick='friend(this)' value='3' onmouseleave='friendAction(this)'>Add Friend</button>";
								}
								echo $friend_button;
				    	}
				    ?>
				  </div>
				  <div class="profile-card-body pt-5">
				    <img src="<?php echo $profile_user->getProfilePic(); ?>" alt="profile-image" class="profile border border-default padding-5-circle"/>
				    <center><h6 class="text-primary"><?php echo $profile_user->getFirstAndLastName(); ?></h6></center>
				    <table class="table">
				    	<tr>
				    		<td><i class="fa fa-users"></i> &nbsp;Friends</td>
				    		<td id='totalfriendCounts'><?php echo $profile_user->getNumOfFriends(); ?></td>
				    	</tr>
				    	<tr>
				    		<td><i class="fa fa-paperclip"></i> &nbsp;Posts</td>
				    		<td id='totalpostsCounts'><?php echo $profile_user->getNumOfPosts(); ?></td>
				    	</tr>
				    </table>
				  </div>
				</div>
				<div class="card">
					<div class="card-body">
					</div>					
				</div>
			</div>

			<div class="col-md-8">
				<!-- Nav tabs -->
				<ul class="nav nav-tabs">
				  <li class="nav-item">
				    <a class="nav-link active" data-toggle="tab" href="#profile_post_box">Profile Post</a>
				  </li>
				  <li class="nav-item">
				    <a class="nav-link" data-toggle="tab" href="#friend_box">Friends</a>
				  </li>
				  <?php
				  	if($user->getUsername() != $profile_user->getUsername()){
				  		echo "<li class='nav-item'>
									    <a class='nav-link' data-toggle='tab' href='#message_box'>Message</a>
									  </li>";
				  	} 
				  ?>
				</ul>
				<!-- Tab panes -->
				<div class="tab-content mb-2">
				  <div class="tab-pane new-container active" id="profile_post_box">
				  	<div class="posts_area">
						</div>
						<img id="loading" src="assets/images/icons/loading.gif">
				  </div>
				  <div class="tab-pane new-container fade" id="friend_box">
				  </div>
				  <?php
				  	if($user->getUsername() != $profile_user->getUsername()){
				  		echo "<div class='tab-pane new-container fade' id='message_box'>
									  	<iframe src='message_card.php?user_to=" . $profile_user->getUsername() . "' class='border border-default' style='height:514px;width:100%;'></iframe>
									  </div>";
				  	} 
				  ?>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
<script>
	$(document).ready(function() {
		$('#loading').show();
		$.post("includes/load_posts.php", {last_post_id : 0}, function(data){
			$('#loading').hide();
			$('.posts_area').html(data);
		});
		$(window).scroll(function() {
			var last_post_id = $('.post:last').attr('id');
			var noMorePosts = $('.posts_area').find('.noMorePosts').val();
			if ( ((window.innerHeight + window.scrollY) >= document.body.offsetHeight) && noMorePosts == 'false') {
				$('#loading').show();
				$('.posts_area').find('.noMorePosts').remove(); 
				$.post("includes/load_posts.php", {last_post_id : last_post_id}, function(data){
					$('.posts_area').find('.noMorePostsText').remove();
					$('#loading').hide();
					$('.posts_area').append(data);
				});
			}
		});
	});
</script>