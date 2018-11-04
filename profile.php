<!DOCTYPE html>
<html>
	<head>
		<title>ChatBook - Profile.php</title>
		<meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	</head>
	<style type="text/css">
		/*Profile card*/
		.profile-card .profile-card-img-block{
		    float:left;
		    width:100%;
		    height:200px;
		    overflow:hidden;
		}
		.profile-card .profile-card-body{
		    position:relative;
		    max-height: 0px;
		}
		.profile-card .profile {
		    position: relative;
		    top: -150px;
		    left: 70px;
		    width:100%;
		    margin-left: -50px;
		}
		.profile-card .profile-card-img-block{
		    position:relative;
		}
		.profile-card .profile-card-img-block .btn-over-img{
			position: absolute;
			top: 10px;
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
		    opacity:1;
		    -webkit-transition: all 1s ease;
		    transition: all 1s ease;
		}
		.post-button{
			position: relative;
			top: -30px;
			height: 0px;
		}
		.profile-name{
			position: relative;
			top: 70px;
			left:10px;
		}
	</style>
<body>
	<?php 
		include("header.php");
		if ($user->isUser($_REQUEST['profile_username'])){
			$profile_user = new User($conn, $_REQUEST['profile_username']);
		} else {
			header('index.php');
		}
	?>
	<div role="main" class="new-container">
		<div class="row">
			<div class="col-md-12">
				<div class="card profile-card shadow p-3 mb-4 bg-white rounded">
			    <div class="profile-card-img-block">
			      <div class="profile-info-box bg-primary">
			      	<?php echo $profile_user->getBio(); ?>
			      </div>
			      <img class='rounded cover-img' src='<?php echo $profile_user->getCoverPic(); ?>' id='profilecoverimage'>
			      <?php
					  	if ($user->getUsername() == $profile_user->getUsername()) {
								$friend_button = "<button class='btn-over-img btn btn-primary btn-sm'><i class='fa fa-pencil'></i>&nbsp;Edit</button>";
							}else{
								if ($user->isFriend($profile_user->getUsername())){
									$friend_button = "<button id='" . $profile_user->getUsername() . "' class='btn btn-danger btn-sm btn-over-img float-right addfriend' onclick='friend(this)' value='0' onmouseleave='friendAction(this)'>Remove Friend</button>";
								} elseif ($request->didSendRequest($profile_user->getUsername()) == 1) {
									$friend_button = "<button id='" . $profile_user->getUsername() . "' class='btn btn-warning btn-sm btn-over-img float-right addfriend' onclick='friend(this)' value='2' onmouseleave='friendAction(this)'>Cancel Request</button>";
								} else {
									$friend_button = "<button id='" . $profile_user->getUsername() . "' class='btn btn-success btn-sm btn-over-img float-right addfriend' onclick='friend(this)' value='1' onmouseleave='friendAction(this)'>Add Friend</button>";
								}
							}
							echo $friend_button;
					  ?>
			    </div>
			    <div class="profile-card-body pt-5 profile">
			      <div class="float-left"><img class="padding-5-circle"src="<?php echo $profile_user->getProfilePic(); ?>" alt="profile-image"/></div>
			      <h5 class="float-left text-white profile-name"><?php echo $profile_user->getFirstAndLastName(); ?></h5>
			    </div>
			    <div class='post-button'>
					  <button class="btn btn-success btn-sm float-right" id="addpost">Add Post</button>
					  <?php require 'submit_profile_post.php'; ?>
					</div>
			  </div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-12">
				<!-- Nav tabs -->
				<ul class="nav nav-tabs">
				  <li class="nav-item">
				    <a class="nav-link active" data-toggle="tab" href="#tab1">Profile Post</a>
				  </li>
				  <li class="nav-item">
				    <a class="nav-link" data-toggle="tab" href="#tab2">Friends</a>
				  </li>
				  <li class="nav-item">
				    <a class="nav-link" data-toggle="tab" href="#tab3">Message</a>
				  </li>
				</ul>
				<!-- Tab panes -->
				<div class="tab-content">
				  <div class="tab-pane new-container active" id="tab1">
				  	<?php
				  		require 'infinite_profile_post_loading.php';
				  	?>
				  </div>
				  <div class="tab-pane new-container fade" id="tab2">page2</div>
				  <div class="tab-pane new-container fade" id="tab3">page3</div>
				</div>
			</div>
		</div>

	</div>
</body>
</html>