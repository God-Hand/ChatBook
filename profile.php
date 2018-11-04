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
			bottom: -10px;
	    right: -25px;
		  transform: translate(-50%, -430%);
		  -ms-transform: translate(-50%, -50%);
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
	?>
	<div style="min-height:70px;">
	</div>
	<div role="main" class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="card profile-card shadow p-3 mb-4 bg-white rounded">
			    <div class="profile-card-img-block">
			      <div class="profile-info-box bg-primary">
			      	<?php echo $user->getBio(); ?>
			      </div>
			      <img class='rounded' src='<?php echo $user->getCoverPic(); ?>' style="height: 100%; width: 100%;">     
			      <a href="#" class="btn-over-img btn btn-primary"><i class="fa fa-pencil"></i>&nbsp;Edit</a>
			    </div>
			    <div class="profile-card-body pt-5 profile">
			      <div class="float-left"><img src="<?php echo $user->getProfilePic(); ?>" alt="profile-image" style="background-color: #fff; padding: 10px; border-radius: 50%;"/></div>
			      <h5 class="float-left text-white" style="position: relative;top: 70px; left:10px;"><?php echo $user->getFirstAndLastName(); ?></h5>
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
				  <div class="tab-pane container active" id="tab1">
				  	<?php
				  		require 'infinite_post_loading.php';
				  	?>
				  </div>
				  <div class="tab-pane container fade" id="tab2">page2</div>
				  <div class="tab-pane container fade" id="tab3">page3</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>