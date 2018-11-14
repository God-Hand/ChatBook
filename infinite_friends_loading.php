<style>
	.friend-profile-pic{
		position: relative;
		left: 0px;
		bottom: 0px;
		width: 60px;
	}
	.friend-profile-media{
		position: relative;
    bottom: 65px;
    left: 5px;
    height: 0px;
	}
	.btn-over-friend-img{
		position: absolute;
		top:10px;
		right:10px;
	}
</style>
<div class="row" id="friend_area">
<?php
	$friends = $profile_user->getFriendArray();
	$str = "";
	foreach ($friends as $friend) {
		if ($friend != ''){
			$friend_user = new User($conn, $friend);
			$friend_bio = $friend_user->getBio();
			$friend_fullname = $friend_user->getFirstAndLastName();
			$friend_profile_pic = $friend_user->getProfilePic();
			$friend_cover_pic = $friend_user->getCoverPic();
			if($profile_user->getUsername() == $_SESSION['username']){
				$friend_button = "<button id='" . $friend . "' class='btn-over-friend-img btn btn-sm btn-danger float-right addfriend' onclick='friend(this);friendAction(this);removeFriend(this);' value='0'>Remove Friend</button>";
			} else {
				$friend_button = "";
			}
			$str .= "<div class='col-md-6 friend' id='" . $friend . "'>
								<div class='card profile-card shadow p-3 mb-4 bg-white rounded'>
							    <div class='profile-card-img-block'>
							      <div class='profile-info-box bg-primary'>
							      	" . $friend_bio . "
							      </div>
							      <img class='rounded cover-img' src='" . $friend_cover_pic . "' id='profilecoverimage'>
							      " . $friend_button . "
							    </div>
									<div class='media friend-profile-media'>
									  <img class='mr-1 padding-5-circle friend-profile-pic' src='" . $friend_profile_pic . "' alt='username'>
									  <div class='media-body pl-1'>
									  	<div class='float-left resize-box'>
									  		<h6 class='m-0 d-inline-block text-truncate text-white' style='max-width: inherit;'>" . $friend_fullname . "</h6><br/>
									  		<div><a href='profile.php?profile_username=" . $friend . "' class='btn btn-primary btn-sm float-left'>See Profile</a></div>
									  	</div>
									  </div>
									</div>
								</div>
							</div>";
		}
	}
	echo $str;
?>
</div>
<script>
	function removeFriend(obj) {
		$('.friend#'+obj.id).fadeOut();
	}
</script>