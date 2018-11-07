<?php
	require 'config/config.php';
	require('includes/classes/User.php');
	require('includes/classes/Message.php');
	require('functions/text_filter.php');
	if (!isset($_REQUEST['user_to']) or empty($_REQUEST['user_to'])) {
		echo $_SESSION['username'];
		echo $_REQUEST['user_to'];
		echo "<div class='p-3 mb-2 bg-light text-muted' style='margin:10px'>
						Wrong Usename
					</div>";
		return 0;
	}
	$user = new User($conn, $_SESSION['username']);
	$user_to_obj = new User($conn, strip_tags($_REQUEST['user_to']));
?>

<html>
<head>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
	<style>
		::-webkit-scrollbar {
			width: 5px;
		}
		::-webkit-scrollbar-track {
			background: #f1f1f1; 
		}
		::-webkit-scrollbar-thumb {
			background: #888; 
		}
		::-webkit-scrollbar-thumb:hover {
			background: #555; 
		}
	</style>
</head>
<body>
		<div class="col-12 alert bg-primary text-white mb-0">
			<div class="media">
			  <img class="mr-1" src="assets/images/profile_pics/arpit_gupta15415322931541581420.png" style="width:40px;border-radius:50%;" alt="Generic placeholder image">
			  <div class="media-body">
			    <h6 class="m-0">Jitendra Sharma</h6>
			    <p class="m-0">Typing...<small class="float-right"><em>12days ago</em></small></p>
			  </div>
			</div>
		</div>
		<div class="container-fluid" style="height:400px;overflow-y:scroll;">
			<div class="mb-3"></div>
			<div class="row float-left mr-0">
				<div class="col-12 alert bg-primary text-white">
					<div class="media">
					  <div class="media-body">
					    <h6 class="m-0">Jitendra Sharma</h6>
					    <p class="m-0">hi friend.
					    	How are you? long time, no see
					    </p>
					    <small class="float-right"><em>12days ago</em></small>
					  </div>
					</div>
				</div>
			</div>
			<br/>
			<div class="row float-right ml-0">
				<div class="col-12 alert bg-success text-white">
					<div class="media">
					  <div class="media-body">
					    <h6 class="m-0">You</h6>
					    <p class="m-0">hi friend.
					    	How are you? long time, no see
					    </p>
					    <small class="float-right"><em>12days ago</em></small>
					  </div>
					</div>
				</div>
			</div>
			<div class="row float-left mr-0">
				<div class="col-12 alert bg-primary text-white">
					<div class="media">
					  <div class="media-body">
					    <h6 class="m-0">Jitendra Sharma</h6>
					    <p class="m-0">hi friend.
					    	How are you? long time, no see
					    </p>
					    <small class="float-right"><em>12days ago</em></small>
					  </div>
					</div>
				</div>
			</div>
			<br/>
			<div class="row float-right ml-0">
				<div class="col-12 alert bg-success text-white">
					<div class="media">
					  <div class="media-body">
					    <h6 class="m-0">You</h6>
					    <p class="m-0">hi friend.
					    	How are you? long time, no see
					    </p>
					    <small class="float-right"><em>12days ago</em></small>
					  </div>
					</div>
				</div>
			</div>
			<div class="row float-left mr-0">
				<div class="col-12 alert bg-primary text-white">
					<div class="media">
					  <div class="media-body">
					    <h6 class="m-0">Jitendra Sharma</h6>
					    <p class="m-0">hi friend.
					    	How are you? long time, no see
					    </p>
					    <small class="float-right"><em>12days ago</em></small>
					  </div>
					</div>
				</div>
			</div>
			<br/>
			<div class="row float-right ml-0">
				<div class="col-12 alert bg-success text-white">
					<div class="media">
					  <div class="media-body">
					    <h6 class="m-0">You</h6>
					    <p class="m-0">hi friend.
					    	How are you? long time, no see
					    </p>
					    <small class="float-right"><em>12days ago</em></small>
					  </div>
					</div>
				</div>
			</div>
			<div class="row float-left mr-0">
				<div class="col-12 alert bg-primary text-white">
					<div class="media">
					  <div class="media-body">
					    <h6 class="m-0">Jitendra Sharma</h6>
					    <p class="m-0">hi friend.
					    	How are you? long time, no see
					    </p>
					    <small class="float-right"><em>12days ago</em></small>
					  </div>
					</div>
				</div>
			</div>
			<br/>
			<div class="row float-right ml-0">
				<div class="col-12 alert bg-success text-white">
					<div class="media">
					  <div class="media-body">
					    <h6 class="m-0">You</h6>
					    <p class="m-0">hi friend.
					    	How are you? long time, no see
					    </p>
					    <small class="float-right"><em>12days ago</em></small>
					  </div>
					</div>
				</div>
			</div>
		</div>
</body>
</html>