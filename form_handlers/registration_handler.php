<?php
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
		$password = strip_tags($_POST['reg_password']);
		$confirm_password = strip_tags($_POST['reg_confirm_password']);

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
		if (strlen($first_name) > 20 || strlen($first_name) < 2) {
			array_push($error_array, "Your first name must be between 2 and 20 characters");
		}
		if (strlen($last_name) > 20 || strlen($last_name) < 2) {
			array_push($error_array, "Your last name must be between 2 and 20 characters");
		}
		if ($password != $confirm_password) {
			array_push($error_array, "Your passwords do not match");
		}
		if (strlen($password) > 15 || strlen($password) < 8) {
			array_push($error_array, "Your password must be betwen 8 to 15 characters");
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
		} else {
			array_push($error_array, "Email or password was incorrect");
		}
	}
?>