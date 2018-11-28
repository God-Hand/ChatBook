<?php
	require 'config/config.php';
  require 'includes/classes/Register.php';
  require 'includes/classes/User.php';
  
	// declaring variable to hold data
	$register = new Register($conn);
	$first_name = "";
	$last_name = "";
	$email = "";
	$password = "";;
	$confirm_password = "";
	$remember = "";
	$error_array = array();

	if (isset($_POST['reg_button'])){

		$first_name = $register->trimTags($_POST['first_name']);
		$last_name = $register->trimTags($_POST['last_name']);
		$email = $register->trimTags($_POST['reg_email']);
		$password = $_POST['reg_password'];
		$confirm_password = $_POST['reg_confirm_password'];

		$_SESSION['first_name'] = $first_name;
		$_SESSION['last_name'] = $last_name;
		$_SESSION['reg_email'] = $email;
		$_POST['reg_password'] = '';
		$_POST['reg_cofirm_password'] = '';

		if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$email = filter_var($email, FILTER_VALIDATE_EMAIL);
			if ($register->checkEmailExists($email)) {
				array_push($error_array, "Email already in use");
			}
		} else {
			array_push($error_array, "Invalid Email format");
		}
		if (strlen($first_name) > 25 || strlen($first_name) < 2) {
			array_push($error_array, "first name must be between 2 and 25 characters");
		}
		if (strlen($last_name) > 25 || strlen($last_name) < 2) {
			array_push($error_array, "last name must be between 2 and 25 characters");
		}
		if ($password != $confirm_password) {
			array_push($error_array, "passwords do not match");
		}
		if (strlen($password) > 15 || strlen($password) < 8) {
			array_push($error_array, "password must be betwen 8 to 15 characters");
		} elseif (preg_match('/[^A-Za-z0-9_@]/', $password)) {
			array_push($error_array, "Only allow [A-Za-z0-9_@]");
		}
		if (empty($error_array) and $register->getRegister($first_name, $last_name, $email, $password)) {
			array_push($error_array, "You're all set! Go ahead and login!");
		}
	}
	if (isset($_POST['login_button'])) {
		if ($register->getLogin($_POST['login_email'], $_POST['login_password'])){
			$_SESSION['username'] = $register->getUsername();
			$_SESSION['page'] = 0;
		} else {
			array_push($error_array, "Email or password was incorrect");
		}
	}
	if (isset($_SESSION['username'])){
		header("Location: index.php");
	}

	#forgot password send mail
	if(isset($_POST['user_email']) and isset($_POST['sendMail'])){
		// code for check server side validation
		if(strcasecmp($_SESSION['captcha_code'], $_POST['captcha_code']) == 0){
			$register->sendForgottenPasswordMailTo($_POST['user_email']);  
		}
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>ChatBook - Registration</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/css/registration.css" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.min.js"></script>
</head>
<body>
	<div class="container">
  	<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<div class="panel panel-login">
					<div class="panel-heading">
						<div class="row">
							<div class="col-xs-6">
								<a href="#" class="active" id="login-form-link">Login</a>
							</div>
							<div class="col-xs-6">
								<a href="#" id="register-form-link">Register</a>
							</div>
						</div>
						<hr>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">
								<form id="login-form" action="registration.php" method="post" role="form" style="display: block;">

									<div class="form-group">
										<input type="email" name="login_email" tabindex="1" class="form-control" placeholder="Email Address" data-toggle="tooltip" data-placement="top" title="Login Email" value="<?php 
											if(isset($_SESSION['login_email'])) {
												echo $_SESSION['login_email'];
											}
										?>" required>
									</div>
									<div class="form-group">
										<input type="password" name="login_password" tabindex="2"  minlength="8" maxlength="15" class="form-control" data-toggle="tooltip" data-placement="top" title="Login Password" placeholder="Password" required>
										<?php
											if(in_array("Email or password was incorrect", $error_array)){
												echo "<span class='text-danger pl-1 pt-0'>Email or password was incorrect</span>";
											}
										?>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="login_button" id="login-submit" tabindex="3" class="form-control btn btn-login" value="Log In">
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-lg-12">
												<div class="text-center">
													<button type="button" class="btn btn-dark btn-xs" data-toggle="modal" data-target="#emailModel">Forgot Password</button>
												</div>
											</div>
										</div>
									</div>
								</form>
								<form id="register-form" action="registration.php" method="post" role="form" style="display: none;">

									<div class="form-group">
										<input type="text" name="first_name" tabindex="1" maxlength="25" class="form-control" placeholder="First Name" data-toggle="tooltip" data-placement="top" title="name length must be (>=2 and <=25)" value="<?php 
											if(isset($_SESSION['first_name'])) {
												echo $_SESSION['first_name'];
											}
										?>" required>
										<?php
											if(in_array("first name must be between 2 and 25 characters", $error_array)){
												echo "<span class='text-danger pl-1 pt-0'>first name must be between 2 and 25 characters</span>";
											}
										?>
									</div>

									<div class="form-group">
										<input type="text" name="last_name" tabindex="2" maxlength="25" class="form-control" placeholder="Last Name" data-toggle="tooltip" data-placement="top" title="name length must be (>=2 and <=25)" value="<?php 
											if(isset($_SESSION['last_name'])) {
												echo $_SESSION['last_name'];
											}
										?>" required>
										<?php
											if(in_array("last name must be between 2 and 25 characters", $error_array)){
												echo "<span class='text-danger pl-1 pt-0'>last name must be between 2 and 25 characters</span>";
											}
										?>
									</div>

									<div class="form-group">
										<input type="email" name="reg_email" tabindex="3" class="form-control" placeholder="Email Address" data-toggle="tooltip" data-placement="top" title="Email id" value="<?php
											if(isset($_SESSION['reg_email'])) {
												echo $_SESSION['reg_email'];
											}
										?>" required>
										<?php
											if(in_array("Email already in use", $error_array)){
												echo "<span class='text-danger pl-1 pt-0'>Email already in use</span>";
											} elseif (in_array("Invalid Email format", $error_array)) {
												echo "<span class='text-danger pl-1 pt-0'>Invalid Email format</span>";
											}
										?>
									</div>

									<div class="form-group">
										<input type="password" name="reg_password" tabindex="4"  minlength="8" maxlength="15" class="form-control" placeholder="Password" data-toggle="tooltip" data-placement="top" title="Password length must be (>=2 and <=25) characters" required>
										<?php
											if(in_array("Only allow [A-Za-z0-9_@]", $error_array)){
												echo "<span class='text-danger pl-1 pt-0'>Only allow [A-Za-z0-9_@]</span>";
											} elseif (in_array("password must be betwen 8 to 15 characters", $error_array)) {
												echo "<span class='text-danger pl-1 pt-0'>password must be betwen 8 to 15 characters</span>";
											}
										?>
									</div>

									<div class="form-group">
										<input type="password" name="reg_confirm_password" tabindex="5"  minlength="8" maxlength="15" class="form-control" placeholder="Confirm Password" data-toggle="tooltip" data-placement="top" title="Password length must be (>=2 and <=25) characters" required>
										<?php
											if(in_array("passwords do not match", $error_array)){
												echo "<span class='text-danger pl-1 pt-0'>passwords do not match</span>";
											}
										?>
									</div>

									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="reg_button" id="register-submit" tabindex="6" class="form-control btn btn-register" value="Register Now">
												<?php
													if(in_array("You're all set! Go ahead and login!", $error_array)){
														echo "<span class='text-success pl-1 pt-0'>You're all set! Go ahead and login!</span>";
													}
												?>
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>

<!--- email and captcha model --->
<div id="emailModel" z-index="-2" class="modal" role="dialog">
 <div class="modal-dialog modal-dialog-centered" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h4 class="modal-title">Enter your Email<button type="button" class="close" data-dismiss="modal" style="float: right;">&times;</button></h4>
    </div>
    <form id="sendMailForm" action="registration.php" method="post" role="form">
    <div class="modal-body">
      <div class="text-center">
      	<div class="container-fluid">
      		<div class="row">
    				<div class="col-sm-4" style="float:left;"><label class="form-control" style="border:none;">Email</label></div>
        		<div class="col-sm-8">
        			<input id="userEmail" class="form-control" type="email" name="user_email" style="width:100%;" placeholder="Enter your email" required>
        		</div>
	        </div>
	        <div class="row">
		        <div class="col-sm-4">
		        	<label for='message'>Enter the Captcha:</label>
		        </div>
		        <div class="col-sm-8">
		        	<img src="phpcaptcha/captcha.php?rand=<?php echo rand();?>" id='captchaimg' style="float:left;padding:10px 0px;"></br>
		        	<input id="captchaCode" class="form-control" name="captcha_code" type="text" required></br>
		        	Can't read the image? click <a href='javascript: refreshCaptcha();'>here</a> to refresh.
		        </div>
	        </div>
      	</div>
      </div>
    </div>
    <div class="modal-footer">
      <input type="submit" class="btn btn-success" value="Send Mail" name="sendMail">
      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
     </form>
    </div>
   </div>
  </div>
</div>

<script type="text/javascript">
	$(function() {
		$('#login-form-link').click(function(e) {
		$("#login-form").delay(100).fadeIn(100);
		$("#register-form").fadeOut(100);
		$('#register-form-link').removeClass('active');
		$(this).addClass('active');
			e.preventDefault();
		});
		$('#register-form-link').click(function(e) {
		$("#register-form").delay(100).fadeIn(100);
		$("#login-form").fadeOut(100);
		$('#login-form-link').removeClass('active');
		$(this).addClass('active');
			e.preventDefault();
		});
	});
	$('#sendMailForm').submit(function(){
		if($('#captchaCode').val().length === 6){	
			$('#emailModel').modal('toggle');
			return true;
		}else{
			bootbox.alert({
		    message: "Invalid length Captcha",
		    size: 'small'
			});
			return false;
		}
	});
	function refreshCaptcha(){
		var img = document.images['captchaimg'];
		img.src = img.src.substring(0,img.src.lastIndexOf("?"))+"?rand="+Math.random()*1000;
	}
</script>