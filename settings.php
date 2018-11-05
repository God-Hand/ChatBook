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
				<?php include("profile_card.php"); ?>
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
				  	<button class="btn btn-default btn-block float-left personalInformation" type="button" data-toggle="collapse" data-target="#personalInformation" aria-expanded="false" aria-controls="personalInformation" style="border-radius:0px;text-align: left;"><i class="fa fa-edit"></i>&nbsp;Edit Personal Info</button>
					  <div class="collapse multi-collapse new-container" id="personalInformation">
				      <div class="card-body">
				      </div>
				    </div>
				  </div>

				  <div class="row">
				  	<button class="btn btn-default btn-block float-left changPassword" type="button" data-toggle="collapse" data-target="#changPassword" aria-expanded="false" aria-controls="changPassword" style="border-radius:0px;text-align: left;"><i class="fa fa-edit"></i>&nbsp;Edit Password</button>
					  <div class="collapse multi-collapse new-container" id="changPassword">
				      <div class="card-body">
				       	<form>
								  <div class="form-group row">
								    <label for="originalPassword" class="col-md-3 col-form-label">Password</label>
								    <div class="col-md-9">
								      <input type="email" class="form-control" id="originalPassword" placeholder="Password" required>
								    </div>
								  </div>
								  <div class="form-group row">
								    <label for="newPassword" class="col-md-3 col-form-label">New Password</label>
								    <div class="col-md-9">
								      <input type="password" class="form-control" id="newPassword" placeholder="New Password" required>
								    </div>
								  </div>
								  <div class="form-group row">
								    <label for="confirnNewPassword" class="col-md-3 col-form-label">Confirn New Password</label>
								    <div class="col-md-9">
								      <input type="password" class="form-control" id="confirnNewPassword" placeholder="Confirn New Password" required>
								    </div>
								  </div>
								  <div class="form-group row float-right">
								    <button class="btn btn-primary" id='saveNewPassword'>Save Changes</button>
								  </div> 
								</form>
				      </div>
				    </div>
				  </div>

					<div class="row">
				  	<button class="btn btn-default btn-block float-left accountInformation" type="button" data-toggle="collapse" data-target="#accountInformation" aria-expanded="false" aria-controls="accountInformation" style="border-radius:0px;text-align: left;"><i class="fa fa-edit"></i>&nbsp;accountInformation</button>
					  <div class="collapse multi-collapse new-container" id="accountInformation">
				      <div class="card-body">
				        accountInformation
				      </div>
				    </div>
				  </div>
				  <div class="row">
				  	<button class="btn btn-default btn-block float-left uploadPics" type="button" data-toggle="collapse" data-target="#uploadPics" aria-expanded="false" aria-controls="uploadPics" style="border-radius:0px;text-align: left;"><i class="fa fa-cloud-upload"></i>&nbsp;uploadPics</button>
					  <div class="collapse multi-collapse new-container" id="uploadPics">
				      <div class="card-body">
				        uploadPics
				      </div>
				    </div>
				  </div>
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
				</div>
			</div>
		</div>
	</div>
</body>
</html>

<script>
	$('.personalInformation').click();
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