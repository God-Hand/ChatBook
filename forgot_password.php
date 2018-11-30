<?php
	require 'config/config.php';
  require 'includes/classes/Register.php';
  require 'includes/classes/User.php';
  
  $register = new Register($conn);
  if(isset($_REQUEST['email']) and isset($_REQUEST['token']) and $register->validateToken($_REQUEST['email'],$_REQUEST['token'])){
  	$_SESSION['email'] = $_REQUEST['email'];
  }else if(isset($_POST['new_password']) and isset($_POST['change_password'])){
  	if($register->changePassword($_SESSION['email'], $_POST['new_password'])){
  		echo "<script>password changed</script>";
  	}else{
  		echo "<script>password not changed</script>";
  	}
  }else{
  	header("location: index.php");
  }
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>ChatBook - Change Password</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/css/registration.css" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.min.js"></script>
</head>
<body>
	<div class="container" style="max-width: 300px;">
		<div class="row">
			<form action="forgot_password.php" method="post">
				<div class="col-md-12">
	        <h4>Change Password</h4>
	        <hr>
	        <div class="form-group row">
	          <label for="newPassword" class="col-4 col-form-label">New Password</label> 
	          <div class="col-8">
	            <input id="newPassword" name="new_password" minlength="8" maxlength="15" placeholder="New Password" class="form-control here border"  onkeyup="checkPassword(this)" type="password" required>
	          </div>
	        </div>
	        <div class="form-group row">
	          <label for="confirmPassword" class="col-4 col-form-label">Confirm Password</label> 
	          <div class="col-8">
	            <input id="confirmPassword" name="confirm_password" minlength="8" maxlength="15" placeholder="Confirm Password" class="form-control here border" onkeyup="matchPasswords(this)" type="password" required>
	          </div>
	        </div>
	        <div class="form-group row">
	          <div class="offset-4 col-8">
	            <input id="saveChangedPasswordBtn" type="submit" name="change_password" class="btn btn-primary" value="Change Password">
	          </div>
	        </div>
	      </div>
			</form>
    </div>		
	</div>
</body>
</html>

<script>
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
		if ($('#confirmPassword').val() != $('#newPassword').val()) {
			bootbox.alert("Password Mismatch!");
		}
	});
</script>