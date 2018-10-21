<?php
  $post_body = "";
  $post_img = "";
  $alert_message = "";
  $upload_message = "";
  if(isset($_POST['submit_post'])){
    $post_body = removeSpaces($_POST['post_body']);
    $post_id = $post->addPost('', $post_body);
    if(isset($_FILES['post_img'])){
      $upload_message = $post->uploadImage($post_id, $_FILES["post_img"]);
      if($upload_message == "The file ". $_FILES["post_img"]["name"] . " has been uploaded.") {
        $alert_message = "<div class='alert alert-success alert-dismissible'>
                            <button type='button' class='close' data-dismiss='alert'>&times;</button>
                            ". $upload_message ."
                          </div>";
      } else {
        $alert_message = "<div class='alert alert-warning alert-dismissible'>
                            <button type='button' class='close' data-dismiss='alert'>&times;</button>
                            ". $upload_message ."
                          </div>";
        $post->deleteWastePost($post_id);
      }
    }
  }
?>
<div class="card shadow p-3 mb-4 bg-white rounded" style="margin-bottom: -5px;">
  <form method="post" action="index.php" enctype="multipart/form-data">
    <div class="form-group">
      <textarea name="post_body" class="form-control border border-primary" rows="5" maxlength="60000" id="post" placeholder="Post Something here..." style="margin-bottom: 10px;"></textarea>
      <div class="form-row">
        <div class="col">
          <input name="post_img" type="file" class="form-control-file btn float-left" style="padding-left: 0px;">
        </div>
        <div class="col">
          <button name="submit_post" type="submit" ="#" class="btn btn-primary float-right"><i class="fa fa-pencil"></i>&nbsp;Post</button>
        </div>
      </div>
    </div>
  </form>
</div>

<?php echo $alert_message; ?>