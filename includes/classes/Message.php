<?php
	class Message {
		private $username;
		private $conn;

		// create message object for username
		public function __construct($conn, $username){
			$this->conn = $conn;
			$this->username = $username;
		}

		// send message to a particular user
		public function sendMessage($user_to, $body) {
			$query = mysqli_query($this->conn, "INSERT INTO messages VALUES (default, '$this->username', '$user_to', '$body', default, default)");
		}

		// return messages between user and other
		public function getMessages($user_from, $last_message_id, $limit) {
			if ($last_message_id==0) {
				$query = mysqli_query($this->conn, "SELECT * FROM messages WHERE deleted=0 AND ((user_to='$this->username' AND user_from='$user_from') OR (user_from='$this->username' AND user_to='$user_from')) ORDER BY message_id DESC LIMIT $limit");
			} else {
				$query = mysqli_query($this->conn, "SELECT * FROM messages WHERE deleted=0 AND message_id<'$last_message_id' AND ((user_to='$this->username' AND user_from='$user_from') OR (user_from='$this->username' AND user_to='$user_from')) ORDER BY message_id DESC LIMIT $limit");
			}
			return $query;
		}

		// return latest messages between user and other
		public function getLatestMessages($user_from, $last_message_id) {
			$query = mysqli_query($this->conn, "SELECT * FROM messages WHERE message_id>'$last_message_id' AND deleted=0 AND ((user_to='$this->username' AND user_from='$user_from') OR (user_from='$this->username' AND user_to='$user_from'))");
			return $query;
		}

		// delete a message of a user
		public function deleteMessage($message_id) {
			$query = mysqli_query($this->conn, "UPDATE messages SET deleted=1 WHERE message_id='$message_id'");
		}

		// delete all messages of a user
		public function deleteMessages($user_to) {
			$query = mysqli_query($this->conn, "UPDATE messages SET deleted=1 WHERE user_from='$this->username' AND user_to='$user_to'");
		}

		// delete all messages of a user
		public function deleteAllMessages(){
			$query = mysqli_query($this->conn, "UPDATE messages SET deleted=1 WHERE user_from='$this->username' OR user_to='$this->username'");
		}
	}
?>