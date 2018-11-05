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
				    <a class="list-group-item list-group-item-action" id="uploadPics-item" data-toggle="tab" href="#uploadPics" role="tab" aria-controls="uploadPics" aria-selected="false">Change Images</a>
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
		                  <h4>Edit Account Information</h4>
		                  <hr>
                      <div class="form-group row">
                        <label for="firstName" class="col-4 col-form-label">First Name</label> 
                        <div class="col-8">
                          <input id="firstName" name="firstName" maxlength="20" placeholder="First Name" class="form-control here" type="text">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="lastName" class="col-4 col-form-label">Last Name</label> 
                        <div class="col-8">
                          <input id="lastName" name="lastName" maxlength="20" placeholder="Last Name" class="form-control here" type="text">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="email" class="col-4 col-form-label">Email</label> 
                        <div class="col-8">
                          <input id="email" name="email" maxlength="100" placeholder="Email" class="form-control here" type="email">
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
		                </div>
			            </div>
							  </div>

							  <div class="tab-pane fade" id="personalInfo" role="tabpanel" aria-labelledby="nav-contact-tab">
							  	<div class="row">
		                <div class="col-md-12">
		                  <h4>Edit Personal Information</h4>
		                  <hr>
                      <div class="form-group row">
                        <label for="mobileNumber" class="col-4 col-form-label">Mobile</label> 
                        <div class="col-8">
                          <input id="mobileNumber" name="mobileNumber" maxlength="15" placeholder="Mobile No." class="form-control here" type="text">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="birthDay" class="col-4 col-form-label">BirthDay</label> 
                        <div class="col-8">
                          <input id="birthDay" name="birthDay" placeholder="BirthDay" class="form-control here" type="text">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="gender" class="col-4 col-form-label">Gender</label> 
                        <div class="col-8">
                          <div class="radio">
													  <label><input type="radio" name="gender">Male</label>
													</div>
													<div class="radio">
													  <label><input type="radio" name="gender">Female</label>
													</div>
													<div class="radio">
													  <label><input type="radio" name="gender">Other</label>
													</div>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="city" class="col-4 col-form-label">City</label> 
                        <div class="col-8">
                          <input id="city" name="city" maxlength="100" placeholder="City" class="form-control here" type="text">
                        </div>
                      </div> 
                      <div class="form-group row">
                        <label for="country" class="col-4 col-form-label">Country</label> 
                        <div class="col-8">
                          <input id="country" name="country" maxlength="100" placeholder="Country" class="form-control here" type="text">
                        </div>
                      </div>    
                      <div class="form-group row">
                        <label for="school" class="col-4 col-form-label">School</label> 
                        <div class="col-8">
                          <input id="school" name="school" maxlength="255" placeholder="School" class="form-control here" type="text">
                        </div>
                      </div>                        
                      <div class="form-group row">
                        <label for="college" class="col-4 col-form-label">College</label> 
                        <div class="col-8">
                          <input id="college" name="college" maxlength="255" placeholder="College" class="form-control here" type="text">
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-4 col-8">
                          <button name="savPersonalInfo" type="submit" class="btn btn-primary">Save</button>
                        </div>
                      </div>
		                </div>
			            </div>
							  </div>
							  
							  <div class="tab-pane fade" id="uploadPics" role="tabpanel" aria-labelledby="nav-profile-tab">
							  	<div class="row">
		                <div class="col-md-12">
		                  <h4>Upload Images</h4>
		                  <hr>
                      <div class="form-group row">
                        <label for="uploadProfilePic" class="col-sm-4 col-form-label">Profile Image</label> 
                        <div class="col-sm-8">
                          <input id="uploadProfilePic" name="uploadProfilePic" class="form-control-file here" type="file" style="padding-top: 5px;" accept="image/*">
                        </div>
                        <div class="col-sm-12" id="uploadedProfilePic"></div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-4 col-8">
                          <button name="uploadProfilePicBtn" type="submit" class="btn btn-success float-right">Upload</button>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="uploadCoverPic" class="col-sm-4 col-form-label">Cover Image</label> 
                        <div class="col-sm-8">
                          <input id="uploadCoverPic" name="uploadCoverPic" class="form-control-file here" type="file" style="padding-top: 5px;" accept="image/*">
                        </div>
                        <div class="col-sm-12" id="uploadedCoverPic"></div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-4 col-8">
                          <button name="uploadCoverPicBtn" type="submit" class="btn btn-success float-right">Upload</button>
                        </div>
                      </div>
		                </div>
			            </div>
							  </div>
							  
							  <div class="tab-pane fade" id="changePassword" role="tabpanel" aria-labelledby="nav-home-tab">
							  	<div class="row">
		                <div class="col-md-12">
		                  <h4>Change Password</h4>
		                  <hr>
                      <div class="form-group row">
                        <label for="password" class="col-4 col-form-label">Password</label> 
                        <div class="col-8">
                          <input id="password" name="password" maxlength="100" placeholder="Password" class="form-control here border" onkeyup="checkPassword(this)" type="password">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="newPassword" class="col-4 col-form-label">New Password</label> 
                        <div class="col-8">
                          <input id="newPassword" name="newPassword" maxlength="100" placeholder="New Password" class="form-control here border"  onkeyup="checkPassword(this)" type="password">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="confirmPassword" class="col-4 col-form-label">Confirm Password</label> 
                        <div class="col-8">
                          <input id="confirmPassword" name="confirmPassword" maxlength="100" placeholder="Confirm Password" class="form-control here border" onkeyup="matchPasswords(this)" type="password">
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-4 col-8">
                          <button name="saveChangePassword" type="submit" class="btn btn-primary">Save</button>
                        </div>
                      </div>
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
		<br/>
	</div>
</body>
</html>

<script>
	function checkPassword(obj){
		var element = document.getElementById(obj.id);
		if( obj.value.length < 8 || obj.value.length > 15){
			element.classList.add('border-danger');
		} else {
			element.classList.remove('border-danger');
			element.classList.add('border-success');
		}
	}
	function matchPasswords(obj){
		var element = document.getElementById(obj.id);
		if( obj.value != document.getElementById('newPassword').value){
			element.classList.add('border-danger');
		} else {
			element.classList.remove('border-danger');
			element.classList.add('border-success');
		}
	}
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