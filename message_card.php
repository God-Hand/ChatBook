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
		p{
			line-height: 16px;
		}
		.resize-box{
			max-width: 200px;
		}
		.container-fluid{
			height:408px;
			overflow-y:scroll;
		}
		img{
			width:40px;
			border-radius:50%;
		}
	</style>
</head>
<body>
		<div class="col-12 alert bg-primary text-white mb-0">
			<div class="media">
			  <img class="mr-1" src="assets/images/profile_pics/defaults/profile_pic.png" alt="Generic placeholder image">
			  <div class="media-body">
			    <div class="float-left resize-box">
			  		<h6 class="m-0 d-inline-block text-truncate" style="max-width: inherit;"><?php echo $user_to_obj->getFirstAndLastName(); ?></h6><br/>
			  		<p id="userToOnline" class="m-0 d-inline-block text-truncate" style="max-width: inherit;">Online</p>
			  	</div>
			  </div>
			</div>
		</div>
		<div class="container-fluid">
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
					    <h6 class="m-0">You<a id='message_id' class='btn btn-md text-secondary pr-0 float-right' onclick='deleteMessage(this)'><i class="fa fa-times"></i></a></h6>
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
					    <h6 class="m-0">You<a id='message_id' class='btn btn-md text-secondary pr-0 float-right' onclick='deleteMessage(this)'><i class="fa fa-times"></i></a></h6>
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
					    <h6 class="m-0">You<a id='message_id' class='btn btn-md text-secondary pr-0 float-right' onclick='deleteMessage(this)'><i class="fa fa-times"></i></a></h6>
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
					    <h6 class="m-0">You<a id='message_id' class='btn btn-md text-secondary pr-0 float-right' onclick='deleteMessage(this)'><i class="fa fa-times"></i></a></h6>
					    <p class="m-0">hi friend.
					    	How are you? long time, no see
					    </p>
					    <small class="float-right"><em>12days ago</em></small>
					  </div>
					</div>
				</div>
			</div>
		</div>
		<div class='input-group'>
	    <input id='messageTyped' type='text' class='form-control' placeholder='Type a message'>
	    <div class='input-group-append' maxlength='250'>
	      <button id='messagedBtn' class='btn btn-success' type='button' onclick='sendMessage(this)'><i class='fa fa-paper-plane' aria-hidden='true'></i></button>
	    </div>
	  </div>
</body>
</html>
<script>
	window.onresize = function() {
	  $('.resize-box').css({
	    "maxWidth": $('.resize-box').parent().width() - 50 + "px"
	  });
	}
	function update(){
		$.post("includes/user_isOnline.php", { name : '<?php echo $user_to_obj->getUsername(); ?>'}, function(data){
			if(data=='false'){
				$('#userToOnline').html("");
			}else{
				$('#userToOnline').html("Online");
			}
		});
	}
	setInterval(update, 10000);
	$(document).ready(function(){
		$.post("includes/load_messages.php", { name : '<?php echo $user_to_obj->getUsername(); ?>', last_message_id : 0, limit : 15}, function(data){

		})
	});
</script>