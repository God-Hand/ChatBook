<?php
	/**
	class Register{
		private $conn;
		private $username;
		__construct($conn) : create variable
		getUsername() : return username after successfully logined
		trimTags($input) : remove spacing and tages
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
			$query = mysqli_query($this->conn, "SELECT email FROM users WHERE email='$email' and deactivate_account=0");
			if (mysqli_num_rows($query) == 1) { return true; } else { return false; }
		}

		public function getRegister($first_name, $last_name, $email, $password) {
			$first_name = mysqli_real_escape_string($this->conn , $first_name);
			$last_name = mysqli_real_escape_string($this->conn, $last_name);
			$password = md5($password);
			$username = strtolower($first_name . "_" . $last_name);
			$username = $username . round(microtime(true));
			$profile_pic = "assets/images/profile_pics/defaults/profile_pic.png";
			$cover_pic = "assets/images/cover_pics/defaults/cover_pic.jpg";
			$query = mysqli_query($this->conn, "INSERT INTO users (first_name, last_name, username, email, password, signup_date, profile_pic, cover_pic, friend_array) VALUES ('$first_name', '$last_name', '$username', '$email', '$password', DEFAULT,'$profile_pic', '$cover_pic',',')");
			if ($query) {
				$this->username = $username;
				//Clear session variables
				$_SESSION['first_name'] = "";
				$_SESSION['last_name'] = "";
				$_SESSION['reg_email'] = "";
				return true;
			} else { return false; }
		}

		public function getLogin($email, $password) {
			$email = filter_var($email, FILTER_SANITIZE_EMAIL);
			$password = md5($password);
			$query = mysqli_query($this->conn, "SELECT * FROM users WHERE email='$email' AND password='$password' AND deactivate_account=0");
			if (mysqli_num_rows($query) == 1) {
				$row = mysqli_fetch_array($query);
				$this->username = $row['username'];
				return true;
			} else { return false; }
		}
	}
?>