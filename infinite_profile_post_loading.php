<div class="posts_area">
</div>
<img id="loading" src="assets/images/icons/loading.gif">

<script>

	$(document).ready(function() {
		$('#loading').show();
		var user_logged_in = '<?php echo $user_logged_in; ?>';
		//Original ajax request for loading first posts 
		$.ajax({
			url: "includes/load_posts.php",
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
			var noMorePosts = $('.posts_area').find('.noMorePosts').val();

			if ( ((window.innerHeight + window.scrollY) >= document.body.offsetHeight) && noMorePosts == 'false') {
				$('#loading').show();
				$('.posts_area').find('.noMorePosts').remove(); //Removes current .nextpage 

				var ajaxReq = $.ajax({
					url: "includes/load_posts.php",
					type: "POST",
					data: {user_logged_in : user_logged_in, last_post_id : last_post_id},
					cache:false,

					success: function(response) {
						$('.posts_area').find('.noMorePostsText').remove(); //Removes current .nextpage 

						$('#loading').hide();
						$('.posts_area').append(response);
					}
				});
			}
			return false;
		});
	});
	// action in post
	function openCommentFrame(obj) {
		var commentframeid = "commentframe";
		var element = document.getElementById(commentframeid.concat(obj.id));
		if(element.style.display == "block") {
			element.style.display = "none";
		} else {
			element.style.display = "block";
			document.getElementById(commentframeid.concat(obj.id)).height = document.getElementById(commentframeid.concat(obj.id)).contentWindow.document.body.scrollHeight;
		}
	}
	function likePost(obj) {
		if(obj.value == "0") {
			obj.innerHTML = "<i class='fa fa-thumbs-down'></i>&nbspUnLike";
			obj.value = '1';
			var likecountid = "likecount";
			document.getElementById(likecountid.concat(obj.id)).innerHTML = parseInt(document.getElementById(likecountid.concat(obj.id)).innerHTML)+1;
		} else {
			obj.innerHTML = "<i class='fa fa-thumbs-up'></i>&nbspLike";
			obj.value = '0';
			var likecountid = "likecount";
			document.getElementById(likecountid.concat(obj.id)).innerHTML = parseInt(document.getElementById(likecountid.concat(obj.id)).innerHTML)-1;
		}
	}
	function saveAction(obj){
		var user_logged_in = '<?php echo $user_logged_in; ?>';
		$.ajax({
      type: "POST",
      url: "includes/like_post.php",
      data: {
        username : user_logged_in,
				post_id : obj.id,
				user_action  : obj.value
      },
      success: function(result) {
      },
      error: function(result) {
        alert('error');
      }
    });
	}
	function sendComment(obj){
		var user_logged_in = '<?php echo $user_logged_in; ?>';
		var comment = "comment";
		var body = document.getElementById(comment.concat(obj.id)).value;
		$.ajax({
      type: "POST",
      url: "includes/save_comment.php",
      data: {
        username : user_logged_in,
				post_id : obj.id,
				comment_body  : body
      },
      success: function(result) {
				document.getElementById(comment.concat(obj.id)).value = '';
				var commentcountid = "commentcountid";
				document.getElementById(commentcountid.concat(obj.id)).innerHTML = result;
				var commentframeid = "commentframe";
				document.getElementById(commentframeid.concat(obj.id)).contentWindow.location.reload();
				//document.getElementById(commentframeid.concat(obj.id)).style.display = "block";
      },
      error: function(result) {
        alert('error');
      }
    });
	}
	function deletePost(obj){
		bootbox.confirm({
	    message: "Delete the post .Are you Sure?",
	    buttons: {
	      confirm: {
	        label: 'Yes',
	        className: 'btn-success'
	      },
	      cancel: {
	        label: 'No',
	        className: 'btn-danger'
	      }
	    },
	    callback: function (result) {
	      if(result){
	      	var user_logged_in = '<?php echo $user_logged_in; ?>';
					$.ajax({
			      type: "POST",
			      url: "includes/delete_post.php",
			      data: {
			        username : user_logged_in,
							post_id : obj.id,
			      },
			      success: function(result) {
			      	var element = '.post#';
							$(element.concat(obj.id)).fadeOut();
							$('#totalpostsCounts').html(parseInt($('#totalpostsCounts').text())-1);
			      },
			      error: function(result) {
			        alert('error');
			      }
			    });
	      }
	    }
		});
	}
	function deleteComment(obj){
		bootbox.confirm({
	    message: "Delete the comment .Are you Sure?",
	    buttons: {
	      confirm: {
	        label: 'Yes',
	        className: 'btn-success'
	      },
	      cancel: {
	        label: 'No',
	        className: 'btn-danger'
	      }
	    },
	    callback: function (result) {
	      if(result){
	      	var user_logged_in = '<?php echo $user_logged_in; ?>';
					$.ajax({
			      type: "POST",
			      url: "includes/delete_comment.php",
			      data: {
			        username : user_logged_in,
							comment_id : obj.id,
			      },
			      success: function(result) {
							var commentframeid = "#commentframe";
							var comment = '.comment#';
							$(commentframeid.concat(result)).contents().find(comment.concat(obj.id)).fadeOut();
							var commentcountid = "commentcountid";
							document.getElementById(commentcountid.concat(result)).innerHTML = parseInt(document.getElementById(commentcountid.concat(result)).innerHTML) - 1;
			      },
			      error: function(result) {
			        alert('error');
			      }
			    });
	      }
	    }
		});
	}
</script>