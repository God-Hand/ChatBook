<!DOCTYPE html>
<html>
<head>
	<title>Chatbook - Search</title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<?php include("header.php"); ?>
	<div role="main" class="container">
		<div class="row">
			<div class="col-md-4">
				<?php include("profile_card.php"); ?>
			</div>
			<div class="col-md-8">
				<div class="container-fluid">
				</div>
	  		<img id="loading" src="assets/images/icons/loading.gif">
			</div>
		</div>
	</div>
</body>
</html>

<script>
	function DeleteNotification(obj){
		$.post('includes/delete_notification.php', {id : obj.id}, function(data){
			$('.notification#' + obj.id).fadeOut('slow');
			loadNotifications();
		});
	}
	function loadNotifications(){
		var last_id = $('.notification:last').attr('id');
		var noMoreNotifications = $('.container-fluid').find('#noMoreNotifications').val();
		if (noMoreNotifications == 'false') {
			$('#loading').show();
			$.post("includes/load_notifications.php", {last_id : last_id, limit : 5}, function(data){
				$('.container-fluid').find('#noMoreNotifications').remove();
				$('#loading').hide();
				$('.container-fluid').append(data);
			});
		}
	}
	$(document).ready(function() {
		$('#loading').show();
		$.post("includes/load_notifications.php", {last_id : 0 , limit : 7}, function(data){
			$('#loading').hide();
			$('.container-fluid').html(data);
			var first = $('.notification:first').attr('id');
			$.post("includes/read_all_notifications.php", {first : first}, function(data){
			})
		});

		$(window).scroll(function() {
			var last_id = $('.notification:last').attr('id');
			var noMoreNotifications = $('.container-fluid').find('#noMoreNotifications').val();
			if ((window.innerHeight + window.scrollY) >= document.body.offsetHeight) {
				loadNotifications();
			}
		});
	});
</script>