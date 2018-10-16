<div class="col-md-8">
	<div class="card shadow-lg p-3 mb-5 bg-white rounded">
    <form>
      <div class="form-group">
        <textarea class="form-control border border-primary" rows="5" maxlength="60000" id="post" placeholder="Post Something here..." style="margin-bottom: 10px;"></textarea>
        <div class="form-row">
          <div class="col">
            <input type="file" class="form-control-file btn float-left" style="padding-left: 0px;" data-toggle="modal" data-target="#myModal">
          </div>
          <div class="col">
            <a href="#" class="btn btn-primary float-right"><i class="fa fa-pencil"></i>&nbsp;Post</a>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>


<div class="modal in" role="dialog" id="myModal" aria-hidden="false">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
        <div class="col-md-9">
          <img src="" data-original-width="586" data-original-height="389">
        </div>
        <div class="col-md-3">
          <canvas width="150" height="150"></canvas>
        </div>
        <div class="clearfix"></div>
      </div>
      <div class="modal-footer">
        <div class="btn-group">
          <a href="#" class="btn yes btn-primary">Apply</a>
          <a href="#" class="btn btn-danger" data-dismiss="modal">Cancel</a>
        </div>
      </div>
    </div>
  </div>
</div>