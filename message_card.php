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
			word-wrap: break-word;
		}
		.resize-box{
			max-width: 200px;
		}
		.container-fluid{
			padding-top: 1em;
			height:408px;
			overflow-y:scroll;
		}
		img{
			width:40px;
			border-radius:50%;
		}
		.message{
			min-width:60%;
		}
		a, a:active{
			text-decoration: none;
			color:#fff;
		}
		a:hover{
			color:#f1f1f1;
		}
	</style>
</head>
<body>
		<div class="col-12 alert bg-primary text-white mb-0">
			<div class="media">
			  <img class="mr-1" src="assets/images/profile_pics/defaults/profile_pic.png" alt="Generic placeholder image">
			  <div class="media-body pl-1">
			    <div class="float-left resize-box">
			  		<h6 class="m-0 d-inline-block text-truncate" style="max-width: inherit;"><?php echo $user_to_obj->getFirstAndLastName(); ?></h6>
			  	</div>
			  	<div>
			  		<button class="p-1 btn btn-sm btn-danger float-right" onclick="parent.deleteAllMessages()"><i class="fa fa-trash" aria-hidden="true"></i></button>
			  	</div>
			  </div>
			</div>
		</div>
		<div class="container-fluid" id="message_area">
			<div class='row float-right ml-0 message' id='0' display='none'></div>
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
	var messageNewRequestResponse = true;
	var messageOldRequestResponse = true;
	window.onresize = function() {
	  $('.resize-box').css({
	    "maxWidth": $('.resize-box').parent().width() - 10 + "px"
	  });
	}
	function sendMessage(){
		var msg_body = $('#messageTyped').val();
		$.post("includes/save_message.php", {body:msg_body, name : '<?php echo $user_to_obj->getUsername(); ?>'},function(data){
			$('#messageTyped').val('');
		});
	}
	function deleteMessage(obj){
		$.post("includes/delete_message.php", {message_id : obj.id},function(data){
			$('.message#'+obj.id).fadeOut('slow');
		});
	}
	function loadOldMessages(){
		if (messageOldRequestResponse){
			var last_message_id = $('.message:first').attr('id');
			messageOldRequestResponse = false;
			$.post("includes/load_messages.php", { name : '<?php echo $user_to_obj->getUsername(); ?>', fullname : '<?php echo $user_to_obj->getFirstAndLastName(); ?>', last_message_id : last_message_id, limit : 10 }, function(data){
				$('.container-fluid').find('#loadRow').remove();
				if(data != "nothing"){
					$('.container-fluid').prepend(data);
				}
				messageOldRequestResponse = true;
			});
		}
	}
	
	var objDiv = document.getElementById("message_area");
	function loadNewMessages(){
		if (messageNewRequestResponse){
			var last_message_id = $('.message:last').attr('id');
			messageNewRequestResponse = false;
			$.post("includes/load_new_messages.php", { name : '<?php echo $user_to_obj->getUsername(); ?>', fullname : '<?php echo $user_to_obj->getFirstAndLastName(); ?>', last_message_id : last_message_id}, function(data){
				if( data != 'nothing'){
					$('.container-fluid').append(data);
					objDiv.scrollTop = objDiv.scrollHeight;
				}
			});
			messageNewRequestResponse = true;
		}
	}

	$(document).ready(function(){
		messageOldRequestResponse = false;
		messageNewRequestResponse = false;
		$.post("includes/load_messages.php", { name : '<?php echo $user_to_obj->getUsername(); ?>', fullname : '<?php echo $user_to_obj->getFirstAndLastName(); ?>', last_message_id : 0, limit : 10}, function(data){
			if(data != "nothing"){
				$('.container-fluid').find('.message:first').remove();
				$('.container-fluid').append(data);
				objDiv.scrollTop = objDiv.scrollHeight;
			}
			messageNewRequestResponse = true;
			messageOldRequestResponse = true;
		});

		setInterval(loadNewMessages,1000);
	});
</script>