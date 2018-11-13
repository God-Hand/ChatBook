<!DOCTYPE html>
<html>
<head>
	<title>Chatbook - friend requests</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<style>
  .width-60{ width: 60px; }
  .friend-profile-pic{
    position: relative;
    left: 0px;
    bottom: 0px;
    width: 60px;
  }
  .friend-profile-media{
    position: relative;
    bottom: 65px;
    left: 5px;
    height: 0px;
  }
  .btn-over-friend-img{
    position: absolute;
    top:10px;
    right:10px;
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
        <div class="container-fluid p-0">
          <div class="row friend_request_area">
          </div>
          <br>
          <img id="loading" src="assets/images/icons/loading.gif">
        </div>
      </div>
    </div>
  </div>
  <?php include("footer.php"); ?>
</body>
</html>
<script>
  var friendRequestResponse = true;
  
  function loadRequests(){
    var last_request_id = $('.request:last').attr('id');
    var noMoreRequests = $('.friend_request_area').find('#noMoreRequests').val();
    if (friendRequestResponse && noMoreRequests == 'false') {
      friendRequestResponse = false;
      $('#loading').show();
      $.post("includes/load_friend_requests.php", {last_request_id : last_request_id, limit : 8}, function(data){
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
    $.post("includes/load_friend_requests.php", {last_request_id : 0, limit : 10}, function(data){
      $('#loading').hide();
      $('.friend_request_area').html(data);
      friendRequestResponse = true;
    });
    $(window).scroll(function() {
      if ((window.innerHeight + window.scrollY) >= document.body.offsetHeight) {
        loadRequests();
      }
    });

    $('#friendRequestsCount').val('');
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