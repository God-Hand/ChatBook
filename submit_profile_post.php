<style>
	#profilepostbody{
		width: 100%;
		max-height: 200px;
		min-height: 100px;
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
	      <form id='profile_post'>
	        <textarea placeholder="write here.." id='profilepostbody'></textarea>
	        <input type="file" name="image" id='profilepostimage'>
      	</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="sendpost">Add</button>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
	// show model on add post click
	$('#addpost').on('click', function(e){
	  $('#myModal').modal('show');
	});
	// send data on save changes click
	$('#sendpost').on('click', function(event){
		if ($('#profilepostbody').val().trim().length || $('#profilepostimage').val()){
			var formData = new FormData();
      var files = $('#profilepostimage')[0].files[0];
      formData.append('file',files);
      formData.append('post_body', $('#profilepostbody'));
      formData.append('username', '<?php echo $user->getUsername(); ?>');
      formData.append('profile_user', '<?php echo $profile_user->getUsername(); ?>');
		 	$.ajax({
        url: 'includes/save_profile_post.php',
        type: 'post',
        data: formData,
        contentType: false,
        processData: false,
        success: function(response){
        	$('#profilepostbody').val('');
					$('#profilepostimage').val('');
					$('#myModal').modal('hide');
        },
      });
		}
  })
</script>