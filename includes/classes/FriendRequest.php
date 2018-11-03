<?php

	/**
	* CREATE TABLE IF NOT EXISTS `friend_requests` (
	*   `request_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
	*   `user_from` varchar(60) NOT NULL,
	*   `user_to` varchar(60) NOT NULL,
	*   `request_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
	*   `viewed` tinyint(1) NOT NULL DEFAULT '0',
	*   `accepted` tinyint(1) NOT NULL,
	*   `deleted` tinyint(1) NOT NULL DEFAULT '0',
	*   PRIMARY KEY (`request_id`)
	* ) ENGINE=InnoDB DEFAULT CHARSET=latin1;
	*/
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

		// check weather user receive friend request of a specific user
		public function didReceiveRequest($user_from) {
			$check_request_query = mysqli_query($this->conn, "SELECT viewed FROM friend_requests WHERE user_to='$this->username' AND user_from='$user_from' AND viewed=1 AND deleted=0");
			return $row['viewed'];
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
			$query = mysqli_query($this->conn, "UPDATE friend_requests SET accepted=0, deleted=1 WHERE user_from='$this->username' AND user_to='$user_to' AND deleted=0");
			return $query;
		}

		// accept request
		public function acceptRequest($user_from) {
			$query = mysqli_query($this->conn, "UPDATE friend_requests SET accepted=1, deleted=1 WHERE user_to='$this->username' AND user_from='$user_from' AND deleted=0");
			return $query;
		}

		// return all request
		public function getAllFriendRequests() {
			$query = mysqli_query($this->conn, "SELECT * FROM friend_requests WHERE ( user_to='$this->username' OR user_from='$this->username') AND deleted=0");
			return $query;
		}

		// user view friend request from user_from
		public function viewRequest($user_from) {
			$query = mysqli_query($this->conn, "UPDATE friend_requests SET viewed=1 WHERE user_to='$this->username' AND user_from='$user_from' and deleted=0");
		}

		// delete the request
		public function deleteRequest($user_to) {
			$query = mysqli_query($this->conn, "UPDATE friend_requests SET deleted=1 WHERE user_to='$user_to' AND user_from='$this->username' and deleted=0");
		}
	}
?>