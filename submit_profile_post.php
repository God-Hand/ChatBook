<style>
	#postBody{
		width: 100%;
		max-height: 200px;
		min-height: 100px;
	}
  #postImage{
    padding-left:0px;
  }
</style>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Profile Post</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <textarea placeholder="write here.." id='postBody'></textarea>
        <input type="file" id="postImage"  class="form-control-file btn float-left" accept="image/*">
        <input type="hidden" id='userTo' value='<?php
                                                  if ($user->getUsername()==$profile_user->getUsername()){
                                                    echo '';
                                                  } else {
                                                    echo $profile_user->getUsername();
                                                  } ?>'>
        <input type="hidden" id='imageLocation' value=''>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="sendPost">Add</button>
      </div>
    </div>
  </div>
</div>

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
<script type="text/javascript">
	// show model on add post click
	$('#addpost').on('click', function(e){
	  $('#myModal').modal('show');
	});

  $(document).ready(function(){
   $image_crop = $('#uploadedImageDemo').croppie({
      enableExif: true,
      viewport: {
        width:200,
        height:200,
        type:'square' //circle
      },
      boundary:{
        width:300,
        height:300
      }
    });
    $('#postImage').on('change', function(){
      var fileExtension = ['jpeg', 'jpg', 'png', 'gif', 'bmp'];
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
      $image_crop.croppie('result', {
        type: 'canvas',
        size: 'viewport'
      }).then(function(response){
        $.ajax({
          url:"upload.php",
          type: "POST",
          data:{
            image: response,
            targetDir : "assets/images/post_pics/",
            username : "<?php $user->getUsername(); ?>"
          },
          success:function(data) {
            $('#myUploadImageModel').modal('hide');
            $('#imageLocation').val(data);
          }
        });
      })
    });
  });
  // send data on save changes click
  $('#sendPost').on('click', function(event){
    if ($('#postBody').val().trim().length || $('#imageLocation').val()){
      $.post("includes/save_post.php", {
        username : '<?php echo $user->getUsername(); ?>',
        userTo : $('#userTo').val(),
        postBody : $('#postBody').val(),
        imageLocation : $('#imageLocation').val()}
        , function(data) {
          location.reload();
      })
    }
  })
</script>