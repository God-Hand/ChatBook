<div class="col-md-8">
	<div class="card shadow p-3 mb-4 bg-white rounded" style="margin-bottom: -5px;">
    <form>
      <div class="form-group">
        <textarea class="form-control border border-primary" rows="5" maxlength="60000" id="post" placeholder="Post Something here..." style="margin-bottom: 10px;"></textarea>
        <div class="form-row">
          <div class="col">
            <input type="file" class="form-control-file btn float-left" style="padding-left: 0px;">
          </div>
          <div class="col">
            <a href="#" class="btn btn-primary float-right"><i class="fa fa-pencil"></i>&nbsp;Post</a>
          </div>
        </div>
      </div>
    </form>
  </div>
  <div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>Success!</strong> This alert box could indicate a successful or positive action.
  </div>
  <div class="alert alert-warning alert-dismissible">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>Success!</strong> This alert box could indicate a successful or positive action.
  </div>
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