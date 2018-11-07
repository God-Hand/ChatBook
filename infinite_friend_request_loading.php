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
            <div class="col-12" style="margin-top: 15px;">
              <div class='card' id='id'>
                <div class='card-body media'>
                  <img src="assets/images/profile_pics/jitendra_sharma15414941331541495143.png" style="width:60px;height:60px;border-radius:50%;">
                  <div class='media-body' style='margin-left:5px;'>
                    <h6>Name</h6><small class='text-muted'>
                    <em>mutual friends</em></small>
                  </div>
                  <div class='form-row' style="width:30%;">
                    <div class='col-xs-6'>
                      <button class='btn btn-sm width-60 btn-success'> Accept</button>
                    </div>
                    <div class='col-xs-6'>
                      <button class='btn btn-sm width-60 btn-danger'> Reject</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
--->