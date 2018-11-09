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
			$profile_button = "<div>
												  <a href='profile.php?profile_username=" . $friend . "' class='btn btn-success btn-sm float-left'>See Profile</a>
												</div>";
			if ($user->getUsername() == $friend) {
				$friend_button = "<button class='btn-over-friend-img btn btn-primary btn-sm float-right'><i class='fa fa-pencil'></i>&nbsp;Edit</button>";
			}else{
				if ($user->isFriend($friend)){
					$friend_button = "<button id='" . $friend ."' class='btn btn-danger btn-sm btn-over-friend-img float-right addfriend' onclick='friend(this)' value='0' onmouseleave='friendAction(this)'>Remove Friend</button>";
				} elseif ($request->didSendRequest($friend) == 1) {
					$friend_button = "<button id='" . $friend . "' class='btn btn-warning btn-sm btn-over-friend-img float-right addfriend' onclick='friend(this)' value='2' onmouseleave='friendAction(this)'>Cancel Request</button>";
				} else {
					$friend_button = "<button id='" . $friend . "' class='btn btn-success btn-sm btn-over-friend-img float-right addfriend' onclick='friend(this)' value='1' onmouseleave='friendAction(this)'>Add Friend</button>";
				}
			}
			$str .= "<div class='col-md-6'>
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
									  <div class='media-body'>
									  	<div class='float-left resize-box'>
									  		<h6 class='m-0 d-inline-block text-truncate text-white' style='max-width: inherit;'>" . $friend_fullname . "</h6><br/>
									  		" . $profile_button . "
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
