<?php
	include('config/config.php');
	include('form_handlers/registration_handler.php');
	if (isset($_SESSION['user_logged_in'])){
		header("Location: index.php");
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
  <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
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
										<input type="email" name="login_email" id="email" tabindex="1" class="form-control" placeholder="Email Address" value="<?php 
											if(isset($_SESSION['login_email'])) {
												echo $_SESSION['login_email'];
											}
										?>" required>
									</div>

									<div class="form-group">
										<input type="password" name="login_password" id="password" tabindex="2" class="form-control" placeholder="Password" required>
										<?php
											if(in_array("Email or password was incorrect", $error_array)){
												echo "<span class='label label-danger'>Email or password was incorrect</span>";
											}
										?>
									</div>

									<div class="form-group text-center">
										<input type="checkbox" tabindex="3" class="" name="remember" id="remember">
										<label for="remember"> Remember Me</label>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="login_button" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Log In">
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-lg-12">
												<div class="text-center">
													<a href="recover.php" tabindex="5" class="forgot-password">Forgot Password?</a>
												</div>
											</div>
										</div>
									</div>
								</form>
								<form id="register-form" action="registration.php" method="post" role="form" style="display: none;">

									<div class="form-group">
										<input type="text" name="first_name" id="first_name" tabindex="1" class="form-control" placeholder="First Name" value="<?php 
											if(isset($_SESSION['first_name'])) {
												echo $_SESSION['first_name'];
											}
										?>" required>
										<?php
											if(in_array("Your first name must be between 2 and 20 characters", $error_array)){
												echo "<span class='label label-danger'>Your first name must be between 2 and 20 characters</span>";
											}
										?>
									</div>

									<div class="form-group">
										<input type="text" name="last_name" id="last_name" tabindex="2" class="form-control" placeholder="Last Name" value="<?php 
											if(isset($_SESSION['last_name'])) {
												echo $_SESSION['last_name'];
											}
										?>" required>
										<?php
											if(in_array("Your last name must be between 2 and 20 characters", $error_array)){
												echo "<span class='label label-danger'>Your last name must be between 2 and 20 characters</span>";
											}
										?>
									</div>

									<div class="form-group">
										<input type="email" name="reg_email" id="email" tabindex="1" class="form-control" placeholder="Email Address" value="<?php 
											if(isset($_SESSION['reg_email'])) {
												echo $_SESSION['reg_email'];
											}
										?>" required>
										<?php
											if(in_array("Email already in use", $error_array)){
												echo "<span class='label label-danger'>Email already in use</span>";
											} elseif (in_array("Invalid Email format", $error_array)) {
												echo "<span class='label label-danger'>Invalid Email format</span>";
											}
										?>
									</div>

									<div class="form-group">
										<input type="password" name="reg_password" id="password" tabindex="2" class="form-control" placeholder="Password" required>
										<?php
											if(in_array("Only allow [A-Za-z0-9_@]", $error_array)){
												echo "<span class='label label-danger'>Only allow [A-Za-z0-9_@]</span>";
											} elseif (in_array("Your password must be betwen 8 to 15 characters", $error_array)) {
												echo "<span class='label label-danger'>Your password must be betwen 8 to 15 characters</span>";
											}
										?>
									</div>

									<div class="form-group">
										<input type="password" name="reg_confirm_password" id="confirm-password" tabindex="2" class="form-control" placeholder="Confirm Password" required>
										<?php
											if(in_array("Your passwords do not match", $error_array)){
												echo "<span class='label label-danger'>Your passwords do not match</span>";
											}
										?>
									</div>

									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="reg_button" id="register-submit" tabindex="4" class="form-control btn btn-register" value="Register Now">
											</div>
										</div>
										<span class="label label-success"></span>
									</div>
								</form>
							</div>
						</div>
					</div>
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
	</script>

</body>
</html>
