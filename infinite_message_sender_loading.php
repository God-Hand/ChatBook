<div class="friend_request_area" style="width:100%;">
</div>
<br>
<img id="loading" src="assets/images/icons/loading.gif">

<script>
	$(document).ready(function() {
		$('#loading').show();
		$.ajax({
			url: "includes/load_friend_requests.php",
			type: "POST",
			data: {
				username : '<?php echo $user->getUsername(); ?>',
			 	last_request_id : 0
			 },
			cache:false,
			success: function(data) {
				$('#loading').hide();
				$('.friend_request_area').html(data);
			}
		});
		$(window).scroll(function() {
			var last_request_id = $('.request:last').attr('id');
			var noMoreRequests = $('.friend_request_area').find('#noMoreRequests').val();
			if (((window.innerHeight + window.scrollY) >= document.body.offsetHeight) && noMoreRequests == 'false') {
				$('#loading').show();
				$.ajax({
					url: "includes/load_friend_requests.php",
					type: "POST",
					data: {
						username : '<?php echo $user->getUsername(); ?>', 
						last_request_id : last_request_id
					},cache:false,
					success: function(response) {
						$('.friend_request_area').find('#noMoreRequests').remove();
						$('.friend_request_area').find('#noMoreRequestsText').remove();
						$('#loading').hide();
						$('.friend_request_area').append(response);
					}
				});
			}
			return false;
		});
	});

	function deleteRequest(obj){
		var element = '.request#';
		$(element.concat(obj.id)).fadeOut();
	}
	function acceptRequest(obj){
		$.post("includes/accept_friend_request.php",{
			username : '<?php echo $user->getUsername(); ?>',
			user_from : obj.value
		}, function(e){
			$('#totalfriendCounts').html(parseInt($('#totalfriendCounts').text())+1);
		});
	}
	function rejectRequest(obj){
		$.post("includes/reject_friend_request.php",{
			username : '<?php echo $user->getUsername(); ?>',
			user_from : obj.value
		}, function(e){
		});
	}
</script>

<!---
	<li class="list-group-item list-group-item-action">
  	<div class="media">
		  <img class="mr-1" src="assets/images/profile_pics/arpit_gupta15415322931541581420.png" style="width:40px;border-radius:50%;" alt="Generic placeholder image">
		  <div class="media-body">
		    <h6 class="m-0">Jitendra Sharma<span class="float-right badge badge-success badge-pill">12</span></h6>
		    <p class="m-0">hi friend...<small class="float-right"><em>12d ago</em></small></p>
		  </div>
		</div>
  </li>
--->