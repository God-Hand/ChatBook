<div class="friend_request_area" style="width:100%;">
</div>
<br>
<img id="loading" src="assets/images/icons/loading.gif">

<script>
	$(document).ready(function() {
		$('#loading').show();
		$.post("includes/load_friend_requests.php", {last_request_id : 0}, function(data){
			$('#loading').hide();
			$('.friend_request_area').html(data);
		});
		$(window).scroll(function() {
			var last_request_id = $('.request:last').attr('id');
			var noMoreRequests = $('.friend_request_area').find('#noMoreRequests').val();
			if (((window.innerHeight + window.scrollY) >= document.body.offsetHeight) && noMoreRequests == 'false') {
				$('#loading').show();
				$.post("includes/load_friend_requests.php", {last_request_id : last_request_id}, function(data){
					$('.friend_request_area').find('#noMoreRequests').remove();
					$('.friend_request_area').find('#noMoreRequestsText').remove();
					$('#loading').hide();
					$('.friend_request_area').append(data);
				});
			}
		});
	});

	function deleteRequest(obj){
		var element = '.request#';
		$(element.concat(obj.id)).fadeOut();
	}
	function acceptRequest(obj){
		$.post("includes/accept_friend_request.php",{ user_from : obj.value }, function(e){
			$('#totalfriendCounts').html(parseInt($('#totalfriendCounts').text())+1);
		});
	}
	function rejectRequest(obj){
		$.post("includes/reject_friend_request.php",{ user_from : obj.value }, function(e){
		});
	}
</script>