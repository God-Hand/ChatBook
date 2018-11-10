<!DOCTYPE html>
<html>
	<head>
		<?php 
			include("header.php");
			if ($user->isUser($_REQUEST['profile_username'])){
				$profile_user = new User($conn, $_REQUEST['profile_username']);
			} else {
				header('Location: index.php');
			}
		?>
	  <title><?php echo $profile_user->getFirstAndLastName(); ?> - Profile</title>
		<meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	</head>
<style type="text/css">
	/*Profile card*/
	.profile-card .profile-card-img-block{
	    float:left;
	    width:100%;
	    height:150px;
	    overflow:hidden;
	}
	.profile-card .profile-card-body{
	    position:relative;
	}
	.profile-card .profile {
	    position: absolute;
	    top: -62px;
	    left: 50%;
	    width:100px;
	    margin-left: -50px;
	}
	.profile-card .profile-card-img-block{
	    position:relative;
	}
	.profile-card .profile-card-img-block .btn-over-img{
		position: relative;
		top: -140px;
    right: 10px;
	}
	.profile-card .profile-card-img-block > .profile-info-box{
	    position:absolute;
	    width:100%;
	    height:100%;
	    color:#fff;
	    padding:20px;
	    text-align:center;
	    font-size:14px;
	   -webkit-transition: 1s ease;
	    transition: 1s ease;
	    opacity:0;
	}
	.profile-card .profile-card-img-block:hover > .profile-info-box{
			border-radius: .25rem!important;
	    opacity:1;
	    -webkit-transition: all 1s ease;
	    transition: all 1s ease;
	}
</style>
<body>
	<div role="main" class="container">
		<div class="row">
			<div class="col-md-4">
				<div class="card profile-card shadow p-3 mb-4 bg-white rounded">
				  <div class="profile-card-img-block">
				    <div class="profile-info-box bg-primary">
				    	<?php echo $profile_user->getBio(); ?>
				    </div>
				    <img class='rounded cover-img' src='<?php echo $profile_user->getCoverPic(); ?>'>     
				    <?php
				    	if($profile_user->getUsername() == $user->getUsername()){
				    		echo "<a href='settings.php' class='btn-over-img btn btn-primary float-right'><i class='fa fa-pencil'></i>&nbsp;Edit</a>";
				    	} else {
				    		if ($user->isFriend($profile_user->getUsername())){
									$friend_button = "<button id='" . $profile_user->getUsername() . "' class='btn-over-img btn btn-sm btn-danger float-right addfriend' onclick='friend(this);friendAction(this);reload();' value='0'>Remove Friend</button>";
								} elseif ($request->didReceiveRequest($profile_user->getUsername()) == 1) {
									$friend_button = "<button id='" . $profile_user->getUsername() . "' class='btn-over-img btn btn-sm btn-success float-right addfriend' onclick='friend(this);friendAction(this);reload();' value='1'>Accept Request</button>";
								} elseif ($request->didSendRequest($profile_user->getUsername()) == 1) {
									$friend_button = "<button id='" . $profile_user->getUsername() . "' class='btn-over-img btn btn-sm btn-warning float-right addfriend' onclick='friend(this);friendAction(this);' value='2'>Cancel Request</button>";
								} else {
									$friend_button = "<button id='" . $profile_user->getUsername() . "' class='btn-over-img btn btn-sm btn-success float-right addfriend' onclick='friend(this);friendAction(this);' value='3'>Add Friend</button>";
								}
								echo $friend_button;
				    	}
				    ?>
				  </div>
				  <div class="profile-card-body pt-5">
				    <img src="<?php echo $profile_user->getProfilePic(); ?>" alt="profile-image" class="profile border border-default padding-5-circle"/>
				    <center><h6 class="text-primary"><?php echo $profile_user->getFirstAndLastName(); ?></h6></center>
				    <table class="table">
				    	<tr>
				    		<td><i class="fa fa-users"></i> &nbsp;Friends</td>
				    		<td id='totalfriendCounts'><?php echo $profile_user->getNumOfFriends(); ?></td>
				    	</tr>
				    	<tr>
				    		<td><i class="fa fa-paperclip"></i> &nbsp;Posts</td>
				    		<td id='totalpostsCounts'><?php echo $profile_user->getNumOfPosts(); ?></td>
				    	</tr>
				    </table>
				  </div>
				</div>
				<div class="card">
					<div class="card-body">
					</div>					
				</div>
			</div>

			<div class="col-md-8">
				<!-- Nav tabs -->
				<ul class="nav nav-tabs mb-3">
				  <li class="nav-item">
				    <a class="nav-link active" data-toggle="tab" href="#profile_post_box">Profile Post</a>
				  </li>
				  <li class="nav-item">
				    <a class="nav-link" data-toggle="tab" href="#friend_box">Friends</a>
				  </li>
				  <?php
				  	// show this tab when profile_user is not main user
				  	if($user->getUsername() != $profile_user->getUsername()){
				  		echo "<li class='nav-item'>
									    <a class='nav-link' data-toggle='tab' href='#message_box'>Message</a>
									  </li>";
				  	} 
				  ?>
				</ul>
				<!-- Tab panes -->
				<div class="tab-content mb-2">

				  <!--- post by profile_user and user--->
				  <div class="tab-pane active" id="profile_post_box">
				  	<div class="card shadow p-3 mb-4 bg-white rounded post_block">
						  <div class="form-group">
						    <textarea id="postBody" class="form-control border border-primary" rows="5" maxlength="60000" id="post" placeholder="Post Something here..." style="min-height: 100px;max-height: 200px;"></textarea>
						    <div class="form-row">
						      <div class="col">
						        <input type="file" id="postImage"  class="form-control-file btn float-left pl-0" accept="image/*">
						        <input type="hidden" id='userTo' value='<?php if($user->getUsername() != $profile_user->getUsername()){echo $profile_user->getUsername();}else{ echo '';} ?>'>
						        <input type="hidden" id='imageLocation' value=''>
						      </div>
						      <div class="col">
						        <button type="submit" class="btn btn-primary float-right mt-5" id='sendPost'><i class="fa fa-pencil"></i>&nbsp;Post</button>
						      </div>
						    </div>
						  </div>
						</div>
				  	<div class="posts_area">
						</div>
						<img id="loading" src="assets/images/icons/loading.gif">
				  </div>

				  <!---profile_user friend_list--->
				  <div class="tab-pane container-fluid fade" id="friend_box">
				  	<?php include 'infinite_friends_loading.php' ?>
				  </div>

				  <!---message tab for other user's not for profile_user--->
				  <?php
				  	if($user->getUsername() != $profile_user->getUsername()){
				  		echo "<div class='tab-pane container-fluid fade' id='message_box'>
									  	<iframe src='message_card.php?user_to=" . $profile_user->getUsername() . "' class='border border-default' style='height:514px;width:100%;'></iframe>
									  </div>";
				  	} 
				  ?>

				</div>
			</div>
		</div>
	</div>
</body>
</html>
<script>
	function deleteAllMessages(){
		bootbox.confirm({
      message: "this will delete all messages by you to " + '<?php echo $profile_user->getFirstAndLastName(); ?>'+'.',
      buttons: {
        confirm: { label: 'Yes', className: 'btn-success' },
        cancel: { label: 'No', className: 'btn-danger' }
      },
      callback: function (result) {
        if(result){
          $.post("includes/delete_all_messages.php", {name : '<?php echo $profile_user->getUsername(); ?>'},function(data){
						location.reload();
					});
        }
      }
    });
	}
	function reload(){
		location.reload();
	}

	$(document).ready(function() {
		$('#loading').show();
		$.post("includes/load_profile_posts.php", {last_post_id : 0, name : '<?php echo $profile_user->getUsername(); ?>'}, function(data){
			$('#loading').hide();
			$('.posts_area').html(data);
		});
		$(window).scroll(function() {
			var last_post_id = $('.post:last').attr('id');
			var noMorePosts = $('.posts_area').find('.noMorePosts').val();
			if ( ((window.innerHeight + window.scrollY) >= document.body.offsetHeight) && noMorePosts == 'false') {
				$('#loading').show();
				$('.posts_area').find('.noMorePosts').remove(); 
				$.post("includes/load_profile_posts.php", {last_post_id : last_post_id, name : '<?php echo $profile_user->getUsername(); ?>'}, function(data){
					$('.posts_area').find('.noMorePostsText').remove();
					$('#loading').hide();
					$('.posts_area').append(data);
				});
			}
		});
	});
	  $(document).ready(function(){
   $image_crop = $('#uploadedImageDemo').croppie({
      enableExif: true,
      viewport: { width:200, height:200, type:'square' },
      boundary:{ width:300, height:300 }
    });
    $('#postImage').on('change', function(){
      var fileExtension = ['jpeg', 'jpg', 'png', 'gif'];
      if ($.inArray($(this).val().split('.').pop().toLowerCase(), fileExtension) == -1) {
        alert("Only formats are allowed : "+fileExtension.join(', '));
      } else {
        var reader = new FileReader();
        reader.onload = function (event) {
          $image_crop.croppie('bind', {
            url: event.target.result
          }).then(function(){
            console.log('jQuery bind complete');
          });
        }
        reader.readAsDataURL(this.files[0]);
        $('#myUploadImageModel').modal('show');
      }
    });
    $('#cropImage').click(function(event){
      $image_crop.croppie('result', { type: 'canvas', size: 'original' }).then(function(response){
        $.post("upload.php",{image : response, targetDir : "assets/images/post_pics/"}, function(data){
          $('#myUploadImageModel').modal('hide');
          $('#imageLocation').val(data);
        });
      })
    });
  });
  // send data on save changes click
  $('#sendPost').on('click', function(event){
    if ($('#postBody').val().trim().length || $('#imageLocation').val()){
      $.post("includes/save_post.php", { userTo : $('#userTo').val(), postBody : $('#postBody').val(), imageLocation : $('#imageLocation').val()} , function(data) {
          location.reload();
      })
    }
  });
</script>