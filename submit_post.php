<style>
  .post_block{
    margin-bottom: -5px;
  }
  #postBody.textarea{
    margin-bottom: 10px;
    min-height: 100px;
    max-height: 200px;
  }
  #uploadedImageDemo{
    max-height: 400px;
  }
  #postImage{
    padding-left: 0px;
  }
</style>
<div class="card shadow p-3 mb-4 bg-white rounded post_block">
  <div class="form-group">
    <textarea id="postBody" class="form-control border border-primary" rows="5" maxlength="60000" id="post" placeholder="Post Something here..."></textarea>
    <div class="form-row">
      <div class="col">
        <input type="file" id="postImage"  class="form-control-file btn float-left" accept="image/*">
        <input type="hidden" id='userTo' value=''>
        <input type="hidden" id='imageLocation' value=''>
      </div>
      <div class="col">
        <button type="submit" class="btn btn-primary float-right" id='sendPost'><i class="fa fa-pencil"></i>&nbsp;Post</button>
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

<script> 
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