<?php
	class FriendRequest {
		
		private $conn;
		private $username;

		// create username object
		function __construct($conn, $username) {
			$this->username = $username;
			$this->conn = $conn;
		}

		// return number of friends_request for the user
		public function getFriendRequestsCount() {
			$query = mysqli_query($this->conn, "SELECT * FROM friend_requests WHERE user_to='$this->username' and deleted=0");
			return mysqli_num_rows($query);
		}

		// check weather user send friend request to a specific user
		public function didSendRequest($user_to) {
			$check_request_query = mysqli_query($this->conn, "SELECT * FROM friend_requests WHERE user_to='$user_to' AND user_from='$this->username' AND deleted=0");
			if(mysqli_num_rows($check_request_query) > 0) {
				return 1;
			} else {
				return 0;
			}
		}
		
		// insert request form the user to specific user
		public function sendRequest($user_to) {
			if( $this->didSendRequest($user_to) == 0) {
				$query = mysqli_query($this->conn, "INSERT INTO friend_requests (request_id, user_from, user_to, request_time) VALUES (default, '$this->username', '$user_to', default)");
			}
		}

		// reject request
		public function rejectRequest($user_from) {
			$query = mysqli_query($this->conn, "UPDATE friend_requests SET accepted=0, deleted=1 WHERE user_to='$this->username' AND user_from='$user_from' AND deleted=0");
			return $query;
		}

		// cancel request
		public function cancelRequest($user_to) {
			$query = mysqli_query($this->conn, "UPDATE friend_requests SET deleted=1 WHERE user_from='$this->username' AND user_to='$user_to' AND deleted=0");
			return $query;
		}

		// accept request
		public function acceptRequest($user_from) {
			$query = mysqli_query($this->conn, "UPDATE friend_requests SET accepted=1, deleted=1 WHERE user_to='$this->username' AND user_from='$user_from' AND deleted=0");
			return $query;
		}

		// return all requests for or by user
		public function getAllFriendRequests($last_request_id, $limit) {
			if ($last_request_id == 0){
				$query = mysqli_query($this->conn, "SELECT * FROM friend_requests WHERE deleted=0 AND accepted IS NULL AND user_to='$this->username' ORDER BY request_id DESC LIMIT $limit");
			} else {
				$query = mysqli_query($this->conn, "SELECT * FROM friend_requests WHERE request_id<'last_request_id' AND deleted=0 AND accepted IS NULL AND user_to='$this->username' ORDER BY request_id DESC LIMIT $limit");
			}
			return $query;
		}
	}
?>