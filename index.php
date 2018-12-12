<!DOCTYPE html>
<html>
<head>
	<title>Chatbook - Home</title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<style type="text/css">
	.post_block{
    margin-bottom: -5px;
  }
  #postBody.textarea{
    margin-bottom: 10px;
  }
  #uploadedImageDemo{
    max-height: 400px;
  }
</style>
<body onbeforeunload="countPage();">
	<?php include("header.php"); ?>
	<div role="main" class="container">
		<div class="row">
			<div class="col-md-4">
				<?php include("profile_card.php"); ?>
			</div>
			<div class="col-md-8">
				<div class="card shadow p-3 mb-4 bg-white rounded post_block">
				  <div class="form-group">
				    <textarea id="postBody" class="form-control border border-primary" rows="5" maxlength="60000" id="post" placeholder="Post Something here..." style="min-height: 100px;max-height: 200px;"></textarea>
				    <div class="form-row">
				      <div class="col">
				        <input type="file" id="postImage"  class="form-control-file btn float-left pl-0" accept="image/*">
				        <input type="hidden" id='userTo' value=''>
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
		</div>
	</div>
  <?php include("footer.php"); ?>
</body>
</html>

<!--- upload image model --->
<div id="myUploadImageModel" z-index="-2" class="modal" role="dialog">
 <div class="modal-dialog modal-dialog-centered" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h4 class="modal-title">Crop & Upload Image</h4>
      <button type="button" class="close" data-dismiss="modal">&times;</button>
    </div>
    <div class="modal-body">
      <div class="text-center">
        <div id="uploadedImageDemo"></div>
      </div>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-success" id="cropImage">Upload Image</button>
      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    </div>
   </div>
  </div>
</div>

<script>
  // called whenever user delete post or scroll down
  var postRequestResponse = true;
  function loadPosts(){
    var last_post_id = $('.post:last').attr('id');
    var noMorePosts = $('.posts_area').find('.noMorePosts').val();
    if ( noMorePosts == 'false' && postRequestResponse) {
      postRequestResponse = false;
      $('#loading').show();
      $('.posts_area').find('.noMorePosts').remove(); 
      $.post("includes/load_posts.php", {last_post_id : last_post_id}, function(data){
        $('.posts_area').find('.noMorePostsText').remove();
        $('#loading').hide();
        $('.posts_area').append(data);
        postRequestResponse = true;
      });
    }
  }

  function scrollDown(id){
    var myInterval = false;
    var found = true;
    myInterval = setInterval(AutoScroll, 1500);
    function AutoScroll() {
      if($('#loading').is(':visible') == false){
        var iScroll = $(window).scrollTop();
        iScroll = iScroll + 1500;
        $('html, body').animate({
          scrollTop: iScroll
        }, 1500);
      }
      loadPosts();
    }
    var scrollHandler = function () {
      var iScroll = $(window).scrollTop();
      if (iScroll == 0) {
        myInterval = setInterval(AutoScroll, 1500);
      }
      var last_id = $('.post:last').attr('id');
      if (iScroll + $(window).height() == $(document).height() || last_id < id) {
        clearInterval(myInterval);
        if($('.posts_area').find('.post#'+id).length > 0){
          $('html, body').animate({ scrollTop: $('#'+id).offset().top-80 }, 2000);
        } else {
          $('html, body').animate({ scrollTop: $('#'+last_id).offset().top-80 }, 2000);
          found = false;
        }
        $(window).unbind('scroll');
        if(!found){
          alert('no found');
        }
        $(window).scroll(function(){
          if ((window.innerHeight + window.scrollY) >= document.body.offsetHeight) {
            loadPosts();
          }
        });
      }
    }
    $(window).scroll(scrollHandler);
  }

  function deletePost(obj){
    bootbox.confirm({
      message: "Delete the post .Are you Sure?",
      buttons: {
        confirm: { label: 'Yes', className: 'btn-success' },
        cancel: { label: 'No', className: 'btn-danger' }
      },
      callback: function (result) {
        if(result){
          $.post("includes/delete_post.php", {post_id : obj.id}, function(data){
            var element = '.post#';
            $(element.concat(obj.id)).fadeOut();
            $('#totalpostsCounts').html(parseInt($('#totalpostsCounts').text())-1);
            loadPosts();
          });
        }
      }
    });
  }

	$(document).ready(function() {
		$('#loading').show();
    postRequestResponse = false;
		$.post("includes/load_posts.php", {last_post_id : 0}, function(data){
      $('#loading').hide();
			$('.posts_area').html(data);
      postRequestResponse = true;
      <?php if(isset($_REQUEST['post_id'])) { echo "scrollDown(" . $_REQUEST['post_id'] . ");";} ?>
		});
    $(window).scroll(function() {
			if ((window.innerHeight + window.scrollY) >= document.body.offsetHeight) {
				loadPosts();
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
          location.href = 'index.php';
      })
    }
  });
</script>