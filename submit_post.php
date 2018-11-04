<div class="card shadow p-3 mb-4 bg-white rounded" style="margin-bottom: -5px;">
  <form method="post" action="" enctype="multipart/form-data">
    <div class="form-group">
      <textarea id="post_body" class="form-control border border-primary" rows="5" maxlength="60000" id="post" placeholder="Post Something here..." style="margin-bottom: 10px;min-height: 100px; max-height: 200px;"></textarea>
      <div class="form-row">
        <div class="col">
          <input id="post_img" type="file" class="form-control-file btn float-left" style="padding-left: 0px;">
        </div>
        <div class="col">
          <button name="submit_post" type="submit" class="btn btn-primary float-right" id='sendpost'><i class="fa fa-pencil"></i>&nbsp;Post</button>
        </div>
      </div>
    </div>
  </form>
</div>
<div id="alert-message"></div>


<script>
  $(".alert").fadeTo(2000, 500).slideUp(500, function(){
    $(".alert").slideUp(500);
  });
  // send data on save changes click
  $('#sendpost').on('click', function(event){
    event.preventDefault();
    if ($('#post_body').val().trim().length || $('#post_img').val()){
      var formData = new FormData();
      var files = $('#post_img')[0].files[0];
      formData.append('post_img',files);
      formData.append('post_body', $('#post_body').val());
      formData.append('username', '<?php echo $user->getUsername(); ?>');
      $.ajax({
        url: 'includes/save_post.php',
        type: 'post',
        data: formData,
        contentType: false,
        processData: false,
        success: function(response){
          $('#alert-message').html(response);
          $('#post_body').val('');
          $('#post_img').val('');
        },
      });
    }
  })
</script>