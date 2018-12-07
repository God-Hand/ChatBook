<?php
	use PHPMailer\PHPMailer\PHPMailer;
	require 'vendor/autoload.php';

	/**
	class Register{
		private $conn;
		private $username;
		__construct($conn) : create variable
		getUsername() : return username after successfully logined
		trimTags($input) : remove spacing AND tages
		checkEmailExists($email) : return true if email already exits for a active account
		getRegister($first_name, $last_name, $email, $password) : return true if user successfully registered
		getLogin($email, $password) : return true if user successfully logined
	}
	*/
	class Register{
		
		private $conn;
		private $username;
		
		function __construct($conn){
			$this->conn = $conn;
		}

		public function getUsername() {
			if (isset($this->username)) { return $this->username; } else { return false; }
		}

		public function trimTags($input) {
			$input = strip_tags($input);
			return str_replace(' ', '', $input);
		}

		public function checkEmailExists($email) {
			$query = mysqli_query($this->conn, "SELECT email FROM users WHERE email='$email' AND deactivate_account=0 AND verification_token IS NULL");
			if (mysqli_num_rows($query) == 1) { return true; } else { return false; }
		}

		private function createToken($length = 8) {
			$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
			$charactersLength = strlen($characters);
			$rANDomString = '';
			for ($i = 0; $i < $length; $i++) {
				$rANDomString .= $characters[rAND(0, $charactersLength - 1)];
			}
			return $rANDomString;
		}

		public function getRegister($first_name, $last_name, $email, $password) {
			$first_name = mysqli_real_escape_string($this->conn , $first_name);
			$last_name = mysqli_real_escape_string($this->conn, $last_name);
			$password = md5($password);
			$username = strtolower($first_name . "_" . $last_name);
			$username = $username . round(microtime(true));
			$verification_token = $this->createToken();
			$profile_pic = "assets/images/profile_pics/defaults/profile_pic.png";
			$cover_pic = "assets/images/cover_pics/defaults/cover_pic.jpg";
			$query = mysqli_query($this->conn, "INSERT INTO users (first_name, last_name, username, email, password, verification_token, signup_date, profile_pic, cover_pic, friend_array) VALUES ('$first_name', '$last_name', '$username', '$email', '$password', '$verification_token', DEFAULT,'$profile_pic', '$cover_pic',',')");
			if ($query) {
				$this->username = $username;
				//Clear session variables
				$_SESSION['first_name'] = "";
				$_SESSION['last_name'] = "";
				$_SESSION['reg_email'] = "";
				$this->sendAccountVerificationMail($email,$verification_token);
				return true;
			} else { return false; }
		}

		public function sendAccountVerificationMail($email, $token){
			$mail = new PHPMailer;
			$mail->isSMTP();
			$mail->SMTPDebug = 0;
			$mail->Host = 'smtp.gmail.com';
			$mail->Port = 587;
			$mail->SMTPSecure = 'tls';
			$mail->SMTPAuth = true;
			$mail->Username = "jitendra.sharma_cs16@gla.ac.in";
			$mail->Password = "9412278505";
			$mail->setFrom('jitendra.sharma_cs16@gla.ac.in', 'Chatbook');
			$mail->addAddress($email, $this->username);
			$mail->Subject = "ChatBook Account Verification";
			$mail->Body = "<body bgcolor='#f9f9f9'>
											<h4 style='margin:0px;margin-bottom:10px;'>Confirm your account</h4>
											<p style='margin:0px;'>click the link below to confirm your account</p>
											<a href='" . $_SERVER['HTTP_HOST'] . "/account_verification.php?email=" . $email . "&token=" . $token . "' target='_blank' style='text-decoration:none;'>" . $_SERVER['HTTP_HOST'] . "/account_verification.php?email=" . $email . "&token=" . $token . "</a>
										</body>";
			$mail->isHTML(true);
			if (!$mail->send()) {
			  echo "Mailer Error: " . $mail->ErrorInfo;
			}
		}

		public function sendForgottenPasswordMailTo($email){
			if($this->checkEmailExists($email)){
				$token = $this->createToken();
				$query = mysqli_query($this->conn, "UPDATE users SET forgot_token='$token' WHERE email='$email'");
				$this->sendPasswordForgottenMail($email, $token);
				return true;
			}
			return false;
		}

		public function sendPasswordForgottenMail($email, $token){
			$mail = new PHPMailer;
			$mail->isSMTP();
			$mail->SMTPDebug = 0;
			$mail->Host = 'smtp.gmail.com';
			$mail->Port = 587;
			$mail->SMTPSecure = 'tls';
			$mail->SMTPAuth = true;
			$mail->Username = "jitendra.sharma_cs16@gla.ac.in";
			$mail->Password = "9412278505";
			$mail->setFrom('jitendra.sharma_cs16@gla.ac.in', 'Chatbook');
			$mail->addAddress($email);
			$mail->Subject = "Reset your ChatBook Account Password";
			$mail->Body = "<body bgcolor='#f9f9f9'>
											<h4 style='margin:0px;margin-bottom:10px;'>Reset Password</h4>
											<p style='margin:0px;'>click the link below to reset your password</p>
											<a href='" . $_SERVER['HTTP_HOST'] . "/forgot_password.php?email=" . $email . "&token=" . $token . "' target='_blank' style='text-decoration:none;'>" . $_SERVER['HTTP_HOST'] . "/forgot_password.php?email=" . $email . "&token=" . $token . "</a>
										</body>";
			$mail->isHTML(true);
			if (!$mail->send()) {
			  echo "Mailer Error: " . $mail->ErrorInfo;
			}
		}

		public function verifyAccount($email, $token){
			$query = mysqli_query($this->conn, "SELECT username FROM users WHERE email='$email' AND deactivate_account=0 AND verification_token='$token'");
			if(mysqli_num_rows($query)==1){
				$row = mysqli_fetch_array($query);
				$username = $row['username'];
				$query = mysqli_query($this->conn, "UPDATE users SET deactivate_account=1 AND username<>'$username' WHERE email='$email'");
				$query = mysqli_query($this->conn, "UPDATE users SET verification_token=NULL WHERE email='$email'");
				$_SESSION['username'] = $row['username'];
				return true;
			} else {
				return false;
			}
		}

		public function getLogin($email, $password) {
			$email = filter_var($email, FILTER_SANITIZE_EMAIL);
			$password = md5($password);
			$query = mysqli_query($this->conn, "SELECT * FROM users WHERE email='$email' AND password='$password' AND deactivate_account=0 AND verification_token IS NULL");
			if (mysqli_num_rows($query) == 1) {
				$row = mysqli_fetch_array($query);
				$this->username = $row['username'];
				return true;
			} else { return false; }
		}
	}
?>