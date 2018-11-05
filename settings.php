<!DOCTYPE html>
<html>
<head>
	<title>Chatbook - settings</title>
	<script src="assets/js/md5.js"></script>
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
        									<input type="hidden" id='uploadedProfilePic' value=''>
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-4 col-8">
                          <button id="uploadProfilePicBtn" type="button" class="btn btn-success float-right">Upload</button>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="uploadCoverPic" class="col-sm-4 col-form-label">Cover Image</label> 
                        <div class="col-sm-8">
                          <input id="uploadCoverPic" name="uploadCoverPic" class="form-control-file here" type="file" style="padding-top: 5px;" accept="image/*">
        									<input type="hidden" id='uploadedCoverPic' value=''>
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-4 col-8">
                          <button id="uploadCoverPicBtn" type="button" class="btn btn-success float-right">Upload</button>
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
                          <input type="hidden" id="previouspassword" value='<?php echo $user->getPassword(); ?>'>
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
                          <button id="saveChangedPassword" type="submit" class="btn btn-primary">Save</button>
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
								  <p>After deleting your account, you won't have any kind of access to it. All Information related to your acccount will also be removed.</p>
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


<!--- upload image model --->
<div id="myUploadProfilePicModel" z-index="-2" class="modal" role="dialog">
 <div class="modal-dialog modal-dialog-centered" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h4 class="modal-title">Crop & Upload Image</h4>
      <button type="button" class="close" data-dismiss="modal">&times;</button>
    </div>
    <div class="modal-body">
      <div class="text-center">
        <div id="uploadedProfilePicDemo"></div>
      </div>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-success" id="cropProfilePic">Upload Image</button>
      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    </div>
   </div>
  </div>
</div>

<!--- upload image model --->
<div id="myUploadCoverPicModel" z-index="-2" class="modal" role="dialog">
 <div class="modal-dialog modal-dialog-centered" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h4 class="modal-title">Crop & Upload Image</h4>
      <button type="button" class="close" data-dismiss="modal">&times;</button>
    </div>
    <div class="modal-body">
      <div class="text-center">
        <div id="uploadedCoverPicDemo"></div>
      </div>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-success" id="cropCoverPic">Upload Image</button>
      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    </div>
   </div>
  </div>
</div>

<script>

	// upload images
  $(document).ready(function(){
   $image_crop = $('#uploadedProfilePicDemo').croppie({
      enableExif: true,
      viewport: {
        width:200,
        height:200,
        type:'square'
      },
      boundary:{
        width:300,
        height:300
      }
    });
    $('#uploadProfilePic').on('change', function(){
      var fileExtension = ['jpeg', 'jpg', 'png'];
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
        $('#myUploadProfilePicModel').modal('show');
      }
    });
    $('#cropProfilePic').click(function(event){
      $image_crop.croppie('result', {
        type: 'canvas',
        size: 'viewport'
      }).then(function(response){
        $.ajax({
          url:"upload.php",
          type: "POST",
          data:{
            image: response,
            targetDir : "assets/images/profile_pics/",
            username : "<?php echo $user->getUsername(); ?>"
          },
          success:function(data) {
            $('#myUploadProfilePicModel').modal('hide');
            $('#uploadedProfilePic').val(data);
          }
        });
      })
    });
    $('#uploadProfilePicBtn').on('click', function(event){
	    if ($('#uploadedProfilePic').val()){
	      $.post("includes/change_profile_pic.php", {
	        username : '<?php echo $user->getUsername(); ?>',
	        uploadedProfilePic : $('#uploadedProfilePic').val()}
	        , function(data) {
	          $('#uploadProfilePic').val('');
	          $('#uploadedProfilePic').val('');
	      })
	    }
	  });

	 $image_crop = $('#uploadedCoverPicDemo').croppie({
      enableExif: true,
      viewport: {
        width:200,
        height:100,
        type:'square'
      },
      boundary:{
        width:400,
        height:150
      }
    });
    $('#uploadCoverPic').on('change', function(){
      var fileExtension = ['jpeg', 'jpg', 'png'];
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
        $('#myUploadCoverPicModel').modal('show');
      }
    });
    $('#cropCoverPic').click(function(event){
      $image_crop.croppie('result', {
        type: 'canvas',
        size: 'viewport'
      }).then(function(response){
        $.ajax({
          url:"upload.php",
          type: "POST",
          data:{
            image: response,
            targetDir : "assets/images/cover_pics/",
            username : "<?php echo $user->getUsername(); ?>"
          },
          success:function(data) {
            $('#myUploadCoverPicModel').modal('hide');
            $('#uploadedCoverPic').val(data);
          }
        });
      })
    });
    $('#uploadCoverPicBtn').on('click', function(event){
	    if ($('#uploadedCoverPic').val()){
	      $.post("includes/change_cover_pic.php", {
	        username : '<?php echo $user->getUsername(); ?>',
	        uploadedCoverPic : $('#uploadedCoverPic').val()}
	        , function(data) {
	          $('#uploadCoverPic').val('');
	          $('#uploadedCoverPic').val('');
	      })
	    }
	  });
  });

	// change password actions
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
	$('#saveChangedPassword').click(function(){
		var username = '<?php echo $user->getUsername(); ?>';
		var previouspassword = $('#previouspassword').val();
		var password = $('#password').val();
		var newpassword = $('#newPassword').val();
		var confirmpassword = $('#confirmPassword').val();
    var hash = calcMD5(password);
		if (password==0 || newpassword==0 || confirmpassword==0){
			bootbox.alert("empty field");
			if(password==0){
				$('#password').addClass("border-danger");
			}
			if(newpassword==0){
				$('#newPassword').addClass("border-danger");
			}
			if(confirmpassword==0){
				$('#confirmPassword').addClass("border-danger");
			}
		} else if(hash != previouspassword){
			bootbox.alert('Wrong Password');
			if($('#password').hasClass('border-success')){
				$('#password').removeClass('border-success');
			}
			$('#password').addClass('border-danger');
			$('#password').val('');
		} else if ($('#confirmPassword').val() != $('#newPassword').val()) {
			bootbox.alert("Password Mismatch!");
		} else if((password.length >= 8 && password.length <=15) && (newpassword.length >= 8 && newpassword.length <=15)){
			$.post("includes/change_password.php",{
			username : username,
			password : password,
			newpassword : newpassword
			},function(data){
				$('#previouspassword').val(data);
				$('#password').val('');
				$('#newPassword').val('');
				$('#confirmPassword').val('');
				$('#password').removeClass("border-success");
				$('#newPassword').removeClass("border-success");
				$('#confirmPassword').removeClass("border-success");
				bootbox.alert("Password changed successfully...");
			});
		} else {
			bootbox.alert("Password must be more than equal to 8 and less than equal to 15 Characters");
		}
	});


	// delete account action
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