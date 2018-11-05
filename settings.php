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
				    <a class="list-group-item list-group-item-action active" id="accountInfo-item" data-toggle="tab" href="#accountInfo" role="tab" aria-controls="accountInfo" aria-selected="true">Edit Account Info</a>
				    <a class="list-group-item list-group-item-action" id="personalInfo-item" data-toggle="tab" href="#personalInfo" role="tab" aria-controls="personalInfo" aria-selected="false">Edit Personal Info</a>
				    <a class="list-group-item list-group-item-action" id="uploadPics-item" data-toggle="tab" href="#uploadPics" role="tab" aria-controls="uploadPics" aria-selected="false">Edit Images</a>
				    <a class="list-group-item list-group-item-action" id="changePassword-item" data-toggle="tab" href="#changePassword" role="tab" aria-controls="changePassword" aria-selected="false">Change Password</a>
				    <a class="list-group-item list-group-item-action" id="deleteAccount-item" data-toggle="tab" href="#deleteAccount" role="tab" aria-controls="deleteAccount" aria-selected="false">Delete Account</a>
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
		min-height: 400px;
	}
</style>

			<div class="col-md-8">
				<div class="container card">
					<div class="row">
			      <div class="card-body">
							<div class="tab-content" id="nav-tabContent">

							  <div class="tab-pane fade show active" id="accountInfo" role="tabpanel" aria-labelledby="nav-home-tab">
							  	<div class="row">
		                <div class="col-md-12">
		                  <h4>Edit Account Info</h4>
		                  <hr>
		                  <form>
                        <div class="form-group row">
                          <label for="firstName" class="col-4 col-form-label">First Name</label> 
                          <div class="col-8">
                            <input id="firstName" name="firstName" placeholder="First Name" class="form-control here" type="text">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="lastName" class="col-4 col-form-label">Last Name</label> 
                          <div class="col-8">
                            <input id="lastName" name="lastName" placeholder="Last Name" class="form-control here" type="text">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="email" class="col-4 col-form-label">Email</label> 
                          <div class="col-8">
                            <input id="email" name="email" placeholder="Email" class="form-control here" type="email">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="bio" class="col-4 col-form-label">Bio</label> 
                          <div class="col-8">
                            <textarea id="bio" name="bio" maxlength="255" cols="40" rows="4" class="form-control" placeholder="Write about you."></textarea>
                          </div>
                        </div>
                        <div class="form-group row">
                          <div class="offset-4 col-8">
                            <button name="savAccountInfo" type="submit" class="btn btn-primary">Save</button>
                          </div>
                        </div>
                      </form>
		                </div>
			            </div>
							  </div>

							  <div class="tab-pane fade" id="personalInfo" role="tabpanel" aria-labelledby="nav-contact-tab">
							  	<div class="row">
		                <div class="col-md-12">
		                  <h4>Edit Personal Information</h4>
		                  <hr>
		                  <form>
                        <div class="form-group row">
                          <label for="username" class="col-4 col-form-label">Password</label> 
                          <div class="col-8">
                            <input id="username" name="username" placeholder="Password" class="form-control here" type="text">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="name" class="col-4 col-form-label">New Password</label> 
                          <div class="col-8">
                            <input id="name" name="name" placeholder="New Password" class="form-control here" type="text">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="lastname" class="col-4 col-form-label">Confirm Password</label> 
                          <div class="col-8">
                            <input id="lastname" name="lastname" placeholder="Confirm Password" class="form-control here" type="text">
                          </div>
                        </div>
                        <div class="form-group row">
                          <div class="offset-4 col-8">
                            <button name="submit" type="submit" class="btn btn-primary">Save</button>
                          </div>
                        </div>
                      </form>
		                </div>
			            </div>
							  </div>
							  
							  <div class="tab-pane fade" id="uploadPics" role="tabpanel" aria-labelledby="nav-profile-tab">uploadPics</div>
							  
							  <div class="tab-pane fade" id="changePassword" role="tabpanel" aria-labelledby="nav-home-tab">
							  	<div class="row">
		                <div class="col-md-12">
		                  <h4>Change Password</h4>
		                  <hr>
		                  <form>
                        <div class="form-group row">
                          <label for="password" class="col-4 col-form-label">Password</label> 
                          <div class="col-8">
                            <input id="password" name="password" placeholder="Password" class="form-control here" type="password">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="newPassword" class="col-4 col-form-label">New Password</label> 
                          <div class="col-8">
                            <input id="newPassword" name="newPassword" placeholder="New Password" class="form-control here" type="password">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="confirmPassword" class="col-4 col-form-label">Confirm Password</label> 
                          <div class="col-8">
                            <input id="confirmPassword" name="confirmPassword" placeholder="Confirm Password" class="form-control here" type="password">
                          </div>
                        </div>
                        <div class="form-group row">
                          <div class="offset-4 col-8">
                            <button name="saveChangePassword" type="submit" class="btn btn-primary">Save</button>
                          </div>
                        </div>
                      </form>
		                </div>
			            </div>
							  </div>

							  <div class="tab-pane fade" id="deleteAccount" role="tabpanel" aria-labelledby="nav-contact-tab">
							  	<div class="text-danger">Do yo want to remove your account?</div>
					        <div class="form-group row float-right" style="margin-right: 10px;">
								    <button class="btn btn-danger" id='yesDeleteAccount'>Delete Account</button>
								  </div><br/><br/>
								  <p>After deleting your account, you won't have any kind of access to it. Also, no one can see your profile.</p>
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