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
        <?php include("profile_card.php"); ?>
      </div>
			<div class="col-md-8">
				<div class="card-body">
          <div class="tab-content" id="nav-tabContent">
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
        </div>
			</div>
		</div>
		<br/>
	</div>
</body>
</html>