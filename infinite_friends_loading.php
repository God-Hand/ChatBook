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
<div clas="containter-fluid">
	<div class="row">
		<div class="col-md-6">
			<div class="card profile-card shadow p-3 mb-4 bg-white rounded">
		    <div class="profile-card-img-block">
		      <div class="profile-info-box bg-primary">
		      	<?php echo $profile_user->getBio(); ?>
		      </div>
		      <img class='rounded cover-img' src='<?php echo $profile_user->getCoverPic(); ?>' id='profilecoverimage'>
		      <?php
				  	if ($user->getUsername() == $profile_user->getUsername()) {
							$friend_button = "<button class='btn-over-friend-img btn btn-primary btn-sm float-right'><i class='fa fa-pencil'></i>&nbsp;Edit</button>";
						}else{
							if ($user->isFriend($profile_user->getUsername())){
								$friend_button = "<button id='" . $profile_user->getUsername() . "' class='btn btn-danger btn-sm btn-over-friend-img float-right addfriend' onclick='friend(this)' value='0' onmouseleave='friendAction(this)'>Remove Friend</button>";
							} elseif ($request->didSendRequest($profile_user->getUsername()) == 1) {
								$friend_button = "<button id='" . $profile_user->getUsername() . "' class='btn btn-warning btn-sm btn-over-friend-img float-right addfriend' onclick='friend(this)' value='2' onmouseleave='friendAction(this)'>Cancel Request</button>";
							} else {
								$friend_button = "<button id='" . $profile_user->getUsername() . "' class='btn btn-success btn-sm btn-over-friend-img float-right addfriend' onclick='friend(this)' value='1' onmouseleave='friendAction(this)'>Add Friend</button>";
							}
						}
						echo $friend_button;
				  ?>
		    </div>
				<div class="media friend-profile-media">
				  <img class="mr-1 padding-5-circle friend-profile-pic" src="assets/images/profile_pics/defaults/profile_pic.png" alt="username">
				  <div class="media-body">
				  	<div class="float-left resize-box">
				  		<h6 class="m-0 d-inline-block text-truncate text-white" style="max-width: inherit;"><?php echo $profile_user->getFirstAndLastName(); ?></h6><br/>
				  		<div class='profile-button'>
							  <a href="profile.php?profile_username=<?php echo $profile_user->getUsername(); ?>" class="btn btn-success btn-sm float-left">See Profile</a>
							</div>
				  	</div>
				  </div>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="card profile-card shadow p-3 mb-4 bg-white rounded">
		    <div class="profile-card-img-block">
		      <div class="profile-info-box bg-primary">
		      	<?php echo $profile_user->getBio(); ?>
		      </div>
		      <img class='rounded cover-img' src='<?php echo $profile_user->getCoverPic(); ?>' id='profilecoverimage'>
		      <?php
				  	if ($user->getUsername() == $profile_user->getUsername()) {
							$friend_button = "<button class='btn-over-friend-img btn btn-primary btn-sm float-right'><i class='fa fa-pencil'></i>&nbsp;Edit</button>";
						}else{
							if ($user->isFriend($profile_user->getUsername())){
								$friend_button = "<button id='" . $profile_user->getUsername() . "' class='btn btn-danger btn-sm btn-over-friend-img float-right addfriend' onclick='friend(this)' value='0' onmouseleave='friendAction(this)'>Remove Friend</button>";
							} elseif ($request->didSendRequest($profile_user->getUsername()) == 1) {
								$friend_button = "<button id='" . $profile_user->getUsername() . "' class='btn btn-warning btn-sm btn-over-friend-img float-right addfriend' onclick='friend(this)' value='2' onmouseleave='friendAction(this)'>Cancel Request</button>";
							} else {
								$friend_button = "<button id='" . $profile_user->getUsername() . "' class='btn btn-success btn-sm btn-over-friend-img float-right addfriend' onclick='friend(this)' value='1' onmouseleave='friendAction(this)'>Add Friend</button>";
							}
						}
						echo $friend_button;
				  ?>
		    </div>
				<div class="media friend-profile-media">
				  <img class="mr-1 padding-5-circle friend-profile-pic" src="assets/images/profile_pics/defaults/profile_pic.png" alt="username">
				  <div class="media-body">
				  	<div class="float-left resize-box">
				  		<h6 class="m-0 d-inline-block text-truncate text-white" style="max-width: inherit;"><?php echo $profile_user->getFirstAndLastName(); ?></h6><br/>
				  		<div class='profile-button'>
							  <a href="profile.php?profile_username=<?php echo $profile_user->getUsername(); ?>" class="btn btn-success btn-sm float-left">See Profile</a>
							</div>
				  	</div>
				  </div>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="card profile-card shadow p-3 mb-4 bg-white rounded">
		    <div class="profile-card-img-block">
		      <div class="profile-info-box bg-primary">
		      	<?php echo $profile_user->getBio(); ?>
		      </div>
		      <img class='rounded cover-img' src='<?php echo $profile_user->getCoverPic(); ?>' id='profilecoverimage'>
		      <?php
				  	if ($user->getUsername() == $profile_user->getUsername()) {
							$friend_button = "<button class='btn-over-friend-img btn btn-primary btn-sm float-right'><i class='fa fa-pencil'></i>&nbsp;Edit</button>";
						}else{
							if ($user->isFriend($profile_user->getUsername())){
								$friend_button = "<button id='" . $profile_user->getUsername() . "' class='btn btn-danger btn-sm btn-over-friend-img float-right addfriend' onclick='friend(this)' value='0' onmouseleave='friendAction(this)'>Remove Friend</button>";
							} elseif ($request->didSendRequest($profile_user->getUsername()) == 1) {
								$friend_button = "<button id='" . $profile_user->getUsername() . "' class='btn btn-warning btn-sm btn-over-friend-img float-right addfriend' onclick='friend(this)' value='2' onmouseleave='friendAction(this)'>Cancel Request</button>";
							} else {
								$friend_button = "<button id='" . $profile_user->getUsername() . "' class='btn btn-success btn-sm btn-over-friend-img float-right addfriend' onclick='friend(this)' value='1' onmouseleave='friendAction(this)'>Add Friend</button>";
							}
						}
						echo $friend_button;
				  ?>
		    </div>
				<div class="media friend-profile-media">
				  <img class="mr-1 padding-5-circle friend-profile-pic" src="assets/images/profile_pics/defaults/profile_pic.png" alt="username">
				  <div class="media-body">
				  	<div class="float-left resize-box">
				  		<h6 class="m-0 d-inline-block text-truncate text-white" style="max-width: inherit;"><?php echo $profile_user->getFirstAndLastName(); ?></h6><br/>
				  		<div class='profile-button'>
							  <a href="profile.php?profile_username=<?php echo $profile_user->getUsername(); ?>" class="btn btn-success btn-sm float-left">See Profile</a>
							</div>
				  	</div>
				  </div>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="card profile-card shadow p-3 mb-4 bg-white rounded">
		    <div class="profile-card-img-block">
		      <div class="profile-info-box bg-primary">
		      	<?php echo $profile_user->getBio(); ?>
		      </div>
		      <img class='rounded cover-img' src='<?php echo $profile_user->getCoverPic(); ?>' id='profilecoverimage'>
		      <?php
				  	if ($user->getUsername() == $profile_user->getUsername()) {
							$friend_button = "<button class='btn-over-friend-img btn btn-primary btn-sm float-right'><i class='fa fa-pencil'></i>&nbsp;Edit</button>";
						}else{
							if ($user->isFriend($profile_user->getUsername())){
								$friend_button = "<button id='" . $profile_user->getUsername() . "' class='btn btn-danger btn-sm btn-over-friend-img float-right addfriend' onclick='friend(this)' value='0' onmouseleave='friendAction(this)'>Remove Friend</button>";
							} elseif ($request->didSendRequest($profile_user->getUsername()) == 1) {
								$friend_button = "<button id='" . $profile_user->getUsername() . "' class='btn btn-warning btn-sm btn-over-friend-img float-right addfriend' onclick='friend(this)' value='2' onmouseleave='friendAction(this)'>Cancel Request</button>";
							} else {
								$friend_button = "<button id='" . $profile_user->getUsername() . "' class='btn btn-success btn-sm btn-over-friend-img float-right addfriend' onclick='friend(this)' value='1' onmouseleave='friendAction(this)'>Add Friend</button>";
							}
						}
						echo $friend_button;
				  ?>
		    </div>
				<div class="media friend-profile-media">
				  <img class="mr-1 padding-5-circle friend-profile-pic" src="assets/images/profile_pics/defaults/profile_pic.png" alt="username">
				  <div class="media-body">
				  	<div class="float-left resize-box">
				  		<h6 class="m-0 d-inline-block text-truncate text-white" style="max-width: inherit;"><?php echo $profile_user->getFirstAndLastName(); ?></h6><br/>
				  		<div class='profile-button'>
							  <a href="profile.php?profile_username=<?php echo $profile_user->getUsername(); ?>" class="btn btn-success btn-sm float-left">See Profile</a>
							</div>
				  	</div>
				  </div>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="card profile-card shadow p-3 mb-4 bg-white rounded">
		    <div class="profile-card-img-block">
		      <div class="profile-info-box bg-primary">
		      	<?php echo $profile_user->getBio(); ?>
		      </div>
		      <img class='rounded cover-img' src='<?php echo $profile_user->getCoverPic(); ?>' id='profilecoverimage'>
		      <?php
				  	if ($user->getUsername() == $profile_user->getUsername()) {
							$friend_button = "<button class='btn-over-friend-img btn btn-primary btn-sm float-right'><i class='fa fa-pencil'></i>&nbsp;Edit</button>";
						}else{
							if ($user->isFriend($profile_user->getUsername())){
								$friend_button = "<button id='" . $profile_user->getUsername() . "' class='btn btn-danger btn-sm btn-over-friend-img float-right addfriend' onclick='friend(this)' value='0' onmouseleave='friendAction(this)'>Remove Friend</button>";
							} elseif ($request->didSendRequest($profile_user->getUsername()) == 1) {
								$friend_button = "<button id='" . $profile_user->getUsername() . "' class='btn btn-warning btn-sm btn-over-friend-img float-right addfriend' onclick='friend(this)' value='2' onmouseleave='friendAction(this)'>Cancel Request</button>";
							} else {
								$friend_button = "<button id='" . $profile_user->getUsername() . "' class='btn btn-success btn-sm btn-over-friend-img float-right addfriend' onclick='friend(this)' value='1' onmouseleave='friendAction(this)'>Add Friend</button>";
							}
						}
						echo $friend_button;
				  ?>
		    </div>
				<div class="media friend-profile-media">
				  <img class="mr-1 padding-5-circle friend-profile-pic" src="assets/images/profile_pics/defaults/profile_pic.png" alt="username">
				  <div class="media-body">
				  	<div class="float-left resize-box">
				  		<h6 class="m-0 d-inline-block text-truncate text-white" style="max-width: inherit;"><?php echo $profile_user->getFirstAndLastName(); ?></h6><br/>
				  		<div class='profile-button'>
							  <a href="profile.php?profile_username=<?php echo $profile_user->getUsername(); ?>" class="btn btn-success btn-sm float-left">See Profile</a>
							</div>
				  	</div>
				  </div>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="card profile-card shadow p-3 mb-4 bg-white rounded">
		    <div class="profile-card-img-block">
		      <div class="profile-info-box bg-primary">
		      	<?php echo $profile_user->getBio(); ?>
		      </div>
		      <img class='rounded cover-img' src='<?php echo $profile_user->getCoverPic(); ?>' id='profilecoverimage'>
		      <?php
				  	if ($user->getUsername() == $profile_user->getUsername()) {
							$friend_button = "<button class='btn-over-friend-img btn btn-primary btn-sm float-right'><i class='fa fa-pencil'></i>&nbsp;Edit</button>";
						}else{
							if ($user->isFriend($profile_user->getUsername())){
								$friend_button = "<button id='" . $profile_user->getUsername() . "' class='btn btn-danger btn-sm btn-over-friend-img float-right addfriend' onclick='friend(this)' value='0' onmouseleave='friendAction(this)'>Remove Friend</button>";
							} elseif ($request->didSendRequest($profile_user->getUsername()) == 1) {
								$friend_button = "<button id='" . $profile_user->getUsername() . "' class='btn btn-warning btn-sm btn-over-friend-img float-right addfriend' onclick='friend(this)' value='2' onmouseleave='friendAction(this)'>Cancel Request</button>";
							} else {
								$friend_button = "<button id='" . $profile_user->getUsername() . "' class='btn btn-success btn-sm btn-over-friend-img float-right addfriend' onclick='friend(this)' value='1' onmouseleave='friendAction(this)'>Add Friend</button>";
							}
						}
						echo $friend_button;
				  ?>
		    </div>
				<div class="media friend-profile-media">
				  <img class="mr-1 padding-5-circle friend-profile-pic" src="assets/images/profile_pics/defaults/profile_pic.png" alt="username">
				  <div class="media-body">
				  	<div class="float-left resize-box">
				  		<h6 class="m-0 d-inline-block text-truncate text-white" style="max-width: inherit;"><?php echo $profile_user->getFirstAndLastName(); ?></h6><br/>
				  		<div class='profile-button'>
							  <a href="profile.php?profile_username=<?php echo $profile_user->getUsername(); ?>" class="btn btn-success btn-sm float-left">See Profile</a>
							</div>
				  	</div>
				  </div>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="card profile-card shadow p-3 mb-4 bg-white rounded">
		    <div class="profile-card-img-block">
		      <div class="profile-info-box bg-primary">
		      	<?php echo $profile_user->getBio(); ?>
		      </div>
		      <img class='rounded cover-img' src='<?php echo $profile_user->getCoverPic(); ?>' id='profilecoverimage'>
		      <?php
				  	if ($user->getUsername() == $profile_user->getUsername()) {
							$friend_button = "<button class='btn-over-friend-img btn btn-primary btn-sm float-right'><i class='fa fa-pencil'></i>&nbsp;Edit</button>";
						}else{
							if ($user->isFriend($profile_user->getUsername())){
								$friend_button = "<button id='" . $profile_user->getUsername() . "' class='btn btn-danger btn-sm btn-over-friend-img float-right addfriend' onclick='friend(this)' value='0' onmouseleave='friendAction(this)'>Remove Friend</button>";
							} elseif ($request->didSendRequest($profile_user->getUsername()) == 1) {
								$friend_button = "<button id='" . $profile_user->getUsername() . "' class='btn btn-warning btn-sm btn-over-friend-img float-right addfriend' onclick='friend(this)' value='2' onmouseleave='friendAction(this)'>Cancel Request</button>";
							} else {
								$friend_button = "<button id='" . $profile_user->getUsername() . "' class='btn btn-success btn-sm btn-over-friend-img float-right addfriend' onclick='friend(this)' value='1' onmouseleave='friendAction(this)'>Add Friend</button>";
							}
						}
						echo $friend_button;
				  ?>
		    </div>
				<div class="media friend-profile-media">
				  <img class="mr-1 padding-5-circle friend-profile-pic" src="assets/images/profile_pics/defaults/profile_pic.png" alt="username">
				  <div class="media-body">
				  	<div class="float-left resize-box">
				  		<h6 class="m-0 d-inline-block text-truncate text-white" style="max-width: inherit;"><?php echo $profile_user->getFirstAndLastName(); ?></h6><br/>
				  		<div class='profile-button'>
							  <a href="profile.php?profile_username=<?php echo $profile_user->getUsername(); ?>" class="btn btn-success btn-sm float-left">See Profile</a>
							</div>
				  	</div>
				  </div>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="card profile-card shadow p-3 mb-4 bg-white rounded">
		    <div class="profile-card-img-block">
		      <div class="profile-info-box bg-primary">
		      	<?php echo $profile_user->getBio(); ?>
		      </div>
		      <img class='rounded cover-img' src='<?php echo $profile_user->getCoverPic(); ?>' id='profilecoverimage'>
		      <?php
				  	if ($user->getUsername() == $profile_user->getUsername()) {
							$friend_button = "<button class='btn-over-friend-img btn btn-primary btn-sm float-right'><i class='fa fa-pencil'></i>&nbsp;Edit</button>";
						}else{
							if ($user->isFriend($profile_user->getUsername())){
								$friend_button = "<button id='" . $profile_user->getUsername() . "' class='btn btn-danger btn-sm btn-over-friend-img float-right addfriend' onclick='friend(this)' value='0' onmouseleave='friendAction(this)'>Remove Friend</button>";
							} elseif ($request->didSendRequest($profile_user->getUsername()) == 1) {
								$friend_button = "<button id='" . $profile_user->getUsername() . "' class='btn btn-warning btn-sm btn-over-friend-img float-right addfriend' onclick='friend(this)' value='2' onmouseleave='friendAction(this)'>Cancel Request</button>";
							} else {
								$friend_button = "<button id='" . $profile_user->getUsername() . "' class='btn btn-success btn-sm btn-over-friend-img float-right addfriend' onclick='friend(this)' value='1' onmouseleave='friendAction(this)'>Add Friend</button>";
							}
						}
						echo $friend_button;
				  ?>
		    </div>
				<div class="media friend-profile-media">
				  <img class="mr-1 padding-5-circle friend-profile-pic" src="assets/images/profile_pics/defaults/profile_pic.png" alt="username">
				  <div class="media-body">
				  	<div class="float-left resize-box">
				  		<h6 class="m-0 d-inline-block text-truncate text-white" style="max-width: inherit;"><?php echo $profile_user->getFirstAndLastName(); ?></h6><br/>
				  		<div class='profile-button'>
							  <a href="profile.php?profile_username=<?php echo $profile_user->getUsername(); ?>" class="btn btn-success btn-sm float-left">See Profile</a>
							</div>
				  	</div>
				  </div>
				</div>
			</div>
		</div>
	</div>	
</div>