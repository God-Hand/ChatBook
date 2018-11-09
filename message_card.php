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
		.message{
			min-width: 60%;
			max-width: 100%;
		}
	</style>
</head>
<body>
		<div class="col-12 alert bg-primary text-white mb-0">
			<div class="media">
			  <img class="mr-1" src="assets/images/profile_pics/defaults/profile_pic.png" alt="Generic placeholder image">
			  <div class="media-body">
			    <div class="float-left resize-box">
			  		<h6 class="m-0 d-inline-block text-truncate" style="max-width: inherit;"><?php echo $user_to_obj->getFirstAndLastName(); ?></h6>
			  	</div>
			  </div>
			</div>
		</div>
		<div class="container-fluid" id="message_area">
		</div>
		<div class='input-group'>
	    <input id='messageTyped' type='text' class='form-control' placeholder='Type a message'>
	    <div class='input-group-append' maxlength='250'>
	      <button id='messagedBtn' class='btn btn-success' type='button' onclick='sendMessage()'><i class='fa fa-paper-plane' aria-hidden='true'></i></button>
	    </div>
	  </div>
</body>
</html>
<script>
	function sendMessage(){
		$msg_body = $('#messageTyped').val();
		$.post("includes/save_message.php", {body:msg_body},function(data){
		});
	}

	var last_message_id = 0;
	window.onresize = function() {
	  $('.resize-box').css({
	    "maxWidth": $('.resize-box').parent().width() - 10 + "px"
	  });
	}
	function loadOldMessages(){
		$('.container-fluid').find('#loadRow').remove();
		$.post("includes/load_messages.php", { name : '<?php echo $user_to_obj->getUsername(); ?>', last_message_id : last_message_id, limit : 10 }, function(data){
			$('.container-fluid').prepend(data);
			$('.container-fluid').prepend("<div class='row' id='loadRow'><div class='col-12 my-3'><center><button class='btn btn-sm btn-default' onclick='loadOldMessages()' id='loadPreviousMessages'>Load Messages</button></center></div></div>");
		});
	}
	function loadNewMessages(){
		console.log(last_message_id);
		/*$.post("includes/load_new_messages.php", { name : '<?php echo $user_to_obj->getUsername(); ?>', last_message_id : last_message_id}, function(data){
			$('.container-fluid').append(data);
		});*/
	}

	$(document).ready(function(){
		$.post("includes/load_messages.php", { name : '<?php echo $user_to_obj->getUsername(); ?>', last_message_id : 0, limit : 10}, function(data){
			$('.container-fluid').append(data);
			$('.container-fluid').prepend("<div class='row' id='loadRow'><div class='col-12 my-3'><center><button class='btn btn-sm btn-default' onclick='loadOldMessages()' id='loadPreviousMessages'>Load Messages</button></center></div></div>");
		});

		setInterval(loadNewMessages,1000);
	});
</script>