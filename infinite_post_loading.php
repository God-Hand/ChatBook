<div class="col-md-8">
	<?php
		include('submit_post.php');
	?>
  <div class="post">
    <div class="card shadow p-3 mb-2 bg-white rounded">
      <div class="media p-3">
        <img src="https://randomuser.me/api/portraits/women/14.jpg" alt="username" class="align-self-start mr-3 rounded-circle" style="width:60px;">
        <div class="media-body">
          <h5>John Doe<br><small class="text-muted"><i class="fa fa-clock-o"></i><em>Posted on February 19, 2016</em></small></h5>
        </div>
      </div>
      <p><em>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</em></p>
      <img src="https://randomuser.me/api/portraits/women/14.jpg" alt="username" style="width: 100%; height: 100%;">
      <div class="form-row">
        <div class="col">
          <p class="text-muted float-left">Like()</p>
          <p class="text-muted float-right">Comments()</p>
        </div>
      </div>
      <div class="form-row">
        <div class="col">
          <button class="btn btn-primary float-left" style="margin-right:2px;"><i class="fa fa-thumbs-o-up"></i>&nbsp;Like</button>
          <button class="btn btn-primary float-left"><i class="fa fa-comment-o"></i>&nbsp;Comment</button>
        </div>
      </div>
      <iframe src="infinite_comment_loading.php" style="border:none;height:200px;margin:5px 0px;"></iframe>
      <div class="input-group mb-3">
        <input type="text" class="form-control border border-primary" placeholder="Comment..." aria-label="Recipient's username" aria-describedby="button-addon2">
        <div class="input-group-append">
          <button class="btn btn-primary" type="button"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
        </div>
      </div>
    </div>
  </div>
</div>


<div class="posts_area"></div>
<img id="loading" src="assets/images/icons/loading.gif">

<script>
	var user_logged_in = '<?php echo $user_logged_in; ?>';

	$(document).ready(function() {
		$('#loading').show();

		//Original ajax request for loading first posts 
		$.ajax({
			url: "includes/loaders/load_posts.php",
			type: "POST",
			data: {user_logged_in : user_logged_in, last_post_id : 0},
			cache:false,

			success: function(data) {
				$('#loading').hide();
				$('.posts_area').html(data);
			}
		});

		$(window).scroll(function() {
			// get id of last <div class='post' id='#post_id'></div>
			var last_post_id = $('.post:last').attr('id');
			var height = $('.posts_area').height();
			var scroll_top = $(this).scrollTop();
			var noMorePosts = $('.posts_area').find('.noMorePosts').val();

			if ((document.body.scrollHeight == document.body.scrollTop + window.innerHeight) && noMorePosts == 'false') {
				$('#loading').show();

				var ajaxReq = $.ajax({
					url: "includes/loaders/load_posts.php",
					type: "POST",
					data: {user_logged_in : user_logged_in, last_post_id : last_post_id},
					cache:false,

					success: function(response) {
						$('.posts_area').find('.noMorePosts').remove(); //Removes current .nextpage 
						$('.posts_area').find('.noMorePostsText').remove(); //Removes current .nextpage 

						$('#loading').hide();
						$('.posts_area').append(response);
					}
				});
			}
			return false;
		});
	});
</script>