<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.min.js"></script>
		<style src="assets/css/comment.css"></style>
		<style type="text/css">
			div {
		    word-wrap: break-word;
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
			body{
				font-size: 14px;
			}
		</style>
	</head>
	<body class="bg-light">
		<div class="comment_area">
	  </div>
	  <img id="loading" src="assets/images/icons/loading.gif">
	</body>
</html>

<script>
	var commentRequestResponse = true;
	var post_id = '<?php echo $_REQUEST['post_id']; ?>';
	function loadComments(){
		if(commentRequestResponse){
			var last_comment_id = $('.comment:last').attr('id');
			var noMoreComments = $('.comment_area').find('.noMoreComments').val();
			if (noMoreComments == 'false') {
				$('#loading').show();
				$.post("includes/load_comments.php", {post_id : post_id, last_comment_id : last_comment_id}, function(data){
					$('.comment_area').find('.noMoreComments').remove();
					$('#loading').hide();
					$('.comment_area').append(data);
					commentRequestResponse = true;
				});
			}
		}
	}
	$(document).ready(function() {
		$('#loading').show();
		commentRequestResponse = false;
		$.post("includes/load_comments.php", {post_id : post_id, last_comment_id : 0}, function(data){
			$('#loading').hide();
			$('.comment_area').html(data);
			commentRequestResponse = true;
		});
		$(window).scroll(function() {
			if ((window.innerHeight + window.scrollY) >= document.body.offsetHeight) {
				loadComments();
			}
		});
	});

	function likeComment(obj) {
		if(obj.value == "0") {
			obj.innerHTML = "<i class='fa fa-thumbs-down'></i>&nbspUnLike";
			obj.value = '1';
			$('#commentlikecount'+obj.id).html(parseInt($('#commentlikecount'+obj.id).html())+1);
		} else {
			obj.innerHTML = "<i class='fa fa-thumbs-up'></i>&nbspLike";
			obj.value = '0';
			$('#commentlikecount'+obj.id).html(parseInt($('#commentlikecount'+obj.id).html())-1);
		}
		$.post("includes/like_comment.php", {comment_id : obj.id, user_action : obj.value}, function(data){
		});
	}
</script>