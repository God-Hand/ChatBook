<?php

	/**
	class User {
		private $conn;
		private $username;
		private $user_details;
		__construct($conn, $username) 							: query userdata and store in user_details
		getUsername() 															: return username of the user
		getFirstName() 															: return user first name
		getFirstAndLastName() 											: return user's "first_name last_name" text format
		getPassword() 															: return user bio
		getBio() 																		: return user bio
		getCoverPic() 															: return coverpic
		getProfilePic() 														: return profile_pic
		getEmail() 																	: return email
		getBirthday() 															: return birthday
		getPhoneNo() 																: return phone_no
		getGender() 																: return gender
		getCity() 																	: return city
		getState() 																	: return state
		getCountry() 																: return country
		getSchool() 																: return school
		getCollege() 																: return college
		getUserLessInfo() 													: return first_name, last_name and profile_pic
		getFriendArrayText() 												: return user's friend_array in text format
		getFriendArray() 														: return user's friend_array
		getNumOfFriends() 													: return number of friends
		isOnline() 																	: return weather user's is online or not
		isClosed() 																	: return weather user's account is closed or not
		isFriend($friend_username) 									: return weather given username is user's friend or not
		isUser($username) 													: return weather given username is a user or not
		addFriend($friend_username) 								: add friend to user's friend_array and vice-versa
		removeFriend($friend_username) 							: remove username of user from friend's friend_array and vice-versa
		getMutualFriendsCount($friend_username) 		: return numbers of mutual_friends
		searchUsers($input_name, $limit) 						: search user where first_name and last_name like
		setFirstName($first_name) 									: set user first name
		setLastName($last_name) 										: set user last name
		setBio($bio) 																: set user bio
		setPhoneNumber($phone_no) 									: set user phone_no number
		setBirthDay($birthday) 											: set user birthday
		setGender($gender) 													: set user gender
		setCity($city) 															: set user city
		setState($state) 														: set user state
		setCountry($country) 												: set user first name
		setSchool($school) 													: set user school
		setCollege($college) 												: set user college
		uploadCoverPic($filepath) 									: upload cover_pic of user
		uploadProfilePic($filepath) 								: upload profile_pic of user
		closeAccount() 															: eactivate_account of that user
		checkEmailIdExists($email)									: check email weather email already in use or not
		changeEmail($email) 												: change email
		changePassword($old_password, $new_password): change password
		getNumOfPosts() 														: return number of posts by the user
		}
	}
	*/

	class User {
		private $conn;
		private $username;
		private $user_details;
		function __construct($conn, $username){
			$this->conn = $conn;
			$this->username = $username;
			$query = mysqli_query($this->conn, "SELECT * FROM users WHERE username='$this->username'");
			$this->user_details = mysqli_fetch_array($query);
		}

		public function getUsername() { return $this->username; }
		public function getFirstName() { return $this->user_details['first_name']; }
		public function getFirstAndLastName() { return $this->user_details['first_name'] . " " . $this->user_details['last_name']; }
		public function getPassword() { return $this->user_details['password']; }
		public function getBio() { return $this->user_details['bio']; }
		public function getCoverPic() { return $this->user_details['cover_pic']; }
		public function getProfilePic() { return $this->user_details['profile_pic']; }
		public function getEmail(){ return $this->user_details['email']; }
		public function getBirthday(){ return $this->user_details['birthday']; }
		public function getPhoneNo(){ return $this->user_details['phone_no']; } 
		public function getGender(){ return $this->user_details['gender']; } 
		public function getCity(){ return $this->user_details['city']; } 
		public function getState(){ return $this->user_details['state']; } 
		public function getCountry(){ return $this->user_details['country']; } 
		public function getSchool(){ return $this->user_details['school']; } 
		public function getCollege(){ return $this->user_details['college']; }

		public function getUserLessInfo() {
			$query = mysqli_query($this->conn, "SELECT first_name, last_name, profile_pic, cover_pic FROM users WHERE username='$this->username'");
			return mysqli_fetch_array($query);
		}

		public function getFriendArrayText() {
			$query = mysqli_query($this->conn, "SELECT friend_array FROM users WHERE username='$this->username'");
			$row = mysqli_fetch_array($query);
			return $row['friend_array'];
		}

		public function getFriendArray() {
			$friend_array = explode(",", $this->getFriendArrayText());
			return $friend_array;
		}

		public function getNumOfFriends() { return count($this->getFriendArray())-2; }

		public function isClosed() {
			$query = mysqli_query($this->conn, "SELECT deactivate_account FROM users WHERE username='$this->username'");
			$row = mysqli_fetch_array($query);
			if($row['deactivate_account'] == 0){ return false; }
			else { return true; }
		}

		public function isFriend($friend_username) {
			$friend_username = "," . $friend_username . ",";
			if(strstr($this->getFriendArrayText(), $friend_username)) { return true; }
			else { return false; }
		}

		public function isUser($username) {
			$query = mysqli_query($this->conn, "SELECT username FROM users WHERE username='$username' AND deactivate_account=0");
			if(mysqli_num_rows($query) == 0){ return false; }
			else { return true; }
		}

		public function addFriend($friend_username) {
			$user_friend_array_text = $this->getFriendArrayText();
			$query = mysqli_query($this->conn, "SELECT friend_array FROM users WHERE username='$friend_username'");
			$row = mysqli_fetch_array($query);
			$friend_friend_array_text = $row['friend_array'];

			$user_friend_array_text = $user_friend_array_text . $friend_username . ",";
			$friend_added = mysqli_query($this->conn, "UPDATE users SET friend_array='$user_friend_array_text' WHERE username='$this->username'");
			$friend_friend_array_text = $friend_friend_array_text . $this->username . ",";
			$friend_added = mysqli_query($this->conn, "UPDATE users SET friend_array='$friend_friend_array_text' WHERE username='$friend_username'");
		}

		public function removeFriend($friend_username) {
			$user_friend_array_text = $this->getFriendArrayText();
			$query = mysqli_query($this->conn, "SELECT friend_array FROM users WHERE username='$friend_username'");
			$row = mysqli_fetch_array($query);
			$friend_friend_array_text = $row['friend_array'];

			$user_friend_array_text = str_replace($friend_username . ",", "", $user_friend_array_text);
			$remove_friend = mysqli_query($this->conn, "UPDATE users SET friend_array='$user_friend_array_text' WHERE username='$this->username'");
			$friend_friend_array_text = str_replace($this->username . ",", "", $friend_friend_array_text);
			$remove_friend = mysqli_query($this->conn, "UPDATE users SET friend_array='$friend_friend_array_text' WHERE username='$friend_username'");
		}

		public function getMutualFriendsCount($friend_username) {
			$mutual_friends = 0;
			$user_friend_array = $this->getFriendArray();
			$friend = new User($this->conn, $friend_username);
			$friend_friend_array = $friend->getFriendArray();
			$mutual_friends = count(array_intersect($user_friend_array, $friend_friend_array));
			return $mutual_friends-2;
		}

		public function searchUsers($input_name, $last_username, $limit) {
			$first_last_name = explode(" ", $input_name);
			if(strpos($input_name, "_") == true) {
				$query = mysqli_query($this->conn, "SELECT * FROM users WHERE username LIKE '%$input_name%' AND deactivate_account=0 LIMIT $limit");
			} else if(count($first_last_name) == 2) {
				$query = mysqli_query($this->conn, "SELECT * FROM users WHERE (first_name LIKE '%$first_last_name[0]%' AND last_name LIKE '%$first_last_name[1]%') AND deactivate_account=0 LIMIT $limit");
			} else {
				$query = mysqli_query($this->conn, "SELECT * FROM users WHERE (first_name LIKE '%$first_last_name[0]%' OR last_name LIKE '%$first_last_name[0]%') AND deactivate_account=0 LIMIT $limit");
			}
			return $query;
		}

		public function setFirstName($first_name)	{
			$query = mysqli_query($this->conn, "UPDATE users SET first_name='$first_name' WHERE username='$this->username'"); }
		public function setLastName($last_name)	{
			$query = mysqli_query($this->conn, "UPDATE users SET last_name='$last_name' WHERE username='$this->username'"); }
		public function setBio($bio)	{
			$query = mysqli_query($this->conn, "UPDATE users SET bio='$bio' WHERE username='$this->username'"); }
		public function setPhoneNumber($phone_no)	{
			$query = mysqli_query($this->conn, "UPDATE users SET phone_no='$phone_no' WHERE username='$this->username'"); }
		public function setBirthDay($birthday)	{
			$query = mysqli_query($this->conn, "UPDATE users SET birthday=STR_TO_DATE('$birthday','%m/%d/%y') WHERE username='$this->username'"); }
		public function setGender($gender)	{
			$query = mysqli_query($this->conn, "UPDATE users SET gender='$gender' WHERE username='$this->username'"); }
		public function setCity($city)	{
			$query = mysqli_query($this->conn, "UPDATE users SET city='$city' WHERE username='$this->username'"); }
		public function setState($state)	{
			$query = mysqli_query($this->conn, "UPDATE users SET state='$state' WHERE username='$this->username'"); }
		public function setCountry($country)	{
			$query = mysqli_query($this->conn, "UPDATE users SET country='$country' WHERE username='$this->username'"); }
		public function setSchool($school)	{
			$query = mysqli_query($this->conn, "UPDATE users SET school='$school' WHERE username='$this->username'"); }
		public function setCollege($college)	{
			$query = mysqli_query($this->conn, "UPDATE users SET college='$college' WHERE username='$this->username'"); }
	  public function uploadCoverPic($filepath) {
		 	$query = mysqli_query($this->conn, "UPDATE users SET cover_pic='$filepath' WHERE username='$this->username'"); }
		public function uploadProfilePic($filepath) {
		 	$query = mysqli_query($this->conn, "UPDATE users SET profile_pic='$filepath' WHERE username='$this->username'"); }

		public function closeAccount() {
			$query = mysqli_query($this->conn, "UPDATE users SET deactivate_account=1 WHERE username='$this->username'");
			if ($query){
				$friends = $this->getFriendArray();
				foreach ($friends as $friend) {
					$this->removeFriend($friend);
				}
				return true;
			} else { return false; }
		}

		public function checkEmailIdExists($email) {
			$query = mysqli_query($this->conn, "SELECT email FROM users WHERE email='$email' and deactivate_account=0");
			if (mysqli_num_rows($query) == 1) {
				return true;
			} else { return false; }
		}

		public function changeEmail($email) {
			if($this->checkEmailIdExists($email)){
				return 'no';
			} else { $query = mysqli_query($this->conn, "UPDATE users SET email='$email' WHERE username='$this->username'"); }
		}

		public function changePassword($old_password, $new_password) {
			$old_password = md5($old_password);
			$new_password = md5($new_password);
			$query = mysqli_query($this->conn, "UPDATE users SET password='$new_password' WHERE username='$this->username' and password='$old_password'");
			if($query){ return $new_password; }
			return false;
		}

		public function getNumOfPosts() {
			$query = mysqli_query($this->conn, "SELECT COUNT(*) as numPosts FROM posts WHERE user_from='$this->username' and deleted=0");
			$row = mysqli_fetch_array($query);
			return $row['numPosts'];
		}
	}
?>