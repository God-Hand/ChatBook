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
		.profile-nav{
			top:-70px;
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
	<div style="min-height:70px;">
	</div>
	<div role="main" class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="card profile-card shadow p-3 mb-4 bg-white rounded">
			    <div class="profile-card-img-block">
			      <div class="profile-info-box bg-primary">
			      	<?php echo $profile_user->getBio(); ?>
			      </div>
			      <img class='rounded' src='<?php echo $profile_user->getCoverPic(); ?>' style="height: 100%; width: 100%;">
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
			      <div class="float-left"><img src="<?php echo $profile_user->getProfilePic(); ?>" alt="profile-image" style="background-color: #fff; padding: 5px; border-radius: 50%;"/></div>
			      <h5 class="float-left text-white" style="position: relative;top: 70px; left:10px;"><?php echo $profile_user->getFirstAndLastName(); ?></h5>
			    </div>
			    <div style="position: relative;top: -30px;height: 0px;">
					  <button class="btn btn-success btn-sm float-right" id="addpost">Add Post</button>
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
				  <div class="tab-pane container active" id="tab1" style="padding: 10px;">
				  	<?php
				  		require 'infinite_profile_post_loading.php';
				  	?>
				  </div>
				  <div class="tab-pane container fade" id="tab2">page2</div>
				  <div class="tab-pane container fade" id="tab3">page3</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Modal -->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	  <div class="modal-dialog modal-dialog-centered" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLongTitle">Profile Post</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <textarea placeholder="write here.." style="width: 100%;max-height: 200px;min-height: 100px;"></textarea>
	        <input type="file" name="image">
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	        <button type="button" class="btn btn-primary" id="savechanges">Save changes</button>
	      </div>
	    </div>
	  </div>
	</div>

<script type="text/javascript">
	$('#addpost').on('click', function(e){
	  $('#myModal').modal('show');
	});
	$('#savechanges').on('click', function(event){
  	console.log('ji');
  	$('#myModal').modal('hide');
  })
</script>
</body>
</html>