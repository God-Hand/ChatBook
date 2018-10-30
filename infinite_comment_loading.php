<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
	<style src="assets/css/comment.css"></style>
	<style type="text/css">
	  .form-group, .table{
	    margin-bottom: 0px;
	  }
	  .scrollClass {
	    height:200px;
	    overflow-y: scroll;
	  }
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
	  .image-size{
			width: 24px;
			margin-right:5px;
		}
		body{
			font-size: 14px;
		}
		.delete-button {
			padding: 0px 4px;
			margin-left: 5px;
		}
	</style>
</head>
<body style="background-color: #e9ecef">
	<div class="comment_area">
  </div>
  <img id="loading" src="assets/images/icons/loading.gif">
</body>
</html>
<script>
	$(document).ready(function() {
		$('#loading').show();

		//Original ajax request for loading first posts 
		$.ajax({
			url: "includes/load_comments.php",
			type: "POST",
			data: {
				username : '<?php echo $_REQUEST['username']; ?>',
			 	post_id: '<?php echo $_REQUEST['post_id']; ?>',
			 	last_comment_id : 0
			 },
			cache:false,

			success: function(data) {
				$('#loading').hide();
				$('.comment_area').html(data);
			}
		});

		$(window).scroll(function() {
			// get id of last <div class='post' id='#post_id'></div>
			var last_comment_id = $('.comment:last').attr('id');
			var noMoreComments = $('.comment_area').find('.noMoreComments').val();

			if (((window.innerHeight + window.scrollY) >= document.body.offsetHeight) && noMoreComments == 'false') {
				$('#loading').show();

				var ajaxReq = $.ajax({
					url: "includes/load_comments.php",
					type: "POST",
					data: {
						username : '<?php echo $_REQUEST['username']; ?>', 
						post_id: '<?php echo $_REQUEST['post_id']; ?>', 
						last_comment_id : last_comment_id
					},
					cache:false,

					success: function(response) {
						$('.comment_area').find('.noMoreComments').remove(); //Removes current .nextpage 
						$('.comment_area').find('.noMoreCommentsText').remove(); //Removes current .nextpage 

						$('#loading').hide();
						$('.comment_area').append(response);
					}
				});
			}
			return false;
		});
	});
</script>

<!---
<div class="alert alert-dark" style="width:80%;margin:10px;">
	<div class="media ">
    <img src="https://randomuser.me/api/portraits/women/14.jpg" alt="username" class="align-self-start mr-3 rounded-circle" style="width:30px;">
    <div class="media-body">
      <h6>John Doe<small class="float-right text-muted"><i class="fa fa-clock-o"></i><em>Posted on February 19, 2016</em></small></h6>
    </div>
  </div>
  <p><em>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</em></p>
  <div class="form-row">
    <div class="col">
      <button class="btn btn-primary btn-sm">Like</button>
    </div>
  </div>
</div>
--->