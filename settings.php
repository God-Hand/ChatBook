<!DOCTYPE html>
<html>
<head>
	<title>Chatbook - settings</title>
</head>
<body>
	<?php include("header.php"); ?>
	<div role="main" class="container">
		<div class="row">
			<div class="col-md-4">
				<div class="list-group ">
				  <div class="nav nav-tabs" id="nav-tab" role="tablist">
				    <a class="list-group-item list-group-item-action active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Home</a>
				    <a class="list-group-item list-group-item-action" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Profile</a>
				    <a class="list-group-item list-group-item-action" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Contact</a>
				  </div>
          <br>
        </div> 
			</div>

<style>
	button{
		text-align: left;
	}
	.form-group{
		margin-bottom: 5px;
	}
	.card-body{
		min-height: 300px;
	}
</style>

			<div class="col-md-8">
				<div class="container card">
					<div class="row">
			      <div class="card-body">
							<div class="tab-content" id="nav-tabContent">
							  <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">page1</div>
							  <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">page2</div>
							  <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">page3</div>
							</div>
			      </div>
				  </div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>

<script>
	/*
	<div class="row">
				  	<button class="btn btn-default btn-block float-left deleteAccount" type="button" data-toggle="collapse" data-target="#deleteAccount" aria-expanded="false" aria-controls="deleteAccount" style="border-radius:0px;text-align: left;"><i class="fa fa-trash"></i>&nbsp;deleteAccount</button>
					  <div class="collapse multi-collapse new-container" id="deleteAccount">
				      <div class="card-body">
				        <div class="text-danger">Do yo want to remove your account?</div>
				        <div class="form-group row float-right">
							    <button class="btn btn-danger" id='yesDeleteAccount'>Yes</button>
							  </div> 
				      </div>
				    </div>
				  </div>
	*/
	$('#yesDeleteAccount').click(function(){
		bootbox.confirm({
	  	message: "Are you sure?",
	    buttons: {
	      confirm: {
          label: 'Yes',
          className: 'btn-danger'
        },
		    cancel: {
		  	  label: 'No',
			    className: 'btn-secondary'
		    }
		  },
		  callback: function (result) {
	      if(result){
					$.ajax({
			      type: "POST",
			      url: "includes/delete_account.php",
			      data: {
			        username : '<?php echo $user->getUsername(); ?>',
			      },
			      success: function(result) {
			      	window.location.href = "sign_out.php?";
			      },
			      error: function(result) {
			        alert('error');
			      }
			    });
	      }
	    }
		});
	})
</script>