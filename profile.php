<!DOCTYPE html>
<html>
	<head>
		<title>ChatBook - Profile.php</title>
		<meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	</head>
<body>
	<?php 
		include("header.php");
	?>
	<div style="min-height:70px;">
	</div>
	<div role="main" style="padding: 0px 10px;">
		<div class="row">
			<?php
				include("profile_card.php");
			?>
			<div class="col-md-8">
				<!-- Nav tabs -->
				<ul class="nav nav-tabs">
				  <li class="nav-item">
				    <a class="nav-link active" data-toggle="tab" href="#profile_posts">Profile Post</a>
				  </li>
				  <li class="nav-item">
				    <a class="nav-link" data-toggle="tab" href="#friends">Friends</a>
				  </li>
				  <li class="nav-item">
				    <a class="nav-link" data-toggle="tab" href="#messages">Messages</a>
				  </li>
				</ul>

				<!-- Tab panes -->
				<div class="tab-content">
				  <div class="tab-pane container active" id="profile_posts">
				  	<?php require 'infinite_profile_post_loading.php'; ?>
				  </div>
				  <div class="tab-pane container fade" id="friends">friends</div>
				  <div class="tab-pane container fade" id="messages">messages</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>