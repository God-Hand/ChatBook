<?php
	/**
	class FriendRequest {
		private $conn;
		private $username;
		__construct($conn, $username) 									: create username object
		getFriendRequestsCount()												: return number of friends_request for the user
		didReceiveRequest($user_to) 										: check weather user receive friend request from a specific user
		didSendRequest($user_to) 												: check weather user send friend request to a specific user
		sendRequest($user_to) 													: insert request form the user to specific user
		rejectRequest($user_from) 											: reject request
		cancelRequest($user_to) 												: cancel request
		acceptRequest($user_from) 											: accept request
		getAllFriendRequests($last_request_id, $limit) 	: return all requests for or by user
		deleteAllRequests() 														: delete all requests for or by user 
	}
	*/
	class FriendRequest {
		
		private $conn;
		private $username;

		function __construct($conn, $username) {
			$this->username = $username;
			$this->conn = $conn;
		}

		public function getFriendRequestsCount() {
			$query = mysqli_query($this->conn, "SELECT count(*) as friendrequestcount FROM friend_requests WHERE user_to='$this->username' and deleted=0");
			$row = mysqli_fetch_array($query);
			return $row['friendrequestcount'];
		}

		public function didReceiveRequest($user_to) {
			$check_request_query = mysqli_query($this->conn, "SELECT count(*) as friendrequestcount FROM friend_requests WHERE user_to='$this->username' AND user_from='$user_to' AND deleted=0");
			$row = mysqli_fetch_array($check_request_query);
			if($row['friendrequestcount'] > 0) { return 1; }
			return 0;
		}

		public function didSendRequest($user_to) {
			$check_request_query = mysqli_query($this->conn, "SELECT count(*) as friendrequestcount FROM friend_requests WHERE user_to='$user_to' AND user_from='$this->username' AND deleted=0");
			$row = mysqli_fetch_array($check_request_query);
			if($row['friendrequestcount'] > 0) { return 1; }
			return 0;
		}
		
		public function sendRequest($user_to) {
			if( $this->didSendRequest($user_to) == 0) {
				$query = mysqli_query($this->conn, "INSERT INTO friend_requests (request_id, user_from, user_to, request_time) VALUES (default, '$this->username', '$user_to', default)");
			}
		}

		public function rejectRequest($user_from) {
			$query = mysqli_query($this->conn, "UPDATE friend_requests SET accepted=0, deleted=1 WHERE user_to='$this->username' AND user_from='$user_from' AND deleted=0");
			return $query;
		}

		public function cancelRequest($user_to) {
			$query = mysqli_query($this->conn, "UPDATE friend_requests SET deleted=1 WHERE user_from='$this->username' AND user_to='$user_to' AND deleted=0");
			return $query;
		}

		public function acceptRequest($user_from) {
			$query = mysqli_query($this->conn, "UPDATE friend_requests SET accepted=1, deleted=1 WHERE user_to='$this->username' AND user_from='$user_from' AND deleted=0");
			return $query;
		}

		public function getAllFriendRequests($last_request_id, $limit) {
			if ($last_request_id == 0){
				$query = mysqli_query($this->conn, "SELECT * FROM friend_requests WHERE deleted=0 AND (user_to='$this->username' OR user_from='$this->username') ORDER BY request_id DESC LIMIT $limit");
			} else {
				$query = mysqli_query($this->conn, "SELECT * FROM friend_requests WHERE request_id<'last_request_id' AND deleted=0 AND accepted IS NULL AND user_to='$this->username' ORDER BY request_id DESC LIMIT $limit");
			}
			return $query;
		}

		public function deleteAllRequests(){
			$query = mysqli_query($this->conn, "UPDATE friend_requests SET deleted=1 WHERE user_from='$this->username' OR user_to='$this->username'");
		}
	}
?>