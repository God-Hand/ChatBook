<!DOCTYPE html>
<html>
<head>
	<title>Chatbook - friend requests</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<style>
  .width-60{
    width: 60px;
  }
</style>
<body>
	<?php include("header.php"); ?>
	<div role="main" class="container">
		<div class="row">
      <div class="col-md-4">
        <?php include("profile_card.php") ?>
      </div>
			<div class="col-md-8">
        <div class="card>">
          <div class="container card">
            <div class="row">
              <div class="friend_request_area" style="width:100%;">
              </div>
              <br>
              <img id="loading" src="assets/images/icons/loading.gif">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
<script>
  var friendRequestResponse = true;
  
  function loadRequest(){
    var last_request_id = $('.request:last').attr('id');
    var noMoreRequests = $('.friend_request_area').find('#noMoreRequests').val();
    if (friendRequestResponse && noMoreRequests == 'false') {
      friendRequestResponse = false;
      $('#loading').show();
      $.post("includes/load_friend_requests.php", {last_request_id : last_request_id}, function(data){
        $('.friend_request_area').find('#noMoreRequests').remove();
        $('#loading').hide();
        $('.friend_request_area').append(data);
        friendRequestResponse = true;
      });
    }
  }
  $(document).ready(function() {
    friendRequestResponse = false;
    $('#loading').show();
    $.post("includes/load_friend_requests.php", {last_request_id : 0}, function(data){
      $('#loading').hide();
      $('.friend_request_area').html(data);
      friendRequestResponse = true;
    });
    $(window).scroll(function() {
      if ((window.innerHeight + window.scrollY) >= document.body.offsetHeight) {
        loadRequest();
      }
    });
  });

  function deleteRequest(obj){
    $('.request#'+obj.id).fadeOut();
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