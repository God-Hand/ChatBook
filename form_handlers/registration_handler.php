<?php
	// declaring variable to hold data
	$first_name = "";
	$last_name = "";
	$email = "";
	$password = "";;
	$confirm_password = "";
	$remember = "";
	$error_array = array();
	
	if (isset($_POST['reg_button'])){

		$first_name = strip_tags($_POST['first_name']);
		$first_name = str_replace(' ', '', $first_name);
		$_SESSION['first_name'] = $first_name;

		$last_name = strip_tags($_POST['last_name']);
		$last_name = str_replace(' ', '', $last_name);
		$_SESSION['last_name'] = $last_name;

		$email = strip_tags($_POST['reg_email']);
		$email = str_replace(' ', '', $email);
		$_SESSION['reg_email'] = $email;

		$password = strip_tags($_POST['reg_password']);
		$confirm_password = strip_tags($_POST['reg_confirm_password']);

		if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$email = filter_var($email, FILTER_VALIDATE_EMAIL);
			$email_check = mysqli_query($conn, "SELECT email FROM users WHERE email='$email' and deactivate_account=0");
			if (mysqli_num_rows($email_check) == 1) {
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

		if (empty($error_array)) {
			$password = md5($password);
			$username = strtolower($first_name . "_" . $last_name);
			$username = $username . round(microtime(true));
			$profile_pic = "assets/images/profile_pics/defaults/profile_pic.png";

			$query = mysqli_query($conn, "INSERT INTO users (first_name, last_name, username, email, password, signup_date, profile_pic, deactivate_account, friend_array, is_online) VALUES ('$first_name', '$last_name', '$username', '$email', '$password', DEFAULT,'$profile_pic', DEFAULT, ',', DEFAULT)");
			array_push($error_array, "You're all set! Go ahead and login!");

			//Clear session variables
			$_SESSION['first_name'] = "";
			$_SESSION['last_name'] = "";
			$_SESSION['reg_email'] = "";
		}
	}
	if (isset($_POST['login_button'])) {
		$email = filter_var($_POST['login_email'], FILTER_SANITIZE_EMAIL);
		$password = md5($_POST['login_password']);
		$query = mysqli_query($conn, "SELECT * FROM users WHERE email='$email' AND password='$password' AND deactivate_account=0");
		if (mysqli_num_rows($query) == 1) {
			$row = mysqli_fetch_array($query);
			$username = $row['username'];
			$_SESSION['user_logged_in'] = $username;
		} else {
			array_push($error_array, "Email or password was incorrect");
		}
	}
?>