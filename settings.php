<!DOCTYPE html>
<html>
<head>
	<title>Chatbook - settings</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
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
                          <input id="firstName" name="firstName" maxlength="25" placeholder="First Name" onkeyup="isValid(this)" class="form-control here" type="text">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="lastName" class="col-4 col-form-label">Last Name</label> 
                        <div class="col-8">
                          <input id="lastName" name="lastName" maxlength="25" placeholder="Last Name" onkeyup="isValid(this)" class="form-control here" type="text">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="email" class="col-4 col-form-label">Email</label> 
                        <div class="col-8">
                          <input id="email" name="email" maxlength="100" placeholder="Email" class="form-control here border" type="email">
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
                          <button id="saveAccountInfoBtn" type="submit" class="btn btn-primary">Save</button>
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
                        <label for="phoneNumber" class="col-4 col-form-label">Phone No</label> 
                        <div class="col-8">
                          <input id="phoneNumber" name="phoneNumber" maxlength="10" placeholder="Phone No." onkeyup="validateMobileNumber(this)" class="form-control here border" type="text">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="birthDay" class="col-4 col-form-label">BirthDay</label> 
                        <div class="col-8">
                          <input id="birthDay" name="birthDay" placeholder="mm/dd/yyyy" class="form-control here" type="text">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="gender" class="col-4 col-form-label">Gender</label> 
                        <div class="col-8">
                          <div class="radio">
													  <label><input type="radio" name="gender" value="male">Male</label>
													</div>
													<div class="radio">
													  <label><input type="radio" name="gender" value="female">Female</label>
													</div>
													<div class="radio">
													  <label><input type="radio" name="gender" value="other">Other</label>
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
                        <label for="state" class="col-4 col-form-label">State</label> 
                        <div class="col-8">
                          <input id="state" name="state" maxlength="100" placeholder="State" class="form-control here" type="text">
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
                          <button id="savePersonalInfoBtn" type="button" class="btn btn-primary">Save</button>
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
                          <button id="saveChangedPasswordBtn" type="submit" class="btn btn-primary">Save</button>
                        </div>
                      </div>
		                </div>
			            </div>
							  </div>

							  <div class="tab-pane fade" id="deleteAccount" role="tabpanel" aria-labelledby="nav-contact-tab">
							  	<div class="text-danger">Do yo want to delete your account?</div>
					        <div class="form-group row float-right" style="margin-right: 10px;">
								    <button class="btn btn-danger" id='yesDeleteAccountBtn'>Delete Account</button>
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
  <?php include("footer.php"); ?>
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
	// edit account info
	function validateEmail(email) {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	  return re.test(String(email).toLowerCase());
	}
	$('#saveAccountInfoBtn').click(function(){
		var firstname = $('#firstName').val();
		var lastname = $('#lastName').val();
		var email = $('#email').val();
		var bio = $('#bio').val();
		if(validateEmail(email) || email.length==0){
			if($('#email').hasClass('border-danger')){
				$('#email').removeClass('border-danger');
			}
			$.post("includes/change_account_info.php",{ firstname : firstname, lastname : lastname, email : email, bio : bio },function(data){
				if(data=='no'){
					bootbox.alert('This email_id belongs to another account.');
					$('#email').addClass('border-danger');
				} else {
					$('#firstName').val('');
					$('#lastName').val('');
					$('#email').val('');
					$('#bio').val('');
				}
			});
		} else {
			$('#email').addClass('border-danger');
			bootbox.alert("Invalid Email format.");
		}
	});

	// edit personal info
	function isValid(obj){ 
    obj.value = obj.value.replace(/[^a-zA-Z0-9@_-]+/g, "");
	}
  $('#birthDay').datepicker({ uiLibrary: 'bootstrap4', useCurrent: false });
  function validateMobileNumber(phoneno){
    if(phoneno.value.match(/^\d{10}$/)){
      $('#phoneNumber').removeClass('border-danger');
      $('#phoneNumber').addClass('border-success');
    } else {
      $('#phoneNumber').addClass('border-danger');
    }
  }
  $('#savePersonalInfoBtn').click(function(){
    var birthday = $('#birthDay').val();
    var phoneno = $('#phoneNumber').val();
    var gender = $('input[name=gender]:checked').val();
    var city = $('#city').val();
    var state = $('#state').val();
    var country = $('#country').val();
    var school = $('#school').val();
    var college = $('#college').val();
    if (phoneno.length != 0 && !(phoneno.match(/^\d{10}$/))) {
      bootbox.alert('Invalid Number');
    } else if(birthday.length !=0 && !birthday.match(/^(?:(0[1-9]|1[012])[\/.](0[1-9]|[12][0-9]|3[01])[\/.](19|20)[0-9]{2})$/)) {
      bootbox.alert('Invalid date');
    } else {
      $.post("includes/change_personal_info.php", { birthday : birthday, phoneno : phoneno, gender : gender,
        city : city, state : state, country : country, school : school, college : college }, function(data) {
          $('#phoneNumber').val('');
          $('#phoneNumber').removeClass('border-success');
          $('input[name=gender]:checked').prop("checked", false);
          $('#city').val('');
          $('#state').val('');
          $('#country').val('');
          $('#school').val('');
          $('#college').val('');
          if(data=='Invalid'){
            bootbox.alert('Invalid date');
          } else {
            $('#birthDay').val("");
          }
      });
    }
  });

	// upload images
  $(document).ready(function(){
   $proileimagecrop = $('#uploadedProfilePicDemo').croppie({
      enableExif: true,
      viewport: { width:200, height:200, type:'square' },
      boundary:{ width:300, height:300 }
    });
    $('#uploadProfilePic').on('change', function(){
      var fileExtension = ['jpeg', 'jpg', 'png'];
      if ($.inArray($(this).val().split('.').pop().toLowerCase(), fileExtension) == -1) {
        alert("Only formats are allowed : "+fileExtension.join(', '));
      } else {
        var reader = new FileReader();
        reader.onload = function (event) {
          $proileimagecrop.croppie('bind', {
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
      $proileimagecrop.croppie('result', {
        type: 'canvas',
        size: 'original'
      }).then(function(response){
        $.post("upload.php", {image:response, targetDir : "assets/images/profile_pics/"}, function(data){
          $('#myUploadProfilePicModel').modal('hide');
          $('#uploadedProfilePic').val(data);
        })
      })
    });
    $('#uploadProfilePicBtn').on('click', function(event){
	    if ($('#uploadedProfilePic').val()){
	      $.post("includes/change_profile_pic.php", { uploadedProfilePic : $('#uploadedProfilePic').val()}, function(data) {
	          $('#uploadProfilePic').val('');
	          $('#uploadedProfilePic').val('');
	      });
	    }
	  });

	 $coverimagecrop = $('#uploadedCoverPicDemo').croppie({
      enableExif: true,
      viewport: { width:200, height:100, type:'square' },
      boundary:{ width:300, height:150 }
    });
    $('#uploadCoverPic').on('change', function(){
      var fileExtension = ['jpeg', 'jpg', 'png'];
      if ($.inArray($(this).val().split('.').pop().toLowerCase(), fileExtension) == -1) {
        alert("Only formats are allowed : "+fileExtension.join(', '));
      } else {
        var reader = new FileReader();
        reader.onload = function (event) {
          $coverimagecrop.croppie('bind', {
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
      $coverimagecrop.croppie('result', { type: 'canvas', size: 'original' }).then(function(response){
        $.post("upload.php", {image : response, targetDir : "assets/images/cover_pics/"}, function(data){
          $('#myUploadCoverPicModel').modal('hide');
          $('#uploadedCoverPic').val(data);
        });
      })
    });
    $('#uploadCoverPicBtn').on('click', function(event){
	    if ($('#uploadedCoverPic').val()){
	      $.post("includes/change_cover_pic.php", { uploadedCoverPic : $('#uploadedCoverPic').val() }, function(data) {
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
	$('#saveChangedPasswordBtn').click(function(){
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
			$.post("includes/change_password.php",{ password : password, newpassword : newpassword },function(data){
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
			bootbox.alert("Password must be in between 8 to 15 Characters");
		}
	});


	// delete account action
	$('#yesDeleteAccountBtn').click(function(){
		bootbox.confirm({
	  	message: "Are you sure?",
	    buttons: {
	      confirm: { label: 'Yes', className: 'btn-danger' },
		    cancel: { label: 'No', className: 'btn-secondary' }
		  },
		  callback: function (result) {
	      if(result){
          $.post("includes/delete_account.php", {}, function(data){
            window.location.href = "sign_out.php?";
          });
	      }
	    }
		});
	})
</script>